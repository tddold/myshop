CREATE TABLE IF NOT EXISTS `users` (
	`id` int(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
	`email` varchar(50) NOT NULL UNIQUE KEY,
	`pwd` varchar(50) NOT NULL,
	`name` varchar(50) NOT NULL,
	`phone` varchar(20) NOT NULL,
	`adress` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;