<?php

class Lrch
{
    private $nom;
    private $prenom;
    private $fonction;
    private $email;
    private $mdp;
    private $menu;


    public function __construct( array $cmd)
    {
        $this -> hydrate ($cmd);
    }

    public function hydrate( array $cmd)
    {
        foreach ($cmd as $key => $value)
        {
            $cmd = 'set'.ucfirst($key);
            if (method_exists ($this, $cmd))
            {
                $this -> $cmd ($value);
            }
        }
    }


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp): void
    {
        $this->mdp = $mdp;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * @param mixed $fonction
     */
    public function setFonction($fonction): void
    {
        $this->fonction = $fonction;
    }

    /**
     * @return mixed
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * @param mixed $menu
     */
    public function setMenu($menu): void
    {
        $this->menu = $menu;
    }
    

    public function Connexion ()
    {
        $bdd = new \Database\Base();
        $req = $bdd -> getBdd() -> prepare ("SELECT * FROM profil WHERE email = :email AND motDePasse = :mdp");
        $req -> execute(array(
            'email'=>$this->getEmail(),
            'mdp'=>$this->getMdp(),
        ));
        $res = $req -> fetch();
        if (is_array($res))
        {
            $this -> setNom($res["nom"]);
            $this -> setPrenom($res["prenom"]);
            $this -> setFonction($res["fonctionClasse"]);
            session_start();
            $_SESSION["user"] = $this;
            $_SESSION["role"] = $this -> getFonction();
            header("Location: ../../vue/stock.php");
        }
    }
    public function Menu()
    {
        var_dump($this->getMenu());
        session_start();

        if (isset($_SESSION) && isset($_SESSION['role']))
        {
            if ($this->getMenu() == 'maj' && $_SESSION['role'] == 'professeur')
            {
                header("Location: ../../vue/database.php");
            }
            elseif ($this->getMenu() == 'bonMatiere' && $_SESSION['role'] == 'professeur')
            {
                header("Location: ../../vue/bonDeMatiere");
            }
            elseif ($this->getMenu() == 'bonCommande' && ($_SESSION['role'] == 'professeur' || $_SESSION['role'] == 'comptable' || $_SESSION['role'] == 'admin'))
            {
                header("Location: ../../vue/bonDeCommande.php");
            }
            elseif ($this->getMenu() == 'stock' && ($_SESSION['role'] == 'professeur' || $_SESSION['role'] == 'comptable' || $_SESSION['role'] == 'admin' || $_SESSION['role'] == 'eleve'))
            {
                header("Location: ../../vue/etatStock.php");
            }
            else
            {
                echo "Vous n'avez pas les droits pour accéder à cette page.";
            }
        }
        else
        {
            echo "Veuillez vous connecter !!!";
        }
    }
}
