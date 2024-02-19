<?php
use App\Models\Kontrak;
?>
@extends('dashboard.admin.layouts.main')
@section('container')
<div class=" bg-zinc-100 ms-60 w-full h-screen">
    <div class="bg-white p-2 shadow-xl rounded-md my-12 mx-8">
        <div class="flex white justify-between mx-12 mt-12">
            <div class="">
                <h1 class="font-bold text-2xl">Data Pegawai</h1>
                <div class="mt-2">
                    <div class="flex rounded-lg shadow-sm ">
                      <form action"/admin" method="get" class="flex">
                        <input type="text" name="search" id="hs-trailing-button-add-on-with-icon" name="hs-trailing-button-add-on-with-icon" class="py-3 px-8 block w-80 border-gray-200 shadow-sm rounded-s-lg text-sm focus:z-10 bg-gray-300 focus:border-gray-500 focus:ring-gray-500 disabled:opacity-50 disabled:pointer-events-none"
                        placeholder="Cari nama pegawai" value="{{ request('search') }}">
                        <button type="submit" class="w-[2.875rem] h-[2.875rem] flex-shrink-0 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-gray-100 text-black disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                          <svg class="flex-shrink-0 h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                        </button>
                      </form>
                    </div>
                  </div>
            </div>
            <a href="/admin/create" class="h-12 px-10 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 text-white bg-emerald-500 shadow-sm hover:bg-emerald-600 disabled:opacity-50 disabled:pointer-events-none text-bold ">
                Tambah Pegawai
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                  </svg>
                </a>
        </div>

        <div class="mt-12">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                  <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden mb-2">
                      <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                          <tr>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Nama</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">NIK</th>
                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"></th>
                          </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                          @forelse  ($pegawai as $pega)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $pega->nama }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $pega->nik }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex flex-row-reverse gap-x-2">
                                <form action="/deletePegawai/{{ $pega->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin Ingin Menghapus Pegawai?')" type="submit" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none" >
                                        Hapus
                                    </button>
                                </form>
                              <a href="/admin/{{ $pega->id }}/edit" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Edit</a>
                            </td>
                          </tr>
                          @empty
                              <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"></td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">Data pegawai tidak ditemukan</td>
                                  <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex flex-row-reverse gap-x-2">
                                  </td>
                              </tr>
                          @endforelse
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="m-2">
            {{$pegawai->links()}}
        </div>
    </div>
</div>
@endsection
