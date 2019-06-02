@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="border p-4">
              <h1 class="h5 mb-4">
                 投稿の編集
              </h1>
              <form method="post" action="{{ route('posts.update', ['post' => $post]) }}">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div class="mb-4">
                <div class="form-group">
                    <label>タイトル</label>
                    <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ old('title') ?: $post->title }}" >
                    @if ($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>本文</label>

                    <textarea  name="body" rows="4" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" >{{ $post->body }}</textarea>
                    @if ($errors->has('body'))
                    <div class="invalid-feedback">
                        {{ $errors->first('body') }}
                    </div>
                    @endif
                </div>

                <div class="mt-5">
                    <a class="btn btn-secondary" href="{{ route('posts.show', ['post' => $post]) }}">
                        キャンセル
                    </a>

                    <button type="submit" class="btn btn-success">
                        更新する
                    </button>
                </div>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection