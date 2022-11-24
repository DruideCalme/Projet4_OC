<?php
if (empty($post)) {
    $articleId = 0;
} else {
    $articleId = $post->get('id');
}
$add_route = 'addArticle';
$edit_route = 'editArticle&articleId=' . $articleId;
$route = isset($post) && $articleId ? $edit_route : $add_route;
$title = isset($post) ? htmlspecialchars($post->get('title')) : '';
$content = isset($post) ? htmlspecialchars($post->get('content')) : '';
$submit = $route === $add_route ? 'Envoyer' : 'Mettre à jour';
?>

<form action="../public/index.php?route=<?= $route; ?>" method="post">
    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title" value="<?= $title; ?>"><br>
    <?= isset($errors['title']) ? $errors['title'] : '' ?>
    <label for="content">Contenu</label><br>
    <textarea name="content" id="contenu" cols="30" rows="10"><?= $content; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : '' ?>
    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>