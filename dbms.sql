-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2022 at 09:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addnote` (IN `ntitle` VARCHAR(1000), IN `nparagraph` VARCHAR(1000))   BEGIN
INSERT INTO add_notes VALUES ('null',ntitle,nparagraph,NOW());
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deletenotes` (IN `nid` INT(100))   BEGIN
DELETE FROM add_notes WHERE id=nid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editnotes` (IN `nid` INT(100), IN `ntitle` VARCHAR(1000), IN `nparagraph` VARCHAR(1000))   BEGIN
UPDATE add_notes SET add_notes.title=ntitle , add_notes.paragraph=nparagraph , add_notes.date=NOW() WHERE id=nid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shownotes` ()   BEGIN
SELECT * FROM add_notes;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `shownotes_cursor` ()   BEGIN
	DECLARE nid,ntitle,nparagraph,ndate TEXT;
    DECLARE exit_loop BOOLEAN DEFAULT FALSE;
    DECLARE shownotes CURSOR FOR SELECT * FROM add_notes;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET exit_loop = TRUE;
    OPEN shownotes;
    n_loop: LOOP
        FETCH FROM shownotes INTO nid,ntitle,nparagraph,ndate;
        	IF exit_loop THEN
        		LEAVE n_loop;
        	END IF;
            SELECT nid,ntitle,nparagraph,ndate;  
    END LOOP n_loop;
    CLOSE shownotes;  	
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `login` (`u_name` VARCHAR(20), `pass` VARCHAR(20)) RETURNS INT(1)  RETURN(EXISTS(SELECT * from users WHERE users.username=u_name AND users.password = pass))$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `add_notes`
--

CREATE TABLE `add_notes` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `paragraph` varchar(1000) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_notes`
--

INSERT INTO `add_notes` (`id`, `title`, `paragraph`, `date`) VALUES
(65, 'hello', 'dbms', '2022-09-06 00:47:24'),
(66, 'Features of PL/SQL', 'Better performance, as SQL is executed in bulk rather than a single statement', '2022-09-06 00:21:55'),
(67, 'Disadvantages of PL/SQL', 'Stored Procedures in PL/SQL uses high memory', '2022-09-06 00:33:25');

--
-- Triggers `add_notes`
--
DELIMITER $$
CREATE TRIGGER `delnotes` BEFORE DELETE ON `add_notes` FOR EACH ROW INSERT INTO notestrigger VALUES('NULL',OLD.id, NOW(),'delete')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertnotes` AFTER INSERT ON `add_notes` FOR EACH ROW INSERT INTO notestrigger VALUES('NULL',NEW.id, NOW(),'insert')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatenote` AFTER UPDATE ON `add_notes` FOR EACH ROW INSERT INTO notestrigger VALUES('NULL',NEW.id, NOW(),'update')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `notestrigger`
--

CREATE TABLE `notestrigger` (
  `id` int(100) NOT NULL,
  `nid` int(100) NOT NULL,
  `ndate` datetime NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notestrigger`
--

INSERT INTO `notestrigger` (`id`, `nid`, `ndate`, `action`) VALUES
(1, 91, '2022-09-05 22:54:30', 'insert'),
(2, 91, '2022-09-05 22:57:06', 'update'),
(3, 91, '2022-09-05 23:08:04', 'delete'),
(4, 92, '2022-09-05 23:54:29', 'insert'),
(5, 92, '2022-09-05 23:54:47', 'update'),
(6, 92, '2022-09-05 23:54:55', 'delete'),
(7, 84, '2022-09-06 00:20:03', 'delete'),
(8, 65, '2022-09-06 00:21:11', 'update'),
(9, 66, '2022-09-06 00:21:55', 'update'),
(10, 67, '2022-09-06 00:22:14', 'update'),
(11, 93, '2022-09-06 00:23:26', 'insert'),
(12, 93, '2022-09-06 00:23:32', 'delete'),
(13, 94, '2022-09-06 00:24:08', 'insert'),
(14, 94, '2022-09-06 00:26:21', 'update'),
(15, 94, '2022-09-06 00:27:32', 'delete'),
(16, 67, '2022-09-06 00:33:25', 'update'),
(17, 95, '2022-09-06 00:42:41', 'insert'),
(18, 95, '2022-09-06 00:45:22', 'delete'),
(19, 65, '2022-09-06 00:47:24', 'update');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_notes`
--
ALTER TABLE `add_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notestrigger`
--
ALTER TABLE `notestrigger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_notes`
--
ALTER TABLE `add_notes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `notestrigger`
--
ALTER TABLE `notestrigger`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
