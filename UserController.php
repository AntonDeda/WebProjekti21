<?php

include './config/Database.php';

class UserController
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function all()
    {
        $query = $this->db->pdo->prepare('SELECT * FROM users');
        $query->execute();

        return $query->fetchAll();
    }

    public function ekziston($request){
        
        $query = $this->db->pdo->prepare('SELECT * FROM users WHERE email = :email');
        $query->bindParam(':email', $request['email']);
        $query->execute();
        $user = $query->fetchAll();

        if(count($user) > 0){
            return true;
        }else{
            return false;
        }
    }
    public function store($request)
    {
        $password = password_hash($request['password'], PASSWORD_DEFAULT);

        $query = $this->db->pdo->prepare('INSERT INTO users (name, lastname, email, password, img) VALUES (:name, :lastname, :email, :password, :img)');
        $query->bindParam(':name', $request['name']);
        $query->bindParam(':lastname', $request['lastname']);
        $query->bindParam(':email', $request['email']);
        $query->bindParam(':password', $password);
        $query->bindParam(':img', $request['img']);
        if($query->execute()){
            return true;
        }else{
            return false;
        }

        //return header('Location: ./login.php');
    }

    public function edit($id)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM users WHERE id = :id');
        $query->execute(['id' => $id]);

        return $query->fetch();
    }

    public function update($id, $request)
    {                
        $password = password_hash($request['password'], PASSWORD_DEFAULT);                    
        $query = $this->db->pdo->prepare('UPDATE users SET name = :name, email = :email,/* password = :password,*/ img = :img WHERE id = :id');
        $query->execute([
            'name' => $request['name'],
            'email' => $request['email'],
            //'password' => $password,
            'img' => $request['img'],
            'id' => $id
        ]);

        return header('Location: ./editUser.php');
    }

    public function destroy($id)
    {
        $query = $this->db->pdo->prepare('DELETE FROM users WHERE id = :id');
        $query->execute(['id' => $id]);

        return header('Location: ./index.php');
    }
}
