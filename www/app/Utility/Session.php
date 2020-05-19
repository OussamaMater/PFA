<?php

/**
 * Helper class
 *
 * Session: manages all the sessions
 */
class Session
{
    // Unsets session if exists
    public static function delete($key)
    {
        if (self::exists($key)) {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }
    // Destroys session
    public static function destroy()
    {
        session_destroy();
    }
    // Checks if a given session is set
    public static function exists($key)
    {
        return(isset($_SESSION[$key]));
    }
    // Returns session value
    public static function get($key)
    {
        if (self::exists($key)) {
            return($_SESSION[$key]);
        }
    }
    // Creates a session
    public static function put($key, $value)
    {
        return($_SESSION[$key] = $value);
    }
}
