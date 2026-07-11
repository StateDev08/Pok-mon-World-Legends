<?php
if ($page == 'home' || empty($page)) {
	$txt['pagetitle']			= 'Home';
	$txt['news_empty']			= 'No news at the moment!';
	$txt['poke_stats']			= 'pokemon statistics';
	$txt['loading']				= 'Loading...';
	$txt['pokes_ammunt']		= 'There are %s varieties of Pokémon.';
	$txt['top_gebruikers']		= 'Best coaches';
} else if ($page == 'disclaimer') {
	$txt['pagetitle']	= 'Legal Notice';
	$txt['pagetext']	= '<em>World Legends</em> is a fan site, having no relationship with any series or character
		mentioned on the website, as well as no participation in any stage of production or marketing of the series.<br />
		<br />
		The <em>World Legends</em> WEB-based gaming system was developed by a team of game fans
		Pokémon, being free and non-profit, may undergo changes at any time
		without prior notice. All rights relating to the <em>World Legends</em> WEB-based game system,
		as well as the use of the software and its database, are the property of
		said team, in accordance with art. 1&ordm; and 2&ordm; of the Brazilian Software Protection Law &ndash; Law
		Federal n.&ordm; 9,609/98. The purpose of the site is to promote anime/manga as a source of culture
		for the general public, in accordance with art. 215 of the 1988 Federal Constitution of the Republic
		Federativa do Brasil, respecting the respective copyrights, owned by the creator.<br />
		<br />
		All images, logos and names of the aforementioned anime are registered trademarks of their
		creator, so the use of "screenshots" of the characters and any references to the series are not
		constitutes an offense against the copyright of the series owners, under the terms of art. 46, item
		VIII of the Brazilian Copyright Law &ndash; Federal Law n.&ordm; 9610/98, and art. 13 of the Agreement
		International Conference on Aspects of Intellectual Property Rights Related to
		Trade (<em>TRIPS &ndash; Trade Related Aspects of Intellectual Property Rights</em>).<br />
		<br />
		For all questions related to the server on which game-specific media is
		made available, information originating from this server resides on a computer system
		financed by the fan team responsible for the game system and/or third parties associated with it,
		The use of this system may be monitored for security purposes. All unauthorized access
		access to this system, by any means, is prohibited, and the offender is subject to sanctions
		applicable criminal penalties &ndash; without prejudice to civil liability and consequent compensation for losses
		and damages, in accordance with arts. 186, 187 and 927, all of the Brazilian Civil Code of 2002.<br />
		<br />
		Under no circumstances may the <em>World Legends</em> website, as well as its responsible team or
		any persons or websites related to this, be liable to any user
		or party entitled to the occurrence of any direct, indirect, potential or other damages
		damages resulting from the use of this website or any of its links, being aware from
		already of the possibility &ndash; even if all necessary steps are taken for the good
		operation of the program by the &ndash; team from the occurrence of such damage.<br />
		<br />
		Any type of fundraising or donations made to <em>World Legends</em> will be donated to
		improvements to the website, promotion of this and the anime, in compliance with the project being non-profit.<br />
		<br />
		By continuing to access <em>World Legends</em>, you are expressly agreeing to all
		notices and conditions of use mentioned on the website, as well as all the terms mentioned above,
		further stating that you meet the requirements established by law regarding the content and use of this website.';
} else if ($page == 'privacy') {
	$txt['pagetitle'] = 'Privacy Policy';
	$txt['pagetext']	= '<h3 style="font-size:13px; color:#399de2">General User Respect Policy</h3>
		The following terms govern <em>World Legends</em>\'s policy on obtaining and using
		information from its users, whereby they, when using <em>World Legends</em>, declare that they are
		aware and agree to all its terms.<br />
		<br />
		Generally speaking, <em>World Legends</em> values the privacy of its members and users, and does not
		will share with third parties any personal information of its users, including email,
		name, address or location. Finally, when using <em>World Legends</em>, the IP address and
		respective user server will be logged for statistical purposes and security reasons.<br />
		<br />
		<h3 style="font-size:13px; color:#399de2">Use of “Cookies”</h3>
		A "cookie" is a small text file placed on the registered user\'s system.
		on <em>World Legends</em> (as well as most websites). This file is intended to be the
		identification card for each user, is unique and can only be accessed by the server
		who sent such a file to the user. “Cookies” are used exclusively to record
		user preferences within <em>World Legends</em> domains, helping us develop
		increasingly a website that meets the expectations of our users.<br />
		<br />
		<h3 style="font-size:13px; color:#399de2">Storage and Disclosure of Information</h3>
		<em>World Legends</em> may store and, exceptionally, disclose personal information of its
		users, when permitted or required by Law, according to their convenience and needs.
		In this way, information stored by the website server may be disclosed to
		satisfy legal determinations, regulatory requirements of the competent authorities,
		as well as when necessary to protect the proprietary rights of the gaming system or
		guaranteeing the safety of its users and the general public.<br />
		<br />
		<h3 style="font-size:13px; color:#399de2">Information Security</h3>
		The <em>World Legends</em> website and game system promotes reasonable efforts to protect security
		of personal information, such as the use of passwords and uses of technology such as
		encryption, control procedures and firewalls, among other security mechanisms.
		We advise the user, at the time of registration, to register a password that contains
		letters and numbers, as well as not disclosing it to anyone, in order to protect your personal account on
		<em>World Legends</em>. Any access from the user\'s account is their sole and exclusive responsibility.
		responsibility, even if it is proven to be carried out by people other than the
		registered user.<br />
		<br />
		<em>World Legends</em> reserves the right to prove the misuse of the site by the user – among them the
		use of programming flaws in the game itself (“bugs”) or specific programs to
		cheating – or verified conduct that does not comply with the terms of the website, the right to take
		any measures it deems necessary, including the permanent deletion of the account
		user.<br />
		<br />
		<h3 style="font-size:13px; color:#399de2">Change of Privacy and Site Use Policies</h3>
		<em>World Legends</em> reserves the right to change any terms and policies of use in this
		website, at any time, without prior notification to its users. In case of any
		comments, questions or doubts from users about this or any other term
		present on this website, these must be sent to us at the following email address:
		<a href="mailto:vinicius@simbolarena.com.br">vinicius@simbolarena.com.br</a>.<br />
		<br />
		By continuing to access <em>World Legends</em>, you are expressly agreeing to all
		notices and conditions of use mentioned on the website, as well as all the terms mentioned above,
		further stating that you meet the requirements established in Law on the content and
		use of this website.';
} else if ($page == 'terms') {
	$txt['pagetitle'] = 'Terms of Use';
	$txt['pagetext']	= '<h3 style="font-size:13px; color:#399de2">Use of HTML, design and content from World Legends.</h3>
		When using <em>World Legends</em>, the user agrees not to use any HTML, design
		or website content, without the permission of their owners. In case of
		failure of the user to comply with this obligation, the user will be notified to remove
		any content that has been inappropriately appropriated, within 48 hours, under
		penalty of all applicable legal measures being taken.<br />
		<br />
		<h3 style="font-size:13px; color:#399de2">News Post</h3>
		All news posted on <em>World Legends</em> is for the exclusive use of the site, unless otherwise
		source is cited, its reference being permitted in any medium, as long as it is reproduced
		in its entirety and cited the <em>World Legends</em> website as a source.<br />
		<br />
		<h3 style="font-size:13px; color:#399de2">Data Contributions by Users</h3>
		Occasionally, contributions of data are sent to us by users, in the most diverse
		forms (art, drawings, fanfics, videos, etc.). By this term the user, when sending
		contributions of data in any form, declares to transfer ownership of such data to <em>World Legends</em>, which is free to use or not use such data according to its convenience and
		need, and can even be used on this website.<br />
		<br />
		<h3 style="font-size:13px; color:#399de2">Multimedia Download and Possible Incompatibilities and/or Damage</h3>
		When using <em>World Legends</em>, the user declares to be aware and agree that under no circumstances
		may the <em>World Legends</em> website, as well as its responsible team or any people or websites
		related to this, be held responsible by any user or party legitimized by the
		occurrence of any direct, indirect, potential or other damages resulting from the
		use or incompatibility of this website or any of its links, further stating that the user
		be aware of the possibility now – even if all necessary steps are taken to
		proper functioning of the program by the team – of the occurrence of such damages and/or
		incompatibilities.<br />
		<br />
		By “downloading” any media or image, the user further affirms that he/she holds ownership of the
		original material, or if you do not have it, you undertake to delete said media in the
		within 24 hours, so <em>World Legends</em> is not responsible for actions and/or omissions
		of its users.<br />
		<br />
		<h3 style="font-size:13px; color:#399de2">Server Access</h3>
		For all questions related to the server on which game-specific media is
		made available, information originating from this server resides on a computer system
		financed by the fan team responsible for the game system and/or third parties associated with it.
		By using <em>World Legends</em>, the user declares to be aware and agree that the use of this
		system may be monitored for security purposes. It further states that the user is aware that
		any unauthorized access to this system, by any means, is expressly prohibited,
		the violating user being subject, in case of violation, to the applicable criminal sanctions – without
		prejudice to civil liability and consequent compensation for losses and damages, under the terms
		of arts. 186, 187 and 927, all of the Brazilian Civil Code of 2002.<br />
		<br />
		By continuing to access <em>World Legends</em>, you are expressly agreeing to all
		notices and conditions of use mentioned on the website, as well as all the terms mentioned above,
		further stating that you meet the requirements established in Law on the content and
		use of this website.';
} else if ($page == 'rules') {
	$txt['pagetitle'] = 'Rules &amp; Punishments';
	$txt['pagetext']	= '';
} else if ($page == 'my_characters') {
	$txt['pagetitle'] = 'My characters';
	$txt['title_text'] = '<center>Select the character you want to play below.</center>';
} else if ($page == 'new_character') {
	$txt['alert_character_invalid']			= 'You must select a valid character!';
	$txt['alert_no_username']				= 'You must fill in all the fields!';
	$txt['alert_username_too_short']		= 'The user must contain at least 3 characters!';
	$txt['alert_username_too_long']			= 'User must not contain more than 10 characters!';
	$txt['alert_username_exists']			= 'This username is already in use by another player!';
	$txt['alert_username_incorrect_signs']	= 'User must contain only alphanumeric characters!';
	$txt['alert_no_beginworld']				= 'You must fill in all the fields!';
	$txt['alert_world_invalid']				= 'You must select a valid region!';
	$txt['alert_no_server']					= 'You need to choose a server!';
	$txt['alert_server_invalid']			= 'You must select a valid server!';

	$txt['pagetitle']		= 'Create new character';
	$txt['title_text']		= 'Here you can create a new character so you can have fun in the Pokémon world.';
	$txt['username']		= 'User:';
	$txt['beginworld']		= 'Region';
	$txt['select_server']	= 'Server';
	$txt['button'] = 'Create character';
} else if ($page == 'notfound') {
	$txt['pagetitle']   = 'Page not found!';
	$txt['notfoundtext'] = '<p align="center">The page you tried to access was not found or is currently unavailable.</p>';
} else if ($page == 'error') {
	$txt['pagetitle']  = 'OH NO! There was an error!';
	$txt['title_text'] = 'Sorry, this page is not accessible to you! You need to be logged in to access this page.';
} else if ($page == 'captcha') {
	$txt['pagetitle']    = 'Security';
	$txt['title_text_1'] = 'To prevent people from using bots, please fill in the security code.<br />
		If you make 3 mistakes, don\'t enter anything or refresh the page and you will be logged out.<br />
		If you make another mistake in the future beyond these 3 times, you will not be logged out but banned.';
	$txt['title_text_2'] = 'Captcha';
	$txt['guard_code']   = 'Captcha:';
	$txt['button']       = 'OK';

	$txt['alert_no_guardcode']           = 'Enter the security code!';
	$txt['alert_guardcode_numbers_only'] = 'The security code only contains numbers!';
	$txt['alert_guardcode_wrong']        = 'Incorrect security code!';
} else if ($page == 'register') {
	$txt['alert_already_this_ip']          = 'You already have an account!';
	$txt['alert_no_country']               = 'You must fill in all the fields!';
	$txt['alert_no_username']              = 'You must fill in all the fields!';
	$txt['alert_username_too_short']       = 'The user must contain at least 3 characters!';
	$txt['alert_username_too_long']        = 'User must not contain more than 10 characters!';
	$txt['alert_username_exists']          = 'This username is already in use by another player!';
	$txt['alert_username_incorrect_signs'] = 'User must contain only alphanumeric characters!';
	$txt['alert_no_password']              = 'You must fill in all the fields!';
	$txt['alert_password_too_short']       = 'Your password must contain at least 6 characters!';
	$txt['alert_passwords_dont_match']     = 'Passwords don\'t match!';
	$txt['alert_no_email']                 = 'You must fill in all the fields!';
	$txt['alert_email_incorrect_signs']    = 'You must enter a valid email!';
	$txt['alert_email_exists']             = 'This email is already in use by another player!';
	$txt['trainer_invalid']				   = 'We did not find the specified trainer!';
	$txt['success_register']               = 'Your account has been created successfully!';

	$txt['titlenpc']			= 'Register now!!!';
	$txt['textnpc']				= 'Use the form below to register in the pokemon world, in <b>World Legends</b> you will participate in exciting adventures and battles.<br />
		&mdash; Find friends and make enemies, prove your strength and become a great pokemon master!!!';

	$txt['pagetitle']              = 'Register';
	$txt['country']                = 'Country:';
	$txt['username']               = 'User:';
	$txt['password']               = 'Password:';
	$txt['password_again']         = 'Confirm your password:';
	$txt['email']                  = 'E-mail:';
	$txt['referer']                = 'Invited by (Optional):';
	$txt['button']                 = 'Register!';
} else if ($page == 'information') {
	$txt['pagetitle']                 = 'Information';
	$txt['link_subpage_pokemon_info'] = 'Info. pokemon';
	$txt['link_subpage_attack_info']  = 'Info. attacks';
	$txt['link_subpage_game_info'] = 'F.A.Q';

	
			if ($_GET['category'] == 'game-info') {
			#Screen
			$txt['pagetitle'] .= ' - F.A.Q';
			$txt['informationpage'] = '<h2>F.A.Q</h2><br>';
		}
	else if ($_GET['category'] == 'pokemon-info') {
		$txt['titlenpc']		= 'PokePédia (Pokémon Encyclopedia)';
		$txt['textnpc']			= 'This area is where you will find all the information about all the Pokémon in <b>World Legends</b>. Here you can ask your questions about stats, evolutions, etc.';

		$txt['pagetitle']             .= ' - Pokémons';
		$txt['choosepokemon']         = 'Select';
		$txt['poke_list']             = 'list of pokemon';
		$txt['choose_a_pokemon']      = 'Choose a Pokémon below to access its information!';
		$txt['not_rare']              = 'Common';
		$txt['a_bit_rare']            = 'Unusual';
		$txt['very_rare']             = 'Rare';
		$txt['favorite_place']		  = 'Favorite place';
		$txt['not_a_favorite_place']  = 'Doesn\'t have a favorite place.';
		$txt['is_his_favorite_place'] = '<b>%s</b> is the favorite location.';
		$txt['is']                    = 'and';
		$txt['type']                  = 'Type';
		$txt['lives_in']              = 'Lives in';
		$txt['how_much']              = 'There are <b>%s</b> %ss in the game.';
		$txt['attack&evolution']      = 'Attacks and Evolution';
		$txt['no_attack_or_evolve']   = 'No attacks and/or evolutions!';
		$txt['level']                 = 'Level';
		$txt['evolution']             = 'Evolution';
		$txt['unknow']				  = 'Unknown';
		$txt['capture_chance']		  = 'Chance of capture';
		$txt['evolui_de']             = 'Evolves from';
		$txt['trade']				  = 'Exchange required.';
	} else if ($_GET['category'] == 'attack-info') {
		$txt['titlenpc']		= 'Pokémon attacks';
		$txt['textnpc']			= 'Are you looking for information about a certain move/attack? You are in the right place, here you will find everything you are looking for about your pokemon\'s attack.';

		$txt['pagetitle'] .= ' - Ataques';
		$txt['#']      = '#';
		$txt['name']   = 'Name';
		$txt['type']   = 'Type';
		$txt['att']    = 'Attack';
		$txt['acc']    = 'Hit';
		$txt['effect'] = 'Effect';
		$txt['ready']  = 'Status';
		$txt['category'] = 'Category';
	}
} else if ($page == 'statistics') {
	$txt['pagetitle']           = 'Statistics';
	$txt['top6_pokemon_title']  = 'Best pokemon';
	$txt['game_data']           = 'Game information';
	$txt['users_total']         = 'Coaches:';
	$txt['silver_in_game']      = 'Total silver:';
	$txt['pokemon_total']       = 'Pokémon:';
	$txt['matches_played']      = 'Total battles:';
	$txt['top5_silver_users']   = 'The 5 richest';
	$txt['#']                   = '#';
	$txt['who']                 = 'User';
	$txt['silver']              = 'Silver';
	$txt['top5_pokemon_total']  = 'The 5 richest triadores';
	$txt['number']              = '#';
	$txt['top5_matches_played'] = 'Top 5 duelists: <span class="small Text">Victories - Defeats</ Span>';
	$txt['matches']             = 'Battles';
	$txt['top10_new_users']     = 'Last 10 users';
	$txt['when']                = 'Registered in';
} else if ($page == 'rankinglist') {
	$txt['pagetitle'] = 'Ranking';
	$txt['#']         = '#';
	$txt['username']  = 'Trainer';
	$txt['country']   = 'Region';
	$txt['rank']      = 'Rank';
	$txt['status']    = 'Status';
	$txt['online']    = 'Online';
	$txt['offline']   = 'Offline';
} else if ($page == 'contact') {
	$txt['alert_email_to_unknown']      = $_POST['sendto'] . 'is invalid!';
	$txt['alert_no_name']               = 'You must enter your name!';
	$txt['alert_no_email']              = 'You must enter your email!';
	$txt['alert_email_incorrect_signs'] = 'The email entered is not valid!';
	$txt['alert_no_subject']            = 'You must specify the subject!';
	$txt['alert_no_message']            = 'You must type a message!';
	$txt['success_contact']             = 'Your contact has been sent successfully!<br />
		We will try to respond as quickly as possible.';

	$txt['pagetitle']  = 'Contact us';
	$txt['title_text'] = 'Do you want to tell us something? Then here is the right place!';
	$txt['your_name']  = 'What is your name?';
	$txt['your_email'] = 'What\'s your email?';
	$txt['subject']    = 'What\'s the subject?';
	$txt['message']    = 'Write your message here...';
	$txt['button']     = 'Send email!';
} else if ($page == 'activate') {
	$txt['alert_no_username']            = 'You must fill in all the fields!';
	$txt['alert_username_too_short']     = 'The username is too short!';
	$txt['alert_username_too_long']      = 'The username is too long!';
	$txt['alert_username_dont_exist']    = $_POST['inlognaam'] . 'does not exist.';
	$txt['alert_no_activatecode']        = 'You must fill in all the fields!';
	$txt['alert_activatecode_too_short'] = 'The activation code is too short!';
	$txt['alert_activatecode_too_long']  = 'The activation code is too long!';
	$txt['alert_guardcore_invalid']      = 'Captcha code is incorrect!';
	$txt['alert_already_activated']      = $_POST['inlognaam'] . 'is already activated!';
	$txt['alert_activatecode_wrong']     = 'You have entered an invalid activation code!';
	$txt['alert_username_wrong']         = 'The user entered was not found!';
	$txt['alert_no_email']               = 'You must fill in all the fields!';
	$txt['alert_email_incorrect_signs']  = 'You must enter a valid email!';
	$txt['success_activate']             = $_POST['inlognaam'] . 'has been activated successfully!';
	$txt['success_resend']               = 'In a few moments you will receive an email with your activation code. Don\'t forget to check your SPAM folder!';

	$txt['titlenpc']			= 'Activate your account now!';
	$txt['textnpc']				= 'Below you will find two forms, one to activate your account and the other to re-send the registration code.
		activation to your email if you have not received it. You will only be able to access your account after your account has been properly activated.';

	$txt['pagetitle']		= 'Activate your account';

	$txt['activate_title']	= 'Activate my account';
	$txt['username']		= 'User';
	$txt['activatecode']	= 'Activation code';
	$txt['activate']		= 'Activate account!';

	$txt['resend_title']	= 'Activation code';
	$txt['email']			= 'E-mail';
	$txt['resend']			= 'Re-send!';
} else if ($page == 'forgot') {
	$txt['alert_no_username']			= 'You must fill in all the fields!';
	$txt['alert_username_too_short']	= 'The username is too short!';
	$txt['alert_username_too_long']		= 'The username is too long!';
	$txt['alert_no_email']				= 'You must fill in all the fields!';
	$txt['alert_guardcore_invalid']		= 'Captcha code is incorrect!';
	$txt['alert_username_dont_exist']	= 'The user does not exist!';
	$txt['alert_email_dont_exist']		= 'The email was not found in our system!';
	$txt['alert_wrong_combination']		= 'The user and email are not from the same account!';
	$txt['success_forgot']				= 'Your password has been successfully sent to your email!';

	$txt['titlenpc']					= 'Access problems?';
	$txt['textnpc']						= 'Are you having trouble accessing your account? Think you forgot your password? Don\'t remember your username or email? Don\'t panic, fill out the form so we can quickly resolve this unforeseen issue.';

	$txt['pagetitle']					= 'Recover my account';
	$txt['title_text']					= 'Forgot your password? Rest assured, here you can solve this problem.';
	$txt['username']					= 'User:';
	$txt['email']						= 'E-mail:';
	$txt['button']						= 'Recover';
} else if ($page == 'avatar') {
	$txt['alert_image_this_same']		= 'Unauthorized exchange!';
	$txt['alert_image_unavaliable']		= 'The chosen image is not available!';

	$txt['titlenpc']	= 'Avatar change';
	$txt['textnpc']		= "Here you can change your avatar.";
	$txt['textnpc']		.= "<br />&mdash; <span style='font-size:11px;'>Nem todos os personagens possuem a mesma quantidade de avatares.</span>";
	$txt['textnpc']		.= "<br />&mdash; <span style='font-size:11px;'>Novos avatares são adicioadas em algumas das atualizações do jogo.</span>";

	$txt['pagetitle']	= 'Change my avatar';
	$txt['pagetext']	= 'Click on one of the available avatars so you can view it and change your avatar.';
	$txt['button']		= 'To replace';
}else if ($page == 'account-options') {
		#Screen
		$txt['pagetitle'] = 'Account Options';
		#Titles
		$txt['link_subpage_personal'] = 'Guys';
		$txt['link_subpage_password'] = 'Password';
		$txt['link_subpage_profile'] = 'Profile';
		$txt['link_subpage_restart'] = 'Reset';
		
		if ($_GET['category'] == 'personal') {
			#Alerts general
			$txt['alert_not_enough_gold'] = 'You don\'t have gold.';
			$txt['alert_no_username'] = 'No users were found.';
			$txt['alert_username_too_short'] = 'Very short user.';
			$txt['alert_username_too_long'] = 'User too long.';
			$txt['alert_username_already_taken'] = 'User already in use.';
			$txt['alert_firstname_too_long'] = 'First name too long.';
			$txt['alert_lastname_too_long'] = 'Very long surname..';
			$txt['alert_character_invalid'] = 'Invalid characters.';
			$txt['alert_username_incorrect_signs'] = 'User contains invalid characters.';
			$txt['alert_seeteam_invalid'] = 'Unknown team.';
			$txt['alert_seebadges_invalid'] = 'unknown insignia.';
			$txt['alert_advertisement_invalid'] = 'Unknown advertisements.';
			$txt['alert_duel_invalid'] = 'Invalid duel.';
			$txt['success_modified'] = 'Modification carried out successfully!';
			
			#Screen general
			$txt['pagetitle'] .= ' - Informações pessoais';
			$txt['buy_premium_here'] = 'Buy premium here!';
			$txt['days_left'] = 'remaining day(s).';
			$txt['username'] = 'User:';
			$txt['cost_15_gold'] = 'The change costs 15 gold.';
			$txt['firstname'] = 'First name:';
			$txt['lastname'] = 'Surname:';
			$txt['country'] = 'Country:';
			$txt['character'] = 'Character:';
			$txt['premium_days'] = 'Premium:';
			$txt['advertisement'] = 'Advertisements:';
			$txt['alert_not_premium'] = 'You are not premium.';
			$txt['on'] = 'Yes';
			$txt['off'] = 'No';
			$txt['team_on_profile'] = 'Show team on profile:';
			$txt['yes'] = 'Yes';
			$txt['no'] = 'No';
			$txt['badges_on_profile'] = 'Show badges on profile';
			$txt['alert_dont_have_badgebox'] = 'You don\'t have a badge box.';
			$txt['duel_invitation'] = 'Accept duels:';
			$txt['alert_not_yet_available'] = 'Not yet available';
			$txt['available_rank_bully'] = 'Very low rank.';
			$txt['button_personal'] = 'To update';
		}
		else if ($_GET['category'] == 'email') {

			$txt['pagetitle'] .= ' - Alterar E-mail';
		}
		else if ($_GET['category'] == 'password') {
			#Alerts password
			$txt['alert_all_fields_required'] = 'All fields must be filled in.';
			$txt['alert_old_new_password_thesame'] = 'Your new password cannot be the same as your old one.';
			$txt['alert_old_password_wrong'] = 'Your current password is wrong.';
			$txt['alert_password_too_short'] = 'Your password is too short.';
			$txt['alert_new_controle_password_wrong'] = 'The new password is not the same in the fields.';
			$txt['success_password'] = 'Password changed successfully!';
			
			#Screen password
			$txt['pagetitle'] .= ' - Alterar Senha';
			$txt['new_password'] = 'New Password:';
			$txt['new_password_again'] = 'Repeat your new password:';
			$txt['password_now'] = 'Current password:';
			$txt['button_password'] = 'Change password!';
		}
		else if ($_GET['category'] == 'profile') {
			#Alerts profile
			$txt['success_profile'] = 'Your profile has been updated successfully.';
			
			#Screen profile
			$txt['pagetitle'] .= ' - Atualizar Perfil';
			$txt['link_text_effects'] = '<u><a href="codes.php?category=profile" class="colorbox" title="Profile Effects"><b>Here</b></a></u> you can see some tips for customizing your profile!';
			$txt['button_profile'] = 'Update Profile!';
		}
		else if ($_GET['category'] == 'restart') {
			#Alerts restart
			$txt['embreve'] = 'Shortly.';
			$txt['alert_no_password'] = 'No password entered.';
			$txt['alert_password_wrong'] = 'Incorrect password entered.';
			$txt['alert_no_beginworld'] = 'No region has been chosen.';
			$txt['alert_world_invalid'] = 'Unknown region.';
			$txt['success_restart'] = 'Successfully restarted on a new region!';
			$txt['alert_when_restart'] = 'You can transfer in
										  <strong><span id=uur3></span></strong> hours,
										  <strong><span id=minuten3> </span>&nbsp;minuten</strong> minutes and
										  <strong><span id=seconden3></span>&nbsp;seconden</strong>.';
			
			#Screen restart
			$txt['pagetitle'] .= ' - Recomeçar';
			$txt['restart_title_text'] = '<center>Fill in your password and select the region you wish to transfer to.<br /><br />
										
										All your pokemons, items, silver and ranking points are removed upon transfer.<br />
										<strong>This is not reversible!</strong></center>';
			$txt['password_security'] = 'Password:';
			$txt['button_restart'] = 'Start a new journey!';
		}
	} else if ($page == 'extended') {
	$txt['pagetitle']          = 'My team';
	$txt['catched_with']       = 'Captured with %s!';
	$txt['pokemon']            = 'Pokémon:';
	$txt['attack_points']      = 'Attack:';
	$txt['clamour_name']       = 'Name:';
	$txt['defence_points']     = 'Defense:';
	$txt['type']               = 'Type:';
	$txt['level']              = 'Level:';
	$txt['speed_points']       = 'Speed:';
	$txt['spc_attack_points']  = 'Esp. Attack:';
	$txt['mood']               = 'Humor:';
	$txt['spc_defence_points'] = 'Esp. Defense:';
	$txt['attacks']            = 'Attacks:';
	$txt['egg_will_hatch_in']  = 'The egg will hatch at:';
	$txt['begin_pokemon']      = 'starter Pokémon';
	$txt['pottions_used']      = 'Vitamins:';
	$txt['change_attacks']     = 'Change attacks';
	$txt['msgfaq']			   = '<div class="blue">Now you are a Pokémon trainer! Excellent! Ready for your Pokémon journey?! <BR>The Professor recommends that you visit the "F.A.Q" and understand more about the world of Pokémon World Legends.<br><a href="./information&category=game-info">>> Click here to visit the F.A.Q.</a></div>';
} else if ($page == 'sell') {
	$txt['pagetitle']           = 'Sell';
	$txt['colorbox_text']       = "Open this window again.";
	$txt['title_text_1']        = 'You can place up to';
	$txt['title_text_2']        = 'pokemon(s) for sale.<br />Do you have';
	$txt['title_text_3']        = 'pokemon(s) for sale.';
	$txt['no_pokemon_in_house'] = 'You do not have Pokémon(s) in your home.';
	$txt['#']                   = '#';
	$txt['pokemon']             = 'Pokémon';
	$txt['clamour_name']        = 'Name';
	$txt['level']               = 'Level';
	$txt['sell']                = 'Sell';
	$txt['go_to_transferlist']  = 'Go to the pokemon market';
} else if ($page == 'poke-event') {
	$txt['pagetitle']           = 'Event Pokémon';
	$txt['title_text_1']        = 'These are the Pokémon that are participating in the event.';
	$txt['#']                   = '#';
	$txt['pokemon']             = 'Pokémon';
	$txt['type']        		= 'Type';
	$txt['regiao']              = 'Region';
	$txt['local']               = 'Favorite Place';
} else if ($page == 'release') {
	$txt['alert_itemplace']           = 'Note: You do not have enough slots to receive the return Poké Ball.';
	$txt['alert_not_your_pokemon']    = 'Careful! This Pokémon doesn\'t belong to you!';
	$txt['alert_beginpokemon']        = 'This is your starter Pokémon, you can\'t free it!';
	$txt['alert_no_pokemon_selected'] = 'You must select a pokemon!';
	$txt['success_release']           = 'You have successfully freed your Pokémon!';

	$txt['pagetitle']                = 'Free pokemon';
	$txt['title_text']               = 'Here you can free Pokémon that you no longer want.<br />
		The Poké Ball used to capture the Pokémon returns to your items.<br />
		<strong>Note:</strong> This action is irreversible!';
	$txt['pokemon_team']             = 'Pokémon on your team';
	$txt['#']                        = '#';
	$txt['pokemon']                  = 'Pokémon';
	$txt['clamour_name']             = 'Name';
	$txt['level']                    = 'Level';
	$txt['release']                  = 'Release';
	$txt['alert_no_pokemon_in_hand'] = 'You don\'t have pokemon on your team.';
	$txt['button']                   = 'Release';
	$txt['pokemon_at_home']          = 'Pokémon in your home';
	$txt['alert_no_pokemon_at_home'] = 'You don\'t have Pokémon in your house.';
} else if ($page == 'items') {
	$txt['alert_no_amount']               = 'Enter a quantity!';
	$txt['alert_too_much_items_selected'] = 'You don\'t have this amount!';
	$txt['success_items']                 = 'You sold' . $_POST['amount'] . 'x' . $_POST['name'] . '';

	$txt['pagetitle']        = 'My items';
	if ($_GET['category'] == 'balls') $txt['pagetitle'] .= ' - Pokebolas';
	else if ($_GET['category'] == 'items') $txt['pagetitle'] .= ' - Itens';
	else if ($_GET['category'] == 'spc_items') $txt['pagetitle'] .= ' - Itens Especias';
	else if ($_GET['category'] == 'potions') $txt['pagetitle'] .= ' - Poções';
	else if ($_GET['category'] == 'stones') $txt['pagetitle'] .= ' - Pedras evolutivas';
	else if ($_GET['category'] == 'hm') $txt['pagetitle'] .= ' - HM\'s';
	else if ($_GET['category'] == 'tm') $txt['pagetitle'] .= ' - TM\'s';

	$txt['title_text_1']     = 'You have';
	$txt['title_text_2']     = 'free slot(s).';
	$txt['name']             = 'Item';
	$txt['number']           = 'Amount';
	$txt['sellprice']        = 'Value';
	$txt['sell']             = 'Sell';
	$txt['use']              = 'To use';
	$txt['balls']            = 'Poké Balls';
	$txt['potions']          = 'Potions';
	$txt['items']            = 'Items';
	$txt['badge_case_title'] = 'A box for your badge collection.';
	$txt['box_title']        = 'You can leave your items at';
	$txt['spc_items']        = 'Special Items';
	$txt['stones']           = 'Stones';
	$txt['tm']               = 'TM';
	$txt['hm']               = 'HM';
	$txt['button_use']       = 'To use';
	$txt['button_sell']      = 'Sell';
	$txt['no_item']          = 'No items found in this category!';
} else if ($page == 'badges') {
	$txt['pagetitle']      = 'Badge Box';
	$txt['badges']         = 'Insignia of';
	$txt['no_badges_from'] = 'No insignia';
} else if ($page == 'house') {
	$txt['alert_not_your_pokemon']        = 'Careful! This Pokémon doesn\'t belong to you!';
	$txt['alert_house_full']              = 'Your house is full!';
	$txt['success_bring']                 = 'You saved your pokemon!';
	$txt['alert_hand_full']               = 'You already have 6 Pokémon on your team!';
	$txt['alert_pokemon_on_transferlist'] = 'This Pokémon is for sale!';
	$txt['success_get']                   = 'You caught your pokemon!';

	$txt['pagetitle']          = 'My house';
	$txt['title_text_1']       = 'Currently you have a';
	$txt['title_text_2']       = 'and you can save';
	$txt['title_text_3']       = 'Pokémon.<br />
		* Save Pokémon, here you can leave your Pokémon at your home.<br />
		* Catch pokemon, here you can see and catch your saved pokemon.<br />
		You can only catch a Pokémon if you have at least 1 spot on the team.';
	$txt['pokemon_bring_away'] = 'Save pokemon';
	$txt['pokemon_pick_up']    = 'My pokemon';
	$txt['box']                = 'cardboard box';
	$txt['little_house']       = 'small house';
	$txt['normal_house']       = 'big house';
	$txt['big_house']          = 'mansion';
	$txt['places_over']        = 'available slots';
	$txt['#']                  = '#';
	$txt['clamour_name']       = 'Pokémon';
	$txt['level']              = 'Level';
	$txt['bring_away']         = 'Save';
	$txt['take']               = 'To take';
	$txt['button_take']        = 'OK';
	$txt['button_bring']       = 'OK';
	$txt['empty']              = 'Empty';
	$txt['no_pokemon']	   = 'No Pokémon were found.';
} else if ($page == 'pokedex') {
	$txt['pagetitle'] = 'Pokédex';
	$txt['seen']      = 'Visa';
	$txt['had']       = 'He had';
	$txt['have']      = 'He has';
	$txt['#']         = '#';
	$txt['pokemon']   = 'Pokémon';
	$txt['name']      = 'Name';
	$txt['type']      = 'Type';
	$txt['status']    = 'Status';
} else if ($page == 'events') {
	$txt['alert_nothing_selected']    = 'You must select some notification!';
	$txt['alert_more_events_deleted'] = 'Notifications successfully removed!';
	$txt['alert_one_event_deleted']   = 'Notification successfully removed!';

	$txt['pagetitle'] = 'Notifications';
	$txt['date-time'] = 'Date/Time';
	$txt['no_events'] = 'No notifications.';
	$txt['button']    = 'To switch off';
	$txt['event']     = 'Notification';
}else if ($page == 'profile') {
	$txt['pagetitle']         = 'Profile' . $_GET['player'];
	$txt['offline']           = 'Offline';
	$txt['online']            = 'Online';
	$txt['username']          = 'Trainer:';
	$txt['name']              = 'Name:';
	$txt['country']           = 'Country:';
	$txt['date_started']      = 'Registered at:';
	$txt['world']             = 'Region:';
	$txt['silver']            = 'Silver:';
	$txt['gold']              = 'Gold:';
	$txt['bank']              = 'Bank:';
	$txt['rank']              = 'Rank:';
	$txt['rank_number']       = 'General Rating:';
	$txt['badges_number']     = 'Insignia:';
	$txt['pokemon']           = 'Pokémon:';
	$txt['win']               = 'Wins:';
	$txt['lost']              = 'Defeats:';
	$txt['status']            = 'Status:';
	$txt['action']            = 'Actions:';
	$txt['add_buddy']         = 'Add friend';
	$txt['send_message']      = 'Send message';
	$txt['block']             = 'Block';
	$txt['spy']               = 'Spy';
	$txt['steal']             = 'Sabotage';
	$txt['race']              = 'Run';
	$txt['duel']              = 'Duel';
	$txt['bank_transfer']     = 'Send silver/gold';
	$txt['email']             = 'E-mail:';
	$txt['ip_registered']     = 'Registration IP:';
	$txt['ip_login']          = 'Login IP:';
	$txt['admin_options']     = 'Administration:';
	$txt['edit_profile']      = 'Edit profile';
	$txt['make_admin']        = 'Make administrator';
	$txt['give_egg']          = 'Send egg';
	$txt['give_pokemon']      = 'Send pokemon';
	$txt['give_pack']         = 'Send package';
	$txt['team']              = 'Team:';
	$txt['badges']            = 'Insignia of';
	$txt['no_badges_from']    = 'No insignia';
	$txt['no_profile_insert'] = 'No personal text!';
} else if ($page == 'work') {
	$txt['alert_nothing_selected'] = 'Select a job.';
	$txt['alert_captcha_wrong'] = 'Invalid security code.';
	$txt['and'] = 'and';
	$txt['seconds'] = 'Seconds';
	$txt['minutes'] = 'minutes';
	$txt['minute'] = 'minute';
	$txt['success_work_1'] = 'You are now working.';
	$txt['success_work_2'] = 'until you finish working.';

	$txt['pagetitle'] = 'Start work';
	$txt['#']         = '#';
	$txt['work_name'] = 'Work';
	$txt['duration']  = 'Duration';
	$txt['turnover']  = 'Reward';
	$txt['chance']    = 'Chance';
	$txt['button']    = 'To work';

	$txt['work_1']  = 'Sell ​​lemonade';
	$txt['work_2']  = 'Help in the market';
	$txt['work_3']  = 'Deliver newspapers';
	$txt['work_4']  = 'Clean the pokemon center';
	$txt['work_5']  = 'Challenge Team Rocket to a game of golf';
	$txt['work_6']  = 'Search for valuables in the city';
	$txt['work_7']  = 'Demonstrate with your Pokémon in the square';
	$txt['work_8']  = 'Make your Pokémon a scientific experiment';
	$txt['work_9']  = 'Leave your Pokémon free in the park';
	$txt['work_10'] = 'Help Officer Jenny';
	$txt['work_11'] = 'Letting your Pokémon sabotage';
	$txt['work_12'] = 'Rob a casino with your Pokémon';
} else if ($page == 'traders') {
	$txt['alert_dont_have_1'] = 'You don\'t have any';
	$txt['alert_dont_have_2'] = 'like you!';

	$txt['alert_i_have_1']          = 'I have';
	$txt['alert_i_have_2']          = 'just changed, sorry!';
	$txt['success_traders_change']  = 'Thanks for trading, take care!';
	$txt['success_traders_refresh'] = 'Pokémon updated successfully!';

	$txt['pagetitle']       = 'Merchants';
	$txt['title_text']      = 'Here you can trade with Kayl, Wayne and Remy.<br />
		The Level of the Pokémon that will be received is based on what you gave in the exchange.<br />
		If you have 2 identical Pokémon with you, the first in order is the one that will be traded.';
	$txt['kayl_no_pokemon'] = 'Sorry, but I already have all the Pokémon I want!';
	$txt['kayl_text_1']     = 'Hey!<br />
		You have a<strong>';
	$txt['kayl_text_2']     = '</strong>?<br />
		I would like to change my <strong>';
	$txt['kayl_text_3']     = '</strong>?<br />
		It would be great if you would trade with me!';
	$txt['button_change']   = 'Negotiate with';

	$txt['wayne_no_pokemon'] = 'I can\'t negotiate with you now!';
	$txt['wayne_text_1']     = 'Hello, my name is Wayne.<br />
		I\'m looking for a <strong>';
	$txt['wayne_text_2']     = '</strong>.<br />
		In return I will give you my <strong>';
	$txt['wayne_text_3']     = '</strong>, are you interested?<br />
		If you negotiate with me, as a bonus I will give you an extra <img src="' . $static_url . '/images/icons/silver.png" title="Silver" style="margin-bottom:-3px;" /> 100 silvers.<br />';

	$txt['remy_no_pokemon'] = 'Sorry, I\'m not looking to trade any Pokémon at the moment!';
	$txt['remy_text_1']     = 'Hello, I\'m Remy.<br />
		I\'ve been looking for the Pokémon for a long time <strong>';
	$txt['remy_text_2']     = '</strong><br />
		Do you have to negotiate?<br />
		I have to trade my pokemon <strong>';
	$txt['remy_text_3']     = '</strong>.';

	$txt['refresh_pokemon']        = 'Update the pokemon';
	$txt['button_traders_refresh'] = 'Update pokemon';
} else if ($page == 'donate') {
	$txt['pagetitle']	= 'Acquire Golds';

	$txt['titlenpc']	= 'Buy your Golds now!';
	$txt['textnpc']		= 'By making any type of purchase on this page, you will be contributing to the development of the game itself.
		All money raised here will be converted to improving the game, as well as promoting the game and the anime.';

} else if ($page == 'pokemoncenter') {
	$txt['no_silver']          = 'You need more <img src="' . $static_url . '/images/icons/silver.png" title="Silver" style="vertical-align: -3px;" /> %s to pay for the treatment!';
	
	$txt['pagetitle']          = 'pokemon center';
	$txt['title_text_admin']   = 'Admins do not need to wait for Pokémon to be recovered.';
	$txt['title_text_premium'] = 'The waiting time for each Pokémon to recover is 20 seconds.';
	$txt['title_text_normal']  = 'The waiting time for each Pokémon to recover is 20 seconds.<br />
		Become a premium trainer and reduce waiting times.<br />
		Go premium now by clicking <a href="./gold-market"><b>here!</b></a>';
	$txt['who']                = 'Pokémon';
	$txt['health']             = 'HP';
	$txt['amount']             = 'Cost';
	$txt['nvt']                = 'Inapplicable';
	$txt['button']             = 'Treat';
} else if ($page == 'market') {
	$txt['alert_itemplace']        = '<b>Note:</b> You need to have free slots before purchasing any items.';
	$txt['alert_not_enough_money'] = 'You can\'t pay for this!';
	$txt['alert_itembox_full_1']   = 'Item box full! You can save';
	$txt['alert_itembox_full_2']   = 'potions!';
	$txt['success_market']         = 'You bought';
	$txt['alert_nothing_selected'] = 'Select something!';
	$txt['alert_pokedex_chip']     = 'You can\'t buy the Pokédex Chip without having the Pokédex!';
	$txt['alert_not_enough_place'] = 'Your item box is full!';
	$txt['alert_hand_full']        = 'You already have 6 Pokémon with you!';
	$txt['alert_not_in_stock']     = 'We currently do not have this product available!';
	
	$txt['pagetitle'] = 'PokéMart';
	$txt['balls']     = 'Poké Balls';
	$txt['potions']   = 'Potions';
	$txt['items']     = 'Items';
	$txt['spc_items'] = 'Special Items';
	$txt['stones']    = 'Stones';
	$txt['attacks']   = 'Attacks';
	$txt['pokemon']   = 'Pokémon';
	
	if ($_GET['shopitem'] == 'balls') {
		$txt['pagetitle']    .= ' - Pokébolas';
		$txt['button_balls'] = 'Buy Pokéballs';
	} else if ($_GET['shopitem'] == 'potions') {
		$txt['pagetitle']      .= ' - Poções';
		$txt['button_potions'] = 'Buy potions';
	} else if ($_GET['shopitem'] == 'items') {
		$txt['pagetitle']    .= ' - Itens';
		$txt['button_items'] = 'Buy items';
	} else if ($_GET['shopitem'] == 'specialitems') {
		$txt['pagetitle']        .= ' - Itens especais';
		$txt['button_spc_items'] = 'Buy special items';
	} else if ($_GET['shopitem'] == 'stones') {
		$txt['pagetitle']     .= ' - Pedras';
		$txt['button_stones'] = 'Buy stones';
	} else if ($_GET['shopitem'] == 'attacks') {
		$txt['pagetitle']           .= ' - Ataques';
		$txt['button_attacks']      = 'Buy attacks';
		$txt['market_attack_types'] = 'Pokémon can learn attacks.';
	} else if ($_GET['shopitem'] == 'pokemon') {
		$txt['pagetitle']             .= ' - Pokémons';
		$txt['button_pokemon']         = 'Buy pokemon';
		$txt['not_rare']               = 'Common';
		$txt['middle_rare']            = 'Unusual';
		$txt['rare']                   = 'Rare';
		$txt['out_of_stock_1']         = 'All Pokémon sold on the market';
		$txt['out_of_stock_2']         = '';
		$txt['success_bought_pokemon'] = '1 pokemon egg!';
	}
} else if ($page == 'item-market') {
	$txt['pagetitle']	= 'Item market';
	$txt['balls']		= 'Poké Balls';
	$txt['spc_items']	= 'Special Items';
	$txt['stones']		= 'Stones';
	$txt['attacks']		= 'Attacks';

	if ($_GET['category'] == 'balls')			$txt['pagetitle']	.= ' - Pokébolas';
	else if ($_GET['category'] == 'specialitems')	$txt['pagetitle']	.= ' - Itens Especais';
	else if ($_GET['category'] == 'stones')		$txt['pagetitle']	.= ' - Pedras de Evolução';
	else if ($_GET['category'] == 'attacks')		$txt['pagetitle']	.= ' - Ataques';
} else if ($page == 'travel') {
	$txt['alert_no_world'] = 'Select a region.';
	$txt['alert_already_in_world'] = 'You are already in'.$_POST['wereld'].'.';
	$txt['alert_world_invalid'] = $_POST['wereld'].'is not a valid region.';
	$txt['alert_not_enough_money'] = 'You don\'t have silvers to travel to'.$_POST['wereld'].'.';
	$txt['success_travel'] = 'You went to'.$_POST['wereld'].', and spent';
	$txt['alert_not_everything_selected'] = 'Select the Pokémon and region.';
	$txt['alert_not_your_pokemon'] = 'This Pokémon is not yours!';
	$txt['alert_no_surf'] = 'This Pokémon can\'t surf!';
	$txt['alert_no_fly'] = 'This Pokémon can\'t fly!';
	$txt['alert_not_strong_enough'] = 'This Pokémon is not strong enough!';
	$txt['success_surf'] = 'Your Pokémon went surfing to'.$_POST['wereld'].'successfully!';
	$txt['success_fly'] = 'Your pokemon flew away'.$_POST['wereld'].'successfully!';
	
	$txt['pagetitle']       = 'Travel to another region';
	$txt['title_text']      = 'Here you can travel to other regions';
	$txt['#']               = '#';
	$txt['world']           = 'Region';
	$txt['price']           = 'Price per pokemon';
	$txt['price_total']     = 'Total';
	$txt['button_travel']   = 'Travel';
	$txt['title_text_surf'] = 'If your pokemon can \'Surf\' and your pokemon are level 80+...<br />
		You can travel to other regions for free!';
	$txt['title_text_fly']  = 'If your Pokémon can \'Fly\' and your Pokémon are level 80+...<br />
		You can travel to other regions for free!';
	$txt['pokemon']         = 'Pokémon';
	$txt['button_surf']     = 'Surf';
	$txt['button_fly']      = 'To fly';
} else if ($page == 'transferlist') {
	$txt['alert_no_pokemon'] = 'We currently have no Pokémon on the market!';

	$txt['pagetitle']     = 'Pokemon market';
	$txt['colorbox_text'] = 'Open this window again.';
	$txt['title_text_1']  = 'You have:';
	$txt['title_text_2']  = '<b>Tip:</b> Also look at the city\'s Pokémon market.';
	$txt['#']             = '#';
	$txt['pokemon']       = 'Pokémon';
	$txt['clamour_name']  = 'Name';
	$txt['level']         = 'Level';
	$txt['price']         = 'Value';
	$txt['owner']         = 'Trainer';
	$txt['buy']           = 'Buy';
} else if ($page == 'daycare') {
	$txt['alert_not_your_pokemon'] = 'This Pokémon is not yours!';
	$txt['alert_hand_full'] = 'You already have 6 pokemon with you!';
	$txt['alert_no_eggs'] = 'We don\'t have eggs for you!';
	$txt['success_egg'] = 'You have received an egg!';
	$txt['alert_already_in_daycare'] = 'The Pokémon is already in kindergarten!';
	$txt['alert_already_lvl_100'] = 'This Pokémon is already at level 100!';
	$txt['alert_daycare_full'] = 'You can\'t put more pokemon in kindergarten!';
	$txt['success_bring'] = 'You\'ve sent your Pokémon to kindergarten!';
	$txt['alert_not_enough_silver'] = 'You don\'t have enough silver!';
	$txt['success_take'] = 'You got your pokemon back!';
	$txt['alert_no_pokemon'] = 'You have to have some Pokémon to be able to use Kindergarten!';
	
	$txt['pagetitle']         = 'Kindergarten';
	$txt['egg_text']          = 'Hello coach!<br /><br />
		We found an egg of your Pokémon, do you want it?<br /><br />
		<input type="submit" name="accept" value="Yes, please!" class="text_long"><input type="submit" name="dontaccept" value="No thanks." class="text_long" style="margin-left:10px;">';
	$txt['normal_user']       = 'You can leave <b>1</b> Pokémon, <b>PREMIUM</b> trainers can leave <b>2</b> Pokémon.';
	$txt['premium_user']      = 'You can leave up to <b>2</b> Pokémon at the kindergarten.';
	$txt['title_text']        = 'We take care of your Pokémon for the amount of <img src="' . $static_url . '/images/icons/silver.png" title="Silver" /> 250 Silvers when you come to pick it up.<br />
		We charge a small fee <img src="' . $static_url . '/images/icons/silver.png" title="Silver" /> 500 Silvers if your Pokémon levels up.<br />
		Your Pokémon doesn\'t evolve or learn attacks until you come and take it away.';
	$txt['give_pokemon_text'] = 'Which Pokémon will you leave at kindergarten?';
	$txt['button_bring']      = 'To leave';
	$txt['take_pokemon_text'] = 'Your kindergarten Pokémon(s):';
	$txt['#']                 = '#';
	$txt['name']              = 'Name';
	$txt['level']             = 'Level';
	$txt['levelup']           = 'Current level';
	$txt['cost']              = 'Cost to withdraw';
	$txt['buy']               = 'Pay';
	$txt['button_take']       = 'To take';
} else if ($page == 'specialists') {
	$txt['alert_nothing_selected']	= 'You didn\'t select any Pokémon!';
	$txt['alert_not_enough_money']	= 'You can\'t afford this!';
	$txt['alert_name_too_long']		= 'The Pokémon\'s name must be between 4 and 12 characters long!';
	$txt['alert_name_equal']		= 'You must enter a name different from your current one!';
	$txt['alert_name_exists']		= 'This name is already being used by other Pokémon!';
	$txt['alert_pokemon_is_shiny']	= 'This Pokémon is already shiny!';
	$txt['alert_not_your_pokemon']	= 'This Pokémon doesn\'t belong to you!';
	$txt['alert_pokemon_egg']		= 'You cannot select a Pokémon Egg!';
	$txt['alert_not_your_team']		= 'You cannot change a Pokémon that is not part of your team!';

	$txt['titlenpc']			= 'Experts';
	$txt['textnpc']				= 'After long studies, our scientists discovered that there are ways to change some aspects of Pokémon, but it is a very delicate procedure and there is a cost!<br /><br />
	<b>Shiny Specialist:</b> They are able to transform any Pokémon into a Shiny Pokémon!<br />
	<b>Mood Specialist:</b> These are responsible for taking care of your Pokémon\'s mood!<br />
	<b>Name Specialist:</b> These experts are the ones who give names to your Pokémon!';

	$txt['pagetitle']			= 'Experts';
	$txt['shiny_specialist']	= 'Shiny Specialist';
	$txt['mood_specialist']		= 'Humor Specialist';
	$txt['naam_specialist']		= 'Name Specialist';
	$txt['#']					= '#';
	$txt['pokemon']				= 'Pokémon';
	$txt['level']				= 'Level';
	$txt['amount']				= 'Value';
	$txt['naam']				= 'Name';
	$txt['buttom']				= 'OK';
}  ######################## JAIL ########################
	else if ($page == 'jail') {
		#Alerts
		$txt['alert_already_broke_out'] = 'The trainer has now successfully freed himself.';
		$txt['alert_already_free'] = 'The coach has already been released';
		$txt['success_bust'] = 'You managed to help the trainer escape.';
		$txt['alert_bust_failed_1'] = 'You failed helping the trainer escape, you are now arrested for';
		$txt['alert_bust_failed_2'] = '';
		$txt['alert_not_enough_silver'] = 'You have no silvers for the coach to retrieve from prison.';
		$txt['success_bought'] = 'Successfully removed from prison for';
		
		#Screen
		$txt['pagetitle'] = 'Prison';
		$txt['title_text'] = 'You can help your friends escape from prison, if you fail you will also be arrested. <br />
							  If you succeed, you will gain rank experience and free your friend!<br />
							  You can also pay for a coach to leave, but remember that this has a cost.';
		$txt['#'] = '#';
		$txt['username'] = 'Trainer';
		$txt['country'] = 'Country';
		$txt['time'] = 'Time';
		$txt['cost'] = 'Cost';
		$txt['buy_out'] = 'Buy exit';
		$txt['bust'] = 'Help Escape';
		$txt['button_buy'] = 'OK!';
		$txt['button_bust'] = 'OK!';
		$txt['nobody_injail_1'] = 'There is currently no one arrested in';
		$txt['nobody_injail_2'] = '';
	} else if ($page == 'choose-pokemon') {
	$txt['alert_no_pokemon']      = 'You didn\'t choose a Pokémon!';
	$txt['alert_pokemon_unknown'] = 'The chosen Pokémon is not available.';
	
	$txt['pagetitle']             = 'Choose a pokemon';
	$txt['title_text']            = 'Choose your starter Pokemon so you can start adventuring in the Pokemon world!';
	$txt['starter_pokemon']       = 'Available starter Pokémon';
	$txt['no_pokemon_this_world'] = 'No pokemon found.';
	$txt['poke_selected']		  = '<b>Great! Now click the button below to start your Pokémon journey! We recommend that you first visit our F.A.Q and understand more about the world of Pokémon World Legends.</b>';
	$txt['button']                = 'To choose';
} 
	######################## Attack Map ########################
	else if ($page == 'attack/attack_map') {
		#Alerts
		$txt['alert_no_fishing_rod'] = 'You don\'t have a fishing rod.';
		$txt['alert_no_cave_soff'] = 'You don\'t have the Cave Suit.';
		$txt['alert_error'] = 'An error has occurred, notify a team member!';
		$txt['alert_no_pokemon'] = 'Your Pokémon is not capable of fighting.';
		
		#Screen
		$txt['pagetitle'] = 'Select an area to explore!';
		$txt['title_text'] = 'Choose a place to look for a Pokémon to battle!';
	}
	######################## Attack Gyms ########################
	else if ($page == 'attack/gyms') {
		#Alerts
		$txt['alert_itemplace'] = 'Attention: you don\'t have slots for items, if you win you can get HMs without space you won\'t get them.';
		$txt['alert_rank_too_less'] = 'Your rank is not high enough to challenge this Leader';
		$txt['alert_wrong_world'] = 'You are in the wrong zone.';
		$txt['alert_gym_finished'] = 'You\'ve already defeated this gym leader.';
		$txt['alert_no_pokemon'] = 'You don\'t have any pokemon.';
		$txt['begindood'] = "You don't have any Pokémon with you or they are all dead.";
		
		#Screen
		$txt['pagetitle'] = 'Gyms';
		$txt['finished'] = 'Full';
		$txt['rank_too_less'] = 'Your rank is very low.';
		$txt['leader'] = 'Leader:';
		$txt['from_rank'] = 'Rank:';
	}
	
	######################## Attack Duel invite ########################
	else if ($page == 'attack/duel/invite') {
		#Alerts
		$txt['alert_not_yourself'] = 'You can\'t duel yourself.';
		$txt['alert_youre_not_premium'] = 'You are not premium, you cannot battle.';
		$txt['alert_unknown_amount'] = 'Invalid amount.';
		$txt['alert_not_enough_silver'] = 'You don\'t have that amount.';
		$txt['alert_all_pokemon_ko'] = 'All your Pokémon are lifeless.';
		$txt['alert_opponent_not_premium'] = 'It\'s not premium.';
		$txt['alert_opponent_not_in'] = 'is not in';
		$txt['alert_opponent_not_traveller'] = 'doesn\'t have enough rank.';
		$txt['alert_opponent_duelevent_off'] = 'does not accept duels.';
		$txt['alert_opponent_already_fighting'] = 'is already in a duel.';
		$txt['waiting_for_accept'] = 'is busy, wait for his response.';
		$txt['alert_opponent_no_silver'] = 'Your opponent doesn\'t have enough silvers.';
		$txt['alert_opponent_no_health'] = 'Your opponent has all their Pokémon dead.';
		$txt['alert_user_unknown'] = 'The coach doesn\'t exist.';
		
		#Screen
		$txt['pagetitle'] = 'Duel';
		$txt['title_text'] = '<p><img src="'.$static_url.'/images/icons/duel.png" /> <strong>Challenge a trainer to a duel.</strong> <img src="'.$static_url.'/images/icons/duel.png" /><br />
                The Trainer must be online.</p>';
		$txt['player'] = 'Trainer:';
		$txt['money'] = 'Value:';
		$txt['button_duel'] = 'Challenge';
	}
	
	######################## Attack Duel invited ########################
	else if ($page == 'attack/duel/invited') {
		#Alerts
		$txt['alert_not_enough_silver'] = 'You don\'t have enough silver.';
		$txt['alert_all_pokemon_ko'] = 'All your pokemon are dead.';
		$txt['success_accepted'] = 'You accepted the duel.';
		$txt['success_cancelled'] = 'You refused the duel.';
		$txt['alert_too_late'] = 'You were challenged to a duel, but unfortunately it took you too long to respond.';
		
		#Screen
		$txt['pagetitle'] = 'Duel';
		$txt['dueltext_1'] = 'This duel has a bet worth:';
		$txt['dueltext_2'] = 'challenged you to a duel.';
		$txt['accept'] = 'To accept';
		$txt['cancel'] = 'Refuse';
	}
	
	######################## Attack Wild ########################
	else if ($page == 'attack/wild/wild-attack') {
		#Screen
		$txt['you_won'] = 'You won.';
		$txt['you_lost'] = 'You lost.';
		$txt['you_lost_1'] = 'You missed <img src=\''.$static_url.'/images/icons/silver.png\' title=\'Silver\'>';
		$txt['you_lost_2'] = '<br><a href=\'/pokemoncenter\'>Click here to go to the pokemon center.</a>';
		$txt['you_first_attack'] = 'You start attacking.';
		$txt['opponent_first_attack'] = 'starts attacking.';
		$txt['opponents_turn'] = 'Opponent\'s turn.';
		$txt['your_turn'] = 'It\'s your turn to attack!';
		$txt['have_to_change_1'] = 'Your';
		$txt['have_to_change_2'] = 'has been defeated, you can choose another Pokémon.';
		$txt['next_time_wait'] = 'Wait while your opponent attacks.';
		$txt['fight_finished'] = 'The battle is over.';
		$txt['success_catched_1'] = 'You just captured';
		$txt['success_catched_2'] = 'successfully!';
		$txt['no_item_selected'] = 'Choose an item first!';
		$txt['potion_no_pokemon_selected'] = 'You have to choose a pokemon!';
		$txt['busy_with_attack'] = 'Loading battle..';
		$txt['have_already'] = 'You already have';
		$txt['a_wild'] = 'A savage';
		$txt['potion_text'] = 'Choose which Pokémon you want to use';
		$txt['*'] = '*';
		$txt['pokemon'] = 'Pokémon';
		$txt['level'] = 'Level';
		$txt['health'] = 'Life';
		$txt['potion_egg_text'] = 'Not usable';
		$txt['button_potion'] = 'To use';
		$txt['attack'] = 'Attack';
		$txt['change'] = 'Choice';
		$txt['items'] = 'Items';
		$txt['button_item'] = 'To use';
		$txt['must_attack'] = 'You have to attack';
		$txt['is_ko'] = 'was defeated.';
		$txt['flinched'] = 'is hesitating';
		$txt['sleeps'] = 'he slept.';
		$txt['awake'] = 'he remembered.';
		$txt['frozen'] = 'was frozen.';
		$txt['no_frozen'] = 'it is no longer frozen.';
		$txt['not_paralyzed'] = 'is no longer paralyzed.';
		$txt['paralyzed'] = 'is paralyzed.';
		$txt['fight_over'] = 'The battle is over.';
		$txt['choose_another_pokemon'] = 'Choose another Pokémon.';
		$txt['use_attack_1'] = 'used';
		$txt['use_attack_2'] = ', your Pokémon has been defeated.<br />';
		$txt['use_attack_2_hit'] = ', direct attack.';
		$txt['did'] = 'used';
		$txt['hit!'] = '.';
		$txt['your_attack_turn'] = '<br />It\'s your turn to attack.';
		$txt['opponent_choose_attack'] = 'is choosing an attack.';
		$txt['start_0'] = "You find";
		$txt['start_1'] = "ahead.";
		$txt['appears'] = "he appeared.";
		$txt['defeated_1'] = "You defeated";
		$txt['defeated_2'] = "and got it";
		$txt['defeated_masterball'] = '';
		$txt['get_badge_1'] = 'the insignia';
		$txt['get_badge_2'] = 'and';
		$txt['no_badgecase'] = '';
		$txt['has_defeated_you_1'] = 'defeated you.';
		$txt['has_defeated_you_2'] = 'You lost';
		$txt['bringed'] = 'brings';
		$txt['pagetitle'] = 'A pokemon appeared!';
		
		
		//Start Fight
		$txt['begindood'] = "All your Pokémon were defeated.";
		$txt['opponent_error'] = "Error: No opponents.";
		
		
		//Attack General
		$txt['success_catched_1'] = "You captured";
		$txt['success_catched_2'] = "captured. The battle is over.";
		$txt['new_pokemon_dead']   = "can no longer fight. Your Pokémon has been defeated!";
		$txt['not_your_turn'] = "It's not your turn, it's yours";
		

		
		//Change Pokemon
		$txt['change_block'] = "You can't change your pokemon!";
		$txt['change_egg']  = "You can't pick an egg!";
		$txt['success_change_1']  = "You changed Pokémon.";
		$txt['success_change_2'] = "entered the battle.";
		$txt['success_change_you_attack'] = "You changed Pokémon, it is now battling.";
		$txt['now_pokemon_dead_2'] = "is too weak to enter the battle.";
		
		//Use Pokeball
		$txt['ball_choose'] = "Choose an item you have or battle.";
		$txt['hand_house_full'] = "You don't have room for a new pokemon";  
		$txt['ball_have'] = "You have a pokeball.";
		$txt['ball_amount'] = "You don't have";
		$txt['ball_throw_1'] = "You played a";
		$txt['ball_throw_2'] = ".";
		$txt['ball_success'] = "was captured.";
		$txt['ball_failure'] = "was not captured.";
		$txt['ball_success_2'] = "was sent to his home.";
		
			
		//Use potion
		$txt['potion_choose'] = "Choose an item you have or battle.";  
		$txt['potion_have'] = "You have a potion.";
		$txt['potion_life_full'] = "has been fully recovered";
		$txt['potion_amount'] = "You don't have";
		$txt['potion_life_zero_1'] = "you can";
		$txt['potion_life_zero_2'] = "not recovered";
		$txt['potion_give_1'] = "you gave";
		$txt['potion_give_2'] = "one";
		$txt['potion_give'] = "Did you use a";
		$txt['potion_give_end_1'] = "was regenerated.";
		$txt['potion_give_end_2'] = "was regenerated.";
		$txt['potion_give_end_3'] = "was revived.";
				
		//Function
		$txt['recieve'] = "it received";
		$txt['recieve_boost'] = "it achieved";
		$txt['exp_points'] = "of experience.";
		
		//Run
		$txt['success_run'] = "You managed to escape.";
		$txt['failure_run'] = "You failed trying to escape";
		
		$txt['opponent_choose_attack'] = 'is choosing an attack';
		$txt['opponent_choose_pokemon'] = 'You are choosing a Pokémon.';
		

	} 
	
	
	 ######################## Trainer Attack ########################
	else if ($page == 'attack/trainer/trainer-attack') {
  	#Screen
		$txt['you_won'] = 'You won.';
		$txt['you_lost'] = 'You lost.';
		$txt['you_lost_1'] = 'You missed <img src=\''.$static_url.'/images/icons/silver.png\' title=\'Silver\'>';
		$txt['you_lost_2'] = '<br><a href=\'/pokemoncenter\'>Click here to go to the pokemon center.</a>';
		$txt['you_first_attack'] = 'You start attacking.';
		$txt['opponent_first_attack'] = 'starts attacking.';
		$txt['opponents_turn'] = 'Opponent\'s turn.';
		$txt['your_turn'] = 'It\'s your turn to attack!';
		$txt['have_to_change_1'] = 'Your';
		$txt['have_to_change_2'] = 'has been defeated, you can choose another Pokémon.';
		$txt['next_time_wait'] = 'Wait while your opponent attacks.';
		$txt['fight_finished'] = 'The battle is over.';
		$txt['success_catched_1'] = 'You just captured';
		$txt['success_catched_2'] = 'successfully!';
		$txt['no_item_selected'] = 'Choose an item first!';
		$txt['potion_no_pokemon_selected'] = 'You have to choose a pokemon!';
		$txt['busy_with_attack'] = 'Loading battle..';
		$txt['have_already'] = 'You already have';
		$txt['a_wild'] = 'A savage';
		$txt['potion_text'] = 'Choose which Pokémon you want to use';
		$txt['*'] = '*';
		$txt['pokemon'] = 'Pokémon';
		$txt['level'] = 'Level';
		$txt['health'] = 'Life';
		$txt['potion_egg_text'] = 'Not usable';
		$txt['button_potion'] = 'To use';
		$txt['attack'] = 'Attack';
		$txt['change'] = 'Choice';
		$txt['items'] = 'Items';
		$txt['button_item'] = 'To use';
		$txt['must_attack'] = 'You have to attack';
		$txt['is_ko'] = 'was defeated.';
		$txt['flinched'] = 'is hesitating';
		$txt['sleeps'] = 'he slept.';
		$txt['awake'] = 'he remembered.';
		$txt['frozen'] = 'was frozen.';
		$txt['no_frozen'] = 'it is no longer frozen.';
		$txt['not_paralyzed'] = 'is no longer paralyzed.';
		$txt['paralyzed'] = 'is paralyzed.';
		$txt['fight_over'] = 'The battle is over.';
		$txt['choose_another_pokemon'] = 'Choose another Pokémon.';
		$txt['use_attack_1'] = 'used';
		$txt['use_attack_2'] = ', your Pokémon has been defeated.<br />';
		$txt['use_attack_2_hit'] = ', direct attack.';
		$txt['did'] = 'used';
		$txt['hit!'] = '.';
		$txt['your_attack_turn'] = '<br />It\'s your turn to attack.';
		$txt['opponent_choose_attack'] = 'is choosing an attack.';
		$txt['start_0'] = "You find";
		$txt['start_1'] = "ahead.";
		$txt['appears'] = "he appeared.";
		$txt['defeated_1'] = "You defeated";
		$txt['defeated_2'] = "and got it";
		$txt['defeated_masterball'] = '';
		$txt['get_badge_1'] = 'the insignia';
		$txt['get_badge_2'] = 'and';
		$txt['no_badgecase'] = '';
		$txt['has_defeated_you_1'] = 'defeated you.';
		$txt['has_defeated_you_2'] = 'You lost';
		$txt['bringed'] = 'brings';
		                     
		$txt['pagetitle'] = 'Battle against Trainer';
		
		//Start Fight
		$txt['begindood'] = "All your Pokémon were defeated.";
		$txt['opponent_error'] = "Error: No opponents.";
		
		//Attack General
		$txt['new_pokemon_dead']   = "can no longer fight. Your Pokémon has been defeated!";
		$txt['not_your_turn'] = "It's not your turn, it's your turn";
		
		//Change Pokemon
		$txt['change_block'] = "You can't change your pokemon!";
		$txt['change_egg']  = "You can't pick an egg!";
		$txt['success_change_1']  = "You changed Pokémon.";
		$txt['success_change_2'] = "entered the battle.";
		$txt['success_change_you_attack'] = "You changed Pokémon, it is now battling.";
		$txt['now_pokemon_dead_2'] = "is too weak to enter the battle.";
			
		//Use potion
		$txt['potion_choose'] = "Choose an item you have or battle.";  
		$txt['potion_have'] = "You have a potion.";
		$txt['potion_life_full'] = "has been fully recovered";
		$txt['potion_amount'] = "You don't have";
		$txt['potion_life_zero_1'] = "you can";
		$txt['potion_life_zero_2'] = "not recovered";
		$txt['potion_give_1'] = "you gave";
		$txt['potion_give_2'] = "one";
		$txt['potion_give'] = "Did you use a";
		$txt['potion_give_end_1'] = "was regenerated.";
		$txt['potion_give_end_2'] = "was regenerated.";
		$txt['potion_give_end_3'] = "was revived.";
				
		//Function
		$txt['recieve'] = "it received";
		$txt['recieve_boost'] = "it achieved";
		$txt['exp_points'] = "of experience.";
		
		$txt['opponent_choose_attack'] = 'is choosing an attack';
		$txt['opponent_choose_pokemon'] = 'You are choosing a Pokémon.';
  }

 ######################## Attack Duel ########################
	else if ($page == 'attack/duel/duel-attack') {
		#Screen
		$txt['a_boosted'] = 'it achieved';
		$txt['too_late_lost'] = 'You took too long to attack! You lost!';
		$txt['you_won_dus'] = 'You won by delay!';
		$txt['recieve'] = "it received";
		$txt['recieve_boost'] = "it achieved";
		$txt['exp_points'] = "of experience.";
		
		$txt['you_won'] = 'You won.';
		$txt['you_lost'] = 'You lost.';
		$txt['you_lost_1'] = 'You missed <img src=\''.$static_url.'/images/icons/silver.png\' title=\'Silver\'>';
		$txt['you_lost_2'] = '<br><a href=\'/pokemoncenter\'>Click here to go to the pokemon center.</a>';
		$txt['you_first_attack'] = 'You start attacking.';
		$txt['opponent_first_attack'] = 'starts attacking.';
		$txt['opponents_turn'] = 'Opponent\'s turn.';
		$txt['your_turn'] = 'It\'s your turn to attack!';
		$txt['have_to_change_1'] = 'Your';
		$txt['have_to_change_2'] = 'has been defeated, you can choose another Pokémon.';
		$txt['now_pokemon_dead_2'] = "is too weak to enter the battle.";
		$txt['next_time_wait'] = 'Wait while your opponent attacks.';
		$txt['fight_finished'] = 'The battle is over.';
		$txt['success_catched_1'] = 'You just captured';
		$txt['success_catched_2'] = 'successfully!';
		$txt['no_item_selected'] = 'Choose an item first!';
		$txt['potion_no_pokemon_selected'] = 'You have to choose a pokemon!';
		$txt['busy_with_attack'] = 'Loading battle..';
		$txt['have_already'] = 'You already have';
		$txt['a_wild'] = 'A savage';
		$txt['potion_text'] = 'Choose which Pokémon you want to use';
		$txt['*'] = '*';
		$txt['pokemon'] = 'Pokémon';
		$txt['level'] = 'Level';
		$txt['health'] = 'Life';
		$txt['potion_egg_text'] = 'Not usable';
		$txt['button_potion'] = 'To use';
		$txt['attack'] = 'Attack';
		$txt['change'] = 'Choice';
		$txt['items'] = 'Items';
		$txt['button_item'] = 'To use';
		$txt['must_attack'] = 'You have to attack';
		$txt['is_ko'] = 'was defeated.';
		$txt['flinched'] = 'is hesitating';
		$txt['sleeps'] = 'he slept.';
		$txt['awake'] = 'he remembered.';
		$txt['frozen'] = 'was frozen.';
		$txt['no_frozen'] = 'it is no longer frozen.';
		$txt['not_paralyzed'] = 'is no longer paralyzed.';
		$txt['paralyzed'] = 'is paralyzed.';
		$txt['fight_over'] = 'The battle is over.';
		$txt['choose_another_pokemon'] = 'Choose another Pokémon.';
		$txt['use_attack_1'] = 'used';
		$txt['use_attack_2'] = ', your Pokémon has been defeated.<br />';
		$txt['use_attack_2_hit'] = ', direct attack.';
		$txt['did'] = 'used';
		$txt['hit!'] = '!';
		$txt['your_attack_turn'] = '<br />It\'s your turn to attack.';
		$txt['opponent_choose_attack'] = 'is choosing an attack.';
		$txt['start_0'] = "You find";
		$txt['start_1'] = "ahead.";
		$txt['appears'] = "he appeared.";
		$txt['defeated_1'] = "You defeated";
		$txt['defeated_2'] = "and got it";
		$txt['defeated_masterball'] = '';
		$txt['get_badge_1'] = 'the insignia';
		$txt['get_badge_2'] = 'and';
		$txt['no_badgecase'] = '';
		$txt['has_defeated_you_1'] = 'defeated you.';
		$txt['has_defeated_you_2'] = 'You lost';
		$txt['bringed'] = 'brings';
		
		
		
		$txt['opponent_choose_attack'] = 'is choosing an attack';
		$txt['opponent_choose_pokemon'] = 'You are choosing a Pokémon.';
		
		
		$txt['pagetitle'] = 'Duel';
	}


