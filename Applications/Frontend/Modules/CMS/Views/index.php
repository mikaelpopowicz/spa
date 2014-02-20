<?php
echo isset($contenu) ? $contenu : "";
echo '<br/>';
echo 'Grain de sel : '.sha1(md5("mon super grain de sel de la mort")).'<br/>';
$test['salt'] = sha1(md5("mon super grain de sel de la mort"));
$password = "admin";
echo 'Mot de passe (admin) : '.sha1(md5(sha1(md5($test['salt'])).sha1(md5($password)).sha1(md5($test['salt'])))).'<br/>';
echo 'Login crypté (admin) : '.sha1(md5($password));
?>