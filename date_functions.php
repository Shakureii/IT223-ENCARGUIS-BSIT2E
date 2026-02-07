<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

$functionMap = [
    1 => "SELECT NOW() as CurrentDateTime",
    2 => "SELECT CURDATE() as CurrentDate",
    3 => "SELECT CURTIME() as CurrentTime",
    4 => "SELECT DATE(enrollment_date) as EnrollmentDate FROM students LIMIT 5",
    5 => "SELECT TIME(enrollment_date) as EnrollmentTime FROM students LIMIT 5",
    6 => "SELECT YEAR(birth_date) as BirthYear FROM students LIMIT 5",
    7 => "SELECT MONTH(birth_date) as BirthMonth FROM students LIMIT 5",
    8 => "SELECT DAY(birth_date) as BirthDay FROM students LIMIT 5",
    9 => "SELECT HOUR(enrollment_date) as EnrollmentHour FROM students LIMIT 5",
    10 => "SELECT MINUTE(enrollment_date) as EnrollmentMinute FROM students LIMIT 5",
    11 => "SELECT SECOND(enrollment_date) as EnrollmentSecond FROM students LIMIT 5",
    12 => "SELECT DAYNAME(birth_date) as BirthDayName FROM students LIMIT 5",
    13 => "SELECT MONTHNAME(birth_date) as BirthMonthName FROM students LIMIT 5",
    14 => "SELECT EXTRACT(YEAR FROM birth_date) as Year FROM students LIMIT 5",
    15 => "SELECT DATE_ADD(birth_date, INTERVAL 18 YEAR) as AdultDate FROM students LIMIT 5",
    16 => "SELECT DATE_SUB(NOW(), INTERVAL 1 MONTH) as OneMonthAgo",
    17 => "SELECT DATEDIFF(NOW(), birth_date)/365 as ApproxAge FROM students LIMIT 5",
    18 => "SELECT TIMEDIFF(NOW(), enrollment_date) as TimeSinceEnrollment FROM students LIMIT 5",
    19 => "SELECT TIMESTAMPDIFF(YEAR, birth_date, NOW()) as Age FROM students LIMIT 5",
    20 => "SELECT DATE_FORMAT(birth_date, '%M %d, %Y') as FormattedDate FROM students LIMIT 5",
    21 => "SELECT STR_TO_DATE('2024-01-15', '%Y-%m-%d') as StringToDate",
    22 => "SELECT LAST_DAY(birth_date) as MonthEnd FROM students LIMIT 5",
    23 => "SELECT MAKEDATE(2024, 32) as MadeDate",
    24 => "SELECT MAKETIME(14, 30, 0) as MadeTime",
    25 => "SELECT QUARTER(birth_date) as BirthQuarter FROM students LIMIT 5",
    26 => "SELECT WEEK(birth_date) as BirthWeek FROM students LIMIT 5",
    27 => "SELECT WEEKDAY(birth_date) as WeekdayIndex FROM students LIMIT 5",
    28 => "SELECT WEEKOFYEAR(birth_date) as WeekOfYear FROM students LIMIT 5",
    29 => "SELECT YEARWEEK(birth_date) as YearWeek FROM students LIMIT 5",
    30 => "SELECT ADDDATE(birth_date, INTERVAL 1 MONTH) as NextMonth FROM students LIMIT 5",
    31 => "SELECT SUBDATE(birth_date, INTERVAL 1 YEAR) as PreviousYear FROM students LIMIT 5",
    32 => "SELECT ADDTIME(enrollment_date, '02:00:00') as TwoHoursLater FROM students LIMIT 5",
    33 => "SELECT SUBTIME(enrollment_date, '01:30:00') as EarlierTime FROM students LIMIT 5",
    34 => "SELECT CONVERT_TZ(NOW(), '+00:00', '+08:00') as ManilaTime",
    35 => "SELECT FROM_DAYS(738000) as DateFromDays",
    36 => "SELECT FROM_UNIXTIME(1672531200) as UnixTime",
    37 => "SELECT SEC_TO_TIME(3661) as SecondsToTime",
    38 => "SELECT TIME_TO_SEC('01:01:01') as TimeToSeconds",
    39 => "SELECT TO_DAYS(birth_date) as DaysFromZero FROM students LIMIT 5",
    40 => "SELECT TO_SECONDS(birth_date) as BirthSeconds FROM students LIMIT 5",
    41 => "SELECT UNIX_TIMESTAMP(birth_date) as UnixBirth FROM students LIMIT 5",
    42 => "SELECT UTC_DATE() as UTCDate",
    43 => "SELECT UTC_TIME() as UTCTime",
    44 => "SELECT UTC_TIMESTAMP() as UTCTimestamp",
    45 => "SELECT SYSDATE() as SystemDate",
    46 => "SELECT CURRENT_DATE() as CurrentDate",
    47 => "SELECT CURRENT_TIME() as CurrentTime",
    48 => "SELECT CURRENT_TIMESTAMP() as CurrentTimestamp",
    49 => "SELECT LOCALTIME() as LocalTime",
    50 => "SELECT LOCALTIMESTAMP() as LocalTimestamp"
];

$funcNum = isset($_GET['func']) ? (int)$_GET['func'] : 1;
if ($funcNum < 1 || $funcNum > 50) $funcNum = 1;

$sql = $functionMap[$funcNum];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Date Function Output</title>
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
        <h1>Date Function Output</h1>
        
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