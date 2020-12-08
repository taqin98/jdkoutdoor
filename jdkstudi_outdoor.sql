# Host: localhost  (Version 5.5.5-10.1.39-MariaDB)
# Date: 2019-07-15 06:04:12
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "produk"
#

DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(255) DEFAULT NULL,
  `foto_produk` text,
  `nama_produk` varchar(255) DEFAULT NULL,
  `harga_produk` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

#
# Data for table "produk"
#

INSERT INTO `produk` VALUES (8,'C11','carrier.jpg','Carier Shiuox 60L','30000'),(9,'T11','tenda_dome_4.jpg','Tenda Dome kap 4','40000'),(10,'N11','nesting_bundar_set.jpg','Paket Nesting bundar','15000'),(11,'SB11','sb.jpg','Sleeping Bag','20000');

#
# Structure for table "transaksi"
#

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `Id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `tanggal_transaksi` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_transaksi` varchar(255) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `bukti_foto` text,
  PRIMARY KEY (`Id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Data for table "transaksi"
#

INSERT INTO `transaksi` VALUES (8,'taqin98','2019-07-15 04:47:09','60000','Selesai','buntu.png');

#
# Structure for table "transaksi_penyewaan"
#

DROP TABLE IF EXISTS `transaksi_penyewaan`;
CREATE TABLE `transaksi_penyewaan` (
  `Id_transaksi_penyewaan` int(11) NOT NULL AUTO_INCREMENT,
  `Id_transaksi` varchar(255) DEFAULT NULL,
  `kode_produk` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `hari` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `sub_total` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id_transaksi_penyewaan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Data for table "transaksi_penyewaan"
#

INSERT INTO `transaksi_penyewaan` VALUES (9,'8','SB11','1',1,'Sleeping Bag','20000','20000'),(10,'8','T11','1',1,'Tenda Dome kap 4','40000','40000');

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `foto_id` text,
  `hp` varchar(255) DEFAULT NULL,
  `alm` text,
  `level` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'taqin98','taqin98','Hdhdhd','','Hshsb','Hshsh','0'),(2,'adot','adot','Yy','','0877655','Ggh','0'),(3,'dimas','dimas',NULL,NULL,NULL,NULL,'0'),(4,'agus','agus','gfgfgfgfg','astronomy-1867616_960_720.jpg','66565665','hghghghghg','0'),(5,'Gg','123','Ggg','','Ggg','Ggg','0'),(6,'admin','admin','Nurul Muttaqin',NULL,NULL,NULL,'1');
