<?php
require_once 'controllers/study_student_controller.php';

function studyStudentExecRoute()
{
	$controller = new StudyStudentController();
	if (isset($post['option']) && $post['option'] = 'object') {
		unset($post['option']);
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		} else if (['REQUEST_METHOD'] == 'PUT') {
		}
	} else {
		require_once 'routes.php';
	execRoute($controller);
	}
}
