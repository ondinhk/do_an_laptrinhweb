<?php
$sql = 'SELECT * FROM LoaiHangHoa';
$resul = db_get_list($sql);
?>
<footer class="py-3 mt-4 bg-dark">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li><a href="./index.php" class="nav-link px-3 rounded  btn-outline-secondary link-light upcase">Trang chủ</a></li>
        <?php
        foreach ($resul as $row) {
            echo '<li><a class="nav-link px-3 link-light rounded btn-outline-secondary upcase" href="./category_page.php?id=' . $row['MaLoaiHang'] . '">' . $row['TenLoaiHang'] . '</a></li>';
        }
        ?>
        <li><a href="#" class="nav-link px-3 link-light rounded btn-outline-secondary upcase">About !</a></li>
    </ul>
    <p class="text-center text-muted">&copy; 2021 Khangb1812346</p>
</footer>
</body>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        offset: 200,
        duration: 1000
    });
</script>
<script src="./assests/js/login.js"></script>
<script src="./assests/js/cart.js"></script>

</html>