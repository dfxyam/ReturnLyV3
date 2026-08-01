# COMPONENTS.md

# ReturnLy Component Documentation

> Version 1.0

Dokumen ini mendefinisikan seluruh komponen UI yang digunakan dalam aplikasi ReturnLy. Seluruh komponen harus digunakan secara konsisten pada setiap halaman untuk menjaga keseragaman tampilan dan mempermudah pengembangan.

---

# Table of Contents

1. Overview
2. Design Tokens
3. Layout Components
4. Navigation Components
5. Data Display Components
6. Form Components
7. Feedback Components
8. Business Components
9. Admin Components
10. Responsive Rules
11. Accessibility Rules
12. Naming Convention
13. Version

---

# 1. Overview

ReturnLy menggunakan pendekatan **Component-Based Design**.

Artinya, setiap halaman dibangun dari kumpulan komponen yang dapat digunakan kembali (Reusable Components).

Keuntungan:

* Konsisten
* Mudah dirawat
* Mudah dikembangkan
* Mengurangi duplikasi kode
* Mempercepat proses development

---

## Component Principles

Seluruh komponen harus memenuhi prinsip berikut:

### Reusable

Komponen dapat digunakan di banyak halaman.

Contoh:

* Button
* Card
* Input
* Badge

---

### Consistent

Setiap komponen memiliki:

* Warna
* Border Radius
* Shadow
* Typography
* Spacing

yang sama di seluruh aplikasi.

---

### Responsive

Semua komponen harus bekerja dengan baik pada:

* Mobile
* Tablet
* Desktop

---

### Accessible

Komponen wajib:

* Mendukung keyboard navigation.
* Memiliki focus state.
* Memiliki kontras warna yang baik.
* Menggunakan label yang jelas untuk form.

---

# 2. Design Tokens

Design Token adalah nilai dasar yang digunakan oleh seluruh komponen.

---

## Color Palette

### Primary

```text
Emerald
```

Digunakan untuk:

* Primary Button
* Active Menu
* Link
* Badge Success

---

### Secondary

```text
Slate
```

Digunakan untuk:

* Background
* Border
* Text Secondary

---

### Success

```text
Green
```

---

### Warning

```text
Amber
```

---

### Danger

```text
Red
```

---

### Info

```text
Blue
```

---

## Border Radius

| Size        | Value |
| ----------- | ----- |
| Small       | 8px   |
| Medium      | 12px  |
| Large       | 16px  |
| Extra Large | 24px  |

---

## Shadow

Gunakan shadow ringan.

Hindari shadow yang terlalu tebal.

Contoh:

```text
shadow-sm

shadow-md
```

---

## Spacing

Menggunakan sistem **8px Grid**.

Contoh:

| Token | Value |
| ----- | ----: |
| XS    |   4px |
| SM    |   8px |
| MD    |  16px |
| LG    |  24px |
| XL    |  32px |
| XXL   |  48px |

---

## Typography

### Font

```text
Poppins
```

---

### Font Weight

| Weight | Usage    |
| ------ | -------- |
| 400    | Body     |
| 500    | Label    |
| 600    | Subtitle |
| 700    | Heading  |

---

## Icon Library

Menggunakan:

```text
Heroicons
```

---

# 3. Layout Components

Layout Components digunakan sebagai kerangka dasar halaman.

---

# 3.1 App Layout

## Purpose

Layout utama untuk halaman Guest.

---

## Structure

```text
Navbar

↓

Main Content

↓

Footer
```

---

## Used By

* Home
* Lost Items
* Found Items
* Detail Barang
* Report
* Claim
* Claim Status

---

# 3.2 Dashboard Layout

## Purpose

Layout utama untuk halaman Admin.

---

## Structure

```text
Sidebar

│

Topbar

↓

Content Area
```

---

## Used By

* Dashboard
* Barang Hilang
* Barang Ditemukan
* Klaim
* Kategori
* Lokasi
* Statistik

---

# 3.3 Container

## Purpose

Menjaga lebar konten tetap konsisten.

---

## Max Width

| Device  | Width  |
| ------- | ------ |
| Mobile  | 100%   |
| Tablet  | 768px  |
| Desktop | 1280px |

---

## Padding

| Device  | Padding |
| ------- | ------- |
| Mobile  | 16px    |
| Tablet  | 24px    |
| Desktop | 32px    |

---

# 3.4 Section

## Purpose

Memisahkan setiap blok konten dalam halaman.

---

## Rules

* Memiliki margin atas dan bawah yang konsisten.
* Menggunakan heading sebelum isi section.
* Tidak menumpuk terlalu rapat.

---

## Example

```text
Hero Section

↓

Latest Lost Items

↓

Latest Found Items

↓

How It Works
```

---

# Layout Guidelines

Semua halaman wajib:

* Menggunakan Container.
* Menggunakan Section.
* Menggunakan spacing yang konsisten.
* Tidak menempel langsung ke tepi layar.

---

# Next Section

Bagian berikutnya akan membahas:

* Navbar
* Sidebar
* Topbar
* Breadcrumb
* Footer

yang menjadi komponen navigasi utama pada ReturnLy.

# 4. Navigation Components

Navigation Components digunakan untuk membantu pengguna berpindah antar halaman dengan mudah dan konsisten.

---

# 4.1 Navbar

## Purpose

Navbar merupakan navigasi utama pada seluruh halaman Guest.

Navbar harus selalu berada di bagian atas halaman dan tetap konsisten di seluruh aplikasi.

---

## Used By

* Home
* Lost Items
* Lost Item Detail
* Found Items
* Found Item Detail
* Report Lost Item
* Report Found Item
* Claim Item
* Claim Status

---

## Structure

```text
+------------------------------------------------------+
| Logo | Home | Barang Hilang | Barang Ditemukan |     |
|       Status Klaim | Lapor Barang ▼                |
+------------------------------------------------------+
```

