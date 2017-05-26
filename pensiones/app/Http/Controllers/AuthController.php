<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Usuario;


class AuthController extends Controller
{
	public function login(Request $request){
		
		if(Auth::guard('usuarios')->check()){
			return redirect('/pensiones');
		}

		if($request->isMethod('post')){
			$input = $request->input();
			$input['password'] = bcrypt($input['password']);
			$user = Usuario::where("email", $input['email']);
			$user =  $user->get();
			if($user->isEmpty()){
				$user = new Usuario($input);
				$user->save();
				Auth::guard('usuarios')->loginUsingId($user->id, false);
			}else{
				Usuario::find($user[0]->id)->update($input);
				Auth::guard('usuarios')->loginUsingId($user[0]->id, false);
				
			}

			if(!empty($input['back'])){
				return redirect($input['back']);
			}else{
				return redirect('/pensiones');
			}
		}else{
			return View('pages.login');
		}
		
		
	}

	public function logout(){
		if(Auth::guard('usuarios')->check()){

			Auth::guard('usuarios')->logout(false);
			return redirect()->back();
		}
		
		return redirect()->back();
	}
}

?>