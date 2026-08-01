# DATABASE.md

# ReturnLy Database Documentation

> Version 1.0

Database Documentation untuk proyek **ReturnLy - Lost & Found Web Application**.

Dokumen ini menjadi acuan utama dalam pembuatan:

* Database Schema
* Laravel Migration
* Eloquent Model
* Seeder
* Factory
* Form Request Validation
* Controller
* Business Logic

Seluruh implementasi database **harus mengikuti dokumen ini**.

---

# Table of Contents

1. Database Overview
2. Database Convention
3. Database Rules
4. Database Schema
5. Table Documentation
6. Relationships
7. Enum Values
8. Validation Rules
9. Migration Rules
10. Business Rules

---

# 1. Database Overview

ReturnLy menggunakan database relasional berbasis **MySQL**.

Database dirancang untuk mendukung sistem Lost & Found di lingkungan sekolah dengan konsep:

* Guest dapat melapor tanpa login.
* Hanya Admin yang memiliki akun.
* Semua data tersimpan secara terstruktur.
* Relasi antar tabel mengikuti ERD resmi proyek.

---

## Database Name

```text
returnly
```

---

## Database Engine

```text
MySQL 8+
```

---

## Character Set

```text
utf8mb4
```

---

## Collation

```text
utf8mb4_unicode_ci
```

---

# 2. Database Convention

Seluruh tabel mengikuti aturan berikut.

## Table Naming

Gunakan format:

```text
snake_case
plural
```

Contoh:

```text
admins
lost_items
found_items
claims
categories
locations
notifications
activity_logs
```

---

## Column Naming

Gunakan:

```text
snake_case
```

Contoh:

```text
created_at
updated_at

category_id

location_id

phone_number
```

---

## Primary Key

Seluruh tabel menggunakan:

```text
id
```

dengan tipe

```text
BIGINT UNSIGNED AUTO_INCREMENT
```

---

## Foreign Key

Gunakan format:

```text
nama_tabel_singular_id
```

Contoh:

```text
category_id

location_id

found_item_id
```

---

## Timestamp

Seluruh tabel menggunakan

```text
created_at

updated_at
```

kecuali jika pada ERD memang tidak diperlukan.

---

# 3. Database Rules

Seluruh implementasi database harus mengikuti aturan berikut.

## Rule 1

Tidak ada tabel `users`.

---

## Rule 2

Hanya tabel `admins` yang digunakan untuk autentikasi.

---

## Rule 3

Guest tidak memiliki akun.

---

## Rule 4

Identitas pelapor disimpan langsung pada tabel:

* lost_items
* found_items
* claims

---

## Rule 5

Semua Foreign Key wajib menggunakan Constraint.

---

## Rule 6

Gunakan InnoDB.

---

## Rule 7

Gunakan UTF8MB4.

---

## Rule 8

Seluruh data harus divalidasi sebelum disimpan.

---

## Rule 9

Gunakan Laravel Migration.

---

## Rule 10

Seluruh relasi menggunakan Eloquent Relationship.

---

# 4. Database Schema

Database terdiri dari delapan tabel utama.

| Table         | Fungsi                   |
| ------------- | ------------------------ |
| admins        | Menyimpan akun admin     |
| categories    | Kategori barang          |
| locations     | Lokasi barang            |
| lost_items    | Laporan barang hilang    |
| found_items   | Laporan barang ditemukan |
| claims        | Pengajuan klaim barang   |
| notifications | Notifikasi sistem        |
| activity_logs | Riwayat aktivitas admin  |

---

# 5. Table Documentation

---

# 5.1 admins

## Description

Tabel `admins` menyimpan seluruh akun administrator yang memiliki hak untuk mengelola aplikasi.

Hanya Admin yang dapat melakukan login ke sistem.

---

## Purpose

* Login
* Logout
* Dashboard
* CRUD Data
* Verifikasi Klaim
* Melihat Statistik

---

## Columns

| Column     | Type         | Null | Key    | Description       |
| ---------- | ------------ | ---- | ------ | ----------------- |
| id         | BIGINT       | NO   | PK     | Primary Key       |
| username   | VARCHAR(50)  | NO   | UNIQUE | Username Admin    |
| password   | VARCHAR(255) | NO   | -      | Password (Hashed) |
| created_at | TIMESTAMP    | YES  | -      | Waktu dibuat      |
| updated_at | TIMESTAMP    | YES  | -      | Waktu diperbarui  |

