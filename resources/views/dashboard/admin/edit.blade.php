<?php
use App\Models\Kontrak;
?>
@extends('dashboard.admin.layouts.main')
@section('container')
<div class=" bg-zinc-100 ms-60 w-full h-screen">
<div class="bg-white p-2 shadow-xl rounded-md m-8 ">
<h1 class="text-2xl font-bold m-5">Data Pegawai</h1>
<div class="grid grid-cols-2 gap-3 m-3">
  <div class="">
    <form method="post" action="{{route('admin.update', $pegawai->id)}}">
      @method('put')
      @csrf
      <div class="relative">
        <input type="text" id="nama" name="nama" class="peer p-4 block w-full bg-gray-100 border-transparent rounded-lg text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-transparent dark:text-gray-400 dark:focus:ring-gray-600
        focus:pt-6
        focus:pb-2
        [&:not(:placeholder-shown)]:pt-6
        [&:not(:placeholder-shown)]:pb-2
        autofill:pt-6
        autofill:pb-2" placeholder="Nama"  value="{{ old('nama', $pegawai->nama) }}">
        <label for="nama" class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
          peer-focus:text-xs
          peer-focus:-translate-y-1.5
          peer-focus:text-gray-500
          peer-[:not(:placeholder-shown)]:text-xs
          peer-[:not(:placeholder-shown)]:-translate-y-1.5
          peer-[:not(:placeholder-shown)]:text-gray-500">Nama</label>
      </div>
    <div class="relative my-4">
        <input type="number" id="nik" name="nik" class="peer p-4 block w-full bg-gray-100 border-transparent rounded-lg text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-transparent dark:text-gray-400 dark:focus:ring-gray-600
        focus:pt-6
        focus:pb-2
        [&:not(:placeholder-shown)]:pt-6
        [&:not(:placeholder-shown)]:pb-2
        autofill:pt-6
        autofill:pb-2" placeholder="nik" value="{{ old('nik', $pegawai->nik) }}">
        <label for="nik" class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
          peer-focus:text-xs
          peer-focus:-translate-y-1.5
          peer-focus:text-gray-500
          peer-[:not(:placeholder-shown)]:text-xs
          peer-[:not(:placeholder-shown)]:-translate-y-1.5
          peer-[:not(:placeholder-shown)]:text-gray-500">NIP</label>
        @error('nik')
        <p class="text-sm text-red-600 mt-2" id="hs-validation-name-error-helper">{{$errors->first()}}</p>
        @enderror


      </div>
        <div class="relative my-4">
            <input type="text" id="jabatan" name="jabatan" class="peer p-4 block w-full bg-gray-100 border-transparent rounded-lg text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-transparent dark:text-gray-400 dark:focus:ring-gray-600
        focus:pt-6
        focus:pb-2
        [&:not(:placeholder-shown)]:pt-6
        [&:not(:placeholder-shown)]:pb-2
        autofill:pt-6
        autofill:pb-2" placeholder="Jabatan" value="{{ old('jabatan', $pegawai->jabatan) }}">
            <label for="jabatan" class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
          peer-focus:text-xs
          peer-focus:-translate-y-1.5
          peer-focus:text-gray-500
          peer-[:not(:placeholder-shown)]:text-xs
          peer-[:not(:placeholder-shown)]:-translate-y-1.5
          peer-[:not(:placeholder-shown)]:text-gray-500">Jabatan</label>

        </div>
        <div class="relative my-4">
            <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="peer p-4 block w-full bg-gray-100 border-transparent rounded-lg text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:border-transparent dark:text-gray-400 dark:focus:ring-gray-600
        focus:pt-6
        focus:pb-2
        [&:not(:placeholder-shown)]:pt-6
        [&:not(:placeholder-shown)]:pb-2
        autofill:pt-6
        autofill:pb-2" placeholder="tanggal masuk" value="{{ old('tanggal_masuk', $pegawai->tanggal_masuk) }}">
            <label for="tanggal_masuk" class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
          peer-focus:text-xs
          peer-focus:-translate-y-1.5
          peer-focus:text-gray-500
          peer-[:not(:placeholder-shown)]:text-xs
          peer-[:not(:placeholder-shown)]:-translate-y-1.5
          peer-[:not(:placeholder-shown)]:text-gray-500">Tanggal Masuk</label>

        </div>
      <button type="submit" class="h-12 px-10 text-sm font-medium rounded-lg border border-gray-200 text-white bg-emerald-500 shadow-sm hover:bg-emerald-600 disabled:opacity-50 disabled:pointer-events-none text-bold ">
        Submit
        </button>
      </form>

    </div>
    <div class="mx-auto text-center">
        <form method="post", action="{{route('changePass', $pegawai)}}">
            @method('PUT')
        <p class="mb-2">Tombol dibawah digunakan untuk me-reset password menjadi (<span class="font-bold">pass</span>)</p>
        <button type="button" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            Reset Password
        </button>
        </form>
    </div>
</div>

<div class="flex flex-col">
  <div class="-m-1.5 overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">No</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Nomor Kontrak</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Status Kontrak</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"></th>
                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"></th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($data->kontrak as $kontrak )
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $loop->iteration }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $kontrak->no_kontrak }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $kontrak->aktif ? 'Aktif' : 'Non Aktif' }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                    <p>Cuti Terpakai : {{$kontrak->jumlah_cuti}}</p>
                    <p>Cuti Tersisa :{{$kontrak->sisa_cuti}} </p>
                    <p>Jumlah Bulan : {{$kontrak->jumlah_bulan}}</p>
                </td>
              <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                <livewire:modal :kontrak="$kontrak"/>
                <x-modalCuti :kontrak="$kontrak"></x-modalCuti>
                <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-cuti{{ $kontrak->id }}">Cuti</button>
                <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-{{ $kontrak->id }}">Edit</button>
                  <form action="/deleteKontrak/{{ $kontrak->id }}" method="post" class="inline-flex">
                      @csrf
                      @method('DELETE')
                      <button onclick="return confirm('Yakin Ingin Menghapus Kontrak?')" type="submit" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" >
                          Delete
                      </button>
                  </form>
              </td>
            </tr>
            @endforeach
          </tbody>
          <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"></td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">Tambah Kontrak</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"></td>
            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
              <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-slide-down-animation-modal">Tambah</button>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<livewire:create-kontrak :pegawai="$pegawai"/>
</div>
</div>
@endsection
