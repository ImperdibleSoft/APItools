<?php

  $response = array();

  /* Place initial and finish characters */
  function parseToRegex($param){
    return "^" . $param . "$";
  }

  include "tools/patterns.php";

  if(isset($response)){ echo json_encode($response); }
  exit();
?>
