-- Base de datos y tablas ya creadas, proceder con la inserción de datos

-- Insertar equipos
INSERT INTO equipos (nombre, entrenador) VALUES
('Real Madrid', 'Carlo Ancelotti'),
('Manchester City', 'Pep Guardiola'),
('Bayern Munich', 'Thomas Tuchel'),
('Inter Milan', 'Simone Inzaghi'),
('Paris Saint-Germain', 'Luis Enrique'),
('Barcelona', 'Xavi Hernández'),
('Arsenal', 'Mikel Arteta');

-- Insertar jugadores del Real Madrid 2024
INSERT INTO jugadores (equipo_id, nombre, numero, posicion) VALUES
(1, 'Thibaut Courtois', 1, 'Portero'),
(1, 'David Alaba', 4, 'Defensa'),
(1, 'Toni Kroos', 8, 'Centrocampista'),
(1, 'Luka Modrić', 10, 'Centrocampista'),
(1, 'Eduardo Camavinga', 12, 'Centrocampista'),
(1, 'Aurélien Tchouaméni', 18, 'Centrocampista'),
(1, 'Rodrygo Goes', 21, 'Delantero'),
(1, 'Antonio Rüdiger', 22, 'Defensa'),
(1, 'Federico Valverde', 15, 'Centrocampista'),
(1, 'Ferland Mendy', 23, 'Defensa');


-- Insertar jugadores de Manchester City 2024
INSERT INTO jugadores (equipo_id, nombre, numero, posicion) VALUES
(2, 'Erling Haaland', 9, 'Delantero'),
(2, 'Kevin De Bruyne', 17, 'Centrocampista'),
(2, 'Rodri', 16, 'Centrocampista'),
(2, 'Rúben Dias', 3, 'Defensa'),
(2, 'Ederson', 31, 'Portero'),
(2, 'João Cancelo', 7, 'Defensa'),
(2, 'Bernardo Silva', 20, 'Centrocampista'),
(2, 'Phil Foden', 47, 'Centrocampista'),
(2, 'Jack Grealish', 10, 'Delantero'),
(2, 'Riyad Mahrez', 26, 'Delantero');

-- Insertar jugadores de Bayern Munich 2024
INSERT INTO jugadores (equipo_id, nombre, numero, posicion) VALUES
(3, 'Manuel Neuer', 1, 'Portero'),
(3, 'Joshua Kimmich', 6, 'Centrocampista'),
(3, 'Leroy Sané', 10, 'Delantero'),
(3, 'Kingsley Coman', 11, 'Delantero'),
(3, 'Leon Goretzka', 8, 'Centrocampista'),
(3, 'Dayot Upamecano', 2, 'Defensa'),
(3, 'Serge Gnabry', 7, 'Delantero'),
(3, 'Alphonso Davies', 19, 'Defensa'),
(3, 'Thomas Müller', 25, 'Delantero'),
(3, 'Jamal Musiala', 42, 'Centrocampista');

-- Insertar jugadores de Inter Milan 2024
INSERT INTO jugadores (equipo_id, nombre, numero, posicion) VALUES
(4, 'André Onana', 24, 'Portero'),
(4, 'Milan Škriniar', 37, 'Defensa'),
(4, 'Hakan Çalhanoğlu', 20, 'Centrocampista'),
(4, 'Lautaro Martínez', 10, 'Delantero'),
(4, 'Nicolò Barella', 23, 'Centrocampista'),
(4, 'Alessandro Bastoni', 95, 'Defensa'),
(4, 'Edin Džeko', 9, 'Delantero'),
(4, 'Denzel Dumfries', 2, 'Defensa'),
(4, 'Henrikh Mkhitaryan', 22, 'Centrocampista'),
(4, 'Federico Dimarco', 32, 'Defensa');

-- Insertar jugadores de Paris Saint-Germain 2024
INSERT INTO jugadores (equipo_id, nombre, numero, posicion) VALUES
(5, 'Gianluigi Donnarumma', 99, 'Portero'),
(5, 'Achraf Hakimi', 2, 'Defensa'),
(5, 'Marquinhos', 5, 'Defensa'),
(5, 'Kylian Mbappé', 7, 'Delantero'),
(5, 'Neymar Jr', 10, 'Delantero'),
(5, 'Marco Verratti', 6, 'Centrocampista'),
(5, 'Sergio Ramos', 4, 'Defensa'),
(5, 'Lionel Messi', 30, 'Delantero'),
(5, 'Leandro Paredes', 8, 'Centrocampista'),
(5, 'Presnel Kimpembe', 3, 'Defensa');

