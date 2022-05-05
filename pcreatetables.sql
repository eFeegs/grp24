CREATE TABLE CARD(
        ID      CHAR(16)        NOT NULL,
        FNAME   CHAR(20)        NOT NULL,
        LNAME   CHAR(20)        NOT NULL,
        MONTH   CHAR(2)         NOT NULL,
        YEAR    CHAR(2)         NOT NULL,
        CVV     CHAR(3)         NOT NULL,
        ADDRESS CHAR(50)        NOT NULL,
        CITY    CHAR(20)        NOT NULL,
        STATE   CHAR(2)         NOT NULL,
        ZIP     CHAR(6)         NOT NULL,

        PRIMARY KEY (ID)
);

CREATE TABLE CUSTOMER(
        ID      INTEGER         AUTO_INCREMENT,
        FNAME   CHAR(20),
        LNAME   CHAR(20)        NOT NULL,
        EMAIL   CHAR(30)        NOT NULL,
        ADDRESS CHAR(50)        NOT NULL,
        CITY    CHAR(20)        NOT NULL,
        STATE   CHAR(2)         NOT NULL,
        ZIP     CHAR(6)         NOT NULL,
        CARD    CHAR(20)        NOT NULL,

        PRIMARY KEY (ID),
        FOREIGN KEY (CARD) REFERENCES CARD(ID)
);

CREATE TABLE PRODUCT(
        ID      INTEGER         AUTO_INCREMENT,
        NAME    CHAR(20)        NOT NULL,
        QUANTITY INTEGER        NOT NULL,
        RQUANTITY INTEGER       NOT NULL,
        PRICE   INTEGER         NOT NULL,
        DESCRIPTION CHAR(50),

        PRIMARY KEY (ID)
);

CREATE TABLE ORDERLINE(
        ID      INTEGER         AUTO_INCREMENT,
        CID     INTEGER         NOT NULL,
        PID     INTEGER         NOT NULL,
        STATUS  CHAR(10)        NOT NULL,
        QUANTITY INTEGER        NOT NULL,

        PRIMARY KEY (ID),
        FOREIGN KEY (CID) REFERENCES CUSTOMER(ID),
        FOREIGN KEY (PID) REFERENCES PRODUCT(ID)
);

CREATE TABLE CUSTOMER_ORDER(
        ID      INTEGER         AUTO_INCREMENT,
        OID     INTEGER         NOT NULL,
        STATUS  CHAR(10)        NOT NULL,
        DDATE   DATE,
        NOTES   CHAR(50),

        PRIMARY KEY (ID),
        FOREIGN KEY (OID) REFERENCES ORDERLINE(ID)
);