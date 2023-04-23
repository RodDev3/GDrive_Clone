<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230423144317 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE file ADD space_id INT NOT NULL');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F361023575340 FOREIGN KEY (space_id) REFERENCES space (id)');
        $this->addSql('CREATE INDEX IDX_8C9F361023575340 ON file (space_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F361023575340');
        $this->addSql('DROP INDEX IDX_8C9F361023575340 ON file');
        $this->addSql('ALTER TABLE file DROP space_id');
    }
}
