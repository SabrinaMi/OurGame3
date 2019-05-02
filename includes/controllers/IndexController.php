<?php

/**
 * @author Daniel Hoover <https://github.com/danielhoover>
 */
class IndexController extends Controller
{
	protected $viewFileName = "index"; //this will be the View that gets the data...
	protected $loginRequired = true;


	public function run()
	{
		$this->view->title = "Übersicht";
		$this->view->username1 = $this->user->username1;
        $this->view->username2 = $this->user->username2;
        $this->view->points1 = HighscoreModel::getPoints($this->view->username1);
        $this->view->points2 = HighscoreModel::getPoints($this->view->username2);

        if(isset($_POST["points1"]) && isset($_POST["points2"]) && isset($_POST["username1"]) && isset($_POST["username2"])){
            $points1Db = HighscoreModel::getPoints($_POST['username1']);
            HighscoreModel::setPoints($_POST['username1'], ($points1Db + intval($_POST['points1'])));
            $points2Db = HighscoreModel::getPoints($_POST['username2']);
            HighscoreModel::setPoints($_POST['username2'], ($points2Db + intval($_POST['points2'])));
        }
	}

}