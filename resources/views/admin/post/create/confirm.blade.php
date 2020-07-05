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
                        <input type="hidden" name="subject" value="{{ $data['subject'] }}">
                        <input type="hidden" name="detail" value="{{ $data['detail'] }}">
                        <div class="form-group">
                            <label>記事タイトル</label>
                            <p>{{ $data['subject'] }}</p>
                        </div>
                        <div class="form-group">
                            <label>記事本文</label>
                            <p>{{ $data['detail'] }}</p>
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
