<?php
    include("includes/connect.inc.php");

    $sql = "SELECT * FROM extratwo;";
    $result = mysqli_query($conn, $sql);
?>

<div class="block index-block extratwo">
    <div class="container">
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="extra-content">
                
                <p>hvis $row['extra_visibility'] == 'ja'</p>
                <p>style="display:grid;"</p>
                <p>hvis $row['extra_visibility'] == 'nej'</p>
                <p>style="display:block;"</p>

                <div class="extra-text">
                    <?php if (!empty($row['extra_title'])) { ?>
                        <h1><?php echo $row['extra_title']; ?></h1>
                    <?php } ?>
                    <?php if (!empty($row['extra_subtitle'])) { ?>
                        <h2><?php echo $row['extra_subtitle']; ?></h2>
                    <?php } ?>
                    <?php if (!empty($row['extra_text_one'])) { ?>
                        <p><?php echo $row['extra_text_one']; ?></p>
                    <?php } ?>
                    <?php if (!empty($row['extra_text_two'])) { ?>
                        <p><?php echo $row['extra_text_two']; ?></p>
                    <?php } ?>
                    <?php if (!empty($row['extra_text_three'])) { ?>
                        <p><?php echo $row['extra_three']; ?></p>
                    <?php } ?>
                    <?php if (!empty($row['extra_text_link'])) { ?>
                        <div class="a">
                            <p><?php echo $row['extra_text_link']; ?></p>
                            <?php if (!empty($row['extra_link_url'])) { ?>
                                <a href="<?php echo $row['extra_link_url']; ?>">
                                    <?php if (!empty($row['extra_link_text'])) {
                                        echo $row['extra_link_text'];
                                    } ?>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="extra-image">

                </div>
                
            </div>
        <?php } ?>
    </div>
</div>