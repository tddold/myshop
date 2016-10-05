CREATE TABLE IF NOT EXISTS `orders` (
	`id` int(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,                
	`user_id` int(11) NOT NULL,
	`date_created` datetime NOT NULL,
	`date_payment` datetime DEFAULT NULL,
	`date_modification` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	`status` tinyint(4) NOT NULL DEFAULT,
	`comment` text NOT NULL,
	`user_ip` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;