<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM users ORDER BY id DESC;";
    $stmt = $conn->prepare($sql);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
?>

<div class="block users">
    
    <div class="all-users">
        <div class="container">
            <div id="confirmation-user-delete">
                <div class="content">
                    <h2>Er du sikker på, at du gerne vil slette denne bruger?</h2>
                    <div class="buttons">
                        <button class="confirm_user_delete">
                            <img src="../../../../Images/References/grønpotebtn.png" alt="">
                            <h4>Ja</h4>
                        </button>
                        <button class="cancel_user_delete">
                            <img src="../../../../Images/References/rødpotebtn.png" alt="">
                            <h4>Nej</h4>
                        </button>
                    </div>
                </div>
            </div>

            <hr>

            <h2>Oversigt over alle brugere</h2>

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
                            <td>
                                <input type="hidden" name="user_username" id="user_username" value="<?php echo $row['username']?>">
                                <?php echo $row['username']?>
                            </td>
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
        </div>

        
        
    </div> <!-- .all-users end -->

</div> <!-- .block .users end -->