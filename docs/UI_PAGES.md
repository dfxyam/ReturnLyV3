# UI_PAGES.md

# ReturnLy UI Pages Documentation

> Version 1.0

Dokumen ini menjelaskan seluruh halaman (UI Pages) yang terdapat pada aplikasi ReturnLy. Seluruh implementasi antarmuka harus mengikuti spesifikasi pada dokumen ini agar konsisten selama proses pengembangan.

---

# Table of Contents

1. UI Overview
2. Design Principles
3. Guest Pages
4. Admin Pages
5. Navigation Rules
6. Route Convention
7. Access Rules
8. Responsive Rules
9. UI States
10. Development Notes

---

# 1. UI Overview

ReturnLy memiliki dua jenis antarmuka:

## Guest Interface

Digunakan oleh siswa atau pengunjung.

Karakteristik:

* Tidak perlu login.
* Fokus pada pelaporan dan pencarian barang.
* tetap bersih dan mudah digunakan, tetapi diperkaya dengan glass effect, gradient, micro-interaction, dan animasi halus
* Mobile-first.

---

## Admin Interface

Digunakan oleh Admin.

Karakteristik:

* Login menggunakan akun Admin.
* Fokus pada pengelolaan data.
* Menggunakan Dashboard Layout.
* Memiliki Sidebar dan Topbar.

---

# 2. Design Principles

Seluruh halaman mengikuti prinsip berikut.

## Clean

tetap bersih dan mudah digunakan, tetapi diperkaya dengan glass effect, gradient, micro-interaction, dan animasi halus.

## Consistent

Komponen memiliki tampilan yang konsisten.

---

## Responsive

Optimal pada:

* Mobile
* Tablet
* Desktop

---

## Accessible

* Kontras warna baik.
* Ukuran tombol nyaman.
* Font mudah dibaca.

---

## Fast

* Optimasi gambar.
* Lazy loading bila diperlukan.
* Pagination untuk daftar data.

---

# 3. Guest Pages

Guest dapat mengakses seluruh halaman berikut tanpa login.

| Page              | Route              |
| ----------------- | ------------------ |
| Home              | /                  |
| Lost Items        | /lost-items        |
| Lost Item Detail  | /lost-items/{id}   |
| Found Items       | /found-items       |
| Found Item Detail | /found-items/{id}  |
| Report Lost Item  | /report-lost       |
| Report Found Item | /report-found      |
| Claim Item        | /claim/{foundItem} |
| Claim Status      | /claim-status      |

---

# 3.1 Home

## Purpose

Halaman utama ReturnLy.

Menjadi pusat navigasi menuju seluruh fitur publik.

---

## Route

```text
/
```

---

## Access

Guest

Tidak memerlukan login.

---

## Layout

```text
Navbar

↓

Hero Section

↓

Quick Action

↓

Latest Lost Items

↓

Latest Found Items

↓

How It Works

↓

Footer
```

---

## Components

* Navbar
* Hero Banner
* Search Bar
* Quick Action Cards
* Item Cards
* Section Title
* CTA Button
* Footer

---

## Sections

### 1. Navbar

Berisi:

* Logo ReturnLy
* Home
* Barang Hilang
* Barang Ditemukan
* Status Klaim
* Tombol "Lapor Barang"

---

### 2. Hero Section

Menampilkan:

* Judul utama
* Deskripsi singkat
* Tombol:

  * Lapor Barang Hilang
  * Lapor Barang Ditemukan

---

### 3. Search Bar

Fungsi:

Mencari barang berdasarkan:

* Nama Barang

Pencarian dilakukan pada data:

* Barang Hilang
* Barang Ditemukan

---

### 4. Quick Actions

Berisi empat kartu:

* Barang Hilang
* Barang Ditemukan
* Lapor Kehilangan
* Lapor Penemuan

---

### 5. Latest Lost Items

Menampilkan maksimal **6 laporan barang hilang terbaru**.

Setiap kartu menampilkan:

* Foto
* Nama Barang
* Lokasi
* Tanggal
* Status
* Tombol Detail

---

### 6. Latest Found Items

Menampilkan maksimal **6 laporan barang ditemukan terbaru**.

Setiap kartu menampilkan:

* Foto
* Nama Barang
* Lokasi
* Tanggal
* Status
* Tombol Detail

---

### 7. How It Works

Menampilkan langkah penggunaan aplikasi:

1. Laporkan Barang.
2. Admin Memverifikasi.
3. Barang Dipublikasikan.
4. Pemilik Mengajukan Klaim.
5. Admin Memverifikasi Klaim.
6. Barang Dikembalikan.

---

### 8. Footer

Berisi:

* Logo
* Deskripsi singkat
* Copyright
* Versi aplikasi

---

## User Actions

Guest dapat:

* Mencari barang.
* Membuka detail barang hilang.
* Membuka detail barang ditemukan.
* Melaporkan kehilangan.
* Melaporkan penemuan.
* Melihat status klaim.

---

## Data Source

Mengambil data dari:

* lost_items
* found_items

---

## Empty State

Jika belum ada data:

```text
Belum ada laporan barang.
```

---

## Loading State

Menampilkan Skeleton Card.

---

## Error State

```text
Terjadi kesalahan saat memuat data.
Silakan coba lagi nanti.
```

---

## Responsive Behavior

### Mobile

* Navbar menggunakan Hamburger Menu.
* Card ditampilkan 1 kolom.
* Hero menjadi vertikal.

---

### Tablet

* Card 2 kolom.
* Hero tetap dua bagian.

---

### Desktop

* Hero dua kolom.
* Card 3 kolom.
* Navbar horizontal.

---

## Notes

Home merupakan halaman pertama yang akan diakses pengguna.

Halaman ini harus memiliki performa tinggi karena menjadi pusat navigasi seluruh aplikasi.

---

# Next Section

Bagian berikutnya akan membahas:

* Lost Items
* Lost Item Detail

yang mencakup:

* Search
* Filter
* Pagination
* Detail Barang
* Status
* Responsive Layout

# 3.2 Lost Items

## Purpose

