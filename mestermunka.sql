-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 01:41 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mestermunka`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userID` text NOT NULL,
  `productID` int(11) NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `sku` varchar(64) CHARACTER SET utf8 NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(16) CHARACTER SET utf8 NOT NULL,
  `color` varchar(64) CHARACTER SET utf8 NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userID`, `productID`, `name`, `sku`, `price`, `size`, `color`, `quantity`) VALUES
(174, '2021052760affc4a64e19', 3, 'Vintage Inspired Classic', 'vintage-inspired-classic', 150000, 'XS', 'BLACK', 3),
(175, '2021052760affc4a64e19', 8, 'Pieces Metallic Printed', 'pieces-metallic-printed', 37500, 'XXS', 'WHITE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`counter`) VALUES
(15);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `userID` text NOT NULL,
  `surname` varchar(64) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(64) CHARACTER SET utf8 NOT NULL,
  `username` varchar(32) CHARACTER SET utf8 NOT NULL,
  `email` tinytext CHARACTER SET utf8 NOT NULL,
  `password` text CHARACTER SET utf8 NOT NULL,
  `postcode` varchar(32) CHARACTER SET utf8 NOT NULL,
  `country` varchar(32) CHARACTER SET utf8 NOT NULL,
  `county` varchar(64) CHARACTER SET utf8 NOT NULL,
  `city` varchar(64) CHARACTER SET utf8 NOT NULL,
  `streetHouseNumber` varchar(64) CHARACTER SET utf8 NOT NULL,
  `optional` varchar(64) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `userID`, `surname`, `firstname`, `username`, `email`, `password`, `postcode`, `country`, `county`, `city`, `streetHouseNumber`, `optional`) VALUES
(3, '2021052660aeb5ae7066d', 'Kovacs', 'Ferenc', 'ferenc', 'aks@gmail.com', '$2y$10$5WNQiTd2Vny4tfJpuBHegOvKxY2GtKCUwvedqHi9IZ2LYYRuq5W3W', '6800', 'Hungary', 'Pest', 'Hódmezővásárhely', 'Zrínyi utca', ''),
(4, '2021052760af976c07be9', 'Molnar', 'Csilla', 'csilka', 'csilka@gmail.com', '$2y$10$BbFg3kNem86Dk9PQ4kV25OwkkNL1DaYwWfrUGamqTYaik4HZiPnWG', '5946', 'Hungary', 'Bekes', 'Bekessamson', 'Kövér Lőrinc utca 120.', 'Laura házától nem messze.'),
(5, '2021052760affc4a64e19', 'Balázs', 'Máté', 'bmate', 'mate1@gmail.com', '$2y$10$dZ3vl2j440raIhvPF4JhbudfI609mO8mc9w8gcd5HdyFmTS3OwRUO', '6800', 'Hungary', 'Csongrad-Csanad', 'Hódmezővásárhely', 'Zrínyi utca', ' 63.'),
(6, '2021060360b8c3cf18a66', 'Balázs', 'Máté', 'mate', 'balazs.mate2002@gmail.com', '$2y$10$jeyeDpo6Y5oFx2IT6kHbt.2hIZwotDou7/7PRlshAKJRsoVXY95pG', '6800', 'Hungary', 'Csongrad-Csanad', 'Hódmezővásárhely', 'Halász utca 10/A', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `order` tinyint(4) NOT NULL,
  `module` varchar(64) CHARACTER SET utf8 NOT NULL,
  `title` varchar(64) NOT NULL,
  `url` text CHARACTER SET utf8 NOT NULL,
  `location` varchar(64) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `order`, `module`, `title`, `url`, `location`) VALUES
(1, 1, 'main', 'Főoldal', '', 'main,rightside'),
(2, 2, 'shop', 'Áruház', 'aruhaz', 'main'),
(3, 15, '', 'Facebook', 'https://www.facebook.com/', 'footer1,rightside'),
(4, 3, 'contact', 'Kapcsolat', 'kapcsolat', 'main,rightside,footer1'),
(5, 4, 'aboutUs', 'Rólunk', 'rolunk', 'main,rightside,footer1'),
(7, 6, 'singleItem', 'Termék', 'item/', ''),
(8, 5, 'cart', 'Kosár', 'kosar', 'main'),
(10, 6, 'login', 'Bejelentkezés', 'bejelentkezes', 'main'),
(11, 6, 'register', 'Regisztrálás', 'regisztralas', ''),
(12, 9, 'logout', 'Kijelentkezés', 'logout', 'main,rightside'),
(13, 0, 'checkout', 'Kicsekkolás', 'kicsekkolas', ''),
(14, 7, 'profile', 'Profil', 'profil', 'main,rightside');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `sku` text CHARACTER SET utf8 NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(64) CHARACTER SET utf8 NOT NULL,
  `color` varchar(64) CHARACTER SET utf8 NOT NULL,
  `size` varchar(16) CHARACTER SET utf8 NOT NULL,
  `discount` int(11) NOT NULL,
  `discountTime` date NOT NULL,
  `description` text NOT NULL,
  `product_status` bit(1) NOT NULL,
  `pictures` text CHARACTER SET utf8 NOT NULL,
  `sold` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `rating` bigint(20) NOT NULL,
  `countOfRatings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `sku`, `price`, `category`, `color`, `size`, `discount`, `discountTime`, `description`, `product_status`, `pictures`, `sold`, `stock`, `rating`, `countOfRatings`) VALUES
