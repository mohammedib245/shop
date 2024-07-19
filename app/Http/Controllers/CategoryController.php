<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
  // Construst deny to use users[create,show,edit]

    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index',compact('categories'));
    }

    public function store(Request $request)
    {
        $categories = $request->validate([
            'name'          => 'required|string|max:255|unique:categories,name',
            'description'   => 'sometimes|nullable|string',
            'image'         => 'sometimes|nullable|image',
        ]);
        
        try {
        
        if($request->file('image')){
            $file= $request->file('image');
            $path = "public\uploads\\";
            $path = "public\uploads\\";
            $filename= $path . date('YmdHi'). '.'.$file->getClientOriginalExtension();
            $file->move(public_path('public\uploads\\'), $filename);
            $categories['image']= $filename;
        }

            Category::create($categories);
       
       } catch (\Exception $e) {
           return $e->getMessage();
       }

       return redirect()->route('categories.index')->with('message',trans('dashboard.added'));
    }

    public function show (string $id)
    {
        try {
            $product_category = Category::where('id',$id)->value('name');
            $categories = Category::all();
            $products = Product::where('category_id',$id)->get();
            return view('dashboard.categories.show',compact('products','categories','product_category'));
       
       } catch (\Exception $e) {
           return $e->getMessage();
       }

    }

    public function update(Request $request)
    {
        $categories = $request->validate([
            'name'          => "required|string|max:255|unique:categories,name,$request->id",
            'description'   => 'sometimes|nullable|string',
            'image'         => 'required|nullable',
        ]);


        try {

        $category = Category::findorfail($request->id);

          if(request()->hasFile('image') && request('image') != ''){

              // check and remove old image
            if(!empty($category->image)){
              $imagePath = public_path($category->image);
              if(File::exists($imagePath)){
                unlink($category->image);
              }
            }

                $file= $request->file('image');
                $path = "public\uploads\\";
                $filename= $path . date('YmdHi'). '.'.$file->getClientOriginalExtension();
                $file->move(public_path('public\uploads\\'), $filename);
                $categories['image']= $filename;
            }
              
        $category->update($categories);


              

        // $file_path = storage_path().'/app/'.$doc['doc_file'];/
        //You can also check existance of the file in storage.
        // if(Storage::exists($file_path)) {}         
        
                  
       
       } catch (\Exception $e) {
           return $e->getMessage();
       }

       return redirect()->route('categories.index')->with('message',trans('dashboard.updated'));
    }


    public function destroy(Request $request)
    {
        $category = Category::findorfail($request->id);
        $category->delete();
        return redirect()->route('categories.index')->with('message',trans('dashboard.deleted'));
    }




    


    


    

}
