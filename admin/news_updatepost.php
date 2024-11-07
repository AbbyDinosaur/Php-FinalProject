<?php 
    // include('function.php');
    include('sidebar.php');

    $id = $_GET['id'];

    $sql = "SELECT * FROM `news` WHERE id='$id'";
    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);
    $thumbnail = $row['thumbnail'];
    $banner = $row['banner'];
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Update News</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title" value="<?php echo $row['title']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Type</label>
                                        <select class="form-select" name="type">
                                            <option value="National" <?php if($row['type']=="National") echo 'selected'?>>National</option>
                                            <option value="International"<?php if($row['type']=="International") echo 'selected'?>>International</option>   
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-select" name="category">
                                            <option value="Sport" <?php if($row['category']=="Sport") echo 'selected'?>>SPORT</option>
                                            <option value="Social" <?php if($row['category']=="Social") echo 'selected'?>>SOCIAL</option>   
                                            <option value="Entertainment" <?php if($row['category']=="Entertainment") echo 'selected'?>>ENTERTAINMENT</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Thumbnail</label>
                                        <input type="file" class="form-control" name="thumbnail">
                                        <img src="./assets/image/<?php echo $thumbnail?>" alt="" width="150px" height="150px">
                                        <!-- Hidden Thumbnail -->
                                        <input type="hidden" value="<?php echo $thumbnail?>" name="old_thumbnail" >
                                    </div>
                                    <div class="form-group">
                                        <label>Banner</label>
                                        <input type="file" class="form-control" name="banner">
                                        <img src="./assets/image/<?php echo $banner?>" alt="" width="150px" height="150px">
                                        <!-- Hidden banner -->
                                        <input type="hidden" value="<?php echo $banner?>" name="old_banner" >
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="des" value=""><?php echo $row['description']?></textarea>

                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="btn-updatenews">Update</button>
                                        <button type="submit" class="btn btn-danger">Cancel</button>
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