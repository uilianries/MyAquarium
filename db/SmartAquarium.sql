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
    value DATE NOT NULL
);

