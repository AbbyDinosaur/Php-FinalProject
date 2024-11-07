<?php 
    include('sidebar.php');
    $id = $_GET['id'];

    $sql = "SELECT * FROM `follow_us` WHERE id='$id'";
    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);
    $icon = $row['icon'];
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Update Follow Us</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Icon</label>
                                        <input type="file" class="form-control" name="icon">
                                        <img src="./assets/image/<?php echo $icon?>" alt=""width="80px" height="80px">
                                        <!-- Hidden icon -->
                                        <input type="hidden" value="<?php echo $icon?>" name="old-icon" >
                                    </div>
                                    <div class="form-group">
                                        <label>Label</label>
                                        <input type="text" class="form-control" name="label" value="<?php echo $row['label']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-select" name="status">
                                            <option value="all" <?php if($row['status']=="all") echo 'selected'?>>All</option>
                                            <option value="follow_us" <?php if($row['status']=="follow_us") echo 'selected'?>>Follow_us</option>
                                            <option value="footer" <?php if($row['status']=="footer") echo 'selected'?>>Footer</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Url</label>
                                        <input type="text" class="form-control" name="url" value="<?php echo $row['url']?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success" name="btn-updatefollowus">Update</button>
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