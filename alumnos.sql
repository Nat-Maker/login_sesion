
CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `Usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Clave` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre_completo` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `alumnos` (`id`, `Usuario`, `Clave`, `Nombre_completo`) VALUES
(1, 'leo', '1234', 'Leonardo Baltierra'),
(2, 'dora', '1234', 'Dora De los Angeles');

ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
