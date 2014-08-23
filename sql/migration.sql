RENAME TABLE cercles TO casinos;
ALTER TABLE casinos CHANGE pays_id country_id INT( 10 ) UNSIGNED NOT NULL;

RENAME TABLE pays TO countries;

RENAME TABLE seances TO playing_sessions;
ALTER TABLE playing_sessions CHANGE cercle_id casino_id INT( 10 ) UNSIGNED NOT NULL;
ALTER TABLE `playing_sessions` CHANGE `session_date` `session_date` DATE NOT NULL;

DROP TABLE store_ips;

DROP TABLE users;
CREATE TABLE IF NOT EXISTS users (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  username varchar(255) NOT NULL,
  password char(40) NOT NULL,
  created datetime DEFAULT NULL,
  modified datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
INSERT INTO users (id, username, password, created, modified) VALUES
(1, 'admin', '836508961beef43ba13862b83c56ff0173771b8a', '2014-08-06 17:30:33', '2014-08-06 18:05:56');
