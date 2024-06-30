
	<!--  BEGIN SIDEBAR  -->
	<div class="sidebar-wrapper sidebar-theme">

		<nav id="sidebar">
			<div class="shadow-bottom"></div>
			<ul class="list-unstyled menu-categories" id="accordionExample">
				<li class="menu">
					<a href="/home" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
								<path d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z"></path>
							</svg>
							<span>Dashboard</span>
						</div>
					</a>
				</li>
				<li class="menu">
					<a href="/tracking" aria-expanded="false" class="dropdown-toggle">
						<div class="">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
							<path d="M12 2C8.13 2 5 5.13 5 9c0 4.95 7 13 7 13s7-8.05 7-13c0-3.87-3.13-7-7-7zm0 18.28S7 12.9 7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 3.9-5 11.28-5 11.28zM11 6h2v5h-2z"></path>
						</svg>

							<span>Lacak Dokumen</span>
						</div>
					</a>
				</li>

				@IsAdmin
				<li class="menu">
					<a href="/location" aria-expanded="false" class="dropdown-toggle">
						<div class="">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
							<path d="M12 2C8.13 2 5 5.13 5 9c0 4.95 7 13 7 13s7-8.05 7-13c0-3.87-3.13-7-7-7zm0 18.28S7 12.9 7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 3.9-5 11.28-5 11.28zM11 6h2v5h-2z"></path>
						</svg>

							<span>Setting location</span>
						</div>
					</a>
				</li>
				<li class="menu">
					<a href="#components" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
								<path d="M20 6c0-2.168-3.663-4-8-4S4 3.832 4 6v2c0 2.168 3.663 4 8 4s8-1.832 8-4V6zm-8 13c-4.337 0-8-1.832-8-4v3c0 2.168 3.663 4 8 4s8-1.832 8-4v-3c0 2.168-3.663 4-8 4z"></path>
								<path d="M20 10c0 2.168-3.663 4-8 4s-8-1.832-8-4v3c0 2.168 3.663 4 8 4s8-1.832 8-4v-3z"></path>
							</svg>
							<span>Data Client</span>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
								<polyline points="9 18 15 12 9 6"></polyline>
							</svg>
						</div>
					</a>
					<ul class="collapse submenu list-unstyled" id="components" data-parent="#accordionExample">
					<li><a href="/input_berkas"> Input Berkas </a></li>

					</ul>
				</li>
				<li class="menu">
					<a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
								<path d="M21 20V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2zM9 18H7v-2h2v2zm0-4H7v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm2-5H5V7h14v2z"></path>
							</svg>
							<span>Input Agenda</span>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
								<polyline points="9 18 15 12 9 6"></polyline>
							</svg>
						</div>
					</a>
					<ul class="collapse submenu list-unstyled" id="app" data-parent="#accordionExample">
						<li>
							<a href="/jenis_layanan"> Jenis Layanan</a>
							<a href="/inputan"> Tambah Agenda</a>



						</li>


					</ul>
				</li>
				 <li class="menu">
					<a href="#rev" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
								<path d="M21 20V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2zM9 18H7v-2h2v2zm0-4H7v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm2-5H5V7h14v2z"></path>
							</svg>
							<span>SDM</span>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
								<polyline points="9 18 15 12 9 6"></polyline>
							</svg>
						</div>
					</a>
					<ul class="collapse submenu list-unstyled" id="rev" data-parent="#accordionExample">
						<li>
						<a href="/absensi_admin"> Absensi Staff </a>

						</li>

					</ul>
				</li>

				<li class="menu">
					<a href="#kwitansi" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
								<path d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 19V5h7v14H4zm9 0V5h7l.001 14H13z"></path>
								<path d="M15 7h3v2h-3zm0 4h3v2h-3z"></path>
							</svg>
							<span>User</span>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
								<polyline points="9 18 15 12 9 6"></polyline>
							</svg>
						</div>
					</a>
					<ul class="collapse submenu list-unstyled" id="kwitansi" data-parent="#accordionExample">
						<li>
							<a href="/staff"> Staff </a>
							<a href="/user_staff"> User </a>
						</li>


					</ul>
				</li>
				@endIsAdmin
				@IsNotaris
				<li class="menu">
					<a href="#components" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
								<path d="M20 6c0-2.168-3.663-4-8-4S4 3.832 4 6v2c0 2.168 3.663 4 8 4s8-1.832 8-4V6zm-8 13c-4.337 0-8-1.832-8-4v3c0 2.168 3.663 4 8 4s8-1.832 8-4v-3c0 2.168-3.663 4-8 4z"></path>
								<path d="M20 10c0 2.168-3.663 4-8 4s-8-1.832-8-4v3c0 2.168 3.663 4 8 4s8-1.832 8-4v-3z"></path>
							</svg>
							<span>Data Client</span>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
								<polyline points="9 18 15 12 9 6"></polyline>
							</svg>
						</div>
					</a>
					<ul class="collapse submenu list-unstyled" id="components" data-parent="#accordionExample">
					<li><a href="/input_berkas"> Input Berkas </a></li>

					</ul>
				</li>
				<li class="menu">
					<a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
								<path d="M21 20V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2zM9 18H7v-2h2v2zm0-4H7v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm2-5H5V7h14v2z"></path>
							</svg>
							<span>Input Agenda</span>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
								<polyline points="9 18 15 12 9 6"></polyline>
							</svg>
						</div>
					</a>
					<ul class="collapse submenu list-unstyled" id="app" data-parent="#accordionExample">
						<li>
							<a href="/jenis_layanan"> Jenis Layanan</a>
							<a href="/inputan"> Tambah Agenda</a>



						</li>


					</ul>
				</li>
				<li class="menu">
					<a href="/tugas" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
								<path d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 19V5h7v14H4zm9 0V5h7l.001 14H13z"></path>
								<path d="M15 7h3v2h-3zm0 4h3v2h-3z"></path>
							</svg>
							<span>Tugas</span>
						</div>
					</a>

				</li>

				@endIsNotaris
				@IsPeserta
				<li class="menu">
					<a href="/lembar_kerja" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
								<path d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 19V5h7v14H4zm9 0V5h7l.001 14H13z"></path>
								<path d="M15 7h3v2h-3zm0 4h3v2h-3z"></path>
							</svg>
							<span>Lihat data</span>
						</div>
					</a>

				</li>
				<li class="menu">
					<a href="/hasil_kerja" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
								<path d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 19V5h7v14H4zm9 0V5h7l.001 14H13z"></path>
								<path d="M15 7h3v2h-3zm0 4h3v2h-3z"></path>
							</svg>
							<span>Pengumuman</span>
						</div>
					</a>

				</li>


				@endIsPeserta
				@IsStaff
				<li class="menu">
					<a href="/absensi_user" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
								<path d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 19V5h7v14H4zm9 0V5h7l.001 14H13z"></path>
								<path d="M15 7h3v2h-3zm0 4h3v2h-3z"></path>
							</svg>
							<span>Absen</span>
						</div>
					</a>

				</li>
				<li class="menu">
					<a href="/input_berkas" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
								<path d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 19V5h7v14H4zm9 0V5h7l.001 14H13z"></path>
								<path d="M15 7h3v2h-3zm0 4h3v2h-3z"></path>
							</svg>
							<span>input berkas</span>
						</div>
					</a>

				</li>
				<li class="menu">
					<a href="/inputan" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
								<path d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 19V5h7v14H4zm9 0V5h7l.001 14H13z"></path>
								<path d="M15 7h3v2h-3zm0 4h3v2h-3z"></path>
							</svg>
							<span>tambah agenda</span>
						</div>
					</a>

				</li>


				@endIsStaff
				@IsPetugas
				<li class="menu">
					<a href="/inputan" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
								<path d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 19V5h7v14H4zm9 0V5h7l.001 14H13z"></path>
								<path d="M15 7h3v2h-3zm0 4h3v2h-3z"></path>
							</svg>
							<span>cek agenda</span>
						</div>
					</a>

				</li>


				@endIsPetugas
				@IsPetugas2
				<li class="menu">
					<a href="/inputan" aria-expanded="false" class="dropdown-toggle">
						<div class="">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
								<path d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 19V5h7v14H4zm9 0V5h7l.001 14H13z"></path>
								<path d="M15 7h3v2h-3zm0 4h3v2h-3z"></path>
							</svg>
							<span>cek agenda</span>
						</div>
					</a>

				</li>


				@endIsPetugas2

			</ul>
		</nav>

	</div>
	<!-- </div> -->
