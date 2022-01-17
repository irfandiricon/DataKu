<?php 
$SUB = isset($kategori->SUB) ? $kategori->SUB: array();
$NAME_KATEGORI = isset($kategori->NAME) ? $kategori->NAME: array();
$Url = isset($Url) ? $Url:"";
$UrlActive = "";
?>
<ul class="nav justify-content-center nav-menu">
    <li class="nav-item btn-menu" style="position: absolute; left: 0;" onclick="window.location.href='<?php echo base_url() ?>'">
        <a class="nav-link" data-toggle="tab" href="javascript:void(0)" role="tab" aria-selected="true">
            <i class="fa fa-arrow-left"></i>
        </a>
    </li>
    <?php 
    foreach($SUB as $row)
    {
        $NAME = isset($row->NAME) ? $row->NAME:"";
        $URL = isset($row->URL) ? $row->URL:"";
        if($URL == $Url){
            $actived = "active";
            $UrlActive = $NAME;
        }else{
            $actived = "";
        }
        $Redirect = base_url().'/'.$URL;
    ?>
        <li class="nav-item <?php echo $actived ?> btn-menu" onclick="window.location.href='<?php echo $Redirect ?>'">
            <a class="nav-link" id="<?php echo $NAME ?>-tab" data-toggle="tab" href="<?php echo $URL ?>" role="tab" aria-selected="true">
                <?php echo $NAME ?>
            </a>
        </li>
    <?php
    }
    ?>
</ul>

<div class="dropdown show dropdown-tab-menu">
    <a class="btn btn-info btn-block dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php echo $NAME_KATEGORI." - ".$UrlActive ?>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="right: 0;">
        <?php 
        foreach($SUB as $row)
        {
            $NAME = isset($row->NAME) ? $row->NAME:"";
            $URL = isset($row->URL) ? $row->URL:"";
            $LABEL = isset($row->LABEL) ? $row->LABEL:"";
            $Redirect = base_url().'/'.$URL;
        ?>
            <a class="dropdown-item" href="<?php echo $Redirect ?>"><?php echo $NAME ?></a>
        <?php
        }
        ?>
    </div>
</div>

<style type="text/css">
     ul.nav-menu li.nav-item a.nav-link{
        color: black;
    }

    ul.nav-menu li.nav-item.active{
        border-bottom: 3px solid #17a2b8;
    }

    @media only screen and (max-width: 992px) {
        ul.nav.nav-menu{
            display: none;
        }

        div.dropdown-tab-menu{
            display:block;
        }
    }
    @media only screen and (min-width: 992px) {
        ul.nav.nav-menu{
            display: flex;
        }

        div.dropdown-tab-menu{
            display:none;
        }
    }
</style>