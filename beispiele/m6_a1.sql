use emensawerbeseite;

create table if not exists benutzer(
                                    id int not null PRIMARY KEY ,
                                    bemerkung varchar(500) NOT NULL,
                                    sternebewertung int check(sternebewertung<=3),
                                    bewertungszeitpunkt datetime,
                                    hervorgehoben boolean
                                    bewertung_fk_benutzer FOREIGNKEY (id) REFERENCES benutzer (id)
                                    bewertung_fk_gericht FOREIGNKEY (id) REFERENCES gericht (id)

)
