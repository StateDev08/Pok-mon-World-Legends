<?php
if (empty($_SESSION['acc_id']) || empty($_SESSION['acc_naam']))
	exit(header('Location: ./error'));