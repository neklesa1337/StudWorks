<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20190722200343 extends AbstractMigration
{
    const TABLE_NAME = 'user';

    public function getDescription() : string
    {
        return 'Create user table';
    }

    public function up(Schema $schema) : void
    {
        $table = $schema->createTable(self::TABLE_NAME);
        $table->addColumn('id', 'integer', [
            'autoincrement' => true,
        ]);
        $table->addColumn('name', 'string');
        $table->addColumn('secondName', 'string');
        $table->addColumn('email', 'string');
        $table->addColumn('password', 'string');
        $table->addColumn('phone', 'string');
        $table->addColumn('roles', 'json');
        $table->addColumn('is_active', 'boolean');

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

        $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema) : void
    {
       $schema->dropTable(self::TABLE_NAME);
    }
}
