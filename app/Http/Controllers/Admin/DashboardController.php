<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Item;
use App\Comment;

class DashboardController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('admin');
  }

  public function selectData()
  {
    $totalUser = User::all('id');
    $pendeningUser = User::select('id')->where('regStatus', 0)->get();
    $totalItem = Item::all('id');
    $totalComment = Comment::all('id');

    $latestUsers = User::select('*')->orderBy('id', 'desc')->take(5)->get();
    $latestItem = Item::select('*')->orderBy('id', 'desc')->take(5)->get();
    $latestComment = Comment::select('*')->orderBy('id', 'desc')->take(5)->get();
    return view('admin.dashboard', compact('totalUser', 'pendeningUser', 'totalItem', 'totalComment', 'latestUsers', 'latestItem', 'latestComment'));
  }
}
