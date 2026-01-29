@extends('layouts.app')

@section('title', 'Edit Lowongan Pekerjaan - Career Portal')

@section('content')
<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <h1 class="mb-4">Edit Lowongan Pekerjaan</h1>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.jobs.update', $job) }}">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Lowongan</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title', $job->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Lowongan</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="6" required>{{ old('description', $job->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Skill yang Dibutuhkan</label>
                        <div class="border p-3 rounded" style="max-height: 300px; overflow-y: auto;">
                            @foreach($skills as $skill)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="skills[]" 
                                           value="{{ $skill->id }}" id="skill_{{ $skill->id }}"
                                           {{ $job->skills->contains($skill->id) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="skill_{{ $skill->id }}">
                                        {{ $skill->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('skills')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                   value="1" {{ old('is_active', $job->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Aktifkan Lowongan
                            </label>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update Lowongan</button>
                        <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
