<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190926084401 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lesson CHANGE video video VARCHAR(255) DEFAULT NULL, CHANGE t1 t1 VARCHAR(255) DEFAULT NULL, CHANGE t2 t2 VARCHAR(255) DEFAULT NULL, CHANGE t3 t3 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD picture VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE result_evaluate CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE res_total res_total INT DEFAULT NULL, CHANGE res1 res1 INT DEFAULT NULL, CHANGE res2 res2 INT DEFAULT NULL, CHANGE res3 res3 INT DEFAULT NULL, CHANGE res4 res4 INT DEFAULT NULL, CHANGE res5 res5 INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE role role JSON NOT NULL, CHANGE reset_token reset_token VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE userlesson CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE id_lesson_id id_lesson_id INT DEFAULT NULL, CHANGE state state VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lesson CHANGE video video VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE t1 t1 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE t2 t2 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE t3 t3 VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE question DROP picture');
        $this->addSql('ALTER TABLE result_evaluate CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE res_total res_total INT DEFAULT NULL, CHANGE res1 res1 INT DEFAULT NULL, CHANGE res2 res2 INT DEFAULT NULL, CHANGE res3 res3 INT DEFAULT NULL, CHANGE res4 res4 INT DEFAULT NULL, CHANGE res5 res5 INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE role role LONGTEXT NOT NULL COLLATE utf8mb4_bin, CHANGE reset_token reset_token VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE userlesson CHANGE id_user_id id_user_id INT DEFAULT NULL, CHANGE id_lesson_id id_lesson_id INT DEFAULT NULL, CHANGE state state VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
