-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 10.0.0.246
-- Время создания: Апр 14 2021 г., 07:23
-- Версия сервера: 5.7.31-34
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `a0494842_portal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Жилье'),
(3, 'Детские Сады'),
(4, 'Школы'),
(5, 'Социальные');

-- --------------------------------------------------------

--
-- Структура таблицы `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `photo_before` text COLLATE utf8_unicode_ci NOT NULL,
  `date` int(11) NOT NULL,
  `photo_after` text COLLATE utf8_unicode_ci,
  `reason` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `request`
--

INSERT INTO `request` (`id`, `name`, `text`, `category`, `photo_before`, `date`, `photo_after`, `reason`, `status`, `owner`) VALUES
(17, 'Все плохо', 'sadsa', 2, 'Screenshot_13.png', 1618360682, 'Screenshot_26.png', NULL, 2, 3),
(18, 'Ветхое жилье', 'Наш дом признан аварийным!', 2, 'Без названия.jpg', 1618366676, NULL, 'Дом не считается аварийным', 3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Новая'),
(2, 'Решена'),
(3, 'Отклонена');

-- --------------------------------------------------------

--
-- Структура таблицы `type_user`
--

CREATE TABLE `type_user` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `type_user`
--

INSERT INTO `type_user` (`id`, `name`) VALUES
(1, 'Пользователь'),
(2, 'Админ');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `last_name` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `patronymic` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `email`, `last_name`, `name`, `patronymic`, `password`, `type`) VALUES
(2, 'test', 'test@mail.ru', 'Тестовый', 'Тест', 'Тестович', '$2y$13$dqZAhEQGuTdDUmD0xYB4sOnvb5i0Vb8r/eI6.0OgvK4PDYy8n4PM6', 1),
(3, 'valera', 'valera@mail.ru', 'Жмышенко', 'Валерий', 'Альбертович', '$2y$13$s6byCyy1WCBbIqFWOJ0jBuhJ24bspK2rpuYA/YuTG96JSEk7./9Qy', 1),
(4, 'testt', 'test2@mail.ru', 'АФЫ', 'фыв', 'фыв', '$2y$13$Y999mWe8jICnu7akQMUEceC9pEOwQCJzkU2SKygbEkH/4cXrT4aq.', 1),
(5, 'admin', 'admin@mail.ru', 'Админ', 'Админ', 'Админ', '$2y$13$jN8YoGEB8ngqfyiCx9wUgeRkR7DrBNPoEq6LXbQU1Be3lcJHD8LjG', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `status` (`status`),
  ADD KEY `owner` (`owner`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type_user`
--
ALTER TABLE `type_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `type` (`type`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `type_user`
--
ALTER TABLE `type_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`status`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `request_ibfk_3` FOREIGN KEY (`owner`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`type`) REFERENCES `type_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
