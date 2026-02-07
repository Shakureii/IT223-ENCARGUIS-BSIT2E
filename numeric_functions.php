<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$functionMap = [
    1 => "SELECT ABS(-123.45) as AbsoluteValue",
    2 => "SELECT ROUND(gpa, 1) as RoundedGPA FROM students LIMIT 5",
    3 => "SELECT CEIL(gpa) as CeilingGPA FROM students LIMIT 5",
    4 => "SELECT FLOOR(gpa) as FloorGPA FROM students LIMIT 5",
    5 => "SELECT MOD(credits_earned, 3) as Remainder FROM students LIMIT 5",
    6 => "SELECT POW(2, 3) as PowerResult",
    7 => "SELECT SQRT(annual_fee) as FeeSqrt FROM students LIMIT 5",
    8 => "SELECT RAND() as RandomNumber",
    9 => "SELECT TRUNCATE(gpa, 0) as TruncatedGPA FROM students LIMIT 5",
    10 => "SELECT SIGN(gpa - 3.5) as GPASign FROM students LIMIT 5",
    11 => "SELECT EXP(1) as EValue",
    12 => "SELECT LN(annual_fee) as LogFee FROM students LIMIT 5",
    13 => "SELECT LOG(annual_fee) as Log10Fee FROM students LIMIT 5",
    14 => "SELECT LOG2(credits_earned) as Log2Credits FROM students LIMIT 5",
    15 => "SELECT LOG10(annual_fee) as Log10Fee FROM students LIMIT 5",
    16 => "SELECT PI() as PiValue",
    17 => "SELECT SIN(1) as SineValue",
    18 => "SELECT COS(1) as CosineValue",
    19 => "SELECT TAN(1) as TangentValue",
    20 => "SELECT ASIN(0.5) as ArcSine",
    21 => "SELECT ACOS(0.5) as ArcCosine",
    22 => "SELECT ATAN(1) as ArcTangent",
    23 => "SELECT ATAN2(1, 2) as ArcTangent2",
    24 => "SELECT COT(1) as Cotangent",
    25 => "SELECT DEGREES(1) as DegreesValue",
    26 => "SELECT RADIANS(180) as RadiansValue",
    27 => "SELECT POWER(2, 4) as PowerResult",
    28 => "SELECT GREATEST(gpa, 3.0, 2.5) as GreatestValue FROM students LIMIT 5",
    29 => "SELECT LEAST(gpa, 4.0, 3.0) as LeastValue FROM students LIMIT 5",
    30 => "SELECT BIN(10) as BinaryValue",
    31 => "SELECT OCT(10) as OctalValue",
    32 => "SELECT HEX(255) as HexValue",
    33 => "SELECT CONV('A', 16, 10) as DecimalValue",
    34 => "SELECT BIT_COUNT(10) as BitCount",
    35 => "SELECT CRC32(first_name) as NameCRC FROM students LIMIT 5",
    36 => "SELECT credits_earned DIV 15 as FullSemesters FROM students LIMIT 5"
];

$funcNum = isset($_GET['func']) ? (int)$_GET['func'] : 1;
if ($funcNum < 1 || $funcNum > 36) $funcNum = 1;

$sql = $functionMap[$funcNum];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Numeric Function Output</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; }
        .sql-box { background: #2c3e50; color: white; padding: 15px; border-radius: 5px; margin: 20px 0; }
        .back-link { display: inline-block; margin: 20px 0; padding: 10px 20px; background: #3498db; color: white; text-decoration: none; border-radius: 5px; }
        table { border-collapse: collapse; width: 100%; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #34495e; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php" class="back-link">← Back to Main Page</a>
        <h1>Numeric Function Output</h1>
        
        <div class="sql-box">
            <strong>SQL Query:</strong><br>
            <?php echo htmlspecialchars($sql); ?>
        </div>
        
        <h2>Result:</h2>
        <?php echo executeQuery($conn, $sql); ?>
        
        <a href="index.php" class="back-link">← Back to Main Page</a>
    </div>
</body>
</html>
<?php mysqli_close($conn); ?>