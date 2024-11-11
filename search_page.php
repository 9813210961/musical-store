<?php

function TF-IDFSearch($pattern, $text) {
    $M = strlen($pattern);
    $N = strlen($text);

    $lps = array_fill(0, $M, 0);

    computeLPSArray($pattern, $lps);

    $i = 0; 
    $j = 0; 
    $matches = array(); 
    while ($i < $N) {
        if ($pattern[$j] == $text[$i]) {
            $i++;
            $j++;
        }
        if ($j == $M) {
          
            $matches[] = $i - $j;
            $j = $lps[$j - 1];
        } else if ($i < $N && $pattern[$j] != $text[$i]) {
            if ($j != 0)
                $j = $lps[$j - 1];
            else
                $i = $i + 1;
        }
    }
    return $matches;
}


function computeLPSArray($pattern, &$lps) {
    $len = 0; 

    $lps[0] = 0; 
    $i = 1;

   
    while ($i < strlen($pattern)) {
        if ($pattern[$i] == $pattern[$len]) {
            $len++;
            $lps[$i] = $len;
            $i++;
        } else {
            if ($len != 0) {
                $len = $lps[$len - 1];
            } else {
                $lps[$i] = 0;
                $i++;
            }
        }
    }
}

include 'components/connect.php';


session_start();


$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';


include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php include 'components/user_header.php'; ?>

    <section class="search-form">
        <form action="" method="post">
            <input type="text" name="search_box" placeholder="Search here..." maxlength="100" class="box" required>
            <button type="submit" class="fas fa-search" name="search_btn"></button>
        </form>
    </section>

    <section class="products" style="padding-top: 0; min-height:100vh;">

        <div class="box-container">

            <?php
            if (isset($_POST['search_box']) || isset($_POST['search_btn'])) {
                $search_box = '%' . $_POST['search_box'] . '%';
                $all_products = array(
               array(
                  'id' => 1,
                  'name' => 'Gibson',
                  'price' => 122000,
                  'image_01' => 'gibex.jpg'
              ),
              array(
                  'id' => 2,
                  'name' => 'Epiphone',
                  'price' => 788000,
                  'image_01' => 'epi1.jpg'
              ),
              array(
                  'id' => 3,
                  'name' => 'Fender',
                  'price' => 112788,
                  'image_01' => 'fend2.jpg'
              ),
              array(
                  'id' => 4,
                  'name' => 'Jackson',
                  'price' => 233700,
                  'image_01' => 'jack1.jpg'
              ),
              array(
                  'id' => 5,
                  'name' => 'Bass',
                  'price' => 132600,
                  'image_01' => 'yambas.png'
              ),
              array(
               'id' => 6,
               'name' => 'Ibanez',
               'price' => 142600,
               'image_01' => 'ibex1.jpg'
              ),
              array(
               'id' => 7,
               'name' => 'Acoustic',
               'price' => 157600,
               'image_01' => 'ibex1.jpg'
           )
                );
                foreach ($all_products as $product) {
                    $matches = KMPSearch($_POST['search_box'], $product['name']);
                    if (!empty($matches)) {
                  
                        ?>
                        <form action="" method="post" class="box">
                            <input type="hidden" name="pid" value="<?= $product['id']; ?>">
                            <input type="hidden" name="name" value="<?= $product['name']; ?>">
                            <input type="hidden" name="price" value="<?= $product['price']; ?>">
                            <input type="hidden" name="image" value="<?= $product['image_01']; ?>">
                            <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
                            <a href="quick_view.php?pid=<?= $product['id']; ?>" class="fas fa-eye"></a>
                            <img src="uploaded_img/<?= $product['image_01']; ?>" alt="">
                            <div class="name"><?= $product['name']; ?></div>
                            <div class="flex">
                                <div class="price"><span>Rs</span><?= $product['price']; ?><span>/-</span></div>
                                <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
                            </div>
                            <input type="submit" value="Add to cart" class="btn" name="add_to_cart">
                        </form>
                        <?php
                    }
                }
            }
