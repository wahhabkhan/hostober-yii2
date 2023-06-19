<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var array $models */

$this->title = 'Association Table View';
//$this->params['breadcrumbs'][] = $this->title;
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
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
    }
    .table-actions {

      display: flex;
      justify-content: space-around;
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
        <a href="#">Factories</a>
        <i class="arrow down"></i>
      </div>
      <div class="sub-menu" id="factory">
  <a href="<?=Yii::$app->urlManager->createUrl(['factory/add-factory'])?>">Add Factory</a>
  <br>
  <a href="<?=Yii::$app->urlManager->createUrl(['factory/view-factory'])?>">View Factory</a>
</div>
      <div class="menu-item" onclick="toggleSubMenu('association')">
        <a href="#">Associations</a>
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
        <a href="#">Brands</a>
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


<div class="association-view ms-5">
    <h4 style="margin-left:95px"><?=Html::encode($this->title)?></h4>

    <table style="margin-left:95px" class="table table-bordered ">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Objective</th>
            <th>Main Services</th>
            <th>Membership</th>
            <th>GIZ Interventions</th>
            <th>Focal Person Contact Details</th>
            <th>Physical Address</th>
            <th>Action</th>
        </tr>
        <?php foreach ($models as $model): ?>
            <tr>
                <td><?=$model->id?></td>
                <td><?=$model->name?></td>
                <td><?=$model->objective?></td>
                <td><?=$model->main_services?></td>
                <td><?=$model->membership?></td>
                <td><?=$model->giz_interventions_history?></td>
                <td><?=$model->focal_person_contact_details?></td>
                <td><?=$model->physical_address?></td>
                <td>
                    <div class="btn-group" role="group">
                        <?=Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn rounded btn-primary'])?>
                        <?=Html::a('Delete', ['delete', 'id' => $model->id], [
    'class' => 'btn rounded btn-danger ms-1',
    'data' => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method' => 'post',
    ],
])?>
                    </div>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
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

