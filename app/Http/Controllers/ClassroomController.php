<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use App\DataTables\ClassroomDataTables;
use App\Classroom;
use App\Courses;
use App\User;
use App\UserScore;
use Sentinel;
use Hash;
use Redirect;
use Response;

use DB;

class ClassroomController extends Controller
{
    public function index(ClassroomDataTables $dataTable){
        return $dataTable->render('admin.classroom.index');
    }
    
    public function create(){
        $role = Sentinel::findRoleById(3);
        $users = $role->users()->with('roles')->get();
        $courses = Courses::all();
        $school = User::leftJoin('role_users', 'role_users.user_id', '=', 'users.id')->where('role_users.role_id',4)->get();
        return view('admin.classroom.create', compact('users','courses','school'));
    }
    
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            if($request->get('new_teacher') == 'true')
            {
                $objteacher = new User();
                $objteacher->id = $this->get_primary_key('users');
                $username = $request->get('name')."_".mt_rand(1000, 9999);
                $objteacher->user_name = $username;
                $objteacher->password = Hash::make($username);
                $objteacher->save();
                $teacherid = $objteacher->id;

                $role = Sentinel::findRoleById(3);
                if ($role) {
                    $role->users()->attach($objteacher);
                }

                $activation = Activation::create($objteacher);
                Activation::complete($objteacher, $activation->code);
            }
            else
            {
                $teacherid = $request->get('old_teacher');
            }