else if ($page == 'app/includes/resources/poke-evolve') {
	$txt['accepted'] = '%s evolved into %s!';
	$txt['stopped'] = '%s has stopped evolving!';
	$txt['evolueren'] = '%s is evolving into %s!';

	$txt['pagetitle'] = 'New evolution';
	$txt['accept'] = 'To evolve!';
	$txt['stop'] = 'Stop evolution';
} else if ($page == 'app/includes/resources/poke-newattack') {
	$txt['annuleer'] = 'Your Pokémon has not learned %s.';
	$txt['attack'] = 'Your Pokémon learned %s and forgot %s.';

	$txt['pagetitle'] = 'Learn new attack';
	$txt['title_txt'] = 'Here your Pokémon learns new attacks up to a certain level.<br />
		To learn the new attack you must click on one of your old attacks. The old attack will be forgotten.<br />
		If you don\'t want to learn this attack, click the [Cancel] button.<br /><br />
		If you have less than 4 attacks, your Pokémon will automatically accept the new attack.';
	$txt['page_txt'] = 'Your <u>%s</u> is trying to learn <b><u>%s</u></b>.<br />
		Would you like to learn <b><u>%s</u></b>?';
	$txt['cancel'] = 'Cancel';
}else if ($page == 'app/includes/resources/wait') {
if ($type_timer == 'work')			$txt['pagetitle']	= 'Working';
else if ($type_timer == 'pokecenter')	$txt['pagetitle']	= 'Treatment';
else if ($type_timer == 'travel')		$txt['pagetitle']	= 'Traveling';
}else if ($page == 'app/includes/resources/wait-jail') {
$txt['pagetitle']	= 'Prison';
}else if ($page == 'gold-market') {
$txt['pagetitle'] = 'Gold Market';
}else if ($page == 'casino') {
$txt['pagetitle'] = 'Pokémon Casino';
}else if ($page == 'kluis') {
$txt['pagetitle'] = 'Break the secret';
}else if ($page == 'online') {
$txt['pagetitle'] = 'Online Trainers';
}else if ($page == 'town') {
$txt['pagetitle'] = 'City';
}else if ($page == 'town2') {
$txt['pagetitle'] = 'City';
}else if ($page == 'moves') {
$txt['pagetitle'] = 'Pokémon Instructor';
}else if ($page == 'mercado') {
$txt['pagetitle'] = 'Markets';
}else if ($page == 'myhouse') {
$txt['pagetitle'] = 'My house';
}else if ($page == 'minhaconta') {
$txt['pagetitle'] = 'Account Options';
}else if ($page == 'pokemarket') {
$txt['pagetitle'] = 'PokéMarket';
}else if ($page == 'pokemarket2') {
$txt['pagetitle'] = 'Special PokéMarket';
}else if ($page == 'pokemarket3') {
$txt['pagetitle'] = 'Special PokéMarket';
}else if ($page == 'clan-invite2') {
$txt['pagetitle'] = 'Invitation to Clan';
}else if ($page == 'gold-silver-market') {
$txt['pagetitle'] = 'Gold/Silver Shop';
}else if ($page == 'clan-invite') {
$txt['pagetitle'] = 'Invite to the Clan';
}else if ($page == 'clan-make') {
$txt['pagetitle'] = 'Create Clan';
}else if ($page == 'movetutor') {
$txt['pagetitle'] = 'Move Tutor';
}else if ($page == 'moverecorder') {
$txt['pagetitle'] = 'Move Recorder';
}else if ($page == 'itemmarket') {
$txt['pagetitle'] = 'Item Market';
}else if ($page == 'clan-profile') {
$txt['pagetitle'] = 'Clan Profile';
}else if ($page == 'equipe-check') {
$txt['pagetitle'] = 'World Legends Team Security Password';
}else if ($page == 'juiz') {
$txt['pagetitle'] = 'IV Judge';
}else if ($page == 'museu') {
$txt['pagetitle'] = 'Museum';
}else if ($page == 'fishing') {
$txt['pagetitle'] = 'Fishery';
}else if ($page == 'highlow') {
$txt['pagetitle'] = 'Bigger or smaller';
}else if ($page == 'slots') {
$txt['pagetitle'] = 'Slots';
}else if ($page == 'tour') {
$txt['pagetitle'] = 'Tournament';
}else if ($page == 'league') {
$txt['pagetitle'] = 'League';
}else if ($page == 'box') {
$txt['pagetitle'] = 'Pokemon box';
$txt['alert_not_your_pokemon']        = 'Careful! This Pokémon doesn\'t belong to you!';
$txt['alert_house_full']              = 'Your house is full!';
$txt['success_bring']                 = 'You saved your pokemon!';
$txt['alert_hand_full']               = 'You already have 6 Pokémon on your team!';
$txt['alert_pokemon_on_transferlist'] = 'This Pokémon is for sale!';
$txt['success_get']                   = 'You caught your pokemon!';

$txt['title_text_1']       = 'Currently you have a';
$txt['title_text_2']       = 'and you can save';
$txt['title_text_3']       = 'Pokémon.<br />
* Save Pokémon, here you can leave your Pokémon at your home.<br />
* Catch pokemon, here you can see and catch your saved pokemon.<br />
You can only catch a Pokémon if you have at least 1 spot on the team.';
$txt['pokemon_bring_away'] = 'Save pokemon';
$txt['pokemon_pick_up']    = 'My pokemon';
$txt['box']                = 'cardboard box';
$txt['little_house']       = 'small house';
$txt['normal_house']       = 'big house';
$txt['big_house']          = 'mansion';
$txt['places_over']        = 'available slots';
$txt['#']                  = '#';
$txt['clamour_name']       = 'Pokémon';
$txt['level']              = 'Level';
$txt['bring_away']         = 'Save';
$txt['take']               = 'To take';
$txt['button_take']        = 'OK';
$txt['button_bring']       = 'OK';
$txt['empty']              = 'Empty';
$txt['no_pokemon']	   = 'No Pokémon were found.';
}
######################## FLIP A COIN ########################
	else if ($page == 'flip-a-coin') {
	
		#Alerts
		$txt['alert_no_amount'] = 'Enter some value.';
		$txt['alert_too_less_silver'] = 'You don\'t have enough silver.';
		$txt['alert_amount_unknown'] = 'Are you sure you have that amount?';
		$txt['success_win'] = 'GUY - Congratulations, you won';
		$txt['success_lose'] = 'CROWN - Sorry, you lost';
		
		#Screen
		$txt['pagetitle'] = 'Flip the coin!';
		$txt['title_text'] = 'If it falls HEA, you win. <b><br> If you win, the amount you receive is double the amount you bet!';
		$txt['button'] = 'To play!';
	}
	
	######################## WHO IS IT QUIZ ########################
	else if ($page == 'who-is-it-quiz' OR $page == 'poke-scrambler') {
		#Alerts
		$txt['alert_wait'] = 'You have to wait
							  <strong><span id=uur3></span></strong> hour(s)
							  <strong><span id=minuten3> </span>&nbsp;minutes</strong> and 
							  <strong><span id=seconden3></span>&nbsp;seconds</strong> to answer the quiz again.';
		$txt['alert_choose_a_pokemon'] = 'Choose a pokemon.';
		$txt['alert_no_answer'] = 'That\'s not the answer.';
		$txt['success_win'] = 'You got it right! Won <img src="'.$static_url.'/images/icons/ticket.png" title="Ticket"> 100. You can try again in an hour.';
		$txt['success_lose_1'] = 'Wrong answer the correct answer is';
		$txt['success_lose_2'] = 'Please try again in an hour.';
		
		#Screen
		$txt['pagetitle'] = 'Which Pokémon is this?';
		$txt['who_is_it'] = 'Which Pokémon is this?';
		$txt['title_text'] = '<strong>Are you a walking pokedex? To win here you have to!</strong><br />
							  You can try to guess this Pokémon\'s name once every hour.<br />
							  If you get it right, you win <img src="'.$static_url.'/images/icons/ticket.png" title="Ticket"> 100!';
		$txt['choose_a_pokemon'] = 'Choice';
		$txt['button'] = 'OK!';
	}
	
	######################## WHEEL OF FORTUNE ########################
	else if ($page == 'wheel-of-fortune') {
		#Alerts
		$txt['alert_itemplace'] = 'Attention: Your item box is full, you cannot earn items.';
		$txt['alert_no_more_wof'] = 'You can no longer spin the wheel today.';
		$txt['win_100_silver'] = 'You won <img src="'.$static_url.'/images/icons/silver.png" title="Silver"> 100 silvers!';
		$txt['win_250_silver'] = 'You won <img src="'.$static_url.'/images/icons/silver.png" title="Silver"> 250 silvers!';
		$txt['win_5_gold'] = 'You won <img src="'.$static_url.'/images/icons/gold.png" title="gold"> 5 golds!';
		$txt['win_ball'] = 'You won one';
		$txt['alert_itembox_full'] = 'Your item box is full!';
		$txt['lose_jailzone'] = 'OH! NO! You\'ve been arrested!';
		$txt['win_spc_item'] = 'WOW! You have gained a special item:';
		$txt['win_stone'] = 'You won one';
		$txt['win_tm'] = 'You won';
		$txt['reset_wheel'] = 'You can spin the wheel of fortune every time.';
		
		#Screen
		$txt['pagetitle'] = 'Wheel of Fortune';
		$txt['title_text_1'] = 'You have';
		$txt['title_text_2'] = 'remaining chances today.';
		//$txt['premiumtext'] = '<br>Premium members can do this 3 times per day. <a href="./area-market"><strong>Become a Premium Member!</strong></a>';
		$txt['button'] = 'Spin the wheel!';
	}
	
	######################## WHEEL OF FORTUNE ########################
	else if ($page == 'lottery') {
		#Alerts
		$txt['alert_premium_only'] = 'For premium trainers only.';
		$txt['alert_no_amount'] = 'Enter an amount.';
		$txt['alert_unknown_amount'] = 'Invalid quantity.';
		$txt['alert_max_10_tickets'] = 'You can only buy 10 tickets!';
		$txt['alert_not_enough_money'] = 'You don\'t have silvers to buy'.$_POST['aantal'].'ticket(s).';
		$txt['alert_no_tickets_left'] = 'You cannot buy more tickets!';
		$txt['alert_buys_left_1'] = 'You can only buy';
		$txt['alert_buys_left_2'] = 'tickets!';
		$txt['success_lottery'] = 'You bought'.$_POST['aantal'].'ticket(s) successfully.';
		
		#Screen
		$txt['pagetitle'] = 'Lottery';
		$txt['title_text'] = 'Here you can buy pokemon lottery tickets.<br />
								The winning ticket is randomly drawn.<br />
								The more tickets you buy, the more chances you have of winning!';
		$txt['lottery'] = 'Lottery';
		$txt['time'] = 'Ends in:';
		$txt['ticket_price'] = 'Price per ticket:';
		$txt['price_money'] = 'Award:';
		$txt['tickets_sold'] = 'Tickets sold:';
		$txt['last_winner'] = 'Last winner:';
		$txt['button'] = 'OK!';
		$txt['only_premium'] = '* Lottery for premiums only.';
		$txt['buy_tickets'] = 'Tickets purchased:';
		$txt['lottery_closed'] = 'The lottery is currently CLOSED!';
	}
	######################## STEAL ########################
	else if ($page == 'steal') {
		#Alerts
		$txt['alert_no_more_steal'] = 'You can no longer sabotage.';
		$txt['alert_no_username'] = 'Enter the name of a trainer.';
		$txt['alert_steal_from_yourself'] = 'You can\'t sabotage yourself.';
		$txt['alert_username_dont_exist'] = 'The coach doesn\'t exist.';
		$txt['alert_username_incorrect_signs'] = 'The trainer contains invalid characters.';
		$txt['alert_admin_steal'] = 'You cannot sabotage a team member.';
		$txt['alert_is_not_in'] = $_POST['player'].'is not in';
		$txt['alert_too_low_rank'] = $_POST['player'].'doesn\'t have enough rank to be sabotaged';
		$txt['alert_too_low_or_high_rank'] = $_POST['player'].'is too low or too high a rank to be sabotaged';
		$txt['alert_steal_failed_1'] = 'The sabotage failed.';
		$txt['alert_steal_failed_2'] = 'it was stronger.';
		
		$txt['alert_steal_jail'] = 'You were arrested by Officer Jenny.<br>';
		$txt['success_stole_1'] = 'You got it';
		$txt['success_stole_2'] = 'sabotaging'.$_POST['player'];
		
		$txt['alert_steal_jail_text_1'] = 'You are trapped, please wait';
		$txt['alert_steal_jail_text_2'] = 'minutes and';
		$txt['alert_steal_jail_text_3'] = 'seconds.';
		
		//Sreen
		$txt['pagetitle'] = 'Sabotage';
		$txt['title_text'] = 'You can make your Pokémon sabotage an opponent.<br />If you are successful, you will have a chance of getting a good amount of silvers! 	 										 								  
		If you fail, you could be arrested.<br />
									  At most 1 (one) rank higher or lower than yours. The minimum rank to be sabotaged is Junior.<br /><br />';
		
		//$txt['steal_premium_text'] = 'Premiumaccount leden mogen 3 keer per dag iemand beroven. <a href="./area-market"><strong>Word hier premium!</strong></a><br><br>';
		$txt['steal_how_much_1'] = 'You can order your Pokémon to sabotage by <strong>';
		$txt['steal_how_much_2'] = '</strong>times today.';
		$txt['username'] = 'Trainer:';
		$txt['button'] = 'Sabotage!';
	}
	
	######################## SPY ########################
	else if ($page == 'spy') {
		#Alerts
		$txt['alert_no_username'] = 'Enter the name of a trainer.';
		$txt['alert_spy_yourself'] = 'You can\'t spy on yourself.';
		$txt['alert_username_dont_exist'] = 'The coach doesn\'t exist.';
		$txt['alert_not_enough_silver'] = 'You don\'t have enough silvers.';
		$txt['alert_admin_spy'] = 'You cannot spy on a team member';
		$txt['alert_spy_failed'] = 'The espionage failed.';
		$txt['alert_spy_failed_jail_1'] = 'Team Rocket has been taken to prison!<br> You are now';
		$txt['alert_spy_failed_jail_2'] = 'minutes and';
		$txt['alert_spy_failed_jail_3'] = 'seconds in prison.';
		$txt['success_spy'] = 'Espionage carried out successfully!';
		
		#Screen
		$txt['pagetitle'] = 'Spy';
		$txt['username'] = 'Trainer:';
		$txt['button'] = 'Spy!';
		$txt['world'] = 'Zone:';
		$txt['silver_in_hand'] = 'Silvers:';
		$txt['team'] = 'Team:';
		$txt['title_text'] = 'Here you can hire Team Rocket to spy.<br />
								  If successful, you will obtain information on which zone the trainer is in, the amount of silvers the trainer has and you will also obtain information about the team.<br />
								 But if you fail, Team Rocket is arrested, and you end up going along.<br /><br />
								 Team Rocket performs the service by <img src="'.$static_url.'/images/icons/silver.png" title="Silver" style="margin-bottom:-3px;" /> 100 silver.<br><br>';
	}
	
	######################## LVL CHOOSE ########################
	else if ($page == 'lvl-choose') {
		#Alerts
		$txt['success_lvl_choose'] = 'Now you will find pokemon between levels'.$_POST['lvl'].'.';
		
		#Screen
		$txt['pagetitle'] = 'Choose the Level';
		$txt['title_text'] = 'Here you control the level of the Pokémon you will encounter.<br />
  								You can only use the level pick at rank 16 or higher.';
  		$txt['#'] = '#';
		$txt['level'] = 'Level';
		$txt['5-20'] = '5-20';
		$txt['20-40'] = '20-40';
		$txt['40-60'] = '40-60';
		$txt['60-80'] = '60-80';
		$txt['80-100'] = '80-100';
		$txt['button'] = 'OK!';
	}
	######################## RACE INVITE ########################
	else if ($page == 'race-invite') {
		#Alerts
		$txt['alert_no_races_today'] = 'There are no races taking place today.';
		$txt['alert_no_player'] = 'Enter the name of a trainer.';
		$txt['alert_not_yourself'] = 'You can\'t run against yourself.';
		$txt['alert_unknown_amount'] = 'Invalid value.';
		$txt['alert_no_amount'] = 'Enter a value.';
		$txt['alert_unknown_what'] = 'Choose whether you want to run for silver or gold.';
		$txt['alert_not_enough_silver_or_gold'] = 'You don\'t have enough silver or gold.';
		$txt['alert_user_unknown'] = 'The coach doesn\'t exist.';
		$txt['alert_opponent_not_in'] = 'is not in';
		$txt['alert_opponent_not_casual'] = 'The opponent does not have enough rank.';
		$txt['alert_no_admin'] = 'You cannot challenge a team member to a race.';
		$txt['success'] = 'You challenged'.$_POST['naam'].'for a successful race!';
		
		#Screen
		$txt['pagetitle'] = 'Race';
		$txt['title_text'] = '<img src="'.$static_url.'/images/icons/vlag.png" width="16" height="16" alt="Race" /> <strong>Challenge a coach to run 5 km!</strong> <img src="'.$static_url.'/images/icons/vlag.png" width="16" height="16" alt="Race" />';
		$txt['races_left_today'] = 'Remaining races today:';
		//$txt['premium_10_times'] = 'Premium Members can challenge someone 10 times a day, <a href="./area-market">word premium hier!</a>.';
		$txt['player'] = 'Trainer:';
		$txt['silver_or_gold'] = 'Silver or gold:';
		$txt['amount'] = 'Value:';
		$txt['button'] = 'Run!';
		$txt['races_opened'] = 'Open races';
		$txt['races_deleted_3_days'] = 'If the coach does not respond within 3 days, the race will automatically be deleted.';
		$txt['#'] = '#';
		$txt['opponent'] = 'Opponent';
		$txt['price'] = 'Award';
		$txt['when'] = 'When';
		$txt['no_races_opened'] = 'You don\'t have open races.';
	}
	
	######################## RACE ########################
	else if ($page == 'race') {
		#Alerts
		$txt['pagetitle'] = 'Race';
		$txt['alert_to_low_rank'] = 'You don\'t have enough rank to race.';
		$txt['alert_no_pokemon_in_hand'] = 'You don\'t have any Pokémon on your team.';
		$txt['alert_link_invalid'] = 'Invalid link.';
		$txt['alert_race_invalid'] = 'The race is not available.';
		$txt['alert_not_enough_money'] = 'You don\'t have silver or gold.';
		$txt['success_denied'] = 'You turned down the race!';
		$txt['success_accepted'] = 'You accepted the race! You will soon receive an event with the results.';
		
	}
	######################## NAME SPECIALIST ########################
	else if ($page == 'name-specialist') {
		#Alerts
		$txt['alert_nothing_selected'] = 'You have to choose a pokemon.';
		$txt['alert_not_enough_silver'] = 'You don\'t have enough silver';
		$txt['alert_name_too_long'] = 'The name cannot contain more than 12 characters.';
		$txt['alert_not_your_pokemon'] = 'This Pokémon is not yours.';
		$txt['success_namespecialist'] = 'Congratulations, the Pokémon\'s name has been changed to:';
		
		#Screen
		$txt['pagetitle'] = 'Name changer';
		$txt['title_text'] = 'Here you can change the names of your Pokémon!<br />
							Changing the name of your Pokémon has a small cost.';
		$txt['#'] = '#';
		$txt['name_now'] = 'Name';
		$txt['button'] = 'Change Name!';
	}
	
	######################## SHINY SPECIALIST ########################
	else if ($page == 'shiny-specialist') {
		#Alerts
		$txt['alert_no_pokemon_selected'] = 'Choose a pokemon.';
		$txt['alert_pokemon_is_egg'] = 'This Pokémon is an egg.';
		$txt['alert_not_your_pokemon'] = 'This Pokémon is not yours.';
		$txt['alert_already_shiny'] = 'This Pokémon is already shiny!';
		$txt['alert_pokemon_not_in_hand'] = 'The Pokémon is not on your team.';
		$txt['alert_not_enough_gold'] = 'You don\'t have enough gold.';
		$txt['success'] = 'Congratulations, the Pokémon is now shiny!';
		
		#Screen
		$txt['pagetitle'] = 'Shiny Specialist';
		$txt['title_text'] = 'Scientists have some news:<br />
                They discovered a way to turn any Pokémon into shiny!<br />
               The procedure is very delicate and costs a lot to reproduce.<br />
                We can make your Pokémon shiny for a small fee.<br><br>';
		$txt['#'] = '#';
		$txt['gold_need'] = 'Value';
		$txt['button'] = 'OK!';
	}
	
		######################## MYSTERIOUS SPECIALIST ########################
	else if ($page == 'mysterious-specialist') {
		#Alerts
		$txt['alert_no_pokemon_selected'] = 'Choose a pokemon.';
		$txt['alert_pokemon_is_egg'] = 'This Pokémon is an egg.';
		$txt['alert_not_your_pokemon'] = 'This Pokémon is not yours.';
		$txt['alert_not_arceus'] = 'This Pokémon is not an Arceus!';
		$txt['alert_not_chances'] = 'This Arceus no longer reacts to plates!';
		$txt['alert_pokemon_not_in_hand'] = 'The Pokémon is not on your team.';
		$txt['alert_not_enough_gold'] = 'You don\'t have enough golds.';
		//$txt['success'] = 'Parabéns, o pokémon agora é shiny!';
		
		#Screen
		$txt['pagetitle'] = 'Museum';
		$txt['title_text'] = 'Archaeologists have great news:<br>
		 They found some mysterious items called “Plates” and <br>believe that these items are capable of reacting with Arceus,<br>making it change shape. Would you like to try it? <br><font color="red">ATTENTION:</font> There is a 5% chance that Arceus will return to its common form.<br><br>';
		$txt['#'] = '#';
		$txt['gold_need'] = 'Value';
		$txt['button'] = 'OK!';
	}
	
	        ######################## MUSEU ########################
	else if ($page == 'mysterious-specialist2') {
		#Alerts
		$txt['alert_no_pokemon_selected'] = 'Choose a pokemon.';
		$txt['alert_pokemon_is_egg'] = 'This Pokémon is an egg.';
		$txt['alert_not_your_pokemon'] = 'This Pokémon is not yours.';
		$txt['alert_not_arceus'] = 'This Pokémon is not a Deoxys!';
		$txt['alert_not_chances'] = 'This Deoxys no longer reacts to meteorite!';
		$txt['alert_lvl100'] = 'This Deoxys is level 100, meteorite doesn\'t work on it!';		
		$txt['alert_pokemon_not_in_hand'] = 'The Pokémon is not on your team.';
		$txt['alert_not_enough_gold'] = 'You don\'t have enough golds.';
		//$txt['success'] = 'Parabéns, o pokémon agora é shiny!';
		
		#Screen
		$txt['pagetitle'] = 'Museum';
		$txt['title_text'] = 'Archaeologists made a great discovery:<br>
		 They found a large meteorite that appears to have special<br>characteristics... it is believed to be capable of making the pokemon<br>Deoxys change form. Would you like to try it?<br><font color="red">ATTENTION:</font> There is a 5% chance that Deoxys will return to its common form.<br><br>';
		$txt['#'] = '#';
		$txt['gold_need'] = 'Value';
		$txt['button'] = 'OK!';
	}
	else if ($page == 'mysterious-specialist3') {
		#Alerts
		$txt['alert_no_pokemon_selected'] = 'Choose a pokemon.';
		$txt['alert_pokemon_is_egg'] = 'This Pokémon is an egg.';
		$txt['alert_not_your_pokemon'] = 'This Pokémon is not yours.';
		$txt['alert_not_arceus'] = 'This Pokémon is not a Pikachu Cosplay!';
		$txt['alert_not_chances'] = 'This Pikachu Cosplay no longer reacts to meteorite!';
		$txt['alert_lvl100'] = 'This Pikachu Cosplay is level 100, meteorite does not work on it!';		
		$txt['alert_pokemon_not_in_hand'] = 'The Pokémon is not on your team.';
		$txt['alert_not_enough_gold'] = 'You don\'t have enough silvers.';
		//$txt['success'] = 'Parabéns, o pokémon agora é shiny!';
		
		#Screen
		$txt['pagetitle'] = 'Pikachu dressing room';
		$txt['title_text'] = 'Welcome to the Pikachu Dressing Room! <br><br>Here you can change the clothes of your Pikachu Cosplay <br>at the cost of a small amount of silvers! <br>Remember that each outfit gives your Cosplay Pikachu different abilities! <br>Enjoy!<br><br>';
		$txt['#'] = '#';
		$txt['gold_need'] = 'Value';
		$txt['button'] = 'OK!';
	}
		else if ($page == 'trainer') {
		$txt['pagetitle'] = 'Battle Trainers';
		$txt['alert_no_pokemon'] = "You don't have any Pokémon willing to battle.";
	}
	else if ($page == 'clans') {
		$txt['pagetitle'] = 'Clan Ranking';
	
	}
	
	######################## SEARCH USER ########################
	else if ($page == 'search-user') {
		#Screen
		$txt['pagetitle'] = 'Search for Trainer';
		$txt['title_text'] = '<img src="'.$static_url.'/images/icons/groep_magnify.png" border="0" /> <strong>Search for a Trainer.</strong>';
		$txt['username'] = 'Trainer';
		$txt['#'] = '#';
		$txt['country'] = 'Country';
		$txt['rank'] = 'Rank';
		$txt['status'] = 'Status';
		$txt['offline'] = 'Offline';
		$txt['online'] = 'Online';
		$txt['button'] = 'OK!';
	}
	######################## HOUSE SELLER ########################
	else if ($page == 'house-seller') {
		#Alerts
		$txt['alert_nothing_selected'] = 'You need to select a house.';
		$txt['alert_you_own_this_house'] = 'You already have this house!';
		$txt['alert_not_enough_silver'] = 'You don\'t have silver to buy this house.';
		$txt['alert_already_have_villa'] = 'You already have a Mansion, you can\'t buy anything better.';
		$txt['alert_you_have_better_now'] = 'You already have a better house.';
		$txt['success_house_1'] = 'Congratulations, you just bought one';
		$txt['success_house_2'] = 'successfully!';
		
		#Screen
		$txt['pagetitle'] = 'house seller';
		$txt['house1'] = 'cardboard box';
		$txt['house2'] = 'Small house';
		$txt['house3'] = 'Normal house';
		$txt['house4'] = 'Mansion';
		$txt['title_text'] = 'Here I have some house models, see which one you like best.<br />
							  Do you currently have a';
		$txt['house'] = 'Home';
		$txt['price'] = 'Price';
		$txt['description'] = 'Description';
		$txt['button'] = 'OK!';
	}
	######################## BANK ########################
	else if ($page == 'bank') {
		#Alerts
		$txt['alert_no_more_storting'] = 'You can no longer deposit today.';
		$txt['alert_nothing_insert'] = 'Enter some value.';
		$txt['alert_amount_unknown'] = 'Invalid value entered.';
		$txt['alert_too_less_cash'] = 'You don\'t have that amount with you.';
		$txt['alert_no_silver_or_gold'] = 'You have to choose silver or gold.';
		$txt['success_stort'] = $_POST['stort'].'<img src="'.$static_url.'/images/icons/silver.png" title="Silver" style="margin-bottom:-3px;"> deposited successfully.';
		$txt['alert_too_less_bank'] = 'You don\'t have that amount in the bank.';
		$txt['success_take'] = $_POST['ophaal'].'<img src="'.$static_url.'/images/icons/silver.png" title="Silver" style="margin-bottom:-3px;"> removed successfully.';
		$txt['alert_no_receiver'] = 'Enter a trainer to whom the amount will be transferred.';
		$txt['alert_send_to_yourself'] = 'You can\'t send it to yourself.';
		$txt['alert_receiver_dont_exist'] = 'The recipient trainer does not exist.';
		$txt['alert_more_than_10silver'] = 'The value must be greater than <img src="'.$static_url.'/images/icons/silver.png" title="Silver" style="margin-bottom:-3px;"> 10 to be transferred.';
		$txt['alert_too_less_money'] = 'You don\'t have that amount of silver.';
		$txt['alert_too_less_gold'] = 'You don\'t have that amount of gold.';
		$txt['success_send'] = 'Amount transferred successfully.';
		
		#Screen
		$txt['pagetitle'] = 'Bank';
		$txt['title_text_1'] = 'Silver in hand:';
		$txt['title_text_2'] = 'Silver in the bank:';
		$txt['title_text_3'] = 'You can still deposit silvers for<font color="red">';
		$txt['title_text_4'] = '</font>times today.';
		$txt['amount_silver'] = 'Silver:';
		$txt['silver_or_gold'] = 'Silver or Gold:';
		$txt['amount'] = 'Value:';
		$txt['button_stort'] = 'Deposit in the bank!';
		$txt['button_take'] = 'Withdraw from bank';
		$txt['title_text_send'] = '<font size="4"><hr>Download</font><br>
										<font size="2">Minimum <img src="'.$static_url.'/images/icons/silver.png" title="Silver" style="margin-bottom:-3px;" /> 10 per transaction.<br>Minimum rank required to transfer Golds: 8-Macho.</font>';
		$txt['username'] = 'Trainer:';
		$txt['button_send'] = 'To send!';
	}
