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
                    <div class="ms-4 font-extralight">
                        <ol class="list-decimal">
                            <li>99 Bulan 9999 <span class="mx-2">-</span> 99 Bulan 9999  <span class="ms-6">3 Hari</span></li>
                            <li>99 Bulan 9999 <span class="mx-2">-</span> 99 Bulan 9999  <span class="ms-6">3 Hari</span></li>
                            <li>99 Bulan 9999 <span class="mx-2">-</span> 99 Bulan 9999  <span class="ms-6">3 Hari</span></li>
                            <li>99 Bulan 9999 <span class="mx-2">-</span> 99 Bulan 9999  <span class="ms-6">3 Hari</span></li>
                            <li>99 Bulan 9999 <span class="mx-2">-</span> 99 Bulan 9999  <span class="ms-6">3 Hari</span></li>
                            <li>99 Bulan 9999 <span class="mx-2">-</span> 99 Bulan 9999  <span class="ms-6">3 Hari</span></li>
                        </ol>
                    </div>
                    <div class="mt-9 font-extralight">
                        <p>Cuti Terpakai <span class="mx-3">:</span>3 Hari </p>
                        <p>Cuti Tersedia <span class="mx-3">:</span>9 Hari </p>
                    </div>
                </div>
                <div>
                    <form>
                        <label for="no-kontrak" class="text-gray-500 font-medium">Nomor Kontrak</label>
                        <input type="text" name="no-kontrak" id="no-kontrak" class=" 
                         mt-2 mb-5 block w-full border-0 py-1.5  pl-5 pr-20 text-gray-500 bg-gray-300 " disabled
                         placeholder="XXXX-XXXX-XXXX-XXXX">
                        <label for="tanggal-mulai" class="text-gray-500 font-medium">Tanggal Mulai</label>
                        <input type="date" name="tanggal-mulai" id="tanggal-mulai" class=" 
                         mt-2 mb-5 block w-full py-1.5  pl-5 pr-10 text-gray-500 bg-white border border-gray-500 ">
                         <label for="tanggal-selesai" class="text-gray-500 font-medium">Tanggal Selesai</label>
                        <input type="date" name="tanggal-selesai" id="tangga-selesai" class=" 
                         mt-2 mb-5 block w-full py-1.5  pl-5 pr-10 text-gray-500 bg-white border border-gray-500 ">
                         <label for="upload-surat" class="text-gray-500 font-medium">Upload Surat Cuti</label>
                        <input type="file" name="upload-surat" id="upload-surat" class=" 
                         mt-2 mb-5 block w-full rounded-md pr-10 text-gray-500 bg-white border border-gray-300 
                         file:bg-[#EBEDEF] file:p-1.5 file:border-0 file:text-[#374254]">
                         <button type="submit" class="bg-[#d9d9d9] w-full py-3 font-bold rounded-xl">SUBMIT</button>
                    </form>
                </div>
            </div>
    </div>
</div>




@endsection