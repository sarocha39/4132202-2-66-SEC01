<?php
include "condb.php";

$sql = "SELECT * FROM tb_member";
$result = mysqli_query($conn, $sql);

// var_dump($result);
?>

<button id="btn_add"> + Add </button>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Province</th>
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
                <td><button class="btn_del" data-id="<?= $row["id_member"] ?>"> DEL </button></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<script>
    $(".btn_del").click(function(){
        let id = $(this).data("id");
        console.log(id);


        $.ajax({
            url:"/delitem.php",
            method:"GET",
            data:{
                id_mem: id
            },
            success: function(res) {
                console.log(res);
                if(res =="error")
                   alert("Can't delete item.");
                else
                $("#div_item").load("/listitem.php");
            }
        });
    });

    $("#btn_add").click(function(){
        $("#div_item").load("/addform.php");
    })

</script>