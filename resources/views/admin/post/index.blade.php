@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <div>
                        <a href="{{ route('admin.posts.create.get') }}">新しく記事を投稿する</a>
                    </div>

                    <div>
                        @foreach ($postList as $post)
                        <div>
                            <a href="#">{{$post['subject']}}</a>
                            <p>{{$post['detail']}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
