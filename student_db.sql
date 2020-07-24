-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 172.19.0.1:6033:3306
-- Χρόνος δημιουργίας: 28 Νοε 2019 στις 23:35:14
-- Έκδοση διακομιστή: 8.0.18
-- Έκδοση PHP: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `student_db`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `Students`
--

CREATE TABLE `Students` (
  `ID` varchar(100) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `SURNAME` varchar(30) NOT NULL,
  `FATHERNAME` varchar(30) NOT NULL,
  `GRADE` float NOT NULL,
  `MOBILENUMBER` varchar(30) NOT NULL,
  `BIRTHDAY` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Άδειασμα δεδομένων του πίνακα `Students`
--

INSERT INTO `Students` (`ID`, `NAME`, `SURNAME`, `FATHERNAME`, `GRADE`, `MOBILENUMBER`, `BIRTHDAY`) VALUES
('2015030000', 'Nikos', 'Papadopoulos', 'Akis', 7.89, '6945437105', '1994-02-08'),
('2015030100', 'Maria', 'Apostolou', 'Nikos', 7.56, '6945487901', '1997-02-04'),
('2015030101', 'Kostas', 'Apostolidis', 'Petros', 6.53, '6945487922', '1997-10-04'),
('2015030146', 'Froso', 'Papadaki', 'Alkis', 8.54, '6945437109', '1995-05-10'),
('2015030157', 'Mariana', 'Mamou', 'Markos', 6.89, '6945437105', '1998-08-02'),
('2015030250', 'Fedra', 'Stamou', 'Paulos', 8.69, '6945487081', '1999-01-08');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `Teachers`
--

CREATE TABLE `Teachers` (
  `ID` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `NAME` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `SURNAME` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `USERNAME` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `PASSWORD` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `EMAIL` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Άδειασμα δεδομένων του πίνακα `Teachers`
--

INSERT INTO `Teachers` (`ID`, `NAME`, `SURNAME`, `USERNAME`, `PASSWORD`, `EMAIL`) VALUES
('1', 'Maria', 'Antonopoulou', 'maria', '123', 'mariacapp@gmail.com'),
('2', 'Petros', 'Maniakos', 'peter', 'root', 'petros@gmail.com');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `Students`
--
ALTER TABLE `Students`
  ADD PRIMARY KEY (`ID`);

--
-- Ευρετήρια για πίνακα `Teachers`
--
ALTER TABLE `Teachers`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
