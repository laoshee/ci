-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 11 Feb 2021 pada 15.48
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c_shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_description` text NOT NULL,
  `publication_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_description`, `publication_status`) VALUES
(1, 'ORIFLAME', 'ORIFLAME', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` text NOT NULL,
  `publication_status` tinyint(4) NOT NULL COMMENT 'Published=1,Unpublished=0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_description`, `publication_status`) VALUES
(1, 'Lipstik', 'Lipstik Desc', 1),
(2, 'Toothpaste', 'Toothpaste Desc', 1),
(3, 'Body Spray', 'Body Spray Desc', 1),
(4, 'Make-up', 'Make-up Desc', 1),
(5, 'Face Mask', 'Face Mask Desc', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `option_id` int(11) NOT NULL,
  `site_logo` varchar(100) NOT NULL,
  `site_favicon` varchar(100) NOT NULL,
  `site_copyright` varchar(255) NOT NULL,
  `site_contact_num1` varchar(100) NOT NULL,
  `site_contact_num2` varchar(100) NOT NULL,
  `site_facebook_link` varchar(100) NOT NULL,
  `site_twitter_link` varchar(100) NOT NULL,
  `site_google_plus_link` varchar(100) NOT NULL,
  `site_email_link` varchar(100) NOT NULL,
  `contact_title` varchar(255) NOT NULL,
  `contact_subtitle` varchar(255) NOT NULL,
  `contact_description` text NOT NULL,
  `company_location` varchar(255) NOT NULL,
  `company_number` varchar(100) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `company_facebook` varchar(100) NOT NULL,
  `company_twitter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`option_id`, `site_logo`, `site_favicon`, `site_copyright`, `site_contact_num1`, `site_contact_num2`, `site_facebook_link`, `site_twitter_link`, `site_google_plus_link`, `site_email_link`, `contact_title`, `contact_subtitle`, `contact_description`, `company_location`, `company_number`, `company_email`, `company_facebook`, `company_twitter`) VALUES
(1, 'logo_bayoeid.png', 'logo_fav.png', '© Right By ', '0123', '0123', 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.plus.google.com', 'https://www.gmail.com', 'Contact Page', 'Contact Page Subtitle', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         Contact Page Description\r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                \r\n                                ', '                                                                                                                                                Here Will Be Company Location<br>                                                                              ', '+62 857-256-xxx-xx', '2bayusutrisno@gmail.com', 'https://www.facebook.com/bayoe37', 'https://www.twitter.com/bayoe_id');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_short_description` text NOT NULL,
  `product_long_description` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` int(5) NOT NULL,
  `product_feature` tinyint(2) NOT NULL,
  `product_category` int(3) NOT NULL,
  `product_brand` int(3) NOT NULL,
  `product_author` int(3) NOT NULL,
  `product_view` int(11) NOT NULL DEFAULT '0',
  `published_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `publication_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_id`, `product_title`, `product_short_description`, `product_long_description`, `product_image`, `product_price`, `product_quantity`, `product_feature`, `product_category`, `product_brand`, `product_author`, `product_view`, `published_date`, `publication_status`) VALUES
