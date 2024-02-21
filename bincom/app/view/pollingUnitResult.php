<?php require_once "../controllers/pollingUnitResultController.php"; ?>

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
    <div class="table-responsive">
    <h5 for="" class="text-muted text-center fw-5">All Individual Polling Unit And Their Results</h5>
        <table class="table table-light table-hover table-striped-columns">
            <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">LGA Name</th>
                      <th scope="col">Ward Name</th>
                      <th scope="col">Polling Unit</th>
                      <th scope="col">Party</th>
                      <th scope="col">Result</th>
                    </tr>
            </thead>

            <tbody>
                <?php if(isset($records) && $records): ?>
                <?php foreach($records as $key => $record): ?>
                    <?php  ?>
                    <tr>
                        <td><?=$key + 1?></td>
                        <td><?=$record['lga_name']?></td>
                        <td><?=$record['ward_name']?></td>
                        <td><?=$record['polling_unit_name']?></td>
                        <td><?=$record['party_abbreviation']?></td>
                        <td><?=$record['party_score']?></td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-muted text-center mt-5 fw-5">No Voting Data For The Selected Local Government found</p>
                <?php endif; ?>
            </tbody>
        </table> 
    </div>

    <ul class="pagination justify-content-center">
        <?php   if($page > 1): ?>
            <?php $prevPage = $page - 1;?>
            <li class="page-item">
                <a class="page-link btn btn-outline-primary"  href="?page=<?= $prevPage?>">
                    Previous
                </a>
            </li>
        <?php endif;?>
    
        <?php  if ($page < $totalPages): ?>
            <?php $nextPage = $page + 1;  ?>
            <li class="page-item">
                <a class="page-link btn btn-outline-primary ms-2"  href="?page=<?= $nextPage?>">
                        Next
                </a>
            </li>
        <?php endif; ?>
    </ul>

</div>
    
</body>
</html>

<script src="assets/bootstrap.bundle.min.js"></script>

