<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/models/UserModel.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/PostController.php";

class UserController
{
    private $email;
    private $username;
    private $password;
    private $id;
    private $avatar;
    private $imageCouverture;
    private $post = [];
  

    private $userModel;

    private const MIN_PASSWORD_LENGTH = 5;

    function __construct($email, $password, $username)
    {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;

        $this->userModel = new UserModel($email, $password, $username);
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of avatar
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Get the value of imageCouverture
     */
    public function getImageCouverture()
    {
        return $this->imageCouverture;
    }

    function signupUser()
    {
        $userModel = new UserModel($this->email, $this->password, $this->username);
        $userModel->addToDB();
    }

    function isEmailValid(): bool
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    function isPasswordValid(): bool
    {
        return strlen($this->password) >= self::MIN_PASSWORD_LENGTH;
    }

    function usernameValid() :bool{
        return filter_var($this->username, FILTER_DEFAULT);
      }

    function isDataValid(): bool
    {
        return $this->isEmailValid() && $this->isPasswordValid();
    }

    function getErrors(){
        $errors = [];

        !$this ->isEmailValid() ? array_push($errors, "emailError=InputInvalid") : null;
        !$this ->isPasswordValid() ? array_push($errors, "passwordError=InputInvalid") : null;
        !$this ->usernameValid() ? array_push($errors, "usernameError=InputInvalid") : null;
        if($_POST['password'] !== $_POST['passwordConfirm']){
             array_push($errors, "passwordConfirmError=InputInvalid");
        }
        return join("&", $errors);
      }

    function exist(){
        $userModel = new UserModel($this -> email, $this -> password,$this -> username);
        
        $userTab = $userModel -> fetch(); 
        
        if(count($userTab) === 0){
          return false;
        }
        
        $this -> id = $userTab['id'];
        $this -> avatar = $userTab['avatar'];
        $this -> imageCouverture = $userTab['imageCouverture'];
    
        return true;
      }
    
      function isPasswordCorrect(){
        $userFromDB = $this -> userModel -> fetch();
    
        return $userFromDB['password'] === $this -> password;
      }

      
      static function dataProfil($email){
        $profilUser = UserModel::fetchProfil($email);
        return $profilUser;
      }



      static function createUserFromId($id){
        $userFromDB = UserModel::fetchByID($id);
        $controller = new self($userFromDB['email'], $userFromDB['password'],$userFromDB['username']);
        $controller -> id = $id;
        $controller -> imageCouverture = $userFromDB['imageCouverture'];
        $controller -> avatar = $userFromDB['avatar'];
        
        
        
        return $controller;
      }
    
      function isImageValidAvatar($avatar){
        $imageInfo = pathinfo($avatar['name']);
    
        return in_array($imageInfo['extension'], array('jpg', 'jpeg', 'png', 'gif', 'svg'));
      }
    
      function saveImageAvatar($avatar){
        $imageInfo = pathinfo($avatar['name']);
        $image = $_SESSION['id'].'.'.$imageInfo['extension'];
        copy($avatar['tmp_name'], '../images/avatar/'. $image);
    
        //Utiliser le model pour mettre a jour user dans la DB.
        $this ->userModel -> saveAvatarToDB($image);
        return $image;
      }
      
      function isImageValidCouverture($imageCouverture){
        $imageInfo = pathinfo($imageCouverture['name']);
    
        return in_array($imageInfo['extension'], array('jpg', 'jpeg', 'png', 'gif', 'svg'));
      }
    
      function saveImageCouverture($imageCouverture){
        $imageInfo = pathinfo($imageCouverture['name']);
        $image = $_SESSION['id'].'.1.'.$imageInfo['extension'];
        copy($imageCouverture['tmp_name'], '../images/couverture/'. $image);
    
        //Utiliser le model pour mettre a jour user dans la DB.
        $this ->userModel -> saveCouvertureToDB($image);
        return $image;
      }

      function addPost($postContent,$postTitle,$postImage){
        $todoController = new PostController($postContent,$postTitle,$postImage, $this -> id);
    
        $todoController -> addPost();
      }
    

    /**
     * Get the value of post
     */ 
    public function getPost()
    {
        return $this->post;
    }

    static function createPostFromId($id){
      $postFromDB = PostController::fetchAll($id);
      $controller = new self("","","","");
      
      $controller -> post = PostController::fetchAll($id);
      
      return $controller;
      var_dump($controller);
    }

    
}
