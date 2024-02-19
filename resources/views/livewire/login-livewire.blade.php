<div>
    <form wire:submit="auth">
        @csrf
        <div class="mb-4">
            <label class="block text-sm mb-2 text-gray-500" for="nik">
                NIK
            </label>
            <input type="text"
                   class="w-full px-4 py-2 text-sm border rounded-md focus:border-teal-400
                                focus:outline-none focus:ring-1 focus:ring-teal-600"
                   wire:model="form.nik" />
        </div>
        <div class="mb-6">
            <label class="block mt-4 text-sm mb-2 text-gray-500">
                Password
            </label>
            <input
                class="w-full px-4 py-2 text-sm border rounded-md focus:border-teal-400
                                focus:outline-none focus:ring-1 focus:ring-teal-600"
                placeholder="Masukkan Password"
                wire:model="form.password" required
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
    @error('form.nik')
        {{ $message }}
    @enderror
    @error('form.password') <span class="error">{{ $message }}</span> @enderror

</div>