(1, 'Calvin Klein fehér nôi póló', 'calvin-klein-feher-noi-polo', 25000, 'women', 'white,blue,black', 'm,s,l,xxl', 17000, '2021-02-12', 'Sed molestie mi diam, id dapibus tellus dictum non. Phasellus ut rutrum elit, et sodales tellus. Phasellus aliquet erat libero, at condimentum turpis molestie eu. Mauris ut dapibus purus, quis aliquam purus. Ut a lorem at risus varius fermentum. Morbi mollis purus a elit pulvinar, sit amet lacinia orci consectetur. Pellentesque ullamcorper luctus justo, feugiat aliquet odio placerat ut. Curabitur quis finibus nibh. Suspendisse potenti.', b'1', '5', 5, 7, 7, 2),
(2, 'Fehér ing', 'feher-ing', 50000, 'women', 'white,red', 's,m,l', 0, '0000-00-00', 'Maecenas ultrices tellus orci, id viverra sapien egestas maximus. Pellentesque auctor non elit a pharetra. Praesent in facilisis purus, sit amet feugiat ex. Suspendisse bibendum leo sit amet dui auctor, vitae vulputate magna mollis. Integer sed auctor felis, vitae semper eros. Cras et justo ut erat sagittis interdum. Nulla sed interdum leo. Quisque eget accumsan massa, sed elementum massa. Integer mollis enim nulla, et faucibus justo lacinia non.', b'1', '3', 10, 23, 9, 5),
(3, 'Kék kockás ing', 'kek-kockas-ing', 50000, 'man', 'blue,yellow,orange', 'l,xxl', 0, '0000-00-00', 'Nagyon szep kek ing', b'1', '3', 127, 241, 9, 2),
(4, 'Vintage Inspired Classic', 'vintage-inspired-classic', 150000, 'watches', 'black,grey', 'xs,s,m,l,xl,xxl', 120000, '2021-01-30', 'Suspendisse erat mi, eleifend eget accumsan at, efficitur quis velit. Sed mollis dui dolor, eget euismod nulla imperdiet et. Donec vulputate urna eget dignissim accumsan. Nunc porttitor neque id dignissim cursus. In hac habitasse platea dictumst. Phasellus at placerat erat. Nulla tempor tortor lacus, et molestie mi luctus ut. Mauris id odio in massa rutrum tempus quis non purus. Mauris accumsan convallis tortor non dictum. Fusce varius nulla at est finibus, sit amet sollicitudin lorem dapibus. Phasellus ut tempor dui, eget vehicula velit. Morbi nulla diam, sagittis congue metus a, accumsan ultrices orci.', b'1', '2', 15, -2, 14, 6),
(5, 'Marvel póló', 'marvel-polo', 6500, 'women', 'black', 'm,l,xl,xxl', 0, '0000-00-00', '', b'1', '4', 16, 14, 9, 2),
(6, 'Elsőzsebes Pullover', 'elsozsebes-pullover', 14000, 'women', 'yellow', 'xxs,l', 0, '0000-00-00', 'Kerlek vedd meg, csorok vagyunk', b'1', '4', 4, 21, 10, 2),
(7, 'Kék stretch női farmer', 'kek-stretch-noi-farmer', 40000, 'women', 'blue', 'm,l', 37000, '2021-02-22', 'Fason relaxed. - Szűkített nadrágszár. - Cipzározható zsebek. - Hátsó zsebbel. - Magasított derék. - Zárás gombbal és cipzárral. - Dekoratív rojtok. - Dekoratív koptatás. - Derék szélesség: 35 cm. - Csípő szélessége: 45 cm. - Derék magassága: 28,5 cm. - Nadrágszár szélessége alul: 15,5 cm. - Nadrágszár szélessége: 23,5 cm. - Szárhossz: 63 cm. - Hosszúság: 92 cm. - Megadott méret: S.  Összetétel: 100% pamut', b'1', '3', 2, 10, 10, 6),
(8, 'Rövid kék felső', 'rovid-kek-felso', 42000, 'women', 'white,black', 'xxs,xl', 37500, '2021-08-13', 'rövid szabás, szabadidőbe nagyon kellemes. Nyáron kihagyhatatlan ruha darab.', b'1', '4', 4, 86, 13, 9),
(9, 'Converse All Star Hi Plimsolls', 'converse-all-star-hi-plimsolls', 17500, 'shoes', 'black,white', 'xs,m,xxl', 0, '0000-00-00', 'Konzerz, vegyed, egyed', b'1', '1', 121, 25, 10, 5),
(12, 'Apple óra', 'apple-ora', 215000, 'watches', 'black,white,yellow', 'xs,m,xxl', 175000, '2021-09-23', 'A híres nevezetes Apple óra megjelent boltunkban! Az új intel processzor villámgyors sebességet biztosít. A 4200-miliamperes akkumlátor többnapos használatot engedélyez a vevő számára.', b'1', '4', 1, 99, 6, 2),
(14, 'Nike Sneeaker', 'nike-sneeaker', 37000, 'shoes', 'red,black,yellow', '39,40,42.5,46,47', 0, '0000-00-00', '2002-es debütálása óta először lendül újra akcióba ez a ritka stílus. A legújabb változat megtartja az eredeti modell organikus színpalettáját és kontrasztos színblokkjait, puha bőr rátétekkel, valamint a bozótszín, a világos csontszín és a makkbarna élénk árnyalataival, melyek tovább erősítik a stílus természetes érzetét. Ne hagyd, hogy ez a népszerű színskála másodjára is kicsússzon az ujjaid közül.', b'1', '4', 27, -12, 6, 2),
(15, 'Nike AirMax', 'nike-airmax', 42000, 'shoes', 'black,pink,white,yellow,red,brown', '37,38,39,40,41,4', 29500, '2021-06-06', 'Az új modell a Nike márkaépítésének alapkövét jelentő, forradalmi cipőből merít ihletet, és megidézi a futópályák nosztalgikus stílusát, miközben olyan új technikai áttöréseket is felvonultat, amelyek az Air új korszakának zászlóshajói.  A reduktív koncepciónak köszönhetően a gyorsaságot idéző megjelenés teljesen új módon teszi láthatóvá az Air egységet, és az így létrehozott kompresszió egyedülállóan puha ruganyosságot eredményez a sarokrészen. A tervezés során fenntartható anyagokat is felhasználtunk, így minden pár cipő a tömegét tekintve legalább 20%-ban újrahasznosított anyagokból készült.', b'1', '5', 0, 250, 1, 1),
(16, 'FC Barcelona 2020-2021 Stadium idegenbeli mez', 'fc-barcelona-2020-2021-stadium-idegenbeli-mez', 80500, 'man', 'black', 's,m,l,xl', 0, '0000-00-00', 'Képviseld a csapatodat az FC Barcelona Stadium idegenbeli mezben. Kiválóan szellőző anyagból készült, amely elvezeti az izzadságot a bőrödről, így hűs viseletet biztosít a pályán vagy a csapatodnak szurkolva a lelátón. Ez a termék 100%-ban újrahasznosított poliészter felhasználásával készült.', b'1', '10', 0, 10, 5, 1),
(17, 'ULTRABOOST X 3D', 'ultraboost-x-3d', 65000, 'shoes', 'black,white', '36,40,41,43,44', 63500, '2021-07-09', 'Stella McCartney 2005 óta együttműködik az adidasszal, hogy innovatív, teljesítményvezérelt edzőruhákat készítsen a nők számára. Minden egyes láblövéssel ezek az ultrakönnyű cipők feltöltik a lépésedet a Boost párnázás energia-visszatérésével. Elegáns felcsúszásként tervezték őket varrat nélküli, teljesen kötött, zoknikszerű felsőrésszel. 10K futáshoz ideális, a rugalmas talp és a kompressziós illesztésű ív alkalmazkodik a lábának természetes hajlításához, hogy egyenletes, erőteljes lépéseket tegyen lehetővé.', b'1', '5', 0, 30, 0, 0),
(18, 'Space Hippie 01 – Wolf Grey', 'space-hippie-01-–-wolf-grey', 45000, 'shoes', 'grey', '40,41,43,45', 28501, '2021-09-01', 'A Space Hippie a hulladék átalakulásának a történetét jeleníti meg. A felsőrésztől a külső talpig a Space Hippie 01 tömegének legalább 50%-át újrahasznosított alapanyagok teszik ki.  Az „űrhulladék-szálakból” szőtt felsőrész mintegy 85%-ban tartalmaz újrahasznosított műanyag palackokból, pólókból és szálhulladékokból előállított újrahasznosított poliésztert. A Nike Grind alapanyagból és szivacskeverékből készített puha Crater hab középtalp stabilitást és egyedi megjelenést biztosít, míg a cipő ZoomX habszivacs-hulladékból készített talpbetétje ugyanazt a fajta párnázást kínálja, mint amely a Nike NEXT% futócipőknél a tökéletes futásélményt garantálja.  Lecseréltük a dupla dobozt, és mostantól újrahasznosított anyagokból készült, növényalapú festékkel nyomtatott, szimpla dobozban szállítjuk ki a Space Hippie cipőket. Törekvéseink eredménye pedig az eddigi legkisebb ökológia lábnyomú termékeink közé tartozó Nike Space Hippie kollekció.', b'1', '5', 8, 0, 5, 1),
(19, 'GG Fekete kis futószatyor', 'gg-fekete-kis-futoszatyor', 260000, 'bags', 'black', 'one size', 0, '0000-00-00', 'Az 1970-es években először használt GG logó az 1930-as évek eredeti Gucci rhombi kialakításának fejlődése volt, és ettől kezdve a Gucci örökségének bevett szimbóluma. Ez a kis küldött táska ötvözi az aláírás motívumát a webcsíkkal - egy időtlen párosítással, amely tiszteleg a Gucci gyökerei előtt.', b'1', '5', 2, 3, 4, 1),
(20, 'Louis Vuitton x x Comme Des Garçons lyukakat égetett monogram táska', 'louis-vuitton-x-x-comme-des-garcons-lyukakat-egetett-monogram-taska', 50000, 'bags', 'brown', 'one size', 45000, '2021-08-15', 'Sötétbarna és bézs színű bőr x A Comme Des Garçons lyukakat égetett monogramos táska a Louis Vuitton-tól, monogrammintával, aranyszínű hardverrel, kerek felső fogantyúkkal, belső logótapasszal, függő poggyászcímkével, húzózsinórzárral és kivehető béléssel . Kérjük, vegye figyelembe, hogy ez a darab előző életet élt, és kisebb tökéletlenségen keresztül elmondhatja történetét. Ennek a terméknek a megvásárlása folytatja az elbeszélést, így biztos lehet benne, hogy POZITÍVAN TUDATOS választást választ a bolygó számára. Ehhez a termékhez porzsák tartozik.', b'1', '2', 0, 8, 0, 0),
(29, 'Mr. Jones Tökéletesen haszontalan délután', 'mr.-jones-tokeletesen-haszontalan-delutan', 35000, 'watches', 'silver', 'xs,s,m,l', 0, '0000-00-00', 'Ezt az órát Kristof Devos belga illusztrátor tervezte, hogy élvezze a pillanatot  Kristof kifejti ihletét:  \"Ironikus módon időbe telt, hogy megváltoztassam az időbeli szemléletmódomat. Néhány évvel ezelőtt olvastam Lin Yutang kínai író, műfordító, nyelvész és filozófus idézetét, amelyet azóta is a szívem közelében tartok:  \"Ha tökéletesen haszontalan délutánt tölthet el teljesen haszontalan módon, akkor megtanulta, hogyan kell élni\".  Tehát az óra tervezésénél ezt az idézetet vettem kiindulópontnak. Az idézet megtanított arra, hogy egyszerre mit sem kell csinálnom.  Az egyik módja annak, hogy szeretek időt pazarolni, ha lebegek, csukott szemmel hagyom, hogy a víz legyen a vezetőm \".  Hogyan olvasható az idő:  -A fekvő alak kinyújtott lába az órára mutat  -A pici műanyag kacsa a percekre mutatva lebeg körül  Tökéletesen haszontalan délutánt készített Mr. Jones Watches, London, Egyesült Királyság, a tervezés minden rétegét külön-külön nyomtatták ki, mielőtt tehetséges, kis csapatuk kézzel összeállította őket.  A művészről:  Kristof Devos belga illusztrátor és szerző. Munkájának lényege képeskönyv-illusztrátor. Minden korosztály számára készít könyveket olyan témákban, mint a barátság, a halál és az önmagadért való kiállás.  Munkáját mókásnak és szerénynek is nevezték. Időnként leteszi a ceruzát, és színpadra lép, nyilvános előadásokat tartva különböző témákban, például inspiráció és képzelet.  Kristof munkáit számos különféle nyelvre lefordították, és könyvei a világ számos országában elérhetők.  Illusztrációit belföldön és több nemzetközi kiállításon is bemutatták. Munkája számos jutalmat kapott, köztük a \"Fehér Holló\", a \"3x3 Mag Merit\" és a rangos Commarts verseny \"Kiválósági Díja\".', b'1', '4', 0, 35, 0, 0),
(30, 'Timex Marlin 34 mm-es kézi szél 1960-as évek újrakiadása', 'timex-marlin-34-mm-es-kezi-szel-1960-as-evek-ujrakiadasa', 60000, 'watches', 'silver', 'xs,s,xxl', 55000, '2021-11-11', 'Az úriember mércéje akkor és most.  Az 1960-as évekbeli óra újrakiadása párosítja a kézzel tekert mechanikus mozdulatok tisztaságát, pontosságát és élvezetét a karcsú kialakítás időtlen kifinomultságával. Amint az Esquire magazinban látható, novemberi szám.', b'1', '5', 0, 55, 0, 0),
(31, 'Retikül GUESS Layla (VS) Mini HWVS79 89750 PIN', 'retikul-guess-layla-(vs)-mini-hwvs79-89750-pin', 65000, 'bags', 'pink', 'one size', 0, '0000-00-00', 'A táskák olyanok, mint a barátaink - gondoskodunk róluk, azt akarjuk, hogy a legfontosabb pillanatokban velünk legyenek, valamint féltett titkaink őrzői. A kiváló minőségű gyártásnak köszönhetően a Guess márkajelzéssel ellátott táskák gondoskodnak a kényelmedről, miközben nagyszerű megjelenést biztosítanak számodra. Szükséged van még ettől is többre? Ez a modell egy tökéletes megoldás ruhatárad felfrissítésére. Ez egy felkérés minden nő számára, aki követni szeretné a divatvilágot.', b'1', '4', 0, 40, 0, 0),
(32, 'R&J FEKETE DERÉKRA ÉS TÉRDRE RÖGZÍTHETŐ TÁSKA', 'r&j-fekete-derekra-es-terdre-rogzitheto-taska', 12500, 'bags', 'black', 'one size', 0, '0000-00-00', 'Egyedi, praktikus derékra és térdre rögzíthető táska. Elől található egy kicsi, cipzáras zseb, apró dolgok tárolására. Ezt követi 3 közepes zseb, ami tökéletes telefon, pénztárca tárolására. Egy nagyobb cipzáras egyterű zsebből áll, hátulján szivacs bélés segíti a kényelmes viseletet. Jól pakolható, praktikus, minden szükséges dolog belefér.  Hasznos lehet sportolás, munka, biciklizés, vagy akár kutyasétáltatás közben is!', b'1', '4', 0, 250, 0, 0),
(34, 'Férfi katonai jogger nadrág zöld színben', 'ferfi-katonai-jogger-nadrag-zold-szinben', 15000, 'man', 'green', 's,m,l,xxl', 0, '0000-00-00', 'Férfi nadrág zöld színben Jogger típusú katonai nadrág Derékban állítható erős passzéval és megkötővel Két zsebbel elől Két gombos zsebbel oldalt A két hátsó zseb gombos Cipzáras oldalzseb imitáció A szár passzés Street style Alkalom: edzőterem, városi kiruccanás, találkozás a barátokkal A próbababa (182 cm, 82 kg) XL-es méretet visel Anyag: 98% Pamut, 2% Elasztán', b'1', '4', 0, 125, 0, 0),
(35, 'Férfi póló mintával fekete Bolf', 'ferfi-polo-mintaval-fekete-bolf', 9500, 'man', 'black', 'xs,s,m,l', 0, '0000-00-00', 'Férfi póló fekete színben Kerek dekoltázs Dizájnos nyomattal elöl Sima hátsó rész Ideális hétköznapi viselet Alkalom: Városi kiruccanás, séta, találkozás az ismerősökkel A próbababa (182 cm, 82 kg) XL-es méretet visel Anyag: 100% Pamut', b'1', '4', 0, 100, 0, 0),
(36, 'Kenguru típusú férfi pulcsi kapucnival égszínkék színben', 'kenguru-tipusu-ferfi-pulcsi-kapucnival-egszinkek-szinben', 13000, 'man', 'blue', 's,m,l,xl', 11550, '2021-06-09', 'érfi póló égszínkék színben. Belebújós pulcsi kapucnival Állítható kapucnival Kengurúzsebbel Az alján és az ujjain passzés Sportos stílus Alkalom: séta, városi kiruccanás, jogging. A próbababa (182 cm, 82 kg) XL-es méretet visel Anyag: 65% Pamut, 35% Poliészter', b'1', '5', 0, 50, 0, 0),
(37, 'Mintás tank-top bokszoláshoz fehér színben', 'mintas-tank-top-bokszolashoz-feher-szinben', 7999, 'man', 'white', 'xs,s,m,l,xl,xxl', 0, '0000-00-00', 'Férfi póló fehér színben Pamut póló dizájnos mintával Tank top típusú póló, bokszoláshoz Kerek dekoltázs Ideális hétköznapi viselet Alkalom: városi kiruccanás, edzőterem, jogging A próbababa (182 cm, 82 kg) XL-es méretet visel Anyag: 100% Pamut', b'1', '4', 0, 70, 0, 0),
(38, 'Terepmintás férfi karóra barna színben', 'terepmintas-ferfi-karora-barna-szinben', 45000, 'watches', 'brown', 'xs,m,l', 0, '0000-00-00', 'Barna színű férfi karóra. Karóra, divatos terepmintával. Mechanizmus: kvarc. Óratok anyaga: kerek formájú, műanyag 60 mm. Óratok vastagsága: 15 mm. Vízállóság: 20M (az óra ellenáll a vízcseppeknek és a megnövekedett nedvességszintnek). Szíj anyaga: műanyag. Szíj szélessége: 28/22 mm. Zár: Csat. Maximális belső kerület: 210 mm. Tárcsa: analóg-elektronikus. Elektronikus funkciók: stopper, dátum, ébresztő, háttérvilágítás. Súly: 170 g. Az órát eredeti dobozában adjuk át', b'1', '4', 0, 40, 0, 0),
(39, 'Answear Lab - Farmer', 'answear-lab---farmer', 32500, 'women', 'black', 's,m,l', 30000, '2021-08-15', 'Answear Lab farmer. Slim. Hagyományos derékvonal. Sima.  - Slim fazon. - Zárás gombbal és cipzárral. - Cipzározható zsebek. - Szabályos derék. - Derék szélesség: 31 cm. - Csípő szélessége: 39 cm. - Derék magassága: 24 cm. - Nadrágszár szélessége alul: 12 cm. - Nadrágszár szélessége: 23 cm. - Hosszúság: 93 cm. - Megadott méret: S.  Összetétel: 95% pamut, 5% elasztán', b'1', '4', 0, 35, 0, 0),
(40, 'Chino Nadrág Sötét-Szürke', 'chino-nadrag-sotet-szurke', 22000, 'man', 'grey', 'm,l,xl', 0, '0000-00-00', 'Chinos fazonja van, tehát kauzál stílusú nadrág. Nagy méretű oldalsó és hátsó zsebei vannak, ahová telefonját, kulcsait vagy pénztárcáját teheti. Övrésznél és lábak végénél összehúzott, ami laza, sportos karaktert ad neki, mi több megnöveli viselési komfortérzetét. Mindezek lehetővé teszik, hogy a nadrág jól illeszkedjen, kényelmes, kellemes tapintású és puha legyen. Továbbá nem gyűrődik és nem nyúlik ki az idő előrehaladtával.', b'1', '4', 0, 211, 0, 0),
(41, 'Fekete Ozoone nadrág, szakadt', 'fekete-ozoone-nadrag,-szakadt', 14300, 'man', 'black', 's,m,l,xl,xxl', 12300, '2022-12-01', 'Ez a mérnökeink által tervezett nadrág ideális heti 3 alkalommal történő használatra, edzésre és bemelegítésre. A TRAXIUM nadrág testhezálló szabásának és rugalmas anyagának köszönhetően megkönnyíti a futást és mozgást.', b'1', '5', 0, 11, 0, 0),
(42, 'Karóra MICHAEL KORS Slim Runway MK8507 Black-Black', 'karora-michael-kors-slim-runway-mk8507-black-black', 150000, 'watches', 'grey', 's,m,xl', 0, '0000-00-00', 'Gyártó: Michael Kors Model: Slim Runway MK8507 Szín: Fekete Szíj anyaga: Acél Tok anyaga: Acél Szerkezet: Kvarc Vízállóság: 5 ATM Üveg: Kristályüveg Tok mérete: 4,4 cm', b'1', '4', 0, 10, 0, 0),
(43, 'BOSS CLASSIC JACKSON férfi karóra', 'boss-classic-jackson-ferfi-karora', 135000, 'watches', 'brown', 's,m,l,xl', 123000, '2021-12-31', 'Nem: Férfi 	Szerkezet: Quartz 	Tok: Nemesacél 	Óraüveg: Mineral (ásványi kristályüveg) 	Vízállóság: 3ATM-ig (cseppálló) 	Szíj: Bőr', b'1', '4', 0, 15, 0, 0),
(44, 'NIKE Y ELMNTL BACKPACK - SWOOSH GFX', 'nike-y-elmntl-backpack---swoosh-gfx', 9999, 'bags', 'black', 's,m,l', 0, '0000-00-00', 'Összetétel - 100% Poliészter - rendkívül szilárd, szintetikus anyag, amely kiemelkedő hőtűrő és szagmegkötő képességgel rendelkezik. Kezelési útmutató - Kézi mosás Zsebek - Cipzáras zseb Részletek - Minta az elülső oldalon Külső zsebek - 2 Fogantyú - Igen Méret - 39 x 27 x 12 cm', b'1', '4', 0, 100, 0, 0),
(45, 'Johhny Urban hátizsák', 'johhny-urban-hatizsak', 19000, 'bags', 'black', 'm,xl,xxl', 0, '0000-00-00', 'Tágas főrekesz Külső cipzár Tépőzár Állítható szíj Textil Cipzár Címkedarab/címkezászló Lágy fogantyú', b'1', '3', 0, 250, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `userID` text CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `itemID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `name`, `userID`, `description`, `rating`, `itemID`) VALUES
(16, 'mate', '2021052060a667676d01f', 'Velemenyem szerint megeri megvenni, igaz, hogy nagyon draga de kemenyen dzsilo leszel vele.', 5, 3),
(17, 'ferenc', '2021052660aeb5ae7066d', 'Elso nap leejtettem a foldre, es az allitolagos kristaly teljesen megsemmisult...', 1, 4),
(25, 'mate', '2021052060a667676d01f', 'tokjo', 4, 3),
(26, 'bmate', '2021052760affc4a64e19', 'Nagyon meno lettem vele, mivel Apple.', 5, 12),
(27, 'ferenc', '2021052660aeb5ae7066d', 'Nagyon draga, mellesleg lassu is.', 1, 12),
(28, 'mate', '2021060360b8c3cf18a66', 'Boldogan hallottam ennek a cipőnek a létezéséről, személy szerint az újrahasznosítás egy megszállotja vagyok. Azonnal meg is vásároltam a terméket, és nem kellet csalódnom. Tökéletes minőség, menő kinézet. 5/5', 5, 18),
(29, 'csilka', '2021052760af976c07be9', 'nem jo', 1, 15),
(30, 'csilka', '2021052760af976c07be9', 'Kurta jó a csuka', 2, 14),
(31, 'csilka', '2021052760af976c07be9', 'Ár/Érték arányban nagyon olcsó,nagyon jó a szín összeállítás, az anyaga is nagyon tartós.', 4, 19),
(33, 'mate', '2021060360b8c3cf18a66', 'Nagyon szep par cipo.', 4, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
