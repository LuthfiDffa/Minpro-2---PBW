# MINI PROJECT PBW 2
## LUTHFI DAFFA PURBAYA
## 2409116102

---

Proyek ini adalah lanjutan dari proyek sebelumnya, pada kali ini website portofolio nya dibuat menjadi web dinamis,dirancang agar pengelolaan konten portofolio menjadi lebih efisien. Tidak seperti web statis tradisional, website ini memisahkan antara struktur tampilan dan data konten menggunakan integrasi Database.

## 🔗 Integrasi Database & Program
Fokus utama dari proyek ini adalah menciptakan ekosistem di mana **Data Drive the UI** (Data mengendalikan tampilan):
- Perubahan informasi (seperti menambah skill baru atau mengubah deskripsi diri) dilakukan melalui database tanpa menyentuh file kode.
- Menggunakan PHP sebagai jembatan, data dari tabel MySQL dipetakan secara otomatis ke komponen frontend.
- Semua aset dan informasi tersimpan secara aman di database, memungkinkan skalabilitas jika di masa depan ingin ditambahkan fitur Admin Panel.

## 🛠️ Teknologi Yang Diterapkan
1. **Database (MySQL)**: Sebagai otak aplikasi yang menyimpan entitas `profile`, `experiences`, `skills`, dan `certificates`.
2. **Backend (PHP)**: Sebagai mesin pengolah yang melakukan koneksi dan mengambil data dari database untuk disajikan ke web.
3. **Frontend Reaktif (Vue.js 3)**: Digunakan untuk merender data dari database secara dinamis. Vue menangani logika tampilan seperti *looping* data skills dan modal sertifikat agar interaksi terasa lebih halus.

## 📂 Penjelasan Isi Database
- `profile`: Menyimpan data personal (Nama, Foto, About Me).
- `skills`: Menyimpan daftar keahlian beserta persentase levelnya.
- `experiences`: Menyimpan riwayat pengalaman atau pendidikan.
- `certificates`: Menyimpan data dokumen sertifikasi (Judul, Penerbit, Tahun, Link Gambar).
