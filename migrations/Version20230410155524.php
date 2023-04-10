<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230410155524 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actors (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE actors_movies (actors_id INT NOT NULL, movies_id INT NOT NULL, INDEX IDX_B3012DC07168CF59 (actors_id), INDEX IDX_B3012DC053F590A4 (movies_id), PRIMARY KEY(actors_id, movies_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_3AF34668727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories_movies (categories_id INT NOT NULL, movies_id INT NOT NULL, INDEX IDX_CE77D308A21214B7 (categories_id), INDEX IDX_CE77D30853F590A4 (movies_id), PRIMARY KEY(categories_id, movies_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movies (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, poster VARCHAR(255) NOT NULL, release_date DATE NOT NULL, director VARCHAR(255) NOT NULL, productor VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlists (id INT AUTO_INCREMENT NOT NULL, created_by_id INT NOT NULL, name VARCHAR(255) NOT NULL, public TINYINT(1) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_5E06116FB03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlists_movies (playlists_id INT NOT NULL, movies_id INT NOT NULL, INDEX IDX_2ECB6AB09F70CF56 (playlists_id), INDEX IDX_2ECB6AB053F590A4 (movies_id), PRIMARY KEY(playlists_id, movies_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlists_users (playlists_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_79D016AE9F70CF56 (playlists_id), INDEX IDX_79D016AE67B3B43D (users_id), PRIMARY KEY(playlists_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, username VARCHAR(100) NOT NULL, profil_pic VARCHAR(255) DEFAULT \'public\\\\images\\\\profil\\\\default.png\' NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_movies (users_id INT NOT NULL, movies_id INT NOT NULL, INDEX IDX_C9F963A067B3B43D (users_id), INDEX IDX_C9F963A053F590A4 (movies_id), PRIMARY KEY(users_id, movies_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actors_movies ADD CONSTRAINT FK_B3012DC07168CF59 FOREIGN KEY (actors_id) REFERENCES actors (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actors_movies ADD CONSTRAINT FK_B3012DC053F590A4 FOREIGN KEY (movies_id) REFERENCES movies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF34668727ACA70 FOREIGN KEY (parent_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categories_movies ADD CONSTRAINT FK_CE77D308A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categories_movies ADD CONSTRAINT FK_CE77D30853F590A4 FOREIGN KEY (movies_id) REFERENCES movies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlists ADD CONSTRAINT FK_5E06116FB03A8386 FOREIGN KEY (created_by_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE playlists_movies ADD CONSTRAINT FK_2ECB6AB09F70CF56 FOREIGN KEY (playlists_id) REFERENCES playlists (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlists_movies ADD CONSTRAINT FK_2ECB6AB053F590A4 FOREIGN KEY (movies_id) REFERENCES movies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlists_users ADD CONSTRAINT FK_79D016AE9F70CF56 FOREIGN KEY (playlists_id) REFERENCES playlists (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlists_users ADD CONSTRAINT FK_79D016AE67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users_movies ADD CONSTRAINT FK_C9F963A067B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_movies ADD CONSTRAINT FK_C9F963A053F590A4 FOREIGN KEY (movies_id) REFERENCES movies (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actors_movies DROP FOREIGN KEY FK_B3012DC07168CF59');
        $this->addSql('ALTER TABLE actors_movies DROP FOREIGN KEY FK_B3012DC053F590A4');
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF34668727ACA70');
        $this->addSql('ALTER TABLE categories_movies DROP FOREIGN KEY FK_CE77D308A21214B7');
        $this->addSql('ALTER TABLE categories_movies DROP FOREIGN KEY FK_CE77D30853F590A4');
        $this->addSql('ALTER TABLE playlists DROP FOREIGN KEY FK_5E06116FB03A8386');
        $this->addSql('ALTER TABLE playlists_movies DROP FOREIGN KEY FK_2ECB6AB09F70CF56');
        $this->addSql('ALTER TABLE playlists_movies DROP FOREIGN KEY FK_2ECB6AB053F590A4');
        $this->addSql('ALTER TABLE playlists_users DROP FOREIGN KEY FK_79D016AE9F70CF56');
        $this->addSql('ALTER TABLE playlists_users DROP FOREIGN KEY FK_79D016AE67B3B43D');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('ALTER TABLE users_movies DROP FOREIGN KEY FK_C9F963A067B3B43D');
        $this->addSql('ALTER TABLE users_movies DROP FOREIGN KEY FK_C9F963A053F590A4');
        $this->addSql('DROP TABLE actors');
        $this->addSql('DROP TABLE actors_movies');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE categories_movies');
        $this->addSql('DROP TABLE movies');
        $this->addSql('DROP TABLE playlists');
        $this->addSql('DROP TABLE playlists_movies');
        $this->addSql('DROP TABLE playlists_users');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE users_movies');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
