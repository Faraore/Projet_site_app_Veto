create table civilite(
		id int Auto_increment not null,
		libelle_long varchar(10) not null,
		libelle_court varchar(5) not null,
		constraint civilite_pk primary key(id)
)engine=innodb;

CREATE TABLE pays(
        id          Int  Auto_increment  NOT NULL ,
        code_postal Int NOT NULL ,
        ville       Varchar (5) NOT NULL
	,CONSTRAINT country_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE connexion(
        id               Int  Auto_increment  NOT NULL ,
        mail             Varchar (100) NOT NULL ,
        password         Varchar (100) NOT NULL ,
        question_secrete Varchar (100)
	,CONSTRAINT connexion_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE proprietaires(
        id                 Int  Auto_increment  NOT NULL ,
        nom                Varchar (200) NOT NULL ,
        prenom             Varchar (200) NOT NULL ,
        date_de_naissance  Date NOT NULL ,
        numero_adresse     Int NOT NULL ,
        nom_adresse        Varchar (250) NOT NULL ,
        complement_adresse Varchar (250) ,
        telephone          Int (10),
        id_civilite        Int not null,
        id_pays            Int not null,
        id_connexion       Int not null
	,CONSTRAINT proprietaires_PK PRIMARY KEY (id)
	,CONSTRAINT proprietaires_civilite_FK FOREIGN KEY (id_civilite) REFERENCES civilite(id)
	,CONSTRAINT proprietaires_pays_FK FOREIGN KEY (id_pays) REFERENCES pays(id)
	,CONSTRAINT proprietaires_connexion_FK FOREIGN KEY (id_connexion) REFERENCES connexion(id)
)ENGINE=InnoDB;


CREATE TABLE famille(
        id          Int  Auto_increment  NOT NULL ,
        type_animal Varchar (200) NOT NULL ,
        race        Varchar (200) NOT NULL
	,CONSTRAINT famille_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE poids(
        id          Int  Auto_increment  NOT NULL ,
        poids       Int (4) NOT NULL ,
        date_mesure Date NOT NULL
	,CONSTRAINT poids_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


CREATE TABLE sexe_des_animaux(
        id   Int  Auto_increment  NOT NULL ,
        sexe Varchar (50) NOT NULL
	,CONSTRAINT sexe_des_animaux_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE specialite(
        id               Int  Auto_increment  NOT NULL ,
        type_specialite Varchar (200)
	,CONSTRAINT specialite_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

CREATE TABLE veterinaires(
        id                 Int  Auto_increment  NOT NULL ,
        nom                Varchar (200) NOT NULL ,
        prenom             Varchar (200) NOT NULL ,
        numero_adresse     Varchar (50) NOT NULL ,
        nom_adresse        Varchar (200) NOT NULL ,
        complement_adresse Varchar (50) ,
        telephone          Int(10) not null,
        id_specialite      Int not NULL
	,CONSTRAINT veterinaires_PK PRIMARY KEY (id)
	,CONSTRAINT veterinaires_specialite_FK FOREIGN KEY (id_specialite) REFERENCES specialite(id)
)ENGINE=InnoDB;

CREATE TABLE animaux(
        id                   Int  Auto_increment  NOT NULL ,
        nom                  Varchar (200) NOT NULL ,
        date_de_naissance    Date ,
        date_de_deces        Date ,
        id_proprietaires      Int NOT NULL ,
        id_famille           Int NOT NULL ,
        id_veterinaires       Int NOT NULL ,
        id_sexe_des_animaux Int NOT NULL
	,CONSTRAINT animaux_PK PRIMARY KEY (id)

	,CONSTRAINT animaux_proprietaires_FK FOREIGN KEY (id_proprietaires) REFERENCES proprietaires(id)
	,CONSTRAINT animaux_famille0_FK FOREIGN KEY (id_famille) REFERENCES famille(id)
	,CONSTRAINT animaux_veterinaires1_FK FOREIGN KEY (id_veterinaires) REFERENCES veterinaires(id)
	,CONSTRAINT animaux_sexe_des_animaux2_FK FOREIGN KEY (id_sexe_des_animaux) REFERENCES sexe_des_animaux(id)
)ENGINE=InnoDB;

CREATE TABLE peser(
	id_poids       Int not null,
	id_animaux     Int not null
	,CONSTRAINT peser_poids_FK FOREIGN KEY (id_poids) REFERENCES poids(id)
	,CONSTRAINT peser_animaux_FK FOREIGN KEY (id_animaux) REFERENCES animaux(id)
)ENGINE=InnoDB;








