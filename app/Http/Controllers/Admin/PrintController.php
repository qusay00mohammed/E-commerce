<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categorie;
use App\User;
use PDF;

class PrintController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('admin');
  }

  public function catPDF()
  {
    $categorie = Categorie::all();
    view()->share('categorie', $categorie);

    $pdf = PDF::loadView('Admin\print\printCat');
    $pdf->setPaper('A4', 'landscape');
    $pdf->setPaper('font-size', '12');

    return $pdf->download('categories.pdf');
  }

  public function userPDF()
  {
    $users = User::all();
    view()->share('users', $users);

    $pdf = PDF::loadView('Admin\print\printUser');
    $pdf->setPaper('A4', 'landscape');
    $pdf->setPaper('font-size', '12');

    return $pdf->download('users.pdf');
  }
}
