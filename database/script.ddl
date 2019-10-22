
CREATE TABLE gg.Color
(
	name varchar (255) NOT NULL,
	id_Color integer (11) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id_Color)
);

CREATE TABLE gg.Countries
(
	Name varchar (255) NOT NULL,
	id_Countries integer (11) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id_Countries)
);

CREATE TABLE gg.Defect
(
	name varchar (255) NOT NULL,
	id_Defect integer (11) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id_Defect)
);

CREATE TABLE gg.Make
(
	Name varchar (255) NOT NULL,
	id_Make integer (11) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id_Make)
);

CREATE TABLE gg.MotoType
(
	name varchar (255) NOT NULL,
	id_MotoType integer (11) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id_MotoType)
);

CREATE TABLE gg.Towns
(
	Name varchar (255) NOT NULL,
	id_Towns integer (11) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id_Towns)
);

CREATE TABLE gg.users (
  id integer(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  email_verified_at timestamp NULL DEFAULT NULL,
  password varchar(255) NOT NULL,
  remember_token varchar(100) DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE gg.CoolingTypes
(
	id_CoolingTypes integer (11) NOT NULL AUTO_INCREMENT,
	name char (7) NOT NULL,
	PRIMARY KEY(id_CoolingTypes)
);
INSERT INTO CoolingTypes(id_CoolingTypes, name) VALUES(1, 'oru');
INSERT INTO CoolingTypes(id_CoolingTypes, name) VALUES(2, 'skysciu');
INSERT INTO CoolingTypes(id_CoolingTypes, name) VALUES(3, 'misrus');
INSERT INTO CoolingTypes(id_CoolingTypes, name) VALUES(4, 'kita');

CREATE TABLE gg.EngineTypes
(
	id_EngineTypes integer (11) NOT NULL AUTO_INCREMENT,
	name char (11) NOT NULL,
	PRIMARY KEY(id_EngineTypes)
);
INSERT INTO EngineTypes(id_EngineTypes, name) VALUES(1, 'dvitaktis');
INSERT INTO EngineTypes(id_EngineTypes, name) VALUES(2, 'keturtaktis');
INSERT INTO EngineTypes(id_EngineTypes, name) VALUES(3, 'kita');

CREATE TABLE gg.FuelTypes
(
	id_FuelTypes integer (11) NOT NULL AUTO_INCREMENT,
	name char (9) NOT NULL,
	PRIMARY KEY(id_FuelTypes)
);
INSERT INTO FuelTypes(id_FuelTypes, name) VALUES(1, 'benzinas');
INSERT INTO FuelTypes(id_FuelTypes, name) VALUES(2, 'dyzelinas');

CREATE TABLE gg.GearBoxes
(
	id_GearBoxes integer (11) NOT NULL AUTO_INCREMENT,
	name char (10) NOT NULL,
	PRIMARY KEY(id_GearBoxes)
);
INSERT INTO GearBoxes(id_GearBoxes, name) VALUES(1, 'automatine');
INSERT INTO GearBoxes(id_GearBoxes, name) VALUES(2, 'mechanine');

CREATE TABLE gg.ContactInfo
(
	phoneNum varchar (255) NOT NULL,
	EMail varchar (255) NOT NULL,
	Name varchar (255) NOT NULL,
	id_ContactInfo integer (11),
	fk_Townsid_Towns integer (11) NOT NULL,
	fk_Countriesid_Countries integer (11) NOT NULL,
	PRIMARY KEY(id_ContactInfo),
	CONSTRAINT has FOREIGN KEY(fk_Townsid_Towns) REFERENCES gg.Towns (id_Towns)
);

CREATE TABLE gg.Message
(
	Text text,
	id_Message integer (11) NOT NULL AUTO_INCREMENT,
	fk_Userid integer (11) NOT NULL,
	PRIMARY KEY(id_Message),
	CONSTRAINT has1 FOREIGN KEY(fk_Userid) REFERENCES gg.users (id)
);

CREATE TABLE gg.Model
(
	Name varchar (255) NOT NULL,
	id_Model integer (11) NOT NULL AUTO_INCREMENT,
	fk_Makeid_Make integer (11) NOT NULL,
	PRIMARY KEY(id_Model),
	CONSTRAINT has2 FOREIGN KEY(fk_Makeid_Make) REFERENCES gg.Make (id_Make)
);

CREATE TABLE gg.MotoOrder
(
	engineCapacity double (11,2),
	enginePower double (11,2),
	manufactorYear int (11),
	manufactorMonth int (11),
	Price int (11),
	exportPrice int (11),
	distanceTraveled int (11),
	isNew boolean,
	techInspValidTo date,
	Weight double (11,2),
	Euro int (11),
	Description text,
	coolingType integer (11),
	fuelType integer (11),
	Gearbox integer (11),
	engineType integer (11),
	id_MotoOrder integer (11) NOT NULL AUTO_INCREMENT,
	fk_Userid integer (11) NOT NULL,
	fk_MotoTypeid_MotoType integer NOT NULL,
	fk_Colorid_Color integer (11) NOT NULL,
	fk_ContactInfoid_ContactInfo integer (11) NOT NULL,
	fk_Modelid_Model integer (11) NOT NULL,
	fk_Defectid_Defect integer (11) NOT NULL,
	PRIMARY KEY(id_MotoOrder),
	FOREIGN KEY(coolingType) REFERENCES gg.CoolingTypes (id_CoolingTypes),
	FOREIGN KEY(fuelType) REFERENCES gg.FuelTypes (id_FuelTypes),
	FOREIGN KEY(Gearbox) REFERENCES gg.GearBoxes (id_GearBoxes),
	FOREIGN KEY(engineType) REFERENCES gg.EngineTypes (id_EngineTypes),
	CONSTRAINT has3 FOREIGN KEY(fk_Userid) REFERENCES gg.users (id)
);
