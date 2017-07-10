<?php

namespace App\DataTables;

use App\Lession;
use Yajra\Datatables\Services\DataTable;

class LessionDataTables extends DataTable
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
            ->addColumn('name', function($lession){
                return $lession->name;
            })
            ->addColumn('chapter', function($lession){
                return $lession->chapter->name;
            })
            ->addColumn('course', function($lession){
                return $lession->chapter->course->name;
            })
            ->addColumn('created_at', function($lession){
                return $lession->created_at->diffForHumans();
            })
            ->addColumn('action', function($lession){
                return '<a href="'. route('lession.show', $lession->id) .'" style="float: left;width: 20px;"><i class="glyphicon glyphicon-eye-open" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view Lession"></i></a> <a href="'. route('lession.edit', $lession->id) .'" style="float: left;width: 20px;"><i class="glyphicon glyphicon-edit" data-name="chapter" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Lession"></i></a> <form action="'. route('lession.destroy', $lession->id) .'" method="POST" id="form-id-'. $lession->id .'" style="width: 2%;display: inline-block;position: relative;"> <input type="hidden" name="_method" value="DELETE"/> <input type="hidden" name="_token" value="'. csrf_token() .'" /> <a onclick="document.getElementById('."'form-id-". $lession->id ."'".').submit();"><i class="glyphicon glyphicon-trash" data-name="Lession-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete Lession"></i></a> </form>';
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
        $query = Lession::with('chapter');

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
            'name',
            'chapter',
            'course',
            'created_at',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'lessiondatatables_' . time();
    }
}
