<!-- Jquery cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- link sweetalert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php
    
    $connection = new mysqli('localhost','root','','project');

    function moveImage($thumbnail){
        $profile = date('dmyhis').'-'.$_FILES[$thumbnail]['name'];
        $path = './assets/image/'.$profile;
        move_uploaded_file($_FILES[$thumbnail]['tmp_name'],$path);
        return $profile;
    }
    
    function register_acc(){
        if(isset($_POST['btn_register'])){
            // echo 123;
            global $connection;
            $name   = $_POST['username'];//username mor pi file rigister & name mor pi name 
            $email  = $_POST['email'];
            $password = $_POST['password'];
            $password = md5($password);
            $profile = moveImage('profile');

            //check username 
            $sql_uname = "SELECT `name` FROM `user`";
            $rs_uname = $connection->query($sql_uname);
            while($row = mysqli_fetch_assoc($rs_uname)){// ទាញ​ Data ពី​ Aatabase
                if($name == $row['name']){ // name pi database
                    $name = null;
                }
                else{
                    $name;
                }
            }


            if(!empty($name) && !empty($password) && !empty($email) && !empty($profile)){
                // echo 'Hello';
                $sql    ="INSERT INTO `user`(`name`,`email`,`password`,`profile`) VALUES ('$name','$email','$password','$profile')";
                $rs     = $connection->query($sql);
                if($rs){
                    echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Good job!",
                                text: "Register Account Success.....!",
                                icon: "success",
                                button: "Okkkkk~~~~",
                            });
                        })
                    </script>
                    ';
                }else{
                    echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Oppss!",
                                text: "Register Account Unsuccess.....!",
                                icon: "error",
                                button: "Okkkkk~~~~",
                            });
                        })
                    </script>
                    ';
                }
            }else{
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Oppss!",
                                text: " Username not avaible.....!",
                                icon: "error",
                                button: "Okkkkk~~~~",
                            });
                        })
                    </script>
                    ';
            }
        }
    }
    register_acc();
    session_start();
    function login_acc(){
        if(isset($_POST['btn_login'])){
            // echo 123;
            global $connection;
            $name_email = $_POST['name_email'];
            $password = $_POST['password'];
            $password = md5($password);
            
            if(!empty($name_email) && !empty($password)){
                $sql = "SELECT * FROM `user` WHERE `name` = '$name_email' OR `email`='$name_email' and `password`='$password'";
                $rs = $connection->query($sql);
                $row = mysqli_fetch_assoc($rs);
                if($row && $row['password'] === $password){
                    // print_r($row);
                    // print_r($password);
                    // die();
                    // echo 'success';
                    // header('location: index.php');
                    $_SESSION['user'] = $row['id'];
                    echo'
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Good job!",
                                    text: "Login Success.....!",
                                    icon: "success",
                                    button: "Okkkkk~~~~",
                                }).then(()=>{
                                    window.location.href = "index.php";
                                })
                            })
                        </script>
                    ';
                }else{
                    echo'
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Error!",
                                    text: "Login not Success.....!",
                                    icon: "error",
                                    button: "Okkk",
                                })
                            })
                        </script>
                    ';
                }
            }
        }
    }
    login_acc();

    function logout(){
        if(isset($_POST['btn-logout'])){
            unset($_SESSION['user']);
            header('location: login.php');
        }
    }
    logout();

    function logo_addpost(){
        if(isset($_POST['btn-savelogo'])){
            // echo 123;
            global $connection;
            $status = $_POST['status'];
            $thumbnail= moveImage('thumbnail');

            if(!empty($status) && !empty($thumbnail)){
                $sql = "INSERT INTO `logo`(`thumbnail`, `status`) VALUES ('$thumbnail','$status')";
                $rs = $connection->query($sql);
                if($rs){
                    echo'
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Good job!",
                                text: "Add logo Success.....!",
                                icon: "success",
                                button: "Okkkkk~~~~",
                            })
                        })
                    </script>
                ';
                }
            }
        }
    }
    logo_addpost();

    function logo_viewpost(){
        global $connection;
        $sql = "SELECT * FROM `logo` ORDER BY `id` DESC LIMIT 4";
        $rs = $connection->query($sql);
        while($row = mysqli_fetch_assoc($rs)){
            echo '
                <tr class="align-middle">
                    <td>'.$row['id'].'</td>
                    <td>'.$row['status'].'</td>
                    <td><img src="./assets/image/'.$row['thumbnail'].'" width="100px" height="100px" style="object-fit-cover"/></td>
                    <td width="150px">
                        <a href="./logo_updatepost.php?id='.$row['id'].'" class="btn btn-primary">Update</a>
                        <button type="button" remove-id="'.$row['id'].'" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Remove
                        </button>
                    </td>
                </tr>
            ';
        }
    }
    // logo_viewpost();
    
    function remove_logo(){
        if(isset($_POST['btn-delete-logo'])){
            // echo 123;
            global $connection;
            $id = $_POST['remove_id'];

            $sql = "DELETE FROM `logo` WHERE id = '$id'";
            $rs = $connection->query($sql);
            if($rs){
                echo'
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Good job!",
                                text: "Delete logo Success.....!",
                                icon: "success",
                                button: "Okkkkk~~~~",
                            })
                        })
                    </script>
                ';
            }else{
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Oppss!",
                                text: "Delete logo Unsuccess.....!",
                                icon: "error",
                                button: "Okkkkk~~~~",
                            });
                        })
                    </script>
                ';
            }
        }
    }
    remove_logo();

    function logo_updatepost(){
        global $connection;
        if(isset($_POST['btn-updatelogo'])){
            // echo 123;
            $status = $_POST['status'];
            $thumbnail = $_FILES['thumbnail']['name'];
            $id = $_GET['id'];
            if(empty($thumbnail)){
                $thumbnail = $_POST['old-logo'];
            }else{
                $thumbnail = moveImage('thumbnail');
            }

            if(!empty($status) && !empty($thumbnail)){
                $sql = "UPDATE `logo` SET `thumbnail`='$thumbnail',`status`='$status' WHERE id='$id'";
                $rs = $connection->query($sql);
                if($rs){
                    echo'
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Good job!",
                                    text: "Update logo Success.....!",
                                    icon: "success",
                                    button: "Okkkkk~~~~",
                                })
                            })
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Oppss!",
                                    text: "Update logo Unsuccess.....!",
                                    icon: "error",
                                    button: "Okkkkk~~~~",
                                });
                            })
                        </script>
                    ';
                }
            }
        }
    }
    logo_updatepost();

    function news_addpost(){
        if(isset($_POST['btn-savenews'])){
            // echo 123;
            global $connection;
            
            $author_id = $_SESSION['user'];
            $news_banner = moveImage('banner');
            $news_thumbnail = moveImage('thumbnail');
            $news_title = $_POST['title'];
            $news_des = $_POST['des'];
            $news_category = $_POST['category'];
            $news_type = $_POST['type'];

            // echo $author_id;
            // echo $news_banner;
            // echo $news_thumbnail;
            // echo $news_des;
            // echo $news_category;
            // echo $news_type;
            // echo $news_title;
            
            if(!empty($author_id) && !empty($news_banner) && !empty($news_thumbnail) && !empty($news_des) && !empty($news_category) && !empty($news_type) && !empty($news_title)){
                $sql = "INSERT INTO `news`(`author_id`,`banner`,`thumbnail`,`description`,`category`,`type`,`title`) VALUES ('$author_id','$news_banner','$news_thumbnail','$news_des','$news_category','$news_type','$news_title')";
                $rs = $connection->query($sql);
                if($rs){
                echo'
                <script>
                    $(document).ready(function(){
                        swal({
                            title: "Good job!",
                            text: "Add News Success.....!",
                            icon: "success",
                            button: "Okkkkk~~~~",
                        })
                    })
                </script>
                ';
                }else{
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Oppss!",
                                text: "Add News Unsuccess.....!",
                                icon: "error",
                                button: "Okkkkk~~~~",
                            });
                        })
                    </script>
                ';
                }
            }
        }
    }
    news_addpost();

    function news_viewpost(){
        global $connection;
        $sql = "SELECT `name`,t_news.* FROM `news` as t_news INNER JOIN `user` as t_user ON t_news.author_id = t_user.id ORDER BY `id` DESC";
        $rs = $connection->query($sql);
        while($row = mysqli_fetch_assoc($rs)){
            echo '
            <tr>
                <td>'.$row['id'].'</td>
                <td>'.$row['title'].'</td>
                <td>'.$row['type'].'</td>
                <td>'.$row['category'].'</td>
                <td><img src="./assets/image/'.$row['thumbnail'].'" width="100px" height="100px" style="object-fit-cover"/></td>
                <td>'.$row['view'].'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['create-at'].'</td>
                <td width="150px">
                    <a href="./news_updatepost.php?id='.$row['id'].'" class="btn btn-primary">Update</a>
                    <button type="button" remove-id="'.$row['id'].'" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Remove
                    </button>
                </td>
            </tr>
            ';
        }
    }

    function remove_news(){
        if(isset($_POST['btn-delete-news'])){
            // echo 123;
            global $connection;
            $id = $_POST['remove-id'];

            echo $id;
            $sql = "DELETE FROM `news` WHERE `id` = '$id'";
            $rs = $connection->query($sql);
            if($rs){
                echo'
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Good job!",
                                text: "Delete News Success.....!",
                                icon: "success",
                                button: "Okkkkk~~~~",
                            })
                        })
                    </script>
                ';
            }else{
                echo '
                <script>
                    $(document).ready(function(){
                        swal({
                            title: "Oppss!",
                            text: "Delete News Unsuccess.....!",
                            icon: "error",
                            button: "Okkkkk~~~~",
                        });
                    })
                </script>
            ';
            }
        }
    }
    remove_news();

    function update_news(){
        global $connection;
        if(isset($_POST['btn-updatenews'])){
                // echo 123;
            $news_title = $_POST['title'];
            $news_type = $_POST['type'];
            $news_category = $_POST['category'];
            $news_des = $_POST['des'];
            $thumbnail = $_FILES['thumbnail']['name'];
            $banner = $_FILES['banner']['name']; 

            $id = $_GET['id'];
            if(empty($thumbnail) && empty($banner)){
                    $thumbnail = $_POST['old_thumbnail'];
                    $banner = $_POST['old_banner'];
            }else{
                    $thumbnail = moveImage('thumbnail');
                    $banner = moveImage('banner');
            }
            if(!empty($news_title) && !empty($news_type) && !empty($news_category) && !empty($thumbnail) && !empty($banner) && !empty($news_des)){
                $sql = "UPDATE `news` SET `title`='$news_title',`type`='$news_type',`category`='$news_category',`banner`='$banner', `thumbnail`='$thumbnail',`description`='$news_des' WHERE `id`='$id'";
                $rs = $connection->query($sql);
                if($rs){
                    echo'
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Good job!",
                                    text: "Update News Success.....!",
                                    icon: "success",
                                    button: "Okkkkk~~~~",
                                })
                            })
                        </script>
                    ';
                }
            }else{
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Oppss!",
                                text: "Update News Unsuccess.....!",
                                icon: "error",
                                button: "Okkkkk~~~~",
                            });
                        })
                    </script>
                ';
            }
        }
    }
    update_news();

    function des_addpost(){
        if(isset($_POST['btn-savedes'])){
            // echo 1234;
            global $connection;
            $des = $_POST['des'];
            // echo $des;
            if(!empty($des)){
                $sql = "INSERT INTO `description`(`description`) VALUES ('$des')";
                $rs = $connection->query($sql);
                if($rs){
                    echo'
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Good job!",
                                text: "Add Description Success.....!",
                                icon: "success",
                                button: "Okkkkk~~~~",
                            })
                        })
                    </script>
                    ';
                }else{
                    echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Oppss!",
                                    text: "Add Description Unsuccess.....!",
                                    icon: "error",
                                    button: "Okkkkk~~~~",
                                });
                            })
                        </script>
                    ';
                }
            }
        }
    }
    des_addpost();

    function des_viewpost(){
        global $connection;
        $sql = "SELECT * FROM `description` ORDER BY `id` DESC LIMIT 4";
        $rs = $connection->query($sql);
        while($row = mysqli_fetch_assoc($rs)){
            echo '
            <tr>
                <td>'.$row['id'].'</td>
                <td>'.$row['description'].'</td>
                <td width="150px">
                    <a href="./description_updatepost.php?id='.$row['id'].'" class="btn btn-primary">Update</a>
                    <button type="button" remove-id="'.$row['id'].'" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Remove
                    </button>
                </td>
            </tr>
            ';
        }
    }

    function remove_des(){
        if(isset($_POST['btn-delete-des'])){
            // echo 123;
            global $connection;
            $id = $_POST['remove_id'];
            // echo $id;
            $sql = "DELETE FROM `description` WHERE `id` = '$id'";
            $rs = $connection->query($sql);
            if($rs){
                echo'
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Good job!",
                                text: "Delete Description Success.....!",
                                icon: "success",
                                button: "Okkkkk~~~~",
                            })
                        })
                    </script>
                ';
            }else{
                echo '
                <script>
                    $(document).ready(function(){
                        swal({
                            title: "Oppss!",
                            text: "Delete Description Unsuccess.....!",
                            icon: "error",
                            button: "Okkkkk~~~~",
                        });
                    })
                </script>
            ';
            }
        }
    }
    remove_des();

    function update_des(){
        global $connection;
        if(isset($_POST['btn-update-des'])){
            // echo 123;
            
            $new_des = $_POST['des'];
            $id = $_GET['id'];

            if(!empty($new_des)){
                $sql = "UPDATE `description` SET `description` = '$new_des' WHERE `id` = '$id'";
                $rs = $connection->query($sql);
                if($rs){
                    echo'
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Good job!",
                                    text: "Update News Success.....!",
                                    icon: "success",
                                    button: "Okkkkk~~~~",
                                })
                            })
                        </script>
                    ';
                }
            }else{
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Oppss!",
                                text: "Update News Unsuccess.....!",
                                icon: "error",
                                button: "Okkkkk~~~~",
                            });
                        })
                    </script>
                ';
            }
        }
    }
    update_des();

    function followus_addpost(){
        if(isset($_POST['btn-savefollowus'])){
            // echo 123;
            global $connection;
            $icon = moveImage('icon');
            $label = $_POST['label'];
            $status = $_POST['status'];
            $url = $_POST['url'];
            
            // echo $icon;
            // echo $label;
            // echo $status;
            // echo $url;
            if(!empty($icon) && !empty($label) && !empty($status) && !empty($url)){
                $sql = "INSERT INTO `follow_us`(`icon`,`label`,`url`,`status`) VALUE('$icon','$label','$url','$status')";
                $rs = $connection->query($sql);
                if($rs){
                    echo'
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Good job!",
                                    text: "Add Follow Us Success.....!",
                                    icon: "success",
                                    button: "Okkkkk~~~~",
                                })
                            })
                        </script>
                    ';
                }else{
                    echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Oppss!",
                                    text: "Add Follow Us Unsuccess.....!",
                                    icon: "error",
                                    button: "Okkkkk~~~~",
                                });
                            })
                        </script>
                    ';
                }
            }
        }
    }
    followus_addpost();

    function followus_viewpost(){
        global $connection;
        $sql = "SELECT * FROM `follow_us`";
        $rs = $connection->query($sql);
        while($row = mysqli_fetch_assoc($rs)){
            echo '
            <tr>
                <td>'.$row['id'].'</td>
                <td><img src="./assets/image/'.$row['icon'].'" width="100px" height="100px" style="object-fit-cover"/></td>
                <td>'.$row['label'].'</td>
                <td>'.$row['status'].'</td>
                <td>'.$row['url'].'</td>
                <td width="150px">
                    <a href="./followus_updatepost.php?id='.$row['id'].'"class="btn btn-primary">Update</a>
                    <button type="button" remove-id="'.$row['id'].'" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Remove
                    </button>
                </td>
            </tr>
            ';
        }
    }

    function update_followus(){
        global $connection;
        if(isset($_POST['btn-updatefollowus'])){
            // echo 123;

            $icon = $_FILES['icon']['name'];
            $new_label = $_POST['label'];
            $new_status = $_POST['status'];
            $new_url = $_POST['url'];
            $id = $_GET['id'];
            if(empty($icon)){
                $icon = $_POST['old-icon'];
            }else{
                $icon = moveImage('icon');
            }
            if(!empty($icon) && !empty($new_label) && !empty($new_status) && !empty($new_url)){
                $sql = "UPDATE `follow_us` SET `icon`='$icon',`label`='$new_label',`url`='$new_url',`status`='$new_status' WHERE `id`='$id'";
                $rs = $connection->query($sql);
                if($rs){
                    echo'
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Good job!",
                                    text: "Update FollowUs Success.....!",
                                    icon: "success",
                                    button: "Okkkkk~~~~",
                                })
                            })
                        </script>
                    ';
                }
            }else{
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Oppss!",
                                text: "Update FollowUs Unsuccess.....!",
                                icon: "error",
                                button: "Okkkkk~~~~",
                            });
                        })
                    </script>
                ';
            }
        }
    }
    update_followus();

    function remove_followus(){
        if(isset($_POST['btn-delete-followus'])){
            // echo 123;
            global $connection;
            $id = $_POST['remove-id'];

            $sql = "DELETE FROM `follow_us` WHERE `id`='$id'";
            $rs = $connection->query($sql);
            if($rs){
                echo'
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Good job!",
                                text: "Delete Follow US Success.....!",
                                icon: "success",
                                button: "Okkkkk~~~~",
                            })
                        })
                    </script>
                ';
            }else{
                echo '
                <script>
                    $(document).ready(function(){
                        swal({
                            title: "Oppss!",
                            text: "Delete Follow US Unsuccess.....!",
                            icon: "error",
                            button: "Okkkkk~~~~",
                        });
                    })
                </script>
            ';
            }
        }
    }
    remove_followus();

    function feedback_viewpost(){
        global $connection;
        $sql = "SELECT * FROM `feedback`";
        $rs = $connection->query($sql);
        while($row = mysqli_fetch_assoc($rs)){
            $date = $row['create_at'];
            $date = date('d/m/y');
            echo'
                <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['username'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['telephone'].'</td>
                    <td>'.$row['address'].'</td>
                    <td>'.$row['message'].'</td>
                    <td>'.$date.'</td>
                    <td width="150px">
                        <a href="./feedback_update.php?id='.$row['id'].'"class="btn btn-primary">Update</a>
                        <button type="button" remove-id="'.$row['id'].'" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Remove
                        </button>
                    </td>
                </tr>
            ';
        }
    }

    function feedback_remove(){
        if(isset($_POST['btn-delete-feedback'])){
            // echo 123;
            global $connection;
            $id = $_POST['remove_id'];
            // echo $id;
            $sql = "DELETE FROM `feedback` WHERE `id`='$id'";
            $rs = $connection->query($sql);
            if($rs){
                echo'
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Good job!",
                                text: "Delete Feedback Success.....!",
                                icon: "success",
                                button: "Okkkkk~~~~",
                            })
                        })
                    </script>
                ';
            }else{
                echo '
                <script>
                    $(document).ready(function(){
                        swal({
                            title: "Oppss!",
                            text: "Delete Feedback Unsuccess.....!",
                            icon: "error",
                            button: "Okkkkk~~~~",
                        });
                    })
                </script>
            ';
            }
        }
    }
    feedback_remove();

    function feedback_update(){
        global $connection;
        if(isset($_POST['btn-feedback-update'])){
            // echo 123;
            $new_username = $_POST['username'];
            $new_email = $_POST['email'];
            $new_telephone = $_POST['telephone'];
            $new_address = $_POST['address'];
    
            $id = $_GET['id'];

            if(!empty($new_username)&& !empty($new_email)&& !empty($new_telephone)&& !empty($new_address)){
                $sql = "UPDATE `feedback` SET `username`='$new_username',`email`='$new_email',`telephone`='$new_telephone',`address`='$new_address' WHERE id='$id'";
                $rs = $connection->query($sql);
                if ($rs) {
                    echo '
                    <script>
                        $(document).ready(function () {
                            swal({
                                title: "Update Feedback Success...!",
                                text: "success...!",
                                icon: "success",
                                button: "OK",
                            })
                        })
                </script>
                '; 
                }
                else{
                    echo '
                    <script>
                        $(document).ready(function () {
                            swal({
                                title: "Update Feedback Unsuccess...!",
                                text: "Unsuccess...!",
                                icon: "error",
                                button: "OK",
                            })
                        })
                </script>
                '; 
                }
            }
            
        }
    }
    feedback_update();
?>
