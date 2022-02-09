<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> Tableau de Bord</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('client') }}'><i class='nav-icon la la-users'></i> Clients</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('technicien') }}'><i class='nav-icon la la-smile'></i> Techniciens</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('vehicule') }}'><i class='nav-icon la la-car'></i> Vehicules</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('offre') }}'><i class='nav-icon la la-question'></i> Offres</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('action_intervention') }}'><i class='nav-icon la la-cog'></i> Liste des actions</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('intervention') }}'><i class='nav-icon la la-tools'></i> Interventions</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('devis') }}'><i class='nav-icon la la-question'></i> Devis</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('facture') }}'><i class='nav-icon la la-question'></i> Factures</a></li>

<!-- Users, Roles, Permissions -->
<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentification</a>
	<ul class="nav-dropdown-items">
		<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Utilisateurs</span></a></li>
		<li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
		<li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
	</ul>
</li>
