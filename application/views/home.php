    <style>
        #over{
            position:absolute;width:100%;height:100%;
        }
        #over img {
            margin-left:auto;margin-right:auto;display:block;
        }
        #judul{
            position:absolute;z-index:99;width:100%;
        }
        #judul h2{
            text-align:center;font-size:35px;font-family:Arial, Helvetica, sans-serif;font-weight:bold;
        }
    </style>

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div id="judul"><h2>Knowledge Management</h2></div>
            <div class="content-header row" id="over">
                <img src="<?php echo base_url();?>assets/images/bg-home.jpeg">
            </div>
            <div class="content-body">
                <section id="dashboard-analytics">
                    <div class="row">
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>