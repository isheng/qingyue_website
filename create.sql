create table `orders` (
`id` int NOT NULL AUTO_INCREMENT,
`date` timestamp NOT NULL,
`client_names` varchar(20) NOT NULL,
`address` varchar(255) ,
`phone` varchar(20),
`warranty_time` varchar(10),
`prices` int(6),
`machine_type` varchar(50),
PRIMARY KEY (`id`)
) CHARACTER SET = utf8;

insert into `orders`(`date`,`client_names`,`address`,`phone`,`warranty_time`,`prices`,`machine_type`) values ('2015-05-10','张三','guangdong raoping','18825188443','180',999,'Xx-net');