---

## Components

* Logo
* Navigation Menu
* Dropdown Menu
* Mobile Menu Button

---

## Navigation Items

| Menu             | Route         |
| ---------------- | ------------- |
| Home             | /             |
| Barang Hilang    | /lost-items   |
| Barang Ditemukan | /found-items  |
| Status Klaim     | /claim-status |

---

## Dropdown Menu

Menu **Lapor Barang** berisi:

* Lapor Barang Hilang
* Lapor Barang Ditemukan

---

## Active State

Menu aktif menggunakan:

* Primary Color
* Font Semi Bold
* Bottom Border (Desktop)

---

## Mobile Behavior

Pada Mobile:

Navbar berubah menjadi:

```text
Logo

☰
```

Ketika tombol ditekan:

```text
Home

Barang Hilang

Barang Ditemukan

Status Klaim

Lapor Barang Hilang

Lapor Barang Ditemukan
```

---

## Rules

* Navbar selalu berada di atas.
* Tinggi konsisten.
* Tidak berubah antar halaman.

---

# 4.2 Sidebar

## Purpose

Sidebar digunakan pada seluruh halaman Dashboard Admin.

---

## Used By

* Dashboard
* Barang Hilang
* Barang Ditemukan
* Klaim
* Kategori
* Lokasi
* Statistik

---

## Structure

```text
LOGO

Dashboard

Barang Hilang

Barang Ditemukan

Klaim

Kategori

Lokasi

Statistik

------------------

Logout
```

---

## Components

* Logo
* Menu List
* Menu Icon
* Active Indicator
* Logout Button

---

## Active State

Menu aktif menggunakan:

* Background Primary
* Text Putih
* Rounded Corner

---

## Mobile Behavior

Sidebar berubah menjadi Drawer.

---

## Desktop Width

```text
280px
```

---

## Rules

* Hanya tampil pada halaman Admin.
* Tidak boleh muncul pada halaman Guest.
* Menu Logout selalu berada di bagian bawah Sidebar.

---

# 4.3 Topbar

## Purpose

Menampilkan informasi halaman dan identitas Admin.

---

## Used By

Seluruh halaman Dashboard.

---

## Structure

```text
Judul Halaman

                 🔔 Admin ▼
```

---

## Components

* Page Title
* Notification Button
* Admin Dropdown

---

## Notification Button

Menampilkan:

* Badge jumlah notifikasi baru.
* Dropdown notifikasi ketika diklik.

---

## Admin Dropdown

Berisi:

* Username Admin
* Logout

---

## Rules

* Topbar selalu berada di atas area konten.
* Judul halaman mengikuti halaman aktif.

---

# 4.4 Breadcrumb

## Purpose

Membantu pengguna mengetahui posisi halaman saat ini.

---

## Used By

* Lost Item Detail
* Found Item Detail
* Claim Item
* Seluruh halaman CRUD Admin

---

## Example

Guest:

```text
Home

>

Barang Hilang

>

Detail Barang
```

---

Admin:

```text
Dashboard

>

Barang Hilang

>

Detail
```

---

## Rules

* Selalu dimulai dari halaman utama.
* Halaman aktif tidak dapat diklik.

---

# 4.5 Footer

## Purpose

Footer menampilkan informasi aplikasi.

---

## Used By

Seluruh halaman Guest.

---

## Structure

```text
Logo

Deskripsi

Copyright

Version
```

---

## Components

* Logo
* Short Description
* Copyright
* Application Version

---

## Content

Contoh:

```text
ReturnLy

Lost & Found System

SMK XXXXX

Version 1.0.0
```

---

## Rules

* Footer hanya digunakan pada halaman Guest.
* Tidak digunakan pada Dashboard Admin.
* Selalu berada di bagian bawah halaman.

---

# Navigation Guidelines

Seluruh Navigation Component wajib mengikuti aturan berikut:

* Konsisten pada setiap halaman.
* Menggunakan ikon Heroicons.
* Memiliki Hover State.
* Memiliki Focus State.
* Memiliki Active State.
* Mendukung navigasi keyboard.
* Responsive pada Mobile, Tablet, dan Desktop.

---

# Component Summary

| Component  | Guest | Admin |
| ---------- | :---: | :---: |
| Navbar     |   ✅   |   ❌   |
| Sidebar    |   ❌   |   ✅   |
| Topbar     |   ❌   |   ✅   |
| Breadcrumb |   ✅   |   ✅   |
| Footer     |   ✅   |   ❌   |

---

# Next Section

Bagian berikutnya akan membahas **Form Components**, meliputi:

* Primary Button
* Secondary Button
* Icon Button
* Input
* Textarea
* Select
* Search Box
* Image Upload
* Date Picker
* Validation Message

# 5. Form Components

Form Components digunakan untuk menerima input dari pengguna secara konsisten di seluruh aplikasi ReturnLy.

---

# 5.1 Primary Button

## Purpose

Tombol utama untuk aksi yang paling penting pada halaman.

---

## Used By

* Login Admin
* Kirim Laporan
* Ajukan Klaim
* Simpan Data
* Update Data

---

## Style

Background:

```text
Primary (Emerald)
```

Text:

```text
White
```

Border Radius:

```text
12px
```

---

## Sizes

| Size   | Height |
| ------ | ------ |
| Small  | 36px   |
| Medium | 44px   |
| Large  | 52px   |

---

## States

### Default

Button aktif.

---

### Hover

Background sedikit lebih gelap.

---

### Focus

Menampilkan focus ring.

---

### Disabled

* Warna lebih redup.
* Cursor `not-allowed`.

---

### Loading

Button menampilkan:

```text
⏳ Loading...
```

Button tidak dapat ditekan.

---

## Rules

* Hanya satu Primary Button dalam satu section utama.
* Gunakan untuk aksi utama.

---

# 5.2 Secondary Button

## Purpose

Digunakan untuk aksi pendukung.

