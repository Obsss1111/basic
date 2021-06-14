-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 14 2021 г., 13:48
-- Версия сервера: 8.0.15
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2basic`
--

-- --------------------------------------------------------

--
-- Структура таблицы `albums`
--

CREATE TABLE `albums` (
  `id_album` int(11) NOT NULL,
  `name_album` varchar(45) NOT NULL,
  `img` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `autor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `albums`
--

INSERT INTO `albums` (`id_album`, `name_album`, `img`, `autor_id`) VALUES
(1, 'Пыль', 'PepegaDance.gif', NULL),
(2, 'Небо', '', NULL),
(3, 'Мечты', NULL, NULL),
(4, 'Грёзы', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `albums_music`
--

CREATE TABLE `albums_music` (
  `am_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `ahm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `albums_music`
--

INSERT INTO `albums_music` (`am_id`, `album_id`, `ahm_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 3, 6),
(7, 3, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img` text CHARACTER SET utf8 COLLATE utf8_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `autor`
--

INSERT INTO `autor` (`id`, `name`, `img`) VALUES
(1, 'NoName', ''),
(2, 'Skillet', ''),
(3, 'Three Days Grace', ''),
(4, 'SEREBRO', '');

-- --------------------------------------------------------

--
-- Структура таблицы `autor_has_music`
--

CREATE TABLE `autor_has_music` (
  `id_ahm` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_music` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `autor_has_music`
--

INSERT INTO `autor_has_music` (`id_ahm`, `id_autor`, `id_music`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 9),
(7, 2, 10),
(12, 3, 43),
(13, 4, 44);

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `code` char(2) NOT NULL,
  `name` char(52) NOT NULL,
  `population` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`code`, `name`, `population`) VALUES
('AU', 'Australia', 24016400),
('BR', 'Brazil', 205722000),
('CA', 'Canada', 35985751),
('CN', 'China', 1375210000),
('DE', 'Germany', 81459000),
('FR', 'France', 64513242),
('GB', 'United Kingdom', 65097000),
('IN', 'India', 1285400000),
('RU', 'Russia', 146519759),
('US', 'U.S.A.', 322976000),
('ру', 'Россия', 146000000),
('рф', 'РФ', 147000000);

-- --------------------------------------------------------

--
-- Структура таблицы `favorite_albums`
--

CREATE TABLE `favorite_albums` (
  `id_fav_album` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `albums_id_album` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `favorite_albums`
--

INSERT INTO `favorite_albums` (`id_fav_album`, `user_id`, `albums_id_album`) VALUES
(2, 2, 1),
(3, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `favorite_authors`
--

CREATE TABLE `favorite_authors` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `favorite_authors`
--

INSERT INTO `favorite_authors` (`id`, `name`, `user_id`, `autor_id`) VALUES
(1, 'Like', 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `favorite_music`
--

CREATE TABLE `favorite_music` (
  `music_id_music` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `favorite_music`
--

INSERT INTO `favorite_music` (`music_id_music`, `user_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 2),
(3, 3),
(4, 2),
(4, 3),
(5, 2),
(5, 3),
(9, 2),
(9, 3),
(9, 4),
(10, 1),
(10, 2),
(10, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `favorite_style`
--

CREATE TABLE `favorite_style` (
  `music_style_id_style` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `music`
--

CREATE TABLE `music` (
  `id_music` int(11) NOT NULL,
  `name_music` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `path_music_id_path` int(11) DEFAULT NULL,
  `music_style_id_style` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `music`
--

INSERT INTO `music` (`id_music`, `name_music`, `path_music_id_path`, `music_style_id_style`) VALUES
(1, 'first music', 1, 1),
(2, 'second music', 2, 2),
(3, 'third music', 3, 3),
(4, 'HateBit – HateBit - Dance ', 4, NULL),
(5, 'KIRA   Circles Ft. GUMI English', 5, NULL),
(9, 'Kira - Machine gun feat GUMI', 6, NULL),
(10, 'love-harder-feat.-amber-van-day-oblivion', 7, NULL),
(43, 'Sound', 10, 3),
(44, 'Some sound', 8, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `music_style`
--

CREATE TABLE `music_style` (
  `id_style` int(11) NOT NULL,
  `name_style` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `music_style`
--

INSERT INTO `music_style` (`id_style`, `name_style`) VALUES
(3, 'Альтернатива'),
(5, 'Джаз'),
(7, 'Зарубежная музыка'),
(9, 'К-поп'),
(8, 'Классика'),
(4, 'Метал'),
(1, 'Поп'),
(2, 'Рок'),
(6, 'Русская музыка'),
(10, 'Электроника');

-- --------------------------------------------------------

--
-- Структура таблицы `path_music`
--

CREATE TABLE `path_music` (
  `id_path` int(11) NOT NULL,
  `path` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `path_music`
--

INSERT INTO `path_music` (`id_path`, `path`) VALUES
(1, 'HateBit – Bricks_(mp3fan.ru).mp3'),
(2, 'HateBit – Chiptune Your Head (OST I hate this game)_(mp3fan.ru).mp3'),
(3, 'HateBit – HateBit - Against the game (OST I hate this game)_(mp3fan.ru).mp3'),
(4, 'HateBit – HateBit - Dance (OST I hate this game)_(mp3fan.ru).mp3'),
(5, 'KIRA   Circles Ft. GUMI English.mp3'),
(6, 'Kira - Machine gun feat GUMI.mp3'),
(7, 'love-harder-feat.-amber-van-day-oblivion.mp3'),
(9, 'MC sMorchago – Pixelizer_(mp3fan.ru).mp3'),
(11, 'Skillet Hero.mp3'),
(10, 'Skillet Never Going Back.mp3'),
(8, 'Skillet Not Gonna Die.mp3');

-- --------------------------------------------------------

--
-- Структура таблицы `playlists`
--

CREATE TABLE `playlists` (
  `id` int(2) NOT NULL COMMENT 'Id плейлиста',
  `name` varchar(32) NOT NULL COMMENT 'Название плейлиста',
  `owner` text NOT NULL COMMENT 'Владелец плейлиста'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `auth_key` varchar(64) NOT NULL,
  `password_hash` varchar(64) NOT NULL,
  `passwork_reset_token` varchar(64) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` varchar(64) NOT NULL,
  `updated_at` varchar(64) NOT NULL,
  `access` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `passwork_reset_token`, `email`, `status`, `created_at`, `updated_at`, `access`) VALUES
(1, 'admin', 'OCMSVEWV-yM_uk7YFxeILlnivIZj58uY', '$2y$13$W.qSBuIuczIb83agq7et8.v2WfW2JCo0Yh831/4W73JKaL0oIHjqy', NULL, '', 10, '2016-07-16 18:33:00.000000', '2016-07-16 18:33:00.000000', 1),
(2, 'demo', 'A-62kSKcPjAlRjvv106OTLmdnQJ7zZ1I', '$2y$13$Z9C.iB/N77TQyz.HkRJ1Fe/ndgwFUbRx22sXOUoRZFPWTvfe4WHVy', NULL, '', 10, '1608807422', '1608807422', 0),
(3, 'user', 'T-wfSr0XGpw5rGRszjECdYcqtMA0LD7_', '$2y$13$eD2tqhItkvo473ZZb/tAu.vZVXYB0REzZq6vG1NJCGae4fDofKcg2', NULL, '', 10, '1619335096', '1619335096', 0),
(4, 'mama', 'RWTOOMWnXLMjHKTrxnmddsLpbXIs-vi5', '$2y$13$LGU.KdqWhken6DQROdjty.rNWaHtrgRI/wvvIuyL6AKMeIDaVjFUm', NULL, '', 10, '1622558900', '1622558900', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id_album`),
  ADD KEY `fk_albums_autor_id1` (`autor_id`);

--
-- Индексы таблицы `albums_music`
--
ALTER TABLE `albums_music`
  ADD PRIMARY KEY (`am_id`) USING BTREE,
  ADD UNIQUE KEY `autor_id` (`ahm_id`) USING BTREE,
  ADD KEY `id_album` (`album_id`) USING BTREE;

--
-- Индексы таблицы `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_autor` (`name`);

--
-- Индексы таблицы `autor_has_music`
--
ALTER TABLE `autor_has_music`
  ADD PRIMARY KEY (`id_ahm`),
  ADD UNIQUE KEY `id_autor` (`id_autor`,`id_music`) USING BTREE,
  ADD KEY `fk_autor_has_music_music1_idx` (`id_music`),
  ADD KEY `fk_autor_has_music_autor_idx` (`id_autor`) USING BTREE;

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`code`);

--
-- Индексы таблицы `favorite_albums`
--
ALTER TABLE `favorite_albums`
  ADD PRIMARY KEY (`id_fav_album`),
  ADD KEY `fk_favorite_albums_user1_idx` (`user_id`),
  ADD KEY `fk_favorite_albums_albums1_idx` (`albums_id_album`) USING BTREE;

--
-- Индексы таблицы `favorite_authors`
--
ALTER TABLE `favorite_authors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `favorite_music`
--
ALTER TABLE `favorite_music`
  ADD PRIMARY KEY (`user_id`,`music_id_music`) USING BTREE,
  ADD KEY `fk_favorite_music_music1_idx` (`music_id_music`),
  ADD KEY `fk_favorite_music_user1_idx` (`user_id`);

--
-- Индексы таблицы `favorite_style`
--
ALTER TABLE `favorite_style`
  ADD KEY `fk_favorite_style_music_style1_idx` (`music_style_id_style`),
  ADD KEY `fk_favorite_style_user1_idx` (`user_id`);

--
-- Индексы таблицы `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id_music`),
  ADD UNIQUE KEY `fk_music_path_music1_idx` (`path_music_id_path`) USING BTREE;

--
-- Индексы таблицы `music_style`
--
ALTER TABLE `music_style`
  ADD PRIMARY KEY (`id_style`),
  ADD UNIQUE KEY `name_style_UNIQUE` (`name_style`);

--
-- Индексы таблицы `path_music`
--
ALTER TABLE `path_music`
  ADD PRIMARY KEY (`id_path`),
  ADD UNIQUE KEY `path_UNIQUE` (`path`);

--
-- Индексы таблицы `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `albums_music`
--
ALTER TABLE `albums_music`
  MODIFY `am_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `autor_has_music`
--
ALTER TABLE `autor_has_music`
  MODIFY `id_ahm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `favorite_albums`
--
ALTER TABLE `favorite_albums`
  MODIFY `id_fav_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `favorite_authors`
--
ALTER TABLE `favorite_authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `music`
--
ALTER TABLE `music`
  MODIFY `id_music` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `music_style`
--
ALTER TABLE `music_style`
  MODIFY `id_style` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `path_music`
--
ALTER TABLE `path_music`
  MODIFY `id_path` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'Id плейлиста';

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `albums_music`
--
ALTER TABLE `albums_music`
  ADD CONSTRAINT `albums_music_ibfk_1` FOREIGN KEY (`ahm_id`) REFERENCES `autor_has_music` (`id_ahm`),
  ADD CONSTRAINT `albums_music_ibfk_2` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id_album`);

--
-- Ограничения внешнего ключа таблицы `autor_has_music`
--
ALTER TABLE `autor_has_music`
  ADD CONSTRAINT `autor_has_music_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `autor_has_music_ibfk_2` FOREIGN KEY (`id_music`) REFERENCES `music` (`id_music`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `favorite_albums`
--
ALTER TABLE `favorite_albums`
  ADD CONSTRAINT `favorite_albums_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_albums_ibfk_2` FOREIGN KEY (`albums_id_album`) REFERENCES `albums` (`id_album`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `favorite_music`
--
ALTER TABLE `favorite_music`
  ADD CONSTRAINT `favorite_music_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_music_ibfk_2` FOREIGN KEY (`music_id_music`) REFERENCES `music` (`id_music`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `favorite_style`
--
ALTER TABLE `favorite_style`
  ADD CONSTRAINT `favorite_style_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `music`
--
ALTER TABLE `music`
  ADD CONSTRAINT `music_ibfk_1` FOREIGN KEY (`path_music_id_path`) REFERENCES `path_music` (`id_path`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
