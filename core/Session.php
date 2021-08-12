<?php

namespace app\core;

    class Session
    {
        const FLASH_KEY = "flash_messages";
        public function __construct()
        {
            session_start();
            $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
            foreach ($flashMessages as $key => &$value) {
                $value['remove'] = true;
            }

            $_SESSION[self::FLASH_KEY] = $flashMessages;
            // echo "<pre>";
            // var_dump($_SESSION[self::FLASH_KEY]);
            // echo "</pre>";

        }
        public function setFlash($key, $message)
        {
            $_SESSION[self::FLASH_KEY][$key] = [
                'remove' => false,
                'value' => $message
            ];
        }

        public function getFlash($key)
        {
            return $_SESSION[self::FLASH_KEY][$key]['value'] ?? false;
        }

        public function set($key,$value)
        {
            $_SESSION[$key] = $value;
        }

        public function get($key)
        {
            return $_SESSION[$key] ?? false;
        }

        public function remove($key)
        {
            unset($_SESSION[$key]);
        }
        
        public function __destruct()
        {
        // session_destroy();
            $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
            foreach ($flashMessages as $key => &$flashmessage) {
                if($flashmessage['remove']){
                    unset($flashMessages[$key]);
                }
            }

            $_SESSION[self::FLASH_KEY] = $flashMessages;
            
        }
    }
?>

