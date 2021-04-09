<?php


namespace App\Controllers;


use Database\DbConnection;

abstract class Controller
{

    protected $db;

    public function __construct(DbConnection $db)
    {
        $this->db = $db;
    }

    protected function view(string $path, array $params = null): void
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        if ($params) {
            $params = extract($params);
        }
        $content = ob_get_clean();
        require VIEWS . 'layout.php';
    }

    protected function getDb(): DbConnection
    {
        return $this->db;
    }

}
