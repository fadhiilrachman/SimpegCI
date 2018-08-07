SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+07:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `tb_admin` (
  `id_user` int(255) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `namalengkap` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

INSERT INTO `tb_admin` (`id_user`, `username`, `email`, `namalengkap`, `password`, `type`, `avatar`) VALUES
(1, 'fadhiilrachman', 'admin@gmail.com', 'Fadhiil Rachman', '21232f297a57a5a743894a0e4a801fc3', 'admin', '41241cacd6a56d9cb6bef52fb1d337b1.jpg'),
(6, 'baak', 'baak@gmail.com', 'Ka. BAAK', 'f6edb4c31cf9be5ce497d12251a9d29e', 'baak', '2b10f8e9a8cf35bd216750928492d585.jpg'),
(7, 'baak2', 'baak2@gmail.com', 'Ka. BAAK 2', '3cf1462ae5dadb71e6d875df74ecbd9f', 'baak', 'avatar.png');

CREATE TABLE `tb_bidang` (
  `id_bidang` int(255) NOT NULL,
  `nama_bidang` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

INSERT INTO `tb_bidang` (`id_bidang`, `nama_bidang`) VALUES
(1, 'Enterprise'),
(2, 'Data Solutions');

CREATE TABLE `tb_izin` (
  `id_izin` int(255) NOT NULL,
  `id_namaizin` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `tglawal` date NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tglakhir` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

INSERT INTO `tb_izin` (`id_izin`, `id_namaizin`, `id`, `tglawal`, `tempat`, `tglakhir`, `status`) VALUES
(2, 2, 11, '2018-08-17', 'Jakarta', '2018-08-16', 'waiting'),
(3, 2, 10, '2018-08-01', 'Jakarta', '2018-08-04', 'approved'),
(4, 5, 10, '2018-08-21', 'Depok', '2018-08-22', 'waiting'),
(5, 3, 11, '2018-10-05', 'Jakarta', '2018-12-01', 'rejected'),
(8, 14, 12, '2018-08-22', 'Bekasi', '2018-08-24', 'waiting'),
(9, 12, 10, '2018-08-16', 'Bekasi', '2018-08-20', 'approved'),
(10, 11, 11, '2018-09-21', 'Bandung', '2018-09-22', 'waiting');

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(255) NOT NULL,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Deputi'),
(3, 'Sekretaris'),
(5, 'Bendahara');

CREATE TABLE `tb_namaizin` (
  `id_namaizin` int(255) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `nama_izin` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

INSERT INTO `tb_namaizin` (`id_namaizin`, `type`, `nama_izin`) VALUES
(1, 'cuti', 'Cuti Hamil'),
(2, 'cuti', 'Cuti Lebaran'),
(3, 'cuti', 'Cuti Natal'),
(4, 'sekolah', 'Rapat Petinggi Kampus'),
(5, 'sekolah', 'Rapat Guru'),
(6, 'seminar', 'Seminar Bela Negara'),
(7, 'seminar', 'Seminar Compfest'),
(8, 'seminar', 'Seminar Sinaptika 2018'),
(9, 'seminar', 'Seminar Gemastik 11'),
(11, 'sekolah', 'Rapat Kurikulum'),
(12, 'cuti', 'Cuti Idul Adha'),
(13, 'cuti', 'Cuti Pregnant'),
(14, 'seminar', 'Seminar Google I/O 2018');

CREATE TABLE `tb_pegawai` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `nip` int(255) NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pendidikan_terakhir` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status_perkawinan` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status_pegawai` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `id_jabatan` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `no_ktp` int(255) NOT NULL,
  `no_rumah` int(255) NOT NULL,
  `no_handphone` int(255) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tanggal_pengangkatan` date NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

INSERT INTO `tb_pegawai` (`id`, `nama`, `nip`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pendidikan_terakhir`, `status_perkawinan`, `status_pegawai`, `id_jabatan`, `id_bidang`, `agama`, `alamat`, `no_ktp`, `no_rumah`, `no_handphone`, `email`, `password`, `id_user`, `tanggal_pengangkatan`, `avatar`) VALUES
(10, 'Nalika Alzahra', 41551, 'Jakarta', '1989-02-09', 'Perempuan', 'S1', 'Belum kawin', 'Karyawan tetap', 3, 1, 'Islam', 'Komplek Permata Hijau No. 12', 2147483647, 12, 2147483647, 'pegawai@gmail.com', '047aeeb234644b9e2d4138ed3bc7976a', 'pegawai', '2018-07-04', '2c8d297706acce932eb1f14232370517.jpg'),
(11, 'Kendal Janner', 144124, 'Bandung', '1990-07-10', 'Perempuan', 'S3', 'Belum kawin', 'Karyawan tetap', 1, 1, 'Kristen Protestan', 'Komplek Permata Hijau No. 12', 2147483647, 21, 2147483647, 'pegawai1@gmail.com', '0b96cb1d0dfbcc85f6b57041656abc49', 'pegawai1', '2017-09-01', 'b0ff73b761a90fa10d9b8b9570a58b6e.jpg'),
(12, 'Benjamin Aljabar R', 412411, 'Jakarta', '1997-01-06', 'Laki-laki', 'SMP/SMA', 'Belum kawin', 'Karyawan kontrak', 3, 1, 'Islam', 'Komplek Permata Hijau No. 12', 2147483647, 22, 2147483647, 'pegawai2@gmail.com', 'fa23517aa1adfaab707494340009a330', 'pegawai2', '2018-02-06', '37d631763c91e22324dd08cd4d20d40b.jpg');


ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_user`);

ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`id_bidang`);

ALTER TABLE `tb_izin`
  ADD PRIMARY KEY (`id_izin`);

ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

ALTER TABLE `tb_namaizin`
  ADD PRIMARY KEY (`id_namaizin`);

ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tb_admin`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `tb_bidang`
  MODIFY `id_bidang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `tb_izin`
  MODIFY `id_izin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `tb_namaizin`
  MODIFY `id_namaizin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `tb_pegawai`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
