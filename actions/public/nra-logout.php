<?php

Session::clear('nra');
header('location:'.routeTo('auth/login'));
die();