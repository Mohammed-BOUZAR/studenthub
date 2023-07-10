<?php

namespace App\Http\Controllers;


use App\Models\Material;
use App\Models\Noticeboard;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TeacherAuthController extends Controller
{
    // protected function redirectTo()
    // {
    //     if (auth()->guard('admin')->check()) {
    //         return '/admin/dashboard';
    //     } elseif (auth()->guard('teacher')->check()) {
    //         return '/teacher/dashboard';
    //     } elseif (auth()->guard('student')->check()) {
    //         return '/student/dashboard';
    //     } else {
    //         return '/';
    //     }
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teachers');
    }

    public function dashboard()
    {
        return view('teachers.dashboard');
    }

    public function teacherLogin()
    {
        return view('teacherlogin');
    }

    public function teacherSignup()
    {
        return view('teacher_signup');
    }

    public function change_password()
    {
        return view('teachers.change_password');
    }

    public function add_noticeboard()
    {
        return view('teachers.add_noticeboard');
    }

    public function add_result()
    {
        return view('teachers.add_result');
    }

    public function add_material()
    {
        return view('teachers.add_material');
    }

    public function add_quiz()
    {
        return view('teachers.add_quiz');
    }

    public function quiz_detail($id)
    {
        return view('teachers.quiz_detail', ['id' => $id]);
    }

    public function manage_noticeboard()
    {
        return view('teachers.manage_noticeboard');
    }

    public function update_noticeboard($id)
    {
        return view('teachers.update_noticeboard', ['id' => $id]);
    }

    public function manage_result()
    {
        return view('teachers.manage_result');
    }

    public function update_result($id)
    {
        return view('teachers.update_result', ['id' => $id]);
    }

    public function manage_material()
    {
        return view('teachers.manage_material');
    }

    public function update_material($id)
    {
        return view('teachers.update_material', ['id' => $id]);
    }

    public function manage_quiz()
    {
        return view('teachers.manage_quiz');
    }

    public function manage_quiz_result()
    {
        return view('teachers.manage_quiz_result');
    }

    public function update_teacher_profile()
    {
        return view('teachers.update_teacher_profile');
    }

    public function teacher_pending()
    {
        return view('teachers.teacher_pending');
    }

    public function teacher_profile()
    {
        return view('teachers.teacher_profile');
    }

    public function student_profile()
    {
        return view('teachers.student_profile');
    }

    public function add_department()
    {
        return view('teachers.add_department');
    }

    public function manage_department()
    {
        return view('teachers.manage_department');
    }

    public function add_session()
    {
        return view('teachers.add_session');
    }

    public function manage_session()
    {
        return view('teachers.manage_session');
    }

    public function add_semester()
    {
        return view('teachers.add_semester');
    }

    public function manage_semester()
    {
        return view('teachers.manage_semester');
    }

    public function login(Request $request)
    {
        try {
            // echo 'hna ko';
            if ($request->has('msg')) {
                $var = $request->input('msg');
                echo "<script>alert('$var')</script>";
            }

            if ($request->has('submit2')) {
                $value1 = $request->input('email');
                $value2 = $request->input('password');
                $data = Teacher::where('emailfld', $value1)->where('password', $value2)->get();
                $datarow = count($data);
                if ($datarow > 0) {
                    $row = $data[0];
                    $value3 = $row->id;
                    // $status = $row->status;
                    // if ($status == 0) {
                    //     echo "<script>alert('please wait while your account is authenticated')</script>";
                    //     exit();
                    // }
                    session(['tid' => $value3]);
                    return redirect('/teachers/dashboard');
                } else {
                    echo "<script>alert('Invalid information please try again')</script>";
                    return back()->with('error', 'Invalid information please try again!');
                }
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    public function logout(Request $request)
    {
        // Destroy the session
        session()->flush();

        // Redirect to the login page or any other desired page
        return redirect('/teachers/login');
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
        //
        $email = $request->input('email');
        $emailExists = Teacher::where('emailfld', $email)->first();
        if ($emailExists) {
            return back()->with('error', 'Email already exists');
        }

        $image = $request->file('img');
        $filename = $request->input('fname') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $folder = $image->storeAs('public/uploads', $filename);
        $path = 'uploads/' . $filename;

        $data = [
            'firstname' => $request->input('fname'),
            'lastname' => $request->input('lname'),
            'tecnumber' => $request->input('number'),
            'emailfld' => $email,
            'password' => $request->input('Cpass'),
            'gender' => $request->input('gender'),
            'dep' => $request->input('dep'),
            'img' => $path,
            'address' => $request->input('address'),
            'status' => 0
        ];

        DB::table('teachers')->insert($data);

        return redirect('/teachers/login')->with('success', 'Successfully Registered. Please wait for account approval');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        // return session('tid');
        return view('teachers.user_pro', [
            'teacher' => Teacher::join('departments', 'departments.id', '=', 'teachers.dep')
                ->where('teachers.id', session('tid'))
                ->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addQuiz(Request $request)
    {
        $quiz = new Quiz();
        $quiz->department = $request->input('dep');
        $quiz->subject = $request->input('subject');
        $quiz->session = $request->input('session');
        $quiz->semester = $request->input('semester');
        $quiz->quizdate = $request->input('date');
        $quiz->quiztitle = $request->input('quiztitle');
        $quiz->questions = $request->input('numberofqus');
        $quiz->quiztime = $request->input('timelimit');
        $quiz->save();

        return back()->with('success', 'Quiz added successfully');
    }

    public function deleteQuiz(Request $request, $id)
    {
        $quiz = Quiz::find($id);
        if ($quiz) {
            $quiz->delete();
            return back()->with('success', 'Deleted with successfully.');
        } else {
            return back()->with('error', 'Error.');
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $teacher = Teacher::find($id);;
        if ($request->oldpass == $teacher->password && $request->newpass == $request->cpass) {
            $teacher->password = $request->newpass;
            $teacher->save();

            return back()->with('success', 'Password updated successfully.');
        }
        return back()->with('warning', 'Incorrect password.');
    }


    public function addNoticeBoard(Request $request)
    {
        $folder = '/adm/NoticeBoardfiles/';
        $file = $request->file('fl');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($folder), $filename);




        $dis = $request->input('discription');
        $mydate = $request->input('datetime');

        $notice = new NoticeBoard();
        $notice->file = $folder . $filename;
        $notice->dis = $dis;
        $notice->ndatetime = $mydate;
        $notice->save();

        return back()->with('success', 'Notice Board added successfully.');
    }

    public function updateNoticeBoard(Request $request, $id)
    {
        $folder = '/adm/NoticeBoardfiles/';
        $file = $request->file('fl');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($folder), $filename);

        // $id = $request->get('value');
        $dis = $request->get('discription');
        $mydate = $request->get('datetime');

        $notice = Noticeboard::find($id);
        if ($notice) {
            $notice->file = $folder . $filename;
            $notice->dis = $dis;
            $notice->ndatetime = $mydate;
            $notice->save();
            return back()->with('success', 'Notice Board updated successfully.');
        } else {
            return back()->with('error', 'Invalid notice ID.');
        }
    }

    public function deleteNoticeBoard(Request $request, $id)
    {
        $notice = Noticeboard::find($id);
        if ($notice) {
            $notice->delete();
            return back()->with('success', 'Deleted with successfully.');
        } else {
            return back()->with('error', 'Error.');
        }
    }


    public function addMaterial(Request $request)
    {
        $folder = '/adm/material/';
        $file = $request->file('file');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($folder), $filename);

        $mydate = $request->input('date');

        $material = new Material();
        $material->file = $folder . $filename;
        $material->mdate = $mydate;

        $material->department = $request->input('dep');
        $material->subject = $request->input('subject');
        $material->session = $request->input('session');
        $material->semester = $request->input('semester');

        $material->save();

        return back()->with('success', 'Material added successfully.');
    }

    public function updateMaterial(Request $request, $id)
    {
        $folder = '/adm/material/';
        $file = $request->file('file');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($folder), $filename);

        $mydate = $request->input('date');

        $material = Material::find($id);
        $material->file = $folder . $filename;
        $material->mdate = $mydate;

        $material->department = $request->input('dep');
        $material->subject = $request->input('subject');
        $material->session = $request->input('session');
        $material->semester = $request->input('semester');

        $material->save();

        return back()->with('success', 'Material added successfully.');
    }

    public function deleteMaterial(Request $request, $id)
    {
        $material = Material::find($id);
        if ($material) {
            $material->delete();
            return back()->with('success', 'Deleted with successfully.');
        } else {
            return back()->with('error', 'Error.');
        }
    }

    public function addResult(Request $request)
    {
        $folder = '/adm/Resultfiles/';
        $file = $request->file('file');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($folder), $filename);

        $mydate = $request->input('date');

        $result = new Result();
        $result->file = $folder . $filename;
        $result->rdate = $mydate;

        $result->department = $request->input('dep');
        $result->session = $request->input('session');
        $result->semester = $request->input('semester');

        $result->save();

        return back()->with('success', 'Result added successfully.');
    }

    public function updateResult(Request $request, $id)
    {
        $folder = '/adm/Resultfiles/';
        $file = $request->file('file');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($folder), $filename);

        $mydate = $request->input('date');

        $result = Result::find($id);
        $result->file = $folder . $filename;
        $result->rdate = $mydate;

        $result->department = $request->input('dep');
        $result->session = $request->input('session');
        $result->semester = $request->input('semester');

        $result->save();

        return back()->with('success', 'Result updated successfully.');
    }

    public function deleteResult(Request $request, $id)
    {
        $result = Result::find($id);
        if ($result) {
            $result->delete();
            return back()->with('success', 'Deleted with successfully.');
        } else {
            return back()->with('error', 'Error.');
        }
    }
}
