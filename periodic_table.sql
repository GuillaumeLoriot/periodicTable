-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 04 avr. 2025 à 12:31
-- Version du serveur : 8.3.0
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `periodic_table`
--

-- --------------------------------------------------------

--
-- Structure de la table `abundance`
--

DROP TABLE IF EXISTS `abundance`;
CREATE TABLE IF NOT EXISTS `abundance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `abundance`
--

INSERT INTO `abundance` (`id`, `name`, `description`) VALUES
(1, 'primordial', 'element naturellement présent dans la nature'),
(2, 'residuel', 'element issu de la désintegration d\'autres éléments'),
(3, 'synthetique', 'element uniquement synthétisé en laboratoire');

-- --------------------------------------------------------

--
-- Structure de la table `element`
--

DROP TABLE IF EXISTS `element`;
CREATE TABLE IF NOT EXISTS `element` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `atomic_number` int NOT NULL,
  `chemical_symbol` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `atomic_mass` decimal(8,5) NOT NULL,
  `group` int NOT NULL,
  `period` int NOT NULL,
  `definition` text NOT NULL,
  `discovery_date` date NOT NULL,
  `element_picture` varchar(255) DEFAULT NULL,
  `element_model` varchar(255) DEFAULT NULL,
  `state_id` int NOT NULL,
  `family_id` int NOT NULL,
  `abundance_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `element_state_of_matter_fk` (`state_id`),
  KEY `element_family_fk` (`family_id`),
  KEY `element_abundance_fk` (`abundance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `element`
--

INSERT INTO `element` (`id`, `name`, `atomic_number`, `chemical_symbol`, `atomic_mass`, `group`, `period`, `definition`, `discovery_date`, `element_picture`, `element_model`, `state_id`, `family_id`, `abundance_id`) VALUES
(1, 'Hydrogène', 1, 'H', 1.00800, 1, 1, 'L\'élément le plus léger et le plus abondant dans l\'univers.', '1766-01-01', '1.jpg', 'Hydrogen.png', 3, 8, 1),
(2, 'Hélium', 2, 'He', 4.00260, 18, 1, 'Gaz noble inerte, souvent utilisé dans les ballons et les applications cryogéniques.', '1868-08-18', '2.jpg', 'Helium.png', 3, 10, 1),
(3, 'Lithium', 3, 'Li', 6.94000, 1, 2, 'Le métal alcalin le plus léger, utilisé dans les batteries.', '1817-01-01', '3.jpg', 'Lithium.png', 1, 1, 1),
(4, 'Béryllium', 4, 'Be', 9.01220, 2, 2, 'Métal alcalino-terreux léger, utilisé dans les alliages.', '1798-02-15', '4.jpg', 'Beryllium.png', 1, 2, 1),
(5, 'Bore', 5, 'B', 10.81000, 13, 2, 'Métalloïde utilisé dans les céramiques et les composés abrasifs.', '1808-06-21', '5.jpg', 'Boron.png', 1, 7, 1),
(6, 'Carbone', 6, 'C', 12.01100, 14, 2, 'Base de la vie organique, existe sous plusieurs formes allotropiques.', '0001-01-01', '6.jpg', 'Carbon.png', 1, 8, 1),
(7, 'Azote', 7, 'N', 14.00700, 15, 2, 'Gaz inerte constituant environ 78% de l\'atmosphère terrestre.', '1772-04-23', '7.jpg', 'Nitrogen.png', 3, 8, 1),
(8, 'Oxygène', 8, 'O', 15.99900, 16, 2, 'Gaz vital pour la respiration, constituant environ 21% de l\'atmosphère terrestre.', '1774-08-01', '8.jpg', 'Oxygen.png', 3, 8, 1),
(9, 'Fluor', 9, 'F', 18.99800, 17, 2, 'L\'halogène le plus réactif, utilisé dans les composés dentaires.', '1886-06-26', '9.jpg', 'Fluorine.png', 3, 9, 1),
(10, 'Néon', 10, 'Ne', 20.17970, 18, 2, 'Gaz noble utilisé dans les enseignes lumineuses.', '1898-06-07', '10.jpg', 'Neon.png', 3, 10, 1),
(11, 'Sodium', 11, 'Na', 22.99000, 1, 3, 'Métal alcalin mou et réactif, utilisé dans les lampes à vapeur de sodium.', '1807-11-01', '11.jpg', 'Sodium.png', 1, 1, 1),
(12, 'Magnésium', 12, 'Mg', 24.30500, 2, 3, 'Métal alcalino-terreux léger, utilisé dans les alliages et les feux d\'artifice.', '1808-06-01', '12.jpg', 'Magnesium.png', 1, 2, 1),
(13, 'Aluminium', 13, 'Al', 26.98200, 13, 3, 'Métal pauvre utilisé dans les structures et les emballages.', '1825-01-01', '13.jpg', 'Aluminium.png', 1, 6, 1),
(14, 'Silicium', 14, 'Si', 28.08500, 14, 3, 'Métalloïde utilisé dans les semi-conducteurs et le verre.', '1824-02-01', '14.jpg', 'Silicon.png', 1, 7, 1),
(15, 'Phosphore', 15, 'P', 30.97400, 15, 3, 'Non-métal utilisé dans les allumettes et les engrais.', '1669-01-01', '15.jpg', 'Phosphorus.png', 1, 8, 1),
(16, 'Soufre', 16, 'S', 32.06000, 16, 3, 'Non-métal jaune utilisé dans les allumettes et les pesticides.', '0001-01-01', '16.jpg', 'Sulfur.png', 1, 8, 1),
(17, 'Chlore', 17, 'Cl', 35.45000, 17, 3, 'Halogène gazeux utilisé comme désinfectant et dans les plastiques.', '1774-01-01', '17.jpg', 'Chlorine.png', 3, 9, 1),
(18, 'Argon', 18, 'Ar', 39.94800, 18, 3, 'Gaz noble utilisé dans les ampoules électriques.', '1894-04-01', '18.jpg', 'Argon.png', 3, 10, 1),
(19, 'Potassium', 19, 'K', 39.09800, 1, 4, 'Métal alcalin mou utilisé dans les engrais.', '1807-11-01', '19.jpg', 'Potassium.png', 1, 1, 1),
(20, 'Calcium', 20, 'Ca', 40.07800, 2, 4, 'Métal alcalino-terreux utilisé dans les suppléments alimentaires et le ciment.', '1808-06-01', '20.jpg', 'Calcium.png', 1, 2, 1),
(21, 'Scandium', 21, 'Sc', 44.95600, 3, 4, 'Métal de transition utilisé dans les alliages d\'aluminium.', '1879-01-01', '21.jpg', 'Scandium.png', 1, 5, 1),
(22, 'Titane', 22, 'Ti', 47.86700, 4, 4, 'Métal de transition léger et résistant, utilisé dans les avions.', '1791-01-01', '22.jpg', 'Titanium.png', 1, 5, 1),
(23, 'Vanadium', 23, 'V', 50.94200, 5, 4, 'Métal de transition utilisé dans les alliages d\'acier.', '1801-01-01', '23.jpg', 'Vanadium.png', 1, 5, 1),
(24, 'Chrome', 24, 'Cr', 51.99600, 6, 4, 'Métal de transition utilisé pour le placage et dans les alliages.', '1797-07-26', '24.jpg', 'Chromium.png', 1, 5, 1),
(25, 'Manganèse', 25, 'Mn', 54.93800, 7, 4, 'Métal de transition utilisé dans les aciers et les batteries.', '1774-01-01', '25.jpg', 'Manganese.png', 1, 5, 1),
(26, 'Fer', 26, 'Fe', 55.84500, 8, 4, 'Métal de transition couramment utilisé dans les structures et les outils.', '0001-01-01', '26.jpg', 'Iron.png', 1, 5, 1),
(27, 'Cobalt', 27, 'Co', 58.93300, 9, 4, 'Métal de transition utilisé dans les alliages et les aimants.', '1735-01-01', '27.jpg', 'Cobalt.png', 1, 5, 1),
(28, 'Nickel', 28, 'Ni', 58.69300, 10, 4, 'Métal de transition utilisé dans les pièces de monnaie et les batteries.', '1751-01-01', '28.jpg', 'Nickel.png', 1, 5, 1),
(29, 'Cuivre', 29, 'Cu', 63.54600, 11, 4, 'Métal de transition utilisé dans les fils électriques et les tuyaux.', '0001-01-01', '29.jpg', 'Copper.png', 1, 5, 1),
(30, 'Zinc', 30, 'Zn', 65.38000, 12, 4, 'Métal pauvre utilisé dans le placage et les alliages.', '1746-01-01', '30.jpg', 'Zinc.png', 1, 6, 1),
(31, 'Gallium', 31, 'Ga', 69.72300, 13, 4, 'Métal pauvre utilisé dans les semi-conducteurs et les thermomètres.', '1875-08-01', '31.jpg', 'Gallium.png', 1, 6, 1),
(32, 'Germanium', 32, 'Ge', 72.63000, 14, 4, 'Métalloïde utilisé dans les semi-conducteurs et les fibres optiques.', '1886-02-01', '32.jpg', 'Germanium.png', 1, 7, 1),
(33, 'Arsenic', 33, 'As', 74.92200, 15, 4, 'Métalloïde toxique utilisé dans les pesticides et les semi-conducteurs.', '0001-01-01', '33.jpg', 'Arsenic.png', 1, 7, 1),
(34, 'Sélénium', 34, 'Se', 78.96000, 16, 4, 'Non-métal utilisé dans les cellules solaires et les suppléments alimentaires.', '1817-01-01', '34.jpg', 'Selenium.png', 1, 8, 1),
(35, 'Brome', 35, 'Br', 79.90400, 17, 4, 'Halogène liquide utilisé comme retardateur de flamme et dans les produits chimiques.', '1826-01-01', '35.jpg', 'Bromine.png', 2, 9, 1),
(36, 'Krypton', 36, 'Kr', 83.79800, 18, 4, 'Gaz noble utilisé dans les lampes fluorescentes.', '1898-05-30', '36.jpg', 'Krypton.png', 3, 10, 1),
(37, 'Rubidium', 37, 'Rb', 85.46800, 1, 5, 'Métal alcalin très réactif, utilisé dans les cellules photovoltaïques.', '1861-02-01', '37.jpg', 'Rubidium.png', 1, 1, 1),
(38, 'Strontium', 38, 'Sr', 87.62000, 2, 5, 'Métal alcalino-terreux utilisé dans les feux d\'artifice rouges.', '1790-01-01', '38.jpg', 'Strontium.png', 1, 2, 1),
(39, 'Yttrium', 39, 'Y', 88.90600, 3, 5, 'Métal de transition utilisé dans les superconducteurs et les lasers.', '1794-01-01', '39.jpg', 'Yttrium.png', 1, 5, 1),
(40, 'Zirconium', 40, 'Zr', 91.22400, 4, 5, 'Métal de transition utilisé dans les réacteurs nucléaires et les bijoux.', '1789-01-01', '40.jpg', 'Zirconium.png', 1, 5, 1),
(41, 'Niobium', 41, 'Nb', 92.90600, 5, 5, 'Métal de transition utilisé dans les alliages et les supraconducteurs.', '1801-01-01', '41.jpg', 'Niobium.png', 1, 5, 1),
(42, 'Molybdène', 42, 'Mo', 95.96000, 6, 5, 'Métal de transition utilisé dans les alliages et les catalyseurs.', '1778-01-01', '42.jpg', 'Molybdenum.png', 1, 5, 1),
(43, 'Technétium', 43, 'Tc', 98.00000, 7, 5, 'Métal de transition synthétique utilisé en médecine nucléaire.', '1937-01-01', '43.jpg', 'Technetium.png', 1, 5, 2),
(44, 'Ruthénium', 44, 'Ru', 101.07000, 8, 5, 'Métal de transition utilisé dans les contacts électriques et les catalyseurs.', '1844-01-01', '44.jpg', 'Ruthenium.png', 1, 5, 1),
(45, 'Rhodium', 45, 'Rh', 102.91000, 9, 5, 'Métal de transition utilisé dans les catalyseurs et les bijoux.', '1803-06-01', '45.jpg', 'Rhodium.png', 1, 5, 1),
(46, 'Palladium', 46, 'Pd', 106.42000, 10, 5, 'Métal de transition utilisé dans les catalyseurs et les bijoux.', '1803-07-01', '46.jpg', 'Palladium.png', 1, 5, 1),
(47, 'Argent', 47, 'Ag', 107.87000, 11, 5, 'Métal de transition précieux utilisé dans les bijoux et les contacts électriques.', '0001-01-01', '47.jpg', 'Silver.png', 1, 5, 1),
(48, 'Cadmium', 48, 'Cd', 112.41000, 12, 5, 'Métal pauvre utilisé dans les batteries et les pigments.', '1817-01-01', '48.jpg', 'Cadmium.png', 1, 6, 1),
(49, 'Indium', 49, 'In', 114.82000, 13, 5, 'Métal pauvre utilisé dans les écrans tactiles et les semi-conducteurs.', '1863-02-01', '49.jpg', 'Indium.png', 1, 6, 1),
(50, 'Étain', 50, 'Sn', 118.71000, 14, 5, 'Métal pauvre utilisé dans les soudures et les alliages.', '0001-01-01', '50.jpg', 'Tin.png', 1, 6, 1),
(51, 'Antimoine', 51, 'Sb', 121.76000, 15, 5, 'Métalloïde utilisé dans les alliages et les semi-conducteurs.', '0001-01-01', '51.jpg', 'Antimony.png', 1, 7, 1),
(52, 'Tellure', 52, 'Te', 127.60000, 16, 5, 'Métalloïde utilisé dans les alliages et les semi-conducteurs.', '1782-01-01', '52.jpg', 'Tellurium.png', 1, 7, 1),
(53, 'Iode', 53, 'I', 126.90000, 17, 5, 'Halogène utilisé comme désinfectant et dans les teintures.', '1811-01-01', '53.jpg', 'Iodine.png', 1, 9, 1),
(54, 'Xénon', 54, 'Xe', 131.29000, 18, 5, 'Gaz noble utilisé dans les lampes flash et les anesthésiques.', '1898-07-01', '54.jpg', 'Xenon.png', 3, 10, 1),
(55, 'Césium', 55, 'Cs', 132.91000, 1, 6, 'Métal alcalin utilisé dans les horloges atomiques.', '1860-01-01', '55.jpg', 'Cesium.png', 1, 1, 1),
(56, 'Baryum', 56, 'Ba', 137.33000, 2, 6, 'Métal alcalino-terreux utilisé dans les feux d\'artifice verts.', '1808-01-01', '56.jpg', 'Barium.png', 1, 2, 1),
(57, 'Lanthane', 57, 'La', 138.91000, 3, 6, 'Lanthanide utilisé dans les verres optiques et les catalyseurs.', '1839-01-01', '57.jpg', 'Lanthanum.png', 1, 3, 1),
(58, 'Césium', 58, 'Ce', 140.12000, 4, 6, 'Lanthanide utilisé dans les catalyseurs et les alliages.', '1803-01-01', '58.jpg', 'Cesium.png', 1, 3, 1),
(59, 'Praséodyme', 59, 'Pr', 140.91000, 5, 6, 'Lanthanide utilisé dans les aimants et les verres optiques.', '1885-01-01', '59.jpg', 'Praseodymium.png', 1, 3, 1),
(60, 'Néodyme', 60, 'Nd', 144.24000, 6, 6, 'Lanthanide utilisé dans les aimants et les verres optiques.', '1885-01-01', '60.jpg', 'Neodymium.png', 1, 3, 1),
(61, 'Prométhium', 61, 'Pm', 145.00000, 7, 6, 'Lanthanide synthétique utilisé en recherche.', '1945-01-01', '61.jpg', 'Promethium.png', 1, 3, 2),
(62, 'Samarium', 62, 'Sm', 150.36000, 8, 6, 'Lanthanide utilisé dans les aimants et les verres optiques.', '1879-01-01', '62.jpg', 'Samarium.png', 1, 3, 1),
(63, 'Europium', 63, 'Eu', 151.96000, 9, 6, 'Lanthanide utilisé dans les écrans de télévision et les lampes fluorescentes.', '1901-01-01', '63.jpg', 'Europium.png', 1, 3, 1),
(64, 'Gadolinium', 64, 'Gd', 157.25000, 10, 6, 'Lanthanide utilisé dans les IRM et les aimants.', '1880-01-01', '64.jpg', 'Gadolinium.png', 1, 3, 1),
(65, 'Terbium', 65, 'Tb', 158.93000, 11, 6, 'Lanthanide utilisé dans les aimants et les écrans de télévision.', '1843-01-01', '65.jpg', 'Terbium.png', 1, 3, 1),
(66, 'Dysprosium', 66, 'Dy', 162.50000, 12, 6, 'Lanthanide utilisé dans les aimants et les lasers.', '1886-01-01', '66.jpg', 'Dysprosium.png', 1, 3, 1),
(67, 'Holmium', 67, 'Ho', 164.93000, 13, 6, 'Lanthanide utilisé dans les lasers et les aimants.', '1878-01-01', '67.jpg', 'Holmium.png', 1, 3, 1),
(68, 'Erbium', 68, 'Er', 167.26000, 14, 6, 'Lanthanide utilisé dans les lasers et les amplificateurs optiques.', '1843-01-01', '68.jpg', 'Erbium.png', 1, 3, 1),
(69, 'Thulium', 69, 'Tm', 168.93000, 15, 6, 'Lanthanide utilisé dans les lasers et les aimants.', '1879-01-01', '69.jpg', 'Thulium.png', 1, 3, 1),
(70, 'Ytterbium', 70, 'Yb', 173.05000, 16, 6, 'Lanthanide utilisé dans les lasers et les aimants.', '1878-01-01', '70.jpg', 'Ytterbium.png', 1, 3, 1),
(71, 'Lutécium', 71, 'Lu', 174.97000, 17, 6, 'Lanthanide utilisé dans les catalyseurs et les aimants.', '1907-01-01', '71.jpg', 'Lutetium.png', 1, 3, 1),
(72, 'Hafnium', 72, 'Hf', 178.49000, 4, 6, 'Métal de transition utilisé dans les réacteurs nucléaires et les alliages.', '1923-01-01', '72.jpg', 'Hafnium.png', 1, 5, 1),
(73, 'Tantale', 73, 'Ta', 180.95000, 5, 6, 'Métal de transition utilisé dans les composants électroniques et les alliages.', '1802-01-01', '73.jpg', 'Tantalum.png', 1, 5, 1),
(74, 'Tungstène', 74, 'W', 183.84000, 6, 6, 'Métal de transition utilisé dans les filaments et les outils de coupe.', '1783-01-01', '74.jpg', 'Tungsten.png', 1, 5, 1),
(75, 'Rhénium', 75, 'Re', 186.21000, 7, 6, 'Métal de transition utilisé dans les superalliages et les catalyseurs.', '1925-01-01', '75.jpg', 'Rhenium.png', 1, 5, 1),
(76, 'Osmium', 76, 'Os', 190.23000, 8, 6, 'Métal de transition utilisé dans les pointes de stylo et les contacts électriques.', '1803-07-01', '76.jpg', 'Osmium.png', 1, 5, 1),
(77, 'Iridium', 77, 'Ir', 192.22000, 9, 6, 'Métal de transition utilisé dans les contacts électriques et les catalyseurs.', '1803-07-01', '77.jpg', 'Iridium.png', 1, 5, 1),
(78, 'Platine', 78, 'Pt', 195.08000, 10, 6, 'Métal de transition précieux utilisé dans les bijoux et les catalyseurs.', '1735-01-01', '78.jpg', 'Platinum.png', 1, 5, 1),
(79, 'Or', 79, 'Au', 196.97000, 11, 6, 'Métal de transition précieux utilisé dans les bijoux et les contacts électriques.', '0001-01-01', '79.jpg', 'Gold.png', 1, 5, 1),
(80, 'Mercure', 80, 'Hg', 200.59000, 12, 6, 'Métal pauvre liquide utilisé dans les thermomètres et les lampes fluorescentes.', '0001-01-01', '80.jpg', 'Mercury.png', 2, 6, 1),
(81, 'Thallium', 81, 'Tl', 204.38000, 13, 6, 'Métal pauvre utilisé dans les détecteurs infrarouges et les alliages.', '1861-03-01', '81.jpg', 'Thallium.png', 1, 6, 1),
(82, 'Plomb', 82, 'Pb', 207.20000, 14, 6, 'Métal pauvre utilisé dans les batteries et les boucliers contre les radiations.', '0001-01-01', '82.jpg', 'Lead.png', 1, 6, 1),
(83, 'Bismuth', 83, 'Bi', 208.98000, 15, 6, 'Métal pauvre utilisé dans les cosmétiques et les alliages.', '0001-01-01', '83.jpg', 'Bismuth.png', 1, 6, 1),
(84, 'Polonium', 84, 'Po', 209.00000, 16, 6, 'Métal pauvre de radioactif utilisé comme source de chaleur dans l\'espace.', '1898-07-01', '84.jpg', 'Polonium.png', 1, 6, 2),
(85, 'Astate', 85, 'At', 210.00000, 17, 6, 'Métaloïde radioactif utilisé en recherche médicale.', '1940-01-01', '85.jpg', 'Astatine.png', 1, 7, 2),
(86, 'Radon', 86, 'Rn', 222.00000, 18, 6, 'Gaz noble radioactif utilisé en radiothérapie.', '1900-01-01', '86.jpg', 'Radon.png', 3, 10, 2),
(87, 'Francium', 87, 'Fr', 223.00000, 1, 7, 'Métal alcalin radioactif utilisé en recherche.', '1939-01-01', '87.jpg', 'Francium.png', 1, 1, 2),
(88, 'Radium', 88, 'Ra', 226.00000, 2, 7, 'Métal alcalino-terreux radioactif utilisé en radiothérapie.', '1898-12-21', '88.jpg', 'Radium.png', 1, 2, 2),
(89, 'Actinium', 89, 'Ac', 227.00000, 3, 7, 'Actinide radioactif utilisé en recherche.', '1899-01-01', '89.jpg', 'Actinium.png', 1, 4, 2),
(90, 'Thorium', 90, 'Th', 232.04000, 4, 7, 'Actinide utilisé dans les manchons à gaz et les alliages.', '1828-01-01', '90.jpg', 'Thorium.png', 1, 4, 1),
(91, 'Protactinium', 91, 'Pa', 231.04000, 5, 7, 'Actinide utilisé en recherche.', '1913-01-01', '91.jpg', 'Protactinium.png', 1, 4, 2),
(92, 'Uranium', 92, 'U', 238.03000, 6, 7, 'Actinide utilisé comme combustible nucléaire et dans les armes.', '1789-01-01', '92.jpg', 'Uranium.png', 1, 4, 1),
(93, 'Neptunium', 93, 'Np', 237.00000, 7, 7, 'Actinide synthétique utilisé en recherche.', '1940-01-01', '93.jpg', 'Neptunium.png', 1, 4, 2),
(94, 'Plutonium', 94, 'Pu', 244.00000, 8, 7, 'Actinide synthétique utilisé comme combustible nucléaire et dans les armes.', '1940-12-14', '94.jpg', 'Plutonium.png', 1, 4, 2),
(95, 'Américium', 95, 'Am', 243.00000, 9, 7, 'Actinide synthétique utilisé dans les détecteurs de fumée.', '1944-11-01', '95.jpg', 'Americium.png', 1, 4, 3),
(96, 'Curium', 96, 'Cm', 247.00000, 10, 7, 'Actinide synthétique utilisé en recherche.', '1944-07-01', '96.jpg', 'Curium.png', 1, 4, 3),
(97, 'Berkélium', 97, 'Bk', 247.00000, 11, 7, 'Actinide synthétique utilisé en recherche.', '1949-12-19', '97.jpg', 'Berkelium.png', 1, 4, 3),
(98, 'Californium', 98, 'Cf', 251.00000, 12, 7, 'Actinide synthétique utilisé en recherche.', '1950-02-09', '98.jpg', 'Californium.png', 1, 4, 3),
(99, 'Einsteinium', 99, 'Es', 252.00000, 13, 7, 'Actinide synthétique utilisé en recherche.', '1952-12-20', '99.jpg', 'Einsteinium.png', 1, 4, 3),
(100, 'Fermium', 100, 'Fm', 257.00000, 14, 7, 'Actinide synthétique utilisé en recherche.', '1952-12-20', '100.jpg', 'Fermium.png', 1, 4, 3),
(101, 'Mendélévium', 101, 'Md', 258.00000, 15, 7, 'Actinide synthétique utilisé en recherche.', '1955-03-01', '101.jpg', 'Mendelevium.png', 1, 4, 3),
(102, 'Nobélium', 102, 'No', 259.00000, 16, 7, 'Actinide synthétique utilisé en recherche.', '1958-04-01', '102.jpg', 'Nobelium.png', 1, 4, 3),
(103, 'Lawrencium', 103, 'Lr', 262.00000, 17, 7, 'Actinide synthétique utilisé en recherche.', '1961-02-14', '103.jpg', 'Lawrencium.png', 1, 4, 3),
(104, 'Rutherfordium', 104, 'Rf', 267.00000, 4, 7, 'Métal de transition synthétique utilisé en recherche.', '1964-02-01', '104.jpg', 'Rutherfordium.png', 1, 5, 3),
(105, 'Dubnium', 105, 'Db', 268.00000, 5, 7, 'Métal de transition synthétique utilisé en recherche.', '1967-10-01', '105.jpg', 'Dubnium.png', 1, 5, 3),
(106, 'Seaborgium', 106, 'Sg', 269.00000, 6, 7, 'Métal de transition synthétique utilisé en recherche.', '1974-06-01', '106.jpg', 'Seaborgium.png', 1, 5, 3),
(107, 'Bohrium', 107, 'Bh', 270.00000, 7, 7, 'Métal de transition synthétique utilisé en recherche.', '1981-02-01', '107.jpg', 'Bohrium.png', 1, 5, 3),
(108, 'Hassium', 108, 'Hs', 270.00000, 8, 7, 'Métal de transition synthétique utilisé en recherche.', '1984-08-01', '108.jpg', 'Hassium.png', 1, 5, 3),
(109, 'Meitnérium', 109, 'Mt', 278.00000, 9, 7, 'Métal pauvre synthétique utilisé en recherche.', '1982-08-29', '109.jpg', 'Meitnerium.png', 1, 6, 3),
(110, 'Darmstadtium', 110, 'Ds', 281.00000, 10, 7, 'Métal pauvre synthétique utilisé en recherche.', '1994-11-09', '110.jpg', 'Darmstadtium.png', 1, 6, 3),
(111, 'Roentgenium', 111, 'Rg', 282.00000, 11, 7, 'Métal pauvre synthétique utilisé en recherche.', '1994-12-08', '111.jpg', 'Roentgenium.png', 1, 6, 3),
(112, 'Copernicium', 112, 'Cn', 285.00000, 12, 7, 'Métal de transition synthétique utilisé en recherche.', '1996-02-09', '112.jpg', 'Copernicium.png', 1, 5, 3),
(113, 'Nihonium', 113, 'Nh', 286.00000, 13, 7, 'Métal pauvre synthétique utilisé en recherche.', '2004-02-01', '113.jpg', 'Nihonium.png', 1, 6, 3),
(114, 'Flerovium', 114, 'Fl', 289.00000, 14, 7, 'Métal pauvre synthétique utilisé en recherche.', '1998-12-01', '114.jpg', 'Flerovium.png', 1, 6, 3),
(115, 'Moscovium', 115, 'Mc', 290.00000, 15, 7, 'Métal pauvre synthétique utilisé en recherche.', '2003-02-01', '115.jpg', 'Moscovium.png', 1, 6, 3),
(116, 'Livermorium', 116, 'Lv', 293.00000, 16, 7, 'Métal pauvre synthétique utilisé en recherche.', '2000-07-01', '116.jpg', 'Livermorium.png', 1, 6, 3),
(117, 'Tennessine', 117, 'Ts', 294.00000, 17, 7, 'Métal pauvre synthétique utilisé en recherche.', '2010-04-01', '117.jpg', 'Tennessine.png', 1, 6, 3),
(118, 'Oganesson', 118, 'Og', 294.00000, 18, 7, 'Métal pauvre synthétique utilisé en recherche.', '2002-12-01', '118.jpg', 'Oganesson.png', 1, 6, 3),
(137, 'elementTest', 119, 'Tt', 7.00000, 7, 7, 'ceci est l\'élément test', '2025-03-28', 'test.jpg', 'test.png', 1, 10, 1),
(142, 'testkjlkn', 120, 'ja2', 1.00000, 4, 2, 'ceci est l\'élément test', '2025-04-01', 'sefesf', 'sefse', 1, 1, 1),
(156, 'sdf', 122, 'ja', 2.00000, 3, 3, 'ceci est l\'élément test', '2025-04-17', 'test.jpg', 'test.png', 1, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `family`
--

DROP TABLE IF EXISTS `family`;
CREATE TABLE IF NOT EXISTS `family` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `metal` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `family`
--

INSERT INTO `family` (`id`, `name`, `metal`, `description`) VALUES
(1, 'alcalin', 1, 'Un élément alcalin est un métal très réactif du groupe 1 du tableau périodique. Il possède un seul électron sur sa couche externe et réagit fortement avec l’eau en formant une solution basique.'),
(2, 'alcalino-terreux', 1, 'Un élément alcalino-terreux est un métal du groupe 2 du tableau périodique. Il est moins réactif que les alcalins, mais peut réagir avec l\'eau et former des composés basiques.'),
(3, 'lanthanides', 1, 'Un élément lanthanide est un métal du groupe des terres rares. Ces éléments sont utilisés dans les aimants puissants, les écrans et les technologies high-tech.'),
(4, 'actinides', 1, 'Un élément actinide est un métal qui est La plupart radioactif et utilisé dans le nucléaire'),
(5, 'metal-de-transition', 1, 'Un métal de transition possède des propriétés métalliques. Il peut avoir plusieurs états d’oxydation et est souvent utilisé en industrie.'),
(6, 'metal-pauvre', 1, 'Un métal pauvre est moins conducteurs et plus fragiles que les autres métaux.'),
(7, 'metalloïde', 0, 'Un métalloïde est un élément qui possède des caractéristiques à la fois des métaux et des non-métaux. Ils est souvent semi-conducteur et est utilisé dans l\'électronique.'),
(8, 'autre-non-metal', 0, 'Un élément autre non-métal ne possède pas les propriétés des métaux, comme la conductivité ou la malléabilité. Ce groupe inclut des éléments qui sont souvent des gaz ou des solides cassants à température ambiante.'),
(9, 'halogene', 0, 'Un élément halogène est très réactifs, notamment avec les métaux, et forme souvent des sels lorsqu\'il se combine avec eux.'),
(10, 'gaz-noble', 0, 'Un gaz noble est un élément très peu réactif, car il a une couche externe d\'électrons complète. Il est utilisé dans des applications comme les éclairages et les ballons.'),
(11, 'non-classe', 0, 'Un élément non classé est un élément chimique qui ne correspond pas clairement à l\'une des catégories principales du tableau périodique. Ces éléments sont souvent rares ou moins étudiés.');

-- --------------------------------------------------------

--
-- Structure de la table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `state`
--

INSERT INTO `state` (`id`, `name`) VALUES
(1, 'solide'),
(2, 'liquide'),
(3, 'gaz');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profil_picture` varchar(255) DEFAULT 'generic.jpg',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `first_name`, `mail`, `password`, `profil_picture`) VALUES
(1, 'admin', 'loriot', 'guillaume', 'administrateur@admin.com', '$2y$10$6j4PWcyddEQVpzuB8JAJAuFokape7AHkTUF0B.cHHw56ONtcYUoQW', 'generic.jpg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `element`
--
ALTER TABLE `element`
  ADD CONSTRAINT `element_abundance_fk` FOREIGN KEY (`abundance_id`) REFERENCES `abundance` (`id`),
  ADD CONSTRAINT `element_family_fk` FOREIGN KEY (`family_id`) REFERENCES `family` (`id`),
  ADD CONSTRAINT `element_state_of_matter_fk` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
