PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
COMMIT;

ATTACH DATABASE 'SmartAquarium.sqlite' as 'smartaquarium';

CREATE TABLE smartaquarium.temperature (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    timestamp DATE DEFAULT (datetime('now','localtime')),
    value REAL NOT NULL
);

CREATE TABLE smartaquarium.ph (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    timestamp DATE DEFAULT (datetime('now','localtime')),
    value REAL NOT NULL
);

CREATE TABLE smartaquarium.light (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    timestamp DATE DEFAULT (datetime('now','localtime')),
    value INT NOT NULL
);

CREATE TABLE smartaquarium.feeder (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    timestamp DATE DEFAULT (datetime('now','localtime')),
    value INTEGER DEFAULT (0)
);

CREATE TABLE smartaquarium.fish (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    timestamp DATE DEFAULT (datetime('now','localtime')),
    value TEXT NOT NULL
);

CREATE TABLE smartaquarium.config (
    breed TEXT NOT NULL PRIMARY KEY,
    min_ph REAL NOT NULL,
    max_ph REAL NOT NULL,
    min_temperature REAL NOT NULL,
    max_temperature REAL NOT NULL,
    min_light INTEGER NOT NULL,
    max_light INTEGER NOT NULL
);

CREATE TABLE smartaquarium.scheduler (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    timestamp INTEGER NOT NULL,
    value INTEGER NOT NULL
);

INSERT INTO config VALUES('betta', 6.6, 7.4, 22.0, 30.0, 40, 80);
INSERT INTO config VALUES('helostoma', 6.5, 7.0, 23.0, 30.0, 50, 70);
INSERT INTO config VALUES('trichogaster', 6.4, 7.6, 22.0, 28.0, 50, 70);
INSERT INTO config VALUES('macropodus', 6.0, 7.8, 16.0, 30.0, 40, 80);

INSERT INTO temperature (value) VALUES (25.4);
INSERT INTO temperature (value) VALUES (25.6);
INSERT INTO temperature (value) VALUES (25.8);
INSERT INTO temperature (value) VALUES (26.2);
INSERT INTO temperature (value) VALUES (27.1);

INSERT INTO ph (value) VALUES (7.1);
INSERT INTO ph (value) VALUES (6.9);
INSERT INTO ph (value) VALUES (6.8);
INSERT INTO ph (value) VALUES (6.7);
INSERT INTO ph (value) VALUES (7.0);

INSERT INTO light (value) VALUES (75);
INSERT INTO light (value) VALUES (70);
INSERT INTO light (value) VALUES (80);
INSERT INTO light (value) VALUES (80);
INSERT INTO light (value) VALUES (75);

INSERT INTO feeder (value) VALUES (0);
INSERT INTO feeder (value) VALUES (0);
INSERT INTO feeder (value) VALUES (0);
INSERT INTO feeder (value) VALUES (0);
INSERT INTO feeder (value) VALUES (0);

INSERT INTO fish (value) VALUES ('betta');
INSERT INTO fish (value) VALUES ('helostoma');
INSERT INTO fish (value) VALUES ('trichogaster');
INSERT INTO fish (value) VALUES ('trichogaster');
INSERT INTO fish (value) VALUES ('betta');

INSERT INTO scheduler (timestamp, value) VALUES (8, 12);