<?php
/**
 * Insert ,Uploda, Delete Images
 */
 class Image {
   private $_db;
   protected $upload_dir = SITE_ROOT.DS.'public'.DS.'image';
   public $uploaded = array();
   public $allowed = array('jpeg', 'png', 'jpg', 'svg');

   public function __construct() {
     $this->_db = Database::getInstance();
   }

   public function attach_file($image) {
     $image = $_FILES['image'];
     foreach ($image['name'] as $position => $img_name) {
       $img_temp = $image['tmp_name'][$position];
       $img_size = $image['size'][$position];
       $img_error = $image['error'][$position];

       $img_ext = explode('.', $img_name);
       $img_ext = strtolower(end($img_ext));

       if (in_array($img_ext, $this->allowed)) {

         if ($img_size <= 5097152) {
           $img_name_new = uniqid('', true) . '.' . $img_ext;
           $target_path = $this->upload_dir .DS. $img_name_new;

           if (move_uploaded_file($img_temp, $target_path)) {
             $fields = array(
               'img_name' => $img_name_new,
               'album_name' => 'This is a demo',
               'date_time' => date('Y-m-d H:i:s'),
               'prf_id' => 1
             );
               if ($this->_db->insert('image',$fields)) {
                 echo "Added Image";
               } else {
                  throw new Exception("Error Occur While Uploading Images");
               }
             // Test Purpose Only
             $uploaded[$position] = $target_path;
           }
         }
       }
     }
   }

   // Delete Images
   public function delete($del) {
     $name  = $this->_db->get('image', array('`img_id`', '=', $del));
     foreach ($name->result() as $name) {
       if ($this->_db->delete('image' , array('`img_id`', '=', $del))) {
         $target_path = $this->upload_dir.DS.$name->img_name;
         unlink($target_path);
         // TODO: Display Image Delete Meassage
         // TODO: Rediret to Images
       } else { throw new \Exception("Error Processing Request", 1); }
     }
   }
 }
 ?>
