<?php $this->title = "P4 v3 - page Gestion des utilisateurs"; ?>

<section id="pageBlock">
    <p>
        <?= $this->session->show('delete_user'); ?>
    </p>
    <div class="espacePersoBlock">
        <?php include 'admin_nav.php'; ?>
        <div class="espacePersoBlockInfo">
            <div class="manageUsersBlock">
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
                            if ($user->getRole() === 'user') {
                            ?>
                                <li>
                                    <div class="manageUserContent">
                                        <?= htmlspecialchars($user->getPseudo());?> - <?= htmlspecialchars($user->getRole());?> - crée le<span class="comDate"><?= htmlspecialchars($user->getCreatedAt());?></span>
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