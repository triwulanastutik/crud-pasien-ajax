# CRUD Pasien Klinik (AJAX + Pagination)

Aplikasi web sederhana berbasis **PHP & PostgreSQL** untuk mengelola data pasien klinik.  
Aplikasi ini dibuat untuk memenuhi **Tugas CRUD dengan fitur AJAX & Pagination**.

---

## 🎯 Fitur Utama

- ✅ Tambah Data Pasien
- ✅ Tampilkan Data Pasien
- ✅ Edit Data Pasien
- ✅ Hapus Data Pasien
- ✅ Live Search menggunakan AJAX (Vanilla JS)
- ✅ Pagination tanpa reload halaman
- ✅ Styling bebas menggunakan CSS
- ✅ Database menggunakan PostgreSQL

---

## 🛠️ Teknologi yang Digunakan
- PHP Native
- PostgreSQL
- HTML & CSS
- JavaScript (AJAX Vanilla)
- Laragon (Local Server)

---

## 🗂️ Struktur File
/crud-pasien
│
├── index.php
├── add.php
├── edit.php
├── delete.php
├── fetch.php
├── db.php
├── style.css
├── script.js
└── README.md

yaml
Copy code

---

## ⚙️ Cara Menjalankan Aplikasi

1. Clone repository:
git clone https://github.com/triwulanastutik/crud-pasien-ajax.git

markdown
Copy code

2. Pindahkan ke folder `www` di Laragon

3. Buat database PostgreSQL:
crud_pasien

sql
Copy code

4. Buat tabel pasien:
```sql
CREATE TABLE pasien (
    id SERIAL PRIMARY KEY,
    nama_pasien VARCHAR(100),
    no_rekam_medis VARCHAR(50),
    jenis_kelamin VARCHAR(20),
    tanggal_lahir DATE,
    alamat TEXT
);
Jalankan melalui browser:

arduino
Copy code
http://localhost/crud-pasien
