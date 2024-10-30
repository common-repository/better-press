<?php
	
echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
	
		// Start of the Display of Project Details
		if($instance['project_details']){
			
			?> <div class="projectDetailBox"> <?php
			if($instance['show_title']){
				if($instance['title_link']){
					
					?> <h3 class="projectTitle"> 
							<a href="<?php echo $bpObject->getProjectLink(); ?>" >
								<?php echo $bpObject->getProjectTitle(); ?>
							</a>
					</h3> <?php
				}
				else{ ?>
					<h3 class="projectTitle">
						<?php echo $bpObject->getProjectTitle(); ?>
					</h3> <?php
				}
			} // if: show title
			
			if($instance['show_description']){
				if($instance['description_lenght']){?>
								<p> 
								<?php 
								$cut_description = $bpObject->getProjectDescription($instance['description_lenght'],1);
								$full_description = $bpObject->getProjectDescription() ;
								echo $cut_description;
								if($cut_description != $full_description){ ?>
									<a class="am_bp_more_description" href="<?php echo $bpObject->getProjectLink(); ?>">more</a>
									<div class="hidden_description"> <?php
										echo $full_description ?>
										<a class="am_bp_less_description" href=#>less</a>
									</div><?php
									} ?>
								</p><?php
								}
				else{
				 ?>
				<p> 
					<?php 
					echo $bpObject->getProjectDescription() ?>
				</p> <?php
				}
			} // if: show description
			
			if($instance['show_progress']){
				?> <div class="projectProgress"> <?php
				if($instance['progress_title']){ ?> 
					<h4> <?php echo $instance['progress_title'] ?></h4>
					<?php
				}
				else{
					?> <h4> <?php
					_e('Progress Title', 'BetterPress');
					?> </h4> <?php
				} 
				if($instance['progress_style'] == 'bar'){ ?>
					<p  class="progress_count"><span><?php echo $bpObject->getProjectProgress(); ?></span> %</p> 
					<div class="progress_bar"></div>
					
				<?php
				}
				else{ ?>
				
				<p class="progress_count" >
				<?php echo $bpObject->getProjectProgress(); 
						if($instance['progress_style']=='percent'){
							echo "%";
						}?>
				</p></div> 	<?php
				} ?>
				</div> <?php
			} // if: show progress
			
			if($instance['show_complete_amount']){
				echo "<div class='projectCompleteAmount'>";
				if($instance['complete_amount_title']){
					?> <h5> <?php echo $instance['complete_amount_title']; ?> </h5> <?php
				}
				else{
					?> <h5> <?php	_e('Complete Amount', 'BetterPress'); ?> </h5> <?php
				}
				echo "<p>".$bpObject->getProjectAmount(2,1)." €</p>";
				echo "</div>";}
			if($instance['show_open_amount']){
				echo "<div class='projectOpenAmount'>";
				if($instance['open_amount_title']){
					?> <h5> <?php echo $instance['open_amount_title']; ?> </h5> <?php
				}
				else{
					?> <h5> <?php	_e('Open Amount', 'BetterPress'); ?> </h5> <?php
				}
				echo "<p>".$bpObject->getProjectAmount(0,1)." €</p>";
				echo "</div>";
			}
			if($instance['show_donated_amount']){
				echo "<div class='projectDonatedAmount'>";
				if($instance['donated_amount_title']){
					?> <h5> <?php echo $instance['donated_amount_title']; ?> </h5> <?php
				}
				else{
					?> <h5> <?php	_e('Donated Amount', 'BetterPress');?> </h5> <?php
				}
				echo "<p>".$bpObject->getProjectAmount(1, 1)." €</p>";
				echo "</div>";
			}
			
			if($instance['project_link']){
				?>
				<div class="projectLink">
				<a href="<?php echo $bpObject->getProjectLink();?>">
					<?php if($instance['project_link_title']){echo $instance['project_link_title'];}
						else{_e('To The Project', 'BetterPress');} ?>
				</a>
				</div> <?php
			} // if: show project link
			
			if($instance['donate_button']){
				?>
				<div class="donateLink">
				<a href="<?php echo $bpObject->getProjectLink('donate');?>">
					<?php if($instance['donate_button_label']){echo $instance['donate_button_label'];}
						else{_e('Donate', 'BetterPress');} ?>
				</a>
				</div> <?php
			} // if: show project donate link
			?> </div> <?php
		} // if: show project details
		
		if($instance['show_needs']){
				
			if($instance['needs_title']){
				?><h3 class="needsTitle">
					<?php echo $instance['needs_title'] ?>
				</h3><?php
			} // if: needs title
			
			// Start of the Needs List
			?> <ul> <?php
			do {
				if(!$instance['hide_completed_needs'] || !$bpObject->iscompletedNeed()){
				 	?><li> <?php
				 			if($instance['need_title_link']){
				 				?><h4><a href="<?php echo $bpObject->getNeedLink();?>">
				 					<?php echo $bpObject->getNeedTitle(); ?></a>
				 				</h4> <?php
				 			}
				 			else{ 
				 				?><h4>
				 				<?php echo $bpObject->getNeedTitle(); ?>
				 			</h4>
				 			<?php
							}
							if($instance['show_need_description']){ 
								if($instance['need_description_lenght']){?>
								<p> 
								<?php 
								$cut_description = $bpObject->getNeedDescription($instance['need_description_lenght'],1);
								$full_description = $bpObject->getNeedDescription() ;
								echo $cut_description;
								if($cut_description != $full_description){ ?>
									<a class="am_bp_more_description" href="<?php echo $bpObject->getProjectLink(); ?>">more</a>
									<div class="hidden_description"> <?php
										echo $full_description ?>
										<a class="am_bp_less_description" href=#>less</a>
									</div><?php
									} ?>
								</p><?php
								}
								else{ ?>
									<p> 
								<?php 
								echo $bpObject->getNeedDescription() ?> 
								</p>
								<?php
								}
							} // if: show need description
							if($instance['show_need_progress']){
								if($instance['need_progress_title']){ ?> 
									<h5>
										 <?php echo $instance['need_progress_title']; ?>
									</h5>
									<?php
								}
								else{ ?>
									<h5>Progress</h5> <?php
								} if($instance['need_progress_style'] == 'bar'){ ?>
					<p class="progress_count" >
						<span><?php echo $bpObject->getNeedProgress(); ?></span> %
				</p> 
					<div class="progress_bar"></div>
					
				<?php
				}
				else{ ?>
				
				<p class="progress_count" >
				<?php echo $bpObject->getNeedProgress(); 
						if($instance['need_progress_style']=='percent'){
							echo "%";
						}?>
				</p>	<?php
				}
							} // if: show progress 
							
							if($instance['need_show_complete_amount']){
								if($instance['need_complete_amount_title']){
									echo "<h5>".$instance['need_complete_amount_title']."</h5>";
								}
								else{ ?>
									<h5><?php
									_e('Complete Amount Needed', 'BetterPress');?>
									</h5> <?php
								}
								echo "<div>".$bpObject->getNeedAmount(2, 1)." €</div>";
							} // if: need show complete amount
							
							if($instance['need_show_open_amount']){
								if($instance['need_open_amount_title']){
									echo "<h5>".$instance['need_open_amount_title']."</h5>";
								}
								else{ ?>
									<h5><?php
									_e('Open Amount Needed', 'BetterPress'); ?>
									</h5> <?php
								}
								echo "<div>".$bpObject->getNeedAmount(0,1)." €</div>";
							} // if: need show open amount
							
							if($instance['need_show_donated_amount']){
								if($instance['need_donated_amount_title']){
									echo "<h5>".$instance['need_donated_amount_title']."</h5>";
								}
								else{ ?>
									<h5><?php
									_e('Allready Donated Amount', 'BetterPress'); ?>
									</h5> <?php
								}
								echo "<div>".$bpObject->getNeedAmount(1, 1)." €</div>";
							}	// if: show need donated button
							
							if($instance['need_donate_button']){
								?>
								<div class="need_donateLink">
								<a href="<?php echo $bpObject->getNeedLink();?>">
									<?php if($instance['need_button_label']){echo $instance['need_button_label'];}
									else{_e('Donate for That', 'BetterPress');} ?>
								</a>
								</div> <?php
								} // if: need donate button	
							?>
							</li> <?php
							
							$needcount++;
							if($needcount>=$instance['needcount'] && $instance['limit_needs']){
								break;
							}
						}
				} while ($bpObject->nextNeed());
			}
			echo $after_widget; ?>