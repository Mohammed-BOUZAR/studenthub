<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentAuthController extends Controller
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
        //
        return view('students.dashboard');
    }

    public function login(Request $request)
    {
        if ($request->has('msg')) {
            $var = $request->input('msg');
            echo "<script>alert('$var')</script>";
        }

        if ($request->has('submit2')) {
            $value1 = $request->input('email');
            $value2 = $request->input('password');
            $data = DB::table('students')->where('stdemail', $value1)->where('password', $value2)->get();
            $datarow = count($data);
            if ($datarow > 0) {
                $row = $data[0];
                $value3 = $row->id;
                session(['sid' => $value3]);
                return redirect('/student/dashboard');
            } else {
                echo "<script>alert('Invalid information please try again')</script>";
                return redirect()->back()->with('error', 'Invalid information please try again!');
            }
        }
    }

    public function logout(Request $request)
    {
        // Destroy the session
        session()->flush();

        // Redirect to the login page or any other desired page
        return redirect('/studentlogin');
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
        $emailExists = DB::table('students')->where('stdemail', $email)->exists();
        if ($emailExists) {
            return redirect()->back()->withErrors(['email' => 'Email already exists']);
        }

        $image = $request->file('img');
        $filename = $request->input('fname') . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $folder = $image->storeAs('public/suploads', $filename);
        $path = 'suploads/' . $filename;

        $data = [
            'firstname' => $request->input('fname'),
            'lastname' => $request->input('lname'),
            'fathername' => $request->input('ffname'),
            'rollnum' => $request->input('rollnum'),
            'password' => $request->input('Cpass'),
            'stdemail' => $email,
            'session' => $request->input('session'),
            'gender' => $request->input('gender'),
            'dep' => $request->input('dep'),
            'snumber' => $request->input('number'),
            'img' => $path,
            'address' => $request->input('address')
        ];

        DB::table('students')->insert($data);

        return redirect('studentlogin')->with('success', 'You are successfully registered');
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
        return view('students.user_pro', [
            'student' => Student::join('departments', 'departments.id', '=', 'students.dep')
                ->where('students.id', session('sid'))
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
    public function updatePassword(Request $request, $id)
    {
        $student = Student::find($id);
        if ($request->oldpass == $student->password && $request->newpass == $request->cpass) {
            $student->password = $request->newpass;
            $student->save();

            return back()->with('success', 'Password updated successfully.');
        }
        return back()->with('warning', 'Incorrect password.');
    }

    public function quizDetail(Request $request)
    {
        return view('students.quiz_details', [
            'dep' => $request->dep,
            'session' => $request->session,
            'semester' => $request->semester,
            'subject' => $request->subject
        ]);
    }
}
