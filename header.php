<?php require_once('initialize.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activev Record Testing</title>
    <style>
        table {
            border-collapse: collapse;
            border: 1px solid #ddd;
        }
        table tr th,
        table tr td {
            border: 1px solid #ddd;
            padding: 5px;
        }
        table tr th:first-of-type,
        table tr th:nth-of-type(5),
        table tr th:nth-of-type(7),
        table tr td:first-of-type,
        table tr td:nth-of-type(2),
        table tr td:nth-of-type(5),
        table tr td:nth-of-type(7) {
            text-align: center;
        }
        form .input_wrapper {
            margin: 20px 0;
        }
        form label {
            display: block;
        }
        form input[type="text"] {
            display: block;
            width: 600px;
            height: 35px;
        }
    </style>
</head>
<body>