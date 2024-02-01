/*
 Navicat Premium Data Transfer

 Source Server         : Mysql
 Source Server Type    : MySQL
 Source Server Version : 50739 (5.7.39)
 Source Host           : localhost:3306
 Source Schema         : aplikasi_antrian_v2

 Target Server Type    : MySQL
 Target Server Version : 50739 (5.7.39)
 File Encoding         : 65001

 Date: 01/02/2024 22:45:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for queue_antrian_admisi
-- ----------------------------
DROP TABLE IF EXISTS `queue_antrian_admisi`;
CREATE TABLE `queue_antrian_admisi` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `no_antrian` varchar(3) NOT NULL,
  `code_antrian` char(5) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `Fk_queue_antrian_admisi_type` (`code_antrian`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of queue_antrian_admisi
-- ----------------------------
BEGIN;
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (1, '2024-02-01', '001', 'A', '1', '2024-02-01 00:00:00');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (2, '2024-02-01', '002', 'A', '1', '2024-02-01 00:00:00');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (3, '2024-02-01', '003', 'A', '1', '2024-02-01 00:00:00');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (4, '2024-02-01', '001', 'B', '1', '2024-02-01 00:00:00');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (5, '2024-02-01', '004', 'A', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (6, '2024-02-01', '002', 'B', '1', '2024-02-01 00:00:00');
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (7, '2024-02-01', '003', 'B', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (8, '2024-02-01', '005', 'A', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (9, '2024-02-01', '006', 'A', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (10, '2024-02-01', '007', 'A', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (11, '2024-02-01', '008', 'A', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (12, '2024-02-01', '009', 'A', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (13, '2024-02-01', '010', 'A', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (14, '2024-02-01', '004', 'B', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (15, '2024-02-01', '005', 'B', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (16, '2024-02-01', '006', 'B', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (17, '2024-02-01', '007', 'B', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (18, '2024-02-01', '008', 'B', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (19, '2024-02-01', '009', 'B', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (20, '2024-02-01', '010', 'B', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (21, '2024-02-01', '011', 'B', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (22, '2024-02-01', '012', 'B', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (23, '2024-02-01', '013', 'B', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (24, '2024-02-01', '011', 'A', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (25, '2024-02-01', '012', 'A', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (26, '2024-02-01', '014', 'B', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (27, '2024-02-01', '015', 'B', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (28, '2024-02-01', '016', 'B', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (29, '2024-02-01', '017', 'B', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (30, '2024-02-01', '001', 'C', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (31, '2024-02-01', '002', 'C', '0', NULL);
INSERT INTO `queue_antrian_admisi` (`id`, `tanggal`, `no_antrian`, `code_antrian`, `status`, `updated_date`) VALUES (32, '2024-02-01', '003', 'C', '0', NULL);
COMMIT;

-- ----------------------------
-- Table structure for queue_setting
-- ----------------------------
DROP TABLE IF EXISTS `queue_setting`;
CREATE TABLE `queue_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_instansi` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telpon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `running_text` varchar(255) DEFAULT NULL,
  `youtube_id` varchar(255) DEFAULT NULL,
  `list_loket` longtext,
  `list_type_antrian` longtext,
  `warna_primary` varchar(255) DEFAULT NULL,
  `warna_secondary` varchar(255) DEFAULT NULL,
  `warna_accent` varchar(255) DEFAULT NULL,
  `warna_background` varchar(255) DEFAULT NULL,
  `warna_text` varchar(255) DEFAULT NULL,
  `printer` longtext,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of queue_setting
-- ----------------------------
BEGIN;
INSERT INTO `queue_setting` (`id`, `nama_instansi`, `logo`, `alamat`, `telpon`, `email`, `running_text`, `youtube_id`, `list_loket`, `list_type_antrian`, `warna_primary`, `warna_secondary`, `warna_accent`, `warna_background`, `warna_text`, `printer`) VALUES (1, 'RSUD BATIN MANGUNANG', 'Lambang_Kabupaten_Tanggamus.png', 'Jl. Soekarno Hatta, Komplek Islamic Centre', '558450845', 'ade2mail.com', 'SELAMAT DATANG DI RSUD BATIN MANGUNANG, KOTA AGUNG KAB. TANGGAMUS', 'xVswuC8GKg4', '[{\"no_loket\":\"1\",\"nama_loket\":\"Loket 1\",\"handle_type_antrian\":\"[\\\"A\\\",\\\"B\\\"]\"},{\"no_loket\":\"2\",\"nama_loket\":\"Loket 2\",\"handle_type_antrian\":\"[\\\"B\\\"]\"},{\"no_loket\":\"3\",\"nama_loket\":\"Loket 3\",\"handle_type_antrian\":\"[\\\"A\\\",\\\"B\\\"]\"}]', '[{\"type_antrian\":\"UMUM\",\"code_antrian\":\"A\"},{\"type_antrian\":\"BPJS\",\"code_antrian\":\"B\"},{\"type_antrian\":\"PRIORITAS\",\"code_antrian\":\"C\"}]', '#00923f', '#c39292', '#6083a9', '#3a9862', '#ffffff', '{\"ip_komputer_printer\":\"127.0.0.1\",\"nama_sharing_printer\":\"pos-58\",\"tipe_font_no_antrian\":\"FONT_A\",\"lebar_font_no_antrian\":\"1\",\"tinggi_font_no_antrian\":\"1\",\"header_struk\":\"RSUD BATIN MANGUNANG newLine\",\"tipe_font_header\":\"FONT_A\",\"lebar_font_header\":\"1\",\"tinggi_font_header\":\"1\",\"alamat_struk\":\"Jl. Soekarno Hatta, Komplek Islamic Centre newLine Kota Agung, Tanggamus newLine\",\"tipe_font_alamat\":\"FONT_A\",\"lebar_font_alamat\":\"1\",\"tinggi_font_alamat\":\"1\",\"informasi_struk\":\"Silahkan menunggu nomor antrian dipanggil newLine Nomor ini hanya berlaku pada hari dicetak newLine\",\"tipe_font_informasi\":\"FONT_A\",\"lebar_font_informasi\":\"1\",\"tinggi_font_informasi\":\"1\",\"footer_struk\":\"TERIMA KASIH, ANDA TELAH TERTIB\",\"tipe_font_footer\":\"FONT_A\",\"lebar_font_footer\":\"1\",\"tinggi_font_footer\":\"1\"}');
COMMIT;

-- ----------------------------
-- Table structure for queue_type
-- ----------------------------
DROP TABLE IF EXISTS `queue_type`;
CREATE TABLE `queue_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of queue_type
-- ----------------------------
BEGIN;
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
