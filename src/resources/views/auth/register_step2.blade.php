@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">目標体重を登録</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.step2.post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="target_weight" class="form-label">目標体重 (kg)</label>
            <input type="number" name="target_weight" class="form-control" value="{{ old('target_weight') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">登録して開始</button>
    </form>
</div>
@endsection