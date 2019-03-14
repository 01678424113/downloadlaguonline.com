<?php
include '../inc/connect.php';
mysqli_query($conn, "CREATE TABLE `baihat` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `api` VARCHAR(255) NOT NULL,
		`api_youtube` VARCHAR(255) NOT NULL,
        `name` VARCHAR(255) NOT NULL,
        `author` VARCHAR(255) NOT NULL,
        `title` VARCHAR(255) NOT NULL,
        `description` VARCHAR(255) NOT NULL,
        `url` VARCHAR(255) NOT NULL,
        `urlgoc` VARCHAR(255) NOT NULL,
        `icon` VARCHAR(255) NOT NULL,
        `lyrics` TEXT NOT NULL,
        `content` TEXT NOT NULL,
        `image` VARCHAR(255) NOT NULL,
        `alt_anh` VARCHAR(255) NOT NULL,
        `views` int(11) NOT NULL,
        `download` int(11) NOT NULL,
        `cat` VARCHAR(255) NOT NULL,
        `duration` VARCHAR(255) NOT NULL,
        `source` VARCHAR(255) NOT NULL,
		`country` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE (`api`),
		UNIQUE (`title`)
    ) ENGINE = MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");

mysqli_query($conn, "CREATE TABLE `album` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `api` VARCHAR(255) NOT NULL,
        `name` VARCHAR(255) NOT NULL,
        `title` VARCHAR(255) NOT NULL,
        `description` VARCHAR(255) NOT NULL,
        `url` VARCHAR(255) NOT NULL,
        `urlgoc` VARCHAR(255) NOT NULL,
        `icon` VARCHAR(255) NOT NULL,
        `content` TEXT NOT NULL,
        `image` VARCHAR(255) NOT NULL,
        `alt_anh` VARCHAR(255) NOT NULL,
        `views` int(11) NOT NULL,
        `download` int(11) NOT NULL,
        `theloai` VARCHAR(255) NOT NULL,
        `id_cat` int(11) NOT NULL,
        `author` VARCHAR(255) NOT NULL,
        `name_cat` VARCHAR(255) NOT NULL,
        `json` VARCHAR(255) NOT NULL,
		`country` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE (`api`),
		UNIQUE (`title`)
    ) ENGINE = MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");

mysqli_query($conn, "CREATE TABLE `nghesi` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
		`api` VARCHAR(255) NOT NULL,
        `name` VARCHAR(255) NOT NULL,
        `title` VARCHAR(255) NOT NULL,
        `description` VARCHAR(255) NOT NULL,
        `url` VARCHAR(255) NOT NULL,
        `icon` VARCHAR(255) NOT NULL,
        `tieusu` TEXT NOT NULL,
        `content` TEXT NOT NULL,
        `alt_anh` VARCHAR(255) NOT NULL,
        `views` int(11) NOT NULL,
        `country` VARCHAR(255) NOT NULL,
        `id_country` int(11) NOT NULL,
        PRIMARY KEY (`id`),
		UNIQUE (`api`),
		UNIQUE (`title`)
    ) ENGINE = MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");

mysqli_query($conn, "CREATE TABLE `video` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `api` VARCHAR(255) NOT NULL,
        `name` VARCHAR(255) NOT NULL,
        `author` VARCHAR(255) NOT NULL,
        `title` VARCHAR(255) NOT NULL,
        `description` TEXT NOT NULL,
        `url` VARCHAR(255) NOT NULL,
        `content` TEXT NOT NULL,
        `image` VARCHAR(255) NOT NULL,
        `icon` VARCHAR(255) NOT NULL,
        `alt_anh` VARCHAR(255) NOT NULL,
        `lyrics` TEXT NOT NULL,
        `views` int(11) NOT NULL,
        `download` int(11) NOT NULL,
        `cat` VARCHAR(255) NOT NULL,
        `id_cat` int(11) NOT NULL,
        `duration` VARCHAR(255) NOT NULL,
        `rate` VARCHAR(255) NOT NULL,
		`tags` TEXT NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE (`api`),
		UNIQUE (`title`)
    ) ENGINE = MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");

mysqli_query($conn, "CREATE TABLE `search` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `keyword` TEXT NOT NULL,
        `count` int(11) NOT NULL,
        `time` int(11) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1");

mysqli_query($conn, "CREATE TABLE `lastsearch_baihat` (
        `post_id` int(11) NOT NULL,
        `tukhoa` TEXT NOT NULL,
        `count` int(11) NOT NULL,
        `time` int(11) NOT NULL,
        `url` VARCHAR(255) NOT NULL
    ) ENGINE = MyISAM DEFAULT CHARSET=utf8");

mysqli_query($conn, "CREATE TABLE `lastsearch_video` (
        `post_id` int(11) NOT NULL,
        `tukhoa` TEXT NOT NULL,
        `count` int(11) NOT NULL,
        `time` int(11) NOT NULL,
        `url` VARCHAR(255) NOT NULL
    ) ENGINE = MyISAM DEFAULT CHARSET=utf8");

mysqli_query($conn, "CREATE TABLE `lastsearch_album` (
        `post_id` int(11) NOT NULL,
        `tukhoa` TEXT NOT NULL,
        `count` int(11) NOT NULL,
        `time` int(11) NOT NULL,
        `url` VARCHAR(255) NOT NULL
    ) ENGINE = MyISAM DEFAULT CHARSET=utf8");

mysqli_query($conn, "CREATE TABLE `lastsearch_nghesi` (
        `post_id` int(11) NOT NULL,
        `tukhoa` TEXT NOT NULL,
        `count` int(11) NOT NULL,
        `time` int(11) NOT NULL,
        `url` VARCHAR(255) NOT NULL
    ) ENGINE = MyISAM DEFAULT CHARSET=utf8");

echo '<meta charset="UTF-8" />Create database tables successfully!!!';