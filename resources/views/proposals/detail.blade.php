@extends('layouts.app')

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h2 class="text-lg font-bold text-blue-700">Detail Pengajuan Proposal PKM</h2>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <!-- Button Back to Kegiatan List -->
                <div class="col-12 d-flex justify-content-end mt-3">
                    <a type="button" class="btn btn-danger me-2 mb-2" href="{{ route('prop.index') }}">Done</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail Kegiatan Section Start -->
    <section id="detail-proposal">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col d-flex justify-content-center">
                            <h4 class="card-title">Proposal PKM</h4>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Skema PKM</th>
                                    <td colspan="5">{{ $proposal->skema_pkm }}</td>
                                </tr>
                                <tr>
                                    <th>Judul</th>
                                    <td colspan="5">{{ $proposal->judul }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Ketua</th>
                                    <td colspan="5">damai</td>
                                </tr>
                                <tr>
                                    <th>NIM Ketua</th>
                                    <td colspan="5">362155401057</td>
                                </tr>
                                <tr>
                                    <th>Nama Dosen Pembimbing</th>
                                    <td colspan="5">Emil S.Kom,M.M.,</td>
                                </tr>
                                <tr>
                                    <th>NIDN Dosen Pembimbing</th>
                                    <td colspan="5">12345678910</td>
                                </tr>
                                <tr>
                                    <th>Tahun Pengajuan</th>
                                    <td colspan="5">{{ $proposal->tahun_pengajuan }}</td>
                                </tr>
                                <tr>
                                    <th>Sumber Pendanaan DIKTI</th>
                                    <td colspan="5">{{ $proposal->pendanaan_pt }}</td>
                                </tr>
                                <tr>
                                    <th>Sumber Pendanaan Belmawa</th>
                                    <td colspan="5">{{ $proposal->pendanaan_belmawa }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <section class="section mt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                            <h5>Daftar Anggota</h5>
                            <div class="col-12 d-flex justify-content-end mt-3">
                                <a type="button" class="btn btn-primary me-1 mb-1" href="#">Tambah Anggota</a>
                            </div>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Jabatan Dalam Tim</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($proposal->mahasiswa as $mahasiswa)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $mahasiswa->nama }}</td>
                                        <td>{{ $mahasiswa->nim }}</td>
                                        <td>jabatan</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
</div>
@endsection