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

            <div class="display-users">

                <?php while($row = mysqli_fetch_assoc($resultData)) { ?>

                    <section attr-user_id="<?php echo $row['id']; ?>">
                        <div class="user">
                            <div class="line user_id">
                                <h4>ID:</h4>
                                <h4><?php echo $row['id']?></h4>
                            </div>
                            <div class="line user_name">
                                <h4>Navn:</h4>
                                <h4><?php echo $row['name']?></h4>
                            </div>
                            <div class="line user_username">
                                <h4>Brugernavn:</h4>
                                <input type="hidden" name="user_username" id="user_username" value="<?php echo $row['username']?>">
                                <h4><?php echo $row['username']?></h4>
                            </div>
                            <div class="line user_email">
                                <h4>Email</h4>
                                <h4><?php echo $row['email']?></h4>
                            </div>
                            <div class="delete-user">
                                <button id="delete-user">Slet</button>
                            </div>
                        </div>
                    </section>

                <?php } ?>

            </div> <!-- .display-users end -->

        </div> <!-- .container end -->

    </div> <!-- .all-users end -->

</div> <!-- .block .users end -->