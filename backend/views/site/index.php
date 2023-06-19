<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TextILES Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        /* ... Paste the provided CSS code here ... */
        .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    width: 200px;
    background-color: #f8f9fa;
    padding: 20px;
    overflow-y: auto;
  }
  .giz-logo-container {
    margin-bottom: 20px;
  }
  .nav {
    flex-direction: column;
  }
  .nav-link {
    padding: 5px 0;
  }
  .content {
    margin-left: 220px;
    padding: 20px;
  }
  .filters {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
  }
  .stat-box {
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
    margin-bottom: 20px;
  }
  .stat-box h5 {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 10px;
  }
  .table-responsive {
    margin-bottom: 40px;
  }
  h4 {
    margin-bottom: 20px;
  }
  .menu-item {
    position: relative;
    cursor: pointer;
    padding: 8px 0; /* Add padding to the top and bottom of the menu items */
    margin: 4px 0;
  }
  .arrow {
    border: solid #333;
    border-width: 0 2px 2px 0;
    display: inline-block;
    padding: 3px;
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
  }
  .arrow.down {
    transform: translateY(-50%) rotate(45deg);
  }
  .arrow.up {
    transform: translateY(-50%) rotate(-135deg);
  }
  .sub-menu {
    display: none;
    padding-left: 20px;
    padding: 8px 0; /* Add padding to the top and bottom of the sub-menu items */
    margin: 4px 0;
  }
  .nav a {
    color: #000;
    text-decoration: none;
    font-size: 16px; /* Adjust this value to your desired font size */
    padding: 8px 0; /* Add padding to the top and bottom of the menu items */
    margin: 4px 0;
  }

  .nav a:hover {
    color: #1D438A; /* GIZ logo color */
  }

  .menu-item:hover .arrow {
    border-color: #1D438A; /* GIZ logo color */
  }
    </style>
</head>
<body>
    <!-- ... Paste the provided HTML code here ... -->
    <body>
  <div class="sidebar">
    <div class="giz-logo-container">
      <img src="logo.png" alt="GIZ Logo" width="120">
    </div>

    <nav class="nav flex-column">
      <div class="menu-item" onclick="toggleSubMenu('government')">
        <a href="#">Government</a>
        <i class="arrow down"></i>
      </div>
      <div class="sub-menu" id="government">
    <a href="<?=Yii::$app->urlManager->createUrl(['government/add-government'])?>">Add Government</a>
    <a href="<?=Yii::$app->urlManager->createUrl(['government/view-government'])?>">View Government</a>
      </div>

      <!-- Add more menu items here -->
      <div class="menu-item" onclick="toggleSubMenu('multiplier')">
        <a href="#">Multiplers</a>
        <i class="arrow down"></i>
      </div>
      <div class="sub-menu" id="multiplier">
    <a href="<?=Yii::$app->urlManager->createUrl(['multiplier/add-multiplier'])?>">Add Multiplier</a>
    <a href="<?=Yii::$app->urlManager->createUrl(['multiplier/view-multiplier'])?>">View Multiplier</a>
      </div>
      <div class="menu-item" onclick="toggleSubMenu('factory')">
        <a href="#">Factories</a>
        <i class="arrow down"></i>
      </div>
      <div class="sub-menu" id="factory">
        <a href="#addfactory">Add Factory</a><br>
        <a href="#viewfactory">View Factory</a>
      </div>
      <div class="menu-item" onclick="toggleSubMenu('association')">
        <a href="#">Associations</a>
        <i class="arrow down"></i>
      </div>
      <div class="sub-menu" id="association">
        <a href="#addassociation">Add Association</a><br>
        <a href="#viewassociation">View Association</a>
      </div>
      <div class="menu-item" onclick="toggleSubMenu('general-partners')">
        <a href="#">General-Partners</a>
        <i class="arrow down"></i>
      </div>
      <div class="sub-menu" id="general-partners">
        <a href="#addgeneral-partner">Add General-Partner</a><br>
        <a href="#viewgeneral-partner">View General-Partner</a>
      </div>
      <div class="menu-item" onclick="toggleSubMenu('brands')">
        <a href="#">Brands</a>
        <i class="arrow down"></i>
      </div>
      <div class="sub-menu" id="brands">
        <a href="#addbrand">Add Brands</a><br>
        <a href="#viewbrand">View Brands</a>
      </div>
      <div class="menu-item" onclick="toggleSubMenu('academia')">
        <a href="#">Academia</a>
        <i class="arrow down"></i>
      </div>
      <div class="sub-menu" id="academia">
        <a href="#addacademia">Add Academia</a><br>
        <a href="#viewacademia">View Academia</a>
      </div>
    </nav>
  </div>

