<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\RegistersUsers;
use  Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\Facades\DB;
use App\Http\Requests\adStore;
use Illuminate\Http\Request;
use App\User;
use App\ad;

class adController extends Controller
{
    use RegistersUsers;

    public function index()
    {
        $ads = DB::table('ads')->orderBy('created_at','DESC')->paginate(3);

        return view('ads',compact('ads'));
    }

    public function create()
    {
        return view('create');
    }
    public function store(adStore $request)
    {
        $validator = $request->validated();

        if(!Auth::check())
        {
            $request->validate([
                'name' => 'required|unique:users',
                'email' =>'required|email|unique:users',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required'
            ]);

            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);
        }

        $this->guard()->login($user);

        $ad = new ad();
        $ad->title = $validator['title'];
        $ad->description = $validator['description'];
        $ad->price = $validator['price'];
        $ad->user_id = auth()->user()->id;
        $ad->localisation = $validator['localisation'];
        $ad->save();

        return redirect()->route('welcome')->with('success','Votre annonce a été postée');
    }
}
