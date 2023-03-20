#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: AncientEtudiant
#------------------------------------------------------------

CREATE TABLE AncienEtudiant(
        etudiant_id        Int  Auto_increment  NOT NULL ,
        etudiant_nom       Varchar (50) NOT NULL ,
        etudiant_prenom    Varchar (50) NOT NULL ,
        etudiant_telephone Int NOT NULL ,
        etudiant_mail      Varchar (50) NOT NULL ,
        etudiant_promo     Varchar (50) NOT NULL
	,CONSTRAINT AncienEtudiant_PK PRIMARY KEY (etudiant_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Organisation
#------------------------------------------------------------

CREATE TABLE Organisation(
        organisation_id      Int  Auto_increment  NOT NULL ,
        organisation_name    Varchar (50) NOT NULL ,
        organisation_adresse Varchar (50) NOT NULL ,
        organisation_tel     Int NOT NULL
	,CONSTRAINT Organisation_PK PRIMARY KEY (organisation_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Professeur
#------------------------------------------------------------

CREATE TABLE Professeur(
        prof_id      Int  Auto_increment  NOT NULL ,
        prof_name    Varchar (50) NOT NULL ,
        prof_tel     Int NOT NULL ,
        prof_mail    Varchar (50) NOT NULL ,
        prof_matiere Varchar (50) NOT NULL
	,CONSTRAINT Professeur_PK PRIMARY KEY (prof_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: travailler pour
#------------------------------------------------------------

CREATE TABLE travailler(
        organisation_id Int NOT NULL ,
        etudiant_id   Int NOT NULL ,
        profession    Varchar (50) NOT NULL ,
        annee_debut   Date NOT NULL ,
        annee-fin   Date NOT NULL
	,CONSTRAINT travailler_pour_PK PRIMARY KEY (travail_id)

	,CONSTRAINT travailler_pour_Organisation_FK FOREIGN KEY (organisation_id) REFERENCES Organisation(organisation_id)
	,CONSTRAINT travailler_pour_AncienEtudiant0_FK FOREIGN KEY (etudiant_id) REFERENCES AncienEtudiant(etudiant_id)
)ENGINE=InnoDB;
