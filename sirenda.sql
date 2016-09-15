/*
SQLyog Community v12.2.4 (32 bit)
MySQL - 5.6.16 : Database - sirenda
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sirenda` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sirenda`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(35) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `poto` varchar(30) DEFAULT NULL,
  `owner` varchar(30) DEFAULT NULL,
  `level` int(11) DEFAULT '3',
  `telp` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `price` double DEFAULT '2000',
  `saldo` double DEFAULT '0',
  `tgl` datetime DEFAULT NULL,
  `ip` varchar(25) DEFAULT NULL,
  `mode` int(11) DEFAULT '1',
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`username`,`password`,`poto`,`owner`,`level`,`telp`,`alamat`,`email`,`id_parent`,`price`,`saldo`,`tgl`,`ip`,`mode`) values 
(2,'admin','21232f297a57a5a743894a0e4a801fc3','2.jpg','Administrator',1,'',NULL,'',NULL,2000,0,NULL,NULL,1),
(32,'admin1','e00cf25ad42683b3df678c61f42c6bda','32.jpg','User',14,'',NULL,'',NULL,2000,0,'2016-08-26 14:15:29',NULL,1),
(34,'disdik','50ac30d9f12601fd112aecbc560d1cea','34.jpg','Dinas Pendidikan',18,'9',NULL,'bg@yahoo.com',NULL,2000,0,'2016-09-08 07:57:11',NULL,1),
(35,'subang','36a302757418a76b09f55ac0e3c77812','35.jpg','Subang',19,'1',NULL,'subang@gmail.com',NULL,2000,0,'2016-09-10 16:47:36',NULL,1);

/*Table structure for table `data_form` */

DROP TABLE IF EXISTS `data_form`;

CREATE TABLE `data_form` (
  `id_form` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) DEFAULT NULL,
  `nama_form` varchar(50) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id_form`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `data_form` */

insert  into `data_form`(`id_form`,`id_admin`,`nama_form`,`tgl`) values 
(11,20,'Formulir Pendaftaran','2016-07-13'),
(10,20,'Form1','2016-07-11'),
(12,20,'ok','2016-08-10');

/*Table structure for table `m_bid_urusan` */

DROP TABLE IF EXISTS `m_bid_urusan`;

CREATE TABLE `m_bid_urusan` (
  `id_bid_urusan` int(3) NOT NULL AUTO_INCREMENT,
  `kode_urusan` varchar(11) NOT NULL,
  `kode_bid_urusan` varchar(11) NOT NULL,
  `nama_bidang_urusan` varchar(120) NOT NULL,
  PRIMARY KEY (`id_bid_urusan`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `m_bid_urusan` */

insert  into `m_bid_urusan`(`id_bid_urusan`,`kode_urusan`,`kode_bid_urusan`,`nama_bidang_urusan`) values 
(1,'1','01','Pendidikan'),
(2,'1','02','Kesehatan'),
(3,'1','03','Pekerjaan Umum'),
(4,'1','04','Perumahan'),
(5,'1','05','Penataan Ruang'),
(6,'1','06','Perencanaan Pembangunan'),
(7,'1','07','Perhubungan'),
(8,'1','08','Lingkungan Hidup'),
(9,'1','09','Pertanahan'),
(10,'1','10','Kependudukan dan Catatan Sipil'),
(11,'1','11','Pemberdayaan Perempuan dan Perlindungan Anak'),
(12,'1','12','Keluarga Berencana dan Keluarga Sejahtera'),
(13,'1','13','Sosial'),
(14,'1','14','Ketenagakerjaan'),
(15,'1','15','Koperasi dan Usaha Kecil Menengah'),
(16,'1','16','Penanaman Modal'),
(17,'1','17','Kebudayaan'),
(18,'1','18','Kepemudaan dan Olah Raga'),
(19,'1','19','Kesatuan Bangsa dan Politik Dalam Negeri'),
(20,'1','20','Otonomi Daerah, Pemerintahan Umum, Administrasi Keuangan Daerah, Perangkat Daerah, Kepegawaian dan Persandian'),
(21,'1','21','Ketahanan Pangan'),
(22,'1','22','Pemberdayaan Masyarakat dan Desa'),
(23,'1','23','Statistik'),
(24,'1','24','Kearsipan'),
(25,'1','25','Komunikasi dan Informatika'),
(26,'1','26','Perpustakaan'),
(27,'2','01','Pertanian'),
(28,'2','02','Kehutanan'),
(29,'2','03','Energi dan Sumber Daya Mineral'),
(30,'2','04','Pariwisata'),
(31,'2','05','Kelautan dan Perikanan'),
(32,'2','06','Perdagangan'),
(33,'2','07','Industri'),
(34,'2','08','Ketransmigrasian');

/*Table structure for table `m_kegiatan` */

DROP TABLE IF EXISTS `m_kegiatan`;

CREATE TABLE `m_kegiatan` (
  `id_keg` int(11) NOT NULL AUTO_INCREMENT,
  `kode_urusan` varchar(11) NOT NULL,
  `kode_bid_urusan` varchar(11) NOT NULL,
  `kode_program` varchar(11) NOT NULL,
  `kode_kegiatan` varchar(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_keg`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `m_kegiatan` */

