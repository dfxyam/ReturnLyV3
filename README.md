# ReturnLy

> **Lost & Found Web Application for School**

ReturnLy adalah aplikasi web **Lost & Found** yang dirancang untuk membantu warga sekolah melaporkan barang hilang, melaporkan barang yang ditemukan, serta mempermudah proses klaim kepemilikan barang secara cepat, sederhana, dan terorganisir.

Aplikasi ini menggunakan konsep **Guest-Based System**, di mana siswa atau pengunjung **tidak perlu membuat akun maupun login** untuk menggunakan layanan. Seluruh proses pelaporan dan klaim dilakukan melalui formulir, sedangkan proses pengelolaan sistem hanya dapat dilakukan oleh **Admin**.

---

# Table of Contents

* About
* Objectives
* Features
* User Roles
* System Workflow
* Technology Stack
* Project Structure
* Documentation
* Installation
* Environment Configuration
* Database
* Development Rules
* Project Scope
* License

---

# About

Di lingkungan sekolah, kehilangan barang merupakan kejadian yang cukup sering terjadi. Informasi mengenai barang hilang maupun barang yang ditemukan biasanya hanya disampaikan secara lisan atau melalui grup percakapan sehingga sulit ditelusuri kembali.

ReturnLy hadir sebagai solusi berbasis web yang memungkinkan warga sekolah untuk:

* Melaporkan barang hilang.
* Melaporkan barang ditemukan.
* Mencari barang berdasarkan kategori, lokasi, atau kata kunci.
* Mengajukan klaim kepemilikan barang.
* Melihat status klaim menggunakan ID Klaim atau Nomor WhatsApp.
* Membantu Admin mengelola seluruh laporan dan proses verifikasi secara terpusat.

---

# Objectives

Tujuan utama ReturnLy adalah:

* Mempermudah proses pelaporan barang hilang dan ditemukan.
* Mempercepat proses pengembalian barang kepada pemiliknya.
* Menyediakan sistem Lost & Found yang terorganisir.
* Mengurangi kehilangan barang di lingkungan sekolah.
* Mempermudah Admin dalam melakukan verifikasi dan pengelolaan data.

---

# Features

## Public (Guest)

Pengunjung atau siswa dapat menggunakan seluruh fitur berikut tanpa login.

* Melihat daftar barang hilang.
* Melihat daftar barang ditemukan.
* Mencari barang.
* Filter berdasarkan kategori.
* Filter berdasarkan lokasi.
* Melihat detail barang.
* Melaporkan barang hilang.
* Melaporkan barang ditemukan.
* Mengajukan klaim barang.
* Melihat status klaim menggunakan ID Klaim atau Nomor WhatsApp.

---

## Admin

Admin memiliki akses penuh terhadap sistem.

* Login Admin.
* Dashboard.
* Kelola Barang Hilang.
* Kelola Barang Ditemukan.
* Kelola Klaim.
* Kelola Kategori.
* Kelola Lokasi.
* Melihat Statistik.
* Logout.

---

# User Roles

## Guest

Guest merupakan siswa atau pengunjung yang tidak memiliki akun.

Hak akses:

* Home
* Lost Items
* Found Items
* Search Item
* Report Lost Item
* Report Found Item
* Claim Item
* Claim Status

Guest tidak memerlukan proses login maupun registrasi.

---

## Admin

Admin merupakan pengelola sistem.

Hak akses:

* Login
* Dashboard
* CRUD Barang Hilang
* CRUD Barang Ditemukan
* CRUD Kategori
* CRUD Lokasi
* Verifikasi Klaim
* Statistik
* Logout

---

# Authentication

ReturnLy menggunakan **Custom Admin Authentication**.

Karakteristik sistem autentikasi:

* Hanya Admin yang dapat login.
* Tidak tersedia fitur registrasi.
* Tidak menggunakan sistem login untuk siswa.
* Tidak menggunakan Laravel Breeze.
* Menggunakan Session Authentication bawaan Laravel.
* Route Admin dilindungi menggunakan Middleware.

---

# System Workflow

