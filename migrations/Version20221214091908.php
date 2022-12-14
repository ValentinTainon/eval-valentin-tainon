<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221214091908 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE computer_list_by_user (id INT AUTO_INCREMENT NOT NULL, computer_fav_id INT DEFAULT NULL, user_fav_id INT DEFAULT NULL, INDEX IDX_4C0E1605C32C6DA5 (computer_fav_id), INDEX IDX_4C0E1605793BEB46 (user_fav_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE computer_list_by_user ADD CONSTRAINT FK_4C0E1605C32C6DA5 FOREIGN KEY (computer_fav_id) REFERENCES computer (id)');
        $this->addSql('ALTER TABLE computer_list_by_user ADD CONSTRAINT FK_4C0E1605793BEB46 FOREIGN KEY (user_fav_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE computer_list_by_user DROP FOREIGN KEY FK_4C0E1605C32C6DA5');
        $this->addSql('ALTER TABLE computer_list_by_user DROP FOREIGN KEY FK_4C0E1605793BEB46');
        $this->addSql('DROP TABLE computer_list_by_user');
    }
}
