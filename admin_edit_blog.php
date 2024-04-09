<?php
require 'db_configuration.php';
$status = session_status();
if ($status == PHP_SESSION_NONE) {
	session_start();
}

// Block unauthorized users from accessing the page
if (isset($_SESSION['role'])) {
	if ($_SESSION['role'] != 'Administrator') {
		http_response_code(403);
		die('Forbidden');
	}
} else {
	http_response_code(403);
	die('Forbidden');
}

$blog_Id = $_POST['blog_id'];
// Create connection
$conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM blogs where id='$blog_id'";
$result = $conn->query($sql);
$result = mysqli_fetch_array($result);
// Getting List Images
$picture_sql = "SELECT * FROM pictures where blog_id='$blog_id'";
$picture_list = $conn->query($picture_sql);
$picture_count = mysqli_num_rows($picture_list);
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="icon" href="images/icon_logo.png" type="image/icon type">
	<title>Learn and Help</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;900&display=swap" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
</head>

<body>
	<?php include 'show-navbar.php'; ?>
	<?php show_navbar(); ?>
	<header class="inverse">
		<div class="container">
			<h1> <span class="accent-text">Edit Blog</span></h1>
		</div>
	</header>
	<form method="POST" action="admin_blogs.php">
		<input type="submit" value="Return to Blogs">
	</form>
	<div id="container_1" style="text-align: center;">
		<table>
			<?php
			$counter = 1;
			echo "<tr>";

			while ($row = mysqli_fetch_array($picture_list)) {
				echo "<td align=\"center\" style=\"border:solid 1px; width:25%\">
						<img src='" . $row["location"] . "' style='width:150px; height:150px'></img>						
						<form action='admin_delete_blog_pictures.php' method='post' enctype='multipart/form-data'>
							<input type='hidden' name='id' value='" . $row['id'] . "'>
							<input type='hidden' name='blog_id' value='" . $result['blog_id'] . "'><br>	
							<input type=\"submit\" value=\"Delete\" >
						</form>
						</td>";
				if ($counter % 4 == 0 or $counter == $picture_count) {
					echo "</tr>";
				}
				$counter++;
			}
			?>
		</table>
		</td>
		<table>
			<br>
			<form action="admin_blog_submit.php" method="post" enctype="multipart/form-data">
				<table id="blog_edit">
					<tr>
						<td class="td_right">Blog ID</td>
						<td class="td_left"> &nbsp;&nbsp;
							<?php echo $result['blog_id']; ?>
						</td>
					</tr>
					<tr>
						<td class="td_right">Title </td>
						<td class="td_left"><input type="text" id="title" name="title"
								value='<?php echo $result['title']; ?>'>
						</td>
					</tr>
					<tr>
						<td class="td_right">Author </td>
						<td class="td_left"><input type="text" id="author" name="author"
								value='<?php echo $result['author']; ?>' placeholder="author"></td>
					</tr>
					<tr>
						<td class="td_right">Description </td>
						<td class="td_left"><input type="text" id="description" name="description"
								value='<?php echo $result['description']; ?>' placeholder="description"></td>
					</tr>
					<tr>
						<td class="td_right">Video_Link </td>
						<td class="td_left"><input type="text" id="video_link" name="video_link"
								value='<?php echo $result['video_link']; ?>' placeholder="video link"></td>
					</tr>
					<tr>
						<td class="td_right">Upload Picture </td>
						<td class="td_left"><input type="file" id="location" name="location[]" multiple></td>
					</tr>
				</table>
				<input type="hidden" id="blog-Id" name="id" value="<?php echo $result['id']; ?>">
				<input type="submit" value="Save" id="btnSave">
			</form>
	</div>
</body>

</html>