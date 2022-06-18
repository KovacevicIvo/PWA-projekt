-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 04:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `pwaprojekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(20) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(10000) NOT NULL,
  `razina` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `username`, `pass`, `razina`) VALUES
(1, 'Ivo', 'Kovacevic', 'test', '$2y$10$LxoncmUuG8wnblP0ZB2GleR8rID.8s8PReN1wcVDItgUCOZC5rFyu', 0),
(2, 'Ivo', 'Kovacevic', 'admin', '$2y$10$7l2H.6Tnow4h3NMIET14Zu61mBSJT9dzUaRrqH1XrqZiZsFMcDq3O', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(20) NOT NULL,
  `datum` date DEFAULT NULL,
  `naslov` varchar(255) NOT NULL,
  `opis` varchar(255) NOT NULL,
  `sadrzaj` varchar(1000) NOT NULL,
  `slika` longblob NOT NULL,
  `kategorija` varchar(32) NOT NULL,
  `arhiva` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `opis`, `sadrzaj`, `slika`, `kategorija`, `arhiva`) VALUES
(1, '2022-06-16', 'TKO SU DINAMOVI PROTIVNICI?', 'Dinamo europsko putovanje otvara s boljim iz dvoboja prvaka Gibraltara i Sjeverne Makedonije', 'Tko su, dakle, Škupi i Lincoln Red Imps? Prvak Sjeverne Makedonije klub je iz Skoplja, iz naselja Čair, koji je, neslužbeno, i u srcima navijača i nekih klupskih dužnosnika nasljednik Sloge Jugomagnat, kluba koji je triput bio prvak (Sjeverne) Makedonije. A onda je 2012. zapao u financijske probleme te se s klubom Albarsi fuzionirao u Škupi.', 0x73706f7274362e6a7067, 'SPORT', 1),
(2, '2022-06-16', 'TREĆLIGAŠ DOBIVA STADION', 'Uz nogometni stadion predviđena je i gradnja cijelog sportskog kompleksa.', 'Sportska infrastruktura u Hrvatskoj u pravilu ne izgleda baš najbolje, a po cijeloj Lijepoj našoj za održavanje iste nedostaje novca. Ulaganja možemo nabrojati na prste jedne ruke, ali ono u Dugom Selu je uistinu spektakularno. Naime, tamošnje gradsko rukovodstvo najavilo je izgradnju sportsko edukativnog centra u čijem je središtu nogometni stadion. Uz njega bi se gradilo još nekoliko nogometnih terena, dvije dvorane, teniski teren, kuglanu, malonogometni tereni te hostel za mlade sportaše.', 0x73706f7274352e6a7067, 'SPORT', 1),
(3, '2022-06-16', 'UOČI UTAKMICE U LJUBLJANI', 'Izbornik reprezentacije se na početku priprema suočio s još jednim otkazom', '- Mario je sjajan momak koji obožava košarku i on će sigurno biti jedan od naših lidera, a vodit će ovu reprezentaciju još godinama. Pokazao je u protekloj sezoni svoj raskošni talent, ali i zrelost. Drago mi je da je s nama, njegova kvalititeta i energija značit će nam puno. Može Mario pokriti četiri pozicije, nisam baš siguran da bih igrao s njim na centru, ali da ga stavim i na tu poziciju, on bi i to zaigrao. Zadovoljan sam što su svi ovdje, a ja sam inzistirao da budemo tu od prvog dana.', 0x73706f7274342e6a7067, 'SPORT', 1),
(4, '2022-06-16', 'NAVUKO BIJES JEDNOM REČENICOM', 'Izjavu nekad čuvenog trenera mnogi su shvatili kao rasističku i odmah burno reagirali...', 'Jedna rečenica Arsenea Wengera o Kylianu Mbappéu podigla je puno prašine na drugim kontinentima. Trener koji je već nekoliko godina u mirovini analizirao je jedan detalj kod francuskog napadača kojeg je većina proglasila rasističkim.\r\n\r\n- Da je Kylian rođen u Kamerunu, ne bi postao napadač kakav je danas. Postoji Europa i postoji ostatak svijeta - rekao je bivši trener Arsenala i sadašnji šef nogometne strategije u FIFI. Ovu su izjavu mnogi savezi, uključujući najviše nogometne organizacije, odmah shvatili kao rasističku.', 0x73706f7274332e6a7067, 'SPORT', 1),
(5, '2022-06-16', 'HAJDUK RASKINUO UGOVOR...', 'Splitski klub je objavio kako je raskinut ugovor s vratarem koji je na Poljud došao 2018. godine.', 'Josip je na Poljud stigao u ljeto 2018. godine iz talijanskog Palerma te je u prethodne četiri sezone upisao ukupno 81 službeni nastup. Debitirao je u kvalifikacijama za Europsku ligu u susretu protiv Slavije iz Sofije koji završio 1:0 pobjedom Bijelih. Posljednji nastup upisao je 29. kolovoza prošle godine u 2:1 porazu od Rijeke na Poljudu.', 0x73706f7274322e6a7067, 'SPORT', 1),
(6, '2022-06-16', 'VELIKO PRIZNANJE ZA NOVU ZVIJEZDU', 'Hrvatska je dobila nekoliko sjajnih mladih igrača na utakmicama Lige nacija, a to potvrđuju i brojke.', 'Josip Šutalo oduševio je nogometnu Europu svojim igrama u dresu hrvatske reprezentacije. Mladi Dinamov stoper debitirao je za Vatrene u Kopenhagenu protiv Danske i na toj utakmici ostavio odličan dojam, a samo tri dana poslije briljirao je i protiv Francuske u Parizu.', 0x73706f7274312e6a7067, 'SPORT', 1),
(7, '2022-06-16', 'NOVI ALBUM KENDRICKA LAMARA', 'Da se nova izdanja ove hip-hop ikone čekaju s nestrpljenjem i da Kendrick Lamar nikad ne razočara, dokaz je i...', 'Od trenutka kada je objavljen, album ne prestaje biti jedna od najvrućih tema društvenih mreža i svjetskih medija. „Mr. Morale & The Big Steppers“ Kendricka Lamara također bilježi vrtoglave rezultate slušanja na glazbenim platformama. Album sadrži 18 pjesama, podijeljenih u dva dijela.', 0x676c617a6261362e6a7067, 'GLAZBA', 1),
(8, '2022-06-16', 'TURNEJA BRUCE SPRINGSTEENA', 'Bruce Springsteen i The E Street Band obilježit će svoj povratak na koncertne pozornice početkom veljače 2023. nizom najavljenih nastupa', 'Bruce Springsteen i The E Street Band obilježit će svoj povratak na koncertne pozornice početkom veljače 2023. nizom najavljenih nastupa u arenama u SAD-u, nakon čega slijede nastupi na europskim stadionima koji počinju 28. travnja u Barceloni, a potom i druga turneja po Sjevernoj Americi koja počinje u kolovozu.', 0x676c617a6261352e6a7067, 'GLAZBA', 1),
(9, '2022-06-16', 'PREMINUO ANDY FLETCHER', 'Andy Fletch Fletcher, suosnivač i klavijaturist benda Depeche Mode preminuo je u 60. godini života, a vijest je potvrdio sam', '“Fletch je imao pravo zlatno srce i uvijek je bio tu kada vam je bila potrebna podrška, živahan razgovor, dobar smijeh ili hladna pinta. Naša srca su uz njegovu obitelj i molimo vas da ih zadržite u svojim mislima i poštujete njihovu privatnost u ovom teškom trenutku”, rekao je bend. Fletcher je navodno umro prirodnom smrću.', 0x676c617a6261342e6a7067, 'GLAZBA', 1),
(10, '2022-06-16', 'REPERICA M.I.A. NAJAVILA NOVI ALBUM', 'Ponajbolja svjetska reperica, glazbenica oko koje se vežu razne kontroverze, objavila je novi singl i spot “The One” i najavila', 'Pjesmu “The One” producirali su Rex Kudo i T-Minus, a naći će se na albumu koji će se zvati “MATA”. Nasljednik je to albuma “AIM”, a bit će objavljen također za Island Records za koji je reperica potpisala novi ugovor. Pjesmu prati i videospot koji je dan kasnije objavljen na njezinom YouTube kanalu. Za sada nema datuma objave albuma.', 0x676c617a6261332e6a7067, 'GLAZBA', 1),
(11, '2022-06-16', 'HARRY STYLES OSVAJA SVIJET', 'Dugoiščekivani album Harryja Stylesa, „Harry´s House“, oduševio je i kritiku i publiku, a najavni singl „As It Was“ je zavladao', 'Singl je odmah nakon izlaska debitirao kao #1 u SAD-u i Ujedinjenom Kraljevstvu: “As It Was” je postala najstrimanija pjesma u jednom danu u SAD-u u povijesti Spotifyja, a ujedno i najstrimanija pjesma globalno u jednom danu u 2022. godini! Spot za taj hit singl je trenutačno na YouTubeu među najpopularnijim glazbenim videospotovima na svijetu – u manje od dva mjeseca je na YouTubeu skupio gotovo 150 milijuna pregleda!', 0x676c617a6261322e6a7067, 'GLAZBA', 1),
(12, '2022-06-16', 'MUSE OTKRILI “WILL OF THE PEOPLE”', 'Trećim singlom koji instantno osvaja kritiku Muse najavljuju istoimeni album kojeg ćemo dočekati već ovo ljeto. Dodatno uzbuđenje kod fanova', 'Jedna od najvećih rock atrakcija, grupa Muse objavila je svoj najnoviji singl ‘’Will of the People’’, ujedno treći po redu kojim najavljuju istoimeni album kojeg ćemo dočekati već 26. kolovoza zahvaljujući Warner Musicu i Dancing Bearu. Početkom godine bend je predstavio prve hitove s nadolazećeg studijskog izdanja, pjesme ‘’Compliance’’ i ‘’Won’t Stand Down’’, koje su uz pozitivne kritike zaradile i titule ‘’pravih klasika’’ (NME).', 0x676c617a6261312e6a7067, 'GLAZBA', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;