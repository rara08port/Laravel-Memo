@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="border p-4">

                <h1 class="h5 mb-4">
                    <i class="fas fa-pencil-alt fa-2x"></i>
                    投稿の新規作成
                </h1>

                <form method="post" action="{{ route('posts.store') }}">
                    {{ csrf_field() }}

                    <input name="user_id" type="hidden" value="{{ Auth::id() }}">
                    <input name="name" type="hidden" value="{{ Auth::user()->name }}">

                    <div class="mb-4">

                        <div class="form-group">
                            <label>タイトル</label>
                            <input name="title" type="text" value="{{ old('title') }}" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">
                            @if ($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                            @endif
                        </div>


                        <div class="form-group">
                            <label>本文</label>

                            <textarea  name="body" rows="4" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}">{{ old('body') }}</textarea>
                            @if ($errors->has('body'))
                            <div class="invalid-feedback">
                                {{ $errors->first('body') }}
                            </div>
                            @endif
                        </div>

                        <div class="mt-5">
                            <a class="btn btn-secondary" href="{{ route('top') }}">
                                キャンセル
                            </a>

                            <button type="submit" class="btn btn-success">
                                投稿する
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection