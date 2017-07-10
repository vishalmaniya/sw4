<?php

namespace App\Http\Controllers;

use App\Questions;
use App\Lession;
use App\QuestionAnswer;
use App\AnswerOption;
use Illuminate\Http\Request;
use App\DataTables\QuestionsDataTables;
use App\User;
use App\UserScore;
use App\Courses;
use App\Exam;

use DB;
use Redirect;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(QuestionsDataTables $dataTable)
    {
        //$questions = Questions::with('lession','question_join')->get();
        return $dataTable->render('admin.questions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lession = Lession::all();
        return view('admin.questions.create', compact('lession'));
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
                'lession_id' => 'required',
                'type'=> 'required',
                'question' => 'required',
                'description' => 'required',
                'points_correct' => 'required|numeric',
                'points_incorrect' => 'required|numeric',
                'hint_points' => 'required|numeric',
                'hint1' => 'required',
                'hint2' => 'required',
                'hint3' => 'required',
            ]);
            if($request->input('type') == 'chapter_review'){
                $this->validate($request, [
                    'language' => 'required',
                    'answer_type'=> 'required',
                    'answer_text'=> 'required',
                    'default'=> 'required',
                ]);
            }else if($request->input('type') == 'multichoise'){
                $this->validate($request, [
                    'answer' => 'required',
                    'option1'=> 'required',
                    'option2'=> 'required',
                    'option3'=> 'required',
                    'option4'=> 'required',
                    'option5'=> 'required',
                ]);
            }else if($request->input('type') == 'textarea'){
                $this->validate($request, [
                    'language' => 'required',
                    'answer_type'=> 'required',
                    'answer_text'=> 'required',
                    'default'=> 'required',
                ]);
            }

            $questions = new Questions();
            $questions->id = $this->get_primary_key('questions');
            $questions->lession_id = $request->input('lession_id');
            $questions->description = $request->input('description');
            $questions->position = 0;
            $questions->type = $request->input('type');
            $questions->points = $request->input('points_correct');
            $questions->hint_point = $request->input('hint_points');
            $questions->hint_1 = $request->input('hint1');
            $questions->hint_2 = $request->input('hint2');
            $questions->hint_3 = $request->input('hint3');
            $questions->save();

            if($request->input('type') == 'chapter_review'){
                $questionAnswer = new QuestionAnswer();
                $questionAnswer->id = $this->get_primary_key('question_answer');
                $questionAnswer->questions_id = $questions->id;
                $questionAnswer->question = $request->input('question');
                $questionAnswer->language = $request->input('language');
                $questionAnswer->answer = $request->input('answer_text');
                $questionAnswer->type = $request->input('answer_type');
                $questionAnswer->point_correct = $request->input('points_correct');
                $questionAnswer->point_incorrect = $request->input('points_incorrect');
                $questionAnswer->default_val = $request->input('default');
                $questionAnswer->save();

            }else if($request->input('type') == 'multichoise'){
                $questionAnswer = new QuestionAnswer();
                $questionAnswer->id = $this->get_primary_key('question_answer');
                $questionAnswer->questions_id = $questions->id;
                $questionAnswer->question = $request->input('question');
                $questionAnswer->language = '';
                $questionAnswer->answer = $request->input('answer');
                $questionAnswer->type = '';
                $questionAnswer->point_correct = $request->input('points_correct');
                $questionAnswer->point_incorrect = $request->input('points_incorrect');
                $questionAnswer->default_val = '';
                $questionAnswer->save();

                $answerOption = new AnswerOption();
                $answerOption->id = $this->get_primary_key('answer_option');
                $answerOption->question_answer_id = $questionAnswer->id;
                $answerOption->option1 = $request->input('option1');
                $answerOption->option2 = $request->input('option2');
                $answerOption->option3 = $request->input('option3');
                $answerOption->option4 = $request->input('option4');
                $answerOption->option5 = $request->input('option5');
                $answerOption->save();

            }else if($request->input('type') == 'textarea'){
                $questionAnswer = new QuestionAnswer();
                $questionAnswer->id = $this->get_primary_key('question_answer');
                $questionAnswer->questions_id = $questions->id;
                $questionAnswer->question = $request->input('question');
                $questionAnswer->language = $request->input('language');
                $questionAnswer->answer = $request->input('answer_text');
                $questionAnswer->type = $request->input('answer_type');
                $questionAnswer->point_correct = $request->input('points_correct');
                $questionAnswer->point_incorrect = $request->input('points_incorrect');
                $questionAnswer->default_val = $request->input('default');
                $questionAnswer->save();
            }
        
        } catch (Exception $e) {
            DB::rollBack();
            return Redirect::route('questions.index')->with('error', $e->getMessage());
        }
        DB::commit();
        return Redirect::route('questions.index')->with('success', 'Questions Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function show($questions)
    {
        $questions = Questions::with('lession','question_join')->find($questions);
        return view('admin.questions.show', compact('questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function edit($questions)
    {
        $lession = Lession::all();
        $question = Questions::with('lession','question_join')->find($questions);
        return view('admin.questions.edit', compact('question','lession'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $questions)
    {
        DB::beginTransaction();
        try{
            $this->validate($request, [
                'lession_id' => 'required',
                'type'=> 'required',
                'question' => 'required',
                'description' => 'required',
                'points_correct' => 'required|numeric',
                'points_incorrect' => 'required|numeric',
                'hint_points' => 'required|numeric',
                'hint1' => 'required',
                'hint2' => 'required',
                'hint3' => 'required',
            ]);
            if($request->input('type') == 'chapter_review'){
                $this->validate($request, [
                    'language' => 'required',
                    'answer_type'=> 'required',
                    'answer_text'=> 'required',
                    'default'=> 'required',
                ]);
            }else if($request->input('type') == 'multichoise'){
                $this->validate($request, [
                    'answer' => 'required',
                    'option1'=> 'required',
                    'option2'=> 'required',
                    'option3'=> 'required',
                    'option4'=> 'required',
                    'option5'=> 'required',
                ]);
            }else if($request->input('type') == 'textarea'){
                $this->validate($request, [
                    'language' => 'required',
                    'answer_type'=> 'required',
                    'answer_text'=> 'required',
                    'default'=> 'required',
                ]);
            }
            
            $questions = Questions::with('question_join')->find($questions);
            $questions->lession_id = $request->input('lession_id');
            $questions->description = $request->input('description');
            $questions->position = 0;
            $questions->type = $request->input('type');
            $questions->points = $request->input('points_correct');
            $questions->hint_point = $request->input('hint_points');
            $questions->hint_1 = $request->input('hint1');
            $questions->hint_2 = $request->input('hint2');
            $questions->hint_3 = $request->input('hint3');
            $questions->save();
            
            if($request->input('type') == 'chapter_review'){
                $questionAnswer = QuestionAnswer::find($questions->question_join->id);
                $questionAnswer->questions_id = $questions->id;
                $questionAnswer->question = $request->input('question');
                $questionAnswer->language = $request->input('language');
                $questionAnswer->answer = $request->input('answer_text');
                $questionAnswer->type = $request->input('answer_type');
                $questionAnswer->point_correct = $request->input('points_correct');
                $questionAnswer->point_incorrect = $request->input('points_incorrect');
                $questionAnswer->default_val = $request->input('default');
                $questionAnswer->save();

            }else if($request->input('type') == 'multichoise'){
                $questionAnswer = QuestionAnswer::find($questions->question_join->id);
                $questionAnswer->questions_id = $questions->id;
                $questionAnswer->question = $request->input('question');
                $questionAnswer->language = '';
                $questionAnswer->answer = $request->input('answer');
                $questionAnswer->type = '';
                $questionAnswer->point_correct = $request->input('points_correct');
                $questionAnswer->point_incorrect = $request->input('points_incorrect');
                $questionAnswer->default_val = '';
                $questionAnswer->save();

                $answerOption = AnswerOption::find($questions->question_join->option->id);
                $answerOption->question_answer_id = $questionAnswer->id;
                $answerOption->option1 = $request->input('option1');
                $answerOption->option2 = $request->input('option2');
                $answerOption->option3 = $request->input('option3');
                $answerOption->option4 = $request->input('option4');
                $answerOption->option5 = $request->input('option5');
                $answerOption->save();

            }else if($request->input('type') == 'textarea'){
                $questionAnswer = QuestionAnswer::find($questions->question_join->id);
                $questionAnswer->questions_id = $questions->id;
                $questionAnswer->question = $request->input('question');
                $questionAnswer->language = $request->input('language');
                $questionAnswer->answer = $request->input('answer_text');
                $questionAnswer->type = $request->input('answer_type');
                $questionAnswer->point_correct = $request->input('points_correct');
                $questionAnswer->point_incorrect = $request->input('points_incorrect');
                $questionAnswer->default_val = $request->input('default');
                $questionAnswer->save();
            }
        
        } catch (Exception $e) {
            DB::rollBack();
            return Redirect::route('questions.index')->with('error', $e->getMessage());
        }
        DB::commit();
        return Redirect::route('questions.index')->with('success', 'Questions Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function destroy($questions)
    {
        $questions = Questions::find($questions)->delete();
        return Redirect::route('questions.index')->with('success', 'Questions Deleted Successfully');
    }
    
    public function unlock_question_view(){
        $users = User::with('roles')->leftJoin('role_users', 'role_users.user_id', '=', 'users.id')->whereNotIn('role_users.role_id',[4,1])->get();
        return view('admin.answer.index', compact('users'));
    }
    
    public function get_question(Request $request){
        $user_id = $request->input('user_id');
        $user_score = UserScore::where('user_id',$user_id)->get();
        $course_id = array();
        foreach($user_score as $class){
            array_push($course_id, $class->course_id);
        }
        $course = Courses::with('category','chapter')->whereIn('id',$course_id)->orderBy('position')->get();
        $option = '';
        foreach($course as $cor){
            foreach($cor->chapter as $ch){
                foreach($ch->lessons as $less){
                    foreach($less->questions as $que){
                        $option .= "<option value='".$que->id."'>".$cor->name . " -> " . $ch->name . " -> " . $less->name . " -> Question" . ($que->position +1)."</option>";
                    }
                }
            }
        }
        return $option;
    }
    
    public function unlock_question(Request $request){
        
        $question_id = $request->input('question_id');
        $user_id = $request->input('user_id');
        $exam = new Exam();
        $exam->id = $this->get_primary_key('exam');
        $exam->question_id = $question_id;
        $exam->user_id = $user_id;
        $exam->score = 0;
        $exam->hint_use = 0;
        $exam->status = 0;
        $exam->start_time = date('H:i:s', strtotime(date('Y-m-d H:i:s')));
        $exam->end_time = '00:00:00';
        $exam->save();
        return Redirect::route('unlock_question_view')->with('success', 'Questions Unlock Successfully');
    }
}
