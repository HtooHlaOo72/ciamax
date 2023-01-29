<?php
namespace Util;

class EntryPoint {
    public function __construct(private \Util\Website $website) {
    }

     public function run(string $uri, string $method) {
        try {
            $this->checkUri($uri);
            if ($uri == '') {
                $uri = $this->website->getDefaultRoute();
            }

            $route = explode('/', $uri);
            $controllerName = array_shift($route);
            $action = array_shift($route);
            $this->website->checkLogin($controllerName . '/' . $action);

            if ($method === 'POST') {
                $action .= 'Submit';
            }

            $controller = $this->website->getController($controllerName); 

            if (is_callable([$controller, $action])) {
                $page = $controller->$action(...$route);

                $title = $page['title'];
                $variables = $page['variables'] ?? [];
                $output = $this->loadTemplate($page['template'], $variables);
            }
            else {
                http_response_code(404);
                $title = 'Not found';
                $output = 'Sorry, the page you are looking for could not be found.';
            }
            
        } catch (\PDOException $e) {
            $title = 'An error has occurred';

            $output = 'Database error: ' . $e->getMessage() . ' in ' .
            $e->getFile() . ':' . $e->getLine();
        }

        $layoutVariables = $this->website->getLayoutVariables();
        $layoutVariables['title'] = $title;
        $layoutVariables['output'] = $output;
        
        echo $this->loadTemplate('layout.html.php', $layoutVariables);
    }

    private function loadTemplate($templateFileName, $variables) {
        extract($variables);

        ob_start();
        include  __DIR__ . '/../templates/' . $templateFileName;

        return ob_get_clean();
    }

    private function checkUri($uri) {
        
        if ($uri != strtolower($uri)) {
            http_response_code(301);
            header('location: /' . strtolower($uri));
        }
       
    }
    private function upload(){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        }
    }
}

