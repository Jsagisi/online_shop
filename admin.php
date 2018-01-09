
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <script>

            function confirmDelete(userFullName) {
                
                var confirmDelete = confirm("Do you really want to delete " + userFullName + "?");
                if (!confirmDelete){
                    return false;
                }
                else{
                    
                }
                
            }            
            
        </script>
                <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <style>
            #wrapper{
                text-align:center;
            }
        </style>
        <div id="wrapper">
    </head>
    <body>
        <form action = "logout.php">
            <input type="submit" value = "Logout">
        </form>
        <br>
        <h1>Administrator</h1>
        <form action="addProduct.php">
            <input type="submit" value="Add Product"/>
        </form>
        
 
        </br>
    
        
        <br>
        <br>
      
        <?php include 'adminDisplay.php'?>
          7y7y
        </div>

    </body>
</html>