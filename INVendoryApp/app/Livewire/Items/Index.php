<?php

namespace App\Livewire\Items;

use App\Models\Item;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{

    public string $search = '';

    public string $sortColumn = 'created_at', $sortDirection = 'desc';

    use WithPagination, WithoutUrlPagination;

    public function render()
    {

        $query = Item::query();

        $query = $this->applySearch($query);

        $query = $this->applySort($query);

        return view('livewire.items.index', [
            'items' => $query->paginate(10),

        ]);
    }
    public function applySort(Builder $query)
    {
        return $query->orderBy($this->sortColumn, $this->sortDirection);
    }

    public function sortBy(string $column)
    {
        if ($this->sortColumn == $column){
             $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        } else {
             $this->sortDirection = 'asc';
        }

        $this->sortColumn = $column;
    }

    public function applySearch(Builder $query)
    {
        return $query->where('item_name', 'like', '%' . $this->search . '%')
                     ->orWhere('id', 'like', '%' . $this->search . '%');
    }
    public function delete(Item $item) 
    { 
        $item->delete();
    }
}