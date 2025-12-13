<?php
class BankAccount {
    private $balance;
    public function __construct($initial = 0) {
        if ($initial < 0) {
            $this->balance = 0;
        } else {
            $this->balance = $initial;
        }
    }
    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }
    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            return true;
        }
        return false;
    }
    public function getBalance() {
        return $this->balance;
    }
}
$account = new BankAccount(100);
$account->deposit(50);
$account->withdraw(20);
echo "Current balance: " . $account->getBalance() . "\n";
$account->withdraw(200);
echo "Final balance: " . $account->getBalance() . "\n";
class User {
    protected $username;
    protected $email;
    public function __construct($username, $email) {
        $this->username = $username;
        $this->email = $email;
    }
    public function login() {
        return "User " . $this->username . " has logged in.";
    }
}
final class Admin extends User {
    public function banUser($user) {
        return "Admin " . $this->username . " has banned the user: " . $user . ".";
    }
}
$admin = new Admin("SuperAdmin", "admin@site.com");
echo $admin->login() . "\n";
echo $admin->banUser("JohnDoe") . "\n";
abstract class Shape {
    abstract public function calculateArea();
}
class Circle extends Shape {
    private $r;
    public function __construct($r) {
        $this->r = $r;
    }
    public function calculateArea() {
        return pi() * $this->r * $this->r;
    }
}
class Rectangle extends Shape {
    private $w;
    private $h;
    public function __construct($w, $h) {
        $this->w = $w;
        $this->h = $h;
    }
    public function calculateArea() {
        return $this->w * $this->h;
    }
}
function printArea(Shape $shape) {
    echo "The area is: " . $shape->calculateArea() . "\n";
}
$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);
printArea($circle);
printArea($rectangle);
interface Exportable {
    public function exportToJson();
    public function exportToCsv();
}
class BlogPost implements Exportable {
    private $title;
    private $content;
    public function __construct($title, $content) {
        $this->title = $title;
        $this->content = $content;
    }
    public function exportToJson() {
        return json_encode(["title" => $this->title, "content" => $this->content]);
    }
    public function exportToCsv() {
        return $this->title . "," . $this->content;
    }
}
class Report implements Exportable {
    private $title;
    private $data;
    public function __construct($title, $data) {
        $this->title = $title;
        $this->data = $data;
    }
    public function exportToJson() {
        return json_encode(["title" => $this->title] + $this->data);
    }
    public function exportToCsv() {
        $vals = [];
        foreach ($this->data as $v) {
            $vals[] = $v;
        }
        return $this->title . "," . implode(",", $vals);
    }
}
$post = new BlogPost("My First Post", "This is the content.");
$report = new Report("Monthly Sales", ["sales" => 5000, "expenses" => 2000]);
echo "Blog Post as JSON: " . $post->exportToJson() . "\n";
echo "Report as CSV: " . $report->exportToCsv() . "\n";
trait Loggable {
    public function log($message) {
        $ts = date('Y-m-d H:i:s');
        echo "[" . $ts . "] Log: " . $message . "\n";
    }
}
class Product {
    use Loggable;
    private $name;
    public function __construct($name) {
        $this->name = $name;
    }
}
class Order {
    use Loggable;
    private $id;
    public function __construct($id) {
        $this->id = $id;
    }
}
$product = new Product("Laptop");
$product->log("New product added to inventory.");
$order = new Order(123);
$order->log("Order has been shipped.");
