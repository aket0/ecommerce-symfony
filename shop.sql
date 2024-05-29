#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id       Int  Auto_increment  NOT NULL ,
        email    Varchar (50) NOT NULL ,
        username Varchar (50) NOT NULL ,
        password Varchar (50) NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: product
#------------------------------------------------------------

CREATE TABLE product(
        id    Int  Auto_increment  NOT NULL ,
        name  Char (250) NOT NULL ,
        price Char (250) NOT NULL ,
        src   Varchar (20000) NOT NULL
	,CONSTRAINT product_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

