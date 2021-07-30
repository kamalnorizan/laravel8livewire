<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class PostDatatable extends LivewireDatatable
{
    public $model = Post::class;
    // public function render()
    // {
    //     return view('livewire.post-datatable');
    // }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('Id')
                ->sortBy('id'),
            Column::name('title')
                ->label('Title'),
            DateColumn::name('created_at')
                ->label('Creation Date')
        ];
    }
}
