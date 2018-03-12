
CREATE TABLE Inscrits
(
  idjoueur NUMBER PRIMARY KEY NOT NULL,
  mail VARCHAR2(50) NOT NULL,
  pseudo VARCHAR2(20) NOT NULL,
  motdepasse VARCHAR2(40) NOT NULL,
  partiesjouees NUMBER,
  partiesgagnees NUMBER,
)

CREATE TABLE Parties
(
  idParties NUMBER FOREIGN KEY REFERENCES Joue(idParties),
  confidentialite ENUM ('prive','public'),
)

CREATE TABLE Joue
(
  idParties NUMBER PRIMARY KEY NOT NULL,
  JoueurB NUMBER FOREIGN KEY REFERENCES Inscrits(idjoueur),
  JoueurN NUMBER FOREIGN KEY REFERENCES Inscrits(idjoueur),
  etat ENUM ('en cours','fini'),
)

CREATE TABLE Coup
(
  idParties NUMBER FOREIGN KEY REFERENCES Joue(idParties),
  idjoueur NUMBER FOREIGN KEY REFERENCES Inscrits(idjoueur),
  coordX NUMBER,
  coordY NUMBER,
  dateCoup DATE,
)

CREATE TABLE Chatlog
(
  idjoueur NUMBER FOREIGN KEY REFERENCES Inscrits(idjoueur),
  datemessage DATE,
  texte VARCHAR2(300),
)
