<?php


namespace App\Models;


use Database\DbConnection;
use PDO;

abstract class Model
{

    protected $db;
    protected string $table;

    public function __construct(DbConnection $db)
    {
        $this->db = $db;
    }

    public function query(string $sql, int $param = null, bool $single = null)
    {
        $method = is_null($param) ? 'query' : 'prepare' ;
        $fetch = is_null($single) ? 'fetchAll' : 'fetch' ;

        $stmt = $this->db->getPDO()->$method($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if ($method === 'query') {
            return $stmt->$fetch();
        } else {
            $stmt->execute([$param]);
            return $stmt->$fetch();
        }
    }

    public function all(): array
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
    }

    public function findById(int $id): Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", $id, true);
    }

}