---

## Used By

* Batal
* Kembali
* Reset Filter

---

## Style

* Background putih
* Border Primary
* Text Primary

---

## States

* Default
* Hover
* Focus
* Disabled

---

# 5.3 Danger Button

## Purpose

Digunakan untuk aksi yang bersifat destruktif.

---

## Used By

* Hapus Data
* Tolak Klaim

---

## Style

Background:

```text
Red
```

Text:

```text
White
```

---

## Rules

Selalu disertai dialog konfirmasi sebelum aksi dijalankan.

---

# 5.4 Icon Button

## Purpose

Menampilkan aksi menggunakan ikon.

---

## Used By

* Refresh
* Search
* Notification
* Menu Mobile

---

## Rules

* Selalu memiliki Tooltip.
* Ukuran ikon konsisten.

---

# 5.5 Text Input

## Purpose

Input teks satu baris.

---

## Used By

* Nama
* Username
* Nomor Klaim
* Nama Barang
* Lokasi Penyimpanan

---

## Style

* Border tipis
* Radius 12px
* Padding konsisten

---

## States

### Default

Border abu-abu.

---

### Focus

Border Primary.

---

### Error

Border merah.

Validation Message tampil di bawah input.

---

### Disabled

Background abu-abu terang.

---

# 5.6 Textarea

## Purpose

Input teks panjang.

---

## Used By

* Deskripsi Barang
* Alasan Klaim

---

## Height

Default:

```text
120px
```

Resizable:

```text
Vertical Only
```

---

## Rules

* Tidak boleh terlalu kecil.
* Memiliki placeholder yang jelas.

---

# 5.7 Select

## Purpose

Memilih satu data dari daftar.

---

## Used By

* Kategori
* Lokasi
* Status

---

## States

* Default
* Hover
* Focus
* Error
* Disabled

---

## Rules

Jika belum dipilih:

```text
Pilih...
```

---

# 5.8 Search Box

## Purpose

Mencari data.

---

## Used By

Guest:

* Barang Hilang
* Barang Ditemukan

Admin:

* Dashboard
* Barang Hilang
* Barang Ditemukan
* Klaim
* Kategori
* Lokasi

---

## Components

* Search Icon
* Input

---

## Placeholder

Contoh:

```text
Cari nama barang...
```

---

# 5.9 Image Upload

## Purpose

Mengunggah foto barang.

---

## Used By

* Report Lost Item
* Report Found Item
* Edit Barang (Admin)

---

## Supported Format

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

## Features

* Drag & Drop (Desktop)
* Klik untuk memilih file
* Preview gambar
* Hapus gambar sebelum upload

---

## Empty State

```text
Klik atau seret gambar ke sini.
```

---

# 5.10 Date Picker

## Purpose

Memilih tanggal kehilangan atau penemuan barang.

---

## Used By

* Report Lost Item
* Report Found Item

---

## Rules

* Tidak boleh memilih tanggal di masa depan.
* Format tanggal mengikuti lokal Indonesia.

Contoh:

```text
28 Juni 2026
```

---

# 5.11 Validation Message

## Purpose

Menampilkan pesan kesalahan pada input.

---

## Style

* Warna merah.
* Ukuran teks lebih kecil dari input.

---

## Example

```text
Nama barang wajib diisi.
```

```text
Nomor WhatsApp tidak valid.
```

---

# Form Guidelines

Seluruh Form Component wajib mengikuti aturan berikut:

* Memiliki Label.
* Memiliki Placeholder bila diperlukan.
* Memiliki Focus State.
* Memiliki Error State.
* Menggunakan Validation Message.
* Mendukung navigasi keyboard.

---

# Component Summary

| Component          | Guest | Admin |
| ------------------ | :---: | :---: |
| Primary Button     |   ✅   |   ✅   |
| Secondary Button   |   ✅   |   ✅   |
| Danger Button      |   ❌   |   ✅   |
| Icon Button        |   ✅   |   ✅   |
| Text Input         |   ✅   |   ✅   |
| Textarea           |   ✅   |   ✅   |
| Select             |   ✅   |   ✅   |
| Search Box         |   ✅   |   ✅   |
| Image Upload       |   ✅   |   ✅   |
| Date Picker        |   ✅   |   ✅   |
| Validation Message |   ✅   |   ✅   |

---

# Next Section

Bagian berikutnya akan membahas **Data Display Components**, meliputi:

* Item Card
* Statistic Card
* Badge
* Data Table
* Empty State
* Skeleton Loader
* Pagination
* Avatar (Admin)

# 6. Data Display Components

Data Display Components digunakan untuk menampilkan informasi secara jelas, konsisten, dan mudah dipahami.

---

# 6.1 Item Card

## Purpose

Menampilkan ringkasan informasi barang pada halaman publik.

---

## Used By

- Barang Hilang
- Barang Ditemukan
- Related Items

---

## Structure

```text
┌──────────────────────────────┐
│            Foto              │
├──────────────────────────────┤
│ Badge Status                 │
│ Nama Barang                  │
│ Kategori                     │
│ Lokasi                       │
│ Tanggal                      │
│                              │
│        Lihat Detail          │
└──────────────────────────────┘
```

---

## Components

- Image
- Status Badge
- Item Name
- Category
- Location
- Date
- Detail Button

---

## Rules

- Tinggi Card harus konsisten.
- Gambar menggunakan rasio 4:3.
- Nama barang maksimal 2 baris.
- Jika tidak ada foto gunakan Placeholder Image.

---

## Hover State

- Shadow meningkat.
- Sedikit terangkat (translateY kecil).
- Cursor menjadi pointer.

---

# 6.2 Statistic Card

## Purpose

Menampilkan ringkasan statistik pada Dashboard.

---

## Used By

Dashboard Admin

---

## Structure

```text
┌───────────────────────┐
│ 📦                    │
│ Total Barang Hilang   │
│ 128                   │
└───────────────────────┘
```

