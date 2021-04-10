<h1><?= $params['tag']->name ?></h1>
<div class="d-flex justify-content-around mt-5">
    <?php foreach ($params['tag']->getPosts() as $post): ?>
        <div class="card" style="width: 25rem;">
            <div class="card-body">
                <a class="btn btn-success" href="http://localhost/site_php/posts/<?= $post->id ?>">
                    <?= $post->title ?>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
