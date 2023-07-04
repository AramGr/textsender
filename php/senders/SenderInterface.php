<?php

interface SenderInterface
{
    /**
     * @param mixed ...$parameters
     * @return mixed
     */
    public static function send(...$parameters): void;

}