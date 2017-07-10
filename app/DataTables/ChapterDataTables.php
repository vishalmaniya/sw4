<?php

namespace App\DataTables;

use App\Chapters;
use Yajra\Datatables\Services\DataTable;

class ChapterDataTables extends DataTable
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
            ->addColumn('action', function($chapter){
                return '<a href="'. route('chapters.show', $chapter->id) .'" style="float: left;width: 20px;"><i class="glyphicon glyphicon-eye-open" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view courses"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'. route('chapters.edit', $chapter->id) .'" style="float: left;width: 20px;"><i class="glyphicon glyphicon-edit" data-name="chapter" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update chapters"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<form action="'. route('chapters.destroy', $chapter->id) .'" method="POST" id="form-id-'. $chapter->id .'" style="width: 2%;display: inline-block;position: relative;top: -20px;left: 10%;"><input type="hidden" name="_method" value="DELETE"/> <input type="hidden" name="_token" value="'. csrf_token() .'" /> <a onclick="document.getElementById('."'form-id-". $chapter->id ."'".').submit();" style="width: 20px;"><i class="glyphicon glyphicon-trash" data-name="chapters-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete Chapters"></i></a> </form>';
            })
            ->addColumn('name', function($chapter){
                return $chapter->name;
            })
            ->addColumn('course', function($chapter){
                return $chapter->course->name;
            })
            ->addColumn('created_at', function($chapter){
                return $chapter->created_at->diffForHumans();
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
        $query = Chapters::with('course');

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
        return 'chapterdatatables_' . time();
    }
}
