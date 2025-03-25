@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-12 order-md-1 order-last">
                    <h2 class="text-lg font-bold text-blue-700">Timeline Proposal</h2>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <!-- Wrapper untuk tombol dan search bar -->
                    <div class="d-flex justify-content-end align-items-center mb-3">
                        <a href="{{ route('pengumuman.create') }}" class="btn btn-primary">Tambah Timeline</a>
                    </div>

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengumuman</th>
                                <th>Link</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengumumans as $pengumuman)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pengumuman->judul_pengumuman }}</td>
                                    <td>{{ $pengumuman->link_pengumuman }}</td>
                                    <td>{{ $pengumuman->tanggal_pengumuman }}</td>
                                    <td>
                                        <form action="{{ route('pengumuman.toggle-status', $pengumuman->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" onChange="this.form.submit()"
                                                    name="status" {{ $pengumuman->status === 'Aktif' ? 'checked' : '' }}>
                                                <label class="form-check-label">
                                                    {{ $pengumuman->status }}
                                                </label>
                                            </div>
                                        </form>
                                    </td>
                                    <td>

                                        <a href="{{ route('pengumuman.edit', $pengumuman->id) }}" class="btn btn-warning btn-sm"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('pengumuman.destroy', $pengumuman->id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection