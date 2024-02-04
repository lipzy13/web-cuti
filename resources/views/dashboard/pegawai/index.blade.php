<?php
use Carbon\Carbon;
Carbon::setLocale('id');
use App\Models\Kontrak;
use App\Models\Cuti;
use App\Models\TanggalCuti;
?>
@extends('dashboard.pegawai.layouts.main')
@section('container')
<div class=" bg-zinc-100 w-5/6 h-screen" >

    <div class="grid grid-cols-4 mx-16 -mt-2 gap-4 p-4">
        <div class="bg-white p-4 rounded-md  pl-8 shadow-xl {{!$kontrak_aktif ? 'col-span-4': 'col-span-3'}}">
            <h2 class="mt-4 text-5xl font-bold pb-4">{{ auth()->user()->nama }}</h2>
            <h2 class="text-3xl font-light pb-10">{{ auth()->user()->nik }}</h2>
        </div>
    <div class="bg-white p-4 col-span-1 rounded-md shadow-xl {{!$kontrak_aktif ? 'hidden': ''}}">
        <div style="width: 80%; margin: auto; " >
          @if (!$kontrak_aktif)
              <h1 class="">Kontrak aktif tidak ada</h1>
          @else
          <canvas id="doughnutChart"></canvas>
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
          <script>
      var ctx = document.getElementById('doughnutChart').getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
              labels: ['Terpakai', 'Tersisa'],
              datasets: [{
                  data: [{{ $kontrak_aktif->jumlah_cuti}}, {{$kontrak_aktif->jumlah_bulan}}],
                  backgroundColor: [
                      '#57BEB5',
                      '#3070F5',
                  ],
                  borderColor: [
                      '#57BEB5',
                      '#3070F5',
                  ],
                  borderWidth: 1,
                      }]
                  },
              });
            </script>
              <h1 class="font-bold text-2xl mt-3">{{ $kontrak_aktif->jumlah_cuti }}/ {{ $kontrak_aktif->jumlah_bulan }}</h1>
              <h2 class="text-gray-600 text-sm font-semibold ">Cuti</h2>
          @endif
        </div>
    </div>
    <div class="bg-white p-4 rounded-md col-start-1 col-end-5 shadow-xl" >
      <div class=" items-center justify-center w-full">
          <div class="hs-accordion-group">
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="overflow-hidden border rounded-lg shadow">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">No</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Nomor Kontrak</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"></th>
                                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"></th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @forelse ($kontrak as $kontra)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $loop->iteration + $kontrak->firstItem() - 1 }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$kontra->no_kontrak}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                <x-modal-list-contract :kontrak="$kontra" ></x-modal-list-contract>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800" data-hs-overlay="#hs-modal-{{$kontra->id}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">Kontrak Tidak Ditemukan</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="my-2">
                                    {{$kontrak->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
          </div>
      </div>
  </div>
  </div>


@endsection
