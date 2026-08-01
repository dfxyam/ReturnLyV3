# ROADMAP.md

# ReturnLy Development Roadmap

> Version 1.0

Roadmap ini menjadi panduan utama selama proses pengembangan ReturnLy. Seluruh implementasi harus mengikuti dokumen ERD, Use Case Diagram, Flowchart, Design System, dan dokumentasi lainnya.

---

# Development Goals

Tujuan utama proyek adalah membangun aplikasi Lost & Found berbasis web yang sederhana, cepat, mudah digunakan oleh warga sekolah, dan mudah dikelola oleh Admin.

---

# Development Method

Metode pengembangan yang digunakan adalah:

* Incremental Development
* Feature-Based Development
* Documentation First
* Clean Code
* Mobile First Responsive Design

---

# Technology Stack

## Backend

* Laravel 13
* PHP 8.4+
* MySQL

## Frontend

* Blade Template
* Tailwind CSS v4
* Vite
* Vanilla JavaScript

## Development Tools

* Composer
* Node.js
* NPM
* Git
* Visual Studio Code

---

# Development Phases

## Phase 1 — Project Setup

### Objectives

Menyiapkan struktur proyek Laravel.

### Tasks

* Install Laravel 13
* Konfigurasi Git Repository
* Konfigurasi Environment
* Konfigurasi Database
* Install Tailwind CSS
* Install Vite
* Membuat struktur folder
* Membuat folder dokumentasi

### Deliverables

* Laravel berhasil dijalankan
* Database terhubung
* Tailwind aktif
* Struktur project siap

Status:

```
Pending
```

---

# Phase 2 — Database Development

### Objectives

Membangun struktur database sesuai ERD.

### Tasks

* Migration Admin
* Migration Categories
* Migration Locations
* Migration Lost Items
* Migration Found Items
* Migration Claims
* Migration Notifications
* Migration Activity Logs

### Deliverables

* Semua migration berhasil dijalankan
* Relasi database sesuai ERD

Status

```
Pending
```

---

# Phase 3 — Admin Authentication

### Objectives

Membangun sistem login Admin.

### Features

* Login Admin
* Logout Admin
* Session Authentication
* Middleware Admin
* Route Protection

### Deliverables

* Admin dapat login
* Session berjalan
* Dashboard terlindungi

Status

```
Pending
```

---

# Phase 4 — Public Website

### Objectives

Membangun halaman yang dapat diakses Guest.

### Pages

* Home
* Barang Hilang
* Barang Ditemukan
* Detail Barang
* Status Klaim

### Features

* Search
* Filter
* Pagination
* Responsive Layout

### Deliverables

Seluruh halaman publik selesai.

Status

```
Pending
```

---

# Phase 5 — Lost Item Module

### Objectives

Membangun fitur pelaporan barang hilang.

### Features

* Form laporan
* Upload foto
* Validasi data
* Simpan ke database
* Status "Belum Ditemukan"

### Deliverables

Guest dapat mengirim laporan kehilangan.

Status

```
Pending
```

---

# Phase 6 — Found Item Module

### Objectives

Membangun fitur pelaporan barang ditemukan.

### Features

* Form penemuan
* Upload foto
* Validasi data
* Simpan database
* Status "Menunggu Pemilik"

### Deliverables

Guest dapat mengirim laporan penemuan.

Status

```
Pending
```

---

# Phase 7 — Claim Module

### Objectives

Membangun sistem klaim barang.

### Features

* Form klaim
* Upload bukti
* Validasi data
* Status Pending
* Tracking status klaim

### Deliverables

Guest dapat melakukan klaim.

Status

```
Pending
```

---

# Phase 8 — Admin Dashboard

### Objectives

Membangun Dashboard Admin.

### Pages

* Dashboard
* Barang Hilang
* Barang Ditemukan
* Klaim
* Kategori
* Lokasi
* Statistik

### Deliverables

Dashboard siap digunakan.

Status

```
Pending
```

---

# Phase 9 — CRUD Management

### Objectives

Membangun seluruh CRUD.

### Modules

* Lost Items
* Found Items
* Categories
* Locations

### Features

* Create
* Read
* Update
* Delete
* Search
* Filter
* Pagination

### Deliverables

Semua CRUD selesai.

Status

```
Pending
```

---

# Phase 10 — Claim Verification

### Objectives

Membangun proses verifikasi klaim.

### Features

* Review data
* Lihat bukti
* Approve
* Reject
* Update status
* Kirim notifikasi WhatsApp (sesuai flow yang dirancang)

### Deliverables

Verifikasi klaim selesai.

Status

```
Pending
```

---

# Phase 11 — Statistics

### Objectives

Membangun halaman statistik.

### Data

* Total Barang Hilang
* Total Barang Ditemukan
* Total Klaim
* Total Barang Selesai
* Statistik Kategori
* Statistik Lokasi

### Deliverables

Dashboard statistik selesai.

Status

```
Pending
```

---

# Phase 12 — Testing

### Objectives

Memastikan seluruh fitur berjalan sesuai Flowchart.

### Testing

* Form Validation
* CRUD Testing
* Authentication Testing
* Search Testing
* Filter Testing
* Claim Testing
* Notification Flow
* Responsive Testing

### Deliverables

Tidak ada bug kritis.

Status

```
Pending
```

---

# Phase 13 — Deployment

### Objectives

Menyiapkan aplikasi untuk digunakan.

### Tasks

* Production Environment
* Optimize Laravel
* Cache Configuration
* Final Database Backup
* Final Testing

### Deliverables

Aplikasi siap dipublikasikan.

Status

```
Pending
```

---

# Estimated Timeline

| Phase                | Estimasi |
| -------------------- | -------- |
| Project Setup        | 0.5 Hari |
| Database             | 1 Hari   |
| Admin Authentication | 0.5 Hari |
| Public Website       | 2 Hari   |
| Lost Item Module     | 2 Hari   |
| Found Item Module    | 2 Hari   |
| Claim Module         | 1 Hari   |
| Dashboard Admin      | 2 Hari   |
| CRUD Management      | 2 Hari   |
| Claim Verification   | 1 Hari   |
| Statistics           | 1 Hari   |
| Testing              | 1 Hari   |
| Deployment           | 0.5 Hari |

Total estimasi:

**±16 Hari**

---

# Development Rules

Selama proses pengembangan wajib mengikuti aturan berikut:

* Mengikuti ERD.
* Mengikuti Use Case Diagram.
* Mengikuti Flowchart.
* Mengikuti DESIGN.md.
* Mengikuti UI_PAGES.md.
* Mengikuti COMPONENTS.md.
* Menggunakan Blade Components yang reusable.
* Tidak menambahkan fitur di luar ruang lingkup proyek.
* Menggunakan Clean Code.
* Menggunakan PSR-12 Coding Standard.
* Mengutamakan keamanan input dan validasi data.

---

# Out of Scope

Fitur berikut **tidak termasuk** dalam versi 1.0:

* Login Siswa
* Registrasi Pengguna
* Forgot Password
* Email Verification
* Multi Admin Roles
* Mobile Application
* QR Code
* Live Chat
* REST API Publik

---

# Project Completion Checklist

* [ ] Project Setup
* [ ] Database
* [ ] Admin Authentication
* [ ] Public Website
* [ ] Lost Item Module
* [ ] Found Item Module
* [ ] Claim Module
* [ ] Dashboard Admin
* [ ] CRUD Management
* [ ] Claim Verification
* [ ] Statistics
* [ ] Testing
* [ ] Deployment

---

# Version

Current Version

```
v1.0.0
```

Status

```
In Development
```
