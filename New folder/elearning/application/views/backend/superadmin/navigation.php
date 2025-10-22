<?php
$status_wise_courses = $this->crud_model->get_status_wise_courses();
?>
<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu left-side-menu-detached">
	<div class="leftbar-user">
		<a href="javascript: void(0);">
			<img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="user-image" height="42" class="rounded-circle shadow-sm">
			<?php
			$admin_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
			?>
			<span class="leftbar-user-name"><?php echo $admin_details['first_name'].' '.$admin_details['last_name']; ?></span>
		</a>
	</div>

	<!--- Sidemenu -->
	<ul class="metismenu side-nav side-nav-light">

		<li class="side-nav-title side-nav-item"><?php echo get_phrase('navigation'); ?></li>

		<li class="side-nav-item <?php if ($page_name == 'dashboard')echo 'active';?>">
			<a href="<?php echo site_url('superadmin/dashboard'); ?>" class="side-nav-link">
				<i class="dripicons-view-apps"></i>
				<span><?php echo get_phrase('dashboard'); ?></span>
			</a>
		</li>
	<!--only for supernadmin list of schools activate/pend -->
		<li class="side-nav-item <?php if ($page_name == 'schools')echo 'active';?>">
			<a href="<?php echo site_url('superadmin/schools'); ?>" class="side-nav-link">
				<i class="dripicons-view-apps"></i>
				<span><?php echo get_phrase('schools'); ?></span>
			</a>
		</li>

		<li class="side-nav-item <?php if ($page_name == 'administrators' || $page_name == 'administrator_add' || $page_name == 'administrator_edit' ): ?> active <?php endif; ?>">
			<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'administrators' || $page_name == 'administrator_add' || $page_name == 'administrator_edit' ): ?> active <?php endif; ?>">
				<i class="dripicons-network-1"></i>
				<span> <?php echo get_phrase('administrators'); ?> </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class = "<?php if($page_name == 'administrators' || $page_name == 'administrator_edit') echo 'active'; ?>">
					<a href="<?php echo site_url('superadmin/administrators'); ?>"><?php echo get_phrase('administrators'); ?></a>
				</li>

				<li class = "<?php if($page_name == 'administrator_add') echo 'active'; ?>">
					<a href="<?php echo site_url('superadmin/administrator_form/add_administrator_form'); ?>"><?php echo get_phrase('add_new_administrator'); ?></a>
				</li>
			</ul>
		</li>
	<!-- END only for supernadmin list of schools activate/pend -->

		<li class="side-nav-item <?php if ($page_name == 'categories' || $page_name == 'category_add' || $page_name == 'category_edit' ): ?> active <?php endif; ?>">
			<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'categories' || $page_name == 'category_add' || $page_name == 'category_edit' ): ?> active <?php endif; ?>">
				<i class="dripicons-network-1"></i>
				<span> <?php echo get_phrase('categories'); ?> </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class = "<?php if($page_name == 'categories' || $page_name == 'category_edit') echo 'active'; ?>">
					<a href="<?php echo site_url('superadmin/categories'); ?>"><?php echo get_phrase('categories'); ?></a>
				</li>

				<li class = "<?php if($page_name == 'category_add') echo 'active'; ?>">
					<a href="<?php echo site_url('superadmin/category_form/add_category'); ?>"><?php echo get_phrase('add_new_category'); ?></a>
				</li>
			</ul>
		</li>

		<li class="side-nav-item">
			<a href="<?php echo site_url('superadmin/courses'); ?>" class="side-nav-link <?php if ($page_name == 'courses' || $page_name == 'course_add' || $page_name == 'course_edit')echo 'active';?>">
				<i class="dripicons-archive"></i>
				<span><?php echo get_phrase('courses'); ?></span>
			</a>
		</li>

		<?php if (addon_status('course_bundle')): ?>
			<li class="side-nav-item <?php if ($page_name == 'add_bundle' || $page_name == 'manage_course_bundle' || $page_name == 'edit_bundle' || $page_name == 'active_bundle_subscription_report' || $page_name == 'expire_bundle_subscription_report' || $page_name == 'bundle_invoice'): ?> active <?php endif; ?>">
				<a href="javascript: void(0);" class="side-nav-link">
					<i class="dripicons-pamphlet"></i>
					<span> <?php echo get_phrase('course_bundle'); ?> </span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class = "<?php if($page_name == 'add_bundle') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/bundle/add_bundle_form'); ?>"><?php echo get_phrase('add_new_bundle'); ?></a>
					</li>
				</ul>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class = "<?php if($page_name == 'manage_course_bundle') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/bundle/manage_bundle'); ?>"><?php echo get_phrase('manage_bundle'); ?></a>
					</li>
				</ul>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class = "<?php if($page_name == 'active_bundle_subscription_report' || $page_name == 'expire_bundle_subscription_report' || $page_name == 'bundle_invoice') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/bundle/subscription_report/active'); ?>"><?php echo get_phrase('subscription_report'); ?></a>
					</li>
				</ul>
			</li>
		<?php endif; ?>

		<li class="side-nav-item <?php if ($page_name == 'instructors' || $page_name == 'instructor_add' || $page_name == 'instructor_edit'): ?> active <?php endif; ?>">
			<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'instructors' || $page_name == 'instructor_add' || $page_name == 'instructor_edit'): ?> active <?php endif; ?>">
				<i class="mdi mdi-incognito"></i>
				<span> <?php echo get_phrase('instructors'); ?> </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class = "<?php if($page_name == 'instructors' || $page_name == 'instructor_add' || $page_name == 'instructor_edit') echo 'active'; ?>">
					<a href="<?php echo site_url('superadmin/instructors'); ?>"><?php echo get_phrase('instructor_list'); ?></a>
				</li>

				<li class = "<?php if($page_name == 'instructor_payout') echo 'active'; ?>">
					<a href="<?php echo site_url('superadmin/instructor_payout'); ?>">
						<?php echo get_phrase('instructor_payout'); ?>
						<span class="badge badge-danger-lighten"><?php echo $this->crud_model->get_pending_payouts()->num_rows(); ?></span>
					</a>
				</li>

				<li class = "<?php if($page_name == 'instructor_settings') echo 'active'; ?>">
					<a href="<?php echo site_url('superadmin/instructor_settings'); ?>"><?php echo get_phrase('instructor_settings'); ?></a>
				</li>

				<li class = "<?php if($page_name == 'instructor_application') echo 'active'; ?>">
					<a href="<?php echo site_url('superadmin/instructor_application'); ?>">
						<?php echo get_phrase('instructor_application'); ?>
						<span class="badge badge-danger-lighten"><?php echo $this->user_model->get_pending_applications()->num_rows(); ?></span>
					</a>
				</li>
			</ul>
		</li>

		<li class="side-nav-item">
			<a href="<?php echo site_url('superadmin/users'); ?>" class="side-nav-link <?php if ($page_name == 'users' || $page_name == 'user_add' || $page_name == 'user_edit')echo 'active';?>">
				<i class="dripicons-user-group"></i>
				<span><?php echo get_phrase('students'); ?></span>
			</a>
		</li>

		<li class="side-nav-item <?php if ($page_name == 'enrol_history' || $page_name == 'enrol_student'): ?> active <?php endif; ?>">
			<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'enrol_history' || $page_name == 'enrol_student'): ?> active <?php endif; ?>">
				<i class="dripicons-network-3"></i>
				<span> <?php echo get_phrase('enrolment'); ?> </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class = "<?php if($page_name == 'enrol_history') echo 'active'; ?>">
					<a href="<?php echo site_url('superadmin/enrol_history'); ?>"><?php echo get_phrase('enrol_history'); ?></a>
				</li>

				<li class = "<?php if($page_name == 'enrol_student') echo 'active'; ?>">
					<a href="<?php echo site_url('superadmin/enrol_student'); ?>"><?php echo get_phrase('enrol_a_student'); ?></a>
				</li>
			</ul>
		</li>

		<li class="side-nav-item">
			<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'admin_revenue' || $page_name == 'instructor_revenue' || $page_name == 'invoice'): ?> active <?php endif; ?>">
				<i class="dripicons-box"></i>
				<span> <?php echo get_phrase('report'); ?> </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class = "<?php if($page_name == 'admin_revenue') echo 'active'; ?>" > <a href="<?php echo site_url('superadmin/admin_revenue'); ?>"><?php echo get_phrase('admin_revenue'); ?></a> </li>
				<?php if (get_settings('allow_instructor') == 1): ?>
					<li class = "<?php if($page_name == 'instructor_revenue') echo 'active'; ?>" >
						<a href="<?php echo site_url('superadmin/instructor_revenue'); ?>">
							<?php echo get_phrase('instructor_revenue');?>
						</a>
					</li>
				<?php endif; ?>
			</ul>
		</li>

		<?php if (addon_status('offline_payment')): ?>
			<li class="side-nav-item">
				<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'offline_payment_pending' || $page_name == 'offline_payment_approve' || $page_name == 'offline_payment_suspended'): ?> active <?php endif; ?>">
					<i class="dripicons-box"></i>
					<span> <?php echo get_phrase('offline_payment'); ?></span>
					<span class="menu-arrow"></span>
				</a>
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class = "<?php if($page_name == 'offline_payment_pending') echo 'active'; ?>" >
						<a href="<?php echo site_url('addons/offline_payment/pending'); ?>">
							<?php echo get_phrase('pending_request'); ?>
							<span class="badge badge-danger-lighten badge-pill float-right"><?php echo get_pending_offline_payment(); ?></span></span>
						</a>
					</li>
					<li class = "<?php if($page_name == 'offline_payment_approve') echo 'active'; ?>" >
						<a href="<?php echo site_url('addons/offline_payment/approve'); ?>"><?php echo get_phrase('accepted_request'); ?></a>
					</li>
					<li class = "<?php if($page_name == 'offline_payment_suspended') echo 'active'; ?>" >
						<a href="<?php echo site_url('addons/offline_payment/suspended'); ?>"><?php echo get_phrase('suspended_request'); ?></a>
					</li>
				</ul>
			</li>
		<?php endif; ?>

		<li class="side-nav-item">
			<a href="<?php echo site_url('superadmin/message'); ?>" class="side-nav-link <?php if ($page_name == 'message' || $page_name == 'message_new' || $page_name == 'message_read')echo 'active';?>">
				<i class="dripicons-message"></i>
				<span><?php echo get_phrase('message'); ?></span>
			</a>
		</li>

		<li class="side-nav-item">
			<a href="javascript: void(0);" class="side-nav-link <?php if ($page_name == 'addons' || $page_name == 'addon_add' || $page_name == 'available_addons'): ?> active <?php endif; ?>">
				<i class="dripicons-graph-pie"></i>
				<span> <?php echo get_phrase('addons'); ?> </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class = "<?php if($page_name == 'addons') echo 'active'; ?>" >
					<a href="<?php echo site_url('superadmin/addon'); ?>"><?php echo get_phrase('addon_manager'); ?></a>
				</li>
				<li class = "<?php if($page_name == 'available_addons') echo 'active'; ?>" >
					<a href="<?php echo site_url('superadmin/available_addons'); ?>"><?php echo get_phrase('available_addons'); ?></a>
				</li>
			</ul>
		</li>

		<li class="side-nav-item  <?php if ($page_name == 'system_settings' || $page_name == 'frontend_settings' || $page_name == 'payment_settings' || $page_name == 'smtp_settings' || $page_name == 'manage_language' || $page_name == 'about' || $page_name == 'themes' ): ?> active <?php endif; ?>">
			<a href="javascript: void(0);" class="side-nav-link">
				<i class="dripicons-toggles"></i>
				<span> <?php echo get_phrase('settings'); ?> </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class = "<?php if($page_name == 'system_settings') echo 'active'; ?>">
					<a href="<?php echo site_url('superadmin/system_settings'); ?>"><?php echo get_phrase('system_settings'); ?></a>
				</li>
				<li class = "<?php if($page_name == 'frontend_settings') echo 'active'; ?>">
					<a href="<?php echo site_url('superadmin/frontend_settings'); ?>"><?php echo get_phrase('website_settings'); ?></a>
				</li>
				<?php if (addon_status('certificate')): ?>
					<li class = "<?php if($page_name == 'certificate_settings') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/certificate/settings'); ?>"><?php echo get_phrase('certificate_settings'); ?></a>
					</li>
				<?php endif; ?>
				<?php if (addon_status('amazon-s3')): ?>
					<li class = "<?php if($page_name == 's3_settings') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/amazons3/settings'); ?>"><?php echo get_phrase('s3_settings'); ?></a>
					</li>
				<?php endif; ?>
				<?php if (addon_status('live-class')): ?>
					<li class = "<?php if($page_name == 'live_class_settings') echo 'active'; ?>">
						<a href="<?php echo site_url('addons/liveclass/settings'); ?>"><?php echo get_phrase('live_class_settings'); ?></a>
					</li>
				<?php endif; ?>
				<li class = "<?php if($page_name == 'payment_settings') echo 'active'; ?>">
					<a href="<?php echo site_url('superadmin/payment_settings'); ?>"><?php echo get_phrase('payment_settings'); ?></a>
				</li>
				<li class = "<?php if($page_name == 'manage_language') echo 'active'; ?>">
					<a href="<?php echo site_url('superadmin/manage_language'); ?>"><?php echo get_phrase('language_settings'); ?></a>
				</li>
				<li class = "<?php if($page_name == 'smtp_settings') echo 'active'; ?>">
					<a href="<?php echo site_url('superadmin/smtp_settings'); ?>"><?php echo get_phrase('smtp_settings'); ?></a>
				</li>
				<li class = "<?php if($page_name == 'theme_settings') echo 'active'; ?>">
					<a href="<?php echo site_url('superadmin/theme_settings'); ?>"><?php echo get_phrase('theme_settings'); ?></a>
				</li>
				<li class = "<?php if($page_name == 'about') echo 'active'; ?>">
					<a href="<?php echo site_url('superadmin/about'); ?>"><?php echo get_phrase('about'); ?></a>
				</li>
			</ul>
		</li>
		<li class="side-nav-item <?php if ($page_name == 'manage_profile')echo 'active';?>">
			<a href="<?php echo site_url(strtolower($this->session->userdata('role')).'/manage_profile'); ?>" class="side-nav-link">
				<i class="dripicons-user"></i>
				<span><?php echo get_phrase('manage_profile'); ?></span>
			</a>
		</li>	
	</ul>
</div>
