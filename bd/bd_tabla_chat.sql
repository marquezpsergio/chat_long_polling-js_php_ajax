CREATE DATABASE chat;
USE chat;

CREATE TABLE IF NOT EXISTS `chat` (
  `id_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `color` varchar(7) NOT NULL,
  `time` decimal(20,4) NOT NULL,
  PRIMARY KEY (`id_mensaje`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;