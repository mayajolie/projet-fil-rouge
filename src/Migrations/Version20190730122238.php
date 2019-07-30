<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190730122238 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE compte_bancaire DROP FOREIGN KEY FK_50BC21DE8510D4DE');
        $this->addSql('DROP INDEX IDX_50BC21DE8510D4DE ON compte_bancaire');
        $this->addSql('ALTER TABLE compte_bancaire DROP depot_id');
        $this->addSql('ALTER TABLE user ADD id_partenaire_id INT DEFAULT NULL, CHANGE adresse adresse VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64926F6C2C9 FOREIGN KEY (id_partenaire_id) REFERENCES partenaires (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64926F6C2C9 ON user (id_partenaire_id)');
        $this->addSql('ALTER TABLE depot ADD comptb_id INT DEFAULT NULL, CHANGE date_depot date_depot DATETIME NOT NULL');
        $this->addSql('ALTER TABLE depot ADD CONSTRAINT FK_47948BBC6F125E99 FOREIGN KEY (comptb_id) REFERENCES compte_bancaire (id)');
        $this->addSql('CREATE INDEX IDX_47948BBC6F125E99 ON depot (comptb_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE compte_bancaire ADD depot_id INT NOT NULL');
        $this->addSql('ALTER TABLE compte_bancaire ADD CONSTRAINT FK_50BC21DE8510D4DE FOREIGN KEY (depot_id) REFERENCES depot (id)');
        $this->addSql('CREATE INDEX IDX_50BC21DE8510D4DE ON compte_bancaire (depot_id)');
        $this->addSql('ALTER TABLE depot DROP FOREIGN KEY FK_47948BBC6F125E99');
        $this->addSql('DROP INDEX IDX_47948BBC6F125E99 ON depot');
        $this->addSql('ALTER TABLE depot DROP comptb_id, CHANGE date_depot date_depot DATE NOT NULL');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64926F6C2C9');
        $this->addSql('DROP INDEX IDX_8D93D64926F6C2C9 ON user');
        $this->addSql('ALTER TABLE user DROP id_partenaire_id, CHANGE adresse adresse VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
