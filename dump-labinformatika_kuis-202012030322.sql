-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: labinformatika_kuis
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.14-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2020_04_02_080934_create_customer_table',1),(5,'2020_04_11_044746_create_jawaban_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modul`
--

DROP TABLE IF EXISTS `modul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `aktif` varchar(11) NOT NULL DEFAULT '1',
  `id_praktikum` int(11) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modul`
--

LOCK TABLES `modul` WRITE;
/*!40000 ALTER TABLE `modul` DISABLE KEYS */;
INSERT INTO `modul` VALUES (1,'Tes Akhir','1',10,'');
/*!40000 ALTER TABLE `modul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `praktikum`
--

DROP TABLE IF EXISTS `praktikum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `praktikum` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `id_lab` int(255) NOT NULL,
  `aktif` varchar(221) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `praktikum`
--

LOCK TABLES `praktikum` WRITE;
/*!40000 ALTER TABLE `praktikum` DISABLE KEYS */;
INSERT INTO `praktikum` VALUES (1,'Basis Data 2019',1,'0'),(2,'Jaringan Komputer 2019',2,'0'),(3,'Struktur Data 2019',3,'0'),(4,'Pemrograman Berorientasi Objek 2019',1,'0'),(5,'Sistem Operasi 2019',2,'0'),(6,'Pemrograman Terstruktur 2019',3,'0'),(7,'Basis Data 2020',1,'0'),(8,'Jaringan Komputer 2020',2,'0'),(9,'Struktur Data 2020',3,'0'),(10,'Pemrograman Berorientasi Objek 2020',1,'1'),(11,'Pemrograman Terstruktur 2020',3,'1'),(12,'Sistem Operasi 2020',2,'1');
/*!40000 ALTER TABLE `praktikum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `praktikum_user`
--

DROP TABLE IF EXISTS `praktikum_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `praktikum_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_modul` int(11) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `praktikum_user`
--

LOCK TABLES `praktikum_user` WRITE;
/*!40000 ALTER TABLE `praktikum_user` DISABLE KEYS */;
INSERT INTO `praktikum_user` VALUES (1,'2',1,'Khisby','15','2020-12-02 20:21:20','2020-12-02 20:21:20');
/*!40000 ALTER TABLE `praktikum_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_soal`
--

DROP TABLE IF EXISTS `tbl_soal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_soal` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `id_modul` int(11) NOT NULL,
  `soal` text NOT NULL,
  `a` varchar(255) NOT NULL,
  `b` varchar(255) NOT NULL,
  `c` varchar(255) NOT NULL,
  `d` varchar(255) NOT NULL,
  `e` varchar(255) NOT NULL,
  `knc_jawaban` varchar(30) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `aktif` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_soal`
--

