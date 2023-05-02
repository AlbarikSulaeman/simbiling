<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Siswa</h2>
            </div>
            <div class="pull-left">
                <div><a href="/test/student/add">add</a></div>
            </div>
            </div>
        </div>
    </div>
    <br>
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($student as $students)
        <tr>
            <td>{{ $students->_id }}</td>
            <td>{{ $students->nis }}</td>
            <td>{{ $students->name }}</td>
            <td><a href="/test/student/edit/{{ $students->_id }}">edit</a></td>
            <td><a href="/test/student/delete/{{ $students->_id }}">hapus</a></td>
        </tr>
    {!! $student->links() !!}

        @endforeach
    </table>