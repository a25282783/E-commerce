<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Company;
use App\Contact;
use App\Faq;
use App\File;
use App\Footer;
use App\Message;
use App\News;
use App\Product;
use App\Service;
use App\Tech;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        auth()->login(User::find(1));
        dd(auth()->check());
    }

    public function index(Request $request)
    {
        $new_product = Product::orderBy('id', 'desc')->limit(6)->get();
        $banner = Banner::all();
        $all_category = Category::select('id', 'name')->orderBy('id', 'desc')->limit(7)->get();

        if ($request->has('cate')) {
            $all_product = Product::where('category_id', $request->input('cate'))
                ->orderBy('id', 'asc')
                ->get();
            foreach ($all_category as $value) {
                if ($value->id == $request->input('cate')) {
                    $value->tagClass = 'text-dark';
                } else {
                    $value->tagClass = 'text-muted text-hover-dark';
                }
            }
            $tagClassAll = 'text-muted text-hover-dark';
        } else {
            $all_product = Product::orderBy('id', 'asc')->get();
            $tagClassAll = 'text-dark';
        }

        return view('index', compact('new_product', 'banner', 'all_product', 'all_category', 'tagClassAll'));
    }

    public function company()
    {
        $data['data'] = Company::first();
        abort_if(!$data['data'], 404);
        return view('company', $data);
    }

    public function service()
    {
        $data['data'] = Service::first();
        abort_if(!$data['data'], 404);
        $data['main'] = 'Service';
        return view('template', $data);
    }

    public function technology()
    {
        $data['data'] = Tech::first();
        abort_if(!$data['data'], 404);
        $data['main'] = 'Technology';
        return view('template', $data);
    }

    public function faq()
    {
        $data['data'] = Faq::first();
        abort_if(!$data['data'], 404);
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
        abort_if(!$data['data'], 404);
        return view('contact', $data);
    }

    public function contactPost(Request $request)
    {
        Message::create($request->all());
        return back()->with('msg', 'Send Successfully!');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'mobile' => ['required', 'numeric'],
            'address' => ['required'],
        ]);
        $data = $request->all();
        Auth::user()->update([
            'name' => $data['first_name'] . ' ' . $data['last_name'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'mobile' => $data['mobile'],
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip_code' => $data['zip_code'],
            'country' => $data['country'],
        ]);
        return back();
    }

    public function order_list()
    {
        $data['data'] = Auth::user()->orders()->orderBy('id', 'desc')->paginate(10);
        return view('order_list', $data);
    }

    public function order_list_detail($id)
    {
        $order = Auth::user()->orders()->find($id);
        abort_if(!$order, 404);
        $receipt = $order->receipt;
        return view('order_list_detail', ['order' => $order, 'receipt' => $receipt]);
    }

    public function footer($theme)
    {
        $data = Footer::first();
        abort_if(!$data, 404);
        return view('footer_terms', ['data' => $data]);
    }

    public function news()
    {
        $data = News::orderBy('id', 'desc')->paginate(6);
        return view('news', ['data' => $data]);
    }

    public function news_show($id)
    {
        $data = News::find($id);
        abort_if(!$data, 404);
        return view('news_show', ['data' => $data]);
    }

    public function search(Request $request)
    {
        $data = Product::where('name', 'like', "%{$request->input('p')}%")
            ->orWhere('intro', 'like', "%{$request->input('p')}%")
            ->get();
        return view('search', ['data' => $data]);
    }

}
