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
(1, 'fadhiilrachman', 'admin@gmail.com', 'M Fadhiil Rachman', '21232f297a57a5a743894a0e4a801fc3', 'admin', '41241cacd6a56d9cb6bef52fb1d337b1.jpg'),
(6, 'baak', 'baak@gmail.com', 'Ka. BAAK', 'f6edb4c31cf9be5ce497d12251a9d29e', 'baak', '2b10f8e9a8cf35bd216750928492d585.jpg');

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
(4, 'Cuti Lebaran');

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
(6, 1, 10, '2018-07-04', 'Bandung', '2018-08-09', 'waiting');

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
(3, 4, 10, '2018-07-10', 'Jakarta', '2018-07-21', 'waiting');

CREATE TABLE `tb_izinseminar` (
  `id_izin` int(255) NOT NULL,
  `id_seminar` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `tglawal` date NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tglakhir` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

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
(10, 'Berliana Indriyanti', 41551, 'Jakarta', '1989-02-09', 'Perempuan', 'S1', 'Belum kawin', 'Karyawan tetap', 3, 1, 'Islam', 'Komplek Permata Hijau No. 12', 2147483647, 12, 2147483647, 'pegawai@gmail.com', '047aeeb234644b9e2d4138ed3bc7976a', 0, '2018-07-04', 'ae418c5f337639f5c3bcef8589c8eb41.jpg');

CREATE TABLE `tb_sekolah` (
  `id_sekolah` int(255) NOT NULL,
  `nama_sekolah` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

INSERT INTO `tb_sekolah` (`id_sekolah`, `nama_sekolah`) VALUES
(1, 'SMA Negeri 4 Jakarta'),
(4, 'SMA Negeri 31 Jakarta');

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
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `tb_bidang`
  MODIFY `id_bidang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `tb_cuti`
  MODIFY `id_cuti` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `tb_izincuti`
  MODIFY `id_izin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `tb_izinsekolah`
  MODIFY `id_izin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `tb_izinseminar`
  MODIFY `id_izin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `tb_pegawai`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `tb_sekolah`
  MODIFY `id_sekolah` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `tb_seminar`
  MODIFY `id_seminar` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
