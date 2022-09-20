<?php

class Model
{

    public static $conn = '';
    private static $EncryptionMethod = "AES-256-CBC";
    private static $SecretHash = 'mindbox';
    private static $SecretKey = "mindbox";
    private static $SecretIv = "mindbox";
    protected $table;

    public $result;

    function __construct()
    {
        $servername = SERVERDB;
        $username = USERNAMEDB;
        $password = PASSWORDDB;
        $dbname = DBNAMEDB;
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try {
            self::$conn = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password, $options);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$conn;
        } catch (PDOException $err) {
            PhpError($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine());
        }

//        self::$SecretKey = md5('mindbox_courses_cheshmi');
    }

    function Select($sql, $values = [], $fetch = 'fetchAll', $fetchStyle = PDO::FETCH_OBJ, $rowCount = false)
    {
        $query = self::$conn->prepare($sql);
        if ($values != null)
            foreach ($values as $key => $value)
                $query->bindValue($key + 1, $value);
        $query->execute();
        if ($fetch == 'fetchAll')
            if ($rowCount != true)
                $result = $query->fetchAll($fetchStyle);
            else
                $result = $query->rowCount();
        else
            if ($rowCount != true)
                $result = $query->fetch($fetchStyle);
            else
                $result = $query->rowCount();
        return $result;
    }

    function SelectAll($table)
    {
        $sql = "SELECT * FROM `{$table}`";
        $query = self::$conn->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function where($table, $key, $value)
    {
        $sql = "SELECT * FROM `{$table}` WHERE `{$key}` = ?";
        $query = self::$conn->prepare($sql);
        $query->bindValue(1, $value);
        $query->execute();
        return $query ? $query->fetch(PDO::FETCH_OBJ) : false;
    }

    function where_all($table, $key, $value)
    {
        $sql = "SELECT * FROM `{$table}` WHERE `{$key}` = ?";
        $query = self::$conn->prepare($sql);
        $query->bindValue(1, $value);
        $query->execute();
        return $query ? $query->fetchAll(PDO::FETCH_OBJ) : false;
    }

    public function find($key, $value)
    {
        return self::where($this->table, $key, $value);
    }

    public function find_all($key, $value)
    {
        return self::where_all($this->table, $key, $value);
    }

    public function all()
    {
        return self::SelectAll($this->table);
    }

    public function count($table)
    {
        $sql = "SELECT * FROM `{$table}`";
        $query = self::$conn->prepare($sql);
        $query->execute();
        return $query->rowCount();
    }

    public function count_all()
    {
        return self::count($this->table);
    }

    public function count_where($table, $key, $value)
    {
        $sql = "SELECT * FROM `{$table}` WHERE `{$key}` = ?";
        $query = self::$conn->prepare($sql);
        $query->bindValue(1, $value);
        $query->execute();
        return $query->rowCount();
    }

    public function count_all_where($key, $value)
    {
        return self::count($this->table, $key, $value);
    }

    public function count_all_table($table)
    {
        return self::count($table);
    }

    function Query($sql, $values = [])
    {
        $query = self::$conn->prepare($sql);
        foreach ($values as $key => $value)
            $query->bindValue($key + 1, $value);
        $query->execute();
        return ($query) ? true : false;
    }

    function thumbnail($file, $pathToSave, $w, $h = '', $crop = false)
    {

        $new_height = $h;

        list($width, $height) = getimagesize($file);

        $r = $width / $height;

        if ($crop) {
            if ($width > $height) {
                $width = ceil($width - ($width * abs($r - $w / $h)));
            } else {
                $height = ceil($height - ($height * abs($r - $w / $h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w / $h > $r) {
                $newwidth = $h * $r;
                $newheight = $h;
            } else {
                $newheight = $w / $r;
                $newwidth = $w;
            }
        }

        $what = getimagesize($file);

        switch (strtolower($what['mime'])) {
            case 'image/png':
                $src = imagecreatefrompng($file);

                break;
            case 'image/jpeg':
                $src = imagecreatefromjpeg($file);
                break;
            case 'image/gif':
                $src = imagecreatefromgif($file);
                break;
            default:
                //die();
        }

        if ($new_height != '') {
            $newheight = $new_height;
        }

        $dst = imagecreatetruecolor($newwidth, $newheight);//the new image
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);//az function

        imagejpeg($dst, $pathToSave, 95);

        return $dst;


    }

    function security($value)
    {
        $lev = trim($value);
        $lev2 = htmlentities($lev);
        $lev3 = htmlspecialchars($lev2);
        $lev4 = strip_tags($lev3);
        return $lev4;
    }

    public static function redirect($URI, $back = null)
    {
        $URI = DOMAIN . '/' . $URI;
        if ($back === null) {
            @header("Location: " . $URI);
            echo "<meta http-equiv='refresh' content='0; url={$URI}' />";
            echo "<script>window.location.href = '{$URI}';</script>";
        } else {
            $UrIBack = DOMAIN . '/' . $back;
            @header("Location: " . $UrIBack);
            echo "<meta http-equiv='refresh' content='0; url={$UrIBack}' />";
            echo "<script>window.location.href = '{$UrIBack}';</script>";
        }
    }

    public static function error404()
    {
        self::redirect('errors/error404');
    }

    public static function SessionStart()
    {
        if (!isset($_SESSION)) session_start();
    }

    public static function SessionSet($session_name, $session_value)
    {
        $_SESSION[$session_name] = $session_value;
    }

    public static function SessionGet($session_name)
    {
        if (isset($_SESSION[$session_name])) return $_SESSION[$session_name]; else false;
    }

    public static function SessionRemove($session_name)
    {
        if (isset($_SESSION[$session_name]))
            unset($_SESSION[$session_name]);
    }

    public function buildNum($table_name, $columns_name, $build_num, $type_encrypt = "encrypt")
    {
        $model = new Model();
        switch ($type_encrypt) {
            case "encrypt":
                $build_num = $model->encrypt($build_num);
                break;
            case "md5":
                $build_num = md5($build_num);
                break;
        }
        $query = $model->Select("SELECT `{$columns_name}` FROM `{$table_name}` WHERE `{$columns_name}` = ?", [$build_num], 'fetch', PDO::FETCH_OBJ, true);
        if ($query > 0) {
            self::buildNum($table_name, $columns_name, $build_num);
        } else {
            return $build_num;
        }
    }

    public function encrypt($value)
    {
        $key = hash('sha256', self::$SecretKey);
        $iv = substr(hash('sha256', self::$SecretIv), 0, 16);
        $output = base64_encode(openssl_encrypt($value, self::$EncryptionMethod, $key, 0, $iv));
        return $output;

    }

    public function decrypt($value)
    {
        $key = hash('sha256', self::$SecretKey);
        $iv = substr(hash('sha256', self::$SecretIv), 0, 16);
        $decrypt = openssl_decrypt(base64_decode($value), self::$EncryptionMethod, $key, 0, $iv);
        return $decrypt;
    }

    public static function jaliliToMiladi($jalili, $format = '/')
    {

        $jalili = explode('/', $jalili);
        $year = $jalili[0];
        $month = $jalili[1];
        $day = $jalili[2];
        $date = jalali_to_gregorian($year, $month, $day);
        $date = implode($format, $date);
        $date = new DateTime($date);
        $date = $date->format('Y/m/d');

        return $date;
    }

    public static function MiladiTojalili($miladi, $format = '/')
    {

        $miladi = explode('/', $miladi);
        $year = $miladi[0];
        $month = $miladi[1];
        $day = $miladi[2];
        $date = gregorian_to_jalali($year, $month, $day);
        $date = implode($format, $date);
        return $date;
    }

    public static function __callStatic($method, $parameters)
    {
        return (new static)->$method(...$parameters);
    }

    public static function alert_null_data($text, $class = "alert-warning fs-6")
    {
        $file = file_get_contents(DIR_ROOT . '/views/programs/alert-null-data/index.php');
        $file = str_replace('#text', $text, $file);
        $file = str_replace('#class', $class, $file);
        echo html_entity_decode($file);
    }

    public function add_name_file_time($file_name, $new_name)
    {
        $array = explode(".", $file_name);
        $exit = end($array);
        $new_name = "{$new_name}_" . date('Y-m-d_H-i-s') . ".{$exit}";
        return $new_name;
    }
}

class Db
{
    private static $connect_db = '';
    private static $conn_table = '';

    public function __construct()
    {
        $servername = SERVERDB;
        $username = USERNAMEDB;
        $password = PASSWORDDB;
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        $model = new Model();
        self::$conn_table = $model->__construct();
        try {
            self::$connect_db = new PDO("mysql:host={$servername}", $username, $password, $options);
            self::$connect_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $err) {
            PhpError($err->getCode(), $err->getMessage(), $err->getFile(), $err->getLine());
        }
    }

    public function CreateDB($db_name, $db_collation = 'utf8_general_ci')
    {
        $sql = "CREATE DATABASE {$db_name} COLLATE {$db_collation}";
        $sql = self::$connect_db->exec($sql);
        return ($sql) ? true : false;
    }

    public function CreateTable($table_name, $data = [])
    {
        $data = $data[0];
        $sql = "CREATE TABLE {$table_name}({$data})ENGINE = InnoDB DEFAULT CHAR SET = utf8 COLLATE = utf8_general_ci";
        $sql = self::$conn_table->exec($sql);
        return ($sql) ? true : false;
    }

    public function DropTable($table_name)
    {
        $sql = "DROP TABLE {$table_name}";
        $sql = self::$conn_table->exec($sql);
        return ($sql) ? true : false;
    }

    public function CreateColumn($table_name, $column_name, $data_column)
    {
        $sql = "ALTER TABLE {$table_name} ADD {$column_name} {$data_column}";
        $sql = self::$conn_table->exec($sql);
        return ($sql) ? true : false;
    }

    public function DropColumn($table_name, $column_name)
    {
        $sql = "ALTER TABLE {$table_name} DROP COLUMN {$column_name}";
        $sql = self::$conn_table->exec($sql);
        return ($sql) ? true : false;
    }

    public function RenameColumn($table_name, $column_name_old, $column_name_new, $typeColumn)
    {
        $sql = "ALTER TABLE {$table_name} CHANGE [COLUMN] {$column_name_old} {$column_name_new} {$typeColumn}";
        $sql = self::$conn_table->exec($sql);
        return ($sql) ? true : false;
    }

    public function FullBackup($db_name, $path)
    {
        $sql = "BACKUP DATABASE {$db_name} TO DISK = '{$path}'";
        $sql = self::$connect_db->exec($sql);
        return ($sql) ? true : false;
    }
}

class helper
{
    public static function ErrorPay($domain, $price, $site_name, $address_site, $pay_time, $site_email, $msg_gateway)
    {
        $file = file_get_contents(DIR_ROOT . '/views/email/error-pay/index.php');
        $file = str_replace('#DOMAIN', $domain, $file);
        $file = str_replace('#Price', $price, $file);
        $file = str_replace('#SiteName', $site_name, $file);
        $file = str_replace('#AddressSite', $address_site, $file);
        $file = str_replace('#AddressSiteHref', $domain, $file);
        $file = str_replace('#PayTime', $pay_time, $file);
        $file = str_replace('#SiteEmail', $site_email, $file);
        $file = str_replace('#MsgGateway', $msg_gateway, $file);
//        $file_style = (file_get_contents(DIR_ROOT . '/public/css/styles.css'));
//        $file_bootstrap = (file_get_contents(DIR_ROOT . '/public/css/bootstrap.rtl.min.css'));
//        $file = str_replace('/* style internal(styles) */', $file_style, $file);
//        $file = str_replace('/* style external(bootstrap) */', $file_bootstrap, $file);
        return html_entity_decode($file);
    }

    public static function SuccessPay($domain, $ref_id, $price, $site_name, $address_site, $pay_time, $site_email)
    {
        $file = file_get_contents(DIR_ROOT . '/views/email/success-pay/index.php');
        $file = str_replace('#DOMAIN', $domain, $file);
        $file = str_replace('#RefId', $ref_id, $file);
        $file = str_replace('#Price', $price, $file);
        $file = str_replace('#SiteName', $site_name, $file);
        $file = str_replace('#AddressSite', $address_site, $file);
        $file = str_replace('#AddressSiteHref', $domain, $file);
        $file = str_replace('#PayTime', $pay_time, $file);
        $file = str_replace('#SiteEmail', $site_email, $file);
        return html_entity_decode($file);
    }
}