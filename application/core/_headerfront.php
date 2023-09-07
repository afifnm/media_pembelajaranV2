	  <header class="main-header">
	    <nav class="navbar navbar-static-top">
	      <div class="container">
<!-- 	        <div class="navbar-header">
	          <a href="<?php echo site_url('home');?>" class="navbar-brand"><b>Beranda</a>
	        </div> -->
	        <div class="navbar-custom-menu">
	          <ul class="nav navbar-nav">
	            <li>
	              <a href="<?php echo site_url('home');?>">
	                <i class="fa fa-login"></i> <b>Beranda</b>
	              </a>
	            </li> 
	            <li>
	              <a href="<?php echo site_url('home/profile');?>">
	                <i class="fa fa-login"></i> <b>Profil</b>
	              </a>
	            </li> 

	            <?php
		         $this->db->select('*');
		         $this->db->from('kategori');
		         $this->db->order_by('urutan', 'ASC');
		         $nav = $this->db->get()->result();
	            ?>
	            <?php foreach ($nav as $user) {?>
	            <li>
	              <a href="<?php echo site_url('home/kategori/'.$user->id_kategori.'/0');?>">
	                <i class="fa fa-login"></i> <b><?php echo $user->kategori; ?></b>
	              </a>
	            </li> 
	        	<?php }?>
	            <li>
	              <a href="<?php echo site_url('admin');?>">
	                <i class="fa fa-login"></i> <b>
	                <?php
			        if ($this->session->userdata('level') == "Admin") {
			            echo "Halaman Admin";
			        } else {
			        	echo "Login";
			        }
	                ?>  </b>
	              </a>
	            </li>       
	          </ul>
	        </div>
	        <!-- /.navbar-custom-menu -->
	      </div>
	      <!-- /.container-fluid -->
	    </nav>
	  </header>