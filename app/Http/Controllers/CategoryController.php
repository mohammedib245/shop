<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

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
        ]);

        try {
            Category::create($categories);
       
       } catch (\Exception $e) {
           return $e->getMessage();
       }

       return redirect()->route('categories.index')->with('message',trans('dashboard.added'));
    }


    public function update(Request $request)
    {
        $categories = $request->validate([
            'name'          => "required|string|max:255|unique:categories,name,$request->id",
            'description'   => 'sometimes|nullable|string',
        ]);

        try {
            $category = Category::findorfail($request->id);
            $category->update($categories);
       
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
