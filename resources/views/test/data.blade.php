<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Siswa</h2>
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
        @foreach ($student as $studentt)
        <tr>
            <td>{{ $studentt->_id }}</td>
            <td>{{ $studentt->nis }}</td>
            <td>{{ $studentt->name }}</td>
            <td><a href="/test/student/edit/{{ $studentt->_id }}">edit</a></td>
        </tr>
        @endforeach
    </table>