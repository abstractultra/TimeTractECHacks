<?php
include "credentials/sql_credentials.php";
$db = new mysqli($server_name,$db_username,$db_password,$database_name);

// Create necessary tables

$db->query("create table if not exists accounts (id integer primary key auto_increment, username text, password text, email text, display_name text, uuid text, group_id text, api_key text, json_data text, update_time integer)");

$db->query("create table if not exists pacts (id integer primary key auto_increment, group_uuid text, leader_uuid text, group_name text, password text)");

$db->query("create table if not exists active_sessions (id integer primary key auto_increment, session_uuid text, user_uuid text, expiry integer)");