<?php
// Bài tập abstract
// Tạo một class trừu tượng "Shape" (Hình dạng) có một phương thức trừu tượng là "calculateArea". 
// Tạo các lớp con "Circle" (Hình tròn) và "Rectangle" (Hình chữ nhật) kế thừa từ lớp Shape và triển khai phương thức calculateArea cho từng hình.
abstract class Shape{
    abstract public function calculateArea();
}
class Circle extends Shape{
    protected $radius;
    public function setRadius($radius){
        $this->radius = $radius;
    }
    public function calculateArea(){
        return 3.14*pow($this->radius,2);
    }
}
class Rectangle extends Shape{
    protected $height, $width;
    public function __construct($height, $width){
        $this->height = $height;
        $this->width = $width;
    }
    public function calculateArea(){
        return $this->height*$this->width;
    }
}
echo "Bài 1: <br>";
$circle = new Circle();
$circle->setRadius(1);
echo "Circle Area: " . $circle->calculateArea();
echo "<br>";
$rec = new Rectangle(4,7);
echo "Rectangle Area: " . $circle->calculateArea();

// Tạo một abstract class "Animal" (Động vật) với một phương thức trừu tượng là "makeSound". 
// Tạo các lớp con "Dog" (Chó) và "Cat" (Mèo) kế thừa từ lớp Animal và triển khai phương thức makeSound theo cách riêng của từng loại động vật.
abstract class Animal{
    abstract public function makeSound();
}
class Dog extends Animal{
    public function makeSound(){
        return "gow gow";
    }
}
class Cat extends Animal{
    public function makeSound(){
        return "meow meow";
    }
}
echo "<br><br> Bài 2: <br>";
$dog = new Dog();
$cat = new Cat();
echo "Sound Dog: " . $dog->makeSound();
echo "<br>";
echo "Sound Dog: " . $cat->makeSound();
// Tạo một abstract class "Employee" (Nhân viên) với các thuộc tính trừu tượng như "name" (tên) và "salary" (mức lương). 
// Tạo các lớp con "Manager" (Quản lý) và "Staff" (Nhân viên) kế thừa từ lớp Employee và triển khai các thuộc tính và phương thức theo cách riêng của từng lớp.
abstract class Employee{
    protected $name, $salary;
}
class Manager extends Employee{
    protected $name, $salary, $day, $bonus;
    public function __construct($name, $salary, $day, $bonus){
        $this->name = $name;
        $this->salary = $salary;
        $this->day = $day;
        $this->bonus = $bonus;
    }
    public function calcSalary(){
        return $this->salary*$this->day + $this->bonus;
    }
}
class Staff extends Employee{
    protected $name, $salary, $day, $coefficients;
    public function __construct($name, $salary, $day, $coefficients){
        $this->name = $name;
        $this->salary = $salary;
        $this->day = $day;
        $this->coefficients = $coefficients;
    }
    public function calcSalary(){
        return $this->salary*$this->day*$this->coefficients;
    }
}
echo "<br><br> Bài 3: <br>";
$manager = new Manager("Thanh Thảo", 100000, 30, 50000);
$staff = new Staff("Đinh Thanh", 20000, 30, 2);
echo "Manager Salary: " . number_format($manager->calcSalary());
echo "<br>";
echo "Staff Salary: " . number_format($staff->calcSalary());
// Tạo một abstract class "Vehicle" (Phương tiện) với một phương thức trừu tượng là "start". 
// Tạo các lớp con "Car" (Xe hơi) và "Motorcycle" (Xe máy) kế thừa từ lớp Vehicle và triển khai phương thức start theo cách riêng của từng loại phương tiện.
abstract class Vehicle {
    abstract public function start();
}
    class Car extends Vehicle {
        public function start() {
          echo "Starting car!";
        }
    }
    class Motorcycle extends Vehicle {
        public function start() {
            echo "Starting motorcycle!";
        }
    }
