<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    //
    public function index(Request $request){
        $posts      = DB::table('posts')->where('id', $request->id)->get(['id', 'title', 'body']);
        // $posts      = DB::table('posts')->where('created_at', '>', now()->subDay())->orWhere('title', 'Prof.')->get(['id', 'title', 'body']);
        // dd($posts);
        return response($posts,200);
    }
}
