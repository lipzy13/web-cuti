@extends('dashboard.admin.layouts.main')
@section('container')
<div class=" bg-zinc-100 ms-60 w-full h-screen">
    <div class="bg-white p-2 shadow-xl rounded-md my-2 mx-8">
        <h1 class="text-center font-bold text-2xl mt-4">Tambah Data Pegawai</h1>
        <div class="grid grid-cols-4 gap-3 m-10 divide-x h-full">
            <div class="col-span-2 h-full">
                <form method="post" action="/admin">
                    @csrf
                    <label for="nama" class="text-gray-500 font-medium text-sm">Nama</label>
                        <input type="text" name="nama" id="nama" class="
                         mt-2 mb-5 block w-full py-1.5  pl-5 pr-10 text-gray-500 bg-white border border-gray-500 ">
                    <label for="nik" class="text-gray-500 font-medium text-sm">NIP</label>
                         <input type="number" name="nik" id="nik" class="
                          mt-2 mb-5 block w-full py-1.5  pl-5 pr-10 text-gray-500 bg-white border border-gray-500 ">
                    <label for="tanggal_masuk" class="text-gray-500 font-medium text-sm">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="
                          mt-2 mb-5 block w-full py-1.5  pl-5 pr-10 text-gray-500 bg-white border border-gray-500 ">
                    <label for="jabatan" class="text-gray-500 font-medium text-sm">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan" class="
                          mt-2 mb-5 block w-full py-1.5  pl-5 pr-10 text-gray-500 bg-white border border-gray-500 ">
                    <button type="submit" class="h-12 w-full text-center font-bold rounded-lg border border-gray-200 text-white bg-emerald-500 shadow-sm hover:bg-emerald-600 disabled:opacity-50 disabled:pointer-events-none text-bold ">
                                Submit
                        </button>
                </form>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @break
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-span-2 ps-2 w-full py-36 my-auto h-full">
                <form action="{{ route('importpegawai') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <label for="file" class="text-gray-500 font-medium">Upload file excel berformat xls, template dapat diunduh dengan pada link
                        <span><a href="{{asset('template/template_pegawai.xlsx')}}" class="text-sky-700">berikut</a></span> </label>
                            <input type="file" name="file" class="
                             mt-2 mb-5 block w-full rounded-md pr-10 text-gray-500 bg-white border border-gray-300
                             file:bg-[#EBEDEF] file:p-1.5 file:border-0 file:text-[#374254]" enctype="multipart/form-data">
                    <button type="submit" class="w-full text-center h-12 px-10 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 text-white bg-emerald-500 shadow-sm hover:bg-emerald-600 disabled:opacity-50 disabled:pointer-events-none text-bold ">
                    Tambah Pegawai
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                      </svg>
                  </button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
