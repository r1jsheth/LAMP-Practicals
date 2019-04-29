
-- This queries are in support of Practical 8-B
-- Author: Raj
-- Date Created: 2019-04-15 23:58:50

CREATE TABLE `pageview`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `page` text NOT NULL,
    `userip` text NOT NULL,
    PRIMARY KEY(`id`)       
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE `totalview`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `page` text NOT NULL,
    `totalvisit` text NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
