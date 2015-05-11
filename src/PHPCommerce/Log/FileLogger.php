<?php
namespace PhpCommerce\Log;

use Psr\Log\AbstractLogger;
use Psr\Log\LogLevel;
use Psr\Log\InvalidArgumentException;

/**
 * This class implements a PSR-3 compatible File Logger
 * Class FileLogger
 * @package PhpCommerce\Log
 */
class FileLogger extends AbstractLogger {
    protected $logFile;

   // protected $minimumSeverityLevel;

    public function __construct($logFile/*, $minimumSeverityLevel = LogLevel::WARNING*/) {
        $this->logFile = $logFile;
    }

    /**
     * Creates a string representation for the given message and context
     * @param $message
     * @param $context
     * @return mixed|string
     */
    protected function assembleMessage($level, $message, $context) {
        $message = (string)$message;

        $messageSuffix = "";

        foreach ($context as $key => $value) {

            if($key == 'exception') {
                $e = $context['exception'];

                $message .= PHP_EOL;
                $message .= "Exception-Class:\t\t" . get_class($e) . PHP_EOL;
                $message .= "Exception-File:\t\t\t" . $e->getFile() . ":" . $e->getLine() . PHP_EOL;
                $message .= "Exception-Message:\t\t" . $e->getMessage() . PHP_EOL;
                $message .= "Exception-Code:\t\t\t" . $e->getCode() . PHP_EOL;
                $message .= "Exception-Stacktrace:" . PHP_EOL;

                $message .= $e->getTraceAsString();

            } else if (strpos($message, '{' . $key . '}') !== FALSE) {
                $message = str_replace('{' . $key . '}', $context[$key], $message);
            } else {
                $messageSuffix .= "\\-> " . $key . ": " . var_export($value, true) . PHP_EOL;
            }
        }

        $message = "[" . strtoupper($level) . "] " . $message . PHP_EOL;

        if (strlen($messageSuffix) > 0) {
            $message .= $messageSuffix . PHP_EOL;
        }
        return $message;

    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return null
     */
    public function log($level, $message, array $context = array())
    {
        $message = $this->assembleMessage($level, $message, $context);

        switch($level) {
            case LogLevel::EMERGENCY:
            case LogLevel::ALERT:
            case LogLevel::CRITICAL:
            case LogLevel::ERROR:
            case LogLevel::WARNING:
            case LogLevel::NOTICE:
            case LogLevel::INFO:
            case LogLevel::DEBUG:
                $this->logToFile($this->logFile, $message);
            break;

            default:
                throw new InvalidArgumentException(
                    "Unknown severity level"
                );
        }
    }

    private function logToFile($file, $message) {
        $logEntry = "[" . date('Y-m-d H:i:s') . "] " . $message;

        @file_put_contents($file, $logEntry, FILE_APPEND);
    }
}