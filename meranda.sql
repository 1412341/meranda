-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2019 at 02:33 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meranda`
--

-- --------------------------------------------------------

--
-- Table structure for table `meranda_account`
--

CREATE TABLE `meranda_account` (
  `id` int(10) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `displayedName` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meranda_account`
--

INSERT INTO `meranda_account` (`id`, `username`, `password`, `displayedName`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `meranda_blog`
--

CREATE TABLE `meranda_blog` (
  `id` int(10) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meranda_blog`
--

INSERT INTO `meranda_blog` (`id`, `title`, `content`, `date`, `picture`, `author`, `slug`, `timestamp`) VALUES
(7, 'News Needs to Meet Its Audiences Where They Are 123', '<p style=\"margin-bottom: 1rem; color: rgb(128, 128, 128); font-family: Cabin, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14.4px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit officia neque beatae at inventore excepturi numquam sint commodi alias, quam consequuntur corporis ex, distinctio eaque sapiente pariatur iure ad necessitatibus in quod obcaecati natus consequatur. Sed dicta maiores, eos culpa.</p><p style=\"margin-bottom: 1rem; color: rgb(128, 128, 128); font-family: Cabin, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14.4px;\">Voluptatum animi, voluptate sint aperiam facere a nam, ex reiciendis eum nemo ipsum nobis, rem illum cupiditate at quaerat amet qui recusandae hic, atque laboriosam perspiciatis? Esse quidem minima, voluptas necessitatibus, officia culpa quo nulla, cupiditate iste vel unde magni.</p><p style=\"margin-bottom: 1rem; color: rgb(128, 128, 128); font-family: Cabin, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14.4px;\">Nulla nesciunt eligendi ratione, atque, hic, ullam suscipit quos enim vitae fugiat ducimus, dolore delectus iste id culpa. Ducimus, iste magnam sed reprehenderit architecto perferendis odio voluptas molestiae quidem ab numquam debitis, dolorem incidunt, tempore a quod qui nobis. Voluptates!</p><p style=\"margin-bottom: 1rem; color: rgb(128, 128, 128); font-family: Cabin, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14.4px;\">Blanditiis, ipsum sed odio reprehenderit sequi ut vitae, dolor minima ab! Architecto nesciunt nemo sint est aspernatur fugit consequatur, magnam suscipit asperiores illo eum repellendus officia dolorem, molestiae commodi nam voluptatem quis quia vel cumque quos, aliquam ex incidunt sapiente!</p><p style=\"margin-bottom: 1rem; color: rgb(128, 128, 128); font-family: Cabin, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14.4px;\">Suscipit, officiis, vero! Perferendis accusamus quos voluptatum culpa, provident maiores! Illo itaque ullam fugit molestiae, eaque accusamus impedit autem numquam. Placeat molestias tempore eaque ipsam vel voluptatum velit enim quam iusto maxime delectus, sint sapiente ea, quo excepturi nisi! Quia.</p><p style=\"margin-bottom: 1rem; color: rgb(128, 128, 128); font-family: Cabin, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14.4px;\">Dolores debitis excepturi maxime earum sapiente totam, quos dolore inventore tempore illum. Dolores explicabo sed amet aut atque, facere aliquid repudiandae quod possimus quo hic similique et voluptates fugit iure dolore quam ipsa numquam assumenda corporis? Dignissimos expedita fugit sapiente.</p><p style=\"margin-bottom: 1rem; color: rgb(128, 128, 128); font-family: Cabin, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14.4px;\">Cupiditate ut, aspernatur labore obcaecati, eveniet aut velit nulla facere suscipit est recusandae vel error itaque earum doloremque hic necessitatibus dignissimos dolores libero laudantium ducimus! Rem dolorem ratione officia et, fugit non, fuga suscipit eos veritatis enim perspiciatis, magni sit!</p>', '05:35, August 10th 19', './Pictures/Blog/0e65972dce68dad4d52d063967f0a705.jpg', 'Admin', 'news-needs-to-meet-its-audiences-where-they-are-123', '2019-08-10 10:35:51'),
(8, 'News Needs to Meet Its Audiences Where They Are', '<p style=\"margin-bottom: 1rem; color: rgb(128, 128, 128); font-family: Cabin, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14.4px;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit officia neque beatae at inventore excepturi numquam sint commodi alias, quam consequuntur corporis ex, distinctio eaque sapiente pariatur iure ad necessitatibus in quod obcaecati natus consequatur. Sed dicta maiores, eos culpa.</p><p style=\"margin-bottom: 1rem; color: rgb(128, 128, 128); font-family: Cabin, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14.4px;\">Voluptatum animi, voluptate sint aperiam facere a nam, ex reiciendis eum nemo ipsum nobis, rem illum cupiditate at quaerat amet qui recusandae hic, atque laboriosam perspiciatis? Esse quidem minima, voluptas necessitatibus, officia culpa quo nulla, cupiditate iste vel unde magni.</p><p style=\"margin-bottom: 1rem; color: rgb(128, 128, 128); font-family: Cabin, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14.4px;\">Nulla nesciunt eligendi ratione, atque, hic, ullam suscipit quos enim vitae fugiat ducimus, dolore delectus iste id culpa. Ducimus, iste magnam sed reprehenderit architecto perferendis odio voluptas molestiae quidem ab numquam debitis, dolorem incidunt, tempore a quod qui nobis. Voluptates!</p><p style=\"margin-bottom: 1rem; color: rgb(128, 128, 128); font-family: Cabin, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14.4px;\">Blanditiis, ipsum sed odio reprehenderit sequi ut vitae, dolor minima ab! Architecto nesciunt nemo sint est aspernatur fugit consequatur, magnam suscipit asperiores illo eum repellendus officia dolorem, molestiae commodi nam voluptatem quis quia vel cumque quos, aliquam ex incidunt sapiente!</p><p style=\"margin-bottom: 1rem; color: rgb(128, 128, 128); font-family: Cabin, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14.4px;\">Suscipit, officiis, vero! Perferendis accusamus quos voluptatum culpa, provident maiores! Illo itaque ullam fugit molestiae, eaque accusamus impedit autem numquam. Placeat molestias tempore eaque ipsam vel voluptatum velit enim quam iusto maxime delectus, sint sapiente ea, quo excepturi nisi! Quia.</p><p style=\"margin-bottom: 1rem; color: rgb(128, 128, 128); font-family: Cabin, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14.4px;\">Dolores debitis excepturi maxime earum sapiente totam, quos dolore inventore tempore illum. Dolores explicabo sed amet aut atque, facere aliquid repudiandae quod possimus quo hic similique et voluptates fugit iure dolore quam ipsa numquam assumenda corporis? Dignissimos expedita fugit sapiente.</p><p style=\"margin-bottom: 1rem; color: rgb(128, 128, 128); font-family: Cabin, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 14.4px;\">Cupiditate ut, aspernatur labore obcaecati, eveniet aut velit nulla facere suscipit est recusandae vel error itaque earum doloremque hic necessitatibus dignissimos dolores libero laudantium ducimus! Rem dolorem ratione officia et, fugit non, fuga suscipit eos veritatis enim perspiciatis, magni sit!</p>', '05:34, August 10th 19', './Pictures/Blog/006f52e9102a8d3be2fe5614f42ba989.jpg', 'Admin', 'news-needs-to-meet-its-audiences-where-they-are', '2019-08-10 10:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `meranda_blog_category`
--

CREATE TABLE `meranda_blog_category` (
  `id` int(10) NOT NULL,
  `blog_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meranda_blog_category`
--

INSERT INTO `meranda_blog_category` (`id`, `blog_id`, `category_id`) VALUES
(18, 8, 6),
(19, 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `meranda_category`
--

CREATE TABLE `meranda_category` (
  `id` int(10) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meranda_category`
--

INSERT INTO `meranda_category` (`id`, `title`, `picture`, `slug`) VALUES
(6, 'Entertainment', './Pictures/Category/6c4b761a28b734fe93831e3fb400ce87.png', 'entertainment-684'),
(7, 'Politics', './Pictures/Category/8f85517967795eeef66c225f7883bdcb.png', 'politics-891');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meranda_account`
--
ALTER TABLE `meranda_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meranda_blog`
--
ALTER TABLE `meranda_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meranda_blog_category`
--
ALTER TABLE `meranda_blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meranda_category`
--
ALTER TABLE `meranda_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meranda_account`
--
ALTER TABLE `meranda_account`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meranda_blog`
--
ALTER TABLE `meranda_blog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `meranda_blog_category`
--
ALTER TABLE `meranda_blog_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `meranda_category`
--
ALTER TABLE `meranda_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
