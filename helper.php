<?php

const HOST = 'localhost';
const USER = 'root';
const PASS = '';
const DB = 'db_catatanlist';

$db_connect = mysqli_connect(HOST,USER,PASS,DB) or die ('Unable connect');
header('Content-Type: application/json');