Menampilkan seluruh daftar laporan barang hilang yang telah dipublikasikan oleh Admin.

Halaman ini membantu pengguna mencari apakah barang yang hilang sudah pernah dilaporkan.

---

## Route

```text
/lost-items
```

---

## Access

Guest

Tidak memerlukan login.

---

## Layout

```text
Navbar

↓

Page Header

↓

Search & Filter

↓

Items Grid

↓

Pagination

↓

Footer
```

---

## Components

* Navbar
* Page Header
* Search Input
* Category Filter
* Location Filter
* Status Filter
* Item Card
* Pagination
* Footer

---

## Sections

### 1. Page Header

Menampilkan:

* Judul Halaman
* Deskripsi singkat

Contoh:

> **Barang Hilang**
> Temukan informasi barang yang dilaporkan hilang di lingkungan sekolah.

---

### 2. Search

Guest dapat mencari berdasarkan:

* Nama Barang

Pencarian dilakukan secara **real-time** (debounce) atau setelah tombol **Cari** ditekan.

---

### 3. Filter

Filter yang tersedia:

* Kategori
* Lokasi
* Status

Filter dapat digunakan secara bersamaan.

---

### 4. Item Grid

Setiap kartu barang menampilkan:

* Foto Barang
* Nama Barang
* Kategori
* Lokasi Kehilangan
* Tanggal Kehilangan
* Status
* Tombol **Lihat Detail**

---

### 5. Pagination

Jumlah data per halaman:

```text
12 Items / Page
```

---

## User Actions

Guest dapat:

* Mencari barang.
* Memfilter barang.
* Membuka halaman detail barang.

---

## Data Source

Mengambil data dari:

* `lost_items`
* `categories`
* `locations`

---

## Empty State

```text
Belum ada laporan barang hilang.
```

atau

```text
Tidak ada hasil yang sesuai dengan pencarian.
```

---

## Loading State

* Skeleton Card
* Skeleton Filter

---

## Error State

```text
Gagal memuat data barang hilang.
Silakan coba lagi.
```

---

## Responsive Behavior

### Mobile

* Filter ditampilkan dalam Drawer/Bottom Sheet.
* Grid 1 kolom.

### Tablet

* Grid 2 kolom.

### Desktop

* Filter horizontal.
* Grid 3 kolom.

---

## Notes

* Hanya menampilkan laporan yang sudah dipublikasikan Admin.
* Urutan data berdasarkan laporan terbaru.

---

# 3.3 Lost Item Detail

## Purpose

Menampilkan informasi lengkap mengenai satu laporan barang hilang.

---

## Route

```text
/lost-items/{id}
```

---

## Access

Guest

Tidak memerlukan login.

---

## Layout

```text
Navbar

↓

Breadcrumb

↓

Item Information

↓

Reporter Information

↓

Related Items

↓

Footer
```

---

## Components

* Navbar
* Breadcrumb
* Image Preview
* Status Badge
* Information Card
* Related Item Cards
* Footer

---

## Sections

### 1. Breadcrumb

Contoh:

```text
Home
>
Barang Hilang
>
Detail Barang
```

---

### 2. Item Information

Menampilkan:

* Foto Barang
* Nama Barang
* Kategori
* Lokasi Kehilangan
* Tanggal Kehilangan
* Status
* Deskripsi Barang

---

### 3. Reporter Information

Menampilkan:

* Nama Pelapor
* Kelas (jika diisi)

> **Catatan Privasi:** Nomor WhatsApp **tidak ditampilkan** kepada publik untuk menjaga privasi pelapor.

---

### 4. Related Items

Menampilkan maksimal **4 barang hilang lain** dengan kategori yang sama.

---

## User Actions

Guest dapat:

* Kembali ke daftar barang.
* Melihat informasi barang.
* Membuka detail barang lain.

---

## Data Source

Mengambil data dari:

* `lost_items`
* `categories`
* `locations`

---

## Empty State

```text
Data barang tidak ditemukan.
```

---

## Loading State

* Skeleton Image
* Skeleton Text

---

## Error State

```text
Terjadi kesalahan saat memuat detail barang.
```

---

## Responsive Behavior

### Mobile

* Foto di bagian atas.
* Informasi di bawah foto.

### Tablet

* Foto dan informasi dalam dua kolom.

### Desktop

* Layout dua kolom.
* Related Items dalam 4 kolom.

---

## Notes

* Detail hanya dapat diakses jika data masih tersedia.
* Nomor telepon pelapor tidak boleh ditampilkan kepada publik.
* Status barang ditampilkan menggunakan Badge berwarna agar mudah dikenali.

---

# Next Section

Bagian berikutnya akan membahas:

* **Found Items**
* **Found Item Detail**

Termasuk fitur:

* Search
* Filter
* Pagination
* Tombol **Ajukan Klaim**
* Informasi lokasi penyimpanan (jika tersedia)
* Workflow menuju proses klaim

# 3.4 Found Items

## Purpose

Menampilkan seluruh daftar barang yang telah ditemukan dan dipublikasikan oleh Admin.

Halaman ini membantu pemilik barang menemukan barangnya dan mengajukan klaim.

---

## Route

```text
/found-items
```

---

## Access

Guest

Tidak memerlukan login.

---

## Layout

```text
Navbar

↓

Page Header

↓

Search & Filter

↓

Items Grid

↓

Pagination

↓

Footer
```

---

## Components

* Navbar
* Page Header
* Search Input
* Category Filter
* Location Filter
* Status Filter
* Item Card
* Pagination
* Footer

---

## Sections

### 1. Page Header

Menampilkan:

* Judul Halaman
* Deskripsi singkat

Contoh:

> **Barang Ditemukan**
> Cari barang yang telah ditemukan di lingkungan sekolah dan ajukan klaim jika itu milik Anda.

---

### 2. Search

Guest dapat mencari berdasarkan:

* Nama Barang

---

### 3. Filter

Filter tersedia:

* Kategori
* Lokasi Penemuan
* Status

---

### 4. Item Grid

Setiap kartu menampilkan:

* Foto Barang
* Nama Barang
* Kategori
* Lokasi Penemuan
* Tanggal Ditemukan
* Status
* Tombol **Lihat Detail**

