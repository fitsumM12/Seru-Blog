<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="color:white;" href="index.php">Seru</a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                       <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Search</a>
                   <ul class="dropdown-menu" style="width: 40rem; padding: 20px; margin:10px;">
                        <li>
                           <form class="md-col-4" action="search.php" method="POST">
                            <div class="input-group">
                            <input type="text" name="search" class="form-control">
                            <span class="input-group-btn">
                                <button name="submit" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                                </span>
                             </div>
                            </form>

                         </li>
                        
                    </ul> 
                </li>

            

                <?php
                    $query = "SELECT * FROM category;";
                   $all_category_from_database = $conn->query($query);
                  while($row =$all_category_from_database->fetch_assoc()){
                    $cat_title = $row['cat_title'];
                    $cat_path = $row['cat_path'];
                        echo "<li><a href='$cat_path'>{$cat_title}</a></li>";
                   }
                   ?>

                    <!-- <li>
                        <a href="admin">Admin</a>
                    </li> -->
                   <!-- <li class="dropdown">-->
                   <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Login </b></a>-->
                   <!--<ul class="dropdown-menu" style="width: 40rem; padding: 20px; margin:10px;">-->
                   <!--     <li>-->
                   <!--          <form id="login-form" class="form from-group" action="includes/login.php" method="post" >-->
                   <!--             <label for="email" class="text-info"><i>email:</i></label><br>-->
                   <!--             <input type="email" name="email" id="email"  class="form-control">-->
                            
                   <!--             <label for="password" class="text-info"><i>Password:</i></label><br>-->
                   <!--             <input type="password" name="password" id="password"  class="form-control">-->
                            
                   <!--             <label for="remember-me" class="text-info"><span><i>Remember me</i></span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>-->
                   <!--             <input type="submit" name="submit" class="form-control btn btn-info btn-md" value="login">-->
                   <!--         </form>-->
                   <!--      </li>-->
                        
                   <!--     <li class="divider"></li>-->
                   <!--     <li>-->
                   <!--         <a class="text-info" href="register.php"><i class="text-info fa fa-fw fa-power-off" style="font-style: bold;">Register</i> </a>-->
                   <!--     </li>-->
                   <!-- </ul> -->
                </li>
            </ul>

                </ul>
            </div>
        </div>
    </nav>
    


