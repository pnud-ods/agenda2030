<?php

ini_set('max_execution_time', 2000); //240 seconds = 4 minutes
echo '<b>CARGA DADOS PNAD</b> ' . $execution_time . ' secs <br>'."\n\r";

$servername = "agenda2030-cluster-1.cluster-c0jcgqgfnijc.us-east-1.rds.amazonaws.com";
$username = "pnud";
$password = "pnud2030";
$dbname = "agenda2030";
$conn = new mysqli($servername, $username, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset('utf8');
$conn->autocommit(FALSE);


// Calculate time
$time_start = microtime(true);

$diretorio_fonte = "arquivos_fonte/PNAD";
$ano = "2013";
$tipo = "PES";//"DOM";
$table = "stg_pnad_pessoa";//"stg_pnad_domicilio";//

$sql = "delete from $table where v0101 = '$ano'";

if ($conn->query($sql) === TRUE) {
    echo "delete $table";
} else {
    $erro = "ER001: Erro - delete $table - " . $sql;
    $conn->rollback();
    echo "$erro\n\r";
    die;
}



$sas_file = "$diretorio_fonte/input$tipo$ano.sas";
$sas_handle = fopen($sas_file, "r");
$sas_columns = [];

if ($sas_handle) {
    echo "abrir arquivo $sas_file \n\r";

    while (($line = fgets($sas_handle)) !== false) {
        // Checks if is an SAS instruction line

        //if (substr($line, 0, 1) == "@") {
        if (strpos($line, '@') !== FALSE ) {

            $line = preg_replace('!\s+!', ' ', $line);
            $line = str_replace('INPUT ', '', $line);
            $line = trim($line);
            //echo $line;
            //echo "\n\r";

            $tmp_columns = array_slice(str_getcsv($line, " "), 0, 3);
            $tmp_columns[0] = intval(str_replace("@", "", $tmp_columns[0]));
            $tmp_columns[1] = utf8_encode($tmp_columns[1]);
            $tmp_columns[2] = intval(str_replace("$", "", str_getcsv( $tmp_columns[2], ".")[0]));
            //var_dump($tmp_columns);

            array_push ($sas_columns, $tmp_columns);
        }
    }

    fclose($sas_handle);
} else {
    echo "error opening sas file.\n\r";
}
//var_dump($sas_columns);
//die;

$end_sas_columns = end($sas_columns);

// Create sql insert header
$sql_insert_pnad_header = "INSERT INTO `" . $table . "` (";

foreach ($sas_columns as $key => $column) {
    $sql_insert_pnad_header .= "`". $column[1] ."`";

    if ($column === $end_sas_columns) {
        $sql_insert_pnad_header .= ") VALUES ";
    } else {
        $sql_insert_pnad_header .= ",";
    }

}

//echo $sql_insert_pnad_header;

// Read data file
$data_file = "$diretorio_fonte/$tipo$ano.txt";
$data_handle = fopen($data_file, "r");
$data_lines = 0;
//echo "abrir arquivo $data_file \n\r";

    $i = 0;
if ($data_handle) {

    while (($line = fgets($data_handle)) !== false) {
        // Checks if is an SAS instruction line
        $sql_insert_pnad_row .= "(";
        foreach ($sas_columns as $key => $column) {

            $sql_insert_pnad_row .= "'" . trim( substr($line, $column[0] - 1, $column[2]) ) . "'";
            $i++;

            if ($column === $end_sas_columns) {
                $sql_insert_pnad_row .= ")";
            } else {
                $sql_insert_pnad_row .= ",";
            }
        }

        $data_lines++;
        echo $data_lines;
        $sql_insert_pnad_row .= ",";


        if ($data_lines >  10000) {
            // Tira o ultimo caractere (virgula extra)
            $sql_insert_pnad_row = substr($sql_insert_pnad_row, 0, -1);

            if ($conn->query($sql_insert_pnad_header . $sql_insert_pnad_row) === TRUE) {
                echo "insert $table";
            } else {
                $erro = "ER001: Erro - insert $table - " . $sql;
                echo "$erro\n\r";
                $conn->rollback();
                die;
            }

            $data_lines = 1;
            $sql_insert_pnad_row = "";
        }
    }

    $sql_insert_pnad_row = substr($sql_insert_pnad_row, 0, -1);

    if ($conn->query($sql_insert_pnad_header . $sql_insert_pnad_row) === TRUE) {
        echo "insert $table";
    } else {
        $erro = "ER001: Erro - insert $table - " . $sql;
        echo "$erro\n\r";
        $conn->rollback();
        die;
    }


    // Commit your changes
    $conn->commit();
    // Close Database
    $conn->close();

    fclose($data_handle);

} else {
    echo "error opening data file.\n\r";
}

// Execution time in minutes
$execution_time = (microtime(true) - $time_start);

// Execution time of the script
echo '<b>Total Execution Time:</b> ' . $execution_time . ' secs <br>';
?>