<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\WeightTarget;

class RegisterController extends Controller
{
    public function showStep1()
    {
        return view('auth.register_step1');
    }

    public function postStep1(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|string|min:8',
        ], [
            'name.required' => '名前を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'email.unique' => 'このメールアドレスはすでに使われています',
            'password.required' => 'パスワードを入力してください',
        ]);

        // Fortifyに準拠するユーザー登録
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // ログインさせる（必要に応じて）
        auth()->login($user);

        // 次のステップへリダイレクト
        return redirect()->route('register.step2');
    }

    public function showStep2()
    {
        return view('auth.register_step2');
    }

    public function postStep2(Request $request)
    {
        $validated = $request->validate([
            'target_weight' => 'required|numeric|min:1|max:500',
        ], [
            'target_weight.required' => '目標体重を入力してください',
            'target_weight.numeric' => '目標体重は数値で入力してください',
            'target_weight.min' => '目標体重は1kg以上にしてください',
            'target_weight.max' => '目標体重は500kg以下にしてください',
        ]);

        WeightTarget::create([
            'user_id' => auth()->id(),
            'target_weight' => $validated['target_weight'],
        ]);

        return redirect('/weight_logs');
    }
}