---

## Validation Rules

| Field    | Rule                     |
| -------- | ------------------------ |
| username | required, string, max:50 |
| password | required                 |

---

## Relationships

Tidak memiliki relasi langsung dengan tabel lain.

---

## Business Rules

* Username harus unik.
* Password wajib di-hash menggunakan bcrypt.
* Hanya Admin yang dapat login.
* Tidak tersedia fitur registrasi admin melalui website.

---

## Example Record

| id | username |
| -- | -------- |
| 1  | admin    |

---

# 5.2 categories

## Description

Menyimpan daftar kategori barang.

Kategori digunakan oleh barang hilang maupun barang ditemukan.

---

## Purpose

Mengelompokkan jenis barang.

---

## Columns

| Column     | Type         | Null | Key    | Description   |
| ---------- | ------------ | ---- | ------ | ------------- |
| id         | BIGINT       | NO   | PK     | Primary Key   |
| name       | VARCHAR(100) | NO   | UNIQUE | Nama kategori |
| created_at | TIMESTAMP    | YES  | -      | Created Time  |
| updated_at | TIMESTAMP    | YES  | -      | Updated Time  |

---

## Validation Rules

| Field | Rule                      |
| ----- | ------------------------- |
| name  | required, unique, max:100 |

---

## Relationships

Category memiliki relasi:

```text
Category

↓

Lost Items

Category

↓

Found Items
```

---

## Business Rules

* Nama kategori tidak boleh sama.
* Admin dapat menambah, mengubah, dan menghapus kategori.
* Kategori digunakan sebagai filter pada halaman publik.

---

## Example Data

| id | name        |
| -- | ----------- |
| 1  | Elektronik  |
| 2  | Alat Tulis  |
| 3  | Dompet      |
| 4  | Botol Minum |

---

# 5.3 locations

## Description

Menyimpan daftar lokasi di lingkungan sekolah.

---

## Purpose

Menentukan lokasi terakhir barang hilang atau ditemukan.

---

## Columns

| Column     | Type         | Null | Key    | Description  |
| ---------- | ------------ | ---- | ------ | ------------ |
| id         | BIGINT       | NO   | PK     | Primary Key  |
| name       | VARCHAR(100) | NO   | UNIQUE | Nama lokasi  |
| created_at | TIMESTAMP    | YES  | -      | Created Time |
| updated_at | TIMESTAMP    | YES  | -      | Updated Time |

---

## Validation Rules

| Field | Rule                      |
| ----- | ------------------------- |
| name  | required, unique, max:100 |

---

## Relationships

Location memiliki relasi:

```text
Location

↓

Lost Items

Location

↓

Found Items
```

---

## Business Rules

* Lokasi harus unik.
* Digunakan sebagai filter pencarian.
* Admin dapat mengelola daftar lokasi.

---

## Example Data

| id | name         |
| -- | ------------ |
| 1  | Kelas XI RPL |
| 2  | Perpustakaan |
| 3  | Lapangan     |
| 4  | Kantin       |
| 5  | Mushola      |

---

# Next Section

Bagian berikutnya akan membahas secara rinci:

* lost_items
* found_items

Kedua tabel ini merupakan inti dari sistem ReturnLy dan akan mencakup:

* Struktur kolom lengkap
* Relasi
* Validasi Laravel
* Business Rules
* Status Workflow
* Contoh data
* Catatan implementasi Eloquent

# 5.4 lost_items

## Description

Tabel **lost_items** digunakan untuk menyimpan seluruh laporan barang hilang yang dikirim oleh Guest (siswa/pengunjung).

Guest tidak perlu login untuk membuat laporan kehilangan.

Setiap laporan akan ditampilkan pada halaman **Barang Hilang** setelah diverifikasi oleh Admin (sesuai alur sistem yang telah dirancang).

---

## Purpose

Fungsi utama tabel ini adalah:

* Menyimpan laporan kehilangan.
* Menampilkan daftar barang hilang.
* Membantu pencarian barang.
* Menjadi referensi ketika barang telah ditemukan.

