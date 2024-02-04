<?php
use Carbon\Carbon;
Carbon::setLocale('id');
?>
@extends('dashboard.pegawai.layouts.main')

@section('container')
<div class=" bg-zinc-100 h-screen w-5/6">
    <div class="grid grid-cols-1 gap-5 mt-1 p-4 ">
        <div class="bg-white p-4 rounded-md col-span-3 pl-8 shadow-xl">
            <div class="m20 grid grid-cols-2">
                <div class="">
                    <h1 class="font-bold text-5xl mb-3">Pengajuan Cuti</h1>
                    <h2 class="font-extralight">Masukkan tanggal Cuti dan <br/> upload surat cuti dalam format pdf</h2>
                    <p class="mt-9 mb-6">Riwayat</p>
                    @if (count($cuti)>0)
                    <div class="ms-4 font-extralight">
                        <ul class="list-disc">
                            @foreach ($cuti as $cuti)
                                @foreach ($cuti->tanggalCuti as $cuti_satuan)
                                <li class="list-decimal">{{ Carbon::parse($cuti_satuan->tanggal_cuti)->translatedFormat('j F Y') }} <span class="mx-1">
                                @endforeach
                            @endforeach
                        </ul>
                    </div>

                    @else
                    <h1>Cuti Tidak ditemukan</h1>
                    @endif
                    <div class="mt-9 font-extralight">
                        @if ($cuti)
                        <p>Cuti Terpakai <span class="mx-3">:</span>{{ $durasi }} Hari </p>
                        <p>Cuti Tersedia <span class="mx-3">:</span>{{
                        $kontrak->jumlah_bulan - $durasi
                        }} Hari </p>
                        @else
                        <p>Cuti Terpakai <span class="mx-3">:</span> 0 Hari </p>
                        <p>Cuti Tersedia <span class="mx-3">:</span> 0 Hari </p>
                        @endif
                    </div>
                </div>
                <livewire:create-cuti :kontrak="$kontrak" />
            </div>
    </div>
</div>

@error('addError')
{{ $message }}
@enderror

@endsection
