<?php

namespace Database\Seeders;

use App\Models\Kuliah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class KuliahAPISeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYTg2MjFkMzUyNzQzNzIxZDgxNDFlMmE1NWQ3MjAxZWUxM2UzZmEyZDFmM2Q1YjVkMGI2ZDQ1ZTU2MTFkNzllNTYyZGMzODY2OTU4YjI3MzEiLCJpYXQiOjE3NDA0NjY5MDEuMzExNjgxLCJuYmYiOjE3NDA0NjY5MDEuMzExNjg1LCJleHAiOjE3NzIwMDI5MDEuMjU2OTE3LCJzdWIiOiIxMjc1Iiwic2NvcGVzIjpbInJlYWRvbmx5Il19.bejdR4rfsT9yzDN1Rshe6pkjFTJM3OUfziKaFRy071ZpD-p2coEZCVwJww2M-IjI8qRb9w80ZYZlPCKq4PpHyIkzpirihcZQecOJ7J5hSNU9qMwg0VTJK8uHOpZPDdN2tDAc_LddjtqOiZsadau_uRpSKOfPSqEZcf44h0WsUzeguoLB5Vhhti-R5yI4dsfG6wg85PA54HihR3pD7zkkmkFktGkThgOpEFExk6GmDYUyYxNDu9h2qCl9HTvFzkdiFhAmCc09UUNn50Jpo_0lFkExzClzsv3V6awWj0GsZLNHsDXXGYx-loPpfVaNHUxp0Dw5djrmJ6_f_uRL2n-KUlu0Db9VTJYGVxYGN9LCgHeNL9uTbKloeyUs1Hr1temaEyapajH49q1ugsEk6kRJ6TBBiMCLb-4mNvQuyi-Dw45IyLEj1vRc6hXEgXJcVGNGyGi6HsP_AXWkUDzaWvKvmjREeQNZkpNBwoJduHXQZUv34lRRZYZwWU5ZE1FCAFiCeqRH0xMf449m5Z1OoyY6EpwTmKT701YuYjiEeXjX1IRtkYW4GiCGjAFCiucEsfky4_NVh7LY_bpsngkMsQmdnJT1QILevHzlsahNrjmVvwE9TBi3roUOc6wnTywf-cVIpLsHIVfsVaASnHRU_EPTL5HJqUHYnPpEMK-L68Fm7a0';

        $url = 'https://sit.poliwangi.ac.id/v2/api/v1/sitapi/kuliah';

        do {
            $response = Http::withToken($token)->get($url);

            if ($response->successful() && isset($response->json()['data'])) {
                $data = $response->json()['data'];

                foreach ($data as $item) {
                    Kuliah::create([
                        "nomor" => $item['nomor'],
                        "tahun" => $item['tahun'],
                        "sem" => $item['sem'],
                        "semester" => $item['semester'],
                        "nama_kelas" => $item['nama_kelas'],
                        "nama_matakuliah" => $item['nama_matakuliah'],
                        "hari_kuliah" => $item['hari_kuliah'],
                        "jam_kuliah" => $item['jam_kuliah'],
                        "ruang_kuliah" => $item['ruang_kuliah'],
                        "dosen_1" => $item['dosen_1'],
                        "dosen_2" => $item['dosen_2'],
                    ]);
                }

                $url = $response->json()['next_page_url'];
                Log::info('Fetched page: ' . $url);
            } else {
                Log::error('Failed to fetch data from API.', ['response' => $response->body()]);
                $this->command->error('Failed to fetch data from API.');
                break;
            }

            sleep(1);
        } while ($url);
    }
}
