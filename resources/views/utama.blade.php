<!DOCTYPE html>
<html>
<head>
    <title>Laravel CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Laravel CRUD</h2>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="name" class="form-control" placeholder="Nama" required>
            </div>
            <div class="col-md-2">
                <input type="text" name="nim" class="form-control" placeholder="NIM" required>
            </div>

            <div class="col-md-3">
                <div class="input-group">
                    <select name="department" class="form-control" required>
                        <option value="">Pilih jurusan</option>
                        @foreach ($jurusans as $jurusan)
                            <option value="{{ $jurusan->nama }}">{{ $jurusan->nama }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <a href="{{ route('jurusans.index') }}" class="btn btn-secondary">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <input type="text" name="address" class="form-control" placeholder="Alamat" required>
            </div>
            <div class="col-md-1">
                <div class="input-group">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->nim }}</td>
            <td>{{ $student->department }}</td>
            <td>{{ $student->address }}</td>
            <td>
                <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                    <a class="btn btn-primary " href="#" onclick="editStudent({{ $student }})">
                        <i class="fa fa-pencil"></i>
                    </a>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

<!-- Modal for editing -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="POST" id="editForm">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="editName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>NIM</label>
                        <input type="text" name="nim" id="editNim" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Department</label>
                        <select name="department" id="editDepartment" class="form-control" required>
                            <option value="">Pilih jurusan</option>
                            @foreach ($jurusans as $jurusan)
                                <option value="{{ $jurusan->nama }}">{{ $jurusan->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" id="editAddress" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function editStudent(student) {
    $('#editName').val(student.name);
    $('#editNim').val(student.nim);
    $('#editDepartment').val(student.department);
    $('#editAddress').val(student.address);
    $('#editForm').attr('action', '/students/' + student.id);


    $('#editDepartment option').each(function() {
        if($(this).val() == student.department) {
            $(this).attr('selected', 'selected');
        }
    });

    $('#editModal').modal('show');
}

$(document).ready(function() {
    setTimeout(function() {
        $('.alert-success').fadeOut('fast');
    }, 2000);
});
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
