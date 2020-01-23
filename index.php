<form method="POST">
  <p><input name="host" /></p>
  <p><input name="user" /></p>
  <p><input name="pass" type="password" /></p>
</form>
<?php

if (isset($_POST)) {
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
