<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Route;
use App\Models\Form\UserForm;
use App\Models\Form\ValidateUserForm;
use App\Models\User;

class UserRegister extends Controller
{
    public function showRegisterForm()
    {
        if (Auth::isLogin()) Route::redirect('/');
        $this->data['userForm'] = $this->session->getFlash('userForm');
        $this->view->render('auth/register_form_view', 'template_view', $this->data);
    }

    public function saveUser()
    {
        if (Auth::isLogin()) Route::redirect('/');
        $userForm = new UserForm();
        $validate = new ValidateUserForm($userForm);
        if ($validate->isValid()) {
            $checkUser = $this->entityManager->getRepository('App\Models\User')
                ->findOneBy(array('email' => $userForm->email));
            if (isset($checkUser)) {
                $this->session->setFlash('message', ['User is already exists']);
                Route::redirect('/');
            }
            $user = new User();
            $user->setEmail($userForm->email);
            $user->setFio($userForm->fio);
            $user->setPassword(password_hash($userForm->password, PASSWORD_DEFAULT));
            $this->entityManager->persist($user);
            $this->entityManager->flush();
            $this->session->setFlash('message', ['Registered is success']);
            Route::redirect('/');
        } else {
            $this->session->setFlash('message', $validate->getErrors());
            $this->session->setFlash('userForm', $userForm);
            Route::redirect('/register/user');
        }
    }
}
