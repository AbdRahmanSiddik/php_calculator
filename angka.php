<?php
function generateTwoDigitNumberWithStars($number) {
    // Matriks yang mewakili angka 0-9 dengan karakter bintang
    
    $numbers = array(
        "  ***  \n *   * \n *   * \n *   * \n  ***  ",
        "   *   \n   *   \n   *   \n   *   \n   *   ",
        "  ***  \n     * \n  ***  \n *     \n  ***  ",
        "  ***  \n     * \n  ***  \n     * \n  ***  ",
        " *   * \n *   * \n  ***  \n     * \n     * ",
        "  ***  \n *     \n  ***  \n     * \n  ***  ",
        "  ***  \n *     \n  ***  \n *   * \n  ***  ",
        "  ***  \n     * \n     * \n     * \n     * ",
        "  ***  \n *   * \n  ***  \n *   * \n  ***  ",
        "  ***  \n *   * \n  ***  \n     * \n  ***  "
    );

 
    $number = substr($number, -2);

    // Split the number into tens and ones digits
    $tensDigit = (int) $number[0];
    $onesDigit = (int) $number[1];

    // Get the ASCII art representation of the tens and ones digits
    $tensDigitArt = $numbers[$tensDigit];
    $onesDigitArt = $numbers[$onesDigit];

    // Split the ASCII art into lines
    $tensDigitLines = explode("\n", $tensDigitArt);
    $onesDigitLines = explode("\n", $onesDigitArt);

    // Initialize the result as an empty string
    $result = '';

    // Combine the tens and ones digits side by side
    for ($i = 0; $i < count($tensDigitLines); $i++) {
        $result .= $tensDigitLines[$i] . '  ' . $onesDigitLines[$i] . "\n";
    }
    echo "<pre>$result</pre>";
    }

    // Display the result

// Call the function to generate and display the two-digit number with stars

// generateTwoDigitNumberWithStars($number);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/angka.css">
</head>
<body>
<div class="nim">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="angka">Masukkan NIM : </label>
    <input type="number" name="angka" id="angka">
    <button type="submit" name="gass">Generate</button>
    <?php if($_SERVER["REQUEST_METHOD"] == "POST") : 
        $number = $_POST["angka"];?>
        <?php if(isset($_POST["gass"])) : ?>
            <?php generateTwoDigitNumberWithStars($number); ?>
        <?php endif; ?>
    <?php endif; ?>
</form>
</div>
</body>
</html>
