<?php

    class Session
    {
        private static $sessionStart = false;

        public static function start()
        {
            if (self::$sessionStart == false) {

                session_start ();
                self::$sessionStart = true;
            }
        }

        public static function set($key, $value)
        {
            $_SESSION[$key] = $value;
        }

        public static function get ($key)
        {
            if (isset($_SESSION[$key ])) return $_SESSION[$key];

            return false;
        }

        public static function validateSession ()
        {
            return ! isset($_SESSION[ 'id_usuario' ]) ? false : true;
        }

        public static function display ()
        {
            echo '<pre>';
            print_r ( $_SESSION );
            echo '</pre>';
        }

        public static function destroy ()
        {
            if ( self::$sessionStart == true ) {

                session_unset ();
                session_destroy ();
            }
        }
    }