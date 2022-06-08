<?php 
define('LIVE',true);
function custom_error_handler($e_mess,$e_file,$e_line,$e_vars){
  // Error message
  $message = "An error occurred in script'$e_file' on line $e_line: $e_mess\n";
  $message.=print_r($e_vars,1);
  if(!LIVE){
    echo'
    <pre>'.$message."\n";
      debug_print_backtrace();
      echo'</pre><br>';
  }else{
    echo'<p class="errorText">A system error occurred. We apologize for the inconvenience.</p>';
  }
}
set_error_handler('custom_error_handler');
?>