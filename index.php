<form method="POST">
  <p><label for="host">Host: </label><input id="host" name="host" /></p>
  <p><label for="host">User: </label><input name="user" /></p>
  <p><label for="host">Password: </label><input name="pass" type="password" /></p>
  <p><input type="submit" /></p>
</form>
<?php

if (isset($_POST)) {
  print_r($_POST);
  // using ldap bind
  $ldaprdn  = $_POST['user'];     // ldap rdn or dn
  $ldappass = $_POST['pass'];  // associated password

  // connect to ldap server
  $ldapconn = ldap_connect("ldap://".$_POST['host'])
      or die("Could not connect to LDAP server.");

  if ($ldapconn) {

      // binding to ldap server
      $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);

      // verify binding
      if ($ldapbind) {
          echo "LDAP bind successful...";
      } else {
          echo "LDAP bind failed...";
      }

  }
}

?>
