<?php
if (!empty($_GET["category_id"])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tbn24";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $cat = $_GET["category_id"];
    $sql = "SELECT id,title FROM news WHERE category_id = $cat";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        ?>
        <select name="data[BreakingNews][news_id]" class="span9 uniform">
            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <option value = "<?php echo $row["id"]; ?>"><?php echo $row["title"]; ?></option>
                <?php
                // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            }
            ?>
        </select>
        <?php
    } else {
        echo "0 results";
    }
    $conn->close();
}
?>
