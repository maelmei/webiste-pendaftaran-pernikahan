<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\userExport;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class authController extends Controller
{
    //

    public function forgot_password()
    {
        return view('auth.forgot-password');
    }

    public function proses_password_baru(Request $request)
    {
        $request->validate(['email' => 'required|email']);
 
        $status = Password::sendResetLink(
            $request->only('email')
        );
     
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function resset_password($token)
    {
        return view('auth.resset_password', ['token' => $token]);
    
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))->with('success', 'Passowrd Berhasil Di Ubah')
                    : back()->withErrors(['email' => [__($status)]]);
    }

    public function user()
    {
        $auth = User::all();
        return view('auth.user', ['auth' => $auth]);
    }

    public function edit_user($id)
    {
        $user = User::find($id);

        return view('auth.edit-user', compact('user'));
    }

    public function update_user(Request $request, $id)
    {
        if($request->password){
            $validate = $request->validate([
                'username' => 'required',
                'nama_lengkap' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);

            User::whereId($id)->update([
                'username' => $request->username,
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'password' => $request->password
            ]);
            return redirect('user')->with('success', 'Berhasil Update');
        }
        else{
            $validate = $request->validate([
                'username' => 'required',
                'nama_lengkap' => 'required',
                'email' => 'required',
         
            ]);
            User::whereId($id)->update([
                'username' => $request->username,
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
            ]);

            return redirect('user')->with('success', 'Berhasil Update');
        }
    }

    public function hapus_user($id)
    {
        $user = User::whereId($id);
        $user->delete();

        return redirect('user')->with('success', 'Berhasil DiHapus');
    }

    public function ban_user($id) 
    {

        $user = User::find($id);

        return view('banned.ban-user', compact('user'));
    }

    public function proses_banned(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->banUntil($request->banned);

        return redirect('user')->with('success', 'Akun Berhasil Di Banned');
    }

    public function listakunbanned()
    {
        $user = User::Banned()->get();
        return view('auth.list-akun', compact('user'));
    }

    public function unban($id)
    {
        $user = User::find($id);
        $user->unban();
        return redirect('user')->with('success', 'Akun Berhasil Di NonBanned');
    }

    public function exportUser()
    {
        return Excel::download(new userExport, 'user.xlsx');
    }
}
