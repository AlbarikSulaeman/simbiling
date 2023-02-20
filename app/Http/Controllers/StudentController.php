<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Users;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student=Students::get();
        return view('simbiling.admin.student.show', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rayons = Rayon::orderBy('rayon', 'asc')->get();
        $rombels = Rombel::orderBy('rombel', 'asc')->get();
        $status = [
            'aktif',
            'lulus',
            'DO'
        ];
        return view('simbiling.admin.student.add', compact('rayons', 'rombels', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|unique:students',
            'name' => 'required',
            'nis' => 'required|unique:students',
            'rombel' => 'required',
            'rayon' => 'required',
            'status' => 'required',
            'trouble' => 'nullable',
            'haveTrouble'
        ]);

        if ($validateData['trouble'] == null) {
            $validateData['haveTrouble'] = false;
        }else{
            $validateData['haveTrouble'] = true;
        }
        $addUser = $request->validate([
            'email',
            'name',
            'password',
            'role',
            'roleSlug',
        ]);

        $addUser['email'] = $validateData['email'];
        $addUser['name'] = $validateData['name'];
        $addUser['password'] = bcrypt($validateData['nis']);
        $addUser['role'] = 'Student';
        $addUser['roleSlug'] = 'student';
        
        Users::create($addUser);
        Students::create($validateData);

        return redirect('simbiling/student')->with('success', 'Registrasi berhasil!');
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
        $student=Students::find($id);
        return view('simbiling.admin.student.edit', compact('student'));
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
            'email' => 'required|unique:students,email,'.$request->user_id,
            'name' => 'required',
            'nis' => 'required|unique:students',
            'rombel' => 'required',
            'rayon' => 'required',
            'status' => 'required',
            'trouble',
            'haveTrouble'
        ]);

        $validateData['haveTrouble'] = false;

        $addUser = $request->validate([
            'email',
            'name',
            'password',
            'role',
            'roleSlug',
        ]);

        $addUser['email'] = $validateData['email'];
        $addUser['name'] = $validateData['name'];
        $addUser['password'] = bcrypt($validateData['nis']);
        $addUser['role'] = 'Student';
        $addUser['roleSlug'] = 'student';
        $student=Students::find($id);
        $addUser = User::where('email', $addUser['email']);

        $student->update($validateData);
        $addUser->update($addUser);

        //return $student;
        return redirect('simbiling/student')->with('success', 'Edit Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Students::destroy($id);
        
        return redirect('simbiling/student')
        ->with('success','Berhasil Hapus !');
    }
}
