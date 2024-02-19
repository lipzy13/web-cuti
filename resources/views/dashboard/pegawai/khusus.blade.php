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
                        <h1 class="font-bold text-5xl mb-3">Pengajuan Cuti <br/>Khusus</h1>
                        <div class="font-extralight my-5">
                            <p>Tanggal mulai kontrak : {{Carbon::parse($kontrak->tanggal_mulai)->translatedFormat('j F Y')}}</p>
                            <p>Tanggal selesai kontrak :{{Carbon::parse($kontrak->tanggal_selesai)->translatedFormat('j F Y')}}</p>
                        </div>
                    </div>
                    <livewire:create-cuti-khusus :kontrak="$kontrak" />
                </div>
            </div>
        </div>

    @error('addError')
    {{ $message }}
    @enderror

@endsection
