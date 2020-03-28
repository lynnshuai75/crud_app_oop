<?php
class Database {
    private $dsn = "mysql:host=localhost;dbname=crud_app_db";
    private $user ="root";
    private $pass ="";

    public $conn;

    public function __construct(){
        try{
            $this->conn = new PDO($this->dsn,$this->user,$this->pass);
         
        }
         catch(PDOException $e){
             echo $e->getMessage();
         }
    }

    //** Insert method  */
    public function insert($fname, $lname, $email,$phone){
        $sql = "INSERT INTO users (first_name,last_name,email,phone) VALUES (:fname,:lname,:email,:phone)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['fname'=>$fname, 'lname'=>$lname, 'email'=>$email, 'phone'=>$phone]);
        return true;
    }

//** Fetch all Records from database */
public function read(){
    $data = array();
    $sql = "SELECT * FROM users";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($result as $row){
        $data[] = $row;
    }
   return $data;
}

// ** get User by Id **
public function getUserById($id){
    $sql = "SELECT * FROM users WHERE id=:id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

//*** Update User */
public function update($id, $fname,$lname,$email,$phone){
    $sql = "UPDATE users SET first_name=:fname, last_name=:lname, email=:email, phone=:phone WHERE id=:id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['fname'=>$fname, 'lname'=>$lname, 'email'=>$email, 'phone'=>$phone, 'id'=>$id]);
    return true;
}

//** Delete user */
public function delete($id){
    $sql = "DELETE FROM users WHERE id=:id";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
    return true;
}

//** total Row count */
public function totalRowCount(){
    $sql = "SELECT * FROM users";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $total_rows = $stmt->rowCount();
    return $total_rows;
}

}// ** end of class Database 

//$ob = new Database();
//echo $ob->totalRowCount();



?>