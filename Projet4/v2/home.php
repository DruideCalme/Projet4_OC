<?php

require 'database.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>P4 v2</title>
</head>
<body>

    <div>

        <h1>TEST</h1>

        <?php

        $db = new Database();

        echo $db->getConnection();

        ?>

    </div>
    
</body>
</html>