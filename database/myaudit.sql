-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2019 pada 20.45
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myaudit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `capel`
--

CREATE TABLE `capel` (
  `id` int(11) NOT NULL,
  `jps` double NOT NULL,
  `ts2j` double NOT NULL,
  `ts1j` double NOT NULL,
  `tsj` double NOT NULL,
  `ts2r` double NOT NULL,
  `ts1r` double NOT NULL,
  `tsr` double NOT NULL,
  `status` varchar(2) DEFAULT NULL,
  `id_users` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(6) NOT NULL,
  `ket` varchar(85) DEFAULT NULL,
  `berkas` varchar(85) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL,
  `id_users` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `ket`, `berkas`, `status`, `id_users`) VALUES
(4, 'Dokumen Pendaftaran', 'doc_6.pdf', '1', 6),
(6, 'Dokumen Keuangan', 'doc_13.pdf', '1', 5),
(11, 'satu', 'paper.docx', '0', 6),
(12, 'dua', 'bukti_tf.docx', '0', 6),
(13, 'tiga', 'doc_10.pdf', '0', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `instrumen`
--

CREATE TABLE `instrumen` (
  `id_ins` int(6) NOT NULL,
  `nama_ins` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `instrumen`
--

INSERT INTO `instrumen` (`id_ins`, `nama_ins`) VALUES
(1, 'Tata Pamong'),
(2, 'Mahasiswa'),
(3, 'Sumber Daya Manusia'),
(4, 'Keuangan'),
(5, 'Pendidikan'),
(6, 'Penelitian'),
(7, 'Pengabdian Masyarakat'),
(8, 'Capaian Tridharma');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(6) NOT NULL,
  `jenis` varchar(75) NOT NULL,
  `auditee` varchar(70) DEFAULT NULL,
  `tujuan` varchar(150) DEFAULT NULL,
  `auditor1` varchar(70) DEFAULT NULL,
  `auditor2` varchar(70) DEFAULT NULL,
  `auditor3` varchar(70) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `jenis`, `auditee`, `tujuan`, `auditor1`, `auditor2`, `auditor3`, `tgl_mulai`, `tgl_selesai`, `status`) VALUES
(2, 'Program Studi', 'Program Studi', 'test', 'Muhammad Jaariyah', 'Irsyad Nurdin', 'Muhammad Jaariyah', '2019-07-09', '2019-07-02', '0'),
(3, 'Pimpinan', 'Akademik', 'Sekretaris', 'Muhammad Jaariyah', 'Muhammad Jaariyah', 'Muhammad Jaariyah', '2019-07-25', '2019-07-23', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecukupan`
--

CREATE TABLE `kecukupan` (
  `id_kecukupan` int(6) NOT NULL,
  `jum_lulusan` double DEFAULT NULL,
  `min_ipk` double DEFAULT NULL,
  `rata_ipk` double DEFAULT NULL,
  `maks_ipk` double DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `id_users` int(6) DEFAULT NULL,
  `id_ins` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan`
--

CREATE TABLE `keterangan` (
  `id_ket` int(6) NOT NULL,
  `id_lapangan` int(6) DEFAULT NULL,
  `id_users` int(6) DEFAULT NULL,
  `ket` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapangan`
--

CREATE TABLE `lapangan` (
  `id_lapangan` int(6) NOT NULL,
  `id_users` int(6) DEFAULT NULL,
  `id_ins` int(6) DEFAULT NULL,
  `id_komentar` int(6) DEFAULT NULL,
  `komentar` text,
  `status` int(2) DEFAULT NULL,
  `nilai` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(6) NOT NULL,
  `id_ins` int(6) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `no_sk` varchar(100) DEFAULT NULL,
  `tgl_sk` date DEFAULT NULL,
  `pejabat` varchar(100) DEFAULT NULL,
  `thn_mulai` varchar(5) DEFAULT NULL,
  `no_sk_izin` varchar(100) DEFAULT NULL,
  `tgl_sk_izin` date DEFAULT NULL,
  `akreditas` varchar(100) DEFAULT NULL,
  `no_sk_ban` varchar(100) DEFAULT NULL,
  `kontak` varchar(13) DEFAULT NULL,
  `faks` varchar(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id_users` int(6) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_ins`, `prodi`, `jurusan`, `no_sk`, `tgl_sk`, `pejabat`, `thn_mulai`, `no_sk_izin`, `tgl_sk_izin`, `akreditas`, `no_sk_ban`, `kontak`, `faks`, `email`, `id_users`, `status`) VALUES
(2, 1, 'Sistem Informasi', 'Testa', '12345', '2019-07-03', 'qwerty', '2007', '123678', '2019-07-27', 'A', '123456', '123444', '121212', 'roi@gmail.com', 6, '0'),
(3, 2, 'Agroteknologi', 'Teknik Pertanian', '234567', '2019-07-05', 'Asep', '2009', '234568', '2019-07-03', 'A', '67890', '082316369078', '234678', 'jhon@gmail.com', 5, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
  `id_program` int(6) NOT NULL,
  `nama_program` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`id_program`, `nama_program`) VALUES
(1, 'Doktor/ Doktor Terapan/ Subspesialis'),
(2, 'Magister/ Magister Terapan/ Spesialis'),
(3, 'Profesi 1 Tahun'),
(4, 'Profesi 2 Tahun'),
(5, 'Sarjana/ Sarjana Terapan'),
(6, 'Diploma Tiga'),
(7, 'Diploma Dua'),
(8, 'Diploma Satu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_lulus`
--

CREATE TABLE `tahun_lulus` (
  `id_tahun` int(11) NOT NULL,
  `nama_tahun` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun_lulus`
--

INSERT INTO `tahun_lulus` (`id_tahun`, `nama_tahun`) VALUES
(1, 'TS-2'),
(2, 'TS-1'),
(3, 'TS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(6) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `tnggal_lahir` date NOT NULL,
  `jk` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(13) NOT NULL,
  `foto` varchar(70) NOT NULL,
  `level` enum('Admin','Auditee','Auditor','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `nik`, `nama`, `username`, `password`, `tnggal_lahir`, `jk`, `alamat`, `kontak`, `foto`, `level`) VALUES
(1, '234', 'Admin Audit', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2019-07-10', 'Laki-Laki', 'Bandung', '082316369078', 'teacher.jpg', 'Admin'),
(5, '10116388', 'Muhammad Jaariyah', 'jaariyahxix', '663163dbbf7e5f450680d3bd46f74175', '2019-07-01', 'Laki-Laki', 'Bandungs', '082316369078', 'download.jpg', 'Auditor'),
(6, '10116389', 'Roihan Fa', 'roihanxix', '02364e21cb0044a7a56abdaf2db89bd7', '2019-07-19', 'Laki-Laki', 'Bandung', '087656398254', 'student.jpg', 'Auditee');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `capel`
--
ALTER TABLE `capel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `instrumen`
--
ALTER TABLE `instrumen`
  ADD PRIMARY KEY (`id_ins`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `auditor1` (`auditor1`),
  ADD KEY `auditor2` (`auditor2`),
  ADD KEY `auditor3` (`auditor3`);

--
-- Indeks untuk tabel `kecukupan`
--
ALTER TABLE `kecukupan`
  ADD PRIMARY KEY (`id_kecukupan`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_ins` (`id_ins`);

--
-- Indeks untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`id_ket`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_lapangan` (`id_lapangan`);

--
-- Indeks untuk tabel `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id_lapangan`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_ins` (`id_ins`),
  ADD KEY `id_komentar` (`id_komentar`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_ins` (`id_ins`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indeks untuk tabel `tahun_lulus`
--
ALTER TABLE `tahun_lulus`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`,`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `capel`
--
ALTER TABLE `capel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `instrumen`
--
ALTER TABLE `instrumen`
  MODIFY `id_ins` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kecukupan`
--
ALTER TABLE `kecukupan`
  MODIFY `id_kecukupan` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `id_ket` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id_lapangan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tahun_lulus`
--
ALTER TABLE `tahun_lulus`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `capel`
--
ALTER TABLE `capel`
  ADD CONSTRAINT `capel_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `dokumen_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kecukupan`
--
ALTER TABLE `kecukupan`
  ADD CONSTRAINT `kecukupan_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kecukupan_ibfk_2` FOREIGN KEY (`id_ins`) REFERENCES `instrumen` (`id_ins`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  ADD CONSTRAINT `keterangan_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keterangan_ibfk_2` FOREIGN KEY (`id_lapangan`) REFERENCES `lapangan` (`id_lapangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lapangan`
--
ALTER TABLE `lapangan`
  ADD CONSTRAINT `lapangan_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lapangan_ibfk_2` FOREIGN KEY (`id_ins`) REFERENCES `instrumen` (`id_ins`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lapangan_ibfk_3` FOREIGN KEY (`id_komentar`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_ins`) REFERENCES `instrumen` (`id_ins`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prodi_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
