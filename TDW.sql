CREATE TABLE Utilisateurs (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        nom TEXT NOT NULL,
        prenom TEXT NOT NULL,
        email TEXT NOT NULL,
        sexe TEXT NOT NULL,
        date_naissance DATE NOT NULL, 
        mot_de_passe TEXT NOT NULL
        );
CREATE TABLE Recette (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        titre TEXT NOT NULL,
        description TEXT NOT NULL,
        image TEXT NOT NULL,
        video TEXT,
        creator_id INTEGER  ,
        temps_preparation INTEGER NOT NULL,
        temps_cuisson INTEGER NOT NULL,
        temps_repos INTEGER,
        difficulte INTEGER NOT NULL,
        categorie TEXT NOT NULL,
        notation INTEGER,
        etat TEXT NOT NULL,
        healthy BOOLEAN NOT NULL,
        calories INTEGER,
        saison TEXT,
        FOREIGN KEY (creator_id) REFERENCES Utilisateurs(id)
        );
CREATE TABLE Ingredient (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        nom TEXT NOT NULL,
        description TEXT NOT NULL,
        saison TEXT NOT NULL,
        image TEXT NOT NULL

        );
CREATE TABLE IngredientCuit (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_ingredient INTEGER NOT NULL,
        methode_de_cuissance TEXT NOT NULL,
        healthy BOOLEAN NOT NULL

        );
CREATE TABLE Etape (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        description TEXT NOT NULL,
        ordre INTEGER NOT NULL,
        id_recette INTEGER NOT NULL,
        FOREIGN KEY (id_recette) REFERENCES Recette(id)
        );
CREATE TABLE RecetteIngredient (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        quantite INTEGER NOT NULL,
        unite TEXT NOT NULL,
        id_recette INTEGER NOT NULL,
        id_ingredient INTEGER NOT NULL,
        FOREIGN KEY (id_recette) REFERENCES Recette(id),
        FOREIGN KEY (id_ingredient) REFERENCES Ingredient(id)
        );
CREATE TABLE NotationUtilisateur (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_recette INTEGER NOT NULL,
        id_utilisateur INTEGER NOT NULL,
        note INTEGER NOT NULL,
        FOREIGN KEY (id_recette) REFERENCES Recette(id),
        FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs(id)
        );

CREATE TABLE PreferenceUtilisateur (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_utilisateur INTEGER NOT NULL,
        id_recette INTEGER NOT NULL,
        FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs(id),
        FOREIGN KEY (id_recette) REFERENCES Recette(id)
        );
CREATE TABLE Fêtes (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        nom TEXT NOT NULL,
        description TEXT NOT NULL
        );
CREATE TABLE RecetteFêtes(
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        id_recette INTEGER NOT NULL,
        id_fete INTEGER NOT NULL,
        FOREIGN KEY (id_recette) REFERENCES Recette(id),
        FOREIGN KEY (id_fete) REFERENCES Fêtes(id)
);
CREATE TABLE News (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        titre TEXT NOT NULL,
        description TEXT NOT NULL,
        image TEXT NOT NULL,
        video TEXT
        );


CREATE TABLE diapos(
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        type TEXT NOT NULL,
        id_recette INTEGER,
        id_news INTEGER
        );


CREATE TABLE Admin (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        email TEXT NOT NULL,
        mot_de_passe TEXT NOT NULL
        );
CREATE TABLE AdminParams (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        nom TEXT NOT NULL,
        valeur TEXT NOT NULL
        )







