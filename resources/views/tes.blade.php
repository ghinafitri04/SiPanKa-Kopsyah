<!-- resources/views/tes.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Admin dan Role</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Data Admin dan Role</h2>

        <div class="row mt-4">
            <div class="col-md-6">
                <h4>Role</h4>
                <ul>
                    @foreach($roles as $role)
                        <li>{{ $role->role_name }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-6">
                <h4>Admin</h4>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Nama Instansi</th>
                            <th>Region</th>
                            <th>Role</th>
                            <th>Aksi</th> <!-- Kolom untuk tombol hapus -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{ $admin->username }}</td>
                                <td>{{ $admin->nama_instansi }}</td>
                                <td>{{ $admin->region }}</td>
                                <td>{{ $admin->role->role_name }}</td>
                                <td>
                                    <!-- Tombol hapus dengan form tersembunyi -->
                                    <form method="POST" action="{{ route('admin.destroy', $admin->id) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <h4>Tambah Admin</h4>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form method="POST" action="{{ route('admin.store') }}">
                    @csrf
        
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select class="form-control" id="role" name="id_role">
                            @foreach($roles as $role)
                                @if($role->role_name != 'Admin Provinsi')
                                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
        
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
        
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
        
                    <div class="form-group">
                        <label for="nama_instansi">Nama Instansi:</label>
                        <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" required>
                    </div>
        
                    <div class="form-group">
                        <label for="region">Region:</label>
                        <input type="text" class="form-control" id="region" name="region" required>
                    </div>
        
                    <button type="submit" class="btn btn-primary">Tambah Admin</button>
                </form>
            </div>
        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
