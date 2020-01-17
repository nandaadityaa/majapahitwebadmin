/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : kpi

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2020-01-17 15:23:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_admin`
-- ----------------------------
DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin` (
  `id_admin` int(8) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `alamat` varchar(64) NOT NULL,
  `no_hp` varchar(64) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_admin
-- ----------------------------
INSERT INTO `tb_admin` VALUES ('1', 'Nanda Aditya', 'nanda.adityaa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl. Bintara ', '0812382183128');
INSERT INTO `tb_admin` VALUES ('2', 'akuns', 'akun@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Jalan', '0812312838213');

-- ----------------------------
-- Table structure for `tb_barang`
-- ----------------------------
DROP TABLE IF EXISTS `tb_barang`;
CREATE TABLE `tb_barang` (
  `kode_barang` varchar(64) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `harga` int(18) NOT NULL,
  PRIMARY KEY (`kode_barang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_barang
-- ----------------------------
INSERT INTO `tb_barang` VALUES ('BRG2001160001', 'Susu', '9000');
INSERT INTO `tb_barang` VALUES ('BRG2001160002', 'Beras', '20000');
INSERT INTO `tb_barang` VALUES ('BRG2001160003', 'Telur', '6000');
INSERT INTO `tb_barang` VALUES ('BRG2001160004', 'Sabun', '15000');

-- ----------------------------
-- Table structure for `tb_detail_transaksi`
-- ----------------------------
DROP TABLE IF EXISTS `tb_detail_transaksi`;
CREATE TABLE `tb_detail_transaksi` (
  `id_detail` int(8) NOT NULL AUTO_INCREMENT,
  `kode_transaksi` varchar(64) NOT NULL,
  `nama_barang` text NOT NULL,
  `harga` int(8) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `adm_input` varchar(64) NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_detail_transaksi
-- ----------------------------
INSERT INTO `tb_detail_transaksi` VALUES ('8', 'TRS2001160005', 'Susu', '9000', '2020-01-17 09:50:24', 'Nanda Aditya');
INSERT INTO `tb_detail_transaksi` VALUES ('9', 'TRS2001160005', 'Beras', '20000', '2020-01-17 09:50:24', 'Nanda Aditya');
INSERT INTO `tb_detail_transaksi` VALUES ('10', 'TRS2001160005', 'Telur', '6000', '2020-01-17 09:50:24', 'Nanda Aditya');
INSERT INTO `tb_detail_transaksi` VALUES ('11', 'TRS2001160006', 'Sabun', '15000', '2020-01-17 10:47:41', 'Nanda Aditya');
INSERT INTO `tb_detail_transaksi` VALUES ('6', 'TRS2001160003', 'Telur', '6000', '2020-01-17 09:48:52', 'Nanda Aditya');
INSERT INTO `tb_detail_transaksi` VALUES ('7', 'TRS2001160004', 'Beras', '20000', '2020-01-17 09:49:31', 'Nanda Aditya');
INSERT INTO `tb_detail_transaksi` VALUES ('12', 'TRS2001160006', 'Beras', '20000', '2020-01-17 10:47:41', 'Nanda Aditya');
INSERT INTO `tb_detail_transaksi` VALUES ('13', 'TRS2001160007', 'Beras', '20000', '2020-01-17 10:47:52', 'Nanda Aditya');
INSERT INTO `tb_detail_transaksi` VALUES ('14', 'TRS2001170001', 'Beras', '20000', '2020-01-17 13:25:58', 'Nanda Aditya');
INSERT INTO `tb_detail_transaksi` VALUES ('15', 'TRS2001170001', 'Sabun', '15000', '2020-01-17 13:25:58', 'Nanda Aditya');
INSERT INTO `tb_detail_transaksi` VALUES ('16', 'TRS2001170002', 'Telur', '6000', '2020-01-17 13:27:19', 'Nanda Aditya');
INSERT INTO `tb_detail_transaksi` VALUES ('17', 'TRS2001170002', 'Beras', '20000', '2020-01-17 13:27:19', 'Nanda Aditya');

-- ----------------------------
-- Table structure for `tb_hadiah`
-- ----------------------------
DROP TABLE IF EXISTS `tb_hadiah`;
CREATE TABLE `tb_hadiah` (
  `kode_hadiah` varchar(64) NOT NULL,
  `nama_hadiah` varchar(64) NOT NULL,
  `point` int(8) NOT NULL,
  PRIMARY KEY (`kode_hadiah`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_hadiah
-- ----------------------------
INSERT INTO `tb_hadiah` VALUES ('HDH2001160001', 'Boneka', '20');
INSERT INTO `tb_hadiah` VALUES ('HDH2001160002', 'Bola', '25');
INSERT INTO `tb_hadiah` VALUES ('HDH2001160003', 'Mobil', '25');
INSERT INTO `tb_hadiah` VALUES ('HDH2001160004', 'Mouse', '80');
INSERT INTO `tb_hadiah` VALUES ('HDH2001160005', 'Tas', '50');
INSERT INTO `tb_hadiah` VALUES ('HDH2001170001', 'Headset', '50');

-- ----------------------------
-- Table structure for `tb_transaksi`
-- ----------------------------
DROP TABLE IF EXISTS `tb_transaksi`;
CREATE TABLE `tb_transaksi` (
  `kode_transaksi` varchar(64) NOT NULL,
  `nama_cust` varchar(64) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `adm_input` varchar(128) NOT NULL,
  PRIMARY KEY (`kode_transaksi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_transaksi
-- ----------------------------
INSERT INTO `tb_transaksi` VALUES ('TRS2001160005', 'USR2001150001', '2020-01-17 09:50:24', 'Nanda Aditya');
INSERT INTO `tb_transaksi` VALUES ('TRS2001160006', 'USR2001170002', '2020-01-17 10:47:41', 'Nanda Aditya');
INSERT INTO `tb_transaksi` VALUES ('TRS2001160003', 'USR2001150001', '2020-01-17 09:48:52', 'Nanda Aditya');
INSERT INTO `tb_transaksi` VALUES ('TRS2001160004', 'USR2001150001', '2020-01-17 09:49:31', 'Nanda Aditya');
INSERT INTO `tb_transaksi` VALUES ('TRS2001160007', 'USR2001170002', '2020-01-17 10:47:52', 'Nanda Aditya');
INSERT INTO `tb_transaksi` VALUES ('TRS2001170001', 'USR2001150002', '2020-01-17 13:25:58', 'Nanda Aditya');
INSERT INTO `tb_transaksi` VALUES ('TRS2001170002', 'USR2001150002', '2020-01-17 13:27:19', 'Nanda Aditya');

-- ----------------------------
-- Table structure for `tb_user`
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `kode_user` varchar(64) NOT NULL,
  `nama_cust` varchar(64) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_tlp` varchar(64) NOT NULL,
  `point` varchar(64) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `adm_input` varchar(64) NOT NULL,
  PRIMARY KEY (`kode_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('USR2001150001', 'Nanda', 'Jltes', '098312321322', '15', '2020-01-15 19:58:36', '1');
INSERT INTO `tb_user` VALUES ('USR2001150002', 'Aditya', 'Jalan', '08213782173123', '20', '2020-01-15 10:20:13', '1');
INSERT INTO `tb_user` VALUES ('USR2001170002', 'Iman', 'Jlan', '0892312312', '0', '2020-01-17 15:08:37', '2');
INSERT INTO `tb_user` VALUES ('USR2001170001', 'Dadi', 'Jalan', '098213123', '0', '2020-01-17 13:26:31', '1');