            $objclassroom = new Classroom();
            $objclassroom->id = $this->get_primary_key('classroom');
            $objclassroom->name = $request->get('name');
            $objclassroom->expire_date = date('Y-m-d',strtotime($request->get('expiry_date')));
            $objclassroom->timezone = $request->get('timezone');
            $objclassroom->teacher_id = $teacherid;
            $objclassroom->school_id = $request->input('school_name');
            $objclassroom->no_of_student = $request->get('no_of_student');
            if($objclassroom->save())
            {
                $totalstudent = $request->get('no_of_student');
                for($i = 0;$i < $totalstudent; $i++)
                {
                    $unique_id = $this->get_primary_key1('users').$i;
                    $objstudent = new User();
                    $objstudent->id = $unique_id;
                    $username = $request->get('name')."_".mt_rand(1000, 9999);
                    $objstudent->user_name = $username;
                    $objstudent->password = Hash::make($username);
                    $objstudent->save();
                    $studentid = $objstudent->id;

                    $role = Sentinel::findRoleById(2);
                    if ($role) {
                        $role->users()->attach($objstudent);
                    }

                    $activation = Activation::create($objstudent);
                    Activation::complete($objstudent, $activation->code);

                    $totalcourse = sizeof($request->get('courses'));
                    $allcourse = $request->get('courses');
                    for ($j=0; $j < $totalcourse; $j++) 
                    { 
                        $user_score = new UserScore();
                        $user_score->id = $this->get_primary_key('user_score');
                        $user_score->user_id = $studentid;
                        $user_score->classroom_id = $objclassroom->id;
                        $user_score->course_id = $allcourse[$j];
                        $user_score->badget_id = 0;
                        $user_score->score = 0;
                        $user_score->completed = 0;
                        $user_score->save();

                        //for teacher
                        $user_score = new UserScore();
                        $user_score->id = $this->get_primary_key('user_score');
                        $user_score->user_id = $teacherid;
                        $user_score->classroom_id = $objclassroom->id;
                        $user_score->course_id = $allcourse[$j];
                        $user_score->badget_id = 0;
                        $user_score->score = 0;
                        $user_score->completed = 0;
                        $user_score->save();

                    }
                }
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return Redirect::route('classroom.index')->with('error', 'Please Try again');
        }
        DB::commit();
        return Redirect::route('classroom.index')->with('success', 'Classroom is Successfully created');
    }
    
    public function edit($classroom){
        $classrooms = Classroom::with('user','teacher')->where('id',$classroom)->first();
        echo '<pre>';
        print_r($classrooms);
        exit;
    }
    
    public function update(){
        
    }
    
    public function csv_download(){
        
        $filename = public_path()."/Sample_csv.csv";
        $headers = array(
            'Content-Type' => 'text/csv',
        );
        return Response::download($filename, 'Sample_csv.csv', $headers);
    }
    
    public function show(){
        $classrooms = Classroom::with('user','teacher')->where('id',$classroom)->first();
        echo '<pre>';
        print_r($classrooms);
        exit;
    }
    
    public function get_primary_key1($table){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $time = time();
        $split = str_split($randomString,3);
        
        $sring = $split[0].$time.$split[1];
        
        $old_id = DB::table($table)->where('id',$sring)->select('id')->first();
        if(!empty($old_id)){
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 6; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            $time = time();
            $split = str_split($randomString,3);
            $sring1 = $split[0].$time.$split[1];
            if($sring == $sring1){
               $sring = $this->get_primary_key($table);
            }
        }
        return $sring;
    }
    
    public function csv_update(){
        return view('admin.classroom.csv_update');
    }
    public function update_classroom(Request $request){
        $src = $_FILES['file']['tmp_name'];
        $name1 = time().'.csv';
        $content = file_get_contents($src);
        $orig_filepath = public_path().'/uploads/update_csv' . '/'.$name1;
        file_put_contents($orig_filepath, $content);
        $row = 1;
        $student = 0;
        $arr = array();
        if (($handle = fopen($orig_filepath, "r")) !== FALSE) {
          while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { // loop for row.
            $num = count($data);// $num is number of field $row is row number,
            //echo "<p> $num fields in line $row: <br /></p>\n";
            if($num != 5){
                return Redirect::route('classroom.index')->with('error', 'given csv file is not valid format please refer given format');
            }
            $row++;
            for ($c=0; $c < $num; $c++) { // loop for column
                if($row == 2){
                    if($data[0] != 'CLASSROOM_ID'){
                        return Redirect::route('classroom.index')->with('error', 'given csv file is not valid format please refer given format');
                    }
                    if($data[1] != 'USERID'){
                        return Redirect::route('classroom.index')->with('error', 'given csv file is not valid format please refer given format');
                    }
                    if($data[2] != 'USERLEVEL'){
                        return Redirect::route('classroom.index')->with('error', 'given csv file is not valid format please refer given format');
                    }
                    if($data[3] != 'USERNAME'){
                        return Redirect::route('classroom.index')->with('error', 'given csv file is not valid format please refer given format');
                    }
                    if($data[4] != 'EXPIRY_DATE'){
                        return Redirect::route('classroom.index')->with('error', 'given csv file is not valid format please refer given format');
                    }
                }else{
                    if($c == 0){
                        $arr[$row-3]['CLASSROOM_ID'] = $data[0];
                    }
                    if($c == 1){
                        $arr[$row-3]['USERID'] = $data[1];
                    }
                    if($c == 2){
                        if($data[2] == 'student'){
                            $student++;
                        }
                        $arr[$row-3]['USERLEVEL'] = $data[2];
                    }
                    if($c == 3){
                        $arr[$row-3]['USERNAME'] = $data[3];
                    }
                    if($c == 4){
                        $arr[$row-3]['EXPIRY_DATE'] = $data[4];
                    }
                }
            }
          }
          $responce = $this->update_classroom_data($arr);
          if($responce){
              return Redirect::route('classroom.index')->with('success', 'Category Added Successfully');
          }else{
              return Redirect::route('classroom.index')->with('error', 'getting some error Please try again and check example csv format');
          }
          fclose($handle);
        }
    }
    
    public function update_classroom_data($arr){
        DB::beginTransaction();
        try{
            foreach($arr as $val){
                $objclassroom = Classroom::where('id',$val['CLASSROOM_ID'])->first();
                $objclassroom->expire_date = date('Y-m-d',strtotime($val['EXPIRY_DATE']));
                $objclassroom->save();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return 0;
        }
        DB::commit();
        return 1;
    }
}
