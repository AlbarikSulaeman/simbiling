<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;

class AuthController extends Controller
{
 
    public function index()
    {
        // $user = User::latest()->paginate(5);
    
        // if (Auth::check()) {
        //     $cek = Auth::user()->role;
        //     if ($cek == 'admin') {
        //         return view('admin.index',compact('user'))
        //             ->with('i', (request()->input('page', 1) - 1) * 5);
        //     }
        //     return redirect('/menu');
        // }else{
            return view('test.register');
        // }
    }
    
    public function create()
    {
        if (Auth::check()) {
            $cek = Auth::user()->role;
            if ($cek == 'admin') {
                return view('admin.register');
            }
            return redirect('/register');
        } 
        return redirect('/login');
    }

    public function store(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required',
            'email' => ['required', 'unique:users'],
            'password' => 'required',
            'role',
            'verification_code' => 'number',
            'verification' => 'boolean',
        ]);

        $validateData['password'] = bcrypt($validateData['password']);
        $validateData['verification_code'] = Helper::randomstring(4,'numeric');
        $validateData['role'] = 'user';
        $validateData['verification'] = false;

        User::create($validateData);

        return redirect('test/auth')->with('success', 'Registrasi berhasil!');
    }

    public function edit(User $user)
    {
        if (Auth::check()) {
            $cek = Auth::user()->role;
            if ($cek == 'admin') {
            return view('admin.edit', compact('user'));
            }
            return redirect('/register');
        }
        return redirect('/login');
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => ['required', 'unique:users'],
            'password' => 'required',
            'role' => 'required',
        ]);

        $validateData['password'] = bcrypt($validateData['password']);
        $user = User::find($id);
        $user->update($validateData);

        return redirect('/register')
        ->with('success', 'Berhasil Update !');
    }
    
    public function destroy($id)
    {
        User::destroy($id);
        
        return redirect('/register')
        ->with('success','Berhasil Hapus !');
    }

    public function login()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function authanticate(Request $request)
    {

        $login = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $checkRole = User::where('email', $login['email'])->first();
        $email = Students::where('email', $login['email'])->first();

        // dd($email->status);
        if ($checkRole != null && $checkRole->roleSlug == 'student') {
            $email = Students::where('email', $login['email'])->first();
            if (!$email) {
                return back()->with('userError', 'Anda tidak terdaftar sebagai siswa wikrama')->withInput($request->only('email'));
            }elseif ($email->status != 'aktif') {
                return back()->with('userError', 'Anda sudah bukan siswa wikrama')->withInput($request->only('email'));
            }
        }elseif ($checkRole == null) {
            return back()->with('userError', 'Anda tidak terdaftar sebagai anggota wikrama')->withInput($request->only('email'));
        }

        if (Auth::attempt($login)) {
            $request->session()->regenerate();
            $id = Auth::user()->_id;
           

            //return redirect()->intended('/register');
            if (Auth::user()->roleSlug == 'student') {
                return redirect("/home-user")->with('success', 'login berhasil!');
            }elseif (Auth::user()->roleSlug == 'admin') {
                return redirect("/simbiling/dashboard")->with('success', 'login berhasil!');
            }else{
                return redirect("/login")->with('error', 'Something Wrong');
            }
            // return redirect("/simbiling/dashboard")->with('error', 'login berhasil!');
        }
        return back()->with('error', 'Password Salah')->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


}
