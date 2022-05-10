<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220510121726 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation ADD service_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD client_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD date_reservation DATE NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD start_time TIME(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD end_time TIME(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD checked BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_42C84955ED5CA9E6 ON reservation (service_id)');
        $this->addSql('CREATE INDEX IDX_42C8495519EB6921 ON reservation (client_id)');
        $this->addSql('ALTER TABLE service_worker ADD PRIMARY KEY (service_id, worker_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX "primary"');
        $this->addSql('ALTER TABLE reservation DROP CONSTRAINT FK_42C84955ED5CA9E6');
        $this->addSql('ALTER TABLE reservation DROP CONSTRAINT FK_42C8495519EB6921');
        $this->addSql('DROP INDEX IDX_42C84955ED5CA9E6');
        $this->addSql('DROP INDEX IDX_42C8495519EB6921');
        $this->addSql('ALTER TABLE reservation DROP service_id');
        $this->addSql('ALTER TABLE reservation DROP client_id');
        $this->addSql('ALTER TABLE reservation DROP date_reservation');
        $this->addSql('ALTER TABLE reservation DROP start_time');
        $this->addSql('ALTER TABLE reservation DROP end_time');
        $this->addSql('ALTER TABLE reservation DROP checked');
    }
}
