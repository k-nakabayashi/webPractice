@extends('layouts.admin')

@section('content')
<div class="container admin" id="post-create">
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

                    <form action="{{ route('admin.posts.create.confirm') }}" method="POST" id="js-form">
                        @csrf
                        <div class="form-group">
                            <div class="u-errorWrapper">
                                 <label class="@error('subject')is-invalid @enderror">記事タイトル</label>
                                @error('subject')
                                <span class="a-Error invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
          
                            <input class="form-control @error('subject') is-invalid @enderror" type="text" name="subject"　value="{{ old('subject') }}">
                        </div>
                        <div class="form-group">
                            <div class="u-errorWrapper">
                                <label class="@error('detail') is-invalid @enderror">記事本文</label>
                                @error('detail')
                                <span class="a-Error invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>   
                            <textarea class="form-control @error('detail') is-invalid @enderror" name="detail" rows="10">{{ old('detail') }}</textarea>
                        </div>                 
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary" id="js-submit">内容を確認する</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
