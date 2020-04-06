-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2020 at 07:53 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `winestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'white wine', '2020-03-12', '2020-03-12'),
(2, 'red wine', '2020-03-12', '2020-03-12'),
(3, 'rose wine', '2020-03-12', '2020-03-12'),
(4, 'desert or sweet wine', '2020-03-12', '2020-03-12'),
(5, 'sparkling wine', '2020-03-12', '2020-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'may', 'ohaya7@gmail.com', '12345', '2020-03-12 00:00:00', '2020-03-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wine`
--

CREATE TABLE `wine` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `image_url` varchar(200) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wine`
--

INSERT INTO `wine` (`id`, `name`, `categoryid`, `description`, `image_url`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 'Zinfandel', 2, 'Zinfandels are often associated with moms. Which is OK! Moms are great, and they have awesome taste: Zinfandel is an interesting wine because the taste can really vary based on where it is grown, though it is usually nice and juicy and high in alcohol content. Imagine juicy, spicy strawberries that ', '35e565332cff1b31b7d8dde5e99e181ab0416125.jpg', 1, 1, '2020-03-28', '2020-03-28'),
(4, 'Syrah', 2, 'Called Syrah in France and other European countries, and Shiraz in Australia, South America, and elsewhere, this wine is just plain fun to sip on it can be peppery, spicy, and bold, with the flavor of rich fruits like blackberry. Break this one out after a long day when you want to sit with a book a', '8285fcd70729b1cffb66a06ec3a04320cecd179c.jfif', 1, 1, '2020-03-30', '2020-03-30'),
(5, 'Alamos Malbec', 2, 'Though it is French in origin, most of the world is Malbec is now produced in Argentina so you may often see that country on its label. It is another easy drinking wine, with a deep purple color and plum or cherry flavors, ending in a hint of smoke. It is another crowd-pleaser.', '931a34ae48116d10b42b3f9f03d2edbaf6479bef.jpg', 1, 1, '2020-03-30', '2020-03-30'),
(6, 'Les Argelieres Pinot Noir', 2, 'Among the lightest and most delicate wines with this hue, Pinot Noir will not punch you in the face like some reds can; it has a light body in the lingo and feels silky to the tongue. You might taste bright berries like raspberry or cranberry.', 'b987ca8cb9df898ddfdf920307d1087a4acda1f9.jpg', 1, 1, '2020-03-31', '2020-03-31'),
(8, 'Chardonnay', 1, 'Chardonnay is so popular that it is nearly synonymous with white wine. We feel comfortable with it. It is easy to say, and it sounds like it ends with a smile. And because chardonnay is so ubiquitous, it can be easy to take for granted. Here are five things to know to make your chardonnay experience', '42968d719915061d527bd79b5de87ed4792c72e9.jpg', 1, 1, '2020-04-01', '2020-04-01'),
(9, 'Sauvignon blanc', 1, 'Sauvignon blanc is a green-skinned grape variety that originates from the Bordeaux region of France. The grape most likely gets its name from the French words sauvage (\"wild\") and blanc (\"white\") due to its early origins as an indigenous grape in South West France. It is possibly a descendant of Sav', '43bd4a50f837915012b9bd3bdb729b16ce8de670.jpg', 1, 1, '2020-04-01', '2020-04-01'),
(11, 'Ferrante Riesling', 1, 'Regionally grown grapes cool fermented and natural sugar retained. Aromas and flavors of peach, apricot, and citrus fruits.', '64c7c0c789bfdad87956850cda7fb73a61c66096.jpg', 1, 1, '2020-04-01', '2020-04-01'),
(12, 'Good Hope Chenin Blanc', 4, 'Good Hope Chenin Blanc, bush vines, rich and soft, honeyed, waxy, williams pears and quince, excellent value.', '012593920f990c916c9824542a8e9065fd679569.jpg', 1, 1, '2020-04-01', '2020-04-01'),
(14, 'Blandy Malmsey', 4, 'Blandy 10-Year-Old Malmsey Madeira has intensely concentrated nutty, caramel and honeyed flavors. Although it is a rich, fortified wine, it finishes bright due to Madeira higher acidity.', '327a33bb2aefa10af472e5a80b7805458c42dd95.jpg', 1, 1, '2020-04-01', '2020-04-01'),
(15, 'Marsannay roses', 3, 'Marsannay roses, their tender fruitiness recalls vine-grown peaches and gooseberry and in the mouth they are characteristically full, fresh, and enticing.', '3a231a727138cf48a30f3ee1d8692eadb4ba0a1e.jpg', 1, 1, '2020-04-01', '2020-04-01'),
(16, 'Bertani', 3, 'Bertani wine produced since as long ago as the 1930s, has now been given a more up-to-date style in order to bring out the best of the particular characteristics of the Molinara grape, which is vinified without appassimento.The innovative red vinification of the Molinara grapes combines with the tra', '62982d11443666d7c6fac90797ca326f29c3f25e.jpg', 1, 1, '2020-04-01', '2020-04-01'),
(17, ' Laurent-Perrier Brut', 5, ' Laurent-Perrier Brut Champagne, you will find a well-balanced mix of crisp, fresh and elegant flavors to accompany every announcement, whether that is a wedding, a birthday or another joy-filled occasion. You will also find hints of citrus and white fruit that add to the complexity of the tipple. I', 'a3aa3b959962e24fc26ddea5e8d959a4f90c8fba.jpg', 1, 1, '2020-04-01', '2020-04-01'),
(18, 'Roederer Estate Brut', 5, 'Roederer Estate Brut, the first California sparkling wine produced by Champagne Louis Roederer, builds upon a 200-year tradition of fine winemaking that has made Roederer champagne among the most sought-after in the world.', '900dcb6450b3b99639ee41b05e3ae7e605da924d.jpg', 1, 1, '2020-04-01', '2020-04-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wine`
--
ALTER TABLE `wine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryid` (`categoryid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wine`
--
ALTER TABLE `wine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wine`
--
ALTER TABLE `wine`
  ADD CONSTRAINT `wine_ibfk_1` FOREIGN KEY (`categoryid`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
