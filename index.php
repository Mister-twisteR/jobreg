<?php
require_once('models/JobList.php');
$object = new JobList();
$listing = $object->retrieveJobs();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <title>Test Job Listing Application</title>
</head>
<body>
<div class="wrap">
    <div class="container">
        <div class="listing">
            <?php if ($listing) : ?>
                <?php foreach ($listing as $item) : ?>
                    <a class="item flex" href="<?= $item->applyUrl; ?>" target="_blank">
                        <span class="thumb_logo flex"><img src="<?= $item->logo; ?>"
                                                          alt="<?= $item->title . ', ' . $item->city; ?>"></span>

                        <span class="description flex">
                            <span class="body"><?= $object->excerpt($item->body); ?></span>
                            <span class="position"><?= $item->title; ?></span>
                        </span>

                        <span class="details flex">
                            <span class="detail">City: <span class="city"><?= strtolower($item->city); ?></span></span>
                            <span class="detail">Number of positions: <?= $item->numberOfPositions; ?></span>
                        </span>
                    </a>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="absent-block">There is no vacancies</div>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>