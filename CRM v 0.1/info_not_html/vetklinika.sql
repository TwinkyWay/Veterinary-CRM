-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 31 2017 г., 19:21
-- Версия сервера: 5.7.14
-- Версия PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vetklinika`
--

-- --------------------------------------------------------

--
-- Структура таблицы `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `gender_id` tinyint(3) UNSIGNED NOT NULL,
  `breed` varchar(45) NOT NULL,
  `birthday` date DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `weigth` int(10) DEFAULT NULL,
  `stigma` varchar(10) DEFAULT NULL,
  `chip` int(10) DEFAULT NULL,
  `type_id` tinyint(3) UNSIGNED NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `animals`
--

INSERT INTO `animals` (`id`, `name`, `gender_id`, `breed`, `birthday`, `color`, `weigth`, `stigma`, `chip`, `type_id`, `owner_id`) VALUES
(1, 'Зелдон', 1, 'Ламбрадор ', '2003-12-30', 'Абрикосовый', 10, '0', 0, 2, 1),
(2, 'Лола', 2, 'Орловский рысак ', '2001-12-13', 'Черный', 30, '0', 0, 6, 2),
(3, 'Лень', 4, 'Лесной ', '2010-01-29', 'Бурый', 2, '0', 0, 3, 3),
(4, 'Бобик', 1, 'Овчарка ', '2015-06-22', 'Оранжевый', 8, '127', 0, 2, 4),
(5, 'Жуй', 4, 'Толстый ', '2015-07-09', 'Рыжий', 1, '0', 0, 4, 5),
(7, 'Зон', 1, 'Египетская ', '2015-11-28', 'нет', 4500, '0', 0, 1, 7),
(8, 'Гусь', 2, 'Гусь ', '2010-06-17', 'Белый', 500, '0', 0, 2, 8),
(10, 'нус', 3, 'Гора ', '2012-05-12', '', 0, '0', 0, 2, 10),
(11, 'Жучка', 1, 'хз', '2017-04-25', 'серый', 200, '1', 1, 1, 2),
(13, 'Спичка', 3, 'хз', '2014-01-15', 'волосатый', 1, '0', 0, 5, 11),
(14, 'Петр', 1, '', '1998-12-25', '', 0, '0', 0, 3, 16),
(15, 'Ползун', 3, '', '2017-05-03', 'красный', 1, '0', 0, 7, 16),
(16, 'Ева', 4, 'вапвап', '2012-12-15', '', 0, '12345', 1234, 7, 17),
(17, 'Гусь', 3, 'sadsa', '2014-05-01', 'пурпурный', 125, '0', 0, 7, 17),
(18, 'dwdfwe', 2, 'saefd', '2017-05-08', '', 0, '0', 0, 2, 17),
(19, 'sdfc', 3, 'sfsd', '2017-05-03', '', 0, '0', 0, 1, 24),
(20, 'edger', 2, 'erg', '2017-05-02', '', 0, '0', 0, 2, 24),
(24, 'Марта', 2, 'Корги', '2017-03-09', 'рыжий', 4500, 'SSU1117', 0, 2, 25);

-- --------------------------------------------------------

--
-- Структура таблицы `animal_gender`
--

CREATE TABLE `animal_gender` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `animal_gender`
--

INSERT INTO `animal_gender` (`id`, `name`) VALUES
(1, 'Мальчик'),
(2, 'Девочка'),
(3, 'Гемафродит'),
(4, 'Неопределе');

-- --------------------------------------------------------

--
-- Структура таблицы `consumables`
--

CREATE TABLE `consumables` (
  `reception_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `consumables`
--

INSERT INTO `consumables` (`reception_id`, `description`, `price`) VALUES
(42, 'ada', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `password`, `email`, `phone`) VALUES
(1, 'Айболит', '', 'ay@re.dsf', ''),
(2, 'Хаус', '', '', '+9999999'),
(3, 'Квин', '4285aeed2682297610964f3ccd1bf079', 'kvin@ya.ru', ''),
(4, 'Стрендж', '1edd103fda908e139fb32e46b7f68835', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `reception_id` int(11) NOT NULL,
  `price_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`reception_id`, `price_id`) VALUES
