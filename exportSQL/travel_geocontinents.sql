create table geocontinents
(
    ContinentCode varchar(2)   not null
        primary key,
    ContinentName varchar(255) null,
    GeoNameId     int          null
)
    charset = utf8;

create index GeoNameId
    on geocontinents (GeoNameId);

INSERT INTO travel.geocontinents (ContinentCode, ContinentName, GeoNameId) VALUES ('AF', 'Africa', 6255146);
INSERT INTO travel.geocontinents (ContinentCode, ContinentName, GeoNameId) VALUES ('AN', 'Antarctica', 6255152);
INSERT INTO travel.geocontinents (ContinentCode, ContinentName, GeoNameId) VALUES ('AS', 'Asia', 6255147);
INSERT INTO travel.geocontinents (ContinentCode, ContinentName, GeoNameId) VALUES ('EU', 'Europe', 6255148);
INSERT INTO travel.geocontinents (ContinentCode, ContinentName, GeoNameId) VALUES ('NA', 'North America', 6255149);
INSERT INTO travel.geocontinents (ContinentCode, ContinentName, GeoNameId) VALUES ('OC', 'Oceania', 6255151);
INSERT INTO travel.geocontinents (ContinentCode, ContinentName, GeoNameId) VALUES ('SA', 'South America', 6255150);