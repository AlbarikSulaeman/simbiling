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
        $rombel=Rombel::latest()->paginate(5);
        return view('simbiling.reference.rombel.show', compact('rombel'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $major=[
            'Rekayasa Perangkat Lunak',
            'Teknik Komputer dan Jaringan',
            'Bisnis Daring dan Pemasaran',
            'Multi Media',
            'Otomatisasi dan Tata Kelola Perkantoran',
            'Tata Boga',
            'Hotel'
        ];
        return view('simbiling.reference.rombel.add', compact('major'));
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
            'jurusan' => 'required',
            'rombel' => 'required',
        ]);

        Rombel::create($validateData);

        return redirect('simbiling/rombel')->with('success', 'Registrasi berhasil!');
    }

    public function getDetails($id = 0)
    {
        $rombel = Rombel::where('jurusan', $id)->count() +1;

        if ($id == 'Rekayasa Perangkat Lunak') {
            $prefix = 'RPL';
        }
        elseif ($id == 'Teknik Komputer dan Jaringan') {
            $prefix = 'TKJ';
        }
        elseif ($id == 'Bisnis Daring dan Pemasaran') {
            $prefix = 'BDP';
        }
        elseif ($id == 'Multi Media') {
            $prefix = 'MMD';
        }
        elseif ($id == 'Otomatisasi dan Tata Kelola Perkantoran') {
            $prefix = 'OTKP';
        }
        elseif ($id == 'Tata Boga') {
            $prefix = 'TBG';
        }
        elseif ($id == 'Hotel') {
            $prefix = 'HTL';
        }
        $data = [
            'rombel' => $prefix.'-'.$rombel,
        ];

        return response()->json($data); //return respone to add blade
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
        $rombel=Rombel::find($id);

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
