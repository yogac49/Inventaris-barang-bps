<?php

namespace App\Http\Controllers\users;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $this->authorize('admin');
        $user= user::orderBy('name', 'ASC')->get();

        return view('user.index', compact('user'));
    }
    public function store(Request $request){
        $user = new user();
        $validateData = $request->validate([
            'name' =>'required|max:255',
            'email'=>'required|email:dns|unique:users',
            'password'=>'required|min:5|max:255',
            'role'=>'required'
        ]);
            $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);
       
        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $user], 200);
    }
}