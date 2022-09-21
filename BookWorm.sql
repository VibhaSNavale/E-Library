-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 24, 2020 at 05:41 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BookWorm`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `search` (IN `booktitle` VARCHAR(100))  SELECT * FROM mybooks, books WHERE title = booktitle AND mybooks.bookid=books.bookid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookid` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` mediumblob NOT NULL,
  `datetime` datetime NOT NULL,
  `pdf` varchar(50) NOT NULL,
  `numreaders` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `title`, `author`, `genre`, `description`, `image`, `datetime`, `pdf`, `numreaders`) VALUES
(1, 'The Three Musketeers', 'Alexandre Dumas', 'Action/Adventure', 'The adventures of a young man named d\'Artagnan after he leaves home to become a guard of the musketeers. D\'Artagnan is not one of the musketeers of the title; those are his friends Athos, Porthos, and Aramis.\r\nPublished: 1844\r\nNo. of Pages: 762\r\nISBN: 0670037796', 0x54686554687265654d75736b6574656572732e6a7067, '2020-11-24 19:00:00', 'The-Three-Musketeers.pdf', 10),
(2, '20,000 Leagues Under the Sea', 'Jules Verne', 'Action/Adventure', 'Sent to investigate mysterious encounters that are disrupting international shipping, Professor Aronnax, his servant Conseil, and disgruntled harpooner Ned Land are captured when their frigate is sunk during an encounter with the \"monster.\" The submarine Nautilus and its eccentric Captain Nemo afford the professor and his companion\'s endless fascination and danger as they\'re swept along on a yearlong undersea voyage.\r\nPublished: 1870\r\nNo. of Pages: 296\r\nISBN: 140272599X\r\n', 0x4a5632303030304c656167756573556e6465727468655365612e6a7067, '2020-11-24 19:45:00', '20000-Leagues-Under-the-Sea.pdf', 7),
(3, 'The Adventures of Huckleberry Finn', 'Mark Twain', 'Action/Adventure', 'In this book, a number of dialects are used, to wit: the Missouri negro dialect; the extremest form of the backwoods Southwestern dialect; the ordinary \"Pike County\" dialect; and four modified varieties of this last. The shadings have not been done in a haphazard fashion, or by guesswork; but painstakingly, and with the trustworthy guidance and support of personal familiarity with these several forms of speech. I make this explanation for the reason that without it many readers would suppose that all these characters were trying to talk alike and not succeeding.\r\nPublished: 1884\r\nNo. of Pages: 304', 0x546865416476656e74757265736f664875636b6c65626572727946696e6e2e6a7067, '2020-11-25 06:30:00', 'The-Adventures-of-Huckleberry-Finn.pdf', 7),
(4, 'Three Mistakes of My Life', 'Chetan Bhagat', 'Fiction', 'The 3 Mistakes of my life is the third novel written by eminent Indian Author Chetan Bhagat. Based on cricket, business, and religion, the novel is set against the backdrop of the beautiful city Ahmedabad. Revolving around three young Indian boys Omi, Ishaan, and Govind, the book goes on to narrate how the three are trying their best to make ends meet in the city.\r\n\r\nBased on real events, the book starts with a dramatic twist, where Bhagat is reading an e-mail sent by some young person Govind, who has consumed sleeping pills for some reason and is writing to Bhagat while waiting for his life to end. This book revolves around the three major mistakes committed by Govind in his life; he also happens to be the central character of the novel.\r\n\r\nGovind dreams to be a successful businessperson, while his friend Ishaan loves cricket and with the help of Omi and his priest parents, they set up their first venture - a sports accessoriesâ€™ shop in a rented place outside the temple premises.\r\n\r\nMostly revolving around these three young fellows, the novel has almost everything that youngsters in India can relate to; from budding love story and betrayal to death, riots and suicide, the book touches upon a wide range of emotions and common perceptions in India. Targeting young audiences, the 3 mistakes of my life is a simply written novel that like his previous work is filled with dramatic twists and turns that keep a reader glued to the book till the end.\r\n\r\nPublished: 2008\r\nNo. of Pages: 144', 0x54687265654d697374616b65736f664d794c6966652e6a7067, '2020-11-25 08:10:00', 'ThreeMistakesOfMyLife.pdf', 6),
(5, 'The Monk Who Sold His Ferrari', 'Robin Sharma', 'Fiction', 'A Fable About Fulfilling Your Dreams and Reaching Your Destiny by motivational speaker and author Robin Sharma is an inspiring tale that provides a step-by-step approach to living with greater courage, balance, abundance, and joy. The Monk Who Sold His Ferrari tells the extraordinary story of Julian Mantle, a lawyer forced to confront the spiritual crisis of his out-of-balance life, and the subsequent wisdom that he gains on a life-changing odyssey that enables him to create a life of passion, purpose, and peace.\r\n\r\nPublished: 1996\r\nNo. of Pages: 208\r\nISBN: 9788179921623', 0x5468654d6f6e6b57686f536f6c64486973466572726172692e6a7067, '2020-11-25 08:25:00', 'The Monk Who Sold His Ferrari ( PDFDrive ).pdf', 6),
(6, 'The Call of Cthulhu', 'H. P. Lovecraft', 'Horror', 'Three independent narratives linked together by the device of a narrator discovering notes left by a deceased relative. Piecing together the whole truth and disturbing significance of the information he possesses, the narrator\'s final line is \'\'The most merciful thing in the world, I think, is the inability of the human mind to correlate all its contents.\'\'', 0x54686543616c6c4f66437468756c68752e6a7067, '2020-11-25 10:05:00', 'The-Call-of-Cthulhu.pdf', 8),
(7, 'At the Mountains of Madness', 'H. P. Lovecraft', 'Horror', 'On an expedition to Antarctica, Professor William Dyer and his colleagues discover the remains of ancient half-vegetable, half-animal life-forms. The extremely early date in the geological strata is surprising because of the highly-evolved features found in these previously unknown life-forms. Through a series of dark revelations, violent episodes, and misunderstandings, the group learns of Earth\'s secret history and legacy.\r\nPublished: 1936\r\nNo. of Pages: 100\r\nISBN: 0812974417', 0x41745468654d6f756e7461696e736f664d61646e6573732e6a7067, '2020-11-25 17:30:00', 'At-the-Mountains-of-Madness.pdf', 6),
(8, 'The Adventures of Sherlock Holmes', 'Arthur Conan Doyle', 'Mystery', 'A delight for a public which enjoys incident, mystery, and above all that matching of the wits of a clever man against the dumb resistance of the secrecy of inanimate things, which results in the triumph of the human intelligence.\r\n\r\nPublished: 1892\r\nNo. of Pages: 236\r\nISBN: 0192835084', 0x416476656e74757265735f6f665f736865726c6f636b5f686f6c6d65732e6a7067, '2020-11-25 23:15:00', 'The-Adventures-of-Sherlock-Holmes.pdf', 12),
(9, 'Crime and Punishment', 'Fyodor Dostoyevsky', 'Mystery', 'From the Russian master of psychological characterizations, this novel portrays the carefully planned murder of a miserly, aged pawnbroker by a destitute Saint Petersburg student named Raskolnikov, followed by the emotional, mental, and physical effects of that action. Translated by Constance Garnett.\r\n\r\nPublished: 1866\r\nNo. of Pages: 491\r\nISBN: 0140449132', 0x6372696d65416e6450756e6973686d656e742e6a7067, '2020-11-25 23:25:00', 'Crime-and-Punishment-.pdf', 10);

-- --------------------------------------------------------

--
-- Table structure for table `mybooks`
--

CREATE TABLE `mybooks` (
  `user` varchar(50) NOT NULL,
  `bookid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mybooks`
--

INSERT INTO `mybooks` (`user`, `bookid`) VALUES
('vibha', 3),
('vibha', 5),
('vibha', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'vibha1', 'vibha1'),
(3, 'v', 'v'),
(4, 'harshitha', 'harshitha'),
(5, 'vibha', 'vibha'),
(6, 'testuser', 'testuser'),
(7, 'testuser2', 'testuser2'),
(8, 'testuser3', 'testuser3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `mybooks`
--
ALTER TABLE `mybooks`
  ADD PRIMARY KEY (`user`,`bookid`),
  ADD KEY `bookid` (`bookid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mybooks`
--
ALTER TABLE `mybooks`
  ADD CONSTRAINT `mybooks_ibfk_1` FOREIGN KEY (`bookid`) REFERENCES `books` (`bookid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
