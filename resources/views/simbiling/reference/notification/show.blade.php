@extends('simbiling._layout.admin')
@section('content')<?php
    $abc = Helper::toOptions(Helper::getContentFor(),'name', 'slug', false);
    // dd($abc);
?>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Content</h2>
            </div>
            <div class="pull-left">
                <div><button style="background: red; border: 1px solid red; border-radius: 3px; width: 60px;"><a href="/simbiling/notification/add" style="color: white;">add</a></button></div>
            </div>
            </div>
        </div>
    </div>
    <br>
     
    <table class="table table-hover" style="text-align: center;">
        <tr>
            @php
            $i = 1;
            @endphp
            <th>No</th>
            <th>Notification</th>
            <th>Content</th>
            <th>Reciever</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($notification as $notifications)
        <tr>
            <td><input type="checkbox" name="" id="" class="mr-3">{{ $i++ }}</td>
            <td>{{ $notifications->notification }}</td>
            <td>{{ $notifications->content }}</td>
            <td>{{ $notifications->reciever }}</td>
            <td><a href="/simbiling/notification/edit/{{ $notifications->_id }}" ><i class="bi bi-pencil-square mr-4"></i></a><a href="/simbiling/notification/delete/{{ $notifications->_id }}"><i class="bi bi-trash3-fill"></i></a></td>
        </tr>
        @endforeach
    </table>
    @endsection