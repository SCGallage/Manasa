<?php

namespace core\sessions;

use core\Application;
use SessionHandlerInterface;

class SessionManagement implements SessionHandlerInterface
{

    private static SessionManagement $management;
    private \PDO $pdo;

    public function __construct($pdo)
    {
        self::$management = $this;
        session_set_save_handler(self::$management);
        $this->pdo = $pdo;
        $this->check_session_table();
    }

    public function check_session_table()
    {
        $results = $this->pdo->query("SHOW TABLES LIKE 'sessions'");

        if ($results->rowCount() === 0) {
            $this->pdo->exec("CREATE TABLE `sessions` (
                  `id` varchar(32) NOT NULL,
                  `access` int NOT NULL,
                  `data` text,
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci"
            );
        }
    }

    /**
     * @inheritDoc
     */
    public function close()
    {
        // TODO: Implement close() method.
        //DatabaseCon::destroy();
        return true;
    }

    /**
     * @inheritDoc
     */
    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        /*$sql = "DELETE FROM sessions WHERE id = '$id'";
        $this->pdo->exec($sql);*/
        echo 'Hello';
        Application::$app->databaseService->delete(
            'sessions',
            [ 'id' => $id ]);
        return true;
    }

    /**
     * @inheritDoc
     */
    public function gc($max_lifetime)
    {
        // TODO: Implement gc() method.
        $time = time() - $max_lifetime;
        $sql = "DELETE FROM sessions WHERE access > $time";
        $this->pdo->exec($sql);
        return true;
    }

    /**
     * @inheritDoc
     */
    public function open($path, $name)
    {
        // TODO: Implement open() method.
        return true;
    }

    /**
     * @inheritDoc
     */
    public function read($id) : string
    {
        // TODO: Implement read() method.
        $sql = "SELECT `data` FROM sessions WHERE id = '$id'";
        echo $sql;
        $stmt = $this->pdo->query($sql);
        if ($stmt->rowCount() == 1) {
            $result =  $stmt->fetch(\PDO::FETCH_ASSOC);
            //echo gettype($result['id']);
            return $result['data'];
        } else
            return '';
    }

    /**
     * @inheritDoc
     */
    public function write($id, $data)
    {

        $access = time();
        $sql = "REPLACE INTO sessions VALUES ('$id', $access, '$data')";
        if ($this->pdo->exec($sql))
            return true;
        else
            return false;
        // TODO: Implement write() method.
    }

    public static function set_session_data(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get_session_data(string $key)
    {
        return $_SESSION[$key];
    }

    public static function unset_variable(string $key)
    {
        unset($_SESSION[$key]);
    }

}