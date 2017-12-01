-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 01 2017 г., 15:39
-- Версия сервера: 5.6.31-log
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bank_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `account_type_id` int(11) NOT NULL,
  `account_currency_id` int(11) NOT NULL,
  `date_create` date NOT NULL,
  `account_number` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `percent` int(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `accounts`
--

INSERT INTO `accounts` (`id`, `client_id`, `account_type_id`, `account_currency_id`, `date_create`, `account_number`, `sum`, `percent`, `balance`) VALUES
(1, 1, 1, 1, '2017-11-01', 12345, 1000, 16, 1412),
(2, 2, 1, 1, '2017-11-01', 789563, 5000, 18, 7568),
(3, 5, 1, 1, '2017-12-01', 789456, 600, 15, 400),
(4, 6, 1, 1, '2017-11-01', 78946132, 3800, 7, 3890),
(6, 6, 1, 1, '2017-10-01', 7777777, 1500, 12, 1171);

-- --------------------------------------------------------

--
-- Структура таблицы `account_currencies`
--

CREATE TABLE IF NOT EXISTS `account_currencies` (
  `id` int(11) NOT NULL,
  `code` text NOT NULL,
  `sign` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `account_currencies`
--

INSERT INTO `account_currencies` (`id`, `code`, `sign`) VALUES
(1, 'USD', '$'),
(2, 'EUR', '€'),
(3, 'UAH', '₴');

-- --------------------------------------------------------

--
-- Структура таблицы `account_types`
--

CREATE TABLE IF NOT EXISTS `account_types` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `account_types`
--

INSERT INTO `account_types` (`id`, `type`, `name`) VALUES
(1, 'deposit', 'Депозит'),
(2, 'loan', 'Кредит'),
(3, 'debet', 'Дебетный');

-- --------------------------------------------------------

--
-- Структура таблицы `age_categories`
--

CREATE TABLE IF NOT EXISTS `age_categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `age_categories`
--

INSERT INTO `age_categories` (`id`, `name`) VALUES
(1, 'I группа'),
(2, 'II группа'),
(3, 'III группа');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL,
  `inn` int(11) NOT NULL,
  `name` text NOT NULL,
  `last_name` text NOT NULL,
  `gender` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `age_category_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `inn`, `name`, `last_name`, `gender`, `date_of_birth`, `age_category_id`) VALUES
(1, 1234567890, 'Hamlet', 'Hushchian', 'man', '1995-04-03', 1),
(2, 1263589741, 'Vasa', 'Pupkin', 'man', '1985-11-14', 2),
(5, 1425369925, 'Таня', 'Печкина', 'woman', '1980-12-14', 2),
(6, 1592364782, 'Петр', 'Пятоякин', 'man', '1950-11-13', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `operation_type` text NOT NULL,
  `sum` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `history`
--

INSERT INTO `history` (`id`, `account_id`, `date`, `operation_type`, `sum`) VALUES
(1, 1, '2017-12-12', 'percent', 160),
(2, 2, '2017-12-03', 'percent', 900),
(3, 4, '2017-12-01', 'percent', 266),
(4, 1, '2017-12-01', 'commission', 70),
(5, 2, '2017-12-01', 'commission', 354),
(6, 3, '2017-12-01', 'commission', 50),
(7, 4, '2017-12-01', 'commission', 244),
(8, 6, '2017-12-01', 'commission', 90),
(9, 1, '2017-11-01', 'percent', 174),
(10, 2, '2017-11-01', 'percent', 998),
(11, 4, '2017-11-01', 'percent', 268),
(12, 1, '2017-11-01', 'commission', 76),
(13, 2, '2017-11-01', 'commission', 393),
(14, 3, '2017-11-01', 'commission', 50),
(15, 4, '2017-11-01', 'commission', 245),
(16, 6, '2017-11-01', 'commission', 85),
(17, 1, '2017-12-01', 'percent', 190),
(18, 2, '2017-12-01', 'percent', 1107),
(19, 4, '2017-12-01', 'percent', 269),
(20, 1, '2017-12-01', 'commission', 83),
(21, 2, '2017-12-01', 'commission', 435),
(22, 3, '2017-12-01', 'commission', 50),
(23, 4, '2017-12-01', 'commission', 247),
(24, 6, '2017-12-01', 'commission', 80),
(25, 1, '2017-12-01', 'percent', 207),
(26, 2, '2017-12-01', 'percent', 1228),
(27, 4, '2017-12-01', 'percent', 271),
(28, 1, '2017-12-01', 'commission', 90),
(29, 2, '2017-12-01', 'commission', 483),
(30, 3, '2017-12-01', 'commission', 50),
(31, 4, '2017-12-01', 'commission', 248),
(32, 6, '2017-12-01', 'commission', 75);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_type_id` (`account_type_id`) USING BTREE,
  ADD KEY `account_currency_id` (`account_currency_id`),
  ADD KEY `client_id` (`client_id`) USING BTREE;

--
-- Индексы таблицы `account_currencies`
--
ALTER TABLE `account_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `age_categories`
--
ALTER TABLE `age_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inn` (`inn`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD KEY `age_category_id` (`age_category_id`) USING BTREE;

--
-- Индексы таблицы `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `account_currencies`
--
ALTER TABLE `account_currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `account_types`
--
ALTER TABLE `account_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `age_categories`
--
ALTER TABLE `age_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`account_type_id`) REFERENCES `account_types` (`id`),
  ADD CONSTRAINT `accounts_ibfk_2` FOREIGN KEY (`account_currency_id`) REFERENCES `account_currencies` (`id`),
  ADD CONSTRAINT `accounts_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Ограничения внешнего ключа таблицы `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`age_category_id`) REFERENCES `age_categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
