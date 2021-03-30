<?php
include('functions/dbConnect.php');





?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>E-Judging</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/start_event.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="bar">
            <div class="logo">
                <img src="img/logo.png">
            </div>
        </div>
        <?php
            $id =mysqli_real_escape_string($mysqli, $_GET['id']);
        echo "
        <div class='background'>
        <form action='functions/event_settings.php?event=$id' method='POST'>"
        ?>
            <div class="table_container">
                
                    
                        <table class="input_contestant">
                                <tr>
                                <th colspan=5>Contestant's Settings</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="firstname[]" id="form_control" placeholder="Firstname" required></td>
                                    <td><input type="text" name="middlename[]" id="form_control" placeholder="Middle name" required></td>
                                    <td><input type="text" name="lastname[]" id="form_control" placeholder="Lastname" required></td>
                                    <td><p>1</p></td>
                                    <td><button>Delete Contestant</button></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="firstname[]" id="form_control" placeholder="Firstname" required></td>
                                    <td><input type="text" name="middlename[]" id="form_control" placeholder="Middle name" required></td>
                                    <td><input type="text" name="lastname[]" id="form_control" placeholder="Lastname" required></td>
                                    <td><p>2</p></td>
                                    <td><button>Delete Contestant</button></td>
                                </tr>
                            </table>
                            <tr><td colspan=5><button id="add_contestant">Add Contestant</button></td></tr>
            </div>
                   
            <div class="table_container">
                        <table class="input_judge">
                                <tr>
                                <th colspan=5>Judge's Settings</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="firstname_j[]" id="form_control" placeholder="Firstname" required></td>
                                    <td><input type="text" name="lastname_j[]" id="form_control" placeholder="Lastname" required></td>
                                    <td><input type="email" name="email[]" id="form_control" placeholder="Email Address" required></td>
                                    <td><p>1</p></td>
                                    <td><button>Delete Judge</button></td>
                                </tr>
                        </table>
                                <tr><td colspan=5><button id="add_judge">Add Judge</button></td></tr>
            </div>

            <div class="table_container">
                        <table class="input_crit">
                                <tr>
                                <th colspan=5>Criteria's Settings</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="description[]" id="crit_desc" placeholder="Description" required>
                                        <select name="percent[]" id="percentage" required>
                                            <?php
                                                $n1=-1;
                                                while($n1<100)
                                                {$n1=$n1+1;
                                            ?>
                                                <option><?php echo $n1; ?></option>
                                            <?php } ?>
                                        </select> %
                                    </td>
                                    <td><p>1</p></td>
                                    <td><button>Delete Criteria</button></td>
                                </tr>
                        </table>
                            <tr><td colspan=5><button id="add_crit">Add Criteria</button></td></tr>
            </div>
                    <input type="submit" name="submit" id="submit_btn" value="Save Settings">
                </form>
        </div>
        
   
    <script>
        $('document').ready(function(){
            var count_contestant = 2;
            var count_judge = 1;
            var count_crit = 1;
            $('#add_contestant').click(function(e){
                e.preventDefault();
                count_contestant = count_contestant + 1;
                $('.input_contestant').append('<tr><td><input type="text" name="firstname[]" id="form_control" placeholder="Firstname" required></td><td><input type="text" name="middlename[]" id="form_control" placeholder="Middle name" required></td><td><input type="text" name="lastname[]" id="form_control" placeholder="Lastname" required></td><td><p>'+ count_contestant +'</p></td><td> <button>Delete Contestant</button></td></tr>');
            });

            $('#add_judge').click(function(e){
                e.preventDefault();
                count_judge = count_judge + 1;
                $('.input_judge').append('<tr><td><input type="text" name="firstname_j[]" id="form_control" placeholder="Firstname" required></td><td><input type="text" name="lastname_j[]" id="form_control" placeholder="Lastname" required></td><td><input type="email" name="email[]" id="form_control" placeholder="Email Address" required></td><td><p>1</p></td><td><button>Delete Judge</button></td></tr>');
            });

            $('#add_crit').click(function(e){
                e.preventDefault();
                count_crit = count_crit + 1;
                $('.input_crit').append('<tr><td><input type="text" name="description[]" id="crit_desc" placeholder="Description" required> <select name="percent[]" id="percentage" required>"<?php $n1=-1; while($n1<100) {$n1=$n1+1; ?>"<option><?php echo $n1; ?></option>"<?php } ?>"</select> %</td><td><p>'+ count_crit +'</p></td><td><button>Delete Criteria</button></td>');
            });  
        }); 
    </script>

    </body>
</html>