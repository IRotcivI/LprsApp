<?php


class Crud
{
    private $nom;
    private $prenom;
    private $email;
    private $age;
    private $mdp;


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
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
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



    public function incription()
    {
        $bdd = new PDO('mysql:host=localhost:3307;dbname=vfe_crud;charset=utf8', 'root', '');
        $verif = $bdd ->prepare("SELECT * FROM crud_poo WHERE email = :email");
        $verif -> execute(array(
            'email'=>$this->getEmail(),
        ));
        if ($verif -> rowCount() > 0)
        {
            echo "Ce email est deja utilisé !!!";
        }
        else
        {
            $requete = $bdd -> prepare("INSERT INTO crud_poo (nom,prenom,email,age,mdp) VALUES (:nom,:prenom,:email,:age,:mdp)");
            $requete -> execute(array(
                'nom'=>$this->getNom(),
                'prenom'=>$this->getPrenom(),
                'email'=>$this->getEmail(),
                'age'=>$this->getAge(),
                'mdp'=>$this->getMdp(),
            ));
            echo "Votre compte a été créee";
        }
    }

    public function connexion()
    {
        $bdd = new PDO('mysql:host=localhost:3307;dbname=vfe_crud;charset=utf8', 'root', '');
        $requete = $bdd -> prepare("SELECT * FROM crud_poo WHERE email = :email AND mdp = :mdp");
        $requete -> execute(array(
            'email'=>$this->getEmail(),
            'mdp'=>$this->getMdp(),
        ));
        if ($requete -> rowCount() > 0)
        {
            header('Location: menu.php');
        }else
        {
            header('Location: index.html');
            echo "Erreur";
        }

    }

    public function profil()
    {
        $bdd = new PDO('mysql:host=localhost:3307;dbname=vfe_crud;charset=utf8', 'root', '');
        $requete = $bdd -> prepare("SELECT id_poo, nom, prenom, email, age, mdp FROM crud_po` WHERE email = :email");
        $requete -> execute(array(
            'email' => $this->getEmail(),
        ));

        $profil = $requete -> fetchAll();

        return $profil;

    }


