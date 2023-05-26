<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");
// Set pragma header
header("Pragma: no-cache");


session_start();
session_unset();
session_destroy();

header(
        'Location:http://localhost/php_projects/Library_Management_System/index.php'
);
exit;
?>

<!-- <script>
    if (window.history && window.history.pushState) {
        window.history.pushState("", null, "");
        window.addEventListener("popstate", function () {
            location.replace("Location:http://localhost/php_projects/Library_Management_System/index.php");
        });
    }
</script> -->
