<?php

namespace App\Service;

use App\Model\User;
use PDO;

class UserManager implements ManagerInterface
{

    // Le manager a besoin de PDO
    private $pdo;

    // On demande dès le constructeur d'instancier PDO
    // pour utiliser le Manager
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Transforme un array en objet Car
     * @param array $array
     * @return User
     */
    public function arrayToObject(array $array)
    {
        $user = new User;
        $user->setId($array['id']);
        $user->setLastname($array['lastname']);
        $user->setFirstname($array['firstname']);

        return $user;
    }

    /**
     * @return User[]
     */
    public function findAll()
    {
        $query = "SELECT * FROM user";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        $users = [];

        foreach ($data as $d) {
            $users[] = $this->arrayToObject($d);
        }

        return $users;
    }

    /**
     * @param int $id
     * @return User
     */
    public function findOneById(int $id)
    {
        $query = "SELECT * FROM user WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->execute(
            [
                "id" => $id
            ]
        );
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        $user = $this->arrayToObject($data);
        return $user;
    }

    public function create()
    {
        $query = " INSERT INTO user(lastname, firstname)
                    VALUES (:lastname ,:firstname)";
        $statement = $this->pdo->prepare($query);
        $statement->execute([

            'lastname' => $_POST["lastname"],
            'firstname' => $_POST["firstname"],
        ]);
    }


    public function update(int $id, array $data)
    {
        $query = "UPDATE user SET lastname = :lastname ,firstname = :firstname WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->execute([
            "id" => $id,
            "lastname" => $data["lastname"],
            "firstname" => $data["firstname"]
        ]);
    }


    /**
     * @param string $field
     * @param string $value
     * @return User[]
     */
    public function findByField(string $field, string $value)
    {
    }
}