<div class="content">
    <h2>TextILES Dashboard</h2>
    <p>Objective: TextILES works with various actors from government, NGOs, other donor organizations and private sector players. These contacts and trusted relationships have been instrumental for an efficient, targeted and successful project implementation...</p>
    <div class="filters">
        <select class="form-select" id="cityFilter" onchange="updateData()">
          <option selected>Select City</option>
          <option value="City1">City1</option>
          <option value="City2">City2</option>
          <option value="City3">City3</option>
          <!-- Add more city options here -->
        </select>
        <select class="form-select" id="categoryFilter" onchange="updateData()">
          <option selected>Select Category</option>
          <option value="Category1">Category1</option>
          <option value="Category2">Category2</option>
          <option value="Category3">Category3</option>
          <!-- Add more category options here -->
        </select>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="stat-box">
            <h5>Total Multipliers</h5>
            <p id="totalMultipliers">0</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="stat-box">
            <h5>Total Brands</h5>
            <p id="totalBrands">0</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="stat-box">
            <h5>Total Factories</h5>
            <p id="totalFactories">0</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="stat-box">
            <h5>DFS Partner Factories</h5>
            <p id="dfsPartnerFactories">0</p>
          </div>
        </div>
      </div>

    <div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <canvas id="stakeholdersChart" width="400" height="400"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="activitiesChart" width="400" height="400"></canvas>
        </div>
    </div>
</div>
<div class="table-responsive">
    <h4>GIZ Interventions History</h4>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Year of Intervention</th>
          <th>GIZ Intervention</th>
          <th>Focal Person / Contact Person at the time</th>
          <th>Specifics / Details / Comments</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td>2021</td>
            <td>Intervention 1</td>
            <td>John Doe</td>
            <td>Lorem ipsum dolor sit amet</td>
          </tr>
          <tr>
              <td>2021</td>
              <td>Intervention 1</td>
              <td>John Doe</td>
              <td>Lorem ipsum dolor sit amet</td>
            </tr>
            <tr>
              <td>2021</td>
              <td>Intervention 1</td>
              <td>John Doe</td>
              <td>Lorem ipsum dolor sit amet</td>
            </tr>
            <tr>
              <td>2021</td>
              <td>Intervention 1</td>
              <td>John Doe</td>
              <td>Lorem ipsum dolor sit amet</td>
            </tr>
            <tr>
              <td>2021</td>
              <td>Intervention 1</td>
              <td>John Doe</td>
              <td>Lorem ipsum dolor sit amet</td>
            </tr>
      </tbody>
    </table>
  </div>

  <div class="table-responsive">
    <h4>GIZ Intervention</h4>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Name of Intervention</th>
          <th>Short description of Intervention</th>
          <th>GIZ Module</th>
          <th>Component Manager + Technical Advisors</th>
          <th>Comments</th>
        </tr>
      </thead>
      <tbody>

            <!-- Add more data rows here -->

      </tbody>
    </table>
  </div>

</div>
<script>

    document.addEventListener('DOMContentLoaded', function() {
        var stakeholdersCtx = document.getElementById('stakeholdersChart').getContext('2d');
        var stakeholdersChart = new Chart(stakeholdersCtx, {
            type: 'pie',
            data: {
                labels: ['Government', 'Factories', 'Multipliers', 'Associations', 'General Partners', 'Brands', 'Academia'],
                datasets: [{
                    label: 'Stakeholders',
                    data: [12, 19, 8, 5, 20, 15, 10],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(255, 159, 64, 0.8)',
                        'rgba(128, 128, 128, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(128, 128, 128, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        var activitiesCtx = document.getElementById('activitiesChart').getContext('2d');
        var activitiesChart = new Chart(activitiesCtx, {
            type: 'bar',
            data: {
                labels: ['Government', 'Factories', 'Multipliers', 'Associations', 'General Partners', 'Brands', 'Academia'],
                datasets: [{
                    label: 'Activities',
                    data: [9, 15, 7, 8, 12, 14, 4],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(255, 159, 64, 0.8)',
                        'rgba(128, 128, 128, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(128, 128, 128, 1)'
                        ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    });
</script>

<script>
    function updateData() {
      const cityFilter = document.getElementById("cityFilter");
      const categoryFilter = document.getElementById("categoryFilter");
      const selectedCity = cityFilter.options[cityFilter.selectedIndex].value;
      const selectedCategory = categoryFilter.options[categoryFilter.selectedIndex].value;

      // Add your logic to update the chart data based on the selected city and category here
    }
  </script>

  <script>
    function updateStats() {
      // Replace the following example values with your actual data
      const totalMultipliers = 100;
      const totalBrands = 200;
      const totalFactories = 300;
      const dfsPartnerFactories = 50;

      document.getElementById("totalMultipliers").innerText = totalMultipliers;
      document.getElementById("totalBrands").innerText = totalBrands;
      document.getElementById("totalFactories").innerText = totalFactories;
      document.getElementById("dfsPartnerFactories").innerText = dfsPartnerFactories;
    }

    // Call the updateStats function when the page loads
    updateStats();
  </script>
  <script>
    function toggleSubMenu(id) {
      const subMenu = document.getElementById(id);
      const arrow = subMenu.previousElementSibling.querySelector('.arrow');
      subMenu.style.display = subMenu.style.display === "block" ? "none" : "block";
      arrow.classList.toggle('down');
      arrow.classList.toggle('up');
    }
  </script>






    </body>
</body>
</html>
<?php $this->endPage()?>
