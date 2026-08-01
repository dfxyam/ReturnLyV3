# TASKS.md

# ReturnLy Development Tasks

Version: 1.0.0

Status: Ready for Development

---

# Purpose

Dokumen ini berisi daftar seluruh pekerjaan yang harus diselesaikan untuk membangun aplikasi ReturnLy.

Setiap tugas harus diselesaikan secara berurutan sesuai roadmap proyek.

Jangan melanjutkan ke tahap berikutnya sebelum seluruh tugas pada tahap saat ini selesai.

---

# Milestone 1 — Project Setup

## Laravel

* [ ] Membuat project Laravel 13
* [ ] Konfigurasi environment (.env)
* [ ] Konfigurasi MySQL
* [ ] Menjalankan project pertama
* [ ] Konfigurasi timezone Indonesia
* [ ] Konfigurasi locale Indonesia

---

## Frontend

* [ ] Install Tailwind CSS v4
* [ ] Install Heroicons
* [ ] Import Font Poppins
* [ ] Konfigurasi asset Vite

---

## Git

* [ ] Inisialisasi Git Repository
* [ ] Membuat branch `main`
* [ ] Membuat branch `develop`
* [ ] Commit pertama

---

# Milestone 2 — Database

## Migration

* [ ] admins
* [ ] categories
* [ ] locations
* [ ] items
* [ ] claims

---

## Foreign Key

* [ ] Item → Category
* [ ] Item → Location
* [ ] Claim → Item

---

## Seeder

* [ ] Admin Seeder
* [ ] Category Seeder
* [ ] Location Seeder

---

## Testing Database

* [ ] Jalankan Migration
* [ ] Jalankan Seeder
* [ ] Verifikasi struktur database

---

# Milestone 3 — Authentication

## Admin Login

* [ ] Login Page
* [ ] Login Validation
* [ ] Login Process
* [ ] Logout

---

## Middleware

* [ ] Guest Middleware
* [ ] Admin Middleware

---

## Route Protection

* [ ] Dashboard
* [ ] CRUD
* [ ] Statistics

---

# Milestone 4 — Guest Layout

## Layout

* [ ] Navbar
* [ ] Footer
* [ ] Container
* [ ] Section
* [ ] Breadcrumb

---

## Shared Components

* [ ] Primary Button
* [ ] Secondary Button
* [ ] Badge
* [ ] Item Card
* [ ] Pagination
* [ ] Empty State
* [ ] Skeleton Loader

---

# Milestone 5 — Public Pages

## Home

* [ ] Hero Section
* [ ] Statistik Ringkas
* [ ] Barang Hilang Terbaru
* [ ] Barang Ditemukan Terbaru
* [ ] Cara Kerja
* [ ] Footer

---

## Lost Items

* [ ] Daftar Barang
* [ ] Search
* [ ] Filter
* [ ] Pagination

---

## Lost Item Detail

* [ ] Detail Barang
* [ ] Informasi Barang
* [ ] Status

---

## Found Items

* [ ] Daftar Barang
* [ ] Search
* [ ] Filter
* [ ] Pagination

---

## Found Item Detail

* [ ] Detail Barang
* [ ] Tombol Klaim

---

# Milestone 6 — Reporting

## Report Lost Item

* [ ] Form
* [ ] Validation
* [ ] Upload Foto (Opsional)
* [ ] Submit

---

## Report Found Item

* [ ] Form
* [ ] Validation
* [ ] Upload Foto (Opsional)
* [ ] Submit

---

# Milestone 7 — Claim

## Claim Form

* [ ] Ringkasan Barang
* [ ] Form Klaim
* [ ] Validation
* [ ] Submit

---

## Claim Status

* [ ] Pencarian Nomor Klaim
* [ ] Timeline Status
* [ ] Detail Klaim

---

# Milestone 8 — Dashboard Admin

## Dashboard

* [ ] Sidebar
* [ ] Topbar
* [ ] Dashboard Cards
* [ ] Statistik
* [ ] Aktivitas Terbaru

---

## Widgets

* [ ] Statistics Card
* [ ] Quick Action Card
* [ ] Notification Dropdown

---

# Milestone 9 — CRUD Barang

## Barang Hilang

* [ ] List
* [ ] Detail
* [ ] Edit
* [ ] Hapus

---

## Barang Ditemukan

* [ ] List
* [ ] Detail
* [ ] Edit
* [ ] Hapus

---

# Milestone 10 — CRUD Klaim

## Claims

* [ ] List
* [ ] Detail
* [ ] Approve
* [ ] Reject

---

# Milestone 11 — Master Data

## Categories

* [ ] List
* [ ] Tambah
* [ ] Edit
* [ ] Hapus

---

## Locations

* [ ] List
* [ ] Tambah
* [ ] Edit
* [ ] Hapus

---

# Milestone 12 — UI Enhancement

## Feedback

* [ ] Alert
* [ ] Toast
* [ ] Modal
* [ ] Confirm Dialog

---

## Loading

* [ ] Skeleton
* [ ] Loading Button
* [ ] Loading Table

---

## Responsive

* [ ] Mobile
* [ ] Tablet
* [ ] Desktop

---

# Milestone 13 — Validation

* [ ] Seluruh Form Request
* [ ] Validasi Input
* [ ] Pesan Error Bahasa Indonesia

---

# Milestone 14 — Testing

## Functional Testing

* [ ] Login Admin
* [ ] Logout
* [ ] Lapor Barang Hilang
* [ ] Lapor Barang Ditemukan
* [ ] Klaim Barang
* [ ] Status Klaim
* [ ] CRUD Barang
* [ ] CRUD Klaim
* [ ] CRUD Kategori
* [ ] CRUD Lokasi

---

## UI Testing

* [ ] Responsive
* [ ] Empty State
* [ ] Loading State
* [ ] Accessibility

---

## Database Testing

* [ ] Relasi
* [ ] Foreign Key
* [ ] Seeder

---

# Milestone 15 — Final Review

## Documentation

* [ ] README.md sesuai implementasi
* [ ] DATABASE.md sesuai migration
* [ ] UI_PAGES.md sesuai tampilan
* [ ] COMPONENTS.md sesuai Blade Components

---

## Code Quality

* [ ] Tidak ada Duplicate Code
* [ ] Tidak ada N+1 Query
* [ ] Tidak ada Hardcode
* [ ] Mengikuti PSR-12
* [ ] Mengikuti SOLID

---

## Final Checklist

* [ ] Seluruh halaman selesai
* [ ] Seluruh CRUD selesai
* [ ] Authentication selesai
* [ ] Responsive selesai
* [ ] Testing selesai
* [ ] Dokumentasi lengkap
* [ ] Project siap dijalankan

---

# Definition of Done

Proyek ReturnLy dianggap selesai apabila:

* Seluruh tugas pada TASKS.md telah dicentang.
* Implementasi sesuai seluruh dokumentasi proyek.
* Tidak ada bug kritis.
* Aplikasi dapat dijalankan pada Laravel 13 dengan MySQL.
* Seluruh halaman responsif.
* Dashboard Admin berfungsi dengan baik.
* Guest dapat menggunakan seluruh fitur tanpa login.
