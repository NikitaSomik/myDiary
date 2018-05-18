<?php 


class DiaryController extends Controller
{


	public function index()
	{
		$data['title'] = 'Diary';

		if (isset($_SESSION['name'])) {
			View::render('diary', compact("data"));
		}	else {
			header('Location: /');
		}
	}
}