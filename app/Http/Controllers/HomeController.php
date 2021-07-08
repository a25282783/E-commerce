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
use Illuminate\Support\Facades\Hash;

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
        dd(Hash::check('w23452345w', '$2y$10$mYtx0y9mQOy4V6eWdiRJyupZuwkCXzAcnTJvtenOtlYImV1bixEYO'));
        auth()->logout();
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
            'name' => ['required', 'string'],
            'mobile' => ['required', 'numeric'],
        ]);
        Auth::user()->update($request->all());
        return back()->with('status', '修改個人資訊成功');
    }

    public function order_list()
    {
        $data['data'] = Auth::user()->orders()->orderBy('id', 'desc')->get();
        return view('order_list', $data);
    }

    public function order_list_detail($id)
    {
        $order = Auth::user()->orders()->with('products')->findOrFail($id);
        $receipt = $order->receipt;
        return view('order_list_detail', compact('order', 'receipt'));
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

    public function password_update(Request $request)
    {
        $request->validate([
            'old_password' => ['required', 'string', function ($attribute, $value, $fail) use ($request) {
                if (!Hash::check($request->input('old_password'), auth()->user()->password)) {
                    $fail('舊密碼有誤');
                }
            }],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
        ], [
            'old_password.required' => '舊密碼為必填',
            'password.required' => '新密碼為必填',
            'password.confirmed' => '確認密碼不一致',
            'password.min' => '新密碼至少8個字元',
        ]);
        $data = $request->all();
        Auth::user()->update([
            'password' => bcrypt($data['password']),
        ]);
        return back()->with('status', '修改密碼成功');
    }

}
