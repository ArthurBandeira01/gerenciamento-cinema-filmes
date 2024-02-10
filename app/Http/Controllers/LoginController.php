<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\ResetPassword;
use App\Models\PasswordReset;
use App\Models\User;
use App\Models\UserTenant;
use App\Services\UserService;
use App\Services\UserTenantService;

class LoginController extends Controller
{

    protected $userService;
    protected $userTenantService;
    private $passwordReset;

    public function __construct(
        PasswordReset $passwordReset,
        UserService $userService,
        UserTenantService $userTenantService
    ) {
        $this->passwordReset = $passwordReset;
        $this->userService = $userService;
        $this->userTenantService = $userTenantService;
    }

    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Verifica se o login é de um tenant
        if (tenant() !== null) {
            if (Auth::guard('user_tenant')->attempt($credentials)) {
                return redirect()->route('admin');
            } else {
                return redirect()->route('home')->with('error', 'Usuário e/ou senha incorreto(s), verifique as credenciais ou contate o administrador.');
            }
        }
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin');
        } else {
            return redirect()->route('home')->with('error', 'Usuário e/ou senha incorreto(s), verifique as credenciais ou contate o administrador.');
        }
    }

    public function rememberPassword()
    {
        return view('remember-password');
    }

    public function tokenRememberPassword(Request $request)
    {
        $inputs = $request->all();

        //Geração de senha em forma de hash
        $randomValue = rand();
        $hash = hash('sha256', $randomValue);

        if (tenant() !== null) {
            $verificaEmail = UserTenant::where('email', $inputs['email'])->first();
            dd($verificaEmail);
        } else {
            $verificaEmail = User::where('email', $inputs['email'])->first();
        }

        if (isset($verificaEmail)) {

            $verificaEmailHash = $this->passwordReset->where('email', $inputs['email'])->first();

            if (isset($verificaEmailHash)) {
                $verificaEmailHash::where('email', $verificaEmailHash->email)->update(['token' => $hash]);
            } else {
                // Cria um token do email de redefinição
                PasswordReset::insert([
                    'email' => $verificaEmail->email,
                    'token' => $hash
                ]);
            }

            Mail::to($verificaEmail->email)->send(new ResetPassword($verificaEmail, $hash));

            return redirect()->route('rememberPassword')->with('success', 'E-mail com link para redefinir senha enviado, verifique sua caixa de entrada :)');
        } else {
            return redirect()->route('rememberPassword')->with('error', 'E-mail não existe, favor verificar ou entrar em contato com o administrador.');
        }
    }

    public function resetPassword()
    {
        return view('reset-password');
    }

    public function changePassword(Request $request)
    {
        $inputs = $request->all();
        $redefinicaoSenha = $this->passwordReset->where('token', $inputs['token'])->first();

        if (isset($redefinicaoSenha)) {
            $verificaEmail = User::where('email', $redefinicaoSenha->email)->first();

            if (isset($verificaEmail)) {

                $verificaEmail->update(['password' => bcrypt($inputs['newPassword'])]);

                $this->passwordReset->where('email', $verificaEmail['email'])->update(['token' => null]);

                return redirect()->route('login')->with('success', 'Senha atualizada com sucesso, realize seu login para entrar com a nova senha escolhida.');

            } else {
                return redirect()->route('rememberPassword')->with('error', 'Redefinição de senha não solicitada.');
            }

        } else {
            return redirect()->route('resetPassword', ['token' => $inputs['token']])->with('error', 'Verifique as credenciais e tente novamente.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
