<?php
require_once('./libs/database.php');
$limit = 20;
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$index = ($page - 1) * $limit;
$id = '';
$i = 0;
$list_img = array();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_info = 'SELECT * FROM hanghoa WHERE MSHH=' . $id;
    $sql_img = 'SELECT url FROM hinhhanghoa WHERE MSHH=' . $id;
    $resul_img = db_get_list($sql_img);
    $result_info = db_get_row($sql_info);
    if ($result_info != 1) {
        $name_product = $result_info['TenHH'];
        $cost = $result_info['Gia'];
        $soluong = $result_info['SoLuongHang'];
    }
    foreach ($resul_img as $row) {
        $list_img[$i] = $row['url'];
        $i++;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assests/logo/favicon.ico" type="image/ico">
    <title><?= $name_product ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assests/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
</head>

<body>
    <?php
    include_once('./widgets/header.php');
    ?>
    <div class="container shadow">
        <div class="rounded p-1 p-md-1 m-md-3 text-center  d-flex">
            <div class="container">
                <div class="bg-none rounded m-5 mb-0" id="img">
                    <img id="img_product" src=<?= $list_img[0] ?> alt="1" style=" object-fit: contain;width:80%; height: 500px;">
                </div>
                <div class=" d-flex justify-content-center  p-2" id="list_img">
                    <?php
                    if (count($list_img) >= 1) {
                        for ($i = 0; $i < count($list_img); $i++) {
                            echo '<img id="img_1" src="' . $list_img[$i] . '" style=" object-fit: contain" class="rounded img-fluid img-thumbnail p-0 mx-1 " width="30%" height="auto">';
                        }
                    }
                    ?>
                    <!-- <img id="img_4" src="../assests/img/product/iphone/iphone-11-trang-600x600-16.png"
                class="img-fluid img-thumbnail p-2 mx-2" alt="12"> -->
                </div>
            </div>
            <div class="col-md-5 d-flex flex-column justify-content-around align-items-center p-5 mx-5 my-5 shadow ">
                <h4 class="display-4 fw-normal text-start"><?= $name_product ?></h4>
                <h4 class="display-4 fw-normal text-start text-danger"><?= number_format($cost, 0, '.', ',') ?> VNĐ</h4>
                <p class="text-start">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem commodi quod
                    necessitatibus. Recusandae necessitatibus consequatur voluptatum ex? Nam veniam, quo tempore
                    nihil
                    animi saepe repellat eaque, illum possimus commodi fugiat!</p>
                <div class="">
                    <p>Còn <?= $soluong ?> sản phẩm</p>
                    <input type="text" value="1" id="soluong" hidden>
                    <input type="text" value="<?= $soluong ?>" id="soluongton_string" hidden>
                    <input type="text" value="<?= $name_product ?>" id="ten" hidden>
                    <input type="text" value="<?= $list_img[0] ?>" id="url" hidden>
                    <input type="text" value="<?= $cost ?>" id="gia" hidden>
                    <div class="container input-group-prepend d-flex mb-3" hidden>
                        <?php
                        echo '<button class="btn btn-success " id=' . $id . ' onclick="getInfo_sing(this.id)">
                                    <i class="bi bi-basket"></i>
                                    <span>Thêm vào giỏ</span>
                                    </button>';
                        ?>
                    </div>
                    <p class="text-danger" id="messenger"></p>
                </div>
            </div>
        </div>
        <div class="container">
            <h2 class="border-bottom">Thông tin sản phẩm</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eveniet soluta nostrum vero quaerat ea
                dolores voluptate, deleniti natus repellat, laudantium unde reprehenderit, quos dignissimos molestiae
                minima eligendi aspernatur culpa! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam,
                recusandae libero unde non possimus est rem ad in expedita! Culpa, mollitia minima! Adipisci quam
                similique ab consectetur dicta. Totam, iure?
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut eum cupiditate aperiam obcaecati debitis
                dicta ad tempora natus sint ab exercitationem, est, reprehenderit dolores praesentium. Ipsum cumque
                vitae distinctio similique!
            </p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eveniet soluta nostrum vero quaerat ea
                dolores voluptate, deleniti natus repellat, laudantium unde reprehenderit, quos dignissimos molestiae
                minima eligendi aspernatur culpa! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam,
                recusandae libero unde non possimus est rem ad in expedita! Culpa, mollitia minima! Adipisci quam
                similique ab consectetur dicta. Totam, iure?
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut eum cupiditate aperiam obcaecati debitis
                dicta ad tempora natus sint ab exercitationem, est, reprehenderit dolores praesentium. Ipsum cumque
                vitae distinctio similique!
            </p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eveniet soluta nostrum vero quaerat ea
                dolores voluptate, deleniti natus repellat, laudantium unde reprehenderit, quos dignissimos molestiae
                minima eligendi aspernatur culpa! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam,
                recusandae libero unde non possimus est rem ad in expedita! Culpa, mollitia minima! Adipisci quam
                similique ab consectetur dicta. Totam, iure?
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut eum cupiditate aperiam obcaecati debitis
                dicta ad tempora natus sint ab exercitationem, est, reprehenderit dolores praesentium. Ipsum cumque
                vitae distinctio similique!
            </p>
        </div>
        <?php
        include_once('./widgets/product/more_product.php');
        ?>
    </div>
    <script>
        // Poduct img select
        var img = document.getElementById("img_product");
        var list_img = document.querySelectorAll('img');
        list_img.forEach(element => {
            element.addEventListener("click", function() {
                console.log(this.src);
                img.src = this.src;
            })
        });

        function getInfo_sing(id) {
            let url = document.getElementById("url").value;
            let ten = document.getElementById("ten").value;
            let gia = document.getElementById("gia").value;
            let soluong_string = document.getElementById("soluong").value;
            let soluongton_string = document.getElementById("soluongton_string").value;
            let soluongton_int = Number.parseInt(soluongton_string);
            let soluong_int = Number.parseInt(soluong_string);
            addProduct(id, ten, url, gia, soluong_int, soluongton_int);
            // console.log(id, ten, url, gia, soluong_int, soluongton_int);
        }
    </script>
    <?php
    include_once('./widgets/footer.php');
    ?>
</body>