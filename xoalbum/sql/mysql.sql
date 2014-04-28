

#
# Structure table for `xoalbum_album` 10
#

CREATE TABLE  `xoalbum_album` (
`album_id` INT (8)  NOT NULL  AUTO_INCREMENT,
`category_id` SMALLINT (6)  NOT NULL ,
`album_uid` INT (8)  NOT NULL ,
`album_name` VARCHAR (64)  NOT NULL ,
`album_desc` VARCHAR (255)  NOT NULL ,
`album_total` SMALLINT (6)  NOT NULL ,
`album_cover` VARCHAR (255)  NOT NULL ,
`album_views` SMALLINT (6)  NOT NULL ,
`album_status` TINYINT (1)  NOT NULL ,
`album_dateline` INT (10)  NOT NULL ,
PRIMARY KEY (`album_id`)
) ENGINE=MyISAM;

#
# Structure table for `xoalbum_grid` 6
#

CREATE TABLE  `xoalbum_grid` (
`grid_id` INT (8)  NOT NULL  AUTO_INCREMENT,
`grid_uid` INT (8)  NOT NULL ,
`picture_id` INT (8)  NOT NULL ,
`grid_title` VARCHAR (120)  NOT NULL ,
`grid_data` VARCHAR (255)  NOT NULL ,
`grid_date` INT (10)  NOT NULL ,
PRIMARY KEY (`grid_id`)
) ENGINE=MyISAM;

#
# Structure table for `xoalbum_category` 5
#

CREATE TABLE  `xoalbum_category` (
`category_id` SMALLINT (6)  NOT NULL  AUTO_INCREMENT,
`category_name` VARCHAR (32)  NOT NULL ,
`category_total` INT (8)  NOT NULL ,
`category_order` SMALLINT (6)  NOT NULL ,
`category_dateline` INT (10)  NOT NULL ,
PRIMARY KEY (`category_id`)
) ENGINE=MyISAM;

#
# Structure table for `xoalbum_picture` 13
#

CREATE TABLE  `xoalbum_picture` (
`picture_id` INT (8)  NOT NULL  AUTO_INCREMENT,
`picture_uid` INT (8)  NOT NULL ,
`album_id` INT (8)  NOT NULL ,
`picture_name` VARCHAR (32)  NOT NULL ,
`picture_desc` VARCHAR (255)  NOT NULL ,
`picture_filename` VARCHAR (255)  NOT NULL ,
`picture_filetype` VARCHAR (64)  NOT NULL ,
`picture_thumbfirst` VARCHAR (255)  NOT NULL ,
`picture_thumbsecond` VARCHAR (255)  NOT NULL ,
`picture_size` INT (8)  NOT NULL ,
`picture_dateline` INT (10)  NOT NULL ,
`picture_comments` SMALLINT (6)  NOT NULL ,
`picture_downloads` SMALLINT (6)  NOT NULL ,
PRIMARY KEY (`picture_id`)
) ENGINE=MyISAM;