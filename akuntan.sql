/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - akuntan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `autojurnals` */

DROP TABLE IF EXISTS `autojurnals`;

CREATE TABLE `autojurnals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL,
  `akun_debit` varchar(191) NOT NULL,
  `akun_kredit` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `autojurnals_user_id_foreign` (`user_id`),
  KEY `autojurnals_akun_debit_foreign` (`akun_debit`),
  KEY `autojurnals_akun_kredit_foreign` (`akun_kredit`),
  CONSTRAINT `autojurnals_akun_debit_foreign` FOREIGN KEY (`akun_debit`) REFERENCES `sub_buku_besars` (`no_subbukubesar`) ON UPDATE CASCADE,
  CONSTRAINT `autojurnals_akun_kredit_foreign` FOREIGN KEY (`akun_kredit`) REFERENCES `sub_buku_besars` (`no_subbukubesar`) ON UPDATE CASCADE,
  CONSTRAINT `autojurnals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `autojurnals` */

/*Table structure for table `barangs` */

DROP TABLE IF EXISTS `barangs`;

CREATE TABLE `barangs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `barang_id` varchar(191) NOT NULL,
  `user_id` char(36) NOT NULL,
  `nama_barang` varchar(191) NOT NULL,
  `satuan` varchar(191) NOT NULL,
  `stok` varchar(191) NOT NULL,
  `phisik` varchar(191) NOT NULL DEFAULT '0',
  `selisih` varchar(191) NOT NULL DEFAULT '0',
  `kategori` varchar(191) NOT NULL,
  `kelompok` varchar(191) NOT NULL,
  `harga_jual` bigint(20) NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `Perusahaan` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barangs_barang_id_unique` (`barang_id`),
  KEY `barangs_user_id_foreign` (`user_id`),
  KEY `barangs_perusahaan_foreign` (`Perusahaan`),
  CONSTRAINT `barangs_perusahaan_foreign` FOREIGN KEY (`Perusahaan`) REFERENCES `perusahaans` (`kode_perusahaan`) ON DELETE CASCADE,
  CONSTRAINT `barangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `barangs` */

insert  into `barangs`(`id`,`barang_id`,`user_id`,`nama_barang`,`satuan`,`stok`,`phisik`,`selisih`,`kategori`,`kelompok`,`harga_jual`,`harga_beli`,`Perusahaan`,`created_at`,`updated_at`) values 
(6,'BRG-001','9d7bd88b-7690-47ae-8436-ca86bf6edd0f','KEDELAI','pcs','0','0','0','K0001','KL0001',990,900,'K-0001','2024-11-29 18:36:11','2024-11-29 18:36:11');

/*Table structure for table `buku_besars` */

DROP TABLE IF EXISTS `buku_besars`;

CREATE TABLE `buku_besars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipe` varchar(191) NOT NULL,
  `no_bukubesar` varchar(191) NOT NULL,
  `ket` varchar(191) NOT NULL,
  `debet` bigint(20) NOT NULL DEFAULT 0,
  `kredit` bigint(20) NOT NULL DEFAULT 0,
  `jumlah` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `buku_besars_no_bukubesar_unique` (`no_bukubesar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `buku_besars` */

/*Table structure for table `cash_opnames` */

DROP TABLE IF EXISTS `cash_opnames`;

CREATE TABLE `cash_opnames` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pecahan` varchar(191) NOT NULL,
  `kertas` varchar(191) NOT NULL DEFAULT '0',
  `logam` varchar(191) NOT NULL DEFAULT '0',
  `jumlah` varchar(191) NOT NULL DEFAULT '0',
  `total` varchar(191) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cash_opnames` */

/*Table structure for table `detail_fakturs` */

DROP TABLE IF EXISTS `detail_fakturs`;

