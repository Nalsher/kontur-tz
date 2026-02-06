<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Creating contact</title>
    </head>
    <body>
        <div style="display: block">
            <input name="name" type="text" id="name" placeholder="Contact name" required />        
            <input name="email" type="text" id="email" placeholder="Email" required/>
            <input type="phone" id="phone" name="phone" placeholder="+7 (___) ___-__-__" pattern="\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}" required>
            <button id="createButton">Create</button>
        </div>
        
    </body>
</html>
