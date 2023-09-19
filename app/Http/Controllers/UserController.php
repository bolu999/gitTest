<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Wishlist;
use App\Product;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false]);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['isAdmin'] = '0';

        // \Log::info($input);

        $user = User::create($input);
        // $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['email'] = $user->email;

        return response()->json(['status' => true, 'success' => $success] );
    }


    public function login()
    {
        $credentials = [
            'email' => request('email'),
            'password' => request('password')
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json($user);
        }

        return response()->json(['success' => 'Unauthorised']);
    }

    public function getUserOrders()
    {
        $orders = Order::where('user_id', Auth::user()->id)->paginate(10);
        \Log::info($orders);
        return response()->json($orders);
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $user = User::find(Auth::user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone;
        $user->address = $request->address;
        $user->save();

        return response()->json($user);
    }

    public function getUserDetails()
    {
        // $user = User::find(Auth::user()->id);
        // \Log::info($user);
        return response()->json(Auth::user());
    }

    public function checkLogin()
    {
        if($user = Auth::user())
        {
            return response()->json(['isLoggedIn' => true, 'user'=> $user]);
        }
        else
        {
            return response()->json(['isLoggedIn' => false]);
        }
    }

    public function getDashboardDetails()
    {
        $orderCount = Order::where('user_id', Auth::user()->id)->count();
        // $wishlist = Wishlist::where('user_id', Auth::user()->id)->count();
        // $productCount = Product::where('user_id', Auth::user()->id)->count();
        $userEmail = Auth::user()->email;

        return response()->json(["orderCount" => $orderCount, "userEmail" => $userEmail]);
    }

    public function addToWishList($id)
    {
        $check = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $id)->get();
        if(count($check) == 0)
        {
            try {
                //code...
                $wishlist = new Wishlist;
                $wishlist->user_id = Auth::user()->id;
                $wishlist->product_id = $id;
                $wishlist->save();
    
                return response()->json(['status' => true, 'message'=> 'Successful']);
    
            } catch (\Throwable $th) {
                return response()->json(['status' => false, 'message'=> 'Failed to add item to wishist']);
    
            }
        }
        else
        {
            return response()->json(['status' => false, 'message'=> 'Item already in wishlist']);
        }
    
    }

    public function getUserWishlist()
    {
        // try {
        //     //code...
        // } catch (\Throwable $th) {
        //     //throw $th;
        // }
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->get();

        $products = [];
        foreach ($wishlist as $key => $wishitem) {
            # code...
            $product = Product::find($wishitem->product_id);
            array_push($products, ['product' => $product, 'wish_id' => $wishitem->id]);
        }
        // \Log::info($products);
        return response()->json($products);
    }

    public function deleteWish($id)
    {
        try {
            //code...
            $wishlist = Wishlist::find($id);
            $wishlist->delete();
            return response()->json(['status' => true, 'message'=> 'Successful']);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['status' => false, 'message'=> 'Error removing product from wishlist']);
        }

    }
}
