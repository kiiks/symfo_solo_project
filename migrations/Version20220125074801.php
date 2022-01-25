<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220125074801 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE game_category (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE review (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, video_game_id INTEGER DEFAULT NULL, rate INTEGER NOT NULL, publish_date DATE DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_794381C616230A8 ON review (video_game_id)');
        $this->addSql('CREATE TABLE video_game (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(100) NOT NULL, launch_date DATE NOT NULL, studio VARCHAR(150) NOT NULL, editor VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE video_game_game_category (video_game_id INTEGER NOT NULL, game_category_id INTEGER NOT NULL, PRIMARY KEY(video_game_id, game_category_id))');
        $this->addSql('CREATE INDEX IDX_F6BBE6C116230A8 ON video_game_game_category (video_game_id)');
        $this->addSql('CREATE INDEX IDX_F6BBE6C1CC13DFE0 ON video_game_game_category (game_category_id)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE game_category');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE video_game');
        $this->addSql('DROP TABLE video_game_game_category');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('DROP TABLE customer');
    }
}
