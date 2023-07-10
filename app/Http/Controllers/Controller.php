<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }
    
    public function subscribe(Request $request)
    {
        $sub = new Subscribe();
        $sub->emails = $request->input('Subscribe');
        $sub->save();
        return back()->with('success', 'Subscribed with successfully');
    }
}
