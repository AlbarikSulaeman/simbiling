@extends('simbiling._layout.app')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Content</h2>
            </div>
            <div class="pull-left">
                <div><button><a href="/simbiling/rayon/add">add</a></button></div>
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
     
    <table class="table table-bordered">
        <tr>
            @php
            $i = 1;
            @endphp
            <th>No</th>
            <th>Rayon</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        @foreach ($rayon as $rayons)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $rayons->rayon }}</td>
            <td>{{ $rayons->description }}</td>
            <td><a href="/simbiling/rayon/edit/{{ $rayons->_id }}">edit</a><a href="/simbiling/rayon/delete/{{ $rayons->_id }}">hapus</a></td>
            <td><a href="/simbiling/rayon/delete/{{ $rayons->_id }}">hapus</a></td>
        </tr>
        @endforeach
    </table>
    @endsection