# MINI PROJECT PBW 2
## LUTHFI DAFFA PURBAYA
## 2409116102

---

Proyek ini adalah lanjutan dari proyek sebelumnya, pada kali ini website portofolio nya dibuat menjadi web dinamis,dirancang agar pengelolaan konten portofolio menjadi lebih efisien. Tidak seperti web statis tradisional, website ini memisahkan antara struktur tampilan dan data konten menggunakan integrasi Database.

## Integrasi Database & Program
Fokus utama saya dari proyek ini adalah menciptakan ekosistem di mana Data mengendalikan tampilan:
- Perubahan informasi di web seperti menambah skill baru atau mengubah deskripsi diri dilakukan melalui database tanpa menyentuh kode.
- Menggunakan PHP sebagai penghubung, data dari tabel MySQL lalu ke ke komponen frontend.
- Semua aset dan informasi tersimpan di database.

## Teknologi Yang Digunakan
1. **Database (MySQL)**: Sebagai alat yang menyimpan entitas `profile`, `experiences`, `skills`, dan `certificates`.
2. **Backend (PHP)**:  Yang melakukan koneksi dan mengambil data dari database untuk disajikan ke web.
3. **Frontend Reaktif (Vue.js 3)**: Digunakan untuk merender data dari database secara dinamis. Vue menangani logika tampilan seperti *looping* data skills dan modal sertifikat.

## Penjelasan Isi Database
- `profile`: Menyimpan data personal (Nama, Foto, About Me).
- `skills`: Menyimpan daftar keahlian beserta persentase levelnya.
- `experiences`: Menyimpan riwayat pengalaman atau pendidikan.
- `certificates`: Menyimpan data dokumen sertifikasi (Judul, Penerbit, Tahun, Link Gambar).
