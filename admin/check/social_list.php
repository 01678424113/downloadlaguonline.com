<?php
include_once '../../inc/connect.php';
?>
<style>
    form {
        height: 728px;
        overflow: auto;
    }

    table {
        border: 1px solid #f1f1f1;
    }

    td {
        padding: 5px 10px;
    }
</style>
<form>
    <table class="table table-striped table-bordered table-hover table-checkable order-column"
           id="sample_1">
        <thead>
        <tr>
            <th class="table-checkbox">
                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                    <input type="checkbox" class="group-checkable"/>
                    <span></span>
                </label>
            </th>
            <td><b>ID</b></td>
            <td><b>Name</b></td>
            <td><b>Icon</b></td>
            <td><b>Alt Icon</b></td>
            <td><b>Social Link</b></td>
            <td><b>Option</b></td>
        </tr>
        </thead>
        <tbody>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM `social`");
        foreach ($query as $row) {
            ?>
            <tr class="odd gradeX">
                <td>
                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                        <input type="checkbox" class="checkboxes" value="1"/>
                        <span></span>
                    </label>
                </td>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><img src="<?php echo $home . '/' . $row['icon']; ?>" style="border-radius:5px"></td>
                <td><?php echo $row['alt_icon']; ?></td>
                <td><a target="_blank" href="<?php echo $row['social_link']; ?>"><?php echo $row['social_link']; ?></a>
                </td>
                <td>
                    <center><a target="_blank" href="check/edit_social.php?id=<?php echo $row['id']; ?>">Edit</a>
                    </center>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</form>