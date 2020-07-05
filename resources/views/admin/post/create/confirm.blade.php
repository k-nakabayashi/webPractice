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

                    <form action="{{ route('admin.posts.create') }}" method="POST" id="js-form">
                        @csrf
                        <div class="form-group">
                            <label>記事タイトル</label>
                            <input class="form-control" type="text" name="subject" value="{{ $data['subject'] }}" disabled>
                        </div>
                        <div class="form-group">
                            <label>記事内容</label>
                            <textarea class="form-control" name="detail" disabled>{{ $data['detail'] }}</textarea>
                        </div>                 
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary" id="js-submit">記事を投稿する</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
