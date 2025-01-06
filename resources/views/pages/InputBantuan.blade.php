<x-admin-layout>
    <div class="flex-1 bg-[#b4b4b4] p-6 overflow-y-auto">
        <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded-md">
            <h2 class="text-lg font-semibold mb-4">
                {{ $title }}
            </h2>
            
            <form enctype="multipart/form-data" action="{{ isset($bantuans) ? route('bantuan.update', $bantuans->bantuan_id) : route('bantuan.store') }}" method="POST">
                @CSRF
                @if(isset($bantuans))
                    @method('PUT')
                @endif
                <div>
                    <div>
                        <label for="bantuan" class="block text-sm font-medium text-gray-700">Jenis Bantuan</label>
                        <input 
                            type="text" 
                            id="bantuan" 
                            name="jenis_bantuan" 
                            placeholder="Masukkan bantuan" 
                            required
                            value="{{ isset($bantuans) ? $bantuans->jenis_bantuan : old('jenis_bantuan') }}" 
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"/>
                        @error('jenis_bantuan')
                            <div class="text-xs text-red-800">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <div id="editor-container" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm"></div>
                        <textarea id="deskripsi" name="deskripsi" value= "{{ isset($bantuans) ? $bantuans->deskripsi : old('deskripsi') }}" style="display:none;"></textarea>
                        @error('deskripsi')
                            <div class="text-xs text-red-800">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mt-6">
                    <button 
                        type="submit" 
                        class="w-full bg-blue-500 text-white py-2 px-4 rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        id="submit-button">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Quill Editor -->
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
    <script>
        const quill = new Quill('#editor-container', {
            theme: 'snow'
        });

        // Simpan konten ke textarea sebelum submit
        document.querySelector('form').addEventListener('submit', function() {
            document.querySelector('#deskripsi').value = quill.root.innerHTML;
        });
    </script>
</x-admin-layout>
