<?php

$category = new Category();
$categoryList = $category->findAll();

?>

<section>
    <div class="container-fluid">
    <div class="row mx-0">
      <?php for($i = 0; $i <=1; $i++) : ?>
          <div class="col-md-6">
            <div class="card border-0 text-white text-center"><img src=<?= $categoryList[$i]->getPicture() ?>
                alt="Card image" class="card-img">
              <div class="card-img-overlay d-flex align-items-center">
                <div class="w-100 py-3">
                  <h2 class="display-3 font-weight-bold mb-4"><?= $categoryList[$i]->getName() ?></h2><a href="products_list.html" class="btn btn-light">Découvrir</a>
                </div>
              </div>
            </div>
          </div>
      <?php endfor; ?>
    </div>
    <div class="row mx-0">
      <?php for($i = 2; $i <=4; $i++) : ?> 
        <div class="col-lg-4">
          <div class="card border-0 text-center text-white"><img src=<?= $categoryList[$i]->getPicture() ?>
              alt="Card image" class="card-img">
            <div class="card-img-overlay d-flex align-items-center">
              <div class="w-100">
                <h2 class="display-4 mb-4"><?= $categoryList[$i]->getName() ?></h2><a href="products_list.html" class="btn btn-link text-white"><?= $categoryList[$i]->getSubtitle() ?>
                  <i class="fa-arrow-right fa ml-2"></i></a>
              </div>
            </div>
          </div>
        </div>
      <?php endfor; ?>
    </div>
    </div>
  </section>