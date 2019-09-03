<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190902200303 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE order_file (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, stud_order_id INT NOT NULL, path VARCHAR(512) NOT NULL, status INT NOT NULL, is_customer_file TINYINT(1) NOT NULL, updated timestamp default CURRENT_TIMESTAMP not null on update CURRENT_TIMESTAMP, created timestamp default CURRENT_TIMESTAMP not null, INDEX IDX_C16E0C07A76ED395 (user_id), INDEX IDX_C16E0C073D298A0E (stud_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE order_file');
    }
}
