<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use DB;

class LiveSearch extends Controller
{
    function index()
    {

        $adData=Advertisement::orderBy('updated_at','desc')->get();

        return view('live_search')->with('adData',$adData);
        //return view('live_search');

    }
    function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('products')
        ->where('productName', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative; float:right;margin-right:35vh;">';
      foreach($data as $row)
      {
       $output .= "<li><a href='/suppliers/". $row->supplierId ."'>".$row->productName."</a></li>";
      }
      $output .= '</ul>';
      echo $output;
     }
    }

}
