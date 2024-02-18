<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\BillingModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    private function sendEmail($idUser)
    {
        $user = User::find($idUser);

        Mail::to($user->email)->send(new WelcomeMail($user));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|string',
            'gender' => 'required|string|max:1',
            'cpf' => 'required|string|max:11',
            'birthday' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $user = User::create([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'email' => $request->get('email'),
                'password' => bcrypt('123456'),
                'phone' => $request->get('phone'),
                'id_gym' => $request->get('id_gym'),
                'profile' => 'aluno',
                'gender' => $request->get('gender'),
                'cpf' => $request->get('cpf'),
                'birthday' => $request->get('birthday'),
                'height' => $request->get('height'),
                'weight' => $request->get('weight'),
                'observation' => $request->get('observation'),
                'zip_code' => $request->get('zip_code'),
                'street' => $request->get('street'),
                'district' => $request->get('district'),
                'number' => $request->get('number'),
                'city' => $request->get('city'),
                'state' => $request->get('state'),
                'complement' => $request->get('complement'),
            ]);

            BillingModel::create([
                'id_gym' => $request->get('id_gym'),
                'id_user' => $user->id,
                'id_plan' => $request->get('id_plan'),
                'billing_date' => $request->get('billing_date'),
                'payment_date' => $request->get('payment_date'),
                'payment_method' => $request->get('payment_method'),
                'amount_paid' => $request->get('amount_paid'),
                'amount_received' => $request->get('amount_received'),
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json(['errors' => ['database' => [$e->getMessage()]]], 404);
        }

        DB::commit();

        $this->sendEmail($user->id);

        return response()->json($user, 201);
    }
}
