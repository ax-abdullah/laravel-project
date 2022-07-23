<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostsController extends Controller
{
    //
    public function index(){
        $posts = DB::table('posts')->get(['id', 'title', 'body']);
        // foreach($posts as $post){
            //     dd($post);
            // }
            // $post = $post;
            // dd($post);
            $update = DB::table('posts')->where('id',10)->update([
            'title'=> "updated",
            'body'=> "updated",
        ]);
        // dd($post);
            return response()->json($posts);
        }
    public function update(Request $request){
        DB::table('posts')->where('id',$request->id)->update([
            'title'=> $request->title,
            'body'=> $request->body,
            'updated_at'=> now()
        ]);
        $post= DB::table('posts')->where('id', $request->id)->get();
        return response()->json($post);
    }
}
