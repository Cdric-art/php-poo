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

    public function query(string $sql, array $param = null, bool $single = null)
    {
        $method = empty($param) ? 'query' : 'prepare';

        if (strpos($sql, 'DELETE') === 0 || strpos($sql, 'UPDATE') === 0 || strpos($sql, 'INSERT') === 0) {
            $stmt = $this->db->getPDO()->$method($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            return $stmt->execute($param);
        }

        $fetch = is_null($single) ? 'fetchAll' : 'fetch';

        $stmt = $this->db->getPDO()->$method($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if ($method === 'query') {
            return $stmt->$fetch();
        } else {
            $stmt->execute($param);
            return $stmt->$fetch();
        }
    }

    public function all(): array
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
    }

    public function findById(int $id): Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }

    public function update(int $id, array $data, ?array $relation = null): Bool
    {
        $sqlPrep = "";
        $i = 1;

        foreach ($data as $key => $value) {
            $comma = $i === count($data) ? ' ' : ', ';
            $sqlPrep .= "{$key} = :{$key}{$comma}";
            $i++;
        }

        $data['id'] = $id;

        return $this->query("UPDATE {$this->table} SET {$sqlPrep} WHERE id =:id", $data);
    }

    public function destroy(int $id): bool
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }

}
