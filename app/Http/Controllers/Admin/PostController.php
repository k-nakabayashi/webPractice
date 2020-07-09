<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use App\Responder\InterfaceResponder;

class PostController extends Controller
{
    use AdminGuardBroker;
    private $post;
    private $postResponder;
    public function __construct(Post $post, InterfaceResponder $postResponder)
    {
        $this->post = $post;
        // $this->postResponder = $postResponder;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postList = Post::where("deleted_at", null)->get();
        return view('admin.post.index')->with('postList', $postList);
    }

    public function myIndex()
    {
        $admin = Auth::user();
        $postList = $admin->posts()->where(["deleted_at"=>null])->get();
        return view('admin.post.index')->with('postList', $postList);

    }

    public function confirm(PostRequest $request)
    {

        $request->flash();
        return view('admin.post.create.confirm');
    }

    public function back(Request $request)
    {

        $request->flash();
        return redirect()->route('admin.posts.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PostRequest $request)
    {
        //データ取得
        $data = $request->all();
        unset($data['_token']);

        //作成
        $id = Auth::id();
        $data['admin_id'] = $id;
        $result = $this->post->create($data);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        $post = $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
