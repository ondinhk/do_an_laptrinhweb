<?php
require_once('./libs/database.php');
$list_img = array();
$sql_info = 'SELECT * FROM hanghoa ORDER BY MSHH DESC LIMIT 6';
$resul = db_get_list($sql_info);
foreach ($resul as $id) {
    $sql = "SELECT url from hinhhanghoa WHERE MSHH = '{$id['MSHH']}'";
    $resul_url = db_get_list($sql);
    array_push($list_img, $resul_url[1]['url']);
}
?>
<main class="">
    <div class="content">
        <div class="silder">
            <div id="myCarousel" class=" carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators m-2">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner bg-dark">
                    <div class="carousel-item active " data-bs-interval="1900">
                        <div class="category px-5 py-3">
                            <div class="rounded px-5 py-4 m-md-3 text-center d-flex">
                                <div class="col-md-5 p-lg-5 mx-auto my-5 shadow bg-light p-2 rounded">
                                    <h1 class="display-3 fw-normal">Rebecca Leigh!</h1>
                                    <p class="lead fw-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts with
                                        this
                                        example based on Apple’s marketing pages.</p>
                                    <!-- <a class="btn btn-outline-secondary" href="#">Learn more</a> -->
                                </div>
                                <img src="https://static.zara.net/photos///2021/I/0/1/p/9445/853/700/2/w/809/9445853700_9_1_1.jpg?ts=1635175995131" alt="" width="62%" height="auto" class="img-fluid rounded">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2500">
                        <div class="category px-5 py-3">
                            <div class="rounded px-5 py-4 m-md-3 text-center d-flex">
                                <img src="https://static.zara.net/photos///2021/I/0/1/p/5070/455/756/2/w/809/5070455756_9_1_1.jpg?ts=1632475525247" alt="" width="62%" height="auto" class="img-fluid rounded">
                                <div class="col-md-5 p-lg-5 mx-auto my-5 shadow bg-light p-2 rounded">
                                    <h1 class="display-3 fw-normal">Rebecca Leigh!</h1>
                                    <p class="lead fw-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts with
                                        this
                                        example based on Apple’s marketing pages.</p>
                                    <!-- <a class="btn btn-outline-secondary" href="#">Learn more</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2500">
                        <div class="category px-5 py-3">
                            <div class="rounded px-5 py-4 m-md-3 text-center d-flex">
                                <div class="col-md-5 p-lg-5 mx-auto my-5 shadow bg-light p-2 rounded">
                                    <h1 class="display-3 fw-normal">OuterWear</h1>
                                    <p class="lead fw-normal">A documentation of seasonal styles in collaborration with artist jhon clang sees a variation of autumn looks captured on the streets of NEW YORK city. Featuring a selection of versatile outerwear and denim styles combined to build transitional looks </p>
                                </div>
                                <img src="https://static.zara.net/photos///2021/I/M/2/p/0000/002/809/2/w/1224/0000002809_9_2_1.jpg?ts=1634741556426" alt="" width="62%" height="auto" class="img-fluid rounded">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden text-danger">Next</span>
                </button>
                <!-- close slider -->
            </div>
        </div>
    </div>
</main>