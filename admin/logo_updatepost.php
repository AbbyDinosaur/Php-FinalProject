<?php 
    // include('function.php');
    include('sidebar.php');
    $id = $_GET['id'];

    $sql="SELECT * FROM `logo` WHERE id='$id'";
    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);
    $thumbnail = $row['thumbnail'];

?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Update Logo News</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    
                                        <label>Status</label>
                                        <select class="form-select" name="status">
                                            <option value="Header" <?php if($row['status']=="Header") echo 'selected'?>>Header</option>
                                            <option value="Footer" <?php if($row['status']=="Footer") echo 'selected'?>>Footer</option>
                                        </select>
                                    
                                    <div class="form-group mt-3">
                                        <label>Thumbnail</label>
                                        <input type="file" class="form-control" name="thumbnail">
                                        <img src="./assets/image/<?php echo $thumbnail?>" alt="" width="300px" height="300px">
                                        <!-- Hidden Logo -->
                                        <input type="hidden" value="<?php echo $thumbnail?>" name="old-logo" >
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="btn-updatelogo">Update</button>
                                        <a herf= type="submit" class="btn btn-success">Cancel</a>
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