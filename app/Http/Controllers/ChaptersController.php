<?php

namespace App\Http\Controllers;

use App\Chapters;
use App\Courses;
use Illuminate\Http\Request;

use DB;
use Redirect;

class ChaptersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapters = Chapters::with('course')->get();
        return view('admin.chapters.index', compact('chapters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = Courses::all();
        return view('admin.chapters.create', compact('course'));
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
                'courses_id'=> 'required'
            ]);
            $chapter = new Chapters();
            $chapter->id = $this->get_primary_key('chapter');
            $chapter->name = $request->input('name');
            $chapter->courses_id = $request->input('courses_id');
            $chapter->position = 0;
            $chapter->save();
            
        } catch (Exception $e) {
            DB::rollBack();
        }
        DB::commit();
        return Redirect::route('chapters.index')->with('success', 'Chapters Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chapters  $chapters
     * @return \Illuminate\Http\Response
     */
    public function show(Chapters $chapters)
    {
        return view('admin.chapters.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chapters  $chapters
     * @return \Illuminate\Http\Response
     */
    public function edit($chapters)
    {
        $course = Courses::all();
        $chapters = Chapters::find($chapters);
        return view('admin.chapters.edit', compact('chapters','course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chapters  $chapters
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $chapters)
    {
        DB::beginTransaction();
        try{
            $this->validate($request, [
                'name' => 'required',
                'courses_id'=> 'required'
            ]);
            $chapter = Chapters::find($chapters);
            $chapter->name = $request->input('name');
            $chapter->courses_id = $request->input('courses_id');
            $chapter->position = 0;
            $chapter->save();
            
        } catch (Exception $e) {
            DB::rollBack();
        }
        DB::commit();
        return Redirect::route('chapters.index')->with('success', 'Chapters Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chapters  $chapters
     * @return \Illuminate\Http\Response
     */
    public function destroy($chapters)
    {
        $Chapters = Chapters::find($chapters)->delete();
        return Redirect::route('chapters.index')->with('success', 'Chapters Deleted Successfully');
    }
}
