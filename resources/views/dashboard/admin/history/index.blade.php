<?php
use Carbon\Carbon;
Carbon::setLocale('id');
use App\Models\Kontrak;
?>
@extends('dashboard.admin.layouts.main')
@section('container')
<div class=" bg-zinc-100 ms-60 w-full h-screen ">
    <div class="bg-white p-2 shadow-xl rounded-md m-8">
        <h1 class="my-5 font-bold text-3xl text-center">Data cuti</h1>
        <div class="flex justify-between mx-2">
            <div>
                @php
                    $filters = [
                  '' => 'Semua',
                  'last_months' => 'Bulan Ini',
                  'last_weeks' => 'Minggu Ini',
              ];
                @endphp
                @foreach($filters as $key => $label)
                    <a href="{{ route('semuaCuti', [...request()->query(),'filter'=>$key])}}" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 {{ request('filter') === $key || (request('filter') === null && $key === '') ? 'bg-gray-200' : 'bg-white' }}  text-gray-800 shadow-sm disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        {{$label}}
                    </a>
                @endforeach
            </div>
            <div>
                <x-export-files />
            </div>
        </div>

        <div class="flex flex-col mt-2">
            <div class="-m-1.5 overflow-x-auto">
              <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                  <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead>
                      <tr>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Nama</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">No Kontrak</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tanggal Cuti</th>
                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tanggal Pengajuan</th>
                        <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"></th>
                      </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($cuti as $cut)
                        <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $cut->kontrak->user->nama}}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $cut->no_kontrak }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                            <ul>
                                @foreach ($cut->tanggalCuti as $tanggal)
                                    <li>{{ Carbon::parse($tanggal->tanggal_cuti)->translatedFormat('j F Y')  }}</li>
                                @endforeach
                            </ul>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ Carbon::parse($cut->created_at)->translatedFormat('j F Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                            <div class="flex gap-x-2 place-content-end">
                              <livewire:download :cuti="$cut"/>
                              <livewire:delete-cuti :cuti="$cut"/>
                            </div>
                        </td>
                      </tr>
                        @empty
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">Cuti tidak ditemukan</td>
                            </tr>
                       @endforelse
                    </tbody>
                  </table>
                    <div class="my-4">
                        {{$cuti->links()}}
                    </div>

                </div>
              </div>
            </div>
          </div>
    </div>
</div>

@endsection
