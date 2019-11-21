<?php
   include_once 'admin/database.php';
   include_once 'admin/Format.php';
   ?>
<?php
   class showProduct
   {
    
    private $db;
      private $fm;
      function __construct()
      {
          $this->db = new Database();
          $this->fm = new Format();
      }
   
   
    public function getAllproduct(){
          $query ="SELECT * FROM product ORDER BY id DESC" ;
          $getpd=$this->db->select($query);
          if ($getpd) {
            return $getpd;
          }
      }
      
      public function getAllFeture(){
        $query ="SELECT * FROM product WHERE type=1 ORDER BY id DESC";
        $getpd=$this->db->select($query);
        if ($getpd) {
            return $getpd;
          }
      }
      public function getAllGeneral(){
          $query ="SELECT * FROM product WHERE type=0 ORDER BY id DESC" ;
          $getpd=$this->db->select($query);
          if ($getpd) {
            return $getpd;
          }
      }
      
       public function getctproduct($id){
          $query="SELECT product.*,category.categoryName FROM product INNER JOIN category ON product.catid=category.id WHERE category.id='$id' ORDER BY id DESC" ;
          $getpd=$this->db->select($query);
          if ($getpd) {
            return $getpd;
          }
      }
      public function reletedProduct($id){
          $query ="SELECT * FROM product WHERE catid='$id'" ;
          $getpd=$this->db->select($query);
          if ($getpd) {
            return $getpd;
          }
      }
   
    
      public function detailspd($id){
          $query="SELECT product.*,category.categoryName FROM product INNER JOIN category ON product.catid=category.id WHERE product.id='$id'" ;
          $getpd=$this->db->select($query);
          if ($getpd) {
            return $getpd;
          }
      }
   
      public function addCart($data,$id){
          $query="SELECT product.*,category.categoryName FROM product INNER JOIN category ON product.catid=category.id WHERE product.id='$id'" ;
          $getpd=$this->db->select($query)->fetch_assoc(); 
   
          $ssid=session_id();
          $pdid=$getpd['id'];
          $pdname=$getpd['productName'];
          $pdprice=$getpd['price'];
          $pdqunt=$data['qunt'];
          $image=$getpd['image'];
   
   
          $query="INSERT INTO cart(sesid, productid, pdname, price, qunat, image) 
          VALUES('$ssid','$pdid','$pdname','$pdprice','$pdqunt','$image')";
          $pdinst  = $this->db->insert($query);
          if ($pdinst) {
              header("Location:cart.php");
          }
      }
      public function pdCard(){
          $ssid=session_id();
          $query ="SELECT * FROM cart WHERE sesid='$ssid'";
          $getpd=$this->db->select($query);
          if ($getpd) {
            return $getpd;
          }
      }
   
      public function cartDlt($id){
          $query ="DELETE FROM cart WHERE cartid='$id'";
          $getpd=$this->db->Delete($query);
          if ($getpd) {
            return $getpd;
          }

      }


     


      
      public function insrtcust($data){
          $name=$data['name'];
          $address=$data['address'];
          $city=$data['city'];
          $zip=$data['zip'];
          $phone=$data['phone'];
          $email=$data['email'];
          $pass=$data['password'];
          if ($name =="" || $address =="" || $city =="" || $zip =="" || $phone =="" || $email =="" || $pass =="") {
              $msz="Must not be emplty";
              return $msz;
          }else{
   
              $query="SELECT * FROM customer WHERE email='$email' LIMIT 1";
              $getr=$this->db->select($query);
              if ($getr==true) {
                   $msz="Customer registation Failed";
                  return $msz;
              }else{
                  $query="INSERT INTO customer(address, city, zip, phone, email, pass,name) VALUES ('$address','$city','$zip','$phone','$email','$pass','$name')";
                $getr=$this->db->insert($query);
                if ($getr) {
                    $msz="Customer registation Success";
                    return $msz;
                }
            }
   
        }
    }


     public function cstlogin($data){
        $email=$data['email'];
        $pass=$data['pass'];
        if (empty($email) || empty($pass)) {
            $msz="empty";
            return $msz;
        }else{
            $query="SELECT * FROM customer WHERE email='$email' AND pass='$pass'";
            $get=$this->db->select($query);
            if ($get==true) {
                $value=$get->fetch_assoc();
                Session::set("clogin",true);
                Session::set("id",$value['cid']);
                Session::set("name",$value['name']);
                header("Location:index.php");
            }
        }
    }



    public function DeleteCart(){
      $id=session_id();
      $query="DELETE FROM cart WHERE sesid='$id'";
      $get=$this->db->Delete($query);
      if ($get) {
            return $get;
          }
    }

    public function getCustmerInfo($id){
      $query="SELECT * FROM customer WHERE cid='$id'";
      $get=$this->db->select($query);
      if ($get) {
            return $get;
          }
    }

    public function UpdateCustomerInfo($data,$id){
          $name=$data['name'];
          $address=$data['address'];
          $city=$data['city'];
          $zip=$data['zip'];
          $phone=$data['phone'];
          $email=$data['email'];


          $query="UPDATE customer SET
                  address='$address',
                  city='$city',
                  zip='$zip',
                  phone='$phone',
                  email='$email',
                  name='$name'
                  WHERE cid='$id'";

          $getr=$this->db->update($query);
          return $getr;
          
    }

    public function ProductForPayment(){
      $id=session_id();
      $query="SELECT * FROM cart WHERE sesid='$id'";
      $get=$this->db->select($query);
      if ($get) {
            return $get;
          }
    }


    public function InsertOrder($cid){
      $id=session_id();
      $query="SELECT * FROM cart WHERE sesid='$id'";
      $get=$this->db->select($query);
      if ($get) {
        while ($res=$get->fetch_assoc()) {
          $productid=$res['productid'];
          $productname=$res['pdname'];
          $quntutuy=$res['qunat'];
          $price=$res['price'];
          $image=$res['image'];


          $query="INSERT INTO corder(cmid, productid, productname, quntutuy, price, image,st) VALUES ('$cid','$productid','$productname','$quntutuy','$price','$image','0')";

          $getpr=$this->db->insert($query);
          
        }
        $query ="DELETE FROM cart WHERE sesid='$id'";
        $getpd=$this->db->Delete($query);
        header("Location:success.php");
      }
    }

   

    public function pdorder($id){
          $query ="SELECT * FROM corder WHERE cmid='$id'";
          $getpd=$this->db->select($query);
          if ($getpd) {
            return $getpd;
          }
      }

    public function getCategory(){
      $query ="SELECT * FROM category";
      $getpd=$this->db->select($query);
      if ($getpd) {
            return $getpd;
          }
    }

  public function getitlename($id){
    $query ="SELECT * FROM category WHERE id='$id'";
    $getpd=$this->db->select($query);
    if ($getpd) {
            return $getpd;
          }
  }



  public function deleteOrder($id){
    $query ="DELETE FROM corder WHERE id='$id'";
    $getpd=$this->db->Delete($query);
    header("Location:orderdtls.php");
  }

  public function getCat()
       {
           $query  = "SELECT * FROM category ORDER BY id DESC";
           $getCat = $this->db->select($query);
           return $getCat;
       }
  public function srch($data){
    $query  = "SELECT * FROM product WHERE productName LIKE '%$data%'";
    $getCat = $this->db->select($query);
    if ($getCat) {
      return $getCat;
    }
  }




  public function limit_words($string, $word_limit)
    {
        $words = str_word_count($string, 1);
        return implode(" ",array_splice($words,0,$word_limit));
    }
}
   
?>