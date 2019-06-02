@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-4">

                <a href="{{ route('posts.create') }}" class="btn btn-success">
                    投稿を新規作成する
                </a>
                <a href="{{ route('userslist') }}" class="btn btn-secondary ml-5">
                    ユーザ　一覧
                </a>
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
            
            <div class="d-flex justify-content-center mb-5 ">
                {{ $posts->links() }}
            </div>

        </div>
    </div>

</div>
@endsection