<?php
require_once '../templates/includes/header.php';
?>
    <section>
        <h1><?php
            foreach($cars as $car){
            ?>
            <div class="card carde" style="width: 18rem">
                <img src="/car-location/public/img/<?=$car['image'];?>" class="card-img-top image bg-secondary" alt="">
                <div class="card-body">
                    <h1 class=""><?= $car['name'] ?></h1>
                    <p class="card-text"><?= $car['description']?></p>
                    <a href="/car-location/reservation/<?=$car['id'];?>" class="btn btn-primary mx-auto">Reserver</a>
            </div>

        </div>    
    <?php
    }
    ?>
</h1>

</div>
</section>

<?php
require_once '../templates/includes/footer.php';
?>
