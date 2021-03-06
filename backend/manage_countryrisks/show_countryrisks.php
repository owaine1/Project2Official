<?php
// TODO all ripped from show_users, to modify ???
require_once('../common/connection.php');

$db = new DbConnect($app_user, $app_pass);

$stmt = $db->conn->prepare("SELECT * FROM countryrisks");
// $stmt->bindParam(':user_name', $user_name); e.g. of scrubbed parameter to stop sql injection

$stmt->execute();

  if ($stmt->rowCount() > 0) {
    logger("countryrisks rows have been sent back from mysql");
    $output = $stmt->fetchAll();
    echo json_encode($output);
    } else {
    logger($user->conn->error);
    // do false stuff
  }
// TODO if user is guest, only allow 10 random records
// SELECT name
//   FROM random AS r1 JOIN
//        (SELECT CEIL(RAND() *
//                      (SELECT MAX(id)
//                         FROM random)) AS id)
//         AS r2
//  WHERE r1.id >= r2.id
//  ORDER BY r1.id ASC
//  LIMIT 1
// also what's reccommended is https://jan.kneschke.de/projects/mysql/order-by-rand/
