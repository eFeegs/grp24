INSERT INTO CARD
        (ID, FNAME, LNAME, MONTH, YEAR, CVV, ADDRESS, CITY, STATE, ZIP)
        VALUES('8675309243213042',
                'David',
                'Ostman',
                '12',
                '28',
                '847',
                '1200 W Algonquin Rd',
                'Palatine',
                'IL',
                '60067'
);

INSERT INTO CUSTOMER
        (FNAME,LNAME,EMAIL,ADDRESS,CITY,STATE,ZIP,CARD)
        VALUES('David',
                'Ostman',
                'z1898718@students.niu.edu',
                '1200 W Algonquin Rd',
                'Palatine',
                'IL',
                '60067',
                '8675309243213042'
);

INSERT INTO CUSTOMER
        (FNAME,LNAME, EMAIL, ADDRESS, CITY, STATE, ZIP, CARD)
        VALUES('Hussein',
                'Alzubaidi',
                'z1861177@students.niu.edu',
                '1200 W Algonquin Rd',
                'Palatine',
                'IL',
                '60067',
                '8675309243213042'
);

INSERT INTO CUSTOMER
        (FNAME,LNAME,EMAIL,ADDRESS,CITY,STATE,ZIP,CARD)
        VALUES('Jacob',
                'Dyer',
                'z1944200@students.niu.edu',
                '1200 W Algonquin Rd',
                'Palatine',
                'IL',
                '60067',
                '8675309243213042'
);

INSERT INTO CUSTOMER
        (FNAME,LNAME,EMAIL,ADDRESS,CITY,STATE,ZIP,CARD)
        VALUES('Emma',
                'Figiel',
                'z1944395@students.niu.edu',
                '1200 W Algonquin Rd',
                'Palatine',
                'IL',
                '60067',
                '8675309243213042'
);


INSERT INTO CUSTOMER
        (FNAME,LNAME,EMAIL,ADDRESS,CITY,STATE,ZIP,CARD)
        VALUES('Guillermo',
                'Rioz-Mut',
                'z1939912@students.niu.edu',
                '1200 W Algonquin Rd',
                'Palatine',
                'IL',
                '60067',
                '8675309243213042'
);

INSERT INTO PRODUCT
        (NAME,QUANTITY,RQUANTITY,PRICE)
        VALUES('Gatorade',
                '400',
                '0',
                '20'
);

INSERT INTO PRODUCT
        (NAME,QUANTITY,RQUANTITY,PRICE)
        VALUES('Headphones',
                '100',
                '0',
                '600'
);

INSERT INTO PRODUCT
        (NAME,QUANTITY,RQUANTITY,PRICE)
        VALUES('Monitor',
                '25',
                '0',
                '300'
);

INSERT INTO PRODUCT
        (NAME,QUANTITY,RQUANTITY,PRICE)
        VALUES('Computer',
                '75',
                '0',
                '500'
);

INSERT INTO PRODUCT
        (NAME,QUANTITY,RQUANTITY,PRICE)
        VALUES('Tablet',
                '50',
                '3',
                '1300'
);

INSERT INTO PRODUCT
        (NAME,QUANTITY,RQUANTITY,PRICE)
        VALUES('Backpack',
                '300',
                '2',
                '20'
);

INSERT INTO PRODUCT
        (NAME,QUANTITY,RQUANTITY,PRICE)
        VALUES('Tablet Case',
                '50',
                '0',
                '500'
);

INSERT INTO PRODUCT
        (NAME,QUANTITY,RQUANTITY,PRICE)
        VALUES('Table',
                '30',
                '0',
                '2500'
);

INSERT INTO PRODUCT
        (NAME,QUANTITY,RQUANTITY,PRICE)
        VALUES('Coke',
                '500',
                '0',
                '15'
);

INSERT INTO PRODUCT
        (NAME,QUANTITY,RQUANTITY,PRICE)
        VALUES('Laptop',
                '80',
                '0',
                '750'
);

INSERT INTO PRODUCT
        (NAME,QUANTITY,RQUANTITY,PRICE)
        VALUES('TV',
                '40',
                '0',
                '2500'
);

INSERT INTO ORDERLINE
        (CID,PID,STATUS,QUANTITY)
        VALUES('1',
                '6',
                'Bought',
                '2'
);

INSERT INTO ORDERLINE
        (CID,PID,STATUS,QUANTITY)
        VALUES('2',
                '5',
                'Bought',
                '3'
);

INSERT INTO ORDERLINE
        (CID,PID,STATUS,QUANTITY)
        VALUES('3',
                '1',
                'Bought',
                '6'
);

INSERT INTO ORDERLINE
        (CID,PID,STATUS,QUANTITY)
        VALUES('4',
                '7',
                'Bought',
                '2'
);

INSERT INTO ORDERLINE
        (CID,PID,STATUS,QUANTITY)
        VALUES('5',
                '8',
                'Bought',
                '3'
);

INSERT INTO CUSTOMER_ORDER
        (OID,STATUS,DDATE)
        VALUES('1',
                'Processing',
                '2022-05-06'
);

INSERT INTO CUSTOMER_ORDER
        (OID,STATUS,DDATE)
        VALUES('2',
                'Processed',
                '2022-05-07'
);

INSERT INTO CUSTOMER_ORDER
        (OID,STATUS,DDATE)
        VALUES('3',
                'Shipped',
                '2022-05-05'
);

INSERT INTO CUSTOMER_ORDER
        (OID, STATUS, DDATE)
        VALUES('4',
                'Delivered',
                '2022-04-30'
);

INSERT INTO CUSTOMER_ORDER
        (OID, STATUS, DDATE)
        VALUES('5',
                'Delivered',
                '2022-04-28'
);
