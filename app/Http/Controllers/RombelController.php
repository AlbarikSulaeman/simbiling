<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rombel;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rombel=Rombel::get();
        return view('simbiling.reference.rombel.show', compact('rombel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rombel=Rombel::get();
        return view('simbiling.reference.rombel.add');
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
            // 'area' => 'required',
            'description' => 'required',
            'rombel' => 'required',
        ]);

        // $areacount = Rombel::where('area', $validateData['area'])->count();

        // $validateData['rombel'] == $validateData['area'].''.$areacount;

        Rombel::create($validateData);

        return redirect('simbiling/rombel')->with('success', 'Registrasi berhasil!');
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
        $rombel=Rombel::find($id);
        return view('simbiling.reference.rombel.edit', compact('rombel'));
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
            'rombel' => 'required',
        ]);

        // $areacount = Rombel::where('area', $validateData['area'])->count();

        // $validateData['rombel'] == $validateData['area'].''.$areacount;
        // $rombel=Rombel::find($id);

        $rombel->update($validateData);

        //return $rombel;
        return redirect('simbiling/rombel')->with('success', 'Edit Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rombel::destroy($id);
        
        return redirect('simbiling/rombel')
        ->with('success','Berhasil Hapus !');
    }
}
