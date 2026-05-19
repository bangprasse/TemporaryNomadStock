<?php

// login detector
require '../app/core/Auth.php';
Auth::login_detector();

require '../config/config.php';

require '../app/views/layouts/header.php';

require '../app/views/layouts/footer.php';
