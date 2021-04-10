<?php


namespace App\Models;


class Tags extends Model
{
    protected string $table = 'tags';

    public function getPosts(): array
    {
        return $this->query("
            SELECT p.* FROM posts p
            INNER JOIN post_tag pt on p.id = pt.post_id
            WHERE pt.tag_id = ?
        ", [$this->id]);
    }
}
