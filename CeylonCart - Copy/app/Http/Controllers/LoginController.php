<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

use DB;
class LoginController extends Controller
{
    
    public function index()
    {
       return view('loginpages.cclogin');///login page
    }

    public function SelectCategoryIndex()
    {
       return view('loginpages.category');// category selection
    }

    public function SelectCustomer(){

         return view('customerpages.customer'); // customer reg page
    
       
   }

   public function SelectSupplier(){

      return view('supplierpages.supplier'); // supplier reg page
    
}
   
      public function StoreLoginData(Request $request){

        $log = new User();

        $log->email = $request->email;
        $log->password = bcrypt($request->password);
        $log->save();
         
        return redirect()->back()->with('message','You are logging successfully..');
      }

           
      public function LoginUser(Request $request){

         $data = $request->only('email','password');
         $email=$request->email;
         $pass=$request->password;
         $category="Customer";
      
         if(Auth::attempt(['email' => $request->email, 'password' => $request->password,'category'=>'Customer']))
                  
           // return view('customer_order.customerdashboard');
            return redirect('/customerdash');
                     
                  
         if(Auth::attempt(['email' => $request->email, 'password' => $request->password,'category'=>'Supplier']))
                     
            return redirect('/supplierprofile');
//new
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password,'category'=>'Admin']))
                     
            return redirect('/admin');
  //============       
         else {
            return redirect()->back()->with('message2','Login Failed..Invalid User name or Password'); 
         }
                  
      }
            

      public function logout(){
            Auth::logout();
            Session::flush();
            return redirect("/")->with('message','Logged Out..');
      }

      public function indexviewhome(){
              return view('loginpages.homepage');
      }
   
}




  

    