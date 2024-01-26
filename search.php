<?php include "includes/db.php" ?>
<?php include "includes/components/header.php" ?>
<?php include "includes/components/navigation.php" ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">


            <?php
            if (isset($_POST['submit'])) {
                $search = $_POST['search'];
                $search_query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";

                if (!$search_query)
                    die("QUERY FAILED" . mysqli_error($connection));
                $search_result = mysqli_query($connection, $search_query);
                $count = mysqli_num_rows($search_result);

                if ($count == 0)
                    echo "<h1>No Result</h1>";
                else {
                    while ($row = mysqli_fetch_assoc($search_result)) {
                        $post_title = $row["post_title"];
                        $post_author = $row["post_author"];
                        $post_date = $row["post_date"];
                        $post_image = $row["post_image"];
                        $post_content = $row["post_content"];

                        ?>
                        <h1 class="page-header">
                            Page Heading
                            <small>Secondary Text</small>
                        </h1>
                        <!-- First Blog Post Starts -->
                        <h2>
                            <a href="#">
                                <?php echo $post_title ?>
                            </a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php">
                                <?php echo $post_author ?>
                            </a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on
                            <?php echo $post_date ?>
                        </p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image ?>.jpg" alt="">
                        <hr>
                        <p>
                            <?php echo $post_content ?>
                        </p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                        <hr>
                        <!-- First Blog Post Ends -->

                    <?php }
                }

            } ?>


        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/components/sidebar.php" ?>

    </div>
    <hr>

    <?php include "includes/components/footer.php" ?>