---

### 5. Pagination

```text
12 Items / Page
```

---

## User Actions

Guest dapat:

* Mencari barang.
* Memfilter barang.
* Melihat detail barang.
* Memulai proses klaim melalui halaman detail.

---

## Data Source

Mengambil data dari:

* found_items
* categories
* locations

---

## Empty State

```text
Belum ada laporan barang ditemukan.
```

atau

```text
Tidak ada hasil yang sesuai.
```

---

## Loading State

* Skeleton Card
* Skeleton Filter

---

## Error State

```text
Gagal memuat data barang ditemukan.
Silakan coba lagi.
```

---

## Responsive Behavior

### Mobile

* Grid 1 kolom
* Filter dalam Bottom Sheet

### Tablet

* Grid 2 kolom

### Desktop

* Grid 3 kolom
* Filter horizontal

---

## Notes

* Hanya barang yang telah dipublikasikan Admin yang ditampilkan.
* Barang dengan status **Dikembalikan** tetap dapat ditampilkan sebagai arsip dengan badge yang sesuai (opsional sesuai kebutuhan proyek).

---

# 3.5 Found Item Detail

## Purpose

Menampilkan informasi lengkap mengenai satu barang yang ditemukan serta menjadi pintu masuk menuju proses klaim.

---

## Route

```text
/found-items/{id}
```

---

## Access

Guest

Tidak memerlukan login.

---

## Layout

```text
Navbar

↓

Breadcrumb

↓

Item Information

↓

Storage Information

↓

Action Section

↓

Related Items

↓

Footer
```

---

## Components

* Navbar
* Breadcrumb
* Image Preview
* Status Badge
* Information Card
* Action Card
* Related Item Cards
* Footer

---

## Sections

### 1. Breadcrumb

```text
Home

>

Barang Ditemukan

>

Detail Barang
```

---

### 2. Item Information

Menampilkan:

* Foto Barang
* Nama Barang
* Kategori
* Lokasi Penemuan
* Tanggal Ditemukan
* Status
* Deskripsi Barang

---

### 3. Storage Information

Jika tersedia, tampilkan:

* Lokasi penyimpanan barang

Contoh:

```text
Barang saat ini disimpan di:
Ruang BK
```

Jika tidak tersedia:

```text
Informasi lokasi penyimpanan belum tersedia.
```

---

### 4. Action Section

Menampilkan tombol sesuai status barang.

#### Jika status = Menunggu Pemilik

Tampilkan tombol:

```text
Ajukan Klaim
```

#### Jika status = Diklaim

Tampilkan:

```text
Barang sedang dalam proses klaim.
```

Tombol klaim dinonaktifkan.

#### Jika status = Dikembalikan

Tampilkan:

```text
Barang telah dikembalikan kepada pemilik.
```

Tombol klaim tidak ditampilkan.

---

### 5. Related Items

Menampilkan maksimal **4 barang lain** dengan kategori yang sama.

---

## User Actions

Guest dapat:

* Melihat detail barang.
* Mengajukan klaim (jika status memungkinkan).
* Kembali ke daftar barang.
* Melihat barang terkait.

---

## Data Source

Mengambil data dari:

* found_items
* categories
* locations

---

## Empty State

```text
Data barang tidak ditemukan.
```

---

## Loading State

* Skeleton Image
* Skeleton Text
* Skeleton Button

---

## Error State

```text
Terjadi kesalahan saat memuat detail barang.
```

---

## Responsive Behavior

### Mobile

* Foto di atas
* Informasi di bawah
* Tombol klaim full-width

### Tablet

* Layout dua kolom

### Desktop

* Foto dan informasi berdampingan
* Related Items dalam 4 kolom

---

## Notes

* Nomor WhatsApp penemu **tidak ditampilkan** kepada publik.
* Tombol **Ajukan Klaim** hanya muncul jika status barang **Menunggu Pemilik**.
* Status ditampilkan menggunakan Badge dengan warna yang konsisten sesuai Design System.
* Halaman ini menjadi penghubung utama menuju halaman **Claim Item**.

---

# Next Section

Bagian berikutnya akan membahas:

* **Report Lost Item**
* **Report Found Item**

Meliputi:

* Form input
* Validasi field
* Upload foto
* Preview gambar
* Konfirmasi pengiriman laporan
* Success & Error State

# 3.6 Report Lost Item

## Purpose

Halaman untuk mengirim laporan barang hilang.

Guest dapat mengisi informasi barang yang hilang tanpa perlu login.

---

## Route

```text
/report-lost
```

---

## Access

Guest

Tidak memerlukan login.

---

## Layout

```text
Navbar

↓

Page Header

↓

Report Form

↓

Information Box

↓

Submit Button

↓

Footer
```

---

## Components

* Navbar
* Page Header
* Form Card
* Image Upload
* Information Alert
* Primary Button
* Footer

---

## Form Fields

| Field              | Type         | Required |
| ------------------ | ------------ | -------- |
| Nama Pelapor       | Text         | ✅        |
| Kelas              | Text         | ❌        |
| Nomor WhatsApp     | Tel          | ✅        |
| Nama Barang        | Text         | ✅        |
| Kategori           | Select       | ✅        |
| Lokasi Kehilangan  | Select       | ✅        |
| Tanggal Kehilangan | Date         | ✅        |
| Deskripsi Barang   | Textarea     | ✅        |
| Foto Barang        | Image Upload | ❌        |

---

## Sections

### 1. Information Box

Menampilkan informasi:

> Pastikan informasi yang Anda berikan benar agar memudahkan proses pencarian barang.

---

### 2. Report Form

Guest mengisi seluruh informasi barang.

Field wajib diberi tanda (*).

---

### 3. Image Upload

Mendukung:

* JPG
* JPEG
* PNG
* WEBP

Maksimal:

```text
2 MB
```

Preview gambar ditampilkan setelah file dipilih.

---

### 4. Submit Button

```text
Kirim Laporan
```

---

## Validation

* Semua field wajib kecuali:

  * Kelas
  * Foto Barang
