PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
COMMIT;

ATTACH DATABASE 'SmartAquarium.db' as 'smartaquarium';

CREATE TABLE smartaquarium.temperature (
    id INT PRIMARY KEY NOT NULL,
    value REAL
);

CREATE TABLE smartaquarium.ph (
    id INT PRIMARY KEY NOT NULL,
    value REAL
);

CREATE TABLE smartaquarium.light (
    id INT PRIMARY KEY NOT NULL,
    value INT
);

CREATE TABLE smartaquarium.feeder (
    id INT PRIMARY KEY NOT NULL,
    value DATE
);

