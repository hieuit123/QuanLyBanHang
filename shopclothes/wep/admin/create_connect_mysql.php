
<?php
function create_connect(){
$servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "CuaHangDB";
                // Create connection
                $conn = new mysqli($servername, $username, $password,$dbname);
                mysqli_set_charset($conn, 'UTF8');
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                return $conn;
    }
?>