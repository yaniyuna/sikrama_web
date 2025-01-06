<x-admin-layout>
    <div class="flex-1 bg-[#b4b4b4] p-6 overflow-y-auto">
        <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded-md">
            <h2 class="text-lg font-semibold mb-4">
                {{ $title }}
            </h2>

            <form enctype='multipart/form-data' action="{{(isset($penduduks))?route('penduduk.update', $penduduks->penduduk_id): route('penduduk.store')}}" method="POST">
                @CSRF
                {{-- masih data lokal dr Controller --}}
                @if(isset($penduduks))
                    @method('PUT')
                @endif
                <div>
                    {{-- Nama --}}
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kepala Keluarga</label>
                        <input type="text" id="nama" name="nama_kepala_keluarga" placeholder="Masukkan Nama" value="{{ isset($penduduks) ? $penduduks->nama_kepala_keluarga :old('nama_kepala_keluarga') }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"/>
                        @error('nama_kepala_keluarga')
                            <div class=" text-xs text-red-800">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- NIK --}}
                    <div>
                        <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                        <input
                            type="number" id="nik" name="nik" placeholder="Masukkan NIK" value="{{ isset($penduduks) ? $penduduks->nik :old('nik') }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"/>
                        @error('nik')
                            <div class=" text-xs text-red-800">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- NO KK --}}
                    <div>
                        <label for="kk" class="block text-sm font-medium text-gray-700">NO KK</label>
                        <input type="number" id="kk" name="no_kk" placeholder="Masukkan N0 KK" value="{{ isset($penduduks) ? $penduduks->no_kk :old('no_kk') }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"/>
                        @error('no_kk')
                            <div class=" text-xs text-red-800">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div>
                        <label for="tgl_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ isset($penduduks) ? $penduduks->tgl_lahir :old('tgl_lahir') }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"/>
                        @error('tgl_lahir')
                            <div class=" text-xs text-red-800">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Pekerjaan --}}
                    <div>
                        <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                        <select id="pekerjaan" name="pekerjaan_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Pilih Pekerjaan</option>
                            @foreach ($pekerjaans as $item)
                                <option value="{{$item->pekerjaan_id}}"
                                    {{((isset($penduduks) && $penduduks->pekerjaan_id==$item->pekerjaan_id) || old('pekerjaan_id')==$item->pekerjaan_id)? 'selected': ''}}> 
                                    {{$item->jenis_pekerjaan}}
                                </option>
                            @endforeach
                        </select>
                        @error('pekerjaan_id')
                            <div class=" text-xs text-red-800">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Jumlah Anggota Keluarga --}}
                    <div>
                        <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah Anggota Keluarga</label>
                        <input type="number" id="jumlah" name="jumlah_anggota_keluarga" placeholder="jumlah anggota" value="{{ isset($penduduks) ? $penduduks->jumlah_anggota_keluarga :old('jumlah_anggota_keluarga') }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"/>
                        @error('jumlah_anggota_keluarga')
                            <div class=" text-xs text-red-800">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Alamat --}}
                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea
                            id="alamat"
                            name="alamat"
                            placeholder="Masukkan alamat"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            {{ isset($penduduks) ? $penduduks->alamat : old('alamat') }}
                        </textarea>
                        @error('alamat')
                            <div class="text-xs text-red-800">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    {{-- Jenis Bantuan --}}
                    <div>
                        <label for="bantuan" class="block text-sm font-medium text-gray-700">Jenis Bantuan</label>
                        <select id="bantuan" name="bantuan_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="" >Pilih Jenis Bantuan</option>
                            @foreach ($bantuans as $item)
                                <option value="{{$item->bantuan_id}}"
                                    {{((isset($penduduks) && $penduduks->bantuan_id==$item->bantuan_id) || old('bantuan_id')==$item->bantuan_id)? 'selected': ''}}> 
                                    {{$item->jenis_bantuan}}
                                </option>
                            @endforeach
                        </select>
                        @error('bantuan_id')
                            <div class=" text-xs text-red-800">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Foto Rumah --}}
                    <div>
                        <label for="rumah" class="block text-sm font-medium text-gray-700">Foto Rumah</label>
                        <!-- Pratinjau Foto Rumah -->
                    
                        <input
                            type="file"
                            id="rumah"
                            name="foto_rumah"
                            accept="image/*"
                            class="mt-1 block w-full text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"/>
                        <p class="mt-1 text-xs text-gray-500">Unggah foto rumah dalam format JPG, PNG, atau JPEG.</p>
                    </div>
                    
                    {{-- Foto KK --}}
                    <div>
                        <label for="kk" class="block text-sm font-medium text-gray-700">Foto KK</label>
                        <!-- Pratinjau Foto KK -->
                        {{-- @if(isset($penduduks) && $penduduks->foto_kk)
                            <img src="{{ asset('storage/' . $penduduks->foto_kk) }}" alt="Foto KK" class="mb-2 h-32 w-32 object-cover rounded-md shadow-md">
                        @endif --}}
                    
                        <input
                            type="file"
                            id="kk"
                            name="foto_kk"
                            accept="image/*"
                            class="mt-1 block w-full text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"/>
                        <p class="mt-1 text-xs text-gray-500">Unggah foto KK dalam format JPG, PNG, atau JPEG.</p>
                    </div>
                    
                    {{-- Kategori --}}
                    <div>
                        <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select
                            id="kategori"
                            name="kategori_id"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        >
                            <option value="" >Pilih Kategori Penduduk</option>
                            @foreach ($kategoris as $item)
                                <option value="{{$item->kategori_id}}"
                                    {{((isset($penduduks) && $penduduks->kategori_id==$item->kategori_id) || old('kategori_id')==$item->kategori_id)? 'selected': ''}}> 
                                    {{$item->kategori_penduduk}}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <div class=" text-xs text-red-800">{{ $message }}</div>
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