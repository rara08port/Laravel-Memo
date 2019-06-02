@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="border p-3">
                <h1 class="h4 mb-3">
                    {{ $post->title }}
                </h1>


                @if ($post->user_id == Auth::id())
                <div class="mb-4 text-right d-flex justify-content-end">
                    <a class="btn btn-success mr-2" href="{{ route('posts.edit', ['post' => $post]) }}">
                        編集する
                    </a>

                    <form method="post" action="{{ route('posts.destroy', ['post' => $post]) }}">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger">削除する</button>
                    </form>
                </div>
                @endif



                <p class="mb-5">
                    {{ $post->body }}
                </p>

                <div class="comment-are">
                    <h2 class="h5 mb-4">
                        コメント
                    </h2>

                    <form class="mb-4" method="post" action="{{ route('comments.store') }}">
                        {{ csrf_field() }}

                        <input name="post_id" type="hidden" value="{{ $post->id }}">
                        <input name="user_id" type="hidden" value="{{ Auth::id() }}">

                        <div class="form-group">
                            <input name="name" type="hidden" value="{{ Auth::user()->name }}">

                        </div>

                        <div class="form-group">
                            <label for="body">
                                本文
                            </label>

                            <textarea name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="4">{{ old('body') }}</textarea>
                            @if ($errors->has('body'))
                            <div class="invalid-feedback">
                                {{ $errors->first('body') }}
                            </div>
                            @endif
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-success">
                                コメントする
                            </button>
                        </div>
                    </form>


                    @forelse($post->comments as $comment)
                    <div class="border-top p-3">

                        <div class="card-header theme-color-bk">
                            <span class="col-md-6">
                                投稿者 {{ $comment->name }}
                            </span>
                            <span class="col-md-6">
                                投稿日時 {{ $comment->created_at->format('Y.m.d H:i') }}
                            </span>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                {{ $comment->body }}
                            </p>
                        </div>

                    </div>
                    @empty
                    <p>コメントはまだありません。</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection