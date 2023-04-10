<?php
session_start();
include("includes/db.inc.php");
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$fb_id=$_GET['fb_id'];
$conn->query("DELETE from feedback where fb_id='$fb_id'")or die("queryee is incorrect...".$conn->error);
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
                    <h4 class="card-title"> feedback</h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive ps">
                        <table class="table tablesorter " id="page1">
                            <thead class=" text-primary">
                                <tr>
                                    <!-- SELECT `fb_id`, `fb_email`, `message` FROM `feedback` WHERE 1 -->
                                    <th>Feedback ID</th>
                                    <th>Mail Address</th>
                                    <th>Message</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>

                                <!--fetching the data from the database  -->
                                <?php 

                                $result=$conn->query("SELECT `fb_id`, `fb_email`, `message` FROM `feedback` WHERE 1 Limit $page1,12")or die ("query 1 incorrect.....".$conn->error);

                                    while(list($fb_id,$fb_email,$message)=$result->fetch_array())
                                    {
                                    echo "<tr><td>$fb_id</td><td>$fb_email</td><td>$message</td>";
                                    ?>
                                </td>
                                <?php echo"<td>$post_tags</td>
                                 <td>
                                     <a class=' btn btn-danger'
                                         href='feedback.php?fb_id=$fb_id&action=delete'>Delete</a>
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