<div class="overscroll-contain">
    <form wire:submit.prevent="save">
        @csrf
        <label for="no_kontrak" class="text-gray-500 font-medium">Nomor Kontrak</label>
        <input type="text" name="no_kontrak" id="no_kontrak" class="
         mt-2 mb-5 block w-full border-0 py-1.5  pl-5 pr-20 text-gray-500 bg-gray-300 "
               readonly="readonly" wire:model="no_kontrak">

        <div class="relative">
            <div class="my-2">
                <label for="hs-select-label" class="block text-sm font-medium mb-2 dark:text-white">Jenis Cuti</label>
                <select wire:model.live="jenis_cuti" id="hs-select-label" class="py-3 px-4 pe-9 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Jenis Cuti</option>
                    @foreach(\App\Models\jenisCuti::all() as $cuti)
                        <option value={{$cuti->id}}>{{$cuti->nama_cuti}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="relative">
            <div class="my-2">
                <label>Lama hari</label>
                <div class="flex rounded-lg shadow-sm">
                    @if($jenis_cuti)
                        <p type="text"  disabled class="
                py-3 px-4 block w-full border-gray-200 shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none border"
                        >{{\App\Models\jenisCuti::find($jenis_cuti)->jumlah_hari}}</p>
                    @else
                        <p type="text"  class="
                py-3 px-4 block w-full border-gray-200 shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none border"
                        >0</p>
                    @endif

                </div>
            </div>
        </div>

        <div class="relative">
            <div class="my-2">
                <label>Tanggal Cuti</label>
                <div class="flex rounded-lg shadow-sm">
                    <input type="date" class="
                py-3 px-4 block w-full border-gray-200 shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none border"
                           wire:model="tanggal_awal">
                </div>
            </div>
        </div>


        <label for="file_path" class="text-gray-500 font-medium">Upload Surat Cuti,<span>
                @if($jenis_cuti)
                    <button type="button" class="text-sky-700" wire:click.prevent="download">Download surat</button>
                @else
                    <button type="button" class="text-gray-700">Download surat</button>
                @endif

            </span></label>
        <input type="file" wire:model="file_path" name="file_path" id="file_path" class="
         mt-2 mb-5 block w-full rounded-md pr-10 text-gray-500 bg-white border border-gray-300
         file:bg-[#EBEDEF] file:p-1.5 file:border-0 file:text-[#374254]">
        <button type="submit" class="bg-[#d9d9d9] w-full py-3 font-bold rounded-xl">SUBMIT</button>
    </form>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div><div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 mt-4 font-bold" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button></div>
                @endforeach
                @endif
            </div>
