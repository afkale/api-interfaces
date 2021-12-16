<?php
require_once 'routes/user_routes.php';
require_once 'routes/activity_routes.php';
require_once 'routes/subject_routes.php';
require_once 'routes/user_subject_routes.php';

if (isset($_GET['url'])) {
    $args = explode('/', $_GET['url']);
    switch ($args[0]) {
        case 'user':
            userExecRoute();
            break;
        case 'subject':
            subjectExecRoute();
            break;
        case 'user_subject':
            userSubjectExecRoute();
            break;
        case 'activity':
            activityExecRoute();
            break;
    }
}