######################## SEND MESSAGE ########################
	else if ($page == 'send-message') {
		#Alerts
		$txt['alert_no_receiver'] = 'You didn\'t type who the message is for.';
		$txt['alert_inbox_full'] = 'The box'.$_POST['ontvanger'].'is full.';
		$txt['alert_receiver_blocked'] = 'You blocked'.$_POST['ontvanger'].'.';
		$txt['alert_has_blocked_you'] = $_POST['ontvanger'].'blocked you.';
		$txt['alert_message_to_yourself'] = 'You can\'t text yourself.';
		$txt['alert_username_dont_exist'] = $_POST['ontvanger'].'does not exist.';
		$txt['alert_no_subject'] = 'Enter a subject.';
		$txt['alert_subject_wrong_signs'] = 'The subject has invalid characters.';
		$txt['alert_text_wrong_signs'] = 'The message cannot contain <.';
		$txt['alert_no_message'] = 'Enter a message.';
		$txt['success_send_message'] = 'Message sent successfully to'.$_POST['ontvanger'].'.';
		
		#Screen
		$txt['pagetitle'] = 'Write Message';
		//$txt['link_text_effects'] = '<u><a href="codes.php?category=message" class="colorbox" title="Text effects for profile"><b>Here</b></a></u> you can see how your text effects to apply or insert pictures';
		$txt['name_receiver'] = 'To:';
		$txt['subject'] = 'Subject:';
		//$txt['more_emoticons'] = 'For more emoticons <a href=\'./area-market\'><strong>Klik hier</strong></a>';
		$txt['button'] = 'To send!';
	}