* Nomor WhatsApp harus valid.
* Tanggal tidak boleh melebihi tanggal hari ini.

---

## Success State

```text
Laporan berhasil dikirim.

Admin akan melakukan verifikasi sebelum laporan dipublikasikan.
```

---

## Error State

```text
Terjadi kesalahan saat mengirim laporan.

Silakan coba kembali.
```

---

## User Actions

Guest dapat:

* Mengisi form.
* Mengunggah foto.
* Menghapus foto sebelum dikirim.
* Mengirim laporan.

---

## Responsive Behavior

### Mobile

* Form satu kolom.
* Tombol full-width.

### Tablet

* Form satu kolom dengan ruang lebih lega.

### Desktop

* Form maksimal lebar ±700px agar nyaman dibaca.

---

## Notes

* Setelah laporan berhasil dikirim, pengguna diarahkan ke halaman utama.
* Status awal laporan adalah **Belum Ditemukan**.

---

# 3.7 Report Found Item

## Purpose

Halaman untuk mengirim laporan barang yang ditemukan.

---

## Route

```text
/report-found
```

---

## Access

Guest

Tidak memerlukan login.

---

## Layout

```text
Navbar

↓

Page Header

↓

Report Form

↓

Information Box

↓

Submit Button

↓

Footer
```

---

## Components

* Navbar
* Page Header
* Form Card
* Image Upload
* Information Alert
* Primary Button
* Footer

---

## Form Fields

| Field              | Type         | Required |
| ------------------ | ------------ | -------- |
| Nama Penemu        | Text         | ✅        |
| Kelas              | Text         | ❌        |
| Nomor WhatsApp     | Tel          | ✅        |
| Nama Barang        | Text         | ✅        |
| Kategori           | Select       | ✅        |
| Lokasi Penemuan    | Select       | ✅        |
| Tanggal Penemuan   | Date         | ✅        |
| Lokasi Penyimpanan | Text         | ❌        |
| Deskripsi Barang   | Textarea     | ✅        |
| Foto Barang        | Image Upload | ❌        |

---

## Sections

### 1. Information Box

Menampilkan informasi:

> Berikan deskripsi barang sejelas mungkin agar pemilik dapat mengenali barangnya.

---

### 2. Report Form

Guest mengisi seluruh informasi barang yang ditemukan.

---

### 3. Image Upload

Format yang didukung:

* JPG
* JPEG
* PNG
* WEBP

Maksimal ukuran:

```text
2 MB
```

Preview gambar ditampilkan sebelum dikirim.

---

### 4. Submit Button

```text
Kirim Laporan
```

---

## Validation

* Semua field wajib kecuali:

  * Kelas
  * Lokasi Penyimpanan
  * Foto Barang
* Nomor WhatsApp harus valid.
* Tanggal tidak boleh melebihi tanggal hari ini.

---

## Success State

```text
Laporan berhasil dikirim.

Admin akan melakukan verifikasi sebelum barang dipublikasikan.
```

---

## Error State

```text
Terjadi kesalahan saat mengirim laporan.

Silakan coba kembali.
```

---

## User Actions

Guest dapat:

* Mengisi form.
* Mengunggah foto.
* Menghapus foto.
* Mengirim laporan.

---

## Responsive Behavior

### Mobile

* Form satu kolom.
* Tombol full-width.

### Tablet

* Form satu kolom.

### Desktop

* Form maksimal lebar ±700px.

---

## Notes

* Status awal barang adalah **Menunggu Pemilik**.
* Lokasi penyimpanan bersifat opsional dan dapat diisi jika barang sudah diserahkan ke pihak sekolah.

---

# Next Section

Bagian berikutnya akan membahas:

* **Claim Item**
* **Claim Status**

Meliputi:

* Form pengajuan klaim
* Validasi
* Status klaim
* Riwayat proses klaim
* Tampilan hasil verifikasi
  ::

---

# 📌 Saran UX untuk halaman laporan

Saya menyarankan **tidak menggunakan form yang terlalu panjang**. Agar lebih nyaman di perangkat mobile, gunakan pengelompokan field seperti berikut:

### Informasi Pelapor

* Nama
* Kelas
* Nomor WhatsApp

### Informasi Barang

* Nama Barang
* Kategori
* Lokasi
* Tanggal
* Deskripsi
* Foto

Dengan pengelompokan ini, pengguna akan lebih mudah memahami form dan mengurangi kemungkinan salah mengisi data. Selain itu, desainnya juga akan lebih rapi saat diimplementasikan menggunakan Tailwind CSS dan Blade Components.

# 3.8 Claim Item

## Purpose

Halaman untuk mengajukan klaim terhadap barang yang ditemukan.

Guest dapat mengisi identitas dan alasan kepemilikan barang tanpa perlu login.

---

## Route

```text
/claim/{foundItem}
```

---

## Access

Guest

Tidak memerlukan login.

---

## Preconditions

Sebelum mengakses halaman ini:

* Barang harus berstatus **Menunggu Pemilik**.
* Barang masih tersedia untuk diklaim.

Jika status barang **Diklaim** atau **Dikembalikan**, halaman hanya menampilkan informasi bahwa klaim sudah tidak dapat dilakukan.

---

## Layout

```text
Navbar

↓

Breadcrumb

↓

Item Summary

↓

Claim Form

↓

Information Box

↓

Submit Button

↓

Footer
```

---

## Components

* Navbar
* Breadcrumb
* Item Summary Card
* Claim Form Card
* Alert Box
* Primary Button
* Footer

---

## Sections

### 1. Breadcrumb

```text
Home

>

Barang Ditemukan

>

Ajukan Klaim
```

---

### 2. Item Summary

Menampilkan informasi singkat barang:

* Foto Barang
* Nama Barang
* Kategori
* Lokasi Penemuan
* Tanggal Ditemukan
* Status

Tujuannya agar pengguna yakin bahwa barang yang diklaim sudah benar.

---

### 3. Claim Form

Field yang tersedia:

