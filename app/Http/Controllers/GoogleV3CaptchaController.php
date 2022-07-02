<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GoogleV3CaptchaController extends Controller
{
    public function index()
    {
        return view('google-v3-recaptcha');
    }

    public function validateGCaptcha(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required|recaptchav3:register,0.5',
        ]);

        if ($validator->passes()){

            return redirect('google-v3-recaptcha')->with('status', 'Google V3 Recaptcha has been validated form');
        }

        return redirect()->back()->withErrors($validator)->withInput();
    }
}
