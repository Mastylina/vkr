<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220508154926 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE service_worker (service_id INT NOT NULL, worker_id INT NOT NULL, PRIMARY KEY(service_id, worker_id))');
        $this->addSql('CREATE INDEX IDX_A175BA54ED5CA9E6 ON service_worker (service_id)');
        $this->addSql('CREATE INDEX IDX_A175BA546B20BA36 ON service_worker (worker_id)');
        $this->addSql('ALTER TABLE service_worker ADD CONSTRAINT FK_A175BA54ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE service_worker ADD CONSTRAINT FK_A175BA546B20BA36 FOREIGN KEY (worker_id) REFERENCES worker (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE service_worker');
    }
}
