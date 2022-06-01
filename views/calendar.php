<?php

echo '<pre>';


$user = new app\models\User();
// find one user
print_r($user->findAll());



echo '</pre>';