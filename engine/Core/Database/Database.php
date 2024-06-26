<?php
declare(strict_types=1);

namespace Engine\Core\Database;

use Engine\Utils\VarDumper\VarDumper;
use PDO;
use PDOException;
use PDOStatement;

final class Database
{
    private static Database|null $instance = null;
    private PDO $conn;

    private function __construct()
    {
        if(file_exists('./db-config.php')){
            require_once './db-config.php';
        }
        else {
            require_once '../db-config.php';

        }
        try {
            $dsn = "mysql:host=" . DB_HOST . ";" . "dbname=" . DB_NAME;
            $this->conn = new PDO(
                $dsn,
                DB_USERNAME,
                DB_PASSWORD
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            VarDumper::dump(
                'danger',
                "Connection failed {$e->getMessage()}",
                __FILE__,
                __LINE__
            );
        }

    }

    /**
     * @return Database|null
     */
    public static function dbInst(): ?Database
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @return PDO
     */
    public function getConn(): PDO
    {
        return $this->conn;
    }

    /**
     * @param string $sql
     * @param array $prepared_params
     * @return bool|PDOStatement
     */
    public function execute(string $sql, array $prepared_params): bool|PDOStatement
    {
        try {
            
            return $this->getConn()->prepare($sql)->execute($prepared_params);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * @param string $sql
     * @param string $mode single | ''
     * @return mixed
     */
    public function query(string $sql, ?string $mode = null): mixed
    {
        try {
            $stm = $this->getConn()->query($sql);
            
            return $mode === 'single' ? $stm->fetch() : $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }

    }


}