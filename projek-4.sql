-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 07:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek-4`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keranjangproduk`
--

CREATE TABLE `tbl_keranjangproduk` (
  `id_keranjang` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id_orders` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah_orders` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `total_harga_orders` int(10) UNSIGNED NOT NULL,
  `id_users` int(11) NOT NULL,
  `ens_orders` varchar(255) NOT NULL,
  `created_at_orders` datetime NOT NULL,
  `updated_at_orders` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id_orders`, `id_produk`, `jumlah_orders`, `total_harga_orders`, `id_users`, `ens_orders`, `created_at_orders`, `updated_at_orders`) VALUES
(49, 20, 1, 12000, 1, '608', '2022-04-14 11:14:20', '2022-04-14 11:14:20'),
(50, 18, 1, 30000, 1, '643', '2022-04-14 11:15:37', '2022-04-14 11:15:37'),
(51, 18, 1, 30000, 1, '324', '2022-04-14 11:18:09', '2022-04-14 11:18:09'),
(52, 17, 2, 80000, 1, '220', '2022-04-14 11:19:19', '2022-04-14 11:19:19'),
(54, 18, 3, 90000, 4, '115', '2022-04-14 21:39:11', '2022-04-14 21:39:11'),
(55, 22, 2, 5000000, 4, '354', '2022-04-14 21:41:30', '2022-04-14 21:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `sampul_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) UNSIGNED NOT NULL,
  `string_harga` varchar(255) NOT NULL,
  `ens_produk` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id_produk`, `nama_produk`, `deskripsi_produk`, `sampul_produk`, `harga_produk`, `string_harga`, `ens_produk`, `created_at`, `updated_at`) VALUES
(17, 'Sepatu ', '<div>Sepatu hitam cocok untuk anak anak dan orang dewasa</div><ul><li>Ukuran 30,34,27,40</li><li>Warna hitam,putih,merah</li><li>Bahan kulit</li></ul>', 'e173779ea97d144bd1e2cad5d526e678.jpg', 40000, 'IDR 40,000', '06df05371981a237d0ed11472fae7c94c9ac0eff1d05413516', '2022-04-14 09:22:59', '2022-04-14 09:22:59'),
(18, 'Celana jeans hitam', '<ul><li>Bahan lembut dan tidak mudah robek</li><li>Nyaman dipakai</li><li>Tersedia untuk dewasa ,remaja</li><li>Warna hitam polos</li><li>Tidak terdapat sobekan</li><li>Awet dan tidak mudah luntur</li></ul>', 'download.jpg', 30000, 'IDR 30,000', 'ef52db28b01e9632cd5969f3ccf502e9e43c33fa30cfa8a022', '2022-04-14 09:25:00', '2022-04-14 09:25:00'),
(19, 'Tas sekolah hitam', '               Tas sekolah hitam cocok untuk anak anak bahan berkualitas dan tahan lama  ', 'download (1).jpg', 35000, 'IDR 35,000', '9c3211509a9eee80f881f6b6666ab82df6bec222c84ba583c5', '2022-04-14 09:27:18', '2022-04-14 09:43:52'),
(20, 'Topi hitam keren', '<div>Topi hitam keren dan menambah ketampanan</div><ul><li>warna hitam&nbsp;</li><li>bahan lembut</li><li>harga rp 12000</li><li>nyaman dipakai</li></ul>', 'download (2).jpg', 12000, 'IDR 12,000', '95903604994d4ea70481353ac3322f05be9b965ec7eed540e0', '2022-04-14 09:42:28', '2022-04-14 09:42:28'),
(21, 'Kacamata hitam', '<ul><li>Mengurangi radiasi matahari nyaman dipakai</li><li>Desain elegean</li><li><br></li></ul>', 'download3_1.jpg', 15000, 'IDR 15,000', 'a321d8b405e3ef2604959847b36d171eebebc4a8941dc70a47', '2022-04-14 16:44:02', '2022-04-14 21:37:22'),
(22, 'Jam tangan pria', '<ul><li>desain elegan menarik anti air</li><li>tahan lama kualitas terjamin</li><li>brand ternama</li></ul>', 'download (1).jfif', 2500000, 'IDR 2,500,000', 'dfa5d1cefd0efdf5f52b765120da72c5706eb1dd113234cfdf', '2022-04-14 16:45:36', '2022-04-14 16:45:36'),
(23, 'T-shirt putih polos', '<div>Elegan bahan awet tidak mudah luntur</div><ul><li>Warna putih polos</li><li>Bahan katun</li><li>Menyerap keringat</li></ul>', 'download (2)_1.jpeg', 20000, 'IDR 20,000', '31bca02094eb78126a517b206a88c73cfa9ec6f704c7030d18', '2022-04-14 16:47:36', '2022-04-14 21:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_users` int(11) NOT NULL,
  `email_users` varchar(255) NOT NULL,
  `nama_users` varchar(255) NOT NULL,
  `nohp_users` int(11) NOT NULL,
  `sandi_users` varchar(255) NOT NULL,
  `level_users` varchar(255) NOT NULL,
  `ens_users` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `email_users`, `nama_users`, `nohp_users`, `sandi_users`, `level_users`, `ens_users`, `created_at`, `updated_at`) VALUES
(1, 'users@gmail.com', 'users', 123, '$2y$10$A9KNxWxoay6VTbfNQe1qHu60/hMvexvQviyTGiZy142xxG2Z/51XW', 'users', '8755f62cfa75745dab97bcb761454cd6baa9877d1118f43a9926a37d19e18786afdf53a9b3619483bd2d5f66de43dee641f767dfca74a05758db43260f663953', '2022-04-11', '2022-04-11'),
(4, 'admin@gmail.com', 'admin', 123, '$2y$10$mb5A0GChgIyIEaByBnurt.yP2j19wsk4YHwrv2snycv3AGewzWyM2', 'admin', '7c64e24ffb5a261e99a070a66d5c7df1219c0d8a9fc1da4d463fe9a07a8e2730f4db35bcb63812d61c230eda2127f7533e29f14a71cc88658f29e4525c326fc5', '2022-04-11', '2022-04-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_keranjangproduk`
--
ALTER TABLE `tbl_keranjangproduk`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id_orders`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `tbl_orders_ibfk_1` (`id_produk`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_keranjangproduk`
--
ALTER TABLE `tbl_keranjangproduk`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_keranjangproduk`
--
ALTER TABLE `tbl_keranjangproduk`
  ADD CONSTRAINT `tbl_keranjangproduk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tbl_products` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_keranjangproduk_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `tbl_users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tbl_products` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_orders_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `tbl_users` (`id_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
