<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bimbingan;
use App\Models\Students;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bimbingan=Bimbingan::get();
        return view('simbiling.jadwal-bimbingan.show', compact('bimbingan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        if (Auth::user()->roleSlug == 'admin') {
            $siswa = Students::where('_id', $id)->first();
        }elseif (Auth::user()->roleSlug == 'student') {
            $email = Auth::user()->email;
            $siswa = Students::where('email', $email)->first();
        }else{
            $siswa = null;
        }
        return view('simbiling.jadwal-bimbingan.form', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validateData = $request->validate([
            'nis',
            'telp',
            'name',
            'rombel',
            'rayon',
            'prihal' => 'required',
            'date' => 'required',
            'input_by'
        ]);
        if (Auth::user()->roleSlug == 'admin') {

            $siswa = Students::where('_id', $id)->first();
            $user = User::where('email', $siswa['email'])->first();
            $idUser = $user['_id'];
        }elseif (Auth::user()->roleSlug == 'student') {
            $email = Auth::user()->email;
            $user = User::where('email', $email)->first();
            $idUser = $user['_id'];
            $siswa = Students::where('email', $email)->first();
        }else{
            $siswa = null;
        }

        $validateData['input_by'] = Auth::user()->name;
        $validateData['nis'] = $siswa['nis'];
        $validateData['name'] = $siswa['name'];
        $validateData['rombel'] = $siswa['rombel'];
        $validateData['rayon'] = $siswa['rayon'];

        $notifikasi = [
            'reciever' => $idUser,
            'sender' => 'sistem',
            'send_at' => Carbon::now()->toDateTimeString(),
            'notification' => 'Anda Memiliki Jadwal Bimbingan Baru',
            'content' => 'Anda dijadwalkan melakukan bimbingan pada '. $validateData['date']
        ];
        if (Auth::user()->roleSlug == 'student') {
            $adminNotif = [
                'reciever' => 'admin',
                'sender' => 'sistem',
                'send_at' => Carbon::now()->toDateTimeString(),
                'notification' => 'Pengajuan Bimbingan',
                'content' =>  $siswa['name'].' dari '. $siswa['rayon'].' mengajukan bimmbingan pada '.$validateData['date']
                ];
            Notification::create($adminNotif);
        }


        Notification::create($notifikasi);
        Bimbingan::create($validateData);
        Students::where('email', $siswa['email'])->update([
            'troubleStatus' => 'dijadwalkan'
        ]);

        return redirect('simbiling/bimbingan')->with('success', 'Registrasi berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bimbingan=Bimbingan::find($id);
        return view('simbiling.jadwal-bimbingan.bimbingan.edit', compact('bimbingan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            // 'area' => 'required',
            'description' => 'required',
            'bimbingan' => 'required',
            'slug'
        ]);
        $slugCount = strlen($validateData['bimbingan']);

        $firstSlugCount = $slugCount - 1;
        $prefix =  substr($validateData['bimbingan'], $firstSlugCount);
        $firstSlug = substr($validateData['bimbingan'], 0, 3);
        $slug = $firstSlug . ' '. $prefix;
        $validateData['slug'] = $slug;

        $bimbingan = Bimbingan::find($id);
        $bimbingan->update($validateData);

        //return $bimbingan;
        return redirect('simbiling/bimbingan')->with('success', 'Edit Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bimbingan::destroy($id);

        return redirect('simbiling/bimbingan')
        ->with('success','Berhasil Hapus !');
    }
}