######################## INBOX ########################
	else if ($page == 'inbox') {
		#Alerts
		$txt['alert_nothing_selected'] = 'No messages were deleted.';
		$txt['success_deleted'] = 'You have successfully deleted your message(s)!';
		
		#Screen
		$txt['pagetitle'] = 'Messages';
		$txt['new_check'] = 'New';
		$txt['subject'] = 'Subject';
		$txt['username'] = 'Of';
		$txt['status'] = 'Status';
		$txt['online'] = 'Online';
		$txt['offline'] = 'Offline';
		$txt['date-time'] = 'Date/Time';
		$txt['no_messages'] = '<center>No new messages.</center>';
		$txt['button'] = 'Delete';
	} else if ($page == 'official-messages') {
		$txt['pagetitle'] = 'Official Messages';

	}
	######################## SEND MESSAGE ########################
	else if ($page == 'read-message') {
		#Alerts
		$txt['alert_link_incorrect'] = 'Invalid link.';
		$txt['alert_not_your_message'] = 'This message is not for you.';
		$txt['alert_inbox_full'] = 'Full box.';
		$txt['alert_receiver_blocked'] = 'You cannot reply to this message, you have blocked this Trainer.';
		$txt['alert_has_blocked_you'] = 'You cannot reply to this message, you have been blocked by this Trainer.';
		$txt['alert_text_wrong_signs'] = 'The message cannot contain <.';
		$txt['alert_no_message'] = 'Enter a message.';
		$txt['success_send_message'] = 'Message sent successfully to';
		
		#Screen
		$txt['from_player'] = 'From the Coach:';
		$txt['subject'] = 'Subject:';
		$txt['respond'] = 'Reply message';
		$txt['inbox'] = 'Box';
		$txt['block'] = 'Block';
		$txt['pagetitle'] = 'View Message';
		//$txt['link_text_effects'] = '<u><a href="codes.php?category=message" class="colorbox" title="Text effects for profile"><b>Hier</b></a></u> you can see how your text effects to apply or insert pictures.';
		//$txt['more_emoticons'] = 'Voor meer emoticons <a href=\'./area-market\'><strong>Klik hier</strong></a>';
		$txt['button'] = 'Send message!';
	}
