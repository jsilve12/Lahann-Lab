CREATE TABLE person(
	person_id smallint UNSIGNED not null auto_increment,
	name varchar(32),
	experience tinyint,
	`power` tinyint,
	email varchar(64),
	`password` varchar(128),
	department varchar(512),
	location varchar(256),
	years varchar(128),
	mentor varchar(64),
	photo varchar(32),
	resum varchar(32),
	PRIMARY KEY(person_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE page(
	person_id smallint UNSIGNED not null,
	surveyResponse smallint UNSIGNED,
	projects varchar(2048),
	links varchar(2048),
	constraint page_ibfk_1
		FOREIGN KEY(person_id)
		REFERENCES person(person_id)
		ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE news(
	pk integer auto increment not null,
	title varchar(256),
	dat date,
	author varchar(64),
	contents varchar(4096),
	PRIMARY KEY(pk)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE images(
	pk integer auto_increment not null,
	art integer,
	name varchar(256),
	PRIMARY KEY(pk),
	CONSTRAINT FK FOREIGN KEY (art)
	REFERENCES news(pk)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE papers(
	paper_id smallint UNSIGNED not null auto_increment,
	title varchar(512),
	abstract varchar(2048),
	link varchar(256),
	Primary Key(paper_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE media(
	media_id mediumint unsigned not null auto_increment,
	news_id smallint unsigned,
	paper_id smallint unsigned,
	name varchar(256),
	Primary Key(media_id),
	Constraint media_ibfk_1
		FOREIGN KEY(news_id)
		References news(news_id)
		On Delete Cascade On Update Cascade,
	Constraint media_ibfk_2
		Foreign Key(paper_id)
		References papers(paper_id)
		On Delete Cascade On Update Cascade
) ENGINE=InnoDB Default Charset=utf8;

CREATE TABLE people_papers(
	person_id smallint UNSIGNED not null,
	paper_id smallint UNSIGNED not null,
	Constraint people_papers_ibfk_1
		FOREIGN KEY(person_id)
		References person(person_id)
		On Delete Cascade On Update Cascade,
	Constraint people_papers_ibfk_2
		Foreign Key(paper_id)
		References papers(paper_id)
		On Delete Cascade On Update Cascade
) ENGINE=InnoDB Default Charset=utf8;
