<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use DB;
use Redirect;
use View;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::all();
        return View::make('admin.contact.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'email'=> 'required',
                'phone'=> '',
                'comment_type'=> 'required',
                'comment'=> 'required',
            ]);
            
            $course = new Contact();
            $course->id = $this->get_primary_key('contact');
            $course->name = $request->input('name');
            $course->email = $request->input('email');
            $course->phone = $request->input('phone');
            $course->comment_type = $request->input('comment_type');
            $course->comment = $request->input('comment');
            $course->save();
            
        } catch (Exception $e) {
            DB::rollBack();
            return Redirect::route('support')->with('error', $e->getMessage());
        }
        DB::commit();
        return Redirect::route('support')->with('success', 'Comment Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($contact)
    {
        Contact::find($contact)->delete();
        return Redirect::url('admin/contact')->with('success', 'Comment Successfully Added');
    }
}
