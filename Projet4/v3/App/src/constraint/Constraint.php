<?php

namespace App\src\constraint;

class Constraint
{
    public function notBlank($name, $value)
    {
        if (empty($value) || trim($value) === '') {
            return "<p>Le champ $name ne doit pas être vide</p>";
        }
    }

    public function minLength($name, $value, $minSize)
    {
        if (strlen($value) < $minSize) {
            return "<p>Le champ $name doit contenir au moins $minSize caractères.</p>";
        }
    }

    public function maxLength($name, $value, $maxSize)
    {
        if (strlen($value) > $maxSize) {
            return "<p>Le champs $name ne peut contenir plus de $maxSize caractères.</p>";
        }
    }

    public function onlyLetters($name, $value) {
        var_dump(preg_match('/^[A-Za-z]+$/', $value));
    }

    public function onlyLettersAndNumbers($name, $value) {
        var_dump(preg_match('/^[A-Za-z0-9]+$/', $value));
    }

    public function withoutSpecialChars($name, $value) {
        var_dump(preg_match('/^[A-Za-z0-9_-]+$/', $value));
    }
}