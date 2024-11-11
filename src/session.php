<?php

namespace src;

class session
{
    public function killSessions()
    {
        //overwrite the current session array with an empty one
        $_SESSION = [];

        //overwrite the session cookie with empty data too
        if (ini_get('session.use_cookies')){
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params['path'], $params['domain'],
                $params['secure'], $params['httponly']);
        }
        session_destroy();
    }
    public function forgetSession()
    {
            $this->killSessions();
            header("location:index.php");
            exit;
    }

}
?>