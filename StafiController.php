<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include './config/Database.php';

class StafiController
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function all()
    {
        $query = $this->db->pdo->prepare('SELECT * FROM stafi');
        $query->execute();

        return $query->fetchAll();
    }

    public function edit($stafi_id)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM stafi WHERE stafi_id = :stafi_id');
        $query->execute(['stafi_id' => $stafi_id]);

        return $query->fetch();
    }

    public function store($request)
    {
        $query = $this->db->pdo->prepare('INSERT INTO stafi (stafi_fullname, stafi_certifikimi, stafi_image, stafi_pershkrimi) 
                                        VALUES (:stafi_fullname, :stafi_certifikimi, :stafi_image, :stafi_pershkrimi)');
        $query->bindParam(':stafi_fullname', $request['stafi_fullname']);
        $query->bindParam(':stafi_certifikimi', $request['stafi_certifikimi']);
        $query->bindParam(':stafi_image', $request['stafi_image']);
        $query->bindParam(':stafi_pershkrimi', $request['stafi_pershkrimi']);
        if($query->execute()){
            return true;
        }else{
            return false;
        }

        //return header('Location: ./aboutUs.php');
    }
    public function ekziston($request){
        $query = $this->db->pdo->prepare('SELECT * FROM stafi WHERE stafi_fullname = :stafi_fullname');
        $query->bindParam(':stafi_fullname', $request['stafi_fullname']);
        $query->execute();
        $user = $query->fetchAll();

        if(count($user) > 0){
            return true;
        }else{
            return false;
        }
    }
    public function update($request)
    {    
        $stafi_fullname = $request['stafi_fullname'];
        $stafi_certifikimi = $request['stafi_certifikimi'];
        $stafi_image = $request['stafi_image'];
        $stafi_pershkrimi = $request['stafi_pershkrimi'];
        $stafi_id = $request['stafi_id'];

        $sql = 'UPDATE stafi SET stafi_fullname = :stafi_fullname, stafi_certifikimi = :stafi_certifikimi, stafi_image=:stafi_image, stafi_pershkrimi = :stafi_pershkrimi WHERE stafi_id = :stafi_id';
        $query =$this->db->pdo->prepare($sql);
        
        $query->bindParam('stafi_fullname', $stafi_fullname);
        $query->bindParam('stafi_certifikimi', $stafi_certifikimi);
        $query->bindParam('stafi_image', $stafi_image);
        $query->bindParam('stafi_pershkrimi', $stafi_pershkrimi);

        $query->bindParam('stafi_id', $stafi_id);
  
        if($query->execute()){
            return true;
        }else{
            return false;
        }
        //return header('Location: ./aboutUs.php');
    }

    public function destroy($stafi_id)
    {
        $query = $this->db->pdo->prepare('DELETE FROM stafi WHERE stafi_id = :stafi_id');
        $query->execute(['stafi_id' => $stafi_id]);

        return header('Location: ./aboutUs.php');
    }
    
    public function top3(){
        $sql = 'SELECT * FROM stafi ORDER BY stafi_id ASC LIMIT 3';
        
        $query = $this->db->pdo->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}
