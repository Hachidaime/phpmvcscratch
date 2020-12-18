<?php
namespace app\models;

use app\core\Model;

/**
 * Class RegisterModel
 *
 * @author Hachidaime
 * @package app\models
 */
class RegisterModel extends Model
{
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $password;
    public string $confirmPassword;

    public function register()
    {
        echo 'Creating new user';
    }
}
?>
