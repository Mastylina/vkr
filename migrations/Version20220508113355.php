<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220508113355 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE post_worker_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE service_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE post_worker (id INT NOT NULL, name VARCHAR(60) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE service (id INT NOT NULL, name VARCHAR(100) NOT NULL, price DOUBLE PRECISION NOT NULL, execution_time TIME(0) WITHOUT TIME ZONE NOT NULL, photo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE "user" ADD number_phone VARCHAR(12) NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD birthdate DATE NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD surname VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD name VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD patronymic VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE worker ADD post_worker_id INT NOT NULL');
        $this->addSql('ALTER TABLE worker ADD CONSTRAINT FK_9FB2BF62CA4EC4C1 FOREIGN KEY (post_worker_id) REFERENCES post_worker (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9FB2BF62CA4EC4C1 ON worker (post_worker_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE worker DROP CONSTRAINT FK_9FB2BF62CA4EC4C1');
        $this->addSql('DROP SEQUENCE post_worker_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE service_id_seq CASCADE');
        $this->addSql('DROP TABLE post_worker');
        $this->addSql('DROP TABLE service');
        $this->addSql('ALTER TABLE "user" DROP number_phone');
        $this->addSql('ALTER TABLE "user" DROP birthdate');
        $this->addSql('ALTER TABLE "user" DROP surname');
        $this->addSql('ALTER TABLE "user" DROP name');
        $this->addSql('ALTER TABLE "user" DROP patronymic');
        $this->addSql('DROP INDEX IDX_9FB2BF62CA4EC4C1');
        $this->addSql('ALTER TABLE worker DROP post_worker_id');
    }
}
