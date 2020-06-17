create table traveluser
(
    UID              int auto_increment
        primary key,
    Email            varchar(255) null,
    UserName         varchar(255) null,
    Pass             varchar(255) null,
    State            int          null,
    DateJoined       datetime     null,
    DateLastModified datetime     null
)
    charset = utf8;

INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (1, 'luisg@embraer.com.br', 'luisg', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-10-08 00:00:00', '2012-11-15 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (2, 'leonekohler@surfeu.de', 'leonekohler', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-08-22 00:00:00', '2012-10-15 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (3, 'ftremblay@gmail.com', 'ftremblay', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-10-28 00:00:00', '2012-11-16 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (4, 'bjorn.hansen@yahoo.no', 'bjorn.hansen', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-07-31 00:00:00', '2012-08-14 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (5, 'frantisekw@jetbrains.com', 'frantisekw', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-08-06 00:00:00', '2012-09-25 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (6, 'hholy@gmail.com', 'hholy', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-11-01 00:00:00', '2012-12-14 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (7, 'astrid.gruber@apple.at', 'astrid.gruber', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-06-05 00:00:00', '2013-01-10 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (8, 'fharris@google.com', 'fharris', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-09-25 00:00:00', '2012-11-18 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (9, 'jacksmith@microsoft.com', 'jacksmith', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-11-16 00:00:00', '2013-01-18 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (10, 'michelleb@aol.com', 'michelleb', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-12-07 00:00:00', '2013-03-07 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (11, 'tgoyer@apple.com', 'tgoyer', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2013-01-14 00:00:00', '2013-04-19 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (12, 'robbrown@shaw.ca', 'robbrown', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2013-02-07 00:00:00', '2013-06-11 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (13, 'edfrancis@yachoo.ca', 'edfrancis', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-12-20 00:00:00', '2013-01-11 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (14, 'mphilips12@shaw.ca', 'mphilips12', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-05-21 00:00:00', '2012-10-28 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (15, 'marthasilk@gmail.com', 'marthasilk', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-11-17 00:00:00', '2012-12-01 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (16, 'aaronmitchell@yahoo.ca', 'aaronmitchell', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2013-02-12 00:00:00', '2013-03-21 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (17, 'ellie.sullivan@shaw.ca', 'ellie.sullivan', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-09-10 00:00:00', '2012-11-05 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (18, 'jfernandes@yahoo.pt', 'jfernandes', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-08-27 00:00:00', '2012-09-03 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (19, 'masampaio@sapo.pt', 'masampaio', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-07-29 00:00:00', '2012-12-10 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (20, 'hannah.schneider@yahoo.de', 'hannah.schneider', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-08-01 00:00:00', '2012-11-02 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (21, 'camille.bernard@yahoo.fr', 'camille.bernard', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-10-29 00:00:00', '2012-12-07 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (22, 'isabelle_mercier@apple.fr', 'isabelle_mercier', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-11-12 00:00:00', '2013-01-21 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (23, 'emma_jones@hotmail.com', 'emma_jones', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-08-27 00:00:00', '2012-10-29 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (24, 'phil.hughes@gmail.com', 'phil.hughes', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-07-24 00:00:00', '2012-08-28 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (25, 'manoj.pareek@rediff.com', 'manoj.pareek', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-09-07 00:00:00', '2013-01-11 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (26, 'puja_srivastava@yahoo.in', 'puja_srivastava', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2013-02-01 00:00:00', '2013-05-07 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (27, 'mark.taylor@yahoo.au', 'mark.taylor', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-09-17 00:00:00', '2012-11-06 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (28, 'ricunningham@hotmail.com', 'ricunningham', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-08-21 00:00:00', '2012-11-10 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (29, 'patrick.gray@aol.com', 'patrick.gray', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-08-27 00:00:00', '2012-08-30 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (30, 'terhi.hamalainen@apple.fi', 'terhi.hamalainen', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2013-01-24 00:00:00', '2013-01-28 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (31, 'stanisław.wójcik@wp.pl', 'stanisław.wójcik', '09ca8d7c48daf135e5e5977550e7c1e1', 1, '2012-11-25 00:00:00', '2012-12-13 00:00:00');
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (32, 'sqxiangjuby@163.com', '17307110223', 'e8319732bcd2c494bb100f91906e3ac5', null, null, null);
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (33, 'T_Y_Zhang@163.com', '15216667932', '4cf76be286405d3690dde056556bb91a', null, null, null);
INSERT INTO travel.traveluser (UID, Email, UserName, Pass, State, DateJoined, DateLastModified) VALUES (34, '', '', 'ba7e5dcafbbfbc98c2f0e5ff2135481a', null, null, null);