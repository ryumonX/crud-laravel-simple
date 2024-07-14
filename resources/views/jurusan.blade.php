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

    <form action="{{ route('jurusans.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <input type="text" name="nama" class="form-control" placeholder="Name" required>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-plus"></i>
                </button>

                <a href="{{ route('students.index') }}" class="btn btn-secondary">
                    <i class="fa fa-cogs"></i>
                </a>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama jurusan</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($jurusans as $jurusan)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $jurusan->nama }}</td>
            <td>
                <form action="{{ route('jurusans.destroy', $jurusan->id) }}" method="POST">
                    <a class="btn btn-primary btn-sm" href="#" onclick="editJurusan({{ $jurusan }})">
                        <i class="fa fa-pencil"></i>
                    </a>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
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
                    <h5 class="modal-title" id="editModalLabel">Edit Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="nama" id="editName" class="form-control" required>
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
function editJurusan(jurusan) {
    $('#editName').val(jurusan.nama);
    $('#editForm').attr('action', '/jurusans/' + jurusan.id);
    $('#editModal').modal('show');



}

$(document).ready(function() {
    setTimeout(function() {
        $('.alert-success').fadeOut('fast');
    }, 2000); // 2 seconds
});
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
