<?php 

function find_all_subjects()
{
	global $db;
	$sql = "SELECT * FROM subjects "; // do not forget the space at the end of the line
	$sql .= "ORDER BY position ASC";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	return $result;
}

function find_subject($id)
{
	global $db;
	$sql = "SELECT * FROM subjects "; // do not forget the space at the end of the line
	$sql .= "WHERE id ='". db_escape($db, $id)."'";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	return $result;
}


function validate_subject($subject) {
    $errors = [];

    // menu_name
    if(is_blank($subject['menu_name'])) {
      $errors[] = "Name cannot be blank.";
    } elseif(!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Name must be between 2 and 255 characters.";
    }

    // position
    // Make sure we are working with an integer
    $postion_int = (int) $subject['position'];
    if($postion_int <= 0) {
      $errors[] = "Position must be greater than zero.";
    }
    if($postion_int > 999) {
      $errors[] = "Position must be less than 999.";
    }

    // visible
    // Make sure we are working with a string
    $visible_str = (string) $subject['visible'];
    if(!has_inclusion_of($visible_str, ["0","1"])) {
      $errors[] = "Visible must be true or false.";
    }

    return $errors;
  }

function insert_subject($menu_name, $position, $visible)
{
	global $db;
	

	$sql = "INSERT INTO subjects ";
	$sql .= "(menu_name, position, visible) ";
	$sql .= " VALUES ('";
	$sql .= db_escape($db, $menu_name)."', '";
	$sql .= db_escape($db, $position)."', '";
	$sql .= db_escape($db, $visible)."') ";

	$result = mysqli_query($db, $sql);
	if ($result) {
		$newid = mysqli_insert_id($db);
		redirect_to('staff/subjects/show.php?id='.$newid);
	} else {
		echo mysql_error($db);
		db_disconnect();
		exit();
	}
}

function update_subject($subject) {
    global $db;

    $sql = "UPDATE subjects SET ";
    $sql .= "menu_name='" . db_escape($db, $subject['menu_name']) . "', ";
    $sql .= "position='" . db_escape($db, $subject['position']) . "', ";
    $sql .= "visible='" . db_escape($db, $subject['visible']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $subject['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }


  function delete_subject($id) {
    global $db;

    $sql = "DELETE FROM subjects ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }


  // pages --------------------------------


function find_all_pages()
{
	global $db;
	$sql = "SELECT * FROM pages "; // do not forget the space at the end of the line
	$sql .= "ORDER BY subject_id ASC, position ASC";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	return $result;
}

function find_page($id)
{
	global $db;
	$sql = "SELECT * FROM pages "; // do not forget the space at the end of the line
	$sql .= "WHERE id ='". db_escape($db, $id)."'";
	$result = mysqli_query($db, $sql);
	confirm_result_set($result);
	return $result;
}



function insert_page($page_name, $content, $subject_id, $position, $visible)
{
	global $db;
	
	$sql = "INSERT INTO pages ";
	$sql .= "(page_name, content, subject_id, position, visible) ";
	$sql .= " VALUES ('";
	$sql .= db_escape($db, $page_name)."', '";
	$sql .= db_escape($db, $content)."', '";
	$sql .= db_escape($db, $subject_id)."', '";
	$sql .= db_escape($db, $position)."', '";
	$sql .= db_escape($db, $visible)."') ";
	echo $sql;

	$result = mysqli_query($db, $sql);
	if ($result) {
		$newid = mysqli_insert_id($db);
		redirect_to('staff/pages/show.php?id='.$newid);
	} else {
		echo mysql_error($db);
		db_disconnect();
		exit();
	}
}

function update_page($page) {
	global $db;

	$sql = "UPDATE pages SET ";
    $sql .= "subject_id='" . db_escape($db, $page['subject_id']) . "', ";
    $sql .= "page_name='" . db_escape($db, $page['page_name']) . "', ";
    $sql .= "position='" . db_escape($db, $page['position']) . "', ";
    $sql .= "visible='" . db_escape($db, $page['visible']) . "', ";
    $sql .= "content='" . db_escape($db, $page['content']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $page['id']) . "' ";
    $sql .= "LIMIT 1";


	$result = mysqli_query($db, $sql);
	// For UPDATE statements, $result is true/false
	if($result) {
	  return true;
	} else {
	  // UPDATE failed
	  echo mysqli_error($db);
	  db_disconnect($db);
	  exit;
	}

}


function delete_page($id) {
    global $db;

    $sql = "DELETE FROM pages ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}



 ?>