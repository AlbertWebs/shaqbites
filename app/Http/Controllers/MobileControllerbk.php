<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Auth;
use Hash;
use DB;
use App\Models\User;
use App\Models\Code;
use App\Models\Menu;
use App\Models\Category;



class MobileController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $Menu = Menu::all();
        $Category = Category::all();
        return view('mobile.home', compact('Menu','Category'));
    }

    public function profile(){
        $Menu = Menu::all();
        $Category = Category::all();
        return view('mobile.profile');
    }

    public function transactions (){
        $Menu = Menu::all();
        $Category = Category::all();
        return view('mobile.transactions');
    }

    public function orders  (){
        $Order  = \App\Models\orders::all();
        $Category = Category::all();
        return view('mobile.orders', compact('Order'));
    }



    public function location(Request $request)
    {
        $ip = $request->ip();
        // $ip = '197.156.140.165';
        $currentUserInfo = Location::get($ip);

        return view('mobile.location', compact('currentUserInfo'));
    }

    public function sign_up(Request $request)
    {
        // $ip = $request->ip();
        $ip = '197.156.140.165';
        $currentUserInfo = Location::get($ip);

        return view('mobile.sign-up', compact('currentUserInfo'));
    }

    public function login(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $Username = Auth::User()->email;
                return response()->json([
                    "message" => "Success"
                ]);
        }else{
                return response()->json([
                    "message" => "Fail"
                ]);
        }
    }

    public function sign_up_post(Request $request){
         $name = $request->name;
         $email = $request->email;
         $mobile = $request->mobile;
         $address = $request->address;
         $password = $request->password;
         $password_confirm = $request->password_confirm;

         $User = DB::table('users')->where('email',$email)->get();
         $Check = count($User);

         if($password == $password_confirm){
            if($Check == 0){
                // create user
                $password_inSecured = $password;
                //harshing password Here
                $password = Hash::make($password_inSecured);
                $User = new User;
                $User->name = $request->name;
                $User->email = $request->email;
                $User->location = $request->address;
                $User->mobile = $request->mobile;
                $User->notes = " ";
                $User->password = $password;
                $User->save();

                $user = User::where('email','=',$email)->first();
                Auth::loginUsingId($user->id, TRUE);
                return response()->json([
                    "message" => "Success"
                ]);
            }else{
                return response()->json([
                    "message" => "That email is already in use by another person"
                ]);
            }
        }else{
            return response()->json([
                "message" => "Password Did Not Match!"
            ]);
        }
    }
    public function generateCode(){
        $num_str = sprintf(mt_rand(1000, 9999));
        $Codes = DB::table('codes')->where('code',$num_str)->get();
        if($Codes->isEmpty()){
            $Add = new Code;
            $Add->code = $num_str;
            $Add->user = Auth::User()->id;
            $Add->save();
            $Code = $num_str;
        }else{
            $Code = $this->generateCode();
        }
        return $Code;
    }

    public function send_verification(Request $request){
        // Generate Random Code
        $Code = $this->generateCode();

        $Message = "$Code is Your Verification code";
        $PhoneNumbers = $request->mobile;
        $PhoneNumber = str_replace("+","",$PhoneNumbers);


        $this->send($Message,$PhoneNumber);
        return response()->json([
            "message" => "Success"
        ]);
    }

    public function verify(Request $request){
        $code = $request->code;
        $Check =  DB::table('codes')->where('code',$code)->get();
        if($Check->isEmpty()){
            return response()->json([
                "message" => "Wrong Code"
            ]);
        }else{
            $updateDetails = array('status'=>1);
            DB::table('codes')->where('user', Auth::User()->id)->where('code',$code)->update($updateDetails);
            return response()->json([
                "message" => "Success"
            ]);
        }
    }


    public function send($Message,$phoneNumber){
        $message = $Message;
        $phone =$phoneNumber;
        $senderid = "SHAQSHOUSE";
        //
        $url = 'https://portal.zettatel.com/SMSApi/send';
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYnVsay5jbG91ZHJlYnVlLmNvLmtlXC8iLCJhdWQiOiJodHRwczpcL1wvYnVsay5jbG91ZHJlYnVlLmNvLmtlXC8iLCJpYXQiOjE2NTM5Nzc0NTEsImV4cCI6NDgwOTczNzQ1MSwiZGF0YSI6eyJlbWFpbCI6ImluZm9AZGVzaWduZWt0YS5jb20iLCJ1c2VyX2lkIjoiMTQiLCJ1c2VySWQiOiIxNCJ9fQ.N3y4QhqTApKi46YSiHmkaoEctO9z6Poc4k1g44ToyjA";

            $post_data=array(
            'sender'=>$senderid,
            'phone'=>$phone,
            'correlator'=>'Verification',
            'link_id'=>null,
            'message'=>$message
            );

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://portal.zettatel.com/SMSApi/send",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "userid=shaqshouse&password=vB4xy3eY&sendMethod=quick&mobile=+$phone&msg=$message&senderid=$senderid&msgType=text&duplicatecheck=true&output=json",
                CURLOPT_HTTPHEADER => array(
                    "apikey: e9d00bd511565ce0a7cfc40fe779bc9d33fdc737",
                    "cache-control: no-cache",
                    "content-type: application/x-www-form-urlencoded"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);
            // dd($response);
            return response()->json($response);
    }

    public function sendTrials($Message,$phoneNumber){
        $message = "This is a test message";
        $phone ="254723014032";
        $senderid = "SHAQSHOUSE";
        //
        $url = 'https://portal.zettatel.com/SMSApi/send';
        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYnVsay5jbG91ZHJlYnVlLmNvLmtlXC8iLCJhdWQiOiJodHRwczpcL1wvYnVsay5jbG91ZHJlYnVlLmNvLmtlXC8iLCJpYXQiOjE2NTM5Nzc0NTEsImV4cCI6NDgwOTczNzQ1MSwiZGF0YSI6eyJlbWFpbCI6ImluZm9AZGVzaWduZWt0YS5jb20iLCJ1c2VyX2lkIjoiMTQiLCJ1c2VySWQiOiIxNCJ9fQ.N3y4QhqTApKi46YSiHmkaoEctO9z6Poc4k1g44ToyjA";

            $post_data=array(
            'sender'=>$senderid,
            'phone'=>$phone,
            'correlator'=>'Whatever',
            'link_id'=>null,
            'message'=>$message
            );

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://portal.zettatel.com/SMSApi/send",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "userid=shaqshouse&password=vB4xy3eY&sendMethod=quick&mobile=+$phone&msg=$message&senderid=$senderid&msgType=text&duplicatecheck=true&output=json",
                CURLOPT_HTTPHEADER => array(
                    "apikey: e9d00bd511565ce0a7cfc40fe779bc9d33fdc737",
                    "cache-control: no-cache",
                    "content-type: application/x-www-form-urlencoded"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);
    }

    public function createAPIKey(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://portal.zettatel.com/SMSApi/apikey/create",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "userid=shaqshouse&password=vB4xy3eY&output=json",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/x-www-form-urlencoded"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
    }

    // write a function to read API Key
    public function readAPIKey(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://portal.zettatel.com/SMSApi/apikey/read",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "userid=shaqshouse&password=vB4xy3eY&output=json",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/x-www-form-urlencoded"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
    }


}
