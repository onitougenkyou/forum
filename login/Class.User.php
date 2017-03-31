<?php
class USER
{
    private $db;
    public $passChange;

    function __construct($DB_con)
    {
      $this->db = $DB_con;
      $this->loadUser();

    }
    public function loadUser()
    {
      if( isset($_SESSION['user_session']))
      {
        $user_id = $_SESSION['user_session'];
        $stmt =   $this->db->prepare("SELECT * FROM users WHERE user_id=:user_id");
        $stmt->execute(array(":user_id"=>$user_id));
        $this->data = $stmt->fetch(PDO::FETCH_ASSOC);

        // var_dump($this);
        //var_dump($this);

      } else {
        $this->data = [];
        $this->data['user_role'] = 0;
      }

    }
    public function register($fname,$lname,$uname,$umail,$upass)
    {
       try
       {
           $new_password = password_hash($upass, PASSWORD_DEFAULT);

           $stmt = $this->db->prepare("INSERT INTO users(user_name,user_email,user_pass)
                                                       VALUES(:uname, :umail, :upass)");

           $stmt->bindparam(":uname", $uname);
           $stmt->bindparam(":umail", $umail);
           $stmt->bindparam(":upass", $new_password);
           $stmt->execute();

           return $stmt;
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
    }

    public function login($uname,$umail,$upass)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM users WHERE user_name=:uname OR user_email=:umail LIMIT 1");
          $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
          $this->data = $stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if(password_verify($upass, $this->data['user_pass']))
             {
                $_SESSION['user_session'] = $this->data['user_id'];
                return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }

   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }

   public function redirect($url)
   {
       header("Location: $url");
   }

   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        unset($_SESSION['user_role']);
        return true;
   }
   public function checkDroit ($levelAsk)
   {
        if($levelAsk <= $this->data['user_role'])
        {
          return true;
        }
        else
        {
          return false;
        }
   }
   public function changeRole($userId,$rank)
   {
     $asRank = $this->checkDroit(4);
     $stmt = $this->db->prepare("SELECT user_role FROM users WHERE user_id=:uid ");
     $stmt->bindparam(":uid", $userId);
     $stmt->execute();
     $rankToChange = $stmt->fetch(PDO::FETCH_ASSOC);

     if($asRank == true && $rank < $this->data['user_role'] && $rankToChange['user_role'] < $this->data['user_role'])
     {
       $stmt = $this->db->prepare("UPDATE users SET user_role=:urank WHERE user_id=:uid ");
       $stmt->bindparam(":urank", $rank);
       $stmt->bindparam(":uid", $userId);
       $stmt->execute();
     }
   }
   //à vérifier
   public function modification($uname,$upass,$unameFamily,$umail,$udate,$udescription)
   {
     try {


       if($this->passChange == true)
       {
         $new_password = password_hash($upass, PASSWORD_DEFAULT);
         $this->passChange = false;
       }
       else {
         $new_password= $upass;
       }

       $stmt = $this->db->prepare("UPDATE users SET user_name=:uname , user_pass=:upass , user_name_family=:unameFamily , user_email=:umail , user_date=:udate , user_description=:udescription
         WHERE user_id=:uid ");
         $stmt->bindparam(":uname", $uname);
         $stmt->bindparam(":upass", $new_password);
         $stmt->bindparam(":unameFamily", $unameFamily);
         $stmt->bindparam(":umail", $umail);
         $stmt->bindparam(":udate", $udate);
         $stmt->bindparam(":udescription", $udescription);
         $stmt->bindparam(":uid", $this->data['user_id']);
         $stmt->execute();
         //$this->data = $stmt->fetch(PDO::FETCH_ASSOC);
         $this->loadUser();

     } catch (PDOException $e) {
      // echo  "date: ".$udate;
       echo $e->getMessage();

     }



   }
}
?>