---

## Columns

| Column        | Type         | Null | Key | Description        |
| ------------- | ------------ | ---- | --- | ------------------ |
| id            | BIGINT       | NO   | PK  | Primary Key        |
| category_id   | BIGINT       | NO   | FK  | Kategori Barang    |
| location_id   | BIGINT       | NO   | FK  | Lokasi Kehilangan  |
| reporter_name | VARCHAR(100) | NO   | -   | Nama Pelapor       |
| class_name    | VARCHAR(50)  | YES  | -   | Kelas Pelapor      |
| phone_number  | VARCHAR(20)  | NO   | -   | Nomor WhatsApp     |
| item_name     | VARCHAR(150) | NO   | -   | Nama Barang        |
| description   | TEXT         | NO   | -   | Deskripsi Barang   |
| photo         | VARCHAR(255) | YES  | -   | Foto Barang        |
| lost_date     | DATE         | NO   | -   | Tanggal Kehilangan |
| status        | ENUM         | NO   | -   | Status Barang      |
| created_at    | TIMESTAMP    | YES  | -   | Waktu Dibuat       |
| updated_at    | TIMESTAMP    | YES  | -   | Waktu Diubah       |

---

## Relationships

```text
Category (1)
      │
      ▼
Lost Items (N)

Location (1)
      │
      ▼
Lost Items (N)
```

### Eloquent

```php
LostItem belongsTo Category

LostItem belongsTo Location
```

---

## Validation Rules

| Field         | Rule                      |
| ------------- | ------------------------- |
| reporter_name | required, string, max:100 |
| class_name    | nullable, string, max:50  |
| phone_number  | required, max:20          |
| item_name     | required, string, max:150 |
| description   | required                  |
| category_id   | required                  |
| location_id   | required                  |
| photo         | nullable, image           |
| lost_date     | required, date            |
| status        | required                  |

---

## Status Workflow

```text
Belum Ditemukan
        │
        ▼
Ditemukan
        │
        ▼
Selesai
```

---

## Business Rules

* Guest dapat membuat laporan tanpa login.
* Nomor WhatsApp wajib diisi.
* Foto barang bersifat opsional.
* Status awal selalu **Belum Ditemukan**.
* Status hanya dapat diubah oleh Admin.
* Barang yang sudah berstatus **Selesai** tidak dapat diedit.

---

## Example Record

| Field         | Value           |
| ------------- | --------------- |
| reporter_name | Ahmad           |
| class_name    | XI RPL 1        |
| phone_number  | 081234567890    |
| item_name     | Dompet Hitam    |
| category_id   | 3               |
| location_id   | 4               |
| lost_date     | 2026-06-20      |
| status        | Belum Ditemukan |

---

## Migration Notes

* Foreign Key ke `categories`.
* Foreign Key ke `locations`.
* Gunakan `cascadeOnUpdate()`.
* Gunakan `restrictOnDelete()` agar kategori/lokasi yang masih digunakan tidak dapat dihapus.

---

# 5.5 found_items

## Description

Tabel **found_items** digunakan untuk menyimpan laporan barang yang ditemukan oleh Guest.

Barang yang dilaporkan akan muncul pada halaman **Barang Ditemukan** setelah diverifikasi oleh Admin.

Barang inilah yang nantinya dapat diajukan klaim oleh pemiliknya.

---

## Purpose

* Menyimpan laporan barang ditemukan.
* Menampilkan daftar barang ditemukan.
* Menjadi sumber data proses klaim.
* Membantu proses pengembalian barang.

---

## Columns

| Column           | Type         | Null | Key | Description               |
| ---------------- | ------------ | ---- | --- | ------------------------- |
| id               | BIGINT       | NO   | PK  | Primary Key               |
| category_id      | BIGINT       | NO   | FK  | Kategori Barang           |
| location_id      | BIGINT       | NO   | FK  | Lokasi Penemuan           |
| finder_name      | VARCHAR(100) | NO   | -   | Nama Penemu               |
| class_name       | VARCHAR(50)  | YES  | -   | Kelas Penemu              |
| phone_number     | VARCHAR(20)  | NO   | -   | Nomor WhatsApp            |
| item_name        | VARCHAR(150) | NO   | -   | Nama Barang               |
| description      | TEXT         | NO   | -   | Deskripsi Barang          |
| photo            | VARCHAR(255) | YES  | -   | Foto Barang               |
| found_date       | DATE         | NO   | -   | Tanggal Ditemukan         |
| storage_location | VARCHAR(150) | YES  | -   | Tempat Penyimpanan Barang |
| status           | ENUM         | NO   | -   | Status Barang             |
| created_at       | TIMESTAMP    | YES  | -   | Waktu Dibuat              |
| updated_at       | TIMESTAMP    | YES  | -   | Waktu Diubah              |

