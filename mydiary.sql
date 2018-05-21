-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 21 2018 г., 19:45
-- Версия сервера: 5.5.50
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mydiary`
--

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL,
  `name_role` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name_role`) VALUES
(1, 'Father'),
(2, 'Mother'),
(3, 'Child');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL,
  `task` varchar(200) NOT NULL,
  `describeTask` varchar(500) NOT NULL,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `status_task` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `task`, `describeTask`, `user_id`, `status_task`, `created_at`, `end`) VALUES
(1, 'Washes dishes', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis est dolor voluptatem nihil dignissimos tempore nisi quasi illum odio atque iusto corrupti, quaerat omnis ipsam!', 2, 0, '2018-05-21 15:34:01', '0000-00-00 00:00:00'),
(2, 'Washes dishes', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis est dolor voluptatem nihil dignissimos tempore nisi quasi illum odio atque iusto corrupti, quaerat omnis ipsam!', 2, 1, '2018-05-21 16:34:21', '0000-00-00 00:00:00'),
(3, 'Walk the dog', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quidem quasi earum voluptatibus libero ipsa magnam vel nobis necessitatibus cupiditate deserunt delectus placeat repudiandae nostrum, sit cum, et ea maxime asperiores! Quis, obcaecati, quibusdam neque qui dolor sapiente, tenetur a eius tempora dolorum sunt molestias ipsam.', 1, 0, '2018-05-20 22:42:39', '0000-00-00 00:00:00'),
(4, 'Walk the dog', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quidem quasi earum voluptatibus libero ipsa magnam vel nobis necessitatibus cupiditate deserunt delectus placeat repudiandae nostrum, sit cum, et ea maxime asperiores!', 1, 0, '2018-05-20 22:47:13', '2018-05-21 21:00:00'),
(5, 'Cleaning the house', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur impedit quam beatae saepe iure tempore dolores eos. Nihil sequi, sit ipsum magnam error deleniti voluptate natus explicabo, temporibus velit? Ducimus, nobis? Perspiciatis officiis reprehenderit maiores.', 5, 1, '2018-05-21 16:36:30', '2018-05-26 00:00:00'),
(6, 'Go to the grocery store', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta natus, repellendus amet porro facilis quos veniam repudiandae id! Veritatis nobis, tempore error? Eveniet in ea recusandae natus cupiditate amet eligendi error saepe deserunt debitis autem, sed consectetur, nostrum nesciunt quo distinctio, esse ullam quibusdam deleniti aliquid earum. Nihil, possimus, hic!', 4, 1, '2018-05-21 16:33:54', '2018-05-22 18:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `password` varchar(32) NOT NULL,
  `role_id` int(11) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `role_id`, `created`) VALUES
(1, 'Nikita', '0de959beaa82daa7df6ef2286d071a6d', 1, '2018-05-17 23:40:40'),
(2, 'Alevtina', '6ee6a213cb02554a63b1867143572e70', 2, '2018-05-18 00:03:08'),
(4, 'Sergey', '1b7d5726533ab525a8760351e9b5e415', 3, '2018-05-18 01:30:34'),
(5, 'Masha', '1b7d5726533ab525a8760351e9b5e415', 3, '2018-05-18 01:36:09');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
