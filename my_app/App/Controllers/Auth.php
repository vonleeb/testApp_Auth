<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Route;
use App\Models\Form\UserLoginForm;
use Aura\Session\SessionFactory;

class Auth extends Controller
{
    public function showLoginForm()
    {
        if (! self::isLogin()) {
        $this->view->render('auth/login_form_view', 'template_view');
        } else Route::redirect('/');
    }

    public function login()
    {
        if (! self::isLogin()) {
            $userForm = new UserLoginForm();
            $user = $this->entityManager->getRepository('App\Models\User')
                ->findOneBy(array('email' => $userForm->email));
            if (! $user) {
                $this->session->setFlash('message', ["This $userForm->email is not exists"]);
                Route::redirect('/');
            }
            if (password_verify($userForm->password, $user->getPassword())) {
                $this->session->set('auth', 'true');
                $this->session->set('fio', $user->getfio());
                Route::redirect('/');
            } else {
                $this->session->setFlash('message', ['Passwords do not match']);
                Route::redirect('/user/login');
            }
        } else Route::redirect('/');
    }

    public function logout()
    {
        if (self::isLogin()) {
            $this->session->clear();
        }
        Route::redirect('/');
    }

    public static function isLogin():bool
    {
        // TODO: remake, because duplitcate code;
        $session_factory = new SessionFactory();
        $session = $session_factory->newInstance($_COOKIE);
        $session = $session->getSegment('controller');
        if ($session->get('auth') == true) {
            return true;
        }
        return false;
    }
}
