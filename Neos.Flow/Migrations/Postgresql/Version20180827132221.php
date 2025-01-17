<?php
namespace Neos\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Platforms\PostgreSQLPlatform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Add additional index for neos_flow_mvc_routing_objectpathmapping query speedup
 */
class Version20180827132221 extends AbstractMigration
{

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return 'Add additional index for neos_flow_mvc_routing_objectpathmapping query speedup';
    }

    /**
     * @param Schema $schema
     * @return void
     * @throws \Doctrine\Migrations\Exception\AbortMigration
     */
    public function up(Schema $schema): void
    {
        $this->abortIf(!($this->connection->getDatabasePlatform() instanceof PostgreSQLPlatform), 'Migration can only be executed safely on "postgresql".');

        $this->addSql('CREATE INDEX IDX_535A651E772E836ADCCB5599802C8F9D ON neos_flow_mvc_routing_objectpathmapping (identifier, uripattern, pathsegment)');
    }

    /**
     * @param Schema $schema
     * @return void
     * @throws \Doctrine\Migrations\Exception\AbortMigration
     */
    public function down(Schema $schema): void
    {
        $this->abortIf(!($this->connection->getDatabasePlatform() instanceof PostgreSQLPlatform), 'Migration can only be executed safely on "postgresql".');

        $this->addSql('DROP INDEX IDX_535A651E772E836ADCCB5599802C8F9D');
    }
}
