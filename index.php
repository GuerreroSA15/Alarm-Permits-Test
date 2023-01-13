<?php
	include './includes/header.php';
    include './DB.php';
?>

    <div class="content">
        <div class="row justify-content-center">         
            


            <div class="col-md-4 requestForm">
                <form class="ui form" method="POST" action="" enctype="multipart/form-data">
     
                <div class="field">
                    <label>Street Number</label>
                     <input type="text" class="form-control" name="Street_Num" id="Street_Num" maxlength="" placeholder="" value="<?php echo isset($_POST['Street_Num']) ? $_POST['Street_Num'] : ''; ?>">
                  </div>

                  <div class="field">
                    <label>Street Name </label>
                     <input type="text" class="form-control" name="Street_Name" id="Street_Name" maxlength="" placeholder="" value="<?php echo isset($_POST['Street_Name']) ? $_POST['Street_Name'] : ''; ?>">
                  </div>
                   
                <div class="field">
                    <label>Apt/Unit</label>
                    <input type="text" class="form-control" name="AptUnit" id="AptUnit" maxlength="" placeholder="" value="<?php echo isset($_POST['AptUnit']) ? $_POST['AptUnit'] : ''; ?>">
                </div>

                  <div class="field">
                    <label>Project Name</label>
                     <input type="text" class="form-control" name="Project" id="Project" maxlength="" placeholder="" value="<?php echo isset($_POST['Project']) ? $_POST['Project'] : ''; ?>">
                  </div>

                  <button class="ui button" type="submit" name='search'>Search</button>

                </form>
            </div>   
        </div>



<?php
        if(array_key_exists('search', $_POST)) {
            button1();
        }
        else if(array_key_exists('button2', $_POST)) {
            button2();
        }
        function button1() {
            //echo "This is Button1 that is selected";
			dbcall();
        }
        function button2() {
            echo "This is Button2 that is selected";
        }
?>
	
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const rows = document.querySelectorAll("tr[data-href]");
        console.log(rows);

        rows.forEach(row => {
            row.addEventListener("click", () => {
                window.location.href = row.dataset.href;
            });
        });
    });
</script>

<?php
	include './includes/footer.php';
?>