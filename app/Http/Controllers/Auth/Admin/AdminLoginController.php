<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function loginForm()
    {
        return view('backend.auth.login');
    }

    public function registerForm()
    {
        return view('backend.auth.register');
    }

    public function registerSubmit(Request $request)
    {
        // Validate form data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'phone' => 'required|numeric|digits:11|unique:admins',
            'password' => 'required|min:8'
        ]);

        session()->put('adminEmail', $request->email);
        $randStr = Str::random(20);

        // second, generate a token
        $token = md5($randStr . $request->email);
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->verification_token = $token;
        $admin->password = bcrypt($request->password);
        $admin->save();

        $this->sendVerificationMail($request, $token);
        Auth::guard('admin')->logout();
        return redirect()->back();
    }

    public function signupVerify(Request $request, $token)
    {

        try {
            $admin = Admin::where('verification_token', $token)->firstOrFail();
            // after verify admin email, put "null" in the "verification token"
            $admin->update([
                'email_verified_at' => date('Y-m-d H:i:s'),
                'verification_token' => null
            ]);

            $request->session()->flash('success', 'Your email has verified.');

            session()->forget('adminEmail');
            // after email verification, authenticate this user
            Auth::guard('admin')->login($admin);

            return redirect()->route('admin.dashboard');
        } catch (ModelNotFoundException $e) {
            $request->session()->flash('error', 'Could not verify your email!');
            return redirect()->route('adminResgisterForm');
        }
    }

    public function sendVerificationMail(Request $request, $token)
    {


        $link = '<a href=' . route('admin.signup.verify', ['token' => $token]) . '>Click Here</a>';

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
            $mail->addAddress($request->email, $request->name);
            $mail->isHTML(true);
            $mail->Subject = 'Verify Email';
            $mail->Body = $link;

            $mail->send();

            $request->session()->flash('success', 'A verification mail has been sent to your email address.');
        } catch (Exception $e) {
            dd($e);
            $request->session()->flash('error', 'Mail could not be sent!');
        }
    }

    public function adminLogin(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);


        $credentials = $request->only('email', 'password');

        // login attempt
        if (Auth::guard('admin')->attempt($credentials)) {
            $authAdmin = Auth::guard('admin')->user();

            // first, check whether the user's email address verified or not
            if ($authAdmin->email_verified_at == null) {
                $request->session()->flash('error', 'Please, verify your email address.');

                // logout auth user as condition not satisfied
                Auth::guard('admin')->logout();

                return redirect()->back();
            } else {
                return redirect()->route('admin.dashboard');
            }
        } else {
            return redirect()->back()->with('errorLogin', 'Credentails not match');
        }
    }

    public function resetPassword()
    {

        return view('backend.auth.reset-password');
    }

    public function resetpasswordView()
    {
        return view('backend.auth.new-password');
    }


    public function sendMail(Request $request)
    {

        $link = '<a href=' . route('admin.forget_password.view') . '>Click Here</a>';
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
            $mail->addAddress($request->email, $request->name);
            $mail->isHTML(true);
            $mail->Subject = 'Reset Password';
            $mail->Body = $link;

            $mail->send();
            session()->put('userEmail', $request->email);
            $request->session()->flash('success', 'A mail has been sent to your email address with reset password link');
        } catch (Exception $e) {

            session()->flash('error', 'Mail could not be sent!');
            return redirect()->back()->with('success');
        }
        return redirect()->back()->with('success');
    }

    public function resetPasswordSubmit(Request $request)
    {
        // get the user email from session
        $emailAddress = $request->session()->get('userEmail');

        $this->validate(
            $request,
            [
                'new_password' => 'required|confirmed|min:8',
                'new_password_confirmation' => 'required'
            ]
        );


        $user = Admin::where('email', $emailAddress)->first();

        $user->update([
            'password' => bcrypt($request->new_password)
        ]);

        $request->session()->flash('success', 'Password updated successfully.');

        return redirect()->route('adminLoginForm')->with('success');
    }
}
