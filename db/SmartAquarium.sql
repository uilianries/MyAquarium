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
    value INTEGER DEFAULT (0)
);

INSERT INTO temperature (value) VALUES (25.4);
INSERT INTO ph (value) VALUES (7.1);
INSERT INTO light (value) VALUES (75);
INSERT INTO feeder (value) VALUES (0);
INSERT INTO fish (value) VALUES (1);