---

## Components

- Icon
- Title
- Total Value

---

## Statistics

- Total Barang Hilang
- Total Barang Ditemukan
- Total Klaim
- Barang Dikembalikan

---

## Rules

- Semua Card memiliki ukuran yang sama.
- Menggunakan ikon Heroicons.
- Tidak menampilkan data yang terlalu panjang.

---

# 6.3 Badge

## Purpose

Menampilkan status data secara visual.

---

## Used By

- Item Card
- Table
- Detail Barang
- Dashboard

---

## Badge Types

### Lost

Background:

Red

Text:

White

---

### Waiting Owner

Background:

Amber

Text:

White

---

### Claimed

Background:

Blue

Text:

White

---

### Returned

Background:

Green

Text:

White

---

### Pending

Background:

Amber

Text:

White

---

### Approved

Background:

Green

Text:

White

---

### Rejected

Background:

Red

Text:

White

---

## Rules

- Badge selalu menggunakan huruf kapital di awal kata (Title Case).
- Tidak menggunakan ALL CAPS.
- Lebar mengikuti isi teks.

---

# 6.4 Data Table

## Purpose

Menampilkan data dalam bentuk tabel pada Dashboard Admin.

---

## Used By

- Barang Hilang
- Barang Ditemukan
- Klaim
- Kategori
- Lokasi

---

## Features

- Search
- Filter
- Pagination
- Responsive
- Sorting (opsional)

---

## Table Header

Menggunakan Background Slate.

---

## Table Row

Hover:

Background sedikit berubah.

---

## Action Column

Menggunakan Icon Button.

Contoh:

👁 Detail

✏ Edit

🗑 Hapus

---

## Empty State

```text
Belum ada data.
```

---

## Loading State

Skeleton Table.

---

## Responsive

Mobile:

Table dapat di-scroll horizontal.

---

# 6.5 Pagination

## Purpose

Navigasi antar halaman data.

---

## Used By

- Barang Hilang
- Barang Ditemukan
- Klaim
- Kategori
- Lokasi

---

## Components

- Previous
- Page Number
- Next

---

## Rules

- Halaman aktif menggunakan warna Primary.
- Tombol Previous/Next dinonaktifkan jika tidak tersedia.

---

# 6.6 Empty State

## Purpose

Menampilkan kondisi ketika tidak ada data.

---

## Used By

Seluruh halaman.

---

## Structure

```text
📭

Belum ada data.

[Refresh]
```

---

## Components

- Illustration
- Title
- Description
- Optional Action Button

---

## Example

Barang Hilang:

```text
Belum ada laporan barang hilang.
```

Barang Ditemukan:

```text
Belum ada laporan barang ditemukan.
```

Klaim:

```text
Belum ada pengajuan klaim.
```

---

# 6.7 Skeleton Loader

## Purpose

Memberikan indikasi bahwa data sedang dimuat.

---

## Used By

- Dashboard
- Item List
- Detail Barang
- Table
- Statistics

---

## Types

### Card Skeleton

Placeholder untuk Item Card.

---

### Table Skeleton

Placeholder untuk Data Table.

---

### Detail Skeleton

Placeholder untuk halaman Detail.

---

### Statistic Skeleton

Placeholder untuk Dashboard Card.

---

## Rules

- Menggunakan animasi shimmer.
- Ukuran mengikuti komponen asli.

---

# 6.8 Avatar

## Purpose

Menampilkan identitas Admin pada Topbar.

---

## Used By

Dashboard Admin

---

## Components

- Initial Avatar (huruf pertama username) atau foto jika suatu saat ditambahkan.
- Username

---

## Rules

Karena ReturnLy hanya memiliki satu jenis pengguna (Admin), Avatar cukup sederhana.

Jika foto profil tidak tersedia, gunakan lingkaran dengan inisial nama Admin.

---

# Data Display Guidelines

Seluruh Data Display Component wajib:

- Konsisten menggunakan Card Layout.
- Menggunakan Badge untuk Status.
- Memiliki Empty State.
- Memiliki Loading State.
- Responsive di semua perangkat.
- Tidak menampilkan data yang berlebihan.

---

# Component Summary

| Component | Guest | Admin |
|-----------|:-----:|:-----:|
| Item Card | ✅ | ❌ |
| Statistic Card | ❌ | ✅ |
| Badge | ✅ | ✅ |
| Data Table | ❌ | ✅ |
| Pagination | ✅ | ✅ |
| Empty State | ✅ | ✅ |
| Skeleton Loader | ✅ | ✅ |
| Avatar | ❌ | ✅ |

---

# Next Section

Bagian berikutnya akan membahas **Feedback Components**, meliputi:

- Alert
- Toast Notification
- Modal
- Confirmation Dialog
- Loading Indicator
- Progress Indicator

# 7. Feedback Components

Feedback Components digunakan untuk memberikan informasi kepada pengguna mengenai hasil suatu proses, baik berhasil, gagal, maupun sedang diproses.

---

# 7.1 Alert

## Purpose

Menampilkan informasi penting secara langsung pada halaman.

---

## Used By

- Login Admin
- Form Laporan
- Form Klaim
- Dashboard Admin

---

## Alert Types

### Success

Digunakan ketika proses berhasil.

Contoh:

```text
Laporan berhasil dikirim.
```

---

### Warning

Digunakan untuk memberikan peringatan.

Contoh:

```text
Pastikan data yang Anda masukkan sudah benar.
```

---

### Danger

Digunakan ketika terjadi kesalahan.

Contoh:

```text
Terjadi kesalahan saat menyimpan data.
```

---

### Info

Digunakan untuk informasi umum.

Contoh:

```text
Admin akan memverifikasi laporan sebelum dipublikasikan.
```

---

## Components

- Icon
- Title (Opsional)
- Message

---

## Rules

