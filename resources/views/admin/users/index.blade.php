@extends('layouts.app')

@section('title', 'Kelola Admin User - Career Portal')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h1>Kelola Admin User</h1>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">+ Tambah Admin User</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($admins as $admin)
                        <tr>
                            <td>
                                <strong>{{ $admin->name }}</strong>
                            </td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->created_at->format('d M Y') }}</td>
                            <td>
                                <span class="badge bg-secondary">Admin</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                Tidak ada admin user. <a href="{{ route('admin.users.create') }}">Tambah sekarang</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        {{ $admins->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
