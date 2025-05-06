
<!-- Modal -->
<div class="modal fade" id="targetModal" tabindex="-1" aria-labelledby="targetModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('target.update') }}">
            @csrf
            @method('PUT') <!-- 更新ならPUT -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="targetModalLabel">目標体重の設定</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="target_weight" class="form-label">目標体重 (kg)</label>
                        <input type="number" step="0.1" name="target_weight" id="target_weight"
                            class="form-control @error('target_weight') is-invalid @enderror"
                            value="{{ old('target_weight', $target->target_weight ?? '') }}" required>
                            @error('target_weight')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">保存する</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                </div>
            </div>
        </form>
    </div>
</div>