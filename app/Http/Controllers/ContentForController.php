<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentFor;

class ContentForController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contentFor=ContentFor::get();
        return view('simbiling.reference.contentfor.show', compact('contentFor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contentFor=ContentFor::get();
        return view('simbiling.reference.contentfor.add');
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
            'name' => 'required',
            'description' => 'required',
            'slug',
            'seq' => 'required',
        ]);

        $validateData['slug'] = strtolower($validateData['name']);
        

        ContentFor::create($validateData);

        return redirect('simbiling/contentfor')->with('success', 'Registrasi berhasil!');
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
        $contentFor=ContentFor::find($id);
        return view('simbiling.reference.contentfor.edit', compact('contentFor'));
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
            'name' => 'required',
            'description' => 'required',
            'slug',
            'seq' => 'required',
        ]);

        $validateData['slug'] = strtolower($validateData['name']);

        //$validateData['rombel'] = "RPL XII-5";
        $contentFor=ContentFor::find($id);

        $contentFor->update($validateData);

        //return $contentFor;
        return redirect('simbiling/contentfor')->with('success', 'Edit Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ContentFor::destroy($id);
        
        return redirect('simbiling/contentfor')
        ->with('success','Berhasil Hapus !');
    }
}