echo "<br><br> Bài 4: <br>";
$Car = new Car();
$Motorcycle = new Motorcycle();
echo $Car->start()."<br>";
echo $Motorcycle->start()."<br>";
// Tạo một abstract class "Database" (Cơ sở dữ liệu) với các phương thức trừu tượng như "connect", "query" và "disconnect". 
// Tạo các lớp con "MySQLDatabase" và "PostgreSQLDatabase" kế thừa từ lớp Database và triển khai các phương thức theo cách riêng của từng loại cơ sở dữ liệu.
abstract class Database {
    abstract public function connect();
    abstract public function query($query, $params = []);
    abstract public function disconnect();
}
class MySQLDatabase extends Database {
	
        public	$isConn;
        protected	$datab;
        
        //CONNECT TO DB
        public	function connect($host = "localhost", $user = "root", $pass = "", $dbname = "deha", $options = [])
        {
            $this->isConn = TRUE;
            try {
                $this->datab = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass, $options);
                $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
        
        public	function	disconnect()
        {
            $this->isConn = FALSE;
            $this->datab = NULL;
        }
        
        public	function	query($query, $params = [])
        {
            try {
                $stmt = $this->datab->prepare($query);
                $stmt->execute($params);
                return TRUE;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

// $query = "INSERT INTO products (name, price, category_id) VALUES (:name, :price, :ca_id)";
// $params = ['name'=>'Dep', 'price'=>'25.100', 'ca_id'=>3];
// $less5_1 = new MySQLDatabase();
// $less5_1->connect($host = "localhost", $user = "root", $pass = "", $dbname = "deha", $options = []);
// $less5_1->query($query, $params)."<br>";
// $less5_1->disconnect();

// Bài tập interface
// Tạo một interface "Resizable" (Có thể điều chỉnh kích thước) với một phương thức là "resize". 
// Tạo một lớp "Rectangle" (Hình chữ nhật) và triển khai interface Resizable để thay đổi kích thước của hình chữ nhật.
interface Resizable{
    public function resize($number);
}
class Rectangl implements Resizable{
    protected $width, $height;
    public function __construct($width, $height){
        $this->width = $width;
        $this->height = $height;
    }
    public function resize($number){
        return [$number, $this->width*$number, $this->height*$number];
    }
    public function width(){
        return $this->width;
    }
    public function height(){
        return $this->height;
    }
}
echo "<br> Bài 6: <br>";
$rec = new Rectangl(4,7);
$rec->resize(2);
echo "Original Width: " . $rec->width() . "<br>";
echo "Original Height: " . $rec->height() . "<br>";
echo "Increase: " . $rec->resize(2)[0] . "<br>";
echo "New Width: " . $rec->resize(2)[1] . "<br>";
echo "New Height: " . $rec->resize(2)[2] . "<br>";
// Tạo một interface "Logger" với các phương thức "logInfo", "logWarning" và "logError". 
// Tạo một lớp "FileLogger" (Ghi log vào file) và một lớp "DatabaseLogger" (Ghi log vào cơ sở dữ liệu) và triển khai interface Logger cho cả hai lớp.
interface Logger {
    public function logInfo();
    public function logWarning();
    public function logError();
}
class FileLogger implements Logger {
    public function logInfo() {

    }
    public function logWarning() {
        
    }
    public function logError() {
        
    }
    protected $log;
    public function __construct($log) {
        $this->log = $log;
        $this->logInfo();
        $this->logWarning();
        $this->logError();
    }
    public function getLog() {
        return $this->log;
    }
}
class DatabaseLogger implements Logger {
    public function logInfo() {

    }
    public function logWarning() {
        
    }
    public function logError() {
        
    }
    protected $log;
    public function __construct($log) {
        $this->log = $log;
        $this->logInfo();
        $this->logWarning();
        $this->logError();
    }
    public function getLog() {
        return $this->log;
    }
}
echo "<br> Bài 7: <br>";
$less7_1 = new FileLogger("bug...1");
$less7_2 = new DatabaseLogger("bug...2");
echo $less7_1->getLog(). "<br>";
echo $less7_2->getLog(). "<br>";
// Tạo một interface "Drawable" (Có thể vẽ) với phương thức "draw". 
// Tạo một lớp "Circle" (Hình tròn) và một lớp "Square" (Hình vuông) kế thừa từ interface Drawable và triển khai phương thức draw cho mỗi hình.
interface Drawable{
    public function draw($length,$color);
}
class Circl implements Drawable{
    protected $radius, $color; 
    public function draw($radius, $color){ ?>
        <div
        style="height: <?= $radius*2?>px;
        width: <?= $radius*2?>px;
        background-color: <?= $color?>;
        border-radius: <?= $radius ?>px;
        margin: 20px;">
        </div>
    <?php 
    }
}
class Square implements Drawable{
    protected $radius, $color; 
    public function draw($length, $color){ ?>
        <div
        style="height: <?= $length?>px;
        width: <?= $length?>px;
        background-color: <?= $color?>;
        margin: 20px;">
        </div>
    <?php 
    }
}
echo "<br>Bài 8: <br>";
echo "<br>Circle:";
$circl = new Circl();
$circl->draw(50,'#98f5ff');
echo "<br>Square:";
$square = new Square();
$square->draw(100,'#ffe4c4');

// Tạo một interface "Sortable" với phương thức "sort". Tạo một lớp "ArraySorter" (Sắp xếp mảng) và 
// một lớp "LinkedListSorter" (Sắp xếp danh sách liên kết) và triển khai interface Sortable cho cả hai lớp.
interface Sortable{
    public function sort($param);
}
class ArraySorter implements Sortable{
    protected $arr;
    public function __construct(){
        $this->arr = [];
    }
    public function insertElement($element){
        $this->arr[] = $element;
    }
    public function showArray(){
        return $this->arr;
    }
    public function sort($arr){
        $count = count($this->arr);
        for($i=0; $i<$count; $i++)
            for($j=$i+1; $j<$count; $j++)
                if($this->arr[$i]>$this->arr[$j]){
                    $temp = $this->arr[$i];
                    $this->arr[$i] = $this->arr[$j];
                    $this->arr[$j] = $temp;
            }
    return $this->arr;
    }
}
class LinkedListSorter {
    public function sort($message){
        return $message;
    }
}
echo "<br>Bài 9: <br>";
$arr = new ArraySorter();
$arr->insertElement(1);
$arr->insertElement(4);
$arr->insertElement(0);
$arr->insertElement(7);
echo "Orginal Array: ";
$arrs = $arr->showArray();
foreach($arrs as $value)
    echo $value . " ";
echo "<br> Array in ascending order: ";
$arrSort = $arr->sort($arr);
foreach($arrSort as $value)
        echo $value . " ";
$linkedList = new LinkedListSorter();
echo "<br>Result sort linked list: " . $linkedList->sort('Pass');

// Tạo một interface "Encryptable" (Có thể mã hóa) với phương thức "encrypt" và "decrypt". 
// Tạo một lớp "AES" và một lớp "DES" kế thừa từ interface Encryptable và triển khai các 
// phương thức theo thuật toán mã hóa tương ứng.
interface Encryptable{
    public function encrypt($message);
    public function decrypt($message);
}
class AES implements Encryptable {
    public function encrypt($message) {
        $encryptedMessage = "AES encrypted: " . $message;
        return $encryptedMessage;
    }
    public function decrypt($message) {
        $decryptedMessage = "AES encrypted: " . $message;
        return $decryptedMessage;
    }
}
class DES implements Encryptable {
    public function encrypt($message) {
        $encryptedMessage = "DES encrypted: " . $message;
        return $encryptedMessage;
    }
    public function decrypt($message) {
        $decryptedMessage = "DES encrypted: ". $message;
        return $decryptedMessage;
    }
}
echo "<br><br>Bài 10: <br>";
$message = "Pass";
$aesEncryptor = new AES();
echo "AES:<br>";
echo "Encrypted: " . $aesEncryptor->encrypt($message) . "<br>";
echo "Decrypted: " . $aesEncryptor->decrypt($message) . "<br>";
$desEncryptor = new DES();
echo "DES:<br>";
echo "Encrypted: " . $desEncryptor->encrypt($message) . "<br>";
echo "Decrypted: " . $desEncryptor->decrypt($message) . "<br>";

 ?>
