-- Crear el usuario
CREATE USER 'hispanotravel'@'%' IDENTIFIED BY 'wordpress$123', 'hispanotravel'@'localhost' IDENTIFIED BY 'wordpress$123', 'hispanotravel'@'127.0.0.1' IDENTIFIED BY 'wordpress$123';

-- Asignar los permiso al usuario para la base de datos hispanotravel
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER, CREATE VIEW, EVENT, TRIGGER, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EXECUTE
ON hispanotravel.* TO 'hispanotravel'@'%', 'hispanotravel'@'localhost', 'hispanotravel'@'127.0.0.1'
WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;

-- Crear base de datos hispanotravel
DROP DATABASE IF EXISTS hispanotravel;
CREATE DATABASE IF NOT EXISTS hispanotravel DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE hispanotravel;

-- Usuario wordpress
/*
Username: admin
Password: Admin!1"2#3$4
*/