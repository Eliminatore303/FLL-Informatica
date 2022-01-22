<?php
    abstract class Utility
    {
        private $id;
        
        public function __construct($string, $cod = null, $sig = null)
        {
            switch($string)
            {
                case "wagon":
                    $this->id='W';
                    if($sig!=null)
                    {
                        switch($sig)
                        {
                            case 'udine':
                                $sig='UD';
                                break;
                            case 'trento':
                                $sig='TN';
                                break;
                            case 'torino':
                                $sig='TO';
                                break;
                            case 'firenze':
                                $sig='FI';
                                break;
                            case 'bologna':
                                $sig='BO';
                                break;
                            case 'padova':
                                $sig='PD';
                                break;
                            case 'milano':
                                $sig='MI';
                                break;
                            case 'treviso':
                                $sig='TV';
                                break;
                        }
                    }
                    break;
                case "train":
                    $this->id='T';
                    break;
                case "spedition":
                    $this->id='S';
                    break;
                case "private":
                    $this->id='P';
                    break;
                case "path":
                    $this->id='p';
                    break;  
                case "machinist":
                    $this->id='M';
                    break;
                case "hub":
                    $this->id='H';
                    break;
                case "enterprise":
                    $this->id='E';
                    break;
                case "box":
                    $this->id='B';
                    break;  
                case "spedition":
                    $this->id='S';
                    break;
            }
            if($cod == null) $this->id .=rand(100000,999999);
            else $this->id .= $cod;
            //check if id already exists
        }

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id=$id;
        }
    }
?>