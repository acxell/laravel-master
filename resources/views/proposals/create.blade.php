@extends('layouts.app')

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h2 class="text-lg font-bold text-blue-700">Form Pengajuan Proposal</h2>
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
                            <form class="form" method="POST" action="{{ route('prop.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label>1. Judul</label>
                                            <input type="text" id="judul" class="form-control
                                            @error ('judul') is invalid
                                            @enderror"
                                                placeholder="Judul Proposal" name="judul" value="{{ old('judul') }}">
                                            @error('judul')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <label for="tahun_pengajuan">2. Tahun Pengajuan</label>
                                        <input type="date" name="tahun_pengajuan" class="form-control" placeholder="mm/dd/yyyy" min="{{ now()->format('Y-m-d') }}" required>
                                        @error('tahun_pengajuan')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <div class="form-group">
                                            <label for="">3. Skema PKM</label>
                                            <select class="choices form-select" name="skema_pkm">

                                                <option value="PKM-RE">PKM-RE</option>
                                                <option value="PKM-KI">PKM-KI</option>
                                                <option value="PKM-K">PKM-K</option>
                                                <option value="PKM-AI">PKM-AI</option>
                                                <option value="PKM-PI">PKM-PI</option>
                                                <option value="PKM-KC">PKM-KC</option>
                                                <option value="PKM-RSH">PKM-RSH</option>
                                                <option value="PKM-VGK">PKM-VGK</option>
                                                <option value="PKM-GFT">PKM-GFT</option>
                                                <option value="PKM-PM">PKM-PM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label>4. Pendanaan PT</label>
                                            <input type="text" id="pendanaan_pt" class="form-control
                                            @error ('pendanaan_pt') is invalid
                                            @enderror"
                                                placeholder="Jumlah Pendanaan PT" name="pendanaan_pt" value="{{ old('pendanaan_pt') }}">
                                            @error('pendanaan_pt')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label>5. Pendanaan Belmawa</label>
                                            <input type="text" id="pendanaan_belmawa" class="form-control
                                            @error ('pendanaan_belmawa') is invalid
                                            @enderror"
                                                placeholder="Jumlah Pendanaan Belmawa" name="pendanaan_belmawa" value="{{ old('pendanaan_belmawa') }}">
                                            @error('pendanaan_belmawa')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label>6. Pendanaan lain</label>
                                            <input type="text" id="pendanaan_lain" class="form-control
                                            @error ('pendanaan_lain') is invalid
                                            @enderror"
                                                placeholder="Jumlah Pendanaan Lain" name="pendanaan_lain" value="{{ old('pendanaan_lain') }}">
                                            @error('pendanaan_lain')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label>7. Jumlah Anggota Tim</label>
                                            <input type="number" id="jumlah_anggota_tim" class="form-control
                                            @error ('jumlah_anggota_tim') is invalid
                                            @enderror"
                                                placeholder="Jumlah Anggota Tim" name="jumlah_anggota_tim" value="{{ old('jumlah_anggota_tim') }}">
                                            @error('jumlah_anggota_tim')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">8. Mahasiswa</label>
                                            <select class="choices form-select multiple-remove" name="mahasiswa_ids[]" multiple>
                                                @foreach ($mahasiswas as $mahasiswa)
                                                <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">9. Dosen</label>
                                            <select class="choices form-select multiple-remove" name="dosen_ids[]" multiple>
                                                @foreach ($dosens as $dosen)
                                                <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label>10. File Proposal</label>
                                        <div class="">
                                            <input type="file" class="form-control" id="file_proposal" name="file_proposal" accept="application/pdf">
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
