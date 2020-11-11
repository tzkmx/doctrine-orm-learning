<?php

namespace App\Service;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DatabaseFactory
{
    /**
     * Create a doctrine entity manager.
     *
     * @return EntityManager
     */
    public static function create()
    {
        $isDevMode = true;
        $metadata = Setup::createAnnotationMetadataConfiguration([__DIR__ . '/../Entity'], $isDevMode);

        $dbParams = [
            'driver'   => 'pdo_mysql',
            'host'     => $_ENV['DB_HOST'] ?? '127.0.0.1',
            'port'     => $_ENV['DB_PORT'] ?? 3306,
            'user'     => $_ENV['DB_USER'] ?? 'student',
            'password' => $_ENV['DB_PASS'] ?? 'change-this-password',
            'dbname'   => $_ENV['DB_USER'] ?? 'doctrine-learning',
            'charset'  => 'utf8'
        ];

        /*$dbParams = [
            'driver'   => 'pdo_sqlite',
            'path'     => __DIR__ . '/../../database.sqlite'
        ];*/

        // obtaining the entity manager
        return EntityManager::create($dbParams, $metadata);
    }
}
