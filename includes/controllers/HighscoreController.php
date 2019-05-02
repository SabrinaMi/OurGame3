<?php

/**
 * @author Daniel Hoover <https://github.com/danielhoover>
 */
class HighscoreController extends Controller
{
	protected $viewFileName = "highscore"; //this will be the View that gets the data...
	protected $loginRequired = false;


	public function run()
	{
		$this->view->title = "Highscore";
		$this->view->username1 = $this->user->username1;
        $this->view->username2 = $this->user->username2;

        $this->view->highscore = HighscoreModel::getHighscoreList();

	}

}