CREATE TABLE `detail_fakturs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_pb` varchar(191) NOT NULL,
  `id_fb` varchar(191) NOT NULL,
  `no_bukubesar` varchar(191) DEFAULT NULL,
  `ket_bukubesar` varchar(191) DEFAULT NULL,
  `no_subbukubesar` varchar(191) DEFAULT NULL,
  `ket_subbukubesar` varchar(191) DEFAULT NULL,
  `debit` bigint(20) DEFAULT NULL,
  `kredit` bigint(20) DEFAULT NULL,
  `ket` varchar(191) NOT NULL,
  `kode_perusahaan` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_fakturs_id_fb_foreign` (`id_fb`),
  CONSTRAINT `detail_fakturs_id_fb_foreign` FOREIGN KEY (`id_fb`) REFERENCES `faktur_belis` (`id_fb`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `detail_fakturs` */

/*Table structure for table `detail_fjs` */

DROP TABLE IF EXISTS `detail_fjs`;

CREATE TABLE `detail_fjs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_sj` varchar(191) NOT NULL,
  `id_fj` varchar(191) NOT NULL,
  `no_bukubesar` varchar(191) DEFAULT NULL,
  `ket_bukubesar` varchar(191) DEFAULT NULL,
  `no_subbukubesar` varchar(191) DEFAULT NULL,
  `ket_subbukubesar` varchar(191) DEFAULT NULL,
  `debit` bigint(20) DEFAULT NULL,
  `kredit` bigint(20) DEFAULT NULL,
  `ket` varchar(191) NOT NULL,
  `kode_perusahaan` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_fjs_id_fj_foreign` (`id_fj`),
  CONSTRAINT `detail_fjs_id_fj_foreign` FOREIGN KEY (`id_fj`) REFERENCES `faktur_juals` (`id_fj`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `detail_fjs` */

/*Table structure for table `detail_ops` */

DROP TABLE IF EXISTS `detail_ops`;

CREATE TABLE `detail_ops` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_so` varchar(191) NOT NULL,
  `barang_id` varchar(191) NOT NULL,
  `nama_barang` varchar(191) NOT NULL,
  `satuan` varchar(191) NOT NULL,
  `stok` bigint(20) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `potongan` bigint(20) DEFAULT NULL,
  `diskon` bigint(20) DEFAULT NULL,
  `total_harga` bigint(20) NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_ops_id_so_foreign` (`id_so`),
  CONSTRAINT `detail_ops_id_so_foreign` FOREIGN KEY (`id_so`) REFERENCES `order_penjualans` (`id_so`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `detail_ops` */

insert  into `detail_ops`(`id`,`id_so`,`barang_id`,`nama_barang`,`satuan`,`stok`,`harga`,`potongan`,`diskon`,`total_harga`,`harga_beli`,`created_at`,`updated_at`) values 
(1,'SO-0001','BRG-001','KEDELAI','pcs',3,213,0,0,639,10000,'2024-11-29 14:47:52','2024-11-29 14:47:52');

/*Table structure for table `detail_pbs` */

DROP TABLE IF EXISTS `detail_pbs`;

CREATE TABLE `detail_pbs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_po` varchar(191) NOT NULL,
  `id_pb` varchar(191) NOT NULL,
  `barang_id` varchar(191) NOT NULL,
  `nama_barang` varchar(191) NOT NULL,
  `satuan` varchar(191) NOT NULL,
  `stok` bigint(20) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `potongan` bigint(20) NOT NULL,
  `diskon` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_pbs_id_pb_foreign` (`id_pb`),
  CONSTRAINT `detail_pbs_id_pb_foreign` FOREIGN KEY (`id_pb`) REFERENCES `penerimaan_barangs` (`id_pb`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `detail_pbs` */

insert  into `detail_pbs`(`id`,`id_po`,`id_pb`,`barang_id`,`nama_barang`,`satuan`,`stok`,`harga`,`potongan`,`diskon`,`created_at`,`updated_at`) values 
(1,'PO-0001','PB-0001','BRG-002','SUSU SAYA','pcs',21,120000,0,0,'2024-11-23 03:16:48','2024-11-23 03:16:48');

/*Table structure for table `detail_pembayarans` */

DROP TABLE IF EXISTS `detail_pembayarans`;

CREATE TABLE `detail_pembayarans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL,
  `id_bayar` varchar(191) NOT NULL,
  `id_faktur` varchar(191) NOT NULL,
  `no_bukubesar` varchar(191) NOT NULL,
  `konsumen` varchar(191) NOT NULL,
  `nilai_faktur` bigint(20) NOT NULL,
  `jumlah_pembayaran` bigint(20) NOT NULL,
  `sisa_pembayaran` bigint(20) NOT NULL,
  `pembayaran_terkahir` datetime DEFAULT '2024-11-14 02:46:03' COMMENT 'Tanggal terakhir pembayaran',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `detail_pembayarans_id_bayar_unique` (`id_bayar`),
  KEY `detail_pembayarans_user_id_foreign` (`user_id`),
  CONSTRAINT `detail_pembayarans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `detail_pembayarans` */

/*Table structure for table `detail_pos` */

DROP TABLE IF EXISTS `detail_pos`;

CREATE TABLE `detail_pos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_po` varchar(191) NOT NULL,
  `barang_id` varchar(191) NOT NULL,
  `nama_barang` varchar(191) NOT NULL,
  `satuan` varchar(191) NOT NULL,
  `stok` bigint(20) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `potongan` bigint(20) DEFAULT NULL,
  `diskon` bigint(20) DEFAULT NULL,
  `total_harga` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_pos_id_po_foreign` (`id_po`),
  CONSTRAINT `detail_pos_id_po_foreign` FOREIGN KEY (`id_po`) REFERENCES `purchase_orders` (`id_po`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `detail_pos` */

/*Table structure for table `detail_sjs` */

DROP TABLE IF EXISTS `detail_sjs`;

CREATE TABLE `detail_sjs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_so` varchar(191) NOT NULL,
  `id_sj` varchar(191) NOT NULL,
  `barang_id` varchar(191) NOT NULL,
  `nama_barang` varchar(191) NOT NULL,
  `satuan` varchar(191) NOT NULL,
  `stok` bigint(20) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `diskon` bigint(20) NOT NULL,
  `potongan` bigint(20) DEFAULT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_sjs_id_sj_foreign` (`id_sj`),
  CONSTRAINT `detail_sjs_id_sj_foreign` FOREIGN KEY (`id_sj`) REFERENCES `surat_jalans` (`id_sj`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `detail_sjs` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `faktur_belis` */

DROP TABLE IF EXISTS `faktur_belis`;

CREATE TABLE `faktur_belis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_fb` varchar(191) NOT NULL,
  `id_pb` varchar(191) NOT NULL,
  `id_po` varchar(191) NOT NULL,
  `tanggal_fb` date NOT NULL,
  `ket` varchar(191) NOT NULL,
  `kode_perusahaan` varchar(191) NOT NULL,
  `nama_perusahaan` varchar(191) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `total_pembelian` bigint(20) NOT NULL,
  `pembayaran` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `faktur_belis_id_fb_unique` (`id_fb`),
  UNIQUE KEY `faktur_belis_id_pb_unique` (`id_pb`),
  UNIQUE KEY `faktur_belis_id_po_unique` (`id_po`),
  CONSTRAINT `faktur_belis_id_fb_foreign` FOREIGN KEY (`id_fb`) REFERENCES `faktur_lines` (`id_fb`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `faktur_belis` */

/*Table structure for table `faktur_juals` */

DROP TABLE IF EXISTS `faktur_juals`;

CREATE TABLE `faktur_juals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_fj` varchar(191) NOT NULL,
  `id_sj` varchar(191) NOT NULL,
  `id_so` varchar(191) NOT NULL,
  `tanggal_fj` date NOT NULL,
  `ket` varchar(191) NOT NULL,
  `kode_perusahaan` varchar(191) NOT NULL,
  `nama_perusahaan` varchar(191) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `total_penjualan` bigint(20) NOT NULL,
  `pembayaran` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `faktur_juals_id_fj_unique` (`id_fj`),
  UNIQUE KEY `faktur_juals_id_sj_unique` (`id_sj`),
  UNIQUE KEY `faktur_juals_id_so_unique` (`id_so`),
  CONSTRAINT `faktur_juals_id_fj_foreign` FOREIGN KEY (`id_fj`) REFERENCES `fj_lines` (`id_fj`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `faktur_juals` */

/*Table structure for table `faktur_lines` */

DROP TABLE IF EXISTS `faktur_lines`;

CREATE TABLE `faktur_lines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL,
  `id_fb` varchar(191) NOT NULL,
  `id_detailfb` varchar(191) NOT NULL,
  `hariini` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `faktur_lines_id_fb_unique` (`id_fb`),
  UNIQUE KEY `faktur_lines_id_detailfb_unique` (`id_detailfb`),
  KEY `faktur_lines_user_id_foreign` (`user_id`),
  CONSTRAINT `faktur_lines_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `faktur_lines` */

/*Table structure for table `fj_lines` */

DROP TABLE IF EXISTS `fj_lines`;

CREATE TABLE `fj_lines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL,
  `id_fj` varchar(191) NOT NULL,
  `id_detailfj` varchar(191) NOT NULL,
  `hariini` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fj_lines_id_fj_unique` (`id_fj`),
  UNIQUE KEY `fj_lines_id_detailfj_unique` (`id_detailfj`),
  KEY `fj_lines_user_id_foreign` (`user_id`),
  CONSTRAINT `fj_lines_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `fj_lines` */

/*Table structure for table `hpps` */

DROP TABLE IF EXISTS `hpps`;

CREATE TABLE `hpps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `barang_id` varchar(191) NOT NULL,
  `referensi` varchar(191) NOT NULL,
  `ket` varchar(191) NOT NULL,
  `stok` varchar(191) NOT NULL,
  `harga_beli` varchar(191) NOT NULL,
  `sisa` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `hpps` */

insert  into `hpps`(`id`,`barang_id`,`referensi`,`ket`,`stok`,`harga_beli`,`sisa`,`created_at`,`updated_at`) values 
(1,'BRG-002','PB-0001','PB','21','120000','21','2024-11-23 03:16:48','2024-11-23 03:16:48');

/*Table structure for table `informasi_perusahaans` */

DROP TABLE IF EXISTS `informasi_perusahaans`;

CREATE TABLE `informasi_perusahaans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) NOT NULL,
  `kode_perusahaan` varchar(191) NOT NULL,
  `nama_perusahaan` varchar(191) NOT NULL,
  `alamat_kantor` varchar(191) NOT NULL,
  `alamat_gudang` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `informasi_perusahaans_username_unique` (`username`),
  UNIQUE KEY `informasi_perusahaans_kode_perusahaan_unique` (`kode_perusahaan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `informasi_perusahaans` */

/*Table structure for table `jurnals` */

DROP TABLE IF EXISTS `jurnals`;

CREATE TABLE `jurnals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_jurnal` varchar(191) NOT NULL,
  `tanggal` date NOT NULL,
  `ket` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `jurnals_id_jurnal_unique` (`id_jurnal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jurnals` */

/*Table structure for table `kategoris` */

DROP TABLE IF EXISTS `kategoris`;

CREATE TABLE `kategoris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_kategori` varchar(191) NOT NULL,
  `kategori_barang` varchar(191) NOT NULL,
  `stok` varchar(191) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kategoris_kode_kategori_unique` (`kode_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kategoris` */

insert  into `kategoris`(`id`,`kode_kategori`,`kategori_barang`,`stok`,`created_at`,`updated_at`) values 
(1,'K0001','SUSU','21','2024-11-14 02:47:08','2024-11-23 03:16:48'),
(3,'K0002','SUSU','0','2024-12-02 05:50:33','2024-12-02 05:50:33');

/*Table structure for table `kelompoks` */

DROP TABLE IF EXISTS `kelompoks`;

CREATE TABLE `kelompoks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_kelompok` varchar(191) NOT NULL,
  `kode_kategori` varchar(191) NOT NULL,
  `kelompok_barang` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kelompoks_kode_kelompok_unique` (`kode_kelompok`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kelompoks` */

insert  into `kelompoks`(`id`,`kode_kelompok`,`kode_kategori`,`kelompok_barang`,`created_at`,`updated_at`) values 
(1,'KL0001','K0001','MINUMAN','2024-11-14 02:47:23','2024-11-14 02:47:23');

/*Table structure for table `laba_rugis` */

DROP TABLE IF EXISTS `laba_rugis`;

CREATE TABLE `laba_rugis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `laba_rugi` varchar(191) NOT NULL,
  `jumlah` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `laba_rugis_laba_rugi_unique` (`laba_rugi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `laba_rugis` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2023_10_03_043823_create_jenis_barangs_table',1),
(6,'2023_10_04_060958_create_perusahaans_table',1),
(7,'2023_10_06_041611_create_kategoris_table',1),
(8,'2023_10_06_042750_create_kelompoks_table',1),
(9,'2023_10_11_085351_create_oplines_table',1),
(10,'2023_10_12_025339_create_order_penjualans_table',1),
(11,'2023_10_12_083117_create_detail_ops_table',1),
(12,'2023_10_13_033511_create_mereks_table',1),
(13,'2023_10_13_065725_create_termins_table',1),
(14,'2023_10_16_025421_create_informasi_perusahaans_table',1),
(15,'2023_11_14_075713_create_po_lines_table',1),
(16,'2023_11_15_040725_create_purchase_orders_table',1),
(17,'2023_11_16_052950_create_detail_pos_table',1),
(18,'2023_11_17_053203_create_buku_besars_table',1),
(19,'2023_11_20_051901_create_sub_buku_besars_table',1),
(20,'2023_12_05_125143_create_pb_lines_table',1),
(21,'2023_12_06_072831_create_penerimaan_barangs_table',1),
(22,'2023_12_06_115154_create_detail_pbs_table',1),
(23,'2023_12_07_062604_create_sj_lines_table',1),
(24,'2023_12_07_062643_create_surat_jalans_table',1),
(25,'2023_12_07_062714_create_detail_sjs_table',1),
(26,'2023_12_07_135230_create_faktur_lines_table',1),
(27,'2023_12_08_134735_create_faktur_belis_table',1),
(28,'2023_12_08_135120_create_detail_fakturs_table',1),
(29,'2023_12_17_041018_create_fj_lines_table',1),
(30,'2023_12_18_040937_create_faktur_juals_table',1),
(31,'2023_12_18_041010_create_detail_fjs_table',1),
(32,'2024_01_05_104614_create_tipe_akuns_table',1),
(33,'2024_01_08_071629_create_riwayat_buku_besars_table',1),
(34,'2024_01_10_110915_create_neracas_table',1),
(35,'2024_01_13_102504_create_barangs_table',1),
(36,'2024_02_05_040231_create_stok_opnem_barangs_table',1),
(37,'2024_02_17_091241_create_detail_pembayarans_table',1),
(38,'2024_02_18_103655_create_pembayarans_table',1),
(39,'2024_02_26_032845_create_laba_rugis_table',1),
(40,'2024_02_26_045008_create_autojurnals_table',1),
(41,'2024_03_03_150950_create_triad_pembayarans_table',1),
(42,'2024_03_19_034537_create_jurnals_table',1),
(43,'2024_03_21_071708_create_hpps_table',1),
(44,'2024_03_22_072151_create_cash_opnames_table',1),
(45,'2024_10_01_121137_create_testings_table',1),
(46,'2024_10_09_061912_create_sessions_table',1),
(47,'2024_10_09_150814_create_suratorderpenjualans_table',1);

/*Table structure for table `neracas` */

DROP TABLE IF EXISTS `neracas`;

CREATE TABLE `neracas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `neraca` varchar(191) NOT NULL,
  `jumlah` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `neracas_neraca_unique` (`neraca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `neracas` */

/*Table structure for table `oplines` */

DROP TABLE IF EXISTS `oplines`;

CREATE TABLE `oplines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL,
  `id_so` varchar(191) NOT NULL,
  `id_detailso` varchar(191) NOT NULL,
  `hariini` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `oplines_id_so_unique` (`id_so`),
  UNIQUE KEY `oplines_id_detailso_unique` (`id_detailso`),
  KEY `oplines_user_id_foreign` (`user_id`),
  CONSTRAINT `oplines_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oplines` */

insert  into `oplines`(`id`,`user_id`,`id_so`,`id_detailso`,`hariini`,`created_at`,`updated_at`) values 
(1,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','SO-0001','D.SO-0001','2024-11-29','2024-11-29 14:47:52','2024-11-29 14:47:52');

/*Table structure for table `order_penjualans` */

DROP TABLE IF EXISTS `order_penjualans`;

CREATE TABLE `order_penjualans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_so` varchar(191) NOT NULL,
  `user` varchar(191) NOT NULL,
  `tanggal_op` date NOT NULL,
  `kode_perusahaan` varchar(191) NOT NULL,
  `nama_perusahaan` varchar(191) NOT NULL,
  `detail_op` varchar(191) NOT NULL,
  `potongan` bigint(20) DEFAULT NULL,
  `diskon` bigint(20) DEFAULT NULL,
  `status` enum('Permohonan','Approve','Decline') NOT NULL DEFAULT 'Permohonan',
  `jatuh_tempo` date NOT NULL,
  `id_sj` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_penjualans_id_so_unique` (`id_so`),
  UNIQUE KEY `order_penjualans_detail_op_unique` (`detail_op`),
  UNIQUE KEY `order_penjualans_id_sj_unique` (`id_sj`),
  CONSTRAINT `order_penjualans_id_so_foreign` FOREIGN KEY (`id_so`) REFERENCES `oplines` (`id_so`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `order_penjualans` */

insert  into `order_penjualans`(`id`,`id_so`,`user`,`tanggal_op`,`kode_perusahaan`,`nama_perusahaan`,`detail_op`,`potongan`,`diskon`,`status`,`jatuh_tempo`,`id_sj`,`created_at`,`updated_at`) values 
(1,'SO-0001','kelvianov anak si ferry','2024-11-29','K-0001','tunai','D.SO-0001',NULL,NULL,'Permohonan','2024-12-11',NULL,'2024-11-29 14:47:52','2024-11-29 14:47:52');

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `pb_lines` */

DROP TABLE IF EXISTS `pb_lines`;

CREATE TABLE `pb_lines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL,
  `id_pb` varchar(191) NOT NULL,
  `id_detail_pb` varchar(191) NOT NULL,
  `hariini` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pb_lines_id_pb_unique` (`id_pb`),
  UNIQUE KEY `pb_lines_id_detail_pb_unique` (`id_detail_pb`),
  KEY `pb_lines_user_id_foreign` (`user_id`),
  CONSTRAINT `pb_lines_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pb_lines` */

insert  into `pb_lines`(`id`,`user_id`,`id_pb`,`id_detail_pb`,`hariini`,`created_at`,`updated_at`) values 
(1,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PB-0001','D.PB-0001','2024-11-23','2024-11-23 03:16:47','2024-11-23 03:16:47'),
(2,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PB-0002','D.PB-0002','2024-11-23','2024-11-23 03:16:49','2024-11-23 03:16:49'),
(3,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PB-0003','D.PB-0003','2024-11-23','2024-11-23 03:16:50','2024-11-23 03:16:50');

/*Table structure for table `pembayarans` */

DROP TABLE IF EXISTS `pembayarans`;

CREATE TABLE `pembayarans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_bayar` varchar(191) NOT NULL,
  `no_akun` varchar(191) NOT NULL,
  `nama_akun` varchar(191) NOT NULL,
  `debit` bigint(20) NOT NULL,
  `kredit` bigint(20) NOT NULL,
  `keterangan` varchar(191) NOT NULL,
  `mata_uang` enum('IDR') NOT NULL DEFAULT 'IDR',
  `kurs` varchar(191) DEFAULT NULL,
  `jumlah` bigint(20) NOT NULL,
  `akun_pembantu` varchar(191) NOT NULL,
  `departemen` varchar(191) NOT NULL,
  `nama_karyawan` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pembayarans_id_bayar_foreign` (`id_bayar`),
  CONSTRAINT `pembayarans_id_bayar_foreign` FOREIGN KEY (`id_bayar`) REFERENCES `detail_pembayarans` (`id_bayar`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pembayarans` */

/*Table structure for table `penerimaan_barangs` */

DROP TABLE IF EXISTS `penerimaan_barangs`;

CREATE TABLE `penerimaan_barangs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_pb` varchar(191) NOT NULL,
  `id_po` varchar(191) NOT NULL,
  `tanggal_pb` date DEFAULT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `surat_jalan` varchar(191) NOT NULL,
  `ket` varchar(191) NOT NULL,
  `kode_perusahaan` varchar(191) NOT NULL,
  `nama_perusahaan` varchar(191) NOT NULL,
  `status` enum('Permohonan','Approve','Decline','Faktur') NOT NULL DEFAULT 'Permohonan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `penerimaan_barangs_id_pb_unique` (`id_pb`),
  UNIQUE KEY `penerimaan_barangs_id_po_unique` (`id_po`),
  UNIQUE KEY `penerimaan_barangs_surat_jalan_unique` (`surat_jalan`),
  CONSTRAINT `penerimaan_barangs_id_pb_foreign` FOREIGN KEY (`id_pb`) REFERENCES `pb_lines` (`id_pb`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `penerimaan_barangs` */

insert  into `penerimaan_barangs`(`id`,`id_pb`,`id_po`,`tanggal_pb`,`jatuh_tempo`,`surat_jalan`,`ket`,`kode_perusahaan`,`nama_perusahaan`,`status`,`created_at`,`updated_at`) values 
(1,'PB-0001','PO-0001','2024-11-23','2024-11-26','Suplier','Mobil','S-0002','Erkaaa','Permohonan','2024-11-23 03:16:48','2024-11-23 03:16:48');

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `perusahaans` */

DROP TABLE IF EXISTS `perusahaans`;

CREATE TABLE `perusahaans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_perusahaan` varchar(191) NOT NULL,
  `nama_perusahaan` varchar(191) NOT NULL,
  `jenis` varchar(191) NOT NULL,
  `alamat_kantor` varchar(191) NOT NULL,
  `alamat_gudang` varchar(191) NOT NULL,
  `nama_pimpinan` varchar(191) NOT NULL,
  `no_telepon` varchar(191) NOT NULL,
  `plafon_debit` decimal(10,2) DEFAULT NULL,
  `plafon_kredit` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `perusahaans_kode_perusahaan_unique` (`kode_perusahaan`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `perusahaans` */

insert  into `perusahaans`(`id`,`kode_perusahaan`,`nama_perusahaan`,`jenis`,`alamat_kantor`,`alamat_gudang`,`nama_pimpinan`,`no_telepon`,`plafon_debit`,`plafon_kredit`,`created_at`,`updated_at`) values 
(15,'K-0001','TEST','Konsumen','Jl.mercury timur no.07\r\nseorkarno','Jl.mercury timur no.07\r\nseorkarno','ferry','085137665233',NULL,NULL,'2024-11-30 01:31:08','2024-11-30 01:31:08'),
(16,'K-0002','sda','Konsumen','Jl.mercury timur no.07\r\nseorkarno','Jl.mercury timur no.07\r\nseorkarno','asda','085137665233',NULL,NULL,'2024-11-30 01:31:18','2024-11-30 01:31:18'),
(22,'S-0001','tunai','Supplier','Jl.mercury timur no.07\r\nseorkarno','Jl.mercury timur no.07\r\nseorkarno','ferry','085137665233',30000000.00,NULL,'2024-11-30 01:35:08','2024-11-30 01:35:08');

/*Table structure for table `po_line` */

DROP TABLE IF EXISTS `po_line`;

CREATE TABLE `po_line` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL,
  `id_po` varchar(191) NOT NULL,
  `id_detailpo` varchar(191) NOT NULL,
  `hariini` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `po_line_id_po_unique` (`id_po`),
  UNIQUE KEY `po_line_id_detailpo_unique` (`id_detailpo`),
  KEY `po_line_user_id_foreign` (`user_id`),
  CONSTRAINT `po_line_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `po_line` */

insert  into `po_line`(`id`,`user_id`,`id_po`,`id_detailpo`,`hariini`,`created_at`,`updated_at`) values 
(1,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0001','D.PO-0001','2024-11-14','2024-11-14 06:59:31','2024-11-14 06:59:31'),
(2,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0002','D.PO-0002','2024-11-14','2024-11-14 06:59:54','2024-11-14 06:59:54'),
(3,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0003','D.PO-0003','2024-11-14','2024-11-14 07:01:19','2024-11-14 07:01:19'),
(4,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0004','D.PO-0004','2024-11-14','2024-11-14 07:01:32','2024-11-14 07:01:32'),
(5,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0005','D.PO-0005','2024-11-29','2024-11-29 17:17:31','2024-11-29 17:17:31'),
(6,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0006','D.PO-0006','2024-11-29','2024-11-29 17:17:35','2024-11-29 17:17:35'),
(7,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0007','D.PO-0007','2024-11-29','2024-11-29 17:17:54','2024-11-29 17:17:54'),
(8,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0008','D.PO-0008','2024-11-29','2024-11-29 17:18:32','2024-11-29 17:18:32'),
(9,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0009','D.PO-0009','2024-11-29','2024-11-29 17:18:39','2024-11-29 17:18:39'),
(10,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0010','D.PO-0010','2024-11-29','2024-11-29 18:11:46','2024-11-29 18:11:46'),
(11,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0011','D.PO-0011','2024-11-29','2024-11-29 18:12:09','2024-11-29 18:12:09'),
(12,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0012','D.PO-0012','2024-11-29','2024-11-29 18:13:06','2024-11-29 18:13:06'),
(13,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0013','D.PO-0013','2024-11-29','2024-11-29 18:13:54','2024-11-29 18:13:54'),
(14,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0014','D.PO-0014','2024-11-29','2024-11-29 18:14:42','2024-11-29 18:14:42'),
(15,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0015','D.PO-0015','2024-11-29','2024-11-29 18:35:38','2024-11-29 18:35:38'),
(16,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0016','D.PO-0016','2024-11-29','2024-11-29 18:36:35','2024-11-29 18:36:35'),
(17,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0017','D.PO-0017','2024-11-29','2024-11-29 18:38:08','2024-11-29 18:38:08'),
(18,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0018','D.PO-0018','2024-11-29','2024-11-29 18:38:39','2024-11-29 18:38:39'),
(19,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0019','D.PO-0019','2024-11-29','2024-11-29 19:40:12','2024-11-29 19:40:12'),
(20,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0020','D.PO-0020','2024-11-29','2024-11-29 20:21:14','2024-11-29 20:21:14'),
(21,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0021','D.PO-0021','2024-11-29','2024-11-29 20:21:29','2024-11-29 20:21:29'),
(22,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0022','D.PO-0022','2024-11-29','2024-11-29 20:21:40','2024-11-29 20:21:40'),
(23,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0023','D.PO-0023','2024-11-29','2024-11-29 20:21:51','2024-11-29 20:21:51'),
(24,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0024','D.PO-0024','2024-11-29','2024-11-29 20:23:17','2024-11-29 20:23:17'),
(25,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0025','D.PO-0025','2024-11-29','2024-11-29 20:23:41','2024-11-29 20:23:41'),
(26,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0026','D.PO-0026','2024-11-29','2024-11-29 20:24:09','2024-11-29 20:24:09'),
(27,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0027','D.PO-0027','2024-11-29','2024-11-29 20:24:43','2024-11-29 20:24:43'),
(28,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0028','D.PO-0028','2024-11-29','2024-11-29 20:24:46','2024-11-29 20:24:46'),
(29,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0029','D.PO-0029','2024-11-29','2024-11-29 20:25:05','2024-11-29 20:25:05'),
(30,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0030','D.PO-0030','2024-11-29','2024-11-29 20:25:23','2024-11-29 20:25:23'),
(31,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0031','D.PO-0031','2024-11-29','2024-11-29 20:25:39','2024-11-29 20:25:39'),
(32,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0032','D.PO-0032','2024-11-29','2024-11-29 20:25:47','2024-11-29 20:25:47'),
(33,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0033','D.PO-0033','2024-11-29','2024-11-29 20:26:27','2024-11-29 20:26:27'),
(34,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0034','D.PO-0034','2024-11-29','2024-11-29 20:26:33','2024-11-29 20:26:33'),
(35,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0035','D.PO-0035','2024-11-29','2024-11-29 20:27:00','2024-11-29 20:27:00'),
(36,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0036','D.PO-0036','2024-11-29','2024-11-29 20:27:17','2024-11-29 20:27:17'),
(37,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0037','D.PO-0037','2024-11-29','2024-11-29 20:27:32','2024-11-29 20:27:32'),
(38,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0038','D.PO-0038','2024-11-29','2024-11-29 20:27:44','2024-11-29 20:27:44'),
(39,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0039','D.PO-0039','2024-11-29','2024-11-29 20:28:08','2024-11-29 20:28:08'),
(40,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0040','D.PO-0040','2024-11-29','2024-11-29 20:28:35','2024-11-29 20:28:35'),
(41,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0041','D.PO-0041','2024-11-29','2024-11-29 20:28:55','2024-11-29 20:28:55'),
(42,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0042','D.PO-0042','2024-11-29','2024-11-29 20:29:39','2024-11-29 20:29:39'),
(43,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0043','D.PO-0043','2024-11-29','2024-11-29 20:29:56','2024-11-29 20:29:56'),
(44,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0044','D.PO-0044','2024-11-29','2024-11-29 20:30:02','2024-11-29 20:30:02'),
(45,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0045','D.PO-0045','2024-11-29','2024-11-29 20:30:48','2024-11-29 20:30:48'),
(46,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0046','D.PO-0046','2024-11-29','2024-11-29 20:30:50','2024-11-29 20:30:50'),
(47,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0047','D.PO-0047','2024-11-29','2024-11-29 20:30:52','2024-11-29 20:30:52'),
(48,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0048','D.PO-0048','2024-11-29','2024-11-29 20:31:01','2024-11-29 20:31:01'),
(49,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0049','D.PO-0049','2024-11-29','2024-11-29 20:31:08','2024-11-29 20:31:08'),
(50,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0050','D.PO-0050','2024-11-29','2024-11-29 20:31:13','2024-11-29 20:31:13'),
(51,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0051','D.PO-0051','2024-11-29','2024-11-29 20:31:42','2024-11-29 20:31:42'),
(52,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0052','D.PO-0052','2024-11-29','2024-11-29 20:32:00','2024-11-29 20:32:00'),
(53,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0053','D.PO-0053','2024-11-29','2024-11-29 20:32:06','2024-11-29 20:32:06'),
(54,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0054','D.PO-0054','2024-11-29','2024-11-29 20:32:27','2024-11-29 20:32:27'),
(55,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0055','D.PO-0055','2024-11-29','2024-11-29 20:32:31','2024-11-29 20:32:31'),
(56,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0056','D.PO-0056','2024-11-29','2024-11-29 20:32:49','2024-11-29 20:32:49'),
(57,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0057','D.PO-0057','2024-11-29','2024-11-29 20:33:32','2024-11-29 20:33:32'),
(58,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0058','D.PO-0058','2024-11-29','2024-11-29 20:33:53','2024-11-29 20:33:53'),
(59,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0059','D.PO-0059','2024-11-29','2024-11-29 20:34:04','2024-11-29 20:34:04'),
(60,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0060','D.PO-0060','2024-11-29','2024-11-29 20:34:15','2024-11-29 20:34:15'),
(61,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0061','D.PO-0061','2024-11-29','2024-11-29 20:34:20','2024-11-29 20:34:20'),
(62,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0062','D.PO-0062','2024-11-29','2024-11-29 20:35:06','2024-11-29 20:35:06'),
(63,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0063','D.PO-0063','2024-11-29','2024-11-29 20:35:19','2024-11-29 20:35:19'),
(64,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0064','D.PO-0064','2024-11-29','2024-11-29 20:35:38','2024-11-29 20:35:38'),
(65,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0065','D.PO-0065','2024-11-29','2024-11-29 20:36:36','2024-11-29 20:36:36'),
(66,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0066','D.PO-0066','2024-11-29','2024-11-29 20:36:46','2024-11-29 20:36:46'),
(67,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0067','D.PO-0067','2024-11-29','2024-11-29 20:37:17','2024-11-29 20:37:17'),
(68,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0068','D.PO-0068','2024-11-29','2024-11-29 20:37:44','2024-11-29 20:37:44'),
(69,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0069','D.PO-0069','2024-11-29','2024-11-29 20:37:54','2024-11-29 20:37:54'),
(70,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0070','D.PO-0070','2024-11-29','2024-11-29 20:37:56','2024-11-29 20:37:56'),
(71,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0071','D.PO-0071','2024-11-29','2024-11-29 20:38:02','2024-11-29 20:38:02'),
(72,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0072','D.PO-0072','2024-12-01','2024-12-01 14:05:49','2024-12-01 14:05:49'),
(73,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0073','D.PO-0073','2024-12-01','2024-12-01 15:50:00','2024-12-01 15:50:00'),
(74,'9d7bd88b-7690-47ae-8436-ca86bf6edd0f','PO-0074','D.PO-0074','2024-12-01','2024-12-01 15:52:33','2024-12-01 15:52:33');

/*Table structure for table `purchase_orders` */

DROP TABLE IF EXISTS `purchase_orders`;

CREATE TABLE `purchase_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_po` varchar(191) NOT NULL,
  `user` varchar(191) NOT NULL,
  `tanggal_po` date NOT NULL,
  `kode_perusahaan` varchar(191) NOT NULL,
  `nama_perusahaan` varchar(191) NOT NULL,
  `detail_po` varchar(191) NOT NULL,
  `diskon` bigint(20) DEFAULT NULL,
  `potongan` bigint(20) DEFAULT NULL,
  `status` enum('Permohonan','Approve','Decline') NOT NULL DEFAULT 'Permohonan',
  `jatuh_tempo` date NOT NULL,
  `id_pb` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `purchase_orders_id_po_unique` (`id_po`),
  UNIQUE KEY `purchase_orders_detail_po_unique` (`detail_po`),
  UNIQUE KEY `purchase_orders_id_pb_unique` (`id_pb`),
  CONSTRAINT `purchase_orders_id_po_foreign` FOREIGN KEY (`id_po`) REFERENCES `po_line` (`id_po`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `purchase_orders` */

/*Table structure for table `riwayat_buku_besars` */

DROP TABLE IF EXISTS `riwayat_buku_besars`;

CREATE TABLE `riwayat_buku_besars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_riwayat` varchar(191) NOT NULL,
  `tanggal` date NOT NULL,
  `no_bukubesar` varchar(191) NOT NULL,
  `ket_bukubesar` varchar(191) NOT NULL,
  `no_subbukubesar` varchar(191) NOT NULL,
  `ket_subbukubesar` varchar(191) NOT NULL,
  `dok` varchar(191) NOT NULL,
  `no_referensi` varchar(191) NOT NULL,
  `ket` varchar(191) NOT NULL,
  `debet` bigint(20) NOT NULL,
  `kredit` bigint(20) NOT NULL,
  `saldo_kumulatif` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `riwayat_buku_besars_kode_riwayat_unique` (`kode_riwayat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `riwayat_buku_besars` */

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

/*Table structure for table `sj_lines` */

DROP TABLE IF EXISTS `sj_lines`;

CREATE TABLE `sj_lines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL,
  `id_sj` varchar(191) NOT NULL,
  `id_detail_sj` varchar(191) NOT NULL,
  `hariini` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sj_lines_id_sj_unique` (`id_sj`),
  UNIQUE KEY `sj_lines_id_detail_sj_unique` (`id_detail_sj`),
  KEY `sj_lines_user_id_foreign` (`user_id`),
  CONSTRAINT `sj_lines_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sj_lines` */

/*Table structure for table `stok_opnem_barangs` */

DROP TABLE IF EXISTS `stok_opnem_barangs`;

CREATE TABLE `stok_opnem_barangs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_stok_opnem` varchar(191) NOT NULL,
  `kode_barang` varchar(191) NOT NULL,
  `tanggal` date NOT NULL,
  `no_bukti` varchar(191) NOT NULL,
  `dok` varchar(191) NOT NULL,
  `ket` varchar(191) NOT NULL,
  `debet` bigint(20) NOT NULL,
  `kredit` bigint(20) NOT NULL,
  `stok` bigint(20) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stok_opnem_barangs_kode_stok_opnem_unique` (`kode_stok_opnem`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `stok_opnem_barangs` */

insert  into `stok_opnem_barangs`(`id`,`kode_stok_opnem`,`kode_barang`,`tanggal`,`no_bukti`,`dok`,`ket`,`debet`,`kredit`,`stok`,`harga`,`created_at`,`updated_at`) values 
(1,'SOB-0001','BRG-002','2024-11-23','PB-0001','PB','S-0002',21,0,21,120000,'2024-11-23 03:16:48','2024-11-23 03:16:48');

/*Table structure for table `sub_buku_besars` */

DROP TABLE IF EXISTS `sub_buku_besars`;

CREATE TABLE `sub_buku_besars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_bukubesar` varchar(191) NOT NULL,
  `no_subbukubesar` varchar(191) NOT NULL,
  `ket` varchar(191) NOT NULL,
  `bagian_dari_bukubesar` varchar(191) DEFAULT NULL,
  `debet` bigint(20) NOT NULL DEFAULT 0,
  `kredit` bigint(20) NOT NULL DEFAULT 0,
  `jumlah` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sub_buku_besars_no_subbukubesar_unique` (`no_subbukubesar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sub_buku_besars` */

/*Table structure for table `surat_jalans` */

DROP TABLE IF EXISTS `surat_jalans`;

CREATE TABLE `surat_jalans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_sj` varchar(191) NOT NULL,
  `id_so` varchar(191) NOT NULL,
  `tanggal_sj` date NOT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `nopol` varchar(191) NOT NULL,
  `nama_supir` varchar(191) NOT NULL,
  `ket` varchar(191) NOT NULL DEFAULT '-',
  `kode_perusahaan` varchar(191) NOT NULL,
  `nama_perusahaan` varchar(191) NOT NULL,
  `status` enum('Permohonan','Approve','Decline','Faktur','Jurnal') NOT NULL DEFAULT 'Permohonan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `surat_jalans_id_sj_unique` (`id_sj`),
  UNIQUE KEY `surat_jalans_id_so_unique` (`id_so`),
  CONSTRAINT `surat_jalans_id_sj_foreign` FOREIGN KEY (`id_sj`) REFERENCES `sj_lines` (`id_sj`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `surat_jalans` */

/*Table structure for table `suratorderpenjualans` */

DROP TABLE IF EXISTS `suratorderpenjualans`;

CREATE TABLE `suratorderpenjualans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `suratorderpenjualans` */

/*Table structure for table `termins` */

DROP TABLE IF EXISTS `termins`;

CREATE TABLE `termins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_termin` varchar(191) NOT NULL,
  `jatuh_tempo` int(11) NOT NULL,
  `tanggal_termin` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `termins_kode_termin_unique` (`kode_termin`),
  UNIQUE KEY `termins_jatuh_tempo_unique` (`jatuh_tempo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `termins` */

insert  into `termins`(`id`,`kode_termin`,`jatuh_tempo`,`tanggal_termin`,`created_at`,`updated_at`) values 
(1,'T-0001',12,'2024-11-26','2024-11-14 06:59:31','2024-11-14 06:59:31'),
(3,'T-0002',23,'2024-12-23','2024-11-29 18:14:42','2024-11-29 18:14:42'),
(5,'T-0004',54,'2025-01-23','2024-11-29 20:32:00','2024-11-29 20:32:00');

/*Table structure for table `testings` */

DROP TABLE IF EXISTS `testings`;

CREATE TABLE `testings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `testings` */

/*Table structure for table `tipe_akuns` */

DROP TABLE IF EXISTS `tipe_akuns`;

CREATE TABLE `tipe_akuns` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipe` varchar(191) NOT NULL,
  `jenis` varchar(191) NOT NULL,
  `jumlah` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipe_akuns_tipe_unique` (`tipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tipe_akuns` */

/*Table structure for table `triad_pembayarans` */

DROP TABLE IF EXISTS `triad_pembayarans`;

CREATE TABLE `triad_pembayarans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` char(36) NOT NULL,
  `id_bayar` varchar(191) NOT NULL,
  `bukti_pembayaran` varchar(191) DEFAULT NULL,
  `no_akun` varchar(191) NOT NULL,
  `no_konsumen` varchar(191) NOT NULL,
  `total_pembayaran` bigint(20) NOT NULL,
  `terakhir_update` datetime NOT NULL DEFAULT '2024-11-14 02:46:03',
  `status_autojurnal` enum('empty','no','verified') NOT NULL DEFAULT 'empty',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `triad_pembayarans_user_id_foreign` (`user_id`),
  KEY `triad_pembayarans_id_bayar_foreign` (`id_bayar`),
  CONSTRAINT `triad_pembayarans_id_bayar_foreign` FOREIGN KEY (`id_bayar`) REFERENCES `detail_pembayarans` (`id_bayar`) ON DELETE CASCADE,
  CONSTRAINT `triad_pembayarans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `triad_pembayarans` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `username` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `kategori` enum('Supplier','User','Admin','Developer') NOT NULL DEFAULT 'Admin',
  `password` varchar(191) NOT NULL,
  `kode_perusahaan` varchar(191) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_kode_perusahaan_unique` (`kode_perusahaan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`name`,`email`,`email_verified_at`,`kategori`,`password`,`kode_perusahaan`,`remember_token`,`created_at`,`updated_at`) values 
('9d7bd88b-7690-47ae-8436-ca86bf6edd0f','Kelvianov','kelvianov anak si ferry','kelvianov10@gmail.com','2024-11-14 02:46:53','Admin','$2y$10$/OaD.4zKPFlbSqgUddjOpORxdYGmokjloZ50aHg/VZZtMUUkmKchW','A-0001',NULL,'2024-11-14 09:46:35','2024-11-14 02:46:53');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
