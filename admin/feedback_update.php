<?php 
    // include('function.php');
    include('sidebar.php');
    $id = $_GET['id'];

    $sql= "SELECT * FROM `feedback` WHERE id='$id'";
    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Follow-Us update</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">                                  
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input name="username" type="text" class="form-control"  value="<?php  echo $row['username']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="text" class="form-control"  value="<?php  echo $row['email']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Telephone</label>
                                        <input name="telephone" type="text" class="form-control"  value="<?php  echo $row['telephone']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input name="address" type="text" class="form-control"  value="<?php  echo $row['address']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <input name="message" type="text" class="form-control"  value="<?php  echo $row['message']?>">
                                    </div>
                                    <div class="form-group">
                                        <button name="btn-feedback-update" type="submit" class="btn btn-primary">Update</button>                              
                                        <button type="submit" class="btn btn-danger">Cancel</button>
                                    </div>
                                </form>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>