(20, 202),
(20, 230),
(20, 360),
(20, 361),
(20, 404),
(23, 301),
(31, 201),
(31, 202),
(31, 204),
(31, 404),
(31, 407),
(32, 201),
(33, 201),
(34, 206);

-- --------------------------------------------------------

--
-- Структура таблицы `owner`
--

CREATE TABLE `owner` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL DEFAULT 'not null',
  `address` varchar(45) DEFAULT NULL,
  `phone` varchar(45) NOT NULL,
  `email` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `owner`
--

INSERT INTO `owner` (`id`, `name`, `address`, `phone`, `email`) VALUES
(1, 'Козеев Артём', 'Мешково', '+79999829462', 'email'),
(2, 'Носов', 'Москва', '4564', 'asd@net.ru'),
(3, 'Дуров', 'Питер', '+79064255841', 'tor@ya.ru'),
(4, 'Щедров', 'Омск', '+7632156', 'ывфыв"фыв'),
(5, 'Дуров Андрей', 'Московский', '+79994521', 'asd@sd,r5'),
(7, 'Шурыгин Носорог', 'Ярославский ', '+724647581', 'sdhyhj!df'),
(8, 'Чугунов Дмитрий', 'Москва', '+79841468276', 'fur@ya.tu'),
(10, 'Щук Мол', 'Гор', '74', 'фв'),
(11, 'Носов 2', 'есть', '1234', 'ya@ya.ru'),
(15, 'Носов 3', '1321', '32135', 'ya@ya.ru'),
(16, 'Иванов', 'МО', '789', '1@net.net'),
(17, 'Жуков', 'Россия', '5768980', 'h@h.ru'),
(18, 'erwretfr', 'ertfertg', '12345', 'sdfsdgssdf@ya.ru'),
(19, 'wwerfw', 'werwe', 'werwerw', 'wer@dsfg.ru'),
(22, 'wwerfw', 'werwe', '1werwerw', 'wer@1dsfg.ru'),
(23, 'wwerfw', 'werwe', '1werwer1w', 'wer@1dsfg.ru'),
(24, 'wwerfw', 'werwe', '1wwer1w', 'wer@1dsfg.ru'),
(25, 'Витя', 'Голубое', '0848', 'sdfgssdf@ya.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

CREATE TABLE `price` (
  `code_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `price`
--

INSERT INTO `price` (`code_id`, `name`, `price`) VALUES
(201, 'Консультация ветспециалиста', '137'),
(202, 'Фиксация животного', '153'),
(203, 'Первичный клинический осмотр', '223'),
(204, 'д) 5-ой категории сложности', '2017'),
(205, 'д) 5-ой категории сложности', '10219'),
(206, 'Вакцинация животных с проведением клинического осмотра, консультации, инъекции (без стоимости вакцины)', '443'),
(207, 'а) 1-ой категории сложности', '482'),
(208, 'б) 2-ой категории сложности', '717'),
(209, 'в) 3-ей категории сложности', '795'),
(210, 'г) 4-ой категории сложности', '1390'),
(211, '- с/х ж-ые до 2-х месяцев, коты, самцы декоративных животных (хорьки, норки, морские свинки, лисы и другие животные)', '730'),
(212, '- кошки, самки декоративных животных (хорьки, норки, морские свинки, лисы и другие животные)', '1400'),
(213, 'до 5 кг', '1073'),
(214, 'свыше 5 кг до 15 кг', '1230'),
(215, 'свыше 15 кг', '1533'),
(216, 'до 5 кг', '1717'),
(217, 'свыше 5 кг до 15 кг', '2213'),
(218, 'свыше 15 кг до 25 кг', '2947'),
(219, 'свыше 25 кг', '4914'),
(230, 'Электронное мечение животного (чипирование со сканированием)', '660'),
(232, 'Интубация при введении наркоза для проведения компьютерной томографии', '210'),
(240, 'Введение лекарственных препаратов: внутримышечное, подкожное, внутрикожное, пероральное, глазное капельное, внутривенное через катетер (без стоимости препаратов)', '76'),
(241, 'Обработка против эктопаразитов (без стоимости препаратов)', '86'),
(242, 'Внутривенное введение лекарственных препаратов (без стоимости препаратов)', '153'),
(243, 'Внутрисуставное введение лекарственных препаратов (без стоимости препаратов)', '430'),
(244, 'Внутрикостное введение лекарственных препаратов (без стоимости препаратов)', '620'),
(245, 'Внутривенное капельное введение лекарственных препаратов (без стоимости препаратов)', '543'),
(246, 'Ректальное введение препаратов (без стоимости препаратов)', '102'),
(247, 'Обрезка когтей', '212'),
(248, 'Обрезка клюва', '215'),
(249, 'Удаление колтунов', '620'),
(250, 'Удаление иксодовых клещей', '164'),
(251, 'Санация ушных раковин', '184'),
(252, 'Очистка паранальных желез', '338'),
(253, 'Промывание паранальных желез', '1358'),
(254, 'Очистительная клизма', '1171'),
(255, 'Эндоскопия (гастроскопия, риноскопия, бронхоскопия, колоноскопия и т.д.)', '1301'),
(256, 'Зондирование пищевода кошек и собак', '434'),
(257, '- декоративные животные (хорьки, норки, морские свинки, лисы и другие животные)', '416'),
(258, '- кошки, собаки', '391'),
(265, 'а) 1-ой категории сложности', '1205'),
(266, 'б) 2-ой категории сложности', '1631'),
(267, 'в) 3-ей категории сложности', '3023'),
(268, 'г) 4-ой категории сложности', '6481'),
(278, 'Взятие проб крови из вены', '201'),
(279, 'Взятие проб крови из капилляра', '106'),
(280, 'Общий анализ мочи', '277'),
(281, 'Повторный клинический осмотр', '87'),
(282, 'Снятие внутривенного катетера', '72'),
(284, '- определение гемоглобина', '27'),
(285, '- подсчет эритроцитов', '57'),
(286, '- подсчет лейкоцитов', '57'),
(287, '- определение СОЭ', '27'),
(288, '- выведение лейкоцитарной формулы', '231'),
(289, '- определение общего белка', '102'),
(290, '- определение общего билирубина', '102'),
(291, '- определение мочевины', '102'),
(292, '- определение общего холестерина', '102'),
(293, '- определение амилазы', '335'),
(294, '- определение гаммаглутаминтрансферазы', '102'),
(295, '- определение триглицеридов', '195'),
(296, '- определение щелочной фосфатазы', '102'),
(297, '- определение глюкозы', '102'),
(298, '- определение креатинина', '102'),
(299, '- определение АСТ  (аспартаминотрансферазы)', '102'),
(300, '- определение АЛТ (аланинаминотрансферазы)', '102'),
(301, '- определение лактатдегидрогеназы', '102'),
(302, '- определение железа', '102'),
(303, '- определение кальция', '131'),
(304, '- определение магния', '102'),
(305, '- определение фосфора неорганического', '131'),
(306, '- определение липазы', '194'),
(307, '- определение калия', '124'),
(308, '- определение креатинкиназы', '131'),
(309, '- определение мочевой кислоты', '102'),
(310, '- определение гемоглобина', '102'),
(311, '- определение амилазы панкреатической', '244'),
(312, 'Исследование на кровепаразитарные болезни', '311'),
(313, 'Гельминтокопрологические исследования', '127'),
(314, 'Микроскопические исследования на дерматофиты, демодекоз и эктопаразиты', '259'),
(315, 'Люминесцентная диагностика на микроспорию с применением лампы Вуда', '71'),
(316, 'R-графия', '930'),
(317, 'Оксигенотерапия', '365'),
(318, 'Физиопроцедура', '131'),
(319, 'Ультразвуковое исследование', '847'),
(322, 'Отовидеоскопия', '531'),
(323, 'Офтальмоскопия', '652'),
(324, 'Электрокардиография', '729'),
(325, 'Биркование сельскохозяйственных животных', '11'),
(326, 'Взятие соскобов, мазков, смывов для диагностических исследований', '95'),
(337, 'Консилиум ветеринарных специалистов (см.примечание п.6)', '434'),
(348, '- определение натрия', '144'),
(349, 'Считывание номера микрочипа (сканирование)', '118'),
(351, '- трийодтиронин', '699'),
(352, '- тироксин', '699'),
(353, '- кортизол', '789'),
(354, '- прогестерон', '803'),
(355, '- эстрадиол', '1135'),
(356, '- тестостерон', '803'),
(357, 'КТ - голова, отделы конечностей (сустав, регион конечности)', '6485'),
(358, 'КТ - шейный, грудной, поясничный, крестцово-тазовый отделы', '10903'),
(359, 'КТ - голова, отделы конечностей (сустав, регион конечности)', '6556'),
(360, 'КТ - шейный, грудной, поясничный, крестцово-тазовый отделы', '10974'),
(361, 'КТ - голова, отделы конечностей (сустав, регион конечности)', '3296'),
(362, 'КТ - шейный, грудной, поясничный, крестцово-тазовый отделы', '4426'),
(363, 'Определение электролитов крови (хлоридов, натрия, кальция, калия, водородного показателя (pH))', '261'),
(367, 'Расчистка и обрезка копыт с/х животного', '212'),
(368, 'Обрезка рогов с/х животного', '210'),
(369, '- обезроживание телят', '186'),
(371, 'Определение слезопродукции при диагностике глаз (тест Ширмера)', '183'),
(372, 'Химическое прижигание роговичного дефекта', '183'),
(373, 'Биомикроскопия глаза', '312'),
(374, 'Гониоскопия глаза', '116'),
(375, 'Экспресс-диагностика глюкозы (с использованием глюкометра)', '53'),
(376, 'Повторное ультразвуковое исследование', '400'),
(377, 'Скрининговое ЭХО-кардиографическое исследование', '400'),
(378, 'Ультразвуковой скрининг органов брюшной полости', '1200'),
(404, 'Клинический осмотр птиц, рыб, грызунов, рептилий  мелких животных и др.', '223'),
(405, 'Наблюдение за функциональными параметрами жизненно важных органов в ходе оперативных вмешательств или реанимационных мероприятий (ЭКГ, пульсоксиметрия, давление, температура) с интубацией, оксигенотерапией', '1320'),
(406, 'Удаление мочи путем непрямого массажа брюшной стенки', '128'),
(407, 'Обработка кожного покрова с санацией (туалетом) раневой поверхности', '170'),
(422, 'Взятие мазка отпечатка на цитологический анализ', '95'),
(423, 'Пункционная биопсия на цитологический анализ', '268'),
(427, '- определение белковых фракций', '122'),
(429, 'Гистологическое исследование биологического материала', '966'),
(430, 'Цитологические исследования', '621'),
(431, '- флюоресцииновая проба', '95'),
(432, 'eyes', '245'),
(433, 'Экспресс-диагностика с применением тест-систем для определения инфекционных болезней животных', '89'),
(434, 'Экспресс-диагностика показателей крови на анализаторах IDEXX', '515'),
(437, 'Общий анализ кала', '463'),
(438, 'ЭХОкардиография, допплеровское исследование кровотока внутренних органов и периферических сосудов', '881');

-- --------------------------------------------------------

--
-- Структура таблицы `reception`
--

CREATE TABLE `reception` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `date_reception` date NOT NULL,
  `date_illness` date NOT NULL,
  `text1` text NOT NULL,
  `text2` text NOT NULL,
  `text3` text,
  `text4` text,
  `text5` text,
  `text6` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reception`
--

INSERT INTO `reception` (`id`, `doctor_id`, `animal_id`, `date_reception`, `date_illness`, `text1`, `text2`, `text3`, `text4`, `text5`, `text6`) VALUES
(15, 4, 13, '2017-05-12', '0000-00-00', 'fdgfd', 'dsgdsg', 'asd', 'asda', 'sadasd', NULL),
(16, 4, 18, '2017-05-16', '0000-00-00', 'ыаыв', 'ываыва', NULL, NULL, NULL, NULL),
(17, 4, 17, '2017-05-16', '0000-00-00', 'кпукп', 'укпукп', NULL, NULL, NULL, NULL),
(18, 3, 18, '2017-05-16', '0000-00-00', 'ыкпы', 'ыпвыпы', NULL, NULL, NULL, NULL),
(19, 3, 16, '2017-05-19', '0000-00-00', 'Тест123', 'Тест234', NULL, NULL, NULL, NULL),
(20, 3, 16, '2017-05-19', '2017-04-01', 'Тест123', 'Тест234', 'sdfsdf', 'sdfsd', 'sdfsd', 'sdfsdfsdf'),
(21, 3, 17, '2017-05-19', '0000-00-00', 'sdfsf', 'sgfsd', 'sdfsd', 'sdfsdf', 'sdfsdf', 'ehehdhd'),
(22, 3, 17, '2017-05-19', '0000-00-00', 'sdf', 'sdf', NULL, NULL, NULL, NULL),
(23, 2, 13, '2017-05-19', '0000-00-00', 'ыапыап', 'ыаыыв', 'ываыва', 'ываыв', 'ыаыва', 'ываыва'),
(24, 2, 8, '2017-05-21', '0000-00-00', 'м-да', 'такого не бывает', '', '', '', ''),
(25, 2, 8, '2017-05-21', '0000-00-00', 'м-да', 'такого не бывает', NULL, NULL, NULL, NULL),
(26, 2, 17, '2017-05-21', '0000-00-00', 'sadfaf', 'safdsdf', 'sdfsdsd', '', '', ''),
(27, 2, 17, '2017-05-21', '0000-00-00', 'sadfaf', 'safdsdf', 'sdfsdsd', '', '', ''),
(31, 2, 16, '2017-05-21', '2017-01-04', '111111', '2222', '3245234', '', '', 'Всё ОК'),
(32, 2, 17, '2017-05-23', '2017-05-01', 'sfsfsfsfs', '', '', '', '', ''),
(33, 2, 17, '2017-05-23', '0000-00-00', '', '', '', '', '', ''),
(34, 2, 17, '2017-05-23', '0000-00-00', 'dF', 'dsfs', 'sfs', 'ghdfghdfgh', '', ''),
(35, 3, 2, '2017-05-24', '0000-00-00', 'цйуйцу', '', '', '', '', ''),
(36, 3, 2, '2017-05-24', '0000-00-00', '', '', '', '', '', ''),
(37, 4, 11, '2017-05-27', '0000-00-00', 'ewrwer', '', '', '', '', ''),
(38, 4, 11, '2017-05-27', '0000-00-00', 'ewrwer', '', '', '', '', ''),
(39, 4, 11, '2017-05-27', '0000-00-00', 'ewrwer', '', '', '', '', ''),
(40, 4, 11, '2017-05-27', '0000-00-00', 'ewrwer', '', '', '', '', ''),
(41, 4, 2, '2017-05-27', '0000-00-00', 'wererwgeg', '', '', '', '', ''),
(42, 4, 2, '2017-05-27', '0000-00-00', 'efwefewrgegh', '', '', 'retertgr', 'sdfsdf', 'sfgsgfesrgfe');

-- --------------------------------------------------------

--
-- Структура таблицы `types_animals`
--

CREATE TABLE `types_animals` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `types_animals`
--

INSERT INTO `types_animals` (`id`, `name`) VALUES
(1, 'Кошка'),
(2, 'Собака'),
(3, 'Сурок'),
(4, 'Хомяк'),
(5, 'Хорёк'),
(6, 'Лошадь'),
(7, 'Червяк');

-- --------------------------------------------------------

--
-- Структура таблицы `vaccination`
--

CREATE TABLE `vaccination` (
  `id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `text` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vaccination`
--

INSERT INTO `vaccination` (`id`, `animal_id`, `date`, `text`) VALUES
(1, 18, '2017-05-09', 'От чего'),
(2, 17, '2017-05-09', 'Чего-то ещё'),
(3, 18, '2017-05-09', 'чсмчс'),
(4, 18, '2017-05-09', 'Вааы'),
(5, 18, '2017-05-09', 'ыпварпвр'),
(6, 18, '2017-05-09', 'dsgsgs'),
(7, 18, '2017-05-09', 'dsgsgs'),
(8, 18, '2017-05-09', 'sdgfvsd'),
(9, 18, '2017-05-09', 'sdgfvsd'),
(10, 18, '2017-05-09', 'cvbncvbn'),
(11, 18, '2017-05-09', 'cvbncvbn'),
(12, 18, '2017-05-09', 'dhdhb'),
(13, 18, '2017-05-09', 'sgvsdg'),
(14, 17, '2016-05-09', 'sgsdfghsf'),
(15, 17, '2017-05-09', 'бешенство'),
(18, 17, '2016-05-09', 'старое'),
(19, 17, '2017-05-08', 'старое3'),
(20, 17, '2017-05-09', 'новое'),
(21, 13, '2017-05-11', 'fdghdf'),
(22, 16, '2017-05-11', 'вапвап'),
(23, 24, '2017-05-20', 'Вторая прививка');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`owner_id`,`birthday`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `category_id` (`type_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Индексы таблицы `animal_gender`
--
ALTER TABLE `animal_gender`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `consumables`
--
ALTER TABLE `consumables`
  ADD UNIQUE KEY `reception_id_2` (`reception_id`),
  ADD KEY `reception_id` (`reception_id`);

--
-- Индексы таблицы `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD UNIQUE KEY `reception_id_2` (`reception_id`,`price_id`),
  ADD KEY `reception_id` (`reception_id`),
  ADD KEY `price_id` (`price_id`) USING BTREE;

--
-- Индексы таблицы `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Индексы таблицы `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`code_id`),
  ADD UNIQUE KEY `code_id` (`code_id`);

--
-- Индексы таблицы `reception`
--
ALTER TABLE `reception`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Индексы таблицы `types_animals`
--
ALTER TABLE `types_animals`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vaccination`
--
ALTER TABLE `vaccination`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблицы `animal_gender`
--
ALTER TABLE `animal_gender`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT для таблицы `reception`
--
ALTER TABLE `reception`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT для таблицы `types_animals`
--
ALTER TABLE `types_animals`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `vaccination`
--
ALTER TABLE `vaccination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ibfk_1` FOREIGN KEY (`gender_id`) REFERENCES `animal_gender` (`id`),
  ADD CONSTRAINT `animals_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `owner` (`id`),
  ADD CONSTRAINT `animals_ibfk_3` FOREIGN KEY (`type_id`) REFERENCES `types_animals` (`id`);

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`reception_id`) REFERENCES `reception` (`id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`price_id`) REFERENCES `price` (`code_id`);

--
-- Ограничения внешнего ключа таблицы `reception`
--
ALTER TABLE `reception`
  ADD CONSTRAINT `reception_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`),
  ADD CONSTRAINT `reception_ibfk_2` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`);

--
-- Ограничения внешнего ключа таблицы `vaccination`
--
ALTER TABLE `vaccination`
  ADD CONSTRAINT `vaccination_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
