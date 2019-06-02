@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>ユーザ一覧</h1>
            @foreach ($users as $user)
            <div class="card mb-4">
            <a href="{{ route('mypage', ['user'=> $user])}}">
                <div class="card-header">
                    <div class="row">
                        <span class="col-md-6">
                            ユーザ名 {{ $user->name }}
                        </span>
                        <span class="col-md-6">
                           登録日時 {{ $user->created_at->format('Y年m月d日　h時m分s秒') }}
                        </span>
                    </div>
                </div>
           </a>

        </div>
        @endforeach
        </div>
    </div>
</div>
@endsection