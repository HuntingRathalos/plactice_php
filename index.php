<?php

use lib\Msg;

require_once 'config.php';

// libs
require_once SOURCE_BASE , 'libs/helper.php';
require_once SOURCE_BASE , 'libs/auth.php';

//model
require_once SOURCE_BASE . 'models/abstract.model.php';
require_once SOURCE_BASE . 'models/user.model.php';
require_once SOURCE_BASE . 'models/topic.model.php';

// msg
require_once SOURCE_BASE , 'libs/message.php';

//db
require_once SOURCE_BASE . 'db/datasource.php';
require_once SOURCE_BASE . 'db/user.query.php';
require_once SOURCE_BASE . 'db/topic.query.php';

// partials
require_once SOURCE_BASE . 'partials/header.php';
require_once SOURCE_BASE . 'partials/footer.php';

//view
require_once SOURCE_BASE . 'views/login.php';
require_once SOURCE_BASE . 'views/register.php';

use function lib\route;

session_start();

try {

    \partials\header();

    $rpath = str_replace(BASE_CONTEXT_PATH, '', CURRENT_URI);
    $method = strtolower($_SERVER['REQUEST_METHOD']);

    route($rpath);

    \partials\footer();

} catch(Throwable $e){

    die('<h1>何かがおかしいようです。</h1>')

}




// if ($_SERVER['REQUEST_URI'] === '/plactice_php/edit') {
//     require_once SOURCE_BASE . 'controllers/edit.php';
// } elseif ($_SERVER['REQUEST_URI'] === '/plactice_php/') {
//     require_once SOURCE_BASE . 'controllers/home.php';
// }

