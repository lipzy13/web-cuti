@extends('layouts.main')
@section('container')
    <div class="flex items-center min-h-screen bg-gray-50">
    <div class="flex-1 max-w-[1024px] mx-auto bg-white rounded-lg shadow-xl">
        <div class="flex flex-col md:flex-row">
            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                <div class="w-full">
                    <h1 class="mb-8 text-6xl font-semibold text-gray-700">
                        Form Cuti
                    </h1>
                    <form method="post" action="/login">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-sm mb-2 text-gray-500" for="nik">
                                NIK
                            </label>
                            <input type="text"
                                class="w-full px-4 py-2 text-sm border rounded-md focus:border-teal-400
                                focus:outline-none focus:ring-1 focus:ring-teal-600"
                                id="nik" name="nik" required
                                placeholder="Masukkan NIK" />
                        </div>
                        <div class="mb-6">
                            <label class="block mt-4 text-sm mb-2 text-gray-500">
                                Password
                            </label>
                            <input
                                class="w-full px-4 py-2 text-sm border rounded-md focus:border-teal-400
                                focus:outline-none focus:ring-1 focus:ring-teal-600"
                                placeholder="Masukkan Password"
                                name="password" name="password" required
                                type="password" />
                        </div>
                        <button
                            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center
                            text-white transition-colors duration-150 bg-teal-400
                            border border-transparent rounded-lg active:bg-teal-500 hover:bg-teal-500
                            focus:outline-none
                            focus:shadow-outline-blue shadow-lg"
                            type="submit">
                            Masuk
                        </button>
                    </form>
                    @if($errors->any())
                        <div id="hs-task-created-alert" class="hs-overlay open size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
                            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                <div class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-gray-800">
                                    <div class="absolute top-2 end-2">
                                        <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-task-created-alert">
                                            <span class="sr-only">Close</span>
                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                                        </button>
                                    </div>

                                    <div class="p-4 sm:p-10 text-center overflow-y-auto">
                                        <!-- Icon -->
                                        <span class="mb-4 flex-shrink-0 inline-flex justify-center items-center w-[46px] h-[46px] sm:w-[62px] sm:h-[62px] rounded-full border-4 border-red-50 bg-red-100 text-red-500 dark:bg-red-700 dark:border-red-600 dark:text-red-100">
          <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </span>
                                        <!-- End Icon -->

                                        <h3 class="mb-2 text-xl font-bold text-gray-800 dark:text-gray-200">
                                            Gagal!
                                        </h3>
                                        <p class="text-gray-500">
                                            NIK atau Password salah
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
                        <div id="hs-task-created-alert-backdrop" data-hs-overlay-backdrop-template="" style="z-index: 79;" class="transition duration fixed inset-0 bg-gray-900 bg-opacity-50 dark:bg-opacity-80 hs-overlay-backdrop"></div>

                    @endif
                </div>
            </div>
            <div class="h-1/2  md:h-auto md:w-1/2 my-auto bg-teal-400 py-[200px] rounded-r-lg">
                <img class="w-[320px] h-1/2 mx-auto" src="{{ 'images/gambar.svg' }}"
                    alt="img" />
            </div>
        </div>
    </div>
@endsection
