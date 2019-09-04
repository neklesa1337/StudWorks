<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190904144653 extends AbstractMigration
{
    const TABLE_NAME = 'order_comment';

    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $table = $schema->createTable(self::TABLE_NAME);
        $table->addColumn('id', 'integer', [
            'autoincrement' => true,
        ]);
        $table->addColumn('description', 'text');
        $table->addColumn('is_admin', 'boolean');

        $table->addColumn(
            'updated',
            'datetime',
            ['columnDefinition' => 'timestamp default current_timestamp on update current_timestamp']
        );

        $table->addColumn(
            'created',
            'datetime',
            ['columnDefinition' => 'timestamp default current_timestamp']
        );

        $table->addColumn("user_id", "integer");
        $table->addForeignKeyConstraint(
            'user',
            ['user_id'],
            ['id']
        );

        $table->addColumn("order_id", "integer");
        $table->addForeignKeyConstraint(
            'stud_order',
            ['order_id'],
            ['id']
        );

        $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $schema->dropTable(self::TABLE_NAME);
    }
}
