<?php
namespace HMC;

use Symfony\Component\Debug\ErrorHandler;

/**
 * Helper Class to register Symfony's Error & Exception Handler in the Service Container
 * Class ErrorAndExceptionHandlerFactory
 * @package ECommerce
 */
class ErrorAndExceptionHandlerFactory {
    public static function get($level = null, $displayErrors = true, $logger=null) {
        ErrorHandler::register($level, $displayErrors);

        if($logger) {
            ErrorHandler::setLogger($logger, 'deprecation');
            ErrorHandler::setLogger($logger, 'emergency');
            ErrorHandler::setLogger($logger, 'scream');
        }

        ExceptionHandler::register($displayErrors);
    }
}