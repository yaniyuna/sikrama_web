<x-admin-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Menambahkan Total Penduduk dan Jumlah Keluarga -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 mb-6">
            <!-- Kolom Total Penduduk berdasarkan jumlah anggota keluarga -->
            <div class="bg-blue-100 text-blue-700 p-4 rounded-lg shadow">
                <h3 class="text-lg font-bold">Total Penduduk</h3>
                <p class="text-2xl font-semibold">{{ $totalPenduduk }}</p>
            </div>
            <!-- Kolom Jumlah Keluarga berdasarkan jumlah data -->
            <div class="bg-green-100 text-green-700 p-4 rounded-lg shadow">
                <h3 class="text-lg font-bold">Jumlah Keluarga</h3>
                <p class="text-2xl font-semibold">{{ $jumlahKeluarga }}</p>
            </div>
        </div>

        <!-- Table dan lainnya tetap seperti sebelumnya -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">
                {{ $title }}
            </h2>

            <!-- Form Pencarian dan Filter -->
            <div class="col-span-6 p-4 flex justify-end">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <a href="{{ route('penduduk.create') }}">
                        <button class="px-4 py-1 text-sm rounded text-blue-800 font-semibold border border-purple-200 hover:text-white hover:bg-blue-800 hover:border-transparent focus:outline-none">Tambah</button>
                    </a>
                </div>
                <form action="{{route('penduduk.index')}}" method="GET">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div>
                            <select id="kategori" name="kategori_id" class="block w-full py-2 px-4 border border-gray-300 bg-white rounded-1-2x1 shadow-sm focus:outline-none focus:ring-blue-800 focus:border-blue-800 sm:text-sm">
                                <option value="">Kategori</option>
                                @foreach ($kategoris as $item)
                                    <option value="{{$item->kategori_id}}"{{(isset($_GET['kategori_id']) 
                                    && $_GET['kategori_id']==$item->kategori_id)?'selected': ''}}> 
                                        {{$item->kategori_penduduk}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <input type="text" name="s" value="{{(isset($_GET['s']))?$_GET['s']: ''}}" placeholder="Cari Nama Kepala Keluarga" class="px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300"> 
                            <button type="submit" class="rounded-r-md border border-1-0 px-4 py-1 border-gray-300 bg-gray-50 text-gray-500 text-blue-600 hover:text-white hover:bg-blue-600">Cari</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Tabel Data Penduduk -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="py-2 px-4 border-r text-left text-sm font-semibold text-gray-700">ID</th>
                            <th class="py-2 px-4 border-r text-left text-sm font-semibold text-gray-700">Nama Kepala Keluarga</th>
                            <th class="py-2 px-4 border-r text-left text-sm font-semibold text-gray-700">NIK</th>
                            <th class="py-2 px-4 border-r text-left text-sm font-semibold text-gray-700">No KK</th>
                            <th class="py-2 px-4 border-r text-left text-sm font-semibold text-gray-700">Tanggal Lahir</th>
                            <th class="py-2 px-4 border-r text-left text-sm font-semibold text-gray-700">Pekerjaan</th>
                            <th class="py-2 px-4 border-r text-left text-sm font-semibold text-gray-700">Jumlah Anggota Keluarga</th>
                            <th class="py-2 px-4 border-r text-left text-sm font-semibold text-gray-700">Alamat</th>
                            <th class="py-2 px-4 border-r text-left text-sm font-semibold text-gray-700">Jenis Bantuan</th>
                            <th class="py-2 px-4 border-r text-left text-sm font-semibold text-gray-700">Foto Rumah</th>
                            <th class="py-2 px-4 border-r text-left text-sm font-semibold text-gray-700">Foto KK</th>
                            <th class="py-2 px-4 border-r text-left text-sm font-semibold text-gray-700">Kategori Penduduk</th>
                            <th class="py-2 px-4 text-left text-sm font-semibold text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penduduks as $item)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-2 px-4 border-r text-sm text-gray-700">{{ $item->penduduk_id }}</td>
                                <td class="py-2 px-4 border-r text-sm text-gray-700">{{ $item->nama_kepala_keluarga }}</td>
                                <td class="py-2 px-4 border-r text-sm text-gray-700">{{ $item->nik }}</td>
                                <td class="py-2 px-4 border-r text-sm text-gray-700">{{ $item->no_kk }}</td>
                                <td class="py-2 px-4 border-r text-sm text-gray-700">{{ $item->tgl_lahir }}</td>
                                <td class="py-2 px-4 border-r text-sm text-gray-700">
                                    <div class="text-sm text-gray-500">
                                        <a href="{{ route('penduduk.pekerjaan', $item->pekerjaan->pekerjaan_id) }}">{{ $item->pekerjaan->jenis_pekerjaan }}</a>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-r text-sm text-gray-700">{{ $item->jumlah_anggota_keluarga }}</td>
                                <td class="py-2 px-4 border-r text-sm text-gray-700">{{ $item->alamat }}</td>
                                <td class="py-2 px-4 border-r text-sm text-gray-700">
                                    <div class="text-sm text-gray-500">
                                        <a href="{{ route('penduduk.bantuan', $item->bantuan->bantuan_id) }}">{{ $item->bantuan->jenis_bantuan }}</a>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-r text-sm text-gray-700">
                                    <div class="w-full aspect-w-16 aspect-h-9 overflow-hidden rounded-md">
                                        <img class="w-full h-full object-cover" src="{{ asset($item->foto_rumah) }}" alt="Foto Rumah">
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-r text-sm text-gray-700">
                                    <div class="w-full aspect-w-16 aspect-h-9 overflow-hidden rounded-md">
                                        <img class="w-full h-full object-cover" src="{{ asset($item->foto_kk) }}" alt="Foto KK">
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-r text-sm text-gray-700">
                                    <div class="text-sm text-gray-500">
                                        <a href="{{ route('penduduk.kategori', $item->kategori->kategori_id) }}">{{ $item->kategori->kategori_penduduk }}</a>   
                                    </div>
                                </td>

                                <td class="py-2 px-4 text-sm text-gray-700">
                                    <form action="{{route('penduduk.destroy', $item->penduduk_id)}}" method="POST">
                                        @csrf @method('DELETE')
                                        <a href="{{route('penduduk.edit', $item->penduduk_id)}}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                    <button class="delete-button text-red-600 hover:text-red-900" type="button" id="delete-button">Del</button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="m-4">{{ $penduduks->appends(request()->query())->links() }}</div>
    </div>
</x-admin-layout>
