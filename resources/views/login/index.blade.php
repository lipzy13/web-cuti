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
                                NIP
                            </label>
                            <input type="number"
                                class="w-full px-4 py-2 text-sm border rounded-md focus:border-teal-400 focus:outline-none focus:ring-1 focus:ring-teal-600"
                                id="nip" name="nip" required
                                placeholder="000000000" />
                        </div>
                        <div class="mb-6">
                            <label class="block mt-4 text-sm mb-2 text-gray-500">
                                Password
                            </label>
                            <input
                                class="w-full px-4 py-2 text-sm border rounded-md focus:border-teal-400 focus:outline-none focus:ring-1 focus:ring-teal-600"
                                placeholder="Masukkan Password" 
                                name="password" name="password" required
                                type="password" />
                        </div>
                        <button
                            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-teal-400 border border-transparent rounded-lg active:bg-teal-500 hover:bg-teal-500 focus:outline-none focus:shadow-outline-blue shadow-lg"
                            type="submit">
                            Masuk
                        </button>
                    </form>
                        @if(session()->has('loginError'))
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 mt-4 font-bold" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                        </div>
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
