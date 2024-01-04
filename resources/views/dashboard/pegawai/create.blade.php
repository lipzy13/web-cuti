<?php
use Carbon\Carbon;
Carbon::setLocale('id');
?>
@extends('dashboard.pegawai.layouts.main')

@section('container')
<div class=" bg-zinc-100 h-screen w-5/6">
    <div class="grid grid-cols-1 gap-5 mt-1 p-4 ">
        <div class="bg-white p-4 rounded-md col-span-3 pl-8 shadow-xl">
            <div class="my-20 mx-20 grid grid-cols-2">
                <div class="">
                    <h1 class="font-bold text-5xl mb-3">Pengajuan Cuti</h1>
                    <h2 class="font-extralight">Masukkan tanggal mulai, tanggal selesai cuti dan <br/> upload surat cuti dalam format pdf</h2>
                    <p class="mt-9 mb-6">Riwayat</p>
                    @if (count($cuti)>0)    
                    <div class="ms-4 font-extralight">
                        <ol class="list-decimal">
                            @foreach ($cuti as $cuti_satuan)
                            <li class="">{{ Carbon::parse($cuti_satuan->tanggal_mulai)->translatedFormat('j F Y') }} <span class="mx-1">
                            -
                            </span> {{ Carbon::parse($cuti_satuan->tanggal_selesai)->translatedFormat('j F Y') }} <span class="mx-1">{{ $cuti_satuan->lama_hari }} Hari</span></li>
                            @endforeach
                        </ol>
                    </div>

                    @else
                    <h1>Cuti Tidak ditemukan</h1>    
                    @endif
                    <div class="mt-9 font-extralight">
                        @if ($cuti)    
                        <p>Cuti Terpakai <span class="mx-3">:</span>{{ $durasi }} Hari </p>
                        <p>Cuti Tersedia <span class="mx-3">:</span>{{ 
                        Carbon::parse($kontrak->tanggal_mulai)->diffInMonths(Carbon::parse($kontrak->tanggal_selesai)) - $durasi
                        }} Hari </p>
                        @else
                        <p>Cuti Terpakai <span class="mx-3">:</span> 0 Hari </p>
                        <p>Cuti Tersedia <span class="mx-3">:</span> 0 Hari </p>     
                        @endif
                    </div>
                </div>
                <div>
                    <form method="post" action="/dashboard">
                        @csrf
                        <label for="no_kontrak" class="text-gray-500 font-medium">Nomor Kontrak</label>
                        <input type="text" name="no_kontrak" id="no_kontrak" class=" 
                         mt-2 mb-5 block w-full border-0 py-1.5  pl-5 pr-20 text-gray-500 bg-gray-300 "
                         value="{{ $kontrak->no_kontrak }}" readonly="readonly">
                        <label for="tanggal_mulai" class="text-gray-500 font-medium">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class=" 
                         mt-2 mb-5 block w-full py-1.5  pl-5 pr-10 text-gray-500 bg-white border border-gray-500 ">
                         <label for="tanggal_selesai" class="text-gray-500 font-medium">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" id="tanggal_selesai" class=" 
                         mt-2 mb-5 block w-full py-1.5  pl-5 pr-10 text-gray-500 bg-white border border-gray-500 ">
                         {{-- <label for="surat" class="text-gray-500 font-medium">Upload Surat Cuti</label>
                        <input type="file" name="upload-surat" id="surat" class=" 
                         mt-2 mb-5 block w-full rounded-md pr-10 text-gray-500 bg-white border border-gray-300 
                         file:bg-[#EBEDEF] file:p-1.5 file:border-0 file:text-[#374254]"> --}}
                         <button type="submit" class="bg-[#d9d9d9] w-full py-3 font-bold rounded-xl">SUBMIT</button>
                    </form>
                    @if(session()->has('submitError'))
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 mt-4 font-bold" role="alert">
                            {{ session('submitError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                        </div>
                        @endif
                </div>
            </div>
    </div>
</div>




@endsection