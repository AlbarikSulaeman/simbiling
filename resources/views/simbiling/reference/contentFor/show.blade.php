<?php
    $abc = Helper::toOptions(Helper::getContentFor(),'name', 'slug', false);
    // dd($abc);
?>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Content</h2>
            </div>
            <div class="pull-left">
                <div><a href="/simbiling/contentfor/add">add</a></div>
            </div>
            </div>
        </div>
    </div>
    <br>
     
    <table class="table table-bordered">
        <tr>
            @php
            $i = 1;
            @endphp
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>seq</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($contentFor as $contentfors)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $contentfors->name }}</td>
            <td>{{ $contentfors->description }}</td>
            <td>{{ $contentfors->seq }}</td>
            <td><a href="/simbiling/contentfor/edit/{{ $contentfors->_id }}">edit</a></td>
            <td><a href="/simbiling/contentfor/delete/{{ $contentfors->_id }}">hapus</a></td>
        </tr>
        @endforeach
    </table>