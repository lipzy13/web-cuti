<?php
    use App\Models\Kontrak;
?>

<div id="sideNav" class=" bg-[#FAFAFA] w-1/6 rounded-none border-none">
    <h1 class="text-4xl font-bold ps-7 pt-20">Dash<br/>board</h1>
    <div class="p-4 mt-4">
        <a href="/dashboard" aria-label="dashboard"
            class="relative px-4 py-3 flex items-center space-x-4 {{ request()->is('dashboard') ? 'text-gray-950' : 'text-gray-500' }} ">
            <x-gmdi-home class="w-6"/>
            <span class="-mr-1 font-medium">Beranda</span>
        </a>
        @if( Kontrak::where('user_id', auth()->user()->id)->where('aktif', true)->first() )
        <a href="/dashboard/create" class="px-4 py-0.5 my-4 flex items-center space-x-4 {{ request()->is('dashboard/create') ? 'text-gray-950' : 'text-gray-500' }} group">
            <x-gmdi-date-range class="w-6"/>
            <span>Pengajuan</span>
        </a>
        @else
        <button class="px-4 py-0.5 my-4 flex items-center space-x-4 group text-gray-500" data-hs-overlay="#hs-task-created-alert">
            <x-gmdi-date-range class="w-6"/>
            <span>Pengajuan</span>
        </button>
        <div id="hs-task-created-alert" class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
              <div class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-gray-800">
                <div class="absolute top-2 end-2">
                  <button type="button" class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-task-created-alert">
                    <span class="sr-only">Close</span>
                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                  </button>
                </div>

                <div class="p-4 sm:p-10 text-center overflow-y-auto">
                  <!-- Icon -->
                  <span class="mb-4 flex-shrink-0 inline-flex justify-center items-center w-[46px] h-[46px] sm:w-[62px] sm:h-[62px] rounded-full border-4 border-red-50 bg-red-100 text-red-500 dark:bg-red-700 dark:border-red-600 dark:text-red-100">
                    <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                  </span>
                  <!-- End Icon -->

                  <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-gray-200">
                    Tidak ada kontrak aktif!
                  </h3>
                  <p class="text-gray-500">
                    Kontrak aktif tidak ditemukan. Silahkan hubungi administrator untuk membuat kontrak aktif
                  </p>

                  <div class="mt-6 flex justify-center gap-x-4">
                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-task-created-alert">
                      Tutup
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endif
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="px-4 py-0.5 mt-64 flex items-center space-x-4  text-gray-500 group">
                Logout </button>
        </form>
    </div>
</div>
