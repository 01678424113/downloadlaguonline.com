<style>
	.menu-r .edit-list .addnew {
		border: 1px solid #e68a12;
		background-color: #e68a12;
		padding: 6px 20px;
		color: #ffffff;
		font-size: 15px;
	}
</style>

<div class="edit-list">
	<form id="form" action="check/xuly_social.php" method="POST" enctype="multipart/form-data" target="_blank">
        <div class="form-group">
            <label class="control-label col-md-2 text-center" for="txtAddr">Name
                <span class="required"></span>
            </label>
            <div class="col-md-3 edit-input-content">
                <input class="input form-control" type="text" name="name" value="" required="required" placeholder="Name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2 text-center" for="txtAddr">Select File
                <span class="required"></span>
            </label>
            <div class="col-md-3 edit-input-content">
                <input type="file" name="file" class="form-control" required="required">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2 text-center" for="txtAddr">Social Link
                <span class="required"></span>
            </label>
            <div class="col-md-3 edit-input-content">
                <input class="input form-control" type="text" name="social_link" value="" required="required" placeholder="Social Link">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2 text-center" for="txtAddr">
                <span class="required"></span>
            </label>
            <div class="col-md-3 edit-input-content">
                <input type="submit" name="add" value="Add New" class="addnew btn btn-info">
            </div>
        </div>
	</form>
</div>