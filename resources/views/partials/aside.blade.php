<aside class="sidebar sidebar-default navs-rounded-all ">
	<div class="sidebar-header d-flex align-items-center justify-content-start">
		<a href="{{ route('home') }}" class="navbar-brand">
			<!--Logo start-->
			<!-- <svg width="30" class="" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2"
                    transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                <rect x="7.72803" y="27.728" width="28" height="4" rx="2"
                    transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                <rect x="10.5366" y="16.3945" width="16" height="4" rx="2"
                    transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2"
                    transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
            </svg> -->
			<!--logo End-->
			<h4 class="logo-title">MRG Recruitment</h4>
		</a>
		<div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
			<i class="icon">
				<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
					<path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
				</svg>
			</i>
		</div>
	</div>
	<div class="sidebar-body pt-0 data-scrollbar">
		<div class="sidebar-list">
			<!-- Sidebar Menu Start -->
			<ul class="navbar-nav iq-main-menu" id="sidebar-menu">
				<li class="nav-item static-item">
					<a class="nav-link static-item disabled" href="{{ route('home') }}" tabindex="-1">
						<span class="default-icon">Home</span>
						<span class="mini-icon">-</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " aria-current="page" href="{{ route('app.home') }}">
						<i class="icon">
							<svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
							</svg>
						</i>
						<span class="item-name">Dashboard</span>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button" aria-expanded="false" aria-controls="horizontal-menu">
						<i class="icon">
							<svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path opacity="0.4" d="M10.0833 15.958H3.50777C2.67555 15.958 2 16.6217 2 17.4393C2 18.2559 2.67555 18.9207 3.50777 18.9207H10.0833C10.9155 18.9207 11.5911 18.2559 11.5911 17.4393C11.5911 16.6217 10.9155 15.958 10.0833 15.958Z" fill="currentColor"></path>
								<path opacity="0.4" d="M22.0001 6.37867C22.0001 5.56214 21.3246 4.89844 20.4934 4.89844H13.9179C13.0857 4.89844 12.4102 5.56214 12.4102 6.37867C12.4102 7.1963 13.0857 7.86 13.9179 7.86H20.4934C21.3246 7.86 22.0001 7.1963 22.0001 6.37867Z" fill="currentColor"></path>
								<path d="M8.87774 6.37856C8.87774 8.24523 7.33886 9.75821 5.43887 9.75821C3.53999 9.75821 2 8.24523 2 6.37856C2 4.51298 3.53999 3 5.43887 3C7.33886 3 8.87774 4.51298 8.87774 6.37856Z" fill="currentColor"></path>
								<path d="M21.9998 17.3992C21.9998 19.2648 20.4609 20.7777 18.5609 20.7777C16.6621 20.7777 15.1221 19.2648 15.1221 17.3992C15.1221 15.5325 16.6621 14.0195 18.5609 14.0195C20.4609 14.0195 21.9998 15.5325 21.9998 17.3992Z" fill="currentColor"></path>
							</svg>
						</i>
						<span class="item-name">Setting</span>
						<i class="right-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
							</svg>
						</i>
					</a>
					<ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
						<li class="nav-item">
							<a class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" role="button" aria-controls="offcanvasExample">
								<i class="icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
										<g>
											<circle cx="12" cy="12" r="8" fill="currentColor"></circle>
										</g>
									</svg>
								</i>
								<i class="sidenav-mini-icon"> S </i>
								<span class="item-name">Theme Settings</span>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item">
					<a class="nav-link" data-bs-toggle="collapse" href="#master-menu" role="button" aria-expanded="false" aria-controls="master-menu">
						<i class="icon">
							<svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path opacity="0.4" d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z" fill="currentColor"></path>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z" fill="currentColor"></path>
							</svg>
						</i>
						<span class="item-name">Data Master</span>
						<i class="right-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
							</svg>
						</i>
					</a>


					<ul class="sub-nav collapse" id="master-menu" data-bs-parent="#sidebar-menu">
						<li class="nav-item">
							<a class="nav-link @yield('master-loker')" href="{{ route('vacancy.index') }}">
								<i class="icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
										<g>
											<circle cx="12" cy="12" r="8" fill="currentColor"></circle>
										</g>
									</svg>
								</i>
								<i class="sidenav-mini-icon"> L </i>
								<span class="item-name"> Loker </span>
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link @yield('master-user')" href="{{ route('app.user') }}">
								<i class="icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
										<g>
											<circle cx="12" cy="12" r="8" fill="currentColor"></circle>
										</g>
									</svg>
								</i>
								<i class="sidenav-mini-icon"> U </i>
								<span class="item-name">Users Access</span>
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link " href="{{ route('question.index') }}">
								<i class="icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
										<g>
											<circle cx="12" cy="12" r="8" fill="currentColor"></circle>
										</g>
									</svg>
								</i>
								<i class="sidenav-mini-icon"> Q </i>
								<span class="item-name">Question</span>
							</a>
						</li>


					</ul>
				</li>

				<li class="nav-item">
					<a class="nav-link" data-bs-toggle="collapse" href="#vacancy-menu" role="button" aria-expanded="false" aria-controls="vacancy-menu">
						<i class="icon">
							<svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path opacity="0.4" d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z" fill="currentColor"></path>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z" fill="currentColor"></path>
							</svg>
						</i>
						<span class="item-name">Selection</span>
						<i class="right-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
							</svg>
						</i>
					</a>
					<ul class="sub-nav collapse" id="vacancy-menu" data-bs-parent="#sidebar-menu">
						<li class="nav-item">
							<a class="nav-link " href="{{ route('app.user') }}">
								<i class="icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
										<g>
											<circle cx="12" cy="12" r="8" fill="currentColor"></circle>
										</g>
									</svg>
								</i>
								<i class="sidenav-mini-icon"> C </i>
								<span class="item-name">Vacancies</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link " href="{{ route('candidate.index') }}">
								<i class="icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
										<g>
											<circle cx="12" cy="12" r="8" fill="currentColor"></circle>
										</g>
									</svg>
								</i>
								<i class="sidenav-mini-icon"> C </i>
								<span class="item-name">Candidates</span>
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link " href="{{ route('app.user') }}">
								<i class="icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
										<g>
											<circle cx="12" cy="12" r="8" fill="currentColor"></circle>
										</g>
									</svg>
								</i>
								<i class="sidenav-mini-icon"> C </i>
								<span class="item-name">Birdtest</span>
							</a>
						</li>

						<li class="nav-item">
						<a class="nav-link " href="{{ route('candidate.index') }}">
								<i class="icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
										<g>
											<circle cx="12" cy="12" r="8" fill="currentColor"></circle>
										</g>
									</svg>
								</i>
								<i class="sidenav-mini-icon"> ST1 </i>
								<span class="item-name">ST1</span>
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link " href="{{ route('st2.index') }}">
								<i class="icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
										<g>
											<circle cx="12" cy="12" r="8" fill="currentColor"></circle>
										</g>
									</svg>
								</i>
								<i class="sidenav-mini-icon"> ST2 </i>
								<span class="item-name">ST2</span>
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link " href="{{ route('sta.index') }}">
								<i class="icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
										<g>
											<circle cx="12" cy="12" r="8" fill="currentColor"></circle>
										</g>
									</svg>
								</i>
								<i class="sidenav-mini-icon"> STA </i>
								<span class="item-name"> STA </span>
							</a>
						</li>

					</ul>
				</li>

				<div class="sidebar-footer"></div>
</aside>