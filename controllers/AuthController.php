<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

/**
 * Class AuthController
 *
 * @author Hachidaime
 * @package app\controllers
 */
class AuthController extends Controller
{
    /**
     * login
     *
     * @return void
     */
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    /**
     * register
     *
     * @return void
     */
    public function register(Request $request)
    {
        if ($request->isPost()) {
            return 'Hancle submitted data';
        }
        $this->setLayout('auth');
        return $this->render('register');
    }
}
?>
