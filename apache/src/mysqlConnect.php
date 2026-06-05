<?php
    const
    host = 'mysql',
    dbUser = 'root',
    password = 'none',
    db = 'db';

function connectDB(): mysqli { return new mysqli(
    host, dbUser, password, db
); }
?>