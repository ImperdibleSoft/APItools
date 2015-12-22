<?php

  /* Create a domain pattern */
  function getDomainPattern(){
    $pattern = array();

    $pattern['uri'] = "([a-zA-Z0-9\.\-\_]{2,}\.)";
    $pattern['domain'] = "[a-z]{2,4}?";

    return $pattern['uri'] . $pattern['domain'];
  }

  /* Create website pattern */
  function getWebsitePattern(){
    $pattern = array();

    $pattern['protocol'] = "(http|ftp|https)(:\/\/)";

    return $pattern['protocol'] . getDomainPattern();
  }

  /* Create email pattern */
  function getEmailPattern(){
    $pattern = array();

    $pattern['user'] = "([a-zA-Z0-9\.\-\_]{2,})";
    $pattern['uri'] = "([a-zA-Z0-9\.\-\_]{2,}\.)";
    $pattern['domain'] = "[a-z]{2,4}?";

    return $pattern['user'] . "@" . getDomainPattern();
  }

  /* Create a name for a key field (table column, database name, username, etc) */
  function getKeynamePattern(){
    return "([a-zA-Z0-9\-\_\+]{3,})";
  }

  /* Create a phone pattern */
  function getPhonePattern(){
    return "[0-9\+\-\(\)]";
  }

  /* Return patterns */
  if(isset($_GET['key']) && $_GET['key'] == "patterns"){

    $patterns = explode(",", $_GET['value']);
    $response['patterns'] = array();

    /* Return website pattern */
    if(isset($_GET['value']) && in_array("domain", $patterns)){
      $response['patterns']['domain'] = parseToRegex(getDomainPattern());
    }

    /* Return website pattern */
    if(isset($_GET['value']) && in_array("website", $patterns)){
      $response['patterns']['website'] = parseToRegex(getWebsitePattern());
    }

    /* Return email pattern */
    if(isset($_GET['value']) && in_array("email", $patterns)){
      $response['patterns']['email'] = parseToRegex(getEmailPattern());
    }

    /* Return keyname pattern */
    if(isset($_GET['value']) && in_array("keyname", $patterns)){
      $response['patterns']['keyname'] = parseToRegex(getKeynamePattern());
    }

    /* Return phone pattern */
    if(isset($_GET['value']) && in_array("phone", $patterns)){
      $response['patterns']['phone'] = parseToRegex(getPhonePattern());
    }
  }
?>
