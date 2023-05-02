@extends('simbiling._layout.admin')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br>
                <h2>Data Siswa</h2>
            </div>
            <div class="pull-left">
                <div><button style="background: red; border: 1px solid red; border-radius: 3px; width: 60px;"><a href="/simbiling/student/add" style="color: white;">add</a></button></div>
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
            <th>Email</th>
            <th>Name</th>
            <th>Nis</th>
            <th>Class</th>
            <th>Rombel</th>
            <th>Rayon</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ($student as $students)
        <tr>
            <td><input type="checkbox" class="mr-3">{{ $i++ }}</td>
            <td>{{ $students->email }}</td>
            <td>{{ $students->name }}</td>
            <td>{{ $students->nis }}</td>
            <td>{{ $students->class }}</td>
            <td>{{ $students->rombel }}</td>
            <td>{{ $students->rayon }}</td>
            <td>{{ $students->status }}</td>
            <td><a href="/simbiling/student/masalah/{{ $students->_id }}"><i class="bi bi-exclamation-triangle-fill mr-4"></i></a><a href="/simbiling/student/edit/{{ $students->_id }}" ><i class="bi bi-pencil-square mr-4"></i></a><a href="/simbiling/student/delete/{{ $students->_id }}"><i class="bi bi-trash3-fill"></i></a></td>
       

        @endforeach
        {!! $student->links() !!}

    </table>
    @endsection
