<?php

namespace Controller;

use Core\Controller;
use Core\Request;
use Model\UserModel;

class UserController extends Controller
{
    static $id;
    private $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function registerAction()
    {
        $this->render('register');
    }

    public function registerUserAction()
    {
        $userModel = new UserModel($this->request->postParam());
        $userModel->create();
        header('Location: /localhost_piephp/User/Login');
    }

    public function loginAction()
    {
        $this->render('login');
    }

    public function loginUserAction()
    {
        session_start();
        $userModel = new UserModel($this->request->postParam());
        $id = $userModel->login();
        if ($id) {
            $_SESSION['id'] = $id;
            $_SESSION['email'] = $this->request->postParam('email');
            header('Location: /localhost_piephp/User/Show');
        } else {
            header('Location: /localhost_piephp/User/Login');
        }
    }

    public function showAction($args)
    {
        $id = $args[0] ?? null;
        $this->render('show', ['id' => $id]);
    }

    public function readUserInfos($id = null)
    {
        $userModel = new UserModel();
        if ($id) {
            $result = $userModel->read($id);
            if ($result) {
                $result = $userModel->read($id);
                echo '<div>';
                echo '<div>' . $result['firstname'] . '</div>';
                echo '<div>' . $result['lastname'] . '</div>';
                echo '</div>';
            } else {
                echo '<div>';
                echo '<div>L\'id ' . $id . ' ne correspond à aucun utilisateur</div>';
                echo '</div>';
            }
        } else {
            $result = $userModel->read($_SESSION['id']);
            echo '<div>';
            echo '<div>' . $result['email'] . '</div>';
            echo '<div>' . $result['password'] . '</div>';
            echo '<div>' . $result['firstname'] . '</div>';
            echo '<div>' . $result['lastname'] . '</div>';
            echo '<div>' . $result['birthdate'] . '</div>';
            echo '<div>' . $result['address'] . '</div>';
            echo '<div>' . $result['zipcode'] . '</div>';
            echo '<div>' . $result['city'] . '</div>';
            echo '<div>' . $result['country'] . '</div>';
            echo '</div>';
        }
    }

    public function allAction()
    {
        $userModel = new UserModel();
        $result = $userModel->findAll([]);
        $this->render('all', ['users' => $result]);
    }

    public function updateAction()
    {
        $this->render('update');
    }

    public function updateUserInfosAction()
    {
        session_start();
        $userModel = new UserModel($this->request->postParam());
        $userModel->update();
        header('Location: /localhost_piephp/User/show');
    }

    public function deleteAction()
    {
        $this->render('delete');
    }

    public function deleteMyAccountAction()
    {
        session_start();
        $userModel = new UserModel();
        $userModel->delete($_SESSION['id']);
        header('Location: /localhost_piephp/User/Login');
    }

    public function logoutAction()
    {
        session_start();
        session_destroy();
        header('Location: /localhost_piephp/User/Login');
    }
}
