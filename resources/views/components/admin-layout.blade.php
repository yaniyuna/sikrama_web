<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    @vite('resources/css/app.css') {{-- Ganti sesuai dengan asset loader yang digunakan --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.delete-button').forEach(function (button) {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const form = button.closest('form');
    
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    });
                });
            });
        });
    </script>
    <script>
        document.getElementById('submit-button').addEventListener('click', function (event) {
            event.preventDefault();
    
            Swal.fire({
                title: 'Submitting...',
                text: "Please wait while we process your request.",
                icon: 'info',
                allowOutsideClick: false,
                showConfirmButton: false,
                timer: 2000,
            }).then(() => {
                document.getElementById('submit-form').submit();
            });
        });
    </script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-950 shadow text-gray-300 flex flex-col p-6">
            <h2 class="text-2xl font-bold mb-8">SIKRAMA</h2>
            <nav>
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('penduduk.index') }}" class="block px-4 py-2 rounded hover:bg-blue-800">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pekerjaan.index') }}" class="block px-4 py-2 rounded hover:bg-blue-800">
                            Data Pekerjaan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kategori.index') }}" class="block px-4 py-2 rounded hover:bg-blue-800">
                            Kategori Penduduk
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('bantuan.index') }}" class="block px-4 py-2 rounded hover:bg-blue-800">
                            Bantuan
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <div class="h-[60px] flex justify-between items-center px-4 bg-white shadow">
                <h1 class="text-xl font-bold">WELCOME ADMIN</h1>
                <div class="flex items-center space-x-2">
                    <div class="flex justify-center items-center rounded-full bg-gray-900 h-[40px] w-[40px]">
                        <img 
                           {{-- src="{{ asset('assets/images/admin.png') }}"  --}}
                           alt="Admin" class="w-[20px] h-[20px]" />
                    </div>
                    <span class="font-bold text-gray-700">Admin</span>
                </div>
            </div>

            <!-- Content -->
            <main class="flex-1 py-12 bg-[#b4b4b4] p-4 overflow-y-auto">
                {{ $slot }}
            </main>

            <footer class="w-full bg-white text-right p-4">
            </footer>
        </div>
        </div>
    </div>
    @if(session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            title: 'Error!',
            text: "{{ session('error') }}",
            icon: 'error',
            confirmButtonText: 'Try Again'
        });
    </script>
    @endif
</body>
</html>
