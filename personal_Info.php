<!DOCTYPE html>
<html lang="en">
    <head>
        <title>E-Judging</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/info.css" rel="stylesheet">
    </head>
    <body>
        <div class="bar">
            <div class="logo">
                <img src="img/logo.png">
            </div>
        </div>
        <div class="back"></div>
        <div class="container">
              <div class="header">
                <h2>Account Information</h2>
            </div>

            <div class="form">
                <form action="functions/insert_org_info.php" method="POST">
                    <input type="text" name="firstname" id="form_control" placeholder="Firstname" required>
                    <input type="text" name="middlename" id="form_control" placeholder="Middle name" required>  
                    <input type="text" name="lastname" id="form_control" placeholder="Lastname" required>
                    <input type="text" name="company" id="form_control" placeholder="Company name / Organization" required>
                    <input type="number" name="phoneNumber" id="form_control" placeholder="Phone number" required>
                    <select name="gender" id="form_control" required>
                        <option value="Gender">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Choose not to say">Choose not to say</option>
                        <option value="Others">Others</option>
                    </select>
                    <input type="submit" name="submit" id="submit">
                </form>

            </div>
        </div>
    </body>
</html>