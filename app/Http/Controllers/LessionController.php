<?php

namespace App\Http\Controllers;

use App\Lession;
use App\Courses;
use App\Chapters;
use App\DataTables\LessionDataTables;
use Illuminate\Http\Request;

use Redirect;
use DB;

class LessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LessionDataTables $dataTable)
    {
//        $lessions = Lession::with('chapter')->get();
//        return view('admin.lession.index', compact('lessions'));
        return $dataTable->render('admin.lession.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cource = Courses::all();
        $chapter = Chapters::all();
        return view('admin.lession.create', compact('cource','chapter'));
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
                'courses_id' => 'required',
                'chapter_id' => 'required',
                'name' => 'required',
            ]);
            if($request->input('video_url') != ''){
                $this->validate($request,[
                    'video_url' => 'url',
                    'video_length'=> 'required|numeric',
                    'video_width'=> 'required|numeric',
                    'video_height'=> 'required|numeric',
                ]);
            }
            $lession = new Lession();
            $lession->id = $this->get_primary_key('lession');
            $lession->chapter_id = $request->input('chapter_id');
            $lession->name = $request->input('name');
            $lession->description = $request->input('description');
            $lession->position = 0;
            $lession->video_url = $request->input('video_url');
            $lession->video_length = $request->input('video_length');
            $lession->video_width = $request->input('video_width');
            $lession->video_height = $request->input('video_height');
            $lession->save();
            
        } catch (Exception $e) {
            DB::rollBack();
            return Redirect::route('lession.index')->with('error', $e->getMessage());
        }
        DB::commit();
        return Redirect::route('lession.index')->with('success', 'Lession Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lession  $lession
     * @return \Illuminate\Http\Response
     */
    public function show($lession)
    {
        $lession = Lession::with('chapter')->find($lession);
        return view('admin.lession.show', compact('lession'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lession  $lession
     * @return \Illuminate\Http\Response
     */
    public function edit($lession)
    {
        $lession = Lession::with('chapter')->find($lession);
        $cource = Courses::all();
        $chapter = Chapters::all();
        return view('admin.lession.edit', compact('lession','cource','chapter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lession  $lession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lession)
    {
        DB::beginTransaction();
        try{
            $this->validate($request, [
                'courses_id' => 'required',
                'chapter_id' => 'required',
                'name' => 'required'
            ]);
            if($request->input('video_url') != ''){
                $this->validate($request,[
                    'video_url' => 'url',
                    'video_length'=> 'required|numeric',
                    'video_width'=> 'required|numeric',
                    'video_height'=> 'required|numeric',
                ]);
            }
            $lession = Lession::find($lession);
            $lession->chapter_id = $request->input('chapter_id');
            $lession->name = $request->input('name');
            $lession->description = $request->input('description');
            $lession->position = 0;
            $lession->video_url = $request->input('video_url');
            $lession->video_length = $request->input('video_length');
            $lession->video_width = $request->input('video_width');
            $lession->video_height = $request->input('video_height');
            $lession->save();
            
        } catch (Exception $e) {
            DB::rollBack();
            return Redirect::route('lession.index')->with('error', $e->getMessage());
        }
        DB::commit();
        return Redirect::route('lession.index')->with('success', 'Lession Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lession  $lession
     * @return \Illuminate\Http\Response
     */
    public function destroy($lession)
    {
        $lession = Lession::find($lession)->delete();
        return Redirect::route('lession.index')->with('success', 'Lession Deleted Successfully');
    }
    
    public function onchange_course(Request $request){
        $course_id = $request->input('course_id');
        $chapter = Chapters::where('courses_id',$course_id)->get();
        $chapter_html = '<option value="">Select Chapter</option>';
        foreach ($chapter as $ch){
            $chapter_html .= '<option value="'.$ch->id.'">'.$ch->name.'</option>';
        }
        return $chapter_html;
    }
}