```text
Guest

↓

Home

↓

Melihat Barang

↓

Lapor Kehilangan
atau
Lapor Penemuan

↓

Admin Verifikasi

↓

Barang Dipublikasikan

↓

Pengunjung Mengajukan Klaim

↓

Admin Verifikasi Klaim

↓

Barang Dikembalikan
```

---

# Technology Stack

## Backend

* Laravel 13
* PHP 8.4+
* MySQL

---

## Frontend

* Blade Template Engine
* Tailwind CSS v4
* Vite
* Vanilla JavaScript

---

## Development Tools

* Composer
* Node.js
* NPM
* Git
* Visual Studio Code

---

# Project Structure

```text
ReturnLy/

app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/

docs/
│
├── README.md
├── DESIGN.md
├── UI_PAGES.md
├── COMPONENTS.md
├── ROADMAP.md
├── DATABASE.md
├── PROMPT.md
├── ERD.pdf
├── USE_CASE.pdf
└── FLOWCHART.pdf

composer.json
package.json
```

---

# Documentation

Seluruh dokumentasi proyek berada di dalam folder **docs/**.

| File          | Deskripsi                     |
| ------------- | ----------------------------- |
| README.md     | Dokumentasi utama proyek      |
| DESIGN.md     | Design System                 |
| UI_PAGES.md   | Dokumentasi seluruh halaman   |
| COMPONENTS.md | Dokumentasi seluruh komponen  |
| ROADMAP.md    | Tahapan pengembangan proyek   |
| DATABASE.md   | Dokumentasi struktur database |
| PROMPT.md     | Aturan kerja AI Assistant     |
| ERD           | Entity Relationship Diagram   |
| USE_CASE      | Use Case Diagram              |
| FLOWCHART     | Flowchart Sistem              |

---

# Installation

Clone repository.

```bash
git clone https://github.com/username/returnly.git
```

Masuk ke folder project.

```bash
cd ReturnLy
```

Install dependency.

```bash
composer install
```

Install frontend dependency.

```bash
npm install
```

Salin file environment.

```bash
cp .env.example .env
```

Generate application key.

```bash
php artisan key:generate
```

Konfigurasi database pada file `.env`.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=returnly
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migration.

```bash
php artisan migrate
```

Jalankan seeder (jika tersedia).

```bash
php artisan db:seed
```

Jalankan Vite.

```bash
npm run dev
```

Jalankan server.

```bash
php artisan serve
```

---

# Environment

Minimal requirement:

* PHP 8.4+
* Composer
* Node.js 22+
* MySQL 8+
* Git

---

# Database

Database ReturnLy terdiri dari tabel berikut:

* admins
* lost_items
* found_items
* claims
* categories
* locations
* notifications
* activity_logs

Seluruh struktur tabel mengikuti dokumen **DATABASE.md** dan **ERD**.

---

# Development Rules

Seluruh pengembangan harus mengikuti aturan berikut.

* Mengikuti Use Case Diagram.
* Mengikuti ERD.
* Mengikuti Flowchart.
* Mengikuti DESIGN.md.
* Mengikuti UI_PAGES.md.
* Mengikuti COMPONENTS.md.
* Tidak menambahkan fitur di luar ruang lingkup proyek.
* Menggunakan Blade Components yang reusable.
* Menggunakan prinsip Clean Code.
* Menggunakan PSR-12 Coding Standard.

---

# Project Scope

Project ini hanya mencakup fitur yang terdapat pada dokumentasi resmi ReturnLy.

Fitur di luar dokumentasi seperti:

* Login User
* Register User
* Forgot Password
* Email Verification
* QR Code
* Mobile App
* Live Chat

**tidak termasuk** dalam ruang lingkup proyek ini.

---

# Future Development

Pengembangan berikut dapat dipertimbangkan pada versi selanjutnya:

* Integrasi Email Notification.
* Dashboard Analytics.
* QR Code Barang.
* Progressive Web App (PWA).
* Multi School Support.

Fitur-fitur tersebut berada di luar scope versi saat ini.

---

# License

ReturnLy dikembangkan sebagai proyek pembelajaran dan tugas sekolah.

Seluruh implementasi mengikuti dokumentasi resmi proyek agar pengembangan tetap konsisten dan mudah dipelihara.
