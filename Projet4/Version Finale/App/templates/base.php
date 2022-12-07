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
    <script src="https://cdn.tiny.cloud/1/koauwxuigpl3hdedif9llqobq9a1lf6vbn5bmt5rmkw5m30d/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
    <?php include 'navigation.php'; ?>

    <div id="content">
        <?= $content ?>
    </div>

    <script type="module" src="../public/js/main.js"></script>
    <script>
        tinymce.init({
            language: 'fr_FR',
            selector: 'textarea',
            plugins: 'charmap searchreplace wordcount'
        });
    </script>
</body>

</html>