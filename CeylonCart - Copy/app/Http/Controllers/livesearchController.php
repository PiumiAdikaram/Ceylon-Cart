<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class livesearchController extends Controller
{
    //
    public function search(Request $request){

        $searchkey=$request->productName;
        //$searchkey="Udara Food-City";

        $searchdata =DB::table('products')
                ->join('suppliers', 'products.supplierId', '=', 'suppliers.supplierId')

                ->select('productName','phoneNo','products.supplierId','location','image','description','name','supplier_description')->where('products.productName','LIKE','%'.$searchkey."%")
                ->get();
                return view('publicPages.searchList')->with('searchdata', $searchdata);

        //$searchdata=DB::select("select* from products where productName like '%$searchkey%'");
        /*$details = DB::table('products')
        ->join('suppliers','products.supplierId', '=', 'products.supplierId')->select('products.productName','suppliers.email')->get();
        return $details;
        return view ('supplier.supplierProfile')->with('datails', $details); */
    }
}


