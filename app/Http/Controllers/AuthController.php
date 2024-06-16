<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

 

 
 

class AuthController extends Controller
{

    public function login(Request $request)
    {
		if($request['email'] == '') {
            return 'Enter login';
            return redirect('/admin/login?err=Enter login');
        } 
        if($request['password'] == '') {
            return 'Enter password';
            return redirect('/admin/login?err=Enter password');
        }
		if (! Auth::attempt($request->only('email', 'password'), $request->has('remember')))
		{
			return redirect('/admin/login?err=Incorrect login or password');
		}
		else { 
            return redirect('/admin');
        }
	}


    /**
     * Создает нового пользователя, автоматически авторизуя его
     *
     * @param Request $request
     * @return void
     */
    // public function register(Request $request)
    // {
    //     function check_for_number($str) {
    //         $i = strlen($str);
    //         while ($i--) {
    //           if (is_numeric($str[$i])) return 1;
    //         }
    //         return 0;
    //       }
    //     $request = $request->all();
    //     $request['email'] = trim($request['email']);
    //     $request['pass1'] = trim($request['pass1']);
    //     if($request['name'] == '') {
    //         return 'Enter full name';
    //     }
    //     if($request['email'] == '') {
    //         return 'Enter email';
    //     }
    //     if ( filter_var($request["email"], FILTER_VALIDATE_EMAIL) === false) {
    //         return 'Wrong email';
    //     }
    //     if($request['country'] == '') {
    //         return 'Select country';
    //     }
    //     if($request['phone'] == '') {
    //         return 'Enter phone';
    //     }
    //     if($request['pass1'] == '') {
    //         return 'Enter password';
    //     }
    //     if(mb_strlen($request['pass1']) < 8) {
    //         return 'Password must be at least 8 characters';
    //     }
    //     if($request['pass2'] == '') {
    //         return 'Repeat password';
    //     }
    //     if($request['pass1'] != $request['pass2']) {
    //         return 'Password mismatch';
    //     }
    //     $find = User::where('email', $request['email'])->first();
    //     if($find) {
    //         return 'This mail is already in use in another account';
    //     }  

    //     $activated_promo = '';
    //     if($request['promocode'] != '') {
    //         $activated_promo = $request['promocode'];
    //     }  

    //     function generateRandomString($length = 10) {
    //         $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //         $charactersLength = strlen($characters);
    //         $randomString = '';
    //         for ($i = 0; $i < $length; $i++) {
    //             $randomString .= $characters[random_int(0, $charactersLength - 1)];
    //         }
    //         return $randomString;
    //     } 

    //     $user = User::create([ 
    //         'email'    => $request['email'],
    //         'name'    => $request['name'],
    //         'country'    => $request['country'],
    //         'promocode' => generateRandomString(),
    //         'activated_promo' => $activated_promo,
    //         'deps' => 0,
    //         'phone'    => $request['phone'],
    //         'password' => bcrypt($request['pass1']),  
    //         'verif' => 0,
    //         'admin' => 0,
    //     ]);  

    //     Auth::loginUsingId($user->id);

    //     return 'success';
    // }

    /**
     * Выход из личного кабинета
     */
    public function logout() {
        Auth::logout();
        return redirect('/');
    }


}
