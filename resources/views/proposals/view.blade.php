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
                                <a href="{{ route('prop.detail', $proposal->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">Detail
                                    <i class="badge-circle font-small-1" ></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('prop.edit', $proposal->id) }}" class="btn btn-warning btn-sm"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('prop.destroy', $proposal->id) }}" method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
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
