<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\Courses;
use Sentinel;

class ClassroomController extends Controller
{
    public function index(){
        $classroom = Classroom::with('user','teacher')->get();
        return view('admin.classroom.index', compact('classroom'));
    }
    
    public function create(){
        $role = Sentinel::findRoleById(2);
        $users = $role->users()->with('roles')->get();
        $courses = Courses::all();
        return view('admin.classroom.create', compact('users','courses'));
    }
    
    public function store(){
        
    }
}