| Field          | Type     | Required |
| -------------- | -------- | -------- |
| Nama Lengkap   | Text     | ✅        |
| Kelas          | Text     | ❌        |
| Nomor WhatsApp | Tel      | ✅        |
| Alasan Klaim   | Textarea | ✅        |

---

### 4. Information Box

Menampilkan informasi:

> Jelaskan ciri khas barang yang hanya diketahui oleh pemilik agar Admin lebih mudah melakukan verifikasi.

---

### 5. Submit Button

```text
Kirim Klaim
```

---

## Validation

| Field          | Validation                    |
| -------------- | ----------------------------- |
| Nama Lengkap   | Required, Max 100             |
| Kelas          | Nullable                      |
| Nomor WhatsApp | Required                      |
| Alasan Klaim   | Required, Minimal 20 karakter |

---

## Success State

```text
Pengajuan klaim berhasil dikirim.

Silakan simpan Nomor Klaim Anda untuk memeriksa status klaim.
```

Setelah berhasil dikirim, sistem akan menampilkan:

* Nomor Klaim
* Tombol **Lihat Status Klaim**

---

## Error State

```text
Terjadi kesalahan saat mengirim klaim.

Silakan coba kembali.
```

---

## User Actions

Guest dapat:

* Mengisi formulir.
* Membatalkan pengisian.
* Mengirim klaim.

---

## Responsive Behavior

### Mobile

* Form satu kolom.
* Tombol full-width.

### Tablet

* Layout satu kolom.

### Desktop

* Lebar form maksimal ±700px.

---

## Notes

* Guest tidak perlu login.
* Tidak ada upload bukti foto.
* Semua verifikasi dilakukan berdasarkan alasan klaim.
* Setelah klaim berhasil dikirim, status klaim otomatis menjadi **Pending**.

---

# 3.9 Claim Status

## Purpose

Halaman untuk melihat perkembangan status klaim yang telah diajukan.

---

## Route

```text
/claim-status
```

---

## Access

Guest

Tidak memerlukan login.

---

## Layout

```text
Navbar

↓

Page Header

↓

Tracking Form

↓

Claim Information

↓

Footer
```

---

## Components

* Navbar
* Page Header
* Search Form
* Status Card
* Timeline Card
* Footer

---

## Sections

### 1. Tracking Form

Guest memasukkan:

| Field       | Type |
| ----------- | ---- |
| Nomor Klaim | Text |

Button:

```text
Cari Status
```

---

### 2. Claim Information

Jika data ditemukan, tampilkan:

* Nomor Klaim
* Nama Pengklaim
* Nama Barang
* Tanggal Pengajuan
* Status Klaim

---

### 3. Status Badge

Kemungkinan status:

| Status    | Badge  |
| --------- | ------ |
| Pending   | Kuning |
| Disetujui | Hijau  |
| Ditolak   | Merah  |

---

### 4. Timeline

Contoh:

```text
✓ Klaim Dikirim

↓

✓ Menunggu Verifikasi

↓

✓ Disetujui
```

atau

```text
✓ Klaim Dikirim

↓

✓ Menunggu Verifikasi

↓

✗ Ditolak
```

---

## User Actions

Guest dapat:

* Mencari status klaim.
* Melihat detail status.
* Mengulangi pencarian.

---

## Validation

Nomor Klaim wajib diisi.

---

## Empty State

```text
Masukkan Nomor Klaim untuk melihat status.
```

---

## Not Found State

```text
Nomor klaim tidak ditemukan.
```

---

## Loading State

* Skeleton Card

---

## Error State

```text
Terjadi kesalahan saat mengambil data.
```

---

## Responsive Behavior

### Mobile

* Timeline vertikal.
* Status Card full-width.

### Tablet

* Layout satu kolom.

### Desktop

* Status Card di tengah dengan lebar maksimal ±700px.

---

## Notes

* Halaman ini hanya digunakan untuk melihat status klaim.
* Guest tidak dapat mengubah data klaim.
* Informasi yang ditampilkan hanya milik klaim yang dicari berdasarkan Nomor Klaim.

---

# Guest Pages Summary

| Page              | Status |
| ----------------- | ------ |
| Home              | ✅      |
| Lost Items        | ✅      |
| Lost Item Detail  | ✅      |
| Found Items       | ✅      |
| Found Item Detail | ✅      |
| Report Lost Item  | ✅      |
| Report Found Item | ✅      |
| Claim Item        | ✅      |
| Claim Status      | ✅      |

---

# Next Section

Bagian berikutnya akan membahas **Admin Pages**, meliputi:

* Login Admin
* Dashboard
* Sidebar
* Topbar
* Ringkasan Statistik
* Notifikasi
* Aktivitas Terbaru

Admin Dashboard menjadi pusat pengelolaan seluruh data ReturnLy.

# 4. Admin Pages

Admin merupakan satu-satunya pengguna yang memiliki akun pada sistem ReturnLy.

Seluruh halaman Admin dilindungi menggunakan Authentication dan Middleware.

---

# 4.1 Admin Login

## Purpose

Halaman autentikasi Admin sebelum mengakses Dashboard.

---

## Route

```text
/admin/login
```

---

## Access

Admin

Guest hanya dapat mengakses halaman login.

---

## Layout

```text
Login Card

↓

Logo ReturnLy

↓

Login Form

↓

Login Button
```

---

## Components

* Logo
* Login Card
* Username Input
* Password Input
* Show Password Button
* Login Button
* Error Alert

---

## Form Fields

| Field    | Type     | Required |
| -------- | -------- | -------- |
| Username | Text     | ✅        |
| Password | Password | ✅        |

---

## Validation

| Field    | Rule     |
| -------- | -------- |
| Username | Required |
| Password | Required |

---

## User Actions

Admin dapat:

* Mengisi Username
* Mengisi Password
* Menampilkan Password
* Login

---

## Success State

```text
Login berhasil.

Mengalihkan ke Dashboard...
```

---

## Error State

```text
Username atau Password salah.
```

---

## Responsive Behavior

### Mobile

Login Card Full Width

### Tablet

Login Card ±450px

### Desktop

Login Card berada di tengah halaman.

---

## Notes

