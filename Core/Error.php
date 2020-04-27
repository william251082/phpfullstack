<?php
/**
 * Created by PhpStorm.
 * User: iceshop
 * Date: 27-4-20
 * Time: 13:51
 */

namespace Core;

use ErrorException;
use Exception;

class Error
{
    /**
     * Error handler. Convert all errors to Exceptions by throwing an ErrorException.
     * @throws Exception
     *
     * @param int    $level   Error level
     * @param string $message Error message
     * @param string $file    Filename the error was raised in
     * @param int    $line    Line number in the file
     *
     * @return void
     */
    public static function errorHandler($level, $message, $file, $line): void
    {
        if (error_reporting() !== 0) {
            // to keep the @ operator working
            throw new ErrorException($message, 0, $level, $file, $line);
        }
    }

    /**
     * Exception handler.
     *
     * @param Exception $exception The exception
     *
     * @return void
     */
    public static function exceptionHandler($exception): void
    {
        echo "<h1>Fatal error</h1>";
        echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
        echo "<p>Message: '" . $exception->getMessage() . "'</p>";
        echo "<p>Stack trace:<pre>" . $exception->getTraceAsString() . "</pre></p>";
        echo "<p>Thrown in '" . $exception->getFile() . "' on line " .
            $exception->getLine() . "</p>";
    }
}
