<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200115085220 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user ADD ss_number VARCHAR(255) DEFAULT NULL, ADD hiring_date DATE DEFAULT NULL, ADD me_date DATE DEFAULT NULL, ADD coastal_licence VARCHAR(255) DEFAULT NULL, ADD bees VARCHAR(255) DEFAULT NULL, ADD contract_type VARCHAR(255) NOT NULL, CHANGE username status VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user ADD username VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP ss_number, DROP hiring_date, DROP me_date, DROP status, DROP coastal_licence, DROP bees, DROP contract_type');
    }
}