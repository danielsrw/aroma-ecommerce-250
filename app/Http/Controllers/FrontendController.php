<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\PostCategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\PostTag;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Post;
use App\Models\Cart;
use App\Models\User;
use Newsletter;
use Session;
use Auth;
use Hash;
use DB;

class FrontendController extends Controller
{
    public function login()
    {
        return view('user.pages.auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $data= $request->all();
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'status'=>'active'])){
            Session::put('user',$data['email']);
            request()->session()->flash('success','Successfully login');
            return redirect()->route('home');
        }
        else{
            request()->session()->flash('error','Invalid email and password pleas try again!');
            return redirect()->back();
        }
    }

    public function logout(){
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success','Logout successfully');
        return back();
    }

    public function register()
    {
        return view('user.pages.auth.register');
    }

    public function create(array $data){
        return User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'status'=>'active'
        ]);
    }

    public function registerSubmit(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'name'=>'string|required|min:2',
            'email'=>'string|required|unique:users,email',
            'password'=>'required|min:6|confirmed',
        ]);
        $data=$request->all();
        // dd($data);
        $check = $this->create($data);
        Session::put('user',$data['email']);
        if($check){
            request()->session()->flash('success','Successfully registered');
            return redirect()->route('home');
        }
        else{
            request()->session()->flash('error','Please try again!');
            return back();
        }
    }

    public function home()
    {
        $featured = Product::where('status','active')->where('is_featured',1)->orderBy('price','DESC')->limit(2)->get();
        $posts = Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $banners = Banner::where('status','active')->limit(3)->orderBy('id','DESC')->get();
        $product_lists = Product::where('status','active')->orderBy('id','DESC')->limit(8)->get();
        $category_lists = Category::where('status','active')->where('is_parent',1)->orderBy('title','ASC')->get();
        
        return view('user.pages.index', compact('featured', 'posts', 'banners', 'product_lists', 'category_lists'));
    }

    public function about()
    {
        return view('user.pages.about');
    }

    public function shop()
    {
        return view('user.pages.shop.index');
    }

    public function product()
    {
        return view('user.pages.shop.show');
    }

    public function blog()
    {
        $posts=Post::query();
        
        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=PostCategory::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            return $cat_ids;
            $posts->whereIn('post_cat_id',$cat_ids);
            // return $posts;
        }
        if(!empty($_GET['tag'])){
            $slug=explode(',',$_GET['tag']);
            // dd($slug);
            $tag_ids=PostTag::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // return $tag_ids;
            $posts->where('post_tag_id',$tag_ids);
            // return $posts;
        }

        if(!empty($_GET['show'])){
            $posts=$posts->where('status','active')->orderBy('id','DESC')->paginate($_GET['show']);
        }
        else{
            $posts=$posts->where('status','active')->orderBy('id','DESC')->paginate(9);
        }
        // $posts=Post::where('status','active')->paginate(8);
        $recent_posts=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();

        return view('user.pages.blog.index', compact('posts', 'recent_posts'));
    }

    public function blogDetails($slug)
    {
        $post=Post::getPostBySlug($slug);
        $recent_posts=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();

        return view('user.pages.blog.show', compact('post', 'recent_posts'));
    }

    public function contact()
    {
        return view('user.pages.contact');
    }

    public function cart()
    {
        return view('user.pages.cart');
    }

    public function checkout()
    {
        return view('user.pages.checkout');
    }

    public function confirmation()
    {
        return view('user.pages.confirmation');
    }

    public function subscribe(Request $request){
        if(! Newsletter::isSubscribed($request->email)){
            Newsletter::subscribePending($request->email);
            if(Newsletter::lastActionSucceeded()){
                request()->session()->flash('success','Subscribed! Please check your email');
                return redirect()->route('home');
            } else {
                Newsletter::getLastError();
                return back()->with('error','Something went wrong! please try again');
            }
        } else {
            request()->session()->flash('error','Already Subscribed');
            return back();
        }
    }
}
