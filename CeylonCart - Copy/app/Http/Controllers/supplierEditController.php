<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Supplier;
use Auth;
use DB;

class supplierEditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $suppliers = Supplier::all();
        return view('supplier.supplierProfile')->with('suppliers', $suppliers); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $supplierId=Auth::user()->id;
        if($supplierId==null){
            return redirect('/');
        }
            //$supplierId=5;
                $supplierData=DB::select("select* from suppliers where supplierId='$supplierId' limit 1");
                $productData=DB::select("select* from products where supplierId='$supplierId'");
                /* $commentData=DB::select("select* from comments where supplierId='$supplierId'"); */
                //$reservedData=DB::table('reserves')->select('order_refNo')->where('supplier_Id','=','$supplierId')->get();
                $reservedData=DB::select("select order_refNo from reserves where supplier_Id='$supplierId' order by id desc
                limit 1;");
                //return $reservedData;
                $commentData =DB::table('comments')
                ->join('customers', 'customers.customerId', '=', 'comments.customer_Id')

                ->select('name','customer_Id','comment_body')->where('supplierId','=',$supplierId)
                ->get();

                return view ('supplier.supplierEditProfile',compact('supplierId'))->with('supplierData', $supplierData)->with('productData',$productData)->with('commentData', $commentData)->with('reservedData',$reservedData);


        /* $supplier=DB::select("select* from suppliers where supplierId='$supplierId'");

        return view ('supplier.supplierProfile')->with('supplier', $supplier); */

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
