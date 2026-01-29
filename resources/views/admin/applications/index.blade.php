<!-- resources/views/admin/applications/index.blade.php -->
@extends('layouts.app')

@section('title', 'Screening Lamaran - Career Portal')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h1>Screening Lamaran</h1>
    </div>
</div>

{{-- Filter & Search --}}
<form id="filter-form" class="row g-3 mb-3">
    <div class="col-md-3">
        <input type="text" name="search" class="form-control" placeholder="Cari pelamar / posisi" value="{{ request('search') }}">
    </div>

    <div class="col-md-2">
        <select name="status" class="form-select">
            <option value="">Semua Status</option>
            <option value="applied" {{ request('status') == 'applied' ? 'selected' : '' }}>
                Applied
            </option>
            <option value="screening" {{ request('status') == 'screening' ? 'selected' : '' }}>
                Screening
            </option>
            <option value="interview" {{ request('status') == 'interview' ? 'selected' : '' }}>
                Interview
            </option>
            <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>
                Diterima
            </option>
            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>
                Ditolak
            </option>
        </select>

    </div>

    <div class="col-md-3">
        <select name="job_id" class="form-select">
            <option value="">Semua Posisi</option>
            @foreach($jobs as $job)
                <option value="{{ $job->id }}" {{ request('job_id') == $job->id ? 'selected' : '' }}>{{ $job->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-2">
        <select name="per_page" class="form-select">
            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10 / halaman</option>
            <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25 / halaman</option>
            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50 / halaman</option>
            <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100 / halaman</option>
        </select>
    </div>
</form>

<div id="applications-table" class="table-responsive">
    <table class="table table-hover mb-0">
        <thead class="table-light">
            <tr>
                <th>Pelamar</th>
                <th>Posisi</th>
                <th>Status</th>
                <th>Hasil Screening</th>
                <th>Tahap</th>
                <th>Tanggal Melamar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <div id="pagination-links" class="mt-3"></div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('filter-form');
    const tableDiv = document.getElementById('applications-table');

    // Filter saat change (tidak kirim event ke submitForm)
    form.querySelectorAll('input, select').forEach(el => {
        el.addEventListener('change', () => submitForm());
    });

    // Load pertama kali
    submitForm();

    function submitForm(url = null) {
        const formData = new FormData(form);
        const query = new URLSearchParams(formData).toString();
        const fetchUrl = url ? url : "{{ route('admin.applications.index') }}?" + query;

        fetch(fetchUrl, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(res => res.json())
            .then(json => renderTable(json.data, json.pagination))
            .catch(err => console.error(err));
    }

    function renderTable(applications, pagination) {
        if (!applications) return;

        let html = `<table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Pelamar</th>
                    <th>Posisi</th>
                    <th>Status</th>
                    <th>Hasil Screening</th>
                    <th>Tahap</th>
                    <th>Tanggal Melamar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>`;

        if (applications.length > 0) {
            applications.forEach(app => {
                html += `<tr>
                    <td>${app.applicant.full_name}</td>
                    <td><a href="/jobs/${app.job.id}" class="text-decoration-none">${app.job.title}</a></td>
                    <td>
                        <span class="badge bg-${app.status === 'accepted' ? 'success' : (app.status === 'rejected' ? 'danger' : 'warning')}">
                            ${app.status}
                        </span>
                    </td>
                    <td>${app.screening_result ? `<span class="badge bg-info">${app.screening_result}</span>` : '<span class="text-muted">-</span>'}</td>
                    <td>${app.current_step.charAt(0).toUpperCase() + app.current_step.slice(1)}</td>
                    <td>${(new Date(app.created_at)).toLocaleDateString('id-ID', {day:'2-digit', month:'short', year:'numeric'})}</td>
                    <td>
                        <a href="/admin/applications/${app.id}" class="btn btn-sm btn-primary">Lihat Detail</a>
                    </td>
                </tr>`;
            });
        } else {
            html += `<tr>
                <td colspan="7" class="text-center text-muted py-4">Tidak ada lamaran.</td>
            </tr>`;
        }

        html += `</tbody></table>`;

        // Pagination
        if (pagination.last_page > 1) {
            html += `<nav class="mt-3"><ul class="pagination">`;
            for (let i = 1; i <= pagination.last_page; i++) {
                html += `<li class="page-item ${i === pagination.current_page ? 'active' : ''}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>`;
            }
            html += `</ul></nav>`;
        }

        tableDiv.innerHTML = html;

        // Pagination click
        tableDiv.querySelectorAll('.page-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const page = this.dataset.page;
                const url = "{{ route('admin.applications.index') }}" + "?page=" + page + "&" + new URLSearchParams(new FormData(form)).toString();
                submitForm(url);
            });
        });
    }
});
</script>
@endsection
