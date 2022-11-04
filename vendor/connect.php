        <?php
        try{
        $connect = new PDO('mysql:host=localhost;dbname=portal;charset=utf8', 'root', '');
        }
        catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
            }
?>