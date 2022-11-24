<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/responsive.css">
    <link rel="stylesheet" href="../public/css/fonts.css">
    <script src="https://kit.fontawesome.com/09cce809d6.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php include 'navigation.php'; ?>

    <div id="content">
        <?= $content ?>
    </div>

<script type="module" src="../public/js/main.js"></script>
</body>

</html>