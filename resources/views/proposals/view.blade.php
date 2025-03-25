@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-12 order-md-1 order-last">
                <h2 class="text-lg font-bold text-blue-700">Contoh Hasil Proposal Telah Upload Berdasarkan Skema</h2>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <!-- Wrapper untuk tombol dan search bar -->
                <div class="d-flex justify-content-end align-items-center mb-3">
                    <a href="{{ route('prop.create') }}" class="btn btn-primary">Ajukan Proposal</a>
                </div>

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengusul</th>
                            <th>Judul</th>
                            <th>Skema</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Detail</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proposals as $proposal)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @foreach($proposal->mahasiswa as $mahasiswa)
                                {{ $mahasiswa->nama }}<br>Program Studi {{ $mahasiswa->prodi }}<br>
                                @endforeach
                            </td>
                            <td>{{ $proposal->judul }}</td>
                            <td>{{ $proposal->skema_pkm }}</td>
                            <td>{{ $proposal->tahun_pengajuan }}</td>
                            <td>
                                <a href="{{ route('prop.detail', $proposal->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                    <i class="badge-circle font-small-1" data-feather="eye"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('prop.edit', $proposal->id) }}">
                                    <i class="badge-circle font-medium-1" data-feather="edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i>
                                </a>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $proposal->id }}').submit();">
                                    <i class="badge-circle font-medium-1" data-feather="trash" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>
                                </a>
                                <form id="delete-form-{{ $proposal->id }}" action="{{ route('prop.destroy', $proposal->id) }}" method="POST" style="display:none;">
                                    @csrf
                                    @method('DELETE')
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
