<?php 
    include('sidebar.php');
?>
                <div class="col-10">
                    <div class="content-right">
                        <div class="top">
                            <h3>Add Follow Us</h3>
                        </div>
                        <div class="bottom">
                            <figure>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Icon</label>
                                        <input type="file" class="form-control" name="icon">
                                    </div>
                                    <div class="form-group">
                                        <label>Label</label>
                                        <input type="text" class="form-control" name="label">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-select" name="status">
                                            <option value="all">All</option>
                                            <option value="follow_us">Follow_us</option>
                                            <option value="footer">Footer</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Url</label>
                                        <input type="text" class="form-control" name="url">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success" name="btn-savefollowus">Save</button>
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