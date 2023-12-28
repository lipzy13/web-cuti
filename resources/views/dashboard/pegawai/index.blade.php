@extends('dashboard.layouts.main')

@section('container')
<div class=" bg-zinc-100 h-screen w-screen fixed" x-data="{ showModal: false, email: '' }">
    <div x-show="showModal" class="fixed inset-0 transition-opacity" aria-hidden="true" @click="showModal = false">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
    <div class="grid grid-cols-5 gap-5 mt-2 p-4 ml-8 ">
        <div class="bg-white p-4 rounded-md col-span-3 pl-8 shadow-xl">
            <h2 class="mt-4 text-5xl font-bold pb-4">Nama Lengkap</h2>
            <h2 class="text-3xl font-light pb-10">NIP</h2>
    </div>
    <div class="bg-white p-4 rounded-md mr-4 shadow-lg">
        <div style="width: 80%; margin: auto;">
            <canvas id="doughnutChart"></canvas>
        </div>
        <h1 class="font-bold text-2xl ">3/12</h1>
        <h2 class="text-gray-600 text-sm font-semibold pb-4">Cuti tersisa</h2>
    </div>
</div>
<div class="grid grid-cols-1 bg-white w-3/4 p-4 rounded-md ml-12 h-[400px] shadow-xl" >
    <div class=" items-center justify-center min-h-[450px] mt-4">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
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
                    <td class="py-4 px-6"><button @click="showModal = true"><x-gmdi-keyboard-arrow-down class="w-6"/></button></td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6">2</td>
                    <td class="py-4 px-6">XXXX-XXXX-XXXX-XXXX</td>
                    <th class="py-4 px-6"></th>
                    <th class="py-4 px-6"><x-gmdi-keyboard-arrow-down class="w-6"/></th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6">3</td>
                    <td class="py-4 px-6">XXXX-XXXX-XXXX-XXXX</td>
                    <th class="py-4 px-6"></th>
                    <th class="py-4 px-6"><x-gmdi-keyboard-arrow-down class="w-6"/></th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6">4</td>
                    <td class="py-4 px-6">XXXX-XXXX-XXXX-XXXX</td>
                    <th class="py-4 px-6"></th>
                    <th class="py-4 px-6"><x-gmdi-keyboard-arrow-down class="w-6"/></th>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6">5</td>
                    <td class="py-4 px-6">XXXX-XXXX-XXXX-XXXX</td>
                    <th class="py-4 px-6"></th>
                    <th class="py-4 px-6"><x-gmdi-keyboard-arrow-down class="w-6"/></th>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
    
    </div>
</div>

<div x-show="showModal" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="fixed z-10 inset-0 overflow-y-auto" x-cloak>
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!-- Modal panel -->
      <div class="w-full inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <!-- Modal content -->
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
              <!-- Icon for newsletter -->
              <svg width="64px" height="64px" viewBox="0 0 24 24" class="h-6 w-6 text-blue-600" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#2563eb" stroke-width="0.36"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="style=doutone"> <g id="email"> <path id="vector (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M3.88534 5.2371C3.20538 5.86848 2.75 6.89295 2.75 8.5V15.5C2.75 17.107 3.20538 18.1315 3.88534 18.7629C4.57535 19.4036 5.61497 19.75 7 19.75H17C18.385 19.75 19.4246 19.4036 20.1147 18.7629C20.7946 18.1315 21.25 17.107 21.25 15.5V8.5C21.25 6.89295 20.7946 5.86848 20.1147 5.2371C19.4246 4.59637 18.385 4.25 17 4.25H7C5.61497 4.25 4.57535 4.59637 3.88534 5.2371ZM2.86466 4.1379C3.92465 3.15363 5.38503 2.75 7 2.75H17C18.615 2.75 20.0754 3.15363 21.1353 4.1379C22.2054 5.13152 22.75 6.60705 22.75 8.5V15.5C22.75 17.393 22.2054 18.8685 21.1353 19.8621C20.0754 20.8464 18.615 21.25 17 21.25H7C5.38503 21.25 3.92465 20.8464 2.86466 19.8621C1.79462 18.8685 1.25 17.393 1.25 15.5V8.5C1.25 6.60705 1.79462 5.13152 2.86466 4.1379Z" fill="#2563eb"></path> <path id="vector (Stroke)_2" fill-rule="evenodd" clip-rule="evenodd" d="M19.3633 7.31026C19.6166 7.63802 19.5562 8.10904 19.2285 8.3623L13.6814 12.6486C12.691 13.4138 11.3089 13.4138 10.3185 12.6486L4.77144 8.3623C4.44367 8.10904 4.38328 7.63802 4.63655 7.31026C4.88982 6.98249 5.36083 6.9221 5.6886 7.17537L11.2356 11.4616C11.6858 11.8095 12.3141 11.8095 12.7642 11.4616L18.3113 7.17537C18.6391 6.9221 19.1101 6.98249 19.3633 7.31026Z" fill="#2563eb"></path> </g> </g> </g></svg>
            </div>
            <div class="w-full mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline"> Subscribe to Newsletter </h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500"> Enter your email to subscribe to our newsletter. </p>
                <!-- Email input -->
                <input type="email" x-model="email" class="mt-2 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring focus:border-blue-500" placeholder="name@example.com">
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <!-- Subscribe button -->
          <button @click="subscribeToNewsletter" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"> Subscribe </button>
          <!-- Cancel button -->
          <button @click="showModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"> Cancel </button>
        </div>
      </div>
    </div>
  </div>

</div>


@endsection