<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190730195432 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add performer relation';
    }

    public function up(Schema $schema) : void
    {
        $table = $schema->getTable('stud_order');
        $table->addColumn("performer_id", "integer", [
            'notnull' => false
        ]);
        $table->addForeignKeyConstraint(
            'user',
            ['performer_id'],
            ['id']
        );
    }

    public function down(Schema $schema) : void
    {
        $schema->getTable('stud_order')->dropColumn('performer_id');
    }
}
