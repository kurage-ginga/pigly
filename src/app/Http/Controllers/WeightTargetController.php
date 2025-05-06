<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeightTargetController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'target_weight' => 'required|numeric|min:30|max:300',
        ]);

        $user = auth()->user();
        $target = $user->weightTarget ?? new WeightTarget(['user_id' => $user->id]);
        $target->target_weight = $request->target_weight;
        $target->save();

        return redirect()->back()->with('success', '目標体重を更新しました');
    }
}
