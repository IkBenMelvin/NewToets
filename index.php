<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Form</title>
</head>
<body>
    <?php
    class Persoon{
        public $naam = "";
        public $email = "";
        public $geslacht = "";
        public $checked = "";
        public $oordelen = "";
        public $geoordeeld = "";
        
        public function ChangeData($newName, $newEmail){
            $this->naam = $newName;
            $this->email = $newEmail;
        }

        public function ChangeChecked($NewChecked){
            $this->checked = $NewChecked;
        }
        public function ChangeCheckbox($NewCheckbox){
            $this->oordelen = $NewCheckbox;
        }
        public function ChangeGeoordeeld($NewOordeel){
            $this->geoordeeld = $NewOordeel;
        }

        public function CheckGender($Gender){
            switch($Gender){
                case "L":
                    $this->geslacht = 'Lesbisch';
                    $this->checked = "L";
                    echo "<script>document.body.style.backgroundColor = 'purple';</script>";
                    break;
                case "H":
                    $this->geslacht = 'Homo';
                    $this->checked = "H";
                    echo "<script>document.body.style.backgroundColor = 'lightblue';</script>";
                    break;
                case "B":
                    $this->geslacht = 'Bi';
                    $this->checked = "B";
                    echo "<script>document.body.style.backgroundColor = 'lightgreen';</script>";
                    break;
                case "T":
                    $this->geslacht = 'Trans';
                    $this->checked = "T";
                    echo "<script>document.body.style.backgroundColor = 'yellow';</script>";
                    break;
                case "M":
                    $this->geslacht = 'Man';
                    $this->checked = "M";
                    echo "<script>document.body.style.backgroundColor = '#48B1D8';</script>";
                    break;
                case "V":
                    $this->geslacht = 'V';
                    $this->checked = "V";
                    echo "<script>document.body.style.backgroundColor = 'pink';</script>";
                    break;
                default:
                    $this->checked = "";
                    echo "<script>document.getElementById('GenderLabel').innerHTML = '*Geslacht is required';</script>";
                    break;
            }
        }
    }
    $person = new Persoon();
    
    if(isset($_POST['Submit'])){
        if(empty($_POST['NameField'])){
            echo "<script>document.getElementById('NaamField').innerHTML = '';</script>";
            echo "<script>document.getElementById('NaamRequired').innerHTML = '*Name is required';</script>";
        } else {
            if(empty($_POST['EmailField'])){
                echo "<script>document.getElementById('EmailLabel').innerHTML = '';</script>";
                echo "<script>document.getElementById('EmailRequired').innerHTML = '*Email is required';</script>";
            } else {
                $person->ChangeData($_POST['NameField'], $_POST['EmailField']);
                if(!empty($_POST['Gender'])){
                    $person->CheckGender($_POST['Gender']);
                }
                if(!empty($_POST['Beoordelen'])){
                    $person->ChangeCheckbox("Checked");
                } else {
                    $person->ChangeCheckbox("");
                }
            }
        }
    }

    echo "<h1>Hallo $person->naam</h1>";
    ?>
    <form method="post">
        <label id="NaamField">Naam</label>
        <label id="NaamRequired" style='color: red;'></label>
        <?php
        if(empty($person->naam)){
            echo '<input type="text" name="NameField" placeholder="Enter your name">';
        } else {
            echo "<input type='text' name='NameField' placeholder='Enter your name' value='$person->naam'>";
        }
        ?>
        <br><br>
        <label id="EmailLabel">Email</label>
        <label id="EmailRequired" style='color: red;'></label>
        <?php
        if(empty($person->email)){
            echo '<input type="email" name="EmailField" placeholder="Enter your email">';
        } else {
            echo "<input type='email' name='EmailField' placeholder='Enter your email' value='$person->email'>";
        }
        ?>
        <br><br>
        <label id="GenderLabel">Geslacht</label>
        <?php
        if($person->checked == "L"){
            echo 'L<input type="radio" name="Gender" value="L" checked>';
        } else {
            echo 'L<input type="radio" name="Gender" value="L">';
        }
        if($person->checked == "H"){
            echo 'H<input type="radio" name="Gender" value="H" checked>';
        } else {
            echo 'H<input type="radio" name="Gender" value="H">';
        }
        
        if($person->checked == "B"){
            echo 'B<input type="radio" name="Gender" value="B" checked>';
        } else {
            echo 'B<input type="radio" name="Gender" value="B">';
        }
        if($person->checked == "T"){
            echo 'T<input type="radio" name="Gender" value="T" checked>';
        } else {
            echo 'T<input type="radio" name="Gender" value="T">';
        }
        if($person->checked == "M"){
            echo 'M<input type="radio" name="Gender" value="M" checked>';
        } else {
            echo 'M<input type="radio" name="Gender" value="M">';
        }
        if($person->checked == "V"){
            echo 'V<input type="radio" name="Gender" value="V" checked>';
        } else {
            echo 'V<input type="radio" name="Gender" value="V">';
        }
        ?>
        <br>
        <label>Wilt u beoordelen?</label>
        <?php
        if(empty($person->oordelen)){
            echo "<input type='checkbox' id='checkbox' name='Beoordelen' value='Beoordelen'>";
        } else {
            echo "<input type='checkbox' id='checkbox' name='Beoordelen' value='Beoordelen' checked>";
        }
        ?>
        <input type="submit" name="Submit" style="margin-left: 40px;">
    </form>
    <div id="Beoordeeld">
        <h1>Beoordeling</h1>
        <!-- Niet aan toe gekomen -->
        <input type="checkbox" name="Oordeelbutton" value="Happy" id="Oordeel">
        <input type="checkbox" name="Oordeelbutton" value="MHappy" id="Oordeel">
        <input type="checkbox" name="Oordeelbutton" value="MSad" id="Oordeel">
        <input type="checkbox" name="Oordeelbutton" value="Sad" id="Oordeel">
        <br>
        <img src="images/Happy.png" width="45px" style="margin-left: 15px; margin-top: 10px;">
        <img src="images/Smile.png" width="45px">
        <img src="images/Pensive.png" width="45px">
        <img src="images/Cry.png" width="45px">
    </div>
    <script src="script.js"></script>
</body>
</html>