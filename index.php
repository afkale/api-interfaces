<?php
# path
require_once './routes/enterprise_routes.php';
require_once './routes/idiom_routes.php';
require_once './routes/language_routes.php';
require_once './routes/vacant_routes.php';
require_once './routes/study_routes.php';
require_once './routes/selection_routes.php';
require_once './routes/student_routes.php';

if (isset($_GET['url'])) {
    $args = explode('/', $_GET['url']);
    switch ($args[0]) {
        # method
		case 'enterprise':
			enterpriseExecRoute();
			break; 
		case 'idiom':
			idiomExecRoute();
			break; 
		case 'language':
			languageExecRoute();
			break; 
		case 'vacant':
			vacantExecRoute();
			break; 
		case 'study':
			studyExecRoute();
			break; 
		case 'selection':
			selectionExecRoute();
			break; 
		case 'student':
			studentExecRoute();
			break; 
    }
}
