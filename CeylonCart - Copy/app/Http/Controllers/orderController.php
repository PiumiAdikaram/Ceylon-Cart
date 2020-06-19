<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\imupload;
use App\Order;
use App\supplier;
use DB;
use Auth;
use PDF;

use Carbon\Carbon;

class orderController extends Controller
{

   // public function showorder(){


       // $customer_data=$this->get_customer_data();
    
     //   return view('customer_order.showorder')->with('customer_data' , $customer_data);

   // }
   

   public  function showorder(){
   
        $data=Auth::user()->id;

    $customer_data=DB::table('orders')->join('productimages','productimages.id','=','orders.product_id')
    ->select('orders.id','image','productinitial_quantity','price','productimagename','product_id')
    ->where('orders.customer_id','=',$data)->get();
       // $maxValue = order::select('order_number')->where('customer_number', '=',  $data3)->max('order_number');
      
       $customerdetailes = DB::table('customers')->select('image','companyname','address','phoneNo','email','name')->where('customerId','=',$data)->get();
     //  $maxValue = DB::table('orders')->select('order_number')->where('customer_number', '=',  $data3)->max('order_number');
      // $customer_data = DB::table('orders')->select('id','product_name','quantity','price')->where('customer_number', '=',  $data3)->where('order_number', '=',  $maxValue)->get();
      //$products=DB::table('reserves')->join('orders','orders.id','=','reserves.order_id')->join('supplier','supplier.sup_id','=','reserves.supplier_id')->select('suppliername','reserved_quantity','reserved_price','order_refNo','supplier_id','product_name')->where('orders.product_name','LIKE','%'.$request->search."%")->where('reserves.customer_id','=',$data)->get();
      //$customer_data=DB::table('customerorders')->select('id','product_id','quantity','price','order_number')->get();

      //  $customer_data = DB::table('orders')->select('id','product_name','quantity','price','order_number')->where('customer_id', '=',  $data3)->get();
      return view('customer_order.showorder')->with('customer_data' , $customer_data)->with('customerdetailes',$customerdetailes);
      
    
       
    
       
        //$customer_data = DB::table('orders')->limit(10)->get();
        return $customer_data;
    }    
    public function getproductname(){
        $data=3;
        $customerdetailes = DB::table('customers')->select('image','companyname','address','phoneNo','email','name')->where('customerId','=',$data)->get();
        $productname = DB::table('productimages')->select('id','productimagename')->get();
        return view('customer_order.create_order')->with('productname' , $productname)->with('customerdetailes',$customerdetailes);
    }
    public function createorder(Request $request)
    {
        $data1=Auth::user()->id;
    
    $students = DB::table('Orders')->select('customer_id')->where('customer_id', '=',  $data1)->take(1)->get();
 
   
 
  
 
    
 
 
    
     
       //$data1 = $request->input('customer_number');
 
        if(count($request->product_name) > 0)
        {
 
            
      
           
         
        // $cus= DB::select('select customer_number from customs where customer_number = ? ',[$data1]);
        
      //$custom=DB::select('select * from customers');
   
     //$cus = DB::table('customs')->select('customer_number')->where('customer_number', '=', ' $data1')->get();
    //Customs::select('customer_number')->where('customer_number', '=',  $data1)->get();
       //$data2=Customers::find($data1);
 
 
 foreach($students as $stud){
 
 
     if( $stud->customer_id==$data1){
 
 
         $ord = DB::table('Orders')->select('order_number')->where('customer_id', '=',  $data1)->orderBy('order_number', 'desc')->take(1)->get();
          // $cus = DB::table('customers')->where('order_number', '=', $data)->get();
      //   $ord= DB::select('select order_number from customers where customer_number = ? order by order_number desc limit 1',[$data1]);
        
     // $ord=Customs::orderby('order_number','desc')->take(1)->get();
   //  $students = DB::table('customs')->get();
   foreach($ord as $or){
 
      $ors = $or->order_number + 1;
 
      foreach($request->product_name as $item=>$v){
       
       //$data->customer_number=$request->customer_number;
      // $data->order_number=$request->order_number; 
    $current = Carbon::now();
    
     
 
 
          $data2=array(
       
           
              'product_id'=>$request->product_name[$item],
             
              'quantity'=>$request->quantity[$item],
              'productinitial_quantity'=>$request->quantity[$item],
              'price'=>$request->price[$item],
     
              //'order_number'=>$request->order_number,
              'order_number'=>$ors,
              'customer_id'=>$data1,
           
            
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now()
             
          );
          
     
          Order::insert($data2);
       
     }
     return redirect()->back()->with('success','Order Create Succesfullyy');
 } 
 
     }   
 
    
      
        }
 
 
 
        $user = Order::where('customer_id', '=', $data1)->first();
 
        if(  $user===null){
 
         $order_number=1;
 
         foreach($request->product_name as $item=>$v){
             //$data->customer_number=$request->customer_number;
            // $data->order_number=$request->order_number; 
            $current = Carbon::now();
      
            $expire_date = Carbon::now()->addHours($request->expire_date); 
             
                $data2=array(
             
               
                    'product_id'=>$request->product_name[$item],
                   
                    'quantity'=>$request->quantity[$item],
                    'price'=>$request->price[$item],
                    'productinitial_quantity'=>$request->quantity[$item],
                    //'order_number'=>$request->order_number,
                    'order_number'=>$order_number,
                    'customer_id'=>$data1,
                  
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                   
                );
                
       
                Order::insert($data2);
             
          }
          return redirect()->back()->with('success',' Order Create Succesfully');
     } 
   
 
        }


        
      
    }

  
 
