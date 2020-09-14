<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // to test controller connection status
    // public function index(){
    //     return 'INDEX';
    // }

    public function index(){
        $title = 'Welcome to Laravel!!';
        // 1st method
        // return view('pages.index', compact('title'));

        //2nd method
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'About Us';
        return view('pages.about', compact('title'));
    }

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }

    // 
    public function hw(){
        $title = 'Hello World';
        return view('pages.hw')->with('title', $title);
    }

    // 
    public function welcome(){
        $title = 'Welcome';
        return view('pages.welcome')->with('title', $title);
    }
}


