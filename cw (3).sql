-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2026 at 11:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cw`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime DEFAULT NULL,
  `film_image` varchar(255) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `content`, `date`, `film_image`) VALUES
(1, 'yiihow', 'yiihow2006@gmail.com', 'can you change the poster of the movie Bridgerton? i prefer season 3', '2026-03-20 17:23:42', 'default.png'),
(2, 'yiihow', 'yiihow2006@gmail.com', 'can you add reply 1988?', '2026-03-31 17:15:52', 'default.png'),
(7, 'yiihow', 'yiihow2006@gmail.com', 'hello admin, could you add the movie Bridgeton season 3, and another user name: Ho Nhi gmail: hohuynhuyennhii2006@gmail.com please. thank you admin!', '2026-04-03 14:08:12', '1775200092_Brigerton seanson 3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `alt_text` varchar(255) DEFAULT 'Film poster'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `name`, `image`, `alt_text`) VALUES
(1, 'Barbie', 'barbie.png', 'the image of Barbie'),
(2, 'Avengers: Endgame', 'endgame.png', 'the poster of the Endgame film'),
(3, 'Bridgerton season 4', 'bridgerton.png', 'the image of Benedict and Sophie'),
(4, 'Tom & Jerry', 'tom&jerry.png', 'the image of tom & jerry'),
(6, 'The Little Mermaid', 'thelittlemermaid.avif', 'the image of Ariel '),
(11, 'Winnie the Pooh', 'poohmovie.jpg', 'the image of characters in the movie'),
(18, 'Bridgerton season 3', 'Brigerton seanson 3.jpg', 'the image of Colin and Penelope ');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `reviewtext` text NOT NULL,
  `reviewdate` date NOT NULL,
  `userid` int(11) NOT NULL,
  `filmid` int(11) NOT NULL,
  `likes` int(11) DEFAULT 0,
  `dislikes` int(11) DEFAULT 0,
  `rating` decimal(2,1) DEFAULT 0.0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `reviewtext`, `reviewdate`, `userid`, `filmid`, `likes`, `dislikes`, `rating`) VALUES
(16, 'Amazing movie!', '2026-04-04', 1, 1, 2, 0, 4.5),
(17, 'A MASTERPIECE!!!', '2026-04-04', 3, 3, 2, 1, 4.0),
(18, 'i love Pooh and my wife adores Piglet, theyre so cute', '2026-04-04', 2, 11, 3, 0, 5.0),
(19, 'my favourite princess ever! the most beautiful in disney!!!', '2026-04-04', 4, 6, 3, 0, 5.0),
(20, 'such a good movie', '2026-04-04', 3, 11, 1, 0, 4.5),
(21, 'whar a wonderful movie! i love Pen and El so much!!!', '2026-04-04', 8, 18, 1, 0, 5.0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`) VALUES
(1, 'Jeonghan Yoon', 'hannie1004@email.com'),
(2, 'Joshua Hong', 'josh3012@email.com'),
(3, 'Ellie Ho', 'ellie0402@email.com'),
(4, 'yiihow', 'yiihow2006@gmail.com'),
(6, 'Nhi', 'nhiho@gmail.com'),
(8, 'Ho Nhi', 'hohuynhuyennhii2006@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_review_user` (`userid`),
  ADD KEY `fk_review_film` (`filmid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_review_film` FOREIGN KEY (`filmid`) REFERENCES `film` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_review_user` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
