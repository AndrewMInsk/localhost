-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3706
-- Время создания: Дек 14 2020 г., 17:34
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `newssite`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(1, 'Блузки', 2, 1),
(3, 'Штаны', 7, 1),
(5, 'Трусы', 0, 1),
(7, 'Носки', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `h1` varchar(255) NOT NULL,
  `short_content` text NOT NULL,
  `content` text NOT NULL,
  `category_id` int NOT NULL,
  `author_id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `preview` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `h1`, `short_content`, `content`, `category_id`, `author_id`, `date`, `preview`, `status`) VALUES
(1, 'news 1', 'short_content news 1', 'content news 1', 1, 1, '2020-11-23 15:27:57', 'preview news 1', 1),
(2, 'news 1', 'short_content news 2', 'content news 2', 2, 2, '2020-11-23 15:28:50', 'preview news 2', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news_category`
--

CREATE TABLE `news_category` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `sort_order` int NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news_category`
--

INSERT INTO `news_category` (`id`, `name`, `description`, `sort_order`, `status`) VALUES
(1, '4', '3', 2, 1),
(3, '4', '3', 2, 1),
(4, '4', '3', 2, 1),
(5, '4', '3', 2, 1),
(6, '4', '3', 2, 1),
(7, '222', '3333', 4444, 5555),
(8, '222', '3333', 4444, 5555),
(9, '222', 'проверка', 4444, 5555),
(10, '222', 'проверка', 4444, 5555),
(11, '222', 'проверка', 4444, 5555);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int NOT NULL,
  `code` int NOT NULL,
  `price` float NOT NULL,
  `availability` int NOT NULL,
  `brand` varchar(255) NOT NULL,
  `image` varchar(555) NOT NULL,
  `description` text NOT NULL,
  `is_new` int NOT NULL,
  `is_recommended` int NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `code`, `price`, `availability`, `brand`, `image`, `description`, `is_new`, `is_recommended`, `status`) VALUES
(1, 'Товар 1', 1, 22, 23.3, 1, 'Тошиба', '/images/home/product4.jpg', 'Описание ', 0, 1, 1),
(2, 'Товар 2', 3, 23, 33.3, 1, 'Панасоник', '/images/home/product3.jpg', 'Описание2 ', 1, 0, 1),
(3, 'Товар 3', 5, 221, 43.3, 1, 'Тошиба', '/images/home/product1.jpg', 'Описание ', 0, 1, 1),
(4, 'Товар 4', 1, 232, 53.3, 0, 'Панасоник', '/images/home/product2.jpg', 'Описание2 ', 1, 0, 1),
(5, 'Товар 11', 1, 22, 23.3, 1, 'Тошиба', '/images/home/product4.jpg', 'Описание ', 0, 1, 1),
(6, 'Товар 2', 3, 23, 33.3, 1, 'Панасоник', '/images/home/product3.jpg', 'Описание2 ', 1, 0, 1),
(7, 'Товар 3', 5, 221, 43.3, 1, 'Тошиба', '/images/home/product1.jpg', 'Описание ', 0, 1, 1),
(8, 'Товар 41', 1, 232, 53.3, 0, 'Панасоник', '/images/home/product2.jpg', 'Описание2 ', 1, 0, 1),
(9, 'Товар 12', 1, 22, 23.3, 1, 'Тошиба', '/images/home/product4.jpg', 'Описание ', 0, 1, 1),
(10, 'Товар 2', 3, 23, 33.3, 1, 'Панасоник', '/images/home/product3.jpg', 'Описание2 ', 1, 0, 1),
(11, 'Товар 3', 5, 221, 43.3, 1, 'Тошиба', '/images/home/product1.jpg', 'Описание ', 0, 1, 1),
(12, 'Товар 42', 1, 232, 53.3, 0, 'Панасоник', '/images/home/product2.jpg', 'Описание2 ', 1, 0, 1),
(13, 'Товар 13', 1, 22, 23.3, 1, 'Тошиба', '/images/home/product4.jpg', 'Описание ', 0, 1, 1),
(14, 'Товар 2', 3, 23, 33.3, 1, 'Панасоник', '/images/home/product3.jpg', 'Описание2 ', 1, 0, 1),
(15, 'Товар 3', 5, 221, 43.3, 1, 'Тошиба', '/images/home/product1.jpg', 'Описание ', 0, 1, 1),
(16, 'Товар 43', 1, 232, 53.3, 0, 'Панасоник', '/images/home/product2.jpg', 'Описание2 ', 1, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `publication`
--

CREATE TABLE `publication` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `short_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `content` text NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `publication`
--

INSERT INTO `publication` (`id`, `title`, `date`, `short_content`, `content`, `author_name`, `preview`, `type`) VALUES
(1, 'title1', '2020-11-25 19:30:45', 'short_content1', 'content1', 'author_name1', 'preview1', 'type1'),
(2, 'title2', '2020-11-25 19:30:47', 'short_content2', 'content2', 'author_name2', 'preview2', 'type2'),
(3, 'title3', '2020-11-25 19:30:47', 'short_content3', 'content3', 'author_name3', 'preview3', 'type3'),
(4, 'title4', '2020-11-25 19:30:47', 'short_content4', 'content4', 'author_name4', 'preview4', 'type3'),
(5, 'title4', '2020-11-25 19:30:47', 'short_content4', 'content4', 'author_name4', 'preview4', 'type32');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Индексы таблицы `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `publication`
--
ALTER TABLE `publication`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
