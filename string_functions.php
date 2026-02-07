<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$functionMap = [
    1 => "SELECT UPPER(first_name) as UpperName FROM students LIMIT 5",
    2 => "SELECT LOWER(last_name) as LowerName FROM students LIMIT 5",
    3 => "SELECT CONCAT(first_name, ' ', last_name) as FullName FROM students LIMIT 5",
    4 => "SELECT SUBSTRING(first_name, 1, 3) as FirstThree FROM students LIMIT 5",
    5 => "SELECT first_name, CHAR_LENGTH(first_name) as NameLength FROM students LIMIT 5",
    6 => "SELECT TRIM('   Hello World   ') as Trimmed",
    7 => "SELECT LTRIM('   Hello World') as LeftTrimmed",
    8 => "SELECT RTRIM('Hello World   ') as RightTrimmed",
    9 => "SELECT REPLACE(email, '@email.com', '@university.edu') as NewEmail FROM students LIMIT 5",
    10 => "SELECT REVERSE(first_name) as ReversedName FROM students LIMIT 5",
    11 => "SELECT LEFT(first_name, 2) as FirstTwo FROM students LIMIT 5",
    12 => "SELECT RIGHT(last_name, 3) as LastThree FROM students LIMIT 5",
    13 => "SELECT LOCATE('@', email) as AtPosition FROM students LIMIT 5",
    14 => "SELECT POSITION('a' IN first_name) as APosition FROM students LIMIT 5",
    15 => "SELECT INSERT(email, 1, 0, 'student-') as ModifiedEmail FROM students LIMIT 5",
    16 => "SELECT REPEAT('*', 5) as Stars",
    17 => "SELECT CONCAT(first_name, SPACE(2), last_name) as SpacedName FROM students LIMIT 5",
    18 => "SELECT STRCMP(first_name, 'John') as Comparison FROM students LIMIT 5",
    19 => "SELECT ASCII(SUBSTRING(first_name, 1, 1)) as FirstCharCode FROM students LIMIT 5",
    20 => "SELECT CHAR(65) as CharA",
    21 => "SELECT LCASE(first_name) as LowerName FROM students LIMIT 5",
    22 => "SELECT UCASE(last_name) as UpperName FROM students LIMIT 5",
    23 => "SELECT MID(first_name, 2, 3) as MiddlePart FROM students LIMIT 5",
    24 => "SELECT INSTR(first_name, 'a') as AInName FROM students LIMIT 5",
    25 => "SELECT LPAD(gpa, 6, '0') as PaddedGPA FROM students LIMIT 5",
    26 => "SELECT RPAD(first_name, 10, '.') as PaddedName FROM students LIMIT 5",
    27 => "SELECT FIELD(department, 'Computer Science', 'Mathematics', 'English') as DeptIndex FROM courses LIMIT 5",
    28 => "SELECT FIND_IN_SET('Computer Science', 'Computer Science,Mathematics,English') as Position",
    29 => "SELECT FORMAT(annual_fee, 2) as FormattedFee FROM students LIMIT 5",
    30 => "SELECT HEX(65) as HexValue",
    31 => "SELECT UNHEX('41') as CharFromHex",
    32 => "SELECT SOUNDEX(first_name), first_name FROM students LIMIT 5",
    33 => "SELECT SUBSTRING_INDEX(email, '@', 1) as Username FROM students LIMIT 5"
];

$funcNum = isset($_GET['func']) ? (int)$_GET['func'] : 1;
if ($funcNum < 1 || $funcNum > 33) $funcNum = 1;

$sql = $functionMap[$funcNum];
?>
<!DOCTYPE html>
<html>
<head>
    <title>String Function Output</title>
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
        <h1>String Function Output</h1>
        
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