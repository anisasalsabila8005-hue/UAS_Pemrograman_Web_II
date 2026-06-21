# 🛒 Sistem Sales Order - PT Maju Jaya

Sistem manajemen Sales Order berbasis web untuk PT Maju Jaya, perusahaan distribusi alat elektronik. Dibangun menggunakan **CodeIgniter 3** dengan template **SB Admin 2**.

📌 **Tugas UAS - Mata Kuliah Pemrograman Web II**

---

## 📖 Deskripsi

PT Maju Jaya sebelumnya mencatat pesanan secara manual menggunakan spreadsheet dan kertas, yang menyebabkan pesanan hilang, keterlambatan pengiriman, dan duplikasi data. Sistem ini dibangun untuk mendigitalisasi proses pencatatan sales order, mulai dari pembuatan pesanan, pengelolaan stok produk, hingga pelaporan penjualan.

---

## ✨ Fitur Utama

### 🔐 Login & Hak Akses (Role-Based)
| Role | Akses |
|------|-------|
| **Admin** | Mengelola data produk, pelanggan, user, dan semua sales order |
| **Sales** | Membuat & melihat sales order milik sendiri |
| **Manager** | Melihat semua laporan penjualan |

### 📦 Manajemen Data Master
- **Produk** — kode, nama, harga, stok
- **Pelanggan** — kode, nama, alamat, telepon, email
- **User** — kelola akun admin/sales/manager

### 🧾 Sales Order
- Buat order baru dengan pilih pelanggan & multi-produk
- Hitung total harga otomatis (real-time di browser)
- Nomor order otomatis (format: `SO-YYYYMMDD-001`)
- Stok produk berkurang otomatis saat order disimpan
- Status order: `draft` → `dikirim` → `selesai` / `dibatalkan`

### 📊 Laporan
- Laporan per periode (filter tanggal)
- Laporan per sales (rekap performa)
- Laporan per produk (rekap penjualan)
- Export/cetak ke PDF

---

## 🛠️ Teknologi

- **Framework:** CodeIgniter 3
- **Template:** SB Admin 2 (Bootstrap)
- **Database:** MySQL
- **Bahasa:** PHP, JavaScript, HTML, CSS

---

## 📂 Struktur Folder Penting

```
application/
├── core/MY_Controller.php       # Base controller (cek login & role)
├── controllers/                 # auth, dashboard, produk, pelanggan,
│                                   sales_order, laporan, users
├── models/                      # Model untuk setiap modul
└── views/
    ├── templates/               # header, sidebar, topbar, footer
    ├── auth/                    # halaman login
    ├── dashboard/
    ├── produk/
    ├── pelanggan/
    ├── sales_order/
    ├── laporan/
    └── users/
database_sales_order.sql         # Script database + data awal
```

---

## ⚙️ Cara Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/USERNAME/UAS_Pemrograman_Web_II.git
cd UAS_Pemrograman_Web_II
```

### 2. Import Database
1. Buka **phpMyAdmin**
2. Buat database baru: `sales_order_system`
3. Import file `database_sales_order.sql`

### 3. Konfigurasi Database
Edit `application/config/database.php`:
```php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'sales_order_system',
    'dbdriver' => 'mysqli',
);
```

### 4. Konfigurasi Base URL
Edit `application/config/config.php`:
```php
$config['base_url'] = 'http://localhost/UAS_Pemrograman_Web_II/';
```

### 5. Jalankan
Buka browser, akses:
```
http://localhost/UAS_Pemrograman_Web_II/
```

---

## 🔑 Akun Login Default

| Username | Password | Role |
|-----------|-----------|------|
| admin | admin123 | Admin |
| sales1 | sales123 | Sales |
| sales2 | sales123 | Sales |
| manager | manager123 | Manager |

---

## 📸 Tampilan

> Tambahkan screenshot dashboard, halaman sales order, dan laporan di sini.

---

## 👤 Penyusun

- **Nama:** _(Anissa Salsabila)_
- **NIM:** _(1224160025)_
- **Mata Kuliah:** Pemrograman Web II
- **Dosen Pengampu:** _(Triono, M.Kom)_

---

## 📄 Lisensi

Project ini dibuat untuk keperluan tugas akademik.