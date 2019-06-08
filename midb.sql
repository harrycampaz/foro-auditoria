
--

--
CREATE DATABASE IF NOT EXISTS `miforo_academico_segundo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `miforo_academico_segundo`;

-- --------------------------------------------------------

--
-- Table structure for table `acceso`
--

CREATE TABLE IF NOT EXISTS  `acceso` (
  `idacceso` int(11) NOT NULL,
  `ip` varchar(45) NOT NULL,
   `create_time_acceso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acceso`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `idcomentario` int(11) NOT NULL,
  `comment` varchar(280) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remove_time` timestamp NULL DEFAULT NULL,
  `tema_idtema` int(11) NOT NULL,
  `user_iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comentario`
--
--
-- Table structure for table `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `idcurso` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(45) NOT NULL,
  `remove_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `curso`
--

--
-- Table structure for table `log_comentarios`
--

CREATE TABLE IF NOT EXISTS `log_comentarios` (
  `idlog_comentario` int(11) NOT NULL,
  `text_log` varchar(280) NOT NULL,
  `create_time_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tema_idtema` int(11) NOT NULL,
  `user_iduser` int(11) NOT NULL,
  `accion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_comentarios`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_curso`
--

CREATE TABLE IF NOT EXISTS `log_curso` (
  `idlog_curso` int(11) NOT NULL,
  `accion` varchar(45) NOT NULL,
  `create_time_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_iduser` int(11) NOT NULL,
  `curso_idcurso` int(11) NOT NULL,
  `name_log` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_curso`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_tema`
--

CREATE TABLE IF NOT EXISTS `log_tema` (
  `idlog_tema` int(11) NOT NULL,
  `accion` varchar(45) NOT NULL,
  `create_time_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text_log` varchar(120) NOT NULL,
  `tema_idtema` int(11) NOT NULL,
  `curso_idcurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_tema`
--

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `idrol` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`idrol`, `name`) VALUES
(1, 'administrador'),
(2, 'docente'),
(3, 'alumno');

-- --------------------------------------------------------

--
-- Table structure for table `tema`
--

CREATE TABLE IF NOT EXISTS `tema` (
  `idtema` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(140) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `remove_time` timestamp NULL DEFAULT NULL,
  `curso_idcurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tema`
--

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(16) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(120) NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `rol_idrol` int(11) NOT NULL,
  `remove_time` timestamp NULL DEFAULT NULL,
  `status` enum('0','1') NOT NULL,
  `display_name` varchar(60) DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `create_time`, `rol_idrol`, `remove_time`, `status`, `display_name`, `update_time`, `iduser`) VALUES
('anderson', 'anderson@mail.com', '7c222fb2927d828af22f592134e8932480637c0d', '2018-07-22 08:08:41', 3, NULL, '1', 'Anderson', '2018-07-22 08:08:41', 2),
('harrycampaz', 'harrycampaz@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2018-07-22 08:14:47', 2, NULL, '1', 'Harry Campaz', '2018-07-22 08:14:47', 3),
('jenifer', 'jenifer@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2018-07-22 16:42:44', 1, NULL, '1', 'jenifer', '2018-07-22 16:42:44', 4),
('jhon', 'jhon@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2018-08-04 04:32:24', 3, NULL, '0', 'Jhon Perez', '2018-08-04 04:32:24', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_curso`
--

CREATE TABLE IF NOT EXISTS `user_has_curso` (
  `user_iduser` int(11) NOT NULL,
  `curso_idcurso` int(11) NOT NULL,
  `status_uc` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_has_curso`
--

INSERT INTO `acceso` (`idacceso`, `ip`, `create_time_acceso`, `user_iduser`) VALUES
(39, '::1', '2018-08-04 04:30:36', 3),
(40, '::1', '2018-08-04 04:32:32', 5),
(41, '::1', '2018-08-04 04:32:51', 4),
(42, '::1', '2018-08-04 04:36:44', 2);


INSERT INTO `curso` (`idcurso`, `create_time`, `name`, `remove_time`, `update_time`, `user_iduser`) VALUES
(12, '2018-08-04 04:30:59', 'Organizaciones II', NULL, '2018-08-04 04:30:59', 3),
(13, '2018-08-04 04:31:10', 'Telematica', NULL, '2018-08-04 04:31:10', 3),
(14, '2018-08-04 04:31:32', 'Matematicas discretas', NULL, '2018-08-04 04:31:32', 3),
(15, '2018-08-04 04:39:19', 'Seminario de Actualizacion', NULL, '2018-08-04 04:39:19', 3),
(16, '2018-08-04 04:43:49', 'Logica de programación', NULL, '2018-08-04 04:43:49', 3);

INSERT INTO `tema` (`idtema`, `create_time`, `name`, `status`, `remove_time`, `curso_idcurso`) VALUES
(9, '2018-08-04 05:46:07', 'Emprendimiento', '1', NULL, 12);


INSERT INTO `user_has_curso` (`user_iduser`, `curso_idcurso`, `status_uc`) VALUES
(2, 12, '1'),
(2, 15, '1');

--
-- Dumping data for table `comentario`
--

INSERT INTO `comentario` (`idcomentario`, `comment`, `create_time`, `remove_time`, `tema_idtema`, `user_iduser`) VALUES
(8, 'El emprendimiento del futuro estará muy ligado con  la economia colaborativa.', '2018-08-04 05:46:58', NULL, 9, 2);


INSERT INTO `log_comentarios` (`idlog_comentario`, `text_log`, `create_time_log`, `tema_idtema`, `user_iduser`, `accion`) VALUES
(4, 'El emprendimiento del futuro estará muy ligado con  la economia colaborativa.', '2018-08-04 05:46:58', 9, 2, 'Inserto Comentario');



INSERT INTO `log_curso` (`idlog_curso`, `accion`, `create_time_log`, `user_iduser`, `curso_idcurso`, `name_log`) VALUES
(8, 'Inserto curso', '2018-08-04 04:30:59', 3, 12, 'Organizaciones II'),
(9, 'Inserto curso', '2018-08-04 04:31:10', 3, 13, 'Telematica'),
(10, 'Inserto curso', '2018-08-04 04:31:32', 3, 14, 'Matematicas discretas'),
(11, 'Inserto curso', '2018-08-04 04:39:19', 3, 15, 'Seminario de Actualizacion'),
(12, 'Inserto curso', '2018-08-04 04:43:49', 3, 16, 'Logica de programación'),
(13, 'Elimino Curso', '2018-08-04 04:46:54', 3, 13, 'Telematica'),
(14, 'Matricula en proceso', '2018-08-04 04:48:48', 2, 15, 'Matricula en proceso'),
(15, 'Matricula Aprobada', '2018-08-04 04:49:02', 2, 15, 'Matricula Actualizada'),
(16, 'Matricula en proceso', '2018-08-04 05:44:29', 2, 12, 'Matricula en proceso'),
(17, 'Matricula Aprobada', '2018-08-04 05:44:47', 2, 12, 'Matricula Actualizada');


INSERT INTO `log_tema` (`idlog_tema`, `accion`, `create_time_log`, `text_log`, `tema_idtema`, `curso_idcurso`) VALUES
(4, 'Inserto Tema', '2018-08-04 04:49:16', 'Tema de Hoy', 7, 15),
(5, 'Elimino Tema', '2018-08-04 04:49:24', 'Tema de Hoy', 7, 15),
(6, 'Inserto Tema', '2018-08-04 05:45:22', 'Futuro del trabajo', 8, 12),
(7, 'Elimino Tema', '2018-08-04 05:45:35', 'Futuro del trabajo', 8, 12),
(8, 'Inserto Tema', '2018-08-04 05:46:07', 'Emprendimiento', 9, 12);

--
-- Indexes for dumped tables
--

--
-- Triggers `comentario`
--


CREATE TRIGGER `deleteComentario` AFTER DELETE ON `comentario` FOR EACH ROW INSERT INTO log_comentarios VALUES (null, OLD.comment,null, OLD.tema_idtema, OLD.user_iduser ,"Elimino Comentario");

CREATE TRIGGER `insertcomentario` AFTER INSERT ON `comentario` FOR EACH ROW INSERT INTO log_comentarios VALUES (null, NEW.comment,null, NEW.tema_idtema, NEW.user_iduser ,"Inserto Comentario");


-- --------------------------------------------------------

--
-- Triggers `tema`
--

CREATE TRIGGER `deletelogtema` AFTER DELETE ON `tema` FOR EACH ROW INSERT INTO log_tema VALUES (null, "Elimino Tema", null, OLD.name, OLD.idtema, OLD.curso_idcurso);

CREATE TRIGGER `insertlogtema` AFTER INSERT ON `tema` FOR EACH ROW INSERT INTO log_tema VALUES (null, "Inserto Tema", null, NEW.name, NEW.idtema, NEW.curso_idcurso);

CREATE TRIGGER `updatetema` AFTER UPDATE ON `tema` FOR EACH ROW INSERT INTO log_tema VALUES (null, "Actualizo Tema", null, NEW.name, NEW.idtema, NEW.curso_idcurso);



-- --------------------------------------------------------

--
-- Triggers `curso`
--

CREATE TRIGGER `deletelogcurso` AFTER DELETE ON `curso` FOR EACH ROW INSERT INTO log_curso VALUES(null,"Elimino Curso", null, OLD.user_iduser, OLD.idcurso, OLD.name);

CREATE TRIGGER `logcursotrigger` AFTER INSERT ON `curso` FOR EACH ROW INSERT INTO log_curso VALUES(null,"Inserto curso", null, NEW.user_iduser, NEW.idcurso, NEW.name);


-- --------------------------------------------------------

--
-- Triggers `user_has_curso`
--

CREATE TRIGGER `insertmatricula` BEFORE INSERT ON `user_has_curso` FOR EACH ROW INSERT INTO log_curso VALUES(null,"Matricula en proceso", null, NEW.user_iduser, NEW.curso_idcurso, 'Matricula en proceso');

CREATE TRIGGER `user_has_curso` AFTER UPDATE ON `user_has_curso` FOR EACH ROW INSERT INTO log_curso VALUES(null,"Matricula Aprobada", null, NEW.user_iduser, NEW.curso_idcurso, 'Matricula Actualizada');


--


--
-- Indexes for table `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`idacceso`),
  ADD KEY `fk_acceso_user1_idx` (`user_iduser`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idcomentario`),
  ADD KEY `fk_comentario_tema1_idx` (`tema_idtema`),
  ADD KEY `fk_comentario_user1_idx` (`user_iduser`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idcurso`),
  ADD KEY `fk_curso_user1_idx` (`user_iduser`);

--
-- Indexes for table `log_comentarios`
--
ALTER TABLE `log_comentarios`
  ADD PRIMARY KEY (`idlog_comentario`);

--
-- Indexes for table `log_curso`
--
ALTER TABLE `log_curso`
  ADD PRIMARY KEY (`idlog_curso`);

--
-- Indexes for table `log_tema`
--
ALTER TABLE `log_tema`
  ADD PRIMARY KEY (`idlog_tema`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indexes for table `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`idtema`),
  ADD KEY `fk_tema_curso1_idx` (`curso_idcurso`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `fk_user_rol_idx` (`rol_idrol`);

--
-- Indexes for table `user_has_curso`
--
ALTER TABLE `user_has_curso`
  ADD PRIMARY KEY (`user_iduser`,`curso_idcurso`),
  ADD KEY `fk_user_has_curso_curso1_idx` (`curso_idcurso`),
  ADD KEY `fk_user_has_curso_user1_idx` (`user_iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acceso`
--
ALTER TABLE `acceso`
  MODIFY `idacceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idcomentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `idcurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `log_comentarios`
--
ALTER TABLE `log_comentarios`
  MODIFY `idlog_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_curso`
--
ALTER TABLE `log_curso`
  MODIFY `idlog_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `log_tema`
--
ALTER TABLE `log_tema`
  MODIFY `idlog_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tema`
--
ALTER TABLE `tema`
  MODIFY `idtema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `fk_acceso_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_tema1` FOREIGN KEY (`tema_idtema`) REFERENCES `tema` (`idtema`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentario_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_curso_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tema`
--
ALTER TABLE `tema`
  ADD CONSTRAINT `fk_tema_curso1` FOREIGN KEY (`curso_idcurso`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_rol` FOREIGN KEY (`rol_idrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_has_curso`
--
ALTER TABLE `user_has_curso`
  ADD CONSTRAINT `fk_user_has_curso_curso1` FOREIGN KEY (`curso_idcurso`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_curso_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
