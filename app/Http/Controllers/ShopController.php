<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Review;
use Illuminate\Support\Facades\Auth;


class ShopController extends Controller
{
    //
    public function getAllProducts($sort = null, $order = null)
    {
        if($order !== "DESC")
        {
            $order = "ASC";
        }
        if($sort == "price")
        {
            $products = Product::query()->leftJoin('pricelists','products.id','=','pricelists.product_id')->
            orderBy('pricelists.normalPrice', $order)->
            paginate(15);
        }
        else if($sort !== null)
        {
            $products = Product::orderBy($sort, $order)->paginate(15);
        }
        else
        {
            $products = Product::paginate(15);
        }

        return response()->json($products);
    }

    public function getAllCategories()
    {
        $categories = Category::orderBy('name')->take(20)->get();
        return response()->json($categories);
    }

    public function getSingleProduct($id)
    {
        $product = Product::find($id);
        $review = Review::where('product_id', $id)->paginate(4);
        return response()->json(['product' => $product, 'review' => $review]);
    }

    public function getRelatedProduct($category_id, $id)
    {
        $products = Product::where('category_id', $category_id)->where('id','!=', $id)->take(4)->get();
    
        return response()->json($products);
    }

    public function getCategoryProducts($id, $sort = null, $order = null)
    {
        if($order !== "DESC")
        {
            $order = "ASC";
        }
        if($sort == "price")
        {
            $categoryProducts = Product::where('category_id', $id)->leftJoin('pricelists','products.id','=','pricelists.product_id')->
            orderBy('pricelists.normalPrice', $order)->
            paginate(15);
        }
        else if($sort !== null)
        {
            $categoryProducts = Product::where('category_id', $id)->orderBy($sort, $order)->paginate(15);
        }
        else
        {
            $categoryProducts = Product::where('category_id', $id)->paginate(15);
        }

        return response()->json($categoryProducts);
    }

    public function Search($sort = null, $order = null, $keyword)
    {
        $word = $keyword;
        if($order !== "DESC")
        {
            $order = "ASC";
        }

        if($sort == "price")
        {
            $product = Product::where('name', 'LIKE', '%' . $keyword . '%')->leftJoin('pricelists','products.id','=','pricelists.product_id')->
            orderBy('pricelists.normalPrice', $order)->
            paginate(15);        
        }
        else if($sort !== null)
        {
            $product = Product::where('name', 'LIKE', '%' . $keyword . '%')
            ->orderBy($sort, $order)
            ->paginate(15);
        }
        else
        {
            $product = Product::where('name', 'LIKE', '%' . $keyword . '%')
            ->paginate(15);
        }
        $product->appends(['search' => $keyword]);

        return response()->json($product);
    }

    public function saveRating(Request $request)
    {
        try {
            //code...
            $review = new Review;
            $review->rating = $request->rating;
            
            if($request->name != null)
            {
                $review->name = $request->name;
            }
    
            $review->message = $request->review;
    
            $review->product_id = $request->id;
    
            if(Auth::check())
            {
                $review->user_id = Auth::user()->id;
            }
    
            $review->save();

            $reviews = Review::where('product_id', $request->id)->get();
            $count = Review::where('product_id', $request->id)->count();
            $score = 0;
            foreach ($reviews as $key => $value) {
                $score += $value->rating;
                # code...
            }

            $score = $score/$count;

            $product = Product::find($request->id);
            $product->rate = $score;
            $product->save();

            \Log::info($score);

            return response()->json(['status' => true, 'message' => 'success']);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['status' => false, 'message' => 'error adding review', ]);

        }
       
    }
}
