<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210522171829 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acheteur (id INT AUTO_INCREMENT NOT NULL, solde DOUBLE PRECISION NOT NULL, is_solvable VARCHAR(255) NOT NULL, identite VARCHAR(255) NOT NULL, moyen_paiement VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acheteur_personne (acheteur_id INT NOT NULL, personne_id INT NOT NULL, INDEX IDX_D89E029A96A7BB5F (acheteur_id), INDEX IDX_D89E029AA21BD112 (personne_id), PRIMARY KEY(acheteur_id, personne_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, numero_tel VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, age INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin_lieu (admin_id INT NOT NULL, lieu_id INT NOT NULL, INDEX IDX_F4EFFB9642B8210 (admin_id), INDEX IDX_F4EFFB96AB213CC (lieu_id), PRIMARY KEY(admin_id, lieu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_produit (categorie_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_76264285BCF5E72D (categorie_id), INDEX IDX_76264285F347EFB (produit_id), PRIMARY KEY(categorie_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enchere (id INT AUTO_INCREMENT NOT NULL, lot_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, heure VARCHAR(255) NOT NULL, date_vente VARCHAR(255) NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, INDEX IDX_38D1870FA8CBA5F7 (lot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enchere_lieu (enchere_id INT NOT NULL, lieu_id INT NOT NULL, INDEX IDX_1B78F7EDE80B6EFB (enchere_id), INDEX IDX_1B78F7ED6AB213CC (lieu_id), PRIMARY KEY(enchere_id, lieu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enchere_admin (enchere_id INT NOT NULL, admin_id INT NOT NULL, INDEX IDX_44365569E80B6EFB (enchere_id), INDEX IDX_44365569642B8210 (admin_id), PRIMARY KEY(enchere_id, admin_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enchere_lot (enchere_id INT NOT NULL, lot_id INT NOT NULL, INDEX IDX_4AD26172E80B6EFB (enchere_id), INDEX IDX_4AD26172A8CBA5F7 (lot_id), PRIMARY KEY(enchere_id, lot_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE estimation (id INT AUTO_INCREMENT NOT NULL, estimation DOUBLE PRECISION NOT NULL, date_estimation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE estimation_admin (estimation_id INT NOT NULL, admin_id INT NOT NULL, INDEX IDX_8B54B41CF35F62F2 (estimation_id), INDEX IDX_8B54B41C642B8210 (admin_id), PRIMARY KEY(estimation_id, admin_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE estimation_produit (estimation_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_40A6778F35F62F2 (estimation_id), INDEX IDX_40A6778F347EFB (produit_id), PRIMARY KEY(estimation_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieu (id INT AUTO_INCREMENT NOT NULL, ville VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal INT NOT NULL, departement VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lot (id INT AUTO_INCREMENT NOT NULL, id_encherex_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, prix_enchere INT DEFAULT NULL, INDEX IDX_B81291B2E5D729 (id_encherex_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lot_enchere (lot_id INT NOT NULL, enchere_id INT NOT NULL, INDEX IDX_9551C12CA8CBA5F7 (lot_id), INDEX IDX_9551C12CE80B6EFB (enchere_id), PRIMARY KEY(lot_id, enchere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ordreachat (id INT AUTO_INCREMENT NOT NULL, id_produit_id INT DEFAULT NULL, id_acheteur_id INT DEFAULT NULL, id_enchere_id INT DEFAULT NULL, montant_max DOUBLE PRECISION NOT NULL, adresse_depot VARCHAR(255) NOT NULL, INDEX IDX_8AD75E39AABEFE2C (id_produit_id), INDEX IDX_8AD75E398EB576A8 (id_acheteur_id), INDEX IDX_8AD75E394D81EE2C (id_enchere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, numero_tel VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal INT NOT NULL, age INT NOT NULL, username VARCHAR(25) NOT NULL, is_active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_FCEC9EFF85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, produit_id INT DEFAULT NULL, photo VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_14B78418F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, id_lot_id INT DEFAULT NULL, id_acheteur_id INT DEFAULT NULL, id_vendeur_id INT NOT NULL, estimation_actuelle DOUBLE PRECISION NOT NULL, prix_vente DOUBLE PRECISION DEFAULT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, artiste VARCHAR(255) DEFAULT NULL, style VARCHAR(255) DEFAULT NULL, INDEX IDX_29A5EC278EFC101A (id_lot_id), INDEX IDX_29A5EC278EB576A8 (id_acheteur_id), INDEX IDX_29A5EC2720068689 (id_vendeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vendeur (id INT AUTO_INCREMENT NOT NULL, id_personne_id INT NOT NULL, INDEX IDX_7AF49996BA091CE5 (id_personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE acheteur_personne ADD CONSTRAINT FK_D89E029A96A7BB5F FOREIGN KEY (acheteur_id) REFERENCES acheteur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE acheteur_personne ADD CONSTRAINT FK_D89E029AA21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE admin_lieu ADD CONSTRAINT FK_F4EFFB9642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE admin_lieu ADD CONSTRAINT FK_F4EFFB96AB213CC FOREIGN KEY (lieu_id) REFERENCES lieu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_produit ADD CONSTRAINT FK_76264285BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_produit ADD CONSTRAINT FK_76264285F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enchere ADD CONSTRAINT FK_38D1870FA8CBA5F7 FOREIGN KEY (lot_id) REFERENCES lot (id)');
        $this->addSql('ALTER TABLE enchere_lieu ADD CONSTRAINT FK_1B78F7EDE80B6EFB FOREIGN KEY (enchere_id) REFERENCES enchere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enchere_lieu ADD CONSTRAINT FK_1B78F7ED6AB213CC FOREIGN KEY (lieu_id) REFERENCES lieu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enchere_admin ADD CONSTRAINT FK_44365569E80B6EFB FOREIGN KEY (enchere_id) REFERENCES enchere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enchere_admin ADD CONSTRAINT FK_44365569642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enchere_lot ADD CONSTRAINT FK_4AD26172E80B6EFB FOREIGN KEY (enchere_id) REFERENCES enchere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enchere_lot ADD CONSTRAINT FK_4AD26172A8CBA5F7 FOREIGN KEY (lot_id) REFERENCES lot (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE estimation_admin ADD CONSTRAINT FK_8B54B41CF35F62F2 FOREIGN KEY (estimation_id) REFERENCES estimation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE estimation_admin ADD CONSTRAINT FK_8B54B41C642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE estimation_produit ADD CONSTRAINT FK_40A6778F35F62F2 FOREIGN KEY (estimation_id) REFERENCES estimation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE estimation_produit ADD CONSTRAINT FK_40A6778F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B2E5D729 FOREIGN KEY (id_encherex_id) REFERENCES enchere (id)');
        $this->addSql('ALTER TABLE lot_enchere ADD CONSTRAINT FK_9551C12CA8CBA5F7 FOREIGN KEY (lot_id) REFERENCES lot (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lot_enchere ADD CONSTRAINT FK_9551C12CE80B6EFB FOREIGN KEY (enchere_id) REFERENCES enchere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ordreachat ADD CONSTRAINT FK_8AD75E39AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE ordreachat ADD CONSTRAINT FK_8AD75E398EB576A8 FOREIGN KEY (id_acheteur_id) REFERENCES acheteur (id)');
        $this->addSql('ALTER TABLE ordreachat ADD CONSTRAINT FK_8AD75E394D81EE2C FOREIGN KEY (id_enchere_id) REFERENCES enchere (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC278EFC101A FOREIGN KEY (id_lot_id) REFERENCES lot (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC278EB576A8 FOREIGN KEY (id_acheteur_id) REFERENCES acheteur (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2720068689 FOREIGN KEY (id_vendeur_id) REFERENCES vendeur (id)');
        $this->addSql('ALTER TABLE vendeur ADD CONSTRAINT FK_7AF49996BA091CE5 FOREIGN KEY (id_personne_id) REFERENCES personne (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE acheteur_personne DROP FOREIGN KEY FK_D89E029A96A7BB5F');
        $this->addSql('ALTER TABLE ordreachat DROP FOREIGN KEY FK_8AD75E398EB576A8');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC278EB576A8');
        $this->addSql('ALTER TABLE admin_lieu DROP FOREIGN KEY FK_F4EFFB9642B8210');
        $this->addSql('ALTER TABLE enchere_admin DROP FOREIGN KEY FK_44365569642B8210');
        $this->addSql('ALTER TABLE estimation_admin DROP FOREIGN KEY FK_8B54B41C642B8210');
        $this->addSql('ALTER TABLE categorie_produit DROP FOREIGN KEY FK_76264285BCF5E72D');
        $this->addSql('ALTER TABLE enchere_lieu DROP FOREIGN KEY FK_1B78F7EDE80B6EFB');
        $this->addSql('ALTER TABLE enchere_admin DROP FOREIGN KEY FK_44365569E80B6EFB');
        $this->addSql('ALTER TABLE enchere_lot DROP FOREIGN KEY FK_4AD26172E80B6EFB');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B2E5D729');
        $this->addSql('ALTER TABLE lot_enchere DROP FOREIGN KEY FK_9551C12CE80B6EFB');
        $this->addSql('ALTER TABLE ordreachat DROP FOREIGN KEY FK_8AD75E394D81EE2C');
        $this->addSql('ALTER TABLE estimation_admin DROP FOREIGN KEY FK_8B54B41CF35F62F2');
        $this->addSql('ALTER TABLE estimation_produit DROP FOREIGN KEY FK_40A6778F35F62F2');
        $this->addSql('ALTER TABLE admin_lieu DROP FOREIGN KEY FK_F4EFFB96AB213CC');
        $this->addSql('ALTER TABLE enchere_lieu DROP FOREIGN KEY FK_1B78F7ED6AB213CC');
        $this->addSql('ALTER TABLE enchere DROP FOREIGN KEY FK_38D1870FA8CBA5F7');
        $this->addSql('ALTER TABLE enchere_lot DROP FOREIGN KEY FK_4AD26172A8CBA5F7');
        $this->addSql('ALTER TABLE lot_enchere DROP FOREIGN KEY FK_9551C12CA8CBA5F7');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC278EFC101A');
        $this->addSql('ALTER TABLE acheteur_personne DROP FOREIGN KEY FK_D89E029AA21BD112');
        $this->addSql('ALTER TABLE vendeur DROP FOREIGN KEY FK_7AF49996BA091CE5');
        $this->addSql('ALTER TABLE categorie_produit DROP FOREIGN KEY FK_76264285F347EFB');
        $this->addSql('ALTER TABLE estimation_produit DROP FOREIGN KEY FK_40A6778F347EFB');
        $this->addSql('ALTER TABLE ordreachat DROP FOREIGN KEY FK_8AD75E39AABEFE2C');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418F347EFB');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2720068689');
        $this->addSql('DROP TABLE acheteur');
        $this->addSql('DROP TABLE acheteur_personne');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE admin_lieu');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE categorie_produit');
        $this->addSql('DROP TABLE enchere');
        $this->addSql('DROP TABLE enchere_lieu');
        $this->addSql('DROP TABLE enchere_admin');
        $this->addSql('DROP TABLE enchere_lot');
        $this->addSql('DROP TABLE estimation');
        $this->addSql('DROP TABLE estimation_admin');
        $this->addSql('DROP TABLE estimation_produit');
        $this->addSql('DROP TABLE lieu');
        $this->addSql('DROP TABLE lot');
        $this->addSql('DROP TABLE lot_enchere');
        $this->addSql('DROP TABLE ordreachat');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE vendeur');
    }
}
