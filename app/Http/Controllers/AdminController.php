<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderParent;
use App\User;
use App\Product;
use App\Category;
use App\Department;
use App\Pricelist;
use App\Specification;
use App\Coupon;
use App\Quote;
use App\Sitesetting;
use App\Bannerimage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;




class AdminController extends Controller
{
    //
    public function __construct()
    {
        // if(!Auth::check())
        // {
        //     return Redirect::to('/#/login');
        // }
        $this->middleware('auth');
    }

    public function getOrders()
    {
        $orders = OrderParent::orderBy('created_at', 'DESC')->paginate(20);
        // \Log::info($order_parent);
        // $orders = Order::orderBy('created_at', 'DESC')->paginate(20);
        return response()->json($orders);
    }

    public function getDashboardDetails()
    {
        $orderCount = Order::all()->count();
        $userCount = User::all()->count();
        $productCount = Product::all()->count();
        $adminEmail = Auth::user()->email;

        return response()->json(["orderCount" => $orderCount, "userCount" => $userCount, "productCount" => $productCount, "adminEmail" => $adminEmail]);
    }

    public function getOrderDetail($id)
    {
        $order =  Order::find($id);
        return response()->json($order);
    }

    public function getAllUsers()
    {
        $users = User::orderBy('created_at', 'DESC')->paginate(10);
        return response()->json($users);
    }


    public function productImage (Request $request)
    {
        
        
        if($request->hasFile('file')){
            // $path = $request->file('file');
            $image = $request->file('file');
            // $image->store('tracks');

            $imageName = $request->file->getClientOriginalName();
        
            $image->move(public_path('images/product'),str_replace(' ', '_', $imageName));

            $product = new Product;
            $product->image_link1 = 'images/product/'.str_replace(' ', '_', $imageName);
            $product->image_link2 = 'images/product/'.str_replace(' ', '_', $imageName);
            $product->save();
        }
        

        return response()->json($product);
         
    }

    public function deleteProduct($id)
    {
        try {
            //code...
            Specification::where("product_id", $id)->delete();
            Pricelist::where("product_id", $id)->delete();
            // Pricelist::where("product_id", $id)->delete();
            
            
            $product = Product::find($id);

            try {
                //code...
                \unlink($product->image_link1);
                \unlink($product->image_link2);
            } catch (\Throwable $th) {
                //throw $th;
            }


            $product->delete();
            return response()->json($status = true);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($status = false);
        }
   
    }

    public function saveSiteDetails(Request $request)
    {
        try {
            //code...
            $quote = Quote::all();
            $setting = Sitesetting::find(1);
            $banners = Bannerimage::all();
    
            $setting->title = $request->siteTitle;
            $setting->logo = $request->logo;
            $setting->about = $request->about;
            $setting->footer_about = $request->footer_about;
            $setting->address = $request->address;
            $setting->email = $request->email;
            $setting->phone_number = $request->phoneNumber;
            $setting->work_hour = $request->work_hour;
            $setting->facebook = $request->facebook;
            $setting->twitter = $request->twitter;
            $setting->instagram = $request->instagram;
            $setting->news_letter_title = $request->news_letter_title;
            $setting->news_letter_msg = $request->news_letter_msg;
    
            $setting->save();
    
            foreach ($banners as $key => $banner) {
                # code...
                // \Log::info($request->bannerDetails[$key]);
                $banner->title = $request->bannerDetails[$key]['title'];
                $banner->content_1 = $request->bannerDetails[$key]['content_1'];
                $banner->content_2 = $request->bannerDetails[$key]['content_2'];
                $banner->image = $request->bannerDetails[$key]['image'];
                $banner->save();
            }
    
            return response()->json($status = true);
    
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($status = false);
        }


    }

    public function newProduct(Request $request)
    {
        try {
            //code...
            $product = Product::find($request->product_id);
            \Log::info($product);

            $product->name = $request->product_name;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            $product->hasSpec = $request->hasSpec;
            $product->promotion = $request->promotion;
            $product->inventory_qty = $request->stock_quantity;

            $product->save();

            $pricelist = new Pricelist;
            $pricelist->product_id = $request->product_id;
            $pricelist->quantity = $request->product_quantity;
            $pricelist->normalPrice = $request->normal_price;
            $pricelist->discountPrice = $request->discount_price;

            $pricelist->save();
            
            if($request->hasSpec)
            {

                foreach ($request->product_spec as $key => $value) {
                    # code...
                    $spec = new Specification;
                    $spec->title = $value['title'];
                    $spec->content = $value['content'];
                    $spec->product_id = $request->product_id;
                    $spec->save();
                }
            }
            
            return response()->json($status = true);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($status = false);
        }
        

    }

