<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200819120509 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agency_state DROP FOREIGN KEY FK_AD5F5DD55D83CC1');
        $this->addSql('ALTER TABLE agency_state DROP FOREIGN KEY FK_AD5F5DD5CDEADB2A');
        $this->addSql('ALTER TABLE agency_state ADD CONSTRAINT FK_AD5F5DD55D83CC1 FOREIGN KEY (state_id) REFERENCES state (id)');
        $this->addSql('ALTER TABLE agency_state ADD CONSTRAINT FK_AD5F5DD5CDEADB2A FOREIGN KEY (agency_id) REFERENCES agency (id)');
        $this->addSql('ALTER TABLE compteepsx CHANGE hostAgency hostAgency INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compteepsx_etats DROP FOREIGN KEY FK_9BEDB8E05D83CC1');
        $this->addSql('ALTER TABLE compteepsx_etats DROP FOREIGN KEY FK_9BEDB8E0E5930107');
        $this->addSql('ALTER TABLE compteepsx_etats ADD CONSTRAINT FK_D4B0BB30E5930107 FOREIGN KEY (compteepsx_id) REFERENCES compteepsx (id)');
        $this->addSql('ALTER TABLE compteepsx_etats ADD CONSTRAINT FK_D4B0BB305D83CC1 FOREIGN KEY (state_id) REFERENCES state (id)');
        $this->addSql('ALTER TABLE compteepsx_etats RENAME INDEX idx_9bedb8e0e5930107 TO IDX_D4B0BB30E5930107');
        $this->addSql('ALTER TABLE compteepsx_etats RENAME INDEX idx_9bedb8e05d83cc1 TO IDX_D4B0BB305D83CC1');
        $this->addSql('ALTER TABLE employee CHANGE agencyhost agencyhost INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profile_state DROP FOREIGN KEY FK_54474D295D83CC1');
        $this->addSql('ALTER TABLE profile_state DROP FOREIGN KEY FK_54474D29CCFA12B8');
        $this->addSql('ALTER TABLE profile_state ADD CONSTRAINT FK_54474D295D83CC1 FOREIGN KEY (state_id) REFERENCES state (id)');
        $this->addSql('ALTER TABLE profile_state ADD CONSTRAINT FK_54474D29CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE user_state DROP FOREIGN KEY FK_415129A35D83CC1');
        $this->addSql('ALTER TABLE user_state DROP FOREIGN KEY FK_415129A3A76ED395');
        $this->addSql('ALTER TABLE user_state ADD CONSTRAINT FK_415129A35D83CC1 FOREIGN KEY (state_id) REFERENCES state (id)');
        $this->addSql('ALTER TABLE user_state ADD CONSTRAINT FK_415129A3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agency_state DROP FOREIGN KEY FK_AD5F5DD5CDEADB2A');
        $this->addSql('ALTER TABLE agency_state DROP FOREIGN KEY FK_AD5F5DD55D83CC1');
        $this->addSql('ALTER TABLE agency_state ADD CONSTRAINT FK_AD5F5DD5CDEADB2A FOREIGN KEY (agency_id) REFERENCES agency (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agency_state ADD CONSTRAINT FK_AD5F5DD55D83CC1 FOREIGN KEY (state_id) REFERENCES state (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compteepsx CHANGE hostAgency hostAgency INT NOT NULL');
        $this->addSql('ALTER TABLE compteepsx_etats DROP FOREIGN KEY FK_D4B0BB30E5930107');
        $this->addSql('ALTER TABLE compteepsx_etats DROP FOREIGN KEY FK_D4B0BB305D83CC1');
        $this->addSql('ALTER TABLE compteepsx_etats ADD CONSTRAINT FK_9BEDB8E05D83CC1 FOREIGN KEY (state_id) REFERENCES state (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compteepsx_etats ADD CONSTRAINT FK_9BEDB8E0E5930107 FOREIGN KEY (compteepsx_id) REFERENCES compteepsx (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE compteepsx_etats RENAME INDEX idx_d4b0bb30e5930107 TO IDX_9BEDB8E0E5930107');
        $this->addSql('ALTER TABLE compteepsx_etats RENAME INDEX idx_d4b0bb305d83cc1 TO IDX_9BEDB8E05D83CC1');
        $this->addSql('ALTER TABLE employee CHANGE agencyhost agencyhost INT NOT NULL');
        $this->addSql('ALTER TABLE profile_state DROP FOREIGN KEY FK_54474D29CCFA12B8');
        $this->addSql('ALTER TABLE profile_state DROP FOREIGN KEY FK_54474D295D83CC1');
        $this->addSql('ALTER TABLE profile_state ADD CONSTRAINT FK_54474D29CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profile_state ADD CONSTRAINT FK_54474D295D83CC1 FOREIGN KEY (state_id) REFERENCES state (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_state DROP FOREIGN KEY FK_415129A3A76ED395');
        $this->addSql('ALTER TABLE user_state DROP FOREIGN KEY FK_415129A35D83CC1');
        $this->addSql('ALTER TABLE user_state ADD CONSTRAINT FK_415129A3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_state ADD CONSTRAINT FK_415129A35D83CC1 FOREIGN KEY (state_id) REFERENCES state (id) ON DELETE CASCADE');
    }
}
