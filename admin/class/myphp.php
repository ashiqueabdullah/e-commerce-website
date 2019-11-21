<?php
   include_once 'database.php';
   include_once 'Format.php';
   ?>
<?php


   class category
   {
       private $db;
       private $fm;
       function __construct()
       {
           $this->db = new Database();
           $this->fm = new Format();
       }
       public function ctinsert($ctname)
       {
           $ctname = $this->fm->validation($ctname);
           if (empty($ctname)) {
               $msz = "<span class='error'>Category fild must not be empty</span>";
               return $msz;
           } else {
               $query = "INSERT INTO category(CategoryName) VALUES ('$ctname')";
               $inct  = $this->db->insert($query);
               if ($inct) {
                   $msz = "<span class='succ'>Category insert Successfully</span>";
                   return $msz;
               } else {
                   $msz = "<span class='error'>Category insert Failed</span>";
                   return $msz;
               }
           }
       }
       
       public function getCat()
       {
           $query  = "SELECT * FROM category ORDER BY id DESC";
           $getCat = $this->db->select($query);
           return $getCat;
           if ($getCat) {
             return $getCat;
           }
       }
       public function getCatById($id)
       {
           $query  = "SELECT * FROM category WHERE id='$id'";
           $getCat = $this->db->select($query);
           if ($getCat) {
             return $getCat;
           }
       }
       public function ctupdate($ctname, $id)
       {
           if (empty($ctname)) {
               $msz = "<span class='error'>Category Must not be empty</span>";
               return $msz;
           } else {
               $query   = "UPDATE category SET categoryName='$ctname' WHERE id='$id'";
               $updtCat = $this->db->update($query);
               if ($updtCat) {
                   $msz = "<span class='succ'>Category Update Success</span>";
                   return $msz;
               } else {
                   $msz = "<span class='error'>Category Update Failed</span>";
                   return $msz;
               }
               return $updtCat;
           }
           
       }
       public function dlt($id)
       {
           $query  = "DELETE FROM category  WHERE id='$id'";
           $dltCat = $this->db->update($query);
       }
   }





   //Add product
  class product
 {
  
  private $db;
    private $fm;
    function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function productInst($data,$file){
      $productName=$data['pdname'];
        $productName=$this->fm->validation($productName);
      $price=$data['price'];
        $price=$this->fm->validation($price);
      $catid=$data['catid'];
        $catid=$this->fm->validation($catid);
        $type=$data['type'];
        $type=$this->fm->validation($type);
      $image=$file['image'];
      $body=$data['body'];
        $body=$this->fm->validation($body);

        $file_name = $file['image']['name'];
        $file_temp = $file['image']['tmp_name'];

        move_uploaded_file($file_temp,"uploads/".$file_name);

      if ($productName == "" || $price == "" || $catid == "" || $image == "" || $body == "") {
        $msz = "<span class='error'>Filed mus not be empty</span>";
            return $msz;
      }else{
            $query="INSERT INTO product(productName, price, catid, image, body,type) VALUES ('$productName','$price','$catid','$file_name','$body','$type')";
        $pdinst  = $this->db->insert($query);
            if ($pdinst) {
                $msz = "<span class='succ'>Product insert Successfully</span>";
                return $msz;
            } else {
                $msz = "<span class='error'>Product insert Failed</span>";
                return $msz;
            }
      }
  }

    public function gteAllproduct($id){
        $query="SELECT * FROM product WHERE id='$id'";
        $res=$this->db->select($query);
        if ($res) {
          return $res;
        }
    }
    public function dltProduct($id){
        $query  = "DELETE FROM product WHERE id='$id'";
        $dltCat = $this->db->update($query);
        if ($dltCat) {
          return $dltCat;
        }
    }

    public function update($data, $file,$id){
        $productName=$data['pdname'];
        $productName=$this->fm->validation($productName);
        $price=$data['price'];
        $price=$this->fm->validation($price);
        $catid=$data['catid'];
        $catid=$this->fm->validation($catid);
        $type=$data['type'];
        $type=$this->fm->validation($type);
        $image=$file['image'];
        $body=$data['body'];
        $body=$this->fm->validation($body);

        
        $file_name = $file['image']['name'];
        $file_temp = $file['image']['tmp_name'];

        move_uploaded_file($file_temp,"uploads/".$file_name);



        if ($productName == "" || $price == "" || $catid == "" || $image == "" || $body == "") {
            $msz = "<span class='error'>Filed mus not be empty</span>";
            return $msz;
        }else{
            $query="UPDATE product SET 
                    productName='$productName',
                    price='$price',
                    catid='$catid',
                    image='$file_name',
                    body='$body',
                    type='$type'
                    WHERE id='$id'
                    ";
        $pdinst  = $this->db->insert($query);
            if ($pdinst) {
                $msz = "<span class='succ'>Product insert Successfully</span>";
                return $msz;
            } else {
                $msz = "<span class='error'>Product insert Failed</span>";
                return $msz;
            }
        }


    }
    public function gteAllproductforlist(){
        $query="SELECT product.*,category.categoryName FROM product INNER JOIN category ON product.catid=category.id  ORDER BY product.id DESC";
        $res=$this->db->select($query);
        if ($res) {
          return $res;
        }
    }
    public function dltProductforlist($id){
        $query  = "DELETE FROM product WHERE id='$id'";
        $dltCat = $this->db->update($query);
        if ($dltCat) {
          return $dltCat;
        }
        
    }






 }


 //Product list
 /**
  * 
  */
 class getproduct
 {
   
  private $db;
  private $fm;
  function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function getorder(){
    $query="SELECT corder.*,customer.name,customer.address FROM corder INNER JOIN customer ON customer.cid=corder.cmid WHERE st='0'";
    $res=$this->db->select($query);
    if ($res) {
      return $res;
    }
    
  }

  public function delete($id){
    $query  = "DELETE FROM corder WHERE id='$id'";
    $dltCat = $this->db->update($query);
    if ($dltCat) {
      return $dltCat;
    }
  }
  public function shipd($id){
    $query="UPDATE corder SET st='1' WHERE id='$id'";
    $dltCat = $this->db->update($query);
    if ($dltCat) {
      return $dltCat;
    }
  }
  public function getshipd(){
    $query="SELECT corder.*,customer.name,customer.address FROM corder INNER JOIN customer ON customer.cid=corder.cmid WHERE st='1'";
    $res=$this->db->select($query);
    if ($res) {
      return $res;
    }
  }

  public function getCustonInfo($id){
    $query="SELECT * FROM customer WHERE cid='$id'";
    $res=$this->db->select($query);
    if ($res) {
      return $res;
    }
  }
 }
 