<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center">
    <div class="sidebar-brand-icon">
        <img src="<?php echo base_url('asset/vcd.png');?>" alt="logo" style="width:80px;height:auto;padding: 10px;">
    </div>
    <div class="sidebar-brand-text mx-3">VCD Press</div>
</a>



<!-- Admin -->
<?php if(session()->get('tipe') == 'admin'):?>
<!-- Divider -->
<hr class="sidebar-divider my-0">

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVCD"
        aria-expanded="true" aria-controls="collapseVCD">
        <i class="fas fa-fw fa-wrench"></i>
        <span>VCD</span>
    </a>
    <div id="collapseVCD" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?=site_url('vcd')?>">Data VCD</a>
            <a class="collapse-item" href="<?=site_url('genre')?>">Genre</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?=site_url('customers');?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Data Customers</span>
    </a>
</li>


<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStok"
        aria-expanded="true" aria-controls="collapseStok">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Chart</span>
    </a>
    <div id="collapseStok" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?=site_url('chart/pie')?>">Pie</a>
            <a class="collapse-item" href="<?=site_url('chart/line')?>">Line</a>
        </div>
    </div>
</li>

<?php endif?>

<!-- customer -->
<?php if(session()->get('tipe') == ''):?>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
    <a class="nav-link" href="<?=site_url('customers');?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Data Pembelian VCD</span>
    </a>
</li>
<?php endif?>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->