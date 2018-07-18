SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

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
(7, 'baak2', 'baak2@gmail.com', 'Dina Herlyn', '3cf1462ae5dadb71e6d875df74ecbd9f', 'baak', 'avatar.png');

CREATE TABLE `tb_bidang` (
  `id_bidang` int(255) NOT NULL,
  `nama_bidang` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

INSERT INTO `tb_bidang` (`id_bidang`, `nama_bidang`) VALUES
(1, 'Enterprise'),
(2, 'Data Solutions');

CREATE TABLE `tb_cuti` (
  `id_cuti` int(255) NOT NULL,
  `nama_cuti` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

INSERT INTO `tb_cuti` (`id_cuti`, `nama_cuti`) VALUES
(1, 'Cuti Hamil'),
(4, 'Cuti Lebaran'),
(5, 'Cuti Natal');

CREATE TABLE `tb_izincuti` (
  `id_izin` int(255) NOT NULL,
  `id_cuti` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `tglawal` date NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tglakhir` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

INSERT INTO `tb_izincuti` (`id_izin`, `id_cuti`, `id`, `tglawal`, `tempat`, `tglakhir`, `status`) VALUES
(6, 1, 10, '2018-07-04', 'Bandung', '2018-08-09', 'waiting'),
(7, 5, 11, '2018-12-18', 'Jakarta', '2018-12-28', 'approved'),
(8, 4, 12, '2018-10-11', 'Jakarta', '2018-10-18', 'waiting');

CREATE TABLE `tb_izinsekolah` (
  `id_izin` int(255) NOT NULL,
  `id_sekolah` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `tglawal` date NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tglakhir` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

INSERT INTO `tb_izinsekolah` (`id_izin`, `id_sekolah`, `id`, `tglawal`, `tempat`, `tglakhir`, `status`) VALUES
(3, 4, 10, '2018-07-10', 'Jakarta', '2018-07-21', 'waiting'),
(4, 4, 11, '2018-08-01', 'Bogor', '2018-08-09', 'waiting'),
(5, 1, 12, '2018-09-05', 'Bekasi', '2018-09-07', 'rejected');

CREATE TABLE `tb_izinseminar` (
  `id_izin` int(255) NOT NULL,
  `id_seminar` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `tglawal` date NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tglakhir` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

INSERT INTO `tb_izinseminar` (`id_izin`, `id_seminar`, `id`, `tglawal`, `tempat`, `tglakhir`, `status`) VALUES
(1, 1, 10, '2018-07-26', 'Depok', '2018-07-28', 'approved'),
(2, 3, 12, '2018-08-04', 'Jakarta', '2018-07-08', 'rejected'),
(3, 4, 12, '2018-07-20', 'Jakarta', '2018-07-20', 'waiting'),
(4, 3, 11, '2018-07-27', 'Jakarta', '2018-07-28', 'waiting'),
(5, 1, 11, '2018-09-09', 'Jakarta', '2018-09-07', 'approved');

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(255) NOT NULL,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Deputi'),
(3, 'Sekretaris'),
(5, 'Bendahara');

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
  `id_user` int(255) NOT NULL,
  `tanggal_pengangkatan` date NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

INSERT INTO `tb_pegawai` (`id`, `nama`, `nip`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pendidikan_terakhir`, `status_perkawinan`, `status_pegawai`, `id_jabatan`, `id_bidang`, `agama`, `alamat`, `no_ktp`, `no_rumah`, `no_handphone`, `email`, `password`, `id_user`, `tanggal_pengangkatan`, `avatar`) VALUES
(10, 'Berliana Indriyanti', 41551, 'Jakarta', '1989-02-09', 'Perempuan', 'S1', 'Belum kawin', 'Karyawan tetap', 3, 1, 'Islam', 'Komplek Permata Hijau No. 12', 2147483647, 12, 2147483647, 'pegawai@gmail.com', '047aeeb234644b9e2d4138ed3bc7976a', 0, '2018-07-04', 'ae418c5f337639f5c3bcef8589c8eb41.jpg'),
(11, 'Ghinaya Alzahra', 144124, 'Bandung', '1990-07-10', 'Perempuan', 'S3', 'Belum kawin', 'Karyawan tetap', 1, 1, 'Kristen Katolik', 'Komplek Permata Hijau No. 12', 2147483647, 21, 2147483647, 'pegawai1@gmail.com', '0b96cb1d0dfbcc85f6b57041656abc49', 0, '2017-09-01', 'b0ff73b761a90fa10d9b8b9570a58b6e.jpg'),
(12, 'Benjamin Aljabar R', 412411, 'Jakarta Selatan', '1997-01-06', 'Laki-laki', 'SMP/SMA', 'Belum kawin', 'Karyawan kontrak', 3, 1, 'Islam', 'Komplek Permata Hijau No. 12', 2147483647, 22, 2147483647, 'pegawai2@gmail.com', 'fa23517aa1adfaab707494340009a330', 0, '2018-02-06', '37d631763c91e22324dd08cd4d20d40b.jpg');

CREATE TABLE `tb_sekolah` (
  `id_sekolah` int(255) NOT NULL,
  `nama_sekolah` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

INSERT INTO `tb_sekolah` (`id_sekolah`, `nama_sekolah`) VALUES
(1, 'Kegiatan OSIS'),
(4, 'Rapat Guru');

CREATE TABLE `tb_seminar` (
  `id_seminar` int(255) NOT NULL,
  `nama_seminar` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

INSERT INTO `tb_seminar` (`id_seminar`, `nama_seminar`) VALUES
(1, 'Seminar Bela Negara'),
(3, 'Seminar Compfest'),
(4, 'Seminar Sinaptika 2018');


ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_user`);

ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`id_bidang`);

ALTER TABLE `tb_cuti`
  ADD PRIMARY KEY (`id_cuti`);

ALTER TABLE `tb_izincuti`
  ADD PRIMARY KEY (`id_izin`);

ALTER TABLE `tb_izinsekolah`
  ADD PRIMARY KEY (`id_izin`);

ALTER TABLE `tb_izinseminar`
  ADD PRIMARY KEY (`id_izin`);

ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tb_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

ALTER TABLE `tb_seminar`
  ADD PRIMARY KEY (`id_seminar`);


ALTER TABLE `tb_admin`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `tb_bidang`
  MODIFY `id_bidang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `tb_cuti`
  MODIFY `id_cuti` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `tb_izincuti`
  MODIFY `id_izin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `tb_izinsekolah`
  MODIFY `id_izin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `tb_izinseminar`
  MODIFY `id_izin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `tb_pegawai`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `tb_sekolah`
  MODIFY `id_sekolah` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `tb_seminar`
  MODIFY `id_seminar` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
