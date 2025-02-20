<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;
use DB;

class HomeController extends Controller
{

    public function index()
    {
        return view('front.index');
    }

    public function menu()
    {
        return view('front.menu');
    }

    public function menus($slung)
    {
        $Category = Category::where('slung',$slung)->get();
        foreach ($Category as $key => $value) {
            $title = $value->cat;
        }
        $Menu = Menu::where('cat_id',$value->id)->get();
        return view('front.menus', compact('title','Menu'));
    }

    public function delivery(){
        $Terms = DB::table('terms')->get();
        return view('front.delivery', compact('Terms'));
    }

    public function terms(){
        $Terms = DB::table('terms')->get();
        return view('front.terms', compact('Terms'));
    }

    public function privacy(){
        $Terms = DB::table('privacy')->get();
        return view('front.privacy', compact('Terms'));
    }

    public function copyright(){
        $Terms = DB::table('copyright')->get();
        return view('front.copyright', compact('Terms'));
    }

    public function sendTrials(){
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
            return response()->json($response);
    }
}