* Menggunakan Laravel Authentication.
* Password disimpan menggunakan Hash.
* Setelah login berhasil, Admin diarahkan ke Dashboard.

---

# 4.2 Dashboard

## Purpose

Dashboard merupakan pusat pengelolaan seluruh data ReturnLy.

Admin dapat melihat statistik, notifikasi, aktivitas terbaru, serta navigasi menuju seluruh modul.

---

## Route

```text
/admin/dashboard
```

---

## Access

Admin

---

## Layout

```text
Sidebar

│

Topbar

↓

Statistics Cards

↓

Quick Actions

↓

Recent Claims

↓

Latest Lost Items

↓

Latest Found Items

↓

Recent Activities
```

---

## Components

* Sidebar
* Topbar
* Statistic Cards
* Quick Action Cards
* Data Table
* Notification Dropdown
* User Menu

---

# Sidebar Menu

Sidebar terdiri dari:

```text
Dashboard

Barang Hilang

Barang Ditemukan

Klaim

Kategori

Lokasi

Statistik

Logout
```

---

# Topbar

Topbar berisi:

* Judul Halaman
* Notifikasi
* Nama Admin
* Dropdown User

---

# Statistics Cards

Dashboard menampilkan ringkasan data.

## Card 1

Total Barang Hilang

Menampilkan:

* Total laporan

Icon:

📦

---

## Card 2

Total Barang Ditemukan

Icon:

🎒

---

## Card 3

Total Klaim

Icon:

📄

---

## Card 4

Barang Berhasil Dikembalikan

Icon:

✅

---

# Quick Actions

Berisi tombol cepat menuju:

* Kelola Barang Hilang
* Kelola Barang Ditemukan
* Verifikasi Klaim
* Tambah Kategori
* Tambah Lokasi

---

# Recent Claims

Menampilkan maksimal

```text
5 Klaim Terbaru
```

Kolom:

* Nama
* Barang
* Status
* Tanggal
* Action

---

# Latest Lost Items

Menampilkan

```text
5 Barang Hilang Terbaru
```

Kolom:

* Nama Barang
* Pelapor
* Status
* Action

---

# Latest Found Items

Menampilkan

```text
5 Barang Ditemukan Terbaru
```

Kolom:

* Nama Barang
* Penemu
* Status
* Action

---

# Recent Activities

Menampilkan aktivitas Admin.

Contoh:

```text
Admin menyetujui klaim

2 menit lalu
```

---

# Notifications

Dropdown Notifikasi menampilkan:

* Klaim Baru
* Laporan Baru
* Barang Baru Dipublikasikan

Admin dapat:

* Menandai sudah dibaca.

---

## User Actions

Admin dapat:

* Membuka setiap menu.
* Melihat statistik.
* Melihat notifikasi.
* Logout.

---

## Data Source

Dashboard mengambil data dari:

* lost_items
* found_items
* claims
* notifications
* activity_logs

---

## Empty State

Jika belum ada data:

```text
Belum ada data untuk ditampilkan.
```

---

## Loading State

* Skeleton Card
* Skeleton Table

---

## Error State

```text
Terjadi kesalahan saat memuat Dashboard.
```

---

## Responsive Behavior

### Mobile

* Sidebar menjadi Drawer.
* Statistik 1 kolom.
* Table dapat di-scroll horizontal.

---

### Tablet

* Statistik 2 kolom.

---

### Desktop

* Sidebar tetap.
* Statistik 4 kolom.
* Layout penuh.

---

## Notes

* Dashboard adalah halaman pertama setelah login.
* Semua statistik diperbarui secara otomatis berdasarkan data terbaru.
* Sidebar harus menampilkan indikator menu aktif.
* Logout selalu tersedia di Sidebar.
* Dashboard tidak memiliki fitur CRUD secara langsung, tetapi menjadi pusat navigasi ke seluruh modul administrasi.

---

# Next Section

Bagian berikutnya akan membahas:

* **Lost Items Management**
* **Found Items Management**

Meliputi:

* Tabel Data
* Search
* Filter
* CRUD
* Pagination
* Konfirmasi Hapus
* Detail Data
* Edit Status
* Upload & Preview Foto
  ::

---

# 📌 Ada satu rekomendasi UX

Saya menyarankan **Dashboard tidak terlalu ramai**. Untuk proyek sekolah, fokuskan pada informasi yang benar-benar dibutuhkan Admin.

Urutan yang saya rekomendasikan:

1. **Statistic Cards** (ringkasan cepat)
2. **Recent Claims** (prioritas tertinggi karena perlu diverifikasi)
3. **Latest Lost Items**
4. **Latest Found Items**
5. **Recent Activities**

Dengan urutan ini, Admin langsung melihat pekerjaan yang perlu ditangani terlebih dahulu tanpa harus mencari-cari informasi di dashboard. Ini juga membuat tampilan lebih bersih dan efisien.

# 4.3 Lost Items Management

## Purpose

Halaman untuk mengelola seluruh laporan barang hilang yang telah dikirim oleh Guest.

Admin dapat melihat, mencari, mengubah, dan menghapus data laporan.

---

## Route

```text
/admin/lost-items
```

---

## Access

Admin

(Login Required)

---

## Layout

```text
Sidebar

│

Topbar

↓

Page Header

↓

Action Bar

↓

Search & Filter

↓

Data Table

↓

Pagination
```

---

## Components

* Sidebar
* Topbar
* Page Header
* Search Input
* Category Filter
* Status Filter
* Data Table
* Pagination
* Delete Confirmation Modal
* View Modal (opsional)

---

## Action Bar

Berisi:

* Search
* Filter
* Refresh Data

> **Catatan:** Karena laporan dibuat oleh Guest, **tidak ada tombol "Tambah Barang Hilang"** di Dashboard Admin. Admin hanya mengelola laporan yang masuk.

---

## Search

Mencari berdasarkan:

* Nama Barang
* Nama Pelapor

---

## Filter

Filter tersedia:

* Kategori
* Status

---

## Data Table

Kolom yang ditampilkan:

| Kolom          |
| -------------- |
| Foto           |
| Nama Barang    |
| Kategori       |
| Pelapor        |
| Lokasi         |
| Tanggal Hilang |
| Status         |
| Aksi           |

