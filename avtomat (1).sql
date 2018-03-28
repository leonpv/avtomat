-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 28 2018 г., 18:19
-- Версия сервера: 5.5.57
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `avtomat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `black_list`
--

CREATE TABLE `black_list` (
  `id` int(11) NOT NULL,
  `User1` varchar(50) NOT NULL,
  `User2` varchar(50) NOT NULL,
  `Locked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Job`
--

CREATE TABLE `Job` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `No_relevant` tinyint(1) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Job`
--

INSERT INTO `Job` (`id`, `Name`, `Location`, `Type`, `Category`, `Description`, `Author`, `No_relevant`, `Time`) VALUES
(2, '4234', 'Arizona', 'Full Time', 'Retail & Sales', '124', 'Test', 0, '2018-03-28 08:47:53'),
(3, '532', 'Hawaii', 'Part Time', 'Retail & Sales', '124', 'Test', 0, '2018-03-28 08:48:29');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `Sender` varchar(50) NOT NULL,
  `Recipient` varchar(50) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Viewed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `Sender`, `Recipient`, `Message`, `Time`, `Viewed`) VALUES
(1, '10', '9', 'ТА НУУУ', '2018-03-26 01:30:49', 0),
(2, '9', '10', 'ВОООООУ', '2018-03-26 01:32:02', 0),
(3, '9', '10', 'ОНО РОБИТ УХППХХПХП', '2018-03-26 01:32:22', 0),
(4, '9', '10', 'ЛУЧШЕ ЧЕМ НИЧЕГО', '2018-03-26 01:32:44', 0),
(14, '9', '10', 'qwe', '2018-03-26 01:54:38', 0),
(15, '9', '10', 'УХУ', '2018-03-26 01:55:12', 0),
(16, '10', '9', 'ХЕ ХЕ ХЕ', '2018-03-26 02:03:26', 0),
(17, '9', '10', 'MYRR', '2018-03-26 02:07:16', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Gender` varchar(5) NOT NULL,
  `Phone_number` varchar(20) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `First_Name`, `Last_Name`, `Email`, `Gender`, `Phone_number`, `Username`, `Password`) VALUES
(9, '121', '123', '123@123.123', 'Women', '8 (123) 133-31-24', '123', '$2y$10$rTSc.pFOsFcpar/bGV6nEeLQOhp3KQcleSOHQbbTFUSSn2vfaDlkG'),
(10, 'Test', 'Test', 'Test@test.rest', 'Men', '8 (999) 999-99-99', 'Test', '$2y$10$hpunBhpTnoOFY6CH4oULhOSBcNE1tDWjRNchLvSjAmE7g.2ZRp.yG'),
(11, '1234', '1234', '1234@1234', 'Men', '8 (123) 412-34-12', '1234', '$2y$10$0M9Ljv.MdgwLQ2E28/KVXObeF/7lt3k7FyNoHVFTmGhg0OWjWntQe');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `black_list`
--
ALTER TABLE `black_list`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Job`
--
ALTER TABLE `Job`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `black_list`
--
ALTER TABLE `black_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `Job`
--
ALTER TABLE `Job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
