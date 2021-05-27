<div class="filtre-Box">
    <div class="filtre-container">
        <h4>Filtrer les résultats</h4>
        <input class="filtre" type="text" placeholder="Chercher" onkeydown="search(this)"></input>
        <button class="filtre" type="button" id="ageBtn" >Age</button>
        <button class="filtre" type="button" id="nbMinBtn" >Nb Joueurs min</button>
        <button class="filtre" type="button" id="nbMaxBtn" >Nb Joueurs max</button>
    </div>
    <div class="filtre-container">

    <?php
    if(isset($_GET['Age']))
        $_SESSION['Age'] = $_GET['Age'];
    
    if(isset($_GET['NbMin']))
        $_SESSION['NbMin'] = $_GET['NbMin'];

    if(isset($_GET['NbMax']))
        $_SESSION['NbMax'] = $_GET['NbMax'];

    if(isset($_GET['remove'])){
        $toRemove = $_GET['remove'];
        unset($_SESSION[$toRemove]);
    }
    echo "<h3>Filtres appliqués:</h3>";
    //$name_server = explode(".", basename($_SERVER['PHP_SELF']))[0];
    if(isset($_SESSION['Age'])){
        //$_SESSION['Age'] = $_GET['Age'];
        echo "<button class='filtreEle' type='button' id='Age' onclick='removeFilter(this.id)'>Age: " . $_SESSION['Age'] . "</button>";
    }
    if(isset($_SESSION['NbMin'])){
        //$_SESSION['NbMin'] = $_GET['NbMin'];
        echo "<button class='filtreEle' type='button' id='NbMin' onclick='removeFilter(this.id)'>NbMin: " . $_SESSION['NbMin'] . "</button>";
    }
    if(isset($_SESSION['NbMax'])){
        //$_SESSION['NbMax'] = $_GET['NbMax'];
        echo "<button class='filtreEle' type='button' id='NbMax' onclick='removeFilter(this.id)'>NbMax: " . $_SESSION['NbMax'] . "</button>";
    }
    ?>
    </div>
</div>
<div id="ageBox" class='popup'>
    <div class="popup-content">
        <span class="close">&times;</span>
        <form action="" method='GET'>
            <fieldset>      
                <legend>Choix d'age minimum</legend>      
                <input type="checkbox" name="Age" value="4">4 Minimum<br>      
                <input type="checkbox" name="Age" value="8">8 minimum<br>      
                <input type="checkbox" name="Age" value="12">12 minimum<br>      
                <br>      
                <input type="submit" value="Filtrer" />      
            </fieldset>     
        </form>
    </div>
</div>
<div id="nbMinBox" class='popup'>
<div class="popup-content">
        <span class="close">&times;</span>
        <form action="" method='GET'>
            <fieldset>      
                <legend>Nombre minimum de joueurs</legend>      
                <input type="checkbox" name="NbMin" value="1">1<br>      
                <input type="checkbox" name="NbMin" value="2">2<br>      
                <input type="checkbox" name="NbMin" value="3">3<br>   
                <input type="checkbox" name="NbMin" value="4">4<br>      
                <input type="checkbox" name="NbMin" value="5">5<br>      
                <input type="checkbox" name="NbMin" value="6">7<br>      
                <br>      
                <input type="submit" value="Filtrer" />      
            </fieldset>     
        </form>
    </div>
</div>
<div id="nbMaxBox" class='popup'>
<div class="popup-content">
        <span class="close">&times;</span>
        <form action="" method='GET'>
            <fieldset>      
                <legend>Nombre maximum de joueurs</legend>      
                <input type="checkbox" name="NbMax" value="1">1<br>      
                <input type="checkbox" name="NbMax" value="2">2<br>      
                <input type="checkbox" name="NbMax" value="3">3<br> 
                <input type="checkbox" name="NbMax" value="4">4<br>      
                <input type="checkbox" name="NbMax" value="5">5<br>      
                <input type="checkbox" name="NbMax" value="6">6<br>      
                <br>      
                <input type="submit" value="Filtrer" />      
            </fieldset>     
        </form>
    </div>
</div>