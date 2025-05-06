@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end align-items-center">
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#targetModal">
        🎯 目標体重を設定
    </button>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-outline-danger me-2">ログアウト</button>
    </form>
</div>

<div class="card mb-4">
    <div class="card-body">
        <p class="card-text">目標体重：<strong>{{ $target->target_weight ?? '未設定' }}kg</strong></p>

        @if(isset($latestWeight))
            <p class="card-text text-success">
                目標まで：<strong>{{ number_format($target->target_weight - $latestWeight->weight, 1) }}kg</strong>
            </p>
            <p class="card-text">最新体重：<strong>{{ $latestWeight->weight }}kg</strong></p>
        @else
            <p class="card-text text-muted">まだ体重記録がありません</p>
        @endif
    </div>
</div>
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#weightModal">
    データ追加
</button>

<div class="mb-4">
    <form action="{{ route('weights.index') }}" method="GET" class="row g-3 align-items-end">
        <div class="col-auto">
            <label for="from" class="form-label">開始日</label>
            <input type="date" name="from" id="from" class="form-control" value="{{ request('from') }}">
        </div>
        <div class="col-auto">
            <label for="to" class="form-label">終了日</label>
            <input type="date" name="to" id="to" class="form-control" value="{{ request('to') }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">検索</button>
        </div>
        @if(request('from') || request('to'))
        <div class="col-auto">
            <a href="{{ route('weights.index') }}" class="btn btn-secondary">リセット</a>
        </div>
        @endif
    </form>
</div>
@if(request('from') || request('to'))
    <p class="text-muted">
        「{{ request('from') ?? '指定なし' }}」〜「{{ request('to') ?? '指定なし' }}」の検索結果　<strong>{{ $weights->count() }}件</strong>
    </p>
@endif

    <!-- 一覧表示 -->
    <table class="table table-bordered table-hover text-center align-middle">
        <thead class="table-light">
            <tr>
                <th>日付</th>
                <th>体重 (kg)</th>
                <th>摂取カロリー (kcal)</th>
                <th>運動時間 (分)</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($weights as $weight)
                <tr>
                    <td>{{ $weight->date }}</td>
                    <td>{{ $weight->weight }}</td>
                    <td>{{ $weight->intake_calories ?? '-' }}</td>
                    <td>{{ $weight->exercise_minutes ?? '-' }}</td>
                    <td>
                        <!-- 編集ボタン（鉛筆アイコン） -->
                        <a href="{{ route('weights.show', $weight->id) }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-pencil-square"></i> {{-- Bootstrap Icons --}}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- モーダル -->
@include('weight_logs.modal')
@include('weight_logs.modal_target')

@endsection
