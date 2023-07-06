<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
    <a class="nav-link <?php echo (uri_string()=='')?"":"collapsed"?>" href=".">
        <i class="bi bi-grid"></i>
        <span>Home</span>
    </a>
    </li> 

    <li class="nav-item">
    <a class="nav-link <?php echo (uri_string()=='keranjang')?"":"collapsed"?>" href="<?php echo base_url()?>keranjang">
        <i class="bi bi-cart-check"></i>
        <span>Keranjang</span>
    </a>
    </li>
    <?php
        if (session()->get('role') == 'admin') {
    ?>
    <li class="nav-item">
    <a class="nav-link <?php echo (uri_string()=='produk')?"":"collapsed"?>" href="<?php echo base_url()?>produk">
        <i class="bi bi-receipt"></i>
        <span>Produk</span>
    </a>
    </li>       
    <li class="nav-item">
    <a class="nav-link <?php echo (uri_string()=='account')?"":"collapsed"?>" href="<?php echo base_url()?>account">
        <i class="bi bi-people"></i>
        <span>Akun</span>
    </a>
    </li>       
    <li class="nav-item">
    <a class="nav-link <?php echo (uri_string()=='transaksi')?"":"collapsed"?>" href="<?php echo base_url()?>transaksi">
        <i class="bi bi-people"></i>
        <span>Transaksi</span>
    </a>
    </li>       
    <?php
        }
    ?>
</ul>

</aside><!-- End Sidebar-->