<?php

namespace AccountSystem\Http\Controllers\Auth;

use AccountSystem\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use AccountSystem\Model\Admin;
use AccountSystem\Model\Setting;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // show login form
    public function showLoginForm() {
        return view('login');
    }

    // show logoutform
    public function logout(Request $request) {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('login');
    }

    protected function guard() {
        return Auth::guard('admin');
    }

    public function user(Request $request){

        if ($request->isMethod('post')) {
            $passwd = Setting::where('password', $request->password)->get();

            if (count($passwd)>0) {
                $users = Admin::get();
                $password = Setting::get();

                return view('setting.profile', [
                    'fa'                => 'fa fa-user fa-fw',
                    'title'             => 'Админстратор',
                    'addurl'            => '',
                    'savedata'          => '',
                    'print'             => '',
                    'goback'            => '',
                    'users'             => $users,
                    'settingpassword'   => $password
                ]);
            } else {
                return redirect()->route('home');
            }
        }

    }

    public function updateuser(Request $request){
        if ($request->userpassword != $request->userrepeatpassword) {
            return redirect()->back()->with('message', 'Пароль не может быть таким же');
        }

        try {
            $user  = Admin::findorFail($request->userid);

            $user->name         = $request->username;
            $user->email        = $request->useremail;
            $user->password     = bcrypt($request->userpassword);

            $result  =  $user->update();
            if ($request) {
                $this->guard()->logout();

                $request->session()->flush();
                return redirect('home')->with('message', 'Отредактировано успешно!!');
            }


        } catch (Exception $e) {
            // Back to form with errors
            return redirect()->back()->withErrors( $e->getErrors() );
        }
    }

    public function updatesetting(Request $request){
        try {


            $setting  = Setting::findorFail($request->id);
            
            $setting->password    = $request->passwordsetting;

            $result  =  $setting->update();
            if ($request) {

                return redirect('home')->with('message', 'Отредактировано успешно!!');
            }
        } catch (Exception $e) {
            // Back to form with errors
            return redirect()->back()->withErrors( $e->getErrors() );
        }
    }
}
