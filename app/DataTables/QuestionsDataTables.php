<?php

namespace App\DataTables;

use App\Questions;
use Yajra\Datatables\Services\DataTable;

class QuestionsDataTables extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('name', function($question){
                return $question->lession->name;
            })
            ->addColumn('question', function($question){
                return $question->question_join->question;
            })
            ->addColumn('type', function($question){
                return $question->type;
            })
            ->addColumn('created_at', function($question){
                return $question->created_at->diffForHumans();
            })
            ->addColumn('action', function($question){
                return '<a href="'. route('questions.show', $question->id) .'" style="float: left;width:20px;"><i class="glyphicon glyphicon-eye-open" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view Question"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="'. route('questions.edit', $question->id) .'" style="float: left;width:20px;"><i class="glyphicon glyphicon-edit" data-name="Question" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Question"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <form action="'. route('questions.destroy', $question->id) .'" method="POST" id="form-id-'. $question->id .'" style="width: 2%;display: inline-block;position: relative;left: 10px;top: -20px;"> <input type="hidden" name="_method" value="DELETE"/> <input type="hidden" name="_token" value="'. csrf_token() .'" /> <a onclick="document.getElementById('."'form-id-". $question->id ."'".').submit();"><i class="livicon" data-name="Lession-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete Question"></i></a> </form>';
            })
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Questions::with('lession','question_join');

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->ajax('')
                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'type',
            'name',
            'question',
            'created_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'questionsdatatables_' . time();
    }
}
