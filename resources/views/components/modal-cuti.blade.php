<?php
use Carbon\Carbon;
Carbon::setLocale('id');
?>
<div id="hs-cuti{{ $kontrak->id }}" class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
    <div class="hs-overlay-open:mt-4 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto text-left">
      <div class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-gray-800 dark:border-gray-700">
        <div class="absolute top-2 end-2">
          <button type="button" class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-cuti{{ $kontrak->id }}">
            <span class="sr-only">Close</span>
            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          </button>
        </div>

        <div class="p-4 sm:p-10 overflow-y-auto">
          <div class="mb-6 text-center">
            <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-gray-200">
              Cuti
            </h3>
          </div>

          <div class="space-y-4">
            <div>
                <label for="no_kontrak" class=" block text-sm mb-2">Nomor Kontrak</label>
                <input type="text" name="no_kontrak" id="no_kontrak" class="
                py-3 px-4 block w-full border-gray-200 rounded-lg text-sm text-gray-500 bg-gray-300 "
                readonly="readonly" value="{{ $kontrak->no_kontrak }}">
            </div>
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                  <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                      <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                          <tr>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">No</th>
                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                            <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase"></th>
                          </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($kontrak->cuti as $cuti)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{$loop->iteration}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                    <ul>
                                        @foreach($cuti->tanggalCuti as $tanggal)
                                           <li>{{Carbon::parse($tanggal->tanggal_cuti)->translatedFormat('j F Y')}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"></td>
                                <td class="py-4 whitespace-nowrap text-end text-sm font-medium flex gap-x-2">
                                    <livewire:download :cuti="$cuti"/>
                                    <livewire:delete-cuti :cuti="$cuti"/>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200"></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                    Tidak ada Cuti
                                </td>
                                <td class="py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200"></td>
                                <td class="py-4 whitespace-nowrap text-end text-sm font-medium flex">
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex flex-row-reverse {{count($kontrak->cuti) ? '' : 'hidden'}}">
                  <livewire:download-all :kontrak="$kontrak"/>
              </div>

          </div>
        </div>

        <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t dark:bg-gray-800 dark:border-gray-700">
          <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-cuti{{ $kontrak->id }}">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
