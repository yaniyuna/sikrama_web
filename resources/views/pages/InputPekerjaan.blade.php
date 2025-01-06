<x-admin-layout>
    <div class="flex-1 bg-[#b4b4b4] p-6 overflow-y-auto">
        <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded-md">
            <h2 class="text-lg font-semibold mb-4">
                {{ $title }}
            </h2>
            
            <form enctype='multipart/form-data' action="{{(isset($pekerjaans))?route('pekerjaan.update', $pekerjaans->pekerjaan_id): route('pekerjaan.store')}}" method="POST" class="space-y-6">
                @CSRF
                {{-- masih data lokal dr Controller --}}
                @if(isset($pekerjaans))@method('PUT')@endif
                <div>
                    <div>
                        <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Jenis Pekerjaan</label>
                        <input type="text" id="pekerjaan" name="jenis_pekerjaan" placeholder="Masukkan pekerjaan" value="{{ isset($pekerjaans) ? $pekerjaans->jenis_pekerjaan :old('jenis_pekerjaan') }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"/>
                        @error('jenis_pekerjaan')
                            <div class=" text-xs text-red-800">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- Submit Button --}}
                <div>
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
</x-admin-layout>