---

## Relationships

```text
Category (1)
      │
      ▼
Found Items (N)

Location (1)
      │
      ▼
Found Items (N)

Found Item (1)
      │
      ▼
Claims (N)
```

### Eloquent

```php
FoundItem belongsTo Category

FoundItem belongsTo Location

FoundItem hasMany Claims
```

---

## Validation Rules

| Field            | Rule            |
| ---------------- | --------------- |
| finder_name      | required        |
| class_name       | nullable        |
| phone_number     | required        |
| item_name        | required        |
| description      | required        |
| category_id      | required        |
| location_id      | required        |
| photo            | nullable, image |
| found_date       | required        |
| storage_location | nullable        |
| status           | required        |

---

## Status Workflow

```text
Menunggu Pemilik
        │
        ▼
Diklaim
        │
        ▼
Dikembalikan
```

---

## Business Rules

* Guest dapat membuat laporan tanpa login.
* Status awal selalu **Menunggu Pemilik**.
* Barang dapat memiliki lebih dari satu pengajuan klaim.
* Hanya satu klaim yang dapat disetujui.
* Setelah barang dikembalikan, status berubah menjadi **Dikembalikan**.
* Barang dengan status **Dikembalikan** tidak dapat diklaim kembali.

---

## Example Record

| Field            | Value            |
| ---------------- | ---------------- |
| finder_name      | Budi             |
| class_name       | XI TKJ 2         |
| phone_number     | 081298765432     |
| item_name        | Botol Minum      |
| category_id      | 5                |
| location_id      | 2                |
| found_date       | 2026-06-19       |
| storage_location | Ruang BK         |
| status           | Menunggu Pemilik |

---

## Migration Notes

* Foreign Key ke `categories`.
* Foreign Key ke `locations`.
* Menjadi parent untuk tabel `claims`.
* Gunakan `cascadeOnUpdate()`.
* Gunakan `restrictOnDelete()`.

---

# Summary

| Table       | Status    |
| ----------- | --------- |
| admins      | ✅ Selesai |
| categories  | ✅ Selesai |
| locations   | ✅ Selesai |
| lost_items  | ✅ Selesai |
| found_items | ✅ Selesai |

---

# Next Section

Bagian berikutnya akan membahas:

* claims
* notifications
* activity_logs

Kemudian dilanjutkan dengan:

* Enum Values
* Foreign Keys
* Business Rules
* Migration Rules
* Seeder Rules
* Development Notes

# 5.6 claims

## Description

Tabel **claims** digunakan untuk menyimpan seluruh pengajuan klaim terhadap barang yang telah dilaporkan sebagai **barang ditemukan**.

Setiap pengajuan klaim akan diperiksa oleh Admin untuk menentukan apakah klaim tersebut valid atau tidak.

---

## Purpose

Fungsi utama tabel ini adalah:

* Menyimpan data pengajuan klaim.
* Menyimpan identitas pengklaim.
* Menyimpan alasan klaim.
* Menyimpan status proses klaim.

---

## Columns

| Column        | Type         | Null | Key | Description         |
| ------------- | ------------ | ---- | --- | ------------------- |
| id            | BIGINT       | NO   | PK  | Primary Key         |
| found_item_id | BIGINT       | NO   | FK  | Barang yang diklaim |
| claimer_name  | VARCHAR(100) | NO   | -   | Nama Pengklaim      |
| class_name    | VARCHAR(50)  | YES  | -   | Kelas Pengklaim     |
| phone_number  | VARCHAR(20)  | NO   | -   | Nomor WhatsApp      |
| reason        | TEXT         | NO   | -   | Alasan klaim        |
| status        | ENUM         | NO   | -   | Status klaim        |
| created_at    | TIMESTAMP    | YES  | -   | Waktu dibuat        |
| updated_at    | TIMESTAMP    | YES  | -   | Waktu diperbarui    |

