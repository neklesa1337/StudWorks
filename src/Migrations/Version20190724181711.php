<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190724181711 extends AbstractMigration
{
    const TABLE_NAME = 'stud_order';

    public function getDescription() : string
    {
        return 'Create order table';
    }

    public function up(Schema $schema) : void
    {
        $table = $schema->createTable(self::TABLE_NAME);
        $table->addColumn('id', 'integer', [
            'autoincrement' => true,
        ]);
        $table->addColumn('status', 'integer');
        $table->addColumn('description', 'text');
        $table->addColumn('file', 'string', [
            'notnull' => false,
            'length' => 512
        ]);

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
        $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema) : void
    {
        $schema->dropTable(self::TABLE_NAME);
    }
}
