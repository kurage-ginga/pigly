@extends('layouts.app')

@section('title')
ログイン - PiGLy
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center">会員登録</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.step1.post') }}">
                        @csrf

                        <!-- 名前 -->
                        <div class="mb-3">
                            <label for="name" class="form-label">名前</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- メールアドレス -->
                        <div class="mb-3">
                            <label for="email" class="form-label">メールアドレス</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- パスワード -->
                        <div class="mb-3">
                            <label for="password" class="form-label">パスワード</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" required>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- 次に進む -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">次に進む</button>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('login') }}">ログインはこちら</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection