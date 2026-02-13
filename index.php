<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT223 - Advanced Database Systems - SQL Functions</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        :root {
            --primary: #667eea;
            --secondary: #764ba2;
            --accent: #f093fb;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --dark: #1f2937;
            --light: #f9fafb;
            --border: #e5e7eb;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            line-height: 1.6;
            color: var(--dark);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
        }
        
        header {
            text-align: center;
            margin-bottom: 60px;
            color: white;
            animation: fadeInDown 0.6s ease;
        }
        
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        h1 {
            font-size: 3.5em;
            font-weight: 800;
            margin-bottom: 15px;
            letter-spacing: -0.5px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        
        .subtitle {
            font-size: 1.3em;
            font-weight: 300;
            margin-bottom: 10px;
            opacity: 0.95;
        }
        
        .description {
            font-size: 1em;
            opacity: 0.85;
        }
        
        .stats-bar {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 30px;
            flex-wrap: wrap;
        }
        
        .stat {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            padding: 15px 30px;
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,0.2);
        }
        
        .stat-number {
            font-size: 1.8em;
            font-weight: 700;
            display: block;
        }
        
        .stat-label {
            font-size: 0.9em;
            opacity: 0.8;
        }
        
        .category {
            margin-bottom: 50px;
            animation: fadeInUp 0.6s ease backwards;
        }
        
        .category:nth-child(2) { animation-delay: 0.1s; }
        .category:nth-child(3) { animation-delay: 0.2s; }
        .category:nth-child(4) { animation-delay: 0.3s; }
        .category:nth-child(5) { animation-delay: 0.4s; }
        
        .category-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            padding: 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border-left: 5px solid var(--primary);
        }
        
        .category-icon {
            font-size: 2em;
            color: var(--primary);
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(102, 126, 234, 0.1);
            border-radius: 10px;
        }
        
        .category-header h2 {
            flex: 1;
            font-size: 1.8em;
            color: var(--dark);
            margin: 0;
        }
        
        .function-count {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.95em;
            font-weight: 600;
        }
        
        .table-wrapper {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th {
            background: linear-gradient(135deg, var(--dark), #374151);
            color: white;
            padding: 18px 15px;
            text-align: left;
            font-weight: 600;
            font-size: 0.95em;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: sticky;
            top: 0;
        }
        
        td {
            padding: 16px 15px;
            border-bottom: 1px solid var(--border);
            vertical-align: top;
        }
        
        tr:hover {
            background: rgba(102, 126, 234, 0.05);
        }
        
        tr:last-child td {
            border-bottom: none;
        }
        
        .func-name {
            font-weight: 700;
            color: var(--primary);
            font-family: 'Monaco', 'Courier New', monospace;
            font-size: 0.95em;
        }
        
        .func-description {
            color: #6b7280;
            font-size: 0.95em;
            line-height: 1.5;
        }
        
        .sql-code {
            font-family: 'Monaco', 'Courier New', monospace;
            background: #f3f4f6;
            color: #1f2937;
            padding: 12px;
            border-radius: 8px;
            font-size: 0.85em;
            white-space: pre-wrap;
            word-break: break-all;
            border-left: 3px solid var(--primary);
            overflow-x: auto;
            max-height: 120px;
            overflow-y: auto;
            line-height: 1.5;
        }
        
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #888;
        }
        
        .action-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, var(--success), #059669);
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9em;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            white-space: nowrap;
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }
        
        .action-btn i {
            font-size: 0.85em;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .modal.show {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            width: 90%;
            max-width: 900px;
            max-height: 80vh;
            overflow-y: auto;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            animation: slideUp 0.3s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--border);
        }

        .modal-header h2 {
            margin: 0;
            color: var(--dark);
            font-size: 1.8em;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 2em;
            cursor: pointer;
            color: var(--dark);
            transition: color 0.2s;
        }

        .close-btn:hover {
            color: var(--danger);
        }

        .modal-body {
            margin-bottom: 20px;
        }

        .sql-section {
            margin-bottom: 25px;
        }

        .sql-section h3 {
            color: var(--primary);
            margin-bottom: 10px;
            font-size: 1.1em;
        }

        .sql-display {
            background: #f3f4f6;
            border-left: 4px solid var(--primary);
            padding: 15px;
            border-radius: 8px;
            font-family: 'Monaco', 'Courier New', monospace;
            font-size: 0.9em;
            overflow-x: auto;
            color: #1f2937;
        }

        .output-section {
            margin-top: 25px;
        }

        .output-section h3 {
            color: var(--success);
            margin-bottom: 10px;
            font-size: 1.1em;
        }

        .output-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid var(--border);
            border-radius: 8px;
            overflow: hidden;
        }

        .output-table thead {
            background: linear-gradient(135deg, var(--success), #059669);
            color: white;
        }

        .output-table th {
            padding: 12px;
            text-align: left;
            font-weight: 600;
            background: linear-gradient(135deg, var(--success), #059669) !important;
        }

        .output-table td {
            padding: 12px;
            border-bottom: 1px solid var(--border);
        }

        .output-table tbody tr:hover {
            background: #f9fafb;
        }

        .loading {
            text-align: center;
            padding: 40px 20px;
        }

        .spinner {
            border: 4px solid var(--border);
            border-radius: 50%;
            border-top: 4px solid var(--primary);
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto 15px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .error-message {
            background: #fee;
            border-left: 4px solid var(--danger);
            color: var(--danger);
            padding: 15px;
            border-radius: 8px;
            margin-top: 10px;
        }

        .success-message {
            background: #efe;
            border-left: 4px solid var(--success);
            color: var(--success);
            padding: 15px;
            border-radius: 8px;
            margin-top: 10px;
        }

        footer {
            text-align: center;
            margin-top: 60px;
            padding: 40px 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        footer h3 {
            color: var(--dark);
            margin-bottom: 20px;
            font-size: 1.5em;
        }
        
        .btn-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }
        
        .download-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 14px 30px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1em;
        }
        
        .download-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }
        
        .info-box {
            background: rgba(102, 126, 234, 0.1);
            border-left: 4px solid var(--primary);
            padding: 15px 20px;
            border-radius: 8px;
            margin-top: 20px;
            color: #1f2937;
        }
        
        .info-box strong {
            color: var(--primary);
        }
        
        .footer-stats {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 25px;
            flex-wrap: wrap;
        }
        
        .footer-stat {
            text-align: center;
        }
        
        .footer-stat-number {
            font-size: 2em;
            font-weight: 700;
            color: var(--primary);
        }
        
        .footer-stat-label {
            color: #6b7280;
            font-size: 0.9em;
        }
        
        @media (max-width: 768px) {
            h1 {
                font-size: 2.5em;
            }
            
            .category-header {
                flex-direction: column;
                text-align: center;
            }
            
            .stats-bar {
                gap: 15px;
            }
            
            table {
                font-size: 0.85em;
            }
            
            td {
                padding: 12px 8px;
            }
            
            th {
                padding: 12px 8px;
            }
            
            .sql-code {
                font-size: 0.75em;
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1><i class="fas fa-database" style="margin-right: 10px;"></i>SQL Functions Explorer</h1>
            <div class="subtitle">IT223 - Advanced Database Systems</div>
            <p class="description"></p>
            
            <div class="stats-bar">
                <div class="stat">
                    <span class="stat-number">138</span>
                    <span class="stat-label">Total Functions</span>
                </div>
                <div class="stat">
                    <span class="stat-number">4</span>
                    <span class="stat-label">Categories</span>
                </div>
                <div class="stat">
                    <span class="stat-number">∞</span>
                    <span class="stat-label">Possibilities</span>
                </div>
            </div>
        </header>

        <div class="category">
            <div class="category-header">
                <div class="category-icon"><i class="fas fa-font"></i></div>
                <h2>String Functions</h2>
                <span class="function-count">33 Functions</span>
            </div>
            
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 120px;">Function</th>
                            <th style="width: 280px;">Description</th>
                            <th>Example Code</th>
                            <th style="width: 110px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stringFunctions = [
                        ['UPPER', 'Converts string to uppercase', "SELECT UPPER(first_name) as UpperName FROM students LIMIT 5"],
                        ['LOWER', 'Converts string to lowercase', "SELECT LOWER(last_name) as LowerName FROM students LIMIT 5"],
                        ['CONCAT', 'Concatenates two or more strings', "SELECT CONCAT(first_name, ' ', last_name) as FullName FROM students LIMIT 5"],
                        ['SUBSTRING', 'Extracts substring from a string', "SELECT SUBSTRING(first_name, 1, 3) as FirstThree FROM students LIMIT 5"],
                        ['CHAR_LENGTH', 'Returns length of string', "SELECT first_name, CHAR_LENGTH(first_name) as NameLength FROM students LIMIT 5"],
                        ['TRIM', 'Removes leading/trailing spaces', "SELECT TRIM('   Hello World   ') as Trimmed"],
                        ['LTRIM', 'Removes leading spaces', "SELECT LTRIM('   Hello World') as LeftTrimmed"],
                        ['RTRIM', 'Removes trailing spaces', "SELECT RTRIM('Hello World   ') as RightTrimmed"],
                        ['REPLACE', 'Replaces occurrences of substring', "SELECT REPLACE(email, '@email.com', '@university.edu') as NewEmail FROM students LIMIT 5"],
                        ['REVERSE', 'Reverses a string', "SELECT REVERSE(first_name) as ReversedName FROM students LIMIT 5"],
                        ['LEFT', 'Extracts left part of string', "SELECT LEFT(first_name, 2) as FirstTwo FROM students LIMIT 5"],
                        ['RIGHT', 'Extracts right part of string', "SELECT RIGHT(last_name, 3) as LastThree FROM students LIMIT 5"],
                        ['LOCATE', 'Returns position of substring', "SELECT LOCATE('@', email) as AtPosition FROM students LIMIT 5"],
                        ['POSITION', 'Returns position of substring', "SELECT POSITION('a' IN first_name) as APosition FROM students LIMIT 5"],
                        ['INSERT', 'Inserts substring into string', "SELECT INSERT(email, 1, 0, 'student-') as ModifiedEmail FROM students LIMIT 5"],
                        ['REPEAT', 'Repeats a string', "SELECT REPEAT('*', 5) as Stars"],
                        ['SPACE', 'Returns string of spaces', "SELECT CONCAT(first_name, SPACE(2), last_name) as SpacedName FROM students LIMIT 5"],
                        ['STRCMP', 'Compares two strings', "SELECT STRCMP(first_name, 'John') as Comparison FROM students LIMIT 5"],
                        ['ASCII', 'Returns ASCII value of character', "SELECT ASCII(SUBSTRING(first_name, 1, 1)) as FirstCharCode FROM students LIMIT 5"],
                        ['CHAR', 'Returns character from ASCII code', "SELECT CHAR(65) as CharA"],
                        ['LCASE', 'Converts to lowercase (alias LOWER)', "SELECT LCASE(first_name) as LowerName FROM students LIMIT 5"],
                        ['UCASE', 'Converts to uppercase (alias UPPER)', "SELECT UCASE(last_name) as UpperName FROM students LIMIT 5"],
                        ['MID', 'Extracts substring (alias SUBSTRING)', "SELECT MID(first_name, 2, 3) as MiddlePart FROM students LIMIT 5"],
                        ['INSTR', 'Returns position of substring', "SELECT INSTR(first_name, 'a') as AInName FROM students LIMIT 5"],
                        ['LPAD', 'Left-pads string to specified length', "SELECT LPAD(gpa, 6, '0') as PaddedGPA FROM students LIMIT 5"],
                        ['RPAD', 'Right-pads string to specified length', "SELECT RPAD(first_name, 10, '.') as PaddedName FROM students LIMIT 5"],
                        ['FIELD', 'Returns index position of value', "SELECT FIELD(department, 'Computer Science', 'Mathematics', 'English') as DeptIndex FROM courses LIMIT 5"],
                        ['FIND_IN_SET', 'Returns position in comma list', "SELECT FIND_IN_SET('Computer Science', 'Computer Science,Mathematics,English') as Position"],
                        ['FORMAT', 'Formats number with commas', "SELECT FORMAT(annual_fee, 2) as FormattedFee FROM students LIMIT 5"],
                        ['HEX', 'Returns hex value', "SELECT HEX(65) as HexValue"],
                        ['UNHEX', 'Converts hex to characters', "SELECT UNHEX('41') as CharFromHex"],
                        ['SOUNDEX', 'Returns soundex code', "SELECT SOUNDEX(first_name), first_name FROM students LIMIT 5"],
                        ['SUBSTRING_INDEX', 'Returns substring before delimiter', "SELECT SUBSTRING_INDEX(email, '@', 1) as Username FROM students LIMIT 5"]
                    ];
                    
                    $counter = 1;
                    foreach ($stringFunctions as $function) {
                        $escapedSql = addslashes($function[2]);
                        echo "<tr>";
                        echo "<td><span class='func-name'>{$function[0]}</span></td>";
                        echo "<td><span class='func-description'>{$function[1]}</span></td>";
                        echo "<td><div class='sql-code'>{$function[2]}</div></td>";
                        echo "<td><button class='action-btn' onclick=\"showOutput('{$function[0]}', '{$escapedSql}')\" title='Execute and view results'><i class='fas fa-play'></i>Try</button></td>";
                        echo "</tr>";
                        $counter++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="category">
            <div class="category-header">
                <div class="category-icon"><i class="fas fa-calculator"></i></div>
                <h2>Numeric Functions</h2>
                <span class="function-count">36 Functions</span>
            </div>
            
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 120px;">Function</th>
                            <th style="width: 280px;">Description</th>
                            <th>Example Code</th>
                            <th style="width: 110px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $numericFunctions = [
                        ['ABS', 'Returns absolute value', "SELECT ABS(-123.45) as AbsoluteValue"],
                        ['ROUND', 'Rounds number to specified decimal', "SELECT ROUND(gpa, 1) as RoundedGPA FROM students LIMIT 5"],
                        ['CEIL', 'Returns smallest integer >= value', "SELECT CEIL(gpa) as CeilingGPA FROM students LIMIT 5"],
                        ['FLOOR', 'Returns largest integer <= value', "SELECT FLOOR(gpa) as FloorGPA FROM students LIMIT 5"],
                        ['MOD', 'Returns remainder of division', "SELECT MOD(credits_earned, 3) as Remainder FROM students LIMIT 5"],
                        ['POW', 'Returns value raised to power', "SELECT POW(2, 3) as PowerResult"],
                        ['SQRT', 'Returns square root', "SELECT SQRT(annual_fee) as FeeSqrt FROM students LIMIT 5"],
                        ['RAND', 'Returns random number', "SELECT RAND() as RandomNumber"],
                        ['TRUNCATE', 'Truncates number to decimals', "SELECT TRUNCATE(gpa, 0) as TruncatedGPA FROM students LIMIT 5"],
                        ['SIGN', 'Returns sign of number', "SELECT SIGN(gpa - 3.5) as GPASign FROM students LIMIT 5"],
                        ['EXP', 'Returns e raised to power', "SELECT EXP(1) as EValue"],
                        ['LN', 'Returns natural logarithm', "SELECT LN(annual_fee) as LogFee FROM students LIMIT 5"],
                        ['LOG', 'Returns logarithm', "SELECT LOG(annual_fee) as Log10Fee FROM students LIMIT 5"],
                        ['LOG2', 'Returns base-2 logarithm', "SELECT LOG2(credits_earned) as Log2Credits FROM students LIMIT 5"],
                        ['LOG10', 'Returns base-10 logarithm', "SELECT LOG10(annual_fee) as Log10Fee FROM students LIMIT 5"],
                        ['PI', 'Returns PI value', "SELECT PI() as PiValue"],
                        ['SIN', 'Returns sine of angle', "SELECT SIN(1) as SineValue"],
                        ['COS', 'Returns cosine of angle', "SELECT COS(1) as CosineValue"],
                        ['TAN', 'Returns tangent of angle', "SELECT TAN(1) as TangentValue"],
                        ['ASIN', 'Returns arc sine', "SELECT ASIN(0.5) as ArcSine"],
                        ['ACOS', 'Returns arc cosine', "SELECT ACOS(0.5) as ArcCosine"],
                        ['ATAN', 'Returns arc tangent', "SELECT ATAN(1) as ArcTangent"],
                        ['ATAN2', 'Returns arc tangent of two numbers', "SELECT ATAN2(1, 2) as ArcTangent2"],
                        ['COT', 'Returns cotangent', "SELECT COT(1) as Cotangent"],
                        ['DEGREES', 'Converts radians to degrees', "SELECT DEGREES(1) as DegreesValue"],
                        ['RADIANS', 'Converts degrees to radians', "SELECT RADIANS(180) as RadiansValue"],
                        ['POWER', 'Returns value raised to power', "SELECT POWER(2, 4) as PowerResult"],
                        ['GREATEST', 'Returns greatest value', "SELECT GREATEST(gpa, 3.0, 2.5) as GreatestValue FROM students LIMIT 5"],
                        ['LEAST', 'Returns smallest value', "SELECT LEAST(gpa, 4.0, 3.0) as LeastValue FROM students LIMIT 5"],
                        ['BIN', 'Returns binary representation', "SELECT BIN(10) as BinaryValue"],
                        ['OCT', 'Returns octal representation', "SELECT OCT(10) as OctalValue"],
                        ['HEX', 'Returns hexadecimal value', "SELECT HEX(255) as HexValue"],
                        ['CONV', 'Converts between number bases', "SELECT CONV('A', 16, 10) as DecimalValue"],
                        ['BIT_COUNT', 'Returns number of set bits', "SELECT BIT_COUNT(10) as BitCount"],
                        ['CRC32', 'Returns CRC32 value', "SELECT CRC32(first_name) as NameCRC FROM students LIMIT 5"],
                        ['DIV', 'Integer division', "SELECT credits_earned DIV 15 as FullSemesters FROM students LIMIT 5"]
                    ];
                    
                    $counter = 1;
                    foreach ($numericFunctions as $function) {
                        $escapedSql = addslashes($function[2]);
                        echo "<tr>";
                        echo "<td><span class='func-name'>{$function[0]}</span></td>";
                        echo "<td><span class='func-description'>{$function[1]}</span></td>";
                        echo "<td><div class='sql-code'>{$function[2]}</div></td>";
                        echo "<td><button class='action-btn' onclick=\"showOutput('{$function[0]}', '{$escapedSql}')\" title='Execute and view results'><i class='fas fa-play'></i>Try</button></td>";
                        echo "</tr>";
                        $counter++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="category">
            <div class="category-header">
                <div class="category-icon"><i class="fas fa-calendar-alt"></i></div>
                <h2>Date Functions</h2>
                <span class="function-count">50 Functions</span>
            </div>
            
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 120px;">Function</th>
                            <th style="width: 280px;">Description</th>
                            <th>Example Code</th>
                            <th style="width: 110px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $dateFunctions = [
                        ['NOW', 'Current date and time', "SELECT NOW() as CurrentDateTime"],
                        ['CURDATE', 'Current date', "SELECT CURDATE() as CurrentDate"],
                        ['CURTIME', 'Current time', "SELECT CURTIME() as CurrentTime"],
                        ['DATE', 'Extracts date part', "SELECT DATE(enrollment_date) as EnrollmentDate FROM students LIMIT 5"],
                        ['TIME', 'Extracts time part', "SELECT TIME(enrollment_date) as EnrollmentTime FROM students LIMIT 5"],
                        ['YEAR', 'Extracts year', "SELECT YEAR(birth_date) as BirthYear FROM students LIMIT 5"],
                        ['MONTH', 'Extracts month', "SELECT MONTH(birth_date) as BirthMonth FROM students LIMIT 5"],
                        ['DAY', 'Extracts day', "SELECT DAY(birth_date) as BirthDay FROM students LIMIT 5"],
                        ['HOUR', 'Extracts hour', "SELECT HOUR(enrollment_date) as EnrollmentHour FROM students LIMIT 5"],
                        ['MINUTE', 'Extracts minute', "SELECT MINUTE(enrollment_date) as EnrollmentMinute FROM students LIMIT 5"],
                        ['SECOND', 'Extracts second', "SELECT SECOND(enrollment_date) as EnrollmentSecond FROM students LIMIT 5"],
                        ['DAYNAME', 'Returns day name', "SELECT DAYNAME(birth_date) as BirthDayName FROM students LIMIT 5"],
                        ['MONTHNAME', 'Returns month name', "SELECT MONTHNAME(birth_date) as BirthMonthName FROM students LIMIT 5"],
                        ['EXTRACT', 'Extracts date part', "SELECT EXTRACT(YEAR FROM birth_date) as Year FROM students LIMIT 5"],
                        ['DATE_ADD', 'Adds time interval', "SELECT DATE_ADD(birth_date, INTERVAL 18 YEAR) as AdultDate FROM students LIMIT 5"],
                        ['DATE_SUB', 'Subtracts time interval', "SELECT DATE_SUB(NOW(), INTERVAL 1 MONTH) as OneMonthAgo"],
                        ['DATEDIFF', 'Difference between dates', "SELECT DATEDIFF(NOW(), birth_date)/365 as ApproxAge FROM students LIMIT 5"],
                        ['TIMEDIFF', 'Difference between times', "SELECT TIMEDIFF(NOW(), enrollment_date) as TimeSinceEnrollment FROM students LIMIT 5"],
                        ['TIMESTAMPDIFF', 'Difference in specified unit', "SELECT TIMESTAMPDIFF(YEAR, birth_date, NOW()) as Age FROM students LIMIT 5"],
                        ['DATE_FORMAT', 'Formats date', "SELECT DATE_FORMAT(birth_date, '%M %d, %Y') as FormattedDate FROM students LIMIT 5"],
                        ['STR_TO_DATE', 'Converts string to date', "SELECT STR_TO_DATE('2024-01-15', '%Y-%m-%d') as StringToDate"],
                        ['LAST_DAY', 'Last day of month', "SELECT LAST_DAY(birth_date) as MonthEnd FROM students LIMIT 5"],
                        ['MAKEDATE', 'Creates date from year and day', "SELECT MAKEDATE(2024, 32) as MadeDate"],
                        ['MAKETIME', 'Creates time from hour/min/sec', "SELECT MAKETIME(14, 30, 0) as MadeTime"],
                        ['QUARTER', 'Returns quarter of year', "SELECT QUARTER(birth_date) as BirthQuarter FROM students LIMIT 5"],
                        ['WEEK', 'Week number of year', "SELECT WEEK(birth_date) as BirthWeek FROM students LIMIT 5"],
                        ['WEEKDAY', 'Weekday index (0=Monday)', "SELECT WEEKDAY(birth_date) as WeekdayIndex FROM students LIMIT 5"],
                        ['WEEKOFYEAR', 'Week number (1-53)', "SELECT WEEKOFYEAR(birth_date) as WeekOfYear FROM students LIMIT 5"],
                        ['YEARWEEK', 'Year and week', "SELECT YEARWEEK(birth_date) as YearWeek FROM students LIMIT 5"],
                        ['ADDDATE', 'Adds to date (alias DATE_ADD)', "SELECT ADDDATE(birth_date, INTERVAL 1 MONTH) as NextMonth FROM students LIMIT 5"],
                        ['SUBDATE', 'Subtracts from date', "SELECT SUBDATE(birth_date, INTERVAL 1 YEAR) as PreviousYear FROM students LIMIT 5"],
                        ['ADDTIME', 'Adds time', "SELECT ADDTIME(enrollment_date, '02:00:00') as TwoHoursLater FROM students LIMIT 5"],
                        ['SUBTIME', 'Subtracts time', "SELECT SUBTIME(enrollment_date, '01:30:00') as EarlierTime FROM students LIMIT 5"],
                        ['CONVERT_TZ', 'Converts timezone', "SELECT CONVERT_TZ(NOW(), '+00:00', '+08:00') as ManilaTime"],
                        ['FROM_DAYS', 'Converts day number to date', "SELECT FROM_DAYS(738000) as DateFromDays"],
                        ['FROM_UNIXTIME', 'Converts Unix timestamp', "SELECT FROM_UNIXTIME(1672531200) as UnixTime"],
                        ['SEC_TO_TIME', 'Seconds to time', "SELECT SEC_TO_TIME(3661) as SecondsToTime"],
                        ['TIME_TO_SEC', 'Time to seconds', "SELECT TIME_TO_SEC('01:01:01') as TimeToSeconds"],
                        ['TO_DAYS', 'Converts date to day number', "SELECT TO_DAYS(birth_date) as DaysFromZero FROM students LIMIT 5"],
                        ['TO_SECONDS', 'Converts to seconds', "SELECT TO_SECONDS(birth_date) as BirthSeconds FROM students LIMIT 5"],
                        ['UNIX_TIMESTAMP', 'Unix timestamp', "SELECT UNIX_TIMESTAMP(birth_date) as UnixBirth FROM students LIMIT 5"],
                        ['UTC_DATE', 'UTC date', "SELECT UTC_DATE() as UTCDate"],
                        ['UTC_TIME', 'UTC time', "SELECT UTC_TIME() as UTCTime"],
                        ['UTC_TIMESTAMP', 'UTC timestamp', "SELECT UTC_TIMESTAMP() as UTCTimestamp"],
                        ['SYSDATE', 'System date and time', "SELECT SYSDATE() as SystemDate"],
                        ['CURRENT_DATE', 'Current date', "SELECT CURRENT_DATE() as CurrentDate"],
                        ['CURRENT_TIME', 'Current time', "SELECT CURRENT_TIME() as CurrentTime"],
                        ['CURRENT_TIMESTAMP', 'Current timestamp', "SELECT CURRENT_TIMESTAMP() as CurrentTimestamp"],
                        ['LOCALTIME', 'Local time', "SELECT LOCALTIME() as LocalTime"],
                        ['LOCALTIMESTAMP', 'Local timestamp', "SELECT LOCALTIMESTAMP() as LocalTimestamp"]
                    ];
                    
                    $counter = 1;
                    foreach ($dateFunctions as $function) {
                        $escapedSql = addslashes($function[2]);
                        echo "<tr>";
                        echo "<td><span class='func-name'>{$function[0]}</span></td>";
                        echo "<td><span class='func-description'>{$function[1]}</span></td>";
                        echo "<td><div class='sql-code'>{$function[2]}</div></td>";
                        echo "<td><button class='action-btn' onclick=\"showOutput('{$function[0]}', '{$escapedSql}')\" title='Execute and view results'><i class='fas fa-play'></i>Try</button></td>";
                        echo "</tr>";
                        $counter++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="category">
            <div class="category-header">
                <div class="category-icon"><i class="fas fa-cogs"></i></div>
                <h2>Advanced Functions</h2>
                <span class="function-count">19 Functions</span>
            </div>
            
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 120px;">Function</th>
                            <th style="width: 280px;">Description</th>
                            <th>Example Code</th>
                            <th style="width: 110px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $advancedFunctions = [
                        ['IF', 'Returns value if true, else other', "SELECT first_name, gpa, IF(gpa >= 3.5, 'Honors', 'Regular') as Status FROM students LIMIT 5"],
                        ['IFNULL', 'Returns second if first is NULL', "SELECT IFNULL(NULL, 'Default Value') as IfNullTest"],
                        ['NULLIF', 'Returns NULL if two values equal', "SELECT NULLIF(gpa, 3.75) as NullIfEqual FROM students LIMIT 5"],
                        ['COALESCE', 'Returns first non-NULL value', "SELECT COALESCE(NULL, NULL, 'Third Value', 'Fourth') as CoalesceTest"],
                        ['CASE', 'Conditional logic', "SELECT first_name, gpa, CASE WHEN gpa >= 3.8 THEN 'A+' WHEN gpa >= 3.5 THEN 'A' ELSE 'B+' END as Grade FROM students LIMIT 5"],
                        ['CAST', 'Converts value to specified type', "SELECT CAST(gpa AS DECIMAL(5,2)) as CastedGPA FROM students LIMIT 5"],
                        ['CONVERT', 'Converts value to specified type', "SELECT CONVERT(gpa, CHAR) as StringGPA FROM students LIMIT 5"],
                        ['USER', 'Current user name', "SELECT USER() as CurrentUser"],
                        ['DATABASE', 'Current database name', "SELECT DATABASE() as CurrentDB"],
                        ['VERSION', 'MySQL version', "SELECT VERSION() as MySQLVersion"],
                        ['LAST_INSERT_ID', 'Last auto-increment ID', "SELECT LAST_INSERT_ID() as LastID"],
                        ['ROW_COUNT', 'Number of rows affected', "SELECT ROW_COUNT() as RowCount"],
                        ['FOUND_ROWS', 'Rows returned by last query', "SELECT SQL_CALC_FOUND_ROWS * FROM students LIMIT 3; SELECT FOUND_ROWS() as TotalRows"],
                        ['GROUP_CONCAT', 'Concatenates group values', "SELECT GROUP_CONCAT(first_name ORDER BY first_name SEPARATOR ', ') as AllNames FROM students"],
                        ['JSON_OBJECT', 'Creates JSON object', "SELECT JSON_OBJECT('name', first_name, 'gpa', gpa) as StudentJSON FROM students LIMIT 3"],
                        ['JSON_ARRAY', 'Creates JSON array', "SELECT JSON_ARRAY(first_name, last_name, gpa) as StudentArray FROM students LIMIT 3"],
                        ['UUID', 'Generates UUID', "SELECT UUID() as UniqueID"],
                        ['BIN_TO_UUID', 'Converts binary to UUID', "SELECT BIN_TO_UUID(UUID_TO_BIN(UUID())) as UUIDTest"],
                        ['ISNULL', 'Tests if value is NULL', "SELECT ISNULL(gpa) as IsGPA_Null FROM students LIMIT 5"]
                    ];
                    
                    $counter = 1;
                    foreach ($advancedFunctions as $function) {
                        $escapedSql = addslashes($function[2]);
                        echo "<tr>";
                        echo "<td><span class='func-name'>{$function[0]}</span></td>";
                        echo "<td><span class='func-description'>{$function[1]}</span></td>";
                        echo "<td><div class='sql-code'>{$function[2]}</div></td>";
                        echo "<td><button class='action-btn' onclick=\"showOutput('{$function[0]}', '{$escapedSql}')\" title='Execute and view results'><i class='fas fa-play'></i>Try</button></td>";
                        echo "</tr>";
                        $counter++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <footer>
            <h3><i class="fas fa-download" style="margin-right: 10px;"></i>Download Database Resources</h3>
            
            <div class="btn-group">
                <a href="database/university.sql" class="download-btn" download>
                    <i class="fas fa-file-database"></i>Download SQL File
                </a>
                <a href="#" class="download-btn" style="background: linear-gradient(135deg, #f59e0b, #f97316);">
                    <i class="fas fa-book"></i>Documentation
                </a>
            </div>
            
            <div class="info-box">
                <strong><i class="fas fa-lightbulb" style="margin-right: 8px;"></i>Pro Tip:</strong> Click on the "Try" buttons to execute each SQL function and see the actual results and outputs in action. All queries run against the university_db database.
            </div>
            
            <div class="footer-stats">
                <div class="footer-stat">
                    <div class="footer-stat-number">138</div>
                    <div class="footer-stat-label">Total Functions</div>
                </div>
                <div class="footer-stat">
                    <div class="footer-stat-number">4</div>
                    <div class="footer-stat-label">Categories</div>
                </div>
                <div class="footer-stat">
                    <div class="footer-stat-number">1</div>
                    <div class="footer-stat-label">Platform</div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Output Modal -->
    <div id="outputModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><span id="functionName"></span> - Results</h2>
                <button class="close-btn" onclick="closeModal()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="sql-section">
                    <h3><i class="fas fa-code" style="margin-right: 8px;"></i>SQL Query</h3>
                    <div class="sql-display" id="sqlDisplay"></div>
                </div>
                <div class="output-section" id="outputSection">
                    <h3><i class="fas fa-table" style="margin-right: 8px;"></i>Query Results</h3>
                    <div id="outputContent"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showOutput(functionName, sqlQuery) {
            const modal = document.getElementById('outputModal');
            const functionNameEl = document.getElementById('functionName');
            const sqlDisplay = document.getElementById('sqlDisplay');
            const outputContent = document.getElementById('outputContent');
            
            // Set function name and SQL query
            functionNameEl.textContent = functionName;
            sqlDisplay.textContent = sqlQuery;
            
            // Show loading state
            outputContent.innerHTML = '<div class="loading"><div class="spinner"></div><p>Executing query...</p></div>';
            modal.classList.add('show');
            
            // Fetch results from backend
            fetch('execute_sql.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    sql: sqlQuery
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    displayResults(data.results, data.columns);
                } else {
                    outputContent.innerHTML = '<div class="error-message"><strong>Error:</strong> ' + data.error + '</div>';
                }
            })
            .catch(error => {
                outputContent.innerHTML = '<div class="error-message"><strong>Error:</strong> ' + error.message + '</div>';
            });
        }

        function displayResults(results, columns) {
            const outputContent = document.getElementById('outputContent');
            
            if (!results || results.length === 0) {
                outputContent.innerHTML = '<div class="success-message">Query executed successfully with no results.</div>';
                return;
            }

            // Create table
            let html = '<table class="output-table"><thead><tr>';
            columns.forEach(col => {
                html += '<th>' + escapeHtml(col) + '</th>';
            });
            html += '</tr></thead><tbody>';

            results.forEach(row => {
                html += '<tr>';
                columns.forEach(col => {
                    const value = row[col] !== null ? row[col] : '<em>NULL</em>';
                    html += '<td>' + escapeHtml(String(value)) + '</td>';
                });
                html += '</tr>';
            });

            html += '</tbody></table>';
            outputContent.innerHTML = html;
        }

        function closeModal() {
            const modal = document.getElementById('outputModal');
            modal.classList.remove('show');
        }

        function escapeHtml(text) {
            const map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };
            return text.replace(/[&<>"']/g, m => map[m]);
        }

        // Close modal when clicking outside
        document.getElementById('outputModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeModal();
            }
        });
    </script>
</body>
</html>