- Gunakan ikon sesuai jenis Alert.
- Jangan gunakan Alert untuk notifikasi singkat (gunakan Toast).

---

# 7.2 Toast Notification

## Purpose

Menampilkan notifikasi singkat tanpa mengganggu aktivitas pengguna.

---

## Used By

- Dashboard Admin
- Login
- CRUD
- Pengiriman Laporan
- Pengiriman Klaim

---

## Position

Desktop

```text
Top Right
```

---

Mobile

```text
Top Center
```

---

## Duration

```text
3–5 Detik
```

Toast dapat ditutup secara manual.

---

## Toast Types

### Success

Contoh:

```text
Data berhasil disimpan.
```

---

### Error

Contoh:

```text
Gagal menyimpan data.
```

---

### Warning

Contoh:

```text
Data belum lengkap.
```

---

### Info

Contoh:

```text
Verifikasi sedang diproses.
```

---

## Rules

- Maksimal satu Toast aktif dalam satu waktu.
- Tidak menutupi elemen penting pada halaman.

---

# 7.3 Modal

## Purpose

Menampilkan informasi atau formulir tanpa berpindah halaman.

---

## Used By

- Detail Barang (Admin)
- Detail Klaim
- Tambah Kategori
- Edit Kategori
- Tambah Lokasi
- Edit Lokasi

---

## Structure

```text
+------------------------------+
| Judul                        |
|------------------------------|
| Isi                          |
|                              |
|          Footer              |
+------------------------------+
```

---

## Components

- Header
- Body
- Footer
- Close Button

---

## Rules

- Klik area di luar Modal dapat menutup Modal (opsional).
- Tombol ESC dapat menutup Modal.
- Fokus keyboard tetap berada di dalam Modal (Focus Trap).

---

# 7.4 Confirmation Dialog

## Purpose

Memastikan pengguna benar-benar ingin melakukan aksi yang bersifat penting atau tidak dapat dibatalkan.

---

## Used By

- Hapus Data
- Setujui Klaim
- Tolak Klaim
- Logout

---

## Structure

```text
+----------------------------------+
| Konfirmasi                       |
|----------------------------------|
| Apakah Anda yakin?               |
|                                  |
| [Batal]     [Ya, Lanjutkan]      |
+----------------------------------+
```

---

## Components

- Icon
- Title
- Message
- Cancel Button
- Confirm Button

---

## Examples

### Delete

```text
Apakah Anda yakin ingin menghapus data ini?

Data yang dihapus tidak dapat dikembalikan.
```

---

### Approve Claim

```text
Setujui klaim ini?

Status barang akan diperbarui.
```

---

### Reject Claim

```text
Tolak klaim ini?

Keputusan ini dapat memengaruhi proses pengembalian barang.
```

---

### Logout

```text
Apakah Anda yakin ingin keluar dari Dashboard?
```

---

## Rules

- Tombol **Batal** selalu berada di sebelah kiri.
- Tombol aksi utama menggunakan warna sesuai konteks (Primary atau Danger).

---

# 7.5 Loading Indicator

## Purpose

Menunjukkan bahwa sistem sedang memproses suatu permintaan.

---

## Used By

- Login
- Submit Form
- Dashboard
- CRUD
- Search
- Filter

---

## Types

### Button Loading

Contoh:

```text
⏳ Menyimpan...
```

---

### Page Loading

Skeleton Loader.

---

### Table Loading

Skeleton Table.

---

## Rules

- Selama proses berlangsung, tombol dinonaktifkan.
- Jangan gunakan loading lebih dari yang diperlukan.

---

# 7.6 Progress Indicator

## Purpose

Menampilkan tahapan proses yang sedang berlangsung.

---

## Used By

- Status Klaim

---

## Structure

```text
Klaim Dikirim

↓

Menunggu Verifikasi

↓

Disetujui
```

atau

```text
Klaim Dikirim

↓

Menunggu Verifikasi

↓

Ditolak
```

---

## Status

- Pending
- Disetujui
- Ditolak

---

## Rules

- Tahapan aktif menggunakan warna Primary.
- Tahapan selesai menggunakan warna Success.
- Tahapan gagal menggunakan warna Danger.

---

# Feedback Guidelines

Seluruh Feedback Component wajib:

- Memberikan pesan yang jelas.
- Menggunakan bahasa sederhana.
- Konsisten menggunakan ikon.
- Tidak menampilkan pesan teknis kepada pengguna.
- Memiliki warna yang sesuai dengan konteks.

---

# Component Summary

| Component | Guest | Admin |
|-----------|:-----:|:-----:|
| Alert | ✅ | ✅ |
| Toast Notification | ✅ | ✅ |
| Modal | ❌ | ✅ |
| Confirmation Dialog | ❌ | ✅ |
| Loading Indicator | ✅ | ✅ |
| Progress Indicator | ✅ | ✅ |

---

# Next Section

Bagian berikutnya akan membahas **Business Components**, yaitu komponen yang dibuat khusus untuk kebutuhan ReturnLy, seperti:

- Lost Item Card
- Found Item Card
- Claim Summary Card
- Claim Timeline
- Status Badge Group
- Report Information Box

# 8. Business Components

Business Components merupakan komponen khusus yang hanya digunakan pada aplikasi ReturnLy.

Komponen ini merepresentasikan proses bisnis utama, seperti laporan barang hilang, barang ditemukan, dan pengajuan klaim.

---

# 8.1 Lost Item Card

## Purpose

Menampilkan ringkasan laporan barang hilang pada halaman publik.

---

## Used By

- Lost Items
- Related Items

---

## Structure

```text
┌──────────────────────────────┐
│            Foto              │
├──────────────────────────────┤
│ 🔴 Belum Ditemukan           │
│ Dompet Hitam                 │
│ Kategori : Dompet            │
│ Lokasi : Kantin              │
│ Hilang : 20 Juni 2026        │
│                              │
│      Lihat Detail            │
└──────────────────────────────┘
```

