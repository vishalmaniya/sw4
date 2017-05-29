<?php

namespace App\Http\Controllers;

use App\Courses;
use App\Category;
use App\CoursesToTeacher;
use Illuminate\Http\Request;
use Sentinel;

use DB;
use Redirect;
use Validator;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::with('category')->get();
        return view('admin.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.courses.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $this->validate($request, [
                'name' => 'required',
                'price'=> 'required|numeric',
                'public'=> 'required',
                'category_id'=> 'required',
                'free_content_limit'=> 'required',
            ]);
            $url = $request->input('url') ? $request->input('url') : '';
            $name = preg_replace("/[^a-zA-Z0-9\s-<>]/", "", $request->input('name'));
            $price = $request->input('price');
            $public = $request->input('public');
            $category_id = $request->input('category_id');
            $description = $request->input('description');
            $free_content_limit = $request->input('free_content_limit');

            if (strpos($price, '.') === FALSE) { $price .= '.00'; }

            $course = new Courses();
            $course->id = $this->get_primary_key('courses');
            $course->name = $name;
            $course->category_id = $category_id;
            $course->description = $description;
            $course->source = $url;
            $course->price = $price;
            $course->position = 0;
            $course->public = $public;
            $course->free_content_limit = $free_content_limit;
            $course->save();
            try{
                // create folder
                $oldumask = umask(0);
                $name = strtolower(str_replace(' ', '_', htmlspecialchars($request->input('name'))));
                if (!@mkdir(asset('/uploads/' . $name), 0777))
                {
                    $msg = 'Couldn\'t create course directory within the uploads folder.';
                }
                umask($oldumask);
            } catch (Exception $ex) {
                DB::rollBack();
                return Redirect::route('courses.index')->with('error', $msg);
            }
        } catch (Exception $e) {
            DB::rollBack();
            return Redirect::route('courses.index')->with('error', $e->getMessage());
        }
        DB::commit();
        return Redirect::route('courses.index')->with('success', 'Courses Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show($courses)
    {
        $courses = Courses::with('category')->find($courses);
        return view('admin.courses.show', compact('courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit($courses)
    {
        $courses = Courses::with('category')->find($courses);
        $category = Category::all();
        return view('admin.courses.edit', compact('category','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $courses)
    {
        DB::beginTransaction();
        try{
            $this->validate($request, [
                'name' => 'required',
                'price'=> 'required|numeric',
                'public'=> 'required',
                'category_id'=> 'required',
                'free_content_limit'=> 'required',
            ]);
            $courses = Courses::with('category')->find($courses);
            $url = $request->input('url') ? $request->input('url') : '';
            $name = preg_replace("/[^a-zA-Z0-9\s-<>]/", "", $request->input('name'));
            $price = $request->input('price');
            $public = $request->input('public');
            $category_id = $request->input('category_id');
            $description = $request->input('description');
            $free_content_limit = $request->input('free_content_limit');

            if (strpos($price, '.') === FALSE) { $price .= '.00'; }

            $course = Courses::find($courses->id);
            $course->id = $this->get_primary_key('courses');
            $course->name = $name;
            $course->category_id = $category_id;
            $course->description = $description;
            $course->source = $url;
            $course->price = $price;
            $course->position = 0;
            $course->public = $public;
            $course->free_content_limit = $free_content_limit;
            $course->save();
            
            if($courses->name == $name){
                try{
                    // create folder
                    $oldumask = umask(0);
                    $name = strtolower(str_replace(' ', '_', htmlspecialchars($request->input('name'))));
                    if (!@mkdir(asset('/uploads/' . $name), 0777))
                    {
                        $msg = 'Couldn\'t create course directory within the uploads folder.';
                    }
                    umask($oldumask);
                } catch (Exception $ex) {
                    DB::rollBack();
                    return Redirect::route('courses.index')->with('error', $msg);
                }
            }
        } catch (Exception $e) {
            DB::rollBack();
            return Redirect::route('courses.index')->with('error', $e->getMessage());
        }
        DB::commit();
        return Redirect::route('courses.index')->with('success', 'Courses Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy($courses)
    {
        $courses = Courses::with('category')->find($courses);
        
        $courses->delete();
        return Redirect::route('courses.index')->with('success', 'Courses Deleted Successfully');
    }
    
    public function courses_to_teacher(){
        $coursesToTeacher = CoursesToTeacher::with('courses','teacher')->get();
        $role = Sentinel::findRoleById(3);
        $users = $role->users()->with('roles')->get();
        $courses = Courses::get();
        return view('admin.courses.courses_to_teacher', compact('users','coursesToTeacher','courses'));
    }
    
    public function post_courses_to_teacher(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'courses_id' => 'required',
                'users_id'=> 'required'
            ]);
            $courses_id = $request->input('courses_id');
            $users_id = $request->input('users_id');
            $validator->after(function($validator)use($courses_id,$users_id)
            {
                $check = CoursesToTeacher::with('courses','teacher')
                    ->where('courses_id',$courses_id)
                    ->where('users_id',$users_id)
                    ->first();
                if(!empty($check)){
                    $validator->errors()->add('courses_id', 'Courses Already assign to : '.$check->teacher->name);
                }
            });
            if ($validator->fails())
            {
                return redirect()->back()->withErrors($validator->errors());
            }
            $coursesToTeacher = new CoursesToTeacher();
            $coursesToTeacher->id = $this->get_primary_key('courses_to_teacher');
            $coursesToTeacher->courses_id = $request->input('courses_id');
            $coursesToTeacher->users_id = $request->input('users_id');
            $coursesToTeacher->save();
            return Redirect::route('courses_to_teacher')->with('success', 'Courses Assign Successfully');
            
        } catch (Exception $e) {
            return Redirect::route('courses_to_teacher')->with('error', 'Courses Assign getting error. please try again.');
        }
    }
}
