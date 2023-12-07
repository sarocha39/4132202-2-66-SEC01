<?php
include "condb.php";

$sql = "SELECT * FROM tb_member ";
$result = mysqli_query($conn, $sql);

// var_dump($result);
?>

<button id="btn_add" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+ Add</button>


<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Province</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?= $row["id_member"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["id_province"] ?></td>
                <td><button class="btn_del" data-id="<?= $row["id_member"] ?>"> DEl </button></td>
                <td><button class="btn_edt" data-id="<?= $row["id_member"] ?>" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Edit </button></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<script>
    $(".btn_del").click(function() {
        let id = $(this).data("id");
        console.log(id);

        $.ajax({
            url: "/delitem.php",
            method: "GET",
            data: {
                id_mem: id
            },
            success: function(res) {
                console.log(res);
                if (res == "error")
                    alert("con't delete item.");
                else
                    $("#div_item").load("/listitem.php");
            }
        });
    });

    $("#btn_add").click(function() {
        //$("#div_item").load("/addform.php");
        $("#staticBackdropLabel").text("Add Item");
        $(".modal-body").load("/addform.php");
        $(".modal-footer").hide();
    });

    $(".btn_edt").click(function() {
        let id = $(this).data("id");

        //$("#div_item").load("/Editform.php");
        $("#staticBackdropLabel").text("Edit Item");
        $(".modal-body").load(`/editform.php?id=${id}`);
        $(".modal-footer").hide();
    });
</script>