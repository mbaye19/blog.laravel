<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\user\category;
use App\Model\user\post;
use App\Model\user\tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = category::orderBy('name','DESC')->get();
        $tags = tag::orderBy('name','DESC')->get();
    	$posts = post::where('status',1)->orderBy('created_at','DESC')->paginate(3);
    	return view('user.blog',compact('posts','categories','tags'));
    }
    public function tag(tag $tag)
    {
        $tags = tag::orderBy('name','DESC')->get();
        $posts = $tag->posts();
        return view('user.blog',compact('posts','tags'));
    }

    public function category(category $category)
    {
        $categories = category::orderBy('name','DESC')->get();
        $posts = $category->posts();
        return view('user.blog',compact('posts','categories'));
    }
}
