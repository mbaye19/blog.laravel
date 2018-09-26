<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\user\like;
use App\Model\user\post;
use App\Model\user\category;
use App\Model\user\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post(post $post)
    {
        $tags = tag::orderBy('name','DESC')->get();
        $categories = category::orderBy('name','DESC')->get();
    	return view('user.post',compact('post','categories','tags'));
    }

    public function getAllPosts()
    {
    	return $posts = post::with('likes')->where('status',1)->orderBy('created_at','DESC')->paginate(3);
    }
}
