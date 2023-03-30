 <?php
  include "link.php";
  ?>
 <!-- bagian footer -->
 <footer>
   <div class="footer">
     <!-- bagian satu -->
     <div class="satu">
       <img src="uploads/identitas/<?= $d->logo; ?>" width="135px" height="135px" alt=""><br>
       <p class="medsos">Connect With Us</p>
       <ul>
         <li class="fb"><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
         <li class="tw"><a href=""><i class="fa-brands fa-twitter"></i></a></li>
         <li class="ig"><a href=""><i class="fa-brands fa-instagram"></i></a></li>
         <li class="li"><a href=""><i class="fa-brands fa-linkedin"></i></a></li>
         <li class="yt"><a href=""><i class="fa-brands fa-youtube"></i></a></li>
       </ul>
       <br>
       <p>Copyright &copy; 2023 <?= $d->nama; ?>.
       </p>
       <p> All Right Reserved. Supported by FahmiCode</p>
     </div>
     <!-- bagian dua -->
     <div class="dua">
       <h4>Link Terkait</h4>
       <ul>
         <li><a href=""><i class="fa fa-caret-right"></i> Kementrian Pendidikan Indonesia</a></li>
         <li><a href=""><i class="fa fa-caret-right"></i> Dinas Pendidikan Provinsi Jawa Timur</a></li>
         <li><a href=""><i class="fa fa-caret-right"></i> Dinas Tenaga Kerja Provinsi Jawa Timur</a></li>
         <li><a href=""><i class="fa fa-caret-right"></i>
             <!-- <i class="fa fa-arrow-right" aria-hidden="true"></i> -->
             Forum Bursa Kerja (BKK Provinsi Jawa Timur)</a></li>
       </ul>
     </div>
     <!-- bagian tiga -->
     <div class="tiga">
       <h4>Layanan</h4>
       <ul>
         <li><a href=""><i class="fa fa-caret-right"></i> Dinas Kebijakan Penggunaan</a></li>
         <li><a href=""><i class="fa fa-caret-right"></i> Kebijakan Privasi</a></li>
         <li><a href=""><i class="fa fa-caret-right"></i> Tentang Kami</a></li>
         <li><a href=""><i class="fa fa-caret-right"></i> Side Map</a></li>
       </ul>
     </div>
     <!-- bagian empat -->
     <div class="empat">
       <h2><?= $d->nama; ?></h2>
       <ul>
         <li><?= $d->alamat; ?></li>
         <li>Telp : <?= $d->telepon; ?></li>
         <li>Email : <?= $d->email; ?></li>
       </ul>
     </div>
   </div>
 </footer>