---

## Relationships

```text
Found Item (1)
      │
      ▼
Claims (N)
```

### Eloquent

```php
Claim belongsTo FoundItem
```

---

## Validation Rules

| Field         | Rule                            |
| ------------- | ------------------------------- |
| found_item_id | required, exists:found_items,id |
| claimer_name  | required, string, max:100       |
| class_name    | nullable, string, max:50        |
| phone_number  | required, string, max:20        |
| reason        | required, string, min:10        |
| status        | required                        |

---

## Status Workflow

```text
Pending
   │
   ├────────────┐
   ▼            ▼
Disetujui    Ditolak
```

---

## Business Rules

* Guest dapat mengajukan klaim tanpa login.
* Satu barang dapat memiliki beberapa pengajuan klaim.
* Hanya satu klaim yang dapat disetujui.
* Jika satu klaim disetujui, Admin harus mengubah status barang menjadi **Diklaim** atau **Dikembalikan** sesuai proses bisnis.
* Alasan klaim menjadi dasar utama proses verifikasi.
* Foto bukti **tidak diwajibkan**, karena tidak semua pemilik memiliki foto barang.

---

## Example Record

| Field         | Value                                                      |
| ------------- | ---------------------------------------------------------- |
| found_item_id | 5                                                          |
| claimer_name  | Hisyam                                                     |
| class_name    | XI RPL 1                                                   |
| phone_number  | 081234567890                                               |
| reason        | Botol berwarna hitam dengan stiker Naruto di bagian bawah. |
| status        | Pending                                                    |

---

## Migration Notes

* Foreign Key ke `found_items`.
* Gunakan `cascadeOnUpdate()`.
* Gunakan `restrictOnDelete()`.

---

# 5.7 notifications

## Description

Tabel **notifications** digunakan untuk menyimpan riwayat notifikasi yang dibuat oleh sistem.

Notifikasi dapat digunakan untuk memberi informasi kepada Admin mengenai aktivitas penting, seperti adanya laporan baru atau klaim baru.

---

## Purpose

* Menyimpan pesan notifikasi.
* Menampilkan daftar notifikasi pada Dashboard Admin.
* Menandai apakah notifikasi sudah dibaca.

---

## Columns

| Column     | Type         | Null | Key | Description      |
| ---------- | ------------ | ---- | --- | ---------------- |
| id         | BIGINT       | NO   | PK  | Primary Key      |
| title      | VARCHAR(150) | NO   | -   | Judul notifikasi |
| message    | TEXT         | NO   | -   | Isi notifikasi   |
| is_read    | BOOLEAN      | NO   | -   | Status dibaca    |
| created_at | TIMESTAMP    | YES  | -   | Waktu dibuat     |
| updated_at | TIMESTAMP    | YES  | -   | Waktu diperbarui |

---

## Relationships

Tidak memiliki relasi langsung dengan tabel lain.

---

## Validation Rules

| Field   | Rule              |
| ------- | ----------------- |
| title   | required, max:150 |
| message | required          |
| is_read | boolean           |

---

## Business Rules

* Notifikasi dibuat oleh sistem.
* Admin dapat menandai notifikasi sebagai sudah dibaca.
* Notifikasi tidak dapat dibuat melalui halaman publik.

---

## Example Record

| Field   | Value                                            |
| ------- | ------------------------------------------------ |
| title   | Klaim Baru                                       |
| message | Terdapat pengajuan klaim baru untuk Botol Minum. |
| is_read | false                                            |

---

# 5.8 activity_logs

## Description

Tabel **activity_logs** digunakan untuk mencatat aktivitas yang dilakukan oleh Admin selama menggunakan sistem.

Riwayat ini membantu proses audit dan pelacakan perubahan data.

---

## Purpose

* Mencatat aktivitas Admin.
* Menampilkan riwayat aktivitas pada Dashboard.
* Membantu proses audit.

---

## Columns

