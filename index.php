<?php
if (isset($_POST['btn'])) {
    if ($_POST['btn'] == "=") {
        $expression = $_POST['display'];
        eval('$result = ' . $expression . ';');
        
        $isOddEven = ($result % 2 == 0) ? 'Genap' : 'Ganjil'; // fungsi in untuk menentukan bilangan ganjil dan genap
        
        $_POST['display'] = "$result  ($isOddEven)";
    } elseif ($_POST['btn'] == "C") {
        $_POST['display'] = "";
    } elseif ($_POST['btn'] == "backspace") {
        $_POST['display'] = substr($_POST['display'], 0, -1);
    } else {
        $_POST['display'] .= $_POST['btn'];
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator</title>
    <link rel="stylesheet" href="style/kalkulator.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="calculator">
        <form method="post" action="" class="calc">
            <input type="text" name="display" id="display" value="<?php echo isset($_POST['display']) ? $_POST['display'] : ''; ?>" >
            <div class="buttons">
                <button type="submit" name="btn" value="1">1</button>
                <button type="submit" name="btn" value="2">2</button>
                <button type="submit" name="btn" value="3">3</button>
                <button type="submit" name="btn" value="4">4</button>
                <button type="submit" name="btn" value="5">5</button>
                <button type="submit" name="btn" value="6">6</button>
                <button type="submit" name="btn" value="7">7</button>
                <button type="submit" name="btn" value="8">8</button>
                <button type="submit" name="btn" value="9">9</button>
                <button type="submit" name="btn" value="C"><i class='bx bxs-trash'></i></button>
                <button type="submit" name="btn" value="0">0</button>
                <button type="submit" name="btn" value="backspace"><i class='bx bx-left-arrow-circle'></i></button>
                <button type="submit" name="btn" value="+">+</button>
                <button type="submit" name="btn" value="=">=</button>
                <button type="submit" name="btn" value="%">mod</button>
                <button type="submit" name="btn" value="-">-</button>
                <button type="submit" name="btn" value="*">*</button>
                <button type="submit" name="btn" value="/">/</button>
            </div>
            <button type="submit" name="generate_piramid">Generate Piramida</button>
            <button id="myButton"><a href="angka.php">Tugas 4</a></button>
        </form>
    </div>
    <div class="piramid-output">
        <?php 
        if (isset($_POST['generate_piramid'])) {
            $num1 = (int)$_POST['display'];
                
            if ($num1 > 0) {
                $pyramid = generatePyramid($num1);
            } else {
                $pyramid = "Angka harus lebih dari 0";
            }
        }
        echo isset($pyramid) ? nl2br($pyramid) : ''; 
        ?>
    </div>
</body>
</html>

<?php
function generatePyramid($height) {
    
    for ($i=1; $i <= $height ; $i++) { 
        for ($j=$height - $i; $j > 0; $j--) { 
            echo '<div style="width:6px;height:5px;display:inline-block;"></div>';
        }

        for ($k=1; $k <= $i ; $k++) { 
            echo "* ";
        }
        echo "<br>";
    }

}
?>