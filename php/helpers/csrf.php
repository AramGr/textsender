<?php

/**
 * Class CSRF
 */
class CSRF
{
    /**
     * @return mixed|string
     * @throws Exception
     */
    public static function generateCSRFToken(): ?string
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['csrf_token'];
    }

    /**
     * @param string|null $token
     * @return bool
     */
    public static function validateCSRFToken(string $token = null): bool
    {
        return (!empty($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token));
    }

}