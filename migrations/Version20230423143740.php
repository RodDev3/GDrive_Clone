<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230423143740 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE space ADD user_id INT DEFAULT NULL, ADD admin_id INT NOT NULL');
        $this->addSql('ALTER TABLE space ADD CONSTRAINT FK_2972C13AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE space ADD CONSTRAINT FK_2972C13A642B8210 FOREIGN KEY (admin_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2972C13AA76ED395 ON space (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2972C13A642B8210 ON space (admin_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE space DROP FOREIGN KEY FK_2972C13AA76ED395');
        $this->addSql('ALTER TABLE space DROP FOREIGN KEY FK_2972C13A642B8210');
        $this->addSql('DROP INDEX UNIQ_2972C13AA76ED395 ON space');
        $this->addSql('DROP INDEX UNIQ_2972C13A642B8210 ON space');
        $this->addSql('ALTER TABLE space DROP user_id, DROP admin_id');
    }
}
