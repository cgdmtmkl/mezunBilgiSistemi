-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 24 May 2024, 21:40:53
-- Sunucu sürümü: 8.0.30
-- PHP Sürümü: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `mezun`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `egitim_bilgileri`
--

CREATE TABLE `egitim_bilgileri` (
  `ad` varchar(25) NOT NULL,
  `soyad` varchar(25) NOT NULL,
  `akademikEgitim` varchar(20) NOT NULL,
  `baslangic` date NOT NULL,
  `bitis` date NOT NULL,
  `ulke` varchar(15) NOT NULL,
  `sehir` varchar(15) NOT NULL,
  `universite` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `egitim_bilgileri`
--

INSERT INTO `egitim_bilgileri` (`ad`, `soyad`, `akademikEgitim`, `baslangic`, `bitis`, `ulke`, `sehir`, `universite`) VALUES
('Çiğdem', 'Tümüklü', 'Önlisans', '2022-09-01', '2024-06-30', 'Türkiye', 'Ankara', 'Başkent Üniversitesi'),
('Melih Önem', 'Aksu', 'Yüksek Lisans', '2018-05-01', '2022-06-30', 'Türkiye', 'İstanbul', 'İstanbul Teknik Üniversitesi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `is_bilgileri`
--

CREATE TABLE `is_bilgileri` (
  `user_id` int NOT NULL,
  `iseGirisTarihi` date NOT NULL,
  `istenAyrilisTarihi` date NOT NULL,
  `kamu/ozel` varchar(10) NOT NULL,
  `sektor` varchar(15) NOT NULL,
  `unvan` varchar(30) NOT NULL,
  `pozisyon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `is_bilgileri`
--

INSERT INTO `is_bilgileri` (`user_id`, `iseGirisTarihi`, `istenAyrilisTarihi`, `kamu/ozel`, `sektor`, `unvan`, `pozisyon`) VALUES
(8, '2024-09-01', '2027-05-18', 'Özel', 'Bilişim', 'Tekniker', 'Yazılım Teknikeri');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kayit_ekle`
--

CREATE TABLE `kayit_ekle` (
  `user_id` int NOT NULL,
  `ogrenciNo` int NOT NULL,
  `ad` varchar(20) NOT NULL,
  `soyad` varchar(20) NOT NULL,
  `mezuniyetTarihi` date NOT NULL,
  `cepTel` varchar(15) NOT NULL,
  `eposta` varchar(50) NOT NULL,
  `evTel` varchar(15) NOT NULL,
  `evUlke` varchar(10) NOT NULL,
  `evSehir` varchar(10) NOT NULL,
  `evAdres` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `kayit_ekle`
--

INSERT INTO `kayit_ekle` (`user_id`, `ogrenciNo`, `ad`, `soyad`, `mezuniyetTarihi`, `cepTel`, `eposta`, `evTel`, `evUlke`, `evSehir`, `evAdres`) VALUES
(7, 22297943, 'Çiğdem', 'Tümüklü', '2024-06-30', '5526692436', 'mlktumuklu@gmail.com', '----', 'Türkiye', 'Ankara', 'yeni bağlıca mah. bahçelievler sitesi 3.kısım sedef apt. kat:1 daire:1  etimesgut/ankara'),
(8, 22233344, 'Ali', 'Türk', '2024-06-10', '05555555555', 'aliturk@gmail.com', '03123125555', 'Türkiye', 'ANKARA', 'Mustafa Kemal mah. Dumlupınar blv.   Çankaya/Ankara');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(75) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `user_type` enum('student','academic') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_type`) VALUES
(1, 'cigdemT', '$2y$10$tKtRDVYMWTpOM7JUI4aRaeaeJMuTs2MIwrzCImIezarDJWzJ.pa5y', 'student'),
(2, 'tumuklu', '$2y$10$UW6y6uy1OI1ns8PJ9StFKelewLS4jCTmDuY4QsS4ypi48Flqmclka', 'academic'),
(4, 'cgdmt', '$2y$10$5eNJ4JTk/epUAvCmWR7qWe.MJfcKEHkcpwj4MC.AUTZv1gzNiTkoK', 'student'),
(6, 'mlk', '$2y$10$5eNJ4JTk/epUAvCmWR7qWe.MJfcKEHkcpwj4MC.AUTZv1gzNiTkoK', 'student'),
(7, '22297943', '$2y$10$5ttdRYCJYM/hQ2fvT2Ly.efMOFYeurFqG5knbtVQCckJjDx1l7WWq', 'student'),
(8, '22297943@mail.baskent.edu.tr', '$2y$10$yhvnh65IVwEgmAIb0oPC4eqB1k2hRUju9enHmpwHYMySeesVF6rIS', 'student'),
(9, '', '$2y$10$Q8oXuFCcrejdeNKQ8GxdsOdcFlPJN0kqz8QtR9wDu/o8VZ8yycR4y', 'student'),
(10, 'aliturk@gmail.com', '$2y$10$Wt0z9uwsOA/Q8MbP6NMETe0/FhxHTkf2nbUCRewQr0Vp27uH/8tj6', 'student');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `is_bilgileri`
--
ALTER TABLE `is_bilgileri`
  ADD PRIMARY KEY (`user_id`);

--
-- Tablo için indeksler `kayit_ekle`
--
ALTER TABLE `kayit_ekle`
  ADD PRIMARY KEY (`user_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `is_bilgileri`
--
ALTER TABLE `is_bilgileri`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `kayit_ekle`
--
ALTER TABLE `kayit_ekle`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `is_bilgileri`
--
ALTER TABLE `is_bilgileri`
  ADD CONSTRAINT `is_bilgileri_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Tablo kısıtlamaları `kayit_ekle`
--
ALTER TABLE `kayit_ekle`
  ADD CONSTRAINT `kayit_ekle_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
