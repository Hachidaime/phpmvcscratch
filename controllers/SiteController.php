<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;

/**
 * Class SiteController
 *
 * @author Hachidaime
 * @package app\controllers
 */

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'Garis3'
        ];
        return $this->render('home', $params);
    }

    public function contact()
    {
        return $this->render('contact');
    }

    public function handleContact()
    {
        return 'Handle Submited data';
    }
}
?>
