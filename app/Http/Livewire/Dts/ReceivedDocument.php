<?php

namespace App\Http\Livewire\Dts;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithBulkActions;
use App\Http\Livewire\DataTable\WithCachedRows;
use App\Models\Doc;
use App\Models\DocAction;
use App\Models\Office;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ReceivedDocument extends Component
{
    use WithFileUploads, WithPerPagePagination, WithBulkActions, WithCachedRows;

    public $searchTerm = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';

    public $filters = [
        'search' => '',
        'status' => 'received',
        'amount-min' => null,
        'amount-max' => null,
        'date-min' => null,
        'date-max' => null,
    ];

    protected $queryString = ['sortField','sortDirection'];


    public function mount() {
        // $this->office_list = Office::get();
        // $this->user_list = User::get();
    }

    public function updatedFilters() { $this->resetPage(); }

    public function resetFilters() { $this->reset('filters'); }

    public function sortBy($field){

        if($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function getRowsQueryProperty()
    {
        return Doc::query()
            ->whereHas('doc_actions', function ($query) {
                return $query->where('refer_to', auth()->user()->id);
            })
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
        return view('livewire.dts.received-document',[
            'docs' => $this->rows,
        ]);
    }

    ## Use Controls

}