---

## Row Actions

Setiap baris memiliki aksi:

```text
Lihat

Edit

Hapus
```

---

## Detail Page / Modal

Menampilkan informasi lengkap:

* Foto Barang
* Nama Barang
* Nama Pelapor
* Kelas
* Nomor WhatsApp
* Kategori
* Lokasi
* Tanggal Hilang
* Deskripsi
* Status

---

## Edit Page

Field yang dapat diubah:

* Kategori
* Lokasi
* Status
* Deskripsi
* Foto (opsional)

> Data identitas pelapor (nama, kelas, nomor WhatsApp) sebaiknya tidak diubah agar tetap mencerminkan laporan asli.

---

## Delete

Sebelum menghapus tampilkan dialog:

```text
Apakah Anda yakin ingin menghapus laporan ini?

Data yang dihapus tidak dapat dikembalikan.
```

---

## Pagination

```text
10 Data / Halaman
```

---

## Empty State

```text
Belum ada laporan barang hilang.
```

---

## Loading State

* Skeleton Table

---

## Error State

```text
Gagal memuat data.
```

---

## Notes

* Data diurutkan berdasarkan laporan terbaru.
* Status dapat diubah sesuai perkembangan proses.

---

# 4.4 Found Items Management

## Purpose

Halaman untuk mengelola seluruh laporan barang ditemukan.

Admin juga mengatur status barang setelah proses klaim selesai.

---

## Route

```text
/admin/found-items
```

---

## Access

Admin

(Login Required)

---

## Layout

```text
Sidebar

│

Topbar

↓

Page Header

↓

Action Bar

↓

Search & Filter

↓

Data Table

↓

Pagination
```

---

## Components

* Sidebar
* Topbar
* Search Input
* Category Filter
* Status Filter
* Data Table
* Pagination
* Delete Confirmation Modal

---

## Action Bar

Berisi:

* Search
* Filter
* Refresh Data

> **Catatan:** Sama seperti Barang Hilang, Admin **tidak memiliki tombol "Tambah Barang Ditemukan"** karena data berasal dari laporan Guest.

---

## Search

Mencari berdasarkan:

* Nama Barang
* Nama Penemu

---

## Filter

Filter:

* Kategori
* Status

---

## Data Table

Kolom:

| Kolom             |
| ----------------- |
| Foto              |
| Nama Barang       |
| Kategori          |
| Penemu            |
| Lokasi            |
| Tanggal Ditemukan |
| Status            |
| Aksi              |

---

## Row Actions

```text
Lihat

Edit

Hapus
```

---

## Detail Page / Modal

Menampilkan:

* Foto Barang
* Nama Barang
* Nama Penemu
* Kelas
* Nomor WhatsApp
* Kategori
* Lokasi
* Tanggal Ditemukan
* Lokasi Penyimpanan
* Deskripsi
* Status

---

## Edit Page

Field yang dapat diubah:

* Kategori
* Lokasi
* Lokasi Penyimpanan
* Status
* Deskripsi
* Foto (opsional)

> Identitas penemu tidak diubah agar tetap sesuai laporan asli.

---

## Delete

Dialog konfirmasi:

```text
Apakah Anda yakin ingin menghapus laporan ini?

Data yang dihapus tidak dapat dikembalikan.
```

---

## Pagination

```text
10 Data / Halaman
```

---

## Empty State

```text
Belum ada laporan barang ditemukan.
```

---

## Loading State

* Skeleton Table

---

## Error State

```text
Terjadi kesalahan saat memuat data.
```

---

## Business Rules

* Barang yang sudah berstatus **Dikembalikan** tetap dapat dilihat sebagai arsip.
* Status hanya dapat diubah oleh Admin.
* Jika ada klaim yang disetujui, status barang diperbarui sesuai alur sistem.

---

# Next Section

Bagian berikutnya akan membahas:

* **Claims Management**
* **Categories Management**
* **Locations Management**
* **Statistics**
* **Navigation Rules**
* **Route Convention**
* **Responsive Rules**
* **Development Notes**
  ::

---

# 📌 Ada satu revisi kecil yang saya sarankan

Saya melihat pada beberapa dokumentasi sebelumnya sempat muncul ide **Admin bisa Create data Barang Hilang/Barang Ditemukan**. Setelah kita konsisten dengan Use Case dan Flowchart, menurut saya **lebih baik dihilangkan**.

Alasannya:

* Semua laporan berasal dari **Guest**, bukan Admin.
* Tugas Admin adalah **mengelola (Read, Update, Delete)** dan **memverifikasi** data, bukan membuat laporan baru.
* Hal ini membuat implementasi tetap sederhana dan sepenuhnya selaras dengan diagram yang sudah kamu buat.

Jadi untuk modul **Lost Items Management** dan **Found Items Management**, fungsi CRUD yang digunakan secara nyata adalah:

* **Read** ✅
* **Update** ✅
* **Delete** ✅

Sedangkan **Create** dilakukan melalui halaman publik **Report Lost Item** dan **Report Found Item** oleh Guest. Ini membuat seluruh dokumentasi ReturnLy tetap konsisten dari ERD hingga implementasi Laravel 13.

# 4.5 Claims Management

## Purpose

Halaman untuk mengelola seluruh pengajuan klaim yang dikirim oleh Guest.

Admin bertugas memverifikasi setiap klaim dan menentukan apakah klaim disetujui atau ditolak.

---

## Route

```text
/admin/claims
```

---

## Access

Admin

(Login Required)

---

## Layout

```text
Sidebar

│

Topbar

↓

Page Header

↓

Search & Filter

↓

Claims Table

↓

Pagination
```

---

## Components

- Sidebar
- Topbar
- Search Input
- Status Filter
- Claims Table
- Pagination
- Detail Modal
- Confirmation Modal

---

## Search

Mencari berdasarkan:

- Nomor Klaim
- Nama Pengklaim
- Nama Barang

---

## Filter

- Status Klaim

---

## Data Table

