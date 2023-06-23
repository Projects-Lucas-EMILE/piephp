<!--<form action="/localhost_piephp/loginUser" method="post">-->
<form action="/localhost_piephp/User/loginUser" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" placeholder="email" name="email" required><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" placeholder="password" name="password"><br><br>
    <button type="submit">Login</button>
</form>
<button onclick="window.location='/localhost_piephp/User/register'">Sign Up</button>