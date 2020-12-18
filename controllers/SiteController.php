<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

/**
 * Class SiteController
 *
 * @author Hachidaime
 * @package app\controllers
 */

class SiteController extends Controller
{
    /**
     * function home
     *
     * @return void
     */
    public function home()
    {
        $params = [
            'name' => 'Garis3'
        ];
        return $this->render('home', $params);
    }

    /**
     * function contact
     *
     * @return void
     */
    public function contact()
    {
        return $this->render('contact');
    }

    /**
     * function handleContact
     *
     * @param Request $request
     * @return void
     */
    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        return 'Handle Submited data';
    }
}
?>