######################## BUDDYLIST ########################
	else if ($page == 'buddylist') {
		#Alerts
		$txt['success_deleted'] = $_POST['deletenaam'].'has been successfully removed from your friends list.';
		$txt['alert_buddy_not_yourself'] = 'You cannot add yourself as a friend.';
		$txt['alert_username_dont_exist'] = 'The coach doesn\'t exist.';
		$txt['alert_already_buddy'] = $_POST['buddynaam'].'He\'s already your friend.';
		$txt['alert_is_blocked'] = $_POST['buddynaam'].'is on your blocked list.';
		$txt['success_add'] = $_POST['buddynaam'].'has been added as your friend.';
		
		#Screen
		$txt['pagetitle'] = 'Friends';
		$txt['title_text'] = '<img src="'.$static_url.'/images/icons/groep.png" width="16" height="16" /> <strong>Add Friend</strong>';
		$txt['username'] = 'Trainer:';
		$txt['#'] = '#';
		$txt['country'] = 'Country';
		$txt['status'] = 'Status';
		$txt['actions'] = 'Actions';
		$txt['offline'] = 'Offline';
		$txt['online'] = 'Online';
		$txt['send_message'] = 'Send message.';
		$txt['donate_silver'] = 'Send silver or gold.';
		$txt['delete_buddy'] = 'Unfriend.';
		$txt['no_buddys'] = 'You have no friends. ;(';
		$txt['button'] = 'To add!';
	}
	
	######################## POKEMON INFO ########################
	else if ($page == 'blocklist') {
		#Alerts
		$txt['success_deleted'] = $_POST['deletenaam'].'has been removed from your blocked list.';
		$txt['alert_block_yourself'] = 'You can\'t block it yourself.';
		$txt['alert_unknown_username'] = 'Non-existent trainer.';
		$txt['alert_already_in_blocklist'] = $_POST['blocknaam'].'was blocked.';
		$txt['alert_is_your_buddy'] = $_POST['blocknaam'].'It cannot be blocked because it is already your friend.';
		$txt['alert_admin_block'] = 'You cannot block a Team member.';
		$txt['success_blocked'] = $_POST['blocknaam'].'has been blocked successfully.';
		
		#Screen
		$txt['pagetitle'] = 'Blocked';
		$txt['title_text'] = '<img src="'.$static_url.'/images/icons/blokkeer.png" border="0" /> <strong>Block Trainer</strong><br />If you block a trainer you will not receive any messages and will not be able to send a message to him.';
		$txt['username'] = 'Trainer:';
		$txt['button'] = 'Block!';
		$txt['*'] = '*';
		$txt['#'] = '#';
		$txt['country'] = 'Country';
		$txt['status'] = 'Status';
		$txt['actions'] = 'Actions';
		$txt['offline'] = 'Offline';
		$txt['online'] = 'Online';
		$txt['block_delete'] = 'Remove';
		$txt['nobody_blocked'] = 'You don\'t have any blocked trainers.';
	}
