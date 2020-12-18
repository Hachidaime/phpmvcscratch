<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

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
        $registerModel = new RegisterModel();
        if ($request->isPost()) {
            $registerModel->loadData($request->getBody());

            var_dump($registerModel);
            exit();

            if ($registerModel->validate() && $registerModel->register()) {
                return 'Success';
            }

            return $this->render('register', ['model' => $registerModel]);
        }
        $this->setLayout('auth');
        return $this->render('register', ['model' => $registerModel]);
    }
}
?>
