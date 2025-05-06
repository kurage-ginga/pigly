@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 600px;">
    <h3 class="text-center mb-4">体重記録の詳細・編集</h3>

    <form action="{{ route('weights.update', $weight->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3 d-flex justify-content-between align-items-center">
            <label for="date" class="form-label mb-0">日付：</label>
            <input type="date" name="date" id="date" class="form-control w-50"
                value="{{ old('date', $weight->date) }}" required>
        </div>

        <div class="mb-4 d-flex justify-content-between align-items-center">
            <label for="weight" class="form-label mb-0">体重 (kg)：</label>
            <input type="number" name="weight" id="weight" step="0.1"
                class="form-control w-50" value="{{ old('weight', $weight->weight) }}" required>
        </div>

        <div class="d-flex justify-content-center mb-3">
            <button type="submit" class="btn btn-primary me-2">更新する</button>
            <a href="{{ route('weights.index') }}" class="btn btn-secondary">戻る</a>
        </div>
    </form>

    <form action="{{ route('weights.destroy', $weight->id) }}" method="POST" class="text-end">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">🗑️</button>
    </form>
</div>
@endsection