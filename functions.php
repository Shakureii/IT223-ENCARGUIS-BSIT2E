
<?php
function executeQuery($conn, $sql) {
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        return "Error: " . mysqli_error($conn);
    }
    
    if (is_bool($result)) {
        return "Query executed successfully. Affected rows: " . mysqli_affected_rows($conn);
    }
    
    $output = '<table border="1" cellpadding="5" cellspacing="0">';
    
    // Add headers
    $output .= '<tr>';
    while ($field = mysqli_fetch_field($result)) {
        $output .= '<th>' . htmlspecialchars($field->name) . '</th>';
    }
    $output .= '</tr>';
    
    // Add rows
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '<tr>';
        foreach ($row as $value) {
            $output .= '<td>' . htmlspecialchars($value) . '</td>';
        }
        $output .= '</tr>';
    }
    
    $output .= '</table>';
    mysqli_free_result($result);
    
    return $output;
}
?>
