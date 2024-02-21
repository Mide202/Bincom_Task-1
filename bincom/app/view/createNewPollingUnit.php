<?php require_once "../controllers/createNewPollingUnitController.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <title></title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?=APP_NAME?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link text-white active" aria-current="page" href="../view/pollingUnitResult.php">
            POLLING UNITS </a>
        <a class="nav-link text-white active" aria-current="page" href="../view/pollingUnitTotalResult.php">
            POLLING UNITS TOTAL RESULT
        </a>
        <a class="nav-link text-white active" aria-current="page" href="../view/createNewPollingUnit.php">
            CREATE POLLING UNITS
        </a>
      </div>
    </div>
  </div>
</nav>

<div class="container-fluid p-4 shadow m-auto" style="max-width: 900px; height: 570px;">
    <div class="justify-content-center shadow p-4 m-auto" style="max-width: 400px;">
        <h5 class="justify-content-center">Create New Polling Unit</h5>
        <form action="" method="post">
            <div class="">

                <div class="my-2">
                    <label for="" class="text-muted">Polling Units: </label>
                    <select name="polling_unit_uniqueid" id="" class="form-select">

                    <?php if(isset($polls) && $polls): ?>
                    <?php foreach($polls as $poll): ?>
                    
                    <option value="<?=$poll['uniqueid']?>"><?=$poll['polling_unit_name']?></option>
                    
                    <?php endforeach;  ?>
                    <?php else: ?>
                    
                        <option value="">No polling_units found!</option>
                    
                    <?php endif; ?>

                    </select>  
                </div>

                <div class="my-2">
                    <label for="" class="text-muted">Party: </label>
                    <select name="party_abbreviation" id="" class="form-select">

                    <?php if(isset($partys) && $partys): ?>
                    <?php foreach($partys as $party): ?>
                    
                    <option value="<?=$party['partyid']?>"><?=$party['partyname']?></option>
                    
                    <?php endforeach;  ?>
                    <?php else: ?>
                    
                        <option value="">No party found!</option>
                    
                    <?php endif; ?>

                    </select>  
                </div>

                <div class="my-2">
                    <label for="">Party Score</label>
                    <input type="text" name="party_score" class="form-control">
                </div>

                <div class="justify-content-center my-2">
                    <button class="btn btn-outline-dark">
                        Save
                    </button>
                </div>

                <div class="my-2">
                    <h1 class="text-center text-muted"><?=$success?></h1>
                </div>

            </div>
        </form>
    </div>

</div>
    
</body>
</html>

<script src="assets/bootstrap.bundle.min.js"></script>

