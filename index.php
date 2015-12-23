<?php

  $response = array();

  /* Place initial and ending characters */
  function parseToRegex($param){
    return "^" . $param . "$";
  }

  include "tools/patterns.php";

  if(isset($response)){ echo json_encode($response); }
  exit();
?>
