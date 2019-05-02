<?php

class Highscore extends RESTClass
{
	private $Database = null;

	public function __construct()
	{
		$this->Database = new Database();
	}

	public function __destruct()
	{
		$this->Database = null;
	}

	protected function getRequest($data)
	{
		if(isset($data['returnView']) && $data['returnView'])
		{
			$view = new View('highscore');

			if(isset($data['id']))
			{
				$dataForView = HighscoreModel::getHighscoreList();

                $view->setData((array) $dataForView);

                $jsonResponse = new JSON();
                $jsonResponse->result = true;
                $jsonResponse->setData(array('html' => $view->parse()));
                $jsonResponse->send();
			}
			else
			{
				//new
				$jsonResponse = new JSON();
				$jsonResponse->result = true;
				$jsonResponse->setData(array('html' => $view->parse()));
				$jsonResponse->send();
			}
		}
	}

	protected function createRequest($data)
	{
		$requiredFields = array('firstname', 'lastname', 'street', 'zip', 'city');

		$error = false;
		$errorFields = array();
		$user = new User();

		foreach($requiredFields as $fieldname)
		{
			if(!isset($data[$fieldname]) || $data[$fieldname] == "")
			{
				$error = true;
				$errorFields[$fieldname] = 'Bitte geben Sie einen Wert ein!';
			}
		}

		if(!$error)
		{
			$data['userId'] = $user->id;

			AddressModel::createNewAddress($data);

			$jsonResponse = new JSON();
			$jsonResponse->result = true;
			$jsonResponse->setMessage('Address created!');
			$jsonResponse->send();
		}
		else
		{
			$jsonResponse = new JSON();
			$jsonResponse->result = false;
			$jsonResponse->setData(array('errorFields' => $errorFields));
			$jsonResponse->send();
		}

	}

	protected function saveRequest($data)
	{
		$requiredFields = array('username', 'points');

		$error = false;
		$errorFields = array();

		foreach($requiredFields as $fieldname)
		{
			if(!isset($data[$fieldname]) || $data[$fieldname] == "")
			{
				$error = true;
				$errorFields[$fieldname] = 'Bitte geben Sie einen Wert ein!';
			}
		}

		if(!$error)
		{
			$points = HighscoreModel::getPoints($data['username']);
			HighscoreModel::setPoints($data['username'], ($points + intval($data['points'])));
            $jsonResponse = new JSON();
            $jsonResponse->result = true;
            $jsonResponse->setMessage('Points saved!');
            $jsonResponse->send();

		}
		else
		{
			$jsonResponse = new JSON();
			$jsonResponse->result = false;
			$jsonResponse->setData(array('errorFields' => $errorFields));
			$jsonResponse->send();
		}
	}

	protected function deleteRequest($data)
    {
    }
}