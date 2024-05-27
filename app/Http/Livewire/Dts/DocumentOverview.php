<?php

namespace App\Http\Livewire\Dts;

use App\Models\AuditTrail;
use App\Models\Doc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DocumentOverview extends Component
{
    public $doc_id;
    public $tn;
    public $date;
    public $received_by;
    public $title;
    public $origin;
    public $nature;
    public $class;
    public $class_name;
    public $for;
    public $for_name;
    public $status;
    public $remarks;
    public $author_fullname;
    public $author_id;
    public $updated_by;

    public $docs;
    public $doc_actions;
    public $doc_tracks;
    public $images;
    public $offices;
    public $showDeleteSelectedRecordModal = false;

    public function mount($id)
    {
        $this->doc_id = $id;
        $this->setFields($id);
    }

    public function setFields($id)
    {
        $this->docs = Doc::query()
            ->with('doc_actions', 'doc_tracks','images','offices')
            ->find($id);
        // dd($this->docs);
        $this->doc_actions = $this->docs->doc_actions;
        $this->doc_tracks = $this->docs->doc_tracks;
        $this->images = $this->docs->images;
        $this->offices = $this->docs->offices;
        $this->tn = $this->docs['tn'];
        $this->date = $this->docs['date'];
        $this->received_by = $this->docs['received_by'];
        $this->title = $this->docs['title'];
        $this->origin = $this->docs['origin'];
        $this->nature = $this->docs['nature'];
        $this->class = $this->docs['class'];
        $this->class_name = $this->docs->DocumentClass;
        $this->for = $this->docs['for'];
        $this->for_name = $this->docs->DocumentFor;
        $this->status = $this->docs['status'];
        $this->remarks = $this->docs['remarks'];
        $this->author_id = $this->docs->author_id;
        $this->author_fullname = $this->docs->author_fullname;
        $this->updated_by = $this->docs['updated_by'];
    }

    public function render()
    {
        return view('livewire.dts.document-overview');
    }















    public function deleteSingleRecord()
    {
        Doc::destroy($this->doc_id);

        $this->showDeleteSingleRecordModal = false;

        return redirect()->route('Documents');
    }

    ## Edit Document
    function edit()
    {
        return redirect()->route('Edit Document', ['id' => $this->doc_id]);
    }
     ## Release Document
    function release()
    {
        AuditTrail::create([
            "trail" => 'released',
            "office_id" => Auth::user()->office_id,
            "user_id" => Auth::user()->id,
            "date_time" => date("Y-m-d h:i:s"),
            "start" => null,
            "end" => null,
            "elapse" => '',
            "is_open" => 1,
            "doc_id" => $this->doc_id,
        ]);
        $this->notify('Document released successfully.');
        return redirect()->route('Documents');
    }

     ## Terminal Document
    function receive()
    {


        AuditTrail::create([
            "trail" => 'transit',
            "office_id" => '(N/A)',
            "user_id" => '(N/A)',
            "date_time" => '(N/A)',
            "start" => null,
            "end" => null,
            "elapse" => 'date("Y-m-d h:i:s")',
            "is_open" => 1,
            "doc_id" => $this->doc_id,
        ]);

        AuditTrail::create([
            "trail" => 'received',
            "office_id" => Auth::user()->office_id,
            "user_id" => Auth::user()->id,
            "date_time" => date("Y-m-d h:i:s"),
            "start" => null,
            "end" => null,
            "elapse" => '',
            "is_open" => 1,
            "doc_id" => $this->doc_id,
        ]);
        $this->notify('Document Received successfully.');
        return redirect()->route('Documents');
    }

     ## Terminal Document
    function terminal()
    {
        # code...
    }
     ## Transfer Document
    function transfer()
    {
        # code...
    }
     ## Unlock Document
    function unlock()
    {
        # code...
    }

    // public function render()
    // {
    //     return view('livewire.dts.document-overview',[
    //         'document' => Doc::with('audit_trails', 'action_takens')
    //             ->where('id',$this->doc_id)
    //             ->first(),
    //     ]);
    // }
}
