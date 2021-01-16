use emensawerbeseite;

create table if not exists bewertung(
                                    gericht_id int not null,
                                    bemerkung varchar(500) NOT NULL,
                                    sternebewertung int check(sternebewertung<=5),
                                    bewertungszeitpunkt datetime,
                                    userID int(11),
                                    hervorgehoben boolean

);
