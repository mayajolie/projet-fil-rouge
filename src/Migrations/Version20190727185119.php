<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190727185119 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE compte_bancaire ADD depot_id INT NOT NULL');
        $this->addSql('ALTER TABLE compte_bancaire ADD CONSTRAINT FK_50BC21DE8510D4DE FOREIGN KEY (depot_id) REFERENCES depot (id)');
        $this->addSql('CREATE INDEX IDX_50BC21DE8510D4DE ON compte_bancaire (depot_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE compte_bancaire DROP FOREIGN KEY FK_50BC21DE8510D4DE');
        $this->addSql('DROP INDEX IDX_50BC21DE8510D4DE ON compte_bancaire');
        $this->addSql('ALTER TABLE compte_bancaire DROP depot_id');
    }
}
