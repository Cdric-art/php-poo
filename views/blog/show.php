<h1><?= $params['post']->title ?></h1>
<div>
	<?php foreach ($params['post']->getTags() as $tag): ?>
		<a class="btn btn-outline-info" href="http://localhost/site_php/tags/<?= $tag->id ?>">
			<?= $tag->name ?>
		</a>
	<?php endforeach; ?>
</div>
<p><?= $params['post']->content ?></p>
<a class="btn btn-secondary" href="http://localhost/site_php/posts">Retour</a>