insert  into `m_kegiatan`(`id_keg`,`kode_urusan`,`kode_bid_urusan`,`kode_program`,`kode_kegiatan`,`nama_kegiatan`) values 
(12,'1','02','02','01','Pengadaaan obat dan perbekalan kesehatan'),
(14,'2','03','01','01','Pembinaan dan Pendataan Pengambilan dan Pemanfaatan Air Tanah'),
(16,'2','08','','01','Program Pengembangan Wilayah Transmigrasi'),
(17,'1','02','02','02','Peningkatan pelayanan kesehatan bagi pengungsi korban bencana'),
(18,'1','02','02','03','Kapitasi Jaminan Kesehatan Nasional (JKN) di FKTP Rawalele1');

/*Table structure for table `m_program` */

DROP TABLE IF EXISTS `m_program`;

CREATE TABLE `m_program` (
  `id_prog` int(11) NOT NULL AUTO_INCREMENT,
  `kode_urusan` int(11) NOT NULL,
  `kode_bidang_urusan` varchar(11) NOT NULL,
  `kode_program` varchar(11) NOT NULL,
  `nama_program` varchar(100) NOT NULL,
  PRIMARY KEY (`id_prog`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

/*Data for the table `m_program` */

insert  into `m_program`(`id_prog`,`kode_urusan`,`kode_bidang_urusan`,`kode_program`,`nama_program`) values 
(63,2,'03','01','Program pengawasan dan penertiban kegiatan rakyat yang berpotensi merusak lingkungan'),
(64,2,'03','02','Program pembinaan dan pengembangan bidang ketenagalistrikan'),
(65,2,'03','03','Program Pengembangan Pertambangan dan Energi'),
(66,2,'03','04','Pembangunan Sistem Informasi/Data Base Pertambangan Energi'),
(67,2,'01','01','Program Peningkatan Kesejahteraan Petani'),
(68,2,'01','02','Program Peningkatan Ketahanan Pangan pertanian/perkebunan'),
(69,2,'01','03','Program peningkatan pemasaran hasil produksi pertanian/perkebunan'),
(70,2,'01','04','Program peningkatan penerapan teknologi pertanian/perkebunan'),
(71,2,'01','05','Program Peningkatan Produksi Pertanian/Perkebunan'),
(72,2,'01','06','Program Pengawasan dan Pengendalian Usaha Perkebunan'),
(73,2,'04','01','Program Pengembangan Pemasaran Pariwisata'),
(74,2,'04','02','Program Pengembangan Destinasi Pariwisata'),
(75,1,'02','01','Program Obat dan Perbekalan Kesehatan'),
(76,1,'02','02','Program Upaya Kesehatan Masyarakat'),
(77,2,'08','01','Program Pengembangan Wilayah Transmigrasi');

/*Table structure for table `m_satker` */

DROP TABLE IF EXISTS `m_satker`;

CREATE TABLE `m_satker` (
  `id_satker` int(3) NOT NULL AUTO_INCREMENT,
  `kode_satker` varchar(3) NOT NULL,
  `nama_satker` varchar(150) NOT NULL,
  `type_satker` varchar(2) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  PRIMARY KEY (`id_satker`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

/*Data for the table `m_satker` */

insert  into `m_satker`(`id_satker`,`kode_satker`,`nama_satker`,`type_satker`,`kategori`) values 
(1,'01','Dinas Pendidikan (Disdik)','1','SOSBUD'),
(2,'02','Akademi Keperwatan (AKPER)','1','SOSBUD'),
(3,'03','Dinas Kesehatan (Dinkes)','1','SOSBUD'),
(4,'04','Rumah Sakit Umum Daerah (RSUD)','1','SOSBUD'),
(5,'05','Badan Perencanaan Pembangunan Daerah (BAPPEDA)','1','SOSBUD'),
(6,'06','Dinas Kependudukan dan Catatan Sipil (Disdukcapil)','1','SOSBUD'),
(7,'07','Dinas Sosial (Dinsos)','1','SOSBUD'),
(8,'08','Dinas Tenaga Kerja dan Transmigrasi (Disnakertrans)','1','SOSBUD'),
(9,'09','Kantor Kesatuan Bangsa dan Perlindungan Masyarakat (Kesbanglinmas)','1','SOSBUD'),
(10,'10','Kantor Satuan Polisi Pamong Praja (SatpolPP)','1','SOSBUD'),
(11,'11','Sekretariat Daerah (Setda)','1','SOSBUD'),
(12,'12','Sekretariat DPRD (Setwan)','1','SOSBUD'),
(13,'13','Inspektorat Daerah (Irda)','1','SOSBUD'),
(14,'14','Dinas Pendapatan, Pengelolaan Keuangan dan Aset Daerah (DPPKAD)','1','SOSBUD'),
(15,'15','Badan Kepegawaian Daerah (BKD)','1','SOSBUD'),
(16,'16','Badan Pemberdayaan Masyarakat Desa dan Keluarga Berencana (BPMKB)','1','SOSBUD'),
(17,'17','Kantor Arsip Daerah (ARDA)','1','SOSBUD'),
(18,'18','Dinas Komunikasi dan Informatika (Diskominfo)','1','SOSBUD'),
(19,'19','Kantor Perpustakaan Daerah','1','SOSBUD'),
(20,'20','Dinas Kebudayaan Parawisarata Pemuda dan Olahraga','1','SOSBUD'),
(21,'21','Dinas Bina Marga dan Pengairan (Disbimair)','1','FISIK'),
(22,'22','Dinas Tataruang, Pemukiman dan Kebersihan (Distarkimsih)','1','FISIK'),
(23,'23','Badan Lingkungan Hidup (BLH)','1','FISIK'),
(24,'24','Dinas Perhubungan (Dishub)','1','FISIK'),
(25,'25','Dinas Koperasi, Usaha Mikro, Kecil dan Menengah (Dinkop UMKM)','1','EKONOMI'),
(26,'26','Badan Penanaman Modal dan Perijinan (BPMP)','1','EKONOMI'),
(27,'27','Dinas Pertanian dan Tanaman Pangan (Dispertanpang)','1','EKONOMI'),
(28,'28','Dinas Peternakan (Disnak)','1','EKONOMI'),
(29,'29','Badan Pelaksana Penyuluhan Pertanian Perikanan Kehutanan dan Ketahanan Pangan (BP4KKP)','1','EKONOMI'),
(30,'30','Dinas Kehutanan dan Perkebunan (Dishutbun)','1','EKONOMI'),
(31,'31','Dinas Pertambangan dan Energi (Distamben)','1','EKONOMI'),
(32,'32','Dinas Kelautan dan Perikanan (Diskelkan)','1','EKONOMI'),
(33,'33','Dinas Perindustrian Perdagangan dan Pengelolaan Pasar (Disperindagsar)','1','EKONOMI'),
(34,'34','Kecamatan Subang','2','PEMERINTAHAN'),
(35,'35','Kecamatan Cibogo','2','PEMERINTAHAN'),
(36,'36','Kecamatan Cijambe','2','PEMERINTAHAN'),
(37,'37','Kecamatan Jalancagak','2','PEMERINTAHAN'),
(38,'38','Kecamatan Sagalaherang','2','PEMERINTAHAN'),
(39,'39','Kecamatan Cisalak ','2','PEMERINTAHAN'),
(40,'40','Kecamatan Tanjungsiang ','2','PEMERINTAHAN'),
(41,'41','Kecamatan Pagaden','2','PEMERINTAHAN'),
(42,'42','Kecamatan Binong ','2','PEMERINTAHAN'),
(43,'43','Kecamatan Pamanukan','2','PEMERINTAHAN'),
(44,'44','Kecamatan Legonkulon','2','PEMERINTAHAN'),
(45,'45','Kecamatan Cipunagara','2','PEMERINTAHAN'),
(46,'46','Kecamatan Compreng','2','PEMERINTAHAN'),
(47,'47','Kecamatan Pusakanagara','2','PEMERINTAHAN'),
(48,'48','Kecamatan Ciasem','2','PEMERINTAHAN'),
(49,'49','Kecamatan Blanakan','2','PEMERINTAHAN'),
(50,'50','Kecamatan Patokbeusi ','2','PEMERINTAHAN'),
(51,'51','Kecamatan Pabuaran','2','PEMERINTAHAN'),
(52,'52','Kecamatan Cipeundeuy','2','PEMERINTAHAN'),
(53,'53','Kecamatan Purwadadi','2','PEMERINTAHAN'),
(54,'54','Kecamatan Kalijati','2','PEMERINTAHAN'),
(55,'55','Kecamatan Cikaum','2','PEMERINTAHAN'),
(56,'56','Kecamatan Serangpanjang','2','PEMERINTAHAN'),
(57,'57','Kecamatan Sukasari','2','PEMERINTAHAN'),
(58,'58','Kecamatan Tambakdahan','2','PEMERINTAHAN'),
(59,'59','Kecamatan Kasomalang','2','PEMERINTAHAN'),
(60,'60','Kecamatan Dawuan','2','PEMERINTAHAN'),
(61,'61','Kecamatan Pagaden Barat','2','PEMERINTAHAN'),
(62,'62','Kecamatan Ciater','2','PEMERINTAHAN'),
(63,'63','Kecamatan Pusakajaya','2','PEMERINTAHAN');

/*Table structure for table `m_tahun` */

DROP TABLE IF EXISTS `m_tahun`;

CREATE TABLE `m_tahun` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `n_tahun` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `m_tahun` */

insert  into `m_tahun`(`id`,`n_tahun`) values 
(1,'2010'),
(2,'2011'),
(3,'2012'),
(4,'2013'),
(5,'2014'),
(6,'2015'),
(7,'2016');

/*Table structure for table `m_urusan` */

DROP TABLE IF EXISTS `m_urusan`;

CREATE TABLE `m_urusan` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `kode_urusan` varchar(3) NOT NULL,
  `nama_urusan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `m_urusan` */

insert  into `m_urusan`(`id`,`kode_urusan`,`nama_urusan`) values 
(1,'1','Wajib'),
(2,'2','Pilihan');

/*Table structure for table `main_konfig` */

DROP TABLE IF EXISTS `main_konfig`;

CREATE TABLE `main_konfig` (
  `id_konfig` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `value` text,
  PRIMARY KEY (`id_konfig`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `main_konfig` */

insert  into `main_konfig`(`id_konfig`,`nama`,`value`) values 
(1,'Loggo','loggo.jpg'),
(2,'nama aplikasi','SIRENDA MUSRENBANG'),
(3,'Tanggal Project','26/08/2016'),
(4,'Klien','BAPPEDA'),
(5,'Product By','dr.pc'),
(6,'Jenis Login','1'),
(8,'footer','SIRENDA MUSRENBANG 2016'),
(7,'record log','1000');

/*Table structure for table `main_level` */

DROP TABLE IF EXISTS `main_level`;

CREATE TABLE `main_level` (
  `id_level` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `direct` text,
  `ket` text,
  PRIMARY KEY (`id_level`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `main_level` */

insert  into `main_level`(`id_level`,`nama`,`direct`,`ket`) values 
(1,'admin','dashboard','Untuk BAPPEDA'),
(18,'skpd','dashboard','Untuk SKPD'),
(19,'kecamatan','dashboard','Untuk Kecamatan');

/*Table structure for table `main_log` */

DROP TABLE IF EXISTS `main_log`;

CREATE TABLE `main_log` (
  `id_log` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) DEFAULT NULL,
  `nama_user` varchar(56) DEFAULT NULL,
  `table_updated` varchar(25) DEFAULT NULL,
  `aksi` text,
  `tgl` datetime DEFAULT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `main_log` */

insert  into `main_log`(`id_log`,`id_admin`,`nama_user`,`table_updated`,`aksi`,`tgl`) values 
(1,2,'Administrator','admin','ganti password','2016-08-29 08:52:30'),
(2,2,'Administrator','admin','Upload photo','2016-08-29 10:21:56'),
(3,2,'Administrator','admin','update data profile','2016-08-29 10:22:07'),
(4,2,'Administrator','admin','Upload photo','2016-09-08 07:57:11'),
(5,2,'Administrator','admin','Upload photo','2016-09-10 16:47:36'),
(6,2,'Administrator','admin','Upload photo','2016-09-10 16:47:52'),
(7,2,'Administrator','admin','update data profile','2016-09-10 16:47:52'),
(8,2,'Administrator','admin','update data profile','2016-09-13 09:14:51');

/*Table structure for table `main_menu` */

DROP TABLE IF EXISTS `main_menu`;

CREATE TABLE `main_menu` (
  `id_menu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) DEFAULT NULL,
  `level` enum('1','2') DEFAULT NULL,
  `id_main` int(11) DEFAULT '0',
  `icon` varchar(25) DEFAULT NULL,
  `hak_akses` int(11) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `main_menu` */

insert  into `main_menu`(`id_menu`,`nama`,`level`,`id_main`,`icon`,`hak_akses`,`link`) values 
(1,'Dashboard','1',0,'fa fa-home',1,'dashboard'),
(2,'Data Master','1',1,'fa fa-book',1,'data_master'),
(3,'Master Satker','2',2,'',1,'data_master/master_skpd'),
(4,'Master Urusan','2',2,'',1,'data_master/master_urusan'),
(5,'Master Bid Urusan','2',2,'',1,'data_master/master_bidang'),
(6,'Master Program','2',2,'',1,'data_master/master_program'),
(7,'Master Kegiatan','2',2,'',1,'data_master/master_kegiatan'),
(8,'Master Template','2',2,'',1,'data_master/master_template'),
(9,'Master Mapping Urusan','2',2,'',1,'data_master/master_mapping'),
(10,'RPJMD','1',1,'fa fa-book',1,'rpjmd'),
(11,'Plaform SKPD','2',14,'',1,'rkpd/plaform_anggaran_skpd'),
(12,'Entry Data','2',10,'',1,'rencana_kerja/entry_data'),
(13,'View Data','2',10,'',1,'rpjmd/view_data'),
(14,'RKPD','1',1,'fa fa-book',1,'rkpd'),
(15,'Plaform Musrenbang','2',14,'',1,'rkpd/plaform_anggaran_musrenbang'),
(16,'Renja SKPD','2',14,'',1,'rkpd/renja_skpd'),
(17,'Management User','1',1,'fa fa-cogs',1,'manage_user'),
(18,'Konfigurasi','2',17,'',1,'manage_user/konfig'),
(19,'User Group','2',17,'',1,'manage_user/user_group'),
(20,'Data User','2',17,'',1,'manage_user/data_user'),
(21,'Input Rencana Anggaran','1',1,'fa fa-plus',18,'skpd/rencana_anggaran'),
(22,'Rencana Anggaran','2',21,'fa fa-plus',18,'http://localhost/sirenda/skpd/rencana_anggaran'),
(24,'Musrenbang Kecamatan','2',14,'',1,'rkpd/musrenbang_kecamatan'),
(23,'View Renja','2',14,'',1,'rkpd/view_renja'),
(25,'View Musrenbang Kec','2',14,'',1,'rkpd/view_musrenbang'),
(26,'Konsolidasi','2',14,'',1,'rkpd/kondolidasi'),
(27,'Forum SKPD','2',14,'',1,'rkpd/forum_skpd'),
(31,'View Musrenbang Kec','2',29,'',19,'rkpd/view_musrenbang'),
(29,'RKPD','1',1,'',19,'rkpd'),
(30,'Murenbang Kecamatan','2',29,'',19,'rkpd/musrenbang_kecamatan'),
(28,'Dashboard','1',0,'fa fa-home',19,'dashboard');

/*Table structure for table `t_musrenbang` */

DROP TABLE IF EXISTS `t_musrenbang`;

CREATE TABLE `t_musrenbang` (
  `id_musrenbang` int(3) NOT NULL AUTO_INCREMENT,
  `tahun` int(4) NOT NULL,
  `kecamatan` int(3) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `program_kegiatan` varchar(50) NOT NULL,
  `indikator_program` varchar(100) NOT NULL,
  `volume` varchar(50) NOT NULL,
  `lok_kecamatan` int(3) NOT NULL,
  `lok_desa` varchar(30) NOT NULL,
  `lok_cpcl` varchar(30) NOT NULL,
  `apbd_kab` double NOT NULL,
  `apbd_kec` double NOT NULL,
  `apbn` double NOT NULL,
  PRIMARY KEY (`id_musrenbang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_musrenbang` */

/*Table structure for table `t_plaform_musrenbang` */

DROP TABLE IF EXISTS `t_plaform_musrenbang`;

CREATE TABLE `t_plaform_musrenbang` (
  `id_anggaranmusrenbang` int(3) NOT NULL AUTO_INCREMENT,
  `tahun` int(3) NOT NULL,
  `kode_satker` varchar(11) NOT NULL,
  `pagu_anggaran` varchar(15) NOT NULL,
  PRIMARY KEY (`id_anggaranmusrenbang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `t_plaform_musrenbang` */

insert  into `t_plaform_musrenbang`(`id_anggaranmusrenbang`,`tahun`,`kode_satker`,`pagu_anggaran`) values 
(1,7,'07','12'),
(2,7,'05','13');

/*Table structure for table `t_plaform_skpd` */

DROP TABLE IF EXISTS `t_plaform_skpd`;

CREATE TABLE `t_plaform_skpd` (
  `id_anggaranskpd` int(3) NOT NULL AUTO_INCREMENT,
  `tahun` int(3) NOT NULL,
  `kode_satker` varchar(11) NOT NULL,
  `pagu_anggaran` varchar(15) NOT NULL,
  PRIMARY KEY (`id_anggaranskpd`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `t_plaform_skpd` */

insert  into `t_plaform_skpd`(`id_anggaranskpd`,`tahun`,`kode_satker`,`pagu_anggaran`) values 
(1,1,'01','232');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
