<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
<body align="center" bgcolor="pink">
    <h1 align="center">STUDENT  FEE PORTAL</h1>
    <form method="POST">
        <input type="hidden" id="id" name="id" value="" placeholder="hidden"><br><br>
        <label for="name">name</label>
        <input type="text" id="name" name="name" value="" placeholder="name"><br><br>
        <label for="email">email</label>
        <input type="email" id="email" name="email" value="" placeholder="email"><br><br>
        <label for="number">number</label>
        <input type="number" id="contact" name="contact" value="" placeholder="contact"><br><br>
        <label for="branch">branch</label>
        <select name="branch" id="branch">
            <option value="">--Select Branch--</option>
            <option value="CSE">CSE</option>
            <option value="MECH">MECH</option>
            <option value="EEE">EEE</option>
            <option value="ECE">ECE</option>
        </select><br><br>
        <label for="admin_id">admin_id</label>
        <input type = "number" id="admin_id" name="admin_id" value="" ><br><br>
        <label for="fee">fee</label>
        <input type="number" id="fee" name="fee" value="" placeholder="fee"><br><br>
        <input type="hidden" id="fee_status" name="fee_status" value="" placeholder="hidden"><br><br>

        <button type="button" onclick="saveData()">Submit</button>
    </form>
    <br><br>

    <div id="apple"></div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#apple").load('table.php');
        });


        function saveData() {
            var id = $("#id").val();
            var name = $("#name").val();
            var email = $("#email").val();
            var contact = $("#contact").val();
            var branch = $("#branch").val();
            var admin_id = $("#admin_id").val();
            var fee = $("#fee").val();
            
            if(name == "" || email == "" || contact == "" || branch == "" || fee =="") {
                alert("Please fill all the required fields");
                return false;
            }
            if (admin_id == "") {
                admin_id = "2024" + Math.floor(Math.random() * (99999 - 10000 + 1)) + 10000;
                $("#admin_id").val(admin_id);
            }


            $.ajax({
                url: 'insert.php',
                type: 'POST',
                data: {
                    name : name,
                    userEmail : email,
                    userContact : contact,
                    branch : branch,
                    admin_id : admin_id,
                    fee : fee,
                    id : id

                },
                success: function(data) {
                    $("#apple").load('table.php');
                    clearForm();
                    alert(data);
                },
                error: function(error) {
                    console.log(error);
                }
            })

        }

        function clearForm() {
            $("#name").val('');
            $("#email").val('');
            $("#contact").val('');
            $("#branch").val('');
            $("#admin_id").val('');
            $("#fee").val('');
            $("#id").val('');
        }

        function updateData(id, name, email, contact, branch, admin_id, fee) {
            $("#id").val(id);
            $("#name").val(name);
            $("#email").val(email);
            $("#contact").val(contact);
            $("#branch").val(branch);
            $("#admin_id").val(admin_id);
            $("#fee").val(fee);
        }

        function deleteData(id) {
            var deleteData = confirm("Are you sure to delete this data?");

            if(deleteData) {
                $.ajax({
                    url: 'delete.php',
                    type: 'POST',
                    data: {
                        deleteId : id
                    },
                    success: function(data) {
                        $("#apple").load('table.php');
                        alert("Data deleted successfully");
                    },
                    error: function(error) {
                        console.log(error);
                        alert(error);
                    }
                })
            }
           
        }
        

    </script>
</body>
</html>