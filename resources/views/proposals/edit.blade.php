.php
@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h2 class="text-lg font-bold text-blue-700">Form Edit Pengajuan Proposal</h2>
            </div>
        </div>
    </div>

    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="POST" action="{{ route('prop.update', ['proposal' => $proposal->id]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label>1. Judul</label>
                                            <input type="text" id="judul" class="form-control @error('judul') is-invalid @enderror"
                                                name="judul" value="{{ old('judul', $proposal->judul) }}">
                                            @error('judul')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <label for="tahun_pengajuan">2. Tahun Pengajuan</label>
                                        <input type="date" name="tahun_pengajuan" class="form-control"
                                            value="{{ old('tahun_pengajuan', $proposal->tahun_pengajuan) }}" required>
                                        @error('tahun_pengajuan')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-8 col-12">
                                        <div class="form-group">
                                            <label>3. Skema PKM</label>
                                            <select class="choices form-select" name="skema_pkm">
                                                @php
                                                $skema_options = ['PKM-RE', 'PKM-KI', 'PKM-K', 'PKM-AI', 'PKM-PI',
                                                'PKM-KC', 'PKM-RSH', 'PKM-VGK', 'PKM-GFT', 'PKM-PM'];
                                                @endphp
                                                @foreach($skema_options as $option)
                                                <option value="{{ $option }}" {{ old('skema_pkm', $proposal->skema_pkm) == $option ? 'selected' : '' }}>
                                                    {{ $option }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label>4. Pendanaan PT</label>
                                            <input type="text" id="pendanaan_pt" class="form-control @error('pendanaan_pt') is-invalid @enderror"
                                                name="pendanaan_pt" value="{{ old('pendanaan_pt', $proposal->pendanaan_pt) }}">
                                            @error('pendanaan_pt')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label>5. Pendanaan Belmawa</label>
                                            <input type="text" id="pendanaan_belmawa" class="form-control @error('pendanaan_belmawa') is-invalid @enderror"
                                                name="pendanaan_belmawa" value="{{ old('pendanaan_belmawa', $proposal->pendanaan_belmawa) }}">
                                            @error('pendanaan_belmawa')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label>6. Pendanaan lain</label>
                                            <input type="text" id="pendanaan_lain" class="form-control @error('pendanaan_lain') is-invalid @enderror"
                                                name="pendanaan_lain" value="{{ old('pendanaan_lain', $proposal->pendanaan_lain) }}">
                                            @error('pendanaan_lain')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label>7. Jumlah Anggota Tim</label>
                                            <input type="number" id="jumlah_anggota_tim" class="form-control @error('jumlah_anggota_tim') is-invalid @enderror"
                                                name="jumlah_anggota_tim" value="{{ old('jumlah_anggota_tim', $proposal->jumlah_anggota_tim) }}">
                                            @error('jumlah_anggota_tim')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label>8. File Proposal</label>
                                            <div class="">
                                                <input type="file" class="form-control" id="file_proposal" name="file_proposal" accept="application/pdf">
                                                @if($proposal->file_proposal)
                                                <small class="text-muted">Current file: {{ basename($proposal->file_proposal) }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                        <button type="button" class="btn btn-light-secondary me-1 mb-1" onclick="window.history.back();">Back</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection