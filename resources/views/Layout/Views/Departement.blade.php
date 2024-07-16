
<!-- File: resources/views/departments/index.blade.php -->
@extends('layout.content.departement')

@section('title', 'Laravel CRUD')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Laravel CRUD</h2>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form action="{{ route('Departements.store') }}" method="POST" class="mb-4">
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
            <th>Nama Departement</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($Departements as $Departement)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $Departement->nama }}</td>
            <td>
                <form action="{{ route('Departements.destroy', $Departement->id) }}" method="POST">
                    <a class="btn btn-primary btn-sm" href="#" onclick="editDepartement({{ $Departement }})">
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
                    <h5 class="modal-title" id="editModalLabel">Edit Departement</h5>
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
@endsection

@section('scripts')
<script>
    function editDepartement(Departement) {
        $('#editName').val(Departement.nama);
        $('#editForm').attr('action', '/Departements/' + Departement.id);
        $('#editModal').modal('show');
    }


$(document).ready(function() {
    setTimeout(function() {
        $('.alert-success').fadeOut('fast');
    }, 2000); // 2 seconds
});
</script>
@endsection

