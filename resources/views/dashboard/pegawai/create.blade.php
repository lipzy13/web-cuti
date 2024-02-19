<?php
use Carbon\Carbon;
Carbon::setLocale('id');
?>
@extends('dashboard.pegawai.layouts.main')

@section('container')
    <div class=" bg-zinc-100 w-full ms-60">
    <div class="mt-1 p-4 ">
        <div class="bg-white p-4 rounded-md col-span-3 shadow-xl">
            <div class="my-5 mx-10 grid grid-cols-2">
                <div class="">
                    <h1 class="font-bold text-5xl mb-3">Pengajuan Cuti</h1>
                    <div class="font-extralight my-5">
                        <p>Tanggal mulai kontrak : {{Carbon::parse($kontrak->tanggal_mulai)->translatedFormat('j F Y')}}</p>
                        <p>Tanggal selesai kontrak :{{Carbon::parse($kontrak->tanggal_selesai)->translatedFormat('j F Y')}}</p>
                    </div>
                    <p class="mt-6 mb-2">Riwayat</p>
                    @if (count($cuti)>0)
                    <div class="ms-4 font-extralight">
                        <ul class="list-disc">
                            @foreach ($cuti as $cut)
                                @foreach ($cut->tanggalCuti->sortBy('tanggal_cuti') as $cuti_satuan)
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
                        $kontrak->sisa_cuti
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
