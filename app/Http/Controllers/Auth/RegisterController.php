<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $randStr = Str::random(20);
        $token = md5($randStr . $data['name']);

        $user = User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'verification_token' => $token,
            'password' => Hash::make($data['password']),
        ]);
        
        // second, generate a token
      

        session()->put('userEmail', $user->email);
        $this->sendVerificationMail($user, $token);

        return $user;
    }

    public function sendVerificationMail(
        $user,
        $token
    ) {


        $link = '<a href=' . route('user.signup.verify', ['token' => $token]) . '>Click Here</a>';

        $mail =  new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = env('MAIL_HOST');
        $mail->SMTPAuth   = true;
        $mail->Username   = env('MAIL_USERNAME');
        $mail->Password   = env('MAIL_PASSWORD');
        $mail->Port = env('MAIL_PORT');
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;


        // finally, add other information and send the mail
        try {
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), 'Imran');
            $mail->addAddress($user->email, $user->name);
            $mail->isHTML(true);
            $mail->Subject = 'Verify Email';
            $mail->Body = $link;

            $mail->send();
        } catch (Exception $e) {
            dd($e);
        }
    }



    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/login')->withSuccess('Please check your email to verify your account.');
    }
}
