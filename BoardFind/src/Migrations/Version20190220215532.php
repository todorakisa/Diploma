<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190220215532 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE trade_offer DROP traderemail, DROP tradername, DROP traderlastname, DROP numbertelephone');
        $this->addSql('ALTER TABLE user ADD telephone VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE trade_offer ADD traderemail VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD tradername VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD traderlastname VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD numbertelephone VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user DROP telephone');
    }
}
