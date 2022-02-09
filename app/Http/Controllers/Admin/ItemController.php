<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Categorie;
use Illuminate\Http\Request;
use App\User;
use App\Photo;
use App\Item;

class ItemController extends Controller
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
    // $items = Item::all();
    $items = Item::select('*')->orderBy('id', 'desc')->paginate(12);
    return view('admin.items.items', compact('items'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $users = User::all();
    $categories = Categorie::select('*')->where(['parent' => 0])->get();
    return view('admin.items.add_item', compact('users', 'categories'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $input = $request->all();
    $request->validate([
      'name'          => 'required',
      'description'   => 'required',
      'price'         => 'required',
      'user_id'       => 'required',
      'photo_id'      => 'required',
      'categorie_id'  => 'required',
      'status'        => 'required',
    ]);

    // Start Upload Photo
    $file = $request->file('photo_id');
    $name = time() . $file->getClientOriginalname();
    $file->move('images\photo_item', $name);
    $photo = Photo::create(['name_photo' => $name]);
    $input['photo_id'] = $photo->id;
    // End Upload Photo

    $input['regStatus'] = 1;

    $item = Item::create($input);
    if ($item) {
      return redirect()->route('items')->withSuccess('item was created successfully');
    } else {
      return redirect()->route('items')->withError('item not created successfully');
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
    $item = Item::findOrFail($id);
    $users = User::all();
    $categories = Categorie::select('*')->where(['parent' => 0])->get();
    return view('admin.items.edit_item', compact('users', 'categories', 'item'));
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
    $item = Item::findOrFail($id);
    $input = $request->all();
    $request->validate([
      'name'          => 'required',
      'description'   => 'required',
      'price'         => 'required',
      'user_id'       => 'required',
      'photo_id'      => 'required',
      'categorie_id'  => 'required',
      'status'        => 'required',
    ]);

    // Start Upload Photo
    $file = $request->file('photo_id');
    $name = time() . $file->getClientOriginalname();
    $file->move('images\photo_item', $name);
    $photo = Photo::create(['name_photo' => $name]);
    $input['photo_id'] = $photo->id;
    // End Upload Photo

    $updateItem = $item->update($input);

    if ($updateItem) {
      return redirect()->route('items')->withSuccess('updated successfully');
    } else {
      return redirect()->route('items')->withError('updated successfully');
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
    $item = Item::findOrFail($id);

    if ($item->photo) {
      unlink(public_path('images/photo_item/' . $item->photo->name_photo));
    }

    $itemDeleted = $item->delete();
    if ($itemDeleted) {
      return redirect()->back()->withSuccess('deleted successfully');
    } else {
      return redirect()->back()->withError('not deleted successfully');
    }
  }

  public function approved($id)
  {
    $item = Item::findOrFail($id);
    $activate['regStatus'] = 1;
    $itemActive = $item->update($activate);

    if ($itemActive) {
      return redirect()->back()->withSuccess('activate user successfully');
    } else {
      return redirect()->back()->withError('not activate user successfully');
    }
  }
}
