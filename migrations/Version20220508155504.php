<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220508155504 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE worker ADD post_worker_id INT NOT NULL');
        $this->addSql('ALTER TABLE worker ADD CONSTRAINT FK_9FB2BF62CA4EC4C1 FOREIGN KEY (post_worker_id) REFERENCES post_worker (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9FB2BF62CA4EC4C1 ON worker (post_worker_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE worker DROP CONSTRAINT FK_9FB2BF62CA4EC4C1');
        $this->addSql('DROP INDEX IDX_9FB2BF62CA4EC4C1');
        $this->addSql('ALTER TABLE worker DROP post_worker_id');
    }
}
