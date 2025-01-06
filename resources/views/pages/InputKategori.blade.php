<x-admin-layout>
    <div class="flex-1 bg-[#b4b4b4] p-6 overflow-y-auto">
        <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded-md">
            <h2 class="text-lg font-semibold mb-4">
                {{ $title }}
            </h2>
            
            <form enctype="multipart/form-data" action="{{ isset($kategoris) ? route('kategori.update', $kategoris->kategori_id) : route('kategori.store') }}" method="POST">
                @csrf
                @if (isset($kategoris)) @method('PUT') @endif
                <div>
                    <div>
                        <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori Penduduk</label>
                        <input 
                            type="text" 
                            id="kategori" 
                            name="kategori_penduduk" 
                            placeholder="Masukkan kategori" 
                            value="{{ isset($kategoris) ? $kategoris->kategori_penduduk : old('kategori_penduduk') }}" 
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        />
                        @error('kategori_penduduk')
                            <div class="text-xs text-red-800">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Submit Button --}}
                <div>
                    <button 
                        type="submit"
                        class="w-full bg-blue-500 text-white py-2 px-4 rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        id="submit-button"
                    >
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
