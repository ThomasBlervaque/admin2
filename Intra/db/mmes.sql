CREATE DATABASE wt;
USE wt;

CREATE TABLE `stock` (`id` INT AUTO_INCREMENT PRIMARY KEY,`name` varchar(255) DEFAULT NULL,`price` FLOAT(10) DEFAULT NULL);

INSERT INTO `stock` VALUES (NULL, 'jouet 1' , 1);
INSERT INTO `stock` VALUES (NULL, 'jouet 2' , 8);
INSERT INTO `stock` VALUES (NULL, 'jouet 3' , 4);