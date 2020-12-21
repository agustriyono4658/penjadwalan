-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2019 at 12:03 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwal`
--

-- --------------------------------------------------------

--
-- Table structure for table `detilwo`
--

CREATE TABLE `detilwo` (
  `no_wo` varchar(11) NOT NULL,
  `id_pos` varchar(11) NOT NULL,
  `jml` varchar(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detilwo`
--

INSERT INTO `detilwo` (`no_wo`, `id_pos`, `jml`, `deskripsi`) VALUES
('WO001', '1', '12', 'asss');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `no_jdwl` varchar(11) NOT NULL,
  `no_sp` varchar(11) NOT NULL,
  `id_pelamar` varchar(11) NOT NULL,
  `tgl_jdwl` date NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`no_jdwl`, `no_sp`, `id_pelamar`, `tgl_jdwl`, `kategori`) VALUES
('JDL1967', 'SP561', 'PL4322', '2019-07-16', 'MCU'),
('JDL3565', 'SP561', 'PL4322', '2019-07-16', 'Wawancara'),
('JDL361', 'SP561', 'PL4322', '2019-07-15', 'Wawancara'),
('JDL4164', 'SP561', 'PL4322', '2019-07-15', 'MCU'),
('JDL4963', 'SP561', 'PL4322', '2019-07-15', 'Wawancara'),
('JDL7166', 'SP5663', 'PL4322', '2019-07-16', 'Psikotes'),
('JDL7562', 'SP561', 'PL4322', '2019-07-15', 'Psikotes');

-- --------------------------------------------------------

--
-- Table structure for table `klien`
--

