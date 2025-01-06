<x-admin-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Data Table Section -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">
                {{ $title }}
            </h2>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <a href="{{ route('kategori.create') }}">
                    <button class="px-4 py-1 text-sm rounded text-blue-800 font-semibold border border-purple-200 hover:text-white hover:bg-blue-800 hover:border-transparent focus:outline-none">Tambah</button>
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="py-2 px-4 border-r text-left text-sm font-semibold text-gray-700">ID</th>
                            <th class="py-2 px-4 border-r text-left text-sm font-semibold text-gray-700">Kategori Penduduk</th>
                            <th class="py-2 px-4 text-left text-sm font-semibold text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategoris as $item)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4 border-r text-sm text-gray-700">
                                {{ $item->kategori_id }}
                            </td>
                            <td class="py-2 px-4 border-r text-sm text-gray-700">
                                {{ $item->kategori_penduduk }}
                            </td>
                            <td class="py-2 px-4 text-sm text-gray-700">
                                <form action="{{ route('kategori.destroy', $item->kategori_id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <a href="{{ route('kategori.edit', $item->kategori_id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                    <button class="delete-button text-red-600 hover:text-red-900" type="submit" id="delete-button">Del</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="bg-white shadow rounded-lg p-6 mt-8">
            <h2 class="text-lg font-semibold mb-4">Diagram Jumlah Penduduk Berdasarkan Kategori</h2>
            <canvas id="pendudukChart" width="400" height="200"></canvas>
        </div>
    </div>

    <!-- Tambahkan Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('pendudukChart').getContext('2d');
            const labels = {!! json_encode($chartData['labels']) !!};
            const data = {!! json_encode($chartData['data']) !!};

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Penduduk',
                        data: data,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</x-admin-layout>
