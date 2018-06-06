<?php

namespace AccountSystem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

use AccountSystem\Model\Admin;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('admin.auth');
        $this->users = Admin::get();
    }

    public function index(Request $request) {

        return view('user.home', [
            'fa'        => 'fa-user',
            'title'     => 'User',
            'users'      => $this->users
        ]);
    }

   public function edituser(Request $request) {
        if ($request->userpassword != $request->userrepeatpassword) {
            return redirect()->back()->with('message', 'Password must be same!');
        }

     try {
        $user  = Admin::findorFail($request->userid);

        $user->name         = $request->username;
        $user->email        = $request->useremail;
        $user->password     = bcrypt($request->userpassword);

        $user->update();

        return redirect('home')->with('message', 'Отредактировано успешно!!');

        } catch (Exception $e) {
            // Back to form with errors
            return redirect()->back()->withErrors( $e->getErrors() );
        }
   }

}
