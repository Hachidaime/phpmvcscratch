<?php

use app\core\Application;

/**
 * Class m0002_password_column
 *
 * @author Hachidaime
 */
class m0002_password_column
{
    public function up()
    {
        $db = Application::$app->db;
        $db->pdo->exec(
            'ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL AFTER email'
        );
    }

    public function down()
    {
        $db = Application::$app->db;
        $db->pdo->exec('ALTER TABLE users DROP COLUMN password');
    }
}
?>
