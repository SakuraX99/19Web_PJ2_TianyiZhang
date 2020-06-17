create table Theme
(
    ID    int auto_increment
        primary key,
    Heat  int default 0 null,
    theme varchar(255)  not null,
    constraint Theme_theme_uindex
        unique (theme)
);

INSERT INTO travel.Theme (ID, Heat, theme) VALUES (1, 27, 'Scenery');
INSERT INTO travel.Theme (ID, Heat, theme) VALUES (2, 35, 'City');
INSERT INTO travel.Theme (ID, Heat, theme) VALUES (3, 57, 'People');
INSERT INTO travel.Theme (ID, Heat, theme) VALUES (4, 37, 'Animal');
INSERT INTO travel.Theme (ID, Heat, theme) VALUES (5, 33, 'Building');
INSERT INTO travel.Theme (ID, Heat, theme) VALUES (6, 49, 'Wonder');
INSERT INTO travel.Theme (ID, Heat, theme) VALUES (7, 32, 'Other');