<?php

namespace App\DataTables;

use App\Courses;
use Yajra\Datatables\Services\DataTable;

class CourseDataTables extends DataTable
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
            ->addColumn('action', function($course){
                return '<a href="'. route('courses.show', $course->id) .'" style="float: left;width:20px;"><i class="glyphicon glyphicon-eye-open" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view courses"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'. route('courses.edit', $course->id) .'" style="float: left;"><i class="glyphicon glyphicon-edit" data-name="courses" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update Courses"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<form action="'. route('courses.destroy', $course->id) .'" method="POST" id="form-id-'. $course->id .'" style="width: 2%;display: inline-block;position: relative;left: 10px;top: -20px;"> <input type="hidden" name="_method" value="DELETE"/> <input type="hidden" name="_token" value="'. csrf_token() .'" /> <a onclick="document.getElementById('."'form-id-". $course->id ."'" .').submit();"><i class="glyphicon glyphicon-trash" data-name="courses-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete Courses"></i></a> </form>';
            })
            ->addColumn('name', function($course){
                return $course->name;
            })
            ->addColumn('category', function($course){
                return $course->category->name;
            })
            ->addColumn('price', function($course){
                return $course->price;
            })
            ->addColumn('visibility', function($course){
                if($course->public == 1){
                    return 'Public';
                }else{
                    return 'Private';
                }
                
            })
            ->addColumn('created_at', function($course){
                return $course->created_at->diffForHumans();
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
        $query = Courses::with('category');

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
            'category',
            'price',
            'visibility',
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
        return 'coursedatatables_' . time();
    }
}
