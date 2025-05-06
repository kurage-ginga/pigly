@extends('layouts.app')

@section('title')
ログイン - PiGLy
@endsection

@section('content')
<div class="container mt-5" style="max-width: 400px;">
    <h2 class="mb-4">ログイン</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">メールアドレス</label>
            <input id="email" type="email" name="email" class="form-control" required autofocus>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">パスワード</label>
            <input id="password" type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3 form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label" for="remember">
                ログイン情報を記憶する
            </label>
        </div>

        <button type="submit" class="btn btn-primary w-100">ログイン</button>
        <div class="text-center mt-3">
            <a href="{{ route('register') }}">アカウント作成はこちら</a>
        </div>
    </form>
</div>
@endsection