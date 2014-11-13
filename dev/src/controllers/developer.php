<?php
include_once 'models/developer.php';

class ControllerDeveloper
{
	private $modelDeveloper;

	public function __construct()
	{
            $this->modelDeveloper = new ModelDeveloper();
	}
	
	public function _getDevelopers()
        {
            return $this->modelDeveloper->_getDevelopers();
        }
        
        public function _getDeveloper($id) {
            return $this->modelDeveloper->_getDeveloper($ID);
        }
        
        public function _connection($inputPseudo, $inputPassword)
        {
            $req = $this->modelDeveloper->_getDeveloperByPseudoAndPassword($inputPseudo, $inputPassword);
            $res = $req->fetch();
            $pseudoAndPassMatching = isset($res['pseudo']);
            
            if ($pseudoAndPassMatching)
            {
                session_start();
                $_SESSION['pseudo'] = $res['pseudo'];
                header("Location: index.php");
            }
            else 
            { header("Location: connection.php?connection=error"); }
        }
        
        public function _inscription($inputPseudo, $inputPassword, $inputEmail) 
        {
            $req = $this->modelDeveloper->_countDeveloperWithPseudo($inputPseudo);
            $res = $req->fetchColumn();
            $pseudoNotInBDD = ($res==0);
            $req->closeCursor();
           
            if ($pseudoNotInBDD)
            {
                $this->modelDeveloper->_insertDeveloper($inputPseudo, $inputPassword, $inputEmail);
                session_start();
                $_SESSION['pseudo'] = $inputPseudo;
                header("Location: index.php");
            }
            else
            { header("Location: inscription.php?inscription=errorPseudo"); }
        }        
}