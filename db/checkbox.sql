-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 05 2022 г., 11:24
-- Версия сервера: 5.7.16
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `checkbox`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` mediumtext NOT NULL,
  `description` longtext,
  `daytime` int(11) NOT NULL,
  `deadline` int(11) NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `uid`, `title`, `description`, `daytime`, `deadline`, `checked`, `deleted`) VALUES
(6, 10, 'Новая задача 1', 'Идейные соображения высшего порядка, а также внедрение современных методик обеспечивает широкому кругу (специалистов) участие в формировании поставленных обществом задач.', 1646397113, 1646859600, 0, 0),
(7, 10, 'Новая задача 2', 'Учитывая ключевые сценарии поведения, социально-экономическое развитие прекрасно подходит для реализации инновационных методов управления процессами.', 1646397158, 1646427600, 0, 0),
(8, 11, 'Тестовая задача', 'цукаыепкеннркпгнр', 1646416927, 1647982800, 0, 0),
(9, 11, 'Тестовая задача 2', 'фуппаиоло\\r\\nымрворпо', 1646417183, 1647982800, 0, 0),
(10, 10, 'Тестовая задача 1', 'аыспмипроптор\\r\\nпниотмрол', 1646417827, 1647291600, 0, 0),
(11, 11, 'Тестовая задача 3', 'квмр\\r\\nымриапорптлпрл\\r\\nапиропрлпрлд\r\ndghdfjhfgjh', 1646417864, 1646600400, 0, 1),
(12, 10, 'Тестовая задача 4', 'Куча бесполезного текста', 1646418456, 1647205200, 0, 0),
(13, 10, 'Управление процессами', 'Приятно, граждане, наблюдать, как интерактивные прототипы могут быть смешаны с не уникальными данными до степени совершенной неузнаваемости, из-за чего возрастает их статус бесполезности.', 1646419704, 1649106000, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `adm` tinyint(1) NOT NULL DEFAULT '0',
  `daytime` int(11) NOT NULL COMMENT 'Date of user create',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pw`, `uname`, `adm`, `daytime`, `deleted`) VALUES
(10, 'admin', '$2y$10$Srm1vf8h4/ccL2eLdw6Oa.YL.aJbv7rjbBbFNx8jz494.Gdbth4tS', 'Просто Василий', 1, 1646153097, 0),
(11, 'User1', '$2y$10$sTMym/rnhU4V384ChMQ7j.CKobjpTRzdE1Vmb.UdxtPhtwQtS.DfK', 'Стародуб Евгений Ананасович', 0, 1646156785, 0),
(12, 'User2', '$2y$10$gteA4WvORe4NVhW5a756c.20Gz180zaJInqhp9r1CyKxAJWvi7OIq', 'Армагеддонов Евгений Петрович', 0, 1646158126, 0),
(13, 'User3', '$2y$10$4.b0oyEFmJvi5eXFep/2HefzfVnYyvnnrNVNYCA8cJbpriyLXLB1K', 'Неожиданность Макар Егорович', 0, 1646338098, 0),
(14, 'User4', '$2y$10$Ekt6qrLMTlTiWDkdHnPMb.xmK1/zANmc5aog/o/1px2ho4D1xgad6', 'Ещеодин Александр Николаевич', 0, 1646386690, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