-- Insertar jugadores de Barcelona 2024
INSERT INTO jugadores (equipo_id, nombre, numero, posicion) VALUES
(6, 'Marc-André ter Stegen', 1, 'Portero'),
(6, 'Sergio Busquets', 5, 'Centrocampista'),
(6, 'Frenkie de Jong', 21, 'Centrocampista'),
(6, 'Robert Lewandowski', 9, 'Delantero'),
(6, 'Pedri', 8, 'Centrocampista'),
(6, 'Ousmane Dembélé', 7, 'Delantero'),
(6, 'Ronald Araújo', 4, 'Defensa'),
(6, 'Jordi Alba', 18, 'Defensa'),
(6, 'Raphinha', 22, 'Delantero'),
(6, 'Gavi', 30, 'Centrocampista');

-- Insertar jugadores de Arsenal 2024
INSERT INTO jugadores (equipo_id, nombre, numero, posicion) VALUES
(7, 'Aaron Ramsdale', 1, 'Portero'),
(7, 'Bukayo Saka', 7, 'Delantero'),
(7, 'Gabriel Jesus', 9, 'Delantero'),
(7, 'Martin Ødegaard', 8, 'Centrocampista'),
(7, 'William Saliba', 12, 'Defensa'),
(7, 'Thomas Partey', 18, 'Centrocampista'),
(7, 'Oleksandr Zinchenko', 35, 'Defensa'),
(7, 'Ben White', 4, 'Defensa'),
(7, 'Gabriel Magalhães', 6, 'Defensa'),
(7, 'Gabriel Martinelli', 11, 'Delantero');

-- Insertar partidos entre los equipos
INSERT INTO partidos (equipo_local_id, equipo_visitante_id, fecha_partido) VALUES
(2, 3, '2024-08-10 20:00:00'), -- Manchester City vs Bayern Munich
(4, 5, '2024-08-11 18:00:00'), -- Inter Milan vs Paris Saint-Germain
(6, 7, '2024-08-12 20:30:00'), -- Barcelona vs Arsenal
(3, 2, '2024-08-14 19:00:00'), -- Bayern Munich vs Manchester City
(7, 5, '2024-08-15 21:00:00'), -- Arsenal vs Paris Saint-Germain
(2, 4, '2024-08-17 17:30:00'); -- Manchester City vs Inter Milan

-- Insertar resultados de los partidos
INSERT INTO resultados (partido_id, puntaje_equipo_local, puntaje_equipo_visitante) VALUES
(1, 3, 1), -- Manchester City 3 - 1 Bayern Munich
(2, 2, 2), -- Inter Milan 2 - 2 Paris Saint-Germain
(3, 1, 0), -- Barcelona 1 - 0 Arsenal
(4, 2, 2), -- Bayern Munich 2 - 2 Manchester City
(5, 1, 3), -- Arsenal 1 - 3 Paris Saint-Germain
(6, 2, 1); -- Manchester City 2 - 1 Inter Milan

-- Insertar partidos donde participa el Real Madrid
INSERT INTO partidos (equipo_local_id, equipo_visitante_id, fecha_partido) VALUES
(1, 2, '2024-08-20 20:00:00'), -- Real Madrid vs Manchester City
(1, 4, '2024-08-22 19:30:00'), -- Real Madrid vs Inter Milan
(3, 1, '2024-08-25 18:00:00'), -- Bayern Munich vs Real Madrid
(1, 7, '2024-08-28 21:00:00'); -- Real Madrid vs Arsenal

-- Insertar resultados de los partidos donde participa el Real Madrid
INSERT INTO resultados (partido_id, puntaje_equipo_local, puntaje_equipo_visitante) VALUES
(7, 2, 2), -- Real Madrid 2 - 2 Manchester City
(8, 1, 0), -- Real Madrid 1 - 0 Inter Milan
(9, 3, 1), -- Bayern Munich 3 - 1 Real Madrid
(10, 2, 1); -- Real Madrid 2 - 1 Arsenal


-- Actualizar posiciones de los jugadores a las nuevas opciones

-- Porteros
UPDATE jugadores SET posicion = 'Portero' WHERE posicion IN ('Portero');

-- Defensas centrales
UPDATE jugadores SET posicion = 'Defensa central' WHERE posicion IN ('Defensa', 'Defensor central');

-- Defensas laterales
UPDATE jugadores SET posicion = 'Defensa lateral' WHERE posicion IN ('Lateral', 'Defensor lateral');

-- Mediocentros
UPDATE jugadores SET posicion = 'Mediocentro' WHERE posicion IN ('Centrocampista', 'Mediocampista');

-- Mediapuntas
UPDATE jugadores SET posicion = 'Mediapunta' WHERE posicion IN ('Delantero', 'Media punta');

-- Extremos izquierdos
UPDATE jugadores SET posicion = 'Extremo izquierdo' WHERE posicion IN ('Extremo', 'Extremo izquierdo');

-- Extremos derechos
UPDATE jugadores SET posicion = 'Extremo derecho' WHERE posicion IN ('Extremo', 'Extremo derecho');

-- Delanteros
UPDATE jugadores SET posicion = 'Delantero' WHERE posicion IN ('Delantero');
