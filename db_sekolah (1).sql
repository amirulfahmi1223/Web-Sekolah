-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Mar 2023 pada 14.28
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `foto`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, 'galeri1678971412.jpg', 'Aktifitas Pelayanan Tata Usaha', '2023-03-16 12:56:52', NULL),
(5, 'galeri1678971765.jpg', 'Workshop 2018', '2023-03-16 12:57:57', '2023-03-16 20:03:34'),
(6, 'galeri1678971507.jpg', 'Kegiatan Bazar', '2023-03-16 12:58:27', NULL),
(7, 'galeri1678971549.jpg', 'Pentas Seni 2018', '2023-03-16 12:59:09', NULL),
(8, 'galeri1678971576.jfif', 'Sosialisasi Pkl', '2023-03-16 12:59:36', NULL),
(9, 'galeri1678971615.jpeg', 'Santunan Anak Yatim & Piatu', '2023-03-16 13:00:15', NULL),
(10, 'galeri1678971650.jpeg', 'Pelaksanaan Ujian Berbasis CBT', '2023-03-16 13:00:50', NULL),
(11, 'galeri1679317120.jpeg', 'Kegiatan Sosialisasi Campus', '2023-03-20 12:58:40', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`id`, `judul`, `keterangan`, `gambar`, `created_at`, `updated_at`, `created_by`) VALUES
(2, 'Sosialiasi Kepolisian', '<p style=\"line-height: 1.5;\">\"Kami mendatangi sekolah-sekolah untuk mengimbau para pelajar,\" kata Kapolsek Johar Baru, Kompol Ari Susanto, Jumat (11/11/2022). Menurut dia, para guru juga ikut mendampingi saat polisi mengadakan sosialisasi.</p>\r\n<p style=\"line-height: 1.5;\">Kapolsek mengatakan aksi tawuran antar remaja tersebut sangat meresahkan warga. Untuk itu,&nbsp;pihak kepolisian melakukan patroli rutin pada jam pulang sekolah dan malam hari demi menjaga keamanan masyarakat.</p>\r\n<p style=\"line-height: 1.5;\">\"Masyarakat perlu melaporkan kepada pihak berwajib jika terjadi tawuran pelajar,\" ucapnya. Apalagi jika merasa mereka telah mengganggu ketertiban dan keamanan.</p>\r\n<p style=\"line-height: 1.5;\">Meski begitu, Ari mengakui bahwa jumlah kasus tawuran antar remaja dan warga di wilayahnya turun cukup signifikan. Terlebih menjelang akhir tahun 2022 di mana hanya terjadi tiga kali tawuran.</p>\r\n<p style=\"line-height: 1.5;\">Menurut Kapolsek, pihaknya selalu berupaya merespons secara cepat.&nbsp;\"Ketika ada letupan, kami langsung menerjunkan petugas dan mengamankan para pelaku tawuran,\" ujarnya.&nbsp;</p>', 'informasi1677371912.jpg', '2023-02-26 00:38:32', '2023-03-16 21:17:18', 2),
(3, 'Santunan Siswa Yatim & Piatu', '<p style=\"line-height: 1.5;\">Memberikan santunan kepada anak yatim menjadi salah satu tindakan yang banyak dipilih sebagian orang. Untuk menyalurkan harta kekayaannya di jalan Allah SWT, yaitu dengan mendatangi panti asuhan, memberikan bingkisan, dan memberikan sejumlah uang.</p>\r\n<p style=\"line-height: 1.5;\">Merupakan cara yang umumnya dilakukan kebanyakan orang untuk mewujudkan hajat atau keinginannya, dengan meminta didoakan oleh anak yatim.</p>\r\n<p style=\"line-height: 1.5;\">Namun, pernahkah kita berpikir apakah pengertian&nbsp;santunan anak yatim&nbsp;sebenarnya dan bagaimana cara yang tepat melakukannya?</p>\r\n<p style=\"line-height: 1.5;\">Di dalam ajaran agama Islam, menyantuni anak yatim mempunyai arti mengemban atau menanggung seluruh tanggung jawab ayah dari anak tersebut.</p>\r\n<p style=\"line-height: 1.5;\">Jadi, dalam memberikan santunan tidak hanya dilakukan sekali, tapi harus menjadi rutinitas dan bagian dari kehidupan sehari-hari.</p>\r\n<p style=\"line-height: 1.5;\">Pengertian tersebut bukan tanpa alasan, karena sesungguhnya kebutuhan anak yatim tentu saja sama seperti kebutuhan anak-anak lainnya.&nbsp;</p>\r\n<p style=\"line-height: 1.5;\">Secara materi, anak yatim juga memiliki hak mendapatkan kebutuhan pangan, sandang, papan, dan pendidikan yang layak seperti anak-anak pada umumnya.</p>\r\n<p style=\"line-height: 1.5;\">Sedangkan secara psikis, anak yatim juga memiliki hak yang sama untuk disayangi, diberi kasih sayang, dan digantikan peran ayahnya.</p>\r\n<p style=\"line-height: 1.5;\">Maka dari itu,&nbsp;santunan anak yatim&nbsp;yang baik dan tepat yaitu dengan menyantuninya hingga ia dewasa.</p>\r\n<p style=\"line-height: 1.5;\">Tindak tersebut baiknya dilakukan dengan rasa ikhlas dan tanpa paksaan, murni dari hati yang terdalam.</p>\r\n<p style=\"line-height: 1.5;\">Meskipun begitu, manusia memiliki batasan dalam menjalankannya sehingga bagi orang-orang yang belum mampu menyantuni seluruh kebutuhan anak yatim hingga dewasa.</p>\r\n<p style=\"line-height: 1.5;\">Kita bisa memilih jenis santunan yang akan diberikan, misalnya ingin menyantuni kebutuhan pangan mereka, maka kita harus memberi mereka makanan setiap hari selayaknya memberi makan anak sendiri.</p>', 'informasi1678858215.jpeg', '2023-03-15 05:30:15', '2023-03-16 21:14:56', 2),
(4, 'Kegiatan UTBK', '<p style=\"line-height: 1.5;\">Jadwal UTBK SNBT 2023 Setelah mengetahui perbedaan materi tes dalam SNBT 2023,</p>\r\n<p style=\"line-height: 1.5;\">siswa juga perlu mengingat jadwal pelaksanaan SNBT 2023:</p>\r\n<p style=\"line-height: 1.5;\"><span style=\"font-size: 12pt;\">1. Registrasi Akun SNPMB-BPPP: 16 Februari &ndash; 3 Maret 2023.</span></p>\r\n<p style=\"line-height: 1.5;\"><span style=\"font-size: 12pt;\">2. Pendaftaran UTBK-SNBT: 23 Maret - 14 April 2023.</span></p>\r\n<p style=\"line-height: 1.5;\"><span style=\"font-size: 12pt;\">3. Pelaksanaan UTBK-SNBT Gelombang 1: 8-14 Mei 2023.&nbsp;</span></p>\r\n<p style=\"line-height: 1.5;\"><span style=\"font-size: 12pt;\">4. Pelaksanaan UTBK-SNBT Gelombang 2: 22-28 Mei 2023.</span></p>\r\n<p style=\"line-height: 1.5;\"><span style=\"font-size: 12pt;\">5. Pengumuman hasil SNBT: 20 Juni 2023.</span></p>\r\n<p style=\"line-height: 1.5;\"><span style=\"font-size: 12pt;\">6. Masa Unduh Sertifikat UTBK: 26 Juni - 31 Juli 2023.</span></p>', 'informasi1678858587.jpeg', '2023-03-15 05:36:27', '2023-03-16 21:36:02', 2),
(6, 'Kunjungan Industri', '<p style=\"line-height: 1.5;\"><strong>Kunjungan Industri</strong>&nbsp;( KI ) adalah merupakan salah satu jenis kegiatan pembelajaran diluar lingkungan sekolah untuk menambah wawasan siswa dan serta untuk melihat langsung bagaimana suasana/kondisi&nbsp;<strong>industri</strong>&nbsp;yang sesuai dengan program keahlian masing-masing.</p>\r\n<p style=\"line-height: 1.5;\"><br><strong>Latar belakang pelaksanaan kunjungan industri.</strong></p>\r\n<ol>\r\n<li style=\"list-style-type: none;\">\r\n<ol>\r\n<li>Mengikuti kepala kemajuan teknologi yang berkembang diperusahaan / industri yang demikian pesat, sehingga siswa tidak tertinggal dan buta teknologi terkini (canggih)yang sudah diterapkan pada perusahaan / industri nasional / internasional.</li>\r\n<li>Menghadapi era globalisasi yang menuntut siswa memiliki SDM yang berkualitas, serta memiliki kemampuan (Skill) Dan kemampuan untuk menjadi tenaga kerja yang professional.</li>\r\n</ol>\r\n</li>\r\n</ol>\r\n<p>&nbsp;</p>\r\n<p style=\"line-height: 1.5;\"><strong>Manfaat</strong><strong>&nbsp;kunjungan Industri</strong><strong>.</strong></p>\r\n<ol>\r\n<li style=\"list-style-type: none;\">\r\n<ol>\r\n<li style=\"line-height: 1.5;\">Menumbuhkan rasa percaya diri dan dorongan semangat dalam melaksanakan proses belajar mengajar (PBM) disekolah.</li>\r\n<li style=\"line-height: 1.5;\">Memberikan pengalaman langsung kepada siswa tentang dunia kerja yang sebenarnya pada lingkungan dunia industri.</li>\r\n<li style=\"line-height: 1.5;\">Memberikan informasi tentang &nbsp;ketenaga kerjaan yang akan bermanfaat pada saat setelah siswa dinyatakan lulus dari satuan pendidikan .</li>\r\n</ol>\r\n</li>\r\n</ol>', 'informasi1678862932.jpg', '2023-03-15 06:48:52', '2023-03-16 21:12:14', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama`, `keterangan`, `gambar`, `created_at`, `updated_at`) VALUES
(2, 'TEKNIK PENGELASAN', 'Jurusan Las', 'jurusan1677310354.jpeg', '2023-02-25 07:32:34', NULL),
(3, 'GEOLOGI PERTAMBANGAN', 'Sekolah dengan 4 tahun', 'jurusan1677311205.jpeg', '2023-02-25 07:46:45', NULL),
(4, 'REKAYASA PERANGKAT LUNAK', 'Teknolgi Informasi', 'jurusan1677311239.jpg', '2023-02-25 07:47:19', NULL),
(5, 'TATA BOGA', 'jurusan Masak', 'jurusan1677311314.jpeg', '2023-02-25 07:48:34', NULL),
(6, 'AGROBISNIS TERNAK RUMINANSIA', 'Peternakan', 'jurusan1677311351.jpeg', '2023-02-25 07:49:11', NULL),
(7, 'AKOMODASI PERHOTELAN', 'Keuangan & Perhotelan', 'jurusan1677325162.jpeg', '2023-02-25 07:50:00', '2023-02-25 18:39:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `logo` varchar(50) NOT NULL,
  `favicon` varchar(50) NOT NULL,
  `tentang_sekolah` text NOT NULL,
  `foto_sekolah` varchar(50) NOT NULL,
  `google_maps` text NOT NULL,
  `nama_kepsek` varchar(50) NOT NULL,
  `foto_kepsek` varchar(50) NOT NULL,
  `sambutan_kepsek` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama`, `email`, `telepon`, `alamat`, `logo`, `favicon`, `tentang_sekolah`, `foto_sekolah`, `google_maps`, `nama_kepsek`, `foto_kepsek`, `sambutan_kepsek`, `created_at`, `updated_at`) VALUES
(1, 'SMKN 4 BOJONEGORO', 'smkn4bojonegoro@yahoo.co.id', '(0353) 892418', 'Jalan Raya Surabaya, Sukowati, Kapas, Bojonegoro, Jawa Timur 62181', 'logo-sekolah.png', 'favicon-sekolah.png', '<p style=\"line-height: 2;\"><span style=\"font-size: 14pt;\"><strong>TENTANG</strong></span></p>\r\n<p style=\"text-align: center; line-height: 1.5;\">Sekolah adalah lembaga untuk para siswa mendapat pengajaran di bawah pengawasan guru. Sebagian besar negara memiliki sistem pendidikan formal yang umumnya wajib. Dalam sistem ini, siswa mengalami kemajuan melalui serangkaian kegiatan belajar mengajar di sekolah.</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p style=\"line-height: 2;\"><span style=\"font-size: 14pt;\"><strong>Visi Misi</strong></span></p>\r\n<p style=\"line-height: 1.5;\">\"Menghasilkan SDM memiliki IMTAQ luhur dan menguasai bidang teknologi yang mampu berkompetisi di era pasar bebas\"</p>\r\n<p style=\"line-height: 1.5;\">1. Membekali siswa menjadi manusia bertaqwa dan berbudi luhur yang tinggi.</p>\r\n<p style=\"line-height: 1.5;\">2. Membekali siswa dengan ilmu dan ketrampilan sesuai program keahliannya.</p>\r\n<p style=\"line-height: 1.5;\">3. Membekali siswa untuk memiliki jiwa kewirausahaan yang handal.</p>\r\n<p style=\"line-height: 1.5;\">4. Membekali siswa menjadi manusia yang disiplin dalam semua lini kehidupan.</p>', 'foto-sekolah.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d426130.1227644227!2d111.68470394395129!3d-7.121494988392474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e777e24f05231f1%3A0x3027a76e352be80!2sKabupaten%20Bojonegoro%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1678975470966!5m2!1sid!2sid', 'Drs. Daniel Soekarno S.Kom', 'foto-kepsek.jpg', '<p style=\"line-height: 1.5;\"><span style=\"font-size: 14pt;\">Puji syukur kepada Alloh SWT, Tuhan Yang Maha Esa yang telah memberikan rahmat dan anugerahNya sehingga website SMK Negeri 4 Bojonegoro ini dapat terbit. Salah satu tujuan dari website ini adalah untuk menjawab akan setiap kebutuhan informasi dengan memanfaatkan sarana teknologi informasi yang ada. Kami sadar sepenuhnya dalam rangka memajukan pendidikan di era berkembangnya Teknologi Informasi yang begitu pesat, sangat diperlukan berbagai sarana prasarana yang kondusif, kebutuhan berbagai informasi siswa, guru, orangtua maupun masyarakat, sehingga kami berusaha mewujudkan hal tersebut semaksimal mungkin. Semoga dengan adanya website ini dapat membantu dan bermanfaat, terutama informasi yang berhubungan dengan pendidikan, ilmu pengetahuan dan informasi seputar SMK Negeri 4 Bojonegoro. Besar harapan kami, sarana ini dapat memberi manfaat bagi semua pihak yang ada dilingkup pendidikan dan pemerhati pendidikan secara khusus bagi SMK Negeri 4 Bojonegoro. Akhirnya kami mengharapkan masukan dari berbagai pihak untuk website ini agar kami terus belajar dan meng-update diri, sehingga tampilan, isi dan mutu website akan terus berkembang dan lebih baik nantinya. Terima kasih atas kerjasamanya, maju terus untuk mencapai SMK Negeri 4 Bojonegoro yang lebih baik lagi.</span></p>', '2023-03-15 00:04:52', '2023-03-16 21:28:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('Super Admin','Admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Amirul', 'amirul', '202cb962ac59075b964b07152d234b70', 'Super Admin', '2022-06-27 06:35:26', '2023-02-25 10:40:17'),
(2, 'Fahmi', 'fahmi', '202cb962ac59075b964b07152d234b70', 'Admin', '2022-06-27 06:35:26', '2023-02-25 16:33:17'),
(8, 'NADIA MILIANA', 'agies', 'e10adc3949ba59abbe56e057f20f883e', 'Super Admin', '2023-02-24 14:57:46', '2023-02-25 18:50:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `judul` varchar(80) NOT NULL,
  `link` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `video`
--

INSERT INTO `video` (`id`, `judul`, `link`, `created_at`, `updated_at`) VALUES
(2, 'VedVoice Podcast', 'https://www.youtube.com/embed/lIEHmbCUlas\r\n', '2023-03-20 13:24:53', '2023-03-20 19:51:17'),
(3, 'Profil 6 Jurusan SMKN 4', 'https://www.youtube.com/embed/-MAmbPX_rUM', '2023-03-20 13:24:53', '2023-03-20 20:10:01'),
(6, 'Profil Singkat Jurusan', 'https://www.youtube.com/embed/GWW0aTodWBk', '2023-03-20 13:24:53', NULL),
(7, 'Profil Jurusan RPL', 'https://www.youtube.com/embed/vdwGVuOW5vc', '2023-03-20 13:24:53', NULL),
(8, 'UJIAN PRAKTEK SENI BUDAYA', 'https://www.youtube.com/embed/KfzwlO4Zwd0', '2023-03-20 13:24:53', NULL),
(9, 'SENAM BERSAMA', 'https://www.youtube.com/embed/CD_4QP06jWE\r\n', '2023-03-20 13:24:53', NULL),
(10, 'CAROL OF THE BELLS', 'https://www.youtube.com/embed/KegHb3YqB_g\r\n', '2023-03-20 13:24:53', NULL),
(11, 'Polisi Goes To School SMKN 4', 'https://www.youtube.com/embed/JRZ-5TVH5DU', '2023-03-20 13:24:53', '2023-03-20 20:20:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
