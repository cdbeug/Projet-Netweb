<?php

function test_bdd () {
	$bdd = "snmp1";
	$var = "EGP5095545";
	$requette = 'select iph_name as Nom, ipa_addr as IP, iph_ether as MAC, iph_gpsnum as Nom_inventaire, iph_type as Type, iph_dnsstate as DNS, iph_ug as UG, iph_affect as Affectation, iph_desc as Description, iph_location as Emplacement, iph_switchport as Port, iph_lastupdated as Derniere_connection from snmp1.ip_host, snmp1.ip_address where ipa_client=iph_client and (iph_gpsnum="'.$var.'" OR iph_ether="'.$var.'" OR ipa_addr="'.$var.'");';
	//echo(interroge_la_base($bdd, $requette)[0]['port']);
	$res = interroge_la_base($bdd, $requette, "user1", "1234", "localhost");;
	//aff_tab_res_mysql($res);
	return $res;
}

function test_port_stack () {
	echo (donne_stack('stk-254029[02/33]')."\n");
	$tmp = donne_port('stk-254029[02/33]');
	foreach ($tmp as $i) {
		echo ($i."\n");
	}
}

function test_snmp ($communaute_cst) {
	//echo(substr("Avaya", 0, 5)."\n");
	//aff_bool(str_contains("13213Avaya465", "Avaya"));
	//aff_bool(verifie_marque_avaya("10.149.254.9"));
	echo(renvoie_VLAN("10.149.254.3", "1", "3", $communaute_cst)."\n");
	echo(renvoie_status_port("10.149.254.3", "2", "1", $communaute_cst)."\n");
	echo(renvoie_vitesse_port("10.149.254.3", "4", "3", $communaute_cst)."\n");
	aff_tab(renvoie_marque_switch("10.149.254.3", $communaute_cst));
}

function test_affichage ($res_requette) {
	affiche_tab_donnee_html ($res_requette);
}

?>
