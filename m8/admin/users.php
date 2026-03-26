<?php

include "../lib/php/functions.php";

$originalFile = "../data/users_original.json";
$currentFile = "../data/users.json";

// If reset button clicked
if(isset($_POST['reset'])) {
    copy($originalFile, $currentFile);
    header("Location: users.php");
    exit;
}

// Load current users
$users = file_get_json($currentFile);

$users = file_get_json("../data/users.json");


//file_put_contents json_encode explode $_POST
//CRUD, Create Read Update Delete


$id = intval($_GET['id'] ?? 0);
$currentUser = $users[$id] ?? (object)[
    "name" => "", 
    "type" => "", 
    "email" => "", 
    "classes" => []
];


// When form submitted
if(isset($_POST['name'])) {

    $id = $_POST['id'] ?? "";

    $classes = array_map('trim', explode(",", $_POST['classes']));

    if($id !== "" && isset($users[$id])) {
        // Update existing user
        $users[$id]->name = $_POST['name'];
        $users[$id]->type = $_POST['type'];
        $users[$id]->email = $_POST['email'];
        $users[$id]->classes = $classes;
    } else {
        // Add new user at the end
        $newUser = new stdClass();
        $newUser->name = $_POST['name'];
        $newUser->type = $_POST['type'];
        $newUser->email = $_POST['email'];
        $newUser->classes = $classes;
        $users[] = $newUser;
        $id = count($users) - 1; 
    }

    file_put_contents("../data/users.json", json_encode($users));

    header("Location: /aau/wnm608/m8/admin/users.php?id=$id");
    exit;
}

// Delete
if(isset($_POST['delete'])) {
    $id = intval($_POST['id']);
    if(isset($users[$id])) {
        array_splice($users, $id, 1); // remove user
        file_put_contents("../data/users.json", json_encode($users));
        header("Location: users.php"); // back to list
        exit;
    }
}

if(isset($_GET['original'])) {
    $users = file_get_json("../data/users_original.json");
}


function showUserPage($user) {

$classes = implode(",", $user->classes);

// Heredoc
echo <<<HTML
<nav class="nav nav-crumbs">
	<ul>
		<li><a href="admin/users.php">Back</a></li>
	</ul>
</nav>

<div>
	<h2>$user->name</h2>

	<div>
		<strong>Type</strong>
		<span>$user->type</span>
	</div>

	<div>
		<strong>Email</strong>
		<span>$user->email</span>
	</div>

	<div>
		<strong>Classes</strong>
		<span>$classes</span>
	</div>
</div>
HTML;
}












?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Admin Page</title>

	<?php include "../parts/meta.php"; ?>
</head>
<body>

	<header class="navbar">
		<div class="container display-flex">
			<div class="flex-none">
				<h1>User Admin</h1>
			</div>

			<div class="flex-stretch">
				
			</div>

			<div class="nav nav-flex flex-none">
				<ul>
					<li><a href="admin/users.php">User List</a></li>
				</ul>				
			</div>
		</div>
	</header>

	<div class="container">
		<div class="card soft">
			<h2>User Admin</h2>

			<form method="post">
				<div class="form-control">
					<label class="form-label">Name</label>
					<input type="text" name="name" value="<?= htmlspecialchars($currentUser->name) ?>" class="form-input">
				</div>

				<div class="form-control">
					<label class="form-label">Type</label>
					<input type="text" name="type" value="<?= htmlspecialchars($currentUser->type) ?>" class="form-input">
				</div>

				<div class="form-control">
					<label class="form-label">Email</label>
					<input type="text" name="email" value="<?= htmlspecialchars($currentUser->email) ?>" class="form-input">
				</div>

				<div class="form-control">
					<label class="form-label">Classes</label>
					<input type="text" name="classes" value="<?= htmlspecialchars(implode(',', $currentUser->classes)) ?>" class="form-input">
				</div>

				<input type="hidden" name="id" value="<?= $id ?>">

				<div class="form-control">
					<button type="submit" class="button-dark form-button">Submit</button>
				</div>
			</form>

			<form method="post" onsubmit="return confirm('Are you sure you want to delete this user?')">
    			<input type="hidden" name="id" value="<?= $id ?>">
    			<button type="submit" name="delete" class="button-dark form-button">Delete</button>
			</form>
		</div>
	</div>

	<div class="container">
		<div class="card soft">

			<?php

			if(isset($_GET['id'])) {
				showUserPage($users[$_GET['id']]);
			} else {

			?>

			<h2>User List</h2>

			<nav class="nav">
				<ul>
			<?php

			for($i=0;$i<count($users);$i++){
				echo "<li>
						<a href='admin/users.php?id=$i'>{$users[$i]->name}</a>
					</li>";
			}

			?>
				</ul>
			</nav>
			<?php } ?>
		</div>
	</div>

	<div class="container">
		<form method="post" style="display:inline;" 
    	  onsubmit="return confirm('Reset the user list to the original?');">
    		<button type="submit" name="reset" class="button-red">Reset</button>
		</form>
	</div>
</body>
</html>