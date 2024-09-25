<?php
//Poliformizm

// class Human{
//     public function hello(){
//         return "Hello I am o human";
//     }
// }
// class Aminal{
//     public function hello(){
//         return "Hello I am an animal";
//     }
// }

// class Any{
//     public function hi(Human $human){
//         return $human->hello();
//     }
// }

// $any=new Any();
// $human= new Human();
// echo $any->hi($human);

#Interface

// interface Insertable{
//     public function insert();
// }
// interface Updatetable{
//     public function update();
// }
// class User implements Insertable, Updatetable{
//     public function insert(){
//         return "Insert method";
//     }
//     public function update(){
//         return "Update method";
//     }
//     // public function all(){
//     //     return [
//     //         "insert"=>$this->insert(),
//     //         "update"=>$this->update()
//     //     ];
//     // }
// }

// $user= new User();
// // print_r($user->all()) ;
// echo $user->insert();
// echo "<br>";
// echo $user->update();


#Abstract

// abstract class Person{
//     public function introduce(){
//         return "I am a person";
//     }
//     public abstract function hello();
// }

// class User extends Person{
//     public function hello(){
//         return "Hello ". parent::introduce();
//     }
// }

// $user= new User();
// echo $user->hello();

// class Any{
//     public function hi(Person $person){
//         return $person->hello();
//     }
// }
// $any= new Any();
// $user=new User();
// echo $any->hi($user);

// class Vehicle{
//     public string $marka;
//     public string $model;
//     public int $suret;
//     public function __construct($marca, $model, $suret){
//         $this->marka=$marca;
//         $this->model=$model;
//         $this->suret=$suret;
//     }
//     public function info(){
//         return "Brand: ". $this->marka. ", Model: ". $this->model. ", Max Speed: ". $this->suret;
//     }
// }

// class Car extends Vehicle{
// public int $searCount;
// public function __construct($marca, $model, $suret, $searCount){
//     parent::__construct($marca, $model, $suret);
//         $this->searCount=$searCount;
    
// }
// public function info(){
//     return parent::info();
// }
// }

// $car= new Car("BMW", "M5", 200, 4);
// echo $car->info();


// class Person{
//     private string $name;
//     private int $age;
//     private int $salary;

//     public function __construct($name, $age, $salary){
//         $this->name=$name;
//         $this->age=$age;
//         $this->salary=$salary;
//     }

//     public function getter(){
//         return $this->age;
//     }
//     public function setter($age){
//         $this->age=$age;
//     }

//     public function info(){
//         return "Name: $this->name, <br> Age: $this->age, <br> Salary: $this->salary";
//     }
// }

// $person=new Person("Nise", 26, 2000);
// echo $person->info()."<br>";
// $person->setter(20);
// echo $person->getter();

// class MathOperations {
//     public static function add($a, $b) {
//         return $a + $b;
//     }

//     public static function subtract($a, $b) {
//         return $a - $b;
//     }
// }

// echo MathOperations::add(10, 5);
// echo "<br>";
// echo MathOperations::subtract(10, 5);

abstract class Shape {
    abstract public function calculateArea();
}

class Circle extends Shape {
    public function __construct(private $radius) {}

    public function calculateArea() {
        return pi() * $this->radius ** 2;
    }
}

class Rectangle extends Shape {
    public function __construct(private $width, private $height) {}

    public function calculateArea() {
        return $this->width * $this->height;
    }
}

$circle = new Circle(5);
echo "Circle area: " . $circle->calculateArea() . "\n";

$rectangle = new Rectangle(4, 7);
echo "Rectangle area: " . $rectangle->calculateArea();
