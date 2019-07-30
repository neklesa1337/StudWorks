<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190730172855 extends AbstractMigration
{
    const TABLE_NAME = 'stud_order_log';

    public function getDescription() : string
    {
        return 'Create stud_order_log table';
    }

    public function up(Schema $schema) : void
    {
        $table = $schema->createTable(self::TABLE_NAME);
        $table->addColumn('id', 'integer', [
            'autoincrement' => true,
        ]);
        $table->addColumn('description', 'text');

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
        $schema->dropTable(self::TABLE_NAME);
    }
}
