<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190924083630 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE userlesson (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, id_lesson_id INT DEFAULT NULL, INDEX IDX_908E633779F37AE5 (id_user_id), INDEX IDX_908E63374DCDBDB1 (id_lesson_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE userlesson ADD CONSTRAINT FK_908E633779F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE userlesson ADD CONSTRAINT FK_908E63374DCDBDB1 FOREIGN KEY (id_lesson_id) REFERENCES lesson (id)');
        $this->addSql('ALTER TABLE lesson CHANGE video video VARCHAR(255) DEFAULT NULL, CHANGE t1 t1 VARCHAR(255) DEFAULT NULL, CHANGE t2 t2 VARCHAR(255) DEFAULT NULL, CHANGE t3 t3 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE role role JSON NOT NULL, CHANGE reset_token reset_token VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE userlesson');
        $this->addSql('ALTER TABLE lesson CHANGE video video VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE t1 t1 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE t2 t2 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE t3 t3 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user CHANGE role role LONGTEXT NOT NULL COLLATE utf8mb4_bin, CHANGE reset_token reset_token VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
