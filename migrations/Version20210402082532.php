<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210402082532 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personne ADD email VARCHAR(255) NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD username VARCHAR(25) NOT NULL, ADD is_active TINYINT(1) NOT NULL, DROP mail, DROP mot_de_passe');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FCEC9EFF85E0677 ON personne (username)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_FCEC9EFF85E0677 ON personne');
        $this->addSql('ALTER TABLE personne ADD mail VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD mot_de_passe VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP email, DROP password, DROP username, DROP is_active');
    }
}
