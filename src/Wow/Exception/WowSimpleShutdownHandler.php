<?php
/**
 * Wow! Simple Error Handler
 *
 * PHP version 5
 *
 * @category Wow
 * @package  WowSimpleErrorHandler
 * @author   Tzeng, Yi-Feng <yftzeng@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/yftzeng/phpWowSimpleErrorHandler
 */

namespace Wow\Exception;

/**
 * Wow! Simple Error Handler
 *
 * @category Wow
 * @package  WowSimpleErrorHandler
 * @author   Tzeng, Yi-Feng <yftzeng@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php MIT
 * @link     https://github.com/yftzeng/phpWowSimpleErrorHandler
 */

class WowSimpleErrorHandler
{
    /**
     * @comment construct
     *
     * @return void
     */
    public function __construct()
    {
        register_shutdown_function(array($this, 'shutdownHandler'));
    }

    /**
     * @comment protected shutdown handler
     *
     * @return void
     */
    public function shutdownHandler()
    {
        try {
            if (($e = error_get_last()) !== null) {
                error_log(
                    'cannot find the exception handler for error: '.
                    print_r($e, true)
                );
            }
        }
        catch (Exception $e)
        {
            error_log(
                'exception cannot be thrown from the shutdownHandler: '.
                print_r($e, true)
            );
        }
    }
}
