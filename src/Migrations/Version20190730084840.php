<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190730084840 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE depot (id INT AUTO_INCREMENT NOT NULL, comptb_id INT DEFAULT NULL, montant BIGINT NOT NULL, date_depot DATETIME NOT NULL, INDEX IDX_47948BBC6F125E99 (comptb_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE depot ADD CONSTRAINT FK_47948BBC6F125E99 FOREIGN KEY (comptb_id) REFERENCES compte_bancaire (id)');
        $this->addSql('ALTER TABLE compte_bancaire DROP date_depot');
        $this->addSql('ALTER TABLE user CHANGE adresse adresse VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE depot');
        $this->addSql('ALTER TABLE compte_bancaire ADD date_depot DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE adresse adresse VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
