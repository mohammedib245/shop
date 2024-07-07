<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Construst deny to use users[create,show,edit]
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index',compact('users'));
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|max:255',
            'type' => 'required|string',
        ]);

        $data['password']  = Hash::make($request->password);

        try {

             User::create($data);
        
        } catch (\Exception $e) {
        
            return $e->getMessage();
        }

        // Session::falsh('message','Added Successfuly!');
        return redirect()->route('users.index')->with('message',trans('dashboard.added'));
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
    //    dd($request->all);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,$request->id",
            'password' => 'required|string|max:255',
            'type' => 'required|string',
        ]);

        try {
            $user = User::findOrFail($request->id);
            $user->update([
              $user->name = $request->name,
              $user->email = $request->email,
              $user->password = Hash::make($request->password),
              $user->type = $request->type,
            ]);
            

            return redirect()->route('users.index')->with('message',trans('dashboard.updated'));

        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request){
        $user = User::findorfail($request->id);
        $user->delete();
        return redirect()->route('users.index')->with('message',trans('dashboard.deleted'));
    }
}
