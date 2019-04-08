-- MySQL
--
-- Host: localhost
--
-- Database: `shopping`
-- @author: Raj

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `size` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Inserting data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `size`, `price`) VALUES
(1, 'Polo T-Shirt', '25% Cashback (Up to Rs. 5,000 per order) on Yatra App (Android & iOS only) .', 32, '500'),
(2, 'Casual Shirt', '40% Cashback (Up to Rs. 5,000 per order) on Yatra App (Android & iOS only) . ', 36, '950'),
(3, 'Solid Shirt', '60% Cashback (Up to Rs. 5,000 per order) on Yatra App (Android & iOS only) .', 38, '1024');
(4, 'Polo T-Shirt', '25% Cashback (Up to Rs. 5,000 per order) on Yatra App (Android & iOS only) .', 32, '750'),
(5, 'Casual Shirt', '84% Cashback (Up to Rs. 5,000 per order) on Yatra App (Android & iOS only) . ', 32, '210'),
(6, 'Solid Shirt', '12% Cashback (Up to Rs. 5,000 per order) on Yatra App (Android & iOS only) .', 36, '540'),
(7, 'Solid Shirt', '45% Cashback (Up to Rs. 5,000 per order) on Yatra App (Android & iOS only) .', 36, '654'),
(8, 'Solid Shirt', '95% Cashback (Up to Rs. 5,000 per order) on Yatra App (Android & iOS only) .', 38, '984'),
(9, 'Solid Shirt', '100% Cashback (Up to Rs. 5,000 per order) on Yatra App (Android & iOS only) .', 38, '152');