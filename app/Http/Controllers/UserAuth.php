<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAuth extends Controller
{
    //
    function userLogin(Request $req)
    {

        $errors = [];

        $data = $req->input();

        if ($hashedPassword = DB::select("SELECT password FROM profiles WHERE email = '" . $data['input_email'] . "'")) {

            $jsonEncodePass = json_decode(json_encode($hashedPassword), true);

            if (Hash::check($data['input_password'], $jsonEncodePass[0]['password'])) {
                $userData = DB::select("SELECT profileID,firstName,lastName,is_admin,image FROM profiles WHERE email = '" . $data['input_email'] . "'");
                $array = json_decode(json_encode($userData), true);
                $req->session()->put('token',  $req->_token);
                $req->session()->put('profileID',  $array[0]['profileID']);
                $req->session()->put('firstName',  $array[0]['firstName']);
                $req->session()->put('lastName',  $array[0]['lastName']);
                $req->session()->put('is_admin',  $array[0]['is_admin']);
                $req->session()->put('image',  $array[0]['image']);
                $req->session()->put('activeMenu',  'home');
                return redirect()->route('index');
            } else {
                array_push($errors, 'Your Password is incorrect.');
            }
        } else {
            array_push($errors, 'Your E-Mail is incorrect.');
        }

        if ($errors) {
            return redirect()->route('signIn')
                ->with('errors', $errors);
        }
    }
}