---

## Components

- Item Image
- Status Badge
- Item Name
- Category
- Lost Location
- Lost Date
- Detail Button

---

## Rules

- Tinggi Card harus konsisten.
- Nama maksimal dua baris.
- Gunakan Placeholder Image jika foto tidak tersedia.

---

# 8.2 Found Item Card

## Purpose

Menampilkan ringkasan barang yang ditemukan.

---

## Used By

- Found Items
- Related Items

---

## Structure

```text
┌──────────────────────────────┐
│            Foto              │
├──────────────────────────────┤
│ 🟡 Menunggu Pemilik          │
│ Botol Minum                  │
│ Kategori : Botol             │
│ Lokasi : Perpustakaan        │
│ Ditemukan : 18 Juni 2026     │
│                              │
│      Lihat Detail            │
└──────────────────────────────┘
```

---

## Components

- Item Image
- Status Badge
- Item Name
- Category
- Found Location
- Found Date
- Detail Button

---

## Business Rules

Status yang dapat ditampilkan:

- Menunggu Pemilik
- Diklaim
- Dikembalikan

---

# 8.3 Item Detail Card

## Purpose

Menampilkan informasi lengkap mengenai barang.

---

## Used By

- Lost Item Detail
- Found Item Detail

---

## Components

- Foto Barang
- Nama Barang
- Status
- Kategori
- Lokasi
- Tanggal
- Deskripsi

---

## Optional Information

Khusus Barang Ditemukan:

- Lokasi Penyimpanan

---

## Rules

- Foto ditampilkan di bagian atas (Mobile) atau kiri (Desktop).
- Status selalu terlihat di bagian atas informasi.

---

# 8.4 Claim Summary Card

## Purpose

Menampilkan ringkasan barang yang akan diklaim.

---

## Used By

- Claim Item

---

## Components

- Foto Barang
- Nama Barang
- Kategori
- Lokasi Penemuan
- Status

---

## Rules

- Bersifat Read Only.
- Tidak dapat diedit oleh pengguna.

---

# 8.5 Claim Timeline

## Purpose

Menampilkan perkembangan proses klaim.

---

## Used By

- Claim Status

---

## Timeline

```text
Klaim Dikirim

↓

Menunggu Verifikasi

↓

Disetujui
```

atau

```text
Klaim Dikirim

↓

Menunggu Verifikasi

↓

Ditolak
```

---

## Status

| Status | Warna |
|---------|--------|
| Pending | Amber |
| Disetujui | Green |
| Ditolak | Red |

---

## Rules

- Timeline selalu vertikal.
- Tahapan aktif diberi highlight.

---

# 8.6 Report Information Box

## Purpose

Memberikan informasi sebelum pengguna mengirim laporan.

---

## Used By

- Report Lost Item
- Report Found Item

---

## Example

Barang Hilang

```text
Pastikan informasi yang Anda masukkan benar agar memudahkan proses pencarian barang.
```

---

Barang Ditemukan

```text
Berikan deskripsi yang jelas agar pemilik dapat mengenali barangnya.
```

---

## Style

- Background Info
- Border kiri menggunakan warna Primary
- Icon informasi

---

# 8.7 Claim Information Box

## Purpose

Memberikan petunjuk sebelum pengguna mengirim klaim.

---

## Used By

- Claim Item

---

## Example

```text
Jelaskan ciri khas barang yang hanya diketahui oleh pemilik agar Admin dapat melakukan verifikasi dengan lebih mudah.
```

---

## Rules

- Selalu muncul di atas tombol Kirim Klaim.
- Tidak dapat ditutup (non-dismissible).

---

# 8.8 Status Badge Group

## Purpose

Standarisasi seluruh badge status yang digunakan di ReturnLy.

---

## Lost Item

| Status | Badge |
|---------|-------|
| Belum Ditemukan | Red |

---

## Found Item

| Status | Badge |
|---------|-------|
| Menunggu Pemilik | Amber |
| Diklaim | Blue |
| Dikembalikan | Green |

---

## Claim

| Status | Badge |
|---------|-------|
| Pending | Amber |
| Disetujui | Green |
| Ditolak | Red |

---

## Rules

- Semua badge menggunakan ukuran yang sama.
- Menggunakan bentuk pill (rounded-full).
- Ikon status bersifat opsional.

---

# 8.9 Search Filter Bar

## Purpose

Komponen gabungan untuk pencarian dan filter data.

---

## Used By

Guest

- Lost Items
- Found Items

Admin

- Lost Items Management
- Found Items Management
- Claims Management

---

## Components

- Search Box
- Category Filter
- Status Filter
- Refresh Button (Admin)

---

## Responsive

### Mobile

Komponen ditampilkan secara vertikal.

### Desktop

Komponen ditampilkan secara horizontal.

---

# Business Component Guidelines

Seluruh Business Component harus:

- Mengikuti Design Tokens.
- Konsisten menggunakan Card Layout.
- Mendukung Responsive Design.
- Menggunakan Badge untuk setiap status.
- Menampilkan Empty State jika data tidak tersedia.

---

# Component Summary

| Component | Guest | Admin |
|-----------|:-----:|:-----:|
| Lost Item Card | ✅ | ❌ |
| Found Item Card | ✅ | ❌ |
| Item Detail Card | ✅ | ❌ |
| Claim Summary Card | ✅ | ❌ |
| Claim Timeline | ✅ | ❌ |
| Report Information Box | ✅ | ❌ |
| Claim Information Box | ✅ | ❌ |
| Status Badge Group | ✅ | ✅ |
| Search Filter Bar | ✅ | ✅ |

---

# Next Section

Bagian berikutnya akan membahas **Admin Components**, meliputi:

- Dashboard Widget
- Statistics Widget
- Notification Dropdown
- Admin Data Table
- Quick Action Card
- Dashboard Section

