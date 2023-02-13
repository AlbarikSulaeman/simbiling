@extends('simbiling._layout.admin')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br>
                <h2>Data Content</h2>
            </div>
            <div class="pull-left">
                <div><button style="background: red; border: 1px solid red; border-radius: 3px; width: 60px;"><a href="/simbiling/role/add" style="color: white;">add</a></button></div>
            </div>
            </div>
        </div>
    </div>
    <br>

    <div class="input-group rounded">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <span class="input-group-text border-0" id="search-addon">
          <i class="fas fa-search"></i>
        </span>
      </div>
      <br>
     
    <table class="table table-hover" style="text-align: center;">
        <tr>
            @php
            $i = 1;
            @endphp
            <th>No</th>
            <th>Role</th>
            <th>Description</th>
            <th>Slug</th>
            <th>Type</th>
            <th>Action</th>
        </tr>
        @foreach ($role as $roles)
        <tr>
            <td><input type="checkbox" class="mr-3">{{ $i++ }}</td>
            <td>{{ $roles->role }}</td>
            <td>{{ $roles->description }}</td>
            <td>{{ $roles->slug }}</td>
            <td>{{ $roles->type }}</td>
            <td><a href="/simbiling/role/edit/{{ $roles->_id }}" ><i class="bi bi-pencil-square mr-4"></i></a><a href="/simbiling/role/delete/{{ $roles->_id }}"><i class="bi bi-trash3-fill"></i></a></td>
        @endforeach
    </table>
    @endsection