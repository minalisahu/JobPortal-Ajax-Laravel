<?php

namespace App\Http\Controllers\Auth;

use App\Events\PasswordChanged;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::SEEKER;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }
    /**
     * Get the response for a successful password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */

     protected function sendResetResponse(Request $request, $response)
    {
        if (auth()->user()){
            switch (auth()->user()->access) {
                case '1':
                    $redirectTo = RouteServiceProvider::HOME;
                    break;

                case '2':
                    $redirectTo = RouteServiceProvider::SEEKER;
                    break;

                default:
                    $redirectTo = RouteServiceProvider::HOME;
                    break;
            }
        }
        event(new PasswordChanged(auth()->user()));
        if ($request->wantsJson()) {
            return new JsonResponse(['message' => trans($response)], 200);
        }
        return redirect($redirectTo)->with('status', trans($response));
    }
}
