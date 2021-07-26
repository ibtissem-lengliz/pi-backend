<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210721124139 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE abonnement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, duree DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE abonnement_salle_de_sport (abonnement_id INT NOT NULL, salle_de_sport_id INT NOT NULL, INDEX IDX_B2CB8E08F1D74413 (abonnement_id), INDEX IDX_B2CB8E08264AE1D7 (salle_de_sport_id), PRIMARY KEY(abonnement_id, salle_de_sport_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activite (id INT AUTO_INCREMENT NOT NULL, duree DOUBLE PRECISION DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activite_salle_de_sport (activite_id INT NOT NULL, salle_de_sport_id INT NOT NULL, INDEX IDX_83EDEBF9B0F88B1 (activite_id), INDEX IDX_83EDEBF264AE1D7 (salle_de_sport_id), PRIMARY KEY(activite_id, salle_de_sport_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, caracteristique VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coach (id INT AUTO_INCREMENT NOT NULL, specialite_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, INDEX IDX_3F596DCC2195E0F0 (specialite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coach_activite (coach_id INT NOT NULL, activite_id INT NOT NULL, INDEX IDX_C0C94C5F3C105691 (coach_id), INDEX IDX_C0C94C5F9B0F88B1 (activite_id), PRIMARY KEY(coach_id, activite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, salle_de_sport_id INT DEFAULT NULL, categorie_id INT DEFAULT NULL, id_evenement INT NOT NULL, titre VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, date_debut DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, duree DOUBLE PRECISION DEFAULT NULL, lieu VARCHAR(255) DEFAULT NULL, INDEX IDX_B26681E264AE1D7 (salle_de_sport_id), INDEX IDX_B26681EBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement_membre (evenement_id INT NOT NULL, membre_id INT NOT NULL, INDEX IDX_45412BABFD02F13 (evenement_id), INDEX IDX_45412BAB6A99F74A (membre_id), PRIMARY KEY(evenement_id, membre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE membre (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, abonnement_id INT DEFAULT NULL, id_membre INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_de_naissance DATE NOT NULL, poids DOUBLE PRECISION DEFAULT NULL, taille DOUBLE PRECISION DEFAULT NULL, est_membre TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_F6B4FB29A76ED395 (user_id), INDEX IDX_F6B4FB29F1D74413 (abonnement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nutritionniste (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, tel VARCHAR(255) DEFAULT NULL, disponibilite VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nutritionniste_salle_de_sport (nutritionniste_id INT NOT NULL, salle_de_sport_id INT NOT NULL, INDEX IDX_D2618339279DA68A (nutritionniste_id), INDEX IDX_D2618339264AE1D7 (salle_de_sport_id), PRIMARY KEY(nutritionniste_id, salle_de_sport_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle_de_sport (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, id_salle_de_sport INT NOT NULL, description VARCHAR(255) DEFAULT NULL, addresse VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_D533E789A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, reset_token VARCHAR(255) DEFAULT NULL, lattitude INT NOT NULL, longitude INT NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE abonnement_salle_de_sport ADD CONSTRAINT FK_B2CB8E08F1D74413 FOREIGN KEY (abonnement_id) REFERENCES abonnement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE abonnement_salle_de_sport ADD CONSTRAINT FK_B2CB8E08264AE1D7 FOREIGN KEY (salle_de_sport_id) REFERENCES salle_de_sport (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activite_salle_de_sport ADD CONSTRAINT FK_83EDEBF9B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activite_salle_de_sport ADD CONSTRAINT FK_83EDEBF264AE1D7 FOREIGN KEY (salle_de_sport_id) REFERENCES salle_de_sport (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE coach ADD CONSTRAINT FK_3F596DCC2195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE coach_activite ADD CONSTRAINT FK_C0C94C5F3C105691 FOREIGN KEY (coach_id) REFERENCES coach (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE coach_activite ADD CONSTRAINT FK_C0C94C5F9B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E264AE1D7 FOREIGN KEY (salle_de_sport_id) REFERENCES salle_de_sport (id)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE evenement_membre ADD CONSTRAINT FK_45412BABFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement_membre ADD CONSTRAINT FK_45412BAB6A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE membre ADD CONSTRAINT FK_F6B4FB29A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE membre ADD CONSTRAINT FK_F6B4FB29F1D74413 FOREIGN KEY (abonnement_id) REFERENCES abonnement (id)');
        $this->addSql('ALTER TABLE nutritionniste_salle_de_sport ADD CONSTRAINT FK_D2618339279DA68A FOREIGN KEY (nutritionniste_id) REFERENCES nutritionniste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nutritionniste_salle_de_sport ADD CONSTRAINT FK_D2618339264AE1D7 FOREIGN KEY (salle_de_sport_id) REFERENCES salle_de_sport (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salle_de_sport ADD CONSTRAINT FK_D533E789A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE abonnement_salle_de_sport DROP FOREIGN KEY FK_B2CB8E08F1D74413');
        $this->addSql('ALTER TABLE membre DROP FOREIGN KEY FK_F6B4FB29F1D74413');
        $this->addSql('ALTER TABLE activite_salle_de_sport DROP FOREIGN KEY FK_83EDEBF9B0F88B1');
        $this->addSql('ALTER TABLE coach_activite DROP FOREIGN KEY FK_C0C94C5F9B0F88B1');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EBCF5E72D');
        $this->addSql('ALTER TABLE coach_activite DROP FOREIGN KEY FK_C0C94C5F3C105691');
        $this->addSql('ALTER TABLE evenement_membre DROP FOREIGN KEY FK_45412BABFD02F13');
        $this->addSql('ALTER TABLE evenement_membre DROP FOREIGN KEY FK_45412BAB6A99F74A');
        $this->addSql('ALTER TABLE nutritionniste_salle_de_sport DROP FOREIGN KEY FK_D2618339279DA68A');
        $this->addSql('ALTER TABLE abonnement_salle_de_sport DROP FOREIGN KEY FK_B2CB8E08264AE1D7');
        $this->addSql('ALTER TABLE activite_salle_de_sport DROP FOREIGN KEY FK_83EDEBF264AE1D7');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E264AE1D7');
        $this->addSql('ALTER TABLE nutritionniste_salle_de_sport DROP FOREIGN KEY FK_D2618339264AE1D7');
        $this->addSql('ALTER TABLE coach DROP FOREIGN KEY FK_3F596DCC2195E0F0');
        $this->addSql('ALTER TABLE membre DROP FOREIGN KEY FK_F6B4FB29A76ED395');
        $this->addSql('ALTER TABLE salle_de_sport DROP FOREIGN KEY FK_D533E789A76ED395');
        $this->addSql('DROP TABLE abonnement');
        $this->addSql('DROP TABLE abonnement_salle_de_sport');
        $this->addSql('DROP TABLE activite');
        $this->addSql('DROP TABLE activite_salle_de_sport');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE coach');
        $this->addSql('DROP TABLE coach_activite');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE evenement_membre');
        $this->addSql('DROP TABLE membre');
        $this->addSql('DROP TABLE nutritionniste');
        $this->addSql('DROP TABLE nutritionniste_salle_de_sport');
        $this->addSql('DROP TABLE salle_de_sport');
        $this->addSql('DROP TABLE specialite');
        $this->addSql('DROP TABLE user');
    }
}
