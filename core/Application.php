<?php
    namespace app\core;

class Application
    {

        public string $layout = 'main';

        public static string $ROOT_DIR;
        public string $userClass;
        public Router $router  ;
        public Request $request;
        public Response $response;
        public Session $session;
        public Database $db;
        public View $view;
        public static Application $app;
        public ?Controller $controller = null;
        public ?DbModel $user;

        public function __construct($rootPath ,array $config)
        {
            $this->userClass = $config['userClass'];
            self::$app = $this;
            self::$ROOT_DIR = $rootPath;
            $this->request = new Request();
            $this->response = new Response();
            $this->session = new Session();
            $this->view = new View();
            $this->router = new Router($this->request, $this->response);
            $this->db = new Database($config['db']);


            $primaryValue = $this->session->get('user');
            if($primaryValue){
                $primaryKey = $this->userClass::primarykey();
                $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
            }else {
                $this->user = null;
            }
        }


        public function getController()
        {
            return $this->controller;
        }
        public function setController(Controller $controller)
        {
            $this->controller = $controller;
        }

        

        public function run()
        {
            try 
            {
                echo $this->router->resolve();
            } 
            catch (\Exception $e) 
            {
                $this->response->setStatusCode(404);
                $this->response->setStatusCode($e->getCode());
                echo $this->view->renderView('_error',[
                    "exception" => $e,
                ]);
            }
        }

        public function login(DbModel $user)
        {
            $this->user = $user;
            $primaryKey = $user->primaryKey();
            $primaryValue = $user->{$primaryKey};
            $this->session->set('user',$primaryValue);
            return true;

        }

        public function isGuest()
        {
            return !(self::$app->user);
        }

        public function logout()
        {
            $this->user = null;
            $this->session->remove('user');
        }
        

        
        
    }
    


	
?>