<?php
$categoryNames = $categoryModel->findAll();
$typeNames = $typeModel->findAll();
?>

<section class="hero">
  <div class="container">
    <!-- Breadcrumbs -->
    <ol class="breadcrumb justify-content-center">
      <li class="breadcrumb-item"><a href="public/">Home</a></li>
      <li class="breadcrumb-item active">Détente</li>
    </ol>
    <!-- Hero Content-->
    <div class="hero-content pb-5 text-center">
      <h1 class="hero-heading">Catégorie <?= $categoryNames[$viewData['categoryId'] - 1]->getName() ?></h1>
      <div class="row">
        <div class="col-xl-8 offset-xl-2">
          <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
            incididunt.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="products-grid">
  <div class="container-fluid">

    <header class="product-grid-header d-flex align-items-center justify-content-between">
      <div class="mr-3 mb-3">
        Affichage <strong>1-12 </strong>de <strong>158 </strong>résultats
      </div>
      <div class="mr-3 mb-3"><span class="mr-2">Voir</span><a href="#" class="product-grid-header-show active">12 </a><a href="#" class="product-grid-header-show ">24 </a><a href="#" class="product-grid-header-show ">Tout </a>
      </div>
      <div class="mb-3 d-flex align-items-center"><span class="d-inline-block mr-1">Trier par</span>
        <select class="custom-select w-auto border-0">
          <option value="orderby_0">Défaut</option>
          <option value="orderby_1">Nom</option>
          <option value="orderby_2">Note</option>
          <option value="orderby_3">Prix</option>
        </select>
      </div>
    </header>
    <div class="row">
      <?php

      // Affichage des produits selon leur catégorie
      $productList = $productModel->findCategory($viewData['categoryId']);

      foreach ($productList as $product) : ?>
        <div class="product col-xl-3 col-lg-4 col-sm-6">
          <div class="product-image">
            <a class="product-hover-overlay-link">
              <img src="<?= $baseRoute . '/' . $product->getPicture() ?>" alt="product" class="img-fluid">
            </a>
          </div>
          <div class="product-action-buttons">
            <a class="btn btn-outline-dark btn-product-left"><i class="fa fa-shopping-cart"></i></a>
            <a href=<?= $absoluteURL . '/catalogue/produit/' . $product->getId() ?> class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">Voir</span></a>
          </div>
          <div class="py-2">
            <p class="text-muted text-sm mb-1"><?= $typeNames[$product->getTypeId() - 1]->getName() ?></p>
            <h3 class="h6 text-uppercase mb-1"><a href="product.html" class="text-dark"><?= $product->getName() ?></a></h3><span class="text-muted"><?= $product->getPrice() ?> €</span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>