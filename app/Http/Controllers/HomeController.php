<?php

namespace App\Http\Controllers;

use App\Company;
use App\Contact;
use App\Faq;
use App\File;
use App\Message;
use App\Service;
use App\Tech;
use Illuminate\Http\Request;

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
        $data['data'] = Company::first();
        return view('company', $data);
    }

    public function service()
    {
        $data['data'] = Service::first();
        $data['main'] = 'Service';
        return view('template', $data);
    }

    public function technology()
    {
        $data['data'] = Tech::first();
        $data['main'] = 'Technology';
        return view('template', $data);
    }

    public function faq()
    {
        $data['data'] = Faq::first();
        $data['main'] = 'Faq';
        return view('template', $data);
    }

    public function download()
    {
        $data['data'] = File::orderBy('id', 'desc')->paginate(10);
        return view('download', $data);
    }

    public function contact()
    {
        $data['data'] = Contact::first();
        return view('contact', $data);
    }

    public function contactPost(Request $request)
    {
        Message::create($request->all());
        return back()->with('msg', 'Send Successfully!');
    }

}
