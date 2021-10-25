<?php

namespace core;

use Dotenv\Dotenv;

class Database{

    public \PDO $pdo;
    public string $name;

    public function __construct(array $config)
    {
        $this->pdo = new \PDO($config['db']['dsn'], $config['db']['user'], $config['db']['password']);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    public function setname($name)
    {
        $this->name = $name;
    }

    public function getname()
    {
        return $this->name;
    }

    public function applyMigration()
    {
        $this->createMigrationTable();
        $appliedMigrations = $this->getAppliedMigration();

        $newMigrations = [];
        $files = scandir(Application::$ROOT_DIR.'/migrations');
        $toApplyMigrations = array_diff($files, $appliedMigrations);
        foreach ($toApplyMigrations as $migration){
            if ($migration === '.' || $migration === '..')
                continue;

            require_once Application::$ROOT_DIR.'/migrations/'.$migration;
            $className = pathinfo($migration, PATHINFO_FILENAME);
            /*echo '<pre>';
            var_dump($className);
            echo '</pre>';*/
            $instance = new $className();
            echo "Applying migration $className".PHP_EOL;
            $instance->up();
            echo "Applied migration $className".PHP_EOL;
            $newMigrations[] = $migration;
        }

        if (!empty($newMigrations)){
            $this->saveMigrations($newMigrations);
        } else{
            echo "All migration are applied";
        }
    }

    public function createMigrationTable()
    {
        $this->pdo->exec(statement: "CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
        )");
    }

    private function getAppliedMigration()
    {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function saveMigrations(array $migrations)
    {
        $str = implode(",", array_map(fn($m) => "('$m')", $migrations));
        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES 
            $str
            ");
        $statement->execute();
    }
}