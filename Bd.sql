DROP TABLE CHATLOG;
DROP TABLE COUP;
DROP TABLE PARTIES;
DROP TABLE JOUE;
DROP TABLE INSCRITS;

CREATE TABLE INSCRITS
(
  idjoueur       int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY     (idjoueur),
  mail           VARCHAR(50) NOT NULL,
  pseudo         VARCHAR(20) NOT NULL UNIQUE,
  motdepasse     VARCHAR(40) NOT NULL,
  partiesjouees  int DEFAULT 0,
  partiesgagnees int DEFAULT 0
);

CREATE TABLE JOUE
(
  idParties int NOT NULL,
  JoueurB int NOT NULL,
  JoueurN int NOT NULL,
  PRIMARY KEY (idParties),
  FOREIGN KEY (JoueurB) REFERENCES INSCRITS(idjoueur),
  FOREIGN KEY (JoueurN) REFERENCES INSCRITS(idjoueur),
  etat ENUM ('en cours', 'fini')
);

CREATE TABLE PARTIES
(
  idParties int,
  FOREIGN KEY (idParties) REFERENCES JOUE(idParties),
  confidentialite ENUM ('prive', 'public')
);

CREATE TABLE COUP
(
  idParties int,
  FOREIGN KEY (idParties) REFERENCES JOUE(idParties),
  idjoueur int,
  FOREIGN KEY (idjoueur) REFERENCES INSCRITS(idjoueur),
  coordX int,
  coordY int,
  dateCoup DATE
);

CREATE TABLE CHATLOG
(
  idjoueur int,
  FOREIGN KEY (idjoueur) REFERENCES INSCRITS(idjoueur),
  datemessage DATE,
  texte VARCHAR(300)
);

INSERT INTO INSCRITS VALUES (0,'serge@oui.com','judas','jesus',0,0);
INSERT INTO INSCRITS VALUES (0,'philipe@oui.com','demacia','jesus',0,0);
INSERT INTO INSCRITS VALUES (0,'jean-Eude@oui.com','oui','jesus',0,0);
INSERT INTO INSCRITS VALUES (0,'bertrand@oui.com','mechant','jesus',0,0);

