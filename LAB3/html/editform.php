<?php
include "condb.php";
$id = $_GET['id'];

$sql = "SELECT * FROM  tb_member WHERE id_member= '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<form id="editForm">
    <label for="input_id">ID :</label>
    <input type="text" name="id" id="input_id" readonly value="<?= $row['id_member'] ?>"><br>

    <label for="input_name">NAME :</label>
    <input type="text" name="name" id="input_name"  value="<?= $row['name'] ?>"><br>

    <label for="input_prov">PROVINCE :</label>
    <input type="text" name="prov" id="input_prov" value="<?= $row['id_province'] ?>"><br>
    <hr>
    <button type="submit" class= "btn btn-primary"> UPDATE </button>
    <button type="reset" class= "btn btn-danger"> CANCLE </button>
</form>

<script>
    $("#editForm").submit(function(e) {
        e.preventDefault();

        let fm = $(this);
        $.ajax({
            url: "/edititem.php",
            method: "POST",
            data: fm.serialize(),
            success: function(res) {
                console.log(res);
                if (res == "error")
                    alert("Error update data in  database.");
                else{
                    $("#div_item").load("/listitem.php");
                    $("#staticBackdrop").modal('hide');
                }
            }
        });
    });
</script>