<?php
namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Register new account.
     *
     * @param Request $request
     * @return User
     */
    protected function register(Request $request)
    {
        /** @var User $user */
        $validatedData = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        try {
            $validatedData['password']        = bcrypt(array_get($validatedData, 'password'));
            $validatedData['activation_code'] = str_random(30).time();
        } catch (\Exception $exception) {
            logger()->error($exception);
            return redirect()->back()->with('message', 'Unable to create new user.');
        }

        return redirect()->back()->with('message', 'Successfully created a new account.');
    }
}
