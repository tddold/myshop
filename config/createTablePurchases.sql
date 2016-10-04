CREATE TABLE IF NOT EXISTS `purchase` (
	`id` int(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,                
	`order_id` int(11) NOT NULL,
	`product_id` int(11) NOT NULL,
	`price` float NOT NULL,
	`amount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;