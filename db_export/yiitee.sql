-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 13 2019 г., 02:03
-- Версия сервера: 5.7.16
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yiitee`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Contributors`
--

CREATE TABLE `Contributors` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `cont_proj_role`
--

CREATE TABLE `cont_proj_role` (
  `cont_id` int(11) NOT NULL,
  `proj_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `How_to_kill_risk`
--

CREATE TABLE `How_to_kill_risk` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Permissions`
--

CREATE TABLE `Permissions` (
  `id` int(11) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Projects`
--

CREATE TABLE `Projects` (
  `id` int(11) NOT NULL,
  `sprint_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Projects`
--

INSERT INTO `Projects` (`id`, `sprint_id`, `name`) VALUES
(1, 1, 'Yiitee'),
(2, 1, 'Reversed Yiitee');

-- --------------------------------------------------------

--
-- Структура таблицы `Risks`
--

CREATE TABLE `Risks` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `risk_htkrisk`
--

CREATE TABLE `risk_htkrisk` (
  `risk_id` int(11) NOT NULL,
  `htkrisk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Roles`
--

CREATE TABLE `Roles` (
  `id` int(11) NOT NULL,
  `role` text NOT NULL,
  `perm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Sprint`
--

CREATE TABLE `Sprint` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Sprint`
--

INSERT INTO `Sprint` (`id`, `task_id`, `date`) VALUES
(1, 1, '2019-03-13');

-- --------------------------------------------------------

--
-- Структура таблицы `Tasks`
--

CREATE TABLE `Tasks` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `estimate_date` date NOT NULL,
  `used_time` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `priority_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `task_cont`
--

CREATE TABLE `task_cont` (
  `task_id` int(11) NOT NULL,
  `cont_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `task_history`
--

CREATE TABLE `task_history` (
  `task_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `task_priority`
--

CREATE TABLE `task_priority` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `task_risk`
--

CREATE TABLE `task_risk` (
  `task_id` int(11) NOT NULL,
  `risk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `task_status`
--

CREATE TABLE `task_status` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Contributors`
--
ALTER TABLE `Contributors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Индексы таблицы `cont_proj_role`
--
ALTER TABLE `cont_proj_role`
  ADD KEY `cont_id` (`cont_id`,`proj_id`,`role_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `proj_id` (`proj_id`);

--
-- Индексы таблицы `How_to_kill_risk`
--
ALTER TABLE `How_to_kill_risk`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Permissions`
--
ALTER TABLE `Permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `Projects`
--
ALTER TABLE `Projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `sprint_id` (`sprint_id`);

--
-- Индексы таблицы `Risks`
--
ALTER TABLE `Risks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `risk_htkrisk`
--
ALTER TABLE `risk_htkrisk`
  ADD KEY `risk_id` (`risk_id`,`htkrisk_id`),
  ADD KEY `htkrisk_id` (`htkrisk_id`);

--
-- Индексы таблицы `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `perm_id` (`perm_id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_3` (`id`);

--
-- Индексы таблицы `Sprint`
--
ALTER TABLE `Sprint`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `task_id` (`task_id`);

--
-- Индексы таблицы `Tasks`
--
ALTER TABLE `Tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`,`priority_id`),
  ADD KEY `priority_id` (`priority_id`);

--
-- Индексы таблицы `task_cont`
--
ALTER TABLE `task_cont`
  ADD KEY `task_id` (`task_id`,`cont_id`),
  ADD KEY `cont_id` (`cont_id`);

--
-- Индексы таблицы `task_history`
--
ALTER TABLE `task_history`
  ADD KEY `task_id` (`task_id`);

--
-- Индексы таблицы `task_priority`
--
ALTER TABLE `task_priority`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `task_risk`
--
ALTER TABLE `task_risk`
  ADD KEY `task_id` (`task_id`,`risk_id`),
  ADD KEY `risk_id` (`risk_id`);

--
-- Индексы таблицы `task_status`
--
ALTER TABLE `task_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Contributors`
--
ALTER TABLE `Contributors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `How_to_kill_risk`
--
ALTER TABLE `How_to_kill_risk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `Permissions`
--
ALTER TABLE `Permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `Risks`
--
ALTER TABLE `Risks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `Roles`
--
ALTER TABLE `Roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `Sprint`
--
ALTER TABLE `Sprint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `Tasks`
--
ALTER TABLE `Tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `task_priority`
--
ALTER TABLE `task_priority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `task_status`
--
ALTER TABLE `task_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Contributors`
--
ALTER TABLE `Contributors`
  ADD CONSTRAINT `contributors_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `Roles` (`id`);

--
-- Ограничения внешнего ключа таблицы `cont_proj_role`
--
ALTER TABLE `cont_proj_role`
  ADD CONSTRAINT `cont_proj_role_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `Roles` (`id`),
  ADD CONSTRAINT `cont_proj_role_ibfk_2` FOREIGN KEY (`proj_id`) REFERENCES `Projects` (`id`),
  ADD CONSTRAINT `cont_proj_role_ibfk_3` FOREIGN KEY (`cont_id`) REFERENCES `Contributors` (`id`);

--
-- Ограничения внешнего ключа таблицы `Projects`
--
ALTER TABLE `Projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`sprint_id`) REFERENCES `Sprint` (`id`);

--
-- Ограничения внешнего ключа таблицы `risk_htkrisk`
--
ALTER TABLE `risk_htkrisk`
  ADD CONSTRAINT `risk_htkrisk_ibfk_1` FOREIGN KEY (`htkrisk_id`) REFERENCES `How_to_kill_risk` (`id`),
  ADD CONSTRAINT `risk_htkrisk_ibfk_2` FOREIGN KEY (`risk_id`) REFERENCES `Risks` (`id`);

--
-- Ограничения внешнего ключа таблицы `Roles`
--
ALTER TABLE `Roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`perm_id`) REFERENCES `Permissions` (`id`);

--
-- Ограничения внешнего ключа таблицы `Tasks`
--
ALTER TABLE `Tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `task_status` (`id`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`priority_id`) REFERENCES `task_priority` (`id`);

--
-- Ограничения внешнего ключа таблицы `task_cont`
--
ALTER TABLE `task_cont`
  ADD CONSTRAINT `task_cont_ibfk_1` FOREIGN KEY (`cont_id`) REFERENCES `Contributors` (`id`),
  ADD CONSTRAINT `task_cont_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `Tasks` (`id`);

--
-- Ограничения внешнего ключа таблицы `task_history`
--
ALTER TABLE `task_history`
  ADD CONSTRAINT `task_history_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `Tasks` (`id`);

--
-- Ограничения внешнего ключа таблицы `task_risk`
--
ALTER TABLE `task_risk`
  ADD CONSTRAINT `task_risk_ibfk_1` FOREIGN KEY (`risk_id`) REFERENCES `Risks` (`id`),
  ADD CONSTRAINT `task_risk_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `Tasks` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
