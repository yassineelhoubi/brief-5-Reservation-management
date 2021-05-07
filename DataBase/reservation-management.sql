drop TABLE Users;
CREATE table Users (
    id INT  PRIMARY KEY AUTO_INCREMENT ,
    email VARCHAR (55),
    password VARCHAR (55),
    role VARCHAR (12)
);

DROP TABLE Admin;
CREATE table Admin(
    idAdmin int PRIMARY KEY ,
    name VARCHAR (55),
    FOREIGN KEY (idAdmin) REFERENCES users(id)
);
DROP table Customer;
CREATE table Customer(
    idCustomer INT  PRIMARY KEY ,
    Fname VARCHAR  (55),
    Lname VARCHAR  (55),
    nbrPhone VARCHAR  (13),
    FOREIGN KEY (idCustomer) REFERENCES users(id)
);
DROP TABLE Property;
CREATE TABLE Property (
    idProperty int AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR (55),
    type VARCHAR (255) NULL,
     view VARCHAR (255) NULL 
);
DROP table Tarifs;
CREATE table Tarifs(
    idProperty int PRIMARY KEY ,
    price int ,
    FOREIGN key (idProperty) REFERENCES Property(idProperty)
);
DROP TABLE Pension;
CREATE TABLE Pension(
    idPension int AUTO_INCREMENT PRIMARY KEY ,
    type VARCHAR (55),
    demitype VARCHAR (55),
    price int
);
DROP TABLE Reservation;
CREATE TABLE Reservation(
    id int PRIMARY KEY AUTO_INCREMENT ,
    checkIn DATE ,
    chekOut DATE ,
    idProperty INT ,
    idCustomer INT ,
    idPension INT ,
    FOREIGN KEY (idProperty) REFERENCES Property(idProperty),
    FOREIGN KEY (idCustomer) REFERENCES Customer(idCustomer),
    FOREIGN KEY (idPension) REFERENCES Pension(idPension)
);