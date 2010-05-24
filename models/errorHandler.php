<?php

/**
 * @desc    Class for handling and logging errors
 * @since   22/05/10
 * @author  Mike Pearce <mike@mikepearce.net>
 * @package reportBuilder
 */
class ErrorHandler
{
    /**
     * Store the name of the app
     * Set it here, incase it doesn't get set.
     */
    private $_appName;

    /**
     * @desc  Set the appname
     * @param string $appName
     */
    public function setAppName($appName)
    {
        $this->_appName = $appName;
    }

    /**
     * @desc    log an error to the syslog
     * @param   string $message
     * @param   boolean $error
     * @return  boolean
     */
    public function logError($message, $error = TRUE)
    {
        if (!isset($this->_appName))
        {
            $this->_appName = $_SERVER['SCRIPT_FILENAME'];
        }
        
        return error_log(
            ($error ? 'ERROR: ' : 'INFO: ').
            $this->_appName .': '. $message, 0
        );
    }

    /**
     * Print the usage instructions
     */
    public function showUsage()
    {
        print "Usage: php -f report.php [merchant_id] OR [all]\n";
    }

    /**
     * @desc    log an info message to the syslog
     * @param   string $message
     * @return  boolean
     */
    public function logInfo($message)
    {
        return $this->logError($message, 0);
    }
}