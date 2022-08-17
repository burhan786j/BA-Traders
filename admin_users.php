<?php
require('top.inc.php');

// DELETE OPTION PART\

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);
        if ($type ==  'delete') {
            $id = get_safe_value($con, $_GET['id']);
            $delete_sql= "delete from users where id='$id'";
            mysqli_query($con ,$delete_sql);
        }
}

$sub_sql = "";
if (isset($_POST['submit'])) {
    $from = $_POST['from'];
    $fromArr = explode('/', $from);
    $from = $fromArr['2'] . '-' . $fromArr['1'] . '-' . $fromArr['0'];
    $from = $from . " 00:00:00";
    $to = $_POST['to'];
    $toArr = explode('/', $to);
    $to = $toArr['2'] . '-' . $toArr['1'] . '-' . $toArr['0'];
    $to = $to . " 23:59:59";

    $sub_sql = "where added_on >= '$from' && added_on <= '$to'";
}

$sql = "select * from users $sub_sql order by id desc";
$res = mysqli_query($con, $sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-5">
                            <h4 class="box-title">User </h4>
                            </div>
                            <div class="col-7">
                                <form action="#" method="post">
                                    <label for="from">From</label>
                                    <input type="text" id="from" name="from" required>
                                    <label for="to">to</label>
                                    <input type="text" id="to" name="to" required>
                                    <input type="submit" name="submit" value="Filter">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($res)) { ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['mobile'] ?></td>
                                            <td><?php echo $row['added_on'] ?></td>
                                            <td> 
                                                <?php 
                                                echo "
                                                <span class='badge btn btn-danger'>
                                                <a href='?type=delete&id=".$row['id']."'>delete</a> </span>&nbsp;";
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        var dateFormat = "dd/mm/yy",
            from = $("#from")
            .datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                dateFormat: "dd/mm/yy",
            })
            .on("change", function() {
                to.datepicker("option", "minDate", getDate(this));
            }),
            to = $("#to").datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1,
                dateFormat: "dd/mm/yy",
            })
            .on("change", function() {
                from.datepicker("option", "maxDate", getDate(this));
            });

        function getDate(element) {
            var date;
            try {
                date = $.datepicker.parseDate(dateFormat, element.value);
            } catch (error) {
                date = null;
            }

            return date;
        }
    });
</script>
<?php
require('footer.inc.php');
?>