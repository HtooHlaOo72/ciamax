<?php
namespace Ciamax\Controllers;
use \Util\DatabaseTable;
class User {
    public function __construct(private DatabaseTable $userTable){

    }
    public function list(){
        $users = $this->userTable->findAll();
        $errors=[];
        echo is_array($users);
        return [
            'template'=>'userlist.html.php',
            'title'=>'User List',
            'variables'=>[
                'users'=>$users,
                'errors'=>$errors,
            ]
        ];
    }
    public function registrationForm() {
        return [
          'template' => 'register.html.php',
            'title' => 'Register an account'
        ];
    }

    public function success() {  
       
        return [
            'template' => 'registersuccess.html.php',
            'title' => 'Registration Successful'
        ];
    }

    public function registrationFormSubmit() {
        $user = $_POST['user'];
        // Start with an empty array
        $errors = [];

        // But if any of the fields have been left blank, write an error to the array
        if (empty($user['name'])) {
            $errors[] = 'Name cannot be blank';
        }

        if (empty($user['email'])) {
            $errors[] = 'Email cannot be blank';
        } else if (filter_var($user['email'], FILTER_VALIDATE_EMAIL) == false) {
            $errors[] = 'Invalid email address';
        } else { // If the email is not blank and valid:
            // convert the email to lowercase
            $user['email'] = strtolower($user['email']);

            // Search for the lowercase version of $user['email']
            if (count($this->userTable->find('email', $user['email'])) > 0) {
                $errors[] = 'That email address is already registered';
            }
        }

        if (empty($user['password'])) {
            $errors[] = 'Password cannot be blank';
        }

        // If there are no errors, proceed with saving the record in the database
        if (count($errors) === 0) {
            // Hash the password before saving it in the database
            $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);

            // When submitted, the $user variable now contains a lowercase value for email
            // and a hashed password
            $this->userTable->save($user);

            header('Location: /ciamax/public/user/success');
        } else {
            // If the data is not valid, show the form again
            return ['template' => 'register.html.php',
        'title' => 'Register an account',
        'variables' => [
            'errors' => $errors,
            'user' => $user
        ]
      ];
        }
    }


}