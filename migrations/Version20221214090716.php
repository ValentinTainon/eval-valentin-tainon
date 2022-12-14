<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221214090716 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE computer ADD marque_id INT DEFAULT NULL, ADD img VARCHAR(255) NOT NULL, ADD is_visible TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE computer ADD CONSTRAINT FK_A298A7A64827B9B2 FOREIGN KEY (marque_id) REFERENCES brand (id)');
        $this->addSql('CREATE INDEX IDX_A298A7A64827B9B2 ON computer (marque_id)');
        $this->addSql('ALTER TABLE user ADD computer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A426D518 FOREIGN KEY (computer_id) REFERENCES computer (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649A426D518 ON user (computer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE computer DROP FOREIGN KEY FK_A298A7A64827B9B2');
        $this->addSql('DROP INDEX IDX_A298A7A64827B9B2 ON computer');
        $this->addSql('ALTER TABLE computer DROP marque_id, DROP img, DROP is_visible');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A426D518');
        $this->addSql('DROP INDEX IDX_8D93D649A426D518 ON user');
        $this->addSql('ALTER TABLE user DROP computer_id');
    }
}
