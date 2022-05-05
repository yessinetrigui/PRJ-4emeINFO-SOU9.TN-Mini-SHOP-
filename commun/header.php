

<div id="V-hiden" onclick="CloseNav()"></div>
<div id="V-nav">
  <h1 onclick="CloseNav()">X</h1>
  <div id="cont">
    <li>
    <?php
    $EXT = basename($_SERVER['PHP_SELF'], '.php');
  if ($EXT!="isndex"){
    echo "<a class='actv' onclick='CloseNav()' href='index.php'>";
  }else{
    echo "<a class=' ' onclick='CloseNav()' href='index.php'>";
  }?>
        ACCEUIL
      </a>
    </li>
    
    <li>
    <?php
     if ($EXT=="CONTACT"){
      echo "<a class='actv' onclick='CloseNav()' href='#cnt'>";
    }else{
      echo "<a class=' ' onclick='CloseNav()' href='#cnt'>";
    }?>
        <img
          alt=""
        />
        CONTACT
      </a>
    </li>
    <li>
    <?php
     if ($EXT=="dashboard"){
      echo "<a class='actv' onclick='CloseNav()' href='dashboard.php'>";
    }else{
      echo "<a class=' ' onclick='CloseNav()' href='dashboard.php'>";
    }?>
        STORE
      </a>
    </li>
    <?php 
    if(!empty($_SESSION['role'])){
      if($_SESSION["role"]=="Admin"){
        echo " <li>";
        if ($EXT=="ControlPanel"){
          echo "<a class='actv' onclick='CloseNav()' href='Admin/MainPanel.php'>";
        }else{
          echo "<a class=' ' onclick='CloseNav()' href='Admin/MainPanel.php'>";
        }
        echo "ControlPanel
        </a>
      </li>";
        }
    }
    
    
    ?>
  </div>
  <div id="btn">
    <select href="login.php">
          <?php
     
      if(!empty($_SESSION['mail'])){
          echo "Salut, " . $_SESSION['mail'];
      }else{
        echo "Sign Up";
      }
          ?>
    </select>
  </div>
</div>
<header >
<!---   NAV BAR   -->
<div id="logo">
  
    <img src="src/logo-m.svg" alt="">
    
</div>

<div id="HBM" onclick="OpenNav()">
  <svg width="23" height="16" viewBox="0 0 23 16" fill="none" xmlns="http://www.w3.org/2000/svg">
    <line x1="0.993408" y1="1" x2="23" y2="1" stroke="white" stroke-width="2"/>
    <line x1="0.993408" y1="8" x2="23" y2="8" stroke="white" stroke-width="2"/>
    <line x1="0.993408" y1="15" x2="23" y2="15" stroke="white" stroke-width="2"/>
    </svg>
</div>
<nav>
  <ul>
  <li>
    <?php
    $EXT = basename($_SERVER['PHP_SELF'], '.php');
  if ($EXT=="index"){
    echo "<a class='actv' onclick='CloseNav()' href='index.php'>";
  }else{
    echo "<a class=' ' onclick='CloseNav()' href='index.php'>";
  }?>
        ACCEUIL
      </a>
    </li>
    
    <li>
    <?php
     if ($EXT=="CONTACT"){
      echo "<a class='actv' onclick='CloseNav()' href='CONTACT.php'>";
    }else{
      echo "<a class=' ' onclick='CloseNav()' href='CONTACT.php'>";
    }?>
      
        CONTACT
      </a>
    </li>
    <li>
    <?php
     if ($EXT=="dashboard"){
      echo "<a class='actv' onclick='CloseNav()' href='dashboard.php'>";
    }else{
      echo "<a class=' ' onclick='CloseNav()' href='dashboard.php'>";
    }?>
        STORE
      </a>
    </li>
    <?php 
    if(!empty($_SESSION['role'])){
      if($_SESSION["role"]=="Admin"){
        echo " <li>";
        if ($EXT=="ControlPanel"){
          echo "<a class='actv' style='color:red' onclick='CloseNav()' href='Admin/MainPanel.php'>";
        }else{
          echo "<a class=' ' style='color:red' onclick='CloseNav()' href='Admin/MainPanel.php'>";
        }
        echo "ControlPanel
        </a>
      </li>";
        }
    }
    
    
    ?>
     <?php 
    if(!empty($_SESSION['role'])){
      if($_SESSION["role"]=="Livreur"){
        echo " <li>";
        if ($EXT=="MainPanel"){
          echo "<a class='actv' style='color:orange' onclick='CloseNav()' href='Livreur/MainPanel.php'>";
        }else{
          echo "<a class=' ' style='color:orange' onclick='CloseNav()' href='Livreur/MainPanel.php'>";
        }
        echo "LivreurPanel
        </a>
      </li>";
        }
    }
    
    
    ?>
  
        
  </ul>
</nav>
<script>
  function checkChange(){
    sl = document.getElementById('sl').value;
    if(sl=='Logout'){
      window.open('logout.php', target='_self')
    }else{
      window.open('profile.php', target='_self')
    }
  }
</script>
      <?php
          
          if(!empty($_SESSION['mail'])){
            echo "
            <div id='btn'>
              <select id='sl' onchange='checkChange()'>";
              echo "<option><img src='src/icos/acc.svg'> Salut, " . $_SESSION['mail']."</option>";
              echo "<option>My Commands</option>";
              echo "<option>Logout</option>";
              echo "
              </select>
              </div>";

          }else{
            echo " <div id='btn'><a class='bt' href='login.php'>Sign Up</a></div>";
          }
          ?>
  
</header>