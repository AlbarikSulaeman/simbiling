<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rayon;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rayon=Rayon::get();
        return view('simbiling.reference.rayon.show', compact('rayon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rayon=Rayon::get();
        return view('simbiling.reference.rayon.add');
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
            'rayon' => 'required',
            'slug'
        ]);
        $slugCount = strlen($validateData['rayon']);
       
        $firstSlugCount = $slugCount - 1;
        $prefix =  substr($validateData['rayon'], $firstSlugCount);
        $firstSlug = substr($validateData['rayon'], 0, 3);
        $slug = $firstSlug . ' '. $prefix;
        $validateData['slug'] = $slug; 

        Rayon::create($validateData);

        return redirect('simbiling/rayon')->with('success', 'Registrasi berhasil!');
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
        $rayon=Rayon::find($id);
        return view('simbiling.reference.rayon.edit', compact('rayon'));
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
            'rayon' => 'required',
            'slug'
        ]);
        $slugCount = strlen($validateData['rayon']);
       
        $firstSlugCount = $slugCount - 1;
        $prefix =  substr($validateData['rayon'], $firstSlugCount);
        $firstSlug = substr($validateData['rayon'], 0, 3);
        $slug = $firstSlug . ' '. $prefix;
        $validateData['slug'] = $slug; 

        $rayon = Rayon::find($id);
        $rayon->update($validateData);

        //return $rayon;
        return redirect('simbiling/rayon')->with('success', 'Edit Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rayon::destroy($id);
        
        return redirect('simbiling/rayon')
        ->with('success','Berhasil Hapus !');
    }
}
