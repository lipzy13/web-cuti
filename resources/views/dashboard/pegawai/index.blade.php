<?php
use Carbon\Carbon;
Carbon::setLocale('id');
use App\Models\Kontrak;
?>
@extends('dashboard.pegawai.layouts.main')
@section('container')
<div class=" bg-zinc-100 w-5/6 h-screen " >

    <div class="grid grid-cols-4 gap-4 p-4 ">
        <div class="bg-white p-4 rounded-md col-span-3 pl-8 shadow-xl">
            <h2 class="mt-4 text-5xl font-bold pb-4">{{ auth()->user()->pegawai->nama }}</h2>
            <h2 class="text-3xl font-light pb-10">{{ auth()->user()->nip }}</h2>
    </div>
    <div class="bg-white p-4 col-span-1 rounded-md shadow-xl">
        <div style="width: 80%; margin: auto;">
            <canvas id="doughnutChart"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    var ctx = document.getElementById('doughnutChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Terpakai', 'Tersisa'],
            datasets: [{
                data: [{{ $durasi }}, {{Carbon::parse($kontrak_aktif->tanggal_mulai)
        ->diffInMonths(Carbon::parse($kontrak_aktif->tanggal_selesai)) - $durasi }}],
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
        </div>
        <h1 class="font-bold text-2xl mt-3">{{ $durasi }}/{{Carbon::parse($kontrak_aktif->tanggal_mulai)
        ->diffInMonths(Carbon::parse($kontrak_aktif->tanggal_selesai)) }}</h1>
        <h2 class="text-gray-600 text-sm font-semibold ">Cuti</h2>
    </div>
    <div class="bg-white p-4 rounded-md col-start-1 col-end-5 shadow-xl" >
      <div class=" items-center justify-center w-full">
          {{-- <div class="overflow-x-auto shadow-md sm:rounded-lg">
              <div class="overflow-x-auto shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="py-3 px-6">No</th>
                      <th scope="col" class="py-3 px-6">Nomor Kontrak</th>
                      <th scope="col" class="py-3 px-6"></th>
                      <th scope="col" class="py-3 px-3"></th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($kontrak as $kontra)    
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <td class="py-4 px-6">{{ $loop->iteration }}</td>
                      <td class="py-4 px-6">{{ $kontra->no_kontrak }}</td>
                      <td class="py-4 px-6"></td>
                      <td class="py-4 px-6"><button @click="showModal = true"><x-gmdi-info class="w-6"/></button></td>
                  </tr>
                  @endforeach
                  </tbody>
              </table>
              </div>
          </div> --}}
          @if (count($kontrak) > 3)   
          <div class="flex flex-1 justify-center mt-2">
            <ul class="inline-flex -space-x-px text-sm">
              <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
              </li>
              <li>
                <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">1</a>
              </li>
              <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
              </li>
              <li>
                <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">3</a>
              </li>
              <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
              </li>
            </ul>
          </div>
          @endif
          <div class="hs-accordion-group">
            @foreach ($kontrak as $kontra)
            <div class="hs-accordion" id="hs-basic-with-title-and-arrow-stretched-heading-{{ $loop->iteration }}">
              <button class="hs-accordion-toggle hs-accordion-active:text-blue-600 py-3 inline-flex items-center justify-between gap-x-3 w-full font-semibold text-start text-gray-800 hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:text-blue-500 dark:text-gray-200 dark:hover:text-gray-400 dark:focus:outline-none dark:focus:text-gray-400" aria-controls="hs-basic-with-title-and-arrow-stretched-collapse-{{ $loop->iteration }}">
                {{ $loop->iteration }}. {{ $kontra->no_kontrak }}
                <svg class="hs-accordion-active:hidden block w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                <svg class="hs-accordion-active:block hidden w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
              </button>
              <div id="hs-basic-with-title-and-arrow-stretched-collapse-{{ $loop->iteration }}" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" aria-labelledby="hs-basic-with-title-and-arrow-stretched-heading-{{ $loop->iteration }}">
                <div class="flex flex-col">
  <div class="-m-1.5 overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">No</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tanggal Mulai</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tanggal Selesai</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Lama Cuti</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
          @if (count(Kontrak::find($kontra->no_kontrak)->cuti))
            @foreach ((Kontrak::find($kontra->no_kontrak)->cuti) as $cut)     
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $loop->iteration }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ Carbon::parse($cut->tanggal_mulai)->translatedFormat('j F Y') }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ Carbon::parse($cut->tanggal_selesai)->translatedFormat('j F Y') }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">{{ Carbon::parse($cut->tanggal_mulai)
                ->diffInDays(Carbon::parse($cut->tanggal_selesai))+1 }} Hari </td>
            </tr>
            @endforeach
          </tbody>
          @else 
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"></td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"></td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">Data tidak ditemukan</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"></td></tr>
              
          @endif
        </table>
      </div>
    </div>
  </div>
</div>
              </div>
            </div>  
            @endforeach
          </div>
      </div>
  </div>
  </div>


@endsection