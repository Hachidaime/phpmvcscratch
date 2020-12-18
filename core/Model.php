<?php

namespace app\core;

/**
 * Class Model
 *
 * @author Hachidaime
 * @package app\core;
 */
abstract class Model
{
    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function validate()
    {
        # code...
    }
}
?>