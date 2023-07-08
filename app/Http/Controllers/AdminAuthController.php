<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Department;
use App\Models\Material;
use App\Models\Noticeboard;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\Semester;
use App\Models\Session;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminAuthController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('home');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $admin = Admin::where('username', $username)
            ->where('password', $password)
            ->first();

        // Replace $value1, $value2, $value3 with the actual values

        if ($username && $password && $admin) {
            session(['id' => $request->input('password')]);
            return redirect('/admin/dashboard'); // Replace 'dashboard' with your actual route name
        } else {
            return redirect()->back()->with('error', 'Wrong information, please try again!');
        }
    }

    public function logout(Request $request)
    {
        // Destroy the session
        session()->flush();

        // Redirect to the login page or any other desired page
        return redirect('admin/');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request)
    {
        if ($request->hasFile('img')) {
            $folder = '/profile_picture/';
            $file = $request->file('img');
            $filename = uniqid() . $file->getClientOriginalName();
            $target = $folder . $filename;

            $filetype = strtolower($file->getClientOriginalExtension());
            if (!in_array($filetype, ['jpg', 'jpeg', 'png'])) {
                return back()->with('error', 'File is not an image');
            }

            $size = $file->getSize();
            if ($size > 2097152) {
                return back()->with('error', 'File is larger than 2MB');
            }

            $file->move(public_path($folder), $filename);
        }

        $data = DB::table('admins')->first();
        $oldpassdata = $data->password;
        $oldpass = $request->input('oldpass');
        $username = $request->input('username');
        $newpassword = $request->input('newpassword');
        $cnewpassword = $request->input('cnewpassword');

        if ($oldpassdata != $oldpass) {
            return back()->with('error', 'Current password incorrect');
        }

        if ($cnewpassword != $newpassword) {
            return back()->with('error', 'Passwords do not match');
        }

        if (isset($target)) {
            if (file_exists($data->img)) {
                unlink($data->img);
            }
            $img = $target;
        } else {
            $img = $data->img;
        }

        DB::table('admins')->update([
            'username' => $username,
            'password' => $cnewpassword,
            'img' => $img
        ]);

        session()->forget('id');

        return back()->with('success', 'Profile successfully updated');
    }

    public function addDepartment(Request $request)
    {
        $department = $request->input('department');

        DB::table('departments')->insert([
            'depname' => $department
        ]);

        return back()->with('success', 'New department added successfully');
    }

    public function addSession(Request $request)
    {
        $dep = $request->input('dep');
        $sec = $request->input('session');

        DB::table('sessions')->insert([
            'session' => $sec,
            'department' => $dep
        ]);

        return back()->with('success', 'Session added successfully');
    }

    public function addSemester(Request $request)
    {
        $dep = $request->input('dep');
        $sess = $request->input('session');
        $semester = $request->input('semester');

        DB::table('semesters')->insert([
            'semester' => $semester,
            'session' => $sess,
            'department' => $dep
        ]);

        return back()->with('success', 'Semester added successfully');
    }

    public function addSubject(Request $request)
    {
        $subject = $request->input('subject');
        $dep = $request->input('dep');
        $sess = $request->input('session');
        $semester = $request->input('semester');

        DB::table('subjects')->insert([
            'sname' => $subject,
            'department' => $dep,
            'session' => $sess,
            'semester' => $semester
        ]);

        return back()->with('success', 'Subject added successfully');
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
            return redirect()->back()->with('success', 'Deleted with successfully.');
        } else {
            return redirect()->back()->with('error', 'Error.');
        }
    }

    public function approveTeacher(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        if ($teacher != null) {
            $teacher->status = 1;
            $teacher->save();
            return back()->with('success', 'Approved with successfully');
        } else {
            return back()->with('warning', 'Error');
        }
    }

    public function approveTeacherDelete(Request $request, $id)
    {
        $teacher = Teacher::find($id);

        if ($teacher != null) {
            $teacher->delete();
            return back()->with('success', 'Deleted with successfully');
        } else {
            return back()->with('warning', 'Error');
        }
    }

    public function updateDepartment(Request $request, $id)
    {
        $dep = Department::find($id);

        if ($dep != null) {
            $dep->depname = $request->department;
            $dep->save();
            return back()->with('success', 'Updated with successfully');
        } else {
            return back()->with('warning', 'Error');
        }
    }

    public function deleteDepartment(Request $request, $id)
    {
        $dep = Department::find($id);

        if ($dep != null) {
            $dep->delete();
            return back()->with('success', 'Deleted with successfully');
        } else {
            return back()->with('warning', 'Error');
        }
    }

    public function updateSession(Request $request, $id)
    {
        $session = Session::find($id);

        if ($session != null) {
            $session->session = $request->session;
            $session->save();
            return back()->with('success', 'Updated with successfully');
        } else {
            return back()->with('warning', 'Error');
        }
    }

    public function deleteSession(Request $request, $id)
    {
        $session = Session::find($id);

        if ($session != null) {
            $session->delete();
            return back()->with('success', 'Deleted with successfully');
        } else {
            return back()->with('warning', 'Error');
        }
    }

    public function updateSemester(Request $request, $id)
    {
        $semester = Semester::find($id);

        if ($semester != null) {
            $semester->semester = $request->semester;
            $semester->save();
            return back()->with('success', 'Updated with successfully');
        } else {
            return back()->with('warning', 'Error');
        }
    }

    public function deleteSemester(Request $request, $id)
    {
        $semester = Semester::find($id);

        if ($semester != null) {
            $semester->delete();
            return back()->with('success', 'Deleted with successfully');
        } else {
            return back()->with('warning', 'Error');
        }
    }

    public function updateSubject(Request $request, $id)
    {
        $subject = Subject::find($id);

        if ($subject != null) {
            $subject->sname = $request->subject;
            $subject->save();
            return back()->with('success', 'Updated with successfully');
        } else {
            return back()->with('warning', 'Error');
        }
    }

    public function deleteSubject(Request $request, $id)
    {
        $subject = Subject::find($id);

        if ($subject != null) {
            $subject->delete();
            return back()->with('success', 'Deleted with successfully');
        } else {
            return back()->with('warning', 'Error');
        }
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
            return redirect()->back()->with('success', 'Deleted with successfully.');
        } else {
            return redirect()->back()->with('error', 'Error.');
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

    public function deleteMaterial(Request $request, $id)
    {
        $material = Material::find($id);
        if ($material) {
            $material->delete();
            return redirect()->back()->with('success', 'Deleted with successfully.');
        } else {
            return redirect()->back()->with('error', 'Error.');
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
            return redirect()->back()->with('success', 'Deleted with successfully.');
        } else {
            return redirect()->back()->with('error', 'Error.');
        }
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
}
