<?php
use Carbon\Carbon;
Carbon::setLocale('id');
?>
@extends('dashboard.pegawai.layouts.main')

@section('container')
  <div class=" bg-zinc-100 h-screen ms-60 w-5/6">
          <!-- Card Section -->
          <div class="max-w-6xl  py-1 my-5 mx-auto">
              <!-- Card -->
              <div class="bg-white  rounded-xl shadow p-16 dark:bg-slate-900">
                  <div class="mb-8">
                      <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                          Profile
                      </h2>
                  </div>

                  <form action="{{route('update-password')}}" method="post">
                      @csrf
                      <!-- Grid -->
                      <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
                          <div class="sm:col-span-3">
                              <label for="af-account-full-name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                                  Nama
                              </label>
                          </div>
                          <div class="sm:col-span-9">
                              <div class="sm:flex">
                                  <input id="af-account-full-name" type="text" disabled class="py-2 border px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px rounded-lg sm:mt-0 sm:first:ms-0 text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-100 disabled:pointer-events-none" placeholder="{{auth()->user()->nama}}">
                              </div>
                          </div>

                          <div class="sm:col-span-3">
                              <label for="af-account-full-name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                                  NIK
                              </label>
                          </div>

                          <div class="sm:col-span-9">
                              <div class="sm:flex">
                                  <input id="af-account-full-name" type="text" disabled class="py-2 border px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px rounded-lg sm:mt-0 sm:first:ms-0 text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-100 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="{{auth()->user()->nik}}">
                              </div>
                          </div>
                          <div class="sm:col-span-3">
                              <label for="af-account-full-name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                                  Jabatan
                              </label>
                          </div>
                          <div class="sm:col-span-9">
                              <div class="sm:flex">
                                  <input id="af-account-full-name" disabled type="text" class="py-2 border px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px rounded-lg sm:mt-0 sm:first:ms-0 text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-100 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="{{auth()->user()->jabatan}}">
                              </div>
                          </div>

                          <div class="sm:col-span-3">
                              <label for="af-account-full-name" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                                  Tanggal Masuk
                              </label>
                          </div>
                          <div class="sm:col-span-9">
                              <div class="sm:flex">
                                  <input id="af-account-full-name" disabled type="text" class="py-2 border px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px rounded-lg sm:mt-0 sm:first:ms-0 text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-100 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="{{Carbon::parse(auth()->user()->tanggal_masuk)->translatedFormat('j F Y')}}">
                              </div>
                          </div>


                          <div class="sm:col-span-3">
                              <label for="af-account-password" class="inline-block text-sm text-gray-800 mt-2.5 dark:text-gray-200">
                                  Password
                              </label>
                          </div>
                          <!-- End Col -->

                          <div class="sm:col-span-9">
                              <div class="space-y-2">
                                  <input id="oldPasswordInput" name="old_password" type="password" class="py-2 border px-3 pe-11 block w-full {{$errors->has('old_password') ? 'border-red-500' : 'border-gray-200' }}  shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="Masukkan password lama" aria-describedby="hs-validation-pass1">
                                  @if($errors->has('old_password'))
                                      <p class="text-sm text-red-600 mt-2" id="hs-validation-pass1">{{$errors->first('old_password')}}</p>
                                  @endif
                                  <input id="newPasswordInput" name="new_password" type="password" class="py-2 border px-3 pe-11 block w-full {{$errors->has('new_password') ? 'border-red-500' : 'border-gray-200' }} shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="Masukkan password baru" aria-describedby="hs-validation-pass2">
                                  @if($errors->has('new_password'))
                                      <p class="text-sm text-red-600 mt-2" id="hs-validation-pass2">{{$errors->first('new_password')}}</p>
                                  @endif
                              </div>
                          </div>
                      </div>
                      <!-- End Grid -->

                      <div class="mt-5 flex justify-end gap-x-2">
                          <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                              Save
                          </button>
                      </div>
                  </form>
                  {{session('errors')}}

              </div>
              <!-- End Card -->
          </div>
          <!-- End Card Section -->
      </div>
@endsection
