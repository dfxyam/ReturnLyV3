# 📄 PRD (PRODUCT REQUIREMENTS DOCUMENT)
# ReturnLy - Sistem Lost and Found Sekolah

---

##  DAFTAR ISI

1. [Overview Produk](#1-overview-produk)
2. [Tujuan & Sasaran](#2-tujuan--sasaran)
3. [Target Pengguna](#3-target-pengguna)
4. [Fitur Utama](#4-fitur-utama)
5. [Alur Sistem](#5-alur-sistem)
6. [Struktur Database](#6-struktur-database)
7. [Notifikasi](#7-notifikasi)
8. [Smart Manual Matching](#8-smart-manual-matching)
9. [Kebutuhan Teknis & Responsive Design](#9-kebutuhan-teknis--responsive-design)
10. [Jadwal Implementasi](#10-jadwal-implementasi)
11. [Prioritas Fitur](#11-prioritas-fitur)
12. [Risiko & Mitigasi](#12-risiko--mitigasi)

---

## 1. OVERVIEW PRODUK

### 1.1 Nama Produk
**ReturnLy**

### 1.2 Tagline
*"Temukan Kembali Barang Hilangmu dengan Mudah"*

### 1.3 Deskripsi Singkat
Aplikasi web **responsive** berbasis Lost and Found untuk lingkungan sekolah yang memudahkan siswa/pengunjung melaporkan barang hilang atau ditemukan, mengajukan klaim kepemilikan, dan menerima notifikasi WhatsApp secara real-time. Dapat diakses dengan optimal melalui **desktop, tablet, maupun smartphone**.

### 1.4 Latar Belakang Masalah
| Masalah | Dampak |
|---------|--------|
| Barang hilang di sekolah sulit ditemukan kembali | Siswa kehilangan barang bernilai (HP, dompet, dll) |
| Tidak ada sistem terpusat untuk pencatatan | Barang yang ditemukan tidak tercatat |
| Komunikasi antara penemu dan pemilik tidak efisien | Harus bertanya manual ke setiap kelas |
| Tidak ada notifikasi real-time | Pemilik tidak tahu barangnya ditemukan |
| Akses sistem terbatas device | Siswa hanya bisa akses dari komputer lab |

### 1.5 Solusi yang Ditawarkan
Platform digital terpusat yang:
- ✅ **Responsive design** - Akses optimal dari desktop, tablet, dan mobile
- ✅ Mencatat semua laporan barang hilang dan ditemukan
- ✅ Memungkinkan pemilik mengklaim barang yang ditemukan
- ✅ Mengirim notifikasi WhatsApp otomatis
- ✅ Memberikan tools admin untuk manajemen dan verifikasi
- ✅ **Mobile-first approach** untuk kemudahan akses siswa

---

## 2. TUJUAN & SASARAN

### 2.1 Tujuan Utama
1. Mengurangi tingkat kehilangan barang di sekolah
2. Meningkatkan persentase barang hilang yang kembali ke pemilik
3. Memudahkan proses pelaporan dan klaim barang
4. Menyediakan akses yang fleksibel melalui berbagai device

### 2.2 Sasaran (KPI)
| Metric | Target |
|--------|--------|
| Waktu rata-rata barang kembali ke pemilik | < 3 hari |
| Persentase laporan yang ditindaklanjuti | > 90% |
| Waktu respon notifikasi WhatsApp | < 1 menit |
| Kepuasan pengguna | > 80% |
| Mobile usability score | > 90 (Google Lighthouse) |
| Responsive breakpoint coverage | 100% (320px - 1920px) |

---

## 3. TARGET PENGGUNA

### 3.1 Persona

#### User 1: Siswa/Pengunjung (Mobile User)
| Atribut | Detail |
|---------|--------|
| **Peran** | Pelapor barang hilang, pelapor barang ditemukan, pengklaim barang |
| **Kebutuhan** | Mudah melapor via HP, cepat tahu jika barang ditemukan, proses klaim simple |
| **Tech Level** | Basic (perlu UI yang sangat sederhana) |
| **Primary Device** | Smartphone (Mobile-first) |
| **Secondary Device** | Tablet/Desktop |
| **Usage Context** | Di sekolah, di rumah, dalam perjalanan |

#### User 2: Admin Sekolah (Desktop User)
| Atribut | Detail |
|---------|--------|
| **Peran** | Pengelola sistem, verifikator klaim, matcher barang |
| **Kebutuhan** | Dashboard yang informatif, tools CRUD, verifikasi klaim yang mudah |
| **Tech Level** | Intermediate |
| **Primary Device** | Laptop/Desktop |
| **Usage Context** | Di ruang admin/ruang guru |

---

## 4. FITUR UTAMA

### 4.1 Daftar Fitur

| No | Fitur | Deskripsi | Prioritas |
|----|-------|-----------|-----------|
| F01 | Lapor Barang Hilang | Form pelaporan kehilangan dengan foto opsional | Must Have |
| F02 | Lapor Barang Ditemukan | Form pelaporan penemuan dengan foto wajib | Must Have |
| F03 | Klaim Barang | Pengajuan klaim kepemilikan barang ditemukan | Must Have |
| F04 | Filter & Search | Pencarian dan filter barang berdasarkan kategori/lokasi | Must Have |
| F05 | Lihat Status Klaim | Cek status klaim berdasarkan ID/nomor WA | Must Have |
| F06 | Login Admin | Autentikasi admin dengan session | Must Have |
| F07 | Dashboard Admin | Pusat kontrol admin dengan menu CRUD | Must Have |
| F08 | Kelola Barang Hilang | CRUD data barang hilang | Must Have |
| F09 | Kelola Barang Ditemukan | CRUD data barang ditemukan | Must Have |
| F10 | Verifikasi Klaim | Admin setujui/tolak klaim | Must Have |
| F11 | Smart Manual Matching | Admin cocokkan barang hilang dengan ditemukan | Must Have |
| F12 | WhatsApp Notification | Notifikasi otomatis via WhatsApp | Must Have |
| F13 | **Responsive Design** | **Tampilan optimal di desktop, tablet, mobile** | **Must Have** |
| F14 | Kelola Kategori | CRUD kategori barang | Nice to Have |
| F15 | Kelola Lokasi | CRUD lokasi di sekolah | Nice to Have |
| F16 | Lihat Statistik | Dashboard statistik barang | Nice to Have |
| F17 | Activity Logs | Pencatatan aktivitas admin | Nice to Have |

### 4.2 Responsive Design Specifications

#### Breakpoints
| Device | Screen Width | Layout |
|--------|--------------|--------|
| **Mobile (Portrait)** | 320px - 480px | Single column, stacked elements |
| **Mobile (Landscape)** | 481px - 767px | Single column, optimized forms |
| **Tablet** | 768px - 1024px | 2 columns, side navigation |
| **Desktop** | 1025px - 1440px | Multi-column, full navigation |
| **Large Desktop** | 1441px - 1920px | Wide layout, centered content |

#### Mobile-First Features
| Fitur | Mobile | Desktop |
|-------|--------|---------|
| **Navigation** | Hamburger menu, bottom nav | Top navbar, sidebar |
| **Forms** | Single column, full width | Multi-column, optimized spacing |
| **Cards/Grid** | 1 column | 3-4 columns |
| **Tables** | Horizontal scroll / Card view | Full table display |
| **Buttons** | Full width, large touch target | Auto width, standard size |
| **Images** | Responsive max-width: 100% | Optimized sizing |

#### Touch & Accessibility
| Requirement | Specification |
|-------------|---------------|
| Touch target size | Minimum 44x44 pixels |
| Font size | Minimum 16px (prevent zoom on iOS) |
| Color contrast | WCAG AA compliant (4.5:1) |
| Keyboard navigation | Full support |

---

## 5. ALUR SISTEM

### 5.1 Flowchart Status - lost_items
```text
User Lapor Hilang (via Mobile/Desktop)
       ↓
[STATUS 1: "Belum Ditemukan"]
       ↓
Admin Cocokkan dengan found_items (Desktop)
       ↓
[STATUS 2: "Ditemukan"]
       ↓
Pemilik Ambil Barang
       ↓
[STATUS 3: "Selesai"]
```

### 5.2 Flowchart Status - found_items
```text
User Lapor Ditemukan (via Mobile/Desktop)
       ↓
[STATUS 1: "Menunggu Pemilik"]
       ↓
User Ajukan Klaim (via Mobile)
       ↓
[STATUS 2: "Diklaim"]
       ↓
┌──────┴──────┐
│             │
Admin Setujui  Admin Tolak
│             │
↓             ↓
[STATUS 3:      [KEMBALI KE
"Dikembalikan"]  STATUS 1:
                "Menunggu
                 Pemilik"]
```

### 5.3 Flowchart Status - klaim
```text
User Ajukan Klaim
       ↓
[STATUS 1: "Pending"]
       ↓
Admin Verifikasi (Desktop)
       ↓
┌──────┴──────┐
│             │
Setujui       Tolak
↓             ↓
[STATUS 2:    [STATUS 3:
"Disetujui"]   "Ditolak"]
```

---

## 6. STRUKTUR DATABASE

### 6.1 Daftar Tabel
| No | Tabel | Fungsi | Jumlah Field |
|----|-------|--------|--------------|
| 1 | admin | Data admin | 6 |
| 2 | categories | Master kategori | 4 |
| 3 | locations | Master lokasi | 4 |
| 4 | lost_items | Laporan barang hilang | 14 |
| 5 | found_items | Laporan barang ditemukan | 13 |
| 6 | klaim | Pengajuan klaim | 10 |
| 7 | notifications | Log notifikasi WhatsApp | 9 |
| 8 | activity_logs | Log aktivitas admin | 5 |

### 6.2 Relasi Antar Tabel
```text
admin (1) ──────────< (N) activity_logs
admin (1) ──────────< (N) notifications
categories (1) ─────< (N) lost_items
categories (1) ─────< (N) found_items
locations (1) ─────< (N) lost_items
locations (1) ──────< (N) found_items
found_items (1) ────< (N) klaim
```

---

## 7. NOTIFIKASI

### 7.1 Channel
- **WhatsApp Only** (via API Fonnte/Wablas)

### 7.2 Matriks Notifikasi
| No | Trigger Event | Penerima | Template Pesan |
|----|---------------|----------|----------------|
| N01 | Lapor Barang Hilang | Admin | 📢 Laporan Barang Hilang Baru. Dari: {nama}. Barang: {barang}. Tanggal: {tanggal} |
| N02 | Lapor Barang Hilang | User | ✅ Laporan Tersimpan. Status: Belum Ditemukan. Kami akan infokan jika ditemukan |
| N03 | Lapor Barang Ditemukan | Admin | 🔔 Barang Ditemukan. Oleh: {nama}. Barang: {barang}. Lokasi: {lokasi} |
| N04 | Lapor Barang Ditemukan | User |  Terima Kasih! Barang sedang menunggu pemilik |
| N05 | Ajukan Klaim | Admin |  Klaim Baru Perlu Verifikasi. Nama: {nama}. Barang: {barang} |
| N06 | Ajukan Klaim | User | 📝 Klaim Tersimpan. Status: Pending. Admin akan segera verifikasi |
| N07 | Barang Dicocokkan | User (Lost) | 🎉 Barang Anda ditemukan! Silakan hubungi admin |
| N08 | Klaim Disetujui | User (Klaim) | ✅ Klaim Disetujui! Silakan ambil barang di lokasi yang ditentukan |
| N09 | Klaim Ditolak | User (Klaim) | ❌ Klaim Ditolak. Alasan: {alasan} |
| N10 | Barang Dikembalikan | User (Lost) | 🏠 Barang sudah dikembalikan. Terima kasih |

---

## 8. SMART MANUAL MATCHING

### 8.1 Konsep
Admin mencocokkan barang hilang dengan barang ditemukan secara manual. Sistem membantu dengan **filter otomatis berdasarkan kategori dan lokasi**.

### 8.2 Alur Matching
1. Admin buka halaman Kelola Barang Hilang
2. Admin klik salah satu barang
3. Sistem menampilkan detail barang hilang
4. Sistem otomatis query: `SELECT * FROM found_items WHERE id_category = {same} AND id_location = {same} AND status = 'Menunggu Pemilik'`
5. Tampilkan hasil sebagai "Rekomendasi Match"
6. Admin review dan klik "Cocokkan" atau "Abaikan"

---

## 9. KEBUTUHAN TEKNIS & RESPONSIVE DESIGN

### 9.1 Tech Stack
| Layer | Teknologi | Alasan |
|-------|-----------|--------|
| **Frontend** | **HTML5, CSS3 (Bootstrap 5), JavaScript** | **Responsive framework, mobile-first** |
| **Backend** | PHP 7.4+ (Native) | Mudah deploy, cocok deadline 1 minggu |
| **Database** | MySQL 5.7+ | Relational, cocok dengan ERD |
| **Web Server** | Apache/XAMPP | Gratis, mudah setup |
| **WhatsApp API** | Fonnte / Wablas | Gratis trial, mudah integrasi |

### 9.2 Responsive Implementation (Bootstrap 5)
```html
<!-- Contoh Responsive Layout -->
<div class="container">
  <div class="row">
    <!-- Mobile: Full width, Tablet: 2 cols, Desktop: 4 cols -->
    <div class="col-12 col-md-6 col-lg-3">
      <!-- Card Content -->
    </div>
  </div>
</div>
```

### 9.3 Testing Requirements
| Test Item | Mobile | Tablet | Desktop |
|-----------|--------|--------|---------|
| Navigation menu | ✅ | ✅ | ✅ |
| Form submission | ✅ | ✅ | ✅ |
| Image display | ✅ | ✅ | ✅ |
| Table readability | ✅ | ✅ | ✅ |
| Button accessibility | ✅ | ✅ | ✅ |

### 9.4 Keamanan
| Item | Implementasi |
|------|--------------|
| Password | Hash dengan password_hash() (bcrypt) |
| Session | PHP session dengan timeout |
| File Upload | Validasi tipe file (jpg, png, jpeg) + size limit |
| SQL Injection | Prepared statements (PDO/MySQLi) |
| XSS | htmlspecialchars() pada output |

---

## 10. JADWAL IMPLEMENTASI

### Timeline: 7 Hari
| Hari | Target | Deliverable |
|------|--------|-------------|
| **Hari 1** | Database & Struktur | Semua tabel dibuat, dummy data terisi |
| **Hari 2** | Auth & Layout | Login admin, session, **responsive dashboard** |
| **Hari 3** | User Flow Part 1 | **Responsive** form lapor hilang & ditemukan |
| **Hari 4** | User Flow Part 2 | **Responsive** list barang, filter, klaim |
| **Hari 5** | WhatsApp Integration | Notifikasi terkirim di semua proses |
| **Hari 6** | Admin CRUD & Matching | Semua menu admin, **responsive tables** |
| **Hari 7** | **Responsive Testing** | **Test di berbagai device**, bug fix, polish |

---

## 11. PRIORITAS FITUR (MoSCoW)

### MUST HAVE (Wajib)
- [ ] F01: Lapor Barang Hilang
- [ ] F02: Lapor Barang Ditemukan
- [ ] F03: Klaim Barang
- [ ] F04: Filter & Search
- [ ] F05: Lihat Status Klaim
- [ ] F06: Login Admin
- [ ] F07: Dashboard Admin
- [ ] F08: Kelola Barang Hilang
- [ ] F09: Kelola Barang Ditemukan
- [ ] F10: Verifikasi Klaim
- [ ] F11: Smart Manual Matching
- [ ] F12: WhatsApp Notification
- [ ] **F13: Responsive Design (Mobile + Desktop)** ⭐

### SHOULD HAVE (Sebaiknya ada)
- [ ] F14: Kelola Kategori
- [ ] F15: Kelola Lokasi
- [ ] F17: Activity Logs

### COULD HAVE (Bagus jika ada)
- [ ] F16: Lihat Statistik dengan chart

### WON'T HAVE (Tidak ada di versi ini)
- [ ] Auto-Matching (algoritma otomatis)
- [ ] Mobile App (Native)
- [ ] Email Notification

---

## 12. RISIKO & MITIGASI

| No | Risiko | Probabilitas | Dampak | Mitigasi |
|----|--------|-------------|--------|----------|
| R01 | WhatsApp API tidak jalan saat demo | Sedang | Tinggi | Siapkan screenshot notifikasi sebagai backup |
| R02 | File upload error | Rendah | Sedang | Validasi ketat + error handling |
| R03 | Database corrupt | Rendah | Tinggi | Backup database setiap hari |
| R04 | Waktu tidak cukup | Tinggi | Tinggi | Fokus Must Have saja, cut Nice to Have |
| R05 | Bug saat presentasi | Sedang | Tinggi | Dry run minimal 3x sebelum presentasi |
| R06 | Foto terlalu besar | Sedang | Rendah | Compress foto saat upload (max 2MB) |
| **R07** | **Tampilan rusak di mobile** | **Sedang** | **Tinggi** | **Test di Chrome DevTools + real device** |

---

> **Nama Produk:** ReturnLy  
> **Versi Dokumen:** 2.0 (Updated dengan Responsive Design)  
> **Tanggal Dibuat:** 27 Juni 2026  
> **Status:** Final - Siap Implementasi  
> **Platform:** Web Application (Responsive - Desktop, Tablet, Mobile)
```