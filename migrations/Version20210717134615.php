<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210717134615 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, lattitude INT NOT NULL, longitude INT NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE abonnement_salle_de_sport ADD CONSTRAINT FK_B2CB8E08F1D74413 FOREIGN KEY (abonnement_id) REFERENCES abonnement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE abonnement_salle_de_sport ADD CONSTRAINT FK_B2CB8E08264AE1D7 FOREIGN KEY (salle_de_sport_id) REFERENCES salle_de_sport (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activite_salle_de_sport ADD CONSTRAINT FK_83EDEBF9B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activite_salle_de_sport ADD CONSTRAINT FK_83EDEBF264AE1D7 FOREIGN KEY (salle_de_sport_id) REFERENCES salle_de_sport (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE coach ADD CONSTRAINT FK_3F596DCC2195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE coach_activite ADD CONSTRAINT FK_C0C94C5F3C105691 FOREIGN KEY (coach_id) REFERENCES coach (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE coach_activite ADD CONSTRAINT FK_C0C94C5F9B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement DROP image');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E264AE1D7 FOREIGN KEY (salle_de_sport_id) REFERENCES salle_de_sport (id)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681EBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE evenement_membre ADD CONSTRAINT FK_45412BABFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement_membre ADD CONSTRAINT FK_45412BAB6A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id) ON DELETE CASCADE');
        $this->addSql('DROP INDEX UNIQ_F6B4FB29FB88E14F ON membre');
        $this->addSql('ALTER TABLE membre CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE membre ADD CONSTRAINT FK_F6B4FB29A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE membre ADD CONSTRAINT FK_F6B4FB29F1D74413 FOREIGN KEY (abonnement_id) REFERENCES abonnement (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F6B4FB29A76ED395 ON membre (user_id)');
        $this->addSql('ALTER TABLE nutritionniste CHANGE disponibilite disponibilite VARCHAR(255) DEFAULT NULL, CHANGE conseil tel VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE nutritionniste_salle_de_sport ADD CONSTRAINT FK_D2618339279DA68A FOREIGN KEY (nutritionniste_id) REFERENCES nutritionniste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nutritionniste_salle_de_sport ADD CONSTRAINT FK_D2618339264AE1D7 FOREIGN KEY (salle_de_sport_id) REFERENCES salle_de_sport (id) ON DELETE CASCADE');
        $this->addSql('DROP INDEX UNIQ_D533E789FB88E14F ON salle_de_sport');
        $this->addSql('ALTER TABLE salle_de_sport CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salle_de_sport ADD CONSTRAINT FK_D533E789A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D533E789A76ED395 ON salle_de_sport (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE membre DROP FOREIGN KEY FK_F6B4FB29A76ED395');
        $this->addSql('ALTER TABLE salle_de_sport DROP FOREIGN KEY FK_D533E789A76ED395');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, id_user VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, lattitude INT NOT NULL, longitude INT NOT NULL, attribute VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_1D1C63B3E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE abonnement_salle_de_sport DROP FOREIGN KEY FK_B2CB8E08F1D74413');
        $this->addSql('ALTER TABLE abonnement_salle_de_sport DROP FOREIGN KEY FK_B2CB8E08264AE1D7');
        $this->addSql('ALTER TABLE activite_salle_de_sport DROP FOREIGN KEY FK_83EDEBF9B0F88B1');
        $this->addSql('ALTER TABLE activite_salle_de_sport DROP FOREIGN KEY FK_83EDEBF264AE1D7');
        $this->addSql('ALTER TABLE coach DROP FOREIGN KEY FK_3F596DCC2195E0F0');
        $this->addSql('ALTER TABLE coach_activite DROP FOREIGN KEY FK_C0C94C5F3C105691');
        $this->addSql('ALTER TABLE coach_activite DROP FOREIGN KEY FK_C0C94C5F9B0F88B1');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E264AE1D7');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681EBCF5E72D');
        $this->addSql('ALTER TABLE evenement ADD image VARBINARY(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE evenement_membre DROP FOREIGN KEY FK_45412BABFD02F13');
        $this->addSql('ALTER TABLE evenement_membre DROP FOREIGN KEY FK_45412BAB6A99F74A');
        $this->addSql('ALTER TABLE membre DROP FOREIGN KEY FK_F6B4FB29F1D74413');
        $this->addSql('DROP INDEX UNIQ_F6B4FB29A76ED395 ON membre');
        $this->addSql('ALTER TABLE membre CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F6B4FB29FB88E14F ON membre (user_id)');
        $this->addSql('ALTER TABLE nutritionniste CHANGE disponibilite disponibilite TINYINT(1) DEFAULT NULL, CHANGE tel conseil VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE nutritionniste_salle_de_sport DROP FOREIGN KEY FK_D2618339279DA68A');
        $this->addSql('ALTER TABLE nutritionniste_salle_de_sport DROP FOREIGN KEY FK_D2618339264AE1D7');
        $this->addSql('DROP INDEX UNIQ_D533E789A76ED395 ON salle_de_sport');
        $this->addSql('ALTER TABLE salle_de_sport CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D533E789FB88E14F ON salle_de_sport (user_id)');
    }
}