| Kolom |
|--------|
| Nomor Klaim |
| Nama Pengklaim |
| Barang |
| Tanggal |
| Status |
| Aksi |

---

## Row Actions

- Lihat Detail
- Setujui Klaim
- Tolak Klaim

---

## Detail Klaim

Menampilkan:

- Nomor Klaim
- Nama Pengklaim
- Kelas
- Nomor WhatsApp
- Nama Barang
- Alasan Klaim
- Status

---

## Business Rules

Jika Admin memilih **Setujui**:

- Status Claim → Disetujui
- Status Found Item → Diklaim

Jika proses serah terima selesai:

- Status Found Item → Dikembalikan

Jika Admin memilih **Tolak**:

- Status Claim → Ditolak

---

## Notes

- Satu barang hanya boleh memiliki satu klaim yang disetujui.
- Riwayat klaim tetap disimpan.

---

# 4.6 Categories Management

## Purpose

Mengelola kategori barang.

---

## Route

```text
/admin/categories
```

---

## Access

Admin

---

## Components

- Categories Table
- Search
- Add Category Button
- Edit Modal
- Delete Modal

---

## Table

| Kolom |
|--------|
| Nama Kategori |
| Dibuat |
| Aksi |

---

## Actions

- Tambah
- Edit
- Hapus

---

## Validation

Nama kategori:

- Required
- Unik
- Maksimal 50 karakter

---

# 4.7 Locations Management

## Purpose

Mengelola daftar lokasi sekolah.

---

## Route

```text
/admin/locations
```

---

## Access

Admin

---

## Components

- Locations Table
- Search
- Add Location Button
- Edit Modal
- Delete Modal

---

## Table

| Kolom |
|--------|
| Nama Lokasi |
| Dibuat |
| Aksi |

---

## Actions

- Tambah
- Edit
- Hapus

---

## Validation

Nama lokasi:

- Required
- Unik
- Maksimal 100 karakter

---

# 4.8 Statistics

## Purpose

Menampilkan statistik penggunaan ReturnLy.

---

## Route

```text
/admin/statistics
```

---

## Access

Admin

---

## Components

- Summary Cards
- Bar Chart
- Pie Chart
- Monthly Statistics Table

---

## Summary Cards

Menampilkan:

- Total Barang Hilang
- Total Barang Ditemukan
- Total Klaim
- Barang Berhasil Dikembalikan

---

## Charts

### Bar Chart

Jumlah laporan setiap bulan.

---

### Pie Chart

Distribusi kategori barang.

---

## Notes

Halaman ini bersifat informatif dan tidak memiliki fungsi CRUD.

---

# 5. Navigation Rules

## Guest Navigation

```text
Home

Barang Hilang

Barang Ditemukan

Status Klaim

Lapor Barang
```

Menu **Lapor Barang** memiliki dropdown:

- Lapor Barang Hilang
- Lapor Barang Ditemukan

---

## Admin Navigation

```text
Dashboard

Barang Hilang

Barang Ditemukan

Klaim

Kategori

Lokasi

Statistik

Logout
```

Sidebar harus menampilkan indikator halaman aktif.

---

# 6. Route Convention

## Guest

| Route | Page |
|--------|------|
| / | Home |
| /lost-items | Barang Hilang |
| /lost-items/{id} | Detail Barang Hilang |
| /found-items | Barang Ditemukan |
| /found-items/{id} | Detail Barang Ditemukan |
| /report-lost | Lapor Barang Hilang |
| /report-found | Lapor Barang Ditemukan |
| /claim/{id} | Ajukan Klaim |
| /claim-status | Status Klaim |

---

## Admin

| Route | Page |
|--------|------|
| /admin/login | Login |
| /admin/dashboard | Dashboard |
| /admin/lost-items | Barang Hilang |
| /admin/found-items | Barang Ditemukan |
| /admin/claims | Klaim |
| /admin/categories | Kategori |
| /admin/locations | Lokasi |
| /admin/statistics | Statistik |

---

# 7. Access Rules

| Page | Guest | Admin |
|------|:-----:|:-----:|
| Home | ✅ | ✅ |
| Lost Items | ✅ | ✅ |
| Found Items | ✅ | ✅ |
| Report Lost | ✅ | ❌ |
| Report Found | ✅ | ❌ |
| Claim | ✅ | ❌ |
| Claim Status | ✅ | ❌ |
| Dashboard | ❌ | ✅ |
| Claims Management | ❌ | ✅ |
| Categories | ❌ | ✅ |
| Locations | ❌ | ✅ |
| Statistics | ❌ | ✅ |

---

# 8. Responsive Rules

## Mobile (<768px)

- Sidebar menjadi Drawer
- Card satu kolom
- Form satu kolom
- Table dapat di-scroll horizontal

---

## Tablet (768–1023px)

- Card dua kolom
- Sidebar dapat diperkecil
- Grid dua kolom

---

## Desktop (≥1024px)

- Sidebar tetap
- Dashboard empat kartu statistik
- Grid tiga kolom
- Form maksimal ±700px

---

# 9. UI States

Seluruh halaman wajib memiliki state berikut.

## Loading

- Skeleton Loader

---

## Empty

Menampilkan ilustrasi dan pesan bahwa belum ada data.

---

## Error

Menampilkan pesan kesalahan yang jelas dan tombol **Coba Lagi**.

---

## Success

Menampilkan notifikasi sukses menggunakan Toast Notification.

---

# 10. Development Notes

## UI Framework

- Tailwind CSS v4

---

## Icon

- Heroicons

---

## Font

- Poppins

---

## Color System

Primary

- Emerald

Secondary

- Slate

Danger

- Red

Warning

- Amber

Success

- Green

Info

- Blue

---

## Layout Rules

- Menggunakan 8px Spacing System.
- Border Radius konsisten.
- Shadow ringan.
- Konsisten menggunakan Card Layout.

---

## Accessibility

- Seluruh tombol memiliki hover state.
- Seluruh input memiliki focus state.
- Mendukung navigasi keyboard.
- Kontras warna memenuhi standar WCAG AA.

---

# Version

```text
UI_PAGES.md

Version : 1.0.0

Status : Final
```
