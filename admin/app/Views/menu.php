<?php 
$CustomConfig = new \Config\CustomConfig();
$Apps = $CustomConfig->apps;

$SESSION_LOGIN = isset($_SESSION[$Apps]['SESSION_LOGIN']) ? $_SESSION[$Apps]['SESSION_LOGIN']:array();
$NAME = isset($SESSION_LOGIN->NAME) ? $SESSION_LOGIN->NAME:"";
$LEVEL = isset($SESSION_LOGIN->LEVEL) ? $SESSION_LOGIN->LEVEL:"";
?>
<div class='left-sidebar'>
    <div class='scroll-sidebar' style="overflow-x: hidden;">
        <nav class='sidebar-nav'>
            <ul id='sidebarnav'>
                <div class="row hide-menu" aria-expanded='false' style="padding-top: 10px;">
                    <div class="col-md-4" align="center" style="padding-top:15px;padding-left:30px;">
                        <img src="<?php echo base_url('assets/image/login.png');?>" style="width:60px;height:60px;" class="img-circle" align="center" alt="Not Photo">
                    </div>
                    <div class="col-md-7" align="center" style="color: black;"><br>
                        <b><?php echo $NAME; ?></b>
                        <hr width="100%">
                        <h6><?php echo $LEVEL; ?></h6>
                    </div>
                </div>
                <li>
                    <a href='<?php echo base_url("dashboard")?>'>
                        <i><span class='fa fa-tachometer'></span></i>
                        <span class='hide-menu'>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class='has-arrow' href='javascript:void(0)' aria-expanded='false'>
                        <i><span class='fa fa-database'></span></i>
                        <span class='hide-menu'>Pusat Data</span>
                    </a>
                    <ul aria-expanded='false' class='collapse'>
                        <li>
                            <a href='<?php echo base_url('users')?>'>
                                <span class='hide-menu'>Data Users</span>
                            </a>
                        </li>
                        <li>
                            <a href='<?php echo base_url('kategori')?>'>
                                <span class='hide-menu'>Data Kategori</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class='has-arrow' href='javascript:void(0)' aria-expanded='false'>
                        <i><span class='fa fa-database'></span></i>
                        <span class='hide-menu'>Data Produk</span>
                    </a>
                    <ul aria-expanded='false' class='collapse'>
                        <li>
                            <a href='<?php echo base_url('prabayar')?>'>
                                <span class='hide-menu'>Data Prabayar</span>
                            </a>
                        </li>
                        <li>
                            <a href='<?php echo base_url('pascabayar')?>'>
                                <span class='hide-menu'>Data Pascabayar</span>
                            </a>
                        </li>
                        <li>
                            <a href='<?php echo base_url('emoney')?>'>
                                <span class='hide-menu'>Data E-Money</span>
                            </a>
                        </li>
                        <li>
                            <a href='<?php echo base_url('voucher')?>'>
                                <span class='hide-menu'>Data Voucher</span>
                            </a>
                        </li>
                        <li>
                            <a href='<?php echo base_url('game')?>'>
                                <span class='hide-menu'>Data Game</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class='has-arrow' href='javascript:void(0)' aria-expanded='false'>
                        <i><span class='fa fa-rss-square'></span></i>
                        <span class='hide-menu'>Portal Berita</span>
                    </a>
                    <ul aria-expanded='false' class='collapse'>
                        <li>
                            <a href='javascript:void(0)'>
                                <span class='hide-menu'>Banner</span>
                            </a>
                        </li>
                        <li>
                            <a href='javascript:void(0)'>
                                <span class='hide-menu'>News</span>
                            </a>
                        </li>
                        <li>
                            <a href='javascript:void(0)'>
                                <span class='hide-menu'>Videos</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class='has-arrow' href='javascript:void(0)' aria-expanded='false' data-path-group="Laporan">
                        <i><span class='fa fa-info-circle'></span></i>
                        <span class='hide-menu'>Bantuan</span>
                    </a>
                    <ul aria-expanded='false' class='collapse'>
                        <li>
                            <a href='javascript:void(0)'>
                                <span class='hide-menu'>Message</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class='has-arrow' href='javascript:void(0)' aria-expanded='false'>
                        <i><span class='fa fa-book'></span></i>
                        <span class='hide-menu'>Laporan</span>
                    </a>
                    <ul aria-expanded='false' class='collapse'>
                        <li>
                            <a href='javascript:void(0)'>
                                <span class='hide-menu'>Laporan Transaksi</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>

<style type="text/css">
    span.hide-menu{
        color: black;
        /*font-weight: bold;*/
        padding-top: 3px;
    }

    i span.fa{
        color: black;
    }

    span.hide-menu:hover{
        color: red;
    }

    .sidebar-nav ul li ul li a{
        padding: 7px 35px 7px 21px !important;  
    }

    ul.collapse.in li a{
        color: black !important;
    }
</style>