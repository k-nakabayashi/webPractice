@extends('layouts.admin')

@section('content')
<div class="container admin" id="post-index">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">投稿記事一覧</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <a class="btn btn-primary btn-lg mr-3" href="{{ route('admin.posts.create.get') }}">新しく記事を投稿する</a>
                        <a class="btn btn-secondary btn-lg" href="{{ route('admin.posts.myIndex', ['post' => 'show']) }}">自分の投稿一覧</a>
                    </div>
                    <div class="row">
                        
                        @foreach ($postList as $post)
                        <div class="col-md-4">
                            <div class="card p-0 mt-4">
                                <div class="c-PostList">
                                    <div class="card-header a-Title"><a class="ep-Link" href="#">{{$post->subject}}</a></div>
                                    <div class="card-body u-Above2">
                                        <div class="a-Txt mt-0">
                                            <p class="card-text">{{$post->detail}}</p>
                                        </div>

                                        <div class="u-btn-wrapper">
                                            <a href="#" class="btn btn-primary mr-3">編集</a>
                                            <a href="#" class="btn btn-secondary">削除</a>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
