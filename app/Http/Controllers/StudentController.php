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
        $class = [
            'X',
            'XI',
            'XII',
            'Other'
        ];
        return view('simbiling.admin.student.add', compact('rayons', 'rombels', 'status', 'class'));
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
            'rombel' => 'required_if:status,aktif',
            'class' => 'required_if:status,aktif',
            'rayon' => 'required_if:status,aktif',
            'status' => 'required',
            'trouble' => 'nullable',
            'haveTrouble',
            'troubleStatus'
        ]);

        if ($validateData['trouble'] == null) {
            $validateData['haveTrouble'] = false;
            $validateData['troubleStatus'] = null;
        }else{
            $validateData['haveTrouble'] = true;
            $validateData['troubleStatus'] = '0';
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
        $studentBfr = Students::where('_id', $id)->first();
        $validateData = $request->validate([
            'email' => 'required|unique:users,email,'.$studentBfr['email'].',email',
            'name' => 'required',
            'nis' => 'required|unique:students,nis,'.$studentBfr['nis'].',nis',
            'rombel' => 'required_if:status,aktif',
            'rayon' => 'required_if:status,aktif',
            'class' => 'required_if:status,aktif',
            'status' => 'required',
            'trouble' => 'nullable',
            'haveTrouble',
            'troubleStatus'
        ]);

        if ($validateData['trouble'] == null) {
            $validateData['haveTrouble'] = false;
            $validateData['troubleStatus'] = null;
        }else{
            $validateData['haveTrouble'] = true;
            $validateData['troubleStatus'] = '0';
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
        $student=Students::find($id);
        $addUsers = Users::where('email', $addUser['email'])->first();

        // dd($validateData, $addUser);

        $student->update($validateData);
        $addUsers->update($addUser);

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
