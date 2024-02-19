<div id="hs-slide-down-animation-modal" class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
      <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
        <div class="p-4 sm:p-7">
          <div class="text-center">
            <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Tambah Kontrak</h1>
          </div>

          <div class="mt-5">
            <!-- Form -->
            <form wire:submit="save">
              <div class="grid gap-y-4">
                <!-- Form Group -->
                <div>
                    <label for="nik" class="block text-sm mb-2 dark:text-white">NIP</label>
                    <div class="relative">
                      <input type="text" value={{ $nik }} wire:model="nik" id="nik" name="nik" class="py-3 border px-4 block w-full rounded-lg text-sm border-blue-500ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" disabled >
                    </div>
                  </div>
                <div>
                  <label for="no_kontrak" class="block text-sm mb-2 dark:text-white">Nomor Kontrak</label>
                  <div class="relative">
                    <input type="text" wire:model="no_kontrak" id="no_kontrak" name="no_kontrak" class="py-3 border px-4 block w-full rounded-lg text-sm border-blue-500ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" required aria-describedby="email-error">
                  </div>
                </div>
                <div>
                  <label for="tanggal_mulai" class="block text-sm mb-2 dark:text-white">Tanggal Mulai</label>
                  <div class="relative">
                    <input type="date" wire:model="tanggal_mulai" id="tanggal_mulai" name="tanggal_mulai" class="py-3 border px-4 block w-full rounded-lg text-sm border-blue-500ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" required aria-describedby="email-error">
                  </div>
                </div>
                <div>
                  <label for="tanggal_selesai" class="block text-sm mb-2 dark:text-white">Tanggal Selesai</label>
                  <div class="relative">
                    <input type="date" wire:model="tanggal_selesai" id="tanggal_selesai" name="tanggal_selesai" class="py-3 border px-4 block w-full rounded-lg text-sm border-blue-500ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" required aria-describedby="email-error">
                  </div>
                </div>
                <div>
                    <label for="aktif" class="block text-sm mb-2 dark:text-white">Status</label>
                    <div class="relative">
                        <select required wire:model="aktif" class="py-3 px-4 pe-9 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                            <option >Aktif</option>
                            <option >Tidak Aktif</option>
                          </select>
                    </div>
                  </div>
                <!-- End Form Group -->
                <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Tambah Kontrak</button>
              </div>
            </form>
            <!-- End Form -->
          </div>
        </div>
    </div>
  </div>
</div>
