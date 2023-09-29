CREATE USER 'invitado'@'%' IDENTIFIED BY 'invitado';
CREATE USER 'normal'@'192.168.1.0/24' IDENTIFIED BY 'normal123';
CREATE USER 'revisador'@'https://www.review.lan.com' IDENTIFIED BY 'revisador123';
CREATE USER 'administrador'@'10.0.0.10' IDENTIFIED BY 'admin123';


GRANT SELECT, LOCK TABLE ON baseDatos.tarea* TO 'invitado'@'%';
GRANT SELECT, LOCK TABLE ON baseDatps.tarea_categoria* TO 'invitado'@'%';


GRANT SELECT, INSERT, UPDATE, DELETE LOCK TABLE ON baseDatos.tarea* TO 'normal'@'192.168.1.0/24';
GRANT SELECT, INSERT, UPDATE, DELETE LOCK TABLE ON baseDatps.tarea_categoria* TO 'normal'@'192.168.1.0/24';

GRANT SELECT, LOCK TABLE ON baseDatps.tarea* TO 'revisador'@'https://www.review.lan.com';
GRANT INSERT, LOCK TABLE ON baseDatps.tarea_categoria* TO 'revisador'@'https://www.review.lan.com';

GRANT ALL LOCK TABLE ON baseDatps.tarea_categoria* TO 'administrador'@'10.0.0.10';
