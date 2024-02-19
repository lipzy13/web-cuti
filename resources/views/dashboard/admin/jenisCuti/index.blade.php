<?php
use Carbon\Carbon;
Carbon::setLocale('id');
use App\Models\Kontrak;
?>
@extends('dashboard.admin.layouts.main')
@section('container')
    <div class="bg-zinc-100 ms-60 w-full h-screen">
        <div class="bg-white p-2 shadow-xl rounded-md m-8">
           <div class="m-5">
               <h1 class="font-extrabold text-2xl my-3">Jenis Cuti Khusus</h1>
               <div class="w-1/4 my-4">
                   <button type="button" class="group flex text-left flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-sign-out-alert">
                       <div class="p-2 md:p-4">
                           <div class="flex justify-between items-center">
                               <div>
                                   <h3 class="group-hover:text-blue-600 text-sm font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                       Tambah jenis
                                   </h3>
                                   <p class="text-xs text-gray-500">
                                       Tambahkan jenis cuti khusus
                                   </p>
                               </div>
                               <div class="ps-3">
                                   <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                               </div>
                           </div>
                       </div>
                   </button>
               </div>

               <div class="flex flex-col">
                   <div class="-m-1.5 overflow-x-auto">
                       <div class="p-1.5 min-w-full inline-block align-middle">
                           <div class="overflow-hidden">
                                   <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                       <thead>
                                       <tr>
                                           <th scope="col" class="px-1 py-3 text-start text-xs font-medium text-gray-500 uppercase">No</th>
                                           <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Jenis</th>
                                           <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Lama hari</th>
                                       </tr>
                                       </thead>
                                       <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                       @forelse(\App\Models\jenisCuti::all() as $cuti)
                                       <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                           <td class="px-1 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{$loop->iteration}}</td>
                                           <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$cuti->nama_cuti}}</td>
                                           <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$cuti->jumlah_hari}}</td>
                                           <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex flex-row-reverse gap-x-2">
                                               <x-cuti-khusus :cuti="$cuti" ></x-cuti-khusus>
                                               <form action="/admin/cuti-khusus/{{ $cuti->id }}" method="post" >
                                                   @method('DELETE')
                                                   @csrf
                                                   <button type="submit"  onclick="return confirm('Yakin Ingin Menghapus Data?')"  class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Hapus</button>
                                               </form>
                                               <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none"  data-hs-overlay="#hs-{{ $cuti->id }}">Edit</button>
                                           </td>
                                       </tr>
                                       @empty
                                           <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                               <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"></td>
                                               <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex flex-row-reverse gap-x-2"></td>
                                               <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">Cuti khusus tidak ditemukan</td>
                                               <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex flex-row-reverse gap-x-2"></td>
                                           </tr>
                                       @endforelse
                                       </tbody>
                                   </table>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </div>
    <div id="hs-sign-out-alert" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-gray-800">
                <div class="absolute top-2 end-2">
                    <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-sign-out-alert">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                    </button>
                </div>

                <div class="p-4 sm:p-10 text-center overflow-y-auto">

                    <h3 class="mb-2 text-2xl font-bold text-gray-800 dark:text-gray-200">
                        Tambah Jenis Cuti Khusus
                    </h3>
                    <form class="text-left space-y-4" method="post" action="{{route('cuti-khusus.store')}}">
                        @csrf
                        <div>
                            <label for="nama_cuti" class="block text-sm font-medium mb-2 dark:text-white">Jenis</label>
                            <input type="text" id="nama_cuti" name="nama_cuti" class="py-3 px-4 border block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 " placeholder="Jenis Cuti Khusus">
                        </div>
                        <div>
                            <div class="flex align-middle">
                            <label for="jumlah_hari" class="block text-sm font-medium mb-2 dark:text-white me-2">Lama hari</label>
                                <div class="hs-tooltip inline-block">
                                    <button type="button" class="hs-tooltip-toggle size-5 inline-flex justify-center items-center ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                            <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286m1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94"/>
                                        </svg>
                                        <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-slate-700" role="tooltip">
                                          Satuan dalam hari kerja
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <input type="number" id="jumlah_hari" name="jumlah_hari" class="py-3 px-4 border  block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Lama Hari">
                        </div>

                    <div class="mt-6 flex justify-center gap-x-4">
                        <button class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none" type="submit">
                            Tambah
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
