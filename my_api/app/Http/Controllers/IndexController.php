<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class IndexController extends Controller
{
	public function index(Request $re){ //留言列表

        $user_n = $re->input('user');
        Session::put('user_name', 'aaa');
        echo Session::get('user_name');
		

    	if($re->has('save')){ //按下儲存鍵
    		$save_id = key($re->input('save'));
    		$posts = DB::table('posts')->find($save_id);
	    	$posts->ar_name = $re->input('ed_name');
	    	$posts->ar_text = $re->input('ed_text');
	    	$posts->save();
    	}elseif($re->has('del')){ //按下刪除鍵
    		$del_id = key($re->input('del'));
    		$posts = DB::table('posts')->find($del_id);
    		$posts-> delete();
            $replyd = DB::table('replies')->where('ar_id','=',$del_id)->delete();

    	}elseif($re->has('alldel')){ //按下勾選刪除鍵
    		if($re->input('no')!=''){
                DB::table('posts')->destroy($re->input('no'));
                foreach ($re->input('no') as $key) {
                    $replyd = DB::table('replies')->where('ar_id','=',$key)-> delete();
                }
            }
    	}
    	if($re->has('sort')){//按下分類鍵
            $sort=$re->input('sort');
    		$posts = DB::table('posts')->where('ar_sort','=',$re->input('sort'))->paginate(10);
    		$posts->withPath('/My1410532006/index');
    		$posts->appends(['sort' => $re->input('sort') ])->render();
    	}else {
            $sort=null;
            $posts = DB::table('posts')->paginate(10);
            $posts->withPath('/My1410532006/index');
        }
        

    	$replyls = DB::table('replies')->orderBy('created_at', 'desc')
    			   ->get();


    	if($re->has('edit')){//按下編輯鍵
    		$edit_id = key($re->input('edit'));
    		return View('index')->with(compact("posts","edit_id","replyls","ch","sort",'user_n'));
    	}


    	if ($posts->count()==0){ //如果本頁顯示筆數為0,就跳轉到最後一頁
    		if($re->has('sort')){
    			$lurl = url("")."?sort=".$re->input('sort')."&page=".$posts->lastPage();
    		}else $lurl = url("")."?page=".$posts->lastPage();
    		return Redirect($lurl);
    	}
    	return View('index')->with(compact("posts","replyls","ch","sort",'user_n'));
    }


    public function insert(Request $re){
        if($re->has('nw_name') && $re->has('nw_text')){//檢查是否有填入值才進行發文
            $post = new post();
            $post->ar_sort = $re->input('sel');
            $post->ar_name = $re->input('nw_name');
            $post->ar_text = $re->input('nw_text');
            $post->save();
            return Redirect('/');
        }else
        return View('post');
    }

    public function new_post(){//載入新增文章頁面

        dd(Session::get('user_name'));
    	return View('post')->with(compact('u_n'));
    }

    public function reply(Request $re){//回覆文章頁面
    	$post = post::find($re->input('id'));



    	if($re->has('sent')){ //按下送出鍵,發送回覆
	    	if($re->has('nw_name') && $re->has('nw_text')){
                $reply = new reply();
                $reply->ar_id = $re->input('id');
                $reply->re_name = $re->input('nw_name');
                $reply->re_text = $re->input('nw_text');
                $reply->save();
            }
	    }elseif($re->has('save')){//按下儲存鍵
    		$save_id = key($re->input('save'));
    		$reply = reply::find($save_id);
	    	$reply->re_name = $re->input('ed_name');
	    	$reply->re_text = $re->input('ed_text');
	    	$reply->save();

    	}elseif($re->has('del')){//按下刪除鍵
    		$del_id = key($re->input('del'));
    		$reply = reply::find($del_id);
    		$reply-> delete();
    	}

	    $replys = reply::where('ar_id','=',$re->input('id'))//搜尋此文章回覆
	    		  ->orderBy('created_at', 'ASC')
                  ->get();

	   	if($re->has('sort')){//上一頁按鈕網址判斷
	   		$burl = "./?sort=".$re->input('sort')."&page=".$re->input('page');
	   	}elseif($re->has('page')){
	   		$burl = "./?page=".$re->input('page');
	   	}else{
	   		$burl = "./";
	   	}



	    if($re->has('edit')){ //按下編輯鍵
    		$edit_id = key($re->input('edit'));
    		return View('reply')->with(compact("post","edit_id","replys","burl"));
    	}
	    
    	return View('reply')->with(compact("post","replys","burl"));
    }
    
}
