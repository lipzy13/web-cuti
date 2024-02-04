<?php
use Carbon\Carbon;
Carbon::setLocale('id');
?>
<div>
    <div id="hs-modal-{{$kontrak->id}}" class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-5xl lg:w-full m-3 lg:mx-auto">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-gray-800 dark:border-gray-700">
                    <div class="absolute top-2 end-2">
                        <button type="button" class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-modal-{{$kontrak->id}}">
                            <span class="sr-only">Close</span>
                            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                        </button>
                    </div>
                    <div class="p-4 sm:p-10">
                        <div class="text-center">
                            <h2 class="block text-2xl font-bold text-gray-800 dark:text-gray-200">Kontrak</h2>
                        </div>

                        <div class="mt-5">
                            <div class="flex justify-between">
                                <div class="text-sm mb-3">
                                    <div class="flex">
                                        <p>Nomor Kontrak </p>
                                        <p>:  {{$kontrak->no_kontrak}}</p>
                                    </div>
                                    <div class="flex">
                                        <p>Tanggal Mulai </p>
                                        <p>: {{Carbon::parse($kontrak->tanggal_mulai)->translatedFormat('j F Y')}}</p>
                                    </div>
                                    <div class="flex">
                                        <p>Tanggal Selesai </p>
                                        <p>: {{Carbon::parse($kontrak->tanggal_selesai)->translatedFormat('j F Y')}}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="flex">
                                        <p>Cuti Terpakai </p>
                                        <p>: {{$kontrak->jumlah_cuti}}</p>
                                    </div>
                                    <div class="flex">
                                        <p>Cuti Tersisa </p>
                                        <p>: {{$kontrak->sisa_cuti}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="py-3 flex items-center text-sm text-gray-800 before:flex-[1_1_0%] before:border-t before:border-gray-200 before:me-6 after:flex-[1_1_0%] after:border-t after:border-gray-200 after:ms-6 dark:text-white dark:before:border-gray-600 dark:after:border-gray-600">List Cuti</div>
                            <div class="flex flex-col">
                                <div class="-m-1.5 overflow-x-auto">
                                    <div class="p-1.5 min-w-full inline-block align-middle">
                                        <div class="overflow-hidden border rounded-lg shadow">
                                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-2 text-start text-xs font-medium text-gray-500 uppercase">No</th>
                                                    <th scope="col" class="px-6 py-2 text-start text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                                                    <th scope="col" class="px-6 py-2 text-start text-xs font-medium text-gray-500 uppercase"></th>
                                                    <th scope="col" class="px-6 py-2 text-end text-xs font-medium text-gray-500 uppercase"></th>
                                                </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                                @forelse($cuti as $kontra)
                                                <tr>
                                                    <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{$loop->iteration}}</td>
                                                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                        <ol>
                                                         @foreach($kontra->tanggalCuti as $tanggal)
                                                             <li>{{Carbon::parse($tanggal->tanggal_cuti)->translatedFormat('j F Y')}}</li>
                                                         @endforeach
                                                        </ol>
                                                    </td>
                                                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    </td>
                                                    <td class="px-6 py-2 whitespace-nowrap text-end text-sm font-medium">
                                                        <livewire:download :cuti="$kontra"/>
                                                    </td>
                                                </tr>
                                                @empty
                                                    <tr class="w-full ">
                                                        <td class="mx-auto px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">Tidak ada Data</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-row-reverse mt-5">
                                    <livewire:download-all :kontrak="$kontrak"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