# 9. Admin Components

Admin Components merupakan komponen yang hanya digunakan pada Dashboard Admin untuk mengelola seluruh data ReturnLy.

---

# 9.1 Dashboard Statistics Card

## Purpose

Menampilkan ringkasan data utama pada Dashboard.

---

## Used By

- Dashboard

---

## Structure

```text
┌──────────────────────────────┐
│ 📦                           │
│ Total Barang Hilang          │
│ 128                          │
└──────────────────────────────┘
```

---

## Components

- Icon
- Title
- Total Value

---

## Statistics

- Total Barang Hilang
- Total Barang Ditemukan
- Total Klaim
- Barang Dikembalikan

---

## Rules

- Semua card memiliki ukuran yang sama.
- Menggunakan ikon Heroicons.
- Angka ditampilkan dengan ukuran lebih besar dibanding judul.
- Nilai statistik diperbarui secara otomatis.

---

# 9.2 Quick Action Card

## Purpose

Memberikan akses cepat menuju halaman yang sering digunakan.

---

## Used By

Dashboard

---

## Actions

- Kelola Barang Hilang
- Kelola Barang Ditemukan
- Verifikasi Klaim
- Kelola Kategori
- Kelola Lokasi

---

## Structure

```text
┌────────────────────┐
│ 📦                 │
│ Barang Hilang      │
└────────────────────┘
```

---

## Rules

- Maksimal 5 Quick Action.
- Seluruh card dapat diklik.
- Menggunakan ikon yang berbeda untuk setiap menu.

---

# 9.3 Notification Dropdown

## Purpose

Menampilkan notifikasi terbaru kepada Admin.

---

## Used By

Topbar Dashboard

---

## Components

- Notification Icon
- Notification Badge
- Notification List

---

## Notification Types

- Laporan Barang Hilang Baru
- Laporan Barang Ditemukan Baru
- Klaim Baru

---

## Structure

```text
🔔 (3)

-------------------------

Laporan baru

2 menit lalu

-------------------------

Klaim baru

10 menit lalu
```

---

## Rules

- Menampilkan maksimal 10 notifikasi terbaru.
- Notifikasi terbaru berada di posisi paling atas.
- Badge hanya muncul jika terdapat notifikasi yang belum dibaca.

---

# 9.4 Admin Data Table

## Purpose

Komponen tabel utama untuk seluruh modul Admin.

---

## Used By

- Barang Hilang
- Barang Ditemukan
- Klaim
- Kategori
- Lokasi

---

## Features

- Search
- Filter
- Pagination
- Responsive
- Row Actions

---

## Components

- Table Header
- Table Body
- Action Column
- Empty State
- Loading State

---

## Rules

- Header tetap terlihat saat scroll (Sticky Header) jika memungkinkan.
- Gunakan zebra row (opsional) untuk meningkatkan keterbacaan.
- Semua aksi berada di kolom paling kanan.

---

# 9.5 Action Menu

## Purpose

Mengelompokkan aksi pada setiap baris tabel.

---

## Used By

Semua Data Table Admin

---

## Actions

Barang Hilang

- Lihat
- Edit
- Hapus

---

Barang Ditemukan

- Lihat
- Edit
- Hapus

---

Klaim

- Lihat
- Setujui
- Tolak

---

Kategori

- Edit
- Hapus

---

Lokasi

- Edit
- Hapus

---

## Style

Menggunakan Icon Button dengan Tooltip.

---

## Rules

- Aksi destruktif menggunakan warna Danger.
- Aksi utama menggunakan warna Primary.

---

# 9.6 Dashboard Section

## Purpose

Membagi Dashboard menjadi beberapa area informasi.

---

## Layout

```text
Statistics

↓

Quick Actions

↓

Recent Claims

↓

Latest Lost Items

↓

Latest Found Items
```

---

## Rules

- Setiap section memiliki heading.
- Gunakan spacing yang konsisten.
- Hindari terlalu banyak informasi dalam satu section.

---

# 9.7 Search & Filter Toolbar

## Purpose

Toolbar utama untuk mencari dan memfilter data.

---

## Used By

- Barang Hilang
- Barang Ditemukan
- Klaim
- Kategori
- Lokasi

---

## Components

- Search Box
- Filter Dropdown
- Refresh Button

---

## Responsive

### Mobile

Komponen ditampilkan vertikal.

---

### Desktop

Komponen ditampilkan horizontal.

---

# 9.8 Empty Dashboard Widget

## Purpose

Menampilkan kondisi ketika belum ada data pada Dashboard.

---

## Example

```text
Belum ada data statistik untuk ditampilkan.
```

---

## Components

- Illustration
- Title
- Description

---

## Rules

- Tetap mempertahankan layout Dashboard.
- Tidak menampilkan angka "0" tanpa penjelasan.

---

# Admin Component Guidelines

Seluruh Admin Component wajib:

- Menggunakan Dashboard Layout.
- Mengikuti Design Tokens.
- Responsive.
- Mendukung Keyboard Navigation.
- Memiliki Loading State.
- Memiliki Empty State.
- Memiliki Error State bila diperlukan.

---

# Component Summary

| Component | Dashboard | CRUD Pages |
|-----------|:---------:|:----------:|
| Dashboard Statistics Card | ✅ | ❌ |
| Quick Action Card | ✅ | ❌ |
| Notification Dropdown | ✅ | ❌ |
| Admin Data Table | ❌ | ✅ |
| Action Menu | ❌ | ✅ |
| Dashboard Section | ✅ | ❌ |
| Search & Filter Toolbar | ❌ | ✅ |
| Empty Dashboard Widget | ✅ | ❌ |

---

# Next Section

Bagian berikutnya (Part 8) akan menjadi bagian penutup dari COMPONENTS.md yang mencakup:

- Responsive Rules
- Accessibility Rules
- Component Naming Convention
- File Structure
- Blade Component Convention
- Best Practices
- Version

