<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CV Generator</title>
</head>
<body>
<form method="post" action="CV.php">
    <fieldset>
        <legend>Personal Information:</legend>
        <input type="text" name="firstName" placeholder="First Name"/><br/>
        <input type="text" name="lastName" placeholder="Last Name"/><br/>
        <input type="email" name="email" placeholder="Email"/><br/>
        <input type="text" name="phoneNumber" placeholder="Phone Number"/><br/>
        Female <input type="radio" name="gender" value="female"/>
        Male <input type="radio" name="gender" value="male"/><br/>
        <label for="birthDate">Birth Date</label><br/>
        <input type="date" id="birthDate" name="birthDate"/><br/>
        <label for="nationality">Nationality</label><br/>
        <select name="nationality">
            <option value="bulgarian" name="bg">Bulgarian</option>
            <option value="canada" name="ca">Canadian</option>
        </select>
    </fieldset>
    <fieldset>
        <legend>Last Work Position</legend>
        Company Name <input type="text" name="companyName"/><br/>
        From <input type="date" name="from"/><br/>
        To <input type="date" name="to"/>
    </fieldset>
    <fieldset>
        <legend>Computer Skills</legend>
        Programming Languages <br/>
        <input type="text" name="programLanguage[]"/>
        <select name="languageLevel[]">
            <option value="beginner" name="beginner">Beginner</option>
            <option value="programmer" name="programmer">Programmer</option>
            <option value="ninja" name="ninja">Ninja</option>
        </select><br/>
        <div id="parent1">
            <!-- We shall add inputs here with JavaScript -->
        </div>

        <button type="button" onclick="removeElement1()">Remove Language</button>
        <button type="button" onclick="addInput1()">Add Language</button>
    </fieldset>
    <fieldset>
        <legend>Other Skills</legend>
        Languages <br/>
        <input type="text" name="language[]"/>
        <select name="comprehension[]">
            <option value="beginner" name="beginner">-Comprehension-</option>
            <option value="beginner" name="beginner">beginner</option>
            <option value="programmer" name="programmer">intermediate</option>
            <option value="ninja" name="ninja">advanced</option>
        </select>
        <select name="reading[]">
            <option value="beginner" name="beginner">-Reading-</option>
            <option value="beginner" name="beginner">beginner</option>
            <option value="programmer" name="programmer">intermediate</option>
            <option value="ninja" name="ninja">advanced</option>
        </select>
        <select name="writing[]">
            <option value="beginner" name="beginner">-Writing-</option>
            <option value="beginner" name="beginner">beginner</option>
            <option value="programmer" name="programmer">intermediate</option>
            <option value="ninja" name="ninja">advanced</option>
        </select><br/>
        <div id="parent2">
            <!-- We shall add inputs here with JavaScript -->
        </div>

        <button type="button" onclick="removeElement2()">Remove Language</button>
        <button type="button" onclick="addInput2()">Add Language</button>
        <br/>
        Driver's License
        <br/>
        B <input type="checkbox" name="B" value="B"/>
        A <input type="checkbox" name="A" value="A"/>
        C <input type="checkbox" name="C" value="C"/>
    </fieldset>
    <input type="submit" value="Generate CV" name="submit"/>
</form>

<script>
    var nextId = 0;
    function removeElement1(id) {
        document.getElementById('parent1').removeChild(
            document.getElementById('parent1').lastChild
        );
    }
    function addInput1() {
        nextId++;
        var inputDiv = document.createElement("div");
        inputDiv.setAttribute("id", "num" + nextId);
        inputDiv.innerHTML =
            "<input type='text' name='programLanguage[]' /> " +
            "<select name='languageLevel[]'>"+
            "<option value='beginner' name='beginner'>Beginner</option>"+
            "<option value='programmer' name='programmer'>Programmer</option>"+
            "<option value='ninja' name='ninja'>Ninja</option>"+
            "</select><br/>";

        document.getElementById('parent1').appendChild(inputDiv);
    }
    function removeElement2(id) {
        document.getElementById('parent2').removeChild(
            document.getElementById('parent2').lastChild
        );
    }
    function addInput2() {
        nextId++;
        var inputDiv = document.createElement("div");
        inputDiv.setAttribute("id", "num" + nextId);
        inputDiv.innerHTML =
            '<input type="text" name="language[]" /> ' +
            '<select name="comprehension[]"> ' +
            '<option value="beginner" name="beginner">-Comprehension-</option>" ' +
            '<option value="beginner" name="beginner">beginner</option>' +
            '<option value="programmer" name="programmer">intermediate</option>' +
            '<option value="ninja" name="ninja">advanced</option>' +
            '</select> ' +
            '<select name="reading[]"> ' +
            '<option value="beginner" name="beginner">-Reading-</option>' +
            '<option value="beginner" name="beginner">beginner</option>' +
            '<option value="programmer" name="programmer">intermediate</option>' +
            '<option value="ninja" name="ninja">advanced</option>' +
            '</select> ' +
            '<select name="writing[]"> ' +
            '<option value="beginner" name="beginner">-Writing-</option>' +
            '<option value="beginner" name="beginner">beginner</option>' +
            '<option value="programmer" name="programmer">intermediate</option>' +
            '<option value="ninja" name="ninja">advanced</option>' +
            '</select><br/>';

        document.getElementById('parent2').appendChild(inputDiv);
    }
</script>

</body>
</html>
