<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;
use App\Item;
use PDF;

class HomeController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $items = Item::select('*')->where('regStatus', 1)->orderBy('id', 'desc')->get();
    return view('index', compact('items'));
  }

  public function category($id)
  {
    $catItems = Item::select('*')->where('categorie_id', $id)->where('regStatus', 1)->orderBy('id', 'desc')->get();

    $categorie = Categorie::findOrFail($id);

    return view('categories', compact('catItems', 'categorie'));
  }

  public function show($id)
  {
    $item = Item::findOrFail($id);
    return view('item', compact('item'));
  }




}
