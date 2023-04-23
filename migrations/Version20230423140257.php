<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230423140257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE file ADD creator_id INT NOT NULL');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F361061220EA6 FOREIGN KEY (creator_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8C9F361061220EA6 ON file (creator_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F361061220EA6');
        $this->addSql('DROP INDEX UNIQ_8C9F361061220EA6 ON file');
        $this->addSql('ALTER TABLE file DROP creator_id');
    }
}
