
<div class="modal fade" id="weightModal" tabindex="-1" aria-labelledby="weightModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('weight.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="weightModalLabel">体重を記録</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="date" class="form-label">日付</label>
                        <input type="date" class="form-control" name="date" id="date" required>
                        @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label">体重 (kg)</label>
                        <input type="number" class="form-control" name="weight" id="weight" step="0.1" required placeholder="50.0">kg
                        @error('weight')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="calories" class="form-label">摂取カロリー</label>
                        <input type="number" class="form-control" name="calories" id="calories" required placeholder="1200">cal
                        @error('calories')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exercise" class="form-label">運動時間</label>
                        <input type="text" class="form-control" name="exercise" id="exercise" placeholder="00:00">
                        @error('exercise')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="remarks" class="form-label">運動内容</label>
                        <textarea class="form-control" name="remarks" id="remarks" rows="3" maxlength="120" placeholder="運動内容を追加"></textarea>
                        @error('remarks')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                    <button type="submit" class="btn btn-primary">保存する</button>
                </div>
                @if ($errors->any())
                    <script>
                        const modal = new bootstrap.Modal(document.getElementById('weightModal'));
                        modal.show();
                    </script>
                @endif
            </form>
        </div>
    </div>
</div>