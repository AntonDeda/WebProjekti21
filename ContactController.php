<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include './config/Database.php';

class ContactController
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function all()
    {
        $query = $this->db->pdo->prepare('SELECT * FROM contact_form WHERE cf_statusi=0');
        $query->execute();

        return $query->fetchAll();
    }

    public function store($request){
        $sql = 'INSERT INTO contact_form (cf_firstname, cf_lastname, cf_gender, cf_email, cf_country, cf_subject)
                VALUES(:cf_firstname, :cf_lastname, :cf_gender, :cf_email, :cf_country, :cf_subject)';
        
        $query = $this->db->pdo->prepare($sql);

        $query->bindParam('cf_firstname',$request['cf_firstname']);
        $query->bindParam('cf_lastname',$request['cf_lastname']);
        $query->bindParam('cf_gender',$request['cf_gender']);
        $query->bindParam('cf_email',$request['cf_email']);
        $query->bindParam('cf_country',$request['cf_country']);
        $query->bindParam('cf_subject',$request['cf_subject']);

        if($query->execute()){
            return true;
        }else{
            return false;
        }

        //return header('Location: ./contactUs.php');
    }
    public function edit($id)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM contact_form WHERE id = :id');
        $query->execute(['id' => $id]);

        return $query->fetch();
    }
    public function update($cf_id, $cf_statusi){
        $query = $this->db->pdo->prepare('UPDATE contact_form SET  cf_statusi = :cf_statusi WHERE cf_id = :cf_id');
        $query->execute([
            'cf_statusi' => $cf_statusi,
            'cf_id' => $cf_id
        ]);

        return header('Location: ./dashboard.php');
    }
    public function destroy($cf_id)
    {
        $query = $this->db->pdo->prepare('DELETE FROM contact_form WHERE cf_id = :cf_id');
        $query->execute(['cf_id' => $cf_id]);

        return header('Location: ./dashboard.php');
    }
}
