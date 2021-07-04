<?php
/**
 * CRUD user
 * Log in
 * Handle permission
 * Generate random string
 */
class User {
  private $_db, $_data, $_sessionName, $_isLoggedIn, $_cookieName;

  public function __construct($user = null) {
    $this->_db = Database::getInstance();
    $this->_sessionName = Config::get('session/session_name');
    $this->_cookieName = Config::get('remember/cookie_name');

    if (!$user) {
      if (Session::exists($this->_sessionName)) {
        $user = Session::get($this->_sessionName);

        if ($this->find($user)) {
          $this->_isLoggedIn = true;
        } else {
          $this->logout();
        }
      }
    } else {
      $this->find($user);
    }
  }

  public function create($table, $fields = array()) {
    if (!$this->_db->insert($table, $fields)) {
      throw new Exception("Error Occur While Creating Account");
    }
  }

  public function update($column, $attribute ,$fields = array()) {

    if (!$this->_db->update('user' , $column, $attribute, $fields)) {
      throw new Exception("Error Processing Update");
    }
  }

  // Find and Extract User
  public function find($user = null) {
    if($user) {
      $field = (is_numeric($user)) ? 'usr_id' : 'email';
      $data = $this->_db->get('user', array($field, '=', $user));
      if ($data->count()) {
        $this->_data = $data->first();
        return true;
      }
    }
    return false;
  }

  //Login
  public function login($email = null, $password = null, $remember = false) {
    if (!$email && !$password && $this->exists()) {
      Session::set($this->_sessionName, $this->data()->usr_id);
    } else {
      $confirm = $this->_db->get('user', array('email', '=', $email));
      foreach ($confirm->result() as $confirm) {
        if($confirm->confirm == '1') {
          $user = $this->find($email);

          if ($user) {
            if ($this->data()->password == Hash::make($password, $this->data()->salt)) {
              Session::set($this->_sessionName, $this->data()->id);

              if($remember) {
                $hash = Hash::unique();
                $hashCheck = $this->_db->get('user_session' , array('user_id', '=', $this->data()->id));

                if (!$hashCheck->count()) {
                  $this->_db->insert('user_session', array(
                    'user_id' => $this->data()->usr_id,
                    'hash' => $hash
                  ));
                } else {
                  $hash = $hashCheck->first()->hash;
                }
                Cookie::set($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
              }
              return true;
            }
          }
        }
      }

    }
    return false;
  }

  public function logout() {
    $this->_db->delete('user_session', array('user_id', '=', $this->data()->usr_id));
    Session::destroy($this->_sessionName);
    Cookie::destroy($this->_cookieName);
  }

  //Create Random String
  public static function generateRandomString($length = null) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

  private function exists() {
    return (!empty($this->_data)) ? true: false;
  }

  public function data() {
    return $this->_data;
  }

  public function isLoggedIn() {
    return $this->_isLoggedIn;
  }

  public function permission($key) {
    $category = $this->_db->get('category', array('id', '=', $this->data()->category));

    if ($category->count()) {
      $permissions = json_decode($category->first()->permission, true);
      if ($permissions[$key] == true) {
        return true;
      }
    }
    return false;
  }

}
 ?>
