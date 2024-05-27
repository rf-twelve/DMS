<?php

namespace App\Http\Livewire\Dts;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithBulkActions;
use App\Http\Livewire\DataTable\WithCachedRows;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\Doc;
use App\Models\DocAction;
use App\Models\Office;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class PendingDocument extends Component
{
    use WithFileUploads, WithPerPagePagination, WithBulkActions, WithCachedRows;

    public $showTableGroup = true;
    public $showFormGroup = false;
    public $showFile = false;
    public $showActionForm = false;
    public $showFileImage = '';
    public $showDeleteSelectedRecordModal = false;
    public $showDeleteSingleRecordModal = false;
    public $delete_single_record_id = '';
    public $showImportModal = false;
    public $showEditModal = false;
    public $showFilters = false;
    public $searchTerm = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public Doc $editing;
    public $office;
    public $viewing = [];
    public $timeline = [];
    public $office_list;
    public $user_list;
    public $imports = [
        'count' => 0,
        'file',
    ];
    public $filters = [
        'search' => '',
        'status' => '',
        'amount-min' => null,
        'amount-max' => null,
        'date-min' => null,
        'date-max' => null,
    ];

    protected $queryString = ['sortField','sortDirection'];


    public function mount() {
        $this->office_list = Office::get();
        $this->user_list = User::get();
    }

    public function updatedFilters() { $this->resetPage(); }

    public function updatedShowFormGroup() { $this->showFormGroup == false ? $this->showTableGroup = true : false;}

    public function toggleShowFilters()
    {
        // $this->useCachedRows();
        $this->showFilters = ! $this->showFilters;
    }
    public function resetFilters() { $this->reset('filters'); }

    public function sortBy($field){

        if($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function create()
    {
        return redirect(route('create-document',[
            'user_id' => Auth::user()->id,
            'tn' => date('Y-md-hms').'-'.rand(1000,date('Y'))
            ]));
    }

    public function edit($id){
        $this->viewing = Doc::findOrFail($id);
        // dd($this->viewing->dts_archives);
        // $this->timeline = Activity::where('subject_id',$id)->orderBy('id')->get();
        $this->useCachedRows();

        // $this->setDataField($id, $this->viewing->refer_to);

        $this->showTableGroup = false;
        $this->showFormGroup = true;
    }

    public function openFile($id){
        // $this->showFileImage = (DtsArchive::find($id))->image;
        $this->showFormGroup = false;
        $this->showFile = true;
    }

    public function closeFile(){
        $this->showFormGroup = true;
        $this->showFile = false;
    }

    public function addAction(){
        // $this->showFormGroup = true;
        // $this->showFile = false;
        $this->showActionForm = true;
    }

    public function saveAction(){
        $validated = $this->validate();
        $validated['editing']['dts_doc_id'] = $this->viewing['id'];
        // DtsAction::create($validated['editing']);
        $this->showActionForm = false;
        $this->notify('New Action has been added successfully!');
        $this->edit($this->viewing['id']);
    }


    public function save()
    {
        $this->validate();

        $data = is_array($this->viewing) ? $this->viewing : $this->viewing->toArray();

        $this->editing->refer_to =  $data['refer_to'];
        $this->editing->dts_doc_id =  $data['id'];

        $this->editing->save();

        $this->showTableGroup = true;
        $this->showFormGroup = false;

        $this->notify('Successfully save records.');
    }

    public function print($id)
    {
        $dataArray = array(
            'id' => $id,
            'form' => 'incoming',
        );

        $query = http_build_query(array('aParam' => $dataArray));

        return redirect()->route('PDF', $query);

    }

    public function deleteSelectedRecord()
    {
        $deleteCount = $this->selectedRowsQuery->count();

        $this->selectedRowsQuery->delete();

        $this->showDeleteSelectedRecordModal = false;

        $this->notify('You\'ve deleted '.$deleteCount.' records.');
    }

    public function toggleDeleteSingleRecordModal($id)
    {
        $this->delete_single_record_id = $id;
        $this->showDeleteSingleRecordModal = true;
    }

    public function deleteSingleRecord()
    {
        Doc::destroy($this->delete_single_record_id);

        $this->showDeleteSingleRecordModal = false;

        $this->delete_single_record_id = '';

        $this->notify('You\'ve deleted record successfully.');
    }

    public function exportSelected()
    {
        return response()->streamDownload(function () {
            echo $this->selectedRowsQuery->toCsv();
        }, 'transactions.csv');
        dd('export');
    }

    public function getRowsQueryProperty()
    {
        return DocAction::query()
            ->with('document')
            ->where('is_received', '0')
            ->where('status', 'pending')
            ->where('refer_to', auth()->user()->id)
            ->when($this->filters['search'], fn($query, $search) => $query->where($this->sortField, 'like','%'.$search.'%'))
            ->orderBy($this->sortField, $this->sortDirection);
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }

    public function render()
    {
        // $data = $this->rows->first();
        // dd($data);
        return view('livewire.dts.pending-document',[
            'docs' => $this->rows,
            'pending_count' => $this->rows->count(),
        ]);
    }

    public function logout() {
        auth()->logout(); return redirect('/');
    }

    ## Use Controls
    public function toggleReceived($id)
    {
        ## Find Record
        $doc_act = DocAction::find($id);

        ## Initiate details
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $refer_fr_name = Str::upper($doc_act->ReferFromFullname);
        $refer_to_name = Str::upper($doc_act->ReferToFullname);
        $details = 'Received by '.$refer_to_name
            .' from '.$refer_fr_name.'.';

        $doc_act->update([
            'status' => 'received',
            'is_received' => '1',
        ]);

        $doc_tracks = $doc_act->document->doc_tracks()->create([
            'date' => $date,
            'time' => $time,
            'time_elapse' => 'N/A',
            'details' => $details
        ]);

        // DocAction::find($id)->update([
        //     'status' => 'received',
        //     'is_received' => '1',
        // ]);
        // $doc->doc_tracks()->create([
        //     'date' => $validatedData['date'],
        //     'time' => $validatedData['time'],
        //     'time_elapse' => 'N/A',
        //     'details' => $details
        // ]);
        // $doc_tracks = $doc_act->document->doc_tracks->create([
        //     'date' => $date,
        //     'time' => $time,
        //     'time_elapse' => 'N/A',
        //     'details' => $details
        // ]);
        // dd($doc_tracks);
        $this->notify('You\'ve received document successfully.');
    }



}
