<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;
use Illuminate\Support\Facades\Auth;
use App\Models\WeightTarget;

class WeightController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => ['required', 'date'],
            'weight' => ['required', 'numeric', 'min:0'],
            'calories' => ['required', 'numeric', 'min:0'],
            'exercise' => ['nullable', 'string', 'max:50'],
            'remarks' => ['nullable', 'string', 'max:120'],
        ]);

        WeightLog::create([
            'user_id' => Auth::id(),
            'date' => $validated['date'],
            'weight' => $validated['weight'],
            'calories' => $validated['calories'],
            'exercise' => $validated['exercise'],
            'remarks' => $validated['remarks'],
        ]);

        return redirect()->route('weight.index');
    }

    public function index(Request $request)
{
    $query = WeightLog::where('user_id', auth()->id());

    // 日付検索
    if ($request->filled('from')) {
        $query->where('date', '>=', $request->input('from'));
    }
    if ($request->filled('to')) {
        $query->where('date', '<=', $request->input('to'));
    }

    $weights = $query->orderBy('date', 'desc')->get();
    $target = WeightTarget::where('user_id', auth()->id())->first();
    $latestWeight = WeightLog::where('user_id', auth()->id())->orderBy('date', 'desc')->first();

    return view('weight_logs.index', compact('weights', 'target', 'latestWeight'));
}

    public function show($id)
    {
        $weight = WeightLog::findOrFail($id);
        return view('weight_logs.show', compact('weight'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => ['required','date'],
            'weight' => ['required','numeric'],
        ]);

        $weight = WeightLog::findOrFail($id);
        $weight->update($request->only('date', 'weight'));

        return redirect()->route('weights.index')->with('success', '体重記録を更新しました');
    }

    public function destroy($id)
    {
        $weight = WeightLog::findOrFail($id);
        $weight->delete();

        return redirect()->route('weights.index')->with('success', '削除しました');
    }
}
