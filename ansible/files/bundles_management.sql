SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Table structure for table `bundles`
--

CREATE TABLE `bundles` (
  `PLAN_NAME` varchar(30) NOT NULL,
  `MINS` varchar(30) NOT NULL,
  `DATA` varchar(30) NOT NULL,
  `id` int(11) AUTO_INCREMENT PRIMARY KEY
) ENGINE=InnoDB DEFAULT CHARSET=utf8;