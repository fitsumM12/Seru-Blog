 <?php
session_start();
include("includes/db.inc.php");
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$post_id=$_GET['post_id'];
///statement
$result = $conn->query("SELECT `post_image` from posts where post_id= '$post_id'")or die("query1 is incorrect...");

list($post_image)= $result->fetch_array();

$path="../image/$post_image";

if(file_exists($path)==true)
{
  unlink($path);
}
else
{}
/*this is delete query*/
$conn->query("DELETE from posts where post_id='$post_id'")or die("queryee is incorrect...".$con->error);
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
                     <h4 class="card-title"> Post List</h4>

                 </div>
                 <div class="card-body">
                     <div class="table-responsive ps">
                         <table class="table tablesorter " id="page1">
                             <thead class=" text-primary">
                                 <tr>
                                     <!-- SELECT `post_id`, `cat_title`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags` FROM `posts` WHERE 1 -->
                                     <th>Post ID</th>
                                     <th>Category ID</th>
                                     <th>Post Title</th>
                                     <th>Post Author</th>
                                     <th>Post Date</th>
                                     <th>Post Image</th>
                                     <th>Post Content</th>
                                     <th>Post Tag</th>
                                     <th></th>
                                     <th>
                                         <a class=" btn btn-primary" href="add_post_list.php">Add New</a>
                                     </th>
                                 </tr>
                             </thead>
                             <tbody>

                                 <!--fetching the data from the database  -->
                                 <?php 

                                $result=$conn->query("SELECT `post_id`, `cat_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags` FROM `posts` WHERE 1 Limit $page1,12")or die ("query 1 incorrect.....");

                                    while(list($post_id,$cat_id,$post_title,$post_author,$post_date,$post_image,$post_content,$post_tags)=$result->fetch_array())
                                    {
                                    echo "<tr><td>$post_id</td><td>$cat_id</td><td>$post_title</td><td>$post_author</td><td>$post_date</td><td><img src='../images/$post_image' style='width:50px; height:50px; border:groove #000'></td>";
                                    ?>
                                 <td><?php 
                                    $temp = explode(' ',$post_content,-1);
                                    $i = 0;
                                    while($i<10){
                                        echo $temp[$i]." ";
                                        $i++;
                                    }
                                    echo "...";
                                    ?>
                                 </td>
                                 <?php echo"<td>$post_tags</td>
                                 <td>
                                     <a class=' btn btn-danger'
                                         href='post_list.php?post_id=$post_id&action=delete'>Delete</a>
                                 </td>
                                 <td>

                                     <a class=' btn btn-success'
                                         href='edit_post_list.php?post_id=$post_id&action=edit'>Edit</a>
                                 </td>
                                 </tr>";
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

                $paging=mysqli_query($con,"SELECT `job_id`, `cat_id`, `job_title`, `job_description`, `job_level`, `company_name`, `company_image`, `address`, `company_description`, `vacancy_seat`, `posted_date`, `deadline`, `jobs_keyword` FROM `jobs`");
                $count=mysqli_num_rows($paging);

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?>
                     <li class="page-item"><a class="page-link"
                             href="jobs_list.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
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