<?php include 'auth.php'; ?>
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="add-team">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Add Team</span></a>
            </li>

            
            <hr class="sidebar-divider">
			<li class="nav-item">
                <a class="nav-link" href="tables">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Contact Data</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="add-feature-project-home">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Add Feature Project Home</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="media-listing">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Gallery Listing</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="media-gallery">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Add Gallery</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="project_dashboard">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Add Projects</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="add_testimonial_view">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Add Testimonial</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="add_testimonial_list">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Testimonial Listing</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="blog">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Add Blogs</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add-award">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Add-Award</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add-certification">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Add-Certificate</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    
                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['name'];?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>