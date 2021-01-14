use emensawerbeseite;

create table if not exists bewertung(
                                    id int not null PRIMARY KEY ,
                                    bemerkung varchar(500) NOT NULL,
                                    sternebewertung int check(sternebewertung<=3),
                                    bewertungszeitpunkt datetime,
                                    hervorgehoben boolean,
                                    constraint bewertung_fk_benutzer foreign key (id) REFERENCES benutzer (id),
                                    constraint bewertung_fk_gericht foreign key (id) REFERENCES gericht (id)

);
