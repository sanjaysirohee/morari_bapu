<?php
include './database/connectdb.php';
if (isset($_GET['guest_id'], $_GET['request_id'])) {

    $guest_id   = (int) $_GET['guest_id'];
    $request_id = (int) $_GET['request_id'];

    // delete guest
    mysqli_query($con, "DELETE FROM req_people WHERE id = $guest_id");

    // recount guests
    $res = mysqli_query(
        $con,
        "SELECT COUNT(*) AS total 
         FROM req_people 
         WHERE request_id = $request_id"
    );
    $row = mysqli_fetch_assoc($res);
    $count = $row['total'];

    // update total in main table
    mysqli_query(
        $con,
        "UPDATE req_query_table 
         SET total_people_attending = $count 
         WHERE id = $request_id"
    );

    echo "<script>
            alert('Guest deleted successfully.');
            window.location.href = 'manage-small-queries.php?id=$request_id';
          </script>";
    exit;
}

if (isset($_GET['request_id'])) {

    $request_id = (int) $_GET['request_id'];

    // check if guests exist
    $res = mysqli_query(
        $con,
        "SELECT COUNT(*) AS total 
         FROM req_people 
         WHERE request_id = $request_id"
    );
    $row = mysqli_fetch_assoc($res);

    if ($row['total'] > 0) {

        // guests still exist → block delete
        echo "<script>
                alert('Please delete all guests first.');
                window.location.href = 'manage-small-queries.php?id=$request_id';
              </script>";
        exit;

    } else {

        // no guests → safe to delete
        mysqli_query(
            $con,
            "DELETE FROM req_query_table WHERE id = $request_id"
        );

        echo "<script>
                alert('Deleted successfully.');
                window.location.href = 'manage-queries.php';
              </script>";
        exit;
    }
}
?>
