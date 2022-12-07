<?php $this->title = "Gestion des utilisateurs"; ?>

<section id="pageBlock">
    <div class="espacePersoBlock">
        <?php include 'admin_nav.php'; ?>
        <div class="espacePersoBlockInfo">
            <div class="manageUsersBlock">
                <?= $this->session->show('delete_user'); ?>
                <h2>Gérer les comptes utilisateurs</h2>
                <ul>
                    <?php
                    if (count($users) <= 1) {
                        ?>
                        <p>Aucun utilisateur inscrit</p>
                        <?php
                    } else {
                        foreach ($users as $user)
                        {
                            if ($user->getRole() === 'Utilisateur') {
                            ?>
                                <li>
                                    <div class="manageUserContent">
                                        <?= htmlspecialchars($user->getPseudo());?> - crée le<span class="comDate"><?= htmlspecialchars($user->getCreatedAt());?></span>
                                    </div>
                                    <div class="manageComLinks">
                                        <a href="../public/index.php?route=deleteUser&amp;userId=<?= $user->getId(); ?>">Supprimer</a>
                                    </div>
                                </li>
                            <?php
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>