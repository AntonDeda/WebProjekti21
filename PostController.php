<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include './config/Database.php';

class PostController
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function all()
    {
        $sql = 'SELECT * FROM user_posts inner join news_kategory on news_kategory.category_id = user_posts.category_id';
        
        $query = $this->db->pdo->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    public function yourPost(){
        $sql = 'SELECT * FROM user_posts inner join users on user_posts.post_author = users.name';
        $query = $this->db->pdo->prepare($sql);

        $query->execute();

        return $query->fetchAll();
    }

    public function selectByCategory($category_id){
        $sql = 'SELECT * FROM user_posts inner join news_kategory on user_posts.category_id = news_kategory.category_id WHERE user_posts.category_id = :category_id';
        $query = $this->db->pdo->prepare($sql);

        $query->execute(['category_id' => $category_id]);

        return $query->fetchAll();
    }
    
    //store po funksionon
    public function store($request)
    {
        $query = $this->db->pdo->prepare('INSERT INTO user_posts(post_title, post_body, image, category_id, post_author) VALUES(:title, :body, :image, :kategoria, :post_author)');
        
        $query->bindParam(':title', $request['title']);
        $query->bindParam(':body', $request['body']);
        $query->bindParam(':image', $request['image']);
        $query->bindParam(':kategoria', $request['kategoria']);
        $query->bindParam(':post_author', $request['post_author']);
        $query->execute();
        
        return header('Location: ./addPosts.php');
    }

    public function edit($id)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM user_posts WHERE id = :id');
        $query->execute(['id' => $id]);

        return $query->fetch();
    }
    public function update($post_id, $request)
    {                
        $query = $this->db->pdo->prepare('UPDATE user_posts SET  post_body = :post_body, image = :image WHERE post_id = :post_id');
        $query->execute([
            //'post_title' => $request['post_title'],
            'post_body' => $request['post_body'],
            'image' => $request['image'],
            //'category_id' => $request['category_id'],
            'post_id' => $post_id
        ]);

        return header('Location: ./addPosts.php');
    }
    public function destroy($post_id)
    {
        $query = $this->db->pdo->prepare('DELETE FROM user_posts WHERE post_id = :post_id');
        $query->execute(['post_id' => $post_id]);

        return header('Location: ./index.php');
    }
    public function top4(){
        $sql = 'SELECT * FROM user_posts ORDER BY post_id DESC LIMIT 4';
        
        $query = $this->db->pdo->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}
