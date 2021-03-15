<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function sandbox()
    {
        // 測試用
        return view('auth.login', ['response' => 'ok']);
    }

    public function index()
    {
        return view('index');
    }

    public function company()
    {
        return view('company');
    }

    public function service()
    {
        return view('template');
    }

    public function technology()
    {
        return view('template');
    }

    public function faq()
    {
        return view('template');
    }

    public function download()
    {
        return view('download');
    }

    public function contact()
    {
        return view('contact');
    }

}
