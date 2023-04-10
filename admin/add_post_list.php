<?php
session_start();
include("includes/db.inc.php");

if(isset($_POST['btn_save'])) 
{
    $post_title=$_POST['post_title'];
    $post_author=$_POST['post_author'];
    $post_date=$_POST['post_date'];
    $post_content=$conn->real_escape_string($_POST['post_content']);
    $post_tags=$_POST['post_tags'];   
// handling the file
$picture_name=$_FILES['post_image']['name'];
$picture_type=$_FILES['post_image']['type'];
$picture_tmp_name=$_FILES['post_image']['tmp_name'];
$picture_size=$_FILES['post_image']['size'];
if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
{
	if($picture_size<=50000000)//50Mb
    
		$pic_name=time()."_".$picture_name;
		move_uploaded_file($picture_tmp_name,"../images/".$pic_name);
        $conn->query("INSERT INTO `posts`(`post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`) VALUES ('$post_title','$post_author','$post_date','$pic_name','$post_content','$post_tags')")or die("Query 2(update) is inncorrect..........".$conn->error);
		
         header("location: post_list.php");
}
}


include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <div class="col-md-9 mx-auto">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h5 class="title">Edit Post</h5>
                </div>
                <form action="add_post_list.php" name="form" method="post" enctype="multipart/form-data">
                    <div class="card-body">


                        <!--post category -->
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Category Title</label>
                                <br>
                                <?php
                                $sql ="SELECT * from category";
                                $result = $conn->query($sql);
                                
                                ?>
                                <select class="form-control" name="cat_id" id="cat_id">
                                    <?php
                                    while($rows =  $result->fetch_assoc()){
                                        echo "<option style='color:black;' value=".$rows['cat_id'].">".$rows['cat_title']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- /post category -->


                        <!-- post_title -->
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Post Title</label>
                                <br>
                                <input type="text" id="post_title" name="post_title" class="form-control">
                            </div>
                        </div>
                        <!-- /post_title -->

                        <!-- post_image -->
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Post Image</label>
                                <br>
                                <input style="background-color:white;" type="file" accept="image/*" id="post_image"
                                    name="post_image" class="form-control">
                                <button class="btn btn-fill btn-success">upload image</button>

                            </div>
                        </div>
                        <!-- /post_image -->
                        <!--  post_content-->
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Post Content</label>
                                <br>
                                <textarea name="post_content" id="post_content" class="form-control" cols="30" rows="30"
                                    style="border:2px solid; height:800px;"></textarea>
                            </div>
                        </div>
                        <!--/post_content  -->

                        <!-- post_tags -->
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Post Tags</label>
                                <br>
                                <input type="text" id="post_tags" name="post_tags" class="form-control">
                            </div>
                        </div>
                        <!-- /post_tags -->
                        <!-- post_author-->
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Post Author</label>
                                <br>
                                <input type="text" id="post_author" name="post_author" class="form-control">
                            </div>
                        </div>
                        <!-- /post_author -->


                        <!-- company_name -->
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Post Date</label>
                                <br>
                                <input type="date" id="post_date" name="post_date" class="form-control">
                            </div>
                        </div>
                        <!-- /post_date -->



                    </div>
                    <!-- save button -->
                    <div class="card-footer">
                        <button type="submit" id="btn_save" name="btn_save"
                            class="btn btn-fill btn-primary">Update</button>
                    </div>
                    <!-- /save button -->
                </form>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
<script>
CHEDITOR.replace("post_content");
</script>
<?php
include "footer.php";
?>