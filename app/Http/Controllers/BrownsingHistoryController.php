<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BrowsingHistory;
use Auth;


class BrownsingHistoryController extends Controller
{
    public function create(Request $request)
    {

      $history = new BrowsingHistory;
      //\Debugbar::info($history);
      $history->user_id = Auth::user()->id;
      $history->link = $request->link;
      $history->title = $request->title;
      $history->save();

    }
    // public function index()
    // {
    //   // return view();
    // }
}
