@extends('dashboard.pegawai.layouts.main')

@section('container')
<div class=" bg-zinc-100 w-5/6 " x-data="{ showModal: false, email: '' }">
    <div x-show="showModal" class="fixed inset-0 transition-opacity z-10" aria-hidden="true" @click="showModal = false">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
    <div class="grid grid-cols-4 gap-4 p-4 ">
        <div class="bg-white p-4 rounded-md col-span-3 pl-8 shadow-xl">
            <h2 class="mt-4 text-5xl font-bold pb-4">Nama Lengkap</h2>
            <h2 class="text-3xl font-light pb-10">NIP</h2>
    </div>
    <div class="bg-white p-4 col-span-1 rounded-md shadow-xl">
        <div style="width: 80%; margin: auto;">
            <canvas id="doughnutChart"></canvas>
        </div>
        <h1 class="font-bold text-2xl mt-3">3/12</h1>
        <h2 class="text-gray-600 text-sm font-semibold ">Cuti tersisa</h2>
    </div>
    <div class="bg-white p-4 rounded-md col-start-1 col-end-5 shadow-xl" >
      <div class=" items-center justify-center w-full">
          <div class="overflow-x-auto shadow-md sm:rounded-lg">
              <div class="overflow-x-auto shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="py-3 px-6">No</th>
                      <th scope="col" class="py-3 px-6">Nomor Kontrak</th>
                      <th scope="col" class="py-3 px-6"></th>
                      <th scope="col" class="py-3 px-3"></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <td class="py-4 px-6">1</td>
                      <td class="py-4 px-6">XXXX-XXXX-XXXX-XXXX</td>
                      <td class="py-4 px-6"></td>
                      <td class="py-4 px-6"><button @click="showModal = true"><x-gmdi-info class="w-6"/></button></td>
                  </tr>
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <td class="py-4 px-6">2</td>
                      <td class="py-4 px-6">XXXX-XXXX-XXXX-XXXX</td>
                      <th class="py-4 px-6"></th>
                      <th class="py-4 px-6"><x-gmdi-info class="w-6"/></th>
                  </tr>
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <td class="py-4 px-6">3</td>
                      <td class="py-4 px-6">XXXX-XXXX-XXXX-XXXX</td>
                      <th class="py-4 px-6"></th>
                      <th class="py-4 px-6"><x-gmdi-info class="w-6"/></th>
                  </tr>
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6">4</td>
                    <td class="py-4 px-6">XXXX-XXXX-XXXX-XXXX</td>
                    <th class="py-4 px-6"></th>
                    <th class="py-4 px-6"><x-gmdi-info class="w-6"/></th>
                </tr>
                  </tbody>
              </table>
              </div>
          </div>
          <div class="flex flex-1 justify-center mt-2">
            <ul class="inline-flex -space-x-px text-sm">
              <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
              </li>
              <li>
                <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">1</a>
              </li>
              <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
              </li>
              <li>
                <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">3</a>
              </li>
              <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
              </li>
            </ul>
          </div>
      </div>
  </div>
  </div>

<div x-show="showModal" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="fixed z-10 inset-0 overflow-y-auto" x-cloak>
    <div class="flex items-end pt-4 text-center sm:block ">
      <!-- Modal panel -->
      <div class="w-full inline-block align-bottom bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-6xl sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <!-- Modal content -->
          <div class="sm:flex sm:items-start">
            <div class="w-full mt-3 text-center sm:mt-0 sm:mx-4 sm:text-left">
              <h3 class="text-xl leading-6 font-medium text-gray-900" id="modal-headline"> Kontrak </h3>
              <div class="mt-2">
                <p class="text-base text-gray-900"> NIP </p>
                <p class="text-sm text-gray-500">00000000</p>
              </div>
              <div class="mt-2">
                <p class="text-base text-gray-900"> Nomor Kontrak </p>
                <p class="text-sm text-gray-500">XXXX-XXXX-XXXX-XXXX</p>
              </div>
              <div class="mt-4">
                <table class="w-full">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-2">No</th>
                        <th scope="col" class="py-3 px-4">Nomor Surat</th>
                        <th scope="col" class="py-3 px-4">Tanggal Mulai</th>
                        <th scope="col" class="py-3 px-4">Tanggal Selesai</th>
                        <th scope="col" class="py-3 px-3">Lama Cuti</th>
                        <th scope="col" class="py-3 px-3">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                <tr class="bg-white border-b ">
                    <td class="py-4 px-2">1</td>
                    <td class="py-4 px-4">XXXX-XXXX-XXXX-XXXX</td>
                    <td class="py-4 px-4">30 Desember 2023</td>
                    <td class="py-4 px-4">31 Desember</td>
                    <td class="py-4 px-3">1 Hari</td>
                    <td class="py-4 px-3 font-bold text-[#10b981] flex gap-1 text-sm align-middle"><x-gmdi-check-tt class="w-5"/>Diverifikasi</td>
                </tr>
                <tr class="bg-white border-b">
                    <td class="py-4 px-2">2</td>
                    <td class="py-4 px-4">XXXX-XXXX-XXXX-XXXX</td>
                    <td class="py-4 px-4">2 Februari 2024</td>
                    <td class="py-4 px-4">2 Februari 2024</td>
                    <td class="py-4 px-3">1 Hari</td>
                    <td class="py-4 px-3 font-bold text-[#10b981] flex gap-1 text-sm align-middle"><x-gmdi-check-tt class="w-5"/>Diverifikasi</td>
                </tr>
                <tr class="bg-white border-b">
                  <td class="py-4 px-2">3</td>
                  <td class="py-4 px-4">XXXX-XXXX-XXXX-XXXX</td>
                  <td class="py-4 px-4">2 Februari 2024</td>
                  <td class="py-4 px-4">2 Februari 2024</td>
                  <td class="py-4 px-3">1 Hari</td>
                  <td class="py-4 px-3 font-bold text-[#10b981] flex gap-1 text-sm align-middle"><x-gmdi-check-tt class="w-5"/>Diverifikasi</td>
              </tr>
              <tr class="bg-white border-b">
                <td class="py-4 px-2">4</td>
                <td class="py-4 px-4">XXXX-XXXX-XXXX-XXXX</td>
                <td class="py-4 px-4">2 Februari 2024</td>
                <td class="py-4 px-4">2 Februari 2024</td>
                <td class="py-4 px-3">1 Hari</td>
                <td class="py-4 px-3 font-bold text-[#10b981] flex gap-1 text-sm align-middle"><x-gmdi-check-tt class="w-5"/>Diverifikasi</td>
            </tr>
            <tr class="bg-white border-b">
              <td class="py-4 px-2">5</td>
              <td class="py-4 px-4">XXXX-XXXX-XXXX-XXXX</td>
              <td class="py-4 px-4">2 Februari 2024</td>
              <td class="py-4 px-4">2 Februari 2024</td>
              <td class="py-4 px-3">1 Hari</td>
              <td class="py-4 px-3 font-bold text-[#10b981] flex gap-1 text-sm align-middle"><x-gmdi-check-tt class="w-5"/>Diverifikasi</td>
          </tr>
                </tbody>
                </table>
                <div class="flex flex-1 justify-center mt-3">
                  <ul class="inline-flex -space-x-px text-sm">
                    <li>
                      <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                    </li>
                    <li>
                      <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">1</a>
                    </li>
                    <li>
                      <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                      <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">3</a>
                    </li>
                    <li>
                      <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <!-- Subscribe button -->
          <button @click="showModal = false" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"> Tutup </button>
          <!-- Cancel button -->
        </div>
      </div>
    </div>
  </div>

</div>


@endsection