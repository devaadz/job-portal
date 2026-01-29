@extends('layouts.app')

@section('title', 'Kelola Skill - Career Portal')
 
@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h1>Kelola Skill</h1>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('admin.skills.create') }}" class="btn btn-primary">+ Tambah Skill</a>
    </div>
</div>

<div class="card">
    <div class="row mb-3 align-items-center">
        <div class="col-md-4">
            <form method="GET" action="{{ route('admin.skills.index') }}">
                <div class="input-group">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control"
                        placeholder="Cari skill..."
                        value="{{ request('search') }}"
                    >
                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <form method="GET" action="{{ route('admin.skills.index') }}">
                <div class="input-group">
                    <label class="input-group-text">Tampilkan</label>
                    <select name="perPage" class="form-select" onchange="this.form.submit()">
                        @foreach([10,20,50,100] as $size)
                            <option value="{{ $size }}" {{ $perPage == $size ? 'selected' : '' }}>
                                {{ $size }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- Keep search query if exists -->
                <input type="hidden" name="search" value="{{ request('search') }}">
            </form>
        </div>

        <div class="col-md-4 text-end">
            <span class="text-muted">
                Menampilkan {{ $skills->count() }} dari {{ $totalSkills }} skill
            </span>
        </div>
    </div>


    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nama Skill</th>
                        <th>Digunakan dalam Lowongan</th>
                        <th>Dimiliki Pelamar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($skills as $skill)
                        <tr>
                            <td>
                                <strong>{{ $skill->name }}</strong>
                            </td>
                            <td>{{ $skill->jobs->count() }} lowongan</td>
                            <td>{{ $skill->applicants->count() }} pelamar</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.skills.edit', $skill) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form method="POST" action="{{ route('admin.skills.delete', $skill) }}" 
                                          style="display: inline;" onsubmit="return confirm('Hapus skill ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                Tidak ada skill. <a href="{{ route('admin.skills.create') }}">Tambah sekarang</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row mt-4 align-items-center">
    <div class="col-md-6 text-muted">
        Menampilkan {{ $skills->firstItem() }} – {{ $skills->lastItem() }} dari {{ $skills->total() }} data
    </div>
    <div class="col-md-6 text-end">
        {{ $skills->links('pagination::bootstrap-5') }}
    </div>
</div>

{{-- <div class="row mt-4">
    <div class="col-12">
        {{ $skills->links('pagination::bootstrap-5') }}
    </div>
</div> --}}
@endsection
