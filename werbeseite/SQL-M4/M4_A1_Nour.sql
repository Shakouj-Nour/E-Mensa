use emensawerbeseite;

CREATE TABLE IF NOT EXISTS tbl_wunschgerichte(
    w_id int PRIMARY KEY AUTO_INCREMENT,
    w_name varchar(30),
    w_beschreibung varchar(200),
    w_erstellungsDatum date default now(),
    e_id int
);

CREATE TABLE IF NOT EXISTS tbl_ersteller(
    e_id int PRIMARY KEY AUTO_INCREMENT,
    e_name varchar(30),
    e_mail varchar(70)
);
ALTER TABLE tbl_wunschgerichte ADD FOREIGN KEY (e_id) REFERENCES tbl_ersteller(e_id) ON UPDATE CASCADE ON DELETE SET NULL ;
SELECT * From tbl_ersteller;
SELECT * From tbl_wunschgerichte;

DELETE FROM tbl_ersteller where e_id = 5;


