<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\mail\SendMailable;
use App\Sitesetting;
use App\Category;
use App\Bannerimage;
use App\Email;
use App\Quote;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($user = null)
    {
        $sitesetting = Sitesetting::find(1);
        if($user == 'user')
        {
            if(Auth::check())
            {
                if(Auth::user()->isAdmin == 1)
                {
                    return view('admin.dashboard');
                }
                else if(Auth::user()->isAdmin == 0)
                {
                    // return Redirect::to('/#/dashboard');
                    return view('admin.dashboard');
                }
                else
                {
                    return Redirect::to('/#/login');
                }
            }
            else
            {
                return Redirect::to('/#/login');
            }
        }
        else
        {
            return view('welcome', compact('sitesetting'));
        }
    }

    public function submitEmail($email)
    {
        try {
            if(Email::where('address', $email)->count() > 0)
            {
                return response()->json($status = 'present');
            }
            $emailModel = new Email;
            $emailModel->address = $email;
            $emailModel->save();
            
            return response()->json($status = true);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($status = false);
        }
    }

    public function sendMail(Request $request)
    {
        $name = $request->name;
        $title = $request->title;
        $msg = $request->message;
        $email = $request->email;


        Mail::to('davitronprime@gmail.com')->send(new SendMailable($name, $title, $msg, $email));
        // ->subject($title)

        return response()->json($status = true);

    }

    public function getBanner()
    {
       $banners = Bannerimage::all();
       return response()->json($banners);
    }

    public function getFooterDetails()
    {
        $sitesetting = Sitesetting::find(1);
        return response()->json($sitesetting);
    }

    public function getHomeDetails()
    {
        $sitesetting = Sitesetting::find(1);
        $quote = Quote::all();
        return response()->json([$sitesetting, $quote]);
    }

    public function getProducts()
    {
        try {
            $products = Product::orderBy('created_at')->take(16)->get();
            return response()->json(['status' => true, 'products' => $products]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['status' => false, 'message' => 'Failed fetching products...']);
        }
    }

    public function liveSearch(Request $request)
    {
        $word = $request->input('searchword');

        $products = Product::all();
        $matches = array(); 
        
        foreach($products as $product)
        {
            if(Str::contains(Str::lower($product->name), Str::lower($word)))
            {
                array_push($matches, $product);
            }
        }
        
        return View::make('layouts.searchedresult')->with('matches', $matches);
    }
}
