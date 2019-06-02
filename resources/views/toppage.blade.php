@extends('layouts.layout')

@section('content')


<div class="container">
    <div class="content">
        <div class="row mt-5">
            <div class="col-8 d-flex align-items-center">
                <h5>Laravel-Memoは<br>
                    フレームワークLaravelを使用して作った掲示板です。<br>
                    各ユーザーの投稿に対してコメント出来ます。</h5>
            </div>
            <div class="col-4">
                <img class="logo" src="{{ asset('img/notepad.png') }}" alt="logo">

            </div>
        </div>

        <div class="text-center mt-3">
            <a href="{{ route('login') }}" class="btn btn-success btn-lg">
                ログイン
            </a>
            <a href="{{ route('register') }}" class="btn btn-success btn-lg">
                登録する
            </a>
        </div>
    </div>
</div>
@endsection