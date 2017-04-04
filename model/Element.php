<?php

class Element
{
	protected static $db = null;

	protected static $table = '';
	protected static $primaryKey = '';
	//Must be declared on subclases

	public function getId()
	{
		$primaryKey = static::$primaryKey;
		return $this->$primaryKey;
	}

	public static function getDb()
	{
		if (! self::$db instanceof PDO) {
			$DB_host = "localhost";
			$DB_user = "root";
			$DB_pass = "";
			$DB_name = "dblogin";

			self::$db =new PDO("mysql:dbname=".$DB_name.";host=".$DB_host,$DB_user,$DB_pass);
			self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		return self::$db;
	}

	public static function getById($id)
	{
		$objectArray = array();
		$return = null;

		try {
			$query = 'SELECT * FROM '.static::$table.' WHERE '.static::$primaryKey.' =:binded'.static::$primaryKey;

			$stmt = $this->db->prepare($query);
			$stmt->bindparam(':binded'.static::$primaryKey, $id);
			$stmt->execute();

			$objectArray = $stmt->fetch(PDO::FETCH_ASSOC);

			$obj = new static();
			$obj->init($objectArray);

			$return = $obj;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}

		return $return;
	}

	public function init($objectArray = array())
	{
		if (!(is_array($objectArray)) && !(is_object($objectArray))) {
			$objectArray = array();
		}

		foreach ($objectArray as $attribute => $value) {
			$this->$attribute = $value;
		}
	}

	public static function getList($params = array())
	{
    $listObjs = array();

		//Prepare the query
    $query = 'SELECT * FROM '.static::$table;
     if (count($params)) {
        $query .= ' WHERE ';

        $i = 0;
        foreach ($params as $column => $value) {
            $i++;
            if ($i > 1) {
               $query .= ' AND ';
            }
            $query .= $column.'=:binded'.$column;
        }
    }

		try {
			$stmt = self::getDb()->prepare($query);

			//Bind  the params
	    foreach ($params as $column => $value) {
				$stmt->bindparam(':binded'.$column, $params[$column]);
	    }

			$stmt->execute();

	    $ObjsArray = $stmt->fetchAll(PDO::FETCH_ASSOC);

	    foreach ($ObjsArray as $ObjArray) {
	      $obj = new static();
	      $obj->init($ObjArray);

	      $listObjs[] = $obj;
	    }
		} catch (PDOException $e) {
			echo $e->getMessage();
		}

    if (is_array($listObjs)) {
			return $listObjs;
		} else {
			return null;
		}
  }

	public static function getOne($params) {

		$objects = self::getList($params);

		if (is_array($objects) && isset($objects[0])) {
			return $objects[0];
		} else {
			return null;
		}
	}

	public function update()
	{
		$primaryKey = static::$primaryKey;
		$return = 0;

		if(isset($this->$primaryKey) && $this->$primaryKey != '') {
			try {
				//Preparing of string for PDO's prepare function
				// Ex : $stmt = self::getDb()->prepare("UPDATE users SET user_name=:uname , user_pass=:upass , user_date=:udate , user_description=:udescription WHERE user_id=:uid ");
				$bindString = 'UPDATE '.static::$table;

				$vars = get_object_vars($this);
				foreach ($vars as $attribute => $value) {
					if ($attribute != $primaryKey) {
						$i++;
						if ($i > 1) {
							$bindString .= ',';
						} elseif ($i == 1) {
							$bindString .= ' SET';
						}
						$bindString .= ' '.$attribute.'=:binded'.$attribute;
					}
				}

				$bindString .= ' WHERE '.$primaryKey.'=:binded'.$primaryKey;

				$stmt = self::getDb()->prepare($bindString);

				//Bind  the params
				foreach ($vars as $attribute => $value) {
					if ($attribute != $primaryKey) {
						$stmt->bindparam(':binded'.$attribute, $vars[$attribute]);
					}
				}
				$stmt->bindparam(':binded'.$primaryKey, $this->$primaryKey);

				//Exec query
				$return = $stmt->execute();
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		} else {
			try {
				//Preparing of string for PDO's prepare function
				// Ex : $stmt = self::getDb()b->prepare("INSERT INTO users SET user_name=:uname , user_pass=:upass , user_date=:udate , user_description=:udescription");
				$bindString = 'INSERT INTO '.static::$table;

				$i = 0;
				$vars = get_object_vars($this);
				foreach ($vars as $attribute => $value) {
					if ($attribute != $primaryKey) {
						$i++;
						if ($i > 1) {
							$bindString .= ',';
						} elseif ($i == 1) {
							$bindString .= ' SET';
						}
						$bindString .= ' '.$attribute.'=:binded'.$attribute;
					}
				}

				$stmt = self::getDb()->prepare($bindString);
				//Bind  the params
				foreach ($vars as $attribute => $value) {
					if ($attribute != $primaryKey) {
						$stmt->bindparam(":binded".$attribute, $vars[$attribute]);
					}
				}

				//Exec query
				$return = $stmt->execute();

				if ($return) {
					$this->$primaryKey = self::getDb()->lastInsertId();
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}

		if (method_exists($this, 'myAfterUpdate')) {
			$return = $this->myAfterUpdate();
		}

		return $return;
	}

	public function delete()
	{
		$primaryKey = static::$primaryKey;
		$return = false;

		if(isset($this->$primaryKey) && $this->$primaryKey != "") {
			try {
				$query = 'DELETE FROM '.static::$table.' WHERE '.static::$primaryKey.' =:binded'.static::$primaryKey;

				$stmt = self::getDb()->prepare($query);
				$stmt->bindparam(':binded'.static::$primaryKey, $this->$primaryKey);
				$return = $stmt->execute();

				if (method_exists($this, 'myAfterDelete')) {
					$return = $this->myAfterDelete();
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}

		return $return;
	}
}
