<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
     // Construst deny to use users[create,show,edit]

     public function index()
     {
        $categories = Category::all();
         $products = Product::all();
         return view('dashboard.products.index',compact('products'),compact('categories'))->with('category');
     }

     public function store(Request $request)
     {
         $products = $request->validate([
             'name'          => 'required|string|max:255|unique:products,name',
             'description'   => 'sometimes|nullable|string',
             'price'         => 'integer',
             'stock'         => 'integer',
             'category_id'   =>  'required',
            ]);
 
         try {
             Product::create($products);
        
        } catch (\Exception $e) {
            return $e->getMessage();
        }
 
        return redirect()->route('products.index')->with('message',trans('dashboard.added'));
     }
 
 
     public function update(Request $request)
     {
         $products = $request->validate([
             'name'          => "required|string|max:255|unique:products,name,$request->id",
             'description'   => 'sometimes|nullable|string',
             'price'         => 'integer',
             'stock'         => 'integer',
             'category_id'   =>  'required',
         ]);
 
         try {
             $product = Product::findorfail($request->id);
             $product->update($products);
        
        } catch (\Exception $e) {
            return $e->getMessage();
        }
 
        return redirect()->route('products.index')->with('message',trans('dashboard.updated'));
     }
 
 
     public function destroy(Request $request)
     {
         $product = Product::findorfail($request->id);
         $product->delete();
         return redirect()->route('products.index')->with('message',trans('dashboard.deleted'));
     }
}
