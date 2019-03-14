<?php
$id = $_GET['id'];
include_once '../../inc/connect.php';
$row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `social` WHERE id=$id"));
?>
<style>
	input, textarea {
		color: #383838;
		border: 1px solid #ccc;
	}
	input {
		height: 30px;
		padding: 0 10px;
	}
	textarea {
		padding: 10px;
	}
	.update {
		background: #c5eccd;
		border: 1px solid #ffc095;
		color: #fff;
	}
</style>
<form action="xuly_edit_social.php" class="edit-list" method="POST">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"></span>
                    </div>
                    <div class="actions">

                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">
                                <div class="btn-group pull-right">
                                    <button class="btn green  btn-outline dropdown-toggle"
                                            data-toggle="dropdown">Công cụ
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-print"></i> Print </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-checkable order-column"
                           id="sample_1">
                        <tbody>
                        <tr class="input-group">
                            <th><label class="label" for="txtAddr">ID</label></th>
                            <td class="edit-input-content">
                                <?php echo $row["id"]; ?>
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                            </td>
                        </tr>
                        <tr class="input-group">
                            <th><label class="label" for="txtAddr">Name</label></th>
                            <td class="edit-input-content">
                                <input type="text" class="form-control" name="name" value="<?php echo $row["name"]; ?>" required="required" placeholder="Name" size="50">
                            </td>
                        </tr>
                        <tr class="input-group">
                            <th><label class="label" for="txtAddr">Icon</label></th>
                            <td class="edit-input-content">
                                <input type="text" class="form-control" name="icon" value="<?php echo $row["icon"]; ?>" required="required" placeholder="Icon" size="50">
                            </td>
                        </tr>
                        <tr class="input-group">
                            <th><label class="label" for="txtAddr">Alt Icon</label></th>
                            <td class="edit-input-content">
                                <input type="text" class="form-control" name="alt_icon" value="<?php echo $row["alt_icon"]; ?>" required="required" placeholder="Alt Icon" size="50">
                            </td>
                        </tr>
                        <tr class="input-group">
                            <th><label class="label" for="txtAddr">Social Link</label></th>
                            <td class="edit-input-content">
                                <textarea class="form-control" name="social_link" placeholder="Social Link" rows="5" cols="50"><?php echo $row["social_link"]; ?></textarea>
                            </td>
                        </tr>
                        <tr class="input-group">
                            <th><label class="label" for="txtAddr"></label></th>
                            <td class="edit-input-content">
                                <input type="submit" name="update" value="Update" class="update btn btn-info">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</form>