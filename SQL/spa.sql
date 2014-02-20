DROP DATABASE IF EXISTS spa;
CREATE DATABASE IF NOT EXISTS spa;
USE spa;
# -----------------------------------------------------------------------------
#       TABLE : cms
# -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS cms
 (
	id_cms VARCHAR(128) NOT NULL  ,
	contenu TEXT NULL  ,
	titre VARCHAR(128)  ,
	description VARCHAR(1024)
	, PRIMARY KEY (id_cms)
 );

# -----------------------------------------------------------------------------
#       TABLE : news_list
# -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS news_list
 (
	id_mailing INTEGER NOT NULL AUTO_INCREMENT  ,
	email VARCHAR(128)  
	, PRIMARY KEY (id_mailing)
 );

# -----------------------------------------------------------------------------
#       TABLE : membre
# -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS membre
 (
	id_membre INTEGER NOT NULL AUTO_INCREMENT  ,
	nom VARCHAR(128) NULL  ,
	prenom VARCHAR(128) NULL  ,
	email VARCHAR(128) NULL  ,
	password VARCHAR(128) NULL  ,
	active BOOLEAN DEFAULT 0  ,
	salt VARCHAR(40) NULL  ,
	token VARCHAR(40) NULL ,
	dateMembre DATE  ,
	news BOOLEAN DEFAULT 1
	, PRIMARY KEY (id_membre) 
 );

# -----------------------------------------------------------------------------
#       TABLE : article_membre
# -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS article_membre
 (
	id_article INTEGER NOT NULL AUTO_INCREMENT  ,
	titre VARCHAR(512) NOT NULL  ,
	contenu TEXT NULL  
	, PRIMARY KEY (id_article)
 );

# -----------------------------------------------------------------------------
#       TABLE : rediger
# -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS rediger
 (
	id_membre INTEGER NOT NULL  ,
	id_article INTEGER NOT NULL  ,
	dateRediger DATE NULL  ,
	active BOOLEAN default 0 
	, PRIMARY KEY (id_membre,id_article)
 );

# -----------------------------------------------------------------------------
#       TABLE : categorie
# -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS categorie
 (
	id_cat INTEGER NOT NULL AUTO_INCREMENT  ,
	description VARCHAR(1024) NULL  ,
	libelle VARCHAR(128) NULL
	, PRIMARY KEY (id_cat)
 );

# -----------------------------------------------------------------------------
#       TABLE : article
# -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS article
 (
	id_article INTEGER NOT NULL AUTO_INCREMENT  ,
	id_cat INTEGER NOT NULL  ,
	titre VARCHAR(512) NOT NULL  ,
	description VARCHAR(1024) NULL ,
	contenu TEXT NULL ,
	dateArticle DATETIME  
	, PRIMARY KEY (id_article)
 );

# -----------------------------------------------------------------------------
#       TABLE : commentaire
# -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS commentaire
 (
	id_comm INTEGER NOT NULL AUTO_INCREMENT  ,
	id_article INTEGER NOT NULL  ,
	auteur VARCHAR(128) NOT NULL  ,
	commentaire TEXT NULL  ,
	dateComm DATE
	, PRIMARY KEY (id_comm)
 );

# -----------------------------------------------------------------------------
#       TABLE : lien
# -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS lien
 (
	id_lien INTEGER NOT NULL AUTO_INCREMENT  ,
	nom VARCHAR(128) NOT NULL  ,
	cible VARCHAR(1024) NOT NULL  
	, PRIMARY KEY (id_lien)
 );

# -----------------------------------------------------------------------------
#       TABLE : mailing_pro
# -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS mailing_pro
 (
	id_mail INTEGER NOT NULL AUTO_INCREMENT  ,
	sujet VARCHAR(512) NOT NULL  ,
	message TEXT NOT NULL  ,
	dateMail DATETIME
	, PRIMARY KEY (id_mail)
 );

# -----------------------------------------------------------------------------
#       TABLE : mailing_pub
# -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS mailing_pub
 (
	id_mail INTEGER NOT NULL AUTO_INCREMENT  ,
	sujet VARCHAR(512) NOT NULL  ,
	message TEXT NOT NULL  ,
	dateMail DATETIME
	, PRIMARY KEY (id_mail)
 );

# -----------------------------------------------------------------------------
#       TABLE : news_pro
# -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS news_pro
 (
	id_mail INTEGER NOT NULL  ,
	id_membre INTEGER NOT NULL  ,
	dateNews DATETIME
	, PRIMARY KEY (id_mail,id_membre)
 );

# -----------------------------------------------------------------------------
#       TABLE : news_pub
# -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS news_pub
 (
	id_mail INTEGER NOT NULL  ,
	id_mailing INTEGER NOT NULL  ,
	dateNews DATETIME
	, PRIMARY KEY (id_mail,id_mailing)
 );

# -----------------------------------------------------------------------------
#       REFERENCES DES TABLES
# -----------------------------------------------------------------------------

ALTER TABLE rediger 
  ADD FOREIGN KEY FK_rediger_membre (id_membre)
      REFERENCES membre (id_membre) ;
ALTER TABLE rediger 
  ADD FOREIGN KEY FK_rediger_article_membre (id_article)
      REFERENCES article_membre (id_article) ;
ALTER TABLE article 
  ADD FOREIGN KEY FK_article_categorie (id_cat)
      REFERENCES categorie (id_cat) ;
ALTER TABLE commentaire 
  ADD FOREIGN KEY FK_commentaire_article (id_article)
      REFERENCES article (id_article) ;
ALTER TABLE news_pro
  ADD FOREIGN KEY FK_news_pro_mailing_pro (id_mail)
      REFERENCES mailing_pro (id_mail) ;
ALTER TABLE news_pro
  ADD FOREIGN KEY FK_news_pro_membre (id_membre)
      REFERENCES membre (id_membre) ;
ALTER TABLE news_pub
  ADD FOREIGN KEY FK_news_pub_mailing_pub (id_mail)
      REFERENCES mailing_pub (id_mail) ;
ALTER TABLE news_pub
  ADD FOREIGN KEY FK_news_pub_new_list (id_mailing)
      REFERENCES news_list (id_mailing) ;

# -----------------------------------------------------------------------------
#       INSERTION DES DONNEES
# -----------------------------------------------------------------------------

INSERT INTO cms VALUES("accueil", "", "Accueil", "Le Reuilly spa vous accueille"),
("spa", "", "Le Spa", "L'histoire du Reuilly spa"),
("services", "", "Les services", "Les services que nous proposons"),
("produits", "", "Les produits", "Les produits que nous proposons"),
("contact", "", "Nous contacter", "Retrouvez toutes les informations pour nous contacter");