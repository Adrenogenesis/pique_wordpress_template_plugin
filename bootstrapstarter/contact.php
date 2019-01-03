<div class="col-md-12">
    <div class="contact" id="contact">
        <h3>Contact</h3>
        <hr>
<?php
        // define variables and set to empty values
        $nameErr = $fnameErr = $checkErr = $emailErr = $telErr = $birthErr = $zipErr = $textErr = $villeErr = "";
        $name = $fname = $checkbox = $email = $tel = $zip = $birthDate = $ville = $text = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nameErr = "Nom obligatoire";
            } else {
                $name = test_input($_POST["name"]);
            }
            if (empty($_POST["lname"])) {
                $fnameErr = "Prenom obligatoire";
            } else {
                $fname = test_input($_POST["lname"]);
            }
            if (empty($_POST["gender"])) {
                $checkErr = "Champ obligatoire";
            } else {
                $checkbox = test_input($_POST["gender"]);
            }
            if (empty($_POST["email"])) {
                $emailErr = "Email requis";
            } else {
                $email = test_input($_POST["email"]);
            }

            if (empty($_POST["date"])) {
                $birthErr = "Date de naissance";
            } else {
                $birthDate = test_input($_POST["date"]);
            }
            if (empty($_POST["ville"])) {
                $villeErr = "Ville requis";
            } else {
                $ville = test_input($_POST["ville"]);
            }
            if (empty($_POST["zipcode"])) {
                $zipErr = "Code postal requis";
            } else {
                $zip = test_input($_POST["zipcode"]);
            }
            if (empty($_POST["lphone"])) {
                $telErr = "Téléphone requis";
            } else {
                $tel = test_input($_POST["lphone"]);
            }
            if (empty($_POST["message"])) {
                $txtErr = "Message requis";
            } else {
                $text = test_input($_POST["message"]);
            }
        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
        <!---contact form -------------------------->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="text" id="fname" name="name"  maxlength="10" placeholder="NOM*" title="Lettres seulement !"
                   value="Nom"
                   onkeydown="return alphaOnly(event);"
                   onblur="if (this.value == '') {this.value = 'Nom';}"
                   onfocus="if (this.value == 'Nom') {this.value = '';}">
            <span class="error">* <?php echo $nameErr;?></span>
            <input type="text" id="lname" name="lname" maxlength="10" placeholder="PRENOM*" title="Lettres seulement !"
                   value="prenom"
                   onkeydown="return alphaOnly(event);"
                   onblur="if (this.value == '') {this.value = 'prenom';}"
                   onfocus="if (this.value == 'prenom') {this.value = '';}">
            <span class="error">* <?php echo $fnameErr;?></span><br>
            <br>

            <input type="checkbox" name="ent" value="Masculin" checked="checked"> Particulier<br>
            <input type="checkbox" name="ent" value="Feminin" > Entreprise<br><br>

            <input type="tel" id="phone" name="lphone" placeholder="TELEPHONE*" maxlength="10" onkeypress="return isNumberKey(event)">
            <span class="error">* <?php echo $telErr;?></span><br>
            <input type="email" id="email" name="email" placeholder="EMAIL*">
            <span class="error">* <?php echo $emailErr;?></span>
            <input type="text" id="zipcode" name="zipcode" placeholder="CODE POSTAL*" maxlength="5" onkeypress="return isNumberKey(event)">
            <span class="error">* <?php echo $zipErr;?></span>
            <input type="text" id="ville" name="ville" placeholder="VILLE*">
            <span class="error">* <?php echo $villeErr;?></span><br>
            <br>
            <label for="message">MESSAGE*</label><br><br>
            <textarea class="textarea" type="box" id="message" name="message" cols="30" rows="10"></textarea><br><br>
            <span class="error">* <?php echo $textErr;?></span><br><br>
            <input type="submit" id="button" class="button" value="Envoyer">
            &nbsp;&nbsp;<label id="maxReached" style="visibility: hidden; color:red">(!)</label><br>
        </form>
        <?php
        echo $name;
        echo "<br>";
        echo $fname;
        echo "<br>";
        echo $checkbox;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $birthDate;
        echo "<br>";
        echo $zip;
        echo "<br>";
        echo $tel;
        echo "<br>";
        echo $ville;
        echo "<br>";
        echo $text;
        echo "<br>";
        if(isset($_POST['name']))
        {
            $name = trim($_POST["name"]);
            $fname = trim($_POST["lname"]);
            $email = trim($_POST["email"]);
            $ville = trim($_POST["ville"]);
            $text = trim($_POST["message"]);

            if(strlen($name)<2) {
                print "<p>Tapez votre nom s.v.p.</p>";
            }else if(strlen($fname)<2) {
                print "<p>Tapez un sujet.</p>";
            }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                print  "<p>Veuillez renseigner une adresse mail valide!</p>";
            }else if(strlen($text)<10) {
                print "<p>Tapez votre message s.v.p.</p>";

            }else{
                $headers =  'From: '.$email. "\r\n" .
                    'Reply-To: '.$email . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                mail('webmst@exonet3i.com',$name,$text,$headers);
                print "Message envoyé avec succès.";
            }
        }
        ?>
        <!---end contact -------------------------------->
        <script>
            wow = new WOW().init();
        </script>
        <!---Lettres seulement---------------------------->
        <script>
            function alphaOnly(event) {
                var key = event.keyCode;
                return ((key >= 65 && key <= 90) || key == 8);
            };
        </script>
        <!---Nombres seulement---------------------------->
        <script>
            function isNumberKey(evt)
            {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            }
        </script>
    </div>
</div>