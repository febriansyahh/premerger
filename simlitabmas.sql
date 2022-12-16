-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 08:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simlitabmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `ab_anggota`
--

CREATE TABLE `ab_anggota` (
  `anggota_id` int(11) NOT NULL,
  `usulan_id` int(11) NOT NULL,
  `anggota_nidn` varchar(18) NOT NULL,
  `anggota_nama` varchar(100) NOT NULL,
  `anggota_pangkat` varchar(50) NOT NULL,
  `anggota_jabatan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `anggota_experience` varchar(50) NOT NULL,
  `anggota_posisi` enum('ketua','anggota') NOT NULL,
  `anggota_isconfirm` int(1) NOT NULL,
  `anggota_jobdesk` varchar(200) NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ab_anggota`
--

INSERT INTO `ab_anggota` (`anggota_id`, `usulan_id`, `anggota_nidn`, `anggota_nama`, `anggota_pangkat`, `anggota_jabatan`, `email`, `anggota_experience`, `anggota_posisi`, `anggota_isconfirm`, `anggota_jobdesk`, `updated`) VALUES
(1, 1, '0610128601', 'PUTRI KURNIA HANDAYANI, M.Kom', 'Penata/III-c', 'Lektor', '', 'SISTEM INFORMASI - S1', 'ketua', 1, 'Ketua', '2022-11-14 10:04:17'),
(4, 2, '0610128601', 'PUTRI KURNIA HANDAYANI, M.Kom', 'Penata/III-c', 'Lektor', '', 'SISTEM INFORMASI - S1', 'ketua', 1, 'Ketua', '2022-11-18 13:42:57'),
(5, 2, '0606058201', 'FAJAR NUGRAHA, S.Kom, M.Kom', 'Penata/III-c', 'Lektor', '', 'SISTEM INFORMASI - S1', 'anggota', 0, 'Anggota', '2022-11-18 13:51:32'),
(6, 2, '0618098701', 'NOOR LATIFAH, M.Kom', 'Penata/III-c', 'Asisten Ahli', '', 'SISTEM INFORMASI - S1', 'anggota', 0, 'Anggota', '2022-11-18 13:52:55'),
(7, 1, '0006108503', 'F. SHOUFIKA HILYANA, S.Si. M.Pd.', 'Penata/III-c', 'Asisten Ahli', '', 'PENDIDIKAN GURU SEKOLAH DASAR - S1', 'anggota', 0, 'Sebagai penyuluhan disekitar lembaga tujuan pengabdian', '2022-11-21 10:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `ab_anggota_eks`
--

CREATE TABLE `ab_anggota_eks` (
  `anggota_eks_id` int(11) NOT NULL,
  `usulan_id` int(11) NOT NULL,
  `anggota_eks_kode` varchar(18) NOT NULL,
  `anggota_eks_nama` varchar(50) NOT NULL,
  `anggota_eks_instansi` varchar(100) NOT NULL,
  `anggota_eks_posisi` enum('anggota') NOT NULL,
  `anggota_eks_jobdesk` varchar(100) NOT NULL,
  `anggota_eks_email` varchar(50) NOT NULL,
  `anggota_eks_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ab_anggota_eks`
--

INSERT INTO `ab_anggota_eks` (`anggota_eks_id`, `usulan_id`, `anggota_eks_kode`, `anggota_eks_nama`, `anggota_eks_instansi`, `anggota_eks_posisi`, `anggota_eks_jobdesk`, `anggota_eks_email`, `anggota_eks_update`) VALUES
(7, 1, '202011069', 'FIRDAUS YASMIN RAHMAWATI', 'Mahasiswa', 'anggota', 'Penyuluhan pelatihan kepada warga sekitar lokasi lembaga', 'firdaus2016y@gmail.com', '2022-11-17 08:59:44'),
(8, 1, '202011001', 'HAZLINDA', 'Mahasiswa', 'anggota', 'Penyuluhan warga sekitar', 'hazlindalinda949@gmail.com', '2022-11-17 09:00:18'),
(10, 2, '202153089', 'YUSUF WAHYUHAJI', 'Mahasiswa', 'anggota', 'Sebagai anggota mahasiswa', 'yusufwahyuhaji1@gmail.com', '2022-11-18 13:53:47'),
(11, 2, '202112100', 'OKTAVIA AYUNINGSIH', 'Mahasiswa', 'anggota', 'Sebagai anggota mahasiswa', 'Oktaviaayuningsihsaka@gmail.com', '2022-11-18 13:54:29'),
(12, 2, '45678945678', 'Yongki Rudianto, S.Kom', 'UPT-PSI', 'anggota', 'Sebagai anggota eksternal', 'yongki.rudianto@umk.ac.id', '2022-11-18 13:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `ab_aspek_penilaian`
--

CREATE TABLE `ab_aspek_penilaian` (
  `aspek_id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ab_aspek_penilaian`
--

INSERT INTO `ab_aspek_penilaian` (`aspek_id`, `keterangan`, `nilai`) VALUES
(1, '<b>Analisis Situasi</b><br/>\r\n(Kondisi eksisting Mitra, Persoalan yang dihadapi mitra)\r\n', 10),
(2, '<b>Permasalahan Mitra</b><br/>\r\n(Kecocokan permasalahan dan program serta kompetensi tim)\r\n', 15),
(3, '<b>Solusi yang ditawarkan</b><br/>\r\n(Ketepatan Metode pendekatan untuk mengatasi permasalahan, Rencana kegiatan, kontribusi partisipasi mitra)\r\n', 20),
(4, '<b>Target Luaran</b><br/>\r\n(Jenis luaran dan spesifikasinya sesuai kegiatan yang diusulkan)\r\n', 25),
(5, '<b>Kelayakan Pengusul</b><br/>\r\n(Kualifikasi Tim Pelaksana, Relevansi Skill Tim, Sinergisme Tim, Pengalaman Kemasyarakatan, Organisasi Tim, Jadwal Kegiatan, Kelengkapan Lampiran)\r\n', 10),
(6, '<b>Biaya Pekerjaan</b><br/>\r\nKelayakan Usulan Biaya (Honorarium (maksimum 30%), Bahan Habis, Peralatan, Perjalanan, Lain-lain pengeluaran)\r\n', 20);

-- --------------------------------------------------------

--
-- Table structure for table `ab_batas_minimal`
--

CREATE TABLE `ab_batas_minimal` (
  `batas_id` int(11) NOT NULL,
  `batas_nilai` int(11) NOT NULL,
  `tanggal_berlaku` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ab_batas_minimal`
--

INSERT INTO `ab_batas_minimal` (`batas_id`, `batas_nilai`, `tanggal_berlaku`) VALUES
(1, 360, '2022-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `ab_catatan_harian`
--

CREATE TABLE `ab_catatan_harian` (
  `catatan_id` int(11) NOT NULL,
  `usulan_id` int(11) NOT NULL,
  `catatan_tanggal` date NOT NULL,
  `catatan_uraian` text NOT NULL,
  `catatan_persentase` int(3) NOT NULL,
  `catatan_file` varchar(100) NOT NULL,
  `catatan_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ab_catatan_harian`
--

INSERT INTO `ab_catatan_harian` (`catatan_id`, `usulan_id`, `catatan_tanggal`, `catatan_uraian`, `catatan_persentase`, `catatan_file`, `catatan_updated`) VALUES
(1, 2, '2022-12-12', '<p>Pengabdian dilakukan mulai dari tahap awal pada objek pengabdian terkait</p>\r\n', 25, 'Catatan_2_2022-12-12.pdf', '2022-12-12 09:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `ab_cek_pemeriksaan`
--

CREATE TABLE `ab_cek_pemeriksaan` (
  `cekpem_id` int(11) NOT NULL,
  `pemeriksaan_id` int(11) NOT NULL,
  `usulan_id` int(11) NOT NULL,
  `cek_pilihan` enum('Ya','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ab_cek_pemeriksaan`
--

INSERT INTO `ab_cek_pemeriksaan` (`cekpem_id`, `pemeriksaan_id`, `usulan_id`, `cek_pilihan`) VALUES
(41, 1, 2, 'Ya'),
(42, 2, 2, 'Ya'),
(43, 3, 2, 'Ya'),
(44, 4, 2, 'Ya'),
(45, 5, 2, 'Ya'),
(46, 6, 2, 'Ya'),
(47, 7, 2, 'Ya'),
(48, 8, 2, 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `ab_jabatan_lpm`
--

CREATE TABLE `ab_jabatan_lpm` (
  `id_jab_lpm` int(11) NOT NULL,
  `nama_jab_lpm` varchar(100) NOT NULL,
  `nidn_jab_lpm` varchar(60) NOT NULL,
  `nis_jab_lpm` varchar(60) NOT NULL,
  `jenis_jab_lpm` varchar(20) NOT NULL,
  `status_jab_lpm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ab_jabatan_lpm`
--

INSERT INTO `ab_jabatan_lpm` (`id_jab_lpm`, `nama_jab_lpm`, `nidn_jab_lpm`, `nis_jab_lpm`, `jenis_jab_lpm`, `status_jab_lpm`) VALUES
(1, 'Dr. Ir. ENDANG DEWI MURRINIE, MP', '0607126101', '0610706010401011', 'Ketua', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ab_laporan_kemajuan`
--

CREATE TABLE `ab_laporan_kemajuan` (
  `kemajuan_id` int(11) NOT NULL,
  `usulan_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kemajuan_ringkasan` text NOT NULL,
  `kemajuan_keyword` text NOT NULL,
  `kemajuan_file` varchar(100) NOT NULL,
  `luaran_satu` text NOT NULL,
  `luaran_dua` text NOT NULL,
  `luaran_tiga` text NOT NULL,
  `kemajuan_upate` datetime NOT NULL,
  `kemajuan_insert` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ab_laporan_kemajuan`
--

INSERT INTO `ab_laporan_kemajuan` (`kemajuan_id`, `usulan_id`, `tanggal`, `kemajuan_ringkasan`, `kemajuan_keyword`, `kemajuan_file`, `luaran_satu`, `luaran_dua`, `luaran_tiga`, `kemajuan_upate`, `kemajuan_insert`) VALUES
(2, 2, '2022-12-15', '<p>Pelaporan kemajuan dilakukan setelah adanya aktivitas atau kegiatan mengenai pengabdian</p>\r\n', 'pengabdian, kemajuan, kegiatan', 'Kemajuan_2_2022-12-15.pdf', 'Luaran_Kem_1_2_2022-12-15.pdf', 'Luaran_Kem_2_2_2022-12-15.pdf', 'Luaran_Kem_3_2_2022-12-15.pdf', '0000-00-00 00:00:00', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `ab_laporan_pengabdian`
--

CREATE TABLE `ab_laporan_pengabdian` (
  `laporan_id` int(11) NOT NULL,
  `usulan_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `laporan_ringkasan` text NOT NULL,
  `laporan_keyword` text NOT NULL,
  `laporan_file` varchar(100) NOT NULL,
  `luaran_satu` text NOT NULL,
  `luaran_dua` text NOT NULL,
  `luaran_tiga` text NOT NULL,
  `laporan_update` datetime NOT NULL,
  `laporan_insert` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ab_laporan_pengabdian`
--

INSERT INTO `ab_laporan_pengabdian` (`laporan_id`, `usulan_id`, `tanggal`, `laporan_ringkasan`, `laporan_keyword`, `laporan_file`, `luaran_satu`, `luaran_dua`, `luaran_tiga`, `laporan_update`, `laporan_insert`) VALUES
(1, 2, '2022-12-15', '<p>Laporan pengabdian akhir yang telah dilakukan pada objek terkait</p>\r\n', 'lapora, akhir', 'Laporan_Akhir_2_2022-12-15.pdf', 'Luaran_Akhir_1_2_2022-12-15.pdf', 'Luaran_Akhir_2_2_2022-12-15.pdf', 'Luaran_Akhir_3_2_2022-12-15.pdf', '0000-00-00 00:00:00', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `ab_lembaga`
--

CREATE TABLE `ab_lembaga` (
  `lembaga_id` int(11) NOT NULL,
  `usulan_id` int(11) NOT NULL,
  `lembaga_nama` varchar(50) NOT NULL,
  `lembaga_jabatan` varchar(20) NOT NULL,
  `lembaga_pimpinan` varchar(50) NOT NULL,
  `lembaga_pimpinan_id` varchar(18) NOT NULL,
  `lembaga_file` varchar(100) NOT NULL,
  `lembaga_lokasi` text NOT NULL,
  `lembaga_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ab_lembaga`
--

INSERT INTO `ab_lembaga` (`lembaga_id`, `usulan_id`, `lembaga_nama`, `lembaga_jabatan`, `lembaga_pimpinan`, `lembaga_pimpinan_id`, `lembaga_file`, `lembaga_lokasi`, `lembaga_updated`) VALUES
(1, 1, 'CV Noor Mandiri', 'Usaha Mandiri', 'Noor Cahyono', '1659818', 'Lembaga_CV_Noor_Mandiri_0610128601_1.pdf', 'Testing', '2022-11-14 10:04:17'),
(2, 2, 'CV Noor Mandiri Jepara', 'Usaha Mandiri', 'Noor Cahyono', '19849859599', 'Lembaga_CV_Noor_Mandiri_Jepara_0610128601_2.pdf', 'Testing', '2022-11-18 13:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `ab_luaran`
--

CREATE TABLE `ab_luaran` (
  `luaran_id` int(11) NOT NULL,
  `usulan_id` int(11) NOT NULL,
  `luaran_nama` varchar(100) NOT NULL,
  `luaran_tanggal` date NOT NULL,
  `luaran_link` text NOT NULL,
  `file_luaran_deskripsi` varchar(100) NOT NULL,
  `file_luaran_hasil` varchar(100) NOT NULL,
  `file_foto_pengujian` varchar(100) NOT NULL,
  `upload_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ab_pemeriksaan`
--

CREATE TABLE `ab_pemeriksaan` (
  `pemeriksaan_id` int(11) NOT NULL,
  `materi_pemeriksaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ab_pemeriksaan`
--

INSERT INTO `ab_pemeriksaan` (`pemeriksaan_id`, `materi_pemeriksaan`) VALUES
(1, 'Jumlah tim pengabdian 2-3 orang (termasuk ketua)'),
(2, 'Kelengkapan Bagian A dan B proposal'),
(3, 'Pengusul menjelaskan posisi proposal terhadap roadmap di bagian LATAR BELAKANG dan melampirkan roadmap di LAMPIRAN'),
(4, 'Ketua Pelaksana dan Anggota adalah dosen tetap di lingkungan Universitas Muria Kudus'),
(5, 'Ketua Pelaksana tidak sedang menjadi ketua pelaksana dalam hibah Pengabdian Masyarakat lain'),
(6, 'Pelaksana Pengabdian muda telah\r\nmelibatkan peneliti senior'),
(7, 'Ketua Pelaksana tidak sedang studi\r\nlanjut\r\n'),
(8, 'Pengusul melibatkan mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `ab_periode`
--

CREATE TABLE `ab_periode` (
  `setting_id` int(11) NOT NULL,
  `setting_jenis` varchar(30) NOT NULL,
  `keterangan` enum('active','nonactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ab_periode`
--

INSERT INTO `ab_periode` (`setting_id`, `setting_jenis`, `keterangan`) VALUES
(1, 'periode_usulan', 'active'),
(2, 'periode_review', 'nonactive');

-- --------------------------------------------------------

--
-- Table structure for table `ab_reviewer`
--

CREATE TABLE `ab_reviewer` (
  `reviewer_id` int(11) NOT NULL,
  `nidn` varchar(30) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `status` enum('Active','Nonactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ab_reviewer`
--

INSERT INTO `ab_reviewer` (`reviewer_id`, `nidn`, `nama_lengkap`, `jabatan`, `status`) VALUES
(27, '0602096301', 'Ir. SHODIQ EKO ARIYANTO, MP', 'Lektor Kepala', 'Active'),
(29, '0628096201', 'Dr SUPARNYO SH.MS', 'Lektor Kepala', 'Active'),
(33, '0622067101', 'SUGENG SLAMET ST.,MT.', 'Lektor Kepala', 'Active'),
(34, '0603076101', 'Dr. H A. HILAL MADJDI M.Pd', 'Lektor Kepala', 'Active'),
(36, '0607036901', 'Dr. SRI UTAMININGSIH M.Pd', 'Tidak Ada', 'Active'),
(38, '0613046101', 'Dr. HIDAYATULLAH SH,M.Hum', 'Lektor Kepala', 'Active'),
(39, '0007126601', 'Dr. MURTONO M. Pd.', 'Lektor Kepala', 'Active'),
(40, '0628045901', 'Dr. MAMIK INDARYANI MS', 'Lektor Kepala', 'Active'),
(43, '0615076301', 'Dr. Drs. H. M. Zainuri MM.', 'Lektor', 'Active'),
(44, '0604047401', 'Rina Fiati ST, M.Cs', 'Lektor', 'Active'),
(45, '0607076401', 'Dr., Dra. Sulistyowati S.H.C.N', 'Lektor', 'Active'),
(46, '0619057201', 'Dr. Solekhan ST, MT', 'Lektor', 'Active'),
(47, '0625017002', 'Dr.  Mohamad Widjanarko S.Psi, M.Si.', 'Lektor', 'Active'),
(49, '0606058201', 'FAJAR NUGRAHA, S.Kom, M.Kom', 'Lektor', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ab_review_proposal`
--

CREATE TABLE `ab_review_proposal` (
  `review_id` int(11) NOT NULL,
  `usulan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `tanggal_review` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ab_review_proposal`
--

INSERT INTO `ab_review_proposal` (`review_id`, `usulan_id`, `user_id`, `catatan`, `tanggal_review`) VALUES
(1, 2, 27, '<p>Lebih di tekankan bahwasannya ini adalah pengabdian</p>\r\n', '2022-11-28'),
(2, 2, 29, '<p>Catatan ini diberikan oleh saya selaku reviewer</p>\r\n', '2022-11-28'),
(3, 2, 33, '<p>Catatan yang mungkin perlu di tindak lanjuti ialah pada tahap eksekusinya</p>\r\n', '2022-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `ab_skema`
--

CREATE TABLE `ab_skema` (
  `skema_id` int(11) NOT NULL,
  `skema_nama` varchar(100) NOT NULL,
  `skema_biaya_max` int(11) NOT NULL,
  `skema_kuota` int(2) NOT NULL,
  `skema_parent` int(11) NOT NULL,
  `skema_status` enum('active','nonactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ab_skema`
--

INSERT INTO `ab_skema` (`skema_id`, `skema_nama`, `skema_biaya_max`, `skema_kuota`, `skema_parent`, `skema_status`) VALUES
(1, 'Skema Kemasyarakatan', 0, 10, 0, 'active'),
(2, 'Skema Kewilayahan', 0, 20, 0, 'active'),
(3, 'Program  Kemitraan  Masyarakat (PKM)', 7000000, 20, 1, 'active'),
(4, 'Program  Kemitraan  Masyarakat  Stimulus (PKMS)', 7000000, 10, 1, 'active'),
(5, 'Program Kuliah  Kerja Nyata -  Pembelajaran dan  Pemberdayaan  Masyarakat  (KKN-PPM)', 3000000, 8, 1, 'active'),
(6, 'Program  Penerapan  Iptek kepada  Masyarakat  (PPIM)', 4000000, 7, 1, 'active'),
(8, 'Skema Kewirausahaan', 0, 30, 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `ab_skor_aspek`
--

CREATE TABLE `ab_skor_aspek` (
  `hasil_id` int(11) NOT NULL,
  `aspek_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `skor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ab_skor_aspek`
--

INSERT INTO `ab_skor_aspek` (`hasil_id`, `aspek_id`, `review_id`, `skor`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 5, 1, 1),
(6, 6, 1, 1),
(37, 1, 2, 4),
(38, 2, 2, 2),
(39, 3, 2, 2),
(40, 4, 2, 4),
(41, 5, 2, 2),
(42, 6, 2, 4),
(46, 1, 3, 4),
(47, 2, 3, 2),
(48, 3, 3, 4),
(49, 4, 3, 4),
(50, 5, 3, 2),
(51, 6, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ab_usulan`
--

CREATE TABLE `ab_usulan` (
  `usulan_id` int(11) NOT NULL,
  `nidn_pengusul` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `program_studi` varchar(50) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `usulan_judul` text NOT NULL,
  `skema_id` int(11) NOT NULL,
  `usulan_tahun` year(4) NOT NULL,
  `usulan_lama_pengabdian` varchar(10) NOT NULL,
  `usulan_biaya` int(11) NOT NULL,
  `usulan_total_biaya` int(11) NOT NULL,
  `target_luaran` text NOT NULL,
  `jmlh_mahasiswa` int(11) NOT NULL,
  `usulan_kota` varchar(35) NOT NULL,
  `lpm_nama` varchar(100) NOT NULL,
  `lpm_nidn` varchar(25) NOT NULL,
  `dekan_nama` varchar(100) NOT NULL,
  `dekan_nidn` varchar(25) NOT NULL,
  `rektor_nama` varchar(100) NOT NULL,
  `rektor_nidn` varchar(25) NOT NULL,
  `file_usulan` varchar(200) NOT NULL,
  `status_usulan` enum('Menunggu','Ditolak','Diterima','Selesai') NOT NULL,
  `status_kelengkapan` enum('Menunggu','Tidak Lengkap','Lengkap') NOT NULL,
  `alasan_tolak` varchar(150) NOT NULL,
  `nilai_rata` float NOT NULL,
  `hasil_nilai` varchar(25) NOT NULL,
  `id_tahun` varchar(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ab_usulan`
--

INSERT INTO `ab_usulan` (`usulan_id`, `nidn_pengusul`, `nama`, `program_studi`, `fakultas`, `usulan_judul`, `skema_id`, `usulan_tahun`, `usulan_lama_pengabdian`, `usulan_biaya`, `usulan_total_biaya`, `target_luaran`, `jmlh_mahasiswa`, `usulan_kota`, `lpm_nama`, `lpm_nidn`, `dekan_nama`, `dekan_nidn`, `rektor_nama`, `rektor_nidn`, `file_usulan`, `status_usulan`, `status_kelengkapan`, `alasan_tolak`, `nilai_rata`, `hasil_nilai`, `id_tahun`, `created_at`, `updated_at`) VALUES
(1, '0610128601', 'PUTRI KURNIA HANDAYANI, M.Kom', 'SISTEM INFORMASI', 'TEKNIK', 'Pelatihan Pengembangan Digital Marketing Product PROFILE pada CV Noor Mandiri Teluk Wetan', 4, 2022, '4 Bulan', 7000000, 4500000, 'Testing', 2, '', 'Dr. Ir. ENDANG DEWI MURRINIE, MP', '0607126101', 'Mohammad Dahlan, S.T., M.T.', '0601076901', 'Prof. Dr. Ir. Darsono, M.Si.', '0011066606', 'Pengabdian_0610128601_Pelatihan_Pengembangan_Digital_Marketing_Product_PROFILE_pada_CV_Noor_Mandiri_Teluk_Wetan.pdf', 'Menunggu', 'Menunggu', '', 0, '', '1', '2022-11-14 10:04:17', '0000-00-00 00:00:00'),
(2, '0610128601', 'PUTRI KURNIA HANDAYANI, M.Kom', 'SISTEM INFORMASI', 'TEKNIK', 'Pelatihan Optimasi Online Marketing Menggunakan Dynamic e-Commerce pada CV Noor Mandiri Rotan Jepara', 5, 2022, '6 Bulan', 3000000, 2850000, 'testing', 2, '', 'Dr. Ir. ENDANG DEWI MURRINIE, MP', '0607126101', 'Mohammad Dahlan, S.T., M.T.', '0601076901', 'Prof. Dr. Ir. Darsono, M.Si.', '0011066606', 'Pengabdian_0610128601_Pelatihan_Optimasi_Online_Marketing_Menggunakan_Dynamic_e-Commerce_pada_CV_Noor_Mandiri_Rotan_Jepara.pdf', 'Selesai', 'Lengkap', '', 290, 'Tidak Lolos', '1', '2022-11-18 13:42:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lemlit_education`
--

CREATE TABLE `lemlit_education` (
  `education_id` int(2) NOT NULL,
  `education_name` varchar(30) NOT NULL,
  `education_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lemlit_education`
--

INSERT INTO `lemlit_education` (`education_id`, `education_name`, `education_update`) VALUES
(1, 'TIDAK SEKOLAH', '2017-09-01 14:45:49'),
(2, 'S-2', '2017-09-24 13:07:31'),
(3, 'S-3', '2017-09-24 13:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `lemlit_faculty`
--

CREATE TABLE `lemlit_faculty` (
  `faculty_id` int(2) NOT NULL,
  `faculty_name` varchar(50) NOT NULL,
  `faculty_dean_name` varchar(50) NOT NULL,
  `faculty_nip` varchar(16) DEFAULT NULL,
  `faculty_update` datetime NOT NULL,
  `faculty_external` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lemlit_faculty`
--

INSERT INTO `lemlit_faculty` (`faculty_id`, `faculty_name`, `faculty_dean_name`, `faculty_nip`, `faculty_update`, `faculty_external`) VALUES
(2, 'EKONOMI DAN BISNIS', 'Dr. Sulistyowati, SH, CN', '0610702010101026', '2021-11-08 04:59:06', NULL),
(3, 'HUKUM', 'Dr. Hidayatullah, M.Hum', '0610701000001007', '2020-08-18 12:48:20', NULL),
(4, 'KEGURUAN ILMU PENDIDIKAN', 'Drs. Sucipto, M.Pd, Kons', '0610713020001015', '2021-03-29 15:31:16', NULL),
(5, 'PERTANIAN', 'Ir. Veronica Krestiani, M.P', '1960032619850320', '2021-03-29 15:29:24', NULL),
(6, 'TEKNIK', 'Moh. Dahlan, ST, MT', '0610701000001145', '2017-09-01 14:28:15', NULL),
(7, 'PSIKOLOGI', 'Iranita Hervi Mahardayani, S.Psi, MSi', '0610701000001146', '2021-03-08 11:51:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lemlit_lecture`
--

CREATE TABLE `lemlit_lecture` (
  `lecture_id` int(10) NOT NULL,
  `user_username` varchar(30) NOT NULL,
  `faculty_id` int(2) NOT NULL,
  `study_program_id` int(2) NOT NULL,
  `position_id` int(5) NOT NULL,
  `education_id` int(2) NOT NULL COMMENT 'Pendidikan',
  `pangkat_id` int(2) NOT NULL COMMENT 'Pangkat',
  `lecture_nis` varchar(16) DEFAULT NULL COMMENT 'NIS/NIP Dosen',
  `lecture_front_degree` varchar(20) DEFAULT NULL,
  `lecture_back_degree` varchar(20) DEFAULT NULL,
  `lecture_id_card` varchar(16) DEFAULT NULL,
  `lecture_place` varchar(30) DEFAULT NULL,
  `lecture_date` date DEFAULT NULL,
  `lecture_address` varchar(100) DEFAULT NULL,
  `lecture_mobile` varchar(30) DEFAULT NULL,
  `lecture_web` varchar(50) DEFAULT NULL,
  `lecture_experience` varchar(100) DEFAULT NULL,
  `lecture_photo` varchar(100) DEFAULT NULL,
  `lecture_review` int(1) DEFAULT 0 COMMENT '0 = Bukan, 1 = Reviewer',
  `lecture_tanggungan` enum('Ada','Kosong') NOT NULL DEFAULT 'Kosong' COMMENT 'Status Tanggungan Proposal',
  `lecture_update` datetime NOT NULL,
  `lecture_external` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lemlit_lecture`
--

INSERT INTO `lemlit_lecture` (`lecture_id`, `user_username`, `faculty_id`, `study_program_id`, `position_id`, `education_id`, `pangkat_id`, `lecture_nis`, `lecture_front_degree`, `lecture_back_degree`, `lecture_id_card`, `lecture_place`, `lecture_date`, `lecture_address`, `lecture_mobile`, `lecture_web`, `lecture_experience`, `lecture_photo`, `lecture_review`, `lecture_tanggungan`, `lecture_update`, `lecture_external`) VALUES
(1, '0001065501', 3, 5, 4, 3, 15, '', 'Dr', 'SH, M.Hum', '1955060119830310', 'PATI', '1955-06-01', 'JL GANESHA GANG II NO 1 RT 03 RW 08 PURWOSARI, KOTA, KUDUS', '081325730613', '', '', NULL, NULL, 'Kosong', '2021-01-09 14:03:38', 0),
(2, '0002048101', 4, 8, 3, 2, 11, '1981040220050120', '', 'SS, M.Pd', '1981040220050120', 'JEPARA', '1981-04-02', 'GRIYA SEKARGADING BLOK I1 SEMARANG', '08122557966', 'umk.ac.id', 'Bahasa dan Sastra Inggris', 'Avatar_0002048101_1579025175.jpg', NULL, 'Ada', '2021-01-09 14:04:57', 0),
(3, '0004047501', 6, 17, 3, 2, 10, '', '', 'S.Kom,M.kom', '1975040420050110', 'PEKALONGAN', '1975-04-04', 'MLATINOROWITO GG. 3 RT. 03 RW. 01 KECAMATAN KOTA KABUPATEN KUDUS', '082242471084', '', '', NULL, NULL, 'Ada', '2021-01-09 14:48:42', 0),
(4, '0006108503', 4, 10, 3, 2, 10, '', '', 'S.Si, M.Pd.', '1985100620150420', 'DEMAK', '1985-10-06', 'SINGOCANDI KOTA KUDUS', '085740209185', '', '', NULL, NULL, 'Ada', '2021-04-06 09:38:21', 0),
(5, '0007126601', 4, 7, 4, 3, 13, '1966120719920310', 'Dr. Drs', 'M.Pd', '2006000712660100', 'PATI', '1966-12-07', 'PERUM MURIA INDAH BLOK E/135 BAE KUDUS', '08122544118', '', 'Ilmu Pendidikan', 'Avatar_0007126601_1560485159.jpg', 1, 'Kosong', '2021-01-09 14:07:18', 0),
(6, '0009015602', 5, 13, 4, 2, 13, '', 'Ir', 'M.Sc', '1956010919850310', 'SURAKARTA', '1956-01-09', '', '0', '', '', NULL, NULL, 'Kosong', '2021-04-06 10:27:44', 0),
(7, '0010105401', 2, 3, 4, 2, 14, '', 'Drs', 'MM', '1954101019800310', 'PATI', '1954-10-10', NULL, NULL, NULL, NULL, NULL, 0, 'Kosong', '2018-11-24 20:20:13', 0),
(8, '0013046201', 4, 8, 4, 2, 14, '1962041319880310', 'Drs', 'M.Pd', '3319071304620001', 'REMBANG', '1962-04-13', 'JALAN KAMPUS UMK VIII-148 RT 03 RW 01 DERSALAM BAE KUDUS', '081325091198', '', 'Pendidikan Bahasa Inggris', 'Avatar_0013046201_1578688427.jpg', NULL, 'Ada', '2021-01-09 14:44:19', 0),
(9, '0014076202', 5, 13, 2, 3, 10, '', 'Dr. Dra', 'M.Si', '1962071419860320', 'BANJARNEGARA', '1962-07-14', '', '082324260015', '', '', NULL, NULL, 'Kosong', '2021-01-09 14:16:14', 0),
(10, '0016065701', 4, 8, 4, 2, 14, '1957061619840310', 'Drs', 'M.Pd', '3319021606570001', 'KEBUMEN', '1957-06-16', 'MLATI KIDUL 06/01 NO. 54 KUDUS', '08562758418', '', 'Pendidikan Bahasa Inggris', 'Avatar_0016065701_1578744539.jpg', NULL, 'Ada', '2021-01-09 14:28:56', 0),
(11, '0019055301', 3, 6, 3, 2, 12, '', '', 'SH,MH', '1953051919810320', 'JAKARTA', '1953-05-15', NULL, NULL, NULL, NULL, NULL, 0, 'Kosong', '2018-11-24 20:20:13', 0),
(12, '0019065601', 4, 9, 4, 2, 15, '', 'Drs', 'M.Pd', '1956061919850310', 'BREBES', '1956-06-19', NULL, NULL, NULL, NULL, NULL, 0, 'Kosong', '2018-11-24 20:20:13', 0),
(13, '0019126201', 4, 7, 3, 3, 12, '1962121919870310', 'Dr.,Drs', 'M.Pd', '1962121919870310', 'KENDAL', '1962-12-19', 'KENDAL', '0', '', 'Pendidikan Bahasa Inggris', NULL, NULL, 'Ada', '2021-01-09 13:51:31', 0),
(14, '0020068108', 6, 15, 3, 2, 10, '', '', 'S.T., M.T.I', '3276062006810002', 'SEMARANG', '1981-06-20', 'PERUMAHAN BUKIT PERMATA PURI BLOK B.13 NO. 9 SEMARANG', '082328275699', '', 'Teknologi Informasi', 'Avatar_0020068108_1558080419.jpg', NULL, 'Kosong', '2019-05-17 15:06:59', 0),
(15, '0021087301', 6, 14, 2, 3, 9, '1973082120050110', 'Dr. ', 'ST,M.Eng', '3373022108730002', 'TENGARAN', '1973-08-21', 'SINGOJAYAN RT 001/002 TINGKIR TENGAH, TINGKIR, SALATIGA', '08156639275', '', 'Teknik Mesin', NULL, NULL, 'Kosong', '2021-04-06 09:35:44', 0),
(16, '0022038001', 2, 3, 2, 2, 10, '', '', 'SE,MM', '1980032220050120', 'TEGAL', '1980-03-22', 'JL. SRONDOL ASRI RT 005/005 SRONDOL KULON, BANYUMANIK', '0811280387', '', '', NULL, NULL, 'Kosong', '2021-04-06 10:18:44', 0),
(17, '0023017901', 6, 14, 3, 2, 10, '', '', 'ST,MT', '1979012320050110', 'CILACAP', '1979-01-23', 'GETAS PEJATEN RT. 008/004, JATI', '081802493494', '', '', NULL, NULL, 'Ada', '2021-01-09 14:40:37', 0),
(18, '0023075809', 5, 13, 3, 2, 12, '', 'Ir', 'MS', '1958072319870310', 'DEMAK', '1958-07-23', 'DESA KALIREJO RT 01 RW 04 KEC. UNDAAN KAB. KUDUS', '082227980521', '', '', NULL, NULL, 'Kosong', '2021-01-09 14:28:30', 0),
(19, '0023116001', 5, 13, 2, 2, 10, '', 'Ir', 'MP', '1960112319860310', 'KEDIRI', '1960-11-23', '', '0', '', '', NULL, NULL, 'Kosong', '2021-01-09 14:01:58', 0),
(20, '0026036002', 5, 13, 3, 2, 11, '', 'Ir', 'MP', '1960032619850320', 'BOYOLALI', '1960-03-26', '', '0', '', '', NULL, NULL, 'Kosong', '2021-03-18 14:37:50', 0),
(21, '0026065516', 2, 2, 3, 3, 12, '1955062619840310', 'Dr. Drs', 'SH,S.Pd,MM', '3319032606550001', 'SURAKARTA', '1955-06-26', 'TUMPANG KRASAK RT.02 RW.04, JATI KUDUS', '082314551126', '', 'Ekonomi Pembangunan', NULL, NULL, 'Kosong', '2021-01-09 13:26:57', 0),
(22, '0406107004', 6, 15, 3, 2, 10, '', '', 'S.Kom, M.Kom', '3321090610700001', 'DEMAK', '1970-10-06', 'CANGKRING REMBANG RT 04 RW 02', '081318924929', '', 'Teknik Informatika', NULL, NULL, 'Ada', '2021-01-09 13:29:43', 0),
(23, '0502078404', 6, 18, 2, 2, 10, '0610701000001300', '', 'S.T., M.T.', '3319014207840002', 'KUDUS', '1984-07-02', 'TANJUNG REJO 3/3 JEKULO - KUDUS', '081328815337', '', 'Manajemen Industri', 'Avatar_0502078404_1560615862.jpg', NULL, 'Ada', '2021-03-18 14:33:51', 0),
(24, '0520017602', 2, 3, 2, 2, 10, '', 'SE,M.Si', '', '', 'PATI', '1976-01-20', '', '082135903338', '', '', NULL, NULL, 'Kosong', '2021-01-09 13:28:22', 0),
(25, '0522018401', 7, 19, 2, 2, 10, '', '', 'S.Psi,MA', '', 'MAGELANG', '1984-01-22', '', '0', '', '', NULL, NULL, 'Kosong', '2021-03-18 14:46:15', 0),
(26, '0601017501', 4, 8, 3, 2, 11, '', 'S.Pd, M.Pd', '', '1119034101750005', 'TEGAL', '1975-01-01', 'JEPANG RT3/1, MEJOBO, KUDUS JEPANG KAB. KUDUS', '081542459684', '', '', NULL, NULL, 'Ada', '2022-08-27 10:51:29', 0),
(27, '0601037201', 2, 4, 2, 3, 9, '', 'Dr. ', 'S.E., S.H., M.Si', '', 'TEGAL', '1972-03-01', '', '081548281849', '', '', NULL, NULL, 'Ada', '2022-08-27 10:52:11', 0),
(28, '0601058303', 2, 3, 3, 2, 10, '0610701000001293', '-', 'S.E., M.B.A.', '3319014105830001', 'KUDUS', '1983-05-01', 'JL PERMAI VII NO. 7 RT 2 RW 4, PERUM KUDUS PERMAI, KUDUS 59361', '08156724705', '', 'MANAJEMEN ', NULL, NULL, 'Ada', '2021-04-06 10:15:08', 0),
(29, '0601058402', 4, 8, 3, 2, 11, '', 'S.Pd, M.Pd', '', '', 'KUDUS', '1984-05-01', '', '085640065312', '', '', NULL, NULL, 'Kosong', '2021-03-18 14:02:44', 0),
(30, '0601076901', 6, 16, 4, 2, 12, '0610701000001141', '', 'ST., MT.', '3319050107690102', 'REMBANG', '1969-06-01', 'PERUM. SUMBER INDAH II BLOK B NO. 24 TENGGELES MEJOBO KUDUS', '08156623948', '', 'Teknik Elektro', 'Avatar_0601076901_1599459906.jpg', NULL, 'Ada', '2021-01-09 14:29:34', 0),
(31, '0601085601', 2, 3, 4, 2, 14, '0610702010101002', 'Drs,', 'MM', '3318100108560006', 'PATI', '1956-08-01', 'DS. MERTOKUSUMAN RT.03 RW.02 PATI WETAN PATI 59115', '08156507474', '-', 'Manajemen Keuangan', 'Avatar_0601085601_1543545672.jpg', NULL, 'Ada', '2021-01-09 14:17:38', 0),
(32, '0601085902', 4, 7, 3, 3, 11, '', 'Dr. ', 'M.Pd', '', 'KUDUS', '1959-08-01', 'DESA TUMPANGKRASAK', '085641979401', '', '', NULL, NULL, 'Kosong', '2021-01-09 13:57:24', 0),
(33, '0601099201', 2, 3, 2, 2, 10, '0610701000001311', '-', 'S.E., M.M.', '3310064109920003', 'KUDUS', '1992-09-01', 'HONGGOSOCO 2/2 JEKULO KUDUS', '085640317070', '', 'Manajemen', 'Avatar_0601099201_1558155763.jpg', NULL, 'Ada', '2021-01-09 14:13:36', 0),
(34, '0602017901', 6, 17, 3, 2, 12, '0610701000001194', '', 'S.Kom,M.Kom', '3302011979000001', 'SEMARANG', '1979-01-02', 'PERUMAAN MEAWON INDA BLOK E51-52', '081225258727', '', '', NULL, NULL, 'Ada', '2022-09-14 13:52:04', 0),
(35, '0602078301', 4, 8, 3, 2, 11, '0601701000001227', '', 'S.Pd,M.Pd', '3319090207830004', 'KUDUS', '1983-07-02', 'BAE KRAJAN 03/01 BAE KUDUS', '082242390751', '', 'Pendidikan Bahasa Inggris', 'Avatar_0602078301_1601370564.jpg', NULL, 'Ada', '2021-01-09 14:15:19', 0),
(36, '0602079002', 2, 3, 2, 2, 10, '0610701000001310', '-', 'S.E., M.GES.', '3308104207900001', 'SEMARANG', '1990-07-02', 'JL. JERUK 3 NO. 21', '0', '', 'Manajemen', NULL, NULL, 'Ada', '2021-01-09 14:25:46', 0),
(37, '0602096301', 5, 13, 4, 2, 13, '0610706010401018', 'Ir,', 'MP', '20060602096301', 'PATI', '1963-09-02', 'PLANGITAN PATI', '08164259617', '-', 'Ilmu Pertanian', 'Avatar__1545105205.jpg', 1, 'Kosong', '2021-01-09 13:50:28', 0),
(38, '0602118103', 2, 4, 2, 2, 10, '', '', 'SE,M.Si,Akt', '3319074211810004', 'KUDUS', '1981-11-02', 'GONDANGMANIS RT 7 RW 7 BAE KUDUS', '08122521393', '', '', NULL, NULL, 'Kosong', '2021-04-06 10:25:49', 0),
(39, '0603037801', 2, 4, 3, 2, 11, '0610701000001264', '', 'SE,M.Si.Ak', '3319024303780008', 'KUDUS', '1978-03-03', 'WERGU WETAN RT 04 RW 03 KEC KOTA', '081325414388', '', 'Akuntansi', NULL, NULL, 'Ada', '2021-01-09 14:41:39', 0),
(40, '0603047104', 6, 15, 2, 2, 10, '', 'ST, M. Kom', '', '', 'YOGYAKARTA', '1971-04-03', '', '081326617272', '', '', NULL, NULL, 'Ada', '2021-01-09 13:32:28', 0),
(41, '0603067701', 2, 3, 2, 2, 10, '', '', 'SE,MM', '', 'KUDUS', '1977-06-03', '', '085747494306', '', '', NULL, NULL, 'Kosong', '2021-03-18 14:37:21', 0),
(42, '0603068401', 4, 10, 3, 2, 10, '', '', 'S.Si,M.Pd', '3318124306840004', 'KEDIRI', '1984-06-03', 'PERUMAHAN SUKOHARJO INDAH JL. MADUKARA III RT 4 RW 8 MARGOREJO PATI', '085730623760', '', '', NULL, NULL, 'Kosong', '2021-04-06 09:50:56', 0),
(43, '0603068602', 2, 3, 2, 2, 10, '', '-', 'S.E., M.M.', '3319024306860002', 'MAGELANG', '1986-06-01', 'DK PENDEM WETAN RT 01/ RW 10 JEPANG MEJOBO KUDUS', '085226845842', '', 'MANAJEMEN PEMASARAN', 'Avatar_0603068602_1558073292.jpg', NULL, 'Ada', '2021-03-18 14:29:08', 0),
(44, '0603075902', 3, 5, 4, 2, 13, '', 'SH,M.Hum', '', '', 'KUDUS', '1959-07-03', '', '08562659550', '', '', NULL, NULL, 'Kosong', '2021-01-09 13:59:49', 0),
(45, '0603076101', 4, 7, 4, 3, 15, '0610713030001020', 'Dr.,Drs.', 'M.Pd', '1119010307610001', 'KUDUS', '1961-07-03', 'PERENG PRAMBATAN LOR RT 009/004 KALIWUNGU KUDUS', '081575430214', '', 'Bahasa Inggris', 'Avatar__1545102090.jpg', 1, 'Ada', '2021-01-09 13:24:24', 0),
(46, '0603088501', 2, 4, 3, 2, 11, '', '', 'SE, M.Si', '', 'KUDUS', '1985-08-03', 'JL. FLAMBOYAN, RT 001 RW 002,DESA PEGANJARAN KECAMATAN BAE , KUDUS', '085643053622', '', '', NULL, NULL, 'Kosong', '2021-05-08 10:20:57', 0),
(47, '0603108901', 2, 4, 2, 2, 10, '', 'S.E., M.Si.', '', '', 'JEPARA', '1989-10-03', 'DUKUH KRAJAN', '0', '', '', NULL, NULL, 'Kosong', '2021-04-06 09:12:19', 0),
(48, '0604038702', 4, 11, 2, 2, 10, '0610701000001253', '', 'S.Pd., M.Pd.', '3319064403870001', 'KUDUS', '1987-03-04', 'SAMIREJO RT 1 RW 6 DAWE KUDUS', '085640019037', '', 'Pendidikan Bahasa dan (Sastra) Indonesia ', 'Avatar_0604038702_1578624460.jpg', NULL, 'Ada', '2021-01-09 14:49:44', 0),
(49, '0604047401', 6, 15, 4, 2, 13, '0610701000001202', '-', 'ST, M.Cs', '1119054404740006', 'KUDUS', '1974-04-04', 'JL. RAYA-KUDUS KM 5. GOLAN TEPUS NO. 10 RT.01/RW.01 MEJOBO KUDUS', '08122503611', '-', 'Teknik Informatika', 'Avatar__1545104789.jpg', 1, 'Ada', '2021-01-09 14:08:23', 0),
(50, '0604048702', 6, 15, 3, 2, 11, '', 'S.Kom,M.Cs', '', '', 'AMBON', '1987-04-04', '', '081343031115', '', '', NULL, NULL, 'Kosong', '2021-03-27 13:32:09', 0),
(51, '0604059102', 4, 10, 2, 2, 10, '', '', 'S.Si., M.Or.', '3319070405910001', 'KUDUS', '1991-05-04', 'PERUM MURIA INDAH B/257 RT 01 RW 07 KEC. BAE KAB. KUDUS', '085877744433', '', 'ilmu keolahragaan', 'Avatar_0604059102_1558147026.jpg', NULL, 'Ada', '2021-01-09 14:51:31', 0),
(52, '0604127001', 3, 6, 2, 2, 9, '', 'SH,MH', '', '', 'SEMARANG', '1970-12-04', ' JL. PARIKESIT NO.7 RT 06 RW 02 GG LESMONO SENDANG GEDE BANYUMANIK SEMARANG 50264', '081225257932', '', '', NULL, NULL, 'Kosong', '2021-03-18 14:13:07', 0),
(53, '0605048701', 4, 11, 2, 2, 10, '0610701000001290', '', 'S.Pd, M.Pd', '3319080504870005', 'KUDUS', '1987-04-05', 'BESITO RT. 06 RW. 03 KECAMATAN GEBOG, KABUPATEN KUDUS', '08562054192', '', 'Pendidikan Bahasa dan Sastra Indonesia', 'Avatar_0605048701_1578735604.jpg', NULL, 'Ada', '2021-01-09 14:38:18', 0),
(54, '0605098901', 6, 15, 3, 2, 10, '0610701000001299', '', 'S.Kom,M.Kom', '3319074509890001', 'KUDUS', '1989-09-05', 'PEDAWANG RT01/RW02 BAE KUDUS', '085226620943', 'http://icetea-lagi.blogspot.com/', 'Teknik Informatika', 'Avatar_0605098901_1599796553.jpg', NULL, 'Kosong', '2021-04-06 09:58:02', 0),
(55, '0606057701', 4, 8, 3, 2, 11, '0610701000001160', 'Dr. ', 'SS, M.Hum', '', 'JEPARA', '1977-05-06', 'JL.BUKIT BERINGIN SELATAN BLOK G 220 RT 13 RW 10, GONDORIO, NGALIAN, KOTA SEMARANG', '081225522877', '', '', NULL, NULL, 'Kosong', '2021-05-08 10:13:01', 0),
(56, '0606058201', 6, 17, 3, 2, 10, '0610701000001262', 'S.Kom,M.Kom', 'S.Kom., M.Kom.', '3372010605820001', 'SURAKARTA', '1982-05-06', 'JL. MURIA RAYA 2 NO.47 PERUM MURIA INDAH, GONDANGMANIS - BAE, KUDUS', '085725268111', NULL, 'Sistem Informasi', NULL, NULL, 'Ada', '2022-09-14 13:17:25', 0),
(57, '0606058801', 2, 3, 2, 2, 10, '0610701000001297', '-', 'S.E., M.M.', '3319084605880002', 'KUDUS', '1988-05-06', 'GONDOSARI KAB. KUDUS', '085640858494', '', 'MANAJEMEN', NULL, NULL, 'Kosong', '2021-04-06 10:14:00', 0),
(58, '0606128603', 2, 4, 2, 2, 10, '0610701000001306', '-', 'SE,Ak,M.Acc', '', 'KLATEN', '1986-12-06', 'JL.RAYA KAMPUS UMK,KAVLING SEGERAN RT 06/01 DERSALAM,BAE,KUDUS', '081392712847', '', '', NULL, NULL, 'Kosong', '2021-03-18 14:03:25', 0),
(59, '0607016201', 4, 11, 3, 3, 12, '', 'Dr. Drs, ', 'M.Pd', '', 'REMBANG', '1962-01-07', '', '081325236433', '', '', NULL, NULL, 'Ada', '2021-01-09 14:11:01', 0),
(60, '0607018801', 4, 10, 2, 2, 10, '0610701000001271', '', 'S.Pd, M.Pd', '3373034701880001', 'SALATIGA', '1988-01-07', 'KENTENG RT.02 RW.05 TEGALREJO SALATIGA', '085640139467', '', 'Pendidikan Guru Sekolah Dasar', 'Avatar_0607018801_1578623215.jpg', NULL, 'Ada', '2021-01-09 14:46:46', 0),
(61, '0607018903', 6, 18, 2, 2, 10, '', '', 'S.T., M.T.', '3508100701890001', 'BLITAR', '1989-01-07', 'GRIYA HARAPAN 5 NO. 7, GONDANGMANIS, BAE, KUDUS', '085334739993', '', 'Teknik Industri', NULL, NULL, 'Ada', '2021-04-06 09:18:45', 0),
(62, '0607036901', 4, 7, 3, 3, 11, '0610701000001218', 'Dr, ', 'S.Pd, M.Pd', '1103014703690001', 'BOYOLALI', '1971-03-07', 'JL. SULTAN HADIWIJAYA 28 DEMAK', '081575050091', '', 'Ilmu Pendidikan', 'Avatar__1545103545.jpg', 1, 'Kosong', '2021-01-09 13:55:39', 0),
(63, '0607037804', 4, 8, 3, 2, 11, '0610701000001187', '', 'S.S., M. Pd', '3319070703780007', 'PURWODADI', '1978-03-07', 'DESA KARANGMALANG, RT. 01/RW. 02, GEBOG, KUDUS, JAWA TENGAH', '08156588615', '', 'Pendidikan Bahasa Inggris', 'Avatar_0607037804_1601454807.jpg', NULL, 'Ada', '2021-11-11 08:44:22', 0),
(64, '0607048403', 2, 4, 3, 2, 11, '', 'M.Si', '', '', 'KLATEN', '1984-04-07', '', '085325047799', '', '', NULL, NULL, 'Kosong', '2021-01-09 13:33:17', 0),
(65, '0607067001', 6, 17, 3, 2, 12, '0610701000001192', '', 'S.Kom,M.Kom', '3319042107870002', 'KUDUS', '1970-06-07', 'KUDUS', '081575297844', '-', 'Etika Profesi berbasis Teknologi', NULL, NULL, 'Ada', '2021-03-18 14:44:24', 0),
(66, '0607068302', 6, 18, 2, 2, 10, '0610701000001179', '', 'ST., M.Eng', '3329070706830007', 'BREBES', '1983-06-07', 'JL KUDUS PERMAI VII RT 002/004 NO 7 GARUNG LOR KEC.KALIWUNGI KAB. KUDUS', '085747770111', '', 'Ergonomi dan K3', NULL, NULL, 'Ada', '2021-01-09 13:30:31', 0),
(67, '0607076401', 3, 5, 3, 3, 11, '0610701000001268', 'Dr., Dra.', 'S.H , C.N', '3322184707640003', 'PATI', '1964-07-07', 'JL.SETENAN UTARA NO.5 UNGARAN', '081901567752', '', 'Ilmu Hukum', 'Avatar_0607076401_1559253966.jpg', NULL, 'Ada', '2021-01-09 14:04:37', 0),
(68, '0607095601', 4, 7, 3, 3, 16, '1956090719770310', 'Dr. Drs.', 'S.Pd,SH,MM', '3374060709560004', 'PURWOREJO', '1956-09-07', 'JL. RATU RATIH I/2 TLOGOSARI KULON KOTA SEMARANG', '08122854558', '', 'Manajemen', NULL, NULL, 'Ada', '2021-06-09 09:27:24', 0),
(69, '0607119301', 2, 4, 1, 2, 18, '', 'S.E., M.Sc.', '', '', 'KENDAL', '1993-11-07', 'SENET', '0', '', '', NULL, NULL, 'Kosong', '2021-03-18 14:18:00', 0),
(70, '0607126101', 5, 13, 4, 3, 13, '0610706010401011', 'Dr,Ir', ',MP', '20060607126101', 'SEMARANG', '1961-12-07', 'DERSALAM BAE KUDUS', '081325715448', '-', 'Ilmu Pertanian', 'Avatar__1545103873.jpg', 1, 'Ada', '2021-04-06 10:46:36', 0),
(71, '0608038502', 4, 10, 2, 2, 10, '', '', 'S.Pd,M.Pd', '', 'KUDUS', '1985-03-08', 'DESA JEKULO RT4/RW6, KECAMATAN JEKULO, KABUPATEN KUDUS', '085640256542', '', '', NULL, NULL, 'Kosong', '2021-04-06 09:48:43', 0),
(72, '0608047901', 6, 17, 3, 3, 9, '0610701000001171', 'Dr', 'S.Kom., M.Cs', '3319030804790002', 'BOYOLALI', '1979-04-08', 'TANJUNGKARANG RT 4/ RW 1, JATI KUDUS', '081325781453', '', 'Ilmu Komputer', 'Avatar_0608047901_1578730416.jpg', NULL, 'Ada', '2022-10-21 10:35:12', 0),
(73, '0608048804', 2, 4, 2, 2, 10, '', 'SE, Akt. M.Si', '', '', 'KENDAL', '1988-04-08', '', '081252525215', '', '', NULL, NULL, 'Kosong', '2021-01-09 13:45:55', 0),
(74, '0608068502', 6, 15, 3, 2, 11, '', 'S.Kom,M.Kom', 'S.Kom, M.Kom', '3320044806850003', 'JEPARA', '1985-06-08', 'JL. MAYONG-WELAHAN 195 DS MAYONGLOR RT 06 RW 02 KEC MAYONG KAB JEPARA', '08996420011', '', 'Teknik Informatika', 'Avatar_0608068502_1578717062.jpg', NULL, 'Kosong', '2021-03-18 14:35:22', 0),
(75, '0608086402', 2, 3, 4, 2, 13, '', 'Dra,', 'MM', '', 'PATI', '1964-08-08', '', '081325600853', '', '', NULL, NULL, 'Ada', '2022-09-09 10:40:02', 0),
(76, '0608088201', 6, 17, 3, 2, 10, '', '', 'S.Kom, M.Kom', '', 'KUDUS', '1982-08-08', 'DESA GULANG RT 01 RW 03 MEJOBO KUDUS', '085641199790', '', '', NULL, NULL, 'Ada', '2021-04-06 10:09:34', 0),
(77, '0608127602', 2, 4, 3, 2, 12, '', 'SE,Akt.M.Si', '', '', 'PATI', '1976-12-08', '', '08122527362', '', '', NULL, NULL, 'Kosong', '2021-01-09 13:42:52', 0),
(78, '0609107501', 2, 3, 2, 2, 9, '', '', 'SE, MM', '', 'KUDUS', '1975-10-09', 'DESA NGANGUK RT. O2 RW. 03 KUDUS', '08164888094', '', '', NULL, NULL, 'Ada', '2021-01-09 14:37:56', 0),
(79, '0610057804', 2, 2, 3, 3, 12, '0610701000001209', 'Dr', 'S.PdI, SE, MM', '3320041005780002', 'KUDUS', '1978-05-10', 'JL. LINGKAR UTARA UMK, BAE, KUDUS, JAWA TENGAH, INDONESIA. 59327', '081233605250', '', 'Marketing Manajemen', 'Avatar_0610057804_1601279048.jpg', NULL, 'Ada', '2021-03-18 14:34:26', 0),
(80, '0610079002', 6, 16, 3, 2, 10, '', '', 'M. Eng', '3319095007900002', 'KUDUS', '1990-07-10', 'REJOSARI RT 01 RW 04 DAWE KUDUS', '085738080234', '', '', NULL, NULL, 'Ada', '2021-04-06 10:11:39', 0),
(81, '0610106001', 3, 5, 4, 3, 13, '0610701000001017', 'Dr.', 'SH,M.Hum', '20060610106001 ', 'MALANG', '1960-10-10', 'KUDUS', '0', '', 'Ilmu Hukum', NULL, NULL, 'Kosong', '2021-01-09 13:58:05', 0),
(82, '0610107903', 4, 9, 2, 3, 10, '', 'Dr.', 'S.Pd,M.Pd,Kons', '', 'BLORA', '1979-10-10', '', '0', '', '', NULL, NULL, 'Ada', '2021-03-18 14:08:06', 0),
(83, '0610118701', 4, 9, 3, 2, 12, '0610701000001229', '', 'S.Pd, M.Pd, Kons', '3320135011870002', 'JEPARA', '1987-11-10', 'PERUMAHAN SALAM INDAH NO 68 DERSALAM BAE KUDUS JAWA TENGAH', '085290590199', '', 'Konseling', 'Avatar_0610118701_1600050068.jpg', NULL, 'Ada', '2021-01-09 14:30:00', 0),
(84, '0610128601', 6, 17, 3, 2, 11, '0610701000001246', '-', 'S.Kom,M.Kom', '3319035012860004', 'KUDUS', '1986-12-10', 'KRAMAT REJO NO 391 BARONGAN KUDUS', '085640716648', '', 'Sistem Informasi', 'Avatar_0610128601_1601079340.jpg', NULL, 'Ada', '2021-01-09 14:36:34', 0),
(85, '0610129001', 6, 15, 3, 2, 10, '', '', 'M.Kom', '3319071012900001', 'KUDUS', '1990-12-10', 'SAKBUNDER DERSALAM KEC. BAE', '081326384731', '', '', NULL, NULL, 'Kosong', '2021-04-06 10:04:33', 0),
(86, '0611018202', 2, 4, 3, 2, 11, '', 'SEI,M.Si', '', '', 'KUDUS', '1982-01-11', 'CENDONO RT.05 RW.04 DAWE KUDUS', '085216799150', '', '', NULL, NULL, 'Kosong', '2021-09-29 10:25:03', 0),
(87, '0611059001', 4, 12, 3, 2, 10, ' 061070100000128', '', 'S.Pd, M.Pd', '3326135105900041', 'PEKALONGAN', '1990-05-11', 'JALAN KALIYITNO KULON RT 3 RW 5 DUKUH BANCI, DESA PUYOH, DAWE, KUDUS', '087711645077', '', '', NULL, NULL, 'Ada', '2021-04-06 09:26:10', 0),
(88, '0611066901', 6, 14, 2, 2, 10, '', '', 'ST, M.Eng', '3375031106690003', 'PEKALONGAN', '1969-06-11', 'DK. WONOSARI GEDE RT/RW:019/005 KALIMOJOSARI DORO PEKALONGAN, 51191 KALIMOJOSARI KAB. PEKALONGAN', '085869130725', '', '', NULL, NULL, 'Kosong', '2021-04-06 10:20:56', 0),
(89, '0611088901', 6, 15, 2, 2, 10, '', '', 'S.Kom. M.Kom', '3319095108890005', 'PANDEGLANG', '1989-08-11', 'PUYOH, RT 05/RW V, DAWE, KUDUS', '082136663344', '', 'Teknik Informatika, AI', NULL, NULL, 'Ada', '2021-01-09 13:42:06', 0),
(90, '0611116401', 4, 9, 2, 2, 10, '', 'Drs,', 'M.Pd', '', 'KUDUS', '1964-11-11', 'JL. PARANG GARUDA RAYA 6 GONDANGMANIS KAB. KUDUS', '082135904004', '', '', NULL, NULL, 'Kosong', '2021-04-06 10:45:35', 0),
(91, '0611118301', 4, 8, 3, 2, 11, '0610701000001226', '', 'S.Pd, M.Pd', '3319075111830003', 'KUDUS', '1983-11-11', 'KEDUNGDOWO KALIWUNGU KUDUS', '085848848352', '', 'Pendidikan Bahasa Inggris untuk anak-anak', 'Avatar_0611118301_1560743607.jpg', NULL, 'Ada', '2021-03-18 14:39:48', 0),
(92, '0612028801', 4, 9, 3, 2, 10, '', '', 'S.Pd, M.Pd', '', 'KUDUS', '1988-02-12', 'KERJASAN NO. 89 RT.01 RW.02 KUDUS 59315 JAWA TENGAH', '085200942999', '', '', NULL, NULL, 'Kosong', '2021-04-06 10:22:38', 0),
(93, '0612037201', 6, 14, 3, 2, 12, '0610701000001138', '', 'ST,MT', '3319051203720005', 'PATI', '1972-03-12', 'KESAMBI RT 02 RW IV MEJOBO KUDUS', '085225119582', '', '', NULL, NULL, 'Ada', '2021-03-18 14:43:21', 0),
(94, '0612047001', 4, 10, 2, 3, 10, '', 'S.Pd, M.Pd', '', '', 'KUDUS', '1970-04-12', 'GONDANGMANIS, BAE, PO. BOX. 53, KUDUS, TELP. (0291) 438229, FAX (0291) 437198', '085865720182', '', '', NULL, NULL, 'Kosong', '2021-03-18 14:23:28', 0),
(95, '0612077901', 4, 8, 3, 2, 11, '0610701000001201', '', 'S.Pd, M.Pd.', '3319025207790006', 'TEGAL', '1979-07-12', 'PERUM MURIA INDAH BLOK L798 GONDANGMANIS BAE KUDUS', '081326176360', '', 'Pendidikan bahasa Inggris', 'Avatar_0612077901_1560353457.jpg', NULL, 'Ada', '2021-03-18 14:50:50', 0),
(96, '0612085802', 4, 9, 4, 2, 14, '0610713020001008', 'Dra,', 'M.Pd.Kons', '1119055208580002', 'SURAKARTA', '1959-08-12', 'JL. KALANGAN 241 A TENGGELES KUDUS', '0816664392', '', 'Bimbingan Konseling', NULL, NULL, 'Ada', '2021-01-09 14:45:19', 0),
(97, '0612127702', 2, 3, 2, 2, 10, '0610701000001177', '', 'S.E., M.M.', '3319075212770002', 'BANYUMAS', '1977-12-12', 'PERUMAHAN MVR BLOK PEAK VIEW, NO. C-7, BAE KUDUS', '087731000700', '', '', 'Avatar_0612127702_1601222308.jpg', NULL, 'Ada', '2021-01-09 13:45:09', 0),
(98, '0625016801', 4, 8, 3, 3, 12, '0610701000001186', 'Dr, Dra', 'M.Pd', '3374166501680001', 'CIAMIS', '1968-01-25', 'GG. KAKAP RT 05 RW 06 MANGKANG WETAN, TUGU, SEMARANG 50156', '08156593269', '', 'Pendidikan Bahasa Inggris', NULL, NULL, 'Ada', '2021-01-09 13:55:06', 0),
(99, '0613018403', 7, 19, 2, 2, 10, '0610701000001259', '', 'S.Psi., M.Psi., Psik', '3404135301840001', 'SLEMAN', '1984-01-13', 'PERUM. SALAM RESIDANCE C-50,  DERSALAM, BAE, KUDUS', '085228685464', '', 'Psikologi', NULL, NULL, 'Ada', '2021-01-09 14:49:00', 0),
(100, '0613027301', 6, 16, 3, 2, 12, '0610701000001148', '-', 'ST, MT', '3319031302730001', 'KUDUS', '1973-02-13', 'PASURUAN RT.04/RW.11 NO.2187 KECAMATAN JATI KABUPATEN KUDUS', '085740961734', '-', 'Teknik Elektro', 'Avatar_0613027301_1601098026.jpg', 1, 'Kosong', '2021-01-09 13:34:50', 0),
(101, '0613046101', 3, 5, 4, 3, 13, '0610701000001007', 'Dr.,', 'SH, M.Hum', '3319021304610005', 'KUDUS', '1961-04-13', 'JL. WAKHID HASYIM NO. 36 RT 001/002 PANJUNAN KOTA KUDUS', '08562680154', '-', 'Hukum', 'Avatar__1545102575.jpg', 1, 'Kosong', '2021-01-09 13:48:41', 0),
(102, '0613095701', 5, 13, 3, 2, 11, '0610706010401005', 'Ir,', 'MS', '3318101309570001', 'SURAKARTA', '1957-09-13', 'JL. PENJAWI 57 A PATI 59111', '08122891702', '', 'Ilmu Tanaman', 'Avatar_0613095701_1558197276.jpg', NULL, 'Ada', '2021-03-18 14:36:53', 0),
(103, '0614037104', 2, 2, 3, 3, 12, '0610702010101176', 'Dr.', 'SE., MM.', '1234567890123456', 'TEGAL', '1971-03-14', 'PERUM. MOUNTAIN VIEW RESIDENCE JL. MERAPI RAYA BLOK E NO. 3 BAE KUDUS', '08156507716', '', 'Manajemen', NULL, NULL, 'Ada', '2021-10-14 05:05:33', 0),
(104, '0614055701', 4, 9, 3, 2, 12, '', 'Drs,', 'MM', '1119021405570001', 'PATI', '1957-05-14', '', '085226137170', '', '', NULL, NULL, 'Kosong', '2021-04-06 10:16:35', 0),
(105, '0614069001', 4, 10, 2, 2, 10, '', '-', 'S.Pd., M.Pd.', '3319081406900001', 'KUDUS', '1990-06-14', 'PADURENAN RT 1 RW 5, GEBOG, KUDUS', '085290760182', '', '', 'Avatar_0614069001_1578759321.jpg', NULL, 'Ada', '2021-05-08 10:19:04', 0),
(106, '0614108502', 2, 4, 3, 2, 10, '', '', 'S.E., Ak, M.Si', '3319025410850004', 'KUDUS', '1985-10-14', 'JL. CENDANA IV NO. 71 RT 4 RW 7, TANJUNGKARANG, JATI, KUDUS', '085643122282', '', '', NULL, NULL, 'Kosong', '2021-04-06 10:10:42', 0),
(107, '0615037901', 4, 10, 2, 2, 10, '', '', 'M.Pd', '', 'DEMAK', '1979-03-15', 'DESA BATURAGUNG RT 04 RW 01 KECAMATAN GUBUG KABUPATEN GROBOGAN', '081575423912', '', '', NULL, NULL, 'Kosong', '2021-03-18 14:38:26', 0),
(108, '0615068604', 4, 11, 2, 2, 10, '0610701000001283', '', 'M.Pd', '3319015506860008', 'KUDUS', '1986-06-15', 'DUKUH JRAKAH RT 003 RW 006 DESA SIDOREKSO KECAMATAN KALIWUNGU KABUPATEN KUDUS', '081575611505', '', 'Pendidikan Bahasa Indonesia', NULL, NULL, 'Ada', '2021-01-09 14:44:50', 0),
(109, '0615076301', 2, 2, 3, 3, 12, '0610702010101026', 'Dr,Drs,', 'MM', '0131406023072009', 'JEPARA', '1963-07-15', 'RT03/RW02 SUWAWAL MLONGGO JEPARA', '0817246173', '-', 'Ekonomi', 'Avatar_0615076301_1579327548.jpg', 1, 'Kosong', '2021-01-09 14:05:47', 0),
(110, '0615097701', 4, 8, 4, 3, 13, '0610701000001155', 'Dr.', 'S.S., M.Pd.', '3374045509770004', 'JAKARTA', '1977-09-15', 'JL. EMERALD INDAH 9 SEMARANG', '081326057151', '', 'Applied Linguistics', 'Avatar_0615097701_1578451777.jpg', NULL, 'Ada', '2021-01-09 13:36:49', 0),
(111, '0615126001', 3, 6, 3, 2, 12, '', '', 'SH, MH', '', 'KUDUS', '1960-12-15', '', '081', '', '', NULL, NULL, 'Kosong', '2021-05-08 10:18:26', 0),
(112, '0615129001', 4, 10, 3, 2, 10, '0610701000001275', '', 'S.Pd, M.Pd', '3318075512900002', 'PATI', '1990-12-15', 'RACI 2/5 BATANGAN, PATI', '085641719090', '', 'Pendidikan IPA', 'Avatar_0615129001_1577949531.jpg', NULL, 'Ada', '2021-04-06 09:44:24', 0),
(113, '0616069001', 4, 9, 3, 2, 10, '', '', 'S.Pd, M.Pd.', '3319091606900005', 'KUDUS', '1990-06-16', 'DESA SOCO RT 1 RW 1 KEC. DAWE KAB. KUDUS', '082138755599', '', 'Bimbingan dan Konseling, Pendidikan Multikultural', 'Avatar_0616069001_1578714460.jpg', NULL, 'Ada', '2021-04-06 09:41:39', 0),
(114, '0616077304', 2, 2, 2, 3, 10, '', 'Dr,', 'SE, MM', '', 'YOGYAKARTA', '1973-07-16', 'JL. SINAR REMBULAN NO.149 RT.008 RW. 001 KEDUNGMUNDU SEMARANG', '08157605946', '', '', NULL, NULL, 'Ada', '2021-10-06 03:48:55', 0),
(115, '0616088502', 6, 15, 3, 2, 11, '', '', 'M.Kom', '', 'KUDUS', '1985-08-16', 'MLATI KIDUL RT 005/001 KOTA KUDUS', '08156651931', '', '', NULL, NULL, 'Kosong', '2021-03-18 14:35:52', 0),
(116, '0616098701', 4, 10, 3, 2, 11, '0610701000001255', '', 'S.Pd,M.Pd', '3321095609870001', 'DEMAK', '1987-09-16', 'KARANGANYAR 07/05 DEMAK 59582', '085640338615', '', 'Pendidikan IPA', 'Avatar_0616098701_1577508136.jpg', NULL, 'Ada', '2021-01-09 14:14:11', 0),
(117, '0616109101', 6, 15, 2, 2, 10, '', 'M.Kom', '', '', 'REMBANG', '1991-10-16', 'JL. SURGIPATI 8 TUMPANGKRASAK 3/7 JATI KUDUS', '082135627136', '', '', NULL, NULL, 'Kosong', '2021-01-09 13:29:21', 0),
(118, '0617029102', 3, 6, 2, 2, 10, '', '-', 'S.H., M.H., M.Kn.', '', 'PONTIANAK', '1991-02-17', 'DS.LAU LAU KEC. DAWE', '085740446088', '', '', NULL, NULL, 'Kosong', '2020-09-02 12:40:40', 0),
(119, '0617036602', 3, 6, 2, 2, 10, '', '', 'SH,MH', '', 'PATI', '1966-03-17', '', '0', '', '', NULL, NULL, 'Kosong', '2021-03-18 14:38:53', 0),
(120, '0617088403', 4, 10, 2, 2, 10, '0610701000001252', '', 'S.Pd.,M.Pd.', '3374041708840002', 'SEMARANG', '1984-08-17', 'SAWAH BESAR 2 NO 72 RT 03 RW 02 KALIGAWE GAYAMSARI KOTA SEMARANG', '085640251682', '', 'Pendidikan Pancasila dan Kewarganegaraan', 'Avatar_0617088403_1578704699.jpg', NULL, 'Ada', '2021-03-18 14:03:58', 0),
(121, '0618017201', 3, 5, 1, 3, 18, '', 'Dr., S.H., M.H.', '', '', 'TANJUNG PANDAN', '1972-01-18', NULL, NULL, NULL, NULL, NULL, 0, 'Kosong', '2018-11-24 20:20:13', 0),
(122, '0618019001', 4, 12, 3, 2, 10, '', '', 'S.Pd, M.Pd', '', 'KUDUS', '1990-01-18', '', '0', '', '', NULL, NULL, 'Ada', '2021-04-06 09:16:54', 0),
(123, '0618058301', 6, 17, 3, 2, 11, '', '', 'S.Kom, MT', '3319031805830003', 'KUDUS', '1983-05-18', 'PLOSO RT5 RW5 NO5, JATI KUDUS', '085640068089', '', 'SIstem Informasi', NULL, NULL, 'Ada', '2022-08-24 13:35:04', 0),
(124, '0618058602', 6, 15, 2, 2, 10, '', '', 'S.Kom., M.Kom', '', 'PATI', '1986-05-18', '', '085325255586', '', '', NULL, NULL, 'Kosong', '2021-05-08 10:20:07', 0),
(125, '0618066201', 2, 2, 3, 3, 12, '0610702010101021', 'Dr. H. ', 'Drs., MM', '3319061806620002', 'KUDUS', '1962-06-18', 'DESA JEKULO RT.01 RW.09 KEC.JEKULO KAB.KUDUS JAWA TENGAH', '081326274344', '', 'Pemasaran', 'Avatar_0618066201_1597728562.jpg', NULL, 'Kosong', '2021-03-18 14:27:34', 0),
(126, '0618098701', 6, 17, 3, 2, 10, '', '', 'S.Kom,M.Kom', '3319025809870002', 'KUDUS', '1987-09-18', 'JANGGALAN RT 03 RW 02 NO.140 KUDUS 59316', '085640626378', '', 'Sistem Informasi', 'Avatar_0618098701_1600700211.jpg', NULL, 'Ada', '2021-01-09 14:37:31', 0),
(127, '0619057201', 6, 16, 3, 3, 10, '', 'Dr.', 'ST.MT', '', 'PATI', '1972-05-19', 'MEGAWON RT/RW: 02/01 KECAMATAN JATI, KABUPATEN KUDUS', '081331475764', '', '', NULL, NULL, 'Ada', '2021-04-06 09:34:58', 0),
(128, '0619059101', 6, 15, 2, 2, 10, '', '', 'S.Kom, M.Kom', '', 'JEPARA', '1991-05-19', 'DESA TROSO, RT1/RW6 KECAMATAN PECANGAAN, KABUPATEN JEPARA', '08995504522', '', '', NULL, NULL, 'Kosong', '2021-03-18 14:10:31', 0),
(129, '0619067802', 6, 17, 3, 2, 11, '0610701000001193', '-', 'S.Kom,M.Kom', '3374131906780005', 'SEMARANG', '1978-06-19', 'MURIA RAYA II/34', '085640038409', '', 'Database Management System', NULL, NULL, 'Kosong', '2021-01-09 14:30:54', 0),
(130, '0619077501', 6, 16, 3, 2, 11, '', '', 'ST,MT', '', 'PEKALONGAN', '1975-07-19', 'PERUM MURIA INDAH, BLOK E, JLN, BROMO VI NO. 133 GONDANGMANIS, BAE, KUDUS', '08562674139', '', '', NULL, NULL, 'Kosong', '2021-03-18 14:45:38', 0),
(131, '0619097803', 4, 10, 2, 2, 10, '0610701000001257', '', 'S.Pd,M.Pd', '3374151909780001', 'SEMARANG', '1978-09-19', 'JL KI ANGKAT RT 03 RW 04 RENDENG KUDUS 59311', '085741618321', '', 'Pendidikan Seni Rupa', NULL, NULL, 'Kosong', '2021-03-18 14:51:23', 0),
(132, '0619108502', 2, 3, 2, 2, 10, '0610701000001263', '-', 'SE,MBA,AWM', '', 'KUDUS', '1985-10-19', 'JALAN KYAI TELINGSING NO. 5 KUDUS', '08562739318', '', 'Manajemen', NULL, NULL, 'Kosong', '2021-01-09 13:46:29', 0),
(133, '0619115701', 5, 13, 3, 2, 12, '', 'Ir,', 'MP', '', 'PATI', '1957-10-19', '', '081', '', '', NULL, NULL, 'Kosong', '2021-01-09 13:58:37', 0),
(134, '0619128801', 4, 10, 3, 2, 10, '0610701000001250', '', 'M.Pd', '3319025912880002', 'KUDUS', '1988-12-19', 'JL KI ANGKAT 1 RT 03 RW 04 RENDENG KUDUS', '085867499297', '', 'Pendidikan Sosial Budaya', NULL, NULL, 'Kosong', '2021-04-06 09:22:57', 0),
(135, '0620058501', 6, 15, 3, 2, 10, '', '', 'M.Kom', '', 'KUDUS', '1985-05-20', '', '0', '', '', NULL, NULL, 'Ada', '2021-03-18 14:44:58', 0),
(136, '0620058802', 3, 6, 1, 2, 18, '', '', 'S.H., M.H.', '3318042005880001', 'PATI', '1988-05-20', 'JALAN WINONG-GABUS KM 1 PATI KEBOWAN KAB. PATI', '089652508701', '', '', NULL, NULL, 'Kosong', '2021-04-06 09:54:32', 0),
(137, '0620068302', 6, 15, 3, 2, 11, '0610701000001212', '', 'S.Kom, M.Cs', '3318152006830003', 'PATI', '1983-06-20', 'JATIMULYO 4/1 WEDARIJAKSA PATI', '08122510430', '', 'Komputer', 'Avatar_0620068302_1600148486.jpg', NULL, 'Ada', '2021-01-09 14:41:09', 0),
(138, '0620117103', 2, 4, 2, 3, 10, '', 'Dr.', 'S.E., M.M', '', 'KUDUS', '1971-11-20', 'JL JAMBU IX GG BUNTU NO 3 RT 3 RW 6 JAJAR LAWEYAN SOLO', '082138865016', '', '', NULL, NULL, 'Kosong', '2021-05-08 10:11:18', 0),
(139, '0621018302', 4, 8, 2, 2, 10, '0610701000001204', '', 'S.Pd., M.Pd.', '00210119832008', 'KUDUS', '1983-01-21', 'TENGGELES RT 04/02 KEC. MEJOBO KAB. KUDUS', '082220369009', '', 'English', NULL, NULL, 'Ada', '2021-01-09 14:50:09', 0),
(140, '0621048301', 6, 17, 3, 2, 11, '0610701000001233', '', 'S.Kom, M.Kom', '3319072104830002', 'JEPARA', '1983-04-21', 'GONDANGMANIS RT 07 RW 11 BAE KUDUS', '08562664459', '', 'Teknik Informatika', 'Avatar_0621048301_1578641918.jpg', NULL, 'Ada', '2021-01-09 14:43:54', 0),
(141, '0621065901', 5, 13, 3, 2, 11, '', 'Drs,', 'M.Si', '', 'SOLO', '1959-06-22', 'PARENG PRAMBATAN LOR RT.09 RW.04 KUDUS', '0818456357', '', '', NULL, NULL, 'Ada', '2021-03-18 14:43:52', 0),
(142, '0621099001', 4, 12, 3, 2, 11, '0610701000001274', '', 'S.Pd, M.Pd', '3319076109900002', 'KUDUS', '1990-09-21', 'PANJANG RT. 01 RW. 03 BAE KUDUS', '085641521929', '', 'Pendidikan Matematika', 'Avatar_0621099001_1581566943.jpg', NULL, 'Ada', '2021-03-18 14:08:44', 0),
(143, '0621107601', 7, 19, 3, 2, 12, '', 'M.Si', '', '', 'PATI', '1976-10-21', 'JL. PANGERAN DIPONEGORO 87 B PATI', '08122829507', '', '', NULL, NULL, 'Kosong', '2021-01-09 14:13:02', 0),
(144, '0622026301', 2, 4, 3, 3, 11, '', 'Dr. Dra.', 'Akt,M.Si', '', 'KUDUS', '1963-02-22', '', '08164894606', '', '', NULL, NULL, 'Kosong', '2021-03-18 14:48:26', 0),
(145, '0622057201', 7, 19, 3, 3, 11, '0610701000001198', '-', 'S.Psi, M.Si', '3322022205720001', 'WONOSOBO', '1972-05-22', 'PEDAWANG RT 02/RW 02 NO.303 BAE KUDUS JAWA TENGAH', '08156656607', '-', '', 'Avatar__1545106232.jpg', 1, 'Kosong', '2021-03-18 14:34:52', 0),
(146, '0622059201', 4, 11, 2, 2, 10, '0610701000001312', '', 'S.Pd, M.Pd', '3320012205920002', 'JEPARA', '1992-05-22', 'KERSO KEDUNG JEPARA', '081225016277', '', 'Pengajaran BIPA', 'Avatar_0622059201_1578727186.jpg', NULL, 'Ada', '2021-01-09 13:46:54', 0),
(147, '0622067101', 6, 14, 4, 3, 13, '0610701000001136', 'Dr.', 'S.T, M.T', '3319032206710001', 'KUDUS', '1971-06-22', 'JL. PATIMURA LORAM WETAN RT 6/2  NO. 707 JATI- KUDUS', '081325524010', '-', 'Material Science and Engineering  ', 'Avatar_0622067101_1591343636.jpg', NULL, 'Ada', '2021-03-18 14:13:49', 0),
(148, '0622067301', 4, 8, 4, 3, 12, '0610701000001146', 'Dr.', 'S.S., M.Pd.', '3319012206730003', 'KUDUS', '1973-06-22', 'KUDUS', '08562692494', '', '', 'Avatar_0622067301_1578808780.jpg', NULL, 'Ada', '2021-01-09 14:11:42', 0),
(149, '0622118705', 5, 13, 2, 2, 10, '0610701000001309', '', 'S.P,M.Sc', '3320126211870006', 'JEPARA', '1987-11-22', 'JL. RAYA NALUMSARI RT 2/ RW 2 NO 46 JEPARA', '085228419783', '', 'Hama Penyakit Tanaman', 'Avatar_0622118705_1578725740.jpg', NULL, 'Ada', '2021-01-09 14:46:13', 0),
(150, '0623018201', 6, 17, 3, 2, 11, '', 'S.Kom,M.Cs', '', '', 'SEMARANG', '1982-01-23', '', '08156672762', '', '', NULL, NULL, 'Ada', '2021-01-09 13:34:02', 0),
(151, '0623038604', 4, 10, 2, 3, 10, '0610701000001251', 'Dr.', 'S.Pd., M.A.', '3319022303860002', 'KUDUS', '1986-03-23', 'PURWOSARI 1/3 KUDUS', '085290979531', '', 'Pendidikan IPS, Sosiologi, Pendidikan Dasar', NULL, NULL, 'Kosong', '2021-04-06 09:39:24', 0),
(152, '0623058601', 7, 19, 3, 2, 10, '', 'S.Psi,M.Si', '', '', 'KUDUS', '1986-05-23', '', '085640094823', '', '', NULL, NULL, 'Kosong', '2021-01-09 13:49:24', 0),
(153, '0623068301', 6, 17, 2, 2, 10, '0610701000001244', '', 'ST, M.Cs', '3320032306830001', 'JEPARA', '1983-06-23', 'DESA TELUK WETAN RT. 25/03 WELAHAN JEPARA', '082220117701', '', 'Sistem Informasi, Web Application, Mobile Application', 'Avatar_0623068301_1546057661.jpg', NULL, 'Ada', '2021-01-09 14:30:30', 0),
(154, '0623119001', 4, 10, 3, 2, 10, '0610701000001284', '', 'S.Pd, M.Pd', '3317136311900001', 'KUDUS', '1990-11-23', 'DESA SLUKE RT.01 RW.02 KECAMATN SLUKE KABUPATEN REMBANG 59272', '085727266538', '', 'Pendidikan IPA', 'Avatar_0623119001_1577508283.jpg', NULL, 'Ada', '2021-04-06 09:45:19', 0),
(155, '0624058701', 4, 12, 3, 2, 10, '', '', 'S.Pd, M.Pd', '', 'KUDUS', '1987-05-24', 'JALAN PARON NO. 470 KUDUS', '08995944990', '', '', NULL, NULL, 'Ada', '2021-04-06 09:45:55', 0),
(156, '0624068401', 4, 9, 2, 2, 10, '', 'S.Pd, M.Pd.', '', '', 'KLATEN', '1984-06-24', '', '085641773914', '', '', NULL, NULL, 'Ada', '2021-11-12 08:44:06', 0),
(157, '0624069102', 4, 10, 1, 2, 18, '', 'S.Pd,M.Pd', '', '', 'PATI', '1991-06-24', NULL, NULL, NULL, NULL, NULL, 0, 'Kosong', '2018-11-24 20:20:13', 0),
(158, '0624077201', 6, 14, 3, 2, 10, '', 'ST,MT', '', '', 'KUDUS', '1972-07-24', NULL, NULL, NULL, NULL, NULL, 0, 'Kosong', '2020-06-09 15:11:02', 0),
(159, '0625017002', 7, 19, 3, 3, 11, '0610701000001167', 'Dr. ', 'S.Psi, M.Si', '20060625017002', 'KUDUS', '1970-01-25', 'MLATINOROWITO GANG 3 NO 31 KUDUS', '08562708701', '-', 'Psikologi', 'Avatar__1545104368.jpg', 1, 'Ada', '2021-01-09 14:07:53', 0),
(160, '0625028501', 6, 15, 2, 2, 10, '', '', 'S.Kom', '', 'KUDUS', '1985-02-25', '', '0', '', '', NULL, NULL, 'Kosong', '2021-04-06 09:17:58', 0),
(161, '0625038303', 3, 6, 2, 2, 10, '', '', 'SH, M.Hum', '00250319832008', 'KULON PROGO', '1983-03-25', 'PERUM MUNA UTAMA NO.10, DERSALAM, BAE, KUDU', '081328186681', '', '', NULL, NULL, 'Kosong', '2021-04-06 09:52:29', 0),
(162, '0625056802', 6, 14, 4, 2, 13, '06107000001139', 'Ir, ', 'MT', '3319072505680001', 'MALANG', '1968-05-25', 'DS. PANJANG RT 04 RW I BAE KUDUS', '085330405909', '-', 'Teknik Mesin', 'Avatar__1545105687.jpg', 1, 'Kosong', '2021-03-18 14:12:30', 0),
(163, '0625057101', 3, 5, 1, 3, 18, '', 'Dr., S.H., M.Hum,M.K', '', '', 'KEBUMEN', '1971-05-25', NULL, NULL, NULL, NULL, NULL, 0, 'Kosong', '2018-11-24 20:20:13', 0),
(164, '0625076401', 2, 2, 4, 3, 14, '', 'Dr,Drs', 'MM', '', 'KUDUS', '1964-07-25', 'HADIPOLO RT 002/005 JEKULO', '08122937235', '', '', NULL, NULL, 'Kosong', '2021-01-09 14:20:18', 0),
(165, '0626017003', 2, 3, 2, 3, 10, '', '', 'SE, MM, Ph.D', '', 'PATI', '1970-01-26', '', '081390340320', '', '', NULL, NULL, 'Kosong', '2021-03-18 14:48:44', 0),
(166, '0626019001', 4, 10, 1, 2, 18, '', 'S.Pd, M.Pd', '', '', 'PATI', '1990-01-26', NULL, NULL, NULL, NULL, NULL, 0, 'Kosong', '2018-11-24 20:20:13', 0),
(167, '0626025901', 3, 5, 4, 3, 15, '', 'Dr, SH,MH', '', '', 'KUDUS', '1959-02-26', '', '08156505829', '', '', NULL, NULL, 'Kosong', '2021-01-09 14:21:58', 0),
(168, '0626038801', 2, 4, 2, 2, 10, '', '', 'S.E., M.Si', '3319082303880002', 'KUDUS', '1988-03-26', 'BESITO RT 07 RW 07 KECAMATAN GEBOG KABUPATEN KUDUS', '085866630690', '', 'Akuntansi', 'Avatar_0626038801_1601018160.jpg', NULL, 'Ada', '2021-01-09 14:34:28', 0),
(169, '0626078501', 3, 6, 1, 2, 18, '', 'SH,MH', '', '', 'SALATIGA', '1985-07-26', NULL, NULL, NULL, NULL, NULL, 0, 'Kosong', '2018-11-24 20:20:13', 0),
(170, '0626097102', 6, 14, 2, 2, 10, '0610701000001140', '', 'ST, MT', '', 'KUDUS', '1971-09-26', 'JATI KUDUS', '08156618518', '', 'Teknik Mesin', NULL, NULL, 'Ada', '2021-03-18 14:50:29', 0),
(171, '0627018502', 6, 17, 2, 2, 10, '0610701000001241', 'S.Kom,M.Kom', '', '3319026701850003', 'KUDUS', '1985-01-27', 'KANDANG MAS RT 03 RW I DAWE KUDUS', '085640212924', '', 'Sistem Informasi', 'Avatar_0627018502_1546059139.jpg', NULL, 'Ada', '2021-01-09 13:44:16', 0),
(172, '0627077803', 3, 6, 2, 2, 10, '', 'SH,MH', '', '', 'KUDUS', '1978-07-27', '', '088806464130', '', '', NULL, NULL, 'Kosong', '2021-03-18 14:02:00', 0),
(173, '0627098002', 7, 19, 3, 2, 11, '', '', 'S.Psi,P.Si,MA', '', 'SURAKARTA', '1980-09-27', '', '081329288331', '', '', NULL, NULL, 'Kosong', '2021-03-18 14:30:12', 0),
(174, '0628017501', 6, 17, 3, 2, 10, '', '', 'ST, M.Kom', '3319062801750002', 'KUDUS', '1975-01-28', 'JL. KYAI KIJING, RT.04 RW.01,DESA NGEMBAL KULON,KEC.JATI,KAB.KUDUS NGEMBAL KULON KAB. KUDUS', '08121543631', '', '', NULL, NULL, 'Kosong', '2021-04-06 10:03:23', 0),
(175, '0628018502', 4, 8, 2, 2, 10, '060701000001228', '', 'SS,M.Pd.', '3525086801850002', 'SURABAYA', '1985-01-28', 'JALAN PEMUDA NO 5 DEMAK', '081577404840', '', 'Pendidikan bahasa Inggris', 'Avatar_0628018502_1578895064.jpg', NULL, 'Ada', '2021-01-09 13:30:08', 0),
(176, '0628045901', 2, 2, 4, 3, 13, '0610702010101010', 'Dr', 'MS', '3319076804590001', 'YOGYAKARTA', '1959-04-28', 'JL. MAESPATI NO 7 PERUM GERBANG HARAPAN, GONDANGMANIS, BAE, KUDUS, JATENG', '08122812899', '', 'MANAJEMEN', 'Avatar_0628045901_1543380074.jpg', 1, 'Ada', '2021-10-14 04:48:50', 0),
(177, '0628048601', 4, 10, 3, 2, 10, '', '', 'S.Pd, M.Pd', '', 'DEMAK', '1986-04-28', 'DESA NGALURAN RT.01 RW.01, KECAMATAN KARANGANYAR, KABUPATEN DEMAK KODE POS 5958 NGALURAN KAB. DEMAK ', '085640508681', '', '', NULL, NULL, 'Kosong', '2021-04-06 09:40:38', 0),
(178, '0628048702', 2, 3, 3, 2, 10, '0610701000001295', '', 'SE,MM', '3320116804870007', 'JEPARA', '1987-04-28', 'JEPARA', '081224213576', '', 'Pemasaran', 'Avatar_0628048702_1601104618.jpg', NULL, 'Kosong', '2021-04-06 09:19:54', 0),
(179, '0628067601', 4, 8, 2, 3, 10, '', '', 'SS,M.Hum', '', 'SEMARANG', '1976-06-28', '', '081229928874', '', '', NULL, NULL, 'Kosong', '2021-03-18 14:30:50', 0),
(180, '0628077501', 7, 19, 3, 2, 11, '0610701000001195', '', 'S.Psi, M.Psi', '3374036807750002', 'SEMARANG', '1975-07-28', 'PERUMAHAN SALAM RESIDENCE C - 9 - KUDUS', '085325596659', '', '', 'Avatar_0628077501_1600148451.jpg', NULL, 'Kosong', '2021-03-18 14:33:20', 0),
(181, '0628096201', 3, 5, 4, 3, 15, '0610701000001014', 'Dr.', 'SH, MS', '20060628096201', 'TOROH', '1962-09-28', 'JL. KAMPUS UMK KAV. PURI ASRI GONDANGMANIS, BAE, KUDUS', '08157741986', '-', 'Ilmu Hukum', 'Avatar__1545101681.jpg', 1, 'Kosong', '2021-01-09 14:09:03', 0),
(182, '0628098002', 4, 12, 2, 2, 10, '', 'Dr.', 'S.Pd,M.Pd', '', 'REMBANG', '1980-09-28', 'PERUMAHAN SALAM INDAH RT. 03 RW. 02 NO. 63 BAE KUDUS JAWA TENGAH', '085226041210', '', '', NULL, NULL, 'Ada', '2021-03-18 14:31:29', 0),
(183, '0629077402', 6, 15, 3, 2, 11, '', 'S.Kom,M.Kom', '', '', 'KENDAL', '1974-07-29', '', '085640012585', '', '', NULL, NULL, 'Kosong', '2021-01-09 13:39:56', 0),
(184, '0629086201', 4, 7, 3, 3, 11, '', 'Dr, ', 'S.Pd, M.Pd', '', 'PETARUKAN', '1962-08-29', 'JL. WIJAYA KUSUMA NO. 41 RT 9 RW 6 PERUMAHAN CEPIRING INDAH DS. BOTOMULYO CEPIRING KENDAL', '081225229429', '', '', NULL, NULL, 'Ada', '2021-03-18 14:17:04', 0),
(185, '0629086302', 4, 9, 4, 2, 15, '', 'Drs,M.Pd Kons', '', '', 'SEMARANG', '1963-08-29', 'JL AMERTA 4/27 PERUMAHAN GERBANG HARAPAN GONDANG MANIS BAE KUDUS', '081805816608', '', '', NULL, NULL, 'Kosong', '2021-01-09 14:00:19', 0),
(186, '0629088601', 6, 16, 3, 2, 11, '0610701000001277', '', 'S.Pd, MT', '3318022908860002', 'PATI', '1986-08-29', 'SUGIHAN RT 06 RW01 KEC WINONG ', '082225271317', '', 'Teknik Elektro', NULL, NULL, 'Ada', '2021-01-10 19:36:26', 0),
(187, '0630037301', 6, 14, 2, 2, 10, '', '', 'ST. M. Eng', '', 'DEMAK', '1973-03-30', '', '0', '', '', NULL, NULL, 'Ada', '2021-03-18 14:47:14', 0),
(188, '0630047902', 3, 6, 1, 2, 18, '', '', 'SH,MH', '', 'KUDUS', '1979-04-30', '', '0', '', '', NULL, NULL, 'Kosong', '2021-03-18 14:28:05', 0),
(189, '0630088901', 4, 9, 2, 2, 10, '', '', 'S.Pd, M.Pd', '', 'KEDUNGJATI, GROBOGAN', '1989-08-30', 'PERUM SALAM INDAH, NO. 74 DERSALAM KEC. BAE KAB KUDUS JAWA ', '085729101101', '', '', NULL, NULL, 'Kosong', '2021-05-08 10:22:46', 0),
(190, '0630098401', 2, 3, 3, 2, 11, '0610701000001291', '-', 'SE, MM, AAK', '3375017009840002', 'SEMARANG', '1984-09-30', 'JL. PRAMBANAN TIMUR II/10 SEMARANG', '081229280055', '', 'Manajemen', 'Avatar_0630098401_1579332200.jpg', NULL, 'Kosong', '2021-09-29 10:25:03', 0),
(191, '0630109202', 2, 4, 2, 2, 10, '', '', 'S.E., M.Sc.', '3319037010920002', 'KUDUS', '1992-10-30', 'JALAN PANDHAWA DESA TUMPANG KRASAK RT 3 RW 6 KUDUS', '085640583839', '', 'Akuntansi Keuangan, Sistem Informasi Akuntansi', 'Avatar_0630109202_1600674672.jpg', NULL, 'Kosong', '2021-05-08 10:21:24', 0),
(192, '0631036102', 4, 8, 4, 3, 14, '0610713020001008', 'Dr. Dra.', 'M.Pd.', '3319087103610001', 'BANDUNG', '1961-03-31', 'GRIBIG KRAJAN NO. 37 RT.01/RW.02 GRIBIG GEBOG KUDUS', '087833641484', '', 'Metode Penelitian Pendidikan', 'Avatar_0631036102_1578632152.jpg', NULL, 'Ada', '2021-05-08 10:09:32', 0),
(193, '0631078402', 3, 6, 2, 2, 10, '', '', 'SH,SHI, MH', '', 'GROBOGAN', '1984-07-31', '', '08156893569', '', '', NULL, NULL, 'Kosong', '2021-01-09 14:42:23', 0),
(194, '0631088901', 6, 17, 3, 2, 11, '0610701000001234', '', 'S.Kom., M.Kom', '3319013108809000', 'KUDUS', '1989-08-31', 'PRAMBATAN KIDUL RT:01/RW:01, KECAMATAN KALIWUNGU, KABUPATEN KUDUS', '085641957468', '', 'Sistem Informasi', 'Avatar_0631088901_1545809860.jpg', NULL, 'Kosong', '2021-01-09 14:48:21', 0),
(195, '0631108401', 4, 10, 2, 2, 10, '', 'S.Pd,M.Pd', '', '', 'PATI', '1984-10-31', '', '085742932396', '', '', NULL, NULL, 'Kosong', '2021-03-18 14:09:03', 0),
(196, '0631127402', 2, 4, 2, 2, 10, '0610701000001216', 'M.Si', '', '3374033112740009', 'SEMARANG', '1974-12-31', 'PERUM SALAM RESIDENCE C 90 RT/RW 03/02 DERSALAM BAE KUDUS 59321', '081229988667', '', 'Akuntansi', NULL, NULL, 'Ada', '2021-01-09 13:50:02', 0),
(197, '0718058501', 4, 12, 3, 2, 12, '0610701000001230', '', 'S.Pd., M.Pd.', '3372021805850003', 'SURAKARTA', '1985-05-18', 'HADIPOLO RT 02 RW 02 JEKULO KUDUS', '085647033585', '', 'PENDIDIKAN MATEMATIKA', 'Avatar_0718058501_1578368556.jpg', NULL, 'Ada', '2021-03-18 14:11:49', 0),
(198, '0718098502', 4, 11, 2, 3, 10, '', 'Dr. ', 'S.Pd, M.Pd', '', 'BANJARNEGARA', '1985-09-18', 'KARANG BENER RT 06 RW 05 KEMANG KUDUS', '085740004108', '', '', NULL, NULL, 'Ada', '2021-03-18 14:21:02', 0),
(199, '0912078902', 6, 15, 3, 2, 10, '0610701000001303', '', 'S.Kom. M.Kom', '3319071207890001', 'KUDUS', '1989-07-12', 'NGEMBALREJO RT08/RW04', '081326646746', '', 'Image Processing', NULL, 1, 'Kosong', '2021-11-08 05:15:12', 1),
(200, '1008049101', 6, 18, 2, 2, 10, '0610701000001298', '', 'S.T., M.T.', '3528040804910003', 'PAMEKASAN', '1991-04-08', 'DERSALAM GANG III NO. 385 B', '081326653246', '', 'Sustainability', NULL, NULL, 'Ada', '2021-03-18 14:49:14', 0),
(201, '1018097602', 6, 18, 3, 2, 11, '0610701000001301', '', 'M.T.', '3327091809760005', 'PEMALANG', '1976-09-18', 'GONDANGMANIS, BAE, KUDUS', '08117528100', '', 'Teknik Industri', NULL, NULL, 'Ada', '2021-01-09 14:01:15', 0),
(202, '2116098601', 2, 4, 3, 2, 10, '', '', 'SE. MSi', '3318155609860001', 'PATI', '1986-09-16', 'DESA PAGERHARJO RT 2 RW 3 WEDARIJAKSA PATI', '081225460812', '', 'Akuntansi', 'Avatar_2116098601_1580785756.jpg', NULL, 'Ada', '2021-01-09 14:35:32', 0),
(203, '0609119101', 6, 18, 2, 2, 10, '', '', ' S.T, M.Sc.', '3374064911900002', 'SEMARANG', '2091-09-09', 'BANDENGAN BANDENGAN KEC. BAE', '082243304401', '', 'Teknik Industri', NULL, NULL, 'Ada', '2021-04-06 09:13:58', 0),
(204, '0607099201', 5, 13, 1, 2, 18, '-', '-', 'S.P., M.Sc', '3308104709920002', 'MAGELANG', '1992-09-07', 'PERUM. SALAM INDAH, NO 96, RT 02 RW 03, DERSALAM, KEC. BAE', '085643245224', '', '', 'Avatar_0607099201_1578725781.jpg', NULL, 'Ada', '2021-04-06 10:08:46', 0),
(205, '0614129101', 4, 10, 2, 2, 10, '', '-', 'S.Pd, M.Pd', '3404075412910003', 'PEMALANG', '1991-12-14', 'NGABLAK TANJUNGREJO KAB. KUDUS', '085700055785', '-', '-', NULL, NULL, 'Ada', '2021-04-06 09:31:38', 0),
(206, '0610058704', 2, 4, 2, 2, 10, '-', '-', 'SE, MSi', '3318105005870008', 'PATI', '1987-05-10', 'DUKUH WINONGRT2 RW7 KALIWUNGU KAB. KUDUS', '081227478095', '-', 'Akuntansi', 'Avatar_0610058704_1578974101.jpg', NULL, 'Ada', '2021-04-06 09:16:14', 0),
(207, '0627039105', 4, 10, 2, 2, 18, '-', '-', 'S.Pd, M.Pd', '3321036703910005', 'DEMAK', '1991-03-27', 'DK. KIDUL KALI GEMIRING KIDUL RT 02 RW 04 KEC. NALUMSARI KAB. JEPARA', '082135637135', '-', 'Pendidikan Guru Sekolah Dasar', 'Avatar_0627039105_1579857435.jpg', NULL, 'Ada', '2021-04-06 09:11:31', 0),
(208, '0624089301', 4, 10, 2, 2, 18, '-', '-', 'S.Pd., M.Pd.', '3319016408930001', 'KUDUS', '1993-08-24', 'DUKUH KALIWUNGU KALIWUNGU KAB. KUDUS', '081215751123', '', 'Pendidikan Guru Sekolah Dasar', NULL, NULL, 'Ada', '2021-04-06 09:32:40', 0),
(209, '0918039101', 4, 11, 3, 2, 10, '0610701000001316', '', 'S.Pd. M.Pd', '3318105803910006', 'PATI', '1991-03-18', 'DESA PAYANG, RT002/RW004, KELURAHAN PAYANG, KECAMATAN PATI', '082137263067', '', 'Pendidikan Bahasa dan Sastra Indonesia', 'Avatar_0918039101_1601899439.jpg', NULL, 'Ada', '2021-01-09 14:18:21', 0),
(210, '0627128203', 6, 16, 2, 2, 10, '0610701000001348', '-', 'ST, MT', '3319012712820001', 'KUDUS', '2098-12-27', 'DESA MIJEN RT 07 RW 01 KALIWUNGU KUDUS', '081575290016', '', 'Teknik Elektro', NULL, NULL, 'Kosong', '2021-04-06 10:01:08', 0),
(211, '0618088001', 6, 15, 3, 2, 10, '', '-', 'S.Pd.I, M.Pd', '3319025808800001', 'KUDUS', '1980-08-18', 'PURWOSARI GANESHA IV NO.109 RT4/7 KUDUS', '081914030468', '', 'Agama', NULL, NULL, 'Kosong', '2021-04-06 09:21:39', 0),
(212, '0628019501', 2, 4, 1, 2, 18, '', '', 'SE, M.Sc', '', 'JEPARA', '1995-01-28', 'SEKURO MLONGGO KAB. JEPARA', '0', '', 'Akuntansi', NULL, NULL, 'Kosong', '2021-03-18 14:19:30', 0),
(219, '0024037701', 2, 2, 2, 2, 14, '', '', 'SE.MM', '3319836484525936', 'KUDUS', '1998-08-07', 'KUDUS', '0985627224945', '', 'Ekonomi', NULL, 0, 'Kosong', '2022-10-18 09:03:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lemlit_output`
--

CREATE TABLE `lemlit_output` (
  `output_id` bigint(10) UNSIGNED NOT NULL,
  `propose_id` bigint(10) DEFAULT NULL,
  `output_ot_id` bigint(10) DEFAULT NULL,
  `output_title` varchar(250) DEFAULT NULL,
  `output_num_author` int(4) DEFAULT NULL,
  `output_name_author` varchar(250) DEFAULT NULL,
  `output_journal_name` varchar(250) DEFAULT NULL,
  `output_status` enum('Submit','Diterima','Publish') DEFAULT NULL,
  `output_date` date DEFAULT NULL,
  `output_volume` varchar(20) DEFAULT NULL,
  `output_number` varchar(20) DEFAULT NULL,
  `output_page` varchar(20) DEFAULT NULL,
  `output_issn` varchar(50) DEFAULT NULL,
  `output_publisher` varchar(200) DEFAULT NULL,
  `output_doi` varchar(200) DEFAULT NULL,
  `output_monthyear` varchar(200) DEFAULT NULL,
  `output_file_loa` varchar(200) DEFAULT NULL,
  `output_url` varchar(200) DEFAULT NULL,
  `output_file_jurnal` varchar(200) DEFAULT NULL,
  `output_input_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lemlit_output`
--

INSERT INTO `lemlit_output` (`output_id`, `propose_id`, `output_ot_id`, `output_title`, `output_num_author`, `output_name_author`, `output_journal_name`, `output_status`, `output_date`, `output_volume`, `output_number`, `output_page`, `output_issn`, `output_publisher`, `output_doi`, `output_monthyear`, `output_file_loa`, `output_url`, `output_file_jurnal`, `output_input_date`) VALUES
(2, 65, 2, 'Sistem Pembelajaran Online Sebagai Upaya Peningkatan Mutu Pembelajaran di Tengah Pandemi Covid 19', 2, 'Esti Wijayanti1, Anastasya Latubessy2', 'Bianglala Informatika', 'Submit', NULL, '', '', '', '', '', '', '', NULL, '', 'JURNAL_65_0604048702_1616036280.pdf', '2021-03-18 09:58:00'),
(3, 59, 2, 'Model Ontologi untuk Penjadwalan Kuliah di Program Studi Teknik Informatika Fakultas Teknik Universitas Muria Kudus', 4, 'Mukhamad Nurkamid, Ahmad Jazuli, Dimas Adi Nugroho, Rizal Abdullah Mahfud', 'Tansformatika', 'Submit', '2021-01-11', '', '', '', '1693-3656', '', '', '', NULL, '', 'JURNAL_59_0620068302_1616125826.pdf', '2021-03-19 10:50:26'),
(4, 25, 3, 'IMPROVING THE USER SURVEY OF UNIVERSITAS MURIA KUDUS BASED ON INFORMATION TECHNOLOGY TO MAXIMIZE THE RESULT IN SUPPORTING ACCREDITATION OF HIGHER EDUCATION INSTITUTION (AIPT) 3.0', 2, 'Muhammad Arifin, Farid Noor Romadlon', 'Prominent', 'Publish', NULL, '', '', '', '', '', '', '', 'LOA_25_0621048301_1616398626.pdf', 'https://jurnal.umk.ac.id/index.php/Pro/article/view/5401', 'JURNAL_25_0621048301_1616398626.pdf', '2021-03-22 14:37:06'),
(5, 89, 3, 'Implikasi Belajar dari Rumah bagi PAUD', 3, 'Indah lestari, eka riyana dewi, santoso', 'Gusjigang', 'Diterima', '2021-10-07', '8', '2', '15', '2503-291X', 'Jurnal Gusjigang', '', '2021', 'LOA_89_0610118701_1617734248.pdf', 'https://jurnal.umk.ac.id/index.php/gusjigang', NULL, '2021-04-07 01:37:28'),
(6, 86, 2, 'PENDIDIKAN KARAKTER DALAM PEMENTASAN DRAMA \"PELAYARAN MENUJU IBU\" KARYA RAMLI PRAPANCA SEBAGAI BAHAN AJAR PENGKAJIAN DRAMA MAHASISWA PBSI', 2, 'Luthfa Nugraheni, Mohammad Noor Ahsin', 'Educatio FKIP UNMA', 'Publish', '2020-12-02', '6', '2', '684-689', 'P-ISSN 2459-9522, E-ISSN 2548-6756', 'Jurnal Educatio FKIP UNMA', 'https://doi.org/10.31949/educatio.v6i2.730', 'Desember ', 'LOA_86_0918039101_1618814847.pdf', '', 'JURNAL_86_0918039101_1618814847.pdf', '2021-04-19 13:47:27'),
(7, 61, 3, 'ARSITEKTUR WEB SERVICE DI LEMBAGA PENDIDIKAN MAâ€™ARIF DEMAK', 3, 'Ahmad Jazuli1, Anastasya Latubessy*2, Ratih Nindyasari3', 'Indonesian Journal of Technology, Informatics and Science (IJTIS)', 'Publish', '2021-06-30', '2', '2', '67-70', '2721-4303', 'Badan Penerbit UMK', '10.24176/ijtis.v2i2.5980', 'Juni 2021', NULL, 'https://jurnal.umk.ac.id/index.php/ijtis/article/view/5980', 'JURNAL_61_0406107004_1632446061.pdf', '2021-04-20 09:31:34'),
(8, 75, 2, 'SISTEM INFORMASI AKUNTANSI PADA KINERJA USAHA KECIL MENENGAH', 2, 'Nanik Ermawari, Nurul Rizka Arumsari', 'JURNAL BISNIS DAN AKUNTANSI', 'Publish', '2021-06-01', '23', '1', '145-156 ', '1410 â€“ 9875', 'STIE TRISAKTI', 'https://doi.org/10.34208/jba.v23i1.973', '06 2021', NULL, 'http://jurnaltsm.id/index.php/JBA/article/view/973', 'JURNAL_75_2116098601_1624691593.pdf', '2021-06-26 14:13:13'),
(9, 76, 3, 'Kajian Suhu dan Lama Penyimpanan terhadap Viabilitas dan Vigor Benih Kawista (Feronia Limonia (L.) Swingle)', 3, 'Endang Dewi Murrinie, Untung Sudjianto dan Is Faizah', 'Prosiding Seminar Nasional Fakultas Pertanian UNS', 'Publish', '2021-04-28', '5', '1', '135-144', 'E-ISSN: 2615-7721', 'Fakultas Pertanian UNS', 'https://jurnal.fp.uns.ac.id/index.php/semnas/issue/current', 'April ', 'LOA_76_0607126101_1630686246.pdf', 'https://jurnal.fp.uns.ac.id/index.php/semnas/issue/current', 'JURNAL_76_0607126101_1630686246.pdf', '2021-09-03 23:24:06'),
(10, 79, 2, 'Pengaruh Profitabilitas Terhadap Harga Saham dengan Struktur Modal sebagai Variabel Intervening', 2, 'Faridhatun Faidah; Dian Wismar\'ein', 'Jurnal Bisnis dan Ekonomi', 'Publish', '2021-07-09', '28', '1', '44 - 54', '1412-3126', 'Universitas STIKUBANK', 'https://doi.org/10.35315/jbe.v28i1.8546', 'Maret 2021', 'LOA_79_0612127702_1632467016.pdf', 'https://unisbank.ac.id/ojs/index.php/fe3/article/view/8546', 'JURNAL_79_0612127702_1632467016.pdf', '2021-09-24 14:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `lemlit_output_type`
--

CREATE TABLE `lemlit_output_type` (
  `output_type_id` bigint(10) UNSIGNED NOT NULL,
  `output_type_title` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lemlit_output_type`
--

INSERT INTO `lemlit_output_type` (`output_type_id`, `output_type_title`) VALUES
(1, 'JURNAL INTERNASIONAL'),
(2, 'JURNAL NASIONAL TERAKREDITASI'),
(3, 'JURNAL NASIONAL TIDAK TERAKREDITASI'),
(4, 'PROSIDING NASIONAL'),
(5, 'PROSIDING INTERNASIONAL'),
(6, 'BUKU');

-- --------------------------------------------------------

--
-- Table structure for table `lemlit_pusat_studi`
--

CREATE TABLE `lemlit_pusat_studi` (
  `pusat_studi_id` int(2) NOT NULL,
  `pusat_studi_nama` varchar(50) NOT NULL,
  `pusat_studi_ketua` varchar(50) NOT NULL,
  `pusat_studi_nis` varchar(16) NOT NULL,
  `pusat_studi_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lemlit_pusat_studi`
--

INSERT INTO `lemlit_pusat_studi` (`pusat_studi_id`, `pusat_studi_nama`, `pusat_studi_ketua`, `pusat_studi_nis`, `pusat_studi_update`) VALUES
(1, 'GENDER', 'Dr. Sri Utaminingsih, M.Pd', '0610701000001218', '2020-02-05 14:08:24'),
(2, 'LINGKUNGAN HIDUP', 'Ir. Hadi Supriyo, MS', '1958072319870310', '2020-02-05 14:02:58'),
(3, 'SAINS DAN TEKNOLOGI', 'Dr. Solekhan, MT', '0610701000001143', '2020-02-05 14:09:08'),
(4, 'KRETEK', 'Dr. Joko Utomo, MM', '0610702010101028', '2020-02-04 13:59:31'),
(5, 'ENTREPRENEUR', 'Dr. Sukirman, S.Pd, MM', '1956090719770310', '2020-09-02 12:28:45'),
(6, 'PEMBANGUNAN DAERAH', 'Dr. Dra. Sulistyowati, SH, CN', '0610701000001268', '2020-02-04 14:01:50'),
(8, 'PANGAN', 'Ir Shodiq Eko Ariyanto M.P', '0610706010401018', '2020-09-03 11:22:21'),
(10, 'KAWASAN MURIA', 'Ir. Untung Sudjianto, MS', '0610706010401005', '2020-02-05 14:06:00'),
(11, 'BENCANA', 'Dr. M. Widjanarko, M.Si', '0610701000001167', '2020-02-05 14:08:00'),
(12, 'TENUN', 'Sri Mulyani, SE I, MSi', '0610701000001224', '2020-02-05 14:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `lit_anggota`
--

CREATE TABLE `lit_anggota` (
  `anggota_id` int(11) NOT NULL,
  `usulan_id` int(11) NOT NULL,
  `anggota_nidn` varchar(18) NOT NULL,
  `anggota_pangkat` varchar(50) NOT NULL,
  `anggota_jabatan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `anggota_experience` varchar(50) NOT NULL,
  `anggota_posisi` enum('ketua','anggota') NOT NULL,
  `anggota_isconfirm` int(1) NOT NULL,
  `anggota_jobdesk` varchar(200) NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lit_anggota_eks`
--

CREATE TABLE `lit_anggota_eks` (
  `anggota_eks_id` int(11) NOT NULL,
  `usulan_id` int(11) NOT NULL,
  `anggota_eks_kode` varchar(18) NOT NULL,
  `anggota_eks_nama` varchar(50) NOT NULL,
  `anggota_eks_posisi` enum('angggota') NOT NULL,
  `anggota_eks_jobdesk` varchar(100) NOT NULL,
  `anggota_eks_email` varchar(50) NOT NULL,
  `anggota_eks_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lit_bidang_ilmu`
--

CREATE TABLE `lit_bidang_ilmu` (
  `id_bidang` int(11) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `is_parent` int(5) NOT NULL,
  `is_delete` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lit_catatan_harian`
--

CREATE TABLE `lit_catatan_harian` (
  `catatan_id` int(11) NOT NULL,
  `usulan_id` int(11) NOT NULL,
  `catatan_tanggal` date NOT NULL,
  `catatan_uraian` text NOT NULL,
  `catatan_persentase` int(3) NOT NULL,
  `catatan_file` varchar(100) NOT NULL,
  `catatan_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lit_component_propose`
--

CREATE TABLE `lit_component_propose` (
  `component_id` int(2) NOT NULL,
  `component_name` varchar(50) NOT NULL,
  `component_indicator` text NOT NULL,
  `component_bobot` int(2) NOT NULL DEFAULT 0 COMMENT 'Bobot (%)',
  `component_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lit_component_propose`
--

INSERT INTO `lit_component_propose` (`component_id`, `component_name`, `component_indicator`, `component_bobot`, `component_update`) VALUES
(1, 'PENDAHULUAN', '<ul>\r\n	<li>Latar Belakang</li>\r\n	<li>Perumusan Masalah</li>\r\n	<li><em>Roadmap</em> (Lembaga, Peneliti)</li>\r\n</ul>\r\n', 20, '2017-09-11 23:27:02'),
(2, 'MANFAAT PENELITIAN', '<ul>\r\n <li>Penyelesaian masalah di masyarakat/ sasaran</li>\r\n <li>Pemanfaatan IPTEK dan Sumber Ajar</li>\r\n</ul>', 20, '2017-09-11 23:11:55'),
(3, 'TINJAUAN PUSTAKA', '<ul>\r\n <li>Relevansi</li>\r\n <li>Kemutakhiran</li>\r\n <li>Penyusunan Daftar Pustaka</li>\r\n</ul>', 15, '2017-09-11 23:12:54'),
(4, 'METODE PENELITIAN', '<ul>\r\n <li>Ketepatan metode yang di gunakan</li>\r\n <li>Tingkat kerumitan dan kedalaman sasaran</li>\r\n <li>Alur penelitian</li>\r\n</ul>', 15, '2017-09-11 23:13:25'),
(5, 'KELAYAKAN PENELITIAN', '<ul>\r\n <li><em>Track Record </em>penelitian</li>\r\n <li>Taat Azaz ( Menpan, 2013)</li>\r\n <li>Administrasi ( Skim, Cover, Sistimatika, dll)</li>\r\n</ul>', 10, '2017-09-11 23:14:29'),
(6, 'LUARAN HASIL PENELITIAN', '<p>Sesuai dengan yang dijanjikan (Jurnal Nasional / Internasional, Buku Ajar, Buku Teks)</p>', 20, '2017-09-11 23:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `lit_component_report`
--

CREATE TABLE `lit_component_report` (
  `component_id` int(2) NOT NULL,
  `component_name` varbinary(50) NOT NULL,
  `component_indicator` text NOT NULL,
  `component_bobot` int(10) NOT NULL DEFAULT 0,
  `component_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lit_component_report`
--

INSERT INTO `lit_component_report` (`component_id`, `component_name`, `component_indicator`, `component_bobot`, `component_update`) VALUES
(1, 0x50454e444148554c55414e, '<ul>\r\n	<li>Latar Belakang</li>\r\n	<li>Perumusan Masalah, Pertanyaan Penelitian</li>\r\n	<li>Tujuan</li>\r\n	<li><em>Roadmap</em> (Lembaga, Peneliti)</li>\r\n</ul>\r\n', 15, '2022-10-26 08:38:41'),
(2, 0x4d414e464141542050454e454c495449414e, '<ul>\r\n <li>Penyelesaian Masalah di Masyarakat/Sasaran</li>\r\n <li>Pemanfaatan IPTEK dan Sumber Ajar</li>\r\n</ul>', 15, '2020-02-06 15:35:08'),
(3, 0x54494e4a4155414e2050555354414b41, '<ul>\r\n <li>Relevansi</li>\r\n <li>Kemutakhiran</li>\r\n <li>Penyusunan Daftar Pustaka</li>\r\n</ul>', 15, '2017-09-24 15:43:43'),
(4, 0x4d45544f44452050454e454c495449414e, '<ul>\r\n <li>Ketepatan Metode yang digunakan</li>\r\n <li>Tingkat kerumitan dan kedalaman sasaran</li>\r\n <li>Alur Penelitian</li>\r\n</ul>', 15, '2017-09-24 15:44:27'),
(5, 0x4b454c4159414b414e2050454e454c495449414e, '<ul>\r\n <li><em>Track Record</em> penelitian</li>\r\n <li>Taat Azaz ( Menpan, 2013 )</li>\r\n <li>Administrasi ( Skim, Cover, Sistimatika, dll )</li>\r\n</ul>', 10, '2017-09-24 15:45:46'),
(6, 0x484153494c2044414e2050454d4241484153414e, '<ul>\r\n <li>Pembahasan Sesuai :\r\n <ol>\r\n  <li>Pendekatan yang digunakan</li>\r\n  <li>Permasalahan yang akan di selesaikan</li>\r\n </ol>\r\n </li>\r\n <li>Hasil : Menjawab Tujuan Penelitian</li>\r\n</ul>', 10, '2017-09-24 15:47:14'),
(7, 0x4c554152414e20484153494c2050454e454c495449414e, '<ul>\r\n <li>Sesuai dengan yang dijanjikan (Jurnal Nasional / International, Buku Ajar, Buku Teks)</li>\r\n</ul>', 20, '2017-09-24 15:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `lit_kelompok_makro`
--

CREATE TABLE `lit_kelompok_makro` (
  `kelompok_id` int(11) NOT NULL,
  `kelompok_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lit_laporan_kemajuan`
--

CREATE TABLE `lit_laporan_kemajuan` (
  `kemajuan_id` int(11) NOT NULL,
  `usulan_id` int(11) NOT NULL,
  `kemajuan_ringkasan` text NOT NULL,
  `kemajuan_keyword` text NOT NULL,
  `kemajuan_file` varchar(100) NOT NULL,
  `kemajuan_upate` datetime NOT NULL,
  `kemajuan_insert` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lit_laporan_penelitian`
--

CREATE TABLE `lit_laporan_penelitian` (
  `laporan_id` int(11) NOT NULL,
  `usulan_id` int(11) NOT NULL,
  `laporan_ringkasan` text NOT NULL,
  `laporan_keyword` text NOT NULL,
  `laporan_file` varchar(100) NOT NULL,
  `laporan_update` datetime NOT NULL,
  `laporan_insert` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lit_lembaga`
--

CREATE TABLE `lit_lembaga` (
  `lembaga_id` int(11) NOT NULL,
  `usulan_id` int(11) NOT NULL,
  `lembaga_nama` varchar(50) NOT NULL,
  `lembaga_jabatan` varchar(20) NOT NULL,
  `lembaga_pimpinan` varchar(50) NOT NULL,
  `lembaga_pimpinan_id` varchar(18) NOT NULL,
  `lembaga_file` varchar(100) NOT NULL,
  `lembaga_lokasi` text NOT NULL,
  `lembaga_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lit_luaran`
--

CREATE TABLE `lit_luaran` (
  `luaran_id` int(11) NOT NULL,
  `usulan_id` int(11) NOT NULL,
  `luaran_nama` varchar(100) NOT NULL,
  `luaran_tanggal` date NOT NULL,
  `luaran_link` text NOT NULL,
  `file_luaran_deskripsi` varchar(100) NOT NULL,
  `file_luaran_hasil` varchar(100) NOT NULL,
  `file_foto_pengujian` varchar(100) NOT NULL,
  `upload_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lit_periode`
--

CREATE TABLE `lit_periode` (
  `periode_id` int(2) NOT NULL,
  `periode_dari` date NOT NULL COMMENT 'Dari',
  `periode_sampai` date NOT NULL COMMENT 'Sampai',
  `periode_status` enum('Aktif','Non Aktif') NOT NULL DEFAULT 'Non Aktif' COMMENT 'Status Pengajuan',
  `periode_update` datetime NOT NULL,
  `periode_max_ketua` int(2) DEFAULT 1,
  `periode_max_anggota` int(2) DEFAULT 1,
  `periode_max_usulan` int(2) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lit_periode`
--

INSERT INTO `lit_periode` (`periode_id`, `periode_dari`, `periode_sampai`, `periode_status`, `periode_update`, `periode_max_ketua`, `periode_max_anggota`, `periode_max_usulan`) VALUES
(1, '2022-08-01', '2023-12-31', 'Aktif', '2022-10-19 14:57:02', 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lit_riset_fokus`
--

CREATE TABLE `lit_riset_fokus` (
  `riset_id` int(11) NOT NULL,
  `bidang_fokus` varchar(100) NOT NULL,
  `tema_riset` varchar(100) NOT NULL,
  `topik_riset` varchar(100) NOT NULL,
  `riset_posisi` int(11) NOT NULL COMMENT '1 u/ root 2 u/tema 3 u/ topik',
  `is_parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lit_riset_kepala`
--

CREATE TABLE `lit_riset_kepala` (
  `riset_fokus_id` int(11) NOT NULL,
  `id_riset_fokus` int(11) NOT NULL,
  `riset_fokus_nama` varchar(50) NOT NULL,
  `riset_fokus_ketua` varchar(50) NOT NULL,
  `riset_fokus_nis` varchar(16) NOT NULL,
  `riset_fokus_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lit_sbk`
--

CREATE TABLE `lit_sbk` (
  `sbk_id` int(11) NOT NULL,
  `sbk_nama` varchar(50) NOT NULL,
  `sbk_budget` int(10) NOT NULL,
  `sbk_status` enum('active','nonactive') NOT NULL,
  `sbk_anggota_min` int(2) NOT NULL,
  `sbk_anggota_max` int(2) NOT NULL,
  `sbk_anggotamhs_min` int(2) NOT NULL,
  `sbk_anggotaeks_min` int(2) NOT NULL,
  `sbk_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lit_sbk`
--

INSERT INTO `lit_sbk` (`sbk_id`, `sbk_nama`, `sbk_budget`, `sbk_status`, `sbk_anggota_min`, `sbk_anggota_max`, `sbk_anggotamhs_min`, `sbk_anggotaeks_min`, `sbk_update`) VALUES
(1, 'Dasar Fundamental', 3000000, 'active', 1, 4, 1, 1, '2022-10-27 09:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `lit_tkt`
--

CREATE TABLE `lit_tkt` (
  `id_tkt` int(11) NOT NULL,
  `sbk_id` int(2) NOT NULL,
  `tkt_level` int(1) NOT NULL,
  `min_persentase` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lit_tkt_detail`
--

CREATE TABLE `lit_tkt_detail` (
  `id_detail` int(11) NOT NULL,
  `detail_level` int(11) NOT NULL,
  `detail_pertanyaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lit_usulan`
--

CREATE TABLE `lit_usulan` (
  `id_usulan` int(11) NOT NULL,
  `nidn_pengusul` varchar(18) NOT NULL,
  `bidang_ilmu` int(3) NOT NULL,
  `kelompok_makro` int(3) NOT NULL,
  `riset_fokus` int(3) NOT NULL,
  `usulan_tema` varchar(100) NOT NULL,
  `usulan_topik` varchar(100) NOT NULL,
  `usulan_judul` varchar(200) NOT NULL,
  `status_tkt` int(2) NOT NULL,
  `tkt_target` int(2) NOT NULL,
  `skema_penelitian` int(2) NOT NULL,
  `usulan_tahun` year(4) NOT NULL,
  `id_tahun` int(2) NOT NULL,
  `usulan_biaya` int(10) NOT NULL,
  `usulan_sbk` int(2) NOT NULL,
  `usulan_total_biaya` int(10) NOT NULL,
  `usulan_unit_ajar` varchar(50) NOT NULL,
  `file_usulan` varchar(100) NOT NULL,
  `usulan_jumlah_mahasiswa` int(2) NOT NULL,
  `usulan_tgl_mulai` date NOT NULL,
  `usulan_tgl_selesai` date NOT NULL,
  `usulan_status` int(1) NOT NULL,
  `usulan_confirmed` datetime NOT NULL,
  `usulan_inserted` datetime NOT NULL,
  `usulan_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mst_jabatan`
--

CREATE TABLE `mst_jabatan` (
  `jabatan_id` int(11) NOT NULL,
  `jabatan_nama` varchar(50) NOT NULL,
  `jabatan_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mst_pangkat`
--

CREATE TABLE `mst_pangkat` (
  `pangkat_id` int(11) NOT NULL,
  `pangkat_ket` varchar(50) NOT NULL,
  `pangkat_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mst_tahun_akademik`
--

CREATE TABLE `mst_tahun_akademik` (
  `id_tahun` int(11) NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL,
  `tahun_semester` int(1) NOT NULL,
  `tahun_kode` varchar(5) NOT NULL,
  `tahun_status` enum('active','nonactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_tahun_akademik`
--

INSERT INTO `mst_tahun_akademik` (`id_tahun`, `tahun_ajaran`, `tahun_semester`, `tahun_kode`, `tahun_status`) VALUES
(1, '2022/2023', 1, '20221', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `mst_users`
--

CREATE TABLE `mst_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `user_level` enum('Admin','IT','Reviewer') NOT NULL,
  `user_sistem` int(2) NOT NULL COMMENT '1 u/ pengabdian, 2 u/penelitian',
  `user_active` enum('Active','Nonactive') NOT NULL,
  `user_join` datetime NOT NULL,
  `user_update` datetime NOT NULL,
  `user_delete` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_users`
--

INSERT INTO `mst_users` (`id_user`, `username`, `nama_user`, `password`, `user_level`, `user_sistem`, `user_active`, `user_join`, `user_update`, `user_delete`) VALUES
(1, 'admin', 'Administrator', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Admin', 1, 'Active', '2022-10-04 02:47:11', '2022-10-04 02:47:11', 0),
(2, 'adminlpm', 'Administrator', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Admin', 2, 'Active', '2022-10-04 03:51:55', '2022-10-04 03:51:55', 0),
(3, 'superadmin', 'Super Admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Admin', 0, 'Active', '2022-10-04 03:52:34', '2022-10-04 03:52:34', 0),
(4, 'bayusukma', 'bayu', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Admin', 1, 'Active', '2022-10-05 08:44:01', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ab_anggota`
--
ALTER TABLE `ab_anggota`
  ADD PRIMARY KEY (`anggota_id`);

--
-- Indexes for table `ab_anggota_eks`
--
ALTER TABLE `ab_anggota_eks`
  ADD PRIMARY KEY (`anggota_eks_id`);

--
-- Indexes for table `ab_aspek_penilaian`
--
ALTER TABLE `ab_aspek_penilaian`
  ADD PRIMARY KEY (`aspek_id`);

--
-- Indexes for table `ab_batas_minimal`
--
ALTER TABLE `ab_batas_minimal`
  ADD PRIMARY KEY (`batas_id`);

--
-- Indexes for table `ab_catatan_harian`
--
ALTER TABLE `ab_catatan_harian`
  ADD PRIMARY KEY (`catatan_id`);

--
-- Indexes for table `ab_cek_pemeriksaan`
--
ALTER TABLE `ab_cek_pemeriksaan`
  ADD PRIMARY KEY (`cekpem_id`);

--
-- Indexes for table `ab_jabatan_lpm`
--
ALTER TABLE `ab_jabatan_lpm`
  ADD PRIMARY KEY (`id_jab_lpm`);

--
-- Indexes for table `ab_laporan_kemajuan`
--
ALTER TABLE `ab_laporan_kemajuan`
  ADD PRIMARY KEY (`kemajuan_id`);

--
-- Indexes for table `ab_laporan_pengabdian`
--
ALTER TABLE `ab_laporan_pengabdian`
  ADD PRIMARY KEY (`laporan_id`);

--
-- Indexes for table `ab_lembaga`
--
ALTER TABLE `ab_lembaga`
  ADD PRIMARY KEY (`lembaga_id`);

--
-- Indexes for table `ab_luaran`
--
ALTER TABLE `ab_luaran`
  ADD PRIMARY KEY (`luaran_id`);

--
-- Indexes for table `ab_pemeriksaan`
--
ALTER TABLE `ab_pemeriksaan`
  ADD PRIMARY KEY (`pemeriksaan_id`);

--
-- Indexes for table `ab_periode`
--
ALTER TABLE `ab_periode`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `ab_reviewer`
--
ALTER TABLE `ab_reviewer`
  ADD PRIMARY KEY (`reviewer_id`);

--
-- Indexes for table `ab_review_proposal`
--
ALTER TABLE `ab_review_proposal`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `ab_skema`
--
ALTER TABLE `ab_skema`
  ADD PRIMARY KEY (`skema_id`);

--
-- Indexes for table `ab_skor_aspek`
--
ALTER TABLE `ab_skor_aspek`
  ADD PRIMARY KEY (`hasil_id`);

--
-- Indexes for table `ab_usulan`
--
ALTER TABLE `ab_usulan`
  ADD PRIMARY KEY (`usulan_id`);

--
-- Indexes for table `lemlit_education`
--
ALTER TABLE `lemlit_education`
  ADD PRIMARY KEY (`education_id`),
  ADD KEY `education_name` (`education_name`);

--
-- Indexes for table `lemlit_faculty`
--
ALTER TABLE `lemlit_faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD KEY `faculty_name` (`faculty_name`),
  ADD KEY `faculty_dean_name` (`faculty_dean_name`);

--
-- Indexes for table `lemlit_lecture`
--
ALTER TABLE `lemlit_lecture`
  ADD PRIMARY KEY (`lecture_id`,`user_username`),
  ADD KEY `user_username` (`user_username`),
  ADD KEY `sipd_lecture_ibfk_1` (`faculty_id`),
  ADD KEY `sipd_lecture_ibfk_2` (`study_program_id`),
  ADD KEY `sipd_lecture_ibfk_3` (`position_id`),
  ADD KEY `sipd_lecture_ibfk_4` (`education_id`),
  ADD KEY `pangkat_id` (`pangkat_id`);

--
-- Indexes for table `lemlit_output`
--
ALTER TABLE `lemlit_output`
  ADD PRIMARY KEY (`output_id`);

--
-- Indexes for table `lemlit_output_type`
--
ALTER TABLE `lemlit_output_type`
  ADD PRIMARY KEY (`output_type_id`);

--
-- Indexes for table `lemlit_pusat_studi`
--
ALTER TABLE `lemlit_pusat_studi`
  ADD PRIMARY KEY (`pusat_studi_id`),
  ADD KEY `lemlit_nama` (`pusat_studi_nama`);

--
-- Indexes for table `lit_anggota`
--
ALTER TABLE `lit_anggota`
  ADD PRIMARY KEY (`anggota_id`);

--
-- Indexes for table `lit_anggota_eks`
--
ALTER TABLE `lit_anggota_eks`
  ADD PRIMARY KEY (`anggota_eks_id`);

--
-- Indexes for table `lit_bidang_ilmu`
--
ALTER TABLE `lit_bidang_ilmu`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `lit_catatan_harian`
--
ALTER TABLE `lit_catatan_harian`
  ADD PRIMARY KEY (`catatan_id`);

--
-- Indexes for table `lit_component_propose`
--
ALTER TABLE `lit_component_propose`
  ADD PRIMARY KEY (`component_id`),
  ADD KEY `component_name` (`component_name`);

--
-- Indexes for table `lit_component_report`
--
ALTER TABLE `lit_component_report`
  ADD PRIMARY KEY (`component_id`);

--
-- Indexes for table `lit_kelompok_makro`
--
ALTER TABLE `lit_kelompok_makro`
  ADD PRIMARY KEY (`kelompok_id`);

--
-- Indexes for table `lit_laporan_kemajuan`
--
ALTER TABLE `lit_laporan_kemajuan`
  ADD PRIMARY KEY (`kemajuan_id`);

--
-- Indexes for table `lit_laporan_penelitian`
--
ALTER TABLE `lit_laporan_penelitian`
  ADD PRIMARY KEY (`laporan_id`);

--
-- Indexes for table `lit_lembaga`
--
ALTER TABLE `lit_lembaga`
  ADD PRIMARY KEY (`lembaga_id`);

--
-- Indexes for table `lit_luaran`
--
ALTER TABLE `lit_luaran`
  ADD PRIMARY KEY (`luaran_id`);

--
-- Indexes for table `lit_periode`
--
ALTER TABLE `lit_periode`
  ADD PRIMARY KEY (`periode_id`);

--
-- Indexes for table `lit_riset_fokus`
--
ALTER TABLE `lit_riset_fokus`
  ADD PRIMARY KEY (`riset_id`);

--
-- Indexes for table `lit_riset_kepala`
--
ALTER TABLE `lit_riset_kepala`
  ADD PRIMARY KEY (`riset_fokus_id`);

--
-- Indexes for table `lit_sbk`
--
ALTER TABLE `lit_sbk`
  ADD PRIMARY KEY (`sbk_id`);

--
-- Indexes for table `lit_tkt`
--
ALTER TABLE `lit_tkt`
  ADD PRIMARY KEY (`id_tkt`);

--
-- Indexes for table `lit_tkt_detail`
--
ALTER TABLE `lit_tkt_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `lit_usulan`
--
ALTER TABLE `lit_usulan`
  ADD PRIMARY KEY (`id_usulan`);

--
-- Indexes for table `mst_jabatan`
--
ALTER TABLE `mst_jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `mst_pangkat`
--
ALTER TABLE `mst_pangkat`
  ADD PRIMARY KEY (`pangkat_id`);

--
-- Indexes for table `mst_tahun_akademik`
--
ALTER TABLE `mst_tahun_akademik`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `mst_users`
--
ALTER TABLE `mst_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ab_anggota`
--
ALTER TABLE `ab_anggota`
  MODIFY `anggota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ab_anggota_eks`
--
ALTER TABLE `ab_anggota_eks`
  MODIFY `anggota_eks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ab_aspek_penilaian`
--
ALTER TABLE `ab_aspek_penilaian`
  MODIFY `aspek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ab_batas_minimal`
--
ALTER TABLE `ab_batas_minimal`
  MODIFY `batas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ab_catatan_harian`
--
ALTER TABLE `ab_catatan_harian`
  MODIFY `catatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ab_cek_pemeriksaan`
--
ALTER TABLE `ab_cek_pemeriksaan`
  MODIFY `cekpem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `ab_jabatan_lpm`
--
ALTER TABLE `ab_jabatan_lpm`
  MODIFY `id_jab_lpm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ab_laporan_kemajuan`
--
ALTER TABLE `ab_laporan_kemajuan`
  MODIFY `kemajuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ab_laporan_pengabdian`
--
ALTER TABLE `ab_laporan_pengabdian`
  MODIFY `laporan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ab_lembaga`
--
ALTER TABLE `ab_lembaga`
  MODIFY `lembaga_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ab_luaran`
--
ALTER TABLE `ab_luaran`
  MODIFY `luaran_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ab_pemeriksaan`
--
ALTER TABLE `ab_pemeriksaan`
  MODIFY `pemeriksaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ab_periode`
--
ALTER TABLE `ab_periode`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ab_reviewer`
--
ALTER TABLE `ab_reviewer`
  MODIFY `reviewer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `ab_review_proposal`
--
ALTER TABLE `ab_review_proposal`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ab_skema`
--
ALTER TABLE `ab_skema`
  MODIFY `skema_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ab_skor_aspek`
--
ALTER TABLE `ab_skor_aspek`
  MODIFY `hasil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `ab_usulan`
--
ALTER TABLE `ab_usulan`
  MODIFY `usulan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lemlit_education`
--
ALTER TABLE `lemlit_education`
  MODIFY `education_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lemlit_faculty`
--
ALTER TABLE `lemlit_faculty`
  MODIFY `faculty_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lemlit_lecture`
--
ALTER TABLE `lemlit_lecture`
  MODIFY `lecture_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `lemlit_output`
--
ALTER TABLE `lemlit_output`
  MODIFY `output_id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lemlit_output_type`
--
ALTER TABLE `lemlit_output_type`
  MODIFY `output_type_id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lemlit_pusat_studi`
--
ALTER TABLE `lemlit_pusat_studi`
  MODIFY `pusat_studi_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lit_anggota`
--
ALTER TABLE `lit_anggota`
  MODIFY `anggota_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lit_anggota_eks`
--
ALTER TABLE `lit_anggota_eks`
  MODIFY `anggota_eks_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lit_bidang_ilmu`
--
ALTER TABLE `lit_bidang_ilmu`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lit_catatan_harian`
--
ALTER TABLE `lit_catatan_harian`
  MODIFY `catatan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lit_component_propose`
--
ALTER TABLE `lit_component_propose`
  MODIFY `component_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lit_component_report`
--
ALTER TABLE `lit_component_report`
  MODIFY `component_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lit_kelompok_makro`
--
ALTER TABLE `lit_kelompok_makro`
  MODIFY `kelompok_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lit_laporan_kemajuan`
--
ALTER TABLE `lit_laporan_kemajuan`
  MODIFY `kemajuan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lit_laporan_penelitian`
--
ALTER TABLE `lit_laporan_penelitian`
  MODIFY `laporan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lit_lembaga`
--
ALTER TABLE `lit_lembaga`
  MODIFY `lembaga_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lit_luaran`
--
ALTER TABLE `lit_luaran`
  MODIFY `luaran_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lit_periode`
--
ALTER TABLE `lit_periode`
  MODIFY `periode_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lit_riset_fokus`
--
ALTER TABLE `lit_riset_fokus`
  MODIFY `riset_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lit_riset_kepala`
--
ALTER TABLE `lit_riset_kepala`
  MODIFY `riset_fokus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lit_sbk`
--
ALTER TABLE `lit_sbk`
  MODIFY `sbk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lit_tkt`
--
ALTER TABLE `lit_tkt`
  MODIFY `id_tkt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lit_tkt_detail`
--
ALTER TABLE `lit_tkt_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lit_usulan`
--
ALTER TABLE `lit_usulan`
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_jabatan`
--
ALTER TABLE `mst_jabatan`
  MODIFY `jabatan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_pangkat`
--
ALTER TABLE `mst_pangkat`
  MODIFY `pangkat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_tahun_akademik`
--
ALTER TABLE `mst_tahun_akademik`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mst_users`
--
ALTER TABLE `mst_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
