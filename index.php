<?php
# path
require_once './routes/work_experience_routes.php';
require_once './routes/vacant_enterprise_routes.php';
require_once './routes/vacant_routes.php';
require_once './routes/type_credential_routes.php';
require_once './routes/study_student_routes.php';
require_once './routes/study_routes.php';
require_once './routes/student_routes.php';
require_once './routes/selection_routes.php';
require_once './routes/level_language_routes.php';
require_once './routes/level_study_routes.php';
require_once './routes/language_routes.php';
require_once './routes/idiom_vacant_routes.php';
require_once './routes/idiom_student_routes.php';
require_once './routes/idiom_routes.php';
require_once './routes/enterprise_routes.php';
require_once './routes/employment_contract_routes.php';
require_once './routes/credential_routes.php';
require_once './routes/college_routes.php';

if (isset($_GET['url'])) {
    $args = explode('/', $_GET['url']);
    switch ($args[0]) {
            # method
		case 'work_experience':
			workExperienceExecRoute();
			break; 
		case 'vacant_enterprise':
			vacantEnterpriseExecRoute();
			break; 
		case 'vacant':
			vacantExecRoute();
			break; 
		case 'type_credential':
			typeCredentialExecRoute();
			break; 
		case 'study_student':
			studyStudentExecRoute();
			break; 
		case 'study':
			studyExecRoute();
			break; 
		case 'student':
			studentExecRoute();
			break; 
		case 'selection':
			selectionExecRoute();
			break; 
		case 'level_language':
			levelLanguageExecRoute();
			break; 
		case 'level_study':
			levelStudyExecRoute();
			break; 
		case 'language':
			languageExecRoute();
			break; 
		case 'idiom_vacant':
			idiomVacantExecRoute();
			break; 
		case 'idiom_student':
			idiomStudentExecRoute();
			break; 
		case 'idiom':
			idiomExecRoute();
			break; 
		case 'enterprise':
			enterpriseExecRoute();
			break; 
		case 'employment_contract':
			employmentContractExecRoute();
			break; 
		case 'credential':
			credentialExecRoute();
			break; 
		case 'college':
			collegeExecRoute();
			break;
    }
}
