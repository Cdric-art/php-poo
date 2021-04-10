<h1>Espace administration</h1>
<div class="container mt-5">
	<table class="table">
		<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Titre</th>
			<th scope="col">Publié le</th>
			<th scope="col">Actions</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($params['posts'] as $post) : ?>
			<tr>
				<th scope="row"><?= $post->id ?></th>
				<td><?= $post->title ?></td>
				<td><?= $post->getCreatedAt() ?></td>
				<td>
					<a class="btn btn-warning" href="http://localhost/site_php/admin/posts/edit/<?= $post->id ?>">Modifier</a>
					<form action="http://localhost/site_php/admin/posts/delete/<?= $post->id ?>" method="post" class="d-inline">
						<button type="submit" class="btn btn-danger">Supprimer</button>
					</form>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>
