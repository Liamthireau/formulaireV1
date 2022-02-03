<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220203103615 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agents (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email LONGTEXT NOT NULL, telephone LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE collectivites (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, email LONGTEXT NOT NULL, siret LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE collectivites_agents (collectivites_id INT NOT NULL, agents_id INT NOT NULL, INDEX IDX_AF45F0EFBBA4558 (collectivites_id), INDEX IDX_AF45F0E709770DC (agents_id), PRIMARY KEY(collectivites_id, agents_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE extranets (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE extranets_agents (extranets_id INT NOT NULL, agents_id INT NOT NULL, INDEX IDX_B7DF3D2ADD1BFC5B (extranets_id), INDEX IDX_B7DF3D2A709770DC (agents_id), PRIMARY KEY(extranets_id, agents_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE collectivites_agents ADD CONSTRAINT FK_AF45F0EFBBA4558 FOREIGN KEY (collectivites_id) REFERENCES collectivites (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE collectivites_agents ADD CONSTRAINT FK_AF45F0E709770DC FOREIGN KEY (agents_id) REFERENCES agents (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE extranets_agents ADD CONSTRAINT FK_B7DF3D2ADD1BFC5B FOREIGN KEY (extranets_id) REFERENCES extranets (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE extranets_agents ADD CONSTRAINT FK_B7DF3D2A709770DC FOREIGN KEY (agents_id) REFERENCES agents (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE collectivites_agents DROP FOREIGN KEY FK_AF45F0E709770DC');
        $this->addSql('ALTER TABLE extranets_agents DROP FOREIGN KEY FK_B7DF3D2A709770DC');
        $this->addSql('ALTER TABLE collectivites_agents DROP FOREIGN KEY FK_AF45F0EFBBA4558');
        $this->addSql('ALTER TABLE extranets_agents DROP FOREIGN KEY FK_B7DF3D2ADD1BFC5B');
        $this->addSql('DROP TABLE agents');
        $this->addSql('DROP TABLE collectivites');
        $this->addSql('DROP TABLE collectivites_agents');
        $this->addSql('DROP TABLE extranets');
        $this->addSql('DROP TABLE extranets_agents');
    }
}