CREATE TABLE `klien` (
  `id_klien` varchar(11) NOT NULL,
  `nmklien` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telp` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klien`
--

INSERT INTO `klien` (`id_klien`, `nmklien`, `alamat`, `telp`) VALUES
('1', 'brohid', 'asdfsdf', 823444527);

-- --------------------------------------------------------

--
-- Table structure for table `klinik`
--

CREATE TABLE `klinik` (
  `kdklinik` varchar(20) NOT NULL,
  `nmklinik` varchar(50) NOT NULL,
  `alamatklk` text NOT NULL,
  `telpklk` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klinik`
--

INSERT INTO `klinik` (`kdklinik`, `nmklinik`, `alamatklk`, `telpklk`) VALUES
('KL751', 'asdasd', 'adasd', 121211);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `idlokasi` varchar(11) NOT NULL,
  `nmlokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`idlokasi`, `nmlokasi`) VALUES
('1', 'jepara');

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

CREATE TABLE `pelamar` (
  `id_pel` varchar(11) NOT NULL,
  `nmpel` varchar(50) NOT NULL,
  `jenkel` varchar(10) NOT NULL,
  `alamatpel` text NOT NULL,
  `asalkota` varchar(50) NOT NULL,
  `notelp` int(30) NOT NULL,
  `posisiminat` varchar(50) NOT NULL,
  `cv` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`id_pel`, `nmpel`, `jenkel`, `alamatpel`, `asalkota`, `notelp`, `posisiminat`, `cv`) VALUES
('PL4322', 'asasa', 'Laki-laki', 'asas', 'jepara', 2147483647, 'developer', '5_6151967586918596680.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pewawancara`
--

CREATE TABLE `pewawancara` (
  `id_wan` varchar(11) NOT NULL,
  `namawan` varchar(50) NOT NULL,
  `alamatwan` text NOT NULL,
  `telpwan` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pewawancara`
--

INSERT INTO `pewawancara` (`id_wan`, `namawan`, `alamatwan`, `telpwan`) VALUES
('1', 'sadasdasd', 'asdasdasd', 123232323);

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `id_pos` varchar(11) NOT NULL,
  `nmpos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id_pos`, `nmpos`) VALUES
('1', 'developer'),
('POS0002', 'Tereasfd1212');

-- --------------------------------------------------------

--
-- Table structure for table `procoor`
--

CREATE TABLE `procoor` (
  `id_pro` varchar(11) NOT NULL,
  `nama_pro` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telp` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `procoor`
--

INSERT INTO `procoor` (`id_pro`, `nama_pro`, `username`, `password`, `alamat`, `telp`) VALUES
('1', 'brohid', 'brohid', 'brohid', 'asdasdfsdf', 823444527);

-- --------------------------------------------------------

--
-- Table structure for table `sp`
--

CREATE TABLE `sp` (
  `no_sp` varchar(11) NOT NULL,
  `no_wo` varchar(11) NOT NULL,
  `tgl_sp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sp`
--

INSERT INTO `sp` (`no_sp`, `no_wo`, `tgl_sp`) VALUES
('SP561', 'WO001', '2019-07-14'),
('SP5663', 'WO001', '2019-07-16'),
('SP7862', 'WO001', '2019-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` varchar(11) NOT NULL,
  `nama_staff` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telp` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `nama_staff`, `username`, `password`, `alamat`, `telp`) VALUES
('1', 'brohid', 'brohid', 'brohid', 'asd', 823444527);

-- --------------------------------------------------------

--
-- Table structure for table `tmpttest`
--

CREATE TABLE `tmpttest` (
  `kdtmpt` varchar(11) NOT NULL,
  `nmtmpt` varchar(50) NOT NULL,
  `alamattmpt` text NOT NULL,
  `telptmpt` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmpttest`
--

INSERT INTO `tmpttest` (`kdtmpt`, `nmtmpt`, `alamattmpt`, `telptmpt`) VALUES
('TS2001', 'dfgdfg', 'sdfgsdfg', 344543);

-- --------------------------------------------------------

--
-- Table structure for table `undmcu`
--

CREATE TABLE `undmcu` (
  `no_undmcu` varchar(11) NOT NULL,
  `no_jdwl` varchar(11) NOT NULL,
  `kdklinik` varchar(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `undmcu`
--

INSERT INTO `undmcu` (`no_undmcu`, `no_jdwl`, `kdklinik`, `tgl`) VALUES
('MCU101', 'JDL4164', 'KL751', '2019-07-15'),
('MCU112', 'JDL4164', 'KL751', '2019-07-15'),
('MCU6313', 'JDL4164', 'KL751', '2019-07-15'),
('MCU2414', 'JDL4164', 'KL751', '2019-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `undpsikotes`
--

CREATE TABLE `undpsikotes` (
  `no_undpsi` varchar(11) NOT NULL,
  `no_jdwl` varchar(11) NOT NULL,
  `kdtmpt` varchar(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `undpsikotes`
--

INSERT INTO `undpsikotes` (`no_undpsi`, `no_jdwl`, `kdtmpt`, `tgl`) VALUES
('UP831', 'JDL7562', 'TS2001', '2019-07-16'),
('UP8032', 'JDL7562', 'TS2001', '2019-07-16'),
('UP3833', 'JDL7562', 'TS2001', '2019-07-17'),
('UP5934', 'JDL7562', 'TS2001', '2019-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `undwawancara`
--

CREATE TABLE `undwawancara` (
  `no_undangan` varchar(11) NOT NULL,
  `no_jdwl` varchar(11) NOT NULL,
  `id_wan` int(11) NOT NULL,
  `tgl_und` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `undwawancara`
--

INSERT INTO `undwawancara` (`no_undangan`, `no_jdwl`, `id_wan`, `tgl_und`) VALUES
('UW931', 'JDL361', 1, '2019-07-16'),
('UW931', 'JDL361', 1, '2019-07-16'),
('UW2732', 'JDL361', 1, '2019-07-16'),
('UW8733', 'JDL4963', 1, '2019-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `wo`
--

CREATE TABLE `wo` (
  `no_wo` varchar(11) NOT NULL,
  `id_klien` int(11) NOT NULL,
  `tgl_wo` date NOT NULL,
  `idlokasi` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wo`
--

INSERT INTO `wo` (`no_wo`, `id_klien`, `tgl_wo`, `idlokasi`) VALUES
('WO001', 1, '2019-07-14', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`no_jdwl`);

--
-- Indexes for table `klien`
--
ALTER TABLE `klien`
  ADD PRIMARY KEY (`id_klien`);

--
-- Indexes for table `klinik`
--
ALTER TABLE `klinik`
  ADD PRIMARY KEY (`kdklinik`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_pel`);

--
-- Indexes for table `pewawancara`
--
ALTER TABLE `pewawancara`
  ADD PRIMARY KEY (`id_wan`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id_pos`);

--
-- Indexes for table `procoor`
--
ALTER TABLE `procoor`
  ADD PRIMARY KEY (`id_pro`);

--
-- Indexes for table `sp`
--
ALTER TABLE `sp`
  ADD PRIMARY KEY (`no_sp`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `tmpttest`
--
ALTER TABLE `tmpttest`
  ADD PRIMARY KEY (`kdtmpt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
