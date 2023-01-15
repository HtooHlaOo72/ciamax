<?php
namespace Ciamax\Controllers;

class Login {
    public function __construct(private \Util\Authentication $authentication) {

    }

    public function login() {
        return ['template' => 'login.html.php',
                'title' => 'Log in'
               ];
    }

    public function loginSubmit() {
        $success = $this->authentication->login($_POST['email'], $_POST['password']);

        if ($success) {
            return ['template' => 'loginSuccess.html.php',
                    'title' => 'Log In Successful'
                   ];
        }
        else {
            return ['template' => 'loginForm.html.php',
                    'title' => 'Log in',
                    'variables' => [
                        'errorMessage' => true
                    ]
                   ];
        }

    }

    public function logout() {
        $this->authentication->logout();
        header('location: /');
    }
}