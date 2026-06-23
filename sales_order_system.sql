-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 23, 2026 at 04:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales_order_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `kode_pelanggan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelanggan` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `kode_pelanggan`, `nama_pelanggan`, `alamat`, `telepon`, `email`, `created_at`) VALUES
(1, 'PLG-001', 'CV. Berkah Jaya', 'Jl. Merdeka No.10, Jakarta', '021-5550001', 'berkahjaya@email.com', '2026-06-12 06:58:58'),
(2, 'PLG-002', 'PT. Sinar Abadi', 'Jl. Sudirman No.25, Bandung', '022-5550002', 'sinarabadi@email.com', '2026-06-12 06:58:58'),
(3, 'PLG-003', 'Toko Elektronik Murah', 'Jl. Pasar Baru No.5, Surabaya', '031-5550003', 'tokoelektronik@email.com', '2026-06-12 06:58:58'),
(4, 'PLG-004', 'UD. Maju Bersama', 'Jl. Gajah Mada No.15, Semarang', '024-5550004', 'majubersama@email.com', '2026-06-12 06:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode_produk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(15,2) NOT NULL DEFAULT 0.00,
  `stok` int(11) NOT NULL DEFAULT 0,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode_produk`, `nama_produk`, `harga`, `stok`, `keterangan`, `created_at`) VALUES
(1, 'PRD-001', 'Laptop ASUS VivoBook', '8500000.00', 17, NULL, '2026-06-12 06:58:58'),
(2, 'PRD-002', 'Monitor Samsung 24\"', '1800000.00', 25, NULL, '2026-06-12 06:58:58'),
(3, 'PRD-003', 'Keyboard Mechanical Logitech', '650000.00', 50, NULL, '2026-06-12 06:58:58'),
(4, 'PRD-004', 'Mouse Wireless Logitech', '320000.00', 80, NULL, '2026-06-12 06:58:58'),
(5, 'PRD-005', 'Headset Gaming Rexus', '450000.00', 40, NULL, '2026-06-12 06:58:58'),
(6, 'PRD-006', 'Printer Epson L3210', '2100000.00', 10, NULL, '2026-06-12 06:58:58'),
(7, 'PRD-007', 'Flash Disk Kingston 64GB', '95000.00', 100, NULL, '2026-06-12 06:58:58'),
(8, 'PRD-008', 'Hard Disk External 1TB', '850000.00', 25, NULL, '2026-06-12 06:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `id` int(11) NOT NULL,
  `no_order` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_sales` int(11) NOT NULL,
  `total_harga` decimal(15,2) NOT NULL DEFAULT 0.00,
  `status` enum('draft','dikirim','selesai','dibatalkan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `catatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`id`, `no_order`, `tanggal`, `id_pelanggan`, `id_sales`, `total_harga`, `status`, `catatan`, `created_at`) VALUES
(1, 'SO-20260613-001', '2026-06-13', 1, 2, '4200000.00', 'draft', '', '2026-06-13 12:40:21'),
(2, 'SO-20260613-002', '2026-06-13', 3, 1, '25500000.00', 'draft', 'Segera Dikirim', '2026-06-13 12:43:42'),
(3, 'SO-20260621-001', '2026-06-21', 3, 2, '6300000.00', 'draft', 'Segera dikirim', '2026-06-21 04:55:33'),
(4, 'SO-20260621-002', '2026-06-21', 2, 3, '18000000.00', 'draft', 'Dikirim Secepatnya', '2026-06-21 04:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_detail`
--

CREATE TABLE `sales_order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 1,
  `harga_satuan` decimal(15,2) NOT NULL DEFAULT 0.00,
  `subtotal` decimal(15,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_order_detail`
--

INSERT INTO `sales_order_detail` (`id`, `id_order`, `id_produk`, `jumlah`, `harga_satuan`, `subtotal`) VALUES
(1, 1, 6, 2, '2100000.00', '4200000.00'),
(2, 2, 1, 3, '8500000.00', '25500000.00'),
(3, 3, 6, 3, '2100000.00', '6300000.00'),
(4, 4, 2, 10, '1800000.00', '18000000.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','sales','manager') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sales',
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `last_login`, `created_at`) VALUES
(1, 'Administrator', 'admin', '0192023a7bbd73250516f069df18b500', 'admin', '2026-06-21 06:54:24', '2026-06-12 06:58:58'),
(2, 'Budi Santoso', 'sales1', '0ad80eb119d9bf7775aa23786b05b391', 'sales', '2026-06-21 06:54:57', '2026-06-12 06:58:58'),
(3, 'Siti Rahayu', 'sales2', '0ad80eb119d9bf7775aa23786b05b391', 'sales', '2026-06-21 06:55:53', '2026-06-12 06:58:58'),
(4, 'Andi Wijaya', 'manager', '0795151defba7a4b5dfa89170de46277', 'manager', '2026-06-21 06:56:58', '2026-06-12 06:58:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_pelanggan` (`kode_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_order` (`no_order`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_sales` (`id_sales`);

--
-- Indexes for table `sales_order_detail`
--
ALTER TABLE `sales_order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales_order_detail`
--
ALTER TABLE `sales_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD CONSTRAINT `sales_order_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`),
  ADD CONSTRAINT `sales_order_ibfk_2` FOREIGN KEY (`id_sales`) REFERENCES `users` (`id`);

--
-- Constraints for table `sales_order_detail`
--
ALTER TABLE `sales_order_detail`
  ADD CONSTRAINT `sales_order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `sales_order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_order_detail_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
