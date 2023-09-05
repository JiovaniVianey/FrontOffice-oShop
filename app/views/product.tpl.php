<?php

$product = new Product();
$productFound = $product->find($viewData['productId']);

$type = new Type();
$typeNames = $type->findAll();

?>

  <section class="products-grid">
    <div class="container-fluid">
      <div class="row">
        <!-- product-->
        <div class="col-lg-6 col-sm-12">
          <div class="product-image">
            <a href="detail.html" class="product-hover-overlay-link">
              <img src="<?=$baseRoute.'/'.$productFound->getPicture()?>" alt="product" class="img-fluid">
            </a>
          </div>
        </div>
        <div class="col-lg-6 col-sm-12">
          <div class="mb-3">
            <h3 class="h3 text-uppercase mb-1"><?= $productFound->getName() ?></h3>
            <div class="text-muted">by <em><?=$brandList[$productFound->getBrandId()-1]->getName()?></em></div>
            <div>
              <?php for($i=1; $i<=$productFound->getRate(); $i++) : ?>
                <i class="fa fa-star"></i>
              <?php endfor ?>
            </div>
          </div>
          <div class="my-2">
            <div class="text-muted"><span class="h4"><?= $productFound->getPrice() ?> €</span> TTC</div>
          </div>
          <div class="product-action-buttons">
            <form action="cart.html" method="post">
              <input type="hidden" name="product_id" value="1">
              <button class="btn btn-dark btn-buy"><i class="fa fa-shopping-cart"></i><span class="btn-buy-label ml-2">Ajouter au panier</span></button>
            </form>
          </div>
          <div class="mt-5">
            <p>
              <?= $productFound->getDescription() ?>
            </p>
          </div>
        </div>
        <!-- /product-->
      </div>

    </div>
  </section>