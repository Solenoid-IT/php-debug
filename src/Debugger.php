<?php



namespace Solenoid\Debug;



class Debugger
{
    # Returns [bool]
    public static function set_breakpoint (string $message = '', array $data = [])
    {
        // Printing the value
        echo "\n\nDEBUGGER :: BREAKPOINT\n\n$message\n\n" . json_encode( $data, JSON_PRETTY_PRINT ) . "\n\n\n";



        // (Reading the line)
        $line = readline();

        if ( $line === false )
        {// Value is false
            // Returning the value
            return true;
        }



        if ( !readline_add_history( $line ) )
        {// (Unable to add the command to the history)
            // Returning the value
            return false;
        }



        // Returning the value
        return true;
    }



    # Returns [string]
    public static function print_html ($variable, bool $close_process = false)
    {
        // Printing the value
        echo '<pre>' . print_r( $variable, true ) . '</pre>';



        if ( $close_process )
        {// Value is true
            // Closing the process
            exit;
        }
    }

    # Returns [void]
    public static function print_json ($variable, bool $close_process = false)
    {
        // (Setting the header)
        header('Content-Type: application/json');

        // Printing the value
        echo json_encode( $variable, JSON_PRETTY_PRINT );



        if ( $close_process )
        {// Value is true
            // Exiting from the code
            exit;
        }
    }
}



?>