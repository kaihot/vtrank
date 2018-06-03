```angular2html
CREATE TABLE `youtubers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `channel_id` text NOT NULL,
  `channel_title` varchar(255) DEFAULT NULL,
  `channel_description` text,
  `published_at` datetime DEFAULT NULL,
  `thumbnail_default` text,
  `thumbnail_medium` text,
  `thumbnail_high` text,
  `view_count` varchar(255) DEFAULT NULL,
  `subscriber_count` varchar(255) DEFAULT NULL,
  `video_count` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
```