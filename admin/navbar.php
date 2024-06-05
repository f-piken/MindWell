<input type="checkbox" id="btn">
  <label for="btn" id="menu-btn">
      <div id="garis"></div>
  </label>
  <div class="sidebar">
      <div class="jdl">
          <img class="logo1" src="assets/2.png" alt="">
          <h1 class="judul">MindWell</h1>
      </div>
      <ul>
        <li class="aktif">
            <img class="logo" src="assets/3.png" alt="">
            <a href="dashboard.php">Dashboard</a>
        </li>
        <li>
            <img class="logo" src="assets/4.png" alt="">
            <a href="dokter.php">Data Dokter</a>
        </li>
        <li>
            <img class="logo" src="assets/6.png" alt="">
            <a href="janji.php">Data Janji</a></li>
        <li>
            <form action="../auth.php" method="post">
                <img class="logo" src="assets/5.png" alt="">
                <button name="logout">Log Out</button>
            </form>
        </li>
      </ul>
    </div>