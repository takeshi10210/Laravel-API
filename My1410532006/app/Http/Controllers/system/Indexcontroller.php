<?php

namespace App\Http\Controllers\system;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Session;

use App\Model\post;
use App\Model\reply;



class Indexcontroller extends Controller
{
    public function index(Request $re){ //留言列表
        if(Session::has('token')){
            $api_token = Session::get('token');
            $user_name = Session::get('user');
            //dd($user_name);
            $url = 'http://localhost/my_api/api/index';
            $client = new Client();
            $response = $client->get($url , [
                'query' => [
                    'sort' => $re->input('sort'),
                    'page' => $re->input('page'),
                ],
                'json'=>[
                    'user' => $user_name['name'],
                    'save' => $re->input('save'),
                    'del' => $re->input('del'),
                    'alldel' => $re->input('alldel'),
                    'edit' => $re->input('edit'),
                ],
                'headers'=>[
                    "Authorization" => "Bearer ".$api_token,
                ]
            ]);
            $data = $response->getBody();
            echo $data;
        }else{
            return Redirect('/login');
        }
    }


    public function insert(Request $re){
        
    }

    public function new_post(){//載入新增文章頁面
        if(Session::has('token')){
            $api_token = Session::get('token');
            $user_name = Session::get('user');
            //dd($user_name['name']);
            $url = 'http://localhost/my_api/api/new';
            $client = new Client();
            $response = $client->get($url , [
                'json'=>[
                    'user' => $user_name['name'],
                ],
                'headers'=>[
                    "Authorization" => "Bearer ".$api_token,
                ]
            ]);
            $data = $response->getBody();
            echo $data;
        }else{
            return Redirect('/login');
        }
    }

    public function reply(Request $re){//回覆文章頁面
        
    }

    public function login(){//載入新增文章頁面
        return View('login');
    }
    public function tologin(Request $re){//載入新增文章頁面
        $url = 'http://localhost/my_api/api/auth';
        $client = new Client();
        $rp = $client->post($url,[
                'json' => [
                    'email' => $re->input('email'),
                    'password' => $re->input('password'),
                ]
            ]);
        $acc_token = json_decode($rp->getBody(),true);

        //dd($acc_token['acc']);

        Session::put('token', $acc_token['token']);

        Session::put('user', $acc_token['acc']);


        return Redirect('/index');
    }

}


