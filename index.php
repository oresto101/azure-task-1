<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
    $nameErr = $typeErr = $zipcodeErr = $priceErr = "";
    $name = $type = $zipcode = $price = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
            else $name = test_input($_POST["name"]);
        }
        if (empty($_POST["type"])) {
            $typeErr = "Type is required";
        } else {
            $type = test_input($_POST["type"]);
        }
        if (empty($_POST["zipcode"])) {
            $zipcodeErr = "ZipCode is required";
        } else {
            if (!preg_match("/^[0-9 ]*$/", $type)) {
                $zipcodeErr = "Only numbers and white space allowed";
            }
            else $zipcode = test_input($_POST["zipcode"]);
        }
        if (empty($_POST["price"])) {
            $price = "";
        } else {
            if (!preg_match("/^[0-9]*$/", $type)) {
                $priceErr = "Only numbers allowed";
            }
            else $price = test_input($_POST["price"]);
        }

    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<label for="name">Enter hardware name: </label>
<input type='text' id='name' name="name">
<span class="error">*
    <?php echo $nameErr; ?>
        </span>
<br><br>
<label for="type">Enter hardware type: </label>
<select type='text' id='type' name="type">
    <option value="graphics">Graphics card</option>
    <option value="processor">Processor</option>
    <option value="motherboard">Motherboard</option>
    <option value="mouse">Mouse</option>
</select>
<span class="error">*
    <?php echo $typeErr; ?>
        </span>
<br><br>
<label for="zipcode">Enter hardware zipcode: </label>
<input type='text' id='zipcode' name="zipcode">
<span class="error">*
    <?php echo $zipcodeErr; ?>
        </span>
<br><br>
<label for="price">Enter hardware price: </label>
<input type='text' id='price' name="price">
<span class="error">*
    <?php echo $priceErr; ?>
        </span>
<br><br>
<input type='submit' value='Generate table'>
</form>
<?php
    echo "<h2>Your data:</h2>";
echo $name;
echo "<br>";
echo $type;
echo "<br>";
echo $zipcode;
echo "<br>";
echo $price;
?>

</body>

</html>