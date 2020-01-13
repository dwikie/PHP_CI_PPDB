-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03 Sep 2019 pada 08.02
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smkpermata1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` char(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(35) NOT NULL,
  `akses` enum('admin','superadmin','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `akses`) VALUES
('SA-01', 'superadmin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'superadmin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `kd_jurusan` char(3) NOT NULL,
  `nama_jurusan` varchar(25) NOT NULL,
  `nilai_min` tinyint(3) NOT NULL,
  `jumlah_soal` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`kd_jurusan`, `nama_jurusan`, `nilai_min`, `jumlah_soal`) VALUES
('TGB', 'Teknik Gambar Bangunan', 75, 20),
('TKJ', 'Teknik Komputer Jaringan', 80, 10),
('TKR', 'Teknik Kendaraan Ringan', 80, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orangtua`
--

CREATE TABLE `orangtua` (
  `nisn` char(10) NOT NULL,
  `nama_ayah` varchar(30) DEFAULT NULL,
  `nik_ayah` varchar(20) DEFAULT NULL,
  `pendidikan_ayah` varchar(10) DEFAULT NULL,
  `pekerjaan_ayah` varchar(20) DEFAULT NULL,
  `no_telp_ayah` varchar(15) DEFAULT NULL,
  `penghasilan_ayah` double DEFAULT NULL,
  `nama_ibu` varchar(30) DEFAULT NULL,
  `nik_ibu` varchar(20) DEFAULT NULL,
  `pendidikan_ibu` varchar(10) DEFAULT NULL,
  `pekerjaan_ibu` varchar(20) DEFAULT NULL,
  `no_telp_ibu` varchar(15) DEFAULT NULL,
  `penghasilan_ibu` double DEFAULT NULL,
  `nama_wali` varchar(30) DEFAULT NULL,
  `nik_wali` varchar(20) DEFAULT NULL,
  `pendidikan_wali` varchar(10) DEFAULT NULL,
  `pekerjaan_wali` varchar(20) DEFAULT NULL,
  `no_telp_wali` varchar(15) DEFAULT NULL,
  `penghasilan_wali` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orangtua`
--

INSERT INTO `orangtua` (`nisn`, `nama_ayah`, `nik_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `no_telp_ayah`, `penghasilan_ayah`, `nama_ibu`, `nik_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `no_telp_ibu`, `penghasilan_ibu`, `nama_wali`, `nik_wali`, `pendidikan_wali`, `pekerjaan_wali`, `no_telp_wali`, `penghasilan_wali`) VALUES
('1234512345', 'bambangss', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', 0),
('1122334455', 'Ibnu', '123412341234', 'SMK', 'Wiraswasta', '0888858888', 12000000, 'Wati', '1234098123412', 'SMA', 'Ibu Rumah Tangga', '0899293992', 0, '', '', '', '', '', 0),
('0909090909', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('0987609876', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1112131415', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1234567898', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1234123412', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('1234123409', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar`
--

CREATE TABLE `pendaftar` (
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki - laki','Perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nisn` char(10) NOT NULL,
  `kd_jurusan` char(3) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftar`
--

INSERT INTO `pendaftar` (`nama`, `jenis_kelamin`, `tgl_lahir`, `no_telp`, `email`, `nisn`, `kd_jurusan`, `alamat`, `tgl_daftar`) VALUES
('ochi', 'Perempuan', '1998-10-05', '12312312323', 'ochi@gmail.com', '0909090909', 'TGB', 'Bogor RT 11/24 Kel.Cijujung Kec.16710 Kab. Bogor 16710', '2019-08-17'),
('Rita', 'Perempuan', '2019-12-31', '85717681025', 'adsads@gmail.com', '0987609876', 'TKR', 'bogor RT 11/24 Kel.Cijujung Kec.16710 16710 16710', '2019-08-17'),
('Dwiki Reza', 'Laki - laki', '1998-09-09', '85717681025', 'dwiki@gmail.com', '1112131415', 'TKJ', 'Bogor RT 11/24 Kel.Cijujung Kec.Sukaraja Kab. Bogor 16710', '2019-08-19'),
('Icha', 'Perempuan', '1998-01-10', '85717681025', 'icha3x@gmail.com', '1122334455', 'TGB', 'Bogor RT 11/24 Kel.Cijujung Kec.16710 Kab. Bogor 16710', '2019-08-17'),
('Evans', 'Laki - laki', '1998-09-09', '085717681025', 'hihi@gmail.com', '1234123409', 'TKJ', 'Bogor RT 11/24 Kel.Cijujung Kec.16710 Kab. Bogor 16710', '2019-08-20'),
('aziz', 'Laki - laki', '1990-01-01', '8989898989', 'azizkil@gmail.com', '1234123412', 'TKJ', 'Bogor RT 04/11 Kel.Cijujung Kec.bogor tengah bogor 16128', '2019-08-20'),
('Ucok', 'Laki - laki', '1998-09-09', '85717681025', 'neithroid@gmail.com', '1234512345', 'TKJ', 'Bogor RT 11/24 Kel.Cibanteng Kec.16710 Kab. Bogor 16710', '2019-08-14'),
('Kuku', 'Laki - laki', '1998-12-12', '876543212345', 'kuku@gmail.com', '1234567898', 'TKR', 'Bogor RT 1/1 Kel.Bogor Kec.Bogor Bogor 12345', '2019-08-20'),
('evans t', 'Laki - laki', '1998-08-09', '85287073015', 'evanslenggana2015@gmail.com', 'c', 'TGB', 'Bogor RT 04/02 Kel.babakan Kec.bogor tengah bogor 16128', '2019-08-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` char(14) NOT NULL,
  `no_ujian` char(10) NOT NULL,
  `kd_transaksi` char(3) NOT NULL,
  `kategori_transaksi` varchar(25) NOT NULL,
  `jumlah_bayar` double NOT NULL,
  `harus_bayar` double NOT NULL,
  `status_bayar` enum('Lunas','Belum lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `no_ujian`, `kd_transaksi`, `kategori_transaksi`, `jumlah_bayar`, `harus_bayar`, `status_bayar`) VALUES
('SPP/TGB-19/003', 'TGB-19/003', 'SPP', 'Sumbangan Pembangunan', 1500000, 1500000, 'Lunas'),
('SPP/TKJ-19/001', 'TKJ-19/001', 'SPP', 'Sumbangan Pembangunan', 1500000, 1500000, 'Lunas'),
('SPP/TKR-19/003', 'TKJ-19/004', 'SPP', 'Sumbangan Pembangunan', 200000, 1500000, 'Belum lunas'),
('TES/TGB-19/002', 'TGB-19/002', 'TES', 'Ujian Masuk', 100000, 100000, 'Lunas'),
('TES/TKJ-19/001', 'TKJ-19/001', 'TES', 'Ujian Masuk', 102342, 100000, 'Lunas'),
('TES/TKJ-19/002', 'TKJ-19/002', 'TES', 'Ujian Masuk', 120000, 100000, 'Lunas'),
('TES/TKR-19/002', 'TKR-19/002', 'TES', 'Ujian Masuk', 20000, 100000, 'Belum lunas'),
('TES/TKR-19/003', 'TKJ-19/004', 'TES', 'Ujian Masuk', 100000, 100000, 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_kategori`
--

CREATE TABLE `transaksi_kategori` (
  `kd_transaksi` char(3) NOT NULL,
  `kategori_transaksi` varchar(25) NOT NULL,
  `harus_bayar` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_kategori`
--

INSERT INTO `transaksi_kategori` (`kd_transaksi`, `kategori_transaksi`, `harus_bayar`) VALUES
('SPP', 'Sumbangan Pembangunan', 1500000),
('TES', 'Ujian Masuk', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_riwayat`
--

CREATE TABLE `transaksi_riwayat` (
  `no_ujian` char(10) NOT NULL,
  `kategori_transaksi` varchar(25) NOT NULL,
  `no_transaksi` char(14) NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `jumlah_bayar` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_riwayat`
--

INSERT INTO `transaksi_riwayat` (`no_ujian`, `kategori_transaksi`, `no_transaksi`, `tgl_bayar`, `jumlah_bayar`) VALUES
('TKJ-19/001', 'Sumbangan Pembangunan', 'SPP/TKJ-19/001', '2019-08-15 02:37:56', 123),
('TKJ-19/001', 'Ujian Masuk', 'TES/TKJ-19/001', '2019-08-15 02:38:03', 2342),
('TKJ-19/001', 'Ujian Masuk', 'TES/TKJ-19/001', '2019-08-17 15:14:03', 100000),
('TKJ-19/001', 'Sumbangan Pembangunan', 'SPP/TKJ-19/001', '2019-08-18 02:35:19', 1499877),
('TGB-19/002', 'Ujian Masuk', 'TES/TGB-19/002', '2019-08-19 17:55:24', 20000),
('TGB-19/002', 'Ujian Masuk', 'TES/TGB-19/002', '2019-08-19 18:01:47', 80000),
('TKJ-19/002', 'Ujian Masuk', 'TES/TKJ-19/002', '2019-08-19 21:25:19', 120000),
('TKR-19/002', 'Ujian Masuk', 'TES/TKR-19/002', '2019-08-20 15:51:06', 20000),
('TGB-19/003', 'Sumbangan Pembangunan', 'SPP/TGB-19/003', '2019-08-20 17:06:05', 100000),
('TGB-19/003', 'Sumbangan Pembangunan', 'SPP/TGB-19/003', '2019-08-20 17:06:26', 1400000),
('TKR-19/003', 'Ujian Masuk', 'TES/TKR-19/003', '2019-08-20 17:31:15', 20000),
('TKR-19/003', 'Ujian Masuk', 'TES/TKR-19/003', '2019-08-20 17:32:20', 80000),
('TKR-19/003', 'Sumbangan Pembangunan', 'SPP/TKR-19/003', '2019-08-20 17:32:52', 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
--

CREATE TABLE `ujian` (
  `no_ujian` varchar(10) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nilai` tinyint(3) DEFAULT NULL,
  `status` enum('Lulus','Tidak lulus') DEFAULT NULL,
  `token` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ujian`
--

INSERT INTO `ujian` (`no_ujian`, `nisn`, `nilai`, `status`, `token`) VALUES
('TGB-19/001', '1122334455', NULL, NULL, NULL),
('TGB-19/002', '0909090909', 40, 'Tidak lulus', 2),
('TGB-19/003', 'c         ', NULL, NULL, NULL),
('TKJ-19/001', '1234512345', 0, 'Tidak lulus', 1),
('TKJ-19/002', '1112131415', 40, 'Tidak lulus', 2),
('TKJ-19/003', '1234123412', NULL, NULL, NULL),
('TKJ-19/004', '1234123409', NULL, NULL, 1),
('TKR-19/001', '0987609876', NULL, NULL, NULL),
('TKR-19/002', '1234567898', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian_detail`
--

CREATE TABLE `ujian_detail` (
  `no_ujian` char(10) NOT NULL,
  `kd_soal` char(7) NOT NULL,
  `kd_jawaban` char(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ujian_detail`
--

INSERT INTO `ujian_detail` (`no_ujian`, `kd_soal`, `kd_jawaban`) VALUES
('TKJ-19/001', 'TKJS010', NULL),
('TKJ-19/001', 'TKJS007', NULL),
('TKJ-19/001', 'TKJS001', NULL),
('TKJ-19/001', 'TKJS004', NULL),
('TKJ-19/001', 'TKJS018', NULL),
('TKJ-19/001', 'TKJS009', NULL),
('TKJ-19/001', 'TKJS014', NULL),
('TKJ-19/001', 'TKJS008', NULL),
('TKJ-19/001', 'TKJS015', NULL),
('TKJ-19/001', 'TKJS006', NULL),
('TKJ-19/001', 'TKJS017', NULL),
('TKJ-19/001', 'TKJS020', NULL),
('TKJ-19/001', 'TKJS005', NULL),
('TKJ-19/001', 'TKJS012', NULL),
('TKJ-19/001', 'TKJS013', NULL),
('TKJ-19/001', 'TKJS003', NULL),
('TKJ-19/001', 'TKJS011', NULL),
('TKJ-19/001', 'TKJS019', NULL),
('TKJ-19/001', 'TKJS002', NULL),
('TKJ-19/001', 'TKJS016', NULL),
('TGB-19/002', 'TGBS014', 'TGBJ056'),
('TGB-19/002', 'TGBS005', 'TGBJ017'),
('TGB-19/002', 'TGBS008', 'TGBJ032'),
('TGB-19/002', 'TGBS016', 'TGBJ063'),
('TGB-19/002', 'TGBS004', 'TGBJ016'),
('TGB-19/002', 'TGBS013', 'TGBJ052'),
('TGB-19/002', 'TGBS001', 'TGBJ001'),
('TGB-19/002', 'TGBS010', 'TGBJ039'),
('TGB-19/002', 'TGBS020', 'TGBJ077'),
('TGB-19/002', 'TGBS003', 'TGBJ012'),
('TGB-19/002', 'TGBS015', 'TGBJ058'),
('TGB-19/002', 'TGBS017', 'TGBJ065'),
('TGB-19/002', 'TGBS002', 'TGBJ005'),
('TGB-19/002', 'TGBS012', 'TGBJ046'),
('TGB-19/002', 'TGBS009', 'TGBJ036'),
('TGB-19/002', 'TGBS011', 'TGBJ044'),
('TGB-19/002', 'TGBS006', 'TGBJ022'),
('TGB-19/002', 'TGBS019', 'TGBJ074'),
('TGB-19/002', 'TGBS007', 'TGBJ028'),
('TGB-19/002', 'TGBS018', 'TGBJ070'),
('TKJ-19/002', 'TKJS013', 'TKJJ051'),
('TKJ-19/002', 'TKJS007', 'TKJJ026'),
('TKJ-19/002', 'TKJS020', 'TKJJ077'),
('TKJ-19/002', 'TKJS008', 'TKJJ030'),
('TKJ-19/002', 'TKJS001', 'TKJJ003'),
('TKJ-19/004', 'TKRS005', 'TKRJ019'),
('TKJ-19/004', 'TKRS002', 'TKRJ005'),
('TKJ-19/004', 'TKRS001', 'TKRJ002'),
('TKJ-19/004', 'TKRS004', 'TKRJ015'),
('TKJ-19/004', 'TKRS003', 'TKRJ011'),
('TKJ-19/004', 'TKRS004', 'TKRJ015'),
('TKJ-19/004', 'TKRS003', 'TKRJ012'),
('TKJ-19/004', 'TKRS005', 'TKRJ019'),
('TKJ-19/004', 'TKRS002', 'TKRJ005'),
('TKJ-19/004', 'TKRS001', 'TKRJ001'),
('TKJ-19/004', 'TKRS005', 'TKRJ018'),
('TKJ-19/004', 'TKRS003', 'TKRJ012'),
('TKJ-19/004', 'TKRS004', 'TKRJ015'),
('TKJ-19/004', 'TKRS001', 'TKRJ003'),
('TKJ-19/004', 'TKRS002', 'TKRJ007');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian_jawaban`
--

CREATE TABLE `ujian_jawaban` (
  `kd_jawaban` char(7) NOT NULL,
  `kd_soal` char(7) NOT NULL,
  `jawaban` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ujian_jawaban`
--

INSERT INTO `ujian_jawaban` (`kd_jawaban`, `kd_soal`, `jawaban`, `status`) VALUES
('TGBJ001', 'TGBS001', 'Lunak tidak mudah hancur', 0),
('TGBJ002', 'TGBS001', 'Hasil yang dihapus bersih', 0),
('TGBJ003', 'TGBS001', 'Harganya relatif murah', 0),
('TGBJ004', 'TGBS001', 'Keras mengandung minyak', 0),
('TGBJ005', 'TGBS002', '2B', 0),
('TGBJ006', 'TGBS002', 'B', 0),
('TGBJ007', 'TGBS002', 'HB', 0),
('TGBJ008', 'TGBS002', 'H', 1),
('TGBJ009', 'TGBS003', '210 x 297 mm', 0),
('TGBJ010', 'TGBS003', '297 x 420 mm', 0),
('TGBJ011', 'TGBS003', '420 X 594 mm', 1),
('TGBJ012', 'TGBS003', '594 X 841 mm', 0),
('TGBJ013', 'TGBS004', '1 kapur :  2 pasir', 0),
('TGBJ014', 'TGBS004', '1 kapur :  3 pasir', 0),
('TGBJ015', 'TGBS004', '1 PC  :  2 pasir', 0),
('TGBJ016', 'TGBS004', '1 PC  :  3 pasir', 1),
('TGBJ017', 'TGBS005', '2 x 1 cm', 0),
('TGBJ018', 'TGBS005', '1 x 4 cm', 0),
('TGBJ019', 'TGBS005', '1 x 3 cm', 0),
('TGBJ020', 'TGBS005', '1 x 1 cm', 1),
('TGBJ021', 'TGBS006', 'Siar lintang segaris lurus dari bawah ke atas dan bergeser setengah bata', 0),
('TGBJ022', 'TGBS006', 'Siar lintang tidak boleh segaris lurus dari bawah ke atas dan  pasangan bergeser setengah bata', 1),
('TGBJ023', 'TGBS006', 'Siar lurus tidak boleh segaris  dari bawah ke atas dan pasangan bergeser setengan bata', 0),
('TGBJ024', 'TGBS006', 'Pada ujung akhir pasangan bergigi/anak tangga', 0),
('TGBJ025', 'TGBS007', 'Pasak dari kayu', 0),
('TGBJ026', 'TGBS007', 'Pen dan purus', 0),
('TGBJ027', 'TGBS007', 'Sponing', 0),
('TGBJ028', 'TGBS007', 'Pen dan lubang', 1),
('TGBJ029', 'TGBS008', 'Bahan penutup atap', 1),
('TGBJ030', 'TGBS008', 'Lebar bentang suatu bangunan\r\n', 0),
('TGBJ031', 'TGBS008', 'Konstruksi bahan yang digunakan', 0),
('TGBJ032', 'TGBS008', 'Tinggi dari tiang kuda-kuda', 0),
('TGBJ033', 'TGBS009', 'Fungsi tangga', 0),
('TGBJ034', 'TGBS009', 'Tinggi langit-langit', 0),
('TGBJ035', 'TGBS009', 'Ruang gerak orang', 1),
('TGBJ036', 'TGBS009', 'Model tangga', 0),
('TGBJ037', 'TGBS010', '1/3 berat atap', 0),
('TGBJ038', 'TGBS010', '1/3 berat kuda-kuda', 0),
('TGBJ039', 'TGBS010', '1/5 berat atap', 0),
('TGBJ040', 'TGBS010', 'Nol', 1),
('TGBJ041', 'TGBS011', 'Bibir lurus berkait', 0),
('TGBJ042', 'TGBS011', 'Bibir miring berkait', 1),
('TGBJ043', 'TGBS011', 'Bibir mulut ikan', 0),
('TGBJ044', 'TGBS011', 'Bibir miring lurus', 0),
('TGBJ045', 'TGBS012', 'Sokong dengan balok tarik', 0),
('TGBJ046', 'TGBS012', 'Tiang kuda-kuda dengan balok tarik', 1),
('TGBJ047', 'TGBS012', 'Tiang kuda-kuda dengan sokong', 0),
('TGBJ048', 'TGBS012', 'Balok tarik dengan balok bubungan', 0),
('TGBJ049', 'TGBS013', 'Beban bergerak', 0),
('TGBJ050', 'TGBS013', 'Beban tetap', 0),
('TGBJ051', 'TGBS013', 'Arah angin, kekuatan angin dan curah hujan', 0),
('TGBJ052', 'TGBS013', 'Bentuk bangunan', 1),
('TGBJ053', 'TGBS014', 'Hatch', 1),
('TGBJ054', 'TGBS014', 'Offset', 0),
('TGBJ055', 'TGBS014', 'Fillet', 0),
('TGBJ056', 'TGBS014', 'Mirror', 0),
('TGBJ057', 'TGBS015', '0,2', 0),
('TGBJ058', 'TGBS015', '5', 1),
('TGBJ059', 'TGBS015', '2', 0),
('TGBJ060', 'TGBS015', '0,5', 0),
('TGBJ061', 'TGBS016', 'Hatch', 0),
('TGBJ062', 'TGBS016', 'Offset', 0),
('TGBJ063', 'TGBS016', 'Fillet', 0),
('TGBJ064', 'TGBS016', 'Move', 1),
('TGBJ065', 'TGBS017', 'Memindahkan file', 0),
('TGBJ066', 'TGBS017', 'Menghapus file', 0),
('TGBJ067', 'TGBS017', ' Mengganti nama file', 0),
('TGBJ068', 'TGBS017', 'Menyalin file', 1),
('TGBJ069', 'TGBS018', 'Offset', 0),
('TGBJ070', 'TGBS018', 'Fence', 1),
('TGBJ071', 'TGBS018', 'Move', 0),
('TGBJ072', 'TGBS018', 'Trim', 0),
('TGBJ073', 'TGBS019', 'Klik icon layer - klik delete - ketik nama layer - enter', 0),
('TGBJ074', 'TGBS019', 'Klik icon layer - klik curent - ketik nama layer - enter', 0),
('TGBJ075', 'TGBS019', 'Klik icon layer - klik show detail - ketik nama layer - enter', 0),
('TGBJ076', 'TGBS019', 'Klik icon layer - klik new - ketik nama layer - enter', 1),
('TGBJ077', 'TGBS020', 'Mengatur ketinggian huruf', 0),
('TGBJ078', 'TGBS020', 'Mengatur jenis-jenis garis', 0),
('TGBJ079', 'TGBS020', 'Mengatur jenis dimensi yang dipakai', 0),
('TGBJ080', 'TGBS020', 'Pengelompokan obyek gambar', 1),
('TGBJ081', 'TGBS001', 'lala', 1),
('TKJJ001', 'TKJS001', 'Router', 1),
('TKJJ002', 'TKJS001', 'Switch', 0),
('TKJJ003', 'TKJS001', 'Hub', 0),
('TKJJ004', 'TKJS001', 'Access Point', 0),
('TKJJ005', 'TKJS002', 'Penghubung antara 2 jaringan yang berbeda', 0),
('TKJJ006', 'TKJS002', 'Mengatur dan mengontrol lalu lintas jaringan ', 1),
('TKJJ007', 'TKJS002', 'Penghubung antara 2 jaringan ke internet menggunakan 1 IP', 0),
('TKJJ008', 'TKJS002', 'Program yang melakukan request terhadap konten dari Internet/Intranet', 0),
('TKJJ009', 'TKJS003', 'Network Layer', 0),
('TKJJ010', 'TKJS003', 'Data Link Layer', 0),
('TKJJ011', 'TKJS003', 'Transport Layer', 1),
('TKJJ012', 'TKJS003', 'Physical Layer', 0),
('TKJJ013', 'TKJS004', '255.0.0.0', 0),
('TKJJ014', 'TKJS004', '255.255.0.0', 1),
('TKJJ015', 'TKJS004', '255.255.255.248', 0),
('TKJJ016', 'TKJS004', '255.255.255.0', 0),
('TKJJ017', 'TKJS005', 'Topologi Bus ', 0),
('TKJJ018', 'TKJS005', 'Topologi Ring', 0),
('TKJJ019', 'TKJS005', 'Topologi Tree', 0),
('TKJJ020', 'TKJS005', 'Topologi Star', 1),
('TKJJ021', 'TKJS006', 'Firmware', 1),
('TKJJ022', 'TKJS006', 'Brainware', 0),
('TKJJ023', 'TKJS006', 'Hardware', 0),
('TKJJ024', 'TKJS006', 'Software', 0),
('TKJJ025', 'TKJS007', 'Sistem Operasi', 0),
('TKJJ026', 'TKJS007', 'Program Paket', 0),
('TKJJ027', 'TKJS007', 'Bahasa Pemrograman', 0),
('TKJJ028', 'TKJS007', 'Software Aplikasi', 1),
('TKJJ029', 'TKJS008', 'Linux Debian', 0),
('TKJJ030', 'TKJS008', 'FreeBSD', 1),
('TKJJ031', 'TKJS008', 'Fedora', 0),
('TKJJ032', 'TKJS008', 'Windows XP Black Edition', 0),
('TKJJ033', 'TKJS009', 'Fiber Optic', 0),
('TKJJ034', 'TKJS009', 'Wireless', 1),
('TKJJ035', 'TKJS009', 'STP', 0),
('TKJJ036', 'TKJS009', 'Coaxial/Coax/BNC', 0),
('TKJJ037', 'TKJS010', 'SMTP', 1),
('TKJJ038', 'TKJS010', 'POP3', 0),
('TKJJ039', 'TKJS010', 'IMAP', 0),
('TKJJ040', 'TKJS010', 'TCP/IP', 0),
('TKJJ041', 'TKJS011', 'Client', 0),
('TKJJ042', 'TKJS011', 'Peer to Peer', 0),
('TKJJ043', 'TKJS011', 'Client-Server', 0),
('TKJJ044', 'TKJS011', 'Server', 1),
('TKJJ045', 'TKJS012', 'MTA', 1),
('TKJJ046', 'TKJS012', 'MDA', 0),
('TKJJ047', 'TKJS012', 'SMTP', 0),
('TKJJ048', 'TKJS012', 'MUA', 0),
('TKJJ049', 'TKJS013', 'Sulit dalam Pengelolaan ', 0),
('TKJJ050', 'TKJS013', 'Jika salah satu node putus maka koneksi jaringan tidak akan berfungsi', 1),
('TKJJ051', 'TKJS013', 'Membutuhkan konsentrator', 0),
('TKJJ052', 'TKJS013', 'Konfigurasi dan pengkabelan cukup sulit', 0),
('TKJJ053', 'TKJS014', 'Mail Server', 0),
('TKJJ054', 'TKJS014', 'DHCP Server', 0),
('TKJJ055', 'TKJS014', 'FTP Server', 1),
('TKJJ056', 'TKJS014', 'Web Server', 0),
('TKJJ057', 'TKJS015', 'Tripleks', 0),
('TKJJ058', 'TKJS015', 'Half Duplex', 0),
('TKJJ059', 'TKJS015', 'Full Duplex', 0),
('TKJJ060', 'TKJS015', 'Simplex', 1),
('TKJJ061', 'TKJS016', 'MD', 0),
('TKJJ062', 'TKJS016', 'CHKDSK', 1),
('TKJJ063', 'TKJS016', 'DIR', 0),
('TKJJ064', 'TKJS016', 'CLS', 0),
('TKJJ065', 'TKJS017', 'LGA 1156', 1),
('TKJJ066', 'TKJS017', 'LGA 775', 0),
('TKJJ067', 'TKJS017', 'AM2+', 0),
('TKJJ068', 'TKJS017', 'Socket T', 0),
('TKJJ069', 'TKJS018', 'Kesalahan pada VGA', 1),
('TKJJ070', 'TKJS018', 'Kesalahan pada memory', 0),
('TKJJ071', 'TKJS018', 'Kesalahan NIC', 0),
('TKJJ072', 'TKJS018', 'Kesalahan pada buzzer', 0),
('TKJJ073', 'TKJS019', 'VM Ware', 0),
('TKJJ074', 'TKJS019', 'Macromedia Flash', 0),
('TKJJ075', 'TKJS019', 'Adobe Photoshop', 0),
('TKJJ076', 'TKJS019', 'Microsoft Power Point', 1),
('TKJJ077', 'TKJS020', 'LS', 1),
('TKJJ078', 'TKJS020', 'CLEAR', 0),
('TKJJ079', 'TKJS020', 'NANO', 0),
('TKJJ080', 'TKJS020', 'MKDIR', 0),
('TKJJ081', 'TKJS022', 'hh', 0),
('TKJJ082', 'TKJS022', 'kk', 1),
('TKRJ001', 'TKRS001', 'Filter', 0),
('TKRJ002', 'TKRS001', 'Pompa bahan bakar', 0),
('TKRJ003', 'TKRS001', 'Charcoal canister', 0),
('TKRJ004', 'TKRS001', 'Karburator', 1),
('TKRJ005', 'TKRS002', 'Chocke valve\r\n', 0),
('TKRJ006', 'TKRS002', 'Venturi', 0),
('TKRJ007', 'TKRS002', 'Throtle valve', 1),
('TKRJ008', 'TKRS002', 'Idle mixture adjusting screw', 0),
('TKRJ009', 'TKRS003', '12-13 : 1 ', 1),
('TKRJ010', 'TKRS003', '11 : 1', 0),
('TKRJ011', 'TKRS003', '15 : 1', 0),
('TKRJ012', 'TKRS003', '16 – 18 : 1', 0),
('TKRJ013', 'TKRS004', 'Variable ventury', 1),
('TKRJ014', 'TKRS004', 'Fixed ventury', 0),
('TKRJ015', 'TKRS004', 'Single barel', 0),
('TKRJ016', 'TKRS004', 'Double barel', 0),
('TKRJ017', 'TKRS005', 'Sistem cuk', 0),
('TKRJ018', 'TKRS005', 'Sistem pengisian', 1),
('TKRJ019', 'TKRS005', 'Sistem tenaga', 0),
('TKRJ020', 'TKRS005', 'Sistem percepatan', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian_soal`
--

CREATE TABLE `ujian_soal` (
  `kd_soal` char(7) NOT NULL,
  `kd_jurusan` char(3) NOT NULL,
  `soal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ujian_soal`
--

INSERT INTO `ujian_soal` (`kd_soal`, `kd_jurusan`, `soal`) VALUES
('TGBS001', 'TGB', 'Jenis penghapus pensil yang baik adalah .....'),
('TGBS002', 'TGB', 'Untuk menggambar garis bantu khususnya dalam menggambar proyeksi, digunakan pensil  dengan ukuran .....'),
('TGBS003', 'TGB', 'Ukuran kertas gambar A2 adalah .....'),
('TGBS004', 'TGB', 'Dinding tembok kamar mandi menggunakan spesi dengan perbandingan campuran .....'),
('TGBS005', 'TGB', ' Ukuran sponing plesteran pada kusen pintu / jendela umumnya adalah .....'),
('TGBS006', 'TGB', ' Syarat-syarat ikatan ½ bata adalah ......'),
('TGBS007', 'TGB', 'Hubungan ambang dengan tiang kusen mempergunakan .....'),
('TGBS008', 'TGB', ' Besar sudut kemiringan atap ditentukan berdasarkan .....'),
('TGBS009', 'TGB', ' Menentukan lebar tangga harus dipertimbangkan berdasarkan .....'),
('TGBS010', 'TGB', 'Beban yang diterima tiang kuda-kuda sebesar .....'),
('TGBS011', 'TGB', 'Balok tarik konstruksi kuda-kuda menggunakan sambungan .....'),
('TGBS012', 'TGB', 'Kaki kuda - kuda dipasang menghubungkan .....'),
('TGBS013', 'TGB', 'Kemiringan dan bahan atap diperhitungkan berdasarkan .....'),
('TGBS014', 'TGB', 'Dalam program AutoCAD, untuk membuat arsir digunakan perintah .....'),
('TGBS015', 'TGB', ' Untuk merubah skala dari 1: 100 ke 1 : 20, maka skala faktornya adalah .....'),
('TGBS016', 'TGB', 'Dalam program AutoCAD, untuk memindahkan obyek menggunakan perintah .....'),
('TGBS017', 'TGB', 'Perintah Copy dalam manajemen file digunakan untuk .....'),
('TGBS018', 'TGB', 'Apabila kita ingin menghapus garis/obyek yang dilalui oleh garis strip-strip, digunakan perintah .....'),
('TGBS019', 'TGB', 'Untuk membuat Layer digunakan perintah .....'),
('TGBS020', 'TGB', 'Fungsi layer dalam menggambar dengan perangkat lunak adalah .....'),
('TKJS001', 'TKJ', 'Alat yang berfungsi untuk menghubungkan 2 jaringan dengan segmen yang berbeda adalah .....'),
('TKJS002', 'TKJ', 'Berikut adalah fungsi dari Firewall, yaitu .....'),
('TKJS003', 'TKJ', 'Dalam Model OSI Layer, yang berfungsi untuk menerima data dari Session Layer adalah .....'),
('TKJS004', 'TKJ', 'Subnet Mask yang dapat digunakan pada IP kelas B adalah .....'),
('TKJS005', 'TKJ', 'Jenis topologi yang memiliki node tengah sebagai pusat penghubung dari suatu jaringan adalah topologi .....'),
('TKJS006', 'TKJ', 'Software yang ditanam pada sebuah computer untuk menerjemahkan bahasa computer merupakan pengertian dari .....'),
('TKJS007', 'TKJ', 'Sebuah program tambahan yang berfungsi sebagai alat mempermudah penggunaan PC disebut .....'),
('TKJS008', 'TKJ', 'Dibawah ini merupakan salah satu contoh SOJ pure, kecuali .....'),
('TKJS009', 'TKJ', 'Berikut ini adalah contoh-contoh media transmisi yang menggunakan kabel, kecuali .....'),
('TKJS010', 'TKJ', 'Protokol umum yang sering digunakan oleh mailserver adalah, kecuali .....'),
('TKJS011', 'TKJ', 'Sebuah program aplikasi yang bertugas untuk menerima permintaan paket dan memberinya balasan berupa paket yang di inginkan client disebut .....'),
('TKJS012', 'TKJ', 'Dibawah ini merupakan program-program atau aplikasi e-mail secara umum, kecuali .....'),
('TKJS013', 'TKJ', 'Dari pernyataan dibawah ini yang merupakan kekurangan dari topologi bus adalah .....'),
('TKJS014', 'TKJ', 'Server yang berfungsi sebagai pemberi akses/pertukaran transfer data antara dua computer adalah .....'),
('TKJS015', 'TKJ', 'Televisi termasuk kedalam jenis-jenis transmisi .....'),
('TKJS016', 'TKJ', 'Yang termasuk perintah external pada DOS adalah .....'),
('TKJS017', 'TKJ', 'Processor Intel Core i7 menggunakan socket processor dengan tipe .....'),
('TKJS018', 'TKJ', 'Bunyi \"beep\" 3 kali pada saat kita menyalakan PC menandakan .....'),
('TKJS019', 'TKJ', 'Program yang dapat digunakan untuk membuat suatu file berupa presentasi adalah .....'),
('TKJS020', 'TKJ', 'Pada system operasi Debian, perintah yang dapat kita gunakan untuk melihat isi direktori adalah .....'),
('TKJS022', 'TKJ', 'hihi'),
('TKRS001', 'TKR', 'Yang berfungsi untuk merubah bahan bakar dalam bentuk cair menjadi kabut bahan bakar adalah .....'),
('TKRS002', 'TKR', 'Besarnya udara yang masuk ke dalam silinder diatur oleh .....'),
('TKRS003', 'TKR', 'Perbandingan antara udara dan bahan bakar pada saat kondisi kerja mesin pada putaran lambat maupun putaran maksimal (beban penuh) adalah .....'),
('TKRS004', 'TKR', 'Dari gambar di bawah ini, dilihat dari tipe venturi, termasuk karburator tipe .....'),
('TKRS005', 'TKR', 'Berikut ini merupakan beberapa sistem yang terdapat pada karburator, kecuali .....');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kd_jurusan`);

--
-- Indexes for table `orangtua`
--
ALTER TABLE `orangtua`
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`nisn`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `kd_jurusan` (`kd_jurusan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `no_tes` (`no_ujian`),
  ADD KEY `kd_transaksi` (`kd_transaksi`);

--
-- Indexes for table `transaksi_kategori`
--
ALTER TABLE `transaksi_kategori`
  ADD PRIMARY KEY (`kd_transaksi`);

--
-- Indexes for table `transaksi_riwayat`
--
ALTER TABLE `transaksi_riwayat`
  ADD KEY `no_transaksi` (`no_transaksi`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`no_ujian`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `ujian_detail`
--
ALTER TABLE `ujian_detail`
  ADD KEY `no_ujian` (`no_ujian`),
  ADD KEY `kd_soal` (`kd_soal`),
  ADD KEY `kd_jawaban` (`kd_jawaban`);

--
-- Indexes for table `ujian_jawaban`
--
ALTER TABLE `ujian_jawaban`
  ADD PRIMARY KEY (`kd_jawaban`),
  ADD KEY `kd_soal` (`kd_soal`);

--
-- Indexes for table `ujian_soal`
--
ALTER TABLE `ujian_soal`
  ADD PRIMARY KEY (`kd_soal`),
  ADD KEY `kd_jurusan` (`kd_jurusan`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orangtua`
--
ALTER TABLE `orangtua`
  ADD CONSTRAINT `orangtua_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `pendaftar` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD CONSTRAINT `pendaftar_ibfk_1` FOREIGN KEY (`kd_jurusan`) REFERENCES `jurusan` (`kd_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`no_ujian`) REFERENCES `ujian` (`no_ujian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`kd_transaksi`) REFERENCES `transaksi_kategori` (`kd_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_riwayat`
--
ALTER TABLE `transaksi_riwayat`
  ADD CONSTRAINT `transaksi_riwayat_ibfk_1` FOREIGN KEY (`no_transaksi`) REFERENCES `transaksi` (`no_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `ujian_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `pendaftar` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ujian_detail`
--
ALTER TABLE `ujian_detail`
  ADD CONSTRAINT `ujian_detail_ibfk_1` FOREIGN KEY (`no_ujian`) REFERENCES `ujian` (`no_ujian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ujian_detail_ibfk_2` FOREIGN KEY (`kd_jawaban`) REFERENCES `ujian_jawaban` (`kd_jawaban`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ujian_detail_ibfk_3` FOREIGN KEY (`kd_soal`) REFERENCES `ujian_soal` (`kd_soal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ujian_jawaban`
--
ALTER TABLE `ujian_jawaban`
  ADD CONSTRAINT `ujian_jawaban_ibfk_1` FOREIGN KEY (`kd_soal`) REFERENCES `ujian_soal` (`kd_soal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ujian_soal`
--
ALTER TABLE `ujian_soal`
  ADD CONSTRAINT `ujian_soal_ibfk_1` FOREIGN KEY (`kd_jurusan`) REFERENCES `jurusan` (`kd_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
