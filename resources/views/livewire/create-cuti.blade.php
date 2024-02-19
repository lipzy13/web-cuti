<div class="overscroll-contain">
    <form wire:submit.prevent="save">
        @csrf
        <label for="no_kontrak" class="text-gray-500 font-medium">Nomor Kontrak</label>
        <input type="text" name="no_kontrak" id="no_kontrak" class="
         mt-2 mb-5 block w-full border-0 py-1.5  pl-5 pr-20 text-gray-500 bg-gray-300 "
               readonly="readonly" wire:model="no_kontrak">
        <div class="relative">
            <div class="my-2">
                <label>Tanggal Cuti 1</label>
                <div class="flex rounded-lg shadow-sm">
                    <input type="date" class="
                py-3 px-4 block w-full border-gray-200 shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none border"
                           wire:model="tanggal.0">
                </div>
            </div>

        @foreach($tanggal as $key => $tangg)
                @if($key > 0)
                    <div class="my-2">
                        <label>Tanggal Cuti {{ $key + 1 }}</label>
                        <div class="flex rounded-lg shadow-sm">
                            <input type="date" class="
                        py-3 px-4 block w-full border-gray-200 shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none border"
                                   wire:model="tanggal.{{ $key }}" >
                            <button wire:click.prevent="removeTanggal({{ $key }})" class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
            @endforeach

            <button wire:click.prevent="addTanggal" class="my-3 py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-teal-500 text-white hover:bg-teal-600 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Tambah Tanggal Cuti</button>
        </div>


        <div
            x-data="{ uploading: false, progress: 0 }"
            x-on:livewire-upload-start="uploading = true"
            x-on:livewire-upload-finish="uploading = false"
            x-on:livewire-upload-cancel="uploading = false"
            x-on:livewire-upload-error="uploading = false"
            x-on:livewire-upload-progress="progress = $event.detail.progress"
        >
            <label for="file_path" class="text-gray-500 font-medium">Upload Surat Cuti, <span><button type="button" class="text-sky-700" wire:click.prevent="download">Download surat</button></span></label>
            <input type="file" wire:model="file_path" name="file_path" id="file_path" class="
         mt-2 mb-5 block w-full rounded-md pr-10 text-gray-500 bg-white border border-gray-300
         file:bg-[#EBEDEF] file:p-1.5 file:border-0 file:text-[#374254]">
            <div x-show="uploading">
                <progress max="100" x-bind:value="progress"></progress>
            </div>
        </div>
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