    public function upadteorder(Request $request)
    {
     
        $id=$request->id;
    
     $price=$request->price;
    
 
     $quantity=$request->quantity;

     $data=Order::find($id);
     
     $data->productinitial_quantity=$quantity;
     $data->price=$price;
     $data->save();
 
     $data=01;
    
     $customer_data=DB::table('Orders')->join('productimages','productimages.id','=','Orders.product_id')->select('Orders.id','productimages','quantity','price','productimagename')->where('Orders.customer_id','=',$data)->get();
 
    
     
 
    
     return redirect()->back()->with('customer_data' , $customer_data);
  
     
    
    }
    public function removeorder($id) 
    {
  
 
     $cus1=Order::find($id);
     $cus1->delete();
     
     
     return redirect()->back();
    
    
    
    }

    public function reservedsuppliers($id){

        $customer_data=DB::table('orders')->join('reserves','reserves.order_id','=','orders.id')->join('productimages','productimages.id','=','orders.product_id')->join('suppliers', 'reserves.supplier_Id', '=', 'suppliers.supplierId')->select('suppliers.supplierId','reserved_quantity','reserved_price','product_id','name','productimagename','productimages.image','suppliers.image')->where('reserves.order_id','=',$id)->get();  
     //  return view('customer_order.reservedsuppliers')->with('customer_data' , $customer_data);
     $data=3;
     $customerdetailes = DB::table('customers')->select('image','companyname','address','phoneNo','email','name')->where('customerId','=',$data)->get();
 // $proid=DB::table('ordercustomers')->select('product_id')->where('ordercustomers.id','=',$id)->get();
 $displayname = DB::table('orders')->join('productimages','productimages.id','=','orders.product_id')->select('image','productimagename')->where('orders.id','=',$id)->get();
     //   $displayname=DB::table('productimages')->join('ordercustomers','ordercustomers.product_id','=','productimages.id')->select('image','productimagename')->where('ordercustomers.product_id','=',$id)->get(); 
      return view('customer_order.reservedsuppliers')->with('displayname',$displayname)->with('customer_data' , $customer_data)->with('customerdetailes',$customerdetailes);
    // return redirect()->back();  
        
       // $productname = DB::table('productimages')->select('id','productimagename')->where('id','=',$id)->get();
    }

    public function customerdash(){
       // return "fgfgfgf";
    $data=8;

        $customerdetailes = DB::table('customers')->select('customerId','image','companyname','address','phoneNo','email','name')->where('customerId','=',$data)->get();
        return view('layouts.customerdash')->with('customerdetailes',$customerdetailes);
    }
    
    public function customerdashboard(){
        // return "fgfgfgf";
     $data=Auth::user()->id;
 
         $customerdetailes = DB::table('customers')->select('image','companyname','address','phoneNo','email','name')->where('customerId','=',$data)->get();
         return view('customerlayouts.customerdash')->with('customerdetailes',$customerdetailes);
         return $customerdetailes;
     }
 

 
    public function showordertocustomer(){
        $data=3;
        $customerdetailes = DB::table('suppliers')->select('image','name ','address','phoneNo  ','email')->where('supplierId','=',$data)->get();
        return view('customer_order.showordertosupplier')->with('customerdetailes',$customerdetailes);

    }


    public function viewreservedonesupplier($supplierId){
        $data=3;

        
      //  $customer_data = DB::table('suppliers')->select('image','name ','address','phoneNo ','email')->where('id','=',$id)->get();
      //  return view('customer_order.customerdashboard')->with('customerdetailes',$customerdetailes);
       $onlysupplierreserved = DB::table('reserves')->join('orders','orders.id','=','reserves.order_id')->join('productimages','productimages.id','=','orders.product_id')->select('reserved_quantity','reserved_price','product_id','productimagename','image')->where('reserves.customer_id','=',$data)->where('reserves.supplier_Id','=',$supplierId)->get();
              //  $onlysupplierreserved = DB::table('reserves')->join('Orders','reserves.order_id','=','Orders.id')->join('productimages','Orders.product_id','=','productimages.id')->select('supplier_id','reserved_quantity','reserved_price','order_id','productimagename','image')->where('reserves.customer_id','=',$data)->where('reserves.supplier_id','=',$id)->get();
             
             
              $customerdetailes = DB::table('customers')->select('image','companyname','address','phoneNo','email','name')->where('customerId','=',$data)->get();
               
              $displayname =DB::table('suppliers')->select('image','name','address','phoneNo','email')->where('supplierId','=',$supplierId)->get();
              return view('customer_order.onesuppliersorders')->with('onlysupplierreserved',$onlysupplierreserved)->with('displayname',$displayname)->with('customerdetailes',$customerdetailes);
            }
}
?>