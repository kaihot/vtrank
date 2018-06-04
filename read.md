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

```angular2html
CREATE TABLE `subscribe_count_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `youtuber_id` int(11) DEFAULT NULL,
  `subscribe_count` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
    `exec_at` date NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

```angular2html
CREATE TABLE `view_count_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `youtuber_id` int(11) DEFAULT NULL,
  `view_count` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
    `exec_at` date NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

```angular2html
CREATE TABLE `aggregate_count_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `day_identify` varchar(11) NOT NULL DEFAULT '',
  `item_identify` varchar(11) NOT NULL DEFAULT '',
  `exec_at` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
    `count` bigint(20) NOT NULL,
  `youtuber_id` int(11) NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```