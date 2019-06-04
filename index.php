<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bài tập ứng dụng đọc số thành chữ</title>
</head>
<style>
    input[type=number] {
        width: 300px;
        font-size: 16px;
        border: 2px solid #ccc;
        border-radius: 4px;
        padding: 12px 10px 12px 10px;
    }
    #value{
        border-radius: 2px;
        padding: 10px 32px;
        font-size: 16px;
    }
</style>
<body>
<h2>Đổi số thành chữ</h2>
<form method="post">
    <input type="number" name="input" placeholder="Nhập sô">
    <input type="submit" id="value" value="click">
</form>
<?php
// Hàm sử lý nếu có một chữ số.
function lessThan10($number)
{
    switch ($number[strlen($number) - 1]) {
        case 0:
            return "zero";
            break;
        case 1:
            return "one";
            break;
        case 2:
            return "two";
            break;
        case 3:
            return "three";
            break;
        case 4:
            return "four";
            break;
        case 5:
            return "five";
            break;
        case 6:
            return "six";
            break;
        case 7:
            return "seven";
            break;
        case 8:
            return "eight";
            break;
        case 9:
            return "nine";
            break;
        default:
            return "out of ability";
            break;
    }
}

// Hàm xử lý các số từ 10 đến 19
function during10to19($number)
{
    switch ($number[strlen($number) - 1]) {
        case 0:
            return "ten";
            break;
        case 1:
            return "eleven";
            break;
        case 2:
            return "twelve";
            break;
        case 3:
            return "thirteen";
            break;
        case 4:
            return "fourteen";
            break;
        case 5:
            return "fifteen";
            break;
        case 6:
            return "sixteen";
            break;
        case 7:
            return "seventeen";
            break;
        case 8:
            echo "eighteen";
            break;
        case 9:
            return "nineteen";
            break;
        default:
            return "out of ability";
            break;
    }
}

// Hàm chuyển đổi số thành chữ của các số từ 20 tới 99
function greaterThan20($number)
{
    switch ($number[strlen($number) - 2]) {
        case 2:
            return "twenty";
            break;
        case 3:
            return "thirty";
            break;
        case 4:
            return "forty";
            break;
        case 5:
            return "fifty";
            break;
        case 6:
            return "sixty";
            break;
        case 7:
            return "seventy";
            break;
        case 8:
            return "eighty";
            break;
        case 9:
            return "ninety";
            break;
    }
}

// Hàm chuyển đổi số thành chữ của số hàng trăm
function Hundreds($number)
{
    switch ($number[strlen($number) - 3]) {
        case 1:
            return 'One Hundred ';
            break;
        case 2:
            return 'Two Hundred ';
            break;
        case 3:
            return 'three hundred ';
            break;
        case 4:
            return 'Four Hundred ';
            break;
        case 5:
            return 'Five Hundred ';
            break;
        case 6:
            return 'Six Hundred ';
            break;
        case 7:
            return 'Seven Hundred ';
            break;
        case 8:
            return 'Night Hundred ';
            break;
        case 9:
            return 'Nine Hundred ';
            break;
    }
}

// Hàm chuyển đổi thành chữ của các số có 2 chữ số
function twoNumber($number)
{
    if ($number < 20) {
        return during10to19($number);
    }
    if ($number[strlen($number) - 1] === 0) {
        return greaterThan20($number);
    } else {
        return greaterThan20($number) . " " . lessThan10($number);
    }
}

// Hàm chuyển đổi thành chữ của các số có 3 chữ số
function threeNumber($number)
{
    if ($number % 100 === 0) {
        return Hundreds($number);
    }
    if ($number[strlen($number) - 2] === 0) {
        return Hundreds($number) . "and" . lessThan10($number[strlen($number) - 1]);
    } else {
        return Hundreds($number) . "and" . twoNumber($number[strlen($number) - 2] . $number[strlen($number) - 1]);
    }
}
//Hàm chuyển đổi số thành chữ của số bé hơn 1000
function changeNumberToLetter($number)
{
    if (strlen($number) > 3) {
        echo "out of ability";
    }
    if (strlen($number) === 3) {
        echo threeNumber($number);
    }
    if (strlen($number) === 2) {
        echo twoNumber($number);
    }
    if (strlen($number) === 1) {
        echo lessThan10($number);
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $number = $_POST["input"];
    changeNumberToLetter($number);
}
?>
</body>
</html>
