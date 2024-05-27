<?php

namespace App\Http\Livewire\Dts;

use App\Models\Doc;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class DocumentCreate extends Component
{
    use WithFileUploads;
    public $tn;
    public $date;
    public $time;
    public $received_by;
    public $origin;
    public $nature;
    public $class;
    public $for;
    public $refer_to;
    public $type; //draft, office, public
    public $remarks;
    public $author_id;
    public $author_office;
    public $updated_by;
    public $file_images = [];
    public $temp_images = [];
    public $display_temp_images = [];

    public $recipient_office;
    public $recipient_person;

    public $refer_users;

    public function rules() { return [
        // 'editing.type' => 'required|in:'.collect(VmsPar::TYPES)->keys()->implode(','),
        'tn' => 'required',
        'date' => 'required',
        'time' => 'nullable',
        'received_by' => 'required',
        'origin' => 'required',
        'nature' => 'required',
        'class' => 'required',
        'for' => 'required',
        'refer_to' => 'required',
        'type' => 'required',
        'remarks' => 'nullable',
    ]; }

    public function resetFields()
    {
        $this->date = '';
        $this->received_by = '';
        $this->origin = '';
        $this->nature = '';
        $this->class = '';
        $this->for = '';
        $this->remarks = '';
        $this->author_id = '';
        $this->updated_by = '';
        $this->file_images = [];
    }

    public function mount($user_id, $tn)
    {
        $this->refer_users = User::select('id','fullname')->get();
        $this->tn = $tn;
        $this->time = time();
        $this->date = date('Y-m-d', $this->time);
        $this->file_images = [];
        $this->temp_images = [];

    }

    public function updatedTempImages(){
        // $this->validate(['temp_images' => 'image|mimes:jpg,png,jpeg']);
        $this->display_temp_images = $this->temp_images;
    }


    public function save()
    {
        $validatedData = $this->validate();
        $date_time_current = date('Y-m-d H:i:s', $this->time);
        $validatedData['status'] = 'pending';
        $validatedData['author_id'] = auth()->user()->id;
        $validatedData['author_office'] = auth()->user()->office_id;
        $filteredForDocs = Arr::except($validatedData, ['refer_to']);
        // dd($filteredForDocs);
        // Action: Received, Created, Sent, Released, Approved
        // Status: pending", "in progress", or "completed"
        $doc = Doc::create($filteredForDocs);

        switch ($doc->type) {
            case 'draft':
                $doc->tracks()->create([
                    'action' => 'Created',
                    'remarks' => 'A draft document.',
                    'on_transit' => false,
                    'status' => 'draft',
                    'assigned_to' => 'N/A',
                    'deadline' => 'N/A',
                    'time_elapse' => 'N/A',
                    'created_at' => $date_time_current,
                    'updated_at' => null,
                    'office_id' => auth()->user()->office_id,
                    'user_id' => auth()->user()->id,
                ]);

                ## Set redirect routes
                $redirect_routes = 'my-documents';
                break;

            case 'office':
                ## Create and actions
                $doc_action = $doc->doc_actions()->create([
                    'office_id' => $validatedData['author_office'],
                    'is_received' => 0,
                    'status' => 'pending',
                    'refer_from' => $validatedData['author_id'],
                    'refer_to' => $validatedData['refer_to'],
                    'action_taken' => $this->for,
                    'remarks' => '',
                ]);

                ## Initiate details
                $refer_fr_name = Str::upper($doc_action->ReferFromFullname);
                $refer_to_name = Str::upper($doc_action->ReferToFullname);
                $details = 'Refer to '.$refer_to_name
                    .' for '.$doc->DocumentFor
                    .' from '.$refer_fr_name.'.';
                $doc->doc_tracks()->create([
                    'date' => $validatedData['date'],
                    'time' => $validatedData['time'],
                    'time_elapse' => 'N/A',
                    'details' => $details
                ]);
                ## Set redirect routes
                $redirect_routes = 'office-documents';
                break;
            case 'public':
                ## Set redirect routes
                $redirect_routes = 'shared-documents';
                break;

            default:
                # code...
                break;
        }
        if(count($this->temp_images)){
            foreach($this->temp_images as $item){
                $filename = $item->store('/','images');
                $doc->images()->create(['name'=>$filename]);
            }
        }
        $this->notify('Success!');
        return redirect()->route($redirect_routes,['user_id'=>auth()->user()->id]);
    }

    // public function save()
    // {
    //     $this->validate();
    //     dd($this->validate());
    //     if($this->is_draft){
    //         if(empty($this->editing['title'])){$this->editing['title'] = '(Empty Field)';}
    //         if(empty($this->editing['origin'])){$this->editing['origin'] = '(Empty Field)';}
    //         if(empty($this->editing['nature'])){$this->editing['nature'] = '(Empty Field)';}
    //         $this->editing['is_draft'] = 1;
    //         // $this->editing['status'] = "originated";
    //         $this->editing->save();
    //         $this->notify('Record saved successfully.');
    //         return redirect()->route('Documents');
    //     }
    //     // DRAFT: Save only on document
    //     // is_draft column set to true
    //     // no document trail being save
    //     // dd($this->is_draft);
    //     // if($this->is_draft == false){
    //     //     $v = $this->validate([
    //     //         'recipient_office' => 'required'
    //     //     ]);
    //     // }

    //     dump('Saved');
    //     // dump($all);
    //     // dd($v);
    // }

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function render()
    {
        return view('livewire.dts.document-create');
    }

    public function logout() {
        auth()->logout(); return redirect('/');
    }
}
