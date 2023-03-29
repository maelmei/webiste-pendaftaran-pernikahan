<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;


class loginController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function prosesregister(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users|unique:admins',
            'password' => 'required',
            'cek_id' => 'required'
        ]);

        $user = User::create([
            'id' => Str::uuid(),
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cek_id' => $request->cek_id,
            'level' => 'user'
        ]);

        event(new Registered($user));
        Auth::login($user);
        return redirect('/email/verify');
    }

    public function proseslogin(Request $request)
    {
       
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     if (Auth::user()->level == 'user') {
        //         $request->session()->regenerate();
        //         return redirect('/')->with('success', 'Berhasil Login');
        //     } else {
        //         $request->session()->regenerate();
        //         return redirect('admin')->with('success', 'Berhasil Login');
        //     }
        // }
        if(Auth::guard('web')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/dashboard-user')->with('success', 'Berhasil Login');
        }
        if(Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('admin')->with('success', 'Berhasil Login');
        }
      
 
        return back()->with('loginError', 'Login Failed');
    }

    public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();

 
    return redirect('login')->with('success', 'Berhasil Logout');
}

    public function index2()
    {
        return view('index');
    }
}
