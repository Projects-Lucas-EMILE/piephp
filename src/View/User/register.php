<!--<form action="/localhost_piephp/registerUser" method="post">-->
<form action="/localhost_piephp/User/registerUser" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" placeholder="email" name="email" required><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" placeholder="password" name="password" required><br><br>
    <label for="firstname">First Name:</label>
    <input type="text" id="firstname" placeholder="firstname" name="firstname" required><br><br>
    <label for="lastname">Lastname:</label>
    <input type="text" id="lastname" placeholder="lastname" name="lastname" required><br><br>
    <label for="birthdate">Birthdate:</label>
    <input type="date" id="birthdate" placeholder="birthdate" name="birthdate" required><br><br>
    <label for="address">Address:</label>
    <input type="text" id="address" placeholder="address" name="address" required><br><br>
    <label for="zipcode">Zipcode:</label>
    <input type="text" id="zipcode" placeholder="zipcode" name="zipcode" required><br><br>
    <label for="city">City:</label>
    <input type="text" id="city" placeholder="city" name="city" required><br><br>
    <label for="country">Country:</label>
    <input type="text" id="country" placeholder="country" name="country" required><br><br>
    <button type="submit">Sign Up</button>
</form>
<button onclick="window.location='/localhost_piephp/User/Login'">Login</button>
