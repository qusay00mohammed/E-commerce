<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function adminLogin()
  {

    return view('admin.login_admin');
  }


  public function login(Request $request)
  {
    $input = $request->all();
    $this->validate($request, [
      'username'     => 'required',
      'password'  => 'required',
    ]);

    if (auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))) {

      return redirect('dashboard');
    } else {

      // return redirect()->route('login')->with('error','phone & Password are incorrect');
      return back()->withInput($request->only('username'));
    }
  }
}
