<?php
    $serverName = "192.168.0.111";
    $database = "Regsosek_PDN";
    $uid = 'sisadmin';
    $pwd = 'D3s3mb3rc3r14';

    try {
        $conn = new PDO(
            "sqlsrv:server=$serverName;Database=$database;TrustServerCertificate=1;",
            $uid,
            $pwd,
            array(
                //PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            )
        );
    }
    catch(PDOException $e) {
        die("Error connecting to SQL Server: " . $e->getMessage());
    }
    //echo "<p>Connected to SQL Server</p>\n";
/*
    echo "<p>Connected to SQL Server</p>\n";

    echo "<p>PDO::ATTR_PERSISTENT value:</p>\n";

    echo "<pre>";
    echo var_export($conn->getAttribute(PDO::ATTR_PERSISTENT), true);
    echo "</pre>";

    echo "<p>PDO::ATTR_DRIVER_NAME value:</p>\n";

    echo "<pre>";
    echo var_export($conn->getAttribute(PDO::ATTR_DRIVER_NAME), true);
    echo "</pre>";

    echo "<p>PDO::ATTR_CLIENT_VERSION value:</p>\n";

    echo "<pre>";
    echo var_export($conn->getAttribute(PDO::ATTR_CLIENT_VERSION), true);
    echo "</pre>";

    $query = 'select top 5 * from artregsosek';
    $stmt = $conn->query( $query );

    echo "<pre>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        print_r($row);
    }
    echo "</pre>";

    // Free statement and connection resources.
    $stmt = null;
    $conn = null;
*/
?>
