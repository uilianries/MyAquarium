PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
COMMIT;

ATTACH DATABASE 'SmartAquarium.db' as 'smartaquarium';

CREATE TABLE smartaquarium.temperature (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    value REAL
);

CREATE TABLE smartaquarium.ph (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    value REAL
);

CREATE TABLE smartaquarium.light (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    value INT
);

CREATE TABLE smartaquarium.feeder (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    value DATE
);

