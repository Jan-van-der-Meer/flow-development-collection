<?php
namespace Neos\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Platforms\PostgreSQLPlatform;
use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Adjust failedauthenticationcount default value.
 */
class Version20160601164333 extends AbstractMigration
{

    /**
     * @param Schema $schema
     * @return void
     */
    public function up(Schema $schema): void
    {
        $this->abortIf(!($this->connection->getDatabasePlatform() instanceof PostgreSQLPlatform), 'Migration can only be executed safely on "postgresql".');

        $this->addSql('ALTER TABLE typo3_flow_security_account ALTER failedauthenticationcount DROP DEFAULT');
    }

    /**
     * @param Schema $schema
     * @return void
     */
    public function down(Schema $schema): void
    {
        $this->abortIf(!($this->connection->getDatabasePlatform() instanceof PostgreSQLPlatform), 'Migration can only be executed safely on "postgresql".');

        $this->addSql('ALTER TABLE typo3_flow_security_account ALTER failedauthenticationcount SET DEFAULT 0');
    }
}