# 10. Responsive Rules

Seluruh komponen pada ReturnLy wajib mendukung tampilan responsif agar dapat digunakan dengan nyaman pada berbagai ukuran perangkat.

---

## Breakpoints

| Device | Width |
|----------|--------|
| Mobile | < 768px |
| Tablet | 768px – 1023px |
| Desktop | ≥ 1024px |

---

## Layout Rules

### Mobile

- Sidebar berubah menjadi Drawer.
- Navbar menggunakan Hamburger Menu.
- Grid menjadi 1 kolom.
- Form ditampilkan dalam 1 kolom.
- Tabel dapat di-scroll secara horizontal.
- Tombol utama menggunakan lebar penuh (Full Width).

---

### Tablet

- Grid menggunakan 2 kolom.
- Sidebar dapat diperkecil (Collapsed).
- Statistik Dashboard ditampilkan dalam 2 kolom.

---

### Desktop

- Sidebar selalu tampil.
- Grid menggunakan 3–4 kolom.
- Dashboard menggunakan layout penuh.
- Form memiliki lebar maksimum ±700px agar tetap nyaman dibaca.

---

## Image Rules

- Seluruh gambar menggunakan rasio yang konsisten.
- Gunakan `object-cover` agar gambar tidak terdistorsi.
- Jika gambar tidak tersedia, tampilkan Placeholder Image.

---

# 11. Accessibility Rules

ReturnLy harus memenuhi prinsip dasar aksesibilitas agar mudah digunakan oleh semua pengguna.

---

## Keyboard Navigation

Semua komponen interaktif harus dapat diakses menggunakan tombol:

- Tab
- Shift + Tab
- Enter
- Space
- Escape (untuk Modal)

---

## Focus State

Komponen berikut wajib memiliki Focus State:

- Button
- Input
- Select
- Textarea
- Search Box
- Dropdown
- Link

---

## Color Contrast

- Warna teks harus memiliki kontras yang cukup terhadap background.
- Hindari kombinasi warna yang sulit dibaca.

---

## Labels

Semua Input wajib memiliki Label yang jelas.

Contoh:

```text
Nama Barang

Kategori

Nomor WhatsApp
```

---

## Error Messages

Pesan validasi harus:

- Jelas.
- Mudah dipahami.
- Ditampilkan di bawah Input terkait.

---

## Icons

Ikon tidak boleh menjadi satu-satunya penanda informasi.

Contoh:

❌ Salah

Lebih baik:

❌ Ditolak

---

# 12. Component Naming Convention

Seluruh komponen menggunakan format **PascalCase**.

---

## Blade Component

Contoh:

```text
ItemCard

PrimaryButton

SearchBox

DataTable

StatusBadge
```

---

## File Name

Menggunakan format **kebab-case**.

Contoh:

```text
item-card.blade.php

primary-button.blade.php

status-badge.blade.php

data-table.blade.php
```

---

## Folder Structure

```text
resources/
└── views/
    └── components/
        ├── admin/
        │   ├── dashboard-stat-card.blade.php
        │   ├── quick-action-card.blade.php
        │   ├── notification-dropdown.blade.php
        │   ├── data-table.blade.php
        │   ├── action-menu.blade.php
        │   └── search-filter-toolbar.blade.php
        │
        ├── feedback/
        │   ├── alert.blade.php
        │   ├── toast.blade.php
        │   ├── modal.blade.php
        │   ├── confirm-dialog.blade.php
        │   ├── loading.blade.php
        │   └── progress-timeline.blade.php
        │
        ├── form/
        │   ├── input.blade.php
        │   ├── textarea.blade.php
        │   ├── select.blade.php
        │   ├── search-box.blade.php
        │   ├── image-upload.blade.php
        │   ├── date-picker.blade.php
        │   └── validation-message.blade.php
        │
        ├── layout/
        │   ├── navbar.blade.php
        │   ├── sidebar.blade.php
        │   ├── topbar.blade.php
        │   ├── footer.blade.php
        │   ├── breadcrumb.blade.php
        │   ├── container.blade.php
        │   └── section.blade.php
        │
        ├── shared/
        │   ├── item-card.blade.php
        │   ├── status-badge.blade.php
        │   ├── statistic-card.blade.php
        │   ├── empty-state.blade.php
        │   ├── skeleton-loader.blade.php
        │   ├── pagination.blade.php
        │   └── avatar.blade.php
        │
        └── button/
            ├── primary-button.blade.php
            ├── secondary-button.blade.php
            ├── danger-button.blade.php
            └── icon-button.blade.php
```

---

# 13. Best Practices

Seluruh komponen harus mengikuti prinsip berikut:

### Reusable

Komponen dibuat sekali dan digunakan di banyak halaman.

---

### Single Responsibility

Satu komponen hanya memiliki satu fungsi utama.

---

### Consistency

- Warna konsisten.
- Radius konsisten.
- Typography konsisten.
- Spacing konsisten.

---

### Maintainability

Komponen mudah diperbarui tanpa memengaruhi komponen lain.

---

### Simplicity

Hindari membuat komponen yang terlalu kompleks jika tidak diperlukan.

---

# 14. Development Checklist

Sebelum sebuah komponen dianggap selesai, pastikan:

- Menggunakan Design Tokens.
- Responsive.
- Memiliki Hover State.
- Memiliki Focus State.
- Memiliki Disabled State (jika relevan).
- Memiliki Loading State (jika relevan).
- Memiliki Error State (jika relevan).
- Mendukung Keyboard Navigation.
- Mengikuti Naming Convention.
- Digunakan kembali jika memungkinkan.

---

# 15. Version

```text
COMPONENTS.md

Project : ReturnLy

Version : 2.0.0

Status : Final

Framework : Laravel 13

Frontend : Blade + Tailwind CSS v4

Icon : Heroicons

Font : Poppins
```
