@extends('layouts.app')

@section('title', 'Kelola Lowongan Pekerjaan - Career Portal')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h1>Kelola Lowongan Pekerjaan</h1>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary">+ Tambah Lowongan</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Judul Lowongan</th>
                        <th>Skill</th>
                        <th>Status</th>
                        <th>Pelamar</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jobs as $job)
                        <tr>
                            <td>
                                <strong>{{ $job->title }}</strong>
                            </td>
                            <td>
                                @foreach($job->skills as $skill)
                                    <span class="badge bg-light text-dark">{{ $skill->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <span class="badge {{ $job->is_active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $job->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td>{{ $job->applications->count() }} pelamar</td>
                            <td>{{ $job->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.jobs.edit', $job) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form method="POST" action="{{ route('admin.jobs.toggle', $job) }}" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-info">
                                            {{ $job->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.jobs.destroy', $job) }}" 
                                          style="display: inline;" onsubmit="return confirm('Hapus lowongan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                Tidak ada lowongan pekerjaan. <a href="{{ route('admin.jobs.create') }}">Tambah sekarang</a>
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
        {{ $jobs->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
