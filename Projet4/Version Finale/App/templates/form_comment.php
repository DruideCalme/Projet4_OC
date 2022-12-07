<?php
if (empty($commentId)) {
    $commentId = 0;
}
$add_route = 'addComment&articleId=' . $articleId;
$edit_route = 'editComment&commentId=' . $commentId . '&commentAuthor=' . $this->session->getUserInfo('pseudo');
$route = isset($post) && $post->get('id') ? $edit_route : $add_route;
$submit = $route === $add_route ? 'Ajouter' : 'Mettre à jour';
?>

<form action="../public/index.php?route=<?= $route; ?> "method="post">
    <label for="pseudo">
        <input type="hidden" name="pseudo" id="pseudo" value="<?= $this->session->getUserInfo('pseudo'); ?>">
    </label><br>
    <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
    <label for="content">
        <textarea name="content" id="content" cols="30" rows="10" placeholder="Votre commentaire"><?= isset($post) ? htmlspecialchars($post->get('content')): ''; ?></textarea>
        <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    </label><br>
    <input type="submit" value="<?= $submit; ?>" name="submit" id="submit">
</form>