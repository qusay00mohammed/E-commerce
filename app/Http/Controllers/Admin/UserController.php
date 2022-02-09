<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use App\User;
use App\Photo;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('admin');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // $users = User::all();
    $users = User::select(['*'])->orderBy('id', 'desc')->paginate(12);
    return view('admin.users.users', compact('users'));
  }

  public function userPending()
  {
    $users = User::select(['*'])->where('regStatus', 0)->orderBy('id', 'desc')->paginate(12);
    return view('admin.users.users', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.users.add_user');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // dd($request->all());
    $input = $request->all();
    $request->validate(
      [
        'username' => 'bail | required | unique:users',
        'password' => 'required',
        'email'    => 'required | unique:users',
        'fullname' => 'required',
      ]
      //   , [
      // 	'username.required' => 'الاسم مطلوب',
      // 	'username.unique'	=> 'يجب ان يكون فريد ',
      // 	// وقيس على هذا
      // ]
    );
    $input['password'] = bcrypt($request->password);
    // Start Upload Photo
    if ($file = $request->file('photo_id')) {
      $name = time() . $file->getClientOriginalname();
      $file->move('images\photo_user', $name);
      $photo = Photo::create(['name_photo' => $name]);
      $input['photo_id'] = $photo->id;
    }
    // End Upload Photo

    $input['regStatus'] = 1;
    $user = User::create($input);
    if ($user) {
      return redirect()->route('users')->withSuccess('user was created successfully');
    } else {
      return redirect()->route('users')->withError('user not created successfully');
    }
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
    $user = User::findOrFail($id);

    return view('admin.users.edit_user', compact('user'));
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
    $user = User::findOrFail($id);
    $input = $request->all();

    if ($input['password'] == '') {
      $input = $request->except('password');
    } else {
      $input['password'] = bcrypt($request->password);
    }
    $request->validate([
      'username' => 'required',
      'email'    => 'required',
      'fullname' => 'required',
    ]);
    // Start Upload Photo
    if ($file = $request->file('photo_id')) {
      $name = time() . $file->getClientOriginalname();
      $file->move('images\photo_user', $name);
      $photo = Photo::create(['name_photo' => $name]);
      $input['photo_id'] = $photo->id;
    }
    // End Upload Photo
    $input['regStatus'] = 1;

    $userUpdate = $user->update($input);

    if ($userUpdate) {
      return redirect()->route('users')->withSuccess('updated successfully');
    } else {
      return redirect()->route('users')->withError('not updated successfully');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $user = User::findOrFail($id);

    if ($user->photo) {
      unlink(public_path('images/photo_user/' . $user->photo->name_photo));
    }

    $userDeleted = $user->delete();
    if ($userDeleted) {
      return redirect()->back()->withSuccess('deleted successfully');
    } else {
      return redirect()->back()->withError('not deleted successfully');
    }
  }

  public function activate($id)
  {
    $user = User::findOrFail($id);
    $activate['regStatus'] = 1;
    $userActive = $user->update($activate);

    if ($userActive) {
      return redirect()->back()->withSuccess('activate user successfully');
    } else {
      return redirect()->back()->withError('not activate user successfully');
    }
  }
}
