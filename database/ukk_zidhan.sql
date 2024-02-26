-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Feb 2024 pada 15.39
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_zidhan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `cover` varchar(255) NOT NULL,
  `id_buku` varchar(25) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `thn_terbit` date NOT NULL,
  `jml_halaman` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `isi_buku` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`cover`, `id_buku`, `kategori`, `judul`, `pengarang`, `penerbit`, `thn_terbit`, `jml_halaman`, `deskripsi`, `isi_buku`) VALUES
('65d741ce4fcc1.jpg', 'KB0001', 'Novel', 'Sejarah Dunia Yang di Sembunyikan', 'Jonathan Black', 'Gramedia Pustaka Utama', '2015-05-14', 636, 'Buku Sejarah Dunia Yang Disembunyikan yang ditulis oleh Jonathan Black merupakan buku yang mengungkapkan tentang keraguan dan kepercayaan kita akan sejarah mitologi Yunani dan Mesir Kuno serta cerita rakyat Yahudi yang tidak dapat kita lihat langsung kebenarannya. Buku ini ditulis dengan tujuan memberitahu pembaca tentang fakta dasar sejarah yang berbeda dari yang kita tahu. Pembaca akan mendapatkan pengetahuan baru dan lebih tercerahkan akan wawasan sejarah dunia.', 'Sejarah Dunia yang Disembunyikan (Jonathan Black).pdf'),
('65da1a615d592.jpg', 'KB0002', 'Novel', 'Berani Tidak Disukai', 'Ichiro Kishimi dan Fumitake Koga', 'Gramedia Pustaka Utama', '2019-10-07', 350, 'Berani Tidak Disukai memiliki judul asli &quot;The Courage to be Disliked: How to Free Yourself, Change Your Life and Achieve Real Happiness&quot;. Buku karangan Ichiro kishimi dan Fumitake Koga ini telah terjual sebanyak lebih dari 3,5 juta eksemplar. Buku ini laris di pasaran hingga diterjemahkan ke dalam berbagai bahasa, salah satunya bahasa Indonesia. Berani Tidak Disukai merupakan buku yang berisikan dialog antara seorang filsuf dengan seorang pemuda. Dialog yang dilakukan selama lima malam ini, berisi percakapan dari seorang pemuda yang tidak puas dengan kehidupannya dan seorang filsuf yang mengajarkannya tentang bagaimana cara mendapatkan kebahagiaan di dunia. Dialog-dialog tersebut dibingkai menjadi lima percakapan yang tiap percakapannya memuat satu inti menarik tentang hidup.\r\n\r\nDalam buku ini, pembaca akan merasakan bahwa seluruh rangkaian kata yang ada di dalam-nya seperti sebuah kutipan. Hampir semuanya berisikan makna indah dan membuat pembaca berpikir tentang bagaimana cara untuk berubah menjadi lebih baik. Berani Tidak Disukai membantu para pembaca untuk menggali kekuatan di dalam dirinya sebagai bekal meraih kebahagiaan yang diinginkan. Ada banyak hal baru yang akan membuat pembaca sadar bahwa beberapa hal seharusnya tidak dilakukan saat ini karena hal tersebut bisa saja menghambat kebahagiaan pada masa depan.\r\n\r\nSalah satu contohnya adalah mengenang trauma masa lalu dan menjadikan kehidupan orang lain sebagai standar kebahagiaan. Setelah membaca buku ini, pikiran pembaca menjadi semakin terbuka pada langkah baru untuk mengubah hidup menjadi lebih baik lewat tindakan berani untuk tidak disukai oleh orang lain. Bagian menarik dari buku ini ialah ketika seorang filsuf berbicara menurut pandangannya tanpa berusaha menggurui si pemuda. Namun, pandangan dari sang filsuf tersebut justru dapat menjadi pembelajaran bagi pembaca.', 'Berani Tidak Disukai (Ichiro Kishimi, Fumitake Koga) .pdf'),
('65da1aaa92d34.jpg', 'KB0003', 'Komik', 'si Juki : Strip', 'Faza Meonk', 'Gramedia', '2014-10-12', 164, 'Si Juki adalah komik Webtoon Indonesia pertama yang diterbitkan dalam format cetak karya anak bangsa Faza Ibnu Ubaidillah atau yang akrab disapa Faza Meonk.\r\n\r\nBuku ini merupakan komik yang mengisahkan perjalanan berkarya komikus dan Juki sebagai tokoh utama komiknya dari tahun 2012 hingga 2014. Dalam membuat komik, Faza Meonk sebagai komikus mengambil ide cerita dari isu-isu yang hangat dibicarakan atau bahasa gaulnya ngetrend. Ia tak hanya ingin membuat komik untuk tujuan lucu-lucuan, tapi juga ingin menyampaikan pesan untuk anak muda mengenai isu-isu sosial dengan gaya sarkasme yang ringan tak seberat isu politik.\r\n\r\nJuki, karakter komik yang mengaku anti mainstream dan merasa ngetop, memulai karirnya dari ‘bawah’. Awalnya, dia sekadar tampil sebagai cameo di komik-komik online karya Faza Meonk. Namun, karakternya yang lucu, ngeselin, cuek, dan banyak hoki itu membuat Juki semakin dikenal dan disukai pembacanya.\r\n\r\nDalam komik ini terangkum perjalanan si juki sang aktor komik. Mulai dari digambar asal-asalan dan tidak bernama, kritik kocak dan kritisnya pada sekitar, memenangi penghargaan, sampai nekat mencalonkan diri menjadi presiden.\r\n\r\nYuk, ikuti dan tertawa bersama rekaman perjalanan Juki. Huwala!', 'Si Juki Komik Strip (Faza Meonk) .pdf'),
('65da1b610a98e.jpg', 'KB0004', 'Dongeng', 'Timun Emas', 'Dede Firmansyah', 'Happy Holy Kidsa', '2014-05-30', 30, 'CERITA TIMUN MAS INI MENGAJARKAN KEPADA ANAK-ANAK TENTANG DUA HAL: PERTAMA, SEKALIPUN TANTANGAN YANG BESAR MENGHADANG, JANGAN PUTUS ASA DAN MENYERAH. KEDUA, KALAU PUNYA KUASA DAN KEKUATAN JANGAN BERLAKU SOMBONG DAN BERTINDAK SEWENANG-WENANG KEPADA MEREKA YANG LEMAH.', 'Timun emas.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_buku`
--

INSERT INTO `kategori_buku` (`kategori`) VALUES
('Dongeng'),
('Filsafat'),
('Kamus'),
('Komik'),
('Light Novel (Novel Ringan)'),
('Majalah'),
('Manga'),
('Novel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `nisn` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`nisn`, `nama`, `password`, `kelas`, `jurusan`, `alamat`) VALUES
(212210165, 'zidhan arifin', '123', '12', 'Rekayasa Perangkat Lunak', 'Depok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `id_buku` varchar(20) NOT NULL,
  `nisn` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `harga` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `sebagai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `no_telp`, `sebagai`) VALUES
(46, 'Zidhan', '123', 'Zidan', '08624618371', 'admin'),
(47, 'Zidan', '123', 'Zidhan', '086526189171', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `kategori` (`kategori`);

--
-- Indeks untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`kategori`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`nisn`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nisn`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `nisn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212210166;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori_buku` (`kategori`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `member` (`nisn`),
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `peminjaman_ibfk_4` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
