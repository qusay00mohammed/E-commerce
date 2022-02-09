<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('admin');
  }

  public function index()
  {
    $sort = 'asc';
    $sort_array = ['asc', 'desc'];

    if (isset($_GET['sort']) && in_array($_GET['sort'], $sort_array)) {
      $sort = $_GET['sort'];
    }

    $categories = Categorie::select('*')->where('parent', 0)->orderBy('ordering', $sort)->paginate(12);
    return view('admin.categories.categories', compact('categories', 'sort'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $parentCat = Categorie::select('*')->where('parent', 0)->get();
    return view('admin.categories.add_category', compact('parentCat'));
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
    $request->validate([
      'name' => ['required', 'string', 'unique:categories'],
    ]);

    $category = Categorie::create($input);

    if ($category) {
      return redirect()->route('categories')->withSuccess('created was category successfully');
    } else {
      return redirect()->route('categories')->withError('created not category successfully');
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
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $cat = Categorie::findOrFail($id);
    $parentCat = Categorie::select('*')->where('parent', 0)->get();
    return view('admin.categories.edit_category', compact('cat', 'parentCat'));
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
    $cat = Categorie::findOrFail($id);
    $input = $request->all();
    $request->validate([
      'name' => 'required',
    ]);

    $category = $cat->update($input);

    if ($category) {
      return redirect()->route('categories')->withSuccess('updated successfully');
    } else {
      return redirect()->route('categories')->withError('not updated successfully');
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
    $cat = Categorie::findOrFail($id);
    $deleteCat = $cat->delete();

    if ($deleteCat) {
      return redirect()->route('categories')->withSuccess('deleted successfully');
    } else {
      return redirect()->route('categories')->withError('not deleted successfully');
    }
  }
}
