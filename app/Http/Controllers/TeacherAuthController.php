<?php

namespace App\Http\Controllers;

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
        //
        return view('teachers.dashboard');
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
                $data = DB::table('teachers')->where('emailfld', $value1)->where('password', $value2)->get();
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
                    return redirect('/teacher/dashboard');
                } else {
                    echo "<script>alert('Invalid information please try again')</script>";
                    return redirect()->back()->with('error', 'Invalid information please try again!');
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
        return redirect('/teacherlogin');
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
        $emailExists = DB::table('teachers')->where('emailfld', $email)->exists();
        if ($emailExists) {
            return redirect()->back()->withErrors(['email' => 'Email already exists']);
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

        return redirect('/teacherlogin')->with('success', 'Successfully Registered. Please wait for account approval');
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
}
