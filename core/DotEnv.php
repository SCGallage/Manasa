<?php


namespace core;


use http\Exception\InvalidArgumentException;
use http\Exception\RuntimeException;

class DotEnv
{

    protected string $path;

    public function __construct(string $path)
    {
        if (!file_exists($path)) {
            throw new InvalidArgumentException(sprintf("%s not found", $path));
        }

        $this->path = $path;
    }

    public function load()
    {
        if (!is_readable($this->path)) {
            throw new RuntimeException(sprintf("%s is not readable", $this->path));
        }

        $fileLines = file($this->path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($fileLines as $fileLine) {

            if (str_starts_with($fileLine, "#")) {
                continue;
            }

            list($name, $value) = explode('=', $fileLine, 2);
            $name = trim($name);
            $value = trim($value);

            if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                putenv(sprintf("%s=%s", $name, $value));
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }

        }
    }
}