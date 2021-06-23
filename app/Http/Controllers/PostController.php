<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cookie;
use Session;


class PostController extends Controller
{   
    public function showMain(){
        $content = get_data_api("http://news-admin.local/api/v1/post");
        // dd($content);
        $redis = Redis::set('content', json_encode($content));
        // dd($redis);
        $redis = Redis::get('content');
        // dd(json_decode($redis, true));
        $viewweb = Cookie::queue('viewweb', 'yes' , 1);
        $viewweb = Cookie::get('viewweb',null);
        return view('welcome', ['content' => json_decode($redis, true), 'viewweb' => $viewweb]);
    }

    public function show($id)
    {   
        // $method = "POST";

        $content = get_data_api("http://news-admin.local/api/v1/exams/" . $id);
        // dd($content, $id);

        $redis = Redis::set('content', json_encode($content));
        $redis = Redis::get('content');
        // dd($redis);

        $content = json_decode($redis, true);
        // dd($content);
        $post = $content['post']['post_sub_2'];

        $sessionView = Session::flash('success', '100000000');
        // $sessionView = Session::get('success');

        // $e = Session::has('success');

        // session()->flash('testFlash', 'Đây là session flash');

        if($content['post']==null){
            return abort(404);
        }

        return view('post.detail', ['content'=>$content, 'post'=>$post, 'sessionView'=>$sessionView]);
    }

    public function showCategory($category){
        $content = get_data_api("http://news-admin.local/api/v1/category/" . rawurlencode($category));

        $redis = Redis::set('content', json_encode($content));
        $redis = Redis::get('content');

        $content = json_decode($redis, true);
        // dd($content, $category);

        if ($category != $content['categories'][0]['post_category'] && $category != $content['categories'][1]['post_category'] && $category != $content['categories'][2]['post_category'] && $category != $content['categories'][3]['post_category']) {
            return abort(404);
        }

        return view('post.category', ['content'=>$content, 'category'=>$category]);
    }

    public function createSession(){
        session()->flash('flash', 'Đây là session Flash');
    }

    public function getSession(){
        return session()->get('flash');
    }
}