| Column      | Type         | Null | Key | Description      |
| ----------- | ------------ | ---- | --- | ---------------- |
| id          | BIGINT       | NO   | PK  | Primary Key      |
| activity    | VARCHAR(255) | NO   | -   | Nama aktivitas   |
| description | TEXT         | YES  | -   | Detail aktivitas |
| created_at  | TIMESTAMP    | YES  | -   | Waktu aktivitas  |

> **Catatan:** Struktur tabel mengikuti ERD final yang telah disepakati. Tidak terdapat kolom `user_id` karena hanya Admin yang login dan identitas pengguna umum tidak disimpan sebagai akun.

---

## Relationships

Tidak memiliki relasi langsung.

---

## Validation Rules

| Field       | Rule              |
| ----------- | ----------------- |
| activity    | required, max:255 |
| description | nullable          |

---

## Business Rules

* Log dibuat otomatis oleh sistem.
* Tidak dapat diubah melalui dashboard.
* Digunakan sebagai histori aktivitas Admin.

---

## Example Record

| Field       | Value                                      |
| ----------- | ------------------------------------------ |
| activity    | Menyetujui Klaim                           |
| description | Admin menyetujui klaim untuk Found Item #5 |

---

# Summary

| Table         | Status |
| ------------- | ------ |
| admins        | ✅      |
| categories    | ✅      |
| locations     | ✅      |
| lost_items    | ✅      |
| found_items   | ✅      |
| claims        | ✅      |
| notifications | ✅      |
| activity_logs | ✅      |

---

# Next Section

Bagian terakhir akan membahas:

* Relationships Summary
* Enum Values
* Foreign Key Rules
* Migration Standards
* Seeder Standards
* Factory Standards
* Index Recommendation
* Business Rules
* Development Notes

Dokumen ini akan menjadi penutup `DATABASE.md` dan acuan implementasi Laravel 13.

# 6. Relationships Summary

Diagram relasi antar tabel:

```text
categories (1)
      │
      ├──────────────┐
      ▼              ▼
lost_items      found_items

locations (1)
      │
      ├──────────────┐
      ▼              ▼
lost_items      found_items

found_items (1)
      │
      ▼
claims
```

## Eloquent Relationships

### Category

```php
hasMany(LostItem::class)

hasMany(FoundItem::class)
```

---

### Location

```php
hasMany(LostItem::class)

hasMany(FoundItem::class)
```

---

### LostItem

```php
belongsTo(Category::class)

belongsTo(Location::class)
```

---

### FoundItem

```php
belongsTo(Category::class)

belongsTo(Location::class)

hasMany(Claim::class)
```

---

### Claim

```php
belongsTo(FoundItem::class)
```

---

# 7. Enum Values

## lost_items.status

| Value           | Description            |
| --------------- | ---------------------- |
| Belum Ditemukan | Laporan baru dibuat    |
| Ditemukan       | Barang telah ditemukan |
| Selesai         | Barang sudah kembali   |

---

## found_items.status

| Value            | Description                           |
| ---------------- | ------------------------------------- |
| Menunggu Pemilik | Barang belum diklaim                  |
| Diklaim          | Klaim disetujui                       |
| Dikembalikan     | Barang sudah diberikan kepada pemilik |

---

## claims.status

| Value     | Description         |
| --------- | ------------------- |
| Pending   | Menunggu verifikasi |
| Disetujui | Klaim diterima      |
| Ditolak   | Klaim ditolak       |

---

# 8. Foreign Key Rules

| Table       | Foreign Key   | Reference      |
| ----------- | ------------- | -------------- |
| lost_items  | category_id   | categories.id  |
| lost_items  | location_id   | locations.id   |
| found_items | category_id   | categories.id  |
| found_items | location_id   | locations.id   |
| claims      | found_item_id | found_items.id |

---

# 9. Migration Standards

Seluruh migration mengikuti standar Laravel 13.

## Rules

* Menggunakan Anonymous Migration.
* Menggunakan `foreignId()` untuk Foreign Key.
* Menggunakan `constrained()` jika sesuai dengan nama tabel.
* Menggunakan `cascadeOnUpdate()`.
* Menggunakan `restrictOnDelete()`.
* Menggunakan `timestamps()`.
* Tidak menggunakan soft delete kecuali ada kebutuhan baru.