LOCK TABLES `tbl_soal` WRITE;
/*!40000 ALTER TABLE `tbl_soal` DISABLE KEYS */;
INSERT INTO `tbl_soal` VALUES (1,1,'Manakan query yang benar untuk table space dibawah ini?','create tablespace dodu.dbf datafile dodu size 10m;','create tablespace dodu datafile dodu.dbf size 10m;','create dodu tablespace datafile dodu.dbf size 10m;','create tablespace dodu datafile size dodu.dbf 10m;','create tablespace datafile dodu dodu.dbf size 10m;','b',NULL,'1','2020-12-02 20:19:01','2020-12-02 20:19:01'),(2,1,'Fungsi sequence adalah?','membuat primary key','menampilkan angka secara acak','membuat penomoran secara otomatis','menampilkan id primary key','mengambil foreign key','c',NULL,'1','2020-12-02 20:19:01','2020-12-02 20:19:01'),(3,1,'Manakah jawaban yang tepat untuk kode insert dibawah ini?','insert into product values(id_product.nextval, “JalanUX”)','insert into product (id_product, name_product) values (id.product.nextvall, “BlakRack”)','insert into product (id.product.currval, “Gemini”)','A dan B adalah jawaban yang benar','A dan C adalah jawaban yang benar','d',NULL,'1','2020-12-02 20:19:01','2020-12-02 20:19:01'),(4,1,'Ketika kita ingin menghapus seluruh data di tabel dan kita ingin sequence kembali ke angka 0. Maka perintah yang digunakan adalah?','DELETE FROM nggoleh;','TRUNCATE TABLE nggoleh;','UPDATE FROM nggoleh;','CLEAR nggoleh;','Delete nggoleh','b',NULL,'1','2020-12-02 20:19:01','2020-12-02 20:19:01'),(5,1,'Ketika program melakukan insert dan tiba-tiba terjadi crash sehingga program terpaksa berhenti. Perintah apakah yang akan otomatis dijalankan oleh oracle saat hal tersebut terjadi?','delete','savepoint','commit','exit','rollback','e',NULL,'1','2020-12-02 20:19:01','2020-12-02 20:19:01'),(6,1,'Cara yang tepat untuk menampilkan beberapa baris pada kolom nama yang sesuai dengan list kita adalah?','SELECT * FROM pelanggan WHERE nama=”Jane” AND nama=”Doe”;','SELECT * FROM pelanggan WHERE nama=”Jane” OR nama=”Doe”;','SELECT * FROM pelanggan WHERE nama=”Jane, Doe”;','SELECT * FROM pelanggan WHERE nama=”Jane” AND WHERE nama=”Doe”;','SELECT * FROM pelanggan WHERE nama IN (“Jane”, “Doe”);','e',NULL,'1','2020-12-02 20:19:01','2020-12-02 20:19:01'),(7,1,'Subquery yang menghasilkan satu nilai saja adalah?','Correlated subquery','Uncorrelated subquery','Single subquery','Only subquery','Scalar subquery','e',NULL,'1','2020-12-02 20:19:01','2020-12-02 20:19:01'),(8,1,'Jika kita punya tabel transaksi dan ingin menampilkan berapa jumlah transaksi yang terjadi pada id_pelanggan dengan nilai 1 adalah. Maka query yang tepat adalah?','SELECT * FROM transaksi WHERE id_pelanggan = 1;','SELECT SUM(*) FROM transaksi WHERE id_pelanggan = 1;','SELECT COUNT(id_pelanggan) FROM transaksi WHERE id_pelanggan = 1;','SELECT HITUNG(id_pelanggan) FROM transaksi WHERE id_pelanggan = 1;','SELECT COUNT(id_pelanggan = 1) FROM TRANSAKSI WHERE id_pelanggan = 1;','c',NULL,'1','2020-12-02 20:19:01','2020-12-02 20:19:01'),(9,1,'Untuk membuat sebuah report dengan join tabel transaksi, produk dan pelanggan. Query yang tepat adalah?','SELECT * FROM transaksi JOIN produk JOIN pelanggan;','SELECT * FROM transaksi JOIN produk.id_produk JOIN pelanggan.id_pelanggan;','SELECT * FROM transaksi JOIN produk.id_produk = transaksi.id_produk;','SELECT * FROM transaksi JOIN pelanggan.id_transaksi = transaksi.id_pelanggan;','SELECT * FROM transaksi JOIN pelanggan ON pelanggan.id_pelaggan = transaksi.id_pelanggan JOIN produk ON produk.id_produk = transaksi.id_produk;','e',NULL,'1','2020-12-02 20:19:01','2020-12-02 20:19:01'),(10,1,'Jika muncul pesan error “data manipulation operation not legal on this view” adalah karena?','Perintah select tidak tersedia pada view tersebut','Perintah Create Update Delete tidak diizinkan pada view tersebut karena data kurang lengkap','Perintah Create Update Delete tidak diizinkan pada view tersebut karena terjadi join lebih dari satu tabel','Perintah Create Update Delete tidak diizinkan pada view tersebut karena tidak terdapat view','Perintah Create Update Delete tidak diizinkan pada view tersebut karena tidak di commit','c',NULL,'1','2020-12-02 20:19:01','2020-12-02 20:19:01'),(11,1,'Driver class yang digunakan untuk koneksi database dari java adalah?','Mysql','SQL','OJDBC','Connection','Connection profile','c',NULL,'1','2020-12-02 20:19:01','2020-12-02 20:19:01'),(12,1,'Ketika kita melakukan proses CRUD dan terjadi error. Maka Exception yang digunakan adalah?','SQLException','ORACLEException','DATABASEException','XEException','CRUDExeption','a',NULL,'1','2020-12-02 20:19:01','2020-12-02 20:19:01'),(13,1,'Subquery pada klausa WHERE sering disebut sebagai  ?','Nestle query','Nested query','Branch query','Breanch query','A dan C benar','b',NULL,'1','2020-12-02 20:19:01','2020-12-02 20:19:01'),(14,1,'Subquery pada klausa FROM sering disebut sebagai ?','Line view','Outline view','Inline view','Outer view','Tidak ada yang benar','c',NULL,'1','2020-12-02 20:19:01','2020-12-02 20:19:01'),(15,1,'Dibawah ini, manakah yang termasuk perintah dasar DDL?','Insert, Select, Update, Delete','Select, Alter, Modify','Create, Select, Rename,  Drop','Select, Alter, Modify, Create','Create, Alter, Drop','e',NULL,'1','2020-12-02 20:19:01','2020-12-02 20:19:01'),(16,1,'Dibawah ini, manakah yang merupakan operator logika?','= , > , < , != , <= , >= ,','BETWEEN . . AND','Create, Select, Rename,  Drop','IN, IS NULL, =','AND, OR, NOT','e',NULL,'1','2020-12-02 20:19:01','2020-12-02 20:19:01'),(17,1,'Subquery yang tidak bergantung pada baris data query induknya disebut?','Correlated Subquery','Uncorrelated Subquery','Nestle Subquery','Unnestle Subquery','Tidak ada yang benar','b',NULL,'1','2020-12-02 20:19:01','2020-12-02 20:19:01'),(18,1,'Query dibawah ini yang berfungsi untuk menghapus database beserta object didalamnya adalah?','DROP USER nama_user CASCADE;','DROP TABLE table_name;','TRUNCATE TABLE table_name;','PURGE nama_user;','Tidak ada yang benar','e',NULL,'1','2020-12-02 20:19:01','2020-12-02 20:19:01'),(19,1,'Dibawah ini, manakah yang termasuk tipe constraint ?','Primary Key','Unique','Not Null','Foreign Key','Benar Semua','e',NULL,'1','2020-12-02 20:19:01','2020-12-02 20:19:01'),(20,1,'Keunggulan database Oracle adalah?','Scalability, Reliability, Serviceability, Stability','Availability, Multiplatform, Reusability, Stability','Privillige, Open Source,  Secured','Quick access, Open Source, Availability','Tidak ada yang benar','a',NULL,'1','2020-12-02 20:19:01','2020-12-02 20:19:01');
/*!40000 ALTER TABLE `tbl_soal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` enum('admin','mahasiswa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npm` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`npm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','adminrpl','1',NULL,NULL,NULL,'KstxGYmgPq6QFUeUK2L0wOy69Ho1m6VfqAXkqupcfDh7eNQvWLiL8BPFgUrU',NULL,NULL),(2,'mahasiswa','Khisby','06.2017.1.06852','https://labinformatika.itats.ac.id/upload/foto/06-2017-1-06852_2020-06-05_16-06-14.png',NULL,NULL,'twffLgoGdsfHaI8aoAYQM5P4rUo6wwp2kNvCWDm3pCqOJ4yjShGD6NaLSpYc',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `waktu`
--

DROP TABLE IF EXISTS `waktu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `waktu` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `waktu_mulai` datetime(6) DEFAULT NULL,
  `waktu_selesai` datetime(6) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_modul` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_modul` (`id_modul`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `waktu`
--

LOCK TABLES `waktu` WRITE;
/*!40000 ALTER TABLE `waktu` DISABLE KEYS */;
INSERT INTO `waktu` VALUES (1,'2020-12-03 03:20:06.000000','2020-12-03 03:21:20.000000','2020-12-02 19:34:37',1);
/*!40000 ALTER TABLE `waktu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'labinformatika_kuis'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-03  3:22:30
