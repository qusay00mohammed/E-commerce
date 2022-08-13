<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categorie;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $categories = Categorie::all();
    return response()->json([
      "success" => true,
      "message" => "Categories list",
      "data"    => $categories,
    ]);
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
      'name' => ['required', 'string', 'unique:categories'],
    ]);

    $category = Categorie::create($input);

    if ($category) {
      return response()->json([
        'status' => true,
        'message' => "Categories list",
        'data'   => $category,
      ], 200);
    } else {
      return response()->json([
        'status' => false,
        'message' => "Categories list",
        'data'   => $category,
      ], 400);
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
      return response()->json([
        'status' => true,
        'message' => "updated successfully",
        'data'   => $category,
      ], 200);
    } else {
      return response()->json([
        'status' => false,
        'message' => "updated successfully",
        'data'   => $category,
      ], 400);
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
      return response()->json([
        'status' => true,
        'message' => "deleted successfully",
        'data'   => $deleteCat,
      ], 200);
    } else {
      return response()->json([
        'status' => false,
        'message' => "undeleted successfully",
        'data'   => $deleteCat,
      ], 400);
    }
  }
}
