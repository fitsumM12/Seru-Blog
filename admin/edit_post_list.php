<?php
session_start();
include("includes/db.inc.php");
$post_id=$_REQUEST['post_id'];
// 
$result=$conn->query("SELECT * from posts where post_id='$post_id'")or die ("query 1 incorrect.......");
list($post_id, $cat_id, $post_title, $post_author, $post_date, $post_image, $post_content, $post_tags)=$result->fetch_array();


if(isset($_POST['btn_save'])) 
{
    $post_id=$conn->real_escape_string($_POST['post_id']);
    $cat_id=$conn->real_escape_string($_POST['cat_id']);
    $post_title=$conn->real_escape_string($_POST['post_title']);
    $post_author=$conn->real_escape_string($_POST['post_author']);
    $post_date=$conn->real_escape_string($_POST['post_date']);
    $post_content=$conn->real_escape_string($_POST['post_content']);
    $post_tags=$conn->real_escape_string($_POST['post_tags']);   
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
        
		$conn->query("UPDATE `posts` SET `cat_id`='$cat_id',`post_title`='$post_title',`post_author`='$post_author',`post_date`='$post_date',`post_image`='$pic_name',`post_content`='$post_content',`post_tags`='$post_tags' WHERE `post_id`='$post_id'")or die("Query 2(update) is inncorrect..........".$conn->error);
		
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
                <form action="edit_post_list.php" name="form" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <!-- post id -->
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Post ID</label>
                                <br>
                                <input type="text" id="post_id" name="post_id" class="form-control" readonly
                                    value="<?php echo $post_id; ?>">
                            </div>
                        </div>
                        <!--/post id  -->

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
                                <input type="text" id="post_title" name="post_title" class="form-control"
                                    value="<?php echo $post_title; ?>">
                            </div>
                        </div>
                        <!-- /post_title -->

                        <!-- post_image -->
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Post Image</label>
                                <br>
                                <img src="../images/<?php echo $post_image; ?>" alt="Not Avaliable" width="220px"
                                    height="100px">
                                <br>
                                <input style="background-color:white;" type="file" accept="image/*" id="post_image"
                                    name="post_image" value="<?php echo $post_image;  ?>" class="form-control">
                                <button class="btn btn-fill btn-success">upload image</button>

                            </div>
                        </div>
                        <!-- /post_image -->
                        <!--  post_content-->
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Post Content</label>
                                <br>
                                <textarea name="post_content" id="post_content" class="form-control" cols="30" rows="20"
                                    style="border:2px solid; height:800px;"><?php echo $post_content;?></textarea>
                            </div>
                        </div>
                        <!--/post_content  -->

                        <!-- post_tags -->
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Post Tags</label>
                                <br>
                                <input type="text" id="post_tags" name="post_tags" class="form-control"
                                    value="<?php echo $post_tags;?>">
                            </div>
                        </div>
                        <!-- /post_tags -->
                        <!-- post_author-->
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Post Author</label>
                                <br>
                                <input type="text" id="post_author" name="post_author" class="form-control"
                                    value="<?php echo $post_author;?>">
                            </div>
                        </div>
                        <!-- /post_author -->


                        <!-- company_name -->
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Post Date</label>
                                <br>
                                <input type="date" id="post_date" name="post_date" class="form-control"
                                    value="<?php echo $post_date;?>">
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
<?php
include "footer.php";
?>