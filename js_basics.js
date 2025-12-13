let coffeePrice = 5;
let pastryPrice = 3.5;
let coffeeQuantity = 2;
let pastryQuantity = 1;
let totalCost = coffeePrice * coffeeQuantity + pastryPrice * pastryQuantity;
console.log("The total cost of your order is $" + totalCost + ".");
let name = "Alice";
let age = 21;
let isStudent = true;
let studentText = isStudent ? "Yes" : "No";
console.log("Name: " + name + ", Age: " + age + ", Student: " + studentText);
let userAge = 25;
if (userAge >= 18) {
  console.log("Welcome! You are old enough to watch this movie.");
} else {
  console.log("Sorry, you are not old enough to watch this movie.");
}
let score = 85;
if (score >= 90 && score <= 100) {
  console.log("The grade is A.");
} else if (score >= 80) {
  console.log("The grade is B.");
} else if (score >= 70) {
  console.log("The grade is C.");
} else if (score >= 60) {
  console.log("The grade is D.");
} else {
  console.log("The grade is F.");
}
let dailySteps = [5021, 7503, 4987, 10050, 8010, 6500, 7899];
let stepsTotal = 0;
for (let i = 0; i < dailySteps.length; i++) {
  stepsTotal += dailySteps[i];
}
console.log("Total steps for the week: " + stepsTotal);
for (let i = 10; i >= 1; i--) {
  console.log(i);
}
console.log("Blast Off!");
let guestList = ["Bob", "Charlie", "Denise"];
for (const guest of guestList) {
  console.log("Welcome to the party, " + guest + "!");
}
for (let i = 0; i < 5; i++) {
  let row = "";
  for (let j = 0; j < 5; j++) {
    row += "*";
  }
  console.log(row);
}
function calculateArea(width, height) {
  return width * height;
}
console.log(calculateArea(10, 8));
function reverseWord(word) {
  return word.split("").reverse().join("");
}
console.log(reverseWord("JavaScript"));
function findMaxNumber(arr) {
  let max = arr[0];
  for (let i = 1; i < arr.length; i++) {
    if (arr[i] > max) {
      max = arr[i];
    }
  }
  return max;
}
console.log(findMaxNumber([12, 5, 27, 8, 19]));
function countVowels(str) {
  let s = str.toLowerCase();
  let vs = ["a","e","i","o","u"];
  let cnt = 0;
  for (let i = 0; i < s.length; i++) {
    if (vs.indexOf(s[i]) !== -1) {
      cnt++;
    }
  }
  return cnt;
}
console.log(countVowels("Hello World"));
function filterByPrice(prices, minimumPrice) {
  let result = [];
  for (let i = 0; i < prices.length; i++) {
    if (prices[i] >= minimumPrice) {
      result.push(prices[i]);
    }
  }
  return result;
}
let prices = [10, 25, 8, 42, 15, 5];
let minimumPrice = 20;
console.log(filterByPrice(prices, minimumPrice));
function isPalindrome(s) {
  let a = s.toLowerCase();
  let b = a.split("").reverse().join("");
  return a === b;
}
console.log(isPalindrome("Racecar"));
console.log(isPalindrome("Hello"));
function capitalizeNames(names) {
  let out = [];
  for (let i = 0; i < names.length; i++) {
    let n = names[i];
    let c = n[0].toUpperCase() + n.slice(1);
    out.push(c);
  }
  return out;
}
let namesArr = ["john", "mary", "peter"];
console.log(capitalizeNames(namesArr));