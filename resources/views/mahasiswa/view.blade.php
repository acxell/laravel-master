@extends('layouts.app')
@section('content')

<div class="bg-gray-100 p-4">
        <!-- Tracking Proposal -->
        <div class="mt-4 bg-white p-6 rounded-md shadow-md flex items-center">
            <h3 class="text-lg font-semibold flex-1">Tracking Proposal</h3>
            <a href="#" class="text-blue-500 text-sm">Tracking Details</a>
        </div>
        <div class="bg-white p-6 rounded-md shadow-md flex justify-center items-center space-x-6">
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 bg-cyan-400 text-white rounded-full flex items-center justify-center text-lg font-bold">1</div>
                <p class="text-sm text-cyan-400 text-center">Proposal<br>Diterima</p>
            </div>
            <div class="w-24 h-2 bg-gray-300 rounded-full"></div>
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 bg-green-400 text-white rounded-full flex items-center justify-center text-lg font-bold">2</div>
                <p class="text-sm text-green-400 text-center">Proses<br>Review</p>
            </div>
            <div class="w-24 h-2 bg-gray-300 rounded-full"></div>
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 bg-red-500 text-white rounded-full flex items-center justify-center text-lg font-bold">3</div>
                <p class="text-sm text-red-500 text-center">Revisi</p>
            </div>
            <div class="w-24 h-2 bg-gray-300 rounded-full"></div>
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 border-2 border-gray-400 text-gray-500 rounded-full flex items-center justify-center text-lg font-bold">4</div>
                <p class="text-sm font-semibold text-black text-center">Selesai</p>
            </div>
        </div>


        <!-- Identitas Pengusul -->
        <div class="mt-6 p-4 bg-white shadow rounded-md">
            <h3 class="font-semibold text-lg">Identitas Pengusul</h3>
            <p><strong>Nama Ketua:</strong> Octavian Damai Putri</p>
            <p><strong>NIM:</strong> 362154501057</p>
            <p><strong>Program Studi:</strong> Teknologi Rekayasa Perangkat Lunak</p>
            <p><strong>Jumlah Anggota:</strong> 4 Anggota</p>
        </div>

        <!-- Identitas Anggota -->
        <div class="mt-6 p-4 bg-white shadow rounded-md">
            <h3 class="font-semibold text-lg">Identitas Anggota</h3>
            <ul class="list-disc pl-5">
                <li><strong>Nama:</strong> Aditya Putranto,
                    <strong>NIM:</strong> 362123456789,
                    <strong>Program Studi:</strong> Teknologi Rekayasa Perangkat Lunak
                </li>
                <li><strong>Nama:</strong> Ahmad Binjai,
                    <strong>NIM:</strong> 362123456789,
                    <strong>Program Studi:</strong> Teknologi Rekayasa Perangkat Lunak
                </li>
                <li><strong>Nama:</strong> Rico Hartanto,
                    <strong>NIM:</strong> 362123456789,
                    <strong>Program Studi:</strong> Teknologi Rekayasa Perangkat Lunak
                </li>
                <li><strong>Nama:</strong> Dimas Faisol,
                    <strong>NIM:</strong> 362123456789,
                    <strong>Program Studi:</strong> Teknologi Rekayasa Perangkat Lunak
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

