-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2024 pada 09.10
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
-- Database: `pbl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment_pbl`
--

CREATE TABLE `comment_pbl` (
  `id_comment` varchar(60) NOT NULL,
  `userid` varchar(60) NOT NULL,
  `no_pbl` varchar(60) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar_reviewer`
--

CREATE TABLE `komentar_reviewer` (
  `no_pbl` varchar(60) NOT NULL,
  `judul_pbl` text DEFAULT NULL,
  `profile_mahasiswa` text DEFAULT NULL,
  `profile_mitra` text DEFAULT NULL,
  `latar_belakang` text DEFAULT NULL,
  `penutup` text DEFAULT NULL,
  `langkah_langkah_pbl` text DEFAULT NULL,
  `learning_process_dan_skills` text DEFAULT NULL,
  `pengampuh` text DEFAULT NULL,
  `problem_solving` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `komentar_reviewer`
--

INSERT INTO `komentar_reviewer` (`no_pbl`, `judul_pbl`, `profile_mahasiswa`, `profile_mitra`, `latar_belakang`, `penutup`, `langkah_langkah_pbl`, `learning_process_dan_skills`, `pengampuh`, `problem_solving`) VALUES
('285897-1712305551', '', '', '', '', '', '', '', '', ''),
('405652-1721528323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('497971-1711253647', '', '', 'Belum Sesuai', 'Belum Sesuai', '', '', '', '', ''),
('673886-1720743442', '', '', '', '', '', '', '', '', ''),
('758162-1711044410', 'Sudah sesuai', 'Sudah sesuai', 'Sudah sesuai', 'Sudah sesuai', 'Sudah sesuai', 'Sudah sesuai', 'Sudah sesuai', 'Sudah sesuai', 'Sudah sesuai'),
('930857-1711043904', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `like_pbl`
--

CREATE TABLE `like_pbl` (
  `no` int(11) NOT NULL,
  `userid` varchar(60) NOT NULL,
  `no_pbl` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `like_pbl`
--

INSERT INTO `like_pbl` (`no`, `userid`, `no_pbl`) VALUES
(20, 'USR74011706288991', '758162-1711044410'),
(21, 'USR76931710733181', '497971-1711253647'),
(22, 'USR558501709193361', '497971-1711253647'),
(23, 'USR558501709193361', '285897-1712305551'),
(24, 'USR953471705870419', '285897-1712305551');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_pbl`
--

CREATE TABLE `mahasiswa_pbl` (
  `no` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `no_pbl` varchar(60) NOT NULL,
  `profile` text NOT NULL DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `mahasiswa_pbl`
--

INSERT INTO `mahasiswa_pbl` (`no`, `nim`, `nama`, `prodi`, `no_pbl`, `profile`) VALUES
(48, '21024137', 'Dandi Apriadi', 'Sarjana Terapan Teknik Informatika', '930857-1711043904', 'user.png'),
(49, '21024138', 'Renaldi Nyeros', 'Sarjana Terapan Teknik Informatika', '930857-1711043904', 'user.png'),
(50, '21024139', 'Tanri', 'Sarjana Terapan Teknik Informatika', '930857-1711043904', 'user.png'),
(51, '21024137', 'Dandi Apriadi', 'Sarjana Terapan Teknik Informatika', '758162-1711044410', 'user.png'),
(52, '21024138', 'Renaldi Nyeros', 'Sarjana Terapan Teknik Informatika', '758162-1711044410', 'user.png'),
(53, '21024139', 'Renaldi', 'Sarjana Terapan Teknik Informatika', '758162-1711044410', 'user.png'),
(54, '21024137', 'Dandi Apriadi', 'Sarjana Terapan Teknik Informatika', '497971-1711253647', 'user.png'),
(55, '21024138', 'Renaldi Nyeros', 'Sarjana Terapan Teknik Informatika', '497971-1711253647', 'user.png'),
(56, '21024139', 'Renaldi', 'Sarjana Terapan Teknik Informatika', '497971-1711253647', 'user.png'),
(57, '51222552', 'Testing ', 'Sarjana Terapan Teknik Informatika', '497971-1711253647', 'user.png'),
(58, '20024101', 'Intan Sari Duano', 'Sarjana Terapan Teknik Informatika', '285897-1712305551', '1709435168_1838251435.JPG'),
(59, '20024079', 'Gladys Moertibi', 'Sarjana Terapan Teknik Informatika', '285897-1712305551', '1709435168_1838251435.JPG'),
(60, '2345678', 'Ageltry Massorad', 'Sarjana Terapan Teknik Informatika', '673886-1720743442', 'BwzgJOAxTNhZvG1P_20240711064222.jpg'),
(62, '21024137', 'karmel mulia', 'Sarjana Terapan Teknik Informatika', '405652-1721528323', 'user.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pbl`
--

CREATE TABLE `pbl` (
  `no_pbl` varchar(60) NOT NULL,
  `userid` varchar(60) NOT NULL,
  `slug` text NOT NULL,
  `judul_pbl` text NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `jurusan` enum('Sarjana Terapan Teknik Informatika','Sarjana Terapan Teknik Listrik','Diploma Tiga Teknik Listrik','Diploma Tiga Teknik Komputer') NOT NULL,
  `sampul` varchar(60) NOT NULL,
  `link` text NOT NULL,
  `status` enum('Private','Publish','Suspend','Block','Pending') NOT NULL DEFAULT 'Pending',
  `deskripsi` text NOT NULL,
  `dosen_pengampuh_mk` varchar(60) NOT NULL,
  `nama_mitra` text NOT NULL,
  `nilai` int(11) NOT NULL DEFAULT 0,
  `feedback` text DEFAULT NULL,
  `media` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pbl`
--

INSERT INTO `pbl` (`no_pbl`, `userid`, `slug`, `judul_pbl`, `tanggal`, `jurusan`, `sampul`, `link`, `status`, `deskripsi`, `dosen_pengampuh_mk`, `nama_mitra`, `nilai`, `feedback`, `media`) VALUES
('285897-1712305551', 'USR558501709193361', 'sidemen-become-models-for-24-hours', 'SIDEMEN BECOME MODELS FOR 24 HOURS', '2024-04-05 15:25:50', 'Sarjana Terapan Teknik Informatika', '1712305551_1153324437.jpg', 'https://www.youtube.com/embed/nQRQ5DP6JT4?si=2qVtmJFNLRrv3NQH', 'Publish', '&lt;p&gt;????: Order food NOW at: &lt;a href=&quot;https://www.youtube.com/redirect?event=video_description&amp;amp;redir_token=QUFFLUhqbVp6S09sM0EtenoweUZiWHlIQlpObmZ6MUJad3xBQ3Jtc0trU1J4TzVGSFFSUlRGU0FSMWkzZFFyUG1KQ0RMeFA5b2UtQlV5NmxwWmNWNE0xNF9HRk90U3dIV3BpdkROckpzRWlDT2RsSkY3UXo3ZElhTU1pR3YwSjJUeVhGdWtQb19yOVJZX1NtSmpWaFRBQ0pORQ&amp;amp;q=https%3A%2F%2Fwww.eatsides.com%2F&amp;amp;v=nQRQ5DP6JT4&quot; target=&quot;_blank&quot;&gt;https://www.eatsides.com/&lt;/a&gt; ????: Access exclusive content at: &lt;a href=&quot;https://www.youtube.com/redirect?event=video_description&amp;amp;redir_token=QUFFLUhqbXFnSjA4UUlMRG5iRmpLVnR1VHRTc0FVcUoyZ3xBQ3Jtc0trRnlHZ2dHQmwxR25qUkJXNmoyXzZwZmRDLXFiTGt4R21jREl6UllQeXlaVjYxajlqODQySWpHWmEwaDZlcC1wTWNIeW4ydnM0ZmpvZTR1cTNDa2RnYlZlTTE2SEVmUUs2SGpQSE82dHJWZk1sNUNEUQ&amp;amp;q=https%3A%2F%2Fwww.sideplus.com%2F&amp;amp;v=nQRQ5DP6JT4&quot; target=&quot;_blank&quot;&gt;https://www.sideplus.com/&lt;/a&gt; ????: XIX Vodka: &lt;a href=&quot;https://www.youtube.com/redirect?event=video_description&amp;amp;redir_token=QUFFLUhqa0t4UnFKMzY3TlFLYUx1cGo3ODRlS1NjTmRxQXxBQ3Jtc0ttTVNJbVJKc0NlaGpybnRjUDR4dnpXd1k1d1VHdW51ZEU5cHpuallXR1EtZF95TlJvWlBsS2hpRjhmNzJ1ZmlwTkpCZ3cwRThlVENLcllmck91SGxnaEoyUUdyQlRUWFpCcnZiTlprV2tMZnZCeWZGcw&amp;amp;q=https%3A%2F%2Fwww.xixvodka.com%2F&amp;amp;v=nQRQ5DP6JT4&quot; target=&quot;_blank&quot;&gt;https://www.xixvodka.com/&lt;/a&gt; ????: Hit Send: &lt;a href=&quot;https://www.youtube.com/redirect?event=video_description&amp;amp;redir_token=QUFFLUhqbE5Kb0xiaUl0TzhOX2Q5V3NHT1NEWkdiZ051QXxBQ3Jtc0tsSTVldURBVzdlSXVSdmhOZ2txdVdJdE1mejBYVHBzN1BGSDQ3c3ZNOUdwYlpjTFVhTmdrWTMyQ0U5Vmk4ZS1nWW1JSUF5N1MtM1ptZWhyaTlTX2tOTDdsYkZyZzNPMGtFWmktOXZzNnBlTEVfM2FGOA&amp;amp;q=https%3A%2F%2Fhit-send.com%2F&amp;amp;v=nQRQ5DP6JT4&quot; target=&quot;_blank&quot;&gt;https://hit-send.com/&lt;/a&gt; ????????: Subscribe to our Reacts Channel: &lt;a href=&quot;https://www.youtube.com/SidemenReacts&quot; target=&quot;&quot;&gt;&amp;nbsp;&amp;nbsp;&lt;img alt=&quot;&quot; src=&quot;https://www.gstatic.com/youtube/img/watch/yt_favicon.png&quot; /&gt;&amp;nbsp;/&amp;nbsp;sidemenreacts&amp;nbsp;&amp;nbsp;&lt;/a&gt; ???????? ????: Sidemen Clothing: &lt;a href=&quot;https://www.youtube.com/redirect?event=video_description&amp;amp;redir_token=QUFFLUhqa3dKWTUxVHAyLVVkLXR2UGZqRXprS19vanBKZ3xBQ3Jtc0ttbnRoeWNxVWJSQnpMNk5JbkZvNGRtdE13N1lPQWF1RlMyUk9COHpmSGJYTUlub1JOSjJWVlVhbWNEX3ZkVHdOejlRSW9CVzNScG43RXVucG51ZWdvNF9iSlhxaHo1XzhJTXNYTUhMa3FoYmxZdUZjOA&amp;amp;q=http%3A%2F%2Fwww.sidemenclothing.com%2F&amp;amp;v=nQRQ5DP6JT4&quot; target=&quot;_blank&quot;&gt;http://www.sidemenclothing.com&lt;/a&gt; ???????? Subscribe to our 2nd Channel: &lt;a href=&quot;https://www.youtube.com/MoreSidemen&quot; target=&quot;&quot;&gt;&amp;nbsp;&amp;nbsp;&lt;img alt=&quot;&quot; src=&quot;https://www.gstatic.com/youtube/img/watch/yt_favicon.png&quot; /&gt;&amp;nbsp;/&amp;nbsp;moresidemen&amp;nbsp;&amp;nbsp;&lt;/a&gt; ???????? ????: Sidemen Instagram: &lt;a href=&quot;https://www.youtube.com/redirect?event=video_description&amp;amp;redir_token=QUFFLUhqbWpjcnI2MEUya1VpbDUwdWJBZGtUZnJmVjNKQXxBQ3Jtc0ttZnMxZi1DdEQzczhJZkJUTDlOeUFCSUJkSUo0NkllRHdJcHZCaURYbk1rSmRQSXU4NjVlWHBTdU1ZcXljM2FVaUZGa3J3aUp2cjdJd0M3OGU1TEdWQmVUZ3BGdm1nRlBRRmM2aGZIMWJPZkM3UTRxOA&amp;amp;q=http%3A%2F%2Fwww.instagram.com%2FSidemen&amp;amp;v=nQRQ5DP6JT4&quot; target=&quot;_blank&quot;&gt;&amp;nbsp;&lt;img alt=&quot;&quot; src=&quot;https://www.gstatic.com/youtube/img/watch/social_media/instagram_1x.png&quot; /&gt;&amp;nbsp;/&amp;nbsp;sidemen&amp;nbsp;&amp;nbsp;&lt;/a&gt; ????: Sidemen Twitter: &lt;a href=&quot;https://www.youtube.com/redirect?event=video_description&amp;amp;redir_token=QUFFLUhqbHBNTDlJTnh5N21wLWRvY29qdUZlUmxkcjNtZ3xBQ3Jtc0tudUJyT0xUMFNtZ3dHNFhvWUZVaWtnY3NtbklyeWl4a0NpVTg4MkdhSXlKbnlISGE1X19ENkhlTndLdURmSjV6SWVlcnpuZmlEcE83TTVNa0VxRmtnOG41Zy1ZdlFINENnMjRxYnNUWkdnUjVMMVdJUQ&amp;amp;q=http%3A%2F%2Fwww.twitter.com%2FSidemen&amp;amp;v=nQRQ5DP6JT4&quot; target=&quot;_blank&quot;&gt;&amp;nbsp;&lt;img alt=&quot;&quot; src=&quot;https://www.gstatic.com/youtube/img/watch/social_media/twitter_1x_v2.png&quot; /&gt;&amp;nbsp;/&amp;nbsp;sidemen&amp;nbsp;&amp;nbsp;&lt;/a&gt; ??: SUBMIT A &lt;a href=&quot;https://www.youtube.com/hashtag/sidemensunday&quot; target=&quot;&quot;&gt;#SidemenSunday&lt;/a&gt; IDEA HERE &lt;a href=&quot;https://www.youtube.com/redirect?event=video_description&amp;amp;redir_token=QUFFLUhqbkNYRTBxUC1hall2RS1UYm5xUTJWM1FFU0tRQXxBQ3Jtc0treHZKVzJPc3g2eEE0ZXl4Q3pta25xZ2EwSEFqVHhaN0RlMklOdkt1Skd3LXl5dkhaN202cElFRGdiQUtXekFLSy1xeUhxTlhFQjlNa1hRRVUxd2h1Y012dk8yLVBmbms4RWx0WDZqRzFzc21hMVU2UQ&amp;amp;q=https%3A%2F%2Fforms.gle%2FJDuGrSzM4F6mdo6D9&amp;amp;v=nQRQ5DP6JT4&quot; target=&quot;_blank&quot;&gt;https://forms.gle/JDuGrSzM4F6mdo6D9&lt;/a&gt; Music licensed from Lickd. The biggest mainstream and stock music platform for content creators. Can&amp;#39;t Get You out of My Head by Kylie Minogue, &lt;a href=&quot;https://www.youtube.com/redirect?event=video_description&amp;amp;redir_token=QUFFLUhqbmdjQ2NGRFRyZkRZUlNwS1dfSVJOMVZhM2xfd3xBQ3Jtc0tsa1hUTlpDS0UwX1dHRTU0S1VZZElGNnB2aEpyblZLa2ZEc1pEM1g2V0VyVERtcWIybUpHUXllQXZXc1lMQzNLQ09GbFh2YlRLbGpzVWUtUFNlUFZ5TEIwUzE0b0lTR3RFbHdUX1pkRDNoVnFoWGFlVQ&amp;amp;q=https%3A%2F%2Ft.lickd.co%2FJB7OrE1nbdm&amp;amp;v=nQRQ5DP6JT4&quot; target=&quot;_blank&quot;&gt;https://t.lickd.co/JB7OrE1nbdm&lt;/a&gt; License ID: vq3og9Mn3Vm Murder on My Mind by YNW Melly, &lt;a href=&quot;https://www.youtube.com/redirect?event=video_description&amp;amp;redir_token=QUFFLUhqa1ZGbDZWUVdxMVJibmRwbnh3cmd4cXh4cElfZ3xBQ3Jtc0tuUGY3cUlmbUh0d21zWFYybUpDV1FDTkFuTTBPVzhtSEpPZ0Z3NUU1eEQ3TFBRM2xMRFlwZHpqTkVUdVJSZzdxbnpuZ2kydUkyZEo1ejk4Q3hYOVdmT2FZU1NxMEY1NUNUS0JzbWxqZlcyUVdOdE96RQ&amp;amp;q=https%3A%2F%2Ft.lickd.co%2F7vL0DQDaLNZ&amp;amp;v=nQRQ5DP6JT4&quot; target=&quot;_blank&quot;&gt;https://t.lickd.co/7vL0DQDaLNZ&lt;/a&gt; License ID: zEKAomGR148 Skinny Little Missy by Nickelback, &lt;a href=&quot;https://www.youtube.com/redirect?event=video_description&amp;amp;redir_token=QUFFLUhqbTZCTkhMZ3JQWEFZWDQ3QXMxaGc1M2FzYjFxZ3xBQ3Jtc0tuams3VTh6ZVl2Tk03ZENmTTgyZlYyX1JDMXI3aDFLMlRvQ25Ud0xyQVRWbThseEtnRjMtaHN0RmxtcTN4dy15TEIzamN4dUFwWWNRZ2ZwaXczMU16cDlCbWpuLUxnRFBuRnlfU1JHQUhMOVJQV1JGQQ&amp;amp;q=https%3A%2F%2Ft.lickd.co%2FkzjyPxKML8V&amp;amp;v=nQRQ5DP6JT4&quot; target=&quot;_blank&quot;&gt;https://t.lickd.co/kzjyPxKML8V&lt;/a&gt; License ID: 5nlXdDbelV7 Rake It Up (feat. Nicki Minaj) by Yo Gotti &lt;a href=&quot;https://www.youtube.com/redirect?event=video_description&amp;amp;redir_token=QUFFLUhqbFZPRllyTTNjcXNoam1NQk1BUkdLb3RyNG1nQXxBQ3Jtc0trWlhGZ0J4bGJrWkNnN2syQmJkcm1RSUxuRDgzemtYd2xEZ0o2ZXRRaGdfSHFnQVpXc2xBckRUOWN2alBjQ0E5MWwzZWVORW4ycGd5dEFhNXBGV0RIbzRtb2lWTU1pUXJYWm5SVXVia01GX3RuN1FEWQ&amp;amp;q=https%3A%2F%2Ft.lickd.co%2Fl3k0aXnrbXP&amp;amp;v=nQRQ5DP6JT4&quot; target=&quot;_blank&quot;&gt;https://t.lickd.co/l3k0aXnrbXP&lt;/a&gt; License ID: aEbPDQXBbd2&lt;/p&gt;\r\n', 'USR531661705409510', 'Politeknik Negeri Manado', 100, 'Mantap', NULL),
('405652-1721528323', 'USR348571706169872', 'ada-apa-di-dalam-lubang-hitam', 'Ada Apa di Dalam Lubang Hitam?', '2024-07-21 10:18:43', 'Sarjana Terapan Teknik Informatika', '1721528323_237922681.png', 'https://www.youtube.com/embed/uMxQI5DuGGk?si=thwx0Jnung8hlbrI', 'Pending', '&lt;p&gt;asdsdsd&lt;/p&gt;\r\n', 'USR531661705409510', 'Politeknik Negeri Manado', 0, 'jsd', '1721528964_1474623631.pdf'),
('497971-1711253647', 'USR76931710733181', 'kung-fu-panda-4-all-clips-amp-trailer-2024', 'KUNG FU PANDA 4 All Clips &amp; Trailer (2024)', '2024-03-24 11:14:06', 'Sarjana Terapan Teknik Listrik', '1711253647_1580430440.jpeg', 'https://www.youtube.com/embed/cqpPkR3jMKs?si=b3FE-Zd7r3zwGaxy', 'Publish', '&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;All Kung Fu Panda 4 Movie Clips &amp;amp; Trailer 2024 | Subscribe ? &lt;a href=&quot;https://www.youtube.com/redirect?event=video_description&amp;amp;redir_token=QUFFLUhqbEJWekV2bGlCSF9hQWFOc1ZPT2JNbkczenBHUXxBQ3Jtc0trczNpV0tfM1o2Q1FlOHBEUE9YZ1M4Q3JQYWwzTFZZZ2dkdERvSGZiUllkSXVDdjBTQ01UV3BnQlU5RnZBa2VLMVYwcTFsRF9JUVN1SDdNSU1rVldvQW5DWUkxTGt6UFAwbU41Vm1GYUZzeENiRjNzQQ&amp;amp;q=https%3A%2F%2Fabo.yt%2Fki&amp;amp;v=cqpPkR3jMKs&quot; target=&quot;_blank&quot;&gt;https://abo.yt/ki&lt;/a&gt; | Jack Black Movie Trailer | Cinema: 8 Mar 2024 | More &lt;a href=&quot;https://www.youtube.com/redirect?event=video_description&amp;amp;redir_token=QUFFLUhqbm1Ha3NoV0VvUmFNdlpjb1BOZU1GZUFVRF9UZ3xBQ3Jtc0ttaU1Wb3Z4QWJ6X2ZPT2JNVWhyellHc1dtaVFYVmtDcmNUQXhQaWJDNUFCSFI4eEZWLTJRU2VoLUg3MXFVR1dZMm55all6S0VOeWRSN2NYcEZVQUl3TmdBcTFfZFN3NVNaQkVMcEZrd0pVbnJtbzc0OA&amp;amp;q=https%3A%2F%2FKinoCheck.com%2Fmovie%2F7ji%2Fkung-fu-panda-4-2024%3Futm_source%3Dyoutube%26utm_medium%3Ddescription&amp;amp;v=cqpPkR3jMKs&quot; target=&quot;_blank&quot;&gt;https://KinoCheck.com/movie/7ji/kung-...&lt;/a&gt; In &amp;quot;Kung Fu Panda 4&amp;quot;, Po encounters his most devious enemy yet: the Chameleon, a merciless magician who can even summon villains from earlier times. Po is forced to deal with each of these enemies anew. Kung Fu Panda 4 rent/buy ? &lt;a href=&quot;https://www.youtube.com/redirect?event=video_description&amp;amp;redir_token=QUFFLUhqa1VGTk5kOEk1dWt5YVVvMlZTeEY2Sy1nTHhVd3xBQ3Jtc0tuNDVWMkdUNGpzVjNmNTNrMjBUaktBM2c1VjZheUpycGFMMk1oN2QyckVRZXE2RUtIekFCTFh2TmpmUXpJR0xxbnI5cjVtMkZnWXc5Y05pUUtyZ3MwbFFCYzJxMzY4M3BHb2dIR3EwckZBNml1cWVWYw&amp;amp;q=https%3A%2F%2Famzo.in%2Fmovie%2F7ji%2Fkung-fu-panda-4-2024&amp;amp;v=cqpPkR3jMKs&quot; target=&quot;_blank&quot;&gt;https://amzo.in/movie/7ji/kung-fu-pan...&lt;/a&gt; Most popular movies right now ? &lt;a href=&quot;https://www.youtube.com/redirect?event=video_description&amp;amp;redir_token=QUFFLUhqbXVBV1NFdHNSTFI0R21pVDlJblhGSmJiVmNYQXxBQ3Jtc0trazA2ZGhsSktpRjZ4cWRYTDRRejRXclZtS005cS1XNkszLUVNRzZUZFBOTEUxalA5RWpKTDNqcWNyNnB3djJVeTFBWFBMVUEybVVoN3VndHduR1ZEamtHOXBteDl4dGU5b1h2Y3FpaHpaX0VWelpRcw&amp;amp;q=https%3A%2F%2Famzo.in%2Fbestsellermovies&amp;amp;v=cqpPkR3jMKs&quot; target=&quot;_blank&quot;&gt;https://amzo.in/bestsellermovies&lt;/a&gt; Most wanted movies of all time ? &lt;a href=&quot;https://www.youtube.com/redirect?event=video_description&amp;amp;redir_token=QUFFLUhqbF9feHVNcTJjTUdWdjNoUWpUVXFMcUZDWGw5Z3xBQ3Jtc0ttLVRoUFVWaUtYalp6MER4RzBSdUlKcDNjanBpemx6NXpoSzF3QVpaMFFlZW82Z0FWWlh5UjQ4VTlXeFF1bkNOek41c3VjSTFHSmIza2cyV0h1RVljVUN2S1BDOVNoTHg5dE14UEo4bmFsYkJzZkZMaw&amp;amp;q=https%3A%2F%2Famzo.in%2Fwishlistmovies&amp;amp;v=cqpPkR3jMKs&quot; target=&quot;_blank&quot;&gt;https://amzo.in/wishlistmovies&lt;/a&gt;&lt;/p&gt;\r\n', 'USR531661705409510', 'Politeknik Negeri Manado', 100, NULL, NULL),
('673886-1720743442', 'USR889561714150032', 'rachel-platten-lagu-pertarungan-lirik-dua-lipa-justin-bieber-lirik-populer-2023', 'Rachel Platten - Lagu Pertarungan (Lirik) | Dua Lipa,Justin Bieber,... Lirik Populer 2023', '2024-07-12 08:17:22', 'Sarjana Terapan Teknik Informatika', '1720743442_1226700618.jpg', 'https://www.youtube.com/embed/710J6r795JQ?si=rXncuRrvaLPUm6vM', 'Publish', '&lt;p&gt;dsfsdfsdasdasd&lt;/p&gt;\r\n', 'USR531661705409510', 'Politeknik Negeri Manadof', 100, NULL, NULL),
('758162-1711044410', 'USR76931710733181', 'membasuh-ft-rara-sekar-hindia', 'membasuh (ft. rara sekar) - hindia', '2024-03-22 01:06:50', 'Sarjana Terapan Teknik Informatika', '1711044410_1182679271.jpg', 'https://www.youtube.com/embed/GOwlFlHAAIc?si=q2Clak_8VGs-sgV4', 'Suspend', '&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;halo semuaa semoga kalian sehat selalu dalam pandemi ini and stay safe! banyak temen dan keluarga aku yang udah kena, untungnya semuanya sembuh pandemi di hong kong juga makin parah :( thank you for watching! don&amp;#39;t forget to like, comment, and subscribe for more videos! oh and click the bell icon to be notified every time i upload a new video!&lt;/p&gt;\r\n', 'USR531661705409510', 'Politeknik Negeri Manado', 60, NULL, NULL),
('930857-1711043904', 'USR76931710733181', 'cover-terbaik-seivabel-jessica-cover-compilation', 'COVER TERBAIK SEIVABEL JESSICA | COVER COMPILATION', '2024-03-22 00:58:24', 'Sarjana Terapan Teknik Informatika', '1711043904_984064235.jpg', 'https://www.youtube.com/embed/sD--ci2NlHU?si=9XXh4z5VYTleKGhB', 'Publish', '&lt;p&gt;&lt;a href=&quot;https://www.youtube.com/watch?v=sD--ci2NlHU&amp;amp;t=299s&quot; target=&quot;&quot;&gt;04:59&lt;/a&gt;: Kukira Kau Rumah - Amigdala &lt;a href=&quot;https://www.youtube.com/watch?v=sD--ci2NlHU&amp;amp;t=453s&quot; target=&quot;&quot;&gt;07:33&lt;/a&gt; Can&amp;#39;t take my Eyes Off You - Frankie Valli &lt;a href=&quot;https://www.youtube.com/watch?v=sD--ci2NlHU&amp;amp;t=645s&quot; target=&quot;&quot;&gt;10:45&lt;/a&gt; To The Bone - Pamungkas &lt;a href=&quot;https://www.youtube.com/watch?v=sD--ci2NlHU&amp;amp;t=834s&quot; target=&quot;&quot;&gt;13:54&lt;/a&gt; Sudah - Ardhito Pramono &lt;a href=&quot;https://www.youtube.com/watch?v=sD--ci2NlHU&amp;amp;t=1021s&quot; target=&quot;&quot;&gt;17:01&lt;/a&gt; Rumpang - Nadin Amizah &lt;a href=&quot;https://www.youtube.com/watch?v=sD--ci2NlHU&amp;amp;t=1317s&quot; target=&quot;&quot;&gt;21:57&lt;/a&gt; Pilu Membiru - Kunto Aji &lt;a href=&quot;https://www.youtube.com/watch?v=sD--ci2NlHU&amp;amp;t=1581s&quot; target=&quot;&quot;&gt;26:21&lt;/a&gt; Bertaut - Nadin Amizah &lt;a href=&quot;https://www.youtube.com/watch?v=sD--ci2NlHU&amp;amp;t=1882s&quot; target=&quot;&quot;&gt;31:22&lt;/a&gt; Semoga, Ya - Nosstress &lt;a href=&quot;https://www.youtube.com/watch?v=sD--ci2NlHU&amp;amp;t=2055s&quot; target=&quot;&quot;&gt;34:15&lt;/a&gt; Taruh - Nadin Amizah &lt;a href=&quot;https://www.youtube.com/watch?v=sD--ci2NlHU&amp;amp;t=2268s&quot; target=&quot;&quot;&gt;37:48&lt;/a&gt; Secukupnya - Hindia &lt;a href=&quot;https://www.youtube.com/watch?v=sD--ci2NlHU&amp;amp;t=2428s&quot; target=&quot;&quot;&gt;40:28&lt;/a&gt; Lara - Dialog Senja &lt;a href=&quot;https://www.youtube.com/watch?v=sD--ci2NlHU&amp;amp;t=2646s&quot; target=&quot;&quot;&gt;44:06&lt;/a&gt; Lose - Niki&lt;/p&gt;\r\n', 'USR531661705409510', 'Politeknik Negeri Manado', 90, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `no_pbl` varchar(60) NOT NULL,
  `judul_pbl` int(10) NOT NULL DEFAULT 0,
  `profile_mahasiswa` int(10) NOT NULL DEFAULT 0,
  `profile_mitra` int(10) NOT NULL DEFAULT 0,
  `latar_belakang` int(10) NOT NULL DEFAULT 0,
  `penutup` int(10) NOT NULL DEFAULT 0,
  `langkah_langkah_pbl` int(10) NOT NULL DEFAULT 0,
  `learning_process_dan_skills` int(10) NOT NULL DEFAULT 0,
  `pengampuh` int(10) NOT NULL DEFAULT 0,
  `problem_solving` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`no_pbl`, `judul_pbl`, `profile_mahasiswa`, `profile_mitra`, `latar_belakang`, `penutup`, `langkah_langkah_pbl`, `learning_process_dan_skills`, `pengampuh`, `problem_solving`) VALUES
('285897-1712305551', 1, 1, 1, 1, 1, 1, 1, 1, 1),
('405652-1721528323', 0, 0, 0, 0, 0, 0, 0, 0, 0),
('497971-1711253647', 1, 1, 1, 1, 1, 1, 1, 1, 1),
('673886-1720743442', 1, 1, 1, 1, 1, 1, 1, 1, 1),
('758162-1711044410', 0, 0, 1, 1, 1, 1, 1, 1, 1),
('930857-1711043904', 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `userid` varchar(60) NOT NULL,
  `username` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL DEFAULT '-',
  `lastname` varchar(50) NOT NULL DEFAULT '-',
  `profile` varchar(60) NOT NULL DEFAULT 'user.png',
  `email` varchar(60) NOT NULL,
  `password` text NOT NULL,
  `verified` enum('yes','no','','') NOT NULL DEFAULT 'no',
  `kode_verified` int(11) NOT NULL DEFAULT 0,
  `token` text NOT NULL,
  `status` enum('active','suspend','blocked','') NOT NULL DEFAULT 'active',
  `role` enum('pengguna','admin','reviewer','dosen') NOT NULL DEFAULT 'pengguna'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`userid`, `username`, `firstname`, `lastname`, `profile`, `email`, `password`, `verified`, `kode_verified`, `token`, `status`, `role`) VALUES
('USR230211719812208', '210241352', '-', '-', 'user.png', 'dandiapriandimamonto@gmail.com', '$2y$10$Stanj5DpXyu0U0niwDJEw.kqSPsiQ5r9fBJ3/Vsmpzv.t/6A38WzW', 'yes', 0, 'JDJ5JDEwJGlZN3lVR3I2WGJ6NC5KMlU5QS54QU9BcVhNSGdtMjlEekRCT1lqTi9HM2thZ0FxTjMvTlh1', 'active', 'pengguna'),
('USR348571706169872', '21022123215', 'karmel', 'mulia', 'user.png', 'karmelmulia9@gmail.com', '$2y$10$lHC3g8xPVJpPfQ4iWyLCUO1/gv0.wuR8sQMR2nw8TEJE6y/dZx2nK', 'yes', 0, 'JDJ5JDEwJHBNTEM0R2FEazFFSFRZdG0yZ2xzeS5DME9nbE5GYXlBVzVOakRtek52Ty5QWmtkYTY1bnp1', 'active', 'pengguna'),
('USR464131721524648', '1234', '-', '-', 'user.png', 'dandigeming85s@gmail.com', '$2y$10$pWqmKDmuQpHRihiMP8FEMuBmmLutLcbJ4lJ7zD21bMAcrLUuB0Mem', 'no', 0, 'JDJ5JDEwJHY4VGQyOTJPMGRnWDN0ZUpSNFlmeGV0eXMxZndWLndwSGswOUdyZWFTMVhYYzJYcEpRelQy', 'active', 'pengguna'),
('USR531661705409510', '255134553', 'Oldi', 'Lambonan', 'user.png', 'oldilambonan@gmail.com', '$2y$10$M2eaniSafv0ASbq8bc5YN.GJRmdBGu.rnVvNknUV2WaGoxw/rtcPW', 'yes', 0, 'JDJ5JDEwJE9TOTlMV2F5SUkwSlpNRmJGbEg1VE9kQm12ZXVETy9KYmtUa2VTZEZObnZ4MUdtdGxjNnZl', 'active', 'dosen'),
('USR5461706520521', '2356453132', 'leon', 'walujan', 'user.png', 'leonwalujan@gmail.com', '$2y$10$A27yr2DF0nNdqjzgsP1GK.uvivvIiJwalTOs0T/EDXoqT2sge052u', 'yes', 0, '-', 'active', 'reviewer'),
('USR558501709193361', '514564651321', 'Intan', 'Duano', '1709435168_1838251435.JPG', 'intan.duano2710@gmail.com', '$2y$10$2WYMu6liH7U6XbeyXwYu3e3qWI8cEOVQApElJhZhdgHXLn9RUPIg2', 'yes', 0, 'JDJ5JDEwJE1qSzlkNFI1LmpWYlZoLlpiaUV5a2VJMGZiRHk1cDFVa0cwajAzZmV3TnZiL2RYOTBqaDJT', 'active', 'pengguna'),
('USR577931706288764', '25454656465', 'Asrama', 'polimdo', 'user.png', 'asramapolimdo@gmail.com', '$2a$12$sqlq5kT2OXf6W3K/kOEbWeqofyOAEsTIZlEFHWuvZQF0ETQJEo6nO', 'yes', 0, '-', 'active', 'reviewer'),
('USR61231720749134', '254432544', 'dsd', 'Mamonto', '1720749134_1333180360.jpg', 'cvjilis18@gmail.com', '$2y$10$9xIzcCT3xHevKbTs6zrEde1G/ZGh0iyFoghs3LXT94/j0h42GPeNK', 'yes', 0, '-', 'active', 'pengguna'),
('USR639971721553272', '121313', '-', '-', 'user.png', 'cvjilis18@gmail.comad', '$2y$10$zqkl2Letqpb53nMkYt4t3OQDvElSjk..j1QD6DqPCcH/uTjRezQwi', 'no', 0, 'JDJ5JDEwJDJhMWFhMG4zRVd5WGZieVZiaktvY3VVZGZzYTJsYmp0OUZBL2ZBMmFmYjExem1PZlNNVnBL', 'active', 'pengguna'),
('USR74011706288991', '54645546878', 'karina', 'lumondo', 'user.png', 'karina@gmail.com', '$2y$10$FqnbR8nCV3uTwX6E5vUIKuJNtx8MRr/W2Lc0/S0OF0giH3wQ81zK6', 'yes', 0, '-', 'active', 'reviewer'),
('USR76931710733181', '256685415', 'Dandi', 'Apriadi', 'user.png', 'dandi@gmail.com', '$2y$10$lgGdjV/SQ3LkV626xS9dduXnIITBrMDH6EJm2nUnC/B8JStMPRMBS', 'yes', 0, 'JDJ5JDEwJHloQVM1bGIzZi93ckJRLm92RlZTWXVoRFRsSThRbGtYWGZZMk9FdWxPaEJ4WXdOZFVYUjdp', 'active', 'pengguna'),
('USR812021721524322', '889745531223', '-', '-', 'user.png', 'dandigeming85@gmail.com', '$2y$10$hfwChm3FVthBIuC/Rcy6SeqRPgV4AGSzyR.E8mvVf0Tcq7qeetkpu', 'no', 0, 'JDJ5JDEwJFNPVS82Y0llNnhZandFOFhSY1ZRcWVzV3FkVGhKMjlUQUpCd2hvbU56TE1uYzZtY0x2Z3hT', 'active', 'pengguna'),
('USR889461706783426', '15412211', 'Intan', 'Duano', 'user.png', 'intan.duano27@gmail.com', '$2y$10$Pqct3UZXZTifRTZckLyyMehmlT40rK82ZcIuAVvFOe1Fioy1GQ6OC', 'no', 0, 'JDJ5JDEwJEtpYlN6T0FHckRDMENZa3lhSVNQNXVpenZ1YlZ0cTJXZGRCejRUczV4WmtOY0FTTzNsc29l', 'active', 'pengguna'),
('USR889561714150032', '6512123123125', 'Ageltry', 'Massora', 'BwzgJOAxTNhZvG1P_20240711064222.jpg', 'agel@gmail.com', '$2y$10$vd.YZ7fscI/jAH1MLlzzlegbamKWGo7DpVigR1wVzpuemicSRIknm', 'yes', 0, 'JDJ5JDEwJFhLM29Ud21Bb2hXUzJKZHFNVEVQZmVMUi9tbm1BS1RHdE1HZTh4eVZxa3lISU0vZ3AxV0dp', 'active', 'pengguna'),
('USR953471705870419', '13548412545545', 'dandi', 'Mamonto', 'user.png', 'admin@gmail.com', '$2y$10$AQGw6z/jEl3gTTAF1lbacOedzluMjKm.tM0jt4PntBJVC7yt1SBoS', 'yes', 0, 'JDJ5JDEwJGxXOVFCTnlJSlc5SmNVNnBwdkhMLi5uNTRKbmQ1QS5QaHM3ejRiVW5VOS9pSzhhLlhYLmtt', 'active', 'admin'),
('USR971511705407369', '123', 'Karmel', 'Mulia', 'w6ketLzTasxEC1So_20240711061314.jpg', 'dandiapeiadi22@gmail.com', '$2y$10$yJhaHV.x0ax2cUgzUBIlrOqmsbwF06DxxxWpcQBmLfC76s4.tt8PC', 'yes', 0, 'JDJ5JDEwJFZaSy5WWU11azhjb3Zwc01XZXFndXVtdmdIL2JaVVBJUk1MRWY3em0vdWtxQi82Rmo2bmxL', 'active', 'reviewer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_detail`
--

CREATE TABLE `users_detail` (
  `userid` varchar(60) NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `slogan` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `bergabung` datetime NOT NULL DEFAULT current_timestamp(),
  `whatsapp` text NOT NULL,
  `instagram` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `lingkedin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users_detail`
--

INSERT INTO `users_detail` (`userid`, `alamat`, `no_telpon`, `slogan`, `deskripsi`, `bergabung`, `whatsapp`, `instagram`, `facebook`, `twitter`, `lingkedin`) VALUES
('USR230211719812208', '', '', '', '', '2024-07-01 13:36:48', '', '', '', '', ''),
('USR348571706169872', 'testing', '0821131', 'dfsdf', 'dfs', '2024-01-25 15:04:32', 'dsdfs', 'sfs', 'fsfsdf', 'sdfsd', 'fsdf'),
('USR464131721524648', '', '', '', '', '2024-07-21 09:17:28', '', '', '', '', ''),
('USR531661705409510', 'Manado jln politeknik Kelurahan buha 95252', '6285161542103', 'Bersama Kuli Membangun Negeri', 'Mahasiswa Teknik Informatika Tahun Angakatan 2021', '2024-01-16 19:51:50', '6285161542103', '', '', '', ''),
('USR5461706520521', '', '', '', '', '2024-01-29 16:28:41', '', '', '', '', ''),
('USR558501709193361', '', '', '', '', '2024-02-29 14:56:02', '', '', '', '', ''),
('USR577931706288764', '', '', '', '', '2024-01-27 00:06:02', '', '', '', '', ''),
('USR61231720749134', 'Manado jln politeknik Kelurahan buha 95252', 'sds', 'sds', 'dsd', '2024-07-12 09:52:14', 'sd', 'sdsd', 'dsd', 'sd', 'sdsdsd'),
('USR639971721553272', '', '', '', '', '2024-07-21 17:14:32', '', '', '', '', ''),
('USR74011706288991', '1', '', 'd', '', '2024-01-27 00:09:49', '', '', '', '', ''),
('USR76931710733181', '', '', '', '', '2024-03-18 10:39:40', '', '', '', '', ''),
('USR812021721524322', '', '', '', '', '2024-07-21 09:12:02', '', '', '', '', ''),
('USR889461706783426', '', '', '', '', '2024-02-01 17:30:26', '', '', '', '', ''),
('USR889561714150032', 'Manado jln politeknik Kelurahan buha 95252', 'sfd', 'sdfsdf', 'Manado jln politeknik Kelurahan buha 95252', '2024-04-26 23:47:12', 'ds', 'fdsf', 'dsf', 'sfd', 'sdf'),
('USR953471705870419', 'Manado jln politeknik Kelurahan buha 95252', '6285161542103', 'Bersama Kuli Membangun Negeri', 'Mahasiswa Teknik Informatika Tahun Angakatan 2021', '2024-01-22 03:53:39', '6285161542103', 'https://www.instagram.com/dandiimamonto/', 'https://www.facebook.com/polimdo.official/', 'https://twitter.com/PoltekManado', 'https://www.linkedin.com/in/dandi-mamonto-46b6412a0/'),
('USR971511705407369', 'sdsadads', 'sadasd', 'Test ', 'sdsadads', '2024-01-16 19:16:09', 'asdasd', 'sdfds', 'ddsfsds', 'asddsadss', 'asdasds');

-- --------------------------------------------------------

--
-- Struktur dari tabel `view_pbl`
--

CREATE TABLE `view_pbl` (
  `no` int(11) NOT NULL,
  `ip_public` varchar(60) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `no_pbl` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `view_pbl`
--

INSERT INTO `view_pbl` (`no`, `ip_public`, `tanggal`, `no_pbl`) VALUES
(71, '', '2024-03-22', '930857-1711043904'),
(72, '', '2024-03-23', '930857-1711043904'),
(73, '', '2024-03-24', '497971-1711253647'),
(74, '', '2024-03-24', '758162-1711044410'),
(75, '', '2024-03-24', '930857-1711043904'),
(76, '', '2024-03-25', '930857-1711043904'),
(77, '', '2024-03-25', '497971-1711253647'),
(78, '', '2024-03-28', '930857-1711043904'),
(79, '', '2024-03-28', '758162-1711044410'),
(80, '', '2024-04-05', '497971-1711253647'),
(81, '', '2024-04-05', '285897-1712305551'),
(82, '', '2024-04-09', '285897-1712305551'),
(83, '', '2024-05-21', '497971-1711253647'),
(84, '', '2024-05-25', '930857-1711043904'),
(85, '', '2024-07-11', '758162-1711044410'),
(86, '', '2024-07-12', '673886-1720743442'),
(87, '', '2024-07-12', '497971-1711253647'),
(88, '', '2024-07-23', '405652-1721528323');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `comment_pbl`
--
ALTER TABLE `comment_pbl`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `userid` (`userid`),
  ADD KEY `no_pbl` (`no_pbl`);

--
-- Indeks untuk tabel `komentar_reviewer`
--
ALTER TABLE `komentar_reviewer`
  ADD PRIMARY KEY (`no_pbl`);

--
-- Indeks untuk tabel `like_pbl`
--
ALTER TABLE `like_pbl`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no_pbl` (`no_pbl`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `mahasiswa_pbl`
--
ALTER TABLE `mahasiswa_pbl`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no_pbl` (`no_pbl`);

--
-- Indeks untuk tabel `pbl`
--
ALTER TABLE `pbl`
  ADD PRIMARY KEY (`no_pbl`),
  ADD UNIQUE KEY `slug` (`slug`) USING HASH,
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`no_pbl`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `users_detail`
--
ALTER TABLE `users_detail`
  ADD PRIMARY KEY (`userid`);

--
-- Indeks untuk tabel `view_pbl`
--
ALTER TABLE `view_pbl`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no_pbl` (`no_pbl`),
  ADD KEY `ip_public` (`ip_public`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `like_pbl`
--
ALTER TABLE `like_pbl`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa_pbl`
--
ALTER TABLE `mahasiswa_pbl`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `view_pbl`
--
ALTER TABLE `view_pbl`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `comment_pbl`
--
ALTER TABLE `comment_pbl`
  ADD CONSTRAINT `comment_pbl_ibfk_1` FOREIGN KEY (`no_pbl`) REFERENCES `pbl` (`no_pbl`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentar_reviewer`
--
ALTER TABLE `komentar_reviewer`
  ADD CONSTRAINT `fk_no_pbl` FOREIGN KEY (`no_pbl`) REFERENCES `pbl` (`no_pbl`) ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_reviewer_ibfk_1` FOREIGN KEY (`no_pbl`) REFERENCES `pbl` (`no_pbl`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `like_pbl`
--
ALTER TABLE `like_pbl`
  ADD CONSTRAINT `like_pbl_ibfk_1` FOREIGN KEY (`no_pbl`) REFERENCES `pbl` (`no_pbl`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa_pbl`
--
ALTER TABLE `mahasiswa_pbl`
  ADD CONSTRAINT `mahasiswa_pbl_ibfk_1` FOREIGN KEY (`no_pbl`) REFERENCES `pbl` (`no_pbl`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pbl`
--
ALTER TABLE `pbl`
  ADD CONSTRAINT `pbl_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`no_pbl`) REFERENCES `pbl` (`no_pbl`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users_detail`
--
ALTER TABLE `users_detail`
  ADD CONSTRAINT `users_detail_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `view_pbl`
--
ALTER TABLE `view_pbl`
  ADD CONSTRAINT `view_pbl_ibfk_1` FOREIGN KEY (`no_pbl`) REFERENCES `pbl` (`no_pbl`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
