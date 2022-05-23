<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Post;


class PostsController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        $tweets = Post::join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.id', 'posts.user_id', 'posts.posts', 'posts.created_at', 'users.username', 'users.images')
            ->get();
        //ddd($user,$tweets);
        return view('posts.index',['user'=>$user, 'tweets'=>$tweets]);
    }

    public function tweet(Request $request) {
        $tweet = $request->input('tweet');

        Post::create([
            'user_id' => Auth::id(),
            'posts' => $tweet,
        ]);

        return redirect('/top');
    }

    public function update(Request $request) {
        $data = $request->all();

        $up_post = $request->input('posts');
        Post::where('id', $id)
            ->update(['post' => $up_post]);
            return redirect('/index');
    }

    public function delete($id) {
        Post::destroy($id);

        return redirect('/top');

    }

    public function logout() {
        Auth::logout();
        return redirect('login');
    }
}
