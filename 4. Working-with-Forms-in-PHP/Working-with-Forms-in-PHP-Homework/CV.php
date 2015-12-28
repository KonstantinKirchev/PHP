<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CV</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
//var_dump($_POST);
$programLanguage = $_POST['programLanguage'];
$languageLevel = $_POST['languageLevel'];
$language = $_POST['language'];
$comprehension = $_POST['comprehension'];
$reading = $_POST['reading'];
$writing = $_POST['writing'];
$driverLicense = array($_POST['B'], $_POST['A']);
if (isset($_POST['submit'])) : ?>

    <h1>CV</h1>
    <table>
        <thead>
        <tr>
            <th colspan="2">
                Personal Information
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>First Name</td>
            <td><?php echo $_POST['firstName']?></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><?php echo $_POST['lastName']?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $_POST['email'] ?></td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td><?php echo $_POST['phoneNumber'] ?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?php echo $_POST['gender'] ?></td>
        </tr>
        <tr>
            <td>Birth Date</td>
            <td><?php echo $_POST['birthDate'] ?></td>
        </tr>
        <tr>
            <td>Nationality</td>
            <td><?php echo $_POST['nationality'] ?></td>
        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr>
            <th colspan="2">Last Work Position</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Company Name</td>
            <td><?php echo $_POST['companyName'] ?></td>
        </tr>
        <tr>
            <td>From</td>
            <td><?php echo $_POST['from'] ?></td>
        </tr>
        <tr>
            <td>To</td>
            <td><?php echo $_POST['to'] ?></td>
        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr>
            <th colspan="2">Computer Skills</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Programming Languages</td>
            <td>
                <table>
                    <thead>
                    <tr>
                        <th>Language</th>
                        <th>Skill Level</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for ($i = 0; $i < count($programLanguage); $i++): ?>
                        <tr><td> <?php echo $programLanguage[$i] ?></td><td><?php echo $languageLevel[$i] ?></td></tr>
                    <?php endfor ?>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr>
            <th colspan="2">Other Skills</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Languages</td>
            <td>
                <table>
                    <thead>
                    <tr>
                        <th>Language</th>
                        <th>Comprehension</th>
                        <th>Reading</th>
                        <th>Writing</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for ($i = 0; $i < count($language); $i++): ?>
                        <tr><td><?php echo $language[$i] ?></td><td><?php echo $comprehension[$i] ?></td><td><?php echo $reading[$i] ?></td><td><?php echo $writing[$i] ?></td></tr>
                    <?php endfor ?>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>Driver's license</td>
            <td>
                <?php echo implode(", ", $driverLicense) ?>
            </td>
        </tr>
        </tbody>
    </table>

<?php endif?>
</body>
</html>
