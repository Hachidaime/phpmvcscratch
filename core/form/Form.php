<?php
namespace app\core\form;

use app\core\Model;

/**
 * Class Form
 *
 * @author Hachidaime
 * @package app\core\form
 */

class Form
{
    /**
     * begin
     *
     * @param string $action
     * @param string $method
     * @return void
     */
    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    /**
     * end
     *
     * @return void
     */
    public static function end()
    {
        echo '</form>';
    }

    /**
     * field
     *
     * @param Model $model
     * @param string $attribute
     * @return void
     */
    public function field(Model $model, string $attribute)
    {
        return new Field($model, $attribute);
    }
}
?>
