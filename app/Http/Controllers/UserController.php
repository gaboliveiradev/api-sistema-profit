<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|string',
            'gender' => 'required|strig|max:1',
            'cpf' => 'required|strig|max:11',
            'birthday' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $user = User::create($request->all());
        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json(['errors' => ['database' => [$e->getMessage()]]], 404);
        }

        DB::commit();

        return response()->json($user, 201);
    }
}
