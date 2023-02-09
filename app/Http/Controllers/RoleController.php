<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role=Role::get();
        return view('simbiling.reference.role.show', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role=Role::get();
        return view('simbiling.reference.role.add');
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
            'role' => 'required',
            'description' => 'required',
            'slug',
            'type',
        ]);

        $validateData['slug'] = strtolower($validateData['role']);
        if ($validateData['slug'] == 'admin' || $validateData['slug'] == 'teacher') {
            $validateData['type'] = 'admin';
        }else{
            $validateData['type'] = 'user';
        }
        
        

        Role::create($validateData);

        return redirect('simbiling/role')->with('success', 'Registrasi berhasil!');
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
        $role=Role::find($id);
        return view('simbiling.reference.role.edit', compact('role'));
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
            'role' => 'required',
            'description' => 'required',
            'slug',
            'type',
        ]);

        $validateData['slug'] = strtolower($validateData['role']);
        if ($validateData['slug'] == 'admin' || $validateData['slug'] == 'teacher') {
            $validateData['type'] = 'admin';
        }else{
            $validateData['type'] = 'user';
        }
        $role=Role::find($id);

        $role->update($validateData);

        //return $role;
        return redirect('simbiling/role')->with('success', 'Edit Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::destroy($id);
        
        return redirect('simbiling/role')
        ->with('success','Berhasil Hapus !');
    }
}
