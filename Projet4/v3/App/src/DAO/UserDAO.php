<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\User;

class UserDAO extends DAO
{
    private function buildObject($row)
    {
        $user = new User();
        $user->setId($row['id']);
        $user->setPseudo($row['pseudo']);
        $user->setCreatedAt($row['createdAt']);
        $user->setRole($row['name']);
        return $user;
    }

    public function getUsers()
    {
        $sql = 'SELECT users.id, users.pseudo, users.createdAt, role.name FROM users INNER JOIN role ON users.role_id = role.id ORDER BY users.id DESC';
        $result = $this->createQuery($sql);
        $users = [];
        foreach ($result as $row){
            $userId = $row['id'];
            $users[$userId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $users;
    }

    public function register(Parameter $post)
    {
        $hashpassword = password_hash($post->get('password'), PASSWORD_DEFAULT);
        $sql = 'INSERT INTO users (pseudo, password, createdAt, role_id) VALUES (:pseudo, :password, NOW(), :roleid)';
        $this->createQuery($sql, [
            'pseudo' => $post->get('pseudo'),
            'password' => $hashpassword,
            'roleid' => 2
        ]);
    }

    public function checkUser(Parameter $post)
    {
        $sql = 'SELECT COUNT(pseudo) FROM users WHERE pseudo=:pseudo';
        $result = $this->createQuery($sql, [
            'pseudo' => $post->get('pseudo')
        ]);
        $isUnique = $result->fetchColumn();
        if ($isUnique) {
            return "<p>Le pseudo existe déjà</p>";
        }
    }

    public function login(Parameter $post)
    {
        $sql = 'SELECT u.id, u.pseudo, u.role_id, u.password, r.name AS role FROM users as u INNER JOIN role as r ON r.id = u.role_id WHERE pseudo=:pseudo';
        $data = $this->createQuery($sql, [
            'pseudo' => $post->get('pseudo')
        ]);
        $result = $data->fetch();
        if ($result) {
            $isPasswordValid = password_verify($post->get('password'), $result['password']);
            if ($isPasswordValid) {
                return [
                    'result' => $result,
                    'isPasswordValid' => $isPasswordValid
                ];
            }
        }
        return [];
    }

    public function updatePassword(Parameter $post, $userProfile)
    {
        if ($post->get('password')) {
            $hashpassword = password_hash($post->get('password'), PASSWORD_DEFAULT);
            $sql = 'UPDATE users SET password=:password WHERE id=:id AND pseudo=:pseudo';
            $this->createQuery($sql, [
                'id' => $userProfile['id'],
                'pseudo' => $userProfile['pseudo'],
                'password' => $hashpassword
            ]);
        }
        return false;
    }

    public function deleteAccount($user)
    {
        $sql = 'DELETE FROM users WHERE id=:id';
        $this->createQuery($sql, [
            'id' => $user['id']
        ]);
    }

    public function deleteUser($userId)
    {
        $sql = 'DELETE FROM users WHERE id = ?';
        $this->createQuery($sql, [$userId]);
    }
}