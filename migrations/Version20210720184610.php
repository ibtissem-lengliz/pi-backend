<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210720184610 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE membre DROP FOREIGN KEY FK_F6B4FB29FB88E14F');
        $this->addSql('ALTER TABLE salle_de_sport DROP FOREIGN KEY FK_D533E789FB88E14F');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX UNIQ_F6B4FB29FB88E14F ON membre');
        $this->addSql('ALTER TABLE membre ADD prenom VARCHAR(255) NOT NULL, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE membre ADD CONSTRAINT FK_F6B4FB29A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F6B4FB29A76ED395 ON membre (user_id)');
        $this->addSql('DROP INDEX UNIQ_D533E789FB88E14F ON salle_de_sport');
        $this->addSql('ALTER TABLE salle_de_sport CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salle_de_sport ADD CONSTRAINT FK_D533E789A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D533E789A76ED395 ON salle_de_sport (user_id)');
        $this->addSql('ALTER TABLE user CHANGE id id INT AUTO_INCREMENT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, id_user VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, motdepasse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, lattitude INT NOT NULL, longitude INT NOT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, type_user VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE membre DROP FOREIGN KEY FK_F6B4FB29A76ED395');
        $this->addSql('DROP INDEX UNIQ_F6B4FB29A76ED395 ON membre');
        $this->addSql('ALTER TABLE membre DROP prenom, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE membre ADD CONSTRAINT FK_F6B4FB29FB88E14F FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F6B4FB29FB88E14F ON membre (user_id)');
        $this->addSql('ALTER TABLE salle_de_sport DROP FOREIGN KEY FK_D533E789A76ED395');
        $this->addSql('DROP INDEX UNIQ_D533E789A76ED395 ON salle_de_sport');
        $this->addSql('ALTER TABLE salle_de_sport CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salle_de_sport ADD CONSTRAINT FK_D533E789FB88E14F FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D533E789FB88E14F ON salle_de_sport (user_id)');
        $this->addSql('ALTER TABLE user CHANGE id id INT NOT NULL');
    }
}