<!-- table liste over brugere (users.php)-->
<!-- mulighed for at slette brugere hvis man er logget ind -->

<div class="block users">
    <!-- if logged in -->
    <?php if (isset($_SESSION["id"])  || isset($_SESSION["username"])) { ?>
        <div class="all-users">

            <?php
                include("includes/connect.inc.php");

                $sql = "SELECT * FROM users ORDER BY name DESC;";
                $stmt = $conn->prepare($sql);
                mysqli_stmt_execute($stmt);
                $resultData = mysqli_stmt_get_result($stmt);
            ?>

            <div id="confirmation-user-delete">
                <div class="content">
                    <h2>Er du sikker på, at du gerne vil slette denne bruger?</h2>
                    <div class="buttons">
                        <button class="confirm_user_delete">Yes</button>
                        <button class="cancel_user_delete">No</button>
                    </div>
                </div>
            </div>

            <h3>Oversigt over alle brugere</h3>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Navn</th>
                        <th>Brugernavn</th>
                        <th>Email</th>
                        <th>Slet</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($resultData)) { ?>
                        <tr attr-user_id="<?php echo $row['id']; ?>">
                            <td class="user_id"><?php echo $row['id']?></td>
                            <td class="user_name"><?php echo $row['name']?></td>
                            <td class="user_username"><?php echo $row['username']?></td>
                            <td class="user_email"><?php echo $row['email']?></td>
                            <td class="buttons">
                                <div class="delete">
                                    <button class="delete-user">Slet</button>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div> <!-- .all-users end -->
    <?php } // if (isset($_SESSION["username"])) end

    // if not logged in
    else { ?>
        <div class="no_session">
            <h1>Beklager!</h1>
            <h2>Du skal være logget ind for at se denne side.</h2>
        </div>
    <?php } ?>

</div> <!-- .block .users end -->