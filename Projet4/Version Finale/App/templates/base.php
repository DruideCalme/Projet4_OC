<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bienvenue sur le blog de l'écrivain Jean Forteroche">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Open Graph -->
    <meta property="og:title" content="Bienvenue sur le blog de l'écrivain Jean Forteroche">
    <meta property="og:description" content="Suivez les aventures de Jean Forteroche.">
    <meta property="og:image" content="https://mighted.fr/public/content/Projet_4/App/public/img/snowflake-logo.png">
    <meta property="og:url" content="https://mighted.fr/public/content/Projet_4">
    <!-- Twitter Card -->
    <meta name="twitter:title" content="Bienvenue sur le blog de l'écrivain Jean Forteroche">
    <meta name="twitter:description" content="Suivez les aventures de Jean Forteroche.">
    <meta name="twitter:image" content="https://mighted.fr/public/content/Projet_4/App/public/img/snowflake-logo.png">
    <meta name="twitter:card" content="summary_large_image">
    <!-- Règles CSS -->
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/responsive.css">
    <link rel="stylesheet" href="../public/css/fonts.css">
    <!-- Favicon -->
    <link rel="icon" href="../public/img/snowflake-logo.png">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/09cce809d6.js" crossorigin="anonymous"></script>
    <!-- TinyMCE -->
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