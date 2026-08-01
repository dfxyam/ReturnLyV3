# RULES.md

# ReturnLy Development Rules

Version: 1.0.0

---

# Purpose

Dokumen ini berisi seluruh aturan yang wajib dipatuhi selama pengembangan aplikasi ReturnLy.

Seluruh implementasi harus mengikuti aturan ini tanpa pengecualian.

Jika terdapat konflik antara implementasi dan dokumentasi, dokumentasi proyek menjadi acuan utama.

---

# 1. Documentation First

Sebelum menulis kode, baca dan pahami dokumen berikut:

* README.md
* ROADMAP.md
* DATABASE.md
* DESIGN.md
* UI_PAGES.md
* COMPONENTS.md
* PROMPT.md

Jangan mulai implementasi tanpa memahami dokumentasi.

---

# 2. Scope Rules

Jangan menambahkan fitur di luar ruang lingkup proyek.

Aplikasi hanya memiliki fitur yang sudah didefinisikan.

Fitur yang **tidak boleh ditambahkan**:

* Registrasi User
* Login User
* Forgot Password User
* Profil User
* Multi Role
* Multi Admin
* Chat
* Komentar
* Rating
* Email Notification
* API Publik
* Dark Mode (kecuali diminta)
* Multi Bahasa (kecuali diminta)

Jika diperlukan fitur baru, tunggu persetujuan terlebih dahulu.

---

# 3. Authentication Rules

Hanya Admin yang memiliki autentikasi.

Guest tidak pernah login.

Dashboard hanya dapat diakses oleh Admin.

Gunakan Laravel Authentication yang sederhana dan aman.

---

# 4. Architecture Rules

Gunakan arsitektur Laravel yang rapi.

Pisahkan tanggung jawab setiap layer.

Contoh:

* Controller → menerima request dan mengembalikan response.
* Form Request → validasi input.
* Service → business logic.
* Model → interaksi database.

Jangan menaruh business logic langsung di Controller atau Blade.

---

# 5. Database Rules

Database harus mengikuti DATABASE.md.

Tidak boleh:

* Menambah tabel tanpa persetujuan.
* Menghapus kolom yang telah disepakati.
* Mengubah relasi antar tabel.
* Mengubah nama tabel atau kolom.

Migration harus konsisten dengan dokumentasi.

---

# 6. Coding Standards

Gunakan:

* PSR-12
* Laravel Best Practices
* Clean Code
* SOLID
* DRY
* KISS

Hindari:

* Hardcoded Value
* Duplicate Code
* Magic Number
* Business Logic di View
* Query Berulang (N+1)

---

# 7. Naming Convention

## Class

Gunakan PascalCase.

Contoh:

```text
LostItemController

ClaimService

CategoryRepository
```

---

## File

Gunakan kebab-case.

```text
item-card.blade.php

dashboard-stat-card.blade.php
```

---

## Variable

Gunakan camelCase.

```php
$itemName

$claimNumber
```

---

## Database

Gunakan snake_case.

```text
lost_items

claim_number

created_at
```

---

# 8. Blade Rules

Gunakan Blade Components.

Hindari HTML yang berulang.

Pisahkan komponen menjadi:

* layout
* form
* feedback
* shared
* admin
* button

Jangan membuat komponen yang tidak digunakan.

---

# 9. UI Rules

Seluruh UI mengikuti DESIGN.md.

Seluruh halaman mengikuti UI_PAGES.md.

Seluruh komponen mengikuti COMPONENTS.md.

Gunakan:

* Mobile First
* Responsive Layout
* Konsisten terhadap Design Tokens

---

# 10. Validation Rules

Gunakan Form Request.

Semua input wajib divalidasi.

Pesan validasi harus:

* Jelas
* Singkat
* Menggunakan Bahasa Indonesia

---

# 11. Security Rules

Selalu gunakan:

* CSRF Protection
* Mass Assignment Protection
* Route Middleware
* Validation
* Escaping Output

Jangan:

* Menyimpan password dalam bentuk plain text.
* Menggunakan raw SQL jika Query Builder atau Eloquent sudah cukup.

---

# 12. Performance Rules

Gunakan:

* Eager Loading
* Pagination
* Lazy Loading jika diperlukan

Hindari:

* Query di dalam loop.
* Memuat semua data sekaligus jika tidak diperlukan.

---

# 13. Git Rules

Gunakan Conventional Commits.

Contoh:

```text
feat:

fix:

docs:

style:

refactor:

test:

chore:
```

Commit harus kecil dan fokus pada satu perubahan.

---

# 14. Development Workflow

Urutan implementasi:

1. Setup Laravel
2. Konfigurasi Database
3. Authentication Admin
4. Migration
5. Seeder
6. Model
7. Form Request
8. Service
9. Controller
10. Blade Components
11. Guest Pages
12. Dashboard Admin
13. CRUD
14. Testing
15. Bug Fixing
16. Final Review

Jangan melompati tahapan.

---

# 15. Testing Rules

Setiap fitur wajib diuji.

Minimal meliputi:

* Validasi Form
* CRUD
* Login Admin
* Hak Akses Dashboard
* Klaim Barang
* Laporan Barang
* Responsif Mobile

Perbaiki bug sebelum melanjutkan ke fitur berikutnya.

---

# 16. Documentation Rules

Jika implementasi berubah, dokumentasi juga harus diperbarui.

Dokumentasi tidak boleh tertinggal dari implementasi.

---

# 17. Error Handling Rules

Gunakan:

* Empty State
* Loading State
* Success Feedback
* Error Feedback

Jangan menampilkan stack trace atau pesan error teknis kepada pengguna.

---

# 18. Code Review Checklist

Sebelum menyelesaikan sebuah fitur, pastikan:

* Mengikuti dokumentasi.
* Tidak ada duplicate code.
* Tidak ada query berulang.
* Responsive.
* Accessible.
* Validasi lengkap.
* UI konsisten.
* Tidak ada warning atau error.

---

# 19. AI Collaboration Rules

Jika terdapat informasi yang kurang jelas:

* Jangan membuat asumsi.
* Jelaskan masalahnya.
* Berikan beberapa opsi solusi.
* Tunggu keputusan sebelum mengubah spesifikasi.

Selalu prioritaskan dokumentasi proyek dibanding asumsi.

---

# 20. Final Goal

Target akhir proyek adalah menghasilkan aplikasi ReturnLy yang:

* Siap dijalankan.
* Mudah dipelihara.
* Konsisten dengan seluruh dokumentasi.
* Menggunakan Laravel 13.
* Menggunakan Blade Components.
* Menggunakan Tailwind CSS v4.
* Mengikuti praktik terbaik Laravel dan Clean Code.
