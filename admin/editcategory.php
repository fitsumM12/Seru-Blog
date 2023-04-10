<?php
session_start();
include("includes/db.inc.php");
$cat_id=$_REQUEST['cat_id'];
$result = $conn->query("SELECT `cat_id`, `cat_title`, `cat_path` FROM `category` WHERE  cat_id='$cat_id'")or die ("query 1 incorrect.......");

list($cat_id,$cat_title,$cat_path)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{
// update the category section
$cat_id=$_POST['cat_id'];
$cat_title=$_POST['cat_title'];
$conn->query("update category set cat_title ='$cat_title' where cat_id ='$cat_id'")or die("Query 2 is inncorrect..........".$conn->error);
header("location: category.php");
$conn->close();
}
// sql statemant is done
include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header card-header-primary">
                    <!-- header title -->
                    <h5 class="title">Edit Category</h5>
                </div>
                <form action="editcategory.php" name="form" method="post" enctype="multipart/form-data">
                    <div class="card-body">

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>category ID</label>
                                <input type="text" id="cat_id" name="cat_id" class="form-control"
                                    value="<?php echo $cat_id; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>category title</label>
                                <input type="text" id="cat_title" name="cat_title" class="form-control"
                                    value="<?php echo $cat_title; ?>">
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>category path</label>
                                <input type="text" id="cat_path" name="cat_path" class="form-control"
                                    value="<?php echo $cat_path; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="btn_save" name="btn_save"
                            class="btn btn-fill btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
<?php
include "footer.php";
?>