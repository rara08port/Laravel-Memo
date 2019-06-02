@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mypage_name">

                <h1>{{$user[0]->name}}さんの投稿</h1>

            </div>


            @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-header theme-color-bk">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {{ str_limit($post->body,100) }}

                    </p>

                    <a class="card-link" href="{{ route('posts.show', ['post' => $post]) }}">
                        詳細について
                    </a>

                </div>
                <div class="card-footer theme-color-bk">
                    <div class="row">
                        <span class="col-md-6">
                            投稿者 {{ $post->name }}
                        </span>
                        <span class="col-md-6">
                            投稿日時 {{ $post->created_at->format('Y年m月d日　h時m分s秒') }}
                        </span>
                        @if ($post->comments->count())
                        <span class="badge badge-success">
                            コメント {{ $post->comments->count() }}件
                        </span>
                        @endif
                    </div>
                </div>

            </div>

            @endforeach

        </div>
    </div>
</div>
 @endsection