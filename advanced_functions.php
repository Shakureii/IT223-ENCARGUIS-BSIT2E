<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$functionMap = [
    1 => "SELECT first_name, gpa, IF(gpa >= 3.5, 'Honors', 'Regular') as Status FROM students LIMIT 5",
    2 => "SELECT IFNULL(NULL, 'Default Value') as IfNullTest",
    3 => "SELECT NULLIF(gpa, 3.75) as NullIfEqual FROM students LIMIT 5",
    4 => "SELECT COALESCE(NULL, NULL, 'Third Value', 'Fourth') as CoalesceTest",
    5 => "SELECT first_name, gpa, CASE WHEN gpa >= 3.8 THEN 'A+' WHEN gpa >= 3.5 THEN 'A' ELSE 'B+' END as Grade FROM students LIMIT 5",
    6 => "SELECT CAST(gpa AS DECIMAL(5,2)) as CastedGPA FROM students LIMIT 5",
    7 => "SELECT CONVERT(gpa, CHAR) as StringGPA FROM students LIMIT 5",
    8 => "SELECT USER() as CurrentUser",
    9 => "SELECT DATABASE() as CurrentDB",
    10 => "SELECT VERSION() as MySQLVersion",
    11 => "SELECT LAST_INSERT_ID() as LastID",
    12 => "SELECT ROW_COUNT() as RowCount",
    13 => "SELECT SQL_CALC_FOUND_ROWS * FROM students LIMIT 3; SELECT FOUND_ROWS() as TotalRows",
    14 => "SELECT GROUP_CONCAT(first_name ORDER BY first_name SEPARATOR ', ') as AllNames FROM students",
    15 => "SELECT JSON_OBJECT('name', first_name, 'gpa', gpa) as StudentJSON FROM students LIMIT 3",
    16 => "SELECT JSON_ARRAY(first_name, last_name, gpa) as StudentArray FROM students LIMIT 3",
    17 => "SELECT UUID() as UniqueID",
    18 => "SELECT BIN_TO_UUID(UUID_TO_BIN(UUID())) as UUIDTest",
    19 => "SELECT ISNULL(gpa) as IsGPA_Null FROM students LIMIT 5"
];

$funcNum = isset($_GET['func']) ? (int)$_GET['func'] : 1;
if ($funcNum < 1 || $funcNum > 19) $funcNum = 1;

$sql = $functionMap[$funcNum];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Advanced Function Output</title>
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
        <a href="index.php" class="back-link"   >← Back to Main Page</a>
        <h1>Advanced Function Output</h1>
        
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