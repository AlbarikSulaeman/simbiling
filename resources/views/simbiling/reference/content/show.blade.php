@extends('simbiling._layout.app')
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br>
                <h2>Data Content</h2>
                <div class="pull-left">
                    <div><button style="background: red; border: 1px solid red; border-radius: 3px; width: 60px; float: right;"><a href="/simbiling/content/add" style="color: white;">add</a></button></div>
                </div>
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
                <td><button type="button" onclick="editData('{{$contents->_id}}')" style="border: none; background-color: #f8f9fe;"><i class="bi bi-pencil-square mr-4"></i></button><a href="/simbiling/content/delete/{{ $contents->_id }}"><i class="bi bi-trash3-fill"></i></a></td>
            </tr>
            
            @endforeach
        </tbody>
        
    </table>
    <div class="modal fade" id="content-edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="post">
                    <div class="modal-body">

                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name-edit">
                        </div>
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" class="form-control" id="title-edit">
                        </div>
                        <div class="form-group">
                            <label for="name">Content</label>
                            <input type="text" class="form-control" id="content-edit">
                        </div>
                        <div class="form-group">
                            <label for="name">Content For</label>
                            <input type="text" class="form-control" id="contentFor-edit">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection
    @section('js')
        <script>
            function editData(id) {
                let urlFirst = '{{url("/simbiling/content/edit/+id+")}}'
                    
                $.ajax({
                    type: 'get',
                    url: urlFirst.replace('+id+',id),
                    cache: false,
                    success: function(response){
                        $("#content-edit-modal").modal("show")
                        $("#name-edit").val(response.name)
                        $("#title-edit").val(response.title)
                        $("#content-edit").val(response.content)
                        $("#contentFor-edit").val(response.contentFor)
                    }
                })
            }
        </script>
    @endsection