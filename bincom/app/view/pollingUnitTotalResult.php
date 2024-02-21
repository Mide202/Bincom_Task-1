<?php require_once "../controllers/pollingUnitTotalResultController.php"; ?>

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
    <a class="navbar-brand"><?=APP_NAME?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link text-white active" aria-current="page" href="../view/pollingUnitResult.php">
            POLLING UNITS 
        </a>
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

<div class="container-fluid p-4 shadow m-auto" style="max-width: 900px;">
    <div class="m-auto" style="max-width: 350px">
        <form action="" method="post" >
            <h5 for="" class="text-muted fw-5">Select A Local Government</h5>
            <select name="lga" id="" class="form-select">

                <?php if(isset($lgas) && $lgas): ?>
                <?php foreach($lgas as $lga): ?>

                <option value="<?=$lga['lga_id']?>"><?=$lga['lga_name']?></option>

                <?php endforeach;  ?>
                <?php else: ?>

                    <option value="">No local government found!</option>

                <?php endif; ?>

            </select>  

            <center>
                <button class="btn btn-outline-dark mt-3">Fetch</button>
            </center>
        </form>
    </div>

    <div class="table-responsive mt-4">
        <table class="table table-light table-striped-columns">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">State</th>
                      <th scope="col">LGA Name</th>
                      <th scope="col">Ward Name</th>
                      <th scope="col">Polling Unit</th>
                      <th scope="col">Party</th>
                      <th scope="col">Total Result</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if(isset($records) && $records): ?>
                    <?php foreach($records as $key => $record): ?>
                        <?php  ?>
                        <tr>
                            <td><?=$key + 1?></td>
                            <td><?= "Delta" ?></td>
                            <td><?=$record['lga_name']?></td>
                            <td><?=$record['ward_name']?></td>
                            <td><?=$record['polling_unit_name']?></td>
                            <td><?=$record['party_abbreviation']?></td>
                            <td><?=$record['total_party_score']?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted text-center mt-5 fw-5">No Voting Data For This Local Government found</p>
                    <?php endif; ?>
                </tbody>
        </table>
    </div>
</div>
    
</body>
</html>

<script src="assets/bootstrap.min.css"></script>

