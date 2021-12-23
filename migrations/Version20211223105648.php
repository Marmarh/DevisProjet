<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211223105648 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE operation_service (id INT AUTO_INCREMENT NOT NULL, operation_id INT DEFAULT NULL, services_id INT DEFAULT NULL, tarif DOUBLE PRECISION NOT NULL, range_min DOUBLE PRECISION NOT NULL, range_max DOUBLE PRECISION NOT NULL, INDEX IDX_425C1A1F44AC3583 (operation_id), INDEX IDX_425C1A1FAEF5A6C1 (services_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE operation_service ADD CONSTRAINT FK_425C1A1F44AC3583 FOREIGN KEY (operation_id) REFERENCES operation (id)');
        $this->addSql('ALTER TABLE operation_service ADD CONSTRAINT FK_425C1A1FAEF5A6C1 FOREIGN KEY (services_id) REFERENCES services (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE operation_service');
    }
}
