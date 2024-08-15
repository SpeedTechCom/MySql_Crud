<?php

    session_start();
    include 'config.php';
    $sql = "SELECT * FROM register";
    $result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if($_SESSION['un'] != "" && $_SESSION['ln'] != "" )
        { 
            if($_SESSION['un'] == "Manish" && $_SESSION['ln'] == "Maliya")
            { ?>
                <h1>Hi Kriti How are you</h1>
            <?php
            }
            ?>
    <h1 align="right"><?php echo $_SESSION['un']." ".$_SESSION['ln']; ?></h1>
    <br>
    <h1 align="right"><a href="logout.php">Logout</a></h1>
    <center>
        <table border="1" cellpadding="15" cellspacing="0">
            <tr>
                <th>Sr No</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Phone</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            <?php
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return chk()">Delete</a></td>
                            <td><a href="update.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                        </tr>
                    <?php }
                }
            ?>
        </table>
        <script>
            function chk()
            {
                return confirm("Are You Sure you want to Delete This File??");
            }
        </script>
    </center>
    <?php
        }
        else
        { ?>
            <script>
                window.location.href = 'index.php';
            </script>
        <?php }
    ?>
</body>
</html>