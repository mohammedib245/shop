<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

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
         $product = $request->validate([
             'name'          => 'required|string|max:255|unique:products,name',
             'description'   => 'sometimes|nullable|string',
             'price'         => 'numeric',
             'dicount'         => 'integer',
             'stock'         => 'integer',
             'category_id'   =>  'required',
            ]);
 
        
         try {

            if($request->file('image')){
                $file= $request->file('image');
                $path = "public\uploads\products\\";
                $filename= $path . date('YmdHi'). '.'.$file->getClientOriginalExtension();
                $file->move(public_path('public\uploads\products\\'), $filename);
                $product['image']= $filename;
            }

             Product::create($product);
        
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
             'price'         => 'numeric',
             'discount'         => 'integer',
             'stock'         => 'integer',
             'category_id'   =>  'required',
         ]);
 
         try {
            $product = Product::findorfail($request->id);

            if(request()->hasFile('image') && request('image') != ''){

                // check and remove old image
                if(!empty($product->image)){
                    $imagePath = public_path($product->image);
                    if(File::exists($imagePath)){
                        unlink($product->image);
                    }
                }
  
                  $file= $request->file('image');
                  $path = "public\uploads\products\\";
                  $filename= $path . date('YmdHi'). '.'.$file->getClientOriginalExtension();
                  $file->move(public_path($path), $filename);
                  $product['image']= $filename;
              }

            
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
