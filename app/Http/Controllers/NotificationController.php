<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notification=Notification::latest()->paginate(5);
        return view('simbiling.reference.notification.show', compact('notification'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notification=Notification::get();
        return view('simbiling.reference.notification.add');
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
            'content' => 'required',
            'notification' => 'required',
            'sender',
            'reciever'  => 'required',
            'read_at',
            'send_at'
        ]);

        $validateData['send_at'] = Carbon::now()->toDateTimeString();
        $validateData['sender'] = Auth::user()->name;

        // $areacount = Notification::where('area', $validateData['area'])->count();

        // $validateData['notification'] == $validateData['area'].''.$areacount;

        Notification::create($validateData);

        return redirect('simbiling/notification')->with('success', 'Registrasi berhasil!');
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
        $notification = Notification::find($id);
        return view('simbiling.reference.notification.edit', compact('notification'));
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
            'content' => 'required',
            'notification' => 'required',
        ]);

        // $areacount = Notification::where('area', $validateData['area'])->count();

        // $validateData['notification'] == $validateData['area'].''.$areacount;
        $notification=Notification::find($id);

        $notification->update($validateData);

        //return $notification;
        return redirect('simbiling/notification')->with('success', 'Edit Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Notification::destroy($id);
        
        return redirect('simbiling/notification')
        ->with('success','Berhasil Hapus !');
    }
}
