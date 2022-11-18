#gericht_hat_allergen
ALTER TABLE gericht_hat_allergen ADD FOREIGN KEY (gericht_id) REFERENCES gericht(id)ON UPDATE CASCADE ON DELETE RESTRICT ;
ALTER TABLE gericht_hat_allergen ADD FOREIGN KEY (code) REFERENCES allergen(code)ON UPDATE CASCADE ON DELETE RESTRICT ;
ALTER TABLE gericht_hat_allergen ADD PRIMARY KEY (gericht_id , code);
#gericht_hat_kategorie
ALTER TABLE gericht_hat_kategorie ADD FOREIGN KEY (gericht_id) REFERENCES gericht(id) ON UPDATE CASCADE ON DELETE RESTRICT ;
ALTER TABLE gericht_hat_kategorie ADD FOREIGN KEY (kategorie_id) REFERENCES kategorie(id) ON UPDATE CASCADE ON DELETE RESTRICT ;
ALTER TABLE gericht_hat_kategorie ADD PRIMARY KEY (kategorie_id,gericht_id);


DEL