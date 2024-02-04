<div id="hs-{{ $kontrak->id }}" class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
    <div class="hs-overlay-open:mt-2 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto text-left">
        <div class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-gray-800 dark:border-gray-700">
            <div class="absolute top-2 end-2">
                <button type="button" class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-{{ $kontrak->id }}">
                    <span class="sr-only">Close</span>
                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>

            <div class="p-2 sm:p-10 overflow-y-auto">
                <div class="mb-2 text-center">
                    <h3 class=" text-xl font-bold text-gray-800 dark:text-gray-200">
                        Kontrak
                    </h3>
                </div>

                <div class="space-y-4">
                    <div>
                        <label for="nama" class=" block text-sm mb-2">Nama</label>
                        <input type="text" name="nama" id="nama" class="
          py-3 px-4 block w-full border-gray-200 rounded-lg text-sm text-gray-500 bg-gray-300 "
                               value="{{$kontrak->user->nama}}" readonly="readonly">
                    </div>
                    <form wire:submit="save" wire:confirm="Yakin ingin merubah data kontrak?">
                    <div>
                        <label for="no_kontrak" class="block text-sm mb-2 dark:text-white">Nomor Kontrak</label>
                        <div class="relative">
                            <input type="text" id="no_kontrak" name="no_kontrak" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900
                            dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600 border"
                                   required value="{{ $kontrak->no_kontrak }}" wire:model="no_kontrak">
                        </div>
                    </div>
                    <div>
                        <label for="aktif" class="block text-sm mb-2 dark:text-white">Status Kontrak</label>
                        <div class="relative">
                            <select class="border py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm  disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                            wire:model="aktif">
                                <option selected value=1>Aktif</option>
                                <option value=0>Non Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="tanggal_mulai" class="block text-sm mb-2 dark:text-white">Tanggal Mulai</label>
                        <div class="relative">
                            <input type="date" class="
                        py-3 px-4 block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                   value="{{ $kontrak->tanggal_mulai }}"
                            wire:model="tanggal_mulai">
                        </div>
                    </div>
                    <div>
                        <label for="tanggal_selesai" class="block text-sm mb-2 dark:text-white">Tanggal Selesai</label>
                        <div class="relative">
                            <input type="date" class="
                        py-3 px-4 block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                   value="{{ $kontrak->tanggal_selesai }}"
                            wire:model="tanggal_selesai">
                        </div>
                    </div>
                    <div>
                        <label for="jumlah_cuti" class="block text-sm dark:text-white">Jumlah Cuti</label>
                        <div class="relative">
                            <input type="number" class="
                        py-3 px-4 block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                   value="{{ $kontrak->sisa_cuti }}"
                            wire:model="jumlah_cuti">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t dark:bg-gray-800 dark:border-gray-700">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-{{ $kontrak->id }}">
                    Cancel
                </button>
                <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    Submit
                </button>
            </div>
        </form>
        </div>
    </div>
</div>
