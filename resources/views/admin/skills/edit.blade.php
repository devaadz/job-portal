@extends('layouts.app')

@section('title', 'Edit Skill - Career Portal')

@section('content')
<div class="row">
    <div class="col-lg-6 offset-lg-3">
        <h1 class="mb-4">Edit Skill</h1>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.skills.update', $skill) }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Skill</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $skill->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update Skill</button>
                        <a href="{{ route('admin.skills.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
