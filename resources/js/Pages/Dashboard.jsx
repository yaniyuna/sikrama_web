import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import { useState } from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faInfoCircle, faPencil } from '@fortawesome/free-solid-svg-icons';

export default function Dashboard() {
    const [news, setNews] = useState([
        { id: 1, title: 'Pembangunan Jalan Baru', date: '21 Desember 2024', description: 'Proyek jalan baru akan dimulai minggu depan untuk meningkatkan aksesibilitas.' },
        { id: 2, title: 'Pelayanan Kesehatan Gratis', date: '18 Desember 2024', description: 'Pemerintah menyediakan layanan kesehatan gratis untuk warga dengan KTP lokal.' },
    ]);

    const quickLinks = [
        { id: 2, title: 'Cek Informasi Kependudukan', href: '/services', icon: faInfoCircle, description: 'Lihat informasi data kependudukan Anda.' },
        { id: 3, title: 'Daftarkan Data Anda', href: '/input-data', icon: faPencil, description: 'Segera daftarkan data diri Anda dan diri Anda'},
    ];

    return (
        <AuthenticatedLayout>
            <Head title="Dashboard" />

            {/* Main Content */}
            <main className="py-12 px-6 bg-gray-100 min-h-screen">
                <div className="container mx-auto max-w-7xl space-y-6">
                <header
                    className="bg-cover bg-center h-screen"
                    style={{ backgroundImage: `url('https://i.pinimg.com/736x/e1/1f/ba/e11fbab06ebaf8a8be68945fa7f50b3c.jpg')` }}
                >
                    <div className="bg-blue-900 bg-opacity-80 h-full flex items-center justify-center">
                        <div className="text-center text-white px-6">
                            <h1 className="text-4xl md:text-6xl font-bold mb-6">Selamat Datang di SIKRAMA</h1>
                            <p className="text-xl md:text-2xl mb-6">Sistem Informasi Kependudukan dan Administrasi.</p>
                        </div>
                    </div>
                </header>

                    {/* News Section */}
                    <section className="bg-white shadow-lg rounded-lg p-6">
                        <h3 className="text-lg font-semibold text-gray-800">Berita Terbaru</h3>
                        <ul className="mt-4 space-y-4">
                            {news.map((item) => (
                                <li key={item.id} className="border-b border-gray-200 pb-4">
                                    <h4 className="text-gray-800 font-medium">{item.title}</h4>
                                    <p className="text-gray-500 text-sm">{item.date}</p>
                                    <p className="text-gray-600 mt-2">{item.description}</p>
                                </li>
                            ))}
                        </ul>
                    </section>

                    {/* Quick Links Section */}
                    <section className="bg-white shadow-lg rounded-lg p-6">
                        <h3 className="text-lg font-semibold text-gray-800">Akses Cepat</h3>
                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            {quickLinks.map((link) => (
                                <a
                                    key={link.id}
                                    href={link.href} 
                                    className="flex items-center gap-4 p-4 bg-gray-50 border border-gray-200 rounded-lg shadow hover:shadow-lg hover:bg-gray-100 transition"
                                >
                                    <FontAwesomeIcon icon={link.icon} size="lg" className="text-blue-900" />
                                    <div>
                                        <h4 className="text-gray-800 font-semibold">{link.title}</h4>
                                        <p className="text-gray-600 text-sm mt-2">{link.description}</p>
                                    </div>
                                </a>
                            ))}
                        </div>
                    </section>
                </div>
            </main>
        </AuthenticatedLayout>
    );
}
