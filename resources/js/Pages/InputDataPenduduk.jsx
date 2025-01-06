import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import React, { useState } from "react";

const InputDataPenduduk = ({title, penduduks, pekerjaans, bantuans, kategoris, csrfToken, route}) => {
  const [formData, setFormData] = useState({
    nama_kepala_keluarga: penduduks?.nama_kepala_keluarga || '', 
    nik: penduduks?.nik || '', 
    no_kk: penduduks?.no_kk || '',
    tgl_lahir: penduduks?.tgl_lahir || '',
    pekerjaan_id: penduduks?.pekerjaan_id || '',
    jumlah_anggota_keluarga: penduduks?.jumlah_anggota_keluarga || '',
    alamat: penduduks?.alamat || '',
    bantuan_id: penduduks?.bantuan_id || '',
    foto_rumah: penduduks?.foto_rumah || '',
    foto_kk: penduduks?.foto_kk || '',
    kategori_id: penduduks?.kategori_id || '',
  });

  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setFormData({ ...formData, [name]: value });
  };

  const handleFileChange = (e) => {
    const { name, files } = e.target;
    setFormData({ ...formData, [name]: files[0] });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    const data = new FormData();
    Object. keys(formData).forEach((key) => {
      data.append(key, FormData[key]);
    });

    fetch(route, {
      method: "PUT", 
      headers: {
        "X-CSRF-TOKEN": csrfToken,
      },
      body: data, 
    })
    .then((response) => response.json())
    .then((result) => {
      console.log("Response from server:", result);
    })
    .catch((error) => {
      console.error("Error submitting from:", error);
    });
  };

  return (
    <AuthenticatedLayout>
      <Head title="Input Data Penduduk"/>
      <div className="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-md rounded-md">
      <h1 className="text-2xl font-bold mb-4">{title}</h1>

      <form encType="multipart/form-data" onSubmit={handleSubmit} className="space-y-6">
        {/* Nama */}
        <div>
          <label htmlFor="nama_kepala_keluarga" className="block text-sm font-medium text-gray-700">
            Nama Kepala Keluarga
          </label>
          <input
            type="text"
            id="nama_kepala_keluarga"
            name="nama_kepala_keluarga"
            placeholder="Masukkan Nama"
            value={formData.nama_kepala_keluarga}
            onChange={handleInputChange}
            className="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
          />
        </div>

        {/* NIK */}
        <div>
          <label htmlFor="nik" className="block text-sm font-medium text-gray-700">
            NIK
          </label>
          <input
            type="number"
            id="nik"
            name="nik"
            placeholder="Masukkan NIK"
            value={formData.nik}
            onChange={handleInputChange}
            className="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
          />
        </div>

        {/* No KK */}
        <div>
          <label htmlFor="no_kk" className="block text-sm font-medium text-gray-700">
            NO KK
          </label>
          <input
            type="number"
            id="no_kk"
            name="no_kk"
            placeholder="Masukkan No KK"
            value={formData.no_kk}
            onChange={handleInputChange}
            className="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
          />
        </div>

        {/* Tanggal Lahir */}
        <div>
          <label htmlFor="tgl_lahir" className="block text-sm font-medium text-gray-700">
            Tanggal Lahir
          </label>
          <input
            type="date"
            id="tgl_lahir"
            name="tgl_lahir"
            value={formData.tgl_lahir}
            onChange={handleInputChange}
            className="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
          />
        </div>

        {/* Pekerjaan */}
        <div>
          <label htmlFor="pekerjaan_id" className="block text-sm font-medium text-gray-700">
            Pekerjaan
          </label>
          <select
            id="pekerjaan_id"
            name="pekerjaan_id"
            value={formData.pekerjaan_id}
            onChange={handleInputChange}
            className="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
          >
            <option value="">Pilih Pekerjaan</option>
            {pekerjaans.map((item) => (
              <option key={item.pekerjaan_id} value={item.pekerjaan_id}> {item.jenis_pekerjaan} </option>
            ))}
          </select>
        </div>

        {/* Jumlah Anggota Keluarga */}
        <div>
          <label htmlFor="jumlah_anggota_keluarga" className="block text-sm font-medium text-gray-700">
            Jumlah Anggota Keluarga
          </label>
          <input
            type="number"
            id="jumlah_anggota_keluarga"
            name="jumlah_anggota_keluarga"
            placeholder="Jumlah anggota keluarga"
            value={formData.jumlah_anggota_keluarga}
            onChange={handleInputChange}
            className="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
          />
        </div>

        {/* Alamat */}
        <div>
          <label htmlFor="alamat" className="block text-sm font-medium text-gray-700">
            Alamat
          </label>
          <textarea
            id="alamat"
            name="alamat"
            placeholder="Masukkan alamat"
            value={formData.alamat}
            onChange={handleInputChange}
            className="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
          ></textarea>
        </div>

        {/* Bantuan */}
        <div>
          <label htmlFor="bantuan_id" className="block text-sm font-medium text-gray-700">
            Jenis Bantuan
          </label>
          <select
            id="bantuan_id"
            name="bantuan_id"
            value={formData.bantuan_id}
            onChange={handleInputChange}
            className="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
          >
            <option value="">Pilih Jenis Bantuan</option>
            {bantuans.map((item) => (
              <option key={item.bantuan_id} value={item.bantuan_id}>{item.jenis_bantuan}</option>
            ))}
          </select>
        </div>

        {/* Foto Rumah */}
        <div>
            <label htmlFor="foto_rumah" className="block text-sm font-medium text-gray-700">
              Foto Rumah
            </label>
            <input
              type="file"
              id="foto_rumah"
              name="foto_rumah"
              accept="image/*"
              onChange={handleFileChange}
              className="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm"
            />
            <p class="mt-1 text-xs text-gray-500">Unggah foto KK dalam format JPG, PNG, atau JPEG.</p>
          </div>

          {/* Foto KK */}
          <div>
            <label htmlFor="foto_kk" className="block text-sm font-medium text-gray-700">
              Foto Kartu Keluarga
            </label>
            <input
              type="file"
              id="foto_kk"
              name="foto_kk"
              accept="image/*"
              onChange={handleFileChange}
              className="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm"
            />
            <p class="mt-1 text-xs text-gray-500">Unggah foto KK dalam format JPG, PNG, atau JPEG.</p>
          </div>

          {/* Kategori */}
        <div>
          <label htmlFor="kategori_id" className="block text-sm font-medium text-gray-700">
            Kategori Penduduk
          </label>
          <select
            id="kategori_id"
            name="kategori_id"
            value={formData.kategori_id}
            onChange={handleInputChange}
            className="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
          >
            <option value="">Pilih Kategori Penduduk</option>
            {kategoris.map((item) => (
              <option key={item.kategori_id} value={item.kategori_id}> {item.kategori_penduduk} </option>
            ))}
          </select>
        </div>

        {/* Submit Button */}
        <div>
          <button
            type="submit"
            className="w-full bg-blue-500 text-white py-2 px-4 rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
          >
            Simpan Data
          </button>
        </div>
      </form>
    </div>
    </AuthenticatedLayout>
  );
};

export default InputDataPenduduk;