<?php
session_start();
include_once("includes/db.inc.php");
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$cat_id=$_GET['cat_id'];
/*this is delet query*/
$conn->query("delete from category where cat_id='$cat_id'") or die("query is incorrect...");
// $con->query("delete from products where product_id='$cat_id'")or die("query is incorrect...");
}

///pagination

$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
} 
include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">


        <div class="col-md-14">
            <div class="card ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title"> Menu List</h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive ps">
                        <table class="table tablesorter " id="page1">
                            <thead class=" text-primary">
                                <tr>
                                    <th>category ID</th>
                                    <th>Category Title </th>
                                    <th></th>
                                    <th>
                                        <a class=" btn btn-primary" href="addcategory.php">Add New</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // SELECT `cat_id`, `cat_title`, `cat_path` FROM `category` WHERE 1
                        $result = $conn->query("SELECT `cat_id`, `cat_title`, `cat_path` FROM `category` WHERE 1")or die ("query 1 incorrect.....".$conn->error);

                        while(list($cat_id,$cat_title,$cat_path)=$result->fetch_array())
                        {
                        echo "<tr><td>$cat_id</td>
                        <td>$cat_title</td>
                        <td>$cat_path</td>
                        <td>

                        <a class=' btn btn-danger' href='category.php?cat_id=$cat_id&action=delete'>Delete</a>
                        </td><td>

                        <a class='btn btn-success' href='editcategory.php?cat_id=$cat_id&action=edit'>Edit</a>
                        </td></tr>";
                        }

                        ?>
                            </tbody>
                        </table>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <?php 
                    //counting paging

                $paging=mysqli_query($con,"select product_id,product_image, product_title,product_price from products");
                $count=mysqli_num_rows($paging);

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?>
                    <li class="page-item"><a class="page-link"
                            href="productlist.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
                    <?php	
}
?>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>



        </div>


    </div>
</div>
<?php
include "footer.php";
?>