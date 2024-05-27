<?php

namespace App\Http\Livewire\User;

use App\Models\AuditTrail;
use App\Models\Doc;
use App\Models\DocAction;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DateTime;
use DateTimeImmutable;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $tn_track = '';
    public $tn_received = '';
    public $tn_released = '';
    public $tn_terminal = '';

    public function create()
    {
        return redirect(route('create-document',[
            'user_id'=>Auth()->user()->id,
            'tn'=>date('Y-md-hms').'-'.rand(1000,date('Y'))
            ]));
    }

    public function releaseDocument()
    {
        $doc = Doc::with('audit_trails')->where('tn',$this->tn_released)->first();
        $audit_data = $doc->audit_trails;
        if (count($audit_data) > 0) {
            $audit_prev = $audit_data->sortByDesc('date_time')->first();
            if ($audit_prev->trail == 'origin' || $audit_prev->trail == 'received') {
                $date_time_current = date('Y-m-d H:i:s', time());
                // Compute difference and convert to readable format
                $diff = Carbon::parse($audit_prev->date_time)->diffForHumans(Carbon::parse($date_time_current), [
                    'parts' => 6,
                    'short' => true,
                    'syntax' => Carbon::DIFF_ABSOLUTE,
                ]);

                $doc->audit_trails()->create([
                    'date_time' => $date_time_current,
                    'trail' => 'release',
                    'office_id' => auth()->user()->office_id,
                    'user_id' => auth()->user()->id,
                    'start' => $audit_prev->date_time,
                    'end' => $date_time_current,
                    'elapse' => $diff,
                    'is_open' => 1,
                ]);
                $this->notify('Document(Tracking: '.$this->tn_released.') released, Successfully!');
                $this->tn_released = '';
            } else {
                $this->notify('Document(Tracking: '.$this->tn_released.') not for release!');
            }
        }

    }

    public function receivedDocument()
    {
        $doc = Doc::with('audit_trails')->where('tn',$this->tn_released)->first();
        $audit_data = $doc->audit_trails;
        if (count($audit_data) > 0) {
            $audit_prev = $audit_data->sortByDesc('date_time')->first();
            if ($audit_prev->trail == 'origin' || $audit_prev->trail == 'received') {
                $date_time_current = date('Y-m-d H:i:s', time());
                // Compute difference and convert to readable format
                $diff = Carbon::parse($audit_prev->date_time)->diffForHumans(Carbon::parse($date_time_current), [
                    'parts' => 6,
                    'short' => true,
                    'syntax' => Carbon::DIFF_ABSOLUTE,
                ]);

                $doc->audit_trails()->create([
                    'date_time' => $date_time_current,
                    'trail' => 'release',
                    'office_id' => auth()->user()->office_id,
                    'user_id' => auth()->user()->id,
                    'start' => $audit_prev->date_time,
                    'end' => $date_time_current,
                    'elapse' => $diff,
                    'is_open' => 1,
                ]);
                $this->notify('Document(Tracking: '.$this->tn_released.') released, Successfully!');
                $this->tn_released = '';
            } else {
                $this->notify('Document(Tracking: '.$this->tn_released.') not for release!');
            }
        }

    }

    function receive()
    {
        $document = Doc::with('audit_trails')
        ->where('tn', $this->tn_received)->first();
        if (is_null($document)) {
            dd('Document not found');
        } else {
            $latest_datetime = '';
            if (count($document->audit_trails)) {

                $latest_datetime = $document->audit_trails->last()->date_time;
                $current_datetime = date("Y-m-d h:i:s");
                ## Formula to get elapse time
                $originalTime = new DateTimeImmutable($latest_datetime);
                $targedTime = new DateTimeImmutable($current_datetime);
                $interval = $originalTime->diff($targedTime);
                $interval->format("%a day(s) %H hr(s) %I min(s) %S sec(s) ");

                AuditTrail::create([
                    "trail" => 'transit',
                    "office_id" =>  $document->audit_trails->last()->office_id,
                    "user_id" =>  $document->audit_trails->last()->user_id,
                    "date_time" => $current_datetime,
                    "start" => $latest_datetime,
                    "end" => $current_datetime,
                    "elapse" => $interval->format("%a day(s) %H hr(s) %I min(s) %S sec(s) "),
                    "is_open" => 1,
                    "doc_id" => $document->id,
                ]);

                AuditTrail::create([
                    "trail" => 'received',
                    "office_id" => Auth::user()->office_id,
                    "user_id" => Auth::user()->id,
                    "date_time" => $current_datetime,
                    "start" => null,
                    "end" => null,
                    "elapse" => '',
                    "is_open" => 1,
                    "doc_id" => $document->id,
                ]);
            }

        }

        $this->notify('Document Received successfully.');
        return redirect()->route('Documents');
    }

    public function terminal()
    {
        # code...
    }
    public function render()
    {
        $pendingCount = DocAction::where('is_received', '0')
            ->where('status', 'pending')
            ->where('refer_to', auth()->user()->id)
            ->count();
        // dd(date("Y-m-d-His") ); // Generate Tracking Number
        return view('livewire.user.dashboard',[
            'pending_count' => $pendingCount,
        ]);
    }

    public function logout() {
        auth()->logout(); return redirect('/');
    }
}
