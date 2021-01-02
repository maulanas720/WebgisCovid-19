<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-map-marker"></i> <span>SIG COVID-19</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=templates('production/images/img.jpg')?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=$this->session->level?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?=site_url('beranda')?>"><i  class="fa fa-home"></i> Beranda </a>
                  </li>
                  <?php if($this->session->level=='Admin'){?>
                  <li><a><i class="fa fa-map"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=site_url('kecamatan')?>">Kabupaten/Kota</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-map-marker"></i> Hotspot<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <!--<li><a href="<?=site_url('kasus')?>"> Kasus</a></li> -->
                    <li><a href="<?=site_url('tambahkasus')?>"> Kasus</a></li> 
                    <li><a href="<?=site_url('rumahsakit')?>"> Rumah Sakit</a></li>  
                  </ul>
                  </li>
                  <?php } ?>
                  <li><a><i class="fa fa-hospital-o"></i> LeafletJs <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=site_url('leafletstandar')?>"> Standar</a></li>
                      <li><a href="<?=site_url('leafletpoint')?>"> Point</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>