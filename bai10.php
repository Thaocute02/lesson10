<!-- Bài tập Abstract:
// 1.Tạo một class trừu tượng "Shape" (Hình dạng) có một phương thức trừu tượng là "calculateArea". 
// Tạo các lớp con "Circle" (Hình tròn) và "Rectangle" (Hình chữ nhật) kế thừa từ lớp Shape và triển khai phương thức calculateArea cho từng hình.--> 
<?php
abstract class Shape {
    abstract public function calculateArea();
}
class Circle extends Shape {
    protected $radian;
    public function __construct($radian) {
      $this->radian = $radian;
    }
    public function calculateArea() {
    return 3.14 * pow($this->radian, 2);
        }
  }
class Rectangle extends Shape {
    protected $length;
    protected $width;
 public function __construct($length, $width) {
    $this->length = $length;
    $this->width = $width;
}
public function calculateArea() {
return ($this->length + $this->width) * 2;
    }
}
$less1_1 = new Circle(10);
$less1_2 = new Rectangle(3, 4);
echo $less1_1->calculateArea()."<br>";
echo $less1_2->calculateArea()."<br>";

// 2. Tạo một abstract class "Animal" (Động vật) với một phương thức trừu tượng là "makeSound". 
// Tạo các lớp con "Dog" (Chó) và "Cat" (Mèo) kế thừa từ lớp Animal và triển khai phương thức makeSound theo cách riêng của từng loại động vật.
abstract class Animal {
    abstract public function makeSound();
}
    class Dog extends Animal {
        public function makeSound() {
          echo "Woof!";
        }
    }
    class Cat extends Animal {
        public function makeSound() {
            echo "Meo!";
        }
    }
$less2_1 = new Dog();
$less2_2 = new Cat();
echo $less2_1->makeSound()."<br>";
echo $less2_2->makeSound()."<br>";

// 3. Tạo một abstract class "Employee" (Nhân viên) với các thuộc tính trừu tượng như "name" (tên) và "salary" (mức lương), có một phương thức trừu tượng là "getInformation". 
// Tạo các lớp con "Manager" (Quản lý) và "Staff" (Nhân viên) kế thừa từ lớp Employee và triển khai các thuộc tính và phương thức theo cách riêng của từng lớp.
abstract class Employee {
    abstract public function name();
    abstract public function salary();
}
class Manager extends Employee {
    protected $name;
    protected $salary;
    public function __construct($name, $salary) {
      $this->name = $name;
      $this->salary = $salary;
    }
    public function name() {
    // echo $this->name;
        }
    public function salary() {
        // echo $this->salary;
        }
    public function getInf() {
        echo $this->name;
        echo $this->salary;
        }
  }
class Staff extends Employee {
 public function __construct($name, $salary) {
    $this->name = $name;
    $this->salary = $salary;
}
    public function name() {
        // echo $this->name;
            }
    public function salary() {
        // echo $this->salary;
    }
    public function getInf() {
        echo $this->name;
        echo $this->salary;
        }
}
$less3_1 = new Manager("toan", "10tr");
$less3_2 = new Staff("toan", "10tr");
echo $less3_1->getInf()."<br>";
echo $less3_2->getInf()."<br>";
// 4. Tạo một abstract class "Vehicle" (Phương tiện) với một phương thức trừu tượng là "start". 
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
$less4_1 = new Car();
$less4_2 = new Motorcycle();
echo $less4_1->start()."<br>";
echo $less4_2->start()."<br>";

// 5. Tạo một abstract class "Database" (Cơ sở dữ liệu) với các phương thức trừu tượng như "connect", "query" và "disconnect". 
// Tạo các lớp con "MySQLDatabase" và "PostgreSQLDatabase" kế thừa từ lớp Database và triển khai các phương thức theo cách riêng của từng loại cơ sở dữ liệu.
