<html>
    <head>
        <title> weather app </title>


    </head>

    <body>
        <h3>s Weather App </h3>
        <div id="after_submit" style="color: red;">
            
        </div>
        <form id="contact_form" action="index.php" method="POST" enctype="multipart/form-data">
         <label for="cars">Choose a city</label>

        <select name="cityID" id="city">
            <?php 
             foreach($eg_cities as $c){
                echo "<option value=".$c["id"].">".$c["name"]."</optipn>";
             };
            
            ?>
        </select>
        <button type="submit">get weather</button>
        </form>
    </body>

</html>