    public function getAllDepartments()
    {
        $departments = Department::all();
        return response()->json($departments);
    }

    public function editProduct(Request $request)
    {
        try {
            //code...
            $product = Product::find($request->product_id);
            $product->name = $request->product_name;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            $product->hasSpec = $request->hasSpec;
            $product->promotion = $request->promotion;
            $product->inventory_qty = $request->stock_quantity;

    
            $product->save();
    
            $pricelist = Pricelist::where('product_id', $request->product_id)->first();
            $pricelist->quantity = $request->product_quantity;
            $pricelist->normalPrice = $request->normal_price;
            $pricelist->discountPrice = $request->discount_price;
    
            $pricelist->save();
    
            if($request->hasSpec)
            {
                Specification::where("product_id", $request->product_id)->delete();
    
                foreach ($request->product_spec as $key => $value) {
                    # code...
                    $spec = new Specification;
                    $spec->title = $value['title'];
                    $spec->content = $value['content'];
                    $spec->product_id = $request->product_id;
                    $spec->save();
                }
            }
    
            return response()->json($status = true);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($status = true);
        }
   
    }

    public function newCategory(Request $request)
    {
        try {
            //code...
            $category = Category::find($request->category_id);
        
            $category->name = $request->name;
            $category->department_id = $request->department;
            $category->description = $request->description;
            $category->save();
    
            return response()->json($status = true);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($status = false);
        }
    }

    public function categoryImage (Request $request)
    {
        if($request->hasFile('file')){
            // $path = $request->file('file');
            $image = $request->file('file');
            // $image->store('tracks');

            $imageName = $request->file->getClientOriginalName();
        
            $image->move(public_path('images/category'),str_replace(' ', '_', $imageName));

            $category = new Category;
            $category->image_path = 'images/category/'.str_replace(' ', '_', $imageName);
            $category->save();
        }

        return response()->json($category);
    }

    public function getCategoryData($id)
    {
        $category = Category::find($id);
        return response()->json($category);
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);

        try {
            //code...
            \unlink($category->image_path);
        } catch (\Throwable $th) {
            //throw $th;
        }

        $category->delete();

        return response()->json($status = true);
    }

    public function editCategory(Request $request)
    {
        try {
            //code...
            $category = Category::find($request->category_id);
            $category->name = $request->category_name;
            $category->department_id = $request->department_id;
            $category->description = $request->description;
    
            $category->save();
            return response()->json($status = true);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($status = false);
        }
 
    }

    public function newDepartment(Request $request)
    {
        try {
            $department = Department::find($request->department_id);
            $department->name = $request->name;
            $department->description = $request->name;

            $department->save();

            return response()->json($status = true);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($status = false);
        }
  
    }

    public function departmentImage (Request $request)
    {
        try {
            //code...
            if($request->hasFile('file'))
            {
                $image = $request->file('file');

                $imageName = $request->file->getClientOriginalName();
            
                $image->move(public_path('images/department'),str_replace(' ', '_', $imageName));

                $department = new Department;
                $department->image = 'images/department/'.str_replace(' ', '_', $imageName);
                $department->save();
            }
            return response()->json($department);

        } catch (\Throwable $th) {
            return response()->json($status = false);

        }
        
    }


    public function getDepartmentData($id)
    {
        $department = Department::find($id);
        \Log::info( $department);
        return response()->json($department);
    }

    public function editDepartment(Request $request)
    {
        $department = Department::find($request->department_id);
        $department->name = $request->department_name;
        $department->description = $request->description;

        $department->save();
        return response()->json($status = true);
    }

    public function deleteDepartment($id)
    {
        $department = Department::find($id);
        try {
            //code...
            \unlink($department->image);
        } catch (\Throwable $th) {
            //throw $th;
        }
        $department->delete();

        return response()->json($status = true);
    }

    public function getUserData($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function deleteUser($id)
    {
        User::find($id)->delete();
        return response()->json($status = true);
    }

    public function editUser(Request $request)
    {
        \Log::info($request);
        $user = User::find($request['user']['id']);
        \Log::info($user);
        $user->first_name = $request['user']['first_name'];
        $user->last_name = $request['user']['last_name'];
        $user->address = $request['user']['address'];
        $user->isAdmin = $request['user']['isAdmin'];
        $user->phone_number = $request['user']['phone_number'];

        $user->save();
        return response()->json($status = true);
    }

    public function newUser(Request $request)
    {
        $user = new User;
        $user->first_name = $request['user']['first_name'];
        $user->last_name = $request['user']['last_name'];
        $user->address = $request['user']['address'];
        $user->isAdmin = $request['user']['isAdmin'];
        $user->phone_number = $request['user']['phone_number'];
        $user->email = $request['user']['email'];

        $password = bcrypt($request['user']['password']);
        $user->password = $password;

        $user->save();
        return response()->json($status = true);
    }

    public function siteSettings()
    {
        $sitesetting = Sitesetting::find(1);
        $quote = Quote::all();
        $banner = Bannerimage::all();

        return response()->json(["banner" => $banner, "sitesetting" => $sitesetting, "quotes" => $quote]);
    }

    public function getCoupons()
    {
        $coupons = Coupon::paginate(10);
        return response()->json($coupons);
    }

    public function getCoupon($id)
    {
        $coupon = Coupon::find($id);
        return response()->json($coupon);
    }

    public function saveCoupon(Request $request)
    {
        try {
            //code...
            $coupon = new Coupon;
            $coupon->code = $request->code;
            $coupon->value = $request->value;
            $coupon->type = $request->type;
            $coupon->status = 'unused';

            $coupon->save();
            return response()->json($status = true);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($status = false);
        }
        
    }

    public function deleteCoupon($id)
    {
        try {
            //code...
            $coupon = Coupon::find($id);
            $coupon->delete();
            return response()->json($status = true);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($status = false);
        }
    }

    public function editCoupon(Request $request)
    {
        try {
            //code...
            $coupon = Coupon::find($request->id);
            $coupon->code = $request->code;
            $coupon->value = $request->value;
            $coupon->type = $request->type;
            // $coupon->status = 'unused';

            $coupon->save();
            return response()->json($status = true);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($status = false);
        }
        
    }

    public function liveAdminProductSearch(Request $request)
    {
        $word = $request->keywords;

        \Log::info($word);

        $products = Product::all();
        $matches = array(); 
        
        foreach($products as $product)
        {
            if(Str::contains(Str::lower($product->name), Str::lower($word)))
            {
                array_push($matches, $product);
            }
        }
        \Log::info($matches);
        

        return response()->json($matches);
        // return View::make('layouts.searchedresult')->with('matches', $matches);
    }

    public function liveAdminCategorySearch(Request $request)
    {
        $word = $request->keywords;

        \Log::info($word);

        $products = Category::all();
        $matches = array(); 
        
        foreach($products as $product)
        {
            if(Str::contains(Str::lower($product->name), Str::lower($word)))
            {
                array_push($matches, $product);
            }
        }
        \Log::info($matches);
        

        return response()->json($matches);
        // return View::make('layouts.searchedresult')->with('matches', $matches);
    }

    public function updateOrderStatus(Request $request)
    {
        try{
            $order = OrderParent::find($request->id);
            $order->orderStatus = $request->status;
            $order->save();
            \Log::info('here');
            \Log::info($order);

            if($order->orderStatus == 'delivered')
            {
                $msg = "Hi ".$order->firstName.", Thanks for shopping with 2K Supermart! Your order has been delivered successfully.";
                \Log::info('delivered');
                $smsResponse = $this->send_sms($order->phoneNumber, $msg);
            }

            return response()->json($status = true);
        }
        catch(\Throwable $th)
        {
            return response()->json($status = false);
        }
       
    }

    public function send_sms($phone, $message){
        $message = str_replace(" ","%20", $message);
        $phone = preg_replace('/0/', '234', $phone, 1);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://app.bulksms.net.ng/api/v1/http.php?api_key=c1e23e4e&recipient=$phone&message=$message&sender=2ksupermart&route=3",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public function liveAdminUserSearch(Request $request)
    {
        $word = $request->keywords;

        \Log::info($word);

        $products = User::all();
        $matches = array(); 
        
        foreach($products as $product)
        {
            if(Str::contains(Str::lower($product->first_name), Str::lower($word)) || Str::contains(Str::lower($product->last_name), Str::lower($word)) || Str::contains(Str::lower($product->email), Str::lower($word)))
            {
                array_push($matches, $product);
            }
        }
        \Log::info($matches);
        

        return response()->json($matches);
        // return View::make('layouts.searchedresult')->with('matches', $matches);
    }
}
