CREATE DATABASE IF NOT EXISTS `myShop`;
USE `myShop`;

DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user`(
`id` SMALLINT (3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '管理员id',
`name` VARCHAR (50) NOT NULL COMMENT '管理员名称',
`password` VARCHAR (32) NOT NULL COMMENT '管理员密码',
`create_time` INT (11) COMMENT '创建时间',
`email` VARCHAR (50) COMMENT '管理员邮箱',
PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员表';

DROP TABLE IF EXISTS `shop_cate`;
CREATE TABLE `shop_cate`(
`id` SMALLINT (3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '分类id',
`p_id` SMALLINT (3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '分类父id',
`cate_name` VARCHAR (50) COMMENT '分类名称',
PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品分类表';

DROP TABLE IF EXISTS `menber_user`;
CREATE TABLE `member_user`(
`id` SMALLINT (3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '会员id',
`name` VARCHAR (30) UNIQUE COMMENT '会员名称',
`password` VARCHAR (32) COMMENT '会员密码',
`sex` TINYINT (1) NOT NULL DEFAULT '0' COMMENT '性别 默认0：保密; 1：男; 2：女',
`picture` VARCHAR (255) COMMENT '会员头像',
`email` VARCHAR (50) COMMENT '会员邮箱',
`create_time` INT (11) COMMENT '注册时间',
PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员表';

DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods`(
`id` INT (5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '商品id',
`cate_id` SMALLINT (3) UNSIGNED NOT NULL COMMENT '商品所属分类id',
`member_id` SMALLINT (3) UNSIGNED NOT NULL COMMENT '商品所属会员id',
`goods_name` VARCHAR (50) NOT NULL COMMENT '商品名称',
`goods_price` INT (8) NOT NULL COMMENT '商品价格',
`goods_num` INT (10) NOT NULL DEFAULT '0' COMMENT '商品数量',
`goods_sn` VARCHAR (50) NOT NULL COMMENT '商品货号',
`goods_desc` TEXT COMMENT '商品详情',
`goods_pic` VARCHAR (255) COMMENT '商品图片',
`is_show` TINYINT (1) NOT NULL DEFAULT '0' COMMENT '是否上架 默认0:否,1:是',
`is_hot` TINYINT (1) NOT NULL DEFAULT '0' COMMENT '是否热卖 默认0:否,1:是',
PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品表';

DROP TABLE IF EXISTS `goods_album`;
CREATE TABLE `goods_album`(
`id` INT (5) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
`goods_id` INT (5) UNSIGNED NOT NULL COMMENT '所属商品id',
`picture` VARCHAR (255) NOT NULL COMMENT '图片地址',
`is_default` TINYINT (1) NOT NULL DEFAULT '0' COMMENT '是否默认显示图片 0:否,1：是',
PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品相册表';