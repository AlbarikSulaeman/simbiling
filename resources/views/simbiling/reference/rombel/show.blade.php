@extends('simbiling._layout.admin')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br>
                <h2>Rayon</h2>
            </div>
            <div class="pull-left">
                <div><button style="background: red; border: 1px solid red; border-radius: 3px; width: 60px;"><a href="/simbiling/rombel/add" style="color: white;">add</a></button></div>
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
            <th>Rayon</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        @foreach ($rombel as $rombels)
        <tr>
            <td><input type="checkbox" name="" id="" class="mr-3">{{ $i++ }}</td>
            <td>{{ $rombels->rombel }}</td>
            <td>{{ $rombels->description }}</td>
            <td><a href="/simbiling/rombel/edit/{{ $rombels->_id }}" ><i class="bi bi-pencil-square mr-4"></i></a><a href="/simbiling/rombel/delete/{{ $rombels->_id }}"><i class="bi bi-trash3-fill"></i></a></td>
        </tr>
        @endforeach

        {!! $rombel->links() !!}
    </table>
    @endsection
