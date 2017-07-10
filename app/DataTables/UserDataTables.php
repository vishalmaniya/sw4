<?php

namespace App\DataTables;

use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Yajra\Datatables\Services\DataTable;

class UserDataTables extends DataTable
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
            ->addColumn('role', function($user){
                return $user->roles[0]->name;
            })
            ->addColumn('status', function($user){
                if($activation = Activation::completed($user)){
                    return 'activated';
                }else{
                    return 'inactive';
                }
            })
            ->addColumn('created_at', function($user){
                return $user->created_at->diffForHumans();
            })
            ->addColumn('action', function($user){
                $action = '<a href="'. route('users.show', $user->id) .'">
                    <i class="glyphicon glyphicon-eye-open" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i>
                </a>
                <a href="'. route('admin.users.edit', $user->id) .'">
                    <i class="glyphicon glyphicon-edit" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update user"></i>
                </a>';
                if (($user->roles[0]->name == 'Student')){
                $action .= '<a href="'. route('confirm-delete/user', $user->id) .'" data-toggle="modal" data-target="#delete_confirm">
                    <i class="glyphicon glyphicon-trash" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i>
                </a>';
                }
                return $action;
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
        $query = User::with('roles')->leftJoin('role_users', 'role_users.user_id', '=', 'users.id')->whereNotIn('role_users.role_id',[4]);

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
            'user_name',
            'role',
            'name',
            'email',
            'status',
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
        return 'userdatatables_' . time();
    }
}