(1, 'Optifresh S8', 'Sebuah senyuman bisa memberikan banyak hal positif dalam hidup. Jadi, jaga senyum Anda tetap sehat dan indah dengan Optifresh!\r\n', 'Optifresh System 8 Total Protection Toothpaste System 8 Total Protection dengan Active Protect Complex membantu memberikan perlindungan 12 jam terhadap masalah gigi umum, seperti membantu melindungi gigi dari plak, karang gigi, dan gigi berlubang.* Diformulasikan dengan fluoride untuk membantu merawat kekuatan gigi dan aroma mint untuk nafas terasa segar lebih lama. 100 ml', 'optifresh.JPG', 35000, 50, 1, 2, 1, 1, 0, '2021-02-07 14:29:04', 1),
(2, 'North For Men', 'Mulai hari Anda dengan kesegaran dari North For Men. Aromanya yang memikat mampu memberikan Anda rasa percaya diri untuk tampil optimal setiap hari.', 'North for Men Fresh Fragranced Body Spray\r\nSebuah body spray dengan wewangian menyegarkan yang\r\nakan membuat tubuh terasa bersemangat. Semprotkan ke\r\nseluruh tubuh sesuai yang Anda butuhkan. 100 ml', 'Oriflame_NFM_fresh_intense.JPG', 35000, 50, 1, 3, 1, 1, 0, '2021-02-07 14:29:04', 1),
(3, 'Flawless EyeBrow', 'Didesain khusus untuk melengkapi koleksi kosmetik Oriflame Anda, dapatkan berbagai alat kecantikan ini dan berkreasilah dengan make-up Anda!', 'Didesain khusus untuk melengkapi koleksi kosmetik Oriflame Anda, dapatkan berbagai alat kecantikan ini dan berkreasilah dengan make-up Anda', 'flawlwss_eyebrow.JPG', 35000, 50, 1, 4, 1, 1, 0, '2021-02-07 14:38:25', 1),
(4, 'Matte Lipstick ', 'Buat perhatian tertuju pada bibir Anda dengan warna cantik yang matte. Diformulasikan untuk tekstur yang lembut dan creamy. Lipstik ini mudah dikenakan berkat OC Bullet-nya yang baru.Tunggu warnanya kering di bibir hingga 3 menit untuk memastikan efek matte-nya optimal. 2,5 gr', 'Buat perhatian tertuju pada bibir Anda dengan warna cantik yang matte. Diformulasikan untuk tekstur yang lembut dan creamy. Lipstik ini mudah dikenakan berkat OC Bullet-nya yang baru.Tunggu warnanya kering di bibir hingga 3 menit untuk memastikan efek matte-nya optimal. \r\nPigmen cerah,\r\nWarna Cantik,dan\r\nTekstur Creamy.\r\n\r\nLipstik dengan warna cantik dan hasil akhir matte. *Coverage Medium\r\nIsi: 2,5 gr.', 'onColour matte Lipstick.JPG', 35000, 50, 1, 1, 1, 1, 0, '2021-02-07 14:38:25', 1),
(5, 'Clay Face Mask', 'Produk ini bisa menjadi produk perawatan yang nyaman dan multiguna, yang dirancang untuk mengoptimalkan rutinitas perawatan kulit, memanjakan kulit, serta membantu Anda mendapat kelembapan kulit yang Anda inginkan!', 'Optimals Purifying Clay Face Mask Clay mask dengan paduan bahan alami Swedia yang\r\ndirancang untuk mengurangi sebum berlebih dan membantu membersihkan pori-pori, tanpa membuat kulit terasa kering. Membantu mengurangi tampilan kilap pada wajah, terasa bersih, sementara pori-pori tampak tersamar. Kulit wajah terlihat lebih cerah, matte, dan terawat.* 50 ml.\r\n\r\nAplikasikan pada kulit yang kering dan bersih (gunakan jari tangan atau spatula) dan diamkan hingga 10 menit sebelum dibilas dengan air hangat. Gunakan 1-2 kali seminggu, dapat dikenakan sendiri atau dikombinasi kan dengan Optimals Moisture\r\nQuenching Face Mask (34608). Saran penggunaan: jangan diamkan clay mask Anda hingga benar-benar mengering, karena akan membuat kulit di baliknya juga menjadi kering.', 'purifying clay face mask.JPG', 99900, 50, 1, 5, 1, 1, 0, '2021-02-07 14:38:25', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_name` varchar(50) NOT NULL,
  `shipping_email` varchar(100) NOT NULL,
  `shipping_address` text NOT NULL,
  `shipping_city` varchar(100) NOT NULL,
  `shipping_country` varchar(50) NOT NULL,
  `shipping_phone` varchar(20) NOT NULL,
  `shipping_zipcode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `customer_id`, `shipping_name`, `shipping_email`, `shipping_address`, `shipping_city`, `shipping_country`, `shipping_phone`, `shipping_zipcode`) VALUES
(1, 1, 'bayoe', '', 'byl', 'byl', '', '0857', '0123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_customer`
--

CREATE TABLE `t_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_password` varchar(32) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_city` varchar(50) NOT NULL,
  `customer_zipcode` varchar(20) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_country` varchar(100) NOT NULL,
  `tgl_daftar` time NOT NULL,
  `customer_active` tinyint(4) NOT NULL COMMENT 'Active=1,Unactive=0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_customer`
--

INSERT INTO `t_customer` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_address`, `customer_city`, `customer_zipcode`, `customer_phone`, `customer_country`, `tgl_daftar`, `customer_active`) VALUES
(1, 'bayoe', 'bayoe@bayoe.id', 'b80abb50c5a55669e6aa1ef20556954b', 'boyolali', 'boyolali', '', '0857256', '', '00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_order`
--

CREATE TABLE `t_order` (
  `order_id` varchar(15) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment` varchar(15) NOT NULL,
  `order_total` float NOT NULL,
  `actions` varchar(50) NOT NULL DEFAULT 'Pending',
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_order`
--

INSERT INTO `t_order` (`order_id`, `customer_id`, `shipping_id`, `payment`, `order_total`, `actions`, `tgl_input`) VALUES
('OR-2102-0001', 1, 1, 'COD', 195385, 'Pending', '2021-02-11 14:12:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_order_details`
--

CREATE TABLE `t_order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` varchar(15) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `product_image` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_order_details`
--

INSERT INTO `t_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `product_image`) VALUES
(1, 'OR-2102-0001', 5, 'Clay Face Mask', 99900, 1, 'purifying clay face mask.JPG'),
(2, 'OR-2102-0001', 4, 'Matte Lipstick ', 35000, 2, 'onColour matte Lipstick.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` tinyint(4) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`option_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indeks untuk tabel `t_customer`
--
ALTER TABLE `t_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks untuk tabel `t_order`
--
ALTER TABLE `t_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `t_order_details`
--
ALTER TABLE `t_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_customer`
--
ALTER TABLE `t_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_order_details`
--
ALTER TABLE `t_order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
