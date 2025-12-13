<?php
$name = "Alice";
echo "Hello $name, welcome!\n";
$celsius = 25;
$fahrenheit = ($celsius * 9/5) + 32;
echo $celsius . "°C is " . $fahrenheit . "°F.\n";
$age = 19;
if ($age >= 18) {
    echo "You are eligible to vote.\n";
} else {
    echo "You are not eligible to vote.\n";
}
$score = 85;
if ($score >= 90 && $score <= 100) {
    echo "Your grade is: A\n";
} elseif ($score >= 80) {
    echo "Your grade is: B\n";
} elseif ($score >= 70) {
    echo "Your grade is: C\n";
} elseif ($score >= 60) {
    echo "Your grade is: D\n";
} else {
    echo "Your grade is: F\n";
}
$number = 7;
for ($i = 1; $i <= 10; $i++) {
    echo $number . " x " . $i . " = " . ($number * $i) . "\n";
}
for ($i = 1; $i <= 50; $i++) {
    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "FizzBuzz\n";
    } elseif ($i % 3 == 0) {
        echo "Fizz\n";
    } elseif ($i % 5 == 0) {
        echo "Buzz\n";
    } else {
        echo $i . "\n";
    }
}
$size = 5;
for ($i = 0; $i < $size; $i++) {
    $line = "";
    for ($j = 0; $j < $size; $j++) {
        $line .= "* ";
    }
    echo trim($line) . "\n";
}
function calculateArea($length, $width) {
    $area = $length * $width;
    return "The area of a rectangle with length $length and width $width is $area.";
}
echo calculateArea(5, 10) . "\n";
$text = "Hello World";
$vowels = ['a','e','i','o','u'];
$count = 0;
for ($i = 0; $i < strlen($text); $i++) {
    $ch = strtolower($text[$i]);
    if (in_array($ch, $vowels)) {
        $count++;
    }
}
echo "The string \"$text\" has $count vowels.\n";
function checkPalindrome($word) {
    $lower = strtolower($word);
    if ($lower === strrev($lower)) {
        echo "\"$word\" is a palindrome.\n";
    } else {
        echo "\"$word\" is not a palindrome.\n";
    }
}
checkPalindrome("Racecar");
$scores = [88, 92, 75, 68, 95];
$average = array_sum($scores) / count($scores);
echo "The average score is " . number_format($average, 1) . ".\n";
$numbers = [1,2,3,4,5,6,7,8,9,10];
$odds = [];
foreach ($numbers as $n) {
    if ($n % 2 != 0) {
        $odds[] = $n;
    }
}
print_r($odds);
$userProfile = [
    "firstName" => "John",
    "lastName" => "Doe",
    "email" => "john.doe@example.com",
    "city" => "New York"
];
foreach ($userProfile as $key => $value) {
    if ($key === "firstName") {
        echo "First Name: " . $value . "\n";
    }
    if ($key === "lastName") {
        echo "Last Name: " . $value . "\n";
    }
    if ($key === "email") {
        echo "Email: " . $value . "\n";
    }
    if ($key === "city") {
        echo "City: " . $value . "\n";
    }
}
$capitals = [
    "USA" => "Washington D.C.",
    "Japan" => "Tokyo",
    "Bangladesh" => "Dhaka"
];
$country = "Japan";
$userGuess = "Tokyo";
if (isset($capitals[$country]) && strtolower($capitals[$country]) === strtolower($userGuess)) {
    echo "Correct! The capital of $country is $userGuess.\n";
} else {
    echo "Incorrect!\n";
}
$cart = [
    ["item" => "Laptop", "price" => 1200, "quantity" => 1],
    ["item" => "Mouse", "price" => 25, "quantity" => 2],
    ["item" => "Keyboard", "price" => 75, "quantity" => 1]
];
$total = 0;
foreach ($cart as $c) {
    $subtotal = $c["price"] * $c["quantity"];
    $total += $subtotal;
    echo "Item: " . $c["item"] . ", Price: $" . $c["price"] . ", Quantity: " . $c["quantity"] . ", Subtotal: $" . $subtotal . "\n";
}
echo "--------------------\n";
echo "Total Cart Value: $" . $total . "\n";
