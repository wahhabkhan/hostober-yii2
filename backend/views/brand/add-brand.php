<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

// Rest of your code

?>


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
   * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
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
  h2 {
      font-size: 24px;
      margin-bottom: 20px;
    }
    label {
      display: block;
      font-size: 16px;
      margin-bottom: 5px;
    }
    input, textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 3px;
      font-size: 16px;
      outline: none;
    }
    button {
      background-color: #1D438A;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 3px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 10px;
      width: 100%;
    }
    button:hover {
      background-color: #0f2a6e;
    }

    </style>
</head>
<body>
  <div class="sidebar">
    <div class="giz-logo-container">
      <img src="logo.png" alt="GIZ Logo" width="120">
    </div>

    <nav class="nav flex-column">
    <div class="menu-item" onclick="toggleSubMenu('government')">
  <a href="">Government</a>
  <i class="arrow down"></i>
</div>
<div class="sub-menu" id="government">
  <a href="<?=Yii::$app->urlManager->createUrl(['government/add-government'])?>">Add Government</a>
  <br>
  <a href="<?=Yii::$app->urlManager->createUrl(['government/view-government'])?>">View Government</a>
</div>
<!-- Add more menu items here -->
<div class="menu-item" onclick="toggleSubMenu('multiplier')">
  <a href="">Multiplers</a>
  <i class="arrow down"></i>
</div>
<div class="sub-menu" id="multiplier">
  <a href="<?=Yii::$app->urlManager->createUrl(['multiplier/add-multiplier'])?>">Add Multiplier</a>
  <br>
  <a href="<?=Yii::$app->urlManager->createUrl(['multiplier/view-multiplier'])?>">View Multiplier</a>
</div>

<div class="menu-item" onclick="toggleSubMenu('factory')">
        <a href="">Factories</a>
        <i class="arrow down"></i>
</div>
<div class="sub-menu" id="factory">
  <a href="<?=Yii::$app->urlManager->createUrl(['factory/add-factory'])?>">Add Factory</a>
  <br>
  <a href="<?=Yii::$app->urlManager->createUrl(['factory/view-factory'])?>">View Factory</a>
</div>
      <div class="menu-item" onclick="toggleSubMenu('association')">
        <a href="">Associations</a>
        <i class="arrow down"></i>
      </div>
      <div class="sub-menu" id="association">
  <a href="<?=Yii::$app->urlManager->createUrl(['association/add-association'])?>">Add Association</a>
  <br>
  <a href="<?=Yii::$app->urlManager->createUrl(['association/view-association'])?>">View Association</a>
</div>
<div class="menu-item" onclick="toggleSubMenu('partner')">
        <a href="">General-Partners</a>
        <i class="arrow down"></i>
      </div>
      <div class="sub-menu" id="partner">
  <a href="<?=Yii::$app->urlManager->createUrl(['partner/add-partner'])?>">Add General-Partner</a>
  <br>
  <a href="<?=Yii::$app->urlManager->createUrl(['partner/view-partner'])?>">View General-Partner</a>
</div>
      <div class="menu-item" onclick="toggleSubMenu('brand')">
        <a href="">Brands</a>
        <i class="arrow down"></i>
      </div>
      <div class="sub-menu" id="brand">
  <a href="<?=Yii::$app->urlManager->createUrl(['brand/add-brand'])?>">Add Brand</a>
  <br>
  <a href="<?=Yii::$app->urlManager->createUrl(['brand/view-brand'])?>">View Brand</a>
</div>
<div class="menu-item" onclick="toggleSubMenu('academia')">
  <a href="">Academia</a>
  <i class="arrow down"></i>
</div>
<div class="sub-menu" id="academia">
  <a href="<?=Yii::$app->urlManager->createUrl(['academia/add-academia'])?>">Add Academia</a>
  <br>
  <a href="<?=Yii::$app->urlManager->createUrl(['academia/view-academia'])?>">View Academia</a>
</div>
    </nav>
  </div>

<div class="content">
  <div class="form-container">
  <div class="brand-form">

<?php $form = ActiveForm::begin();?>

<?=$form->field($model, 'brand_name')->textInput(['maxlength' => true])?>

<?=$form->field($model, 'main_products')->textInput(['maxlength' => true])?>

<?=$form->field($model, 'purchasing_capacity')->textInput(['maxlength' => true])?>

<?=$form->field($model, 'main_purchasing_markets')->textInput(['maxlength' => true])?>

<?=$form->field($model, 'main_sales_markets')->textInput(['maxlength' => true])?>

<?=$form->field($model, 'giz_interventions_history_id')->textarea(['rows' => 6])?>

<?=$form->field($model, 'focal_person_contact_id')->textarea(['rows' => 6])?>

<?=$form->field($model, 'physical_address_id')->textarea(['rows' => 6])?>

<div class="form-group">
    <?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>
</div>

<?php ActiveForm::end();?>

</div>
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
</html>



