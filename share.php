<div style="float:left;width:100%;text-align: center">
	<div class="this-block-container">
		<h3 style="font-size:13px;font-style:italic;font-weight:bold;">Dengarkan musik dengan teman-teman Anda! Bagikan lagu ini sekarang!</h3>
		<p class="social">
			<?php
			$query = mysqli_query($conn, "SELECT name,icon,alt_icon,social_link FROM `social` WHERE name='Facebook' OR name='Twitter' OR name='Youtube'");
            foreach ($query as $row) {
				?>
				<a target="_blank" href="<?php echo $row['social_link']; ?>" rel="nofollow" title="Share <?php echo $row['name']; ?>"><img src="<?php echo $home . '/' . $row['icon']; ?>" alt="<?php echo $row['alt_icon']; ?> icon" style="padding:5px;border-radius:10px"></a>
				<?php
			}
			?>
			
			<?php
			$query = mysqli_query($conn, "SELECT name,icon,alt_icon,social_link FROM `social` WHERE name!='Facebook' AND name!='Twitter' AND name!='Google Plus' AND name!='Youtube' ORDER BY RAND() LIMIT 7");
            foreach ($query as $row) {
				?>
				<a target="_blank" href="<?php echo $row['social_link']; ?>" rel="nofollow" title="Share <?php echo $row['name']; ?>"><img src="<?php echo $home . '/' . $row['icon']; ?>" alt="<?php echo $row['alt_icon']; ?> icon" style="padding:5px;border-radius:10px"></a>
				<?php
			}
			?>
		</p>
	</div>
</div>
