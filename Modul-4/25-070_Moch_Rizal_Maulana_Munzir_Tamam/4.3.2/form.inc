<form style="background-color: grey; color: white;" action="" method="POST">
        <fieldset>
            <legend>Informasi Pribadi User</legend>
                <label for="surname">Surname:</label><br>
                <input type="text" id="surname" name="surname" placeholder="Masukan Username">
                <br>
                <label for="email">Email Address:</label><br>
                <input type="text" id="email" name="email" placeholder="Masukan Email">
                <br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" placeholder="Masukan Password">
                <br>
                <label for="address">Street Address:</label><br>
                <textarea id="address" name="address" rows="3" cols="22" placeholder="Masukan Alamat"></textarea>
                <br>
                <label for="state">State:</label><br>
                <select id="state" name="state">
                    <option value="-1">[choose your state]</option>
                    <option value="1">Australian</option>
                    <option value="2">Indonesia</option>
                    <option value="3">UK</option>
                    <option value="4">South Korea</option>
                </select>
            <input type="hidden" name="country" value="Australia">
            <br>
                <label>Gender:</label><br>
                <input type="radio" name="sex" value="male"> Male
                <input type="radio" name="sex" value="female"> Female
            <br>
                <label>Vegetarian?</label>
                <input type="checkbox" name="vegetarian" value="1">
            <br>
                <button type="submit" name="submit">Submit</button>
                <button type="reset">Reset</button>
            <br>
        </fieldset>
    </form>