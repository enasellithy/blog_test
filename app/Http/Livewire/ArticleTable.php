<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ArticleTable extends DataTableComponent
{
    protected $model = Article::class;
    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPage'];

    public function resetPage($pageName = 'page')
    {
        $rowsPropertyData = $this->getRows()->toArray();
        $prevPageNum = $rowsPropertyData['current_page'] - 1;
        $prevPageNum = $prevPageNum > 0 ? $prevPageNum : 1;
        $pageNum = count($rowsPropertyData['data']) > 0 ? $rowsPropertyData['current_page'] : $prevPageNum;

        $this->setPage($pageNum, $pageName);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("id", "id"),
            Column::make('title', "title")
                ->searchable()
                ->sortable(),
            Column::make('User', "user.name")
                ->searchable()
                ->sortable(),
            Column::make('Published At', 'created_at')
                ->searchable()
                ->sortable(),
            Column::make('Action', 'id')
                ->view('article.columns.action')
                ->searchable()
                ->sortable(),
        ];
    }

    public function builder(): Builder
    {
        if(!Auth::user()->roles[0]['User']){
          return  Article::with('user')->select('*');
        }
        return Article::where('user_id',Auth::id())->select('*');
    }
}
