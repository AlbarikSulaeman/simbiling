@extends('simbiling._layout.app')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br>
                <h2>Data Content</h2>
            </div>
            <div class="pull-left">
                <div><button style="background: red; border: 1px solid red; border-radius: 3px; width: 60px;"><a href="/simbiling/content/add" style="color: white;">add</a></button></div>
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
        <thead>
            <tr>
                <td>No</td>
                <td>Name</td>
                <td>Title</td>
                <td>Content</td>
                <td>contentFor</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($content as $contents)
            <tr>
                <td><input type="checkbox" class="mr-3">{{ $loop->iteration }} </td>
                <td>{{ $contents->name }}</td>
                <td>{{ $contents->title }}</td>
                <td>{{ $contents->content }}</td>
                <td>{{ $contents->contentFor }}</td>
                <td><i class="bi bi-pencil-square mr-4"><a href="/simbiling/content/edit/{{ $contents->_id }}"></a></i><i class="bi bi-trash3-fill"><a href="/simbiling/content/delete/{{ $contents->_id }}"></a></i></td>
            </tr>
            
            @endforeach
        </tbody>
        
    </table>
    @endsection