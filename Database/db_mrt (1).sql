-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2019 at 04:49 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mrt`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `telepon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(15) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `telepon`, `email`, `gambar`, `status`) VALUES
('ADM02', 'a', 'a', '0234567845678', 'admin@yahoo.com', 'wifi.png', 'Super Admin'),
('ADM03', 'b', 'b', '02345678923456', 'array@a.com', 'ironman.png', 'Administrator'),
('ADM01', 'jokowi', 'jokowi', '021-11111111', 'presidenri@gmail.com', 'key.jpg', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_crawling`
--

CREATE TABLE `tb_crawling` (
  `idc` int(15) NOT NULL,
  `tweet` varchar(700) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `note` varchar(700) NOT NULL,
  `normalisasi` varchar(700) NOT NULL,
  `keyword` varchar(30) NOT NULL,
  `label` int(1) NOT NULL DEFAULT '0',
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_crawling`
--

INSERT INTO `tb_crawling` (`idc`, `tweet`, `lokasi`, `note`, `normalisasi`, `keyword`, `label`, `kategori`) VALUES
(290, 'RT @fadjroeL: Hehe Koko Ahok @basuki_btp mencoba #MRTJakarta yang dibidaninya bersama Pakde @jokowi  yang membuat Jakarta menjadi kota dengâ€¦', '', 'rt fadjroel hehe koko ahbasuki btp coba mrtjakarta bisama pakde jokowi buat jakarta jakota deng', 'rt fadjroel hehe koko ahbasuki btp coba mrtjakarta bisama pakde jokowi buat jakarta jakota deng', '', 1, 'negatif'),
(294, 'RT @mrtjakarta: Alternatif metode pembayaran MRT Jakarta. #MRTJakarta #UbahJakarta https://t.co/5iU10IEwQ4', 'DKI Jakarta, Indonesia', 'rt mrtjakarta alternatif metode bayar mrt jakarta mrtjakarta ubahjakarta https t co iuiewq', 'rt mrtjakarta alternatif metode bayar mrt jakarta mrtjakarta ubahjakarta https t co iuiewq', '', 1, 'positif'),
(301, 'RT @mrtjakarta: Hubungi call center MRT Jakarta jika mempunyai keluhan, masukan dan laporan mengenai MRT Jakarta. Bisa juga untuk mention aâ€¦', 'Indonesia', 'rt mrtjakarta hubung call center mrt jakarta punkeluh masuk lapor kena mrt jakarta mention a', 'rt mrtjakarta hubung call center mrt jakarta punkeluh masuk lapor kena mrt jakarta mention a', '', 1, 'positif'),
(316, 'RT @MilesFilms: Wow #FilmBEBAS jadi film layar lebar pertama yang syuting di MRT! @milesfilms juga menggunakan kesempatan ini untuk ajak kaâ€¦', 'DKI Jakarta, Indonesia', 'rt milesfilms wow filmbebas jafilm layar lebar pertama syuting mrt milesfilms sempat ajak ka', 'rt milesfilms wow filmbebas jafilm layar lebar pertama syuting mrt milesfilms sempat ajak ka', '', 1, 'negatif'),
(330, 'Alternatif metode pembayaran MRT Jakarta. #MRTJakarta #UbahJakarta https://t.co/5iU10IEwQ4', 'Jakarta Pusat, DKI Jakarta', 'alternatif metode bayar mrt jakarta mrtjakarta ubahjakarta https t co iuiewq', 'alternatif metode bayar mrt jakarta mrtjakarta ubahjakarta https t co iuiewq', '', 1, 'positif'),
(331, 'RT @DKIJakarta: Menurut data @dcktrpdki, hampir 90% permukaan tanah di daerah DKI Jakarta tertutup beton. Jadi, jangan heran kalau beberapaâ€¦', '', 'rt dkijakarta turut data dcktrpdki hampir muka tanah daerah dki jakarta tutup beton jajangan heran kalau beberapa', 'rt dkijakarta turut data dcktrpdki hampir muka tanah daerah dki jakarta tutup beton jajangan heran kalau beberapa', '', 1, 'negatif'),
(332, 'RT @mrtjakarta: MRT Jakarta berkolaborasi dengan Transjakarta melakukan uji coba perdana wisata edukasi berwisata sambil belajar ke Gedungâ€¦', '', 'rt mrtjakarta mrt jakarta kolaborasi transjakarta laku uji coba perdana wisata edukasi wisata ajar gedung', 'rt mrtjakarta mrt jakarta kolaborasi transjakarta laku uji coba perdana wisata edukasi wisata ajar gedung', '', 1, 'positif'),
(335, 'MRT Jakarta berkolaborasi dengan Transjakarta melakukan uji coba perdana wisata edukasi berwisata sambil belajar keâ€¦ https://t.co/uTovGkAaix', 'Jakarta Pusat, DKI Jakarta', 'mrt jakarta kolaborasi transjakarta laku uji coba perdana wisata edukasi wisata ajar https t co utovgkaaix', 'mrt jakarta kolaborasi transjakarta laku uji coba perdana wisata edukasi wisata ajar https t co utovgkaaix', '', 1, 'positif'),
(336, 'RT @mrtjakarta: PT MRT Jakarta dan PT Blue Bird Tbk menandatangani Nota Kesepahaman terkait â€œStudi Pengembangan Layanan Transportasi Terintâ€¦', '', 'rt mrtjakarta pt mrt jakarta pt blue bird tbk menandatangani nota paham kait stukembang layan transportasi terint', 'rt mrtjakarta pt mrt jakarta pt blue bird tbk menandatangani nota paham kait stukembang layan transportasi terint', '', 1, 'positif'),
(338, 'RT @mrtjakarta: Teman MRT, ayo kita berikan kontribusi nyata dalam upaya menjaga udara kota Jakarta. Penggunaan transportasi publik dapat mâ€¦', 'Jakarta, Indonesia', 'rt mrtjakarta teman mrt ayo ikan kontribusi nyata upajaga udara kota jakarta transportasi publik m', 'rt mrtjakarta teman mrt ayo ikan kontribusi nyata upajaga udara kota jakarta transportasi publik m', '', 1, 'negatif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_datalatih`
--

CREATE TABLE `tb_datalatih` (
  `id_datalatih` int(10) NOT NULL,
  `tweet` text NOT NULL,
  `normalisasi` text NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_datalatih`
--

INSERT INTO `tb_datalatih` (`id_datalatih`, `tweet`, `normalisasi`, `kategori`, `keterangan`) VALUES
(1, 'saya kecewa dengan suasana dalam mrt yang sangat panas', 'kecewa suasana mrt sangat panas', 'negatif', ''),
(2, 'Banyak bangku yang sudah rusak dan tidak nyaman', 'banyak bangku rusak nyaman', 'negatif', ''),
(3, 'Antre panjang sekali !!!. Suasana pagi begini terus', 'antre panjang sekali suasana pagi begterus', 'negatif', ''),
(4, 'petugas lalai, tidak menegor orang yang makan sembarangan', 'tugas lalai menegor orang msembarang', 'negatif', ''),
(5, 'suara bising mesin mrt bikin tidak nyaman', 'suara bising mesin mrt bikin nyaman', 'negatif', ''),
(6, 'Banyak rempah-rempah makanan dalam mrt bau jadinya', 'banyak rempah mmrt bau jadi', 'negatif', ''),
(7, 'Sayangnya kondisi stasiun sangat panas', 'sakondisi stasiun sangat panas', 'negatif', ''),
(8, 'kecewa dengan jadwal kedatangan yang telat terooos', 'kecewa jadwal datang telat terooos', 'negatif', ''),
(9, 'terlalu banyak orang yang tidak mengerti sign dalam stasun mrt sehingga banyak yang bingung', 'terlalu banyak orang erti sign stasun mrt banyak bingung', 'negatif', ''),
(10, 'Telat Terus datang mrt euy. Jam kerja gabisa dirubah kali.....', 'telat terus datang mrt euy jam kerja garubah kali', 'negatif', ''),
(11, 'Saya Bangga naik MRT. Cepat dan nyaman', 'bangga naik mrt cepat nyaman', 'positif', ''),
(12, 'mesin tap in dan tap out nya berfungsi dengan baik', 'mesin tap in tap out nfungsi baik', 'Positif', ''),
(13, 'salut dengan mrt jakarta yang cepat sekaleeeeeeee', 'salut mrt jakarta cepat sekaleeeeeeee', 'Positif', ''),
(14, 'Kondisi dalam mrt bersih euy  :)', 'kondisi mrt bersih euy', 'Positif', ''),
(15, 'Kalo jalan-jalan nyari yang cepat dan nyaman, mrt opsi yang tepat guys !!!', 'kalo jalan nyari cepat nyaman mrt opsi tepat guys', 'Positif', ''),
(16, 'Jam kedatangan lumayan tepat waktu lah ', 'jam datang lumayan tepat waktu lah', 'Positif', ''),
(17, 'petugas nya tegas cuy. yang makan di daerah stasiun mrt di tegur langsung', 'tugas ntegas cuy mdaerah stasiun mrt tegur langsung', 'Positif', ''),
(18, 'situasi kondisi dalam mrt nya bagus sih, masih bagus karena masih baru ajah hehe', 'situasi kondisi mrt nbagus sih bagus baru ajah hehe', 'Positif', ''),
(19, 'Enaknya naik mrt tuh pas turun di beberapa stasiun udah terhubung transjakarta ', 'enak naik mrt tuh pas turun beberapa stasiun udah hubung transjakarta', 'Positif', ''),
(20, 'Karena banyak yang bilang mrt keren. Akhirnya gw pergi nyobain, eh emang sih suasana nya kayak dilaur negeri saluttttt', 'banyak bilang mrt keren akhir gw pergi nyobain eh emang sih suasana nkayak laur negeri saluttttt', 'Positif', ''),
(22, 'banyak yang ga ngerti tanda-tanda baca di stasiun MRT.', 'banyak ga ngerti tbaca stasiun mrt', 'negatif', ''),
(23, 'AC nya adem euy', 'ac nadem euy', 'positif', ''),
(24, 'di dalam terowongan mrt ga ada sinyal parah', 'terowongan mrt ga sinyal parah', 'negatif', ''),
(25, 'foodcourt di stasiun mrt ada yang punya ada yang kagak', 'foodcourt stasiun mrt punkagak', 'negatif', ''),
(26, 'petugas nya baik ramah ganteng', 'tugas nbaik ramah ganteng', 'positif', ''),
(27, 'petugas nya galak main tangan', 'tugas ngalak main tangan', 'negatif', ''),
(28, 'mesin card reader nya lama memproses nya', 'mesin card reader nlama proses nya', 'negatif', ''),
(29, 'Lampu nya terang bagus ', 'lampu nterang bagus', 'positif', ''),
(30, 'Pemberitahuan kereta datang nya telat mulu', 'pemberitahuan datang ntelat mulu', 'negatif', ''),
(31, 'tembok nya banyak corat-coret', 'tembnbanyak corat-coret', 'negatif', ''),
(32, 'jadwal kedatangan ga sesuai dengan kenyataan', 'jadwal datang ga sesuai nyata', 'negatif', ''),
(33, 'perjalanan dalam mrt terasa lama yak. kayak lambat gitu lajunya', 'jalan mrt asa lama yak kayak lambat glaju', 'negatif', ''),
(34, 'keren salut ama stasiun mrt bersih mulu', 'keren salut ama stasiun mrt bersih mulu', 'positif', ''),
(35, 'pas jam pulang kerja full terus astaga.', 'pas jam pulang kerja full terus astaga', 'negatif', ''),
(36, 'kantong parkir di sekitaran stasiun gak ada parah', 'kantong parkir stasiun gak parah', 'negatif', ''),
(37, 'tempat sampah kurang', 'tempat sampah kurang', 'negatif', ''),
(38, 'Selama belasan tahun ke kantor selalu mengendarai mobil, sejak ada MRT saya selalu menggunakan MRT dan sudah tidak bawa mobil lagi. Stress released dan kualitas hidup lebih baik', 'lama bas tahun kantor selalu kendara mobil sejak mrt selalu mrt bawa mobil stress released kualitas hidup lebih baik', 'positif', ''),
(39, 'Kenapa ac di kereta baunya kaya toilet ya? Pesing gitu. Awal saya ga percaya diceritain, pas saya naik beberapa kali dark AC selalu cium bau toilet teman saya juga nyium wangi yg sama.', 'ac bau katoilet pesing gawal ga percadiceritain pas naik beberapa kali dark ac selalu cium bau toilet teman nyium wangi yg sama', 'negatif', ''),
(40, 'Terlalu mahal buat tarifnya,mending KRL commuter line deh', 'terlalu mabuat tarif mending krl commuter line deh', 'negatif', ''),
(41, 'terbantu bgt sama ketepatan waktu dan kenyamanan MRT. *tertanda, pegawai di Ring 1', 'bantu bgt sama tepat waktu nyaman mrt tpegawai ring ', 'positif', ''),
(42, 'mau kasih komen untuk security @mrtjkt. Pelayanannya sangat ramah. The best lah', 'mau kasih komen security mrtjkt layan sangat ramah the best lah', 'positif', ''),
(43, 'Min, kayaknya pengawasan ketertiban dan kebersihan pada stasiun lebak bulus grAb kurang deh. Ada pengemis dan sampah pada salah satu pintu keluarnya. Dan ada 2 orang oknum petugas keamanan yg hanya diam saja', 'min kayak awas tertib bersih stasiun lebak bulus grab kurang deh emis sampah salah satu pintu keluar orang oknum tugas aman yg diam saja', 'negatif', ''),
(44, 'sayangnya kalo bawa sepeda lipat di @mrtjkt gak bisa duduk (selalu di usir sama security)', 'sakalo bawa sepeda lipat mrtjkt gak duduk selalu usir sama security', 'negatif', ''),
(45, 'Dari stasiun lebak bulus ke park and ride bau pesing banget Min sepanjang jalan....', 'stasiun lebak bulus park and ride bau pesing banget min panjang jalan', 'negatif', ''),
(46, 'Bila dimungkinkan mohon ada penambahan luasan parkirnya utk R2 & R4. Krn bbrp kali gk kebagian parkir (R4). Luasan bisa berbentuk gedung parkir yg mgkn lahannya bs menggunakan ex Pondok Asri? Serta adanya akses keluar tambahan (selain arah Ciputat ada exit ramp arah Batan utk R4) Jadi bs kluar ke arah Pdk Pinang maupun Fatmawati. Terima Kasih', 'bila mungkin mohon tambah luas parkir utk r r krn bbrp kali gk parkir r luas bentuk gedung parkir yg mgkn lahan bs ex pondasri akses keluar tambah searah ciputat exit ramp arah batan utk r jabs kluar arah pdk pinang maufatmawati terima kasih', 'negatif', ''),
(47, 'Aspalnya nih kyknya bs lbh bagus min sm mungkin dibuat garis garis supaya tertib. Oiya jalan dr sana ke st mrt itu ada dinding yg maaf spt banyak yg membuang air kecil disana kyknya hrs duduk bersama merumuskan solusi. Maaf cuma opini yg jelek monggo ditinggalkan', 'aspal nih kyknbs lbh bagus min sm mungkin buat garis garis tertib oijalan dr sana st mrt dinding yg maaf spt banyak yg buang air kecil sana kyknhrs duduk sama rumus solusi maaf cuma opyg jelek monggo tinggal', 'negatif', ''),
(48, 'Dari stasiun lebak bulus ke park and ride bau pesing banget Min sepanjang jalan....', 'stasiun lebak bulus park and ride bau pesing banget min panjang jalan', 'negatif', ''),
(49, 'fasilitas sangat nyaman..dalam gerbong bersih dan wangi dan menghantarkan tepat waktu terimakasih mrt!', 'fasilitas sangat nyaman gerbong bersih wangi hantar tepat waktu terimakasih mrt', 'positif', ''),
(50, 'Bener banget, kemaren lusa suprise aja jaringan HP tetap ada di area bawah tanah, jadi gak mati gaya deh, thanks #mrtjkt udah meningkatkan kualitas pelayanan', 'bener banget kemaren lusa suprise aja jaring hp tetap area bawah tanah jmati gadeh thanks mrtjkt udah tingkat kualitas layan', 'positif', ''),
(51, 'Mohon mba....sepanjang jalur trotoar keluarnya penumpang mrt dikasih kanopi agar waktu hujan bisa berteduh..', 'mohon mba panjang jalur trotoar keluar tumpang mrt kasih kanopi waktu hujan teduh', 'negatif', ''),
(52, 'yth...saya mau laporin di stasiun lbk bulus..trotoar sebrang ke poins square..kl uda sore malem..pda gelar tiker..entah sapa org2 laki perempuan duduk2 mkn nasi dll..nongkrong ngerokok...tiap hari..d trotoarnya ngambil buat pejalan kaki yg turun dr mrt...ssangat ganggu baek dari jalan kitanya maupun estetikanya....ini trotoar kan bgian fasilitas penumpang mrt..tp ditutup ama mereka. Tlg bgt ini ditindak tegas...krn sudah sangat mengganggu..security di ujung gerbang masuk jg ga pd negor....gmn mhon bantuannya admin...tks sblmnya', 'yth mau laporin stasiun lbk bulus trotoar sebrang poins square kl uda sore malem pda gelar tiker entah sapa org laki perempuan duduk mkn nasi nongkrong ngeroktiap hari d trotoar ngambil buat pejal kaki yg turun dr mrt ssangat ganggu baek jalan mauestetika trotoar kan bgian fasilitas tumpang mrt tp tutup ama tlg bgt tindak tegas krn sangat ganggu security ujung gerbang masuk jg ga pd negor gmn mhon bantu admin tks sblmnya', 'negatif', ''),
(53, '@mrtjkt Indosat belum ada signal min jd masih sulit berkomunikasi dan mengakses internet', 'mrtjkt indosat signal min jd sulit komunikasi akses internet', 'negatif', ''),
(54, 'Jaringannya @xlprioritas tidak berfungsi sesaat memasuki stasiun bawah tanah @mrtjkt', 'jaring xlprioritas fungsi pasuk stasiun bawah tanah mrtjkt', 'negatif', ''),
(55, 'Kalau di st bundaran HI ada lift kah? Pengen ajak ibu saya tapi tangganya curam sekali', 'kalau st bundar hi lift ken ajak ibu ttangga curam sekali', 'negatif', ''),
(56, ' tolong dong securitynya diberitahu untuk anak2 pada saat didalam MRT jangan jalan2 atau mondar mandir, berbahaya apalagi kalau dalam keadaan rem, bahkan saya aja pegangan.', 'dong securityndiberitahu anak mrt jangan jalan mondar mandir bahaapakalau rem bahkan aja pegang', 'negatif', ''),
(57, 'Kurang nyaman berisik bikin Pusing mahal juga, pantes sepi msh ttp setia di @commuterline', 'kurang nyaman berisik bikin pusing mapantes sepi msh ttp setcommuterline', 'negatif', ''),
(58, 'pelayanan loketnya lama ya:) saya posisi di stasiun blokm.pelayanan loketnya lama ya:) saya posisi di stasiun blokm.', 'layan loket lama posisi stasiun blokm layan loket lama posisi stasiun blokm', 'negatif', ''),
(59, 'Syg sekali pelayanan utk mndapatkan kartu single trip (bagi yg ga py emoney, flash, dll) trbilang buruk kalo boleh dibilang sgt buruk. Pngalaman hr minggu kmrn di stasiun bundaran HI, antrian sgt sgt pjg, tp staff yg melayani cm 1 org.', 'syg sekali layan utk mndapatkan kartu single trip yg ga py emoney flash trbilang buruk kalo bbilang sgt buruk pngalaman hr minggu kmrn stasiun bundar hi antri sgt sgt pjg tp staff yg layan cm org', 'negatif', ''),
(60, 'ebaran tahun ini jdiin plajaran aja buat @mrtjkt. Smoga tahun dpan lbih siap mnghadapi jumlah pnumpang yg lbih ramai dri biasanya, khususnya yg dduk2 distasiun biar lbih tegas lgi diperingati/sanksinya.', 'ebaran tahun jdiin plajaran aja buat mrtjkt smoga tahun dpan lbih siap mnghadjumlah pnumpang yg lbih ramai dri biasa khusus yg dduk stasiun biar lbih tegas lgi ingat sanksi', 'negatif', ''),
(61, 'Ramah stoller dan bayi, ganti popok di nursery stasiun nyaman', 'ramah stoller bayi ganti popnursery stasiun nyaman', 'positif', ''),
(62, 'Di antrian tiket, dgn antrian yg panjang, kenapa ga disediakan tempat duduk ya. Kasian sama yg manula, ibu hamil dan anak kecil yg ikut menunggu beli tiket. Agak miris sih liat sepasang manula berdiri menunggu anaknya beli tiket, mana antrian nya berjubel.', 'antri tiket dgn antri yg panjang ga setempat duduk kasi sama yg manula ibu hamil anak kecil yg ikut tunggu beli tiket miris sih liat pasang manula diri tunggu anak beli tiket mana antri njubel', 'negatif', ''),
(63, 'mudah-mudahan penumpang yg bawa anak2 tetap mengawasi anaknya supaya tetap tertib. tidak berlarian, baring, bahkan guling2an di lantai mrt. terima kasih tim keamanan @mrtjkt yg sdh sigap dan berani menegur penumpang yg tdk tertib', 'mudah tumpang yg bawa anak tetap awas anak tetap tertib lari baring bahkan gulingan lantai mrt terima kasih tim aman mrtjkt yg sdh sigap berani tegur tumpang yg tdk tertib', 'positif', ''),
(64, 'Di lantai 1 ga ada tempat untuk duduk, ngk di sediakan bangku atau apa ke , kurang nyaman', 'lantai ga tempat duduk ngk sebangku apa kurang nyaman', 'negatif', ''),
(65, 'ayangnya abis naik mrt terus mau ganti ke transjakarta agak jauh dari stasiun ke halte transjakartanya kalo hujan gimana ini.. ?? saya pikir seperti di stasiun lebak bulus begitu turus kita bisa langsung ganti halte trasnjakarta yang ada dibawahnya.', 'ayangnabis naik mrt terus mau ganti transjakarta jauh stasiun halte transjakartankalo hujan gimana pikir stasiun lebak bulus begturus langsung ganti halte trasnjakarta bawah', 'negatif', ''),
(66, 'lg di bikin Atap donk dari Parkiran Pasar Jumat dan Sebelah Poin Square menuju MRT Lebak Bulus ada Atap nya..klo musim hujan basah niih yg mau kerja.. gaak nyaman basah2 naik MRT .', 'lg bikin atap donk parkir pasar jumat belah poin square tuju mrt lebak bulus atap nklo musim hujan basah niih yg mau kerja gaak nyaman basah naik mrt', 'negatif', ''),
(67, 'api untuk jalan ke halte transjakartanya masih jauh sekali. Kalau sta MRT, KA Bandara dan comline sudah menyatu. ', 'jalan halte transjakartanjauh sekali kalau sta mrt ka bandara comline satu', 'negatif', ''),
(68, 'Tanda kursi prioritas agar lebih jelas, mgkn dgn warna kursi yang mencolok atau tulisan yang besar', 'tkursi prioritas lebih jelas mgkn dgn warna kursi coltulis besar', 'negatif', ''),
(69, 'bunyi berisik roda kereta mengganggu sekali', 'bunyi berisik ganggu sekali', 'negatif', ''),
(70, 'Keadaan dalam mrt rapih dah bersih', 'mrt rapih dah bersih', 'positif', ''),
(71, 'Tolong jgn izinkan anak kecil injak2 bangku mrt nya jg dong. Kadang pas mau duduk kok bangkunya kotor banget.', 'jgn izin anak kecil injak bangku mrt njg dong kadang pas mau duduk kbangku kotor banget', 'negatif', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_klasifikasi`
--

CREATE TABLE `tb_klasifikasi` (
  `id` int(11) NOT NULL,
  `komplain` text NOT NULL,
  `klasifikasi` text NOT NULL,
  `normalisasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_klasifikasi`
--

INSERT INTO `tb_klasifikasi` (`id`, `komplain`, `klasifikasi`, `normalisasi`) VALUES
(1, 'petugas tidak tegas menegur pelanggan yang nakal', 'Pelayanan', ''),
(2, 'Banyak sampah dalam mrt', 'Prasarana', ''),
(3, 'mrt telat mulu datengnya kesel', 'Konektivitas', ''),
(4, 'waktu perjalanan ga sesuai dengan jadwal. Lama banget ternyata laju mrt.', 'Konektivitas', ''),
(5, 'coba masuk ke dalam stasium mrt. Ternyata panas banget.', 'Prasarana', ''),
(6, 'Antrean terlalu panjang. Jadi lama menunggu', 'Prasarana', ''),
(7, 'Nunggu MRT dateng lama banget yak datengnya', 'Konektivitas', ''),
(8, 'mesin card reader nya lama memproses nya ', 'Prasarana', ''),
(9, 'jumlah petugas kurang di setiap stasiun mrt', 'Pelayanan', ''),
(10, 'banyak yang makan di dalam mrt', 'Pelayanan', ''),
(12, 'jorok cuy ubin staisun mrt nya.', 'Prasarana', ''),
(13, 'petugas nya kalo ditanya ga jelas. Terkadang bingung kalo ditanya.', 'Pelayanan', ''),
(14, 'dari stasiun mrt dukuh atas lanjut ke kantor naik apalagi sih ?? harusnya dibikin donk terkoneksi dengan transjakarta !!!', 'Aksesibilitas', ''),
(15, 'Banyak orang yang gatau kalo kamar mandi mrt itu air nya suka ga ada', 'Prasarana', ''),
(16, 'corat-coret banyak ada di bangku mrt', 'Prasarana', ''),
(17, 'terlalu sedikit jumlah mesin tap in nya jadinya antrean panjang banget astaga', 'Prasarana', ''),
(18, 'tarif nya mahal tapi dateng nya telat mulu. MRT', 'Konektivitas', ''),
(19, 'Dateng nya ga pernah on time', 'Konektivitas', ''),
(20, 'Coba ajah banyak petugasnya. Pasti yang makan dalam stasiun jadi cepet ketahuan', 'Pelayanan', ''),
(21, 'Toilet nya ga ada yang bersih. ', 'Prasarana', ''),
(22, 'untuk jadwal kedatangan tolong lah mrt lebih di perhatikan lagi. soalnya telat mulu', 'Konektivitas', ''),
(23, 'stasiun mrt jauh banget dari transportasi umum lainnya. Jadi bingung naik apalagi dari st mrt ke tempat lain.', 'Aksesibilitas', ''),
(24, 'coba donk lain kali kalo ada orang yang mengganjal pintu petugas nya tegor dengan cepat', 'Pelayanan', ''),
(25, 'Tarif mahal euy ', 'Pelayanan', ''),
(26, 'ga suka ama petugasnya yang galak', 'Pelayanan', ''),
(27, 'atap nya bocor euy', 'Prasarana', ''),
(28, 'jadwal kedatangan suka gajelas', 'Konektivitas', ''),
(29, 'tembok stasiun nya banyak corat-coret', 'Prasarana', ''),
(30, 'kok banyak nyamuk ya kalo malem-malem di stasiun mrt', 'Prasarana', ''),
(31, 'kalo antrean panjang itu menghalangi orang yang mau lewat. Tolong pihak mrt lebih memperhatikan lagi masalah tata ruang', 'Prasarana', ''),
(32, 'Banyak yang naik kalo kelebihan muatan tetap dipaksakan. harunya petugas menegor', 'Pelayanan', 's'),
(33, 'testestsetse', 'Pelayanan', 'testse'),
(34, 'cacat petuganya ', 'Pelayanan', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tweet`
--

CREATE TABLE `tb_tweet` (
  `id_tweet` int(10) NOT NULL,
  `tweet` text NOT NULL,
  `normalisasi` text NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `rekapitulasi` text NOT NULL,
  `keterangan` text NOT NULL,
  `hastag` varchar(30) NOT NULL,
  `lokasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tweet`
--

INSERT INTO `tb_tweet` (`id_tweet`, `tweet`, `normalisasi`, `kategori`, `rekapitulasi`, `keterangan`, `hastag`, `lokasi`) VALUES
(1, 'Karena banyak yang bilang mrt keren. Akhirnya gw pergi nyobain, eh emang sih suasana nya kayak dilaur negeri saluttttt', 'banyak bilang mrt keren akhir gw pergi nyobain eh emang sih suasana nkayak laur negeri saluttttt', 'negatif', '', '-', 'Jakarta', ''),
(2, 'saya kecewa dengan suasana dalam mrt yang sangat panas', 'kecewa suasana mrt sangat panas', 'negatif', '', '-', '#LikeMe', 'Jakarta'),
(3, 'Gua benci banget ama petugasnya l', 'gua benci banget ama tugas l', 'negatif', '', ',', '#mrtjakarta', 'jakarta'),
(4, 'bagus keretanya', 'bagus kereta', 'positif', '', 'er', 'er', 'er'),
(5, 'Gua benci banget ama petugasnya l', 'gua benci banget ama tugas l', 'negatif', '', 'sdfsdf', '234ree', 'sdfdsf'),
(6, 'Panas banget mrt', 'panas banget mrt', 'negatif', '', '', '', ''),
(7, 'Keren mrt', 'keren mrt', 'negatif', '', '', '', ''),
(8, 'Lebih lama sampai', 'lebih lama sampai', 'negatif', '', '', '', ''),
(9, 'banyak bangku rusak ', 'banyak bangku rusak', 'negatif', '', '23423', '2323', '2234'),
(10, 'jalan-jalan enaknya naik mrt keren', 'jalan enak naik mrt keren', 'negatif', '', '', '', ''),
(11, 'anak-anak bikin tempat duduk kotor karna di injek-injek bangkunya', 'anak bikin tempat duduk kotor karna injek-injek bangku', 'negatif', '', '', '', ''),
(12, 'Gua benci banget ama petugasnya l', 'gua benci banget ama tugas l', 'negatif', '', '', '', ''),
(13, 'bagus mrt nya', 'bagus mrt nya', 'positif', '', '', '', ''),
(14, 'ga jelas pegawainya', 'ga jelas pegawai', 'negatif', '', '', '', ''),
(15, 'bagus keretanya', 'bagus kereta', 'negatif', '', '', '', ''),
(16, 'banyak yang buang sampah ', 'banyak buang sampah', 'negatif', '', '', '', ''),
(17, 'petugasnya baik sih meskipun jumlah nya sedikit', 'tugas baik sih meski jumlah nsedikit', 'negatif', '', '', '', ''),
(18, 'Gua benci banget ama petugasnya l', 'gua benci banget ama tugas l', 'negatif', '', '', '', ''),
(19, 'tolong tambahkan mesin tap in tap out. antrean jadi panjang', 'tambah mesin tap in tap out antre japanjang', 'negatif', '', '', '', ''),
(20, 'kebanyakan orang jadi penuh sesak', 'banyak orang japenuh sesak', 'negatif', '', '', '', ''),
(21, 'toilet nya bau pesing. TOlong petugas lebih memperhatikan kebersihan stasun', 'toilet nbau pesing tugas lebih perhati bersih stasun', 'positif', '', '', '', ''),
(22, 'petugas lambat menangani pelanggan', 'tugas lambat tangan langgan', 'negatif', '', '', '', ''),
(23, 'anak-anak bikin tempat duduk kotor karna di injek-injek bangkunya ', 'anak bikin tempat duduk kotor karna injek-injek bangku', 'negatif', '', '', '', ''),
(24, 'pintu kereta ga berfungsi baik', 'pintu ga fungsi baik', 'negatif', '', '', '', ''),
(25, 'gila lo', 'gila lo', 'positif', '', '', '', ''),
(26, 'tepat waktu kedatangan mrt nya ', 'tepat waktu datang mrt nya', 'positif', '', '', '', ''),
(27, 'cacat petugasnya', 'cacat tugas', 'negatif', '', '', '', ''),
(28, 'keren mrt lajunya cepat. tepat waktu juga', 'keren mrt laju cepat tepat waktu juga', 'positif', '', '', '', ''),
(29, 'ada atap yang bocor di stasiun hi', 'atap bocor stasiun hi', 'negatif', '', '', '', ''),
(34, 'mrt bagus', 'mrt bagus', 'positif', '', '', '', ''),
(35, 'tepat waktu', 'tepat waktu', 'positif', '', '', '', ''),
(36, 'Gua benci banget ama petugasnya l', 'gua benci banget ama tugas l', 'negatif', '', '', '', ''),
(37, 'Keriaan hari ini...15m nyampe di downtown...cool', 'rhari m nyampe downtown cool', 'positif', '', '', '', ''),
(38, ' ini kali ke-3 saya komplain bau AC MRT yg ga enak seperti bau pesing. 2 komplain saya ga pernah di resp', 'kali ke- kompbau ac mrt yg ga enak bau pesing kompga pernah resp', 'negatif', '', '', '', ''),
(39, 'Bagus lagi ditiap gerbing MRT tersedia layanan wifi free ... so penumpang gak harus ribet dengan signal HP', 'bagus tiap gerbing mrt selayan wifi free so tumpang gak ribet signal hp', 'negatif', '', '', '', ''),
(40, 'Btw kemarin habis nyobain MRT JKT Dan mulai dari kereta, stasiun nya keren parah Udah kaya bukan di Indonesia ', 'btw kemarin habis nyobain mrt jkt mulai stasiun nkeren parah udah kabukan indonesia', 'positif', '', '', '', ''),
(41, 'Oh gitu ya, oke makasih infonta Karena kemarin tanya security di stasiun MRT Blok M di infokan kalau hanya bisa topup saja', 'gomakasih infonta kemarin tansecurity stasiun mrt blm info kalau topup saja', 'negatif', '', '', '', ''),
(42, 'Seandainya semua jakarta raya ini sudah tercover mrt ', 'semua jakarta ratercover mrt', 'positif', '', '', '', ''),
(43, 'Keriaan hari ini...15m nyampe di downtown...cool', 'rhari m nyampe downtown cool', 'positif', '', '', '', ''),
(44, 'mesin tap kartunya lebih responsif dengan kartu dari mrt nya dibanding menggunakan emoney dan sejenisnyâ€¦', 'mesin tap kartu lebih responsif kartu mrt nbanding emoney sejenisny', 'negatif', '', '', '', ''),
(45, 'Nyaman banget naik MRT. Tepat waktu, bersih. Semoga tambah pinter penggunanya dalam mengantri dan menjaga kebersihaâ€¦', 'nyaman banget naik mrt tepat waktu bersih moga tambah pinter antri jaga kebersiha', 'positif', '', '', '', ''),
(46, 'MRT Jakarta mantap sih', 'mrt jakarta mantap sih', 'positif', '', '', '', ''),
(47, 'mrt nya lambat', 'mrt nlambat', 'negatif', '', '', '', ''),
(48, 'terlalu banyak sampah di dalam mrt', 'terlalu banyak sampah mrt', 'negatif', '', '', '', ''),
(49, 'petugas nya kok ribet banget sih buat menangani hal kecil ajah.', 'tugas nkribet banget sih buat tangan kecil ajah', 'negatif', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tweets2`
--

CREATE TABLE `tb_tweets2` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `text` varchar(140) NOT NULL,
  `twid` varchar(30) NOT NULL,
  `geo` varchar(30) NOT NULL,
  `loc` varchar(30) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_crawling`
--
ALTER TABLE `tb_crawling`
  ADD PRIMARY KEY (`idc`),
  ADD UNIQUE KEY `tweet` (`tweet`);

--
-- Indexes for table `tb_datalatih`
--
ALTER TABLE `tb_datalatih`
  ADD PRIMARY KEY (`id_datalatih`);

--
-- Indexes for table `tb_klasifikasi`
--
ALTER TABLE `tb_klasifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tweet`
--
ALTER TABLE `tb_tweet`
  ADD PRIMARY KEY (`id_tweet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_crawling`
--
ALTER TABLE `tb_crawling`
  MODIFY `idc` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;

--
-- AUTO_INCREMENT for table `tb_datalatih`
--
ALTER TABLE `tb_datalatih`
  MODIFY `id_datalatih` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tb_klasifikasi`
--
ALTER TABLE `tb_klasifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_tweet`
--
ALTER TABLE `tb_tweet`
  MODIFY `id_tweet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
