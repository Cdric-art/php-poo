<h1>Les articles</h1>
<div class="d-flex justify-content-around mt-5">
	<?php foreach ($params['posts'] as $post): ?>
		<div class="card" style="width: 25rem;">
			<div class="card-body">
				<h5 class="card-title"><?= $post->title ?></h5>
				<div>
					<?php foreach ($post->getTags() as $tag): ?>
						<a class="btn btn-outline-info" href="http://localhost/site_php/tags/<?= $tag->id ?>">
							<?= $tag->name ?>
						</a>
					<?php endforeach; ?>
				</div>
				<p class="card-text"><?= $post->getExcerpt() ?></p>
				<small class="text-info">Publié le <?= $post->getCreatedAt() ?></small>
				<?= $post->getButton() ?>
			</div>
		</div>
	<?php endforeach; ?>
</div>
