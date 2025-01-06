<x-admin-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <!-- Data Table Section -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">
                {{ $title }}
            </h2>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <a href="{{ route('pekerjaan.create') }}">
                    <button class="px-4 py-1 text-sm rounded text-blue-800 font-semibold border border-purple- 200 hover:text-white hover:bg-blue-800 hover:border-transparent focus: outline-none">Tambah</button>
                </a>
            </div>
            <form action="{{route('pekerjaan.index')}}" method="GET">
                <div class="grid grid-cols-1 md:grid-cols-2 ">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <input type="text" name="s" value="{{(isset($_GET['s']))?$_GET['s']: ''}}" placeholder="Cari Pekerjaan" class="px-4 py-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300"> 
                        <button type="submit" class="rounded-r-md border border-1-0 px-4 py-1 border-gray-300 bg-gray-50 text-gray-500 text-blue-600 hover:text-white hover:bg-blue-600">Cari</button>
                    </div>
                </div>
            </form>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="py-2 px-4 border-r text-left text-sm font-semibold text-gray-700">ID</th>
                            <th class="py-2 px-4 border-r text-left text-sm font-semibold text-gray-700">Jenis Pekerjaan</th>
                            <th class="py-2 px-4 text-left text-sm font-semibold text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data Iteration -->
                        @foreach ($pekerjaans as $item)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4 border-r text-sm text-gray-700">
                                {{ $item->pekerjaan_id }}
                            </td>
                            <td class="py-2 px-4 border-r text-sm text-gray-700">
                                {{ $item->jenis_pekerjaan}}
                            </td>
                            <td class="py-2 px-4 text-sm text-gray-700">
                                <form action="{{route('pekerjaan.destroy', $item->pekerjaan_id)}}" method="POST">
                                    @csrf @method('DELETE')
                                    <a href="{{route('pekerjaan.edit', $item->pekerjaan_id)}}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <button class="delete-button text-red-600 hover:text-red-900" type="button" id="delete-button">Del</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <?php if (Request::path()=='pekerjaan') {?>
            <div class="m-4">{{ $pekerjaans->appends(request()->query())->links() }}</div>
        <?php } ?>
    </div>
</x-admin-layout>