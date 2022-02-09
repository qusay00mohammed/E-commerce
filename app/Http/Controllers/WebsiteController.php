<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;
use Auth;
use App\Photo;
use App\User;
use App\Comment;

class WebsiteController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:web'); // middelware:Gaurd
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function profile()
  {
    $user = Auth::user();
    return view('profile', compact('user'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Categorie::select('*')->where('parent', 0)->get();
    return view('createItem', compact('categories'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function addComment(Request $request, $id)
  {
    // $user = Auth::user();

    $input = $request->all();
    $request->validate([
      'comment' => 'required'
    ]);
    $input['item_id'] = $id;
    $input['user_id'] = Auth::id();

    $comment = Comment::create($input);
    // $comment = $user->comments()->create($input);

    if ($comment) {
      return redirect()->route('showItem', $id)->withSuccess('Wait for the comment to activate');
    } else {
      return redirect()->route('showItem', $id)->withError('comment not created successfully');
    }
  }


  public function store(Request $request)
  {
    $input = $request->all();
    $request->validate([
      'name'          => 'required',
      'description'   => 'required',
      'status'        => 'required',
      'price'         => 'required',
      'categorie_id'  => 'required',
      'photo_id'      => 'required',
    ]);

    // Start Upload Photo
    $file = $request->file('photo_id');
    $name = time() . $file->getClientOriginalname();
    $file->move('images\photo_item', $name);
    $photo = Photo::create(['name_photo' => $name]);
    $input['photo_id'] = $photo->id;
    // End Upload Photo
    $user = Auth::user();
    $createItem = $user->items()->create($input);
    if ($createItem) {
      return redirect()->route('profile')->withSuccess('item was created successfully');
    } else {
      return redirect()->route('profile')->withError('item not created successfully');
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
    // $user = Auth::user();
    $user = User::find($id);
    return view('editProfile', compact('user'));
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

    if (trim($input['password']) == '') {
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

    $updateUser = $user->update($input);
    if ($updateUser) {
      return redirect()->route('profile')->withSuccess('updated successfully');
    } else {
      return redirect()->route('profile')->withError('not updated successfully');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function delcomment($id)
  {
    $comment = Comment::findOrFail($id);
    $deleteComment = $comment->delete();

    if ($deleteComment) {
      return redirect()->back()->withSuccess('deleted successfully');
    } else {
      return redirect()->back()->withError('not deleted successfully');
    }
  }
}
