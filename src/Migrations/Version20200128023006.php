<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200128023006 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE room_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE thank_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE want_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE room (id INT NOT NULL, uid VARCHAR(255) NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, uid VARCHAR(255) NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE user_room (user_id INT NOT NULL, room_id INT NOT NULL, PRIMARY KEY(user_id, room_id))');
        $this->addSql('CREATE INDEX IDX_81E1D52A76ED395 ON user_room (user_id)');
        $this->addSql('CREATE INDEX IDX_81E1D5254177093 ON user_room (room_id)');
        $this->addSql('CREATE TABLE thank (id INT NOT NULL, text VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE want (id INT NOT NULL, name VARCHAR(255) NOT NULL, about_price INT DEFAULT NULL, purchase_status BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE user_room ADD CONSTRAINT FK_81E1D52A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_room ADD CONSTRAINT FK_81E1D5254177093 FOREIGN KEY (room_id) REFERENCES room (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE user_room DROP CONSTRAINT FK_81E1D5254177093');
        $this->addSql('ALTER TABLE user_room DROP CONSTRAINT FK_81E1D52A76ED395');
        $this->addSql('DROP SEQUENCE room_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE thank_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE want_id_seq CASCADE');
        $this->addSql('DROP TABLE room');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE user_room');
        $this->addSql('DROP TABLE thank');
        $this->addSql('DROP TABLE want');
    }
}
