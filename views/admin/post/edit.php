<h1>Modifier <?= $params['post']->title ?></h1>

<form action="http://localhost/site_php/admin/posts/edit/<?= $params['post']->id ?>" method="post">
	<div class="form-group mt-5">
		<label for="title" id="title">Titre de l'article</label>
		<input type="text" class="form-control" name="title" value="<?= $params['post']->title ?>">
	</div>
	<div class="form-group mt-3">
		<label for="content" id="content">Contenu</label>
		<textarea class="form-control" rows="8" name="content"><?= $params['post']->content ?></textarea>
	</div>
	<div class="form-group mt-3">
		<label for="tags">Tags de l'article</label>
		<select multiple class="form-control" id="tags" name="tags[]">
			<?php foreach ($params['tags'] as $tag) : ?>
				<option value="<?= $tag->id ?>"
				<?php foreach ($params['post']->getTags() as $hasTag) {
					echo $tag->id === $hasTag->id ? 'selected' : '';
				}?>
				>
					<?= $tag->name ?>
				</option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="mt-3">
		<button class="btn btn-outline-primary" type="submit">Enregistrer</button>
	</div>
</form>
