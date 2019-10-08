<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190925114906 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE result_evaluate (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, res_total INT DEFAULT NULL, res1 INT DEFAULT NULL, res2 INT DEFAULT NULL, res3 INT DEFAULT NULL, res4 INT DEFAULT NULL, res5 INT DEFAULT NULL, INDEX IDX_2981156B79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE result_evaluate ADD CONSTRAINT FK_2981156B79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE lesson CHANGE video video VARCHAR(255) DEFAULT NULL, CHANGE t1 t1 VARCHAR(255) DEFAULT NULL, CHANGE t2 t2 VARCHAR(255) DEFAULT NULL, CHANGE t3 t3 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE role role JSON NOT NULL, CHANGE reset_token reset_token VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE userlesson CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE id_lesson_id id_lesson_id INT DEFAULT NULL, CHANGE state state VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE result_evaluate');
        $this->addSql('ALTER TABLE lesson CHANGE video video VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE t1 t1 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE t2 t2 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE t3 t3 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user CHANGE role role LONGTEXT NOT NULL COLLATE utf8mb4_bin, CHANGE reset_token reset_token VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE userlesson CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE id_lesson_id id_lesson_id INT DEFAULT NULL, CHANGE state state VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
