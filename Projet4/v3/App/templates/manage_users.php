<?php $this->title = "P4 v3 - page Gestion des utilisateurs"; ?>

<section id="pageBlock">
    <div class="manageUsersBlock">
        <p>
            <?= $this->session->show('delete_user'); ?>
        </p>
        <h2>Gérer les comptes utilisateurs</h2>
        <ul>
            <?php
            foreach ($users as $user)
            {
                if ($user->getRole() === 'user') {
                ?>
                    <li>
                        <?= htmlspecialchars($user->getPseudo());?> - <?= htmlspecialchars($user->getRole());?> - crée le <?= htmlspecialchars($user->getCreatedAt());?> 
                        <a href="../public/index.php?route=deleteUser&amp;userId=<?= $user->getId(); ?>">Supprimer</a>
                    </li>
                <?php
                }
            }
            ?>
        </ul>       
    </div>
</section>