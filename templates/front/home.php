<?php
require_once '../templates/includes/header.php';
?>
    <section>
        <h1 class="text-primary m-2">NOS VOITURES</h1>
        
        <h1><?php
            foreach($cars as $car){
            ?>
         <div class="card m-2" style="width: 18rem">
                <img src="/car-location/public/img/<?=$car['image'];?>" class="card-img-top " alt="">
            <div class="card-body">
                    <h1 class="text-primary"><?= $car['name'] ?></h1>
                    <p class="fw-light fs-6"><?= $car['description']?></p>
                    <p class="fw-light text-secondary"><?= $car['price']?>€</p>
                    <a href="/car-location/reservation/<?=$car['id'];?>" class="btn btn-outline-primary">Reserver</a>
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