else if ($page == 'venderitens') {
$txt['pagetitle'] = 'Sell ​​Items';
$txt['sellprice'] = "PokéMart Price";
$txt['alert_no_amount']               = 'Enter a quantity!';
	$txt['alert_too_much_items_selected'] = 'You don\'t have this amount!';
	$txt['success_items']                 = 'You sold' . $_POST['amount'] . 'x' . $_POST['name'] . '';


	$txt['title_text_1']     = 'You have';
	$txt['title_text_2']     = 'free slot(s).';
	$txt['name']             = 'Item';
	$txt['number']           = 'Amount';
	$txt['sellprice']        = 'Value';
	$txt['sell']             = 'Sell';
	$txt['use']              = 'To use';
	$txt['balls']            = 'Poké Balls';
	$txt['potions']          = 'Potions';
	$txt['items']            = 'Items';
	$txt['badge_case_title'] = 'A box for your badge collection.';
	$txt['box_title']        = 'You can leave your items at';
	$txt['spc_items']        = 'Special Items';
	$txt['stones']           = 'Stones';
	$txt['tm']               = 'TM';
	$txt['hm']               = 'HM';
	$txt['button_use']       = 'To use';
	$txt['button_sell']      = 'Sell';
	$txt['no_item']          = 'No items found in this category!';

} else if ($page == 'market2') {
	$txt['alert_itemplace']        = '<b>Note:</b> You need to have free slots before purchasing any items.';
	$txt['alert_not_enough_money'] = 'You can\'t pay for this!';
	$txt['alert_itembox_full_1']   = 'Item box full! You can save';
	$txt['alert_itembox_full_2']   = 'potions!';
	$txt['success_market']         = 'You bought';
	$txt['alert_nothing_selected'] = 'Select something!';
	$txt['alert_pokedex_chip']     = 'You can\'t buy the Pokédex Chip without having the Pokédex!';
	$txt['alert_not_enough_place'] = 'Your item box is full!';
	$txt['alert_hand_full']        = 'You already have 6 Pokémon with you!';
	$txt['alert_not_in_stock']     = 'We currently do not have this product available!';
	
	$txt['pagetitle'] = $event_n_loja;
	$txt['balls']     = 'Poké Balls';
	$txt['potions']   = 'Potions';
	$txt['items']     = 'Items';
	$txt['spc_items'] = 'Special Items';
	$txt['stones']    = 'Stones';
	$txt['attacks']   = 'Attacks';
	$txt['pokemon']   = 'Pokémon';
	
	if ($_GET['shopitem'] == 'balls') {
		$txt['pagetitle']    .= ' - Pokébolas';
		$txt['button_balls'] = 'Buy Pokéballs';
	} else if ($_GET['shopitem'] == 'potions') {
		$txt['pagetitle']      .= ' - Poções';
		$txt['button_potions'] = 'Buy potions';
	} else if ($_GET['shopitem'] == 'items') {
		$txt['pagetitle']    .= ' - Itens';
		$txt['button_items'] = 'Buy items';
	} else if ($_GET['shopitem'] == 'specialitems') {
		$txt['pagetitle']        .= ' - Itens especais';
		$txt['button_spc_items'] = 'Buy special items';
	} else if ($_GET['shopitem'] == 'stones') {
		$txt['pagetitle']     .= ' - Pedras';
		$txt['button_stones'] = 'Buy stones';
	} else if ($_GET['shopitem'] == 'attacks') {
		$txt['pagetitle']           .= ' - Ataques';
		$txt['button_attacks']      = 'Buy attacks';
		$txt['market_attack_types'] = 'Pokémon can learn attacks.';
	} else if ($_GET['shopitem'] == 'pokemon') {
		$txt['pagetitle']             .= ' - Pokémons';
		$txt['button_pokemon']         = 'Buy pokemon';
		$txt['not_rare']               = 'Common';
		$txt['middle_rare']            = 'Unusual';
		$txt['rare']                   = 'Rare';
		$txt['out_of_stock_1']         = 'All Pokémon sold on the market';
		$txt['out_of_stock_2']         = '';
		$txt['success_bought_pokemon'] = '1 pokemon egg!';
	}
}  else if ($page == 'market3') {
	$txt['alert_itemplace']        = '<b>Note:</b> You need to have free slots before purchasing any items.';
	$txt['alert_not_enough_money'] = 'You can\'t pay for this!';
	$txt['alert_itembox_full_1']   = 'Item box full! You can save';
	$txt['alert_itembox_full_2']   = 'potions!';
	$txt['success_market']         = 'You bought';
	$txt['alert_nothing_selected'] = 'Select something!';
	$txt['alert_pokedex_chip']     = 'You can\'t buy the Pokédex Chip without having the Pokédex!';
	$txt['alert_not_enough_place'] = 'Your item box is full!';
	$txt['alert_hand_full']        = 'You already have 6 Pokémon with you!';
	$txt['alert_not_in_stock']     = 'We currently do not have this product available!';
	
	$txt['pagetitle'] = 'New Year Shop';
	$txt['balls']     = 'Poké Balls';
	$txt['potions']   = 'Potions';
	$txt['items']     = 'Items';
	$txt['spc_items'] = 'Special Items';
	$txt['stones']    = 'Stones';
	$txt['attacks']   = 'Attacks';
	$txt['pokemon']   = 'Pokémon';
	
	if ($_GET['shopitem'] == 'balls') {
		$txt['pagetitle']    .= ' - Pokébolas';
		$txt['button_balls'] = 'Buy Pokéballs';
	} else if ($_GET['shopitem'] == 'potions') {
		$txt['pagetitle']      .= ' - Poções';
		$txt['button_potions'] = 'Buy potions';
	} else if ($_GET['shopitem'] == 'items') {
		$txt['pagetitle']    .= ' - Itens';
		$txt['button_items'] = 'Buy items';
	} else if ($_GET['shopitem'] == 'specialitems') {
		$txt['pagetitle']        .= ' - Itens especais';
		$txt['button_spc_items'] = 'Buy special items';
	} else if ($_GET['shopitem'] == 'stones') {
		$txt['pagetitle']     .= ' - Pedras';
		$txt['button_stones'] = 'Buy stones';
	} else if ($_GET['shopitem'] == 'attacks') {
		$txt['pagetitle']           .= ' - Ataques';
		$txt['button_attacks']      = 'Buy attacks';
		$txt['market_attack_types'] = 'Pokémon can learn attacks.';
	} else if ($_GET['shopitem'] == 'pokemon') {
		$txt['pagetitle']             .= ' - Pokémons';
		$txt['button_pokemon']         = 'Buy pokemon';
		$txt['not_rare']               = 'Common';
		$txt['middle_rare']            = 'Unusual';
		$txt['rare']                   = 'Rare';
		$txt['out_of_stock_1']         = 'All Pokémon sold on the market';
		$txt['out_of_stock_2']         = '';
		$txt['success_bought_pokemon'] = '1 pokemon egg!';
	}
} else if (strstr($page, 'admin/') == true) {
	$txt['pagetitle'] = 'Administrative Panel';
} else if ($page == 'pokemon-profile') {
	$txt['pagetitle'] = 'Pokemon profile';
}
?>