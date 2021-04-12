<?php

namespace App\Models;

use DateTime;

class Post extends Model
{

    protected string $table = 'posts';

    public function getCreatedAt(): string
    {
        return (new DateTime($this->created_at))->format('d/m/Y à H:i');
    }

    public function getExcerpt(): string
    {
        return substr($this->content, 0, 125) . '...';
    }

    public function getButton(): string
    {
        $html = <<<HTML
        <a rel="stylesheet" href="http://localhost/site_php/posts/$this->id" class="btn btn-primary">Lien vers l'article</a>
        HTML;

        return $html;
    }

    public function getTags()
    {
        return $this->query("
            SELECT t.* FROM tags t
            INNER JOIN post_tag pt on t.id = pt.tag_id
            WHERE pt.post_id = ?
            ", [$this->id]);
    }

    public function create(array $data, ?array $relations = null): bool
    {
        parent::create($data);

        $id = $this->db->getPDO()->lastInsertId();

        foreach ($relations as $tagId) {
            $stmt = $this->db->getPDO()->prepare("INSERT post_tag (post_id, tag_id) VALUES (:post_id, :tag_id)");
            $stmt->execute([
                ':post_id' => $id,
                ':tag_id' => $tagId
            ]);
        }

        return true;
    }

    public function update(int $id, array $data, ?array $relation = null): bool
    {
        parent::update($id, $data);

        $stmt = $this->db->getPDO()->prepare("DELETE FROM post_tag WHERE post_id = :id");
        $result = $stmt->execute([
            ':id' => $id
        ]);

        foreach ($relation as $tagId) {
            $stmt = $this->db->getPDO()->prepare("INSERT post_tag (post_id, tag_id) VALUES (:post_id, :tag_id)");
            $stmt->execute([
               ':post_id' => $id,
               ':tag_id' => $tagId
            ]);
        }

        if ($result) {
            return true;
        }

    }
}