---

## Example

```php
$table->foreignId('category_id')
      ->constrained('categories')
      ->cascadeOnUpdate()
      ->restrictOnDelete();
```

---

# 10. Seeder Standards

Seeder yang direkomendasikan:

```text
AdminSeeder

CategorySeeder

LocationSeeder

DatabaseSeeder
```

## AdminSeeder

Default Account

| Username | Password                |
| -------- | ----------------------- |
| admin    | admin123 (akan di-hash) |

> **Catatan:** Password hanya untuk lingkungan pengembangan. Pada deployment produksi, segera ubah password bawaan.

---

## CategorySeeder

Contoh data:

* Elektronik
* Dompet
* Tas
* Alat Tulis
* Botol Minum
* Aksesoris
* Pakaian
* Lainnya

---

## LocationSeeder

Contoh data:

* Perpustakaan
* Kantin
* Lapangan
* Mushola
* Ruang BK
* Aula
* Parkiran
* Koridor

---

# 11. Factory Standards

Factory bersifat opsional dan digunakan untuk kebutuhan testing.

Disarankan membuat:

* CategoryFactory
* LocationFactory
* LostItemFactory
* FoundItemFactory

Factory untuk `claims` dapat ditambahkan jika diperlukan saat pengujian.

---

# 12. Index Recommendation

Kolom yang disarankan menggunakan index:

| Table       | Column        |
| ----------- | ------------- |
| lost_items  | status        |
| lost_items  | category_id   |
| lost_items  | location_id   |
| found_items | status        |
| found_items | category_id   |
| found_items | location_id   |
| claims      | status        |
| claims      | found_item_id |

---

# 13. File Upload Rules

Foto barang mengikuti aturan berikut:

## Allowed File

* JPG
* JPEG
* PNG
* WEBP

---

## Maximum Size

```text
2 MB
```

---

## Storage

```text
storage/app/public/items
```

---

## Access

```bash
php artisan storage:link
```

---

# 14. Business Rules

## Guest

Guest dapat:

* Melihat Barang Hilang.
* Melihat Barang Ditemukan.
* Melaporkan Barang Hilang.
* Melaporkan Barang Ditemukan.
* Mengajukan Klaim.
* Melihat Status Klaim.

Guest **tidak memiliki akun** dan **tidak perlu login**.

---

## Admin

Admin dapat:

* Login.
* Mengelola Barang Hilang.
* Mengelola Barang Ditemukan.
* Mengelola Kategori.
* Mengelola Lokasi.
* Memverifikasi Klaim.
* Melihat Statistik.
* Logout.

---

## Lost Item

* Dibuat oleh Guest.
* Status awal: **Belum Ditemukan**.
* Hanya Admin yang dapat mengubah status.

---

## Found Item

* Dibuat oleh Guest.
* Status awal: **Menunggu Pemilik**.
* Menjadi objek utama pada proses klaim.

---

## Claim

* Guest dapat mengajukan klaim tanpa login.
* Alasan klaim menjadi dasar verifikasi.
* Satu barang dapat memiliki banyak klaim.
* Hanya satu klaim yang dapat disetujui.

---

# 15. Development Rules

Selama pengembangan database wajib mengikuti aturan berikut:

* Mengikuti ERD resmi proyek.
* Tidak membuat tabel `users`.
* Hanya tabel `admins` yang digunakan untuk autentikasi.
* Menggunakan konvensi penamaan Laravel (`category_id`, `location_id`, `found_item_id`).
* Menggunakan Eloquent Relationship.
* Menggunakan Laravel Migration.
* Menggunakan Validation pada setiap input.
* Menggunakan Foreign Key Constraint.
* Tidak menambahkan tabel atau kolom di luar ruang lingkup proyek tanpa revisi dokumentasi.

---

# 16. Database Checklist

* [ ] Migration selesai
* [ ] Foreign Key selesai
* [ ] Seeder selesai
* [ ] Factory selesai
* [ ] Model selesai
* [ ] Relationship selesai
* [ ] Validation selesai
* [ ] File Upload selesai
* [ ] Testing selesai

---

# Version

```text
DATABASE.md

Version : 1.0.0

Status : Final
```

