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
    bedtype VARCHAR (255) NULL,
    view VARCHAR (255) NULL,
    price int(24)  
);

DROP TABLE Reservation;
CREATE TABLE Reservation(
    idReservation int PRIMARY KEY AUTO_INCREMENT ,
    idCustomer INT ,
    dateReservation DATE ,
    checkIn DATE ,
    chekOut DATE ,
    FOREIGN KEY (idCustomer) REFERENCES Customer(idCustomer)

);
DROP TABLE services;
CREATE TABLE services(
    idServices INT PRIMARY KEY AUTO_INCREMENT ,
    idProperty  INT ,
    idReservation INT,
    FOREIGN KEY (idProperty) REFERENCES property(idProperty)

);
DROP TABLE Bill;
CREATE TABLE Bill(
    idReservation int PRIMARY KEY  ,
    totalPrice int ,
    nbrOfDays int ,
    finalPrice int ,
    FOREIGN KEY (idReservation) REFERENCES reservation(idReservation)
);
/* INSERT property */

INSERT INTO property (`name`, `type`, `bedtype`, `view`, `price`) VALUES
/* bangalow */
('bangalow',NULL, NULL, NULL , 700) ,
/* appartemnets */
('appartements',NULL, NULL, NULL , 500) ,
/* Single Room */
('hotel','single room',NULL,'interior view' , 300),
('hotel','single room',NULL,'exterior view' , 360),
/* Double Room */
('hotel','double room','double bed','interior view' , 400),
('hotel','double room','double bed','exterior view' , 480),
('hotel','double room','2 Single Beds','interior view' , 400),
/* Offers Of Child */
('hotel','no supplement child bed 0 DH',NULL,NULL , 0),
('hotel','child bed supplement 25% single room',NULL,NULL , 75),
('hotel','add 50% single room',NULL,NULL , 150),
('hotel','add a single room',NULL,NULL , 300),
('hotel','add 70% single room + bed',NULL,NULL , 210);


INSERT INTO property (`name`, `type`, `bedtype`, `view`, `price`) VALUES 
('pension','complete',NULL,NULL,500),
('pension','Breakfast / Lunch',NULL,NULL,300),
('pension','Breakfast / Dinner',NULL,NULL,350),
('pension','without',NULL,NULL,0);





        
