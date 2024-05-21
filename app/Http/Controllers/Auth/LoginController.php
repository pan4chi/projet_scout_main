<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Employee;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectTo()
    {
        
            if (Auth::check()) {
                $user = Auth::user();
                switch ($user->email) {
                    case 'adminregion1@mail.com':
                        return route('region.index');
                        break;
                    case 'admin@mail.com':
                        return route('superAdmin');
                        break;
                    case 'adminregion2@mail.com':
                    case 'adminregion3@mail.com':
                    case 'adminregion4@mail.com':
                    case 'adminregion5@mail.com':
                    case 'adminregion6@mail.com':
                    case 'adminregion7@mail.com':
                    case 'adminregion8@mail.com':
                    case 'adminregion9@mail.com':
                    case 'adminregion10@mail.com':
                    case 'adminregion11@mail.com':
                    case 'adminregion12@mail.com':
                        return route('region.index');
                        break;
                    case 'adminfiliere1@mail.com':
                    case 'adminfiliere2@mail.com':
                    case 'adminfiliere3@mail.com':
                    case 'adminfiliere4@mail.com':
                    case 'adminfiliere5@mail.com':
                    case 'adminfiliere6@mail.com':
                    case 'adminfiliere7@mail.com':
                    case 'adminfiliere8@mail.com':
                    case 'adminfiliere9@mail.com':
                    case 'adminfiliere10@mail.com':
                    case 'adminfiliere11@mail.com':
                    case 'adminfiliere12@mail.com':
                    case 'adminfiliere13@mail.com':
                    case 'adminfiliere14@mail.com':
                    case 'adminfiliere15@mail.com':
                    case 'adminfiliere16@mail.com':
                    case 'adminfiliere17@mail.com':
                    case 'adminfiliere18@mail.com':
                    case 'adminfiliere19@mail.com':
                    case 'adminfiliere20@mail.com':
                    case 'adminfiliere21@mail.com':
                    case 'adminfiliere22@mail.com':
                    case 'adminfiliere23@mail.com':
                    case 'adminfiliere24@mail.com':
                    case 'adminfiliere25@mail.com':
                    case 'adminfiliere26@mail.com':
                    case 'adminfiliere27@mail.com':
                    case 'adminfiliere28@mail.com':
                    case 'adminfiliere29@mail.com':
                    case 'adminfiliere30@mail.com':
                    case 'adminfiliere31@mail.com':
                    case 'adminfiliere32@mail.com':
                    case 'adminfiliere33@mail.com':
                    case 'adminfiliere34@mail.com':
                    case 'adminfiliere35@mail.com':
                    case 'adminfiliere36@mail.com':
                        return route('filiere.index');
                        break;
                    default:
                        return route('/');
                        break;
                }
            } elseif (Auth::check() && Employee::where("user_id", Auth::id())->exists()) {
                return route('employee.index');
            }
        }
        
}
