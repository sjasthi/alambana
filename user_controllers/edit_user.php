<?php
/*echo "user_id: " . $_POST["id"] . "<br/>";
echo "first_name: " . $_POST["first_name"] . "<br/>";
echo "last_name: " . $_POST["last_name"] . "<br/>";
echo "about: " . $_POST["about"] . "<br/>";
echo "role: " . $_POST["role"];*/

require_once "../db_configuration.php";
session_start();
$connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$sql;
$statement;
$result;
if ($_SESSION["role"] === "Administrator") {
    $sql = "UPDATE users SET first_name=?, last_name=?, about=?, role=? WHERE id=?";
    $statement = $connection->prepare($sql);
    $statement->bind_param("ssssi", $_POST['first_name'], $_POST["last_name"], $_POST["about"], $_POST["role"], $_POST['id']);
    $result = $statement->execute();
} else if ($_SESSION["id"] == $_POST["id"]) {
    $sql = "UPDATE users SET first_name=?, last_name=?, about=? WHERE id=?";
    $statement = $connection->prepare($sql);
    $statement->bind_param("sssi", $_POST['first_name'], $_POST["last_name"], $_POST["about"], $_POST['id']);
    $result = $statement->execute();
} else {
    ?>
        <script>
            window.location.href = "../profile_edit.php?user_id=<?php echo $_POST["id"] ?>&forbidden=true"
        </script>
    <?php
}
$connection->close();
?>
<script>
    window.location.href = "../profile_edit.php?user_id=<?php echo $_POST["id"] ?>"
</script>