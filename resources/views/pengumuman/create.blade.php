@extends('layouts.app')

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h2 class="text-lg font-bold text-blue-700">Tambah Data Pengumuman</h2>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
            </div>
        </div>
    </div>
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="POST" action="{{ route('pengumuman.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label>1. Judul Pengumuman</label>
                                            <input type="text" id="judul" class="form-control" name="judul_pengumuman" value="{{ old('judul_pengumuman') }}"
                                            @error ('judul_pengumuman') is invalid
                                            @enderror
                                                placeholder="Isi Pengumuman" name="judul" value="{{ old('judul') }}">
                                            @error('judul_pengumuman')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <label for="tahun_pengajuan">2. Tanggal Pengumuman</label>
                                        <input type="date" name="tanggal_pengumuman" class="form-control" placeholder="mm/dd/yyyy" min="{{ now()->format('Y-m-d') }}" required>
                                        @error('tanggal_pengumuman')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label>3. Link Pengumuman</label>
                                            <input type="text" id="link_pengumuman" class="form-control" name="link_pengumuman" value="{{ old('link_pengumuman') }}"
                                            @error ('link_pengumuman') is invalid
                                            @enderror
                                                placeholder="Link Pengumuman" name="link_pengumuman" value="{{ old('link_pengumuman') }}">
                                            @error('link_pengumuman')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <div class="form-group">
                                            <label for="">4. Aksi</label>
                                            <select class="choices form-select" name="status">

                                                <option value="Aktif">Aktif</option>
                                                <option value="Berakhir">Berahkir</option>
                                            </select>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="button" class="btn btn-light-secondary me-1 mb-1" onclick="window.history.back();">Kembali